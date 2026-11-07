<?php

use App\Models\City;
use App\Models\Route;
use App\Models\Schedule;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;

uses(RefreshDatabase::class);

test('operator can view routes list with origin and destination', function () {
    $operator = User::factory()->operator()->create();
    $route = Route::factory()->create();

    $response = $this->actingAs($operator)->get(route('operator.routes.index'));

    $response->assertOk();
    $response->assertSee($route->origin->name);
    $response->assertSee($route->destination->name);
});

test('operator can create a valid route', function () {
    $operator = User::factory()->operator()->create();
    $origin = City::factory()->create(['name' => 'Bandar Lampung']);
    $destination = City::factory()->create(['name' => 'Liwa']);

    $response = $this->actingAs($operator)->post(route('operator.routes.store'), [
        'origin_city_id' => $origin->id,
        'destination_city_id' => $destination->id,
        'base_price' => 75000,
    ]);

    $response->assertRedirect(route('operator.routes.index'));
    $this->assertDatabaseHas('routes', [
        'origin_city_id' => $origin->id,
        'destination_city_id' => $destination->id,
        'base_price' => 75000,
    ]);
});

test('operator cannot create route where origin and destination are the same', function () {
    $operator = User::factory()->operator()->create();
    $city = City::factory()->create();

    $response = $this->actingAs($operator)->from(route('operator.routes.create'))->post(route('operator.routes.store'), [
        'origin_city_id' => $city->id,
        'destination_city_id' => $city->id,
        'base_price' => 50000,
    ]);

    $response->assertRedirect(route('operator.routes.create'));
    $response->assertSessionHasErrors(['origin_city_id', 'destination_city_id']);
});

test('operator cannot create duplicate route pair', function () {
    $operator = User::factory()->operator()->create();
    $existing = Route::factory()->create();

    $response = $this->actingAs($operator)->from(route('operator.routes.create'))->post(route('operator.routes.store'), [
        'origin_city_id' => $existing->origin_city_id,
        'destination_city_id' => $existing->destination_city_id,
        'base_price' => 60000,
    ]);

    $response->assertRedirect(route('operator.routes.create'));
    $response->assertSessionHasErrors(['destination_city_id']);
});

test('operator can update route base price', function () {
    $operator = User::factory()->operator()->create();
    $route = Route::factory()->create(['base_price' => 50000]);

    $response = $this->actingAs($operator)->put(route('operator.routes.update', $route), [
        'origin_city_id' => $route->origin_city_id,
        'destination_city_id' => $route->destination_city_id,
        'base_price' => 65000,
    ]);

    $response->assertRedirect(route('operator.routes.index'));
    expect($route->fresh()->base_price)->toBe(65000);
});

test('operator cannot delete route with schedules', function () {
    $operator = User::factory()->operator()->create();
    $schedule = Schedule::factory()->create();

    $response = $this->actingAs($operator)->delete(route('operator.routes.destroy', $schedule->route));

    $response->assertSessionHas('error');
    $this->assertDatabaseHas('routes', ['id' => $schedule->route_id]);
});

test('operator can delete route without schedules', function () {
    $operator = User::factory()->operator()->create();
    $route = Route::factory()->create();

    $response = $this->actingAs($operator)->delete(route('operator.routes.destroy', $route));

    $response->assertRedirect(route('operator.routes.index'));
    $this->assertDatabaseMissing('routes', ['id' => $route->id]);
});
