<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class KotaAsal extends Model
{
    protected $table = 'kota_asal';

    protected $primaryKey = 'id_kota_asal';

    public $timestamps = false;

    protected $fillable = [
        'nm_kota_asal',
    ];
}
