<?php

namespace App\Http\Controllers\Operator;

use App\Enums\ScheduleStatus;
use App\Http\Controllers\Controller;
use App\Http\Requests\Operator\ScheduleRequest;
use App\Models\Jadwal;
use App\Models\Kendaraan;
use App\Models\KotaAsal;
use App\Models\KotaTujuan;
use Carbon\Carbon;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Collection;
use Illuminate\View\View;

class ScheduleController extends Controller
{
    public function index(): View
    {
        $schedules = Jadwal::with(['kotaAsal', 'kotaTujuan', 'kendaraan', 'pesanan'])
            ->orderByDesc('tgl_berangkat')
            ->orderByDesc('jam_berangkat')
            ->paginate(15);

        return view('operator.schedules.index', compact('schedules'));
    }

    public function create(): View
    {
        $routes = $this->getAvailableRoutes();
        $vehicles = Kendaraan::orderBy('jenis_mobil')->get();
        $statuses = ScheduleStatus::cases();

        return view('operator.schedules.create', compact('routes', 'vehicles', 'statuses'));
    }

    public function store(ScheduleRequest $request): RedirectResponse
    {
        $routeId = (int) $request->input('route_id');
        $originId = intdiv($routeId, 1000);
        $destId = $routeId % 1000;
        $departure = Carbon::parse($request->input('departure_at'));

        Jadwal::create([
            'id_kota_asal' => $originId,
            'id_kota_tujuan' => $destId,
            'id_mobil' => (int) $request->input('vehicle_id'),
            'harga' => (int) $request->input('price'),
            'tgl_berangkat' => $departure->toDateString(),
            'jam_berangkat' => $departure->toTimeString(),
        ]);

        return redirect()
            ->route('operator.schedules.index')
            ->with('status', 'Jadwal keberangkatan baru berhasil ditambahkan.');
    }

    public function edit(int|string $schedule): View
    {
        $schedule = Jadwal::with(['kotaAsal', 'kotaTujuan', 'kendaraan'])->findOrFail($schedule);
        $routes = $this->getAvailableRoutes();
        $vehicles = Kendaraan::orderBy('jenis_mobil')->get();
        $statuses = ScheduleStatus::cases();

        return view('operator.schedules.edit', compact('schedule', 'routes', 'vehicles', 'statuses'));
    }

    public function update(ScheduleRequest $request, int|string $schedule): RedirectResponse
    {
        $scheduleModel = Jadwal::findOrFail($schedule);
        $routeId = (int) $request->input('route_id');
        $originId = intdiv($routeId, 1000);
        $destId = $routeId % 1000;
        $departure = Carbon::parse($request->input('departure_at'));

        $scheduleModel->update([
            'id_kota_asal' => $originId,
            'id_kota_tujuan' => $destId,
            'id_mobil' => (int) $request->input('vehicle_id'),
            'harga' => (int) $request->input('price'),
            'tgl_berangkat' => $departure->toDateString(),
            'jam_berangkat' => $departure->toTimeString(),
        ]);

        return redirect()
            ->route('operator.schedules.index')
            ->with('status', 'Data jadwal keberangkatan berhasil diperbarui.');
    }

    public function destroy(int|string $schedule): RedirectResponse
    {
        $scheduleModel = Jadwal::findOrFail($schedule);

        if ($scheduleModel->pesanan()->exists()) {
            return back()->with('error', 'Jadwal tidak dapat dihapus karena sudah ada pemesanan tiket. Silakan ubah status menjadi Dibatalkan.');
        }

        $scheduleModel->delete();

        return redirect()
            ->route('operator.schedules.index')
            ->with('status', 'Jadwal keberangkatan berhasil dihapus.');
    }

    /**
     * @return Collection<int, object>
     */
    private function getAvailableRoutes(): Collection
    {
        $routes = collect();
        $kotaAsal = KotaAsal::orderBy('nm_kota_asal')->get();
        $kotaTujuan = KotaTujuan::orderBy('nm_kota_tujuan')->get();

        foreach ($kotaAsal as $asal) {
            foreach ($kotaTujuan as $tujuan) {
                $basePrice = Jadwal::where('id_kota_asal', $asal->id_kota_asal)
                    ->where('id_kota_tujuan', $tujuan->id_kota_tujuan)
                    ->value('harga') ?? 100000;

                $routes->push((object) [
                    'id' => ($asal->id_kota_asal * 1000) + $tujuan->id_kota_tujuan,
                    'origin_city_id' => $asal->id_kota_asal,
                    'destination_city_id' => $tujuan->id_kota_tujuan,
                    'origin' => (object) [
                        'id' => $asal->id_kota_asal,
                        'name' => $asal->nm_kota_asal,
                    ],
                    'destination' => (object) [
                        'id' => $tujuan->id_kota_tujuan,
                        'name' => $tujuan->nm_kota_tujuan,
                    ],
                    'base_price' => $basePrice,
                ]);
            }
        }

        return $routes;
    }
}
