<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kelola Kendaraan & Armada - Super Admin</title>

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
                <a href="{{ route('admin.kota') }}" class="font-medium text-xs text-cream-50/80 hover:text-white px-3 py-1.5 rounded-lg hover:bg-forest-700/50 transition-colors flex items-center gap-1.5">
                    <span class="material-symbols-outlined text-[16px]">alt_route</span>
                    Kota &amp; Rute
                </a>
                <a href="{{ route('admin.kendaraan') }}" class="font-semibold text-xs bg-forest-700 text-white px-3 py-1.5 rounded-lg transition-colors flex items-center gap-1.5">
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
                    <h1 class="font-headline-lg text-2xl sm:text-3xl font-semibold text-forest-900 tracking-tight">Manajemen Armada Kendaraan Travel</h1>
                    <p class="text-sm text-ink-600 mt-1">Kelola data fisik armada, plat nomor polisi, kapasitas kursi kabin, fasilitas penumpang, dan status kelaikan jalan.</p>
                </div>
                <div class="flex items-center gap-3">
                    <button onclick="openModalTambahKendaraan()" class="px-4 py-2.5 rounded-xl bg-forest-700 hover:bg-forest-900 text-white font-semibold text-xs transition-colors flex items-center gap-1.5 shadow-xs">
                        <span class="material-symbols-outlined text-[18px]">add_circle</span>
                        + Daftarkan Armada Baru
                    </button>
                </div>
            </div>

            <!-- KPI STATUS ARMADA -->
            <div class="grid grid-cols-1 sm:grid-cols-4 gap-4 text-xs">
                <div class="bg-paper-0 p-4 rounded-xl border border-surface-container shadow-xs">
                    <span class="text-ink-600 block">Total Armada Travel</span>
                    <span class="text-xl font-bold font-mono text-forest-900 mt-1 block">12 Unit</span>
                    <span class="text-[10px] text-ink-600">HiAce Commuter &amp; Elf</span>
                </div>
                <div class="bg-paper-0 p-4 rounded-xl border border-surface-container shadow-xs">
                    <span class="text-ink-600 block">Siap Beroperasi</span>
                    <span class="text-xl font-bold font-mono text-green-700 mt-1 block">9 Unit</span>
                    <span class="text-[10px] text-green-700 font-semibold">Siap tugas hari ini</span>
                </div>
                <div class="bg-paper-0 p-4 rounded-xl border border-surface-container shadow-xs">
                    <span class="text-ink-600 block">Sedang di Perjalanan</span>
                    <span class="text-xl font-bold font-mono text-blue-600 mt-1 block">2 Unit</span>
                    <span class="text-[10px] text-blue-600 font-semibold">Rute Krui &amp; Metro</span>
                </div>
                <div class="bg-paper-0 p-4 rounded-xl border border-surface-container shadow-xs">
                    <span class="text-ink-600 block">Servis / Perawatan</span>
                    <span class="text-xl font-bold font-mono text-amber-500 mt-1 block">1 Unit</span>
                    <span class="text-[10px] text-amber-500 font-semibold">Bengkel Pool Rajabasa</span>
                </div>
            </div>

            <!-- TABEL KENDARAAN -->
            <div class="bg-paper-0 rounded-2xl border border-surface-container shadow-xs overflow-hidden">
                <div class="overflow-x-auto">
                    <table class="w-full text-left border-collapse text-xs">
                        <thead>
                            <tr class="bg-surface-container-low/80 border-b border-surface-container text-ink-600 font-semibold uppercase tracking-wider text-[11px]">
                                <th class="py-3.5 px-4">Kode</th>
                                <th class="py-3.5 px-4">Nomor Polisi (Plat)</th>
                                <th class="py-3.5 px-4">Merk &amp; Tipe Armada</th>
                                <th class="py-3.5 px-4">Kapasitas Kursi</th>
                                <th class="py-3.5 px-4">Tahun</th>
                                <th class="py-3.5 px-4">Fasilitas Kabin</th>
                                <th class="py-3.5 px-4">Status Kelaikan</th>
                                <th class="py-3.5 px-4 text-center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-surface-container font-medium text-forest-900">

                            <!-- ARMADA 1 -->
                            <tr class="hover:bg-surface-container-low/50 transition-colors">
                                <td class="py-4 px-4 font-mono font-bold text-forest-700">ARM-01</td>
                                <td class="py-4 px-4 font-mono font-bold text-forest-900 text-sm">
                                    <span class="bg-surface-container px-2.5 py-1 rounded border border-surface-container-highest">BE 7012 AA</span>
                                </td>
                                <td class="py-4 px-4">
                                    <strong class="font-bold text-forest-900 block text-xs">Toyota HiAce Commuter</strong>
                                    <span class="text-[11px] text-ink-600">Warna Silver Metalik</span>
                                </td>
                                <td class="py-4 px-4 font-mono font-bold text-forest-900">11 Kursi</td>
                                <td class="py-4 px-4 font-mono">2023</td>
                                <td class="py-4 px-4">
                                    <div class="flex flex-wrap gap-1 text-[10px]">
                                        <span class="bg-sage-100 text-forest-900 px-2 py-0.5 rounded">Full AC</span>
                                        <span class="bg-sage-100 text-forest-900 px-2 py-0.5 rounded">Reclining Seat</span>
                                        <span class="bg-sage-100 text-forest-900 px-2 py-0.5 rounded">USB Charger</span>
                                    </div>
                                </td>
                                <td class="py-4 px-4">
                                    <span class="bg-green-700/15 text-green-700 font-bold px-2.5 py-1 rounded-full text-[11px] inline-flex items-center gap-1">
                                        <span class="w-1.5 h-1.5 rounded-full bg-green-700"></span> Siap Operasi
                                    </span>
                                </td>
                                <td class="py-4 px-4 text-center">
                                    <div class="flex items-center justify-center gap-1.5">
                                        <button onclick="editKendaraan('ARM-01', 'BE 7012 AA', 'Toyota HiAce Commuter', '11')" class="p-1.5 rounded-lg bg-surface-container hover:bg-forest-700 hover:text-white transition-colors" title="Edit">
                                            <span class="material-symbols-outlined text-[16px]">edit</span>
                                        </button>
                                        <button onclick="ubahStatusArmada('ARM-01')" class="p-1.5 rounded-lg bg-surface-container hover:bg-amber-500 hover:text-forest-900 transition-colors" title="Ubah Status">
                                            <span class="material-symbols-outlined text-[16px]">sync_alt</span>
                                        </button>
                                    </div>
                                </td>
                            </tr>

                            <!-- ARMADA 2 -->
                            <tr class="hover:bg-surface-container-low/50 transition-colors">
                                <td class="py-4 px-4 font-mono font-bold text-forest-700">ARM-02</td>
                                <td class="py-4 px-4 font-mono font-bold text-forest-900 text-sm">
                                    <span class="bg-surface-container px-2.5 py-1 rounded border border-surface-container-highest">BE 7200 BB</span>
                                </td>
                                <td class="py-4 px-4">
                                    <strong class="font-bold text-forest-900 block text-xs">Toyota HiAce Premio Luxury</strong>
                                    <span class="text-[11px] text-ink-600">Warna Putih Mutiara</span>
                                </td>
                                <td class="py-4 px-4 font-mono font-bold text-forest-900">11 Kursi</td>
                                <td class="py-4 px-4 font-mono">2024</td>
                                <td class="py-4 px-4">
                                    <div class="flex flex-wrap gap-1 text-[10px]">
                                        <span class="bg-sage-100 text-forest-900 px-2 py-0.5 rounded">Full AC</span>
                                        <span class="bg-sage-100 text-forest-900 px-2 py-0.5 rounded">Captain Seat</span>
                                        <span class="bg-sage-100 text-forest-900 px-2 py-0.5 rounded">Audio Karaoke</span>
                                    </div>
                                </td>
                                <td class="py-4 px-4">
                                    <span class="bg-blue-600/15 text-blue-600 font-bold px-2.5 py-1 rounded-full text-[11px] inline-flex items-center gap-1">
                                        <span class="material-symbols-outlined text-[13px]">navigation</span> Di Perjalanan
                                    </span>
                                </td>
                                <td class="py-4 px-4 text-center">
                                    <div class="flex items-center justify-center gap-1.5">
                                        <button onclick="editKendaraan('ARM-02', 'BE 7200 BB', 'Toyota HiAce Premio', '11')" class="p-1.5 rounded-lg bg-surface-container hover:bg-forest-700 hover:text-white transition-colors">
                                            <span class="material-symbols-outlined text-[16px]">edit</span>
                                        </button>
                                        <button onclick="ubahStatusArmada('ARM-02')" class="p-1.5 rounded-lg bg-surface-container hover:bg-amber-500 hover:text-forest-900 transition-colors">
                                            <span class="material-symbols-outlined text-[16px]">sync_alt</span>
                                        </button>
                                    </div>
                                </td>
                            </tr>

                            <!-- ARMADA 3 -->
                            <tr class="hover:bg-surface-container-low/50 transition-colors">
                                <td class="py-4 px-4 font-mono font-bold text-forest-700">ARM-03</td>
                                <td class="py-4 px-4 font-mono font-bold text-forest-900 text-sm">
                                    <span class="bg-surface-container px-2.5 py-1 rounded border border-surface-container-highest">BE 7331 CC</span>
                                </td>
                                <td class="py-4 px-4">
                                    <strong class="font-bold text-forest-900 block text-xs">Isuzu Elf Long NLR</strong>
                                    <span class="text-[11px] text-ink-600">Warna Putih Hijau</span>
                                </td>
                                <td class="py-4 px-4 font-mono font-bold text-forest-900">14 Kursi</td>
                                <td class="py-4 px-4 font-mono">2022</td>
                                <td class="py-4 px-4">
                                    <div class="flex flex-wrap gap-1 text-[10px]">
                                        <span class="bg-sage-100 text-forest-900 px-2 py-0.5 rounded">Full AC</span>
                                        <span class="bg-sage-100 text-forest-900 px-2 py-0.5 rounded">Bagasi Luas</span>
                                    </div>
                                </td>
                                <td class="py-4 px-4">
                                    <span class="bg-green-700/15 text-green-700 font-bold px-2.5 py-1 rounded-full text-[11px] inline-flex items-center gap-1">
                                        <span class="w-1.5 h-1.5 rounded-full bg-green-700"></span> Siap Operasi
                                    </span>
                                </td>
                                <td class="py-4 px-4 text-center">
                                    <div class="flex items-center justify-center gap-1.5">
                                        <button onclick="editKendaraan('ARM-03', 'BE 7331 CC', 'Isuzu Elf Long', '14')" class="p-1.5 rounded-lg bg-surface-container hover:bg-forest-700 hover:text-white transition-colors">
                                            <span class="material-symbols-outlined text-[16px]">edit</span>
                                        </button>
                                        <button onclick="ubahStatusArmada('ARM-03')" class="p-1.5 rounded-lg bg-surface-container hover:bg-amber-500 hover:text-forest-900 transition-colors">
                                            <span class="material-symbols-outlined text-[16px]">sync_alt</span>
                                        </button>
                                    </div>
                                </td>
                            </tr>

                            <!-- ARMADA 4 -->
                            <tr class="hover:bg-surface-container-low/50 transition-colors">
                                <td class="py-4 px-4 font-mono font-bold text-forest-700">ARM-04</td>
                                <td class="py-4 px-4 font-mono font-bold text-forest-900 text-sm">
                                    <span class="bg-surface-container px-2.5 py-1 rounded border border-surface-container-highest">BE 7014 AA</span>
                                </td>
                                <td class="py-4 px-4">
                                    <strong class="font-bold text-forest-900 block text-xs">Toyota HiAce Commuter</strong>
                                    <span class="text-[11px] text-ink-600">Warna Hitam Metalik</span>
                                </td>
                                <td class="py-4 px-4 font-mono font-bold text-forest-900">11 Kursi</td>
                                <td class="py-4 px-4 font-mono">2023</td>
                                <td class="py-4 px-4">
                                    <div class="flex flex-wrap gap-1 text-[10px]">
                                        <span class="bg-sage-100 text-forest-900 px-2 py-0.5 rounded">Full AC</span>
                                        <span class="bg-sage-100 text-forest-900 px-2 py-0.5 rounded">USB Charger</span>
                                    </div>
                                </td>
                                <td class="py-4 px-4">
                                    <span class="bg-amber-500/15 text-tertiary-container font-bold px-2.5 py-1 rounded-full text-[11px] inline-flex items-center gap-1">
                                        <span class="material-symbols-outlined text-[13px]">build</span> Servis Bengkel
                                    </span>
                                </td>
                                <td class="py-4 px-4 text-center">
                                    <div class="flex items-center justify-center gap-1.5">
                                        <button onclick="editKendaraan('ARM-04', 'BE 7014 AA', 'Toyota HiAce Commuter', '11')" class="p-1.5 rounded-lg bg-surface-container hover:bg-forest-700 hover:text-white transition-colors">
                                            <span class="material-symbols-outlined text-[16px]">edit</span>
                                        </button>
                                        <button onclick="ubahStatusArmada('ARM-04')" class="p-1.5 rounded-lg bg-surface-container hover:bg-amber-500 hover:text-forest-900 transition-colors">
                                            <span class="material-symbols-outlined text-[16px]">sync_alt</span>
                                        </button>
                                    </div>
                                </td>
                            </tr>

                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </main>

    <!-- MODAL TAMBAH KENDARAAN -->
    <div id="modalTambahKendaraan" class="fixed inset-0 bg-ink-900/60 backdrop-blur-sm z-50 hidden flex items-center justify-center p-4">
        <div class="bg-paper-0 rounded-2xl max-w-lg w-full p-6 space-y-4 shadow-2xl animate-in fade-in zoom-in duration-150">
            <div class="flex items-center justify-between pb-3 border-b border-surface-container">
                <div class="flex items-center gap-2">
                    <span class="material-symbols-outlined text-forest-700 text-[22px]">directions_bus</span>
                    <h3 class="font-title-sm text-base font-bold text-forest-900">Daftarkan Kendaraan Baru</h3>
                </div>
                <button onclick="closeModalTambahKendaraan()" class="text-ink-600 hover:text-forest-900 p-1">
                    <span class="material-symbols-outlined text-[20px]">close</span>
                </button>
            </div>

            <form onsubmit="event.preventDefault(); simpanKendaraanBaru();" class="space-y-3 text-xs">
                <div class="grid grid-cols-2 gap-3">
                    <div>
                        <label class="block font-bold text-forest-900 uppercase tracking-wider mb-1">Nomor Plat Polisi <span class="text-red-600">*</span></label>
                        <input type="text" id="addPlat" placeholder="BE 7890 XY" class="w-full bg-surface-container-low p-2.5 rounded-xl border border-surface-container text-forest-900 font-mono font-bold" required>
                    </div>
                    <div>
                        <label class="block font-bold text-forest-900 uppercase tracking-wider mb-1">Merk / Tipe Kendaraan <span class="text-red-600">*</span></label>
                        <select class="w-full bg-surface-container-low p-2.5 rounded-xl border border-surface-container text-forest-900 font-semibold" required>
                            <option>Toyota HiAce Commuter</option>
                            <option>Toyota HiAce Premio Luxury</option>
                            <option>Isuzu Elf Long NLR</option>
                        </select>
                    </div>
                </div>

                <div class="grid grid-cols-2 gap-3">
                    <div>
                        <label class="block font-bold text-forest-900 uppercase tracking-wider mb-1">Kapasitas Tempat Duduk</label>
                        <select class="w-full bg-surface-container-low p-2.5 rounded-xl border border-surface-container text-forest-900 font-semibold">
                            <option value="11">11 Kursi Penumpang</option>
                            <option value="14">14 Kursi Penumpang</option>
                        </select>
                    </div>
                    <div>
                        <label class="block font-bold text-forest-900 uppercase tracking-wider mb-1">Tahun Perakitan</label>
                        <input type="number" value="2024" class="w-full bg-surface-container-low p-2.5 rounded-xl border border-surface-container text-forest-900 font-mono">
                    </div>
                </div>

                <div>
                    <label class="block font-bold text-forest-900 uppercase tracking-wider mb-1.5">Fasilitas Kabin Tersedia</label>
                    <div class="grid grid-cols-2 gap-2 text-[11px]">
                        <label class="flex items-center gap-1.5 cursor-pointer">
                            <input type="checkbox" checked class="rounded text-forest-700">
                            <span>AC Double Blower</span>
                        </label>
                        <label class="flex items-center gap-1.5 cursor-pointer">
                            <input type="checkbox" checked class="rounded text-forest-700">
                            <span>Kursi Reclining Nyaman</span>
                        </label>
                        <label class="flex items-center gap-1.5 cursor-pointer">
                            <input type="checkbox" checked class="rounded text-forest-700">
                            <span>Port USB Charger Tiap Kursi</span>
                        </label>
                        <label class="flex items-center gap-1.5 cursor-pointer">
                            <input type="checkbox" checked class="rounded text-forest-700">
                            <span>Audio &amp; Karaoke Multimedia</span>
                        </label>
                    </div>
                </div>

                <div>
                    <label class="block font-bold text-forest-900 uppercase tracking-wider mb-1">Status Kelaikan Awal</label>
                    <select class="w-full bg-surface-container-low p-2.5 rounded-xl border border-surface-container text-forest-900 font-semibold">
                        <option value="SIAP">Siap Beroperasi</option>
                        <option value="STANDBY">Cadangan di Pool</option>
                        <option value="BENGKEL">Dalam Perawatan</option>
                    </select>
                </div>

                <div class="pt-2 border-t border-surface-container flex gap-2">
                    <button type="submit" class="w-full bg-forest-700 hover:bg-forest-900 text-white font-bold text-xs py-3 rounded-xl transition-colors">
                        Daftarkan Armada
                    </button>
                    <button type="button" onclick="closeModalTambahKendaraan()" class="w-full bg-surface-container hover:bg-surface-container-high text-forest-900 font-medium text-xs py-3 rounded-xl transition-colors">
                        Batal
                    </button>
                </div>
            </form>
        </div>
    </div>

    <!-- ROLE SWITCHER INCLUDED -->
    @include('partials.role-switcher')

    <script>
        function openModalTambahKendaraan() {
            document.getElementById('modalTambahKendaraan').classList.remove('hidden');
        }

        function closeModalTambahKendaraan() {
            document.getElementById('modalTambahKendaraan').classList.add('hidden');
        }

        function simpanKendaraanBaru() {
            const plat = document.getElementById('addPlat').value;
            alert('Kendaraan baru dengan plat ' + plat + ' berhasil didaftarkan ke armada operasional.');
            closeModalTambahKendaraan();
        }

        function editKendaraan(kode, plat, tipe, kapasitas) {
            alert('Membuka edit data armada ' + kode + ' (' + plat + ').');
        }

        function ubahStatusArmada(kode) {
            const status = prompt('Ubah status armada ' + kode + ' (1: Siap Operasi, 2: Di Perjalanan, 3: Servis Bengkel):', '1');
            if (status) {
                alert('Status armada ' + kode + ' berhasil diperbarui.');
            }
        }
    </script>

</body>
</html>

