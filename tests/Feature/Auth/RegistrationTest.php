<?php

use App\Enums\UserRole;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

uses(RefreshDatabase::class);

test('member registration creates a new user with member role and logs in', function () {
    $response = $this->post('/register', [
        'nama' => 'Bambang Pamungkas',
        'email' => 'bambang@lintas.test',
        'username' => 'bambang99',
        'telepon' => '081234567899',
        'alamat' => 'Jl. Raden Intan No. 10, Bandar Lampung',
        'jen_kelamin' => 'L',
        'password' => 'secret123',
    ]);

    $response->assertRedirect(route('member.dashboard'));

    $user = User::where('username', 'bambang99')->first();
    expect($user)->not->toBeNull()
        ->and($user->name)->toBe('Bambang Pamungkas')
        ->and($user->email)->toBe('bambang@lintas.test')
        ->and($user->role)->toBe(UserRole::Member)
        ->and($user->gender)->toBe('L')
        ->and(Hash::check('secret123', $user->password))->toBeTrue();

    expect(Auth::id())->toBe($user->id);
});

test('member registration fails when username or email is duplicate', function () {
    User::factory()->create([
        'username' => 'bambang99',
        'email' => 'bambang@lintas.test',
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
    $response->assertSessionHasErrors(['username', 'email']);
    expect(User::where('name', 'Bambang Lain')->exists())->toBeFalse();
});

test('member registration fails when validation rules are not met', function () {
    $response = $this->from('/register')->post('/register', [
        'nama' => '',
        'email' => 'not-an-email',
        'username' => 'ab', // min:3
        'telepon' => '123', // min:8
        'alamat' => '',
        'jen_kelamin' => 'X', // must be L or P
        'password' => '123', // min:6
    ]);

    $response->assertRedirect('/register');
    $response->assertSessionHasErrors([
        'name',
        'email',
        'username',
        'phone',
        'address',
        'gender',
        'password',
    ]);
});
