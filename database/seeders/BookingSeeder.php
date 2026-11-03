<?php

namespace Database\Seeders;

use App\Enums\BookingStatus;
use App\Enums\UserRole;
use App\Models\Booking;
use App\Models\Payment;
use App\Models\Schedule;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class BookingSeeder extends Seeder
{
    /**
     * Satu booking contoh untuk tiap status, tersebar di jadwal terdekat.
     * Booking expired/cancelled sengaja berada di jadwal berbeda agar kursinya tidak bentrok.
     */
    public function run(): void
    {
        $member = User::where('email', 'member@lintas.test')->firstOrFail();
        $operator = User::where('email', 'operator@lintas.test')->firstOrFail();

        $otherMembers = User::where('role', UserRole::Member)
            ->where('id', '!=', $member->id)
            ->orderBy('id')
            ->limit(3)
            ->get();

        $schedules = Schedule::orderBy('id')->limit(4)->get();

        $paid = $this->book($schedules[0], 1, $member, BookingStatus::Paid);
        $pending = $this->book(
            $schedules[0],
            2,
            $otherMembers[0],
            BookingStatus::PendingVerification,
        );
        $this->book($schedules[1], 3, $member, BookingStatus::Unpaid);
        $this->book($schedules[2], 1, $otherMembers[1], BookingStatus::Expired);
        $this->book(
            $schedules[3],
            4,
            $otherMembers[2],
            BookingStatus::Cancelled,
        );

        Payment::factory()
            ->approved()
            ->create([
                'booking_id' => $paid->id,
                'verified_by' => $operator->id,
            ]);

        Payment::factory()->create(['booking_id' => $pending->id]);
    }

    private function book(
        Schedule $schedule,
        int $seatNumber,
        User $user,
        BookingStatus $status,
    ): Booking {
        return Booking::create([
            'code' => 'LL'.Str::upper(Str::random(8)),
            'schedule_id' => $schedule->id,
            'user_id' => $user->id,
            'seat_number' => $seatNumber,
            'price_snapshot' => $schedule->price,
            'status' => $status,
            'expires_at' => $status === BookingStatus::Expired
                    ? now()->subHour()
                    : now()->addHours(2),
        ]);
    }
}
