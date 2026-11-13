<?php

namespace App\Http\Requests\Operator;

use Illuminate\Foundation\Http\FormRequest;

class CityRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => [
                'required',
                'string',
                'max:60',
            ],
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'Nama kota wajib diisi.',
            'name.max' => 'Nama kota maksimal 60 karakter.',
            'name.unique' => 'Nama kota sudah terdaftar.',
        ];
    }
}
