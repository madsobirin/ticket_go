<?php

namespace App\Http\Controllers\Auth;

use App\Enums\UserRole;
use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\RegisterRequest;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class RegisterController extends Controller
{
    /**
     * Tampilkan formulir pendaftaran member.
     */
    public function show(): View
    {
        return view('welcome');
    }

    /**
     * Proses pendaftaran member baru.
     */
    public function store(RegisterRequest $request): RedirectResponse
    {
        $validated = $request->validated();

        $user = new User([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'username' => $validated['username'],
            'phone' => $validated['phone'],
            'address' => $validated['address'],
            'gender' => $validated['gender'],
            'password' => $validated['password'],
        ]);

        // Peran selalu dipaksa ke Member untuk keamanan pendaftaran publik
        $user->role = UserRole::Member;
        $user->save();

        Auth::login($user);

        return redirect()
            ->route('member.dashboard')
            ->with('status', 'Pendaftaran berhasil! Selamat datang di Lintas Lampung.');
    }
}
