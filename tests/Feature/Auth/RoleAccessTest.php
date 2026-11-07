<?php

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;

uses(RefreshDatabase::class);

test('unauthenticated user is redirected to login from protected dashboards', function ($url) {
    $response = $this->get($url);

    $response->assertRedirect(route('login'));
})->with([
    '/member/dashboard',
    '/operator/dashboard',
    '/admin/dashboard',
]);

test('member cannot access operator or admin dashboard', function ($url) {
    $member = User::factory()->member()->create();

    $response = $this->actingAs($member)->get($url);

    $response->assertForbidden();
})->with([
    '/operator/dashboard',
    '/admin/dashboard',
]);

test('operator cannot access admin dashboard', function () {
    $operator = User::factory()->operator()->create();

    $response = $this->actingAs($operator)->get('/admin/dashboard');

    $response->assertForbidden();
});

test('operator can access operator dashboard', function () {
    $operator = User::factory()->operator()->create();

    $response = $this->actingAs($operator)->get('/operator/dashboard');

    $response->assertOk();
    $response->assertSee('Dasbor Operasional Loket');
});

test('admin can access admin and operator dashboards', function ($url) {
    $admin = User::factory()->admin()->create();

    $response = $this->actingAs($admin)->get($url);

    $response->assertOk();
})->with([
    '/admin/dashboard',
    '/operator/dashboard',
]);

test('member can access member dashboard', function () {
    $member = User::factory()->member()->create();

    $response = $this->actingAs($member)->get('/member/dashboard');

    $response->assertOk();
    $response->assertSee($member->name);
});
