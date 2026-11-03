<?php

namespace App\Enums;

enum ScheduleStatus: string
{
    case Open = 'open';
    case Closed = 'closed';
    case Cancelled = 'cancelled';
    case Done = 'done';

    public function label(): string
    {
        return match ($this) {
            self::Open => 'Dibuka',
            self::Closed => 'Ditutup',
            self::Cancelled => 'Dibatalkan',
            self::Done => 'Selesai',
        };
    }

    /**
     * Nama warna semantik: success, warning, danger, info, atau neutral.
     */
    public function color(): string
    {
        return match ($this) {
            self::Open => 'success',
            self::Closed => 'warning',
            self::Cancelled => 'danger',
            self::Done => 'neutral',
        };
    }
}
