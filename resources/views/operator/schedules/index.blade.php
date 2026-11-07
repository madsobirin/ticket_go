@extends('layouts.admin')

@section('page_title', 'Master Data Jadwal Keberangkatan')

@section('content')
<div class="space-y-6">
    <div class="flex flex-col sm:flex-row items-start sm:items-center justify-between gap-4">
        <div>
            <h2 class="text-xl font-bold text-ink-900">Jadwal Perjalanan Antar Kota</h2>
            <p class="text-xs text-ink-600 mt-1">Atur jam keberangkatan, armada yang ditugaskan, harga tiket, dan status buka/tutup kursi</p>
        </div>
        <a href="{{ route('operator.schedules.create') }}" class="inline-flex items-center gap-2 px-4 py-2.5 rounded-lg bg-forest-700 hover:bg-forest-900 text-white text-xs font-semibold shadow-sm transition">
            <span class="material-symbols-outlined text-base">more_time</span>
            <span>Tambah Jadwal</span>
        </a>
    </div>

    <div class="bg-white rounded-xl border border-surface-container shadow-sm overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full text-left text-sm">
                <thead class="bg-surface-container-low text-xs text-ink-600 uppercase border-b border-surface-container">
                    <tr>
                        <th class="px-6 py-3.5 w-16">No</th>
                        <th class="px-6 py-3.5">Rute Perjalanan</th>
                        <th class="px-6 py-3.5">Armada Mobil</th>
                        <th class="px-6 py-3.5">Waktu Keberangkatan</th>
                        <th class="px-6 py-3.5">Harga Tiket</th>
                        <th class="px-6 py-3.5">Sisa Kursi</th>
                        <th class="px-6 py-3.5">Status</th>
                        <th class="px-6 py-3.5 text-right">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-surface-container">
                    @forelse ($schedules as $index => $schedule)
                        <tr class="hover:bg-surface-container-low/40">
                            <td class="px-6 py-4 text-xs text-ink-600">
                                {{ $schedules->firstItem() + $index }}
                            </td>
                            <td class="px-6 py-4 font-semibold text-ink-900">
                                {{ $schedule->route->origin->name }} &rarr; {{ $schedule->route->destination->name }}
                            </td>
                            <td class="px-6 py-4 text-xs">
                                <div class="font-medium text-ink-900">{{ $schedule->vehicle->type }}</div>
                                <div class="font-mono text-ink-600">{{ $schedule->vehicle->plate_number }}</div>
                            </td>
                            <td class="px-6 py-4 text-xs">
                                <div class="font-semibold text-ink-900">{{ $schedule->departure_at->translatedFormat('d M Y') }}</div>
                                <div class="text-ink-600">Pukul {{ $schedule->departure_at->format('H:i') }} WIB</div>
                            </td>
                            <td class="px-6 py-4 font-semibold text-forest-700">
                                Rp {{ number_format($schedule->price, 0, ',', '.') }}
                            </td>
                            <td class="px-6 py-4 text-xs">
                                <span class="px-2.5 py-1 rounded-full font-semibold {{ $schedule->seatsLeft() > 0 ? 'bg-sage-100 text-forest-900' : 'bg-red-100 text-red-800' }}">
                                    {{ $schedule->seatsLeft() }} / {{ $schedule->vehicle->seat_capacity }} Kursi
                                </span>
                            </td>
                            <td class="px-6 py-4">
                                <span class="px-2 py-0.5 rounded text-xs font-semibold {{ $schedule->status->value === 'open' ? 'bg-green-100 text-green-800' : ($schedule->status->value === 'closed' ? 'bg-amber-100 text-amber-800' : ($schedule->status->value === 'cancelled' ? 'bg-red-100 text-red-800' : 'bg-surface-container text-ink-900')) }}">
                                    {{ $schedule->status->label() }}
                                </span>
                            </td>
                            <td class="px-6 py-4 text-right">
                                <div class="inline-flex items-center gap-2">
                                    <a href="{{ route('operator.schedules.edit', $schedule) }}" class="p-1.5 text-forest-700 hover:text-forest-900 hover:bg-sage-100 rounded-lg transition" title="Ubah Jadwal">
                                        <span class="material-symbols-outlined text-base">edit</span>
                                    </a>
                                    <form method="POST" action="{{ route('operator.schedules.destroy', $schedule) }}" onsubmit="return confirm('Hapus jadwal ini? Tindakan ini tidak dapat dibatalkan.');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="p-1.5 text-red-600 hover:text-red-800 hover:bg-red-50 rounded-lg transition" title="Hapus Jadwal">
                                            <span class="material-symbols-outlined text-base">delete</span>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="8" class="px-6 py-8 text-center text-sm text-ink-600">
                                Belum ada data jadwal keberangkatan.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        @if ($schedules->hasPages())
            <div class="px-6 py-4 border-t border-surface-container">
                {{ $schedules->links() }}
            </div>
        @endif
    </div>
</div>
@endsection
