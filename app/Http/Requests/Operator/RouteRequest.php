<?php

namespace App\Http\Requests\Operator;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class RouteRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        $routeId = $this->route('route')?->id;
        $originCityId = $this->input('origin_city_id');

        return [
            'origin_city_id' => [
                'required',
                'integer',
                'exists:cities,id',
                'different:destination_city_id',
            ],
            'destination_city_id' => [
                'required',
                'integer',
                'exists:cities,id',
                'different:origin_city_id',
                Rule::unique('routes', 'destination_city_id')
                    ->where(fn ($query) => $query->where('origin_city_id', $originCityId))
                    ->ignore($routeId),
            ],
            'base_price' => [
                'required',
                'integer',
                'min:1000',
            ],
        ];
    }

    public function messages(): array
    {
        return [
            'origin_city_id.required' => 'Kota asal wajib dipilih.',
            'origin_city_id.exists' => 'Kota asal tidak ditemukan.',
            'origin_city_id.different' => 'Kota asal dan kota tujuan tidak boleh sama.',
            'destination_city_id.required' => 'Kota tujuan wajib dipilih.',
            'destination_city_id.exists' => 'Kota tujuan tidak ditemukan.',
            'destination_city_id.different' => 'Kota tujuan dan kota asal tidak boleh sama.',
            'destination_city_id.unique' => 'Trayek rute dengan pasangan kota asal dan tujuan ini sudah ada.',
            'base_price.required' => 'Tarif dasar tiket wajib diisi.',
            'base_price.integer' => 'Tarif dasar harus berupa angka.',
            'base_price.min' => 'Tarif dasar minimal Rp 1.000.',
        ];
    }
}
