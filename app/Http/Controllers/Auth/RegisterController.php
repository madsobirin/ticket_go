<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\RegisterMemberRequest;
use App\Models\Member;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function create()
    {
        return view('auth.register');
    }

    public function store(RegisterMemberRequest $request)
    {
        Member::create([
            'nama'        => $request->nama,
            'alamat'      => $request->alamat,
            'telepon'     => $request->telepon,
            'jen_kelamin' => $request->jen_kelamin,
            'username'    => $request->username,
            'password'    => Hash::make($request->password),
        ]);

        return redirect()
            ->route('register')
            ->with('success', 'Data Anda telah dicatat. Silakan masuk untuk memesan tiket.');
    }
}
