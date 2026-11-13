<?php

namespace App\Http\Requests\Member;

use Illuminate\Foundation\Http\FormRequest;

class StorePaymentConfirmationRequest extends FormRequest
{
    public function authorize(): bool
    {
        return $this->user() !== null;
    }

    protected function prepareForValidation(): void
    {
        if ($this->filled('no_rek_pengirim') && ! $this->filled('no_rek')) {
            $this->merge([
                'no_rek' => $this->input('no_rek_pengirim'),
            ]);
        }
    }

    public function rules(): array
    {
        return [
            'id_pesan' => ['required', 'integer', 'exists:pesan,id_pesan'],
            'no_resi' => ['required', 'string', 'max:50', 'unique:konfirmasi_pesan,no_resi'],
            'no_rek' => ['required', 'string', 'max:30'],
            'tanggal_transfer' => ['required', 'date'],
            'jam_transfer' => ['nullable', 'string'],
            'file_bukti' => ['nullable', 'file', 'mimes:jpg,jpeg,png,pdf', 'max:5120'],
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
