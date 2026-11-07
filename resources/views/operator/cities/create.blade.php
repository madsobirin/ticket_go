@extends('layouts.admin')

@section('page_title', 'Tambah Kota Baru')

@section('content')
<div class="max-w-xl mx-auto space-y-6">
    <div class="flex items-center justify-between">
        <h2 class="text-xl font-bold text-ink-900">Formulir Tambah Kota</h2>
        <a href="{{ route('operator.cities.index') }}" class="text-xs font-semibold text-forest-700 hover:text-forest-900 inline-flex items-center gap-1">
            <span class="material-symbols-outlined text-sm">arrow_back</span>
            <span>Kembali ke Daftar</span>
        </a>
    </div>

    <div class="bg-white p-6 sm:p-8 rounded-xl border border-surface-container shadow-sm">
        <form method="POST" action="{{ route('operator.cities.store') }}" class="space-y-5">
            @csrf
            <div class="space-y-1.5">
                <label for="name" class="block text-xs font-semibold text-ink-900 uppercase tracking-wider">
                    Nama Kota / Wilayah <span class="text-red-600">*</span>
                </label>
                <input
                    type="text"
                    id="name"
                    name="name"
                    value="{{ old('name') }}"
                    placeholder="Contoh: Bandar Lampung"
                    required
                    class="w-full px-4 py-2.5 rounded-lg border border-surface-container bg-surface-container-low focus:bg-white focus:outline-none focus:ring-2 focus:ring-forest-700 text-sm transition"
                />
                @error('name')
                    <p class="text-xs text-red-600 mt-1">{{ $message }}</p>
                @enderror
                <p class="text-[11px] text-ink-600">Gunakan ejaan resmi kabupaten atau kota di Provinsi Lampung.</p>
            </div>

            <div class="pt-4 flex items-center justify-end gap-3 border-t border-surface-container">
                <a href="{{ route('operator.cities.index') }}" class="px-4 py-2 rounded-lg text-xs font-semibold text-ink-600 hover:bg-surface-container-low transition">
                    Batal
                </a>
                <button type="submit" class="px-5 py-2.5 rounded-lg bg-forest-700 hover:bg-forest-900 text-white text-xs font-semibold shadow-sm transition">
                    Simpan Kota
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
