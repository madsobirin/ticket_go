<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\RegisterRequest;
use App\Models\Member;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class RegisterController extends Controller
{
    /**
     * Tampilkan formulir pendaftaran member.
     */
    public function show(): View
    {
        return view("welcome");
    }

    /**
     * Proses pendaftaran member baru.
     */
    public function store(RegisterRequest $request): RedirectResponse
    {
        $validated = $request->validated();

        Member::create([
            "nama" => $validated["name"],
            "alamat" => $validated["address"],
            "telepon" => $validated["phone"],
            "jen_kelamin" => $validated["gender"],
            "username" => $validated["username"],
            "password" => $validated["password"],
        ]);

        return redirect()
            ->route("login")
            ->with(
                "status",
                "Pendaftaran akun member berhasil! Silakan masuk.",
            );
    }
}
