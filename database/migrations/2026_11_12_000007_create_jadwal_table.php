<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('jadwal', function (Blueprint $table): void {
            $table->engine = 'InnoDB';
            $table->charset = 'utf8mb4';
            $table->collation = 'utf8mb4_unicode_ci';

            $table->increments('id_jadwal');
            $table->integer('id_kota_asal');
            $table->integer('id_kota_tujuan');
            $table->integer('harga');
            $table->date('tgl_berangkat');
            $table->time('jam_berangkat');
            $table->integer('id_mobil');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('jadwal');
    }
};
