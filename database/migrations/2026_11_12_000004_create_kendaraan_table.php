<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('kendaraan', function (Blueprint $table): void {
            $table->engine = 'InnoDB';
            $table->charset = 'utf8mb4';
            $table->collation = 'utf8mb4_unicode_ci';

            $table->increments('id_mobil');
            $table->string('jenis_mobil', 20);
            $table->string('nomor_polisi', 20);
            $table->string('warna_mobil', 20);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('kendaraan');
    }
};
