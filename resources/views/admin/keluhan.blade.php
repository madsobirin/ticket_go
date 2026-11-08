<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kelola Keluhan Pelanggan - Super Admin</title>

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
                <a href="{{ route('admin.kendaraan') }}" class="font-medium text-xs text-cream-50/80 hover:text-white px-3 py-1.5 rounded-lg hover:bg-forest-700/50 transition-colors flex items-center gap-1.5">
                    <span class="material-symbols-outlined text-[16px]">directions_bus</span>
                    Kendaraan
                </a>
                <a href="{{ route('admin.keluhan') }}" class="font-semibold text-xs bg-forest-700 text-white px-3 py-1.5 rounded-lg transition-colors flex items-center gap-1.5 relative">
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
                    <h1 class="font-headline-lg text-2xl sm:text-3xl font-semibold text-forest-900 tracking-tight">Pusat Pengaduan &amp; Keluhan Pelanggan</h1>
                    <p class="text-sm text-ink-600 mt-1">Pantau umpan balik perjalanan, tanggapi keluhan penumpang, dan berikan solusi kompensasi resmi manajemen.</p>
                </div>
                <div class="flex items-center gap-2">
                    <span class="text-xs bg-paper-0 border border-surface-container px-3 py-2 rounded-xl text-forest-900 font-semibold flex items-center gap-1.5">
                        <span class="w-2 h-2 rounded-full bg-red-600 animate-pulse"></span>
                        2 Keluhan Menunggu Tanggapan Manajemen
                    </span>
                </div>
            </div>

            <!-- KPI STATUS KELUHAN -->
            <div class="grid grid-cols-1 sm:grid-cols-4 gap-4 text-xs">
                <div class="bg-paper-0 p-4 rounded-xl border border-surface-container shadow-xs">
                    <span class="text-ink-600 block">Total Aduan Masuk</span>
                    <span class="text-xl font-bold font-mono text-forest-900 mt-1 block">8 Laporan</span>
                </div>
                <div class="bg-paper-0 p-4 rounded-xl border border-red-600/30 shadow-xs">
                    <span class="text-ink-600 block">Menunggu Tanggapan</span>
                    <span class="text-xl font-bold font-mono text-red-600 mt-1 block">2 Laporan</span>
                    <span class="text-[10px] text-red-600 font-bold">Harap segera direspon</span>
                </div>
                <div class="bg-paper-0 p-4 rounded-xl border border-surface-container shadow-xs">
                    <span class="text-ink-600 block">Sedang Ditindaklanjuti</span>
                    <span class="text-xl font-bold font-mono text-amber-500 mt-1 block">2 Laporan</span>
                </div>
                <div class="bg-paper-0 p-4 rounded-xl border border-surface-container shadow-xs">
                    <span class="text-ink-600 block">Selesai / Teratasi</span>
                    <span class="text-xl font-bold font-mono text-green-700 mt-1 block">4 Laporan</span>
                </div>
            </div>

            <!-- FILTER & SEARCH -->
            <div class="bg-paper-0 p-4 rounded-2xl border border-surface-container shadow-xs flex flex-col sm:flex-row items-center justify-between gap-3 text-xs">
                <div class="w-full sm:w-96 relative">
                    <span class="absolute inset-y-0 left-0 pl-3.5 flex items-center pointer-events-none text-ink-600">
                        <span class="material-symbols-outlined text-[18px]">search</span>
                    </span>
                    <input id="searchKeluhan" onkeyup="filterKeluhan()" type="text" placeholder="Cari nama penumpang, nomor tiket, atau isi keluhan..." class="w-full pl-10 pr-4 py-2.5 rounded-xl bg-surface-container-low border border-surface-container text-xs text-forest-900">
                </div>
                <div class="flex items-center gap-2">
                    <select id="kategoriFilter" onchange="filterKeluhan()" class="py-2.5 px-3 rounded-xl bg-surface-container-low border border-surface-container text-xs text-forest-900">
                        <option value="">Semua Kategori</option>
                        <option value="Armada">Fasilitas / Armada</option>
                        <option value="Jadwal">Keterlambatan Jadwal</option>
                        <option value="Pembayaran">Kendala Pembayaran</option>
                        <option value="Bagasi">Bagasi Penumpang</option>
                    </select>
                </div>
            </div>

            <!-- TABEL KELUHAN -->
            <div class="bg-paper-0 rounded-2xl border border-surface-container shadow-xs overflow-hidden">
                <div class="overflow-x-auto">
                    <table class="w-full text-left border-collapse text-xs">
                        <thead>
                            <tr class="bg-surface-container-low/80 border-b border-surface-container text-ink-600 font-semibold uppercase tracking-wider text-[11px]">
                                <th class="py-3.5 px-4">ID &amp; Tanggal</th>
                                <th class="py-3.5 px-4">Pelanggan</th>
                                <th class="py-3.5 px-4">Tiket Terkait</th>
                                <th class="py-3.5 px-4">Kategori &amp; Ringkasan Keluhan</th>
                                <th class="py-3.5 px-4">Urgensi</th>
                                <th class="py-3.5 px-4">Status</th>
                                <th class="py-3.5 px-4 text-center">Aksi Manajemen</th>
                            </tr>
                        </thead>
                        <tbody id="tableKeluhanBody" class="divide-y divide-surface-container font-medium text-forest-900">

                            <!-- KELUHAN 1: MENUNGGU -->
                            <tr class="hover:bg-surface-container-low/50 transition-colors keluhan-row" data-kategori="Armada">
                                <td class="py-4 px-4 font-mono font-bold text-forest-700">
                                    KLH-202410-01
                                    <span class="block text-[10px] text-ink-600 font-normal">08 Nov 12:40</span>
                                </td>
                                <td class="py-4 px-4">
                                    <strong class="font-bold text-forest-900 block text-xs">Rian Pratama</strong>
                                    <span class="text-[11px] text-ink-600 font-mono">081922334455</span>
                                </td>
                                <td class="py-4 px-4 font-mono font-bold text-forest-700">
                                    #PSN-202410-096
                                    <span class="block text-[10px] text-ink-600 font-normal">HiAce BE 7012 AA</span>
                                </td>
                                <td class="py-4 px-4 max-w-sm">
                                    <span class="bg-secondary-container text-on-secondary-container font-bold px-2 py-0.5 rounded text-[10px] mb-1 inline-block">Fasilitas Armada (AC)</span>
                                    <p class="text-ink-900 leading-relaxed text-xs">"AC armada HiAce BE 7012 AA kurang dingin saat melintasi tanjakan Sedayu Krui, mohon dicek perawatannya..."</p>
                                </td>
                                <td class="py-4 px-4">
                                    <span class="bg-red-600/15 text-red-600 font-bold px-2.5 py-1 rounded-full text-[10px]">Tinggi</span>
                                </td>
                                <td class="py-4 px-4">
                                    <span class="bg-red-600/15 text-red-600 font-bold px-2.5 py-1 rounded-full text-[11px] inline-flex items-center gap-1">
                                        <span class="w-1.5 h-1.5 rounded-full bg-red-600 animate-pulse"></span> Menunggu
                                    </span>
                                </td>
                                <td class="py-4 px-4 text-center">
                                    <div class="flex items-center justify-center gap-1.5">
                                        <button onclick="tanggapiKeluhan('KLH-202410-01', 'Rian Pratama', '#PSN-202410-096', 'AC armada HiAce BE 7012 AA kurang dingin saat melintasi tanjakan Sedayu Krui...')" class="px-3 py-1.5 rounded-lg bg-forest-700 hover:bg-forest-900 text-white font-bold text-[11px] transition-colors shadow-xs">
                                            Beri Tanggapan
                                        </button>
                                    </div>
                                </td>
                            </tr>

                            <!-- KELUHAN 2: MENUNGGU -->
                            <tr class="hover:bg-surface-container-low/50 transition-colors keluhan-row" data-kategori="Jadwal">
                                <td class="py-4 px-4 font-mono font-bold text-forest-700">
                                    KLH-202410-02
                                    <span class="block text-[10px] text-ink-600 font-normal">07 Nov 15:10</span>
                                </td>
                                <td class="py-4 px-4">
                                    <strong class="font-bold text-forest-900 block text-xs">Dewi Kartika</strong>
                                    <span class="text-[11px] text-ink-600 font-mono">082199887766</span>
                                </td>
                                <td class="py-4 px-4 font-mono font-bold text-forest-700">
                                    #PSN-202410-082
                                    <span class="block text-[10px] text-ink-600 font-normal">Trip Kotabumi 13:00</span>
                                </td>
                                <td class="py-4 px-4 max-w-sm">
                                    <span class="bg-amber-500/20 text-tertiary-container font-bold px-2 py-0.5 rounded text-[10px] mb-1 inline-block">Keterlambatan Jadwal</span>
                                    <p class="text-ink-900 leading-relaxed text-xs">"Jadwal jam 13:00 sempat telat 20 menit saat jemput di jalan lintas, mohon supir dikontak lebih awal..."</p>
                                </td>
                                <td class="py-4 px-4">
                                    <span class="bg-amber-500/20 text-tertiary-container font-bold px-2.5 py-1 rounded-full text-[10px]">Sedang</span>
                                </td>
                                <td class="py-4 px-4">
                                    <span class="bg-red-600/15 text-red-600 font-bold px-2.5 py-1 rounded-full text-[11px] inline-flex items-center gap-1">
                                        <span class="w-1.5 h-1.5 rounded-full bg-red-600 animate-pulse"></span> Menunggu
                                    </span>
                                </td>
                                <td class="py-4 px-4 text-center">
                                    <div class="flex items-center justify-center gap-1.5">
                                        <button onclick="tanggapiKeluhan('KLH-202410-02', 'Dewi Kartika', '#PSN-202410-082', 'Jadwal jam 13:00 sempat telat 20 menit saat jemput di jalan lintas...')" class="px-3 py-1.5 rounded-lg bg-forest-700 hover:bg-forest-900 text-white font-bold text-[11px] transition-colors shadow-xs">
                                            Beri Tanggapan
                                        </button>
                                    </div>
                                </td>
                            </tr>

                            <!-- KELUHAN 3: SEDANG DIPROSES -->
                            <tr class="hover:bg-surface-container-low/50 transition-colors keluhan-row" data-kategori="Pembayaran">
                                <td class="py-4 px-4 font-mono font-bold text-forest-700">
                                    KLH-202410-03
                                    <span class="block text-[10px] text-ink-600 font-normal">06 Nov 11:25</span>
                                </td>
                                <td class="py-4 px-4">
                                    <strong class="font-bold text-forest-900 block text-xs">Hendra Kusuma</strong>
                                    <span class="text-[11px] text-ink-600 font-mono">081122334455</span>
                                </td>
                                <td class="py-4 px-4 font-mono font-bold text-forest-700">
                                    #PSN-202410-061
                                    <span class="block text-[10px] text-ink-600 font-normal">Transfer Bank BCA</span>
                                </td>
                                <td class="py-4 px-4 max-w-sm">
                                    <span class="bg-blue-600/15 text-blue-600 font-bold px-2 py-0.5 rounded text-[10px] mb-1 inline-block">Masalah Verifikasi Pembayaran</span>
                                    <p class="text-ink-900 leading-relaxed text-xs">"Konfirmasi transfer bank BCA sempat memakan waktu 30 menit kemarin..."</p>
                                </td>
                                <td class="py-4 px-4">
                                    <span class="bg-amber-500/20 text-tertiary-container font-bold px-2.5 py-1 rounded-full text-[10px]">Sedang</span>
                                </td>
                                <td class="py-4 px-4">
                                    <span class="bg-amber-500/15 text-tertiary-container font-bold px-2.5 py-1 rounded-full text-[11px]">
                                        Sedang Diproses
                                    </span>
                                </td>
                                <td class="py-4 px-4 text-center">
                                    <button onclick="alert('Keluhan ini sedang dalam proses investigasi mutasi bank oleh tim loket.')" class="px-2.5 py-1.5 rounded-lg bg-surface-container hover:bg-forest-700 hover:text-white font-semibold text-[11px] transition-colors">
                                        Lihat Progres
                                    </button>
                                </td>
                            </tr>

                            <!-- KELUHAN 4: SELESAI -->
                            <tr class="hover:bg-surface-container-low/50 transition-colors keluhan-row" data-kategori="Bagasi">
                                <td class="py-4 px-4 font-mono font-bold text-forest-700">
                                    KLH-202410-04
                                    <span class="block text-[10px] text-ink-600 font-normal">02 Nov 16:00</span>
                                </td>
                                <td class="py-4 px-4">
                                    <strong class="font-bold text-forest-900 block text-xs">Siti Rahayu</strong>
                                    <span class="text-[11px] text-ink-600 font-mono">082188991122</span>
                                </td>
                                <td class="py-4 px-4 font-mono font-bold text-forest-700">
                                    #PSN-202410-055
                                    <span class="block text-[10px] text-ink-600 font-normal">Trip Metro 10:30</span>
                                </td>
                                <td class="py-4 px-4 max-w-sm">
                                    <span class="bg-sage-100 text-forest-900 font-bold px-2 py-0.5 rounded text-[10px] mb-1 inline-block">Bagasi Penumpang</span>
                                    <p class="text-ink-600 leading-relaxed text-xs">"Titipan oleh-oleh keripik pisang tertukar di bagasi, tapi supir telah membantu mengantarkan kembali ke rumah..."</p>
                                </td>
                                <td class="py-4 px-4">
                                    <span class="bg-surface-container text-ink-600 font-bold px-2.5 py-1 rounded-full text-[10px]">Rendah</span>
                                </td>
                                <td class="py-4 px-4">
                                    <span class="bg-green-700/15 text-green-700 font-bold px-2.5 py-1 rounded-full text-[11px] inline-flex items-center gap-1">
                                        <span class="material-symbols-outlined text-[13px]">check</span> Selesai
                                    </span>
                                </td>
                                <td class="py-4 px-4 text-center">
                                    <span class="text-[11px] text-ink-600 italic">Solusi Diterima</span>
                                </td>
                            </tr>

                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </main>

    <!-- MODAL TANGGAPAN KELUHAN -->
    <div id="modalTanggapan" class="fixed inset-0 bg-ink-900/60 backdrop-blur-sm z-50 hidden flex items-center justify-center p-4">
        <div class="bg-paper-0 rounded-2xl max-w-lg w-full p-6 space-y-4 shadow-2xl animate-in fade-in zoom-in duration-150">
            <div class="flex items-center justify-between pb-3 border-b border-surface-container">
                <div class="flex items-center gap-2">
                    <span class="material-symbols-outlined text-forest-700 text-[22px]">quickreply</span>
                    <h3 class="font-title-sm text-base font-bold text-forest-900">Tanggapi Keluhan Pelanggan</h3>
                </div>
                <button onclick="closeModalTanggapan()" class="text-ink-600 hover:text-forest-900 p-1">
                    <span class="material-symbols-outlined text-[20px]">close</span>
                </button>
            </div>

            <div class="space-y-3 text-xs">
                <div class="p-3 bg-cream-50 rounded-xl space-y-1">
                    <div class="flex justify-between">
                        <strong id="modalKlhId" class="font-mono text-forest-700">KLH-202410-01</strong>
                        <span id="modalKlhPesan" class="font-mono text-ink-600">#PSN-202410-096</span>
                    </div>
                    <h4 id="modalKlhNama" class="text-sm font-bold text-forest-900">Rian Pratama</h4>
                    <p id="modalKlhIsi" class="text-ink-600 italic leading-relaxed pt-1">
                        "AC armada HiAce kurang dingin saat melintasi tanjakan..."
                    </p>
                </div>

                <div>
                    <label class="block font-bold text-forest-900 uppercase tracking-wider mb-1">Tanggapan &amp; Solusi Resmi Manajemen <span class="text-red-600">*</span></label>
                    <textarea rows="3" placeholder="Tuliskan permohonan maaf dan tindakan perbaikan dari manajemen..." class="w-full bg-surface-container-low p-2.5 rounded-xl border border-surface-container text-forest-900">Kami mohon maaf atas ketidaknyamanan Anda. Armada HiAce BE 7012 AA telah ditarik ke bengkel pool untuk servis AC dan kami berikan voucher diskon tiket 50% untuk perjalanan Anda selanjutnya.</textarea>
                </div>

                <div>
                    <label class="block font-bold text-forest-900 uppercase tracking-wider mb-1">Pemberian Kompensasi (Opsional)</label>
                    <select class="w-full bg-surface-container-low p-2.5 rounded-xl border border-surface-container text-forest-900 font-semibold">
                        <option>Voucher Diskon Tiket 50%</option>
                        <option>Voucher Diskon Tiket 20%</option>
                        <option>Penggantian Dana / Refund Penuh</option>
                        <option>Permohonan Maaf Resmi Saja</option>
                    </select>
                </div>

                <div>
                    <label class="block font-bold text-forest-900 uppercase tracking-wider mb-1">Perbarui Status Keluhan</label>
                    <select class="w-full bg-surface-container-low p-2.5 rounded-xl border border-surface-container text-forest-900 font-semibold">
                        <option value="SELESAI" selected>Selesai (Solusi Diberikan)</option>
                        <option value="PROSES">Sedang Ditindaklanjuti Bengkel/Driver</option>
                    </select>
                </div>

                <div class="pt-2 border-t border-surface-container flex gap-2">
                    <button onclick="kirimTanggapan()" class="w-full bg-forest-700 hover:bg-forest-900 text-white font-bold text-xs py-3 rounded-xl transition-colors">
                        Kirim Tanggapan ke Pelanggan
                    </button>
                    <button onclick="closeModalTanggapan()" class="w-full bg-surface-container hover:bg-surface-container-high text-forest-900 font-medium text-xs py-3 rounded-xl transition-colors">
                        Batal
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- ROLE SWITCHER INCLUDED -->
    @include('partials.role-switcher')

    <script>
        function filterKeluhan() {
            const query = document.getElementById('searchKeluhan').value.toLowerCase();
            const kategori = document.getElementById('kategoriFilter').value;
            const rows = document.querySelectorAll('.keluhan-row');

            rows.forEach(row => {
                const text = row.textContent.toLowerCase();
                const matchQuery = text.includes(query);
                const matchKategori = !kategori || (row.dataset.kategori && row.dataset.kategori.includes(kategori));

                if (matchQuery && matchKategori) {
                    row.style.display = '';
                } else {
                    row.style.display = 'none';
                }
            });
        }

        function tanggapiKeluhan(id, nama, tiket, isi) {
            document.getElementById('modalKlhId').textContent = id;
            document.getElementById('modalKlhNama').textContent = nama;
            document.getElementById('modalKlhPesan').textContent = tiket;
            document.getElementById('modalKlhIsi').textContent = '"' + isi + '"';
            document.getElementById('modalTanggapan').classList.remove('hidden');
        }

        function closeModalTanggapan() {
            document.getElementById('modalTanggapan').classList.add('hidden');
        }

        function kirimTanggapan() {
            alert('Tanggapan resmi manajemen berhasil dikirimkan ke pelanggan via notifikasi aplikasi & pesan WhatsApp.');
            closeModalTanggapan();
        }
    </script>

</body>
</html>

