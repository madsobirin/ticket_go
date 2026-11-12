<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class KotaTujuan extends Model
{
    protected $table = 'kota_tujuan';

    protected $primaryKey = 'id_kota_tujuan';

    public $timestamps = false;

    protected $fillable = [
        'nm_kota_tujuan',
    ];
}
