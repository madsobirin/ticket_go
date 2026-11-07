<?php

namespace App\Http\Requests\Operator;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class CityRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        $cityId = $this->route('city')?->id;

        return [
            'name' => [
                'required',
                'string',
                'max:60',
                Rule::unique('cities', 'name')->ignore($cityId),
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
