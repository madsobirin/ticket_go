<?php

namespace App\Http\Controllers\Member;

use App\Http\Controllers\Controller;
use App\Models\Pesan;
use Illuminate\Http\Request;
use Illuminate\View\View;

class OrderHistoryController extends Controller
{
    /**
     * Tampilkan riwayat pemesanan tiket milik member.
     */
    public function index(Request $request): View
    {
        $member = $request->user();

        $tab = $request->query('status', 'all');

        $baseQuery = Pesan::where('id_member', $member->id_member);

        $counts = [
            'all' => (clone $baseQuery)->count(),
            'menunggu-pembayaran' => (clone $baseQuery)->where('status', 'Menunggu Pembayaran')->count(),
            'menunggu-konfirmasi' => (clone $baseQuery)->where('status', 'Menunggu Konfirmasi')->count(),
            'lunas' => (clone $baseQuery)->where('status', 'Lunas')->count(),
        ];

        $ordersQuery = Pesan::with([
            'jadwal.kotaAsal',
            'jadwal.kotaTujuan',
            'jadwal.kendaraan',
            'konfirmasiPesan',
        ])
            ->where('id_member', $member->id_member);

        if ($tab === 'menunggu-pembayaran') {
            $ordersQuery->where('status', 'Menunggu Pembayaran');
        } elseif ($tab === 'menunggu-konfirmasi') {
            $ordersQuery->where('status', 'Menunggu Konfirmasi');
        } elseif ($tab === 'lunas') {
            $ordersQuery->where('status', 'Lunas');
        }

        $orders = $ordersQuery->orderByDesc('id_pesan')->paginate(10)->withQueryString();

        return view('member.pesanan', compact('orders', 'tab', 'counts'));
    }

    /**
     * Tampilkan e-tiket perjalanan yang sah untuk dicetak.
     */
    public function ticket(Request $request, int $id): View
    {
        $member = $request->user();

        $pesan = Pesan::with([
            'jadwal.kotaAsal',
            'jadwal.kotaTujuan',
            'jadwal.kendaraan',
            'konfirmasiPesan',
            'member',
        ])
            ->where('id_pesan', $id)
            ->where('id_member', $member->id_member)
            ->firstOrFail();

        return view('member.tiket', compact('pesan'));
    }
}
