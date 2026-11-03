<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('routes', function (Blueprint $table) {
            $table->id();
            $table
                ->foreignId('origin_city_id')
                ->constrained('cities')
                ->restrictOnDelete();
            $table
                ->foreignId('destination_city_id')
                ->constrained('cities')
                ->restrictOnDelete();
            $table->unsignedInteger('base_price');
            $table->timestamps();

            $table->unique(['origin_city_id', 'destination_city_id']);
        });

        // SQLite tidak mendukung ADD CONSTRAINT; di sana aturan dijaga oleh model Route.
        if (
            in_array(DB::getDriverName(), ['mysql', 'mariadb', 'pgsql'], true)
        ) {
            DB::statement(
                'ALTER TABLE routes ADD CONSTRAINT routes_origin_destination_different CHECK (origin_city_id <> destination_city_id)',
            );
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('routes');
    }
};
