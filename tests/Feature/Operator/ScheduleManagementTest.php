<?php

use App\Enums\ScheduleStatus;
use App\Models\Booking;
use App\Models\Route;
use App\Models\Schedule;
use App\Models\User;
use App\Models\Vehicle;
use Illuminate\Foundation\Testing\RefreshDatabase;

uses(RefreshDatabase::class);

test('operator can view schedules list with seats left', function () {
    $operator = User::factory()->operator()->create();
    $schedule = Schedule::factory()->create();

    $response = $this->actingAs($operator)->get(route('operator.schedules.index'));

    $response->assertOk();
    $response->assertSee($schedule->route->origin->name);
    $response->assertSee($schedule->vehicle->plate_number);
});

test('operator can create a new schedule', function () {
    $operator = User::factory()->operator()->create();
    $route = Route::factory()->create();
    $vehicle = Vehicle::factory()->create();

    $departureAt = now()->addDays(2)->format('Y-m-d\TH:i');

    $response = $this->actingAs($operator)->post(route('operator.schedules.store'), [
        'route_id' => $route->id,
        'vehicle_id' => $vehicle->id,
        'price' => 60000,
        'departure_at' => $departureAt,
        'status' => 'open',
    ]);

    $response->assertRedirect(route('operator.schedules.index'));
    $this->assertDatabaseHas('schedules', [
        'route_id' => $route->id,
        'vehicle_id' => $vehicle->id,
        'price' => 60000,
        'status' => ScheduleStatus::Open,
    ]);
});

test('operator can update an existing schedule', function () {
    $operator = User::factory()->operator()->create();
    $schedule = Schedule::factory()->create([
        'price' => 50000,
        'status' => ScheduleStatus::Open,
    ]);

    $response = $this->actingAs($operator)->put(route('operator.schedules.update', $schedule), [
        'route_id' => $schedule->route_id,
        'vehicle_id' => $schedule->vehicle_id,
        'price' => 70000,
        'departure_at' => $schedule->departure_at->format('Y-m-d\TH:i'),
        'status' => 'closed',
    ]);

    $response->assertRedirect(route('operator.schedules.index'));
    expect($schedule->fresh()->price)->toBe(70000)
        ->and($schedule->fresh()->status)->toBe(ScheduleStatus::Closed);
});

test('operator cannot delete schedule with bookings', function () {
    $operator = User::factory()->operator()->create();
    $booking = Booking::factory()->create();

    $response = $this->actingAs($operator)->delete(route('operator.schedules.destroy', $booking->schedule));

    $response->assertSessionHas('error');
    $this->assertDatabaseHas('schedules', ['id' => $booking->schedule_id]);
});

test('operator can delete schedule without bookings', function () {
    $operator = User::factory()->operator()->create();
    $schedule = Schedule::factory()->create();

    $response = $this->actingAs($operator)->delete(route('operator.schedules.destroy', $schedule));

    $response->assertRedirect(route('operator.schedules.index'));
    $this->assertDatabaseMissing('schedules', ['id' => $schedule->id]);
});
