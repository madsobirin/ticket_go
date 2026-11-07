@extends('layouts.app')

@section('body')
<header class="bg-forest-900 text-white shadow-sm sticky top-0 z-40">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex items-center justify-between h-16">
            <div class="flex items-center gap-8">
                <a href="{{ route('member.dashboard') }}" class="flex items-center gap-2.5">
                    <span class="material-symbols-outlined text-amber-500 text-2xl">directions_car</span>
                    <span class="font-serif font-bold text-xl tracking-tight text-white">Lintas Lampung</span>
                </a>
                <nav class="hidden md:flex items-center gap-1">
                    <a href="{{ route('member.dashboard') }}" class="px-3 py-2 rounded-lg text-sm font-medium {{ request()->routeIs('member.dashboard') ? 'bg-forest-700 text-white' : 'text-sage-100 hover:bg-forest-700/50' }}">
                        Beranda
                    </a>
                </nav>
            </div>

            <div class="flex items-center gap-4">
                <div class="hidden sm:flex flex-col text-right">
                    <span class="text-sm font-medium text-white">{{ auth()->user()->name }}</span>
                    <span class="text-xs text-sage-100/80">{{ auth()->user()->username }} · Member</span>
                </div>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="inline-flex items-center gap-1.5 px-3 py-1.5 rounded-lg bg-forest-700 hover:bg-forest-700/80 text-white text-xs font-medium transition">
                        <span class="material-symbols-outlined text-base">logout</span>
                        <span>Keluar</span>
                    </button>
                </form>
            </div>
        </div>
    </div>
</header>

@if (session('status'))
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 mt-4">
        <div class="p-4 rounded-lg bg-green-50 border border-green-200 text-green-800 flex items-center gap-2">
            <span class="material-symbols-outlined text-green-700 text-xl">check_circle</span>
            <span class="text-sm font-medium">{{ session('status') }}</span>
        </div>
    </div>
@endif

<main class="flex-1 max-w-7xl w-full mx-auto px-4 sm:px-6 lg:px-8 py-8">
    @yield('content')
</main>

<footer class="bg-surface-container-low border-t border-surface-container py-6 mt-auto">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 flex flex-col sm:flex-row items-center justify-between gap-4 text-xs text-ink-600">
        <p>&copy; {{ date('Y') }} Lintas Lampung — Layanan Travel Antar Kota Lampung. Semua hak dilindungi.</p>
        <p>Wilayah Operasional: Bandar Lampung · Metro · Pringsewu · Kotabumi · Tulang Bawang</p>
    </div>
</footer>
@endsection
