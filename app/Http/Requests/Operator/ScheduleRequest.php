<?php

namespace App\Http\Requests\Operator;

use Illuminate\Foundation\Http\FormRequest;

class ScheduleRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'route_id' => ['required'],
            'vehicle_id' => ['required', 'integer', 'exists:kendaraan,id_mobil'],
            'price' => ['required', 'integer', 'min:1000'],
            'departure_at' => ['required'],
            'status' => ['required'],
        ];
    }

    public function messages(): array
    {
        return [
            'route_id.required' => 'Rute perjalanan wajib dipilih.',
            'route_id.exists' => 'Rute perjalanan tidak valid.',
            'vehicle_id.required' => 'Kendaraan armada wajib dipilih.',
            'vehicle_id.exists' => 'Kendaraan tidak valid.',
            'price.required' => 'Harga tiket jadwal wajib diisi.',
            'price.min' => 'Harga tiket minimal Rp 1.000.',
            'departure_at.required' => 'Waktu keberangkatan wajib ditentukan.',
            'departure_at.date' => 'Format waktu keberangkatan tidak valid.',
            'status.required' => 'Status jadwal wajib dipilih.',
        ];
    }
}
