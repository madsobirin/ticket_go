<?php

namespace App\Models;

use App\Enums\ScheduleStatus;
use Database\Factories\ScheduleFactory;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

#[Fillable(['route_id', 'vehicle_id', 'price', 'departure_at', 'status'])]
class Schedule extends Model
{
    /** @use HasFactory<ScheduleFactory> */
    use HasFactory;

    /**
     * @return array<string, mixed>
     */
    protected function casts(): array
    {
        return [
            'price' => 'integer',
            'departure_at' => 'datetime',
            'status' => ScheduleStatus::class,
        ];
    }

    /**
     * @return BelongsTo<Route, $this>
     */
    public function route(): BelongsTo
    {
        return $this->belongsTo(Route::class);
    }

    /**
     * @return BelongsTo<Vehicle, $this>
     */
    public function vehicle(): BelongsTo
    {
        return $this->belongsTo(Vehicle::class);
    }

    /**
     * @return HasMany<Booking, $this>
     */
    public function bookings(): HasMany
    {
        return $this->hasMany(Booking::class);
    }

    /**
     * @param  Builder<Schedule>  $query
     */
    public function scopeOpen(Builder $query): void
    {
        $query->where('status', ScheduleStatus::Open);
    }

    /**
     * @param  Builder<Schedule>  $query
     */
    public function scopeUpcoming(Builder $query): void
    {
        $query->where('departure_at', '>', now());
    }

    /**
     * Hitung kursi terpakai sekali untuk banyak jadwal (hindari N+1 pada daftar jadwal).
     *
     * @param  Builder<Schedule>  $query
     */
    public function scopeWithActiveBookingsCount(Builder $query): void
    {
        $query->with('vehicle')->withCount([
            'bookings as active_bookings_count' => fn (
                Builder $bookings,
            ) => $bookings->active(),
        ]);
    }

    /**
     * Sisa kursi = kapasitas kendaraan dikurangi booking yang masih menahan kursi.
     */
    public function seatsLeft(): int
    {
        $taken = array_key_exists(
            'active_bookings_count',
            $this->getAttributes(),
        )
            ? (int) $this->getAttributes()['active_bookings_count']
            : $this->bookings()->active()->count();

        return max(0, $this->vehicle->seat_capacity - $taken);
    }
}
