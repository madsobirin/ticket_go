<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kelola Data Pelanggan - Super Admin</title>

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
                <a href="{{ route('admin.pelanggan') }}" class="font-semibold text-xs bg-forest-700 text-white px-3 py-1.5 rounded-lg transition-colors flex items-center gap-1.5">
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
                    <h1 class="font-headline-lg text-2xl sm:text-3xl font-semibold text-forest-900 tracking-tight">Manajemen Data Member &amp; Pelanggan</h1>
                    <p class="text-sm text-ink-600 mt-1">Kelola data identitas pengguna terdaftar, pantau riwayat perjalanan, dan atur status akun aktif/blokir.</p>
                </div>
                <div class="flex items-center gap-3">
                    <button onclick="openModalTambahPelanggan()" class="px-4 py-2.5 rounded-xl bg-forest-700 hover:bg-forest-900 text-white font-semibold text-xs transition-colors flex items-center gap-1.5 shadow-xs">
                        <span class="material-symbols-outlined text-[18px]">person_add</span>
                        + Tambah Pelanggan Baru
                    </button>
                </div>
            </div>

            <!-- STATS RINGKAS -->
            <div class="grid grid-cols-1 sm:grid-cols-4 gap-4 text-xs">
                <div class="bg-paper-0 p-4 rounded-xl border border-surface-container shadow-xs">
                    <span class="text-ink-600 block">Total Member Terdaftar</span>
                    <span class="text-xl font-bold font-mono text-forest-900 mt-1 block">1.420 Orang</span>
                </div>
                <div class="bg-paper-0 p-4 rounded-xl border border-surface-container shadow-xs">
                    <span class="text-ink-600 block">Akun Member Aktif</span>
                    <span class="text-xl font-bold font-mono text-green-700 mt-1 block">1.380 Akun</span>
                </div>
                <div class="bg-paper-0 p-4 rounded-xl border border-surface-container shadow-xs">
                    <span class="text-ink-600 block">Akun Ditangguhkan</span>
                    <span class="text-xl font-bold font-mono text-amber-500 mt-1 block">35 Akun</span>
                </div>
                <div class="bg-paper-0 p-4 rounded-xl border border-surface-container shadow-xs">
                    <span class="text-ink-600 block">Akun Diblokir</span>
                    <span class="text-xl font-bold font-mono text-red-600 mt-1 block">5 Akun</span>
                </div>
            </div>

            <!-- SEARCH & FILTER -->
            <div class="bg-paper-0 p-4 rounded-2xl border border-surface-container shadow-xs flex flex-col sm:flex-row items-center justify-between gap-3">
                <div class="w-full sm:w-96 relative">
                    <span class="absolute inset-y-0 left-0 pl-3.5 flex items-center pointer-events-none text-ink-600">
                        <span class="material-symbols-outlined text-[18px]">search</span>
                    </span>
                    <input id="searchPelanggan" onkeyup="filterPelanggan()" type="text" placeholder="Cari nama pelanggan, username, nomor HP, atau ID..." class="w-full pl-10 pr-4 py-2.5 rounded-xl bg-surface-container-low border border-surface-container text-xs text-forest-900">
                </div>
                <div class="flex items-center gap-2">
                    <select id="statusFilter" onchange="filterPelanggan()" class="py-2.5 px-3 rounded-xl bg-surface-container-low border border-surface-container text-xs text-forest-900">
                        <option value="">Semua Status Akun</option>
                        <option value="Aktif">Status: Aktif</option>
                        <option value="Ditangguhkan">Status: Ditangguhkan</option>
                        <option value="Diblokir">Status: Diblokir</option>
                    </select>
                </div>
            </div>

            <!-- TABEL DATA PELANGGAN -->
            <div class="bg-paper-0 rounded-2xl border border-surface-container shadow-xs overflow-hidden">
                <div class="overflow-x-auto">
                    <table class="w-full text-left border-collapse text-xs">
                        <thead>
                            <tr class="bg-surface-container-low/80 border-b border-surface-container text-ink-600 font-semibold uppercase tracking-wider text-[11px]">
                                <th class="py-3.5 px-4">ID Member</th>
                                <th class="py-3.5 px-4">Nama &amp; Username</th>
                                <th class="py-3.5 px-4">Kontak (HP &amp; Email)</th>
                                <th class="py-3.5 px-4">Alamat Domisili</th>
                                <th class="py-3.5 px-4">Total Booking</th>
                                <th class="py-3.5 px-4">Status Akun</th>
                                <th class="py-3.5 px-4 text-center">Aksi Admin</th>
                            </tr>
                        </thead>
                        <tbody id="tablePelangganBody" class="divide-y divide-surface-container font-medium text-forest-900">

                            <!-- MEMBER 1 -->
                            <tr class="hover:bg-surface-container-low/50 transition-colors pelanggan-row" data-status="Aktif">
                                <td class="py-4 px-4 font-mono font-bold text-forest-700">MBR-0081</td>
                                <td class="py-4 px-4">
                                    <div class="flex items-center gap-2.5">
                                        <div class="w-8 h-8 rounded-full bg-forest-700 text-white font-bold flex items-center justify-center text-xs">
                                            BH
                                        </div>
                                        <div>
                                            <strong class="font-bold text-forest-900 block text-xs">Bambang Hermanto</strong>
                                            <span class="text-[11px] text-ink-600">@bambang_h</span>
                                        </div>
                                    </div>
                                </td>
                                <td class="py-4 px-4">
                                    <div class="font-mono text-forest-900">081234567890</div>
                                    <span class="text-[11px] text-ink-600">bambang@gmail.com</span>
                                </td>
                                <td class="py-4 px-4 text-ink-600 max-w-[200px] truncate" title="Jl. Raden Intan No. 45, Enggal, Bandar Lampung">
                                    Jl. Raden Intan No. 45, Bandar Lampung
                                </td>
                                <td class="py-4 px-4">
                                    <span class="font-bold text-forest-900">12 Tiket</span>
                                    <span class="block text-[10px] text-ink-600">Rp 1.440.000</span>
                                </td>
                                <td class="py-4 px-4">
                                    <span class="bg-green-700/15 text-green-700 font-bold px-2.5 py-1 rounded-full text-[11px] inline-flex items-center gap-1">
                                        <span class="material-symbols-outlined text-[13px]">check</span> Aktif
                                    </span>
                                </td>
                                <td class="py-4 px-4 text-center">
                                    <div class="flex items-center justify-center gap-1.5">
                                        <button onclick="lihatDetailMember('MBR-0081', 'Bambang Hermanto', '081234567890', 'bambang@gmail.com', '12 Tiket', 'Aktif')" class="p-1.5 rounded-lg bg-surface-container hover:bg-forest-700 hover:text-white transition-colors" title="Lihat Detail Riwayat">
                                            <span class="material-symbols-outlined text-[16px]">visibility</span>
                                        </button>
                                        <button onclick="editMember('MBR-0081', 'Bambang Hermanto', '081234567890', 'bambang@gmail.com')" class="p-1.5 rounded-lg bg-surface-container hover:bg-amber-500 hover:text-forest-900 transition-colors" title="Edit Data">
                                            <span class="material-symbols-outlined text-[16px]">edit</span>
                                        </button>
                                        <button onclick="ubahStatusMember('MBR-0081', 'Blokir')" class="p-1.5 rounded-lg bg-red-600/15 text-red-600 hover:bg-red-600 hover:text-white transition-colors" title="Blokir Akun">
                                            <span class="material-symbols-outlined text-[16px]">block</span>
                                        </button>
                                    </div>
                                </td>
                            </tr>

                            <!-- MEMBER 2 -->
                            <tr class="hover:bg-surface-container-low/50 transition-colors pelanggan-row" data-status="Aktif">
                                <td class="py-4 px-4 font-mono font-bold text-forest-700">MBR-0082</td>
                                <td class="py-4 px-4">
                                    <div class="flex items-center gap-2.5">
                                        <div class="w-8 h-8 rounded-full bg-secondary-container text-forest-700 font-bold flex items-center justify-center text-xs">
                                            SR
                                        </div>
                                        <div>
                                            <strong class="font-bold text-forest-900 block text-xs">Siti Rahayu</strong>
                                            <span class="text-[11px] text-ink-600">@siti_rahayu</span>
                                        </div>
                                    </div>
                                </td>
                                <td class="py-4 px-4">
                                    <div class="font-mono text-forest-900">082188991122</div>
                                    <span class="text-[11px] text-ink-600">siti.r@gmail.com</span>
                                </td>
                                <td class="py-4 px-4 text-ink-600 max-w-[200px] truncate">
                                    Jl. Ahmad Yani No. 12, Metro Pusat
                                </td>
                                <td class="py-4 px-4">
                                    <span class="font-bold text-forest-900">5 Tiket</span>
                                    <span class="block text-[10px] text-ink-600">Rp 225.000</span>
                                </td>
                                <td class="py-4 px-4">
                                    <span class="bg-green-700/15 text-green-700 font-bold px-2.5 py-1 rounded-full text-[11px] inline-flex items-center gap-1">
                                        <span class="material-symbols-outlined text-[13px]">check</span> Aktif
                                    </span>
                                </td>
                                <td class="py-4 px-4 text-center">
                                    <div class="flex items-center justify-center gap-1.5">
                                        <button onclick="lihatDetailMember('MBR-0082', 'Siti Rahayu', '082188991122', 'siti.r@gmail.com', '5 Tiket', 'Aktif')" class="p-1.5 rounded-lg bg-surface-container hover:bg-forest-700 hover:text-white transition-colors">
                                            <span class="material-symbols-outlined text-[16px]">visibility</span>
                                        </button>
                                        <button onclick="editMember('MBR-0082', 'Siti Rahayu', '082188991122', 'siti.r@gmail.com')" class="p-1.5 rounded-lg bg-surface-container hover:bg-amber-500 hover:text-forest-900 transition-colors">
                                            <span class="material-symbols-outlined text-[16px]">edit</span>
                                        </button>
                                        <button onclick="ubahStatusMember('MBR-0082', 'Blokir')" class="p-1.5 rounded-lg bg-red-600/15 text-red-600 hover:bg-red-600 hover:text-white transition-colors">
                                            <span class="material-symbols-outlined text-[16px]">block</span>
                                        </button>
                                    </div>
                                </td>
                            </tr>

                            <!-- MEMBER 3 -->
                            <tr class="hover:bg-surface-container-low/50 transition-colors pelanggan-row" data-status="Ditangguhkan">
                                <td class="py-4 px-4 font-mono font-bold text-forest-700">MBR-0083</td>
                                <td class="py-4 px-4">
                                    <div class="flex items-center gap-2.5">
                                        <div class="w-8 h-8 rounded-full bg-amber-500/20 text-tertiary-container font-bold flex items-center justify-center text-xs">
                                            HK
                                        </div>
                                        <div>
                                            <strong class="font-bold text-forest-900 block text-xs">Hendra Kusuma</strong>
                                            <span class="text-[11px] text-ink-600">@hendra_k</span>
                                        </div>
                                    </div>
                                </td>
                                <td class="py-4 px-4">
                                    <div class="font-mono text-forest-900">081122334455</div>
                                    <span class="text-[11px] text-ink-600">hendra@yahoo.com</span>
                                </td>
                                <td class="py-4 px-4 text-ink-600 max-w-[200px] truncate">
                                    Krui Pesisir Barat
                                </td>
                                <td class="py-4 px-4">
                                    <span class="font-bold text-forest-900">2 Tiket</span>
                                    <span class="block text-[10px] text-ink-600">Rp 240.000</span>
                                </td>
                                <td class="py-4 px-4">
                                    <span class="bg-amber-500/15 text-tertiary-container font-bold px-2.5 py-1 rounded-full text-[11px]">
                                        Ditangguhkan
                                    </span>
                                </td>
                                <td class="py-4 px-4 text-center">
                                    <div class="flex items-center justify-center gap-1.5">
                                        <button onclick="lihatDetailMember('MBR-0083', 'Hendra Kusuma', '081122334455', 'hendra@yahoo.com', '2 Tiket', 'Ditangguhkan')" class="p-1.5 rounded-lg bg-surface-container hover:bg-forest-700 hover:text-white transition-colors">
                                            <span class="material-symbols-outlined text-[16px]">visibility</span>
                                        </button>
                                        <button onclick="ubahStatusMember('MBR-0083', 'Aktif')" class="px-2 py-1 rounded-lg bg-green-700 text-white font-bold text-[10px]">
                                            Aktifkan
                                        </button>
                                    </div>
                                </td>
                            </tr>

                            <!-- MEMBER 4 -->
                            <tr class="hover:bg-surface-container-low/50 transition-colors pelanggan-row" data-status="Aktif">
                                <td class="py-4 px-4 font-mono font-bold text-forest-700">MBR-0084</td>
                                <td class="py-4 px-4">
                                    <div class="flex items-center gap-2.5">
                                        <div class="w-8 h-8 rounded-full bg-forest-700 text-white font-bold flex items-center justify-center text-xs">
                                            AP
                                        </div>
                                        <div>
                                            <strong class="font-bold text-forest-900 block text-xs">Agus Prasetyo</strong>
                                            <span class="text-[11px] text-ink-600">@agus_p</span>
                                        </div>
                                    </div>
                                </td>
                                <td class="py-4 px-4">
                                    <div class="font-mono text-forest-900">085299182311</div>
                                    <span class="text-[11px] text-ink-600">agus.pras@gmail.com</span>
                                </td>
                                <td class="py-4 px-4 text-ink-600 max-w-[200px] truncate">
                                    Kotabumi, Lampung Utara
                                </td>
                                <td class="py-4 px-4">
                                    <span class="font-bold text-forest-900">8 Tiket</span>
                                    <span class="block text-[10px] text-ink-600">Rp 560.000</span>
                                </td>
                                <td class="py-4 px-4">
                                    <span class="bg-green-700/15 text-green-700 font-bold px-2.5 py-1 rounded-full text-[11px] inline-flex items-center gap-1">
                                        <span class="material-symbols-outlined text-[13px]">check</span> Aktif
                                    </span>
                                </td>
                                <td class="py-4 px-4 text-center">
                                    <div class="flex items-center justify-center gap-1.5">
                                        <button onclick="lihatDetailMember('MBR-0084', 'Agus Prasetyo', '085299182311', 'agus.pras@gmail.com', '8 Tiket', 'Aktif')" class="p-1.5 rounded-lg bg-surface-container hover:bg-forest-700 hover:text-white transition-colors">
                                            <span class="material-symbols-outlined text-[16px]">visibility</span>
                                        </button>
                                        <button onclick="editMember('MBR-0084', 'Agus Prasetyo', '085299182311', 'agus.pras@gmail.com')" class="p-1.5 rounded-lg bg-surface-container hover:bg-amber-500 hover:text-forest-900 transition-colors">
                                            <span class="material-symbols-outlined text-[16px]">edit</span>
                                        </button>
                                        <button onclick="ubahStatusMember('MBR-0084', 'Blokir')" class="p-1.5 rounded-lg bg-red-600/15 text-red-600 hover:bg-red-600 hover:text-white transition-colors">
                                            <span class="material-symbols-outlined text-[16px]">block</span>
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

    <!-- MODAL TAMBAH PELANGGAN BARU -->
    <div id="modalTambahPelanggan" class="fixed inset-0 bg-ink-900/60 backdrop-blur-sm z-50 hidden flex items-center justify-center p-4">
        <div class="bg-paper-0 rounded-2xl max-w-lg w-full p-6 space-y-5 shadow-2xl animate-in fade-in zoom-in duration-150">
            <div class="flex items-center justify-between pb-3 border-b border-surface-container">
                <div class="flex items-center gap-2">
                    <span class="material-symbols-outlined text-forest-700 text-[22px]">person_add</span>
                    <h3 class="font-title-sm text-base font-bold text-forest-900">Tambah Akun Pelanggan Baru</h3>
                </div>
                <button onclick="closeModalTambahPelanggan()" class="text-ink-600 hover:text-forest-900 p-1">
                    <span class="material-symbols-outlined text-[20px]">close</span>
                </button>
            </div>

            <form onsubmit="event.preventDefault(); simpanPelanggan();" class="space-y-4 text-xs">
                <div>
                    <label class="block font-bold text-forest-900 uppercase tracking-wider mb-1">Nama Lengkap Member <span class="text-red-600">*</span></label>
                    <input type="text" id="addNama" placeholder="Cth: Ahmad Fauzi" class="w-full bg-surface-container-low p-2.5 rounded-xl border border-surface-container text-forest-900" required>
                </div>

                <div class="grid grid-cols-2 gap-3">
                    <div>
                        <label class="block font-bold text-forest-900 uppercase tracking-wider mb-1">Username Akun <span class="text-red-600">*</span></label>
                        <input type="text" id="addUsername" placeholder="ahmad_fauzi" class="w-full bg-surface-container-low p-2.5 rounded-xl border border-surface-container text-forest-900" required>
                    </div>
                    <div>
                        <label class="block font-bold text-forest-900 uppercase tracking-wider mb-1">Password Awal <span class="text-red-600">*</span></label>
                        <input type="password" value="password123" class="w-full bg-surface-container-low p-2.5 rounded-xl border border-surface-container text-forest-900" required>
                    </div>
                </div>

                <div class="grid grid-cols-2 gap-3">
                    <div>
                        <label class="block font-bold text-forest-900 uppercase tracking-wider mb-1">No. WhatsApp / HP <span class="text-red-600">*</span></label>
                        <input type="tel" id="addHp" placeholder="08xxxxxxxxxx" class="w-full bg-surface-container-low p-2.5 rounded-xl border border-surface-container text-forest-900 font-mono" required>
                    </div>
                    <div>
                        <label class="block font-bold text-forest-900 uppercase tracking-wider mb-1">Email <span class="text-red-600">*</span></label>
                        <input type="email" id="addEmail" placeholder="ahmad@gmail.com" class="w-full bg-surface-container-low p-2.5 rounded-xl border border-surface-container text-forest-900" required>
                    </div>
                </div>

                <div>
                    <label class="block font-bold text-forest-900 uppercase tracking-wider mb-1">Alamat Domisili Lengkap</label>
                    <textarea rows="2" placeholder="Cth: Jl. Teuku Umar No. 88, Kedaton, Bandar Lampung..." class="w-full bg-surface-container-low p-2.5 rounded-xl border border-surface-container text-forest-900"></textarea>
                </div>

                <div class="pt-2 border-t border-surface-container flex gap-2">
                    <button type="submit" class="w-full bg-forest-700 hover:bg-forest-900 text-white font-bold text-xs py-3 rounded-xl transition-colors">
                        Simpan Member Baru
                    </button>
                    <button type="button" onclick="closeModalTambahPelanggan()" class="w-full bg-surface-container hover:bg-surface-container-high text-forest-900 font-medium text-xs py-3 rounded-xl transition-colors">
                        Batal
                    </button>
                </div>
            </form>
        </div>
    </div>

    <!-- MODAL DETAIL MEMBER -->
    <div id="modalDetailMember" class="fixed inset-0 bg-ink-900/60 backdrop-blur-sm z-50 hidden flex items-center justify-center p-4">
        <div class="bg-paper-0 rounded-2xl max-w-md w-full p-6 space-y-4 shadow-2xl animate-in fade-in zoom-in duration-150">
            <div class="flex items-center justify-between pb-3 border-b border-surface-container">
                <div class="flex items-center gap-2">
                    <span class="material-symbols-outlined text-forest-700 text-[22px]">badge</span>
                    <h3 class="font-title-sm text-base font-bold text-forest-900">Detail Pelanggan Terdaftar</h3>
                </div>
                <button onclick="closeModalDetailMember()" class="text-ink-600 hover:text-forest-900 p-1">
                    <span class="material-symbols-outlined text-[20px]">close</span>
                </button>
            </div>

            <div class="space-y-3 text-xs">
                <div class="p-3 bg-cream-50 rounded-xl space-y-1">
                    <span class="text-[10px] text-ink-600 block">ID Member</span>
                    <strong id="detId" class="text-sm font-mono text-forest-700 font-bold">MBR-0081</strong>
                    <h4 id="detNama" class="text-base font-bold text-forest-900">Bambang Hermanto</h4>
                </div>

                <div class="grid grid-cols-2 gap-2">
                    <div class="p-2.5 bg-surface-container-low rounded-lg">
                        <span class="text-[10px] text-ink-600 block">Nomor Telepon</span>
                        <strong id="detHp" class="font-mono text-forest-900">081234567890</strong>
                    </div>
                    <div class="p-2.5 bg-surface-container-low rounded-lg">
                        <span class="text-[10px] text-ink-600 block">Email</span>
                        <strong id="detEmail" class="text-forest-900 truncate block">bambang@gmail.com</strong>
                    </div>
                </div>

                <div class="p-3 bg-surface-container-low rounded-xl flex justify-between items-center">
                    <div>
                        <span class="text-[10px] text-ink-600 block">Total Transaksi Booking</span>
                        <strong id="detBooking" class="text-sm font-bold text-forest-900">12 Tiket</strong>
                    </div>
                    <span class="bg-green-700/15 text-green-700 font-bold px-2 py-0.5 rounded text-[11px]" id="detStatus">
                        Aktif
                    </span>
                </div>
            </div>

            <div class="pt-2">
                <button onclick="closeModalDetailMember()" class="w-full bg-forest-700 text-white font-semibold text-xs py-2.5 rounded-xl">
                    Tutup
                </button>
            </div>
        </div>
    </div>

    <!-- ROLE SWITCHER INCLUDED -->
    @include('partials.role-switcher')

    <script>
        function filterPelanggan() {
            const query = document.getElementById('searchPelanggan').value.toLowerCase();
            const status = document.getElementById('statusFilter').value;
            const rows = document.querySelectorAll('.pelanggan-row');

            rows.forEach(row => {
                const text = row.textContent.toLowerCase();
                const matchQuery = text.includes(query);
                const matchStatus = !status || row.dataset.status === status;

                if (matchQuery && matchStatus) {
                    row.style.display = '';
                } else {
                    row.style.display = 'none';
                }
            });
        }

        function openModalTambahPelanggan() {
            document.getElementById('modalTambahPelanggan').classList.remove('hidden');
        }

        function closeModalTambahPelanggan() {
            document.getElementById('modalTambahPelanggan').classList.add('hidden');
        }

        function simpanPelanggan() {
            const nama = document.getElementById('addNama').value;
            alert('Member baru "' + nama + '" berhasil didaftarkan ke sistem Trans Lampung Express.');
            closeModalTambahPelanggan();
        }

        function lihatDetailMember(id, nama, hp, email, booking, status) {
            document.getElementById('detId').textContent = id;
            document.getElementById('detNama').textContent = nama;
            document.getElementById('detHp').textContent = hp;
            document.getElementById('detEmail').textContent = email;
            document.getElementById('detBooking').textContent = booking;
            document.getElementById('detStatus').textContent = status;
            document.getElementById('modalDetailMember').classList.remove('hidden');
        }

        function closeModalDetailMember() {
            document.getElementById('modalDetailMember').classList.add('hidden');
        }

        function editMember(id, nama, hp, email) {
            alert('Membuka mode edit untuk member ' + id + ' (' + nama + ').');
        }

        function ubahStatusMember(id, statusTujuan) {
            if (confirm('Ubah status member ' + id + ' menjadi ' + statusTujuan + '?')) {
                alert('Status member ' + id + ' berhasil diubah ke ' + statusTujuan + '.');
            }
        }
    </script>

</body>
</html>

