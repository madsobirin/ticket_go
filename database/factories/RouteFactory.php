<?php

namespace Database\Factories;

use App\Models\City;
use App\Models\Route;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Route>
 */
class RouteFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'origin_city_id' => City::factory(),
            'destination_city_id' => City::factory(),
            'base_price' => fake()->numberBetween(40, 80) * 1000,
        ];
    }
}
