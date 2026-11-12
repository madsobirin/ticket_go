<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Pesan extends Model
{
    protected $table = 'pesan';

    protected $primaryKey = 'id_pesan';

    public $timestamps = false;

    protected $fillable = [
        'nomor_kursi',
        'status',
        'id_jadwal',
        'id_member',
    ];

    public function jadwal(): BelongsTo
    {
        return $this->belongsTo(Jadwal::class, 'id_jadwal', 'id_jadwal');
    }

    public function member(): BelongsTo
    {
        return $this->belongsTo(Member::class, 'id_member', 'id_member');
    }
}
