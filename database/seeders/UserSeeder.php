<?php

namespace Database\Seeders;

use App\Enums\UserRole;
use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $demoAccounts = [
            [
                'email' => 'admin@lintas.test',
                'name' => 'Admin Lintas',
                'username' => 'admin',
                'role' => UserRole::Admin,
            ],
            [
                'email' => 'operator@lintas.test',
                'name' => 'Operator Loket',
                'username' => 'operator',
                'role' => UserRole::Operator,
            ],
            [
                'email' => 'member@lintas.test',
                'name' => 'Member Demo',
                'username' => 'member',
                'role' => UserRole::Member,
            ],
        ];

        // role tidak masuk $fillable (cegah eskalasi hak akses), jadi seeder membukanya secara eksplisit.
        User::unguarded(function () use ($demoAccounts): void {
            foreach ($demoAccounts as $account) {
                User::updateOrCreate(
                    ['email' => $account['email']],
                    $account + [
                        'password' => 'password',
                        'phone' => '081234567890',
                        'gender' => 'L',
                        'address' => 'Jl. Raden Intan No. 45, Enggal, Kota Bandar Lampung',
                        'email_verified_at' => now(),
                    ],
                );
            }
        });

        User::factory()->count(8)->create();
    }
}
