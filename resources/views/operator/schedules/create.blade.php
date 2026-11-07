@extends('layouts.admin')

@section('page_title', 'Tambah Jadwal Keberangkatan')

@section('content')
<div class="max-w-xl mx-auto space-y-6">
    <div class="flex items-center justify-between">
        <h2 class="text-xl font-bold text-ink-900">Formulir Jadwal Perjalanan</h2>
        <a href="{{ route('operator.schedules.index') }}" class="text-xs font-semibold text-forest-700 hover:text-forest-900 inline-flex items-center gap-1">
            <span class="material-symbols-outlined text-sm">arrow_back</span>
            <span>Kembali ke Daftar</span>
        </a>
    </div>

    <div class="bg-white p-6 sm:p-8 rounded-xl border border-surface-container shadow-sm">
        <form method="POST" action="{{ route('operator.schedules.store') }}" class="space-y-5">
            @csrf
            <div class="space-y-1.5">
                <label for="route_id" class="block text-xs font-semibold text-ink-900 uppercase tracking-wider">
                    Rute Trayek <span class="text-red-600">*</span>
                </label>
                <select
                    id="route_id"
                    name="route_id"
                    required
                    onchange="updateDefaultPrice(this)"
                    class="w-full px-4 py-2.5 rounded-lg border border-surface-container bg-surface-container-low focus:bg-white focus:outline-none focus:ring-2 focus:ring-forest-700 text-sm transition"
                >
                    <option value="">-- Pilih Rute --</option>
                    @foreach ($routes as $r)
                        <option value="{{ $r->id }}" data-price="{{ $r->base_price }}" {{ old('route_id') == $r->id ? 'selected' : '' }}>
                            {{ $r->origin->name }} &rarr; {{ $r->destination->name }} (Dasar: Rp {{ number_format($r->base_price, 0, ',', '.') }})
                        </option>
                    @endforeach
                </select>
                @error('route_id')
                    <p class="text-xs text-red-600 mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="space-y-1.5">
                <label for="vehicle_id" class="block text-xs font-semibold text-ink-900 uppercase tracking-wider">
                    Armada Mobil <span class="text-red-600">*</span>
                </label>
                <select
                    id="vehicle_id"
                    name="vehicle_id"
                    required
                    class="w-full px-4 py-2.5 rounded-lg border border-surface-container bg-surface-container-low focus:bg-white focus:outline-none focus:ring-2 focus:ring-forest-700 text-sm transition"
                >
                    <option value="">-- Pilih Mobil --</option>
                    @foreach ($vehicles as $v)
                        <option value="{{ $v->id }}" {{ old('vehicle_id') == $v->id ? 'selected' : '' }}>
                            {{ $v->type }} ({{ $v->plate_number }}) — {{ $v->seat_capacity }} Kursi
                        </option>
                    @endforeach
                </select>
                @error('vehicle_id')
                    <p class="text-xs text-red-600 mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                <div class="space-y-1.5">
                    <label for="price" class="block text-xs font-semibold text-ink-900 uppercase tracking-wider">
                        Harga Tiket (Rp) <span class="text-red-600">*</span>
                    </label>
                    <input
                        type="number"
                        id="price"
                        name="price"
                        value="{{ old('price', 50000) }}"
                        min="1000"
                        step="1000"
                        required
                        class="w-full px-4 py-2.5 rounded-lg border border-surface-container bg-surface-container-low focus:bg-white focus:outline-none focus:ring-2 focus:ring-forest-700 text-sm transition"
                    />
                    @error('price')
                        <p class="text-xs text-red-600 mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="space-y-1.5">
                    <label for="status" class="block text-xs font-semibold text-ink-900 uppercase tracking-wider">
                        Status Jadwal <span class="text-red-600">*</span>
                    </label>
                    <select
                        id="status"
                        name="status"
                        required
                        class="w-full px-4 py-2.5 rounded-lg border border-surface-container bg-surface-container-low focus:bg-white focus:outline-none focus:ring-2 focus:ring-forest-700 text-sm transition"
                    >
                        @foreach ($statuses as $st)
                            <option value="{{ $st->value }}" {{ old('status', 'open') === $st->value ? 'selected' : '' }}>
                                {{ $st->label() }}
                            </option>
                        @endforeach
                    </select>
                    @error('status')
                        <p class="text-xs text-red-600 mt-1">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <div class="space-y-1.5">
                <label for="departure_at" class="block text-xs font-semibold text-ink-900 uppercase tracking-wider">
                    Waktu Keberangkatan <span class="text-red-600">*</span>
                </label>
                <input
                    type="datetime-local"
                    id="departure_at"
                    name="departure_at"
                    value="{{ old('departure_at') }}"
                    required
                    class="w-full px-4 py-2.5 rounded-lg border border-surface-container bg-surface-container-low focus:bg-white focus:outline-none focus:ring-2 focus:ring-forest-700 text-sm transition"
                />
                @error('departure_at')
                    <p class="text-xs text-red-600 mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="pt-4 flex items-center justify-end gap-3 border-t border-surface-container">
                <a href="{{ route('operator.schedules.index') }}" class="px-4 py-2 rounded-lg text-xs font-semibold text-ink-600 hover:bg-surface-container-low transition">
                    Batal
                </a>
                <button type="submit" class="px-5 py-2.5 rounded-lg bg-forest-700 hover:bg-forest-900 text-white text-xs font-semibold shadow-sm transition">
                    Simpan Jadwal
                </button>
            </div>
        </form>
    </div>
</div>

<script>
    function updateDefaultPrice(selectEl) {
        const selectedOption = selectEl.options[selectEl.selectedIndex];
        const basePrice = selectedOption.getAttribute('data-price');
        const priceInput = document.getElementById('price');
        if (basePrice && priceInput) {
            priceInput.value = basePrice;
        }
    }
</script>
@endsection
