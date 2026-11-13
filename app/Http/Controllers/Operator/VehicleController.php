<?php

namespace App\Http\Controllers\Operator;

use App\Http\Controllers\Controller;
use App\Http\Requests\Operator\VehicleRequest;
use App\Models\Kendaraan;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class VehicleController extends Controller
{
    public function index(): View
    {
        $vehicles = Kendaraan::withCount('jadwal as schedules_count')
            ->orderBy('id_mobil')
            ->paginate(15);

        return view('operator.vehicles.index', compact('vehicles'));
    }

    public function create(): View
    {
        return view('operator.vehicles.create');
    }

    public function store(VehicleRequest $request): RedirectResponse
    {
        Kendaraan::create([
            'jenis_mobil' => $request->input('type'),
            'nomor_polisi' => strtoupper(trim((string) $request->input('plate_number'))),
            'warna_mobil' => $request->input('color'),
        ]);

        return redirect()
            ->route('operator.vehicles.index')
            ->with('status', 'Kendaraan armada baru berhasil didaftarkan.');
    }

    public function edit(int|string $vehicle): View
    {
        $vehicle = Kendaraan::findOrFail($vehicle);

        return view('operator.vehicles.edit', compact('vehicle'));
    }

    public function update(VehicleRequest $request, int|string $vehicle): RedirectResponse
    {
        $vehicleModel = Kendaraan::findOrFail($vehicle);
        $vehicleModel->update([
            'jenis_mobil' => $request->input('type'),
            'nomor_polisi' => strtoupper(trim((string) $request->input('plate_number'))),
            'warna_mobil' => $request->input('color'),
        ]);

        return redirect()
            ->route('operator.vehicles.index')
            ->with('status', 'Data kendaraan berhasil diperbarui.');
    }

    public function destroy(int|string $vehicle): RedirectResponse
    {
        $vehicleModel = Kendaraan::findOrFail($vehicle);

        if ($vehicleModel->schedules()->exists()) {
            return back()->with('error', 'Kendaraan tidak dapat dihapus karena sudah memiliki riwayat atau jadwal keberangkatan.');
        }

        $vehicleModel->delete();

        return redirect()
            ->route('operator.vehicles.index')
            ->with('status', 'Kendaraan berhasil dihapus.');
    }
}
