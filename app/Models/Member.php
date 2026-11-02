<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    protected $table = 'member';   // sesuaikan dengan db_tiket2
    public $timestamps = false;    // hapus jika tabel punya created_at/updated_at

    protected $fillable = ['nama', 'alamat', 'telepon', 'jen_kelamin', 'username', 'password'];
    protected $hidden   = ['password'];
}
