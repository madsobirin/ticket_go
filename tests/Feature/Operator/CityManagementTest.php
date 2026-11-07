<?php

use App\Models\City;
use App\Models\Route;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;

uses(RefreshDatabase::class);

test('operator and admin can view cities list', function () {
    $operator = User::factory()->operator()->create();
    City::factory()->count(3)->create();

    $response = $this->actingAs($operator)->get(route('operator.cities.index'));

    $response->assertOk();
    $response->assertViewHas('cities');
});

test('member cannot access city management', function () {
    $member = User::factory()->member()->create();

    $response = $this->actingAs($member)->get(route('operator.cities.index'));

    $response->assertForbidden();
});

test('operator can create a new city', function () {
    $operator = User::factory()->operator()->create();

    $response = $this->actingAs($operator)->post(route('operator.cities.store'), [
        'name' => 'Tulang Bawang Barat',
    ]);

    $response->assertRedirect(route('operator.cities.index'));
    $this->assertDatabaseHas('cities', [
        'name' => 'Tulang Bawang Barat',
    ]);
});

test('operator cannot create duplicate city', function () {
    $operator = User::factory()->operator()->create();
    City::factory()->create(['name' => 'Kotabumi']);

    $response = $this->actingAs($operator)->from(route('operator.cities.create'))->post(route('operator.cities.store'), [
        'name' => 'Kotabumi',
    ]);

    $response->assertRedirect(route('operator.cities.create'));
    $response->assertSessionHasErrors(['name']);
});

test('operator can update an existing city', function () {
    $operator = User::factory()->operator()->create();
    $city = City::factory()->create(['name' => 'Metro Lama']);

    $response = $this->actingAs($operator)->put(route('operator.cities.update', $city), [
        'name' => 'Kota Metro',
    ]);

    $response->assertRedirect(route('operator.cities.index'));
    expect($city->fresh()->name)->toBe('Kota Metro');
});

test('operator cannot delete city linked to routes', function () {
    $operator = User::factory()->operator()->create();
    $route = Route::factory()->create();

    $response = $this->actingAs($operator)->delete(route('operator.cities.destroy', $route->origin));

    $response->assertSessionHas('error');
    $this->assertDatabaseHas('cities', ['id' => $route->origin_city_id]);
});

test('operator can delete unlinked city', function () {
    $operator = User::factory()->operator()->create();
    $city = City::factory()->create();

    $response = $this->actingAs($operator)->delete(route('operator.cities.destroy', $city));

    $response->assertRedirect(route('operator.cities.index'));
    $this->assertDatabaseMissing('cities', ['id' => $city->id]);
});
