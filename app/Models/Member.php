<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Member extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $table = 'member';

    protected $primaryKey = 'id_member';

    public $timestamps = false;

    /**
     * @var list<string>
     */
    protected $fillable = [
        'nama',
        'alamat',
        'telepon',
        'jen_kelamin',
        'username',
        'password',
    ];

    /**
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'password' => 'hashed',
        ];
    }

    /**
     * Property accessor alias untuk integrasi dengan view & middleware.
     */
    public function getNameAttribute(): string
    {
        return $this->nama;
    }

    public function getRoleAttribute(): string
    {
        return 'member';
    }

    public function bookings()
    {
        return $this->hasMany(Booking::class, 'id_member', 'id_member');
    }
}
