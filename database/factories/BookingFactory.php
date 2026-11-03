<?php

namespace Database\Factories;

use App\Enums\BookingStatus;
use App\Models\Booking;
use App\Models\Schedule;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends Factory<Booking>
 */
class BookingFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'code' => 'LL'.Str::upper(Str::random(8)),
            'schedule_id' => Schedule::factory(),
            'user_id' => User::factory(),
            'seat_number' => fake()->numberBetween(1, 5),
            'price_snapshot' => fake()->numberBetween(40, 80) * 1000,
            'status' => BookingStatus::Unpaid,
            'expires_at' => now()->addHours(2),
        ];
    }

    public function unpaid(): static
    {
        return $this->state(
            fn (array $attributes) => ['status' => BookingStatus::Unpaid],
        );
    }

    public function pendingVerification(): static
    {
        return $this->state(
            fn (array $attributes) => [
                'status' => BookingStatus::PendingVerification,
            ],
        );
    }

    public function paid(): static
    {
        return $this->state(
            fn (array $attributes) => ['status' => BookingStatus::Paid],
        );
    }

    public function expired(): static
    {
        return $this->state(
            fn (array $attributes) => [
                'status' => BookingStatus::Expired,
                'expires_at' => now()->subHour(),
            ],
        );
    }

    public function cancelled(): static
    {
        return $this->state(
            fn (array $attributes) => ['status' => BookingStatus::Cancelled],
        );
    }
}
