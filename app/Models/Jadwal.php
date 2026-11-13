<?php

namespace App\Models;

use App\Enums\ScheduleStatus;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Jadwal extends Model
{
    protected $table = 'jadwal';

    protected $primaryKey = 'id_jadwal';

    public $timestamps = false;

    protected $fillable = [
        'id_kota_asal',
        'id_kota_tujuan',
        'harga',
        'tgl_berangkat',
        'jam_berangkat',
        'id_mobil',
    ];

    protected function casts(): array
    {
        return [
            'harga' => 'integer',
            'tgl_berangkat' => 'date',
        ];
    }

    public function getIdAttribute(): int
    {
        return (int) $this->id_jadwal;
    }

    public function getPriceAttribute(): int
    {
        return (int) $this->harga;
    }

    public function getVehicleIdAttribute(): int
    {
        return (int) $this->id_mobil;
    }

    public function getRouteIdAttribute(): int
    {
        return ((int) $this->id_kota_asal * 1000) + (int) $this->id_kota_tujuan;
    }

    public function getDepartureAtAttribute(): Carbon
    {
        $date = $this->tgl_berangkat instanceof Carbon
            ? $this->tgl_berangkat->format('Y-m-d')
            : (string) ($this->tgl_berangkat ?? date('Y-m-d'));
        $time = (string) ($this->jam_berangkat ?? '08:00:00');

        return Carbon::parse(trim("$date $time"));
    }

    public function getVehicleAttribute(): ?Kendaraan
    {
        return $this->kendaraan;
    }

    public function getRouteAttribute(): object
    {
        return (object) [
            'id' => $this->route_id,
            'origin' => (object) [
                'id' => $this->kotaAsal?->id_kota_asal ?? $this->id_kota_asal,
                'name' => $this->kotaAsal?->nm_kota_asal ?? 'Bandar Lampung',
            ],
            'destination' => (object) [
                'id' => $this->kotaTujuan?->id_kota_tujuan ?? $this->id_kota_tujuan,
                'name' => $this->kotaTujuan?->nm_kota_tujuan ?? 'Krui (Pesisir Barat)',
            ],
            'base_price' => $this->harga,
        ];
    }

    public function getStatusAttribute(): ScheduleStatus
    {
        if ($this->seatsLeft() <= 0) {
            return ScheduleStatus::Closed;
        }

        return ScheduleStatus::Open;
    }

    public function kotaAsal(): BelongsTo
    {
        return $this->belongsTo(KotaAsal::class, 'id_kota_asal', 'id_kota_asal');
    }

    public function kotaTujuan(): BelongsTo
    {
        return $this->belongsTo(KotaTujuan::class, 'id_kota_tujuan', 'id_kota_tujuan');
    }

    public function kendaraan(): BelongsTo
    {
        return $this->belongsTo(Kendaraan::class, 'id_mobil', 'id_mobil');
    }

    public function pesanan(): HasMany
    {
        return $this->hasMany(Pesan::class, 'id_jadwal', 'id_jadwal');
    }

    public function seatsLeft(): int
    {
        $bookedSeats = $this->pesanan()->count();

        return max(0, 5 - $bookedSeats);
    }
}
