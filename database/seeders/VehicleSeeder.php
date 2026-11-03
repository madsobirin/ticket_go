<?php

namespace Database\Seeders;

use App\Models\Vehicle;
use Illuminate\Database\Seeder;

class VehicleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $vehicles = [
            [
                'type' => 'Toyota Avanza',
                'plate_number' => 'BE 1212 AT',
                'color' => 'Hitam',
            ],
            [
                'type' => 'Daihatsu Xenia',
                'plate_number' => 'BE 4677 DT',
                'color' => 'Biru',
            ],
        ];

        foreach ($vehicles as $vehicle) {
            Vehicle::updateOrCreate(
                ['plate_number' => $vehicle['plate_number']],
                $vehicle + ['seat_capacity' => 5],
            );
        }
    }
}
