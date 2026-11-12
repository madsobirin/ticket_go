<?php

use App\Models\Member;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Hash;

uses(RefreshDatabase::class);

test('member registration creates a new member and redirects to login with flash status', function () {
    $response = $this->post('/register', [
        'nama' => 'Bambang Pamungkas',
        'email' => 'bambang@lintas.test',
        'username' => 'bambang99',
        'telepon' => '081234567899',
        'alamat' => 'Jl. Raden Intan No. 10, Bandar Lampung',
        'jen_kelamin' => 'L',
        'password' => 'secret123',
    ]);

    $response->assertRedirect(route('login'));
    $response->assertSessionHas('status', 'Pendaftaran akun member berhasil! Silakan masuk.');

    $member = Member::where('username', 'bambang99')->first();
    expect($member)->not->toBeNull()
        ->and($member->nama)->toBe('Bambang Pamungkas')
        ->and($member->username)->toBe('bambang99')
        ->and($member->telepon)->toBe('081234567899')
        ->and($member->alamat)->toBe('Jl. Raden Intan No. 10, Bandar Lampung')
        ->and($member->jen_kelamin)->toBe('L')
        ->and(Hash::check('secret123', $member->password))->toBeTrue();
});

test('member registration fails when username is duplicate', function () {
    Member::create([
        'nama' => 'Bambang Awal',
        'alamat' => 'Bandar Lampung',
        'telepon' => '081234567800',
        'jen_kelamin' => 'L',
        'username' => 'bambang99',
        'password' => 'secret123',
    ]);

    $response = $this->from('/register')->post('/register', [
        'nama' => 'Bambang Lain',
        'email' => 'bambang@lintas.test',
        'username' => 'bambang99',
        'telepon' => '081234567899',
        'alamat' => 'Bandar Lampung',
        'jen_kelamin' => 'L',
        'password' => 'secret123',
    ]);

    $response->assertRedirect('/register');
    $response->assertSessionHasErrors(['username']);
    expect(Member::where('nama', 'Bambang Lain')->exists())->toBeFalse();
});

test('member registration fails when validation rules are not met', function () {
    $response = $this->from('/register')->post('/register', [
        'nama' => '',
        'email' => 'not-an-email',
        'username' => 'ab',
        'telepon' => '123',
        'alamat' => '',
        'jen_kelamin' => 'X',
        'password' => '123',
    ]);

    $response->assertRedirect('/register');
    $response->assertSessionHasErrors([
        'name',
        'username',
        'phone',
        'address',
        'gender',
        'password',
    ]);
});
