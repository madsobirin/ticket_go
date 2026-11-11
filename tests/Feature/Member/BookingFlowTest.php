<?php

use App\Enums\BookingStatus;
use App\Enums\ScheduleStatus;
use App\Models\Booking;
use App\Models\City;
use App\Models\Route;
use App\Models\Schedule;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;

uses(RefreshDatabase::class);

test('member can search schedules with city filter', function () {
    $member = User::factory()->member()->create();
    $origin = City::factory()->create(['name' => 'Bandar Lampung']);
    $destination = City::factory()->create(['name' => 'Metro']);
    $route = Route::factory()->create([
        'origin_city_id' => $origin->id,
        'destination_city_id' => $destination->id,
    ]);

    $schedule = Schedule::factory()->create([
        'route_id' => $route->id,
        'status' => ScheduleStatus::Open,
        'departure_at' => now()->addDays(2),
    ]);

    $response = $this->actingAs($member)->get(route('member.cari-jadwal', [
        'kota_asal' => 'Bandar Lampung',
        'kota_tujuan' => 'Metro',
    ]));

    $response->assertOk();
    $response->assertSee('Bandar Lampung');
    $response->assertSee('Metro');
    $response->assertSee(number_format($schedule->price, 0, ',', '.'));
});

test('member can open seat picker page for an open schedule', function () {
    $member = User::factory()->member()->create();
    $schedule = Schedule::factory()->create([
        'status' => ScheduleStatus::Open,
        'departure_at' => now()->addDays(1),
    ]);

    // Kursi 2 sudah terisi
    Booking::factory()->create([
        'schedule_id' => $schedule->id,
        'seat_number' => 2,
        'status' => BookingStatus::Unpaid,
    ]);

    $response = $this->actingAs($member)->get(route('member.pilih-kursi', $schedule));

    $response->assertOk();
    $response->assertViewHas('occupiedSeats', [2]);
});

test('member cannot open seat picker for a past or closed schedule', function () {
    $member = User::factory()->member()->create();
    $closedSchedule = Schedule::factory()->create([
        'status' => ScheduleStatus::Closed,
        'departure_at' => now()->addDays(1),
    ]);

    $response = $this->actingAs($member)->get(route('member.pilih-kursi', $closedSchedule));
    $response->assertRedirect(route('member.cari-jadwal'));
});

test('member can successfully book an available seat', function () {
    $member = User::factory()->member()->create();
    $schedule = Schedule::factory()->create([
        'status' => ScheduleStatus::Open,
        'price' => 75000,
        'departure_at' => now()->addDays(1),
    ]);

    $response = $this->actingAs($member)->post(route('member.booking.store'), [
        'schedule_id' => $schedule->id,
        'seat_number' => 1,
    ]);

    $response->assertRedirect();

    $booking = Booking::where('schedule_id', $schedule->id)
        ->where('seat_number', 1)
        ->first();

    expect($booking)->not->toBeNull()
        ->and($booking->user_id)->toBe($member->id)
        ->and($booking->status)->toBe(BookingStatus::Unpaid)
        ->and($booking->price_snapshot)->toBe(75000)
        ->and($booking->code)->toStartWith('LL')
        ->and($booking->expires_at->isFuture())->toBeTrue();
});

test('booking rejects duplicate seat selection on the same schedule', function () {
    $member1 = User::factory()->member()->create();
    $member2 = User::factory()->member()->create();
    $schedule = Schedule::factory()->create([
        'status' => ScheduleStatus::Open,
        'departure_at' => now()->addDays(1),
    ]);

    // Member 1 memesan kursi 3
    Booking::factory()->create([
        'schedule_id' => $schedule->id,
        'user_id' => $member1->id,
        'seat_number' => 3,
        'status' => BookingStatus::Unpaid,
    ]);

    // Member 2 mencoba memesan kursi 3 yang sama
    $response = $this->actingAs($member2)
        ->from(route('member.pilih-kursi', $schedule))
        ->post(route('member.booking.store'), [
            'schedule_id' => $schedule->id,
            'seat_number' => 3,
        ]);

    $response->assertRedirect(route('member.pilih-kursi', $schedule));
    $response->assertSessionHas('error');

    // Pastikan tidak ada duplikasi data di DB
    expect(Booking::where('schedule_id', $schedule->id)->where('seat_number', 3)->count())->toBe(1);
});

test('expire bookings command marks expired unpaid bookings correctly', function () {
    $expiredBooking = Booking::factory()->create([
        'status' => BookingStatus::Unpaid,
        'expires_at' => now()->subMinutes(10),
    ]);

    $validBooking = Booking::factory()->create([
        'status' => BookingStatus::Unpaid,
        'expires_at' => now()->addHour(),
    ]);

    $this->artisan('bookings:expire')
        ->assertSuccessful();

    expect($expiredBooking->fresh()->status)->toBe(BookingStatus::Expired)
        ->and($validBooking->fresh()->status)->toBe(BookingStatus::Unpaid);
});
