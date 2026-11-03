<?php

use App\Enums\BookingStatus;
use App\Enums\UserRole;
use App\Models\Booking;
use App\Models\City;
use App\Models\Payment;
use App\Models\Route;
use App\Models\Schedule;
use App\Models\User;
use App\Models\Vehicle;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Hash;

uses(RefreshDatabase::class);

it(
    'seeds the Lampung master data, future schedules, and one booking per status',
    function () {
        $this->seed();

        expect(City::count())
            ->toBe(18)
            ->and(Vehicle::count())
            ->toBe(2)
            ->and(Route::count())
            ->toBe(8)
            ->and(Schedule::count())
            ->toBe(84)
            ->and(Schedule::upcoming()->count())
            ->toBe(84)
            ->and(Payment::count())
            ->toBe(2)
            ->and(Booking::distinct()->count('status'))
            ->toBe(count(BookingStatus::cases()));
    },
);

it('seeds the demo account for each role with a hashed password', function (
    string $email,
    UserRole $role,
) {
    $this->seed();

    $user = User::where('email', $email)->firstOrFail();

    expect($user->role)
        ->toBe($role)
        ->and($user->password)
        ->not->toBe('password')
        ->and(Hash::check('password', $user->password))
        ->toBeTrue();
})->with([
    'admin' => ['admin@lintas.test', UserRole::Admin],
    'operator' => ['operator@lintas.test', UserRole::Operator],
    'member' => ['member@lintas.test', UserRole::Member],
]);
