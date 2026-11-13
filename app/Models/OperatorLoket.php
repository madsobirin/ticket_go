<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class OperatorLoket extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $table = 'operator_loket';

    protected $primaryKey = 'id_opr';

    public $timestamps = false;

    protected $fillable = [
        'user',
        'password',
        'nama',
    ];

    protected $hidden = [
        'password',
    ];

    protected function casts(): array
    {
        return [
            'password' => 'hashed',
        ];
    }

    public function getNameAttribute(): string
    {
        return $this->nama;
    }

    public function getRoleAttribute(): string
    {
        return 'operator';
    }

    public function isAdmin(): bool
    {
        return false;
    }

    public function isOperator(): bool
    {
        return true;
    }

    public function getAuthIdentifier()
    {
        return 'operator:'.$this->getKey();
    }
}
