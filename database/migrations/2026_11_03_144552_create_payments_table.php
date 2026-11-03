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
        Schema::create('payments', function (Blueprint $table) {
            $table->id();
            $table
                ->foreignId('booking_id')
                ->unique()
                ->constrained()
                ->cascadeOnDelete();
            $table->string('receipt_no', 40);
            $table->string('account_no', 30);
            $table->string('proof_path')->nullable();
            $table->dateTime('transferred_at');
            $table
                ->enum('status', ['pending', 'approved', 'rejected'])
                ->default('pending');
            $table
                ->foreignId('verified_by')
                ->nullable()
                ->constrained('users')
                ->nullOnDelete();
            $table->dateTime('verified_at')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('payments');
    }
};
