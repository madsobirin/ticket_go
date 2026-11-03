<?php

use App\Enums\ScheduleStatus;
use App\Models\Booking;
use App\Models\Schedule;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\DB;

uses(RefreshDatabase::class);

function scheduleWithOneBookingPerStatus(): Schedule
{
    $schedule = Schedule::factory()->create();

    Booking::factory()
        ->for($schedule)
        ->paid()
        ->create(['seat_number' => 1]);
    Booking::factory()
        ->for($schedule)
        ->unpaid()
        ->create(['seat_number' => 2]);
    Booking::factory()
        ->for($schedule)
        ->expired()
        ->create(['seat_number' => 3]);
    Booking::factory()
        ->for($schedule)
        ->cancelled()
        ->create(['seat_number' => 4]);

    return $schedule;
}

it(
    'counts only seat-holding bookings against the vehicle capacity',
    function () {
        $schedule = scheduleWithOneBookingPerStatus();

        expect($schedule->seatsLeft())->toBe(3);
    },
);

it(
    'reuses a preloaded booking count instead of querying per schedule',
    function () {
        $schedule = scheduleWithOneBookingPerStatus();
        $loaded = Schedule::withActiveBookingsCount()
            ->findOrFail($schedule->id);

        DB::enableQueryLog();

        expect($loaded->seatsLeft())
            ->toBe(3)
            ->and(DB::getQueryLog())
            ->toBeEmpty();
    },
);

it('lists only open schedules that depart in the future', function () {
    $upcomingOpen = Schedule::factory()->create();
    Schedule::factory()->closed()->create();
    Schedule::factory()
        ->past()
        ->create(['status' => ScheduleStatus::Open]);

    $schedules = Schedule::open()->upcoming()->get();

    expect($schedules)
        ->toHaveCount(1)
        ->and($schedules->first()->is($upcomingOpen))
        ->toBeTrue();
});
