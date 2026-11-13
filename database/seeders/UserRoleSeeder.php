<?php

namespace Database\Seeders;

use App\Models\Admin;
use App\Models\OperatorLoket;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserRoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // 1. Akun Operator Loket
        OperatorLoket::updateOrCreate(
            ['user' => 'operator'],
            [
                'nama' => 'Dimas Wahyu (Staff Loket)',
                'password' => Hash::make('password123'),
            ]
        );

        // 2. Akun Super Admin
        Admin::updateOrCreate(
            ['email' => 'admin@lintaslampung.com'],
            [
                'nama_lengkap' => 'Super Admin Lintas Lampung',
                'no_telp' => '081277889900',
                'password' => Hash::make('password123'),
            ]
        );
    }
}
