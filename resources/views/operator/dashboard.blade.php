<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Loket - Trans Lampung Express</title>

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

    <!-- HEADER OPERATOR -->
    <header class="fixed top-0 left-0 right-0 w-full z-40 bg-forest-900 text-cream-50 shadow-md">
        <div class="h-16 max-w-7xl mx-auto px-6 lg:px-12 flex items-center justify-between">
            <div class="flex items-center gap-3">
                <div class="w-9 h-9 rounded-lg bg-amber-500 text-forest-900 flex items-center justify-center font-bold">
                    <span class="material-symbols-outlined text-[20px]">support_agent</span>
                </div>
                <div>
                    <div class="flex items-center gap-2">
                        <span class="font-headline-sm text-lg font-semibold tracking-tight leading-none text-white">Trans Lampung</span>
                        <span class="bg-amber-500/20 text-amber-500 text-[10px] font-bold px-2 py-0.5 rounded tracking-wider uppercase border border-amber-500/30">Operator Loket</span>
                    </div>
                    <span class="text-[11px] text-cream-50/70 font-medium">Pool Utama Rajabasa (Loket 01)</span>
                </div>
            </div>

            <!-- NAV LINKS OPERATOR -->
            <nav class="hidden md:flex items-center gap-1.5">
                <a href="{{ route('operator.dashboard') }}" class="font-semibold text-xs bg-forest-700 text-white px-3 py-1.5 rounded-lg transition-colors flex items-center gap-1.5">
                    <span class="material-symbols-outlined text-[16px]">space_dashboard</span>
                    Dashboard
                </a>
                <a href="{{ route('operator.pesanan') }}" class="font-medium text-xs text-cream-50/80 hover:text-white px-3 py-1.5 rounded-lg hover:bg-forest-700/50 transition-colors flex items-center gap-1.5">
                    <span class="material-symbols-outlined text-[16px]">checklist</span>
                    Kelola Status Pesanan
                </a>
                <a href="{{ route('operator.konfirmasi-pembayaran') }}" class="font-medium text-xs text-cream-50/80 hover:text-white px-3 py-1.5 rounded-lg hover:bg-forest-700/50 transition-colors flex items-center gap-1.5 relative">
                    <span class="material-symbols-outlined text-[16px]">verified_user</span>
                    Periksa Bayar
                    <span class="w-4 h-4 rounded-full bg-amber-500 text-forest-900 font-bold text-[9px] flex items-center justify-center">3</span>
                </a>
                <a href="{{ route('operator.layani-pemesanan') }}" class="font-bold text-xs bg-amber-500 hover:bg-amber-600 text-forest-900 px-3.5 py-1.5 rounded-lg transition-colors flex items-center gap-1.5 shadow-sm">
                    <span class="material-symbols-outlined text-[16px]">point_of_sale</span>
                    Layani Pemesanan
                </a>
            </nav>

            <!-- PROFIL OPERATOR -->
            <div class="flex items-center gap-3">
                <div class="hidden sm:flex flex-col text-right">
                    <span class="text-xs font-bold text-white">Dimas Wahyu</span>
                    <span class="text-[10px] text-cream-50/70">Staff Loket Aktif</span>
                </div>
                <div class="w-9 h-9 rounded-full bg-forest-700 text-amber-500 border border-amber-500/30 flex items-center justify-center font-bold text-xs">
                    DW
                </div>
            </div>
        </div>
    </header>

    <!-- MAIN CONTENT -->
    <main class="w-full pt-24 pb-16 bg-cream-50 min-h-screen">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-12 space-y-8">

            <!-- HEADER BANNER -->
            <div class="bg-paper-0 rounded-2xl p-6 sm:p-8 shadow-sm border border-surface-container flex flex-col md:flex-row md:items-center justify-between gap-6">
                <div>
                    <div class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-amber-500/15 text-tertiary-container text-xs font-semibold mb-2">
                        <span class="w-2 h-2 rounded-full bg-amber-500 animate-pulse"></span>
                        Status Operasional: Buka &amp; Melayani Loket Rajabasa
                    </div>
                    <h1 class="font-headline-lg text-2xl sm:text-3xl font-semibold text-forest-900 tracking-tight">Konsol Kerja Operator Loket</h1>
                    <p class="text-sm text-ink-600 mt-1">Kelola pesanan penumpang, validasi bukti transfer bank, dan layani tiket langsung walk-in penumpang di loket.</p>
                </div>
                <div class="flex flex-wrap items-center gap-3">
                    <a href="{{ route('operator.layani-pemesanan') }}" class="px-5 py-3 rounded-xl bg-forest-700 hover:bg-forest-900 text-white font-semibold text-sm transition-all shadow-sm flex items-center gap-2">
                        <span class="material-symbols-outlined text-[20px]">add_circle</span>
                        Layani Pesanan Walk-in Baru
                    </a>
                    <a href="{{ route('operator.konfirmasi-pembayaran') }}" class="px-4 py-3 rounded-xl bg-surface-container hover:bg-surface-container-high text-forest-900 font-semibold text-sm transition-colors flex items-center gap-2">
                        <span class="material-symbols-outlined text-[18px]">verified_user</span>
                        Verifikasi Pembayaran (3)
                    </a>
                </div>
            </div>

            <!-- METRIC CARDS -->
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-5">
                <!-- METRIC 1 -->
                <div class="bg-paper-0 p-5 rounded-2xl border border-surface-container shadow-xs space-y-2">
                    <div class="flex items-center justify-between text-ink-600">
                        <span class="text-xs font-semibold uppercase tracking-wider">Tiket Terjual Hari Ini</span>
                        <div class="w-9 h-9 rounded-lg bg-secondary-container text-forest-700 flex items-center justify-center">
                            <span class="material-symbols-outlined text-[20px]">confirmation_number</span>
                        </div>
                    </div>
                    <div class="flex items-baseline gap-2">
                        <span class="font-mono text-3xl font-bold text-forest-900">42</span>
                        <span class="text-xs text-green-700 font-bold flex items-center">
                            <span class="material-symbols-outlined text-[14px]">trending_up</span> +12%
                        </span>
                    </div>
                    <span class="text-[11px] text-ink-600 block">Dari 6 keberangkatan terjadwal</span>
                </div>

                <!-- METRIC 2 -->
                <div class="bg-paper-0 p-5 rounded-2xl border border-surface-container shadow-xs space-y-2">
                    <div class="flex items-center justify-between text-ink-600">
                        <span class="text-xs font-semibold uppercase tracking-wider">Pendapatan Loket</span>
                        <div class="w-9 h-9 rounded-lg bg-amber-500/15 text-amber-500 flex items-center justify-center">
                            <span class="material-symbols-outlined text-[20px]">payments</span>
                        </div>
                    </div>
                    <div class="flex items-baseline gap-2">
                        <span class="font-mono text-2xl font-bold text-forest-900">Rp 5.120.000</span>
                    </div>
                    <span class="text-[11px] text-ink-600 block">Tunai: Rp 2.450.000 • Transfer: Rp 2.670.000</span>
                </div>

                <!-- METRIC 3 -->
                <div class="bg-paper-0 p-5 rounded-2xl border border-surface-container shadow-xs space-y-2">
                    <div class="flex items-center justify-between text-ink-600">
                        <span class="text-xs font-semibold uppercase tracking-wider">Perlu Verifikasi</span>
                        <div class="w-9 h-9 rounded-lg bg-red-600/15 text-red-600 flex items-center justify-center">
                            <span class="material-symbols-outlined text-[20px]">pending_actions</span>
                        </div>
                    </div>
                    <div class="flex items-baseline gap-2">
                        <span class="font-mono text-3xl font-bold text-red-600">3</span>
                        <span class="text-xs bg-red-600/15 text-red-600 px-2 py-0.5 rounded font-bold">Urgensi &lt; 30 mnt</span>
                    </div>
                    <span class="text-[11px] text-ink-600 block">Menunggu pengecekan bukti transfer</span>
                </div>

                <!-- METRIC 4 -->
                <div class="bg-paper-0 p-5 rounded-2xl border border-surface-container shadow-xs space-y-2">
                    <div class="flex items-center justify-between text-ink-600">
                        <span class="text-xs font-semibold uppercase tracking-wider">Armada Berangkat</span>
                        <div class="w-9 h-9 rounded-lg bg-forest-700/15 text-forest-700 flex items-center justify-center">
                            <span class="material-symbols-outlined text-[20px]">directions_bus</span>
                        </div>
                    </div>
                    <div class="flex items-baseline gap-2">
                        <span class="font-mono text-3xl font-bold text-forest-900">6 Trip</span>
                        <span class="text-xs text-forest-700 font-semibold">2 Siap Jalan</span>
                    </div>
                    <span class="text-[11px] text-ink-600 block">Pool Rajabasa ke Krui, Metro, Kotabumi</span>
                </div>
            </div>

            <!-- GRID DUA KOLOM: JADWAL HARI INI & VERIFIKASI PENDING -->
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 items-start">

                <!-- TRIP HARI INI & OKUPANSI KURSI (KOLOM KIRI) -->
                <div class="lg:col-span-7 bg-paper-0 rounded-2xl p-6 shadow-sm border border-surface-container space-y-5">
                    <div class="flex items-center justify-between pb-3 border-b border-surface-container">
                        <div>
                            <h2 class="font-title-md text-base font-bold text-forest-900">Jadwal Keberangkatan Hari Ini</h2>
                            <span class="text-xs text-ink-600">Pantau okupansi penumpang dan status boarding</span>
                        </div>
                        <span class="text-xs font-bold font-mono bg-surface-container px-2.5 py-1 rounded text-forest-900">Senin, 10 Nov 2026</span>
                    </div>

                    <div class="space-y-3.5">
                        <!-- TRIP 1 -->
                        <div class="p-4 rounded-xl bg-surface-container-low border border-surface-container space-y-3">
                            <div class="flex items-start justify-between">
                                <div class="space-y-0.5">
                                    <div class="flex items-center gap-2">
                                        <span class="font-bold text-forest-900 text-sm">08:00 WIB</span>
                                        <span class="text-xs font-medium text-ink-600">• Trip 01</span>
                                        <span class="text-[11px] bg-green-700/15 text-green-700 font-bold px-2 py-0.5 rounded">Boarding</span>
                                    </div>
                                    <p class="font-semibold text-forest-900 text-sm">Bandar Lampung (Rajabasa) → Krui (Pesisir Barat)</p>
                                    <span class="text-xs text-ink-600 font-mono">Toyota HiAce • BE 7012 AA • Supir: Bpk. Supriyadi</span>
                                </div>
                                <span class="bg-forest-900 text-cream-50 font-mono text-xs font-bold px-2.5 py-1 rounded-lg">11 / 11 Penuh</span>
                            </div>
                            <!-- SEAT PROGRESS BAR -->
                            <div>
                                <div class="w-full bg-surface-container h-2 rounded-full overflow-hidden">
                                    <div class="bg-forest-700 h-full w-full rounded-full"></div>
                                </div>
                            </div>
                            <div class="flex items-center justify-between pt-1 text-xs">
                                <span class="text-ink-600">Manifest lengkap 11 penumpang terkonfirmasi</span>
                                <a href="{{ route('operator.pesanan') }}" class="text-forest-700 hover:underline font-bold flex items-center gap-1">
                                    Lihat Penumpang <span class="material-symbols-outlined text-[14px]">arrow_forward</span>
                                </a>
                            </div>
                        </div>

                        <!-- TRIP 2 -->
                        <div class="p-4 rounded-xl bg-surface-container-low border border-surface-container space-y-3">
                            <div class="flex items-start justify-between">
                                <div class="space-y-0.5">
                                    <div class="flex items-center gap-2">
                                        <span class="font-bold text-forest-900 text-sm">10:30 WIB</span>
                                        <span class="text-xs font-medium text-ink-600">• Trip 02</span>
                                        <span class="text-[11px] bg-secondary-container text-on-secondary-container font-bold px-2 py-0.5 rounded">Siap</span>
                                    </div>
                                    <p class="font-semibold text-forest-900 text-sm">Bandar Lampung (Rajabasa) → Metro</p>
                                    <span class="text-xs text-ink-600 font-mono">Toyota HiAce • BE 7200 BB • Supir: Bpk. Gunawan</span>
                                </div>
                                <span class="bg-surface-container text-forest-900 font-mono text-xs font-bold px-2.5 py-1 rounded-lg">8 / 11 Kursi</span>
                            </div>
                            <div>
                                <div class="w-full bg-surface-container h-2 rounded-full overflow-hidden">
                                    <div class="bg-amber-500 h-full w-[72%] rounded-full"></div>
                                </div>
                            </div>
                            <div class="flex items-center justify-between pt-1 text-xs">
                                <span class="text-ink-600">Sisa 3 kursi kosong untuk penumpang walk-in</span>
                                <a href="{{ route('operator.layani-pemesanan') }}" class="text-amber-500 hover:underline font-bold flex items-center gap-1">
                                    Jual di Loket <span class="material-symbols-outlined text-[14px]">add</span>
                                </a>
                            </div>
                        </div>

                        <!-- TRIP 3 -->
                        <div class="p-4 rounded-xl bg-surface-container-low border border-surface-container space-y-3">
                            <div class="flex items-start justify-between">
                                <div class="space-y-0.5">
                                    <div class="flex items-center gap-2">
                                        <span class="font-bold text-forest-900 text-sm">13:00 WIB</span>
                                        <span class="text-xs font-medium text-ink-600">• Trip 03</span>
                                        <span class="text-[11px] bg-surface-container text-ink-600 font-bold px-2 py-0.5 rounded">Menunggu</span>
                                    </div>
                                    <p class="font-semibold text-forest-900 text-sm">Bandar Lampung (Rajabasa) → Kotabumi</p>
                                    <span class="text-xs text-ink-600 font-mono">Isuzu Elf Long • BE 7331 CC • Supir: Bpk. Ilham</span>
                                </div>
                                <span class="bg-surface-container text-forest-900 font-mono text-xs font-bold px-2.5 py-1 rounded-lg">12 / 14 Kursi</span>
                            </div>
                            <div>
                                <div class="w-full bg-surface-container h-2 rounded-full overflow-hidden">
                                    <div class="bg-forest-700 h-full w-[85%] rounded-full"></div>
                                </div>
                            </div>
                            <div class="flex items-center justify-between pt-1 text-xs">
                                <span class="text-ink-600">2 kursi tersisa</span>
                                <a href="{{ route('operator.pesanan') }}" class="text-forest-700 hover:underline font-bold flex items-center gap-1">
                                    Detail <span class="material-symbols-outlined text-[14px]">arrow_forward</span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- PEMBAYARAN BUTUH VERIFIKASI (KOLOM KANAN) -->
                <div class="lg:col-span-5 bg-paper-0 rounded-2xl p-6 shadow-sm border border-surface-container space-y-5">
                    <div class="flex items-center justify-between pb-3 border-b border-surface-container">
                        <div>
                            <h2 class="font-title-md text-base font-bold text-forest-900">Perlu Verifikasi Segera</h2>
                            <span class="text-xs text-ink-600">Konfirmasi bukti transfer masuk</span>
                        </div>
                        <span class="text-xs font-bold bg-amber-500/20 text-tertiary-container px-2 py-0.5 rounded-full">3 Menunggu</span>
                    </div>

                    <div class="space-y-3.5">
                        <!-- ITEM 1 -->
                        <div class="p-4 rounded-xl bg-surface-container-low border border-amber-500/30 space-y-2.5">
                            <div class="flex items-center justify-between">
                                <span class="font-mono text-xs font-bold text-forest-900">#PSN-202410-098</span>
                                <span class="text-[11px] font-bold text-amber-500 bg-amber-500/15 px-2 py-0.5 rounded">Baru 5 mnt lalu</span>
                            </div>
                            <div class="text-xs text-ink-600 space-y-1">
                                <div class="flex justify-between">
                                    <span>Nama Pemesan:</span>
                                    <strong class="text-forest-900">Bambang Hermanto</strong>
                                </div>
                                <div class="flex justify-between">
                                    <span>Rute / Jadwal:</span>
                                    <span class="text-forest-900 font-medium">B. Lampung → Krui (08:00)</span>
                                </div>
                                <div class="flex justify-between">
                                    <span>Nominal Struk:</span>
                                    <strong class="text-forest-900 font-mono text-sm">Rp 120.354 (Mandiri)</strong>
                                </div>
                            </div>
                            <div class="pt-2 border-t border-surface-container flex gap-2">
                                <a href="{{ route('operator.konfirmasi-pembayaran') }}" class="w-full bg-forest-700 hover:bg-forest-900 text-white font-semibold text-xs py-2 px-3 rounded-lg text-center transition-colors">
                                    Periksa &amp; Validasi Bukti
                                </a>
                            </div>
                        </div>

                        <!-- ITEM 2 -->
                        <div class="p-4 rounded-xl bg-surface-container-low border border-amber-500/30 space-y-2.5">
                            <div class="flex items-center justify-between">
                                <span class="font-mono text-xs font-bold text-forest-900">#PSN-202410-099</span>
                                <span class="text-[11px] font-bold text-amber-500 bg-amber-500/15 px-2 py-0.5 rounded">18 mnt lalu</span>
                            </div>
                            <div class="text-xs text-ink-600 space-y-1">
                                <div class="flex justify-between">
                                    <span>Nama Pemesan:</span>
                                    <strong class="text-forest-900">Siti Rahayu</strong>
                                </div>
                                <div class="flex justify-between">
                                    <span>Rute / Jadwal:</span>
                                    <span class="text-forest-900 font-medium">B. Lampung → Metro (10:30)</span>
                                </div>
                                <div class="flex justify-between">
                                    <span>Nominal Struk:</span>
                                    <strong class="text-forest-900 font-mono text-sm">Rp 45.000 (BRI)</strong>
                                </div>
                            </div>
                            <div class="pt-2 border-t border-surface-container flex gap-2">
                                <a href="{{ route('operator.konfirmasi-pembayaran') }}" class="w-full bg-forest-700 hover:bg-forest-900 text-white font-semibold text-xs py-2 px-3 rounded-lg text-center transition-colors">
                                    Periksa &amp; Validasi Bukti
                                </a>
                            </div>
                        </div>
                    </div>

                    <a href="{{ route('operator.konfirmasi-pembayaran') }}" class="block text-center text-xs font-bold text-forest-700 hover:underline pt-2">
                        Buka Halaman Seluruh Konfirmasi Pembayaran →
                    </a>
                </div>

            </div>

        </div>
    </main>

    <!-- ROLE SWITCHER INCLUDED -->
    @include('partials.role-switcher')

</body>
</html>

