<?php

namespace App\Http\Controllers\Member;

use App\Http\Controllers\Controller;
use App\Http\Requests\Member\StoreBookingRequest;
use App\Models\Jadwal;
use App\Models\KotaAsal;
use App\Models\KotaTujuan;
use App\Models\Pesan;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

class BookingController extends Controller
{
    /**
     * Tampilkan hasil pencarian jadwal travel.
     */
    public function search(Request $request): View
    {
        $originName = $request->query('kota_asal');
        $destinationName = $request->query('kota_tujuan');
        $departureDate = $request->query('tgl_berangkat');
        $timeFilter = $request->query('waktu'); // pagi, siang, sore-malam

        $kotaAsalList = KotaAsal::orderBy('nm_kota_asal')->get();
        $kotaTujuanList = KotaTujuan::orderBy('nm_kota_tujuan')->get();

        $query = Jadwal::with(['kotaAsal', 'kotaTujuan', 'kendaraan']);

        if ($originName) {
            $query->whereHas(
                'kotaAsal',
                fn ($q) => $q->where('nm_kota_asal', $originName),
            );
        }

        if ($destinationName) {
            $query->whereHas(
                'kotaTujuan',
                fn ($q) => $q->where('nm_kota_tujuan', $destinationName),
            );
        }

        if ($departureDate) {
            $query->whereDate('tgl_berangkat', $departureDate);
        }

        if ($timeFilter) {
            if ($timeFilter === 'pagi') {
                $query->whereTime('jam_berangkat', '>=', '06:00:00')
                    ->whereTime('jam_berangkat', '<=', '11:59:59');
            } elseif ($timeFilter === 'siang') {
                $query->whereTime('jam_berangkat', '>=', '12:00:00')
                    ->whereTime('jam_berangkat', '<=', '15:59:59');
            } elseif ($timeFilter === 'sore-malam') {
                $query->whereTime('jam_berangkat', '>=', '16:00:00')
                    ->whereTime('jam_berangkat', '<=', '23:59:59');
            }
        }

        $schedules = $query
            ->orderBy('tgl_berangkat')
            ->orderBy('jam_berangkat')
            ->paginate(10)
            ->withQueryString();

        return view(
            'member.jadwal',
            compact(
                'schedules',
                'kotaAsalList',
                'kotaTujuanList',
                'originName',
                'destinationName',
                'departureDate',
                'timeFilter',
            ),
        );
    }

    /**
     * Tampilkan denah pemilihan nomor kursi untuk jadwal tertentu.
     */
    public function seatPicker(Jadwal $schedule): View|RedirectResponse
    {
        $occupiedSeats = $schedule
            ->pesanan()
            ->pluck('nomor_kursi')
            ->map(fn ($k) => (int) $k)
            ->toArray();

        return view('member.kursi', compact('schedule', 'occupiedSeats'));
    }

    /**
     * Simpan pemesanan tiket member (dengan proteksi transaksi & anti-double booking).
     */
    public function store(StoreBookingRequest $request): RedirectResponse
    {
        $schedule = Jadwal::findOrFail($request->validated('schedule_id'));
        $seatNumber = (string) $request->validated('seat_number');
        $user = $request->user();

        try {
            DB::transaction(function () use ($schedule, $seatNumber, $user) {
                $alreadyTaken = Pesan::where('id_jadwal', $schedule->id_jadwal)
                    ->where('nomor_kursi', $seatNumber)
                    ->lockForUpdate()
                    ->exists();

                if ($alreadyTaken) {
                    throw new \DomainException('Kursi nomor '.$seatNumber.' baru saja dipesan oleh penumpang lain. Silakan pilih nomor kursi lain.');
                }

                Pesan::create([
                    'id_jadwal' => $schedule->id_jadwal,
                    'id_member' => $user->id_member,
                    'nomor_kursi' => $seatNumber,
                    'status' => 'Menunggu Pembayaran',
                ]);
            });
        } catch (\DomainException $e) {
            return back()->with('error', $e->getMessage());
        }

        return redirect()
            ->route('member.pembayaran')
            ->with('status', 'Nomor kursi berhasil dipilih! Silakan selesaikan pembayaran.');
    }
}
