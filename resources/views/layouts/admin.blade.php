@extends('layouts.app')

@section('body')
<div class="min-h-screen flex flex-col md:flex-row bg-[#f6fbf4]">
    <!-- Sidebar -->
    <aside class="w-full md:w-64 bg-forest-900 text-white flex flex-col shrink-0">
        <div class="h-16 flex items-center px-6 border-b border-forest-700/60 gap-3">
            <span class="material-symbols-outlined text-amber-500 text-2xl">directions_car</span>
            <div>
                <span class="font-serif font-bold text-lg tracking-tight text-white block leading-tight">Lintas Lampung</span>
                <span class="text-[11px] text-sage-100/70 uppercase tracking-wider font-semibold">
                    {{ auth()->user()->isAdmin() ? 'Konsol Administrator' : 'Konsol Loket' }}
                </span>
            </div>
        </div>

        <nav class="flex-1 px-3 py-4 space-y-1 text-sm font-medium">
            @if (auth()->user()->isAdmin())
                <a href="{{ route('admin.dashboard') }}" class="flex items-center gap-3 px-3 py-2.5 rounded-lg {{ request()->routeIs('admin.dashboard') ? 'bg-forest-700 text-white' : 'text-sage-100 hover:bg-forest-700/50' }}">
                    <span class="material-symbols-outlined text-xl">dashboard</span>
                    <span>Dasbor Admin</span>
                </a>

                <div class="pt-3 pb-1 px-3 text-[11px] font-semibold text-sage-100/60 uppercase tracking-wider">
                    Menu Admin
                </div>

                <a href="{{ route('admin.pelanggan') }}" class="flex items-center gap-3 px-3 py-2 rounded-lg {{ request()->routeIs('admin.pelanggan') ? 'bg-forest-700 text-white' : 'text-sage-100 hover:bg-forest-700/50' }}">
                    <span class="material-symbols-outlined text-xl">group</span>
                    <span>Pelanggan</span>
                </a>

                <a href="{{ route('admin.keluhan') }}" class="flex items-center gap-3 px-3 py-2 rounded-lg {{ request()->routeIs('admin.keluhan') ? 'bg-forest-700 text-white' : 'text-sage-100 hover:bg-forest-700/50' }}">
                    <span class="material-symbols-outlined text-xl">report_problem</span>
                    <span>Keluhan</span>
                </a>
            @endif

            @if (auth()->user()->isOperator() || auth()->user()->isAdmin())
                <a href="{{ route('operator.dashboard') }}" class="flex items-center gap-3 px-3 py-2.5 rounded-lg {{ request()->routeIs('operator.dashboard') ? 'bg-forest-700 text-white' : 'text-sage-100 hover:bg-forest-700/50' }}">
                    <span class="material-symbols-outlined text-xl">confirmation_number</span>
                    <span>Dasbor Loket</span>
                </a>

                <div class="pt-3 pb-1 px-3 text-[11px] font-semibold text-sage-100/60 uppercase tracking-wider">
                    Operasional
                </div>

                <a href="{{ route('operator.konfirmasi-pembayaran') }}" class="flex items-center gap-3 px-3 py-2 rounded-lg {{ request()->routeIs('operator.konfirmasi-pembayaran*') ? 'bg-forest-700 text-white' : 'text-sage-100 hover:bg-forest-700/50' }}">
                    <span class="material-symbols-outlined text-xl">payments</span>
                    <span>Periksa Bayar</span>
                </a>

                <a href="{{ route('operator.pesanan') }}" class="flex items-center gap-3 px-3 py-2 rounded-lg {{ request()->routeIs('operator.pesanan') ? 'bg-forest-700 text-white' : 'text-sage-100 hover:bg-forest-700/50' }}">
                    <span class="material-symbols-outlined text-xl">receipt_long</span>
                    <span>Kelola Pesanan</span>
                </a>

                <a href="{{ route('operator.layani-pemesanan') }}" class="flex items-center gap-3 px-3 py-2 rounded-lg {{ request()->routeIs('operator.layani-pemesanan') ? 'bg-forest-700 text-white' : 'text-sage-100 hover:bg-forest-700/50' }}">
                    <span class="material-symbols-outlined text-xl">support_agent</span>
                    <span>Layani Pemesanan</span>
                </a>

                <div class="pt-3 pb-1 px-3 text-[11px] font-semibold text-sage-100/60 uppercase tracking-wider">
                    Master Data
                </div>

                <a href="{{ route('operator.cities.index') }}" class="flex items-center gap-3 px-3 py-2 rounded-lg {{ request()->routeIs('operator.cities.*') ? 'bg-forest-700 text-white' : 'text-sage-100 hover:bg-forest-700/50' }}">
                    <span class="material-symbols-outlined text-xl">location_city</span>
                    <span>Kota</span>
                </a>

                <a href="{{ route('operator.routes.index') }}" class="flex items-center gap-3 px-3 py-2 rounded-lg {{ request()->routeIs('operator.routes.*') ? 'bg-forest-700 text-white' : 'text-sage-100 hover:bg-forest-700/50' }}">
                    <span class="material-symbols-outlined text-xl">alt_route</span>
                    <span>Rute Antar Kota</span>
                </a>

                <a href="{{ route('operator.vehicles.index') }}" class="flex items-center gap-3 px-3 py-2 rounded-lg {{ request()->routeIs('operator.vehicles.*') ? 'bg-forest-700 text-white' : 'text-sage-100 hover:bg-forest-700/50' }}">
                    <span class="material-symbols-outlined text-xl">directions_car</span>
                    <span>Armada Kendaraan</span>
                </a>

                <a href="{{ route('operator.schedules.index') }}" class="flex items-center gap-3 px-3 py-2 rounded-lg {{ request()->routeIs('operator.schedules.*') ? 'bg-forest-700 text-white' : 'text-sage-100 hover:bg-forest-700/50' }}">
                    <span class="material-symbols-outlined text-xl">calendar_month</span>
                    <span>Jadwal Keberangkatan</span>
                </a>
            @endif
        </nav>

        <div class="p-4 border-t border-forest-700/60 bg-forest-900/80">
            <div class="flex items-center justify-between mb-3">
                <div class="truncate">
                    <p class="text-sm font-medium text-white truncate">{{ auth()->user()->name }}</p>
                    <span class="inline-block mt-0.5 px-2 py-0.5 rounded text-[10px] font-semibold uppercase tracking-wider {{ auth()->user()->isAdmin() ? 'bg-amber-500 text-forest-900' : 'bg-forest-700 text-sage-100' }}">
                        {{ auth()->user()->isAdmin() ? 'Super Admin' : (auth()->user()->isOperator() ? 'Operator Loket' : 'Member') }}
                    </span>
                </div>
            </div>
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="w-full flex items-center justify-center gap-2 px-3 py-2 rounded-lg bg-forest-700 hover:bg-forest-700/80 text-white text-xs font-medium transition">
                    <span class="material-symbols-outlined text-base">logout</span>
                    <span>Keluar Konsol</span>
                </button>
            </form>
        </div>
    </aside>

    <!-- Content Area -->
    <div class="flex-1 flex flex-col min-w-0">
        <!-- Top bar -->
        <header class="h-16 bg-white border-b border-surface-container flex items-center justify-between px-6">
            <h1 class="text-lg font-bold text-ink-900">
                @yield('page_title', 'Dasbor')
            </h1>
            <div class="flex items-center gap-3 text-xs text-ink-600">
                <span>{{ now()->translatedFormat('l, d F Y') }}</span>
            </div>
        </header>

        @if (session('status'))
            <div class="mx-6 mt-4">
                <div class="p-4 rounded-lg bg-green-50 border border-green-200 text-green-800 flex items-center gap-2">
                    <span class="material-symbols-outlined text-green-700 text-xl">check_circle</span>
                    <span class="text-sm font-medium">{{ session('status') }}</span>
                </div>
            </div>
        @endif

        @if (session('error'))
            <div class="mx-6 mt-4">
                <div class="p-4 rounded-lg bg-red-50 border border-red-200 text-red-800 flex items-center gap-2">
                    <span class="material-symbols-outlined text-red-600 text-xl">error</span>
                    <span class="text-sm font-medium">{{ session('error') }}</span>
                </div>
            </div>
        @endif

        <main class="flex-1 p-6">
            @yield('content')
        </main>
    </div>
</div>
@endsection
