<?php

namespace App\Http\Controllers\Admin;

use App\Enums\BookingStatus;
use App\Http\Controllers\Controller;
use App\Models\Booking;
use App\Models\Route;
use App\Models\Schedule;
use App\Models\User;
use App\Models\Vehicle;
use Illuminate\Http\Request;
use Illuminate\View\View;

class DashboardController extends Controller
{
    /**
     * Tampilkan dasbor administrator sistem.
     */
    public function index(Request $request): View
    {
        $totalUsers = User::count();
        $totalRoutes = Route::count();
        $totalVehicles = Vehicle::count();
        $totalSchedules = Schedule::count();
        $totalBookings = Booking::count();
        $paidBookingsRevenue = Booking::where('status', BookingStatus::Paid)->sum('price_snapshot');

        $recentUsers = User::latest()->take(5)->get();

        return view('admin.dashboard', [
            'totalUsers' => $totalUsers,
            'totalRoutes' => $totalRoutes,
            'totalVehicles' => $totalVehicles,
            'totalSchedules' => $totalSchedules,
            'totalBookings' => $totalBookings,
            'paidBookingsRevenue' => $paidBookingsRevenue,
            'recentUsers' => $recentUsers,
        ]);
    }
}
