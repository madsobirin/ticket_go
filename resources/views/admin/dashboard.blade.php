<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Super Admin - Trans Lampung Express</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=DM+Sans:ital,opsz,wght@0,9..40,100..1000;1,9..40,100..1000&family=Source+Serif+4:ital,opsz,wght@0,8..60,200..900;1,8..60,200..900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&display=swap" rel="stylesheet">

    <style>
        @layer base {
            html, body {
                margin: 0;
                padding: 0;
            }
            body {
                overscroll-behavior: none;
            }
            main > :first-child {
                margin-top: 0 !important;
            }
            main > :last-child {
                margin-bottom: 0 !important;
            }
        }
        ::-webkit-scrollbar {
            display: none;
        }
    </style>

    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            darkMode: "class",
            theme: {
                extend: {
                    colors: {
                        "primary": "#0b4237",
                        "forest-900": "#173B35",
                        "forest-700": "#285A4E",
                        "primary-container": "#285a4e",
                        "cream-50": "#FAF8F2",
                        "paper-0": "#FFFFFF",
                        "ink-900": "#202521",
                        "ink-600": "#65716A",
                        "amber-500": "#D9953D",
                        "sage-100": "#E8EFE8",
                        "green-700": "#347653",
                        "red-600": "#B94B43",
                        "surface-container-low": "#f0f5ee",
                        "surface-container": "#ebefe8",
                        "surface-container-high": "#e5e9e3",
                        "surface-container-highest": "#dfe4dd",
                        "secondary-container": "#c1e8df",
                        "on-secondary-container": "#466962",
                        "tertiary-container": "#754700",
                        "on-primary": "#ffffff"
                    },
                    fontFamily: {
                        "headline-md": ['"Source Serif 4"'],
                        "headline-lg": ['"Source Serif 4"'],
                        "headline-xl": ['"Source Serif 4"'],
                        "headline-sm": ['"Source Serif 4"'],
                        "body-md": ["DM Sans"],
                        "body-sm": ["DM Sans"],
                        "body-lg": ["DM Sans"],
                        "label-lg": ["DM Sans"],
                        "label-md": ["DM Sans"],
                        "label-sm": ["DM Sans"],
                        "title-md": ["DM Sans"],
                        "title-sm": ["DM Sans"]
                    }
                }
            }
        };
    </script>
</head>

