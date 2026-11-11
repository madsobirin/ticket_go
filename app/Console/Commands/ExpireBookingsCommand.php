<?php

namespace App\Console\Commands;

use App\Enums\BookingStatus;
use App\Models\Booking;
use Illuminate\Console\Command;

class ExpireBookingsCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'bookings:expire';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Batalkan pemesanan tiket yang melewati batas waktu bayar (expires_at)';

    /**
     * Execute the console command.
     */
    public function handle(): int
    {
        $expiredCount = Booking::where('status', BookingStatus::Unpaid)
            ->where('expires_at', '<=', now())
            ->update(['status' => BookingStatus::Expired]);

        $this->info("Berhasil memperbarui {$expiredCount} tiket kedaluwarsa.");

        return self::SUCCESS;
    }
}
