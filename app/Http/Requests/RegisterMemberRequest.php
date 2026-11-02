<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterMemberRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    // Field persis sesuai SQL: nama, alamat, telepon, jen_kelamin, username, password
    public function rules(): array
    {
        return [
            'nama'        => ['required', 'string', 'max:100'],
            'alamat'      => ['required', 'string'],
            'telepon'     => ['required', 'regex:/^[0-9]{8,15}$/'],
            'jen_kelamin' => ['required', 'in:L,P'],
            // sesuaikan nama tabel/kolom dengan db_tiket2
            'username'    => ['required', 'string', 'max:50', 'regex:/^[a-z0-9_]+$/', 'unique:member,username'],
            'password'    => ['required', 'string', 'min:6'],
        ];
    }

    public function messages(): array
    {
        return [
            'telepon.regex'   => 'Nomor telepon harus 8–15 digit angka.',
            'username.regex'  => 'Username hanya huruf kecil, angka, dan underscore tanpa spasi.',
            'username.unique' => 'Username sudah dipakai.',
            'password.min'    => 'Password minimal 6 karakter.',
        ];
    }
}
