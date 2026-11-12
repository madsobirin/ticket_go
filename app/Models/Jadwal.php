<?php

namespace App\Models;

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
