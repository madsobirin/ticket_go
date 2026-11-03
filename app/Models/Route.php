<?php

namespace App\Models;

use Database\Factories\RouteFactory;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use InvalidArgumentException;

#[Fillable(['origin_city_id', 'destination_city_id', 'base_price'])]
class Route extends Model
{
    /** @use HasFactory<RouteFactory> */
    use HasFactory;

    /**
     * Pastikan kota asal dan tujuan berbeda (CHECK database tidak tersedia di SQLite).
     */
    protected static function booted(): void
    {
        static::saving(function (Route $route): void {
            if (
                $route->origin_city_id !== null &&
                (int) $route->origin_city_id ===
                    (int) $route->destination_city_id
            ) {
                throw new InvalidArgumentException(
                    'Kota asal dan kota tujuan tidak boleh sama.',
                );
            }
        });
    }

    /**
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'base_price' => 'integer',
        ];
    }

    /**
     * @return BelongsTo<City, $this>
     */
    public function origin(): BelongsTo
    {
        return $this->belongsTo(City::class, 'origin_city_id');
    }

    /**
     * @return BelongsTo<City, $this>
     */
    public function destination(): BelongsTo
    {
        return $this->belongsTo(City::class, 'destination_city_id');
    }

    /**
     * @return HasMany<Schedule, $this>
     */
    public function schedules(): HasMany
    {
        return $this->hasMany(Schedule::class);
    }
}
