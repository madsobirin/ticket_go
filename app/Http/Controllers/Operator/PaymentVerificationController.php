<?php

namespace App\Http\Controllers\Operator;

use App\Http\Controllers\Controller;
use App\Models\KonfirmasiPesan;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

class PaymentVerificationController extends Controller
{
    /**
     * Tampilkan daftar antrean konfirmasi pembayaran yang perlu diverifikasi dan riwayat disetujui.
     */
    public function index(Request $request): View
    {
        $confirmations = KonfirmasiPesan::with([
            'pesan.member',
            'pesan.jadwal.kotaAsal',
            'pesan.jadwal.kotaTujuan',
            'pesan.jadwal.kendaraan',
        ])
            ->whereHas('pesan', function ($q) {
                $q->where('status', 'Menunggu Konfirmasi');
            })
            ->latest('tgl_transfer')
            ->paginate(15, ['*'], 'pending_page');

        $approvedConfirmations = KonfirmasiPesan::with([
            'pesan.member',
            'pesan.jadwal.kotaAsal',
            'pesan.jadwal.kotaTujuan',
            'pesan.jadwal.kendaraan',
        ])
            ->whereHas('pesan', function ($q) {
                $q->where('status', 'Lunas');
            })
            ->latest('tgl_transfer')
            ->paginate(15, ['*'], 'approved_page');

        $activeTab = $request->query('tab', 'pending');

        return view('operator.konfirmasi-pembayaran', compact('confirmations', 'approvedConfirmations', 'activeTab'));
    }

    /**
     * Setujui pembayaran tiket (Ubah status tiket menjadi Lunas).
     */
    public function approve(Request $request, string $noResi): RedirectResponse
    {
        $konfirmasi = KonfirmasiPesan::with('pesan')->where('no_resi', $noResi)->firstOrFail();

        DB::transaction(function () use ($konfirmasi) {
            $konfirmasi->pesan->update(['status' => 'Lunas']);
        });

        return back()->with('status', 'Pembayaran dengan No. Resi '.$noResi.' berhasil disetujui! Tiket berstatus Lunas.');
    }

    /**
     * Tolak pembayaran tiket (Kembalikan status tiket ke Menunggu Pembayaran).
     */
    public function reject(Request $request, string $noResi): RedirectResponse
    {
        $konfirmasi = KonfirmasiPesan::with('pesan')->where('no_resi', $noResi)->firstOrFail();

        DB::transaction(function () use ($konfirmasi) {
            $konfirmasi->pesan->update(['status' => 'Menunggu Pembayaran']);
            // Hapus konfirmasi agar member bisa input ulang
            $konfirmasi->delete();
        });

        return back()->with('status', 'Konfirmasi pembayaran No. Resi '.$noResi.' ditolak. Member dapat mengirim ulang konfirmasi.');
    }
}
