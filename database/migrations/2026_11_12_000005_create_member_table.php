<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create("member", function (Blueprint $table): void {
            $table->engine = "InnoDB";
            $table->charset = "utf8mb4";
            $table->collation = "utf8mb4_unicode_ci";

            $table->increments("id_member");
            $table->string("nama", 100);
            $table->string("alamat", 100);
            $table->string("telepon", 20);
            $table->enum("jen_kelamin", ["L", "P"]);
            $table->string("username", 50)->unique();
            $table->string("password", 255);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists("member");
    }
};
