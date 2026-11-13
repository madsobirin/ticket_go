<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('kota_tujuan', function (Blueprint $table): void {
            $table->engine = 'InnoDB';
            $table->charset = 'utf8mb4';
            $table->collation = 'utf8mb4_unicode_ci';

            $table->increments('id_kota_tujuan');
            $table->string('nm_kota_tujuan', 26);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('kota_tujuan');
    }
};
