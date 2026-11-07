@extends('layouts.member')

@section('content')
<div class="space-y-6">
    <!-- Welcome Banner -->
    <div class="bg-white rounded-2xl p-6 sm:p-8 shadow-sm border border-surface-container flex flex-col md:flex-row items-start md:items-center justify-between gap-6">
        <div class="space-y-2">
            <span class="inline-block px-3 py-1 rounded-full text-xs font-semibold bg-sage-100 text-forest-700">
                Akun Penumpang Terverifikasi
            </span>
            <h1 class="text-2xl sm:text-3xl font-serif font-bold text-ink-900">
                Selamat Datang, {{ $user->name }}
            </h1>
            <p class="text-sm text-ink-600 max-w-xl">
                Layanan antar kota Lampung kini lebih mudah. Pesan kursi pilihanmu langsung dari ponsel, bayar dengan transfer bank, dan tunjukkan tiket digital saat penjemputan.
            </p>
        </div>
        <div class="flex flex-col sm:flex-row gap-3 w-full md:w-auto">
            <a href="#jadwal" class="inline-flex items-center justify-center gap-2 px-5 py-3 rounded-lg bg-forest-700 hover:bg-forest-900 text-white font-medium text-sm transition shadow-sm">
                <span class="material-symbols-outlined text-lg">search</span>
                <span>Cari Jadwal Travel</span>
            </a>
        </div>
    </div>

    <!-- Info Akun Ringkas -->
    <div class="grid grid-cols-1 sm:grid-cols-3 gap-4">
        <div class="bg-white p-5 rounded-xl border border-surface-container shadow-sm">
            <span class="text-xs text-ink-600 font-medium">Username</span>
            <p class="text-lg font-bold text-ink-900 mt-1">{{ $user->username }}</p>
        </div>
        <div class="bg-white p-5 rounded-xl border border-surface-container shadow-sm">
            <span class="text-xs text-ink-600 font-medium">Nomor Telepon</span>
            <p class="text-lg font-bold text-ink-900 mt-1">+62 {{ $user->phone }}</p>
        </div>
        <div class="bg-white p-5 rounded-xl border border-surface-container shadow-sm">
            <span class="text-xs text-ink-600 font-medium">Alamat Jemput Default</span>
            <p class="text-sm font-semibold text-ink-900 mt-1 truncate">{{ $user->address ?? '-' }}</p>
        </div>
    </div>

    <!-- Riwayat Pemesanan Terakhir -->
    <div class="bg-white rounded-xl border border-surface-container shadow-sm overflow-hidden">
        <div class="px-6 py-4 border-b border-surface-container flex items-center justify-between">
            <h2 class="font-bold text-ink-900">Riwayat Pemesanan Terkini</h2>
            <span class="text-xs text-ink-600">5 transaksi terakhir</span>
        </div>

        @if ($recentBookings->isEmpty())
            <div class="p-8 text-center space-y-3">
                <span class="material-symbols-outlined text-4xl text-ink-600/40">confirmation_number</span>
                <p class="text-sm text-ink-600">Belum ada riwayat pemesanan tiket.</p>
                <a href="#jadwal" class="inline-flex items-center gap-1.5 text-xs font-semibold text-forest-700 hover:text-forest-900">
                    <span>Mulai pemesanan tiket pertama Anda</span>
                    <span class="material-symbols-outlined text-sm">arrow_forward</span>
                </a>
            </div>
        @else
            <div class="divide-y divide-surface-container">
                @foreach ($recentBookings as $booking)
                    <div class="p-5 flex flex-col sm:flex-row items-start sm:items-center justify-between gap-4 hover:bg-surface-container-low/40 transition">
                        <div class="space-y-1">
                            <div class="flex items-center gap-2">
                                <span class="font-mono text-xs font-bold text-forest-700">{{ $booking->code }}</span>
                                <span class="text-xs px-2 py-0.5 rounded font-semibold bg-surface-container text-ink-900">
                                    Kursi {{ $booking->seat_number }}
                                </span>
                                <span class="text-xs px-2 py-0.5 rounded font-semibold bg-sage-100 text-forest-900">
                                    {{ $booking->status->label() }}
                                </span>
                            </div>
                            <p class="text-sm font-bold text-ink-900">
                                {{ $booking->schedule->route->originCity->name }} &rarr; {{ $booking->schedule->route->destinationCity->name }}
                            </p>
                            <p class="text-xs text-ink-600">
                                Berangkat: {{ $booking->schedule->departure_at->translatedFormat('d M Y, H:i') }} WIB
                            </p>
                        </div>
                        <div class="text-right sm:text-right">
                            <span class="text-sm font-bold text-forest-900">Rp {{ number_format($booking->price_snapshot, 0, ',', '.') }}</span>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif
    </div>
</div>
@endsection
