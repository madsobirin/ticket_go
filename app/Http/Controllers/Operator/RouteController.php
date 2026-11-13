<?php

namespace App\Http\Controllers\Operator;

use App\Http\Controllers\Controller;
use App\Http\Requests\Operator\RouteRequest;
use App\Models\Jadwal;
use App\Models\Kendaraan;
use App\Models\KotaAsal;
use App\Models\KotaTujuan;
use Illuminate\Http\RedirectResponse;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\View\View;

class RouteController extends Controller
{
    public function index(): View
    {
        $jadwals = Jadwal::with(['kotaAsal', 'kotaTujuan'])->get();
        $routeGroups = $jadwals->groupBy(fn ($j) => $j->id_kota_asal.'-'.$j->id_kota_tujuan);

        $routesList = $routeGroups->map(function ($items) {
            $first = $items->first();
            $originId = $first->id_kota_asal;
            $destId = $first->id_kota_tujuan;
            $id = ($originId * 1000) + $destId;

            return (object) [
                'id' => $id,
                'origin_city_id' => $originId,
                'destination_city_id' => $destId,
                'origin' => (object) [
                    'id' => $originId,
                    'name' => $first->kotaAsal?->nm_kota_asal ?? 'Asal',
                ],
                'destination' => (object) [
                    'id' => $destId,
                    'name' => $first->kotaTujuan?->nm_kota_tujuan ?? 'Tujuan',
                ],
                'base_price' => $items->min('harga'),
                'schedules_count' => $items->count(),
            ];
        })->values();

        $page = request()->get('page', 1);
        $perPage = 15;
        $routes = new LengthAwarePaginator(
            $routesList->forPage($page, $perPage),
            $routesList->count(),
            $perPage,
            $page,
            ['path' => request()->url(), 'query' => request()->query()]
        );

        return view('operator.routes.index', compact('routes'));
    }

    public function create(): View
    {
        $originCities = KotaAsal::orderBy('nm_kota_asal')->get()->map(fn ($k) => (object) [
            'id' => $k->id_kota_asal,
            'name' => $k->nm_kota_asal,
        ]);

        $destinationCities = KotaTujuan::orderBy('nm_kota_tujuan')->get()->map(fn ($k) => (object) [
            'id' => $k->id_kota_tujuan,
            'name' => $k->nm_kota_tujuan,
        ]);

        $cities = $originCities->merge($destinationCities)->unique('name');

        return view('operator.routes.create', compact('originCities', 'destinationCities', 'cities'));
    }

    public function store(RouteRequest $request): RedirectResponse
    {
        $originId = (int) $request->input('origin_city_id');
        $destId = (int) $request->input('destination_city_id');
        $basePrice = (int) $request->input('base_price');

        // Check if there is already a schedule for this pair, or create a default schedule
        $existing = Jadwal::where('id_kota_asal', $originId)
            ->where('id_kota_tujuan', $destId)
            ->first();

        if ($existing) {
            $existing->update(['harga' => $basePrice]);
        } else {
            $vehicle = Kendaraan::first();
            Jadwal::create([
                'id_kota_asal' => $originId,
                'id_kota_tujuan' => $destId,
                'id_mobil' => $vehicle?->id_mobil ?? 1,
                'harga' => $basePrice,
                'tgl_berangkat' => date('Y-m-d', strtotime('+1 day')),
                'jam_berangkat' => '08:00:00',
            ]);
        }

        return redirect()
            ->route('operator.routes.index')
            ->with('status', 'Rute perjalanan baru berhasil ditambahkan.');
    }

    public function edit(int|string $route): View
    {
        $routeId = (int) $route;
        $originId = intdiv($routeId, 1000);
        $destId = $routeId % 1000;

        $jadwals = Jadwal::where('id_kota_asal', $originId)
            ->where('id_kota_tujuan', $destId)
            ->get();

        $origin = KotaAsal::find($originId);
        $destination = KotaTujuan::find($destId);

        $routeObj = (object) [
            'id' => $routeId,
            'origin_city_id' => $originId,
            'destination_city_id' => $destId,
            'base_price' => $jadwals->min('harga') ?? 100000,
            'origin' => (object) [
                'id' => $originId,
                'name' => $origin?->nm_kota_asal ?? 'Asal',
            ],
            'destination' => (object) [
                'id' => $destId,
                'name' => $destination?->nm_kota_tujuan ?? 'Tujuan',
            ],
        ];

        $originCities = KotaAsal::orderBy('nm_kota_asal')->get()->map(fn ($k) => (object) [
            'id' => $k->id_kota_asal,
            'name' => $k->nm_kota_asal,
        ]);

        $destinationCities = KotaTujuan::orderBy('nm_kota_tujuan')->get()->map(fn ($k) => (object) [
            'id' => $k->id_kota_tujuan,
            'name' => $k->nm_kota_tujuan,
        ]);

        $cities = $originCities->merge($destinationCities)->unique('name');

        return view('operator.routes.edit', [
            'route' => $routeObj,
            'originCities' => $originCities,
            'destinationCities' => $destinationCities,
            'cities' => $cities,
        ]);
    }

    public function update(RouteRequest $request, int|string $route): RedirectResponse
    {
        $routeId = (int) $route;
        $originId = intdiv($routeId, 1000);
        $destId = $routeId % 1000;

        $newOriginId = (int) $request->input('origin_city_id');
        $newDestId = (int) $request->input('destination_city_id');
        $basePrice = (int) $request->input('base_price');

        Jadwal::where('id_kota_asal', $originId)
            ->where('id_kota_tujuan', $destId)
            ->update([
                'id_kota_asal' => $newOriginId,
                'id_kota_tujuan' => $newDestId,
                'harga' => $basePrice,
            ]);

        return redirect()
            ->route('operator.routes.index')
            ->with('status', 'Data rute perjalanan berhasil diperbarui.');
    }

    public function destroy(int|string $route): RedirectResponse
    {
        $routeId = (int) $route;
        $originId = intdiv($routeId, 1000);
        $destId = $routeId % 1000;

        $hasBookings = Jadwal::where('id_kota_asal', $originId)
            ->where('id_kota_tujuan', $destId)
            ->whereHas('pesanan')
            ->exists();

        if ($hasBookings) {
            return back()->with('error', 'Rute tidak dapat dihapus karena sudah memiliki pemesanan tiket pada jadwalnya.');
        }

        Jadwal::where('id_kota_asal', $originId)
            ->where('id_kota_tujuan', $destId)
            ->delete();

        return redirect()
            ->route('operator.routes.index')
            ->with('status', 'Rute perjalanan berhasil dihapus.');
    }
}
