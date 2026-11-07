@extends('layouts.admin')

@section('page_title', 'Master Data Armada Kendaraan')

@section('content')
<div class="space-y-6">
    <div class="flex flex-col sm:flex-row items-start sm:items-center justify-between gap-4">
        <div>
            <h2 class="text-xl font-bold text-ink-900">Armada Mobil Travel</h2>
            <p class="text-xs text-ink-600 mt-1">Daftar kendaraan operasional dengan kapasitas 5 kursi penumpang</p>
        </div>
        <a href="{{ route('operator.vehicles.create') }}" class="inline-flex items-center gap-2 px-4 py-2.5 rounded-lg bg-forest-700 hover:bg-forest-900 text-white text-xs font-semibold shadow-sm transition">
            <span class="material-symbols-outlined text-base">directions_car</span>
            <span>Tambah Mobil</span>
        </a>
    </div>

    <div class="bg-white rounded-xl border border-surface-container shadow-sm overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full text-left text-sm">
                <thead class="bg-surface-container-low text-xs text-ink-600 uppercase border-b border-surface-container">
                    <tr>
                        <th class="px-6 py-3.5 w-16">No</th>
                        <th class="px-6 py-3.5">Tipe Mobil</th>
                        <th class="px-6 py-3.5">Plat Nomor Polisi</th>
                        <th class="px-6 py-3.5">Warna</th>
                        <th class="px-6 py-3.5">Kapasitas Kursi</th>
                        <th class="px-6 py-3.5">Total Jadwal</th>
                        <th class="px-6 py-3.5 text-right">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-surface-container">
                    @forelse ($vehicles as $index => $vehicle)
                        <tr class="hover:bg-surface-container-low/40">
                            <td class="px-6 py-4 text-xs text-ink-600">
                                {{ $vehicles->firstItem() + $index }}
                            </td>
                            <td class="px-6 py-4 font-semibold text-ink-900">
                                {{ $vehicle->type }}
                            </td>
                            <td class="px-6 py-4 font-mono font-bold text-forest-700">
                                {{ $vehicle->plate_number }}
                            </td>
                            <td class="px-6 py-4 text-xs text-ink-600">
                                {{ $vehicle->color ?? '-' }}
                            </td>
                            <td class="px-6 py-4 text-xs">
                                <span class="px-2.5 py-1 rounded-full font-semibold bg-sage-100 text-forest-900">
                                    {{ $vehicle->seat_capacity }} Kursi
                                </span>
                            </td>
                            <td class="px-6 py-4 text-xs text-ink-600">
                                <span class="px-2 py-0.5 rounded bg-surface-container-low font-medium">{{ $vehicle->schedules_count }} jadwal</span>
                            </td>
                            <td class="px-6 py-4 text-right">
                                <div class="inline-flex items-center gap-2">
                                    <a href="{{ route('operator.vehicles.edit', $vehicle) }}" class="p-1.5 text-forest-700 hover:text-forest-900 hover:bg-sage-100 rounded-lg transition" title="Ubah Kendaraan">
                                        <span class="material-symbols-outlined text-base">edit</span>
                                    </a>
                                    <form method="POST" action="{{ route('operator.vehicles.destroy', $vehicle) }}" onsubmit="return confirm('Hapus kendaraan ini? Tindakan ini tidak dapat dibatalkan.');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="p-1.5 text-red-600 hover:text-red-800 hover:bg-red-50 rounded-lg transition" title="Hapus Kendaraan">
                                            <span class="material-symbols-outlined text-base">delete</span>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="px-6 py-8 text-center text-sm text-ink-600">
                                Belum ada data kendaraan armada.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        @if ($vehicles->hasPages())
            <div class="px-6 py-4 border-t border-surface-container">
                {{ $vehicles->links() }}
            </div>
        @endif
    </div>
</div>
@endsection
