<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('bookings', function (Blueprint $table) {
            $table->id();
            $table->string('code', 12)->unique();
            $table->foreignId('schedule_id')->constrained()->restrictOnDelete();
            $table->foreignId('user_id')->constrained()->restrictOnDelete();
            $table->unsignedTinyInteger('seat_number');
            $table->unsignedInteger('price_snapshot');
            $table
                ->enum('status', [
                    'unpaid',
                    'pending_verification',
                    'paid',
                    'expired',
                    'cancelled',
                ])
                ->default('unpaid');
            $table->dateTime('expires_at');
            $table->timestamps();

            $table->unique(
                ['schedule_id', 'seat_number'],
                'bookings_schedule_seat_unique',
            );
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bookings');
    }
};
