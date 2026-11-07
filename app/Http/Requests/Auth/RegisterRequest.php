<?php

namespace App\Http\Requests\Auth;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class RegisterRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Prepare the data for validation.
     */
    protected function prepareForValidation(): void
    {
        $this->merge([
            'name' => $this->input('nama', $this->input('name')),
            'address' => $this->input('alamat', $this->input('address')),
            'phone' => $this->input('telepon', $this->input('phone')),
            'gender' => $this->input('jen_kelamin', $this->input('gender')),
        ]);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'max:100'],
            'email' => ['required', 'string', 'email', 'max:100', 'unique:users,email'],
            'username' => ['required', 'string', 'alpha_dash:ascii', 'min:3', 'max:30', 'unique:users,username'],
            'phone' => ['required', 'string', 'min:8', 'max:20'],
            'address' => ['required', 'string', 'max:255'],
            'gender' => ['required', Rule::in(['L', 'P'])],
            'password' => ['required', 'string', 'min:6'],
        ];
    }

    /**
     * Get custom error messages for validator errors.
     *
     * @return array<string, string>
     */
    public function messages(): array
    {
        return [
            'name.required' => 'Nama lengkap wajib diisi.',
            'name.max' => 'Nama lengkap maksimal 100 karakter.',
            'email.required' => 'Alamat email wajib diisi.',
            'email.email' => 'Format alamat email tidak valid.',
            'email.unique' => 'Alamat email sudah terdaftar.',
            'username.required' => 'Username wajib diisi.',
            'username.alpha_dash' => 'Username hanya boleh berupa huruf, angka, tanda strip, atau garis bawah.',
            'username.min' => 'Username minimal 3 karakter.',
            'username.max' => 'Username maksimal 30 karakter.',
            'username.unique' => 'Username sudah digunakan oleh akun lain.',
            'phone.required' => 'Nomor telepon wajib diisi.',
            'phone.min' => 'Nomor telepon minimal 8 karakter.',
            'phone.max' => 'Nomor telepon maksimal 20 karakter.',
            'address.required' => 'Alamat tempat tinggal wajib diisi.',
            'gender.required' => 'Jenis kelamin wajib dipilih.',
            'gender.in' => 'Pilihan jenis kelamin tidak valid (harus L atau P).',
            'password.required' => 'Password wajib diisi.',
            'password.min' => 'Password minimal 6 karakter.',
        ];
    }
}
