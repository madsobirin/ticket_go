<?php

namespace Database\Seeders;

use App\Models\City;
use App\Models\Route;
use Illuminate\Database\Seeder;

class RouteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $origin = City::where('name', 'Bandar Lampung')->firstOrFail();

        $destinations = [
            'Pringsewu' => 40000,
            'Metro' => 45000,
            'Kalianda' => 50000,
            'Lampung Timur' => 55000,
            'Kota Agung' => 60000,
            'Kotabumi' => 65000,
            'Liwa' => 80000,
            'Krui' => 80000,
        ];

        foreach ($destinations as $name => $basePrice) {
            $destination = City::where('name', $name)->firstOrFail();

            Route::updateOrCreate(
                [
                    'origin_city_id' => $origin->id,
                    'destination_city_id' => $destination->id,
                ],
                ['base_price' => $basePrice],
            );
        }
    }
}
