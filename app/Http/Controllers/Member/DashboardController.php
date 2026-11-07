<?php

namespace App\Http\Controllers\Member;

use App\Http\Controllers\Controller;
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
            ->with(['schedule.route.originCity', 'schedule.route.destinationCity', 'payment'])
            ->latest()
            ->take(5)
            ->get();

        return view('member.dashboard', [
            'user' => $user,
            'recentBookings' => $recentBookings,
        ]);
    }
}
