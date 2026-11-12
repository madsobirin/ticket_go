<?php

use App\Models\Member;
use Illuminate\Foundation\Testing\RefreshDatabase;

uses(RefreshDatabase::class);

test('member can access member dashboard', function () {
    $member = Member::create([
        'nama' => 'Budi Santoso',
        'alamat' => 'Bandar Lampung',
        'telepon' => '081234567890',
        'jen_kelamin' => 'L',
        'username' => 'budis',
        'password' => 'secret123',
    ]);

    $response = $this->actingAs($member)->get(route('member.dashboard'));

    $response->assertOk();
    $response->assertSee('Budi Santoso');
});

test('guest cannot access member dashboard and is redirected to login', function () {
    $response = $this->get(route('member.dashboard'));

    $response->assertRedirect(route('login'));
});
