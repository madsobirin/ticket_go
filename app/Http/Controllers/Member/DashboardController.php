<?php

namespace App\Http\Controllers\Member;

use App\Http\Controllers\Controller;
use App\Models\KotaAsal;
use App\Models\KotaTujuan;
use Illuminate\Http\Request;
use Illuminate\View\View;

class DashboardController extends Controller
{
    /**
     * Tampilkan dasbor penumpang (member).
     */
    public function index(Request $request): View
    {
        $user = $request->user();
        $recentBookings = collect();

        $kotaAsal = KotaAsal::orderBy('nm_kota_asal')->get();
        $kotaTujuan = KotaTujuan::orderBy('nm_kota_tujuan')->get();

        return view('member.beranda', [
            'user' => $user,
            'recentBookings' => $recentBookings,
            'cities' => $kotaAsal,
            'kotaAsal' => $kotaAsal,
            'kotaTujuan' => $kotaTujuan,
        ]);
    }
}
