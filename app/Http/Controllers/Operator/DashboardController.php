<?php

namespace App\Http\Controllers\Operator;

use App\Http\Controllers\Controller;
use App\Models\Jadwal;
use App\Models\KonfirmasiPesan;
use App\Models\Pesan;
use Illuminate\Http\Request;
use Illuminate\View\View;

class DashboardController extends Controller
{
    /**
     * Tampilkan dasbor operasional loket.
     */
    public function index(Request $request): View
    {
        $todaySchedulesCount = Jadwal::count();

        $pendingPaymentsCount = KonfirmasiPesan::whereHas('pesan', function ($q) {
            $q->where('status', 'Menunggu Konfirmasi');
        })->count();

        $todayBookingsCount = Pesan::count();

        $recentPayments = KonfirmasiPesan::with([
            'pesan.member',
            'pesan.jadwal.kotaAsal',
            'pesan.jadwal.kotaTujuan',
        ])
            ->whereHas('pesan', function ($q) {
                $q->where('status', 'Menunggu Konfirmasi');
            })
            ->latest('tgl_transfer')
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
