<?php

namespace Database\Factories;

use App\Enums\ScheduleStatus;
use App\Models\Route;
use App\Models\Schedule;
use App\Models\Vehicle;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Schedule>
 */
class ScheduleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'route_id' => Route::factory(),
            'vehicle_id' => Vehicle::factory(),
            'price' => fake()->numberBetween(40, 80) * 1000,
            'departure_at' => fake()->dateTimeBetween('+1 day', '+14 days'),
            'status' => ScheduleStatus::Open,
        ];
    }

    public function past(): static
    {
        return $this->state(
            fn (array $attributes) => [
                'departure_at' => fake()->dateTimeBetween('-14 days', '-1 day'),
                'status' => ScheduleStatus::Done,
            ],
        );
    }

    public function closed(): static
    {
        return $this->state(
            fn (array $attributes) => ['status' => ScheduleStatus::Closed],
        );
    }

    public function cancelled(): static
    {
        return $this->state(
            fn (array $attributes) => ['status' => ScheduleStatus::Cancelled],
        );
    }
}
