<?php

use App\Models\Member;
use Illuminate\Foundation\Testing\RefreshDatabase;

uses(RefreshDatabase::class);

test('member can log in with username and password', function () {
    $member = Member::create([
        'nama' => 'Hendra Setiawan',
        'alamat' => 'Bandar Lampung',
        'telepon' => '081234567890',
        'jen_kelamin' => 'L',
        'username' => 'hendra01',
        'password' => 'secret123',
    ]);

    $response = $this->post('/login', [
        'username' => 'hendra01',
        'password' => 'secret123',
    ]);

    $response->assertRedirect(route('member.dashboard'));
    $this->assertAuthenticatedAs($member);
});

test('login fails with invalid credentials', function () {
    Member::create([
        'nama' => 'Hendra Setiawan',
        'alamat' => 'Bandar Lampung',
        'telepon' => '081234567890',
        'jen_kelamin' => 'L',
        'username' => 'hendra01',
        'password' => 'secret123',
    ]);

    $response = $this->from('/login')->post('/login', [
        'username' => 'hendra01',
        'password' => 'wrongpassword',
    ]);

    $response->assertRedirect('/login');
    $response->assertSessionHasErrors(['username']);
    $this->assertGuest();
});

test('authenticated user can log out', function () {
    $member = Member::create([
        'nama' => 'Hendra Setiawan',
        'alamat' => 'Bandar Lampung',
        'telepon' => '081234567890',
        'jen_kelamin' => 'L',
        'username' => 'hendra01',
        'password' => 'secret123',
    ]);

    $response = $this->actingAs($member)->post('/logout');

    $response->assertRedirect(route('login'));
    $this->assertGuest();
});
