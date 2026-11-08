<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kelola Status Pemesanan - Operator Loket</title>

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
                <a href="{{ route('operator.dashboard') }}" class="font-medium text-xs text-cream-50/80 hover:text-white px-3 py-1.5 rounded-lg hover:bg-forest-700/50 transition-colors flex items-center gap-1.5">
                    <span class="material-symbols-outlined text-[16px]">space_dashboard</span>
                    Dashboard
                </a>
                <a href="{{ route('operator.pesanan') }}" class="font-semibold text-xs bg-forest-700 text-white px-3 py-1.5 rounded-lg transition-colors flex items-center gap-1.5">
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
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-12 space-y-6">

            <!-- PAGE TITLE -->
            <div class="flex flex-col md:flex-row md:items-center justify-between gap-4">
                <div>
                    <h1 class="font-headline-lg text-2xl sm:text-3xl font-semibold text-forest-900 tracking-tight">Manajemen Status Pemesanan Tiket</h1>
                    <p class="text-sm text-ink-600 mt-1">Perbarui status pembayaran, konfirmasi kehadiran naik penumpang (check-in/boarding), dan cetak tiket loket.</p>
                </div>
                <div class="flex items-center gap-3">
                    <a href="{{ route('operator.layani-pemesanan') }}" class="px-4 py-2.5 rounded-xl bg-forest-700 hover:bg-forest-900 text-white font-semibold text-xs transition-colors flex items-center gap-1.5 shadow-xs">
                        <span class="material-symbols-outlined text-[18px]">add_circle</span>
                        + Tiket Loket Baru
                    </a>
                </div>
            </div>

            <!-- FILTER TABS & SEARCH CONTROLS -->
            <div class="bg-paper-0 p-5 rounded-2xl border border-surface-container shadow-xs space-y-4">
                <!-- TABS STATUS -->
                <div class="flex items-center gap-2 overflow-x-auto pb-1 border-b border-surface-container">
                    <button onclick="filterStatus('SEMUA')" id="tab-SEMUA" class="status-tab font-semibold text-xs px-3.5 py-2 rounded-lg bg-forest-900 text-white transition-colors">
                        Semua Status (6)
                    </button>
                    <button onclick="filterStatus('BELUM_BAYAR')" id="tab-BELUM_BAYAR" class="status-tab font-medium text-xs px-3.5 py-2 rounded-lg text-ink-600 hover:bg-surface-container transition-colors">
                        Belum Bayar (1)
                    </button>
                    <button onclick="filterStatus('VERIFIKASI')" id="tab-VERIFIKASI" class="status-tab font-medium text-xs px-3.5 py-2 rounded-lg text-ink-600 hover:bg-surface-container transition-colors flex items-center gap-1">
                        Menunggu Verifikasi (2)
                        <span class="w-2 h-2 rounded-full bg-amber-500"></span>
                    </button>
                    <button onclick="filterStatus('LUNAS')" id="tab-LUNAS" class="status-tab font-medium text-xs px-3.5 py-2 rounded-lg text-ink-600 hover:bg-surface-container transition-colors">
                        Lunas / Tiket Terbit (2)
                    </button>
                    <button onclick="filterStatus('BOARDING')" id="tab-BOARDING" class="status-tab font-medium text-xs px-3.5 py-2 rounded-lg text-ink-600 hover:bg-surface-container transition-colors">
                        Naik / Boarding (1)
                    </button>
                    <button onclick="filterStatus('BATAL')" id="tab-BATAL" class="status-tab font-medium text-xs px-3.5 py-2 rounded-lg text-ink-600 hover:bg-surface-container transition-colors">
                        Dibatalkan (0)
                    </button>
                </div>

                <!-- SEARCH & FILTER BAR -->
                <div class="grid grid-cols-1 md:grid-cols-12 gap-3 items-center">
                    <div class="md:col-span-6 relative">
                        <span class="absolute inset-y-0 left-0 pl-3.5 flex items-center pointer-events-none text-ink-600">
                            <span class="material-symbols-outlined text-[18px]">search</span>
                        </span>
                        <input id="searchInput" onkeyup="searchTable()" type="text" placeholder="Cari ID Pesan (#PSN-...), nama penumpang, atau rute..." class="w-full pl-10 pr-4 py-2.5 rounded-xl bg-surface-container-low border border-surface-container focus:bg-paper-0 focus:border-forest-700 text-xs text-forest-900 transition-colors">
                    </div>
                    <div class="md:col-span-3">
                        <select id="routeFilter" onchange="searchTable()" class="w-full py-2.5 px-3 rounded-xl bg-surface-container-low border border-surface-container text-xs text-forest-900">
                            <option value="">Semua Rute Perjalanan</option>
                            <option value="Krui">Bandar Lampung → Krui</option>
                            <option value="Metro">Bandar Lampung → Metro</option>
                            <option value="Kotabumi">Bandar Lampung → Kotabumi</option>
                        </select>
                    </div>
                    <div class="md:col-span-3">
                        <input type="date" value="2026-11-10" class="w-full py-2.5 px-3 rounded-xl bg-surface-container-low border border-surface-container text-xs text-forest-900 font-mono">
                    </div>
                </div>
            </div>

            <!-- TABEL PEMESANAN -->
            <div class="bg-paper-0 rounded-2xl border border-surface-container shadow-xs overflow-hidden">
                <div class="overflow-x-auto">
                    <table class="w-full text-left border-collapse text-xs">
                        <thead>
                            <tr class="bg-surface-container-low/80 border-b border-surface-container text-ink-600 font-semibold uppercase tracking-wider text-[11px]">
                                <th class="py-3.5 px-4">ID Pesan</th>
                                <th class="py-3.5 px-4">Nama Penumpang</th>
                                <th class="py-3.5 px-4">Rute &amp; Jadwal</th>
                                <th class="py-3.5 px-4">Kursi &amp; Armada</th>
                                <th class="py-3.5 px-4">Tarif</th>
                                <th class="py-3.5 px-4">Status Pemesanan</th>
                                <th class="py-3.5 px-4 text-center">Aksi Operator</th>
                            </tr>
                        </thead>
                        <tbody id="pesananTableBody" class="divide-y divide-surface-container text-forest-900 font-medium">

                            <!-- ROW 1 -->
                            <tr class="hover:bg-surface-container-low/50 transition-colors pesanan-row" data-status="VERIFIKASI" data-rute="Krui">
                                <td class="py-4 px-4 font-mono font-bold text-forest-700">
                                    #PSN-202410-098
                                    <span class="block text-[10px] text-ink-600 font-normal">08 Nov 14:10</span>
                                </td>
                                <td class="py-4 px-4">
                                    <div class="font-bold text-forest-900">Bambang Hermanto</div>
                                    <span class="text-[11px] text-ink-600">081234567890 • Member</span>
                                </td>
                                <td class="py-4 px-4">
                                    <div class="font-semibold text-forest-900">Bandar Lampung → Krui</div>
                                    <span class="text-[11px] text-ink-600">10 Nov 2026 • 08:00 WIB</span>
                                </td>
                                <td class="py-4 px-4">
                                    <span class="font-bold bg-secondary-container text-forest-900 px-2 py-0.5 rounded text-[11px]">Kursi 3</span>
                                    <span class="block text-[10px] text-ink-600 mt-0.5">HiAce BE 7012 AA</span>
                                </td>
                                <td class="py-4 px-4 font-mono font-bold text-forest-900">
                                    Rp 120.354
                                    <span class="block text-[10px] text-ink-600 font-normal">Transfer Mandiri</span>
                                </td>
                                <td class="py-4 px-4">
                                    <span class="inline-flex items-center gap-1 bg-amber-500/15 text-tertiary-container font-bold px-2.5 py-1 rounded-full text-[11px]">
                                        <span class="w-1.5 h-1.5 rounded-full bg-amber-500 animate-pulse"></span>
                                        Menunggu Verifikasi
                                    </span>
                                </td>
                                <td class="py-4 px-4 text-center">
                                    <div class="flex items-center justify-center gap-1.5">
                                        <button onclick="openModalStatus('#PSN-202410-098', 'Bambang Hermanto', 'Menunggu Verifikasi')" class="px-2.5 py-1.5 rounded-lg bg-forest-700 hover:bg-forest-900 text-white font-semibold text-[11px] transition-colors shadow-xs">
                                            Ubah Status
                                        </button>
                                        <button onclick="openModalCetakTiket('#PSN-202410-098', 'Bambang Hermanto', 'Bandar Lampung → Krui', 'Kursi 3', 'Rp 120.000')" class="p-1.5 rounded-lg bg-surface-container hover:bg-forest-700 hover:text-white text-forest-900 transition-colors" title="Pratinjau Tiket">
                                            <span class="material-symbols-outlined text-[16px]">print</span>
                                        </button>
                                    </div>
                                </td>
                            </tr>

                            <!-- ROW 2 -->
                            <tr class="hover:bg-surface-container-low/50 transition-colors pesanan-row" data-status="VERIFIKASI" data-rute="Metro">
                                <td class="py-4 px-4 font-mono font-bold text-forest-700">
                                    #PSN-202410-099
                                    <span class="block text-[10px] text-ink-600 font-normal">08 Nov 13:50</span>
                                </td>
                                <td class="py-4 px-4">
                                    <div class="font-bold text-forest-900">Siti Rahayu</div>
                                    <span class="text-[11px] text-ink-600">082188991122 • Walk-in</span>
                                </td>
                                <td class="py-4 px-4">
                                    <div class="font-semibold text-forest-900">Bandar Lampung → Metro</div>
                                    <span class="text-[11px] text-ink-600">10 Nov 2026 • 10:30 WIB</span>
                                </td>
                                <td class="py-4 px-4">
                                    <span class="font-bold bg-secondary-container text-forest-900 px-2 py-0.5 rounded text-[11px]">Kursi 1</span>
                                    <span class="block text-[10px] text-ink-600 mt-0.5">HiAce BE 7200 BB</span>
                                </td>
                                <td class="py-4 px-4 font-mono font-bold text-forest-900">
                                    Rp 45.000
                                    <span class="block text-[10px] text-ink-600 font-normal">Transfer BRI</span>
                                </td>
                                <td class="py-4 px-4">
                                    <span class="inline-flex items-center gap-1 bg-amber-500/15 text-tertiary-container font-bold px-2.5 py-1 rounded-full text-[11px]">
                                        <span class="w-1.5 h-1.5 rounded-full bg-amber-500 animate-pulse"></span>
                                        Menunggu Verifikasi
                                    </span>
                                </td>
                                <td class="py-4 px-4 text-center">
                                    <div class="flex items-center justify-center gap-1.5">
                                        <button onclick="openModalStatus('#PSN-202410-099', 'Siti Rahayu', 'Menunggu Verifikasi')" class="px-2.5 py-1.5 rounded-lg bg-forest-700 hover:bg-forest-900 text-white font-semibold text-[11px] transition-colors shadow-xs">
                                            Ubah Status
                                        </button>
                                        <button onclick="openModalCetakTiket('#PSN-202410-099', 'Siti Rahayu', 'Bandar Lampung → Metro', 'Kursi 1', 'Rp 45.000')" class="p-1.5 rounded-lg bg-surface-container hover:bg-forest-700 hover:text-white text-forest-900 transition-colors" title="Pratinjau Tiket">
                                            <span class="material-symbols-outlined text-[16px]">print</span>
                                        </button>
                                    </div>
                                </td>
                            </tr>

                            <!-- ROW 3 -->
                            <tr class="hover:bg-surface-container-low/50 transition-colors pesanan-row" data-status="LUNAS" data-rute="Kotabumi">
                                <td class="py-4 px-4 font-mono font-bold text-forest-700">
                                    #PSN-202410-097
                                    <span class="block text-[10px] text-ink-600 font-normal">08 Nov 11:20</span>
                                </td>
                                <td class="py-4 px-4">
                                    <div class="font-bold text-forest-900">Agus Prasetyo</div>
                                    <span class="text-[11px] text-ink-600">085299182311 • Member</span>
                                </td>
                                <td class="py-4 px-4">
                                    <div class="font-semibold text-forest-900">Bandar Lampung → Kotabumi</div>
                                    <span class="text-[11px] text-ink-600">10 Nov 2026 • 13:00 WIB</span>
                                </td>
                                <td class="py-4 px-4">
                                    <span class="font-bold bg-secondary-container text-forest-900 px-2 py-0.5 rounded text-[11px]">Kursi 4</span>
                                    <span class="block text-[10px] text-ink-600 mt-0.5">Elf BE 7331 CC</span>
                                </td>
                                <td class="py-4 px-4 font-mono font-bold text-forest-900">
                                    Rp 70.000
                                    <span class="block text-[10px] text-green-700 font-semibold">Tunai di Loket</span>
                                </td>
                                <td class="py-4 px-4">
                                    <span class="inline-flex items-center gap-1 bg-green-700/15 text-green-700 font-bold px-2.5 py-1 rounded-full text-[11px]">
                                        <span class="material-symbols-outlined text-[13px]">check</span>
                                        Lunas (Tiket Terbit)
                                    </span>
                                </td>
                                <td class="py-4 px-4 text-center">
                                    <div class="flex items-center justify-center gap-1.5">
                                        <button onclick="openModalStatus('#PSN-202410-097', 'Agus Prasetyo', 'Lunas')" class="px-2.5 py-1.5 rounded-lg bg-surface-container hover:bg-forest-700 hover:text-white text-forest-900 font-semibold text-[11px] transition-colors">
                                            Ubah Status
                                        </button>
                                        <button onclick="openModalCetakTiket('#PSN-202410-097', 'Agus Prasetyo', 'Bandar Lampung → Kotabumi', 'Kursi 4', 'Rp 70.000')" class="p-1.5 rounded-lg bg-forest-700 text-white hover:bg-forest-900 transition-colors" title="Cetak Tiket">
                                            <span class="material-symbols-outlined text-[16px]">print</span>
                                        </button>
                                    </div>
                                </td>
                            </tr>

                            <!-- ROW 4 -->
                            <tr class="hover:bg-surface-container-low/50 transition-colors pesanan-row" data-status="BOARDING" data-rute="Krui">
                                <td class="py-4 px-4 font-mono font-bold text-forest-700">
                                    #PSN-202410-096
                                    <span class="block text-[10px] text-ink-600 font-normal">08 Nov 07:45</span>
                                </td>
                                <td class="py-4 px-4">
                                    <div class="font-bold text-forest-900">Rian Pratama</div>
                                    <span class="text-[11px] text-ink-600">081922334455 • Member</span>
                                </td>
                                <td class="py-4 px-4">
                                    <div class="font-semibold text-forest-900">Bandar Lampung → Krui</div>
                                    <span class="text-[11px] text-ink-600">10 Nov 2026 • 08:00 WIB</span>
                                </td>
                                <td class="py-4 px-4">
                                    <span class="font-bold bg-secondary-container text-forest-900 px-2 py-0.5 rounded text-[11px]">Kursi 2</span>
                                    <span class="block text-[10px] text-ink-600 mt-0.5">HiAce BE 7012 AA</span>
                                </td>
                                <td class="py-4 px-4 font-mono font-bold text-forest-900">
                                    Rp 120.000
                                    <span class="block text-[10px] text-green-700 font-semibold">QRIS Terverifikasi</span>
                                </td>
                                <td class="py-4 px-4">
                                    <span class="inline-flex items-center gap-1 bg-secondary-container text-on-secondary-container font-bold px-2.5 py-1 rounded-full text-[11px]">
                                        <span class="material-symbols-outlined text-[13px]">airline_seat_recline_normal</span>
                                        Naik / Boarding
                                    </span>
                                </td>
                                <td class="py-4 px-4 text-center">
                                    <div class="flex items-center justify-center gap-1.5">
                                        <button onclick="openModalStatus('#PSN-202410-096', 'Rian Pratama', 'Boarding')" class="px-2.5 py-1.5 rounded-lg bg-surface-container hover:bg-forest-700 hover:text-white text-forest-900 font-semibold text-[11px] transition-colors">
                                            Ubah Status
                                        </button>
                                        <button onclick="openModalCetakTiket('#PSN-202410-096', 'Rian Pratama', 'Bandar Lampung → Krui', 'Kursi 2', 'Rp 120.000')" class="p-1.5 rounded-lg bg-surface-container hover:bg-forest-700 hover:text-white text-forest-900 transition-colors" title="Pratinjau Tiket">
                                            <span class="material-symbols-outlined text-[16px]">print</span>
                                        </button>
                                    </div>
                                </td>
                            </tr>

                            <!-- ROW 5 -->
                            <tr class="hover:bg-surface-container-low/50 transition-colors pesanan-row" data-status="BELUM_BAYAR" data-rute="Krui">
                                <td class="py-4 px-4 font-mono font-bold text-forest-700">
                                    #PSN-202410-095
                                    <span class="block text-[10px] text-ink-600 font-normal">08 Nov 14:40</span>
                                </td>
                                <td class="py-4 px-4">
                                    <div class="font-bold text-forest-900">Dedi Kurniawan</div>
                                    <span class="text-[11px] text-ink-600">081399881122 • Walk-in</span>
                                </td>
                                <td class="py-4 px-4">
                                    <div class="font-semibold text-forest-900">Bandar Lampung → Krui</div>
                                    <span class="text-[11px] text-ink-600">10 Nov 2026 • 08:00 WIB</span>
                                </td>
                                <td class="py-4 px-4">
                                    <span class="font-bold bg-surface-container text-ink-600 px-2 py-0.5 rounded text-[11px]">Kursi 5</span>
                                    <span class="block text-[10px] text-ink-600 mt-0.5">HiAce BE 7012 AA</span>
                                </td>
                                <td class="py-4 px-4 font-mono font-bold text-forest-900">
                                    Rp 120.000
                                    <span class="block text-[10px] text-amber-500 font-semibold">Menunggu Kasir</span>
                                </td>
                                <td class="py-4 px-4">
                                    <span class="inline-flex items-center gap-1 bg-surface-container text-ink-600 font-bold px-2.5 py-1 rounded-full text-[11px]">
                                        <span class="material-symbols-outlined text-[13px]">hourglass_empty</span>
                                        Belum Bayar
                                    </span>
                                </td>
                                <td class="py-4 px-4 text-center">
                                    <div class="flex items-center justify-center gap-1.5">
                                        <button onclick="openModalStatus('#PSN-202410-095', 'Dedi Kurniawan', 'Belum Bayar')" class="px-2.5 py-1.5 rounded-lg bg-amber-500 hover:bg-amber-600 text-forest-900 font-bold text-[11px] transition-colors shadow-xs">
                                            Bayar di Loket
                                        </button>
                                        <button onclick="batalkanPesanan('#PSN-202410-095')" class="p-1.5 rounded-lg bg-red-600/15 text-red-600 hover:bg-red-600 hover:text-white transition-colors" title="Batalkan">
                                            <span class="material-symbols-outlined text-[16px]">close</span>
                                        </button>
                                    </div>
                                </td>
                            </tr>

                            <!-- ROW 6 -->
                            <tr class="hover:bg-surface-container-low/50 transition-colors pesanan-row" data-status="LUNAS" data-rute="Metro">
                                <td class="py-4 px-4 font-mono font-bold text-forest-700">
                                    #PSN-202410-094
                                    <span class="block text-[10px] text-ink-600 font-normal">08 Nov 09:15</span>
                                </td>
                                <td class="py-4 px-4">
                                    <div class="font-bold text-forest-900">Eko Wahyudi</div>
                                    <span class="text-[11px] text-ink-600">087788112233 • Member</span>
                                </td>
                                <td class="py-4 px-4">
                                    <div class="font-semibold text-forest-900">Bandar Lampung → Metro</div>
                                    <span class="text-[11px] text-ink-600">10 Nov 2026 • 10:30 WIB</span>
                                </td>
                                <td class="py-4 px-4">
                                    <span class="font-bold bg-secondary-container text-forest-900 px-2 py-0.5 rounded text-[11px]">Kursi 6</span>
                                    <span class="block text-[10px] text-ink-600 mt-0.5">HiAce BE 7200 BB</span>
                                </td>
                                <td class="py-4 px-4 font-mono font-bold text-forest-900">
                                    Rp 45.000
                                    <span class="block text-[10px] text-green-700 font-semibold">Transfer Mandiri</span>
                                </td>
                                <td class="py-4 px-4">
                                    <span class="inline-flex items-center gap-1 bg-green-700/15 text-green-700 font-bold px-2.5 py-1 rounded-full text-[11px]">
                                        <span class="material-symbols-outlined text-[13px]">check</span>
                                        Lunas (Tiket Terbit)
                                    </span>
                                </td>
                                <td class="py-4 px-4 text-center">
                                    <div class="flex items-center justify-center gap-1.5">
                                        <button onclick="openModalStatus('#PSN-202410-094', 'Eko Wahyudi', 'Lunas')" class="px-2.5 py-1.5 rounded-lg bg-surface-container hover:bg-forest-700 hover:text-white text-forest-900 font-semibold text-[11px] transition-colors">
                                            Ubah Status
                                        </button>
                                        <button onclick="openModalCetakTiket('#PSN-202410-094', 'Eko Wahyudi', 'Bandar Lampung → Metro', 'Kursi 6', 'Rp 45.000')" class="p-1.5 rounded-lg bg-surface-container hover:bg-forest-700 hover:text-white text-forest-900 transition-colors" title="Pratinjau Tiket">
                                            <span class="material-symbols-outlined text-[16px]">print</span>
                                        </button>
                                    </div>
                                </td>
                            </tr>

                        </tbody>
                    </table>
                </div>

                <!-- PAGINATION FOOTER -->
                <div class="p-4 bg-surface-container-low/80 border-t border-surface-container flex flex-col sm:flex-row items-center justify-between gap-3 text-xs text-ink-600">
                    <span>Menampilkan 6 pesanan aktif loket Pool Rajabasa</span>
                    <div class="flex items-center gap-1">
                        <button class="px-3 py-1.5 rounded-lg bg-paper-0 border border-surface-container font-semibold disabled:opacity-50" disabled>&lt; Sebelumnya</button>
                        <button class="px-3 py-1.5 rounded-lg bg-forest-700 text-white font-bold">1</button>
                        <button class="px-3 py-1.5 rounded-lg bg-paper-0 border border-surface-container font-semibold">2</button>
                        <button class="px-3 py-1.5 rounded-lg bg-paper-0 border border-surface-container font-semibold">Selanjutnya &gt;</button>
                    </div>
                </div>
            </div>

        </div>
    </main>

    <!-- MODAL UBAH STATUS PEMESANAN -->
    <div id="modalStatus" class="fixed inset-0 bg-ink-900/60 backdrop-blur-sm z-50 hidden flex items-center justify-center p-4">
        <div class="bg-paper-0 rounded-2xl max-w-md w-full p-6 space-y-5 shadow-2xl animate-in fade-in zoom-in duration-150">
            <div class="flex items-center justify-between pb-3 border-b border-surface-container">
                <div class="flex items-center gap-2.5">
                    <div class="w-8 h-8 rounded-lg bg-forest-700 text-white flex items-center justify-center">
                        <span class="material-symbols-outlined text-[18px]">edit_note</span>
                    </div>
                    <div>
                        <h3 class="font-title-sm text-base font-bold text-forest-900">Ubah Status Pemesanan</h3>
                        <span id="modalIdPesan" class="text-xs font-mono font-bold text-forest-700">#PSN-202410-098</span>
                    </div>
                </div>
                <button onclick="closeModalStatus()" class="text-ink-600 hover:text-forest-900 p-1">
                    <span class="material-symbols-outlined text-[20px]">close</span>
                </button>
            </div>

            <div class="space-y-4 text-xs">
                <div>
                    <label class="block font-bold text-forest-900 uppercase tracking-wider mb-1">Nama Penumpang</label>
                    <input id="modalNamaPenumpang" type="text" readonly class="w-full bg-surface-container-low p-2.5 rounded-lg border border-surface-container text-forest-900 font-semibold">
                </div>

                <div>
                    <label class="block font-bold text-forest-900 uppercase tracking-wider mb-1">Pilih Status Baru <span class="text-red-600">*</span></label>
                    <select id="pilihanStatus" class="w-full bg-surface-container-low focus:bg-paper-0 p-2.5 rounded-lg border border-surface-container focus:border-forest-700 text-forest-900 font-semibold text-xs">
                        <option value="LUNAS">Lunas &amp; Terbitkan Tiket</option>
                        <option value="BOARDING">Naik Armada / Boarding Pass Selesai</option>
                        <option value="SELESAI">Perjalanan Tiba di Tujuan (Selesai)</option>
                        <option value="BATAL">Dibatalkan (Kursi Dibebaskan)</option>
                    </select>
                </div>

                <div>
                    <label class="block font-bold text-forest-900 uppercase tracking-wider mb-1">Catatan Staf Loket (Opsional)</label>
                    <textarea rows="2" placeholder="Cth: Penumpang bayar tunai pas di loket atau ganti nomor kontak..." class="w-full bg-surface-container-low p-2.5 rounded-lg border border-surface-container text-forest-900"></textarea>
                </div>
            </div>

            <div class="flex items-center gap-2 pt-2 border-t border-surface-container">
                <button onclick="simpanStatus()" class="w-full bg-forest-700 hover:bg-forest-900 text-white font-semibold text-xs py-2.5 rounded-lg transition-colors">
                    Simpan Perubahan Status
                </button>
                <button onclick="closeModalStatus()" class="w-full bg-surface-container hover:bg-surface-container-high text-forest-900 font-medium text-xs py-2.5 rounded-lg transition-colors">
                    Batal
                </button>
            </div>
        </div>
    </div>

    <!-- MODAL PRATINJAU CETAK TIKET LOKET (BOARDING PASS) -->
    <div id="modalCetakTiket" class="fixed inset-0 bg-ink-900/60 backdrop-blur-sm z-50 hidden flex items-center justify-center p-4">
        <div class="bg-paper-0 rounded-2xl max-w-lg w-full p-6 space-y-6 shadow-2xl animate-in fade-in zoom-in duration-150">
            <div class="flex items-center justify-between pb-3 border-b border-surface-container">
                <div class="flex items-center gap-2">
                    <span class="material-symbols-outlined text-forest-700 text-[22px]">confirmation_number</span>
                    <h3 class="font-title-sm text-base font-bold text-forest-900">E-Tiket &amp; Boarding Pass Loket</h3>
                </div>
                <button onclick="closeModalCetakTiket()" class="text-ink-600 hover:text-forest-900 p-1">
                    <span class="material-symbols-outlined text-[20px]">close</span>
                </button>
            </div>

            <!-- TICKET DESIGN PREVIEW -->
            <div class="border-2 border-forest-900 rounded-2xl p-6 bg-cream-50 space-y-4 shadow-sm" id="printArea">
                <div class="flex items-center justify-between border-b border-forest-900/20 pb-3">
                    <div class="flex items-center gap-2">
                        <div class="w-7 h-7 bg-forest-900 text-white rounded flex items-center justify-center">
                            <span class="material-symbols-outlined text-[16px]">directions_bus</span>
                        </div>
                        <div>
                            <span class="font-headline-sm text-sm font-bold text-forest-900 block leading-tight">Trans Lampung Express</span>
                            <span class="text-[9px] uppercase tracking-wider text-forest-700 font-semibold">Tiket Resmi Penumpang</span>
                        </div>
                    </div>
                    <div class="text-right font-mono">
                        <span id="ticketId" class="text-xs font-bold text-forest-900">#PSN-202410-098</span>
                        <span class="block text-[10px] text-green-700 font-bold uppercase">Lunas Terverifikasi</span>
                    </div>
                </div>

                <div class="grid grid-cols-2 gap-3 text-xs">
                    <div>
                        <span class="text-[10px] text-ink-600 block uppercase">Nama Penumpang</span>
                        <span id="ticketNama" class="font-bold text-forest-900 text-sm">Bambang Hermanto</span>
                    </div>
                    <div>
                        <span class="text-[10px] text-ink-600 block uppercase">Nomor Kursi</span>
                        <span id="ticketKursi" class="font-mono font-bold text-forest-700 text-sm bg-secondary-container px-2 py-0.5 rounded inline-block">Kursi 3</span>
                    </div>
                    <div>
                        <span class="text-[10px] text-ink-600 block uppercase">Rute Perjalanan</span>
                        <span id="ticketRute" class="font-semibold text-forest-900">Bandar Lampung → Krui</span>
                    </div>
                    <div>
                        <span class="text-[10px] text-ink-600 block uppercase">Tarif Tiket</span>
                        <span id="ticketTarif" class="font-mono font-bold text-forest-900">Rp 120.000</span>
                    </div>
                </div>

                <div class="bg-paper-0 p-3 rounded-xl border border-forest-900/10 flex items-center justify-between text-xs">
                    <div class="space-y-0.5">
                        <span class="text-[10px] text-ink-600 block">Titik Naik:</span>
                        <strong class="text-forest-900">Pool Utama Rajabasa (Loket 01)</strong>
                        <span class="block text-[10px] text-ink-600">Jadwal: 10 Nov 2026 • 08:00 WIB</span>
                    </div>
                    <!-- BARCODE MOCK -->
                    <div class="text-center font-mono">
                        <div class="h-8 w-24 bg-ink-900 mx-auto flex items-center justify-center text-white text-[9px] tracking-widest">
                            |||| ||| |||||
                        </div>
                        <span class="text-[9px] text-ink-600 mt-0.5 block">VALID LOKET</span>
                    </div>
                </div>
            </div>

            <!-- TOMBOL CETAK -->
            <div class="flex items-center gap-3">
                <button onclick="window.print()" class="w-full bg-forest-700 hover:bg-forest-900 text-white font-semibold text-xs py-3 rounded-xl flex items-center justify-center gap-2 shadow-sm transition-colors">
                    <span class="material-symbols-outlined text-[18px]">print</span>
                    Cetak Tiket / Boarding Pass
                </button>
                <button onclick="closeModalCetakTiket()" class="w-full bg-surface-container hover:bg-surface-container-high text-forest-900 font-medium text-xs py-3 rounded-xl transition-colors">
                    Tutup
                </button>
            </div>
        </div>
    </div>

    <!-- ROLE SWITCHER INCLUDED -->
    @include('partials.role-switcher')

    <script>
        function filterStatus(status) {
            document.querySelectorAll('.status-tab').forEach(tab => {
                tab.classList.remove('bg-forest-900', 'text-white');
                tab.classList.add('text-ink-600');
            });
            const activeTab = document.getElementById('tab-' + status);
            if (activeTab) {
                activeTab.classList.add('bg-forest-900', 'text-white');
                activeTab.classList.remove('text-ink-600');
            }

            const rows = document.querySelectorAll('.pesanan-row');
            rows.forEach(row => {
                if (status === 'SEMUA' || row.dataset.status === status) {
                    row.style.display = '';
                } else {
                    row.style.display = 'none';
                }
            });
        }

        function searchTable() {
            const query = document.getElementById('searchInput').value.toLowerCase();
            const route = document.getElementById('routeFilter').value.toLowerCase();
            const rows = document.querySelectorAll('.pesanan-row');

            rows.forEach(row => {
                const text = row.textContent.toLowerCase();
                const matchText = text.includes(query);
                const matchRoute = !route || (row.dataset.rute && row.dataset.rute.toLowerCase().includes(route));

                if (matchText && matchRoute) {
                    row.style.display = '';
                } else {
                    row.style.display = 'none';
                }
            });
        }

        function openModalStatus(id, nama, status) {
            document.getElementById('modalIdPesan').textContent = id;
            document.getElementById('modalNamaPenumpang').value = nama;
            document.getElementById('modalStatus').classList.remove('hidden');
        }

        function closeModalStatus() {
            document.getElementById('modalStatus').classList.add('hidden');
        }

        function simpanStatus() {
            const statusSelect = document.getElementById('pilihanStatus');
            const statusText = statusSelect.options[statusSelect.selectedIndex].text;
            alert('Status pemesanan ' + document.getElementById('modalIdPesan').textContent + ' berhasil diperbarui ke: ' + statusText);
            closeModalStatus();
        }

        function batalkanPesanan(id) {
            if (confirm('Apakah Anda yakin ingin membatalkan pesanan ' + id + '? Kursi akan dibebaskan kembali.')) {
                alert('Pesanan ' + id + ' berhasil dibatalkan.');
            }
        }

        function openModalCetakTiket(id, nama, rute, kursi, tarif) {
            document.getElementById('ticketId').textContent = id;
            document.getElementById('ticketNama').textContent = nama;
            document.getElementById('ticketRute').textContent = rute;
            document.getElementById('ticketKursi').textContent = kursi;
            document.getElementById('ticketTarif').textContent = tarif;
            document.getElementById('modalCetakTiket').classList.remove('hidden');
        }

        function closeModalCetakTiket() {
            document.getElementById('modalCetakTiket').classList.add('hidden');
        }
    </script>

</body>
</html>