<body class="bg-cream-50 font-body-md text-ink-900 antialiased selection:bg-secondary-container selection:text-forest-900 min-h-screen">
    <header class="fixed top-0 left-0 right-0 w-full z-40 bg-forest-900 text-cream-50 shadow-md">
        <div class="h-16 max-w-7xl mx-auto px-6 lg:px-12 flex items-center justify-between">
            <div class="flex items-center gap-3">
                <div class="w-9 h-9 rounded-lg bg-red-600 text-white flex items-center justify-center font-bold">
                    <span class="material-symbols-outlined text-[20px]">admin_panel_settings</span>
                </div>
                <div>
                    <div class="flex items-center gap-2">
                        <span class="font-headline-sm text-lg font-semibold tracking-tight leading-none text-white">Trans Lampung</span>
                        <span class="bg-red-600/20 text-red-400 text-[10px] font-bold px-2 py-0.5 rounded tracking-wider uppercase border border-red-500/30">Super Admin</span>
                    </div>
                    <span class="text-[11px] text-cream-50/70 font-medium">Panel Pengelolaan Pusat</span>
                </div>
            </div>

            <nav class="hidden lg:flex items-center gap-1">
                <a href="{{ route('admin.dashboard') }}" class="font-semibold text-xs bg-forest-700 text-white px-3 py-1.5 rounded-lg transition-colors flex items-center gap-1.5">
                    <span class="material-symbols-outlined text-[16px]">dashboard</span>
                    Dashboard
                </a>
                <a href="{{ route('admin.pelanggan') }}" class="font-medium text-xs text-cream-50/80 hover:text-white px-3 py-1.5 rounded-lg hover:bg-forest-700/50 transition-colors flex items-center gap-1.5">
                    <span class="material-symbols-outlined text-[16px]">group</span>
                    Data Pelanggan
                </a>
                <a href="{{ route('admin.jadwal') }}" class="font-medium text-xs text-cream-50/80 hover:text-white px-3 py-1.5 rounded-lg hover:bg-forest-700/50 transition-colors flex items-center gap-1.5">
                    <span class="material-symbols-outlined text-[16px]">schedule</span>
                    Kelola Jadwal
                </a>
                <a href="{{ route('admin.kota') }}" class="font-medium text-xs text-cream-50/80 hover:text-white px-3 py-1.5 rounded-lg hover:bg-forest-700/50 transition-colors flex items-center gap-1.5">
                    <span class="material-symbols-outlined text-[16px]">alt_route</span>
                    Kota &amp; Rute
                </a>
                <a href="{{ route('admin.kendaraan') }}" class="font-medium text-xs text-cream-50/80 hover:text-white px-3 py-1.5 rounded-lg hover:bg-forest-700/50 transition-colors flex items-center gap-1.5">
                    <span class="material-symbols-outlined text-[16px]">directions_bus</span>
                    Kendaraan
                </a>
                <a href="{{ route('admin.keluhan') }}" class="font-medium text-xs text-cream-50/80 hover:text-white px-3 py-1.5 rounded-lg hover:bg-forest-700/50 transition-colors flex items-center gap-1.5 relative">
                    <span class="material-symbols-outlined text-[16px]">report_problem</span>
                    Keluhan
                    <span class="w-4 h-4 rounded-full bg-red-600 text-white font-bold text-[9px] flex items-center justify-center">2</span>
                </a>
            </nav>

            <div class="flex items-center gap-3">
                <div class="hidden sm:flex flex-col text-right">
                    <span class="text-xs font-bold text-white">Hendra Wijaya</span>
                    <span class="text-[10px] text-cream-50/70">Administrator Utama</span>
                </div>
                <div class="w-9 h-9 rounded-full bg-red-600 text-white flex items-center justify-center font-bold text-xs shadow-xs">
                    HW
                </div>
            </div>
        </div>
    </header>

    <main class="w-full pt-24 pb-16 bg-cream-50 min-h-screen">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-12 space-y-8">
            <div class="bg-paper-0 rounded-2xl p-6 sm:p-8 shadow-sm border border-surface-container flex flex-col md:flex-row md:items-center justify-between gap-6">
                <div>
                    <div class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-red-600/15 text-red-600 text-xs font-semibold mb-2">
                        <span class="material-symbols-outlined text-[16px]">shield</span>
                        Pusat Kendali Administrasi Sistem Tiket Go
                    </div>
                    <h1 class="font-headline-lg text-2xl sm:text-3xl font-semibold text-forest-900 tracking-tight">Dashboard Master Administrator</h1>
                    <p class="text-sm text-ink-600 mt-1">Ringkasan performa armada travel, manajemen data master, jadwal perjalanan antarkota, dan monitoring kepuasan pelanggan.</p>
                </div>
                <div class="flex flex-wrap items-center gap-2.5">
                    <a href="{{ route('admin.jadwal') }}" class="px-4 py-2.5 rounded-xl bg-forest-700 hover:bg-forest-900 text-white font-semibold text-xs transition-colors flex items-center gap-1.5 shadow-xs">
                        <span class="material-symbols-outlined text-[18px]">add</span>
                        Tambah Jadwal
                    </a>
                    <a href="{{ route('admin.kendaraan') }}" class="px-4 py-2.5 rounded-xl bg-surface-container hover:bg-surface-container-high text-forest-900 font-semibold text-xs transition-colors flex items-center gap-1.5">
                        <span class="material-symbols-outlined text-[18px]">directions_bus</span>
                        Armada
                    </a>
                    <a href="{{ route('admin.keluhan') }}" class="px-4 py-2.5 rounded-xl bg-red-600/15 hover:bg-red-600 hover:text-white text-red-600 font-semibold text-xs transition-colors flex items-center gap-1.5">
                        <span class="material-symbols-outlined text-[18px]">report_problem</span>
                        2 Keluhan Baru
                    </a>
                </div>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-5 gap-4">
                <!-- 1. DATA PELANGGAN -->
                <a href="{{ route('admin.pelanggan') }}" class="bg-paper-0 p-5 rounded-2xl border border-surface-container hover:border-forest-700/40 shadow-xs transition-all space-y-2 group">
                    <div class="flex items-center justify-between text-ink-600">
                        <span class="text-xs font-semibold uppercase tracking-wider">Total Pelanggan</span>
                        <div class="w-8 h-8 rounded-lg bg-secondary-container text-forest-700 flex items-center justify-center group-hover:scale-105 transition-transform">
                            <span class="material-symbols-outlined text-[18px]">group</span>
                        </div>
                    </div>
                    <div class="flex items-baseline gap-2">
                        <span class="font-mono text-2xl font-bold text-forest-900">1.420</span>
                        <span class="text-[11px] text-green-700 font-bold">+64 bln ini</span>
                    </div>
                    <span class="text-[11px] text-forest-700 font-medium block">Kelola Member &rarr;</span>
                </a>

                <!-- 2. JADWAL -->
                <a href="{{ route('admin.jadwal') }}" class="bg-paper-0 p-5 rounded-2xl border border-surface-container hover:border-forest-700/40 shadow-xs transition-all space-y-2 group">
                    <div class="flex items-center justify-between text-ink-600">
                        <span class="text-xs font-semibold uppercase tracking-wider">Jadwal Perjalanan</span>
                        <div class="w-8 h-8 rounded-lg bg-forest-700/15 text-forest-700 flex items-center justify-center group-hover:scale-105 transition-transform">
                            <span class="material-symbols-outlined text-[18px]">schedule</span>
                        </div>
                    </div>
                    <div class="flex items-baseline gap-2">
                        <span class="font-mono text-2xl font-bold text-forest-900">24 Trip</span>
                        <span class="text-[11px] text-forest-700 font-bold">6 Rute Aktif</span>
                    </div>
                    <span class="text-[11px] text-forest-700 font-medium block">Kelola Jadwal &rarr;</span>
                </a>

                <!-- 3. KOTA & RUTE -->
                <a href="{{ route('admin.kota') }}" class="bg-paper-0 p-5 rounded-2xl border border-surface-container hover:border-forest-700/40 shadow-xs transition-all space-y-2 group">
                    <div class="flex items-center justify-between text-ink-600">
                        <span class="text-xs font-semibold uppercase tracking-wider">Kota &amp; Pool</span>
                        <div class="w-8 h-8 rounded-lg bg-amber-500/15 text-amber-500 flex items-center justify-center group-hover:scale-105 transition-transform">
                            <span class="material-symbols-outlined text-[18px]">alt_route</span>
                        </div>
                    </div>
                    <div class="flex items-baseline gap-2">
                        <span class="font-mono text-2xl font-bold text-forest-900">6 Kota</span>
                        <span class="text-[11px] text-ink-600 font-medium">8 Pool Loket</span>
                    </div>
                    <span class="text-[11px] text-forest-700 font-medium block">Master Kota Asal/Tujuan &rarr;</span>
                </a>

                <!-- 4. KENDARAAN -->
                <a href="{{ route('admin.kendaraan') }}" class="bg-paper-0 p-5 rounded-2xl border border-surface-container hover:border-forest-700/40 shadow-xs transition-all space-y-2 group">
                    <div class="flex items-center justify-between text-ink-600">
                        <span class="text-xs font-semibold uppercase tracking-wider">Total Armada</span>
                        <div class="w-8 h-8 rounded-lg bg-blue-600/15 text-blue-600 flex items-center justify-center group-hover:scale-105 transition-transform">
                            <span class="material-symbols-outlined text-[18px]">directions_bus</span>
                        </div>
                    </div>
                    <div class="flex items-baseline gap-2">
                        <span class="font-mono text-2xl font-bold text-forest-900">12 Unit</span>
                        <span class="text-[11px] text-green-700 font-bold">9 Operasi</span>
                    </div>
                    <span class="text-[11px] text-forest-700 font-medium block">Kelola Kendaraan &rarr;</span>
                </a>

                <!-- 5. KELUHAN -->
                <a href="{{ route('admin.keluhan') }}" class="bg-paper-0 p-5 rounded-2xl border border-red-600/30 hover:border-red-600 shadow-xs transition-all space-y-2 group">
                    <div class="flex items-center justify-between text-ink-600">
                        <span class="text-xs font-semibold uppercase tracking-wider">Keluhan Aduan</span>
                        <div class="w-8 h-8 rounded-lg bg-red-600/15 text-red-600 flex items-center justify-center group-hover:scale-105 transition-transform">
                            <span class="material-symbols-outlined text-[18px]">report_problem</span>
                        </div>
                    </div>
                    <div class="flex items-baseline gap-2">
                        <span class="font-mono text-2xl font-bold text-red-600">2 Baru</span>
                        <span class="text-[11px] text-ink-600">8 Total</span>
                    </div>
                    <span class="text-[11px] text-red-600 font-bold block">Tanggapi Keluhan &rarr;</span>
                </a>
            </div>

            <!-- GRAFIK & KELUHAN TERBARU -->
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 items-start">

                <!-- STATUS RUTE POPULER & OKUPANSI (KOLOM KIRI 7 SPAN) -->
                <div class="lg:col-span-7 bg-paper-0 rounded-2xl p-6 shadow-sm border border-surface-container space-y-5">
                    <div class="flex items-center justify-between pb-3 border-b border-surface-container">
                        <div>
                            <h2 class="font-title-md text-base font-bold text-forest-900">Okupansi Rute Perjalanan Terpadat</h2>
                            <span class="text-xs text-ink-600">Frekuensi penumpang antarkota di Provinsi Lampung</span>
                        </div>
                        <span class="text-xs bg-sage-100 text-forest-900 font-semibold px-2 py-0.5 rounded">Bulan Berjalan</span>
                    </div>

                    <div class="space-y-4 text-xs">
                        <!-- RUTE 1 -->
                        <div class="space-y-1.5">
                            <div class="flex justify-between font-semibold">
                                <span class="text-forest-900">Bandar Lampung (Rajabasa) ⇄ Krui (Pesisir Barat)</span>
                                <span class="font-mono text-forest-700">92% Okupansi (480 Tiket)</span>
                            </div>
                            <div class="w-full bg-surface-container h-2.5 rounded-full overflow-hidden">
                                <div class="bg-forest-700 h-full w-[92%] rounded-full"></div>
                            </div>
                        </div>

                        <!-- RUTE 2 -->
                        <div class="space-y-1.5">
                            <div class="flex justify-between font-semibold">
                                <span class="text-forest-900">Bandar Lampung ⇄ Metro</span>
                                <span class="font-mono text-forest-700">78% Okupansi (340 Tiket)</span>
                            </div>
                            <div class="w-full bg-surface-container h-2.5 rounded-full overflow-hidden">
                                <div class="bg-forest-700/80 h-full w-[78%] rounded-full"></div>
                            </div>
                        </div>

                        <!-- RUTE 3 -->
                        <div class="space-y-1.5">
                            <div class="flex justify-between font-semibold">
                                <span class="text-forest-900">Bandar Lampung ⇄ Kotabumi</span>
                                <span class="font-mono text-forest-700">65% Okupansi (220 Tiket)</span>
                            </div>
                            <div class="w-full bg-surface-container h-2.5 rounded-full overflow-hidden">
                                <div class="bg-amber-500 h-full w-[65%] rounded-full"></div>
                            </div>
                        </div>

                        <!-- RUTE 4 -->
                        <div class="space-y-1.5">
                            <div class="flex justify-between font-semibold">
                                <span class="text-forest-900">Bandar Lampung ⇄ Kalianda / Bakauheni</span>
                                <span class="font-mono text-forest-700">54% Okupansi (180 Tiket)</span>
                            </div>
                            <div class="w-full bg-surface-container h-2.5 rounded-full overflow-hidden">
                                <div class="bg-surface-container-highest h-full w-[54%] rounded-full"></div>
                            </div>
                        </div>
                    </div>

                    <div class="pt-2 border-t border-surface-container flex items-center justify-between text-xs">
                        <span class="text-ink-600">Total pendapatan tiket bulan ini: <strong class="font-mono text-forest-900">Rp 84.500.000</strong></span>
                        <a href="{{ route('admin.kota') }}" class="text-forest-700 hover:underline font-bold">Atur Master Tarif &rarr;</a>
                    </div>
                </div>

                <!-- KELUHAN BUTUH PENANGANAN (KOLOM KANAN 5 SPAN) -->
                <div class="lg:col-span-5 bg-paper-0 rounded-2xl p-6 shadow-sm border border-surface-container space-y-4">
                    <div class="flex items-center justify-between pb-3 border-b border-surface-container">
                        <div>
                            <h2 class="font-title-md text-base font-bold text-forest-900">Keluhan Perlu Tanggapan</h2>
                            <span class="text-xs text-ink-600">Ulasan &amp; aduan layanan penumpang</span>
                        </div>
                        <span class="text-xs bg-red-600/15 text-red-600 font-bold px-2 py-0.5 rounded-full">2 Menunggu</span>
                    </div>

                    <div class="space-y-3">
                        <!-- KELUHAN 1 -->
                        <div class="p-3.5 rounded-xl bg-surface-container-low border border-red-600/20 space-y-2 text-xs">
                            <div class="flex items-center justify-between">
                                <span class="font-bold text-forest-900">Rian Pratama</span>
                                <span class="bg-red-600/15 text-red-600 text-[10px] font-bold px-2 py-0.5 rounded">Prioritas Tinggi</span>
                            </div>
                            <p class="text-ink-600 line-clamp-2">"AC armada HiAce BE 7012 AA kurang dingin saat melintasi tanjakan Sedayu Krui, mohon dicek perawatannya..."</p>
                            <div class="pt-1 flex items-center justify-between text-[11px]">
                                <span class="text-ink-600">Trip: Krui 08 Nov</span>
                                <a href="{{ route('admin.keluhan') }}" class="text-forest-700 font-bold hover:underline">Beri Tanggapan &rarr;</a>
                            </div>
                        </div>

                        <!-- KELUHAN 2 -->
                        <div class="p-3.5 rounded-xl bg-surface-container-low border border-surface-container space-y-2 text-xs">
                            <div class="flex items-center justify-between">
                                <span class="font-bold text-forest-900">Dewi Kartika</span>
                                <span class="bg-amber-500/15 text-tertiary-container text-[10px] font-bold px-2 py-0.5 rounded">Prioritas Sedang</span>
                            </div>
                            <p class="text-ink-600 line-clamp-2">"Jadwal keberangkatan 13:00 sempat terlambat 20 menit karena supir terjebak macet titik jemput..."</p>
                            <div class="pt-1 flex items-center justify-between text-[11px]">
                                <span class="text-ink-600">Trip: Kotabumi 07 Nov</span>
                                <a href="{{ route('admin.keluhan') }}" class="text-forest-700 font-bold hover:underline">Beri Tanggapan &rarr;</a>
                            </div>
                        </div>
                    </div>

                    <a href="{{ route('admin.keluhan') }}" class="block text-center text-xs font-bold text-forest-700 hover:underline pt-1">
                        Buka Seluruh Manajemen Keluhan &rarr;
                    </a>
                </div>

            </div>

        </div>
    </main>

    <!-- ROLE SWITCHER INCLUDED -->
    @include('partials.role-switcher')

</body>
</html>

