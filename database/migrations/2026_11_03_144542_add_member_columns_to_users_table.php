<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table
                ->string('username', 30)
                ->nullable()
                ->unique()
                ->after('email');
            $table->string('phone', 20)->nullable()->after('username');
            $table
                ->enum('gender', ['L', 'P'])
                ->nullable()
                ->after('phone');
            $table->string('address')->nullable()->after('gender');
            $table
                ->enum('role', ['member', 'operator', 'admin'])
                ->default('member')
                ->after('password');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropUnique(['username']);
            $table->dropColumn([
                'username',
                'phone',
                'gender',
                'address',
                'role',
            ]);
        });
    }
};
