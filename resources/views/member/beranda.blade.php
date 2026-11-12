<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="shell-type" content="web_standard">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    <link
        href="https://fonts.googleapis.com/css2?family=DM+Sans:ital,opsz,wght@0,9..40,400..700;1,9..40,400..700&family=Source+Serif+4:ital,opsz,wght@0,8..60,600..700;1,8..60,600..700&display=swap"
        rel="stylesheet"
    >

    <link
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200"
        rel="stylesheet"
    >

    <link
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&display=swap"
        rel="stylesheet"
    >

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

    <!-- HEADER / NAVBAR -->
    <header class="fixed top-0 left-0 right-0 w-full z-50 bg-cream-50/90 backdrop-blur-xl shadow-[0_1px_8px_rgba(23,59,53,0.05)]">

        <div class="h-16 max-w-7xl mx-auto px-6 lg:px-12 flex items-center justify-between">

            <a class="flex items-center gap-space-sm group" data-path="beranda" href="{{ route('member.beranda') }}">
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

            <nav
                class="hidden md:flex items-center gap-6"
                data-active-classes="bg-primary-container text-on-primary-container font-semibold rounded-lg px-3 py-1.5"
            >
                <a
                    aria-current="page"
                    class="transition-colors bg-primary-container text-on-primary-container font-semibold rounded-lg px-3 py-1.5"
                    data-path="beranda"
                    href="{{ route('member.beranda') }}"
                >
                    Beranda
                </a>

                <a
                    class="font-label-lg text-label-lg text-on-surface-variant hover:text-on-surface transition-colors"
                    data-path="cari-jadwal"
                    href="{{ route('member.cari-jadwal') }}"
                >
                    Cari Jadwal
                </a>

                <a
                    class="font-label-lg text-label-lg text-on-surface-variant hover:text-on-surface transition-colors"
                    data-path="keluhan"
                    href="{{ route('member.keluhan') }}"
                >
                    Keluhan
                </a>
            </nav>

            <div class="flex items-center gap-space-md">

                <div class="hidden sm:flex flex-col text-right">
                    <span class="font-body-sm text-body-sm text-ink-600">
                        Halo,
                    </span>

                    <a href="{{ route('member.profil') }}" class="font-title-sm text-title-sm text-forest-900 leading-none hover:text-forest-700 transition-colors">
                        {{ auth()->user()->name ?? 'Member' }}
                    </a>
                </div>

                <a class="flex items-center gap-2 group" data-path="profil-member" href="{{ route('member.profil') }}" title="Halaman Profil">
                    <div class="w-8 h-8 rounded-full bg-primary flex items-center justify-center ring-2 ring-forest-700/20 group-hover:ring-forest-700 transition-all">
                        <span class="material-symbols-outlined text-on-primary text-[18px]">
                            person
                        </span>
                    </div>
                </a>

                <form method="POST" action="{{ route('logout') }}" class="inline">
                    @csrf
                    <button type="submit" class="px-3 py-1.5 rounded-lg border border-red-600/30 text-red-600 hover:bg-red-600 hover:text-white font-semibold text-xs transition-colors flex items-center gap-1 cursor-pointer" title="Keluar Akun">
                        <span class="material-symbols-outlined text-[16px]">logout</span>
                        <span class="hidden sm:inline">Keluar</span>
                    </button>
                </form>

            </div>
        </div>
    </header>

    <!-- MAIN CONTENT -->
    <main class="w-full pt-16 bg-cream-50 min-h-screen">

        <div class="flex flex-col w-full">

            <!-- HERO SECTION -->
            <section class="relative w-full overflow-hidden">

                <div class="absolute -top-32 right-0 w-[540px] h-[540px] bg-secondary-container/20 rounded-full blur-3xl pointer-events-none"></div>

                <div class="max-w-7xl mx-auto px-6 lg:px-12 pt-10 pb-8">

                    <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 lg:gap-12 items-end">

                        <!-- LEFT COLUMN -->
                        <div class="lg:col-span-7 flex flex-col">

                            <div class="inline-flex items-center gap-2 px-3 py-1 bg-sage-100 text-forest-900 rounded-full w-fit mb-5">
                                <span class="w-2 h-2 rounded-full bg-forest-700"></span>

                                <span class="font-label-sm text-label-sm tracking-widest uppercase">
                                    Reservasi Resmi Antarkota Lampung
                                </span>
                            </div>

                            <h1 class="font-headline-xl text-headline-xl text-forest-900 tracking-tight leading-[1.15] mb-6">
                                Jelajahi Jalur Lintas Lampung dengan Tenang &amp; Pasti.
                            </h1>

                            <p class="font-body-lg text-body-lg text-ink-600 max-w-xl leading-relaxed mb-6">
                                Layanan transportasi darat terjadwal menghubungkan simpul utama: Bandar Lampung, Metro, Pringsewu, Kotabumi, Kalianda, hingga Krui Pesisir Barat dengan armada terawat Toyota HiAce dan Isuzu Elf.
                            </p>

                            <div class="flex flex-wrap items-center gap-6 pt-2">

                                <div class="flex items-center gap-2">
                                    <span class="material-symbols-outlined text-forest-700 text-[20px]">
                                        airline_seat_recline_normal
                                    </span>

                                    <span class="font-label-lg text-label-lg text-ink-900">
                                        Maks. 5 Penumpang
                                    </span>
                                </div>

                                <div class="w-1.5 h-1.5 rounded-full bg-line-200"></div>

                                <div class="flex items-center gap-2">
                                    <span class="material-symbols-outlined text-forest-700 text-[20px]">
                                        schedule
                                    </span>

                                    <span class="font-label-lg text-label-lg text-ink-900">
                                        Jadwal Pasti Setiap Hari
                                    </span>
                                </div>

                                <div class="w-1.5 h-1.5 rounded-full bg-line-200"></div>

                                <div class="flex items-center gap-2">
                                    <span class="material-symbols-outlined text-forest-700 text-[20px]">
                                        verified_user
                                    </span>

                                    <span class="font-label-lg text-label-lg text-ink-900">
                                        Tiket Terdaftar Loket
                                    </span>
                                </div>

                            </div>
                        </div>

                        <!-- RIGHT COLUMN -->
                        <div class="lg:col-span-5 relative">

                            <div class="relative bg-paper-0 p-3 rounded-xl shadow-sm">

                                <div class="relative w-full h-72 sm:h-80 overflow-hidden rounded-lg">

                                    <img
                                        class="w-full h-full object-cover"
                                        data-alt="Modern Toyota HiAce white executive travel shuttle parked by the lush green tropical roadside of Bakauheni to Bandar Lampung Trans-Sumatra highway at dawn. Editorial travel documentary photography, warm earthy ambient morning light, crisp asphalt road, rich forest greens and muted cream horizon."
                                        src="https://lh3.googleusercontent.com/aida-public/AB6AXuAGnp2mkM6-a5Q_9h0CyUM07B-Iw25UXNM2pUNZSXqvtANonuDi8TzB5h6Hvub-BOCd9syR2s8XN3qpig-l0Edn1j3AmgenvoedMAB3XcbxiptT55m5VHHkNxv_12H9CcnX8Dl5mOkH5WFZ84klKgI2_bkWllRU1Y3FMk3HNAh2SnrJXy6URx4Wx9RO-1QuL6BXlvLN6nVcS_RSF3z6OTxVGvnFRXB1B4XTWcf8sG8e"
                                    >

                                    <div class="absolute inset-0 bg-gradient-to-t from-forest-900/80 via-forest-900/20 to-transparent"></div>

                                    <div class="absolute bottom-4 left-4 right-4 flex items-end justify-between text-paper-0">

                                        <div>
                                            <span class="font-label-sm text-label-sm tracking-wider uppercase opacity-80 block mb-0.5">
                                                Armada Siap Berangkat
                                            </span>

                                            <p class="font-title-sm text-title-sm leading-snug">
                                                Toyota HiAce • Lintas Krui – Rajabasa
                                            </p>
                                        </div>

                                        <span class="font-label-sm text-label-sm px-2.5 py-1 bg-paper-0/20 backdrop-blur-md rounded text-paper-0 font-medium">
                                            Ber-AC Kabin
                                        </span>

                                    </div>
                                </div>

                                <!-- EDITORIAL BADGE -->
                                <div class="absolute -top-3 -left-3 bg-forest-900 text-paper-0 px-3.5 py-2 rounded-lg shadow-md flex items-center gap-2">

                                    <span class="material-symbols-outlined text-amber-500 text-[18px]">
                                        verified
                                    </span>

                                    <div class="flex flex-col">
                                        <span class="font-label-sm text-label-sm leading-tight font-semibold">
                                            Jalur Barat &amp; Tengah
                                        </span>

                                        <span class="text-[10px] text-paper-0/70 leading-tight">
                                            Pesisir • Dataran Tinggi
                                        </span>
                                    </div>

                                </div>

                            </div>
                        </div>

                    </div>
                </div>
            </section>

            <!-- SEARCH PANEL -->
            <section class="w-full max-w-7xl mx-auto px-6 lg:px-12 -mt-2 mb-14">

                <div class="bg-paper-0 rounded-xl p-6 lg:p-8 shadow-sm">

                    <!-- SEARCH HEADER -->
                    <div class="flex flex-col sm:flex-row sm:items-center justify-between pb-5 mb-6 bg-surface-container-low/50 -mx-6 lg:-mx-8 -mt-6 lg:-mt-8 px-6 lg:px-8 pt-5 rounded-t-xl">

                        <div class="flex items-center gap-2.5">

                            <span class="material-symbols-outlined text-forest-700 text-[22px]">
                                departure_board
                            </span>

                            <div>
                                <h2 class="font-title-md text-title-md text-forest-900 leading-tight">
                                    Pencarian Jadwal Tiket Resmi
                                </h2>

                                <p class="font-body-sm text-body-sm text-ink-600">
                                    Pilih rute antarkota dan tentukan tanggal rencana keberangkatan Anda
                                </p>
                            </div>

                        </div>

                        <div class="mt-2 sm:mt-0">
                            <span class="inline-flex items-center gap-1.5 text-[11px] font-label-sm text-forest-700 font-semibold bg-sage-100 px-2.5 py-1 rounded">
                                <span class="w-1.5 h-1.5 rounded-full bg-forest-700"></span>
                                Live Data Jadwal
                            </span>
                        </div>

                    </div>

                    <!-- SEARCH FORM -->
                    <form action="{{ route('member.cari-jadwal') }}" method="GET" class="grid grid-cols-1 md:grid-cols-12 gap-5 items-end">

                        <!-- KOTA ASAL -->
                        <div class="md:col-span-3 flex flex-col gap-1.5">

                            <label
                                class="font-label-lg text-label-lg text-ink-600 flex items-center gap-1.5"
                                for="kota_asal"
                            >
                                <span class="material-symbols-outlined text-[16px] text-forest-700">
                                    trip_origin
                                </span>
                                Kota Asal
                            </label>

                            <div class="relative">

                                <select
                                    class="w-full h-12 pl-3.5 pr-10 bg-paper-0 text-ink-900 font-body-md text-body-md rounded-lg appearance-none cursor-pointer focus:outline-none focus:ring-1 focus:ring-forest-700 shadow-sm"
                                    id="kota_asal"
                                    name="kota_asal"
                                    required
                                >
                                    <option disabled selected value="">
                                        Pilih Keberangkatan
                                    </option>
                                    @foreach ($cities ?? [] as $city)
                                        <option value="{{ $city->name }}">
                                            {{ $city->name }}
                                        </option>
                                    @endforeach
                                </select>

                                <span class="material-symbols-outlined text-ink-600 pointer-events-none absolute right-3 top-3 text-[20px]">
                                    expand_more
                                </span>

                            </div>
                        </div>

                        <!-- ICON ARAH -->
                        <div class="hidden md:flex md:col-span-1 justify-center items-center pb-2">

                            <div class="w-9 h-9 rounded-full bg-sage-100 flex items-center justify-center text-forest-700">
                                <span class="material-symbols-outlined text-[20px]">
                                    sync_alt
                                </span>
                            </div>

                        </div>

                        <!-- KOTA TUJUAN -->
                        <div class="md:col-span-3 flex flex-col gap-1.5">

                            <label
                                class="font-label-lg text-label-lg text-ink-600 flex items-center gap-1.5"
                                for="kota_tujuan"
                            >
                                <span class="material-symbols-outlined text-[16px] text-forest-700">
                                    location_on
                                </span>
                                Kota Tujuan
                            </label>

                            <div class="relative">

                                <select
                                    class="w-full h-12 pl-3.5 pr-10 bg-paper-0 text-ink-900 font-body-md text-body-md rounded-lg appearance-none cursor-pointer focus:outline-none focus:ring-1 focus:ring-forest-700 shadow-sm"
                                    id="kota_tujuan"
                                    name="kota_tujuan"
                                    required
                                >
                                    <option disabled selected value="">
                                        Pilih Tujuan Akhir
                                    </option>
                                    @foreach ($cities ?? [] as $city)
                                        <option value="{{ $city->name }}">
                                            {{ $city->name }}
                                        </option>
                                    @endforeach
                                </select>

                                <span class="material-symbols-outlined text-ink-600 pointer-events-none absolute right-3 top-3 text-[20px]">
                                    expand_more
                                </span>

                            </div>
                        </div>

                        <!-- TANGGAL KEBERANGKATAN -->
                        <div class="md:col-span-3 flex flex-col gap-1.5">

                            <label
                                class="font-label-lg text-label-lg text-ink-600 flex items-center gap-1.5"
                                for="tgl_berangkat"
                            >
                                <span class="material-symbols-outlined text-[16px] text-forest-700">
                                    calendar_today
                                </span>
                                Tanggal Keberangkatan
                            </label>

                            <div class="relative">
                                <input
                                    class="w-full h-12 px-3.5 bg-paper-0 text-ink-900 font-body-md text-body-md rounded-lg focus:outline-none focus:ring-1 focus:ring-forest-700 shadow-sm"
                                    id="tgl_berangkat"
                                    name="tgl_berangkat"
                                    type="date"
                                    min="{{ date('Y-m-d') }}"
                                    value="{{ date('Y-m-d') }}"
                                    required
                                >
                            </div>

                        </div>

                        <!-- BUTTON CARI -->
                        <div class="md:col-span-2">

                            <button
                                class="w-full h-12 bg-forest-700 hover:bg-forest-900 text-on-primary font-label-lg text-label-lg font-semibold rounded-lg flex items-center justify-center gap-2 transition-colors shadow-sm"
                                type="submit"
                            >
                                <span>Cari Jadwal</span>

                                <span class="material-symbols-outlined text-[18px]">
                                    arrow_forward
                                </span>
                            </button>

                        </div>

                    </form>

                    <!-- RUTE POPULER -->
                    <div class="mt-5 pt-4 flex flex-wrap items-center gap-2 bg-surface-container-lowest text-ink-600 font-body-sm text-body-sm">

                        <span class="font-label-sm text-label-sm font-semibold text-forest-900 uppercase tracking-wider mr-1">
                            Rute Populer:
                        </span>

                        <button
                            class="px-2.5 py-1 bg-sage-100 hover:bg-surface-variant text-forest-900 rounded font-label-sm text-label-sm transition-colors"
                            onclick="document.getElementById('kota_asal').value='Bandar Lampung'; document.getElementById('kota_tujuan').value='Krui Pesisir';"
                            type="button"
                        >
                            Bandar Lampung → Krui
                        </button>

                        <button
                            class="px-2.5 py-1 bg-sage-100 hover:bg-surface-variant text-forest-900 rounded font-label-sm text-label-sm transition-colors"
                            onclick="document.getElementById('kota_asal').value='Bandar Lampung'; document.getElementById('kota_tujuan').value='Metro';"
                            type="button"
                        >
                            Bandar Lampung → Metro
                        </button>

                        <button
                            class="px-2.5 py-1 bg-sage-100 hover:bg-surface-variant text-forest-900 rounded font-label-sm text-label-sm transition-colors"
                            onclick="document.getElementById('kota_asal').value='Kotabumi'; document.getElementById('kota_tujuan').value='Bandar Lampung';"
                            type="button"
                        >
                            Kotabumi → B. Lampung
                        </button>

                        <button
                            class="px-2.5 py-1 bg-sage-100 hover:bg-surface-variant text-forest-900 rounded font-label-sm text-label-sm transition-colors"
                            onclick="document.getElementById('kota_asal').value='Pringsewu'; document.getElementById('kota_tujuan').value='Kalianda';"
                            type="button"
                        >
                            Pringsewu → Kalianda
                        </button>

                    </div>
                </div>
            </section>
            <!-- STANDAR PELAYANAN PRIMA -->
            <section class="w-full max-w-7xl mx-auto px-6 lg:px-12 mb-16">

                <div class="bg-forest-900 text-paper-0 rounded-2xl p-8 lg:p-12 relative overflow-hidden">

                    <!-- BACKGROUND DECORATION -->
                    <div class="absolute -right-10 -bottom-10 text-[120px] font-bold text-forest-700/20 select-none pointer-events-none font-headline-xl">
                        LAMPUNG
                    </div>

                    <div class="relative z-10 grid grid-cols-1 lg:grid-cols-12 gap-8 items-center">

                        <!-- INFORMASI PELAYANAN -->
                        <div class="lg:col-span-4 flex flex-col">

                            <span class="font-label-sm text-label-sm uppercase tracking-widest text-secondary-fixed font-bold mb-2">
                                Komitmen Loket Resmi
                            </span>

                            <h2 class="font-headline-lg text-headline-lg leading-tight mb-4">
                                Standar Pelayanan Prima Setiap Keberangkatan
                            </h2>

                            <p class="font-body-md text-body-md text-paper-0/80 leading-relaxed mb-6">
                                Bukan sekadar mengantar tujuan, kami memastikan perjalanan antarkota di Lampung tetap nyaman, terhormat, dan tanpa kompromi muatan berlebih.
                            </p>

                            <div class="flex items-center gap-3">

                                <div class="w-10 h-10 rounded-full bg-forest-700 flex items-center justify-center">
                                    <span class="material-symbols-outlined text-secondary-fixed text-[20px]">
                                        support_agent
                                    </span>
                                </div>

                                <div>
                                    <span class="font-label-sm text-label-sm text-paper-0/70 block">
                                        Pusat Layanan Bantuan
                                    </span>

                                    <span class="font-title-sm text-title-sm font-semibold">
                                        0812-7890-2025
                                    </span>
                                </div>

                            </div>
                        </div>

                        <!-- PILAR PELAYANAN -->
                        <div class="lg:col-span-8 grid grid-cols-1 sm:grid-cols-3 gap-5">

                            <!-- PILAR 1 -->
                            <div class="bg-forest-700/60 p-6 rounded-xl flex flex-col justify-between backdrop-blur-sm">

                                <div>
                                    <div class="w-10 h-10 rounded-lg bg-secondary-fixed/20 text-secondary-fixed flex items-center justify-center mb-4">
                                        <span class="material-symbols-outlined text-[24px]">
                                            ac_unit
                                        </span>
                                    </div>

                                    <h3 class="font-title-sm text-title-sm font-semibold mb-2">
                                        Armada Kabin Ber-AC
                                    </h3>

                                    <p class="font-body-sm text-body-sm text-paper-0/80 leading-relaxed">
                                        Unit HiAce &amp; Elf dengan pendingin udara berkala terawat dan bebas asap rokok di seluruh perjalanan.
                                    </p>
                                </div>

                                <div class="pt-4 mt-4 bg-forest-700/40 text-[11px] font-label-sm text-secondary-fixed font-medium">
                                    Filter Kabin Higienis
                                </div>

                            </div>

                            <!-- PILAR 2 -->
                            <div class="bg-forest-700/60 p-6 rounded-xl flex flex-col justify-between backdrop-blur-sm">

                                <div>
                                    <div class="w-10 h-10 rounded-lg bg-secondary-fixed/20 text-secondary-fixed flex items-center justify-center mb-4">
                                        <span class="material-symbols-outlined text-[24px]">
                                            groups
                                        </span>
                                    </div>

                                    <h3 class="font-title-sm text-title-sm font-semibold mb-2">
                                        Batas Maks. 5 Penumpang
                                    </h3>

                                    <p class="font-body-sm text-body-sm text-paper-0/80 leading-relaxed">
                                        Kapasitas kursi dibatasi ketat maksimal 5 orang demi ruang kaki yang leluasa dan tanpa desak-desakan.
                                    </p>
                                </div>

                                <div class="pt-4 mt-4 bg-forest-700/40 text-[11px] font-label-sm text-secondary-fixed font-medium">
                                    Keleluasaan Perjalanan
                                </div>

                            </div>

                            <!-- PILAR 3 -->
                            <div class="bg-forest-700/60 p-6 rounded-xl flex flex-col justify-between backdrop-blur-sm">

                                <div>
                                    <div class="w-10 h-10 rounded-lg bg-secondary-fixed/20 text-secondary-fixed flex items-center justify-center mb-4">
                                        <span class="material-symbols-outlined text-[24px]">
                                            alarm_on
                                        </span>
                                    </div>

                                    <h3 class="font-title-sm text-title-sm font-semibold mb-2">
                                        Keberangkatan Tepat Waktu
                                    </h3>

                                    <p class="font-body-sm text-body-sm text-paper-0/80 leading-relaxed">
                                        Armada diberangkatkan tepat sesuai jadwal tiket tanpa menunggu kursi penuh di terminal atau loket.
                                    </p>
                                </div>

                                <div class="pt-4 mt-4 bg-forest-700/40 text-[11px] font-label-sm text-secondary-fixed font-medium">
                                    Jaminan Sesuai Jam
                                </div>

                            </div>

                        </div>
                    </div>
                </div>
            </section>


            <!-- LOKET INFORMASI DAN HUB OPERASIONAL -->
            <section class="w-full max-w-7xl mx-auto px-6 lg:px-12 mb-10">

                <div class="bg-paper-0 p-8 rounded-xl shadow-sm">

                    <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 items-center">

                        <!-- INFORMASI LOKET -->
                        <div class="lg:col-span-4 flex flex-col">

                            <div class="flex items-center gap-2 mb-1">
                                <span class="w-4 h-0.5 bg-forest-700"></span>

                                <span class="font-label-sm text-label-sm uppercase tracking-widest text-forest-700 font-bold">
                                    Loket Fisik Resmi
                                </span>
                            </div>

                            <h3 class="font-title-md text-title-md text-forest-900 mb-2">
                                Jaringan Loket &amp; Titik Keberangkatan
                            </h3>

                            <p class="font-body-md text-body-md text-ink-600 mb-4 leading-relaxed">
                                Selain pemesanan mandiri melalui akun member, tiket dapat divalidasi dan diambil langsung di terminal counter terdekat.
                            </p>

                            <a
                                class="inline-flex items-center gap-2 font-label-lg text-label-lg text-forest-700 font-bold hover:text-forest-900 transition-colors"
                                data-path="cari-jadwal"
                                href="#"
                            >
                                <span>Lihat Semua Jadwal Aktif Hari Ini</span>

                                <span class="material-symbols-outlined text-[18px]">
                                    east
                                </span>
                            </a>

                        </div>

                        <!-- DAFTAR LOKET -->
                        <div class="lg:col-span-8 grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-4">

                            <!-- LOKET RAJABASA -->
                            <div class="bg-surface-container-low p-4 rounded-lg">

                                <div class="flex items-center gap-2 text-forest-900 font-title-sm text-title-sm mb-1">
                                    <span class="material-symbols-outlined text-[18px] text-forest-700">
                                        place
                                    </span>

                                    Loket Rajabasa
                                </div>

                                <p class="font-body-sm text-body-sm text-ink-600 mb-2">
                                    Jl. ZA. Pagar Alam No. 42, Terminal Rajabasa, Bandar Lampung
                                </p>

                                <span class="font-label-sm text-label-sm text-forest-700 font-medium">
                                    Buka 05:30 - 21:00 WIB
                                </span>

                            </div>

                            <!-- LOKET METRO -->
                            <div class="bg-surface-container-low p-4 rounded-lg">

                                <div class="flex items-center gap-2 text-forest-900 font-title-sm text-title-sm mb-1">
                                    <span class="material-symbols-outlined text-[18px] text-forest-700">
                                        place
                                    </span>

                                    Loket Metro Pusat
                                </div>

                                <p class="font-body-sm text-body-sm text-ink-600 mb-2">
                                    Jl. Jendral Sudirman No. 18, Ganjarasri, Kota Metro
                                </p>

                                <span class="font-label-sm text-label-sm text-forest-700 font-medium">
                                    Buka 06:00 - 19:30 WIB
                                </span>

                            </div>

                            <!-- LOKET KOTABUMI -->
                            <div class="bg-surface-container-low p-4 rounded-lg">

                                <div class="flex items-center gap-2 text-forest-900 font-title-sm text-title-sm mb-1">
                                    <span class="material-symbols-outlined text-[18px] text-forest-700">
                                        place
                                    </span>

                                    Loket Kotabumi
                                </div>

                                <p class="font-body-sm text-body-sm text-ink-600 mb-2">
                                    Kompleks Terminal Induk Payan Mas, Lampung Utara
                                </p>

                                <span class="font-label-sm text-label-sm text-forest-700 font-medium">
                                    Buka 06:00 - 18:00 WIB
                                </span>

                            </div>

                        </div>
                    </div>
                </div>
            </section>

        </div>
    </main>


    <!-- FOOTER -->
    <footer class="w-full bg-paper-0 mt-space-xl">

        <div class="max-w-7xl mx-auto px-6 lg:px-12 py-12">

            <div class="grid grid-cols-1 md:grid-cols-12 gap-8 pb-10">

                <!-- BRAND -->
                <div class="md:col-span-5 flex flex-col gap-3">

                    <div class="flex items-center gap-space-sm">

                        <div class="w-8 h-8 rounded bg-forest-900 flex items-center justify-center text-paper-0">
                            <span class="material-symbols-outlined text-[18px]">
                                directions_bus
                            </span>
                        </div>

                        <span class="font-headline-sm text-headline-sm text-forest-900">
                            Trans Lampung Express
                        </span>

                    </div>

                    <p class="font-body-sm text-body-sm text-ink-600 max-w-sm leading-relaxed">
                        Layanan transportasi darat antarkota terpercaya di Provinsi Lampung. Menghubungkan kota kabupaten dengan armada eksekutif, ketepatan waktu, dan pemesanan tiket resmi.
                    </p>

                </div>

                <!-- RUTE LAYANAN -->
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

                <!-- AKSES MEMBER -->
                <div class="md:col-span-3 flex flex-col gap-2">

                    <span class="font-label-md text-label-md uppercase tracking-wider text-forest-700 font-bold mb-1">
                        Akses Member
                    </span>

                    <div class="flex flex-col gap-1.5 font-body-sm text-body-sm">

                        <a
                            class="text-on-surface-variant hover:text-forest-900 transition-colors"
                            data-path="cari-jadwal"
                            href="{{ route('member.cari-jadwal') }}"
                        >
                            Jadwal Keberangkatan
                        </a>

                        <a
                            class="text-on-surface-variant hover:text-forest-900 transition-colors"
                            data-path="riwayat-tiket"
                            href="{{ route('member.profil') }}"
                        >
                            Tiket &amp; Reservasi Saya
                        </a>

                        <a
                            class="text-on-surface-variant hover:text-forest-900 transition-colors"
                            data-path="keluhan"
                            href="{{ route('member.keluhan') }}"
                        >
                            Layanan Pengaduan &amp; Bantuan
                        </a>

                    </div>
                </div>

            </div>

            <!-- COPYRIGHT -->
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

    @include('partials.role-switcher')
</body>
</html>