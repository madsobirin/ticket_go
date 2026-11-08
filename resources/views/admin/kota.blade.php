<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kelola Kota Asal & Tujuan - Super Admin</title>

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

    <!-- HEADER ADMIN -->
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

            <!-- NAV LINKS ADMIN -->
            <nav class="hidden lg:flex items-center gap-1">
                <a href="{{ route('admin.dashboard') }}" class="font-medium text-xs text-cream-50/80 hover:text-white px-3 py-1.5 rounded-lg hover:bg-forest-700/50 transition-colors flex items-center gap-1.5">
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
                <a href="{{ route('admin.kota') }}" class="font-semibold text-xs bg-forest-700 text-white px-3 py-1.5 rounded-lg transition-colors flex items-center gap-1.5">
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

            <!-- PROFIL ADMIN -->
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

    <!-- MAIN CONTENT -->
    <main class="w-full pt-24 pb-16 bg-cream-50 min-h-screen">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-12 space-y-6">

            <!-- PAGE TITLE -->
            <div class="flex flex-col md:flex-row md:items-center justify-between gap-4">
                <div>
                    <h1 class="font-headline-lg text-2xl sm:text-3xl font-semibold text-forest-900 tracking-tight">Manajemen Kota Pool &amp; Rute Perjalanan</h1>
                    <p class="text-sm text-ink-600 mt-1">Master data terminal keberangkatan, titik pool loket kabupaten/kota di Lampung, serta jarak tempuh dan tarif dasar rute.</p>
                </div>
                <div class="flex items-center gap-2.5">
                    <button onclick="openModalTambahKota()" class="px-4 py-2.5 rounded-xl bg-forest-700 hover:bg-forest-900 text-white font-semibold text-xs transition-colors flex items-center gap-1.5 shadow-xs">
                        <span class="material-symbols-outlined text-[18px]">add_location_alt</span>
                        + Tambah Kota Pool
                    </button>
                    <button onclick="openModalTambahRute()" class="px-4 py-2.5 rounded-xl bg-amber-500 hover:bg-amber-600 text-forest-900 font-bold text-xs transition-colors flex items-center gap-1.5 shadow-xs">
                        <span class="material-symbols-outlined text-[18px]">add_road</span>
                        + Tambah Rute Baru
                    </button>
                </div>
            </div>

            <!-- TAB NAVIGASI: KOTA VS RUTE -->
            <div class="bg-paper-0 p-4 rounded-2xl border border-surface-container shadow-xs flex items-center gap-2">
                <button onclick="switchTabKota('KOTA')" id="btnTabKota" class="font-semibold text-xs px-4 py-2.5 rounded-xl bg-forest-900 text-white transition-colors flex items-center gap-2">
                    <span class="material-symbols-outlined text-[16px]">location_city</span>
                    Master Kota &amp; Pool Loket (6 Kota)
                </button>
                <button onclick="switchTabKota('RUTE')" id="btnTabRute" class="font-medium text-xs px-4 py-2.5 rounded-xl text-ink-600 hover:bg-surface-container transition-colors flex items-center gap-2">
                    <span class="material-symbols-outlined text-[16px]">route</span>
                    Master Rute Antarkota &amp; Tarif (5 Rute)
                </button>
            </div>

            <!-- VIEW TAB 1: MASTER KOTA & POOL LOKET -->
            <div id="sectionKota" class="space-y-4">
                <div class="bg-paper-0 rounded-2xl border border-surface-container shadow-xs overflow-hidden">
                    <div class="overflow-x-auto">
                        <table class="w-full text-left border-collapse text-xs">
                            <thead>
                                <tr class="bg-surface-container-low/80 border-b border-surface-container text-ink-600 font-semibold uppercase tracking-wider text-[11px]">
                                    <th class="py-3.5 px-4">ID Kota</th>
                                    <th class="py-3.5 px-4">Nama Kota / Wilayah</th>
                                    <th class="py-3.5 px-4">Nama Terminal / Pool Utama</th>
                                    <th class="py-3.5 px-4">Alamat Pool</th>
                                    <th class="py-3.5 px-4">Kontak Telepon Loket</th>
                                    <th class="py-3.5 px-4">Status</th>
                                    <th class="py-3.5 px-4 text-center">Aksi</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-surface-container font-medium text-forest-900">
                                <tr class="hover:bg-surface-container-low/50 transition-colors">
                                    <td class="py-4 px-4 font-mono font-bold text-forest-700">KTA-01</td>
                                    <td class="py-4 px-4 font-bold text-forest-900 text-sm">Bandar Lampung</td>
                                    <td class="py-4 px-4 font-semibold text-forest-900">Pool Utama Rajabasa (Loket Pusat)</td>
                                    <td class="py-4 px-4 text-ink-600">Jl. ZA. Pagar Alam No. 10, Rajabasa</td>
                                    <td class="py-4 px-4 font-mono text-forest-900">(0721) 703456</td>
                                    <td class="py-4 px-4">
                                        <span class="bg-green-700/15 text-green-700 font-bold px-2.5 py-1 rounded-full text-[11px]">Aktif</span>
                                    </td>
                                    <td class="py-4 px-4 text-center">
                                        <button onclick="alert('Edit Kota Bandar Lampung')" class="p-1.5 rounded-lg bg-surface-container hover:bg-forest-700 hover:text-white transition-colors">
                                            <span class="material-symbols-outlined text-[16px]">edit</span>
                                        </button>
                                    </td>
                                </tr>

                                <tr class="hover:bg-surface-container-low/50 transition-colors">
                                    <td class="py-4 px-4 font-mono font-bold text-forest-700">KTA-02</td>
                                    <td class="py-4 px-4 font-bold text-forest-900 text-sm">Krui (Pesisir Barat)</td>
                                    <td class="py-4 px-4 font-semibold text-forest-900">Pool Terminal Krui Pesisir</td>
                                    <td class="py-4 px-4 text-ink-600">Jl. Lintas Barat Sumatera Km 12</td>
                                    <td class="py-4 px-4 font-mono text-forest-900">0812-7722-1100</td>
                                    <td class="py-4 px-4">
                                        <span class="bg-green-700/15 text-green-700 font-bold px-2.5 py-1 rounded-full text-[11px]">Aktif</span>
                                    </td>
                                    <td class="py-4 px-4 text-center">
                                        <button onclick="alert('Edit Kota Krui')" class="p-1.5 rounded-lg bg-surface-container hover:bg-forest-700 hover:text-white transition-colors">
                                            <span class="material-symbols-outlined text-[16px]">edit</span>
                                        </button>
                                    </td>
                                </tr>

                                <tr class="hover:bg-surface-container-low/50 transition-colors">
                                    <td class="py-4 px-4 font-mono font-bold text-forest-700">KTA-03</td>
                                    <td class="py-4 px-4 font-bold text-forest-900 text-sm">Metro</td>
                                    <td class="py-4 px-4 font-semibold text-forest-900">Pool Loket Tejosari Metro Barat</td>
                                    <td class="py-4 px-4 text-ink-600">Jl. Jendral Sudirman No. 8</td>
                                    <td class="py-4 px-4 font-mono text-forest-900">(0725) 44120</td>
                                    <td class="py-4 px-4">
                                        <span class="bg-green-700/15 text-green-700 font-bold px-2.5 py-1 rounded-full text-[11px]">Aktif</span>
                                    </td>
                                    <td class="py-4 px-4 text-center">
                                        <button onclick="alert('Edit Kota Metro')" class="p-1.5 rounded-lg bg-surface-container hover:bg-forest-700 hover:text-white transition-colors">
                                            <span class="material-symbols-outlined text-[16px]">edit</span>
                                        </button>
                                    </td>
                                </tr>

                                <tr class="hover:bg-surface-container-low/50 transition-colors">
                                    <td class="py-4 px-4 font-mono font-bold text-forest-700">KTA-04</td>
                                    <td class="py-4 px-4 font-bold text-forest-900 text-sm">Kotabumi</td>
                                    <td class="py-4 px-4 font-semibold text-forest-900">Pool Candi Mas Kotabumi</td>
                                    <td class="py-4 px-4 text-ink-600">Jl. Alamsyah RPN No. 44</td>
                                    <td class="py-4 px-4 font-mono text-forest-900">(0724) 21990</td>
                                    <td class="py-4 px-4">
                                        <span class="bg-green-700/15 text-green-700 font-bold px-2.5 py-1 rounded-full text-[11px]">Aktif</span>
                                    </td>
                                    <td class="py-4 px-4 text-center">
                                        <button onclick="alert('Edit Kota Kotabumi')" class="p-1.5 rounded-lg bg-surface-container hover:bg-forest-700 hover:text-white transition-colors">
                                            <span class="material-symbols-outlined text-[16px]">edit</span>
                                        </button>
                                    </td>
                                </tr>

                                <tr class="hover:bg-surface-container-low/50 transition-colors">
                                    <td class="py-4 px-4 font-mono font-bold text-forest-700">KTA-05</td>
                                    <td class="py-4 px-4 font-bold text-forest-900 text-sm">Kalianda</td>
                                    <td class="py-4 px-4 font-semibold text-forest-900">Pool Loket Dermaga Kalianda</td>
                                    <td class="py-4 px-4 text-ink-600">Jl. Trans Sumatera Km 50</td>
                                    <td class="py-4 px-4 font-mono text-forest-900">0852-8800-2211</td>
                                    <td class="py-4 px-4">
                                        <span class="bg-green-700/15 text-green-700 font-bold px-2.5 py-1 rounded-full text-[11px]">Aktif</span>
                                    </td>
                                    <td class="py-4 px-4 text-center">
                                        <button onclick="alert('Edit Kota Kalianda')" class="p-1.5 rounded-lg bg-surface-container hover:bg-forest-700 hover:text-white transition-colors">
                                            <span class="material-symbols-outlined text-[16px]">edit</span>
                                        </button>
                                    </td>
                                </tr>

                                <tr class="hover:bg-surface-container-low/50 transition-colors">
                                    <td class="py-4 px-4 font-mono font-bold text-forest-700">KTA-06</td>
                                    <td class="py-4 px-4 font-bold text-forest-900 text-sm">Pringsewu</td>
                                    <td class="py-4 px-4 font-semibold text-forest-900">Pool Terminal Gadingrejo Pringsewu</td>
                                    <td class="py-4 px-4 text-ink-600">Jl. Ahmad Yani No. 89</td>
                                    <td class="py-4 px-4 font-mono text-forest-900">0813-9988-7711</td>
                                    <td class="py-4 px-4">
                                        <span class="bg-green-700/15 text-green-700 font-bold px-2.5 py-1 rounded-full text-[11px]">Aktif</span>
                                    </td>
                                    <td class="py-4 px-4 text-center">
                                        <button onclick="alert('Edit Kota Pringsewu')" class="p-1.5 rounded-lg bg-surface-container hover:bg-forest-700 hover:text-white transition-colors">
                                            <span class="material-symbols-outlined text-[16px]">edit</span>
                                        </button>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <!-- VIEW TAB 2: MASTER RUTE & TARIF -->
            <div id="sectionRute" class="hidden space-y-4">
                <div class="bg-paper-0 rounded-2xl border border-surface-container shadow-xs overflow-hidden">
                    <div class="overflow-x-auto">
                        <table class="w-full text-left border-collapse text-xs">
                            <thead>
                                <tr class="bg-surface-container-low/80 border-b border-surface-container text-ink-600 font-semibold uppercase tracking-wider text-[11px]">
                                    <th class="py-3.5 px-4">Kode Rute</th>
                                    <th class="py-3.5 px-4">Kota Asal &rarr; Kota Tujuan</th>
                                    <th class="py-3.5 px-4">Jarak (KM)</th>
                                    <th class="py-3.5 px-4">Estimasi Durasi</th>
                                    <th class="py-3.5 px-4">Tarif Tiket Dasar</th>
                                    <th class="py-3.5 px-4">Trip Harian</th>
                                    <th class="py-3.5 px-4 text-center">Aksi</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-surface-container font-medium text-forest-900">
                                <tr class="hover:bg-surface-container-low/50 transition-colors">
                                    <td class="py-4 px-4 font-mono font-bold text-forest-700">RT-01</td>
                                    <td class="py-4 px-4 font-bold text-forest-900 text-sm">Bandar Lampung ⇄ Krui (Pesisir Barat)</td>
                                    <td class="py-4 px-4 font-mono">250 KM</td>
                                    <td class="py-4 px-4">± 6 Jam</td>
                                    <td class="py-4 px-4 font-mono font-bold text-forest-900">Rp 120.000</td>
                                    <td class="py-4 px-4">4 Keberangkatan</td>
                                    <td class="py-4 px-4 text-center">
                                        <button onclick="alert('Edit Rute RT-01')" class="p-1.5 rounded-lg bg-surface-container hover:bg-forest-700 hover:text-white transition-colors">
                                            <span class="material-symbols-outlined text-[16px]">edit</span>
                                        </button>
                                    </td>
                                </tr>

                                <tr class="hover:bg-surface-container-low/50 transition-colors">
                                    <td class="py-4 px-4 font-mono font-bold text-forest-700">RT-02</td>
                                    <td class="py-4 px-4 font-bold text-forest-900 text-sm">Bandar Lampung ⇄ Metro</td>
                                    <td class="py-4 px-4 font-mono">52 KM</td>
                                    <td class="py-4 px-4">± 1 Jam 15 mnt</td>
                                    <td class="py-4 px-4 font-mono font-bold text-forest-900">Rp 45.000</td>
                                    <td class="py-4 px-4">6 Keberangkatan</td>
                                    <td class="py-4 px-4 text-center">
                                        <button onclick="alert('Edit Rute RT-02')" class="p-1.5 rounded-lg bg-surface-container hover:bg-forest-700 hover:text-white transition-colors">
                                            <span class="material-symbols-outlined text-[16px]">edit</span>
                                        </button>
                                    </td>
                                </tr>

                                <tr class="hover:bg-surface-container-low/50 transition-colors">
                                    <td class="py-4 px-4 font-mono font-bold text-forest-700">RT-03</td>
                                    <td class="py-4 px-4 font-bold text-forest-900 text-sm">Bandar Lampung ⇄ Kotabumi</td>
                                    <td class="py-4 px-4 font-mono">110 KM</td>
                                    <td class="py-4 px-4">± 2.5 Jam</td>
                                    <td class="py-4 px-4 font-mono font-bold text-forest-900">Rp 70.000</td>
                                    <td class="py-4 px-4">4 Keberangkatan</td>
                                    <td class="py-4 px-4 text-center">
                                        <button onclick="alert('Edit Rute RT-03')" class="p-1.5 rounded-lg bg-surface-container hover:bg-forest-700 hover:text-white transition-colors">
                                            <span class="material-symbols-outlined text-[16px]">edit</span>
                                        </button>
                                    </td>
                                </tr>

                                <tr class="hover:bg-surface-container-low/50 transition-colors">
                                    <td class="py-4 px-4 font-mono font-bold text-forest-700">RT-04</td>
                                    <td class="py-4 px-4 font-bold text-forest-900 text-sm">Bandar Lampung ⇄ Kalianda</td>
                                    <td class="py-4 px-4 font-mono">65 KM</td>
                                    <td class="py-4 px-4">± 1.5 Jam</td>
                                    <td class="py-4 px-4 font-mono font-bold text-forest-900">Rp 50.000</td>
                                    <td class="py-4 px-4">4 Keberangkatan</td>
                                    <td class="py-4 px-4 text-center">
                                        <button onclick="alert('Edit Rute RT-04')" class="p-1.5 rounded-lg bg-surface-container hover:bg-forest-700 hover:text-white transition-colors">
                                            <span class="material-symbols-outlined text-[16px]">edit</span>
                                        </button>
                                    </td>
                                </tr>

                                <tr class="hover:bg-surface-container-low/50 transition-colors">
                                    <td class="py-4 px-4 font-mono font-bold text-forest-700">RT-05</td>
                                    <td class="py-4 px-4 font-bold text-forest-900 text-sm">Pringsewu ⇄ Kalianda</td>
                                    <td class="py-4 px-4 font-mono">95 KM</td>
                                    <td class="py-4 px-4">± 2.5 Jam</td>
                                    <td class="py-4 px-4 font-mono font-bold text-forest-900">Rp 65.000</td>
                                    <td class="py-4 px-4">2 Keberangkatan</td>
                                    <td class="py-4 px-4 text-center">
                                        <button onclick="alert('Edit Rute RT-05')" class="p-1.5 rounded-lg bg-surface-container hover:bg-forest-700 hover:text-white transition-colors">
                                            <span class="material-symbols-outlined text-[16px]">edit</span>
                                        </button>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        </div>
    </main>

    <!-- MODAL TAMBAH KOTA POOL -->
    <div id="modalTambahKota" class="fixed inset-0 bg-ink-900/60 backdrop-blur-sm z-50 hidden flex items-center justify-center p-4">
        <div class="bg-paper-0 rounded-2xl max-w-md w-full p-6 space-y-4 shadow-2xl animate-in fade-in zoom-in duration-150">
            <div class="flex items-center justify-between pb-3 border-b border-surface-container">
                <div class="flex items-center gap-2">
                    <span class="material-symbols-outlined text-forest-700 text-[22px]">add_location_alt</span>
                    <h3 class="font-title-sm text-base font-bold text-forest-900">Tambah Kota &amp; Pool Loket</h3>
                </div>
                <button onclick="closeModalTambahKota()" class="text-ink-600 hover:text-forest-900 p-1">
                    <span class="material-symbols-outlined text-[20px]">close</span>
                </button>
            </div>

            <form onsubmit="event.preventDefault(); simpanKota();" class="space-y-3 text-xs">
                <div>
                    <label class="block font-bold text-forest-900 uppercase tracking-wider mb-1">Nama Kota / Kabupaten <span class="text-red-600">*</span></label>
                    <input type="text" id="addKotaNama" placeholder="Cth: Menggala / Tulang Bawang" class="w-full bg-surface-container-low p-2.5 rounded-xl border border-surface-container text-forest-900" required>
                </div>

                <div>
                    <label class="block font-bold text-forest-900 uppercase tracking-wider mb-1">Nama Pool / Terminal Cabang <span class="text-red-600">*</span></label>
                    <input type="text" placeholder="Cth: Pool Loket Simpang Menggala" class="w-full bg-surface-container-low p-2.5 rounded-xl border border-surface-container text-forest-900" required>
                </div>

                <div>
                    <label class="block font-bold text-forest-900 uppercase tracking-wider mb-1">Alamat Lengkap Pool</label>
                    <textarea rows="2" placeholder="Jl. Lintas Timur Sumatera No..." class="w-full bg-surface-container-low p-2.5 rounded-xl border border-surface-container text-forest-900"></textarea>
                </div>

                <div>
                    <label class="block font-bold text-forest-900 uppercase tracking-wider mb-1">Nomor Telepon Loket</label>
                    <input type="tel" placeholder="08xxxxxxxxxx" class="w-full bg-surface-container-low p-2.5 rounded-xl border border-surface-container text-forest-900 font-mono">
                </div>

                <div class="pt-2 border-t border-surface-container flex gap-2">
                    <button type="submit" class="w-full bg-forest-700 hover:bg-forest-900 text-white font-bold text-xs py-3 rounded-xl transition-colors">
                        Simpan Kota Pool
                    </button>
                    <button type="button" onclick="closeModalTambahKota()" class="w-full bg-surface-container hover:bg-surface-container-high text-forest-900 font-medium text-xs py-3 rounded-xl transition-colors">
                        Batal
                    </button>
                </div>
            </form>
        </div>
    </div>

    <!-- MODAL TAMBAH RUTE -->
    <div id="modalTambahRute" class="fixed inset-0 bg-ink-900/60 backdrop-blur-sm z-50 hidden flex items-center justify-center p-4">
        <div class="bg-paper-0 rounded-2xl max-w-md w-full p-6 space-y-4 shadow-2xl animate-in fade-in zoom-in duration-150">
            <div class="flex items-center justify-between pb-3 border-b border-surface-container">
                <div class="flex items-center gap-2">
                    <span class="material-symbols-outlined text-amber-500 text-[22px]">add_road</span>
                    <h3 class="font-title-sm text-base font-bold text-forest-900">Buat Rute Antarkota Baru</h3>
                </div>
                <button onclick="closeModalTambahRute()" class="text-ink-600 hover:text-forest-900 p-1">
                    <span class="material-symbols-outlined text-[20px]">close</span>
                </button>
            </div>

            <form onsubmit="event.preventDefault(); simpanRute();" class="space-y-3 text-xs">
                <div class="grid grid-cols-2 gap-3">
                    <div>
                        <label class="block font-bold text-forest-900 uppercase tracking-wider mb-1">Kota Asal</label>
                        <select class="w-full bg-surface-container-low p-2.5 rounded-xl border border-surface-container text-forest-900">
                            <option>Bandar Lampung</option>
                            <option>Metro</option>
                            <option>Kotabumi</option>
                            <option>Krui</option>
                            <option>Kalianda</option>
                        </select>
                    </div>
                    <div>
                        <label class="block font-bold text-forest-900 uppercase tracking-wider mb-1">Kota Tujuan</label>
                        <select class="w-full bg-surface-container-low p-2.5 rounded-xl border border-surface-container text-forest-900">
                            <option>Krui (Pesisir Barat)</option>
                            <option>Metro</option>
                            <option>Kotabumi</option>
                            <option>Kalianda</option>
                        </select>
                    </div>
                </div>

                <div class="grid grid-cols-2 gap-3">
                    <div>
                        <label class="block font-bold text-forest-900 uppercase tracking-wider mb-1">Jarak (KM)</label>
                        <input type="number" placeholder="250" class="w-full bg-surface-container-low p-2.5 rounded-xl border border-surface-container text-forest-900 font-mono">
                    </div>
                    <div>
                        <label class="block font-bold text-forest-900 uppercase tracking-wider mb-1">Estimasi Durasi (Jam)</label>
                        <input type="text" placeholder="6 Jam" class="w-full bg-surface-container-low p-2.5 rounded-xl border border-surface-container text-forest-900 font-mono">
                    </div>
                </div>

                <div>
                    <label class="block font-bold text-forest-900 uppercase tracking-wider mb-1">Tarif Dasar Standar (Rp)</label>
                    <input type="number" placeholder="120000" class="w-full bg-surface-container-low p-2.5 rounded-xl border border-surface-container text-forest-900 font-mono font-bold">
                </div>

                <div class="pt-2 border-t border-surface-container flex gap-2">
                    <button type="submit" class="w-full bg-forest-700 hover:bg-forest-900 text-white font-bold text-xs py-3 rounded-xl transition-colors">
                        Simpan Rute Baru
                    </button>
                    <button type="button" onclick="closeModalTambahRute()" class="w-full bg-surface-container hover:bg-surface-container-high text-forest-900 font-medium text-xs py-3 rounded-xl transition-colors">
                        Batal
                    </button>
                </div>
            </form>
        </div>
    </div>

    <!-- ROLE SWITCHER INCLUDED -->
    @include('partials.role-switcher')

    <script>
        function switchTabKota(tab) {
            const btnKota = document.getElementById('btnTabKota');
            const btnRute = document.getElementById('btnTabRute');
            const secKota = document.getElementById('sectionKota');
            const secRute = document.getElementById('sectionRute');

            if (tab === 'KOTA') {
                btnKota.className = 'font-semibold text-xs px-4 py-2.5 rounded-xl bg-forest-900 text-white transition-colors flex items-center gap-2';
                btnRute.className = 'font-medium text-xs px-4 py-2.5 rounded-xl text-ink-600 hover:bg-surface-container transition-colors flex items-center gap-2';
                secKota.classList.remove('hidden');
                secRute.classList.add('hidden');
            } else {
                btnRute.className = 'font-semibold text-xs px-4 py-2.5 rounded-xl bg-forest-900 text-white transition-colors flex items-center gap-2';
                btnKota.className = 'font-medium text-xs px-4 py-2.5 rounded-xl text-ink-600 hover:bg-surface-container transition-colors flex items-center gap-2';
                secRute.classList.remove('hidden');
                secKota.classList.add('hidden');
            }
        }

        function openModalTambahKota() {
            document.getElementById('modalTambahKota').classList.remove('hidden');
        }

        function closeModalTambahKota() {
            document.getElementById('modalTambahKota').classList.add('hidden');
        }

        function simpanKota() {
            const nama = document.getElementById('addKotaNama').value;
            alert('Master kota pool baru "' + nama + '" berhasil disimpan ke database master.');
            closeModalTambahKota();
        }

        function openModalTambahRute() {
            document.getElementById('modalTambahRute').classList.remove('hidden');
        }

        function closeModalTambahRute() {
            document.getElementById('modalTambahRute').classList.add('hidden');
        }

        function simpanRute() {
            alert('Master rute baru berhasil disimpan.');
            closeModalTambahRute();
        }
    </script>

</body>
</html>

