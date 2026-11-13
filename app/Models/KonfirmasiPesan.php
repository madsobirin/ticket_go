<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class KonfirmasiPesan extends Model
{
    protected $table = 'konfirmasi_pesan';

    protected $primaryKey = 'no_resi';

    public $incrementing = false;

    protected $keyType = 'string';

    public $timestamps = false;

    protected $fillable = [
        'no_resi',
        'no_rek',
        'tgl_transfer',
        'jam_transfer',
        'id_pesan',
    ];

    public function pesan(): BelongsTo
    {
        return $this->belongsTo(Pesan::class, 'id_pesan', 'id_pesan');
    }

    public function getBuktiUrlAttribute(): ?string
    {
        $cleanResi = preg_replace('/[^A-Za-z0-9_-]/', '', $this->no_resi);
        foreach (['jpg', 'jpeg', 'png', 'pdf', 'JPG', 'PNG'] as $ext) {
            $filename = $cleanResi.'.'.$ext;
            if (file_exists(public_path('uploads/bukti_transfer/'.$filename))) {
                return asset('uploads/bukti_transfer/'.$filename);
            }
        }

        return null;
    }
}
