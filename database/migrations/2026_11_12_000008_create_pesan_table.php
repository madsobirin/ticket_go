<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create("pesan", function (Blueprint $table): void {
            $table->engine = "InnoDB";
            $table->charset = "utf8mb4";
            $table->collation = "utf8mb4_unicode_ci";

            $table->increments("id_pesan");
            $table->enum("nomor_kursi", ["1", "2", "3", "4", "5"]);
            $table->string("status", 100);
            $table->integer("id_jadwal");
            $table->integer("id_member");
        });
    }

    public function down(): void
    {
        Schema::dropIfExists("pesan");
    }
};
