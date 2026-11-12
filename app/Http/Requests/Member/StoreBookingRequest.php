<?php

namespace App\Http\Requests\Member;

use Illuminate\Foundation\Http\FormRequest;

class StoreBookingRequest extends FormRequest
{
    public function authorize(): bool
    {
        return $this->user() !== null;
    }

    public function rules(): array
    {
        return [
            'schedule_id' => [
                'required',
                'integer',
                'exists:jadwal,id_jadwal',
            ],
            'seat_number' => [
                'required',
                'integer',
                'min:1',
                'max:5',
            ],
        ];
    }

    public function messages(): array
    {
        return [
            'schedule_id.required' => 'Pilihan jadwal wajib ditentukan.',
            'schedule_id.exists' => 'Jadwal yang dipilih tidak valid.',
            'seat_number.required' => 'Silakan pilih nomor kursi terlebih dahulu.',
            'seat_number.integer' => 'Nomor kursi tidak valid.',
            'seat_number.min' => 'Nomor kursi minimal 1.',
        ];
    }
}
