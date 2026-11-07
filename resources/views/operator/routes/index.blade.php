@extends('layouts.admin')

@section('page_title', 'Master Data Rute Antar Kota')

@section('content')
<div class="space-y-6">
    <div class="flex flex-col sm:flex-row items-start sm:items-center justify-between gap-4">
        <div>
            <h2 class="text-xl font-bold text-ink-900">Trayek Rute Antar Kota</h2>
            <p class="text-xs text-ink-600 mt-1">Daftar jalur trayek perjalanan beserta tarif dasar tiket</p>
        </div>
        <a href="{{ route('operator.routes.create') }}" class="inline-flex items-center gap-2 px-4 py-2.5 rounded-lg bg-forest-700 hover:bg-forest-900 text-white text-xs font-semibold shadow-sm transition">
            <span class="material-symbols-outlined text-base">add_road</span>
            <span>Tambah Rute</span>
        </a>
    </div>

    <div class="bg-white rounded-xl border border-surface-container shadow-sm overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full text-left text-sm">
                <thead class="bg-surface-container-low text-xs text-ink-600 uppercase border-b border-surface-container">
                    <tr>
                        <th class="px-6 py-3.5 w-16">No</th>
                        <th class="px-6 py-3.5">Kota Asal</th>
                        <th class="px-6 py-3.5">Kota Tujuan</th>
                        <th class="px-6 py-3.5">Tarif Dasar</th>
                        <th class="px-6 py-3.5">Total Jadwal</th>
                        <th class="px-6 py-3.5 text-right">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-surface-container">
                    @forelse ($routes as $index => $route)
                        <tr class="hover:bg-surface-container-low/40">
                            <td class="px-6 py-4 text-xs text-ink-600">
                                {{ $routes->firstItem() + $index }}
                            </td>
                            <td class="px-6 py-4 font-semibold text-ink-900">
                                {{ $route->origin->name }}
                            </td>
                            <td class="px-6 py-4 font-semibold text-ink-900">
                                {{ $route->destination->name }}
                            </td>
                            <td class="px-6 py-4 font-semibold text-forest-700">
                                Rp {{ number_format($route->base_price, 0, ',', '.') }}
                            </td>
                            <td class="px-6 py-4 text-xs text-ink-600">
                                <span class="px-2 py-0.5 rounded bg-surface-container-low font-medium">{{ $route->schedules_count }} jadwal</span>
                            </td>
                            <td class="px-6 py-4 text-right">
                                <div class="inline-flex items-center gap-2">
                                    <a href="{{ route('operator.routes.edit', $route) }}" class="p-1.5 text-forest-700 hover:text-forest-900 hover:bg-sage-100 rounded-lg transition" title="Ubah Rute">
                                        <span class="material-symbols-outlined text-base">edit</span>
                                    </a>
                                    <form method="POST" action="{{ route('operator.routes.destroy', $route) }}" onsubmit="return confirm('Hapus rute ini? Tindakan ini tidak dapat dibatalkan.');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="p-1.5 text-red-600 hover:text-red-800 hover:bg-red-50 rounded-lg transition" title="Hapus Rute">
                                            <span class="material-symbols-outlined text-base">delete</span>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="px-6 py-8 text-center text-sm text-ink-600">
                                Belum ada data rute perjalanan.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        @if ($routes->hasPages())
            <div class="px-6 py-4 border-t border-surface-container">
                {{ $routes->links() }}
            </div>
        @endif
    </div>
</div>
@endsection
