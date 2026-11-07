<?php

namespace App\Http\Controllers\Operator;

use App\Enums\ScheduleStatus;
use App\Http\Controllers\Controller;
use App\Http\Requests\Operator\ScheduleRequest;
use App\Models\Route;
use App\Models\Schedule;
use App\Models\Vehicle;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class ScheduleController extends Controller
{
    public function index(): View
    {
        $schedules = Schedule::with(['route.origin', 'route.destination', 'vehicle'])
            ->withActiveBookingsCount()
            ->latest('departure_at')
            ->paginate(15);

        return view('operator.schedules.index', compact('schedules'));
    }

    public function create(): View
    {
        $routes = Route::with(['origin', 'destination'])->get();
        $vehicles = Vehicle::orderBy('type')->get();
        $statuses = ScheduleStatus::cases();

        return view('operator.schedules.create', compact('routes', 'vehicles', 'statuses'));
    }

    public function store(ScheduleRequest $request): RedirectResponse
    {
        Schedule::create($request->validated());

        return redirect()
            ->route('operator.schedules.index')
            ->with('status', 'Jadwal keberangkatan baru berhasil ditambahkan.');
    }

    public function edit(Schedule $schedule): View
    {
        $routes = Route::with(['origin', 'destination'])->get();
        $vehicles = Vehicle::orderBy('type')->get();
        $statuses = ScheduleStatus::cases();

        return view('operator.schedules.edit', compact('schedule', 'routes', 'vehicles', 'statuses'));
    }

    public function update(ScheduleRequest $request, Schedule $schedule): RedirectResponse
    {
        $schedule->update($request->validated());

        return redirect()
            ->route('operator.schedules.index')
            ->with('status', 'Data jadwal keberangkatan berhasil diperbarui.');
    }

    public function destroy(Schedule $schedule): RedirectResponse
    {
        if ($schedule->bookings()->exists()) {
            return back()->with('error', 'Jadwal tidak dapat dihapus karena sudah ada pemesanan tiket. Silakan ubah status menjadi Dibatalkan.');
        }

        $schedule->delete();

        return redirect()
            ->route('operator.schedules.index')
            ->with('status', 'Jadwal keberangkatan berhasil dihapus.');
    }
}
