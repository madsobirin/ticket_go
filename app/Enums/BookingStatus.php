<?php

namespace App\Enums;

enum BookingStatus: string
{
    case Unpaid = 'unpaid';
    case PendingVerification = 'pending_verification';
    case Paid = 'paid';
    case Expired = 'expired';
    case Cancelled = 'cancelled';

    public function label(): string
    {
        return match ($this) {
            self::Unpaid => 'Belum Bayar',
            self::PendingVerification => 'Menunggu Verifikasi',
            self::Paid => 'Lunas',
            self::Expired => 'Kedaluwarsa',
            self::Cancelled => 'Dibatalkan',
        };
    }

    /**
     * Nama warna semantik: success, warning, danger, info, atau neutral.
     */
    public function color(): string
    {
        return match ($this) {
            self::Unpaid => 'warning',
            self::PendingVerification => 'info',
            self::Paid => 'success',
            self::Expired => 'neutral',
            self::Cancelled => 'danger',
        };
    }

    /**
     * Status yang masih menahan kursi pada sebuah jadwal.
     *
     * @return list<self>
     */
    public static function holdingSeat(): array
    {
        return [self::Unpaid, self::PendingVerification, self::Paid];
    }
}
