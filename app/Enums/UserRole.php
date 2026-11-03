<?php

namespace App\Enums;

enum UserRole: string
{
    case Member = 'member';
    case Operator = 'operator';
    case Admin = 'admin';

    public function label(): string
    {
        return match ($this) {
            self::Member => 'Member',
            self::Operator => 'Operator Loket',
            self::Admin => 'Admin',
        };
    }

    /**
     * Nama warna semantik: success, warning, danger, info, atau neutral.
     */
    public function color(): string
    {
        return match ($this) {
            self::Member => 'neutral',
            self::Operator => 'info',
            self::Admin => 'warning',
        };
    }
}
