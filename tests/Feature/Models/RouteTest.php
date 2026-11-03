<?php

use App\Models\City;
use App\Models\Route;
use Illuminate\Database\UniqueConstraintViolationException;
use Illuminate\Foundation\Testing\RefreshDatabase;

uses(RefreshDatabase::class);

it(
    'rejects a route whose origin and destination are the same city',
    function () {
        $city = City::factory()->create();

        Route::factory()->create([
            'origin_city_id' => $city->id,
            'destination_city_id' => $city->id,
        ]);
    },
)->throws(
    InvalidArgumentException::class,
    'Kota asal dan kota tujuan tidak boleh sama.',
);

it('rejects a duplicate origin and destination pair', function () {
    $route = Route::factory()->create();

    Route::factory()->create([
        'origin_city_id' => $route->origin_city_id,
        'destination_city_id' => $route->destination_city_id,
    ]);
})->throws(UniqueConstraintViolationException::class);

it(
    'resolves origin and destination cities from their own foreign keys',
    function () {
        $origin = City::factory()->create();
        $destination = City::factory()->create();

        $route = Route::factory()->create([
            'origin_city_id' => $origin->id,
            'destination_city_id' => $destination->id,
        ]);

        expect($route->origin->is($origin))
            ->toBeTrue()
            ->and($route->destination->is($destination))
            ->toBeTrue()
            ->and($origin->originRoutes->first()->is($route))
            ->toBeTrue()
            ->and($destination->destinationRoutes->first()->is($route))
            ->toBeTrue();
    },
);
