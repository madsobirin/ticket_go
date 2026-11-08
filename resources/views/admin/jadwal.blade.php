<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kelola Jadwal Keberangkatan - Super Admin</title>

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
                <a href="{{ route('admin.jadwal') }}" class="font-semibold text-xs bg-forest-700 text-white px-3 py-1.5 rounded-lg transition-colors flex items-center gap-1.5">
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
                    <h1 class="font-headline-lg text-2xl sm:text-3xl font-semibold text-forest-900 tracking-tight">Manajemen Jadwal Keberangkatan Armada</h1>
                    <p class="text-sm text-ink-600 mt-1">Atur jam rute, penugasan armada travel dan supir pengemudi, tarif tiket, serta ketersediaan kursi.</p>
                </div>
                <div class="flex items-center gap-3">
                    <button onclick="openModalTambahJadwal()" class="px-4 py-2.5 rounded-xl bg-forest-700 hover:bg-forest-900 text-white font-semibold text-xs transition-colors flex items-center gap-1.5 shadow-xs">
                        <span class="material-symbols-outlined text-[18px]">add_circle</span>
                        + Buat Jadwal Baru
                    </button>
                </div>
            </div>

            <!-- SEARCH & FILTER -->
            <div class="bg-paper-0 p-4 rounded-2xl border border-surface-container shadow-xs grid grid-cols-1 md:grid-cols-12 gap-3 items-center text-xs">
                <div class="md:col-span-5 relative">
                    <span class="absolute inset-y-0 left-0 pl-3.5 flex items-center pointer-events-none text-ink-600">
                        <span class="material-symbols-outlined text-[18px]">search</span>
                    </span>
                    <input id="searchJadwal" onkeyup="filterJadwal()" type="text" placeholder="Cari kode jadwal, nama supir, plat armada..." class="w-full pl-10 pr-4 py-2.5 rounded-xl bg-surface-container-low border border-surface-container text-xs text-forest-900">
                </div>
                <div class="md:col-span-4">
                    <select id="ruteJadwal" onchange="filterJadwal()" class="w-full py-2.5 px-3 rounded-xl bg-surface-container-low border border-surface-container text-xs text-forest-900">
                        <option value="">Semua Rute Antarkota</option>
                        <option value="Krui">Bandar Lampung ⇄ Krui</option>
                        <option value="Metro">Bandar Lampung ⇄ Metro</option>
                        <option value="Kotabumi">Bandar Lampung ⇄ Kotabumi</option>
                    </select>
                </div>
                <div class="md:col-span-3">
                    <input type="date" value="2026-11-10" class="w-full py-2.5 px-3 rounded-xl bg-surface-container-low border border-surface-container text-xs text-forest-900 font-mono">
                </div>
            </div>

            <!-- TABEL JADWAL -->
            <div class="bg-paper-0 rounded-2xl border border-surface-container shadow-xs overflow-hidden">
                <div class="overflow-x-auto">
                    <table class="w-full text-left border-collapse text-xs">
                        <thead>
                            <tr class="bg-surface-container-low/80 border-b border-surface-container text-ink-600 font-semibold uppercase tracking-wider text-[11px]">
                                <th class="py-3.5 px-4">Kode Jadwal</th>
                                <th class="py-3.5 px-4">Rute Perjalanan</th>
                                <th class="py-3.5 px-4">Armada &amp; Supir</th>
                                <th class="py-3.5 px-4">Waktu (Berangkat &rarr; Tiba)</th>
                                <th class="py-3.5 px-4">Tarif Tiket</th>
                                <th class="py-3.5 px-4">Okupansi Kursi</th>
                                <th class="py-3.5 px-4">Status</th>
                                <th class="py-3.5 px-4 text-center">Aksi Admin</th>
                            </tr>
                        </thead>
                        <tbody id="tableJadwalBody" class="divide-y divide-surface-container font-medium text-forest-900">

                            <!-- JADWAL 1 -->
                            <tr class="hover:bg-surface-container-low/50 transition-colors jadwal-row" data-rute="Krui">
                                <td class="py-4 px-4 font-mono font-bold text-forest-700">JDW-202410-001</td>
                                <td class="py-4 px-4">
                                    <strong class="font-bold text-forest-900 block text-xs">Bandar Lampung → Krui</strong>
                                    <span class="text-[11px] text-ink-600">Pool Rajabasa &rarr; Pool Krui Pesisir</span>
                                </td>
                                <td class="py-4 px-4">
                                    <div class="font-bold text-forest-900">Toyota HiAce (BE 7012 AA)</div>
                                    <span class="text-[11px] text-ink-600">Supir: Bpk. Supriyadi</span>
                                </td>
                                <td class="py-4 px-4">
                                    <div class="font-bold text-forest-900">10 Nov • 08:00 WIB</div>
                                    <span class="text-[11px] text-ink-600 font-mono">Est. Tiba 14:00 (6 Jam)</span>
                                </td>
                                <td class="py-4 px-4 font-mono font-bold text-forest-900">
                                    Rp 120.000
                                </td>
                                <td class="py-4 px-4">
                                    <span class="font-bold font-mono text-xs bg-forest-900 text-white px-2 py-0.5 rounded">11 / 11 Kursi</span>
                                    <span class="block text-[10px] text-green-700 mt-0.5 font-bold">Penuh</span>
                                </td>
                                <td class="py-4 px-4">
                                    <span class="bg-green-700/15 text-green-700 font-bold px-2.5 py-1 rounded-full text-[11px]">
                                        Siap Berangkat
                                    </span>
                                </td>
                                <td class="py-4 px-4 text-center">
                                    <div class="flex items-center justify-center gap-1.5">
                                        <button onclick="editJadwal('JDW-202410-001', 'Bandar Lampung → Krui', 'Toyota HiAce BE 7012 AA', 'Supriyadi', '08:00', '120.000')" class="p-1.5 rounded-lg bg-surface-container hover:bg-forest-700 hover:text-white transition-colors" title="Edit">
                                            <span class="material-symbols-outlined text-[16px]">edit</span>
                                        </button>
                                        <button onclick="hapusJadwal('JDW-202410-001')" class="p-1.5 rounded-lg bg-red-600/15 text-red-600 hover:bg-red-600 hover:text-white transition-colors" title="Hapus">
                                            <span class="material-symbols-outlined text-[16px]">delete</span>
                                        </button>
                                    </div>
                                </td>
                            </tr>

                            <!-- JADWAL 2 -->
                            <tr class="hover:bg-surface-container-low/50 transition-colors jadwal-row" data-rute="Metro">
                                <td class="py-4 px-4 font-mono font-bold text-forest-700">JDW-202410-002</td>
                                <td class="py-4 px-4">
                                    <strong class="font-bold text-forest-900 block text-xs">Bandar Lampung → Metro</strong>
                                    <span class="text-[11px] text-ink-600">Pool Rajabasa &rarr; Terminal Metro</span>
                                </td>
                                <td class="py-4 px-4">
                                    <div class="font-bold text-forest-900">Toyota HiAce (BE 7200 BB)</div>
                                    <span class="text-[11px] text-ink-600">Supir: Bpk. Gunawan</span>
                                </td>
                                <td class="py-4 px-4">
                                    <div class="font-bold text-forest-900">10 Nov • 10:30 WIB</div>
                                    <span class="text-[11px] text-ink-600 font-mono">Est. Tiba 11:45 (1 Jam 15 mnt)</span>
                                </td>
                                <td class="py-4 px-4 font-mono font-bold text-forest-900">
                                    Rp 45.000
                                </td>
                                <td class="py-4 px-4">
                                    <span class="font-bold font-mono text-xs bg-surface-container text-forest-900 px-2 py-0.5 rounded">8 / 11 Kursi</span>
                                    <span class="block text-[10px] text-ink-600 mt-0.5">Sisa 3</span>
                                </td>
                                <td class="py-4 px-4">
                                    <span class="bg-secondary-container text-on-secondary-container font-bold px-2.5 py-1 rounded-full text-[11px]">
                                        Aktif
                                    </span>
                                </td>
                                <td class="py-4 px-4 text-center">
                                    <div class="flex items-center justify-center gap-1.5">
                                        <button onclick="editJadwal('JDW-202410-002', 'Bandar Lampung → Metro', 'Toyota HiAce BE 7200 BB', 'Gunawan', '10:30', '45.000')" class="p-1.5 rounded-lg bg-surface-container hover:bg-forest-700 hover:text-white transition-colors">
                                            <span class="material-symbols-outlined text-[16px]">edit</span>
                                        </button>
                                        <button onclick="hapusJadwal('JDW-202410-002')" class="p-1.5 rounded-lg bg-red-600/15 text-red-600 hover:bg-red-600 hover:text-white transition-colors">
                                            <span class="material-symbols-outlined text-[16px]">delete</span>
                                        </button>
                                    </div>
                                </td>
                            </tr>

                            <!-- JADWAL 3 -->
                            <tr class="hover:bg-surface-container-low/50 transition-colors jadwal-row" data-rute="Kotabumi">
                                <td class="py-4 px-4 font-mono font-bold text-forest-700">JDW-202410-003</td>
                                <td class="py-4 px-4">
                                    <strong class="font-bold text-forest-900 block text-xs">Bandar Lampung → Kotabumi</strong>
                                    <span class="text-[11px] text-ink-600">Pool Rajabasa &rarr; Pool Kotabumi</span>
                                </td>
                                <td class="py-4 px-4">
                                    <div class="font-bold text-forest-900">Isuzu Elf Long (BE 7331 CC)</div>
                                    <span class="text-[11px] text-ink-600">Supir: Bpk. Ilham</span>
                                </td>
                                <td class="py-4 px-4">
                                    <div class="font-bold text-forest-900">10 Nov • 13:00 WIB</div>
                                    <span class="text-[11px] text-ink-600 font-mono">Est. Tiba 15:30 (2.5 Jam)</span>
                                </td>
                                <td class="py-4 px-4 font-mono font-bold text-forest-900">
                                    Rp 70.000
                                </td>
                                <td class="py-4 px-4">
                                    <span class="font-bold font-mono text-xs bg-surface-container text-forest-900 px-2 py-0.5 rounded">12 / 14 Kursi</span>
                                    <span class="block text-[10px] text-ink-600 mt-0.5">Sisa 2</span>
                                </td>
                                <td class="py-4 px-4">
                                    <span class="bg-secondary-container text-on-secondary-container font-bold px-2.5 py-1 rounded-full text-[11px]">
                                        Aktif
                                    </span>
                                </td>
                                <td class="py-4 px-4 text-center">
                                    <div class="flex items-center justify-center gap-1.5">
                                        <button onclick="editJadwal('JDW-202410-003', 'Bandar Lampung → Kotabumi', 'Isuzu Elf BE 7331 CC', 'Ilham', '13:00', '70.000')" class="p-1.5 rounded-lg bg-surface-container hover:bg-forest-700 hover:text-white transition-colors">
                                            <span class="material-symbols-outlined text-[16px]">edit</span>
                                        </button>
                                        <button onclick="hapusJadwal('JDW-202410-003')" class="p-1.5 rounded-lg bg-red-600/15 text-red-600 hover:bg-red-600 hover:text-white transition-colors">
                                            <span class="material-symbols-outlined text-[16px]">delete</span>
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

    <!-- MODAL TAMBAH JADWAL -->
    <div id="modalTambahJadwal" class="fixed inset-0 bg-ink-900/60 backdrop-blur-sm z-50 hidden flex items-center justify-center p-4">
        <div class="bg-paper-0 rounded-2xl max-w-lg w-full p-6 space-y-5 shadow-2xl animate-in fade-in zoom-in duration-150">
            <div class="flex items-center justify-between pb-3 border-b border-surface-container">
                <div class="flex items-center gap-2">
                    <span class="material-symbols-outlined text-forest-700 text-[22px]">add_circle</span>
                    <h3 class="font-title-sm text-base font-bold text-forest-900">Tambah Jadwal Perjalanan Baru</h3>
                </div>
                <button onclick="closeModalTambahJadwal()" class="text-ink-600 hover:text-forest-900 p-1">
                    <span class="material-symbols-outlined text-[20px]">close</span>
                </button>
            </div>

            <form onsubmit="event.preventDefault(); simpanJadwalBaru();" class="space-y-4 text-xs">
                <div>
                    <label class="block font-bold text-forest-900 uppercase tracking-wider mb-1">Pilih Rute Perjalanan <span class="text-red-600">*</span></label>
                    <select class="w-full bg-surface-container-low p-2.5 rounded-xl border border-surface-container text-forest-900 font-semibold" required>
                        <option value="Bandar Lampung → Krui">Bandar Lampung → Krui (Pesisir Barat)</option>
                        <option value="Bandar Lampung → Metro">Bandar Lampung → Metro</option>
                        <option value="Bandar Lampung → Kotabumi">Bandar Lampung → Kotabumi</option>
                        <option value="Bandar Lampung → Kalianda">Bandar Lampung → Kalianda</option>
                    </select>
                </div>

                <div class="grid grid-cols-2 gap-3">
                    <div>
                        <label class="block font-bold text-forest-900 uppercase tracking-wider mb-1">Armada Kendaraan <span class="text-red-600">*</span></label>
                        <select class="w-full bg-surface-container-low p-2.5 rounded-xl border border-surface-container text-forest-900 font-semibold" required>
                            <option value="BE 7012 AA">HiAce Commuter (BE 7012 AA)</option>
                            <option value="BE 7200 BB">HiAce Premio (BE 7200 BB)</option>
                            <option value="BE 7331 CC">Isuzu Elf Long (BE 7331 CC)</option>
                        </select>
                    </div>
                    <div>
                        <label class="block font-bold text-forest-900 uppercase tracking-wider mb-1">Supir Bertugas <span class="text-red-600">*</span></label>
                        <input type="text" id="addSupir" placeholder="Nama driver..." value="Supriyadi" class="w-full bg-surface-container-low p-2.5 rounded-xl border border-surface-container text-forest-900 font-semibold" required>
                    </div>
                </div>

                <div class="grid grid-cols-3 gap-3">
                    <div>
                        <label class="block font-bold text-forest-900 uppercase tracking-wider mb-1">Tanggal</label>
                        <input type="date" value="2026-11-10" class="w-full bg-surface-container-low p-2.5 rounded-xl border border-surface-container text-forest-900 font-mono">
                    </div>
                    <div>
                        <label class="block font-bold text-forest-900 uppercase tracking-wider mb-1">Jam Berangkat</label>
                        <input type="time" value="08:00" class="w-full bg-surface-container-low p-2.5 rounded-xl border border-surface-container text-forest-900 font-mono">
                    </div>
                    <div>
                        <label class="block font-bold text-forest-900 uppercase tracking-wider mb-1">Estimasi Tiba</label>
                        <input type="time" value="14:00" class="w-full bg-surface-container-low p-2.5 rounded-xl border border-surface-container text-forest-900 font-mono">
                    </div>
                </div>

                <div class="grid grid-cols-2 gap-3">
                    <div>
                        <label class="block font-bold text-forest-900 uppercase tracking-wider mb-1">Tarif Tiket Per Orang (Rp) <span class="text-red-600">*</span></label>
                        <input type="number" value="120000" class="w-full bg-surface-container-low p-2.5 rounded-xl border border-surface-container text-forest-900 font-mono font-bold" required>
                    </div>
                    <div>
                        <label class="block font-bold text-forest-900 uppercase tracking-wider mb-1">Kapasitas Kursi</label>
                        <input type="number" value="11" readonly class="w-full bg-surface-container p-2.5 rounded-xl border border-surface-container text-forest-900 font-mono">
                    </div>
                </div>

                <div class="pt-2 border-t border-surface-container flex gap-2">
                    <button type="submit" class="w-full bg-forest-700 hover:bg-forest-900 text-white font-bold text-xs py-3 rounded-xl transition-colors">
                        Simpan Jadwal Baru
                    </button>
                    <button type="button" onclick="closeModalTambahJadwal()" class="w-full bg-surface-container hover:bg-surface-container-high text-forest-900 font-medium text-xs py-3 rounded-xl transition-colors">
                        Batal
                    </button>
                </div>
            </form>
        </div>
    </div>

    <!-- ROLE SWITCHER INCLUDED -->
    @include('partials.role-switcher')

    <script>
        function filterJadwal() {
            const query = document.getElementById('searchJadwal').value.toLowerCase();
            const rute = document.getElementById('ruteJadwal').value.toLowerCase();
            const rows = document.querySelectorAll('.jadwal-row');

            rows.forEach(row => {
                const text = row.textContent.toLowerCase();
                const matchQuery = text.includes(query);
                const matchRute = !rute || (row.dataset.rute && row.dataset.rute.toLowerCase().includes(rute));

                if (matchQuery && matchRute) {
                    row.style.display = '';
                } else {
                    row.style.display = 'none';
                }
            });
        }

        function openModalTambahJadwal() {
            document.getElementById('modalTambahJadwal').classList.remove('hidden');
        }

        function closeModalTambahJadwal() {
            document.getElementById('modalTambahJadwal').classList.add('hidden');
        }

        function simpanJadwalBaru() {
            alert('Jadwal keberangkatan armada baru berhasil diterbitkan dan langsung tampil di halaman pemesanan penumpang.');
            closeModalTambahJadwal();
        }

        function editJadwal(kode, rute, armada, supir, jam, tarif) {
            alert('Membuka edit jadwal ' + kode + ' (' + rute + ').');
        }

        function hapusJadwal(kode) {
            if (confirm('Hapus jadwal perjalanan ' + kode + '?')) {
                alert('Jadwal ' + kode + ' berhasil dihapus dari jadwal operasional.');
            }
        }
    </script>

</body>
</html>

