<?php

namespace App\Http\Controllers\Member;

use App\Http\Controllers\Controller;
use App\Models\City;
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
        $recentBookings = $user->bookings()
            ->with(['schedule.route.origin', 'schedule.route.destination', 'payment'])
            ->latest()
            ->take(5)
            ->get();

        $cities = City::orderBy('name')->get();

        return view('member.beranda', [
            'user' => $user,
            'recentBookings' => $recentBookings,
            'cities' => $cities,
        ]);
    }
}
