<?php

namespace App\Http\Controllers\Operator;

use App\Enums\PaymentStatus;
use App\Enums\ScheduleStatus;
use App\Http\Controllers\Controller;
use App\Models\Booking;
use App\Models\Payment;
use App\Models\Schedule;
use Illuminate\Http\Request;
use Illuminate\View\View;

class DashboardController extends Controller
{
    /**
     * Tampilkan dasbor operasional loket.
     */
    public function index(Request $request): View
    {
        $todaySchedulesCount = Schedule::whereDate('departure_at', today())
            ->where('status', ScheduleStatus::Open)
            ->count();

        $pendingPaymentsCount = Payment::where('status', PaymentStatus::Pending)->count();

        $todayBookingsCount = Booking::whereDate('created_at', today())->count();

        $recentPayments = Payment::with(['booking.user', 'booking.schedule.route.origin', 'booking.schedule.route.destination'])
            ->latest()
            ->take(6)
            ->get();

        return view('operator.dashboard', [
            'todaySchedulesCount' => $todaySchedulesCount,
            'pendingPaymentsCount' => $pendingPaymentsCount,
            'todayBookingsCount' => $todayBookingsCount,
            'recentPayments' => $recentPayments,
        ]);
    }
}
