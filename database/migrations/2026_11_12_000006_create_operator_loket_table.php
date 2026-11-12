<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create("operator_loket", function (Blueprint $table): void {
            $table->engine = "InnoDB";
            $table->charset = "utf8mb4";
            $table->collation = "utf8mb4_unicode_ci";

            $table->increments("id_opr");
            $table->string("user", 50);
            $table->string("password", 50);
            $table->string("nama", 100);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists("operator_loket");
    }
};
