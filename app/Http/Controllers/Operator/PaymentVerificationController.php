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
     * Tampilkan daftar antrean konfirmasi pembayaran yang perlu diverifikasi.
     */
    public function index(): View
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
            ->paginate(15);

        return view('operator.konfirmasi-pembayaran', compact('confirmations'));
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
