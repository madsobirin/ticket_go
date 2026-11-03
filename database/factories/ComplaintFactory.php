<?php

namespace Database\Factories;

use App\Enums\ComplaintStatus;
use App\Models\Complaint;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Complaint>
 */
class ComplaintFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => User::factory(),
            'category' => fake()->randomElement([
                'layanan',
                'keterlambatan',
                'kendaraan',
                'pembayaran',
            ]),
            'description' => fake()->randomElement([
                'Mobil berangkat lebih dari 30 menit dari jadwal yang tertera.',
                'Pembayaran sudah ditransfer tetapi status tiket belum berubah.',
                'Kondisi pendingin udara di dalam mobil kurang dingin.',
                'Titik penjemputan tidak sesuai dengan alamat yang diberikan.',
            ]),
            'status' => ComplaintStatus::Open,
            'reply' => null,
        ];
    }

    public function inProgress(): static
    {
        return $this->state(
            fn (array $attributes) => ['status' => ComplaintStatus::InProgress],
        );
    }

    public function resolved(): static
    {
        return $this->state(
            fn (array $attributes) => [
                'status' => ComplaintStatus::Resolved,
                'reply' => 'Terima kasih atas masukan Anda. Keluhan telah kami tindak lanjuti.',
            ],
        );
    }
}
