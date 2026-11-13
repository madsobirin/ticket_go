<?php

namespace App\Http\Requests\Operator;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class VehicleRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        $vehicle = $this->route('vehicle');
        $vehicleId = is_object($vehicle) ? ($vehicle->id_mobil ?? $vehicle->id) : $vehicle;

        return [
            'type' => ['required', 'string', 'max:50'],
            'plate_number' => [
                'required',
                'string',
                'max:20',
                Rule::unique('kendaraan', 'nomor_polisi')->ignore($vehicleId, 'id_mobil'),
            ],
            'color' => ['nullable', 'string', 'max:30'],
            'seat_capacity' => ['nullable', 'integer', 'min:1', 'max:50'],
        ];
    }

    public function messages(): array
    {
        return [
            'type.required' => 'Tipe kendaraan wajib diisi (cth: Toyota Avanza).',
            'plate_number.required' => 'Nomor plat polisi wajib diisi.',
            'plate_number.unique' => 'Nomor plat polisi sudah terdaftar.',
            'seat_capacity.required' => 'Kapasitas kursi wajib diisi.',
            'seat_capacity.min' => 'Kapasitas kursi minimal 1.',
        ];
    }
}
