<?php

namespace App\Http\Controllers\Operator;

use App\Http\Controllers\Controller;
use App\Http\Requests\Operator\VehicleRequest;
use App\Models\Vehicle;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class VehicleController extends Controller
{
    public function index(): View
    {
        $vehicles = Vehicle::withCount('schedules')
            ->orderBy('type')
            ->paginate(15);

        return view('operator.vehicles.index', compact('vehicles'));
    }

    public function create(): View
    {
        return view('operator.vehicles.create');
    }

    public function store(VehicleRequest $request): RedirectResponse
    {
        Vehicle::create($request->validated());

        return redirect()
            ->route('operator.vehicles.index')
            ->with('status', 'Kendaraan armada baru berhasil didaftarkan.');
    }

    public function edit(Vehicle $vehicle): View
    {
        return view('operator.vehicles.edit', compact('vehicle'));
    }

    public function update(VehicleRequest $request, Vehicle $vehicle): RedirectResponse
    {
        $vehicle->update($request->validated());

        return redirect()
            ->route('operator.vehicles.index')
            ->with('status', 'Data kendaraan berhasil diperbarui.');
    }

    public function destroy(Vehicle $vehicle): RedirectResponse
    {
        if ($vehicle->schedules()->exists()) {
            return back()->with('error', 'Kendaraan tidak dapat dihapus karena sudah memiliki riwayat atau jadwal keberangkatan.');
        }

        $vehicle->delete();

        return redirect()
            ->route('operator.vehicles.index')
            ->with('status', 'Kendaraan berhasil dihapus.');
    }
}
