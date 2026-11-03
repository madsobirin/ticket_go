<?php

namespace Database\Seeders;

use App\Models\City;
use Illuminate\Database\Seeder;

class CitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $cities = [
            'Bandar Lampung',
            'Metro',
            'Lampung Tengah',
            'Lampung Timur',
            'Lampung Selatan',
            'Tanggamus',
            'Pringsewu',
            'Pesawaran',
            'Lampung Barat',
            'Lampung Utara',
            'Mesuji',
            'Tulang Bawang',
            'Way Kanan',
            'Kotabumi',
            'Kalianda',
            'Liwa',
            'Krui',
            'Kota Agung',
        ];

        foreach ($cities as $name) {
            City::firstOrCreate(['name' => $name]);
        }
    }
}
