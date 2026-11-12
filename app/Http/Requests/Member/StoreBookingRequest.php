<?php

namespace App\Http\Requests\Member;

use App\Enums\ScheduleStatus;
use App\Models\Schedule;
use Closure;
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
                'exists:schedules,id',
                function (string $attribute, mixed $value, Closure $fail): void {
                    $schedule = Schedule::with('vehicle')->find($value);
                    if (! $schedule) {
                        $fail('Jadwal tidak ditemukan.');

                        return;
                    }
                    if ($schedule->status !== ScheduleStatus::Open) {
                        $fail('Jadwal perjalanan ini sudah tidak menerima pemesanan.');

                        return;
                    }
                    if ($schedule->departure_at->isPast()) {
                        $fail('Jadwal perjalanan ini sudah berangkat.');
                    }
                },
            ],
            'seat_number' => [
                'required',
                'integer',
                'min:1',
                function (string $attribute, mixed $value, Closure $fail): void {
                    $scheduleId = $this->input('schedule_id');
                    $schedule = Schedule::with('vehicle')->find($scheduleId);
                    if ($schedule && (int) $value > $schedule->vehicle->seat_capacity) {
                        $fail('Nomor kursi melebihi kapasitas kendaraan (maksimal '.$schedule->vehicle->seat_capacity.').');
                    }
                },
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
