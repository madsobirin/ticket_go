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

    public function jadwal(): HasMany
    {
        return $this->hasMany(Jadwal::class, 'id_mobil', 'id_mobil');
    }
}
