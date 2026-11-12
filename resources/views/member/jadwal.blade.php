
<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="shell-type" content="web_standard">
    <title>Cari Jadwal - Trans Lampung Express</title>

    <!-- GOOGLE FONTS: SAMA DENGAN BERANDA -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=DM+Sans:ital,opsz,wght@0,9..40,400..700;1,9..40,400..700&family=Source+Serif+4:ital,opsz,wght@0,8..60,600..700;1,8..60,600..700&display=swap"
        rel="stylesheet">

    <!-- MATERIAL SYMBOLS: SAMA DENGAN BERANDA -->
    <link
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200"
        rel="stylesheet">
    <link
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&display=swap"
        rel="stylesheet">

    <style>
        @layer base {
            html,
            body {
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

    <!-- TAILWIND CONFIG: SAMA DENGAN BERANDA -->
    <script id="tailwind-config">
        tailwind.config = {
            darkMode: "class",

            theme: {
                extend: {
                    colors: {
                        "on-secondary": "#ffffff",
                        "on-tertiary": "#ffffff",
                        "sage-100": "#E8EFE8",
                        "green-700": "#347653",
                        "on-tertiary-fixed-variant": "#663e00",
                        "line-200": "#E5E7E0",
                        "forest-900": "#173B35",
                        "on-primary-fixed": "#00201a",
                        "primary-container": "#285a4e",
                        "primary-fixed": "#b9eddd",
                        "primary-fixed-dim": "#9dd1c2",
                        "tertiary-fixed-dim": "#ffb963",
                        "outline-variant": "#c0c8c4",
                        "background": "#f6fbf4",
                        "on-primary-fixed-variant": "#1c4f43",
                        "surface-bright": "#f6fbf4",
                        "on-surface-variant": "#404945",
                        "secondary-fixed": "#c4eae1",
                        "on-secondary-container": "#466962",
                        "amber-500": "#D9953D",
                        "tertiary-fixed": "#ffddb9",
                        "on-error": "#ffffff",
                        "on-secondary-fixed-variant": "#2a4d46",
                        "outline": "#707975",
                        "secondary": "#42655e",
                        "surface-variant": "#dfe4dd",
                        "paper-0": "#FFFFFF",
                        "cream-50": "#FAF8F2",
                        "ink-600": "#65716A",
                        "tertiary-container": "#754700",
                        "error-container": "#ffdad6",
                        "surface-container-low": "#f0f5ee",
                        "inverse-primary": "#9dd1c2",
                        "on-background": "#181d19",
                        "secondary-fixed-dim": "#a8cec6",
                        "on-secondary-fixed": "#00201b",
                        "surface-container-high": "#e5e9e3",
                        "on-error-container": "#93000a",
                        "on-tertiary-fixed": "#2b1700",
                        "surface-container-lowest": "#ffffff",
                        "surface-container": "#ebefe8",
                        "tertiary": "#553300",
                        "surface-dim": "#d7dbd5",
                        "ink-900": "#202521",
                        "primary": "#0b4237",
                        "red-600": "#B94B43",
                        "on-primary": "#ffffff",
                        "on-tertiary-container": "#ffb65c",
                        "inverse-on-surface": "#eef2eb",
                        "error": "#ba1a1a",
                        "surface-tint": "#36675b",
                        "on-surface": "#181d19",
                        "secondary-container": "#c1e8df",
                        "forest-700": "#285A4E",
                        "on-primary-container": "#9ccfc0",
                        "inverse-surface": "#2d322d",
                        "surface-container-highest": "#dfe4dd",
                        "surface": "#f6fbf4"
                    },

                    borderRadius: {
                        "DEFAULT": "0.25rem",
                        "lg": "0.5rem",
                        "xl": "0.75rem",
                        "full": "9999px"
                    },

                    spacing: {
                        "gutter": "1.5rem",
                        "space-md": "1rem",
                        "gutter-sm": "1rem",
                        "margin-sm": "1rem",
                        "margin": "2rem",
                        "space-lg": "1.5rem",
                        "space-sm": "0.5rem",
                        "space-xs": "0.25rem",
                        "space-xl": "2rem"
                    },

                    fontFamily: {
                        "label-lg": ["DM Sans"],
                        "body-md": ["DM Sans"],
                        "headline-sm": ["\"Source Serif 4\""],
                        "title-md": ["DM Sans"],
                        "body-lg": ["DM Sans"],
                        "title-sm": ["DM Sans"],
                        "headline-xl": ["\"Source Serif 4\""],
                        "body-sm": ["DM Sans"],
                        "headline-lg-mobile": ["\"Source Serif 4\""],
                        "label-md": ["DM Sans"],
                        "numeric-price": ["DM Sans"],
                        "headline-md": ["\"Source Serif 4\""],
                        "headline-xl-mobile": ["\"Source Serif 4\""],
                        "label-sm": ["DM Sans"],
                        "headline-lg": ["\"Source Serif 4\""]
                    },

                    fontSize: {
                        "label-lg": ["14px", {
                            lineHeight: "20px",
                            fontWeight: "500"
                        }],
                        "body-md": ["14px", {
                            lineHeight: "20px",
                            fontWeight: "400"
                        }],
                        "headline-sm": ["20px", {
                            lineHeight: "28px",
                            fontWeight: "600"
                        }],
                        "title-md": ["18px", {
                            lineHeight: "26px",
                            fontWeight: "600"
                        }],
                        "body-lg": ["16px", {
                            lineHeight: "24px",
                            fontWeight: "400"
                        }],
                        "title-sm": ["16px", {
                            lineHeight: "24px",
                            fontWeight: "600"
                        }],
                        "headline-xl": ["40px", {
                            lineHeight: "48px",
                            fontWeight: "700"
                        }],
                        "body-sm": ["12px", {
                            lineHeight: "18px",
                            fontWeight: "400"
                        }],
                        "headline-lg-mobile": ["24px", {
                            lineHeight: "32px",
                            fontWeight: "600"
                        }],
                        "label-md": ["12px", {
                            lineHeight: "16px",
                            fontWeight: "500"
                        }],
                        "numeric-price": ["20px", {
                            lineHeight: "24px",
                            fontWeight: "700"
                        }],
                        "headline-md": ["24px", {
                            lineHeight: "32px",
                            fontWeight: "600"
                        }],
                        "headline-xl-mobile": ["30px", {
                            lineHeight: "38px",
                            fontWeight: "700"
                        }],
                        "label-sm": ["11px", {
                            lineHeight: "14px",
                            fontWeight: "600"
                        }],
                        "headline-lg": ["32px", {
                            lineHeight: "40px",
                            fontWeight: "600"
                        }]
                    }
                }
            }
        };
    </script>
</head>

<body class="bg-cream-50 font-body-md text-on-surface antialiased selection:bg-secondary-container selection:text-forest-900">

    {{-- DATA DUMMY JADWAL --}}
    @php
        $jadwals = [
            [
                'waktu' => 'pagi',
                'kategori' => 'Jadwal Pagi Hari',
                'kode' => 'TLP-01',
                'jam' => '08:00',
                'kendaraan' => 'Toyota HiAce Commuter',
                'warna' => 'Silver',
                'plat' => 'BE 7012 AA',
            ],
            [
                'waktu' => 'siang',
                'kategori' => 'Jadwal Siang Hari',
                'kode' => 'TLP-02',
                'jam' => '13:30',
                'kendaraan' => 'Isuzu Elf Minibus',
                'warna' => 'Putih Metalik',
                'plat' => 'BE 1984 LU',
            ],
            [
                'waktu' => 'sore-malam',
                'kategori' => 'Jadwal Sore Hari',
                'kode' => 'TLP-03',
                'jam' => '16:00',
                'kendaraan' => 'Toyota HiAce Commuter',
                'warna' => 'Putih Metalik',
                'plat' => 'BE 2240 BD',
            ],
            [
                'waktu' => 'sore-malam',
                'kategori' => 'Jadwal Malam Hari',
                'kode' => 'TLP-04',
                'jam' => '19:30',
                'kendaraan' => 'Toyota HiAce Commuter',
                'warna' => 'Silver Metalik',
                'plat' => 'BE 7331 CT',
            ],
        ];
    @endphp

    {{-- HEADER --}}
    <header class="fixed top-0 left-0 right-0 w-full z-50 bg-cream-50/90 backdrop-blur-xl shadow-[0_1px_8px_rgba(23,59,53,0.05)]">
        <div class="h-16 max-w-7xl mx-auto px-6 lg:px-12 flex items-center justify-between">

            <a class="flex items-center gap-space-sm group"
               href="{{ route('member.beranda') }}">
                <div class="w-9 h-9 rounded-lg bg-forest-900 flex items-center justify-center text-paper-0 transition-transform group-hover:scale-105">
                    <span class="material-symbols-outlined text-[20px]">
                        directions_bus
                    </span>
                </div>

                <div class="flex flex-col">
                    <span class="font-headline-sm text-headline-sm text-forest-900 tracking-tight leading-none">
                        Trans Lampung
                    </span>

                    <span class="font-label-sm text-label-sm tracking-wider uppercase text-forest-700 font-semibold">
                        Express Travel
                    </span>
                </div>
            </a>

            <nav class="hidden md:flex items-center gap-6">
                <a
                    href="{{ route('member.beranda') }}"
                    class="font-label-lg text-label-lg text-on-surface-variant hover:text-on-surface transition-colors">
                    Beranda
                </a>

                <a
                    href="{{ route('member.cari-jadwal') }}"
                    aria-current="page"
                    class="font-label-lg text-label-lg transition-colors bg-primary-container text-on-primary-container font-semibold rounded-lg px-3 py-1.5">
                    Cari Jadwal
                </a>

                <a
                    href="{{ route('member.keluhan') }}"
                    class="font-label-lg text-label-lg text-on-surface-variant hover:text-on-surface transition-colors">
                    Keluhan
                </a>
            </nav>

            <div class="flex items-center gap-space-md">

                <div class="hidden sm:flex flex-col text-right">
                    <span class="font-body-sm text-body-sm text-ink-600">
                        Halo,
                    </span>

                    <a href="{{ route('member.profil') }}"
                       class="font-title-sm text-title-sm text-forest-900 leading-none hover:text-forest-700 transition-colors">
                        {{ auth()->user()->name ?? 'Member' }}
                    </a>
                </div>

                <a
                    class="flex items-center gap-2 group"
                    href="{{ route('member.profil') }}"
                    title="Halaman Profil">
                    <div class="w-8 h-8 rounded-full bg-primary flex items-center justify-center ring-2 ring-forest-700/20 group-hover:ring-forest-700 transition-all">
                        <span class="material-symbols-outlined text-on-primary text-[18px]">
                            person
                        </span>
                    </div>
                </a>

            </div>
        </div>
    </header>

    {{-- MAIN CONTENT --}}
    <main class="w-full pt-16 bg-cream-50 min-h-screen">
        <div class="flex flex-col w-full">
            <div class="w-full max-w-7xl mx-auto px-6 lg:px-12 py-8">

                {{-- JUDUL DAN BREADCRUMB --}}
                <div class="mb-8 flex flex-col md:flex-row md:items-end justify-between gap-4">

                    <div>
                        <div class="flex items-center gap-2 text-ink-600 font-label-sm text-label-sm uppercase tracking-wider mb-2">
                            <span>Pemesanan Tiket</span>
                            <span class="material-symbols-outlined text-[14px]">chevron_right</span>
                            <span class="text-forest-700 font-bold">Hasil Jadwal Perjalanan</span>
                        </div>

                        <h1 class="font-headline-lg text-headline-lg text-forest-900 tracking-tight">
                            Jadwal Resmi Keberangkatan
                        </h1>

                        <p class="font-body-md text-body-md text-ink-600 mt-1">
                            Pilihan perjalanan antarkota dengan unit terawat dan penomoran kursi terjamin.
                        </p>
                    </div>

                    <div class="bg-paper-0 shadow-sm rounded-xl p-3 px-4 flex items-center gap-3">
                        <div class="w-8 h-8 rounded-lg bg-sage-100 flex items-center justify-center text-forest-900">
                            <span class="material-symbols-outlined text-[20px]">calendar_today</span>
                        </div>

                        <div class="flex flex-col">
                            <span class="font-label-sm text-label-sm text-ink-600 uppercase">
                                Tanggal Perjalanan
                            </span>
                            <span class="font-title-sm text-title-sm text-forest-900">
                                {{ $departureDate ? \Carbon\Carbon::parse($departureDate)->translatedFormat('l, d F Y') : 'Semua Tanggal' }}
                            </span>
                        </div>
                    </div>
                </div>

                {{-- LAYOUT UTAMA --}}
                <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 items-start">

                    {{-- SIDEBAR FILTER --}}
                    <aside class="lg:col-span-4 flex flex-col gap-6 sticky top-24">

                        {{-- RUTE AKTIF --}}
                        <div class="bg-forest-900 text-paper-0 rounded-xl p-6 shadow-md relative overflow-hidden">
                            <div class="relative z-10 flex flex-col gap-4">

                                <div class="flex items-center justify-between">
                                    <span class="font-label-sm text-label-sm tracking-widest uppercase text-primary-fixed-dim font-bold">
                                        Rute Aktif
                                    </span>

                                    <span class="inline-flex items-center gap-1.5 px-2.5 py-0.5 rounded-full bg-forest-700 text-on-primary font-label-sm text-label-sm">
                                        <span class="w-1.5 h-1.5 rounded-full bg-green-700"></span>
                                        Layanan Reguler
                                    </span>
                                </div>

                                <div class="space-y-3 pt-1">

                                    <div class="flex items-start gap-3">
                                        <span class="material-symbols-outlined text-tertiary-fixed-dim text-[20px] mt-0.5">
                                            trip_origin
                                        </span>

                                        <div class="flex flex-col">
                                            <span class="font-label-sm text-label-sm text-primary-fixed-dim">Kota Asal</span>
                                            <span id="activeKotaAsal" class="font-title-md text-title-md text-paper-0 font-semibold">
                                                {{ $originName ?: 'Semua Kota Asal' }}
                                            </span>
                                        </div>
                                    </div>

                                    <div class="pl-2 border-l border-forest-700/60 ml-2.5 h-4"></div>

                                    <div class="flex items-start gap-3">
                                        <span class="material-symbols-outlined text-amber-500 text-[20px] mt-0.5">
                                            location_on
                                        </span>

                                        <div class="flex flex-col">
                                            <span class="font-label-sm text-label-sm text-primary-fixed-dim">Kota Tujuan</span>
                                            <span id="activeKotaTujuan" class="font-title-md text-title-md text-paper-0 font-semibold">
                                                {{ $destinationName ?: 'Semua Kota Tujuan' }}
                                            </span>
                                        </div>
                                    </div>

                                </div>

                                <div class="pt-3 flex items-center justify-between font-body-sm text-body-sm text-primary-fixed-dim/90">
                                    <span class="flex items-center gap-1">
                                        <span class="material-symbols-outlined text-[16px]">schedule</span>
                                        Est. 5 - 6 Jam
                                    </span>
                                    <span>Via Lintas Barat Sumatera</span>
                                </div>

                            </div>
                        </div>

                        {{-- PANEL FILTER --}}
                        <div class="bg-paper-0 rounded-xl p-6 shadow-sm flex flex-col gap-6">

                            <div class="flex items-center justify-between">
                                <div class="flex items-center gap-2">
                                    <span class="material-symbols-outlined text-forest-700 text-[20px]">tune</span>
                                    <h2 class="font-title-md text-title-md text-ink-900 font-bold">
                                        Sesuaikan Rute
                                    </h2>
                                </div>

                                <button id="btnResetFilter" type="button" class="font-label-md text-label-md text-forest-700 hover:text-forest-900 underline underline-offset-4">
                                    Reset
                                </button>
                            </div>

                            <form id="filterForm" action="{{ route('member.cari-jadwal') }}" method="GET" class="flex flex-col gap-5">

                                {{-- KOTA ASAL --}}
                                <div class="flex flex-col gap-1.5">
                                    <label for="filterKotaAsal" class="font-label-lg text-label-lg text-ink-600 font-medium">
                                        Kota Asal (Titik Keberangkatan)
                                    </label>

                                    <div class="relative">
                                        <select id="filterKotaAsal" name="kota_asal" class="w-full bg-cream-50 text-ink-900 rounded-lg px-3.5 py-2.5 font-body-md text-body-md appearance-none focus:outline-none focus:bg-paper-0">
                                            <option value="">Semua Kota Asal</option>
                                            @foreach ($kotaAsalList ?? [] as $asal)
                                                <option value="{{ $asal->nm_kota_asal }}" {{ ($originName ?? '') === $asal->nm_kota_asal ? 'selected' : '' }}>
                                                    {{ $asal->nm_kota_asal }}
                                                </option>
                                            @endforeach
                                        </select>

                                        <span class="material-symbols-outlined absolute right-3 top-3 pointer-events-none text-ink-600 text-[20px]">
                                            expand_more
                                        </span>
                                    </div>
                                </div>

                                {{-- KOTA TUJUAN --}}
                                <div class="flex flex-col gap-1.5">
                                    <label for="filterKotaTujuan" class="font-label-lg text-label-lg text-ink-600 font-medium">
                                        Kota Tujuan
                                    </label>

                                    <div class="relative">
                                        <select id="filterKotaTujuan" name="kota_tujuan" class="w-full bg-cream-50 text-ink-900 rounded-lg px-3.5 py-2.5 font-body-md text-body-md appearance-none focus:outline-none focus:bg-paper-0">
                                            <option value="">Semua Kota Tujuan</option>
                                            @foreach ($kotaTujuanList ?? [] as $tujuan)
                                                <option value="{{ $tujuan->nm_kota_tujuan }}" {{ ($destinationName ?? '') === $tujuan->nm_kota_tujuan ? 'selected' : '' }}>
                                                    {{ $tujuan->nm_kota_tujuan }}
                                                </option>
                                            @endforeach
                                        </select>

                                        <span class="material-symbols-outlined absolute right-3 top-3 pointer-events-none text-ink-600 text-[20px]">
                                            expand_more
                                        </span>
                                    </div>
                                </div>

                                {{-- TANGGAL --}}
                                <div class="flex flex-col gap-1.5">
                                    <label for="filterTglBerangkat" class="font-label-lg text-label-lg text-ink-600 font-medium">
                                        Tanggal Keberangkatan
                                    </label>
                                    <input
                                        type="date"
                                        id="filterTglBerangkat"
                                        name="tgl_berangkat"
                                        value="{{ $departureDate ?? '' }}"
                                        min="{{ date('Y-m-d') }}"
                                        class="w-full bg-cream-50 text-ink-900 rounded-lg px-3.5 py-2.5 font-body-md text-body-md focus:outline-none focus:bg-paper-0"
                                    >
                                </div>

                                {{-- WAKTU KEBERANGKATAN --}}
                                <div class="flex flex-col gap-2 pt-2">
                                    <span class="font-label-lg text-label-lg text-ink-600 font-medium">
                                        Waktu Keberangkatan
                                    </span>

                                    <div class="grid grid-cols-1 gap-2">

                                        <label class="flex items-center justify-between p-3 rounded-lg bg-surface hover:bg-sage-100/60 cursor-pointer transition-colors group">
                                            <div class="flex items-center gap-3">
                                                <input class="w-4 h-4 rounded text-forest-700 accent-forest-700 cursor-pointer" name="waktu" type="radio" value="" {{ empty($timeFilter) ? 'checked' : '' }}>

                                                <div class="flex flex-col">
                                                    <span class="font-body-md text-body-md text-ink-900 font-medium">Semua Waktu</span>
                                                    <span class="font-body-sm text-body-sm text-ink-600">24 Jam</span>
                                                </div>
                                            </div>

                                            <span class="material-symbols-outlined text-ink-600 text-[18px]">schedule</span>
                                        </label>

                                        <label class="flex items-center justify-between p-3 rounded-lg bg-surface hover:bg-sage-100/60 cursor-pointer transition-colors group">
                                            <div class="flex items-center gap-3">
                                                <input class="w-4 h-4 rounded text-forest-700 accent-forest-700 cursor-pointer" name="waktu" type="radio" value="pagi" {{ ($timeFilter ?? '') === 'pagi' ? 'checked' : '' }}>

                                                <div class="flex flex-col">
                                                    <span class="font-body-md text-body-md text-ink-900 font-medium">Pagi Hari</span>
                                                    <span class="font-body-sm text-body-sm text-ink-600">06:00 - 11:59 WIB</span>
                                                </div>
                                            </div>

                                            <span class="material-symbols-outlined text-ink-600 text-[18px]">wb_sunny</span>
                                        </label>

                                        <label class="flex items-center justify-between p-3 rounded-lg bg-surface hover:bg-sage-100/60 cursor-pointer transition-colors group">
                                            <div class="flex items-center gap-3">
                                                <input class="w-4 h-4 rounded text-forest-700 accent-forest-700 cursor-pointer" name="waktu" type="radio" value="siang" {{ ($timeFilter ?? '') === 'siang' ? 'checked' : '' }}>

                                                <div class="flex flex-col">
                                                    <span class="font-body-md text-body-md text-ink-900 font-medium">Siang Hari</span>
                                                    <span class="font-body-sm text-body-sm text-ink-600">12:00 - 15:59 WIB</span>
                                                </div>
                                            </div>

                                            <span class="material-symbols-outlined text-ink-600 text-[18px]">light_mode</span>
                                        </label>

                                        <label class="flex items-center justify-between p-3 rounded-lg bg-surface hover:bg-sage-100/60 cursor-pointer transition-colors group">
                                            <div class="flex items-center gap-3">
                                                <input class="w-4 h-4 rounded text-forest-700 accent-forest-700 cursor-pointer" name="waktu" type="radio" value="sore-malam" {{ ($timeFilter ?? '') === 'sore-malam' ? 'checked' : '' }}>

                                                <div class="flex flex-col">
                                                    <span class="font-body-md text-body-md text-ink-900 font-medium">Sore &amp; Malam</span>
                                                    <span class="font-body-sm text-body-sm text-ink-600">16:00 - 21:00 WIB</span>
                                                </div>
                                            </div>

                                            <span class="material-symbols-outlined text-ink-600 text-[18px]">nights_stay</span>
                                        </label>

                                    </div>
                                </div>

                                <button type="submit" class="w-full mt-2 py-3 px-4 bg-forest-700 hover:bg-forest-900 text-white font-label-lg text-label-lg rounded-lg font-medium transition-all shadow-sm flex items-center justify-center gap-2">
                                    <span class="material-symbols-outlined text-[18px]">search</span>
                                    Terapkan Filter
                                </button>

                            </form>

                            {{-- INFORMASI KURSI --}}
                            <div class="p-4 rounded-lg bg-sage-100 text-forest-900 flex flex-col gap-2">
                                <div class="flex items-center gap-2 font-label-sm text-label-sm font-bold uppercase tracking-wider text-forest-700">
                                    <span class="material-symbols-outlined text-[16px]">info</span>
                                    Informasi Pemilihan Kursi
                                </div>

                                <p class="font-body-sm text-body-sm text-ink-600 leading-relaxed">
                                    Setiap mobil travel memiliki kapasitas tetap 5 kursi penumpang (Nomor Kursi 1 hingga 5). Anda dapat memilih nomor kursi idaman pada langkah berikutnya.
                                </p>
                            </div>

                        </div>
                    </aside>

                    {{-- HASIL JADWAL --}}
                    <section class="lg:col-span-8 flex flex-col gap-5">

                        {{-- INFORMASI JUMLAH JADWAL --}}
                        <div class="bg-paper-0 px-5 py-4 rounded-xl shadow-sm flex flex-col sm:flex-row sm:items-center justify-between gap-3">

                            <div class="flex items-center gap-2.5">
                                <div class="w-2.5 h-2.5 rounded-full bg-forest-700"></div>

                                <span class="font-body-md text-body-md text-ink-900 font-medium">
                                    Menampilkan
                                    <span id="scheduleCount" class="font-bold text-forest-900">{{ $schedules->total() }} jadwal resmi</span>
                                    yang tersedia untuk rute terpilih
                                </span>
                            </div>

                            <div class="flex items-center gap-2 text-ink-600 font-label-sm text-label-sm">
                                <span>Pemberangkatan Pasti</span>
                                <span>•</span>
                                <span class="text-green-700 font-semibold">Tepat Waktu</span>
                            </div>

                        </div>

                        {{-- DAFTAR KARTU JADWAL --}}
                        <div id="scheduleList" class="flex flex-col gap-4">

                            @forelse ($schedules ?? [] as $schedule)
                                <article class="schedule-card bg-paper-0 rounded-xl p-6 shadow-sm hover:shadow-md transition-shadow flex flex-col gap-5">

                                    {{-- BAGIAN ATAS: RUTE DAN HARGA --}}
                                    <div class="flex flex-col sm:flex-row sm:items-start justify-between gap-4 pb-4">

                                        <div class="flex flex-col gap-1">

                                            <div class="flex items-center gap-2 text-forest-700 font-label-sm text-label-sm uppercase tracking-wider font-bold">
                                                <span>Travel Eksekutif</span>
                                                <span>•</span>
                                                <span>Kode Jadwal #{{ $schedule->id_jadwal }}</span>
                                            </div>

                                            <h3 class="font-headline-sm text-headline-sm text-forest-900 font-bold">
                                                {{ $schedule->kotaAsal->nm_kota_asal ?? 'Kota Asal' }}
                                                <span class="text-ink-600 mx-1">→</span>
                                                {{ $schedule->kotaTujuan->nm_kota_tujuan ?? 'Kota Tujuan' }}
                                            </h3>

                                            <div class="flex flex-wrap items-center gap-3 text-ink-600 font-body-sm text-body-sm pt-1">

                                                <span class="flex items-center gap-1 font-semibold text-ink-900">
                                                    <span class="material-symbols-outlined text-[16px] text-forest-700">schedule</span>
                                                    {{ substr($schedule->jam_berangkat, 0, 5) }} WIB
                                                </span>

                                                <span>•</span>
                                                <span>{{ $schedule->tgl_berangkat ? \Carbon\Carbon::parse($schedule->tgl_berangkat)->translatedFormat('l, d F Y') : '-' }}</span>
                                                <span>•</span>
                                                <span class="px-2 py-0.5 rounded text-xs font-semibold {{ $schedule->seatsLeft() > 0 ? 'bg-sage-100 text-forest-900' : 'bg-red-100 text-red-800' }}">
                                                    Sisa {{ $schedule->seatsLeft() }} dari 5 Kursi
                                                </span>

                                            </div>
                                        </div>

                                        {{-- HARGA --}}
                                        <div class="sm:text-right flex flex-col sm:items-end justify-center bg-cream-50 sm:bg-transparent p-3 sm:p-0 rounded-lg">

                                            <span class="font-label-sm text-label-sm text-ink-600">
                                                Tarif Resmi per Kursi
                                            </span>

                                            <div class="font-numeric-price text-numeric-price text-amber-500 font-bold flex items-baseline gap-1">
                                                Rp {{ number_format($schedule->harga, 0, ',', '.') }}
                                                <span class="font-body-sm text-body-sm text-ink-600 font-normal">/ kursi</span>
                                            </div>

                                            <span class="font-label-sm text-label-sm text-forest-700">
                                                Termasuk Asuransi Perjalanan
                                            </span>
                                        </div>

                                    </div>

                                    {{-- BAGIAN TENGAH: INFORMASI KENDARAAN --}}
                                    <div class="bg-surface-container-low rounded-lg p-4 flex flex-col md:flex-row md:items-center justify-between gap-4">

                                        <div class="flex items-center gap-3">

                                            <div class="w-10 h-10 rounded-lg bg-paper-0 flex items-center justify-center text-forest-900 shadow-sm shrink-0">
                                                <span class="material-symbols-outlined text-[22px]">directions_bus</span>
                                            </div>

                                            <div class="flex flex-col">

                                                <div class="flex items-center gap-2">
                                                    <span class="font-title-sm text-title-sm text-forest-900 font-bold">
                                                        {{ $schedule->kendaraan->jenis_mobil ?? 'Travel' }}
                                                    </span>

                                                    @if ($schedule->kendaraan?->warna_mobil)
                                                        <span class="px-2 py-0.5 rounded bg-sage-100 text-forest-900 font-label-sm text-label-sm font-semibold">
                                                            {{ $schedule->kendaraan->warna_mobil }}
                                                        </span>
                                                    @endif
                                                </div>

                                                <div class="flex items-center gap-2 text-ink-600 font-body-sm text-body-sm">
                                                    <span>No. Polisi: <strong class="text-ink-900 font-mono">{{ $schedule->kendaraan->nomor_polisi ?? '-' }}</strong></span>
                                                    <span>•</span>
                                                    <span>Full AC &amp; Reclining Seat</span>
                                                </div>

                                            </div>
                                        </div>

                                        <div class="flex items-center gap-3 md:border-l md:border-surface-variant md:pl-4">

                                            <div class="w-8 h-8 rounded-full bg-forest-700/10 text-forest-700 flex items-center justify-center shrink-0">
                                                <span class="material-symbols-outlined text-[18px]">airline_seat_recline_normal</span>
                                            </div>

                                            <div class="flex flex-col">
                                                <span class="font-label-sm text-label-sm text-ink-600 uppercase font-semibold">
                                                    Kapasitas Armada
                                                </span>

                                                <span class="font-body-md text-body-md font-bold text-forest-900">
                                                    5 Kursi Penumpang
                                                </span>
                                            </div>

                                        </div>
                                    </div>

                                    {{-- BAGIAN BAWAH: FITUR DAN TOMBOL --}}
                                    <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4 pt-1">

                                        <div class="flex items-center gap-4 text-ink-600 font-body-sm text-body-sm">

                                            <span class="inline-flex items-center gap-1.5 text-forest-700 font-medium">
                                                <span class="material-symbols-outlined text-[16px]">check_circle</span>
                                                Bagasi Standar 15kg
                                            </span>

                                            <span class="inline-flex items-center gap-1.5 text-forest-700 font-medium">
                                                <span class="material-symbols-outlined text-[16px]">check_circle</span>
                                                Antar Jemput Sesuai Rute
                                            </span>

                                        </div>

                                        @if ($schedule->seatsLeft() > 0)
                                            <a href="{{ route('member.pilih-kursi', $schedule) }}" class="inline-flex items-center justify-center gap-2 px-6 py-2.5 rounded-lg bg-forest-700 hover:bg-forest-900 text-on-primary font-label-lg text-label-lg font-medium transition-all shadow-sm group">
                                                <span>Pilih Kursi</span>
                                                <span class="material-symbols-outlined text-[18px] transition-transform group-hover:translate-x-1">
                                                    arrow_forward
                                                </span>
                                            </a>
                                        @else
                                            <button disabled class="inline-flex items-center justify-center gap-2 px-6 py-2.5 rounded-lg bg-surface-container text-ink-600 font-label-lg text-label-lg font-medium cursor-not-allowed">
                                                <span>Kursi Penuh</span>
                                            </button>
                                        @endif

                                    </div>
                                </article>
                            @empty
                                <div class="bg-paper-0 rounded-xl p-8 text-center shadow-sm">
                                    <span class="material-symbols-outlined text-forest-700 text-4xl">event_busy</span>
                                    <h3 class="font-title-md text-title-md text-forest-900 font-bold mt-3">
                                        Jadwal Tidak Ditemukan
                                    </h3>
                                    <p class="font-body-sm text-body-sm text-ink-600 mt-1">
                                        Tidak ada jadwal keberangkatan yang cocok dengan rute atau tanggal yang dipilih.
                                    </p>
                                </div>
                            @endforelse

                            @if (isset($schedules) && $schedules->hasPages())
                                <div class="p-4 bg-paper-0 rounded-xl shadow-sm">
                                    {{ $schedules->links() }}
                                </div>
                            @endif

                        </div>

                        {{-- BANTUAN RUTE --}}
                        <div class="mt-4 bg-paper-0 rounded-xl p-6 shadow-sm flex flex-col sm:flex-row items-center justify-between gap-4">

                            <div class="flex items-center gap-4">

                                <div class="w-12 h-12 rounded-xl bg-forest-900 text-paper-0 flex items-center justify-center shrink-0">
                                    <span class="material-symbols-outlined text-[24px]">support_agent</span>
                                </div>

                                <div class="flex flex-col">
                                    <span class="font-title-sm text-title-sm text-forest-900 font-bold">
                                        Butuh Bantuan Rute Khusus atau Titik Jemput?
                                    </span>

                                    <span class="font-body-sm text-body-sm text-ink-600">
                                        Petugas loket kami di Rajabasa, Metro, dan Krui siap memandu konfirmasi titik keberangkatan Anda.
                                    </span>
                                </div>

                            </div>

                            <a href="#" class="whitespace-nowrap px-4 py-2 text-forest-700 hover:text-forest-900 bg-sage-100 hover:bg-surface-variant font-label-md text-label-md rounded-lg font-semibold transition-colors">
                                Hubungi Petugas Loket
                            </a>

                        </div>

                    </section>
                </div>
            </div>
        </div>
    </main>

    {{-- FOOTER --}}
    <footer class="w-full bg-paper-0 mt-space-xl">
        <div class="max-w-7xl mx-auto px-6 lg:px-12 py-12">

            <div class="grid grid-cols-1 md:grid-cols-12 gap-8 pb-10">

                {{-- IDENTITAS --}}
                <div class="md:col-span-5 flex flex-col gap-3">

                    <div class="flex items-center gap-space-sm">
                        <div class="w-8 h-8 rounded bg-forest-900 flex items-center justify-center text-paper-0">
                            <span class="material-symbols-outlined text-[18px]">directions_bus</span>
                        </div>

                        <span class="font-headline-sm text-headline-sm text-forest-900">
                            Trans Lampung Express
                        </span>
                    </div>

                    <p class="font-body-sm text-body-sm text-ink-600 max-w-sm leading-relaxed">
                        Layanan transportasi darat antarkota terpercaya di Provinsi Lampung. Menghubungkan kota kabupaten dengan armada eksekutif, ketepatan waktu, dan pemesanan tiket resmi.
                    </p>
                </div>

                {{-- RUTE LAYANAN --}}
                <div class="md:col-span-4 flex flex-col gap-2">

                    <span class="font-label-md text-label-md uppercase tracking-wider text-forest-700 font-bold mb-1">
                        Rute Layanan Reguler
                    </span>

                    <div class="grid grid-cols-2 gap-x-4 gap-y-1.5 font-body-sm text-body-sm text-on-surface-variant">
                        <span>Bandar Lampung</span>
                        <span>Metro</span>
                        <span>Pringsewu</span>
                        <span>Kotabumi</span>
                        <span>Krui (Pesisir Barat)</span>
                        <span>Kalianda</span>
                    </div>
                </div>

                {{-- AKSES MEMBER --}}
                <div class="md:col-span-3 flex flex-col gap-2">

                    <span class="font-label-md text-label-md uppercase tracking-wider text-forest-700 font-bold mb-1">
                        Akses Member
                    </span>

                    <div class="flex flex-col gap-1.5 font-body-sm text-body-sm">
                        <a href="{{ route('member.cari-jadwal') }}" class="text-on-surface-variant hover:text-forest-900 transition-colors">
                            Jadwal Keberangkatan
                        </a>

                        <a href="{{ route('member.profil') }}" class="text-on-surface-variant hover:text-forest-900 transition-colors">
                            Tiket &amp; Reservasi Saya
                        </a>

                        <a href="{{ route('member.keluhan') }}" class="text-on-surface-variant hover:text-forest-900 transition-colors">
                            Layanan Pengaduan &amp; Bantuan
                        </a>
                    </div>
                </div>

            </div>

            {{-- COPYRIGHT --}}
            <div class="pt-6 flex flex-col sm:flex-row items-center justify-between gap-4">

                <p class="font-body-sm text-body-sm text-ink-600">
                    © 2025 Trans Lampung Express. Hak Cipta Dilindungi Undang-Undang.
                </p>

                <div class="flex items-center gap-4 text-ink-600 font-label-sm text-label-sm">
                    <span class="inline-flex items-center gap-1.5">
                        <span class="w-2 h-2 rounded-full bg-green-700"></span>
                        Sistem Tiket Resmi Lampung
                    </span>
                </div>

            </div>
        </div>
    </footer>

    {{-- JAVASCRIPT FILTER --}}
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const btnReset = document.getElementById('btnResetFilter');

            // Tombol reset filter mengarahkan ulang ke halaman tanpa query filter
            if (btnReset) {
                btnReset.addEventListener('click', function () {
                    window.location.href = "{{ route('member.cari-jadwal') }}";
                });
            }
        });
    </script>

        });
    </script>

    @include('partials.role-switcher')

</body>
</html>
