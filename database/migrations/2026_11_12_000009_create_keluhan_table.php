<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('keluhan', function (Blueprint $table): void {
            $table->engine = 'InnoDB';
            $table->charset = 'utf8mb4';
            $table->collation = 'utf8mb4_unicode_ci';

            $table->increments('id_keluhan');
            $table->integer('id_member');
            $table->string('j_keluhan', 20);
            $table->string('d_keluhan', 200);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('keluhan');
    }
};
