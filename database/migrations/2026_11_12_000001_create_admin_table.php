<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('admin', function (Blueprint $table): void {
            $table->engine = 'InnoDB';
            $table->charset = 'utf8mb4';
            $table->collation = 'utf8mb4_unicode_ci';

            $table->increments('id_admin');
            $table->string('email', 50);
            $table->string('password', 50);
            $table->string('no_telp', 20);
            $table->string('nama_lengkap', 100);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('admin');
    }
};
