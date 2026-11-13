@extends('layouts.admin')

@section('page_title', 'Dasbor Operasional Loket')

@section('content')
<div class="space-y-6">
    <!-- Stat Cards -->
    <div class="grid grid-cols-1 sm:grid-cols-3 gap-5">
        <div class="bg-white p-5 rounded-xl border border-surface-container shadow-sm flex items-center justify-between">
            <div>
                <p class="text-xs text-ink-600 font-medium">Jadwal Aktif Hari Ini</p>
                <p class="text-2xl font-bold text-ink-900 mt-1">{{ $todaySchedulesCount }}</p>
                <p class="text-[11px] text-ink-600 mt-0.5">Siap melayani penumpang</p>
            </div>
            <div class="w-12 h-12 rounded-lg bg-sage-100 text-forest-700 flex items-center justify-center">
                <span class="material-symbols-outlined text-2xl">calendar_today</span>
            </div>
        </div>

        <div class="bg-white p-5 rounded-xl border border-surface-container shadow-sm flex items-center justify-between">
            <div>
                <p class="text-xs text-ink-600 font-medium">Perlu Verifikasi Pembayaran</p>
                <p class="text-2xl font-bold text-amber-500 mt-1">{{ $pendingPaymentsCount }}</p>
                <p class="text-[11px] text-ink-600 mt-0.5">Bukti transfer pending</p>
            </div>
            <div class="w-12 h-12 rounded-lg bg-amber-50 text-amber-600 flex items-center justify-center">
                <span class="material-symbols-outlined text-2xl">pending_actions</span>
            </div>
        </div>

        <div class="bg-white p-5 rounded-xl border border-surface-container shadow-sm flex items-center justify-between">
            <div>
                <p class="text-xs text-ink-600 font-medium">Pemesanan Tiket Hari Ini</p>
                <p class="text-2xl font-bold text-forest-700 mt-1">{{ $todayBookingsCount }}</p>
                <p class="text-[11px] text-ink-600 mt-0.5">Total booking dibuat</p>
            </div>
            <div class="w-12 h-12 rounded-lg bg-surface-container-low text-forest-900 flex items-center justify-center">
                <span class="material-symbols-outlined text-2xl">confirmation_number</span>
            </div>
        </div>
    </div>

    <!-- Antrean Pembayaran Terbaru -->
    <div class="bg-white rounded-xl border border-surface-container shadow-sm overflow-hidden">
        <div class="px-6 py-4 border-b border-surface-container flex items-center justify-between">
            <h2 class="font-bold text-ink-900">Pembayaran Menunggu Verifikasi</h2>
            <span class="text-xs text-ink-600">{{ $recentPayments->count() }} data terakhir</span>
        </div>

        @if ($recentPayments->isEmpty())
            <div class="p-8 text-center text-ink-600 text-sm">
                Belum ada transaksi pembayaran baru yang perlu diverifikasi.
            </div>
        @else
            <div class="overflow-x-auto">
                <table class="w-full text-left text-sm">
                    <thead class="bg-surface-container-low text-xs text-ink-600 uppercase border-b border-surface-container">
                        <tr>
                            <th class="px-6 py-3">Kode Booking</th>
                            <th class="px-6 py-3">Nama Penumpang</th>
                            <th class="px-6 py-3">Rute & Jadwal</th>
                            <th class="px-6 py-3">No. Resi</th>
                            <th class="px-6 py-3">Status</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-surface-container">
                        @foreach ($recentPayments as $payment)
                            <tr class="hover:bg-surface-container-low/40">
                                <td class="px-6 py-4 font-mono font-bold text-forest-700">
                                    #PSN-{{ str_pad($payment->id_pesan, 4, '0', STR_PAD_LEFT) }}
                                </td>
                                <td class="px-6 py-4 font-medium text-ink-900">
                                    {{ $payment->pesan?->member?->nama ?? '-' }}
                                </td>
                                <td class="px-6 py-4 text-xs text-ink-600">
                                    {{ $payment->pesan?->jadwal?->kotaAsal?->nm_kota_asal }} &rarr; {{ $payment->pesan?->jadwal?->kotaTujuan?->nm_kota_tujuan }}
                                </td>
                                <td class="px-6 py-4 font-mono text-xs font-bold text-forest-900">
                                    {{ $payment->no_resi }}
                                </td>
                                <td class="px-6 py-4">
                                    <span class="px-2.5 py-1 rounded-full text-xs font-semibold bg-amber-100 text-amber-800 flex items-center gap-1 w-max">
                                        <span class="w-1.5 h-1.5 rounded-full bg-amber-500 animate-pulse"></span>
                                        {{ $payment->pesan?->status ?? 'Menunggu Konfirmasi' }}
                                    </span>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @endif
    </div>
</div>
@endsection
