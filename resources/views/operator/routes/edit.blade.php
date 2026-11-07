@extends('layouts.admin')

@section('page_title', 'Ubah Rute Perjalanan')

@section('content')
<div class="max-w-xl mx-auto space-y-6">
    <div class="flex items-center justify-between">
        <h2 class="text-xl font-bold text-ink-900">Ubah Rute Antar Kota</h2>
        <a href="{{ route('operator.routes.index') }}" class="text-xs font-semibold text-forest-700 hover:text-forest-900 inline-flex items-center gap-1">
            <span class="material-symbols-outlined text-sm">arrow_back</span>
            <span>Kembali ke Daftar</span>
        </a>
    </div>

    <div class="bg-white p-6 sm:p-8 rounded-xl border border-surface-container shadow-sm">
        <form method="POST" action="{{ route('operator.routes.update', $route) }}" class="space-y-5">
            @csrf
            @method('PUT')
            <div class="space-y-1.5">
                <label for="origin_city_id" class="block text-xs font-semibold text-ink-900 uppercase tracking-wider">
                    Kota Asal <span class="text-red-600">*</span>
                </label>
                <select
                    id="origin_city_id"
                    name="origin_city_id"
                    required
                    class="w-full px-4 py-2.5 rounded-lg border border-surface-container bg-surface-container-low focus:bg-white focus:outline-none focus:ring-2 focus:ring-forest-700 text-sm transition"
                >
                    @foreach ($cities as $c)
                        <option value="{{ $c->id }}" {{ old('origin_city_id', $route->origin_city_id) == $c->id ? 'selected' : '' }}>
                            {{ $c->name }}
                        </option>
                    @endforeach
                </select>
                @error('origin_city_id')
                    <p class="text-xs text-red-600 mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="space-y-1.5">
                <label for="destination_city_id" class="block text-xs font-semibold text-ink-900 uppercase tracking-wider">
                    Kota Tujuan <span class="text-red-600">*</span>
                </label>
                <select
                    id="destination_city_id"
                    name="destination_city_id"
                    required
                    class="w-full px-4 py-2.5 rounded-lg border border-surface-container bg-surface-container-low focus:bg-white focus:outline-none focus:ring-2 focus:ring-forest-700 text-sm transition"
                >
                    @foreach ($cities as $c)
                        <option value="{{ $c->id }}" {{ old('destination_city_id', $route->destination_city_id) == $c->id ? 'selected' : '' }}>
                            {{ $c->name }}
                        </option>
                    @endforeach
                </select>
                @error('destination_city_id')
                    <p class="text-xs text-red-600 mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="space-y-1.5">
                <label for="base_price" class="block text-xs font-semibold text-ink-900 uppercase tracking-wider">
                    Tarif Dasar Tiket (Rp) <span class="text-red-600">*</span>
                </label>
                <input
                    type="number"
                    id="base_price"
                    name="base_price"
                    value="{{ old('base_price', $route->base_price) }}"
                    min="1000"
                    step="1000"
                    required
                    class="w-full px-4 py-2.5 rounded-lg border border-surface-container bg-surface-container-low focus:bg-white focus:outline-none focus:ring-2 focus:ring-forest-700 text-sm transition"
                />
                @error('base_price')
                    <p class="text-xs text-red-600 mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="pt-4 flex items-center justify-end gap-3 border-t border-surface-container">
                <a href="{{ route('operator.routes.index') }}" class="px-4 py-2 rounded-lg text-xs font-semibold text-ink-600 hover:bg-surface-container-low transition">
                    Batal
                </a>
                <button type="submit" class="px-5 py-2.5 rounded-lg bg-forest-700 hover:bg-forest-900 text-white text-xs font-semibold shadow-sm transition">
                    Perbarui Rute
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
