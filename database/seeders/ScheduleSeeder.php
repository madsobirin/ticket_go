<?php

namespace Database\Seeders;

use App\Enums\ScheduleStatus;
use App\Models\Route;
use App\Models\Schedule;
use App\Models\Vehicle;
use Illuminate\Database\Seeder;

class ScheduleSeeder extends Seeder
{
    /**
     * Jam keberangkatan harian; tiap kendaraan berangkat sekali per jam.
     *
     * @var list<int>
     */
    private const DEPARTURE_HOURS = [7, 12, 17];

    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $routes = Route::orderBy('id')->get();
        $vehicles = Vehicle::orderBy('id')->get();
        $index = 0;

        foreach (range(1, 14) as $dayOffset) {
            foreach (self::DEPARTURE_HOURS as $hour) {
                foreach ($vehicles as $vehicle) {
                    $route = $routes[$index % $routes->count()];

                    Schedule::create([
                        'route_id' => $route->id,
                        'vehicle_id' => $vehicle->id,
                        'price' => $route->base_price,
                        'departure_at' => now()
                            ->addDays($dayOffset)
                            ->setTime($hour, 0),
                        'status' => ScheduleStatus::Open,
                    ]);

                    $index++;
                }
            }
        }
    }
}
