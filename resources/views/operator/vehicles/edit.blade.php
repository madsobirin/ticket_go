@extends('layouts.admin')

@section('page_title', 'Ubah Kendaraan Armada')

@section('content')
<div class="max-w-xl mx-auto space-y-6">
    <div class="flex items-center justify-between">
        <h2 class="text-xl font-bold text-ink-900">Ubah Data Kendaraan</h2>
        <a href="{{ route('operator.vehicles.index') }}" class="text-xs font-semibold text-forest-700 hover:text-forest-900 inline-flex items-center gap-1">
            <span class="material-symbols-outlined text-sm">arrow_back</span>
            <span>Kembali ke Daftar</span>
        </a>
    </div>

    <div class="bg-white p-6 sm:p-8 rounded-xl border border-surface-container shadow-sm">
        <form method="POST" action="{{ route('operator.vehicles.update', $vehicle) }}" class="space-y-5">
            @csrf
            @method('PUT')
            <div class="space-y-1.5">
                <label for="type" class="block text-xs font-semibold text-ink-900 uppercase tracking-wider">
                    Tipe Mobil / Model <span class="text-red-600">*</span>
                </label>
                <input
                    type="text"
                    id="type"
                    name="type"
                    value="{{ old('type', $vehicle->type) }}"
                    required
                    class="w-full px-4 py-2.5 rounded-lg border border-surface-container bg-surface-container-low focus:bg-white focus:outline-none focus:ring-2 focus:ring-forest-700 text-sm transition"
                />
                @error('type')
                    <p class="text-xs text-red-600 mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="space-y-1.5">
                <label for="plate_number" class="block text-xs font-semibold text-ink-900 uppercase tracking-wider">
                    Nomor Plat Polisi <span class="text-red-600">*</span>
                </label>
                <input
                    type="text"
                    id="plate_number"
                    name="plate_number"
                    value="{{ old('plate_number', $vehicle->plate_number) }}"
                    required
                    class="w-full px-4 py-2.5 rounded-lg border border-surface-container bg-surface-container-low focus:bg-white focus:outline-none focus:ring-2 focus:ring-forest-700 text-sm font-mono transition"
                />
                @error('plate_number')
                    <p class="text-xs text-red-600 mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                <div class="space-y-1.5">
                    <label for="color" class="block text-xs font-semibold text-ink-900 uppercase tracking-wider">
                        Warna Mobil
                    </label>
                    <input
                        type="text"
                        id="color"
                        name="color"
                        value="{{ old('color', $vehicle->color) }}"
                        class="w-full px-4 py-2.5 rounded-lg border border-surface-container bg-surface-container-low focus:bg-white focus:outline-none focus:ring-2 focus:ring-forest-700 text-sm transition"
                    />
                    @error('color')
                        <p class="text-xs text-red-600 mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="space-y-1.5">
                    <label for="seat_capacity" class="block text-xs font-semibold text-ink-900 uppercase tracking-wider">
                        Kapasitas Kursi <span class="text-red-600">*</span>
                    </label>
                    <input
                        type="number"
                        id="seat_capacity"
                        name="seat_capacity"
                        value="{{ old('seat_capacity', $vehicle->seat_capacity) }}"
                        min="1"
                        max="50"
                        required
                        class="w-full px-4 py-2.5 rounded-lg border border-surface-container bg-surface-container-low focus:bg-white focus:outline-none focus:ring-2 focus:ring-forest-700 text-sm transition"
                    />
                    @error('seat_capacity')
                        <p class="text-xs text-red-600 mt-1">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <div class="pt-4 flex items-center justify-end gap-3 border-t border-surface-container">
                <a href="{{ route('operator.vehicles.index') }}" class="px-4 py-2 rounded-lg text-xs font-semibold text-ink-600 hover:bg-surface-container-low transition">
                    Batal
                </a>
                <button type="submit" class="px-5 py-2.5 rounded-lg bg-forest-700 hover:bg-forest-900 text-white text-xs font-semibold shadow-sm transition">
                    Perbarui Kendaraan
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
