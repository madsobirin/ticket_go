<?php

use App\Enums\UserRole;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;

uses(RefreshDatabase::class);

test('user can log in with username and password', function () {
    $user = User::factory()->create([
        'username' => 'hendra01',
        'password' => 'secret123',
        'role' => UserRole::Member,
    ]);

    $response = $this->post('/login', [
        'username' => 'hendra01',
        'password' => 'secret123',
    ]);

    $response->assertRedirect(route('member.dashboard'));
    $this->assertAuthenticatedAs($user);
});

test('user can log in with email and password', function () {
    $user = User::factory()->create([
        'email' => 'hendra@lintas.test',
        'password' => 'secret123',
        'role' => UserRole::Member,
    ]);

    $response = $this->post('/login', [
        'username' => 'hendra@lintas.test',
        'password' => 'secret123',
    ]);

    $response->assertRedirect(route('member.dashboard'));
    $this->assertAuthenticatedAs($user);
});

test('admin login redirects to admin dashboard', function () {
    $admin = User::factory()->admin()->create([
        'username' => 'admin_utama',
        'password' => 'secret123',
    ]);

    $response = $this->post('/login', [
        'username' => 'admin_utama',
        'password' => 'secret123',
    ]);

    $response->assertRedirect(route('admin.dashboard'));
    $this->assertAuthenticatedAs($admin);
});

test('operator login redirects to operator dashboard', function () {
    $operator = User::factory()->operator()->create([
        'username' => 'operator_loket1',
        'password' => 'secret123',
    ]);

    $response = $this->post('/login', [
        'username' => 'operator_loket1',
        'password' => 'secret123',
    ]);

    $response->assertRedirect(route('operator.dashboard'));
    $this->assertAuthenticatedAs($operator);
});

test('login fails with invalid credentials', function () {
    User::factory()->create([
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
    $user = User::factory()->create();

    $response = $this->actingAs($user)->post('/logout');

    $response->assertRedirect(route('login'));
    $this->assertGuest();
});
