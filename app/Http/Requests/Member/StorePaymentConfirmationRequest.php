<?php

namespace App\Http\Requests\Member;

use Illuminate\Foundation\Http\FormRequest;

class StorePaymentConfirmationRequest extends FormRequest
{
    public function authorize(): bool
    {
        return $this->user() !== null;
    }

    public function rules(): array
    {
        return [
            'id_pesan' => ['required', 'integer', 'exists:pesan,id_pesan'],
            'no_resi' => ['required', 'string', 'max:50', 'unique:konfirmasi_pesan,no_resi'],
            'no_rek' => ['required', 'string', 'max:30'],
            'tanggal_transfer' => ['required', 'date'],
            'jam_transfer' => ['nullable', 'string'],
        ];
    }

    public function messages(): array
    {
        return [
            'id_pesan.required' => 'Pilih pesanan yang ingin dikonfirmasi.',
            'id_pesan.exists' => 'Data pesanan tidak valid.',
            'no_resi.required' => 'Nomor resi atau referensi transfer wajib diisi.',
            'no_resi.unique' => 'Nomor resi ini sudah pernah digunakan sebelumnya.',
            'no_rek.required' => 'Nomor rekening pengirim wajib diisi.',
            'tanggal_transfer.required' => 'Waktu transfer wajib diisi.',
        ];
    }
}
