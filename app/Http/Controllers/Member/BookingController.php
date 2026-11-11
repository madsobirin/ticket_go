<?php

namespace App\Http\Controllers\Member;

use App\Enums\BookingStatus;
use App\Enums\ScheduleStatus;
use App\Http\Controllers\Controller;
use App\Http\Requests\Member\StoreBookingRequest;
use App\Models\Booking;
use App\Models\City;
use App\Models\Schedule;
use Illuminate\Database\QueryException;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
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

        $cities = City::orderBy('name')->get();

        $query = Schedule::with(['route.origin', 'route.destination', 'vehicle'])
            ->withActiveBookingsCount()
            ->where('status', ScheduleStatus::Open)
            ->where('departure_at', '>', now());

        if ($originName) {
            $query->whereHas('route.origin', fn ($q) => $q->where('name', $originName));
        }

        if ($destinationName) {
            $query->whereHas('route.destination', fn ($q) => $q->where('name', $destinationName));
        }

        if ($departureDate) {
            $query->whereDate('departure_at', $departureDate);
        }

        $schedules = $query->orderBy('departure_at')->paginate(10)->withQueryString();

        return view('member.jadwal', compact(
            'schedules',
            'cities',
            'originName',
            'destinationName',
            'departureDate'
        ));
    }

    /**
     * Tampilkan denah pemilihan nomor kursi untuk jadwal tertentu.
     */
    public function seatPicker(Schedule $schedule): View|RedirectResponse
    {
        if ($schedule->status !== ScheduleStatus::Open || $schedule->departure_at->isPast()) {
            return redirect()
                ->route('member.cari-jadwal')
                ->with('error', 'Jadwal yang dipilih sudah tidak tersedia atau telah berangkat.');
        }

        $schedule->load(['route.origin', 'route.destination', 'vehicle']);

        // Ambil daftar nomor kursi yang sudah dipesan dan masih aktif
        $occupiedSeats = $schedule->bookings()
            ->active()
            ->pluck('seat_number')
            ->toArray();

        return view('member.kursi', compact('schedule', 'occupiedSeats'));
    }

    /**
     * Simpan pemesanan tiket member (dengan proteksi transaksi & anti-double booking).
     */
    public function store(StoreBookingRequest $request): RedirectResponse
    {
        $schedule = Schedule::with('vehicle')->findOrFail($request->validated('schedule_id'));
        $seatNumber = (int) $request->validated('seat_number');
        $user = $request->user();

        try {
            $booking = DB::transaction(function () use ($schedule, $seatNumber, $user) {
                // Kunci pengecekan kursi aktif pada jadwal yang sama
                $alreadyTaken = $schedule->bookings()
                    ->active()
                    ->where('seat_number', $seatNumber)
                    ->lockForUpdate()
                    ->exists();

                if ($alreadyTaken) {
                    throw new \DomainException('Kursi nomor '.$seatNumber.' baru saja dipesan oleh penumpang lain. Silakan pilih nomor kursi lain.');
                }

                // Generate kode unik tiket 12 karakter format LL + 8 huruf/angka acak
                do {
                    $code = 'LL'.Str::upper(Str::random(8));
                } while (Booking::where('code', $code)->exists());

                $newBooking = new Booking;
                $newBooking->code = $code;
                $newBooking->schedule_id = $schedule->id;
                $newBooking->user_id = $user->id;
                $newBooking->seat_number = $seatNumber;
                $newBooking->price_snapshot = $schedule->price;
                $newBooking->status = BookingStatus::Unpaid;
                $newBooking->expires_at = now()->addHours(2);
                $newBooking->save();

                return $newBooking;
            });
        } catch (\DomainException $e) {
            return back()->with('error', $e->getMessage());
        } catch (QueryException $e) {
            // Tangkap potensi duplicate key booking_schedule_seat_unique dari database
            return back()->with('error', 'Kursi nomor '.$seatNumber.' sudah tidak tersedia. Silakan pilih kursi lain.');
        }

        return redirect()
            ->route('member.pembayaran', ['booking' => $booking->code])
            ->with('status', 'Pemesanan tiket berhasil dibuat! Silakan selesaikan pembayaran sebelum batas waktu.');
    }
}
