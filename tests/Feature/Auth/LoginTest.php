<?php

use App\Models\Admin;
use App\Models\Member;
use App\Models\OperatorLoket;
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

test('operator can log in with username and password and redirects to operator dashboard', function () {
    $operator = OperatorLoket::create([
        'user' => 'operator',
        'nama' => 'Dimas Wahyu',
        'password' => 'secret123',
    ]);

    $response = $this->post('/login', [
        'username' => 'operator',
        'password' => 'secret123',
    ]);

    $response->assertRedirect(route('operator.dashboard'));
    $this->assertAuthenticatedAs($operator);

    $dashboard = $this->actingAs($operator)->get(route('operator.dashboard'));
    $dashboard->assertOk();
});

test('admin can log in with email or username and redirects to admin dashboard', function () {
    $admin = Admin::create([
        'email' => 'admin@lintaslampung.com',
        'nama_lengkap' => 'Admin Utama',
        'no_telp' => '081277889900',
        'password' => 'secret123',
    ]);

    $response = $this->post('/login', [
        'username' => 'admin@lintaslampung.com',
        'password' => 'secret123',
    ]);

    $response->assertRedirect(route('admin.dashboard'));
    $this->assertAuthenticatedAs($admin);

    $dashboard = $this->actingAs($admin)->get(route('admin.dashboard'));
    $dashboard->assertOk();
});
