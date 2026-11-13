<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Kendaraan extends Model
{
    protected $table = 'kendaraan';

    protected $primaryKey = 'id_mobil';

    public $timestamps = false;

    protected $fillable = [
        'jenis_mobil',
        'nomor_polisi',
        'warna_mobil',
    ];

    public function getIdAttribute(): int
    {
        return (int) $this->id_mobil;
    }

    public function getTypeAttribute(): string
    {
        return (string) ($this->jenis_mobil ?? '');
    }

    public function getPlateNumberAttribute(): string
    {
        return (string) ($this->nomor_polisi ?? '');
    }

    public function getColorAttribute(): ?string
    {
        return $this->warna_mobil;
    }

    public function getSeatCapacityAttribute(): int
    {
        return 5;
    }

    public function schedules(): HasMany
    {
        return $this->hasMany(Jadwal::class, 'id_mobil', 'id_mobil');
    }

    public function jadwal(): HasMany
    {
        return $this->hasMany(Jadwal::class, 'id_mobil', 'id_mobil');
    }
}
