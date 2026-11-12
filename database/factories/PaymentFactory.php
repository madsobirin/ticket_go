<?php

namespace Database\Factories;

use App\Enums\PaymentStatus;
use App\Models\Booking;
use App\Models\Payment;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Payment>
 */
class PaymentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            "booking_id" => Booking::factory()->pendingVerification(),
            "receipt_no" => "TRF" . fake()->unique()->numerify("##########"),
            "account_no" => fake()->numerify("############"),
            "proof_path" => "payments/proofs/" . fake()->uuid() . ".jpg",
            "transferred_at" => fake()->dateTimeBetween("-1 day", "now"),
            "status" => PaymentStatus::Pending,
            "verified_by" => null,
            "verified_at" => null,
        ];
    }

    public function approved(): static
    {
        return $this->state(
            fn(array $attributes) => [
                "status" => PaymentStatus::Approved,
                "verified_by" => User::factory()->operator(),
                "verified_at" => now(),
            ],
        );
    }

    public function rejected(): static
    {
        return $this->state(
            fn(array $attributes) => [
                "status" => PaymentStatus::Rejected,
                "verified_by" => User::factory()->operator(),
                "verified_at" => now(),
            ],
        );
    }
}
