<?php

namespace App\Models;

use Database\Factories\CityFactory;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

#[Fillable(['name'])]
class City extends Model
{
    /** @use HasFactory<CityFactory> */
    use HasFactory;

    /**
     * Rute yang berangkat dari kota ini.
     *
     * @return HasMany<Route, $this>
     */
    public function originRoutes(): HasMany
    {
        return $this->hasMany(Route::class, 'origin_city_id');
    }

    /**
     * Rute yang menuju kota ini.
     *
     * @return HasMany<Route, $this>
     */
    public function destinationRoutes(): HasMany
    {
        return $this->hasMany(Route::class, 'destination_city_id');
    }
}
