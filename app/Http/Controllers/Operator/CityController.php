<?php

namespace App\Http\Controllers\Operator;

use App\Http\Controllers\Controller;
use App\Http\Requests\Operator\CityRequest;
use App\Models\Jadwal;
use App\Models\KotaAsal;
use App\Models\KotaTujuan;
use Illuminate\Http\RedirectResponse;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;
use Illuminate\View\View;

class CityController extends Controller
{
    public function index(): View
    {
        $citiesList = $this->getAllCities();

        $page = request()->get('page', 1);
        $perPage = 15;
        $cities = new LengthAwarePaginator(
            $citiesList->forPage($page, $perPage),
            $citiesList->count(),
            $perPage,
            $page,
            ['path' => request()->url(), 'query' => request()->query()]
        );

        return view('operator.cities.index', compact('cities'));
    }

    public function create(): View
    {
        return view('operator.cities.create');
    }

    public function store(CityRequest $request): RedirectResponse
    {
        $name = trim((string) $request->input('name'));

        KotaAsal::firstOrCreate(['nm_kota_asal' => $name]);
        KotaTujuan::firstOrCreate(['nm_kota_tujuan' => $name]);

        return redirect()
            ->route('operator.cities.index')
            ->with('status', 'Kota baru berhasil ditambahkan.');
    }

    public function edit(int|string $city): View
    {
        $cityObj = $this->getAllCities()->firstWhere('id', (int) $city);

        if (! $cityObj) {
            abort(404, 'Data kota tidak ditemukan.');
        }

        return view('operator.cities.edit', ['city' => $cityObj]);
    }

    public function update(CityRequest $request, int|string $city): RedirectResponse
    {
        $cityObj = $this->getAllCities()->firstWhere('id', (int) $city);

        if (! $cityObj) {
            abort(404, 'Data kota tidak ditemukan.');
        }

        $oldName = $cityObj->name;
        $newName = trim((string) $request->input('name'));

        KotaAsal::where('nm_kota_asal', $oldName)->update(['nm_kota_asal' => $newName]);
        KotaTujuan::where('nm_kota_tujuan', $oldName)->update(['nm_kota_tujuan' => $newName]);

        return redirect()
            ->route('operator.cities.index')
            ->with('status', 'Data kota berhasil diperbarui.');
    }

    public function destroy(int|string $city): RedirectResponse
    {
        $cityObj = $this->getAllCities()->firstWhere('id', (int) $city);

        if (! $cityObj) {
            abort(404, 'Data kota tidak ditemukan.');
        }

        if ($cityObj->origin_routes_count > 0 || $cityObj->destination_routes_count > 0) {
            return back()->with('error', 'Kota tidak dapat dihapus karena masih terhubung dengan rute perjalanan.');
        }

        KotaAsal::where('nm_kota_asal', $cityObj->name)->delete();
        KotaTujuan::where('nm_kota_tujuan', $cityObj->name)->delete();

        return redirect()
            ->route('operator.cities.index')
            ->with('status', 'Kota berhasil dihapus.');
    }

    /**
     * @return Collection<int, object>
     */
    private function getAllCities(): Collection
    {
        $asal = KotaAsal::all();
        $tujuan = KotaTujuan::all();

        $allNames = $asal->pluck('nm_kota_asal')
            ->merge($tujuan->pluck('nm_kota_tujuan'))
            ->unique()
            ->values();

        return $allNames->map(function ($name, $index) use ($asal, $tujuan) {
            $asalIds = $asal->where('nm_kota_asal', $name)->pluck('id_kota_asal');
            $tujuanIds = $tujuan->where('nm_kota_tujuan', $name)->pluck('id_kota_tujuan');

            $originCount = Jadwal::whereIn('id_kota_asal', $asalIds)->count();
            $destinationCount = Jadwal::whereIn('id_kota_tujuan', $tujuanIds)->count();

            // Unique stable numeric ID
            $id = $asalIds->first() ?? (1000 + ($tujuanIds->first() ?? $index + 1));

            return (object) [
                'id' => (int) $id,
                'name' => $name,
                'origin_routes_count' => $originCount,
                'destination_routes_count' => $destinationCount,
            ];
        });
    }
}
