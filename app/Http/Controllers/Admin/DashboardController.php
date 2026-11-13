<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Jadwal;
use App\Models\Kendaraan;
use App\Models\KotaTujuan;
use App\Models\Member;
use App\Models\Pesan;
use Illuminate\Http\Request;
use Illuminate\View\View;

class DashboardController extends Controller
{
    /**
     * Tampilkan dasbor administrator sistem.
     */
    public function index(Request $request): View
    {
        $totalUsers = Member::count();
        $totalRoutes = KotaTujuan::count();
        $totalVehicles = Kendaraan::count();
        $totalSchedules = Jadwal::count();
        $totalBookings = Pesan::count();
        $paidBookingsRevenue = Pesan::where('status', 'Lunas')
            ->join('jadwal', 'pesan.id_jadwal', '=', 'jadwal.id_jadwal')
            ->sum('jadwal.harga');

        $recentUsers = Member::take(5)->get();

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
