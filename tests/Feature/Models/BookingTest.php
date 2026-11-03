<?php

use App\Enums\BookingStatus;
use App\Models\Booking;
use App\Models\Schedule;
use Illuminate\Database\UniqueConstraintViolationException;
use Illuminate\Foundation\Testing\RefreshDatabase;

uses(RefreshDatabase::class);

it(
    'rejects a second booking for the same seat on the same schedule',
    function () {
        $schedule = Schedule::factory()->create();
        Booking::factory()
            ->for($schedule)
            ->create(['seat_number' => 3]);

        Booking::factory()
            ->for($schedule)
            ->create(['seat_number' => 3]);
    },
)->throws(UniqueConstraintViolationException::class);

it('allows the same seat number on a different schedule', function () {
    $seatNumber = 3;
    Booking::factory()->create(['seat_number' => $seatNumber]);

    $booking = Booking::factory()->create(['seat_number' => $seatNumber]);

    expect($booking->exists)->toBeTrue();
});

it('rejects a duplicate booking code', function () {
    Booking::factory()->create(['code' => 'LLABCD1234']);

    Booking::factory()->create(['code' => 'LLABCD1234']);
})->throws(UniqueConstraintViolationException::class);

it('guards status, price_snapshot, code, and expires_at against mass assignment', function () {
    $booking = new Booking([
        'schedule_id' => 1,
        'user_id' => 1,
        'seat_number' => 3,
        'code' => 'LLCUSTOM12',
        'price_snapshot' => 1000,
        'status' => BookingStatus::Paid,
        'expires_at' => now()->addDays(10),
    ]);

    expect($booking->schedule_id)->toBe(1)
        ->and($booking->user_id)->toBe(1)
        ->and($booking->seat_number)->toBe(3)
        ->and($booking->code)->toBeNull()
        ->and($booking->price_snapshot)->toBeNull()
        ->and($booking->status)->toBeNull()
        ->and($booking->expires_at)->toBeNull();
});
