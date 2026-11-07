<?php

use App\Models\Schedule;
use App\Models\User;
use App\Models\Vehicle;
use Illuminate\Foundation\Testing\RefreshDatabase;

uses(RefreshDatabase::class);

test('operator can view vehicles list', function () {
    $operator = User::factory()->operator()->create();
    $vehicle = Vehicle::factory()->create();

    $response = $this->actingAs($operator)->get(route('operator.vehicles.index'));

    $response->assertOk();
    $response->assertSee($vehicle->plate_number);
});

test('operator can register a new vehicle', function () {
    $operator = User::factory()->operator()->create();

    $response = $this->actingAs($operator)->post(route('operator.vehicles.store'), [
        'type' => 'Toyota HiAce',
        'plate_number' => 'BE 7777 XX',
        'color' => 'Putih',
        'seat_capacity' => 10,
    ]);

    $response->assertRedirect(route('operator.vehicles.index'));
    $this->assertDatabaseHas('vehicles', [
        'plate_number' => 'BE 7777 XX',
        'type' => 'Toyota HiAce',
        'seat_capacity' => 10,
    ]);
});

test('operator cannot register duplicate plate number', function () {
    $operator = User::factory()->operator()->create();
    Vehicle::factory()->create(['plate_number' => 'BE 1234 AB']);

    $response = $this->actingAs($operator)->from(route('operator.vehicles.create'))->post(route('operator.vehicles.store'), [
        'type' => 'Daihatsu Xenia',
        'plate_number' => 'BE 1234 AB',
        'seat_capacity' => 5,
    ]);

    $response->assertRedirect(route('operator.vehicles.create'));
    $response->assertSessionHasErrors(['plate_number']);
});

test('operator can update vehicle details', function () {
    $operator = User::factory()->operator()->create();
    $vehicle = Vehicle::factory()->create(['color' => 'Hitam']);

    $response = $this->actingAs($operator)->put(route('operator.vehicles.update', $vehicle), [
        'type' => $vehicle->type,
        'plate_number' => $vehicle->plate_number,
        'color' => 'Silver Metalik',
        'seat_capacity' => 5,
    ]);

    $response->assertRedirect(route('operator.vehicles.index'));
    expect($vehicle->fresh()->color)->toBe('Silver Metalik');
});

test('operator cannot delete vehicle with schedules', function () {
    $operator = User::factory()->operator()->create();
    $schedule = Schedule::factory()->create();

    $response = $this->actingAs($operator)->delete(route('operator.vehicles.destroy', $schedule->vehicle));

    $response->assertSessionHas('error');
    $this->assertDatabaseHas('vehicles', ['id' => $schedule->vehicle_id]);
});

test('operator can delete vehicle without schedules', function () {
    $operator = User::factory()->operator()->create();
    $vehicle = Vehicle::factory()->create();

    $response = $this->actingAs($operator)->delete(route('operator.vehicles.destroy', $vehicle));

    $response->assertRedirect(route('operator.vehicles.index'));
    $this->assertDatabaseMissing('vehicles', ['id' => $vehicle->id]);
});
