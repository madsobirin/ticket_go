<?php

namespace Database\Factories;

use App\Models\Vehicle;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Vehicle>
 */
class VehicleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'type' => fake()->randomElement([
                'Toyota Avanza',
                'Daihatsu Xenia',
            ]),
            'plate_number' => 'BE '.
                fake()->unique()->numerify('####').
                ' '.
                fake()->lexify('??'),
            'color' => fake()->randomElement([
                'Hitam',
                'Biru',
                'Putih',
                'Silver',
            ]),
            'seat_capacity' => 5,
        ];
    }
}
