<?php

namespace App\Http\Controllers\Member;

use App\Http\Controllers\Controller;
use App\Http\Requests\Member\StorePaymentConfirmationRequest;
use App\Models\KonfirmasiPesan;
use App\Models\Pesan;
use Carbon\Carbon;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class PaymentController extends Controller
{
    /**
     * Tampilkan halaman instruksi pembayaran untuk pesanan member.
     */
    public function show(Request $request): View
    {
        $member = $request->user();

        $pesan = Pesan::with(['jadwal.kotaAsal', 'jadwal.kotaTujuan', 'jadwal.kendaraan'])
            ->where('id_member', $member->id_member)
            ->latest('id_pesan')
            ->first();

        return view('member.pembayaran', compact('pesan'));
    }

    /**
     * Tampilkan formulir konfirmasi transfer pembayaran.
     */
    public function confirmationForm(Request $request): View
    {
        $member = $request->user();

        $unpaidBookings = Pesan::with(['jadwal.kotaAsal', 'jadwal.kotaTujuan'])
            ->where('id_member', $member->id_member)
            ->where('status', 'Menunggu Pembayaran')
            ->orderByDesc('id_pesan')
            ->get();

        $selectedPesan = $unpaidBookings->first();

        return view('member.konfirmasi-pembayaran', compact('unpaidBookings', 'selectedPesan'));
    }

    /**
     * Simpan data konfirmasi transfer ke tabel konfirmasi_pesan.
     */
    public function storeConfirmation(StorePaymentConfirmationRequest $request): RedirectResponse
    {
        $validated = $request->validated();
        $member = $request->user();

        $pesan = Pesan::where('id_pesan', $validated['id_pesan'])
            ->where('id_member', $member->id_member)
            ->firstOrFail();

        $tglWaktu = Carbon::parse($validated['tanggal_transfer']);

        KonfirmasiPesan::create([
            'no_resi' => $validated['no_resi'],
            'no_rek' => (int) preg_replace('/\D/', '', $validated['no_rek']),
            'tgl_transfer' => $tglWaktu->format('Y-m-d'),
            'jam_transfer' => $tglWaktu->format('H:i:s'),
            'id_pesan' => $pesan->id_pesan,
        ]);

        $pesan->status = 'Menunggu Konfirmasi';
        $pesan->save();

        return redirect()
            ->route('member.pesanan')
            ->with('status', 'Konfirmasi pembayaran berhasil dikirim! Menunggu verifikasi petugas loket.');
    }
}
