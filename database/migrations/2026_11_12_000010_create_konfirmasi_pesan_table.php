<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('konfirmasi_pesan', function (Blueprint $table): void {
            $table->engine = 'InnoDB';
            $table->charset = 'utf8mb4';
            $table->collation = 'utf8mb4_unicode_ci';

            $table->string('no_resi', 20)->primary();
            $table->integer('no_rek');
            $table->date('tgl_transfer');
            $table->time('jam_transfer');
            $table->integer('id_pesan');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('konfirmasi_pesan');
    }
};
