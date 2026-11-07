@extends('layouts.admin')

@section('page_title', 'Dasbor Administrator Sistem')

@section('content')
<div class="space-y-6">
    <!-- Stat Cards -->
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-5">
        <div class="bg-white p-5 rounded-xl border border-surface-container shadow-sm flex items-center justify-between">
            <div>
                <p class="text-xs text-ink-600 font-medium">Total Pengguna</p>
                <p class="text-2xl font-bold text-ink-900 mt-1">{{ $totalUsers }}</p>
                <p class="text-[11px] text-ink-600 mt-0.5">Member & Staf</p>
            </div>
            <div class="w-12 h-12 rounded-lg bg-surface-container-low text-forest-700 flex items-center justify-center">
                <span class="material-symbols-outlined text-2xl">group</span>
            </div>
        </div>

        <div class="bg-white p-5 rounded-xl border border-surface-container shadow-sm flex items-center justify-between">
            <div>
                <p class="text-xs text-ink-600 font-medium">Rute Antar Kota</p>
                <p class="text-2xl font-bold text-ink-900 mt-1">{{ $totalRoutes }}</p>
                <p class="text-[11px] text-ink-600 mt-0.5">Trayek aktif Lampung</p>
            </div>
            <div class="w-12 h-12 rounded-lg bg-sage-100 text-forest-900 flex items-center justify-center">
                <span class="material-symbols-outlined text-2xl">alt_route</span>
            </div>
        </div>

        <div class="bg-white p-5 rounded-xl border border-surface-container shadow-sm flex items-center justify-between">
            <div>
                <p class="text-xs text-ink-600 font-medium">Total Armada Mobil</p>
                <p class="text-2xl font-bold text-ink-900 mt-1">{{ $totalVehicles }}</p>
                <p class="text-[11px] text-ink-600 mt-0.5">Kapasitas 5 kursi</p>
            </div>
            <div class="w-12 h-12 rounded-lg bg-amber-50 text-amber-600 flex items-center justify-center">
                <span class="material-symbols-outlined text-2xl">directions_car</span>
            </div>
        </div>

        <div class="bg-white p-5 rounded-xl border border-surface-container shadow-sm flex items-center justify-between">
            <div>
                <p class="text-xs text-ink-600 font-medium">Pendapatan Tiket Lunas</p>
                <p class="text-xl font-bold text-forest-700 mt-1">Rp {{ number_format($paidBookingsRevenue, 0, ',', '.') }}</p>
                <p class="text-[11px] text-ink-600 mt-0.5">{{ $totalBookings }} total pemesanan</p>
            </div>
            <div class="w-12 h-12 rounded-lg bg-green-50 text-green-700 flex items-center justify-center">
                <span class="material-symbols-outlined text-2xl">payments</span>
            </div>
        </div>
    </div>

    <!-- Pengguna Terbaru -->
    <div class="bg-white rounded-xl border border-surface-container shadow-sm overflow-hidden">
        <div class="px-6 py-4 border-b border-surface-container flex items-center justify-between">
            <h2 class="font-bold text-ink-900">Pengguna Terdaftar Terbaru</h2>
            <span class="text-xs text-ink-600">{{ $recentUsers->count() }} akun terakhir</span>
        </div>

        <div class="overflow-x-auto">
            <table class="w-full text-left text-sm">
                <thead class="bg-surface-container-low text-xs text-ink-600 uppercase border-b border-surface-container">
                    <tr>
                        <th class="px-6 py-3">Nama</th>
                        <th class="px-6 py-3">Email</th>
                        <th class="px-6 py-3">Username</th>
                        <th class="px-6 py-3">Peran</th>
                        <th class="px-6 py-3">Tanggal Daftar</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-surface-container">
                    @foreach ($recentUsers as $u)
                        <tr class="hover:bg-surface-container-low/40">
                            <td class="px-6 py-4 font-medium text-ink-900">{{ $u->name }}</td>
                            <td class="px-6 py-4 text-xs text-ink-600">{{ $u->email }}</td>
                            <td class="px-6 py-4 font-mono text-xs">{{ $u->username }}</td>
                            <td class="px-6 py-4">
                                <span class="px-2 py-0.5 rounded text-xs font-semibold {{ $u->role->value === 'admin' ? 'bg-amber-100 text-amber-800' : ($u->role->value === 'operator' ? 'bg-blue-100 text-blue-800' : 'bg-surface-container text-ink-900') }}">
                                    {{ $u->role->label() }}
                                </span>
                            </td>
                            <td class="px-6 py-4 text-xs text-ink-600">{{ $u->created_at->translatedFormat('d M Y, H:i') }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
