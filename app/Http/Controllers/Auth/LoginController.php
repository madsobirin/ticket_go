<?php

namespace App\Http\Controllers\Auth;

use App\Enums\UserRole;
use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;
use Illuminate\View\View;

class LoginController extends Controller
{
    /**
     * Tampilkan halaman masuk akun.
     */
    public function show(): View
    {
        return view('login');
    }

    /**
     * Proses autentikasi pengguna.
     */
    public function store(LoginRequest $request): RedirectResponse
    {
        $loginInput = $request->input('username');
        $field = filter_var($loginInput, FILTER_VALIDATE_EMAIL) ? 'email' : 'username';

        $credentials = [
            $field => $loginInput,
            'password' => $request->input('password'),
        ];

        if (! Auth::attempt($credentials, $request->boolean('remember'))) {
            throw ValidationException::withMessages([
                'username' => 'Nama pengguna atau kata sandi tidak sesuai dengan pangkalan data.',
            ]);
        }

        $request->session()->regenerate();

        $user = Auth::user();

        return match ($user->role) {
            UserRole::Admin => redirect()->intended(route('admin.dashboard')),
            UserRole::Operator => redirect()->intended(route('operator.dashboard')),
            default => redirect()->intended(route('member.dashboard')),
        };
    }

    /**
     * Keluar dari sesi aplikasi.
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()
            ->route('login')
            ->with('status', 'Anda telah berhasil keluar dari akun.');
    }
}
