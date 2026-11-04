
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Konfirmasi Pemesanan - Trans Lampung Express</title>

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
                        "outline-variant": "#c0c8c4",
                        "surface-container-lowest": "#ffffff",
                        "error-container": "#ffdad6",
                        "on-background": "#181d19",
                        "surface-container-high": "#e5e9e3",
                        "outline": "#707975",
                        "surface-tint": "#36675b",
                        "red-600": "#B94B43",
                        "surface-variant": "#dfe4dd",
                        "primary": "#0b4237",
                        "tertiary-container": "#754700",
                        "forest-700": "#285A4E",
                        "ink-900": "#202521",
                        "on-primary": "#ffffff",
                        "background": "#f6fbf4",
                        "on-tertiary-fixed": "#2b1700",
                        "line-200": "#E5E7E0",
                        "secondary-fixed": "#c4eae1",
                        "on-error-container": "#93000a",
                        "on-secondary": "#ffffff",
                        "on-error": "#ffffff",
                        "tertiary-fixed-dim": "#ffb963",
                        "surface-dim": "#d7dbd5",
                        "cream-50": "#FAF8F2",
                        "tertiary-fixed": "#ffddb9",
                        "surface-container-low": "#f0f5ee",
                        "ink-600": "#65716A",
                        "on-tertiary-fixed-variant": "#663e00",
                        "inverse-primary": "#9dd1c2",
                        "primary-container": "#285a4e",
                        "surface-container": "#ebefe8",
                        "forest-900": "#173B35",
                        "secondary-fixed-dim": "#a8cec6",
                        "primary-fixed": "#b9eddd",
                        "primary-fixed-dim": "#9dd1c2",
                        "error": "#ba1a1a",
                        "surface-bright": "#f6fbf4",
                        "secondary-container": "#c1e8df",
                        "on-surface": "#181d19",
                        "tertiary": "#553300",
                        "inverse-on-surface": "#eef2eb",
                        "paper-0": "#FFFFFF",
                        "secondary": "#42655e",
                        "on-primary-fixed": "#00201a",
                        "surface": "#f6fbf4",
                        "on-primary-fixed-variant": "#1c4f43",
                        "green-700": "#347653",
                        "on-secondary-fixed-variant": "#2a4d46",
                        "surface-container-highest": "#dfe4dd",
                        "sage-100": "#E8EFE8",
                        "on-tertiary": "#ffffff",
                        "amber-500": "#D9953D",
                        "on-secondary-fixed": "#00201b",
                        "on-primary-container": "#9ccfc0",
                        "on-secondary-container": "#466962",
                        "on-tertiary-container": "#ffb65c",
                        "inverse-surface": "#2d322d"
                    },

                    borderRadius: {
                        DEFAULT: "0.25rem",
                        lg: "0.5rem",
                        xl: "0.75rem",
                        full: "9999px"
                    },

                    spacing: {
                        "space-xs": "0.25rem",
                        "margin-sm": "1rem",
                        "gutter-sm": "1rem",
                        "space-md": "1rem",
                        margin: "2rem",
                        "space-lg": "1.5rem",
                        "space-xl": "2rem",
                        "space-sm": "0.5rem",
                        gutter: "1.5rem"
                    },

                    fontFamily: {
                        "headline-md": ['"Source Serif 4"'],
                        "headline-xl-mobile": ['"Source Serif 4"'],
                        "label-md": ["DM Sans"],
                        "headline-lg-mobile": ['"Source Serif 4"'],
                        "body-md": ["DM Sans"],
                        "headline-xl": ['"Source Serif 4"'],
                        "headline-lg": ['"Source Serif 4"'],
                        "body-sm": ["DM Sans"],
                        "numeric-price": ["DM Sans"],
                        "headline-sm": ['"Source Serif 4"'],
                        "body-lg": ["DM Sans"],
                        "label-lg": ["DM Sans"],
                        "label-sm": ["DM Sans"],
                        "title-md": ["DM Sans"],
                        "title-sm": ["DM Sans"]
                    },

                    fontSize: {
                        "headline-md": ["24px", { lineHeight: "32px", fontWeight: "600" }],
                        "headline-xl-mobile": ["30px", { lineHeight: "38px", fontWeight: "700" }],
                        "label-md": ["12px", { lineHeight: "16px", fontWeight: "500" }],
                        "headline-lg-mobile": ["24px", { lineHeight: "32px", fontWeight: "600" }],
                        "body-md": ["14px", { lineHeight: "20px", fontWeight: "400" }],
                        "headline-xl": ["40px", { lineHeight: "48px", fontWeight: "700" }],
                        "headline-lg": ["32px", { lineHeight: "40px", fontWeight: "600" }],
                        "body-sm": ["12px", { lineHeight: "18px", fontWeight: "400" }],
                        "numeric-price": ["20px", { lineHeight: "24px", fontWeight: "700" }],
                        "headline-sm": ["20px", { lineHeight: "28px", fontWeight: "600" }],
                        "label-lg": ["14px", { lineHeight: "20px", fontWeight: "500" }],
                        "label-sm": ["11px", { lineHeight: "14px", fontWeight: "600" }],
                        "title-md": ["18px", { lineHeight: "26px", fontWeight: "600" }],
                        "title-sm": ["16px", { lineHeight: "24px", fontWeight: "600" }]
                    }
                }
            }
        };
    </script>
</head>

<body class="bg-cream-50 font-body-md text-on-surface antialiased">

    <!-- HEADER -->
    <header class="fixed top-0 w-full z-50 bg-cream-50/90 backdrop-blur-xl shadow-[0_1px_8px_rgba(23,59,53,0.04)]">
        <div class="h-20 max-w-7xl mx-auto px-6 lg:px-12 flex items-center justify-between">

            <div class="flex items-center gap-8">
                <a class="flex items-center gap-3 decoration-transparent" href="{{ route('member.beranda') }}">
                    <div class="w-10 h-10 rounded-lg bg-forest-700 flex items-center justify-center text-on-primary font-headline-md font-bold">
                        <span class="material-symbols-outlined text-[22px]">directions_bus</span>
                    </div>

                    <div class="flex flex-col">
                        <span class="font-headline-sm text-headline-sm text-forest-900 tracking-tight leading-none">
                            Trans Lampung
                        </span>
                        <span class="font-label-sm text-label-sm text-ink-600 tracking-widest uppercase mt-0.5">
                            Express Shuttle
                        </span>
                    </div>
                </a>

                <nav class="hidden md:flex items-center gap-2 p-1">
                    <a href="{{ route('member.beranda') }}"
                       class="px-3 py-2 rounded-lg font-label-lg text-label-lg text-on-surface-variant hover:text-on-surface transition-colors">
                        Beranda
                    </a>

                    <a href="{{ route('member.cari-jadwal') }}"
                       class="px-3 py-2 rounded-lg font-label-lg text-label-lg text-on-surface-variant hover:text-on-surface transition-colors">
                        Cari Jadwal
                    </a>

                    <a href="#"
                       class="px-3 py-2 rounded-lg font-label-lg text-label-lg text-on-surface-variant hover:text-on-surface transition-colors">
                        Keluhan
                    </a>
                </nav>
            </div>

            <div class="flex items-center gap-4">
                <div class="hidden sm:flex flex-col text-right">
                    <span class="font-label-sm text-label-sm text-ink-600">
                        Member Terdaftar
                    </span>
                    <span class="font-title-sm text-title-sm text-forest-900">
                        Halo, Bambang Hermanto
                    </span>
                </div>

                <div class="w-8 h-8 rounded-full bg-primary flex items-center justify-center">
                    <span class="material-symbols-outlined text-on-primary text-[18px]">
                        person
                    </span>
                </div>
            </div>
        </div>
    </header>

    <!-- MAIN CONTENT -->
    <main class="w-full pt-20 bg-cream-50 min-h-screen">
        <div class="flex flex-col w-full">
            <div class="max-w-7xl mx-auto w-full px-6 lg:px-12 py-8 space-y-8">

                <!-- BAGIAN ATAS -->
                <div class="flex flex-col gap-6">

                    <!-- BREADCRUMB & STEPPER -->
                    <nav aria-label="Alur Pemesanan" class="w-full">
                        <ol class="flex flex-wrap items-center gap-2 sm:gap-4 font-label-md text-label-md">

                            <li class="flex items-center gap-2 text-forest-700">
                                <span class="w-6 h-6 rounded-full bg-forest-700 text-on-primary flex items-center justify-center font-bold text-[11px]">
                                    <span class="material-symbols-outlined text-[14px]">check</span>
                                </span>
                                <span class="font-semibold">1. Pilih Jadwal</span>
                            </li>

                            <li class="text-outline-variant flex items-center">
                                <span class="material-symbols-outlined text-[18px]">chevron_right</span>
                            </li>

                            <li class="flex items-center gap-2 text-forest-700">
                                <span class="w-6 h-6 rounded-full bg-forest-700 text-on-primary flex items-center justify-center font-bold text-[11px]">
                                    <span class="material-symbols-outlined text-[14px]">check</span>
                                </span>
                                <span class="font-semibold">2. Pilih Kursi</span>
                            </li>

                            <li class="text-outline-variant flex items-center">
                                <span class="material-symbols-outlined text-[18px]">chevron_right</span>
                            </li>

                            <li class="flex items-center gap-2 text-forest-900">
                                <span class="w-6 h-6 rounded-full bg-secondary-container text-on-secondary-container flex items-center justify-center font-bold text-[11px]">
                                    3
                                </span>
                                <span class="font-semibold bg-secondary-container/60 px-2.5 py-1 rounded">
                                    3. Ringkasan &amp; Konfirmasi
                                </span>
                            </li>
                        </ol>
                    </nav>

                    <!-- JUDUL HALAMAN -->
                    <div class="flex flex-col md:flex-row md:items-end justify-between gap-4 pb-2">
                        <div class="space-y-1">
                            <span class="font-label-sm text-label-sm uppercase tracking-wider text-ink-600">
                                Verifikasi Tiket Penumpang
                            </span>

                            <h1 class="font-headline-lg text-headline-lg text-forest-900 tracking-tight">
                                Konfirmasi Rincian Pemesanan Tiket
                            </h1>

                            <p class="font-body-md text-body-md text-ink-600 max-w-2xl">
                                Periksa kembali data perjalanan, nomor kursi, dan identitas sebelum data tersimpan ke sistem loket.
                            </p>
                        </div>

                        <div class="inline-flex items-center gap-2 bg-sage-100 px-3.5 py-2 rounded-lg self-start md:self-auto">
                            <span class="material-symbols-outlined text-forest-700 text-[18px]">
                                verified_user
                            </span>

                            <span class="font-label-sm text-label-sm text-forest-900 font-medium">
                                Data Terverifikasi Sesuai Akun Member
                            </span>
                        </div>
                    </div>
                </div>

                <!-- LAYOUT UTAMA -->
                <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 items-start">

                    <!-- KOLOM KIRI -->
                    <div class="lg:col-span-8 flex flex-col gap-6">

                        <!-- KARTU RINCIAN TRAYEK -->
                        <section class="bg-paper-0 rounded-xl p-6 sm:p-8 shadow-sm space-y-6">

                            <div class="flex items-center justify-between pb-4">
                                <div class="flex items-center gap-3">
                                    <div class="w-9 h-9 rounded-lg bg-surface-container flex items-center justify-center text-forest-700">
                                        <span class="material-symbols-outlined text-[20px]">alt_route</span>
                                    </div>

                                    <div>
                                        <h2 class="font-title-md text-title-md text-forest-900">
                                            Rincian Trayek &amp; Waktu
                                        </h2>
                                        <span class="font-label-sm text-label-sm text-ink-600">
                                            Entitas jadwal &amp; kota keberangkatan
                                        </span>
                                    </div>
                                </div>

                                <span class="bg-sage-100 text-forest-900 font-label-sm text-label-sm px-2.5 py-1 rounded">
                                    Reguler Shuttle
                                </span>
                            </div>

                            <!-- VISUAL RUTE -->
                            <div class="bg-surface-container-low rounded-xl p-5 flex flex-col sm:flex-row sm:items-center justify-between gap-6">

                                <div class="flex-1 space-y-1">
                                    <span class="font-label-sm text-label-sm text-ink-600 uppercase tracking-wider">
                                        Kota Asal (Origin)
                                    </span>

                                    <p class="font-title-md text-title-md text-forest-900 font-semibold">
                                        Bandar Lampung
                                    </p>

                                    <div class="inline-flex items-center gap-1.5 text-ink-600 font-body-sm text-body-sm">
                                        <span class="material-symbols-outlined text-[16px] text-forest-700">
                                            meeting_room
                                        </span>
                                        <span>Pool Rajabasa / Loket Utama</span>
                                    </div>
                                </div>

                                <div class="flex sm:flex-col items-center justify-center gap-1 px-4">
                                    <span class="font-label-sm text-label-sm text-forest-700 font-semibold">
                                        Rute Lintas
                                    </span>

                                    <div class="hidden sm:flex items-center gap-1 text-outline-variant">
                                        <span class="h-0.5 w-8 bg-line-200"></span>
                                        <span class="material-symbols-outlined text-[18px] text-forest-700">
                                            directions_bus
                                        </span>
                                        <span class="h-0.5 w-8 bg-line-200"></span>
                                    </div>

                                    <span class="font-label-sm text-label-sm text-ink-600 sm:hidden">
                                        Menuju
                                    </span>
                                </div>

                                <div class="flex-1 sm:text-right space-y-1">
                                    <span class="font-label-sm text-label-sm text-ink-600 uppercase tracking-wider">
                                        Kota Tujuan (Destination)
                                    </span>

                                    <p class="font-title-md text-title-md text-forest-900 font-semibold">
                                        Krui
                                    </p>

                                    <div class="inline-flex items-center sm:justify-end gap-1.5 text-ink-600 font-body-sm text-body-sm">
                                        <span class="material-symbols-outlined text-[16px] text-forest-700">
                                            pin_drop
                                        </span>
                                        <span>Pesisir Barat / Pool Pasar Krui</span>
                                    </div>
                                </div>
                            </div>

                            <!-- WAKTU & ARMADA -->
                            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 pt-2">

                                <div class="bg-cream-50 rounded-lg p-4 space-y-2">
                                    <div class="flex items-center gap-2 text-ink-600 font-label-md text-label-md">
                                        <span class="material-symbols-outlined text-[18px] text-forest-700">
                                            calendar_month
                                        </span>
                                        <span>Waktu Keberangkatan</span>
                                    </div>

                                    <p class="font-title-sm text-title-sm text-forest-900">
                                        Kamis, 24 Oktober 2024
                                    </p>

                                    <p class="font-body-md text-body-md text-ink-900 font-medium">
                                        08:00 WIB
                                        <span class="font-label-sm text-label-sm text-ink-600 font-normal">
                                            (Pagi)
                                        </span>
                                    </p>
                                </div>

                                <div class="bg-cream-50 rounded-lg p-4 space-y-2">
                                    <div class="flex items-center gap-2 text-ink-600 font-label-md text-label-md">
                                        <span class="material-symbols-outlined text-[18px] text-forest-700">
                                            airport_shuttle
                                        </span>
                                        <span>Armada &amp; Registrasi</span>
                                    </div>

                                    <p class="font-title-sm text-title-sm text-forest-900">
                                        Toyota HiAce Commuter
                                    </p>

                                    <div class="flex items-center gap-2 font-body-sm text-body-sm text-ink-600">
                                        <span class="bg-surface-container px-2 py-0.5 rounded font-mono font-semibold text-forest-900">
                                            BE 7012 AA
                                        </span>
                                        <span>•</span>
                                        <span>Warna Silver</span>
                                    </div>
                                </div>
                            </div>
                        </section>

                        <!-- KARTU DATA KURSI & PENUMPANG -->
                        <section class="bg-paper-0 rounded-xl p-6 sm:p-8 shadow-sm space-y-6">

                            <div class="flex items-center justify-between pb-4">
                                <div class="flex items-center gap-3">
                                    <div class="w-9 h-9 rounded-lg bg-surface-container flex items-center justify-center text-forest-700">
                                        <span class="material-symbols-outlined text-[20px]">
                                            airline_seat_recline_extra
                                        </span>
                                    </div>

                                    <div>
                                        <h2 class="font-title-md text-title-md text-forest-900">
                                            Data Kursi &amp; Identitas Penumpang
                                        </h2>
                                        <span class="font-label-sm text-label-sm text-ink-600">
                                            Entitas member &amp; alokasi kursi pesanan
                                        </span>
                                    </div>
                                </div>

                                <span class="bg-secondary-container text-on-secondary-container font-label-sm text-label-sm px-2.5 py-1 rounded font-semibold">
                                    Terkonfirmasi
                                </span>
                            </div>

                            <div class="grid grid-cols-1 md:grid-cols-3 gap-4">

                                <!-- KURSI TERPILIH -->
                                <div class="bg-surface-container-low rounded-xl p-4 flex flex-col justify-between space-y-3">
                                    <div class="space-y-1">
                                        <span class="font-label-sm text-label-sm text-ink-600">
                                            Nomor Kursi Terpilih
                                        </span>

                                        <div class="flex items-baseline gap-2">
                                            <span class="font-headline-lg text-headline-lg text-forest-700">
                                                Kursi 3
                                            </span>
                                        </div>
                                    </div>

                                    <div class="pt-2">
                                        <div class="flex items-center justify-between font-label-sm text-label-sm text-ink-600 mb-1">
                                            <span>Kapasitas Kabin</span>
                                            <span class="font-medium text-forest-900">1 dari 5 Kursi</span>
                                        </div>

                                        <div class="w-full bg-surface-container h-2 rounded-full overflow-hidden">
                                            <div class="bg-forest-700 h-full w-1/5 rounded-full"></div>
                                        </div>
                                    </div>
                                </div>

                                <!-- IDENTITAS PENUMPANG -->
                                <div class="md:col-span-2 bg-cream-50 rounded-xl p-5 space-y-4">
                                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">

                                        <div>
                                            <span class="font-label-sm text-label-sm text-ink-600 block">
                                                Nama Pemesan (member.nama)
                                            </span>

                                            <p class="font-title-sm text-title-sm text-forest-900 mt-0.5">
                                                Bambang Hermanto
                                            </p>
                                        </div>

                                        <div>
                                            <span class="font-label-sm text-label-sm text-ink-600 block">
                                                Nomor Telepon (member.telepon)
                                            </span>

                                            <p class="font-title-sm text-title-sm text-forest-900 mt-0.5 font-mono">
                                                081234567890
                                            </p>
                                        </div>
                                    </div>

                                    <div>
                                        <span class="font-label-sm text-label-sm text-ink-600 block">
                                            Alamat Tinggal / Jemput (member.alamat)
                                        </span>

                                        <p class="font-body-md text-body-md text-ink-900 mt-0.5 leading-relaxed">
                                            Jl. Raden Intan No. 45, Enggal, Kota Bandar Lampung
                                        </p>
                                    </div>
                                </div>
                            </div>

                            <!-- INFORMASI STATUS TRANSAKSI -->
                            <div class="bg-sage-100/70 rounded-xl p-4 sm:p-5 flex items-start gap-3.5">
                                <span class="material-symbols-outlined text-forest-700 text-[20px] mt-0.5 shrink-0">
                                    info
                                </span>

                                <div class="space-y-1">
                                    <h3 class="font-title-sm text-title-sm text-forest-900">
                                        Transparansi Status Transaksi
                                    </h3>

                                    <p class="font-body-sm text-body-sm text-ink-600 leading-normal">
                                        Sistem tidak menggunakan nomor tiket acak. Saat tombol simpan diklik, pesanan Anda akan langsung diberi nomor referensi resmi
                                        <span class="font-semibold text-forest-900">id_pesan</span>
                                        dalam basis data Trans Lampung. Status awal otomatis tercatat sebagai
                                        <span class="inline-block bg-amber-500/15 text-tertiary-container font-semibold px-2 py-0.5 rounded text-[11px]">
                                            Belum Bayar
                                        </span>
                                        sesuai ketentuan alur operasional loket.
                                    </p>
                                </div>
                            </div>
                        </section>
                    </div>

                    <!-- KOLOM KANAN -->
                    <div class="lg:col-span-4 flex flex-col gap-6 sticky top-28">

                        <!-- KARTU TAGIHAN -->
                        <div class="bg-paper-0 rounded-xl p-6 sm:p-8 shadow-sm space-y-6">

                            <div class="flex items-center justify-between pb-3">
                                <h2 class="font-title-md text-title-md text-forest-900">
                                    Rincian Pembayaran
                                </h2>

                                <span class="font-label-sm text-label-sm text-ink-600">
                                    Mata Uang IDR
                                </span>
                            </div>

                            <!-- KOMPONEN BIAYA -->
                            <div class="space-y-3 font-body-md text-body-md text-ink-600">

                                <div class="flex items-center justify-between">
                                    <span>Tarif Tiket Perjalanan</span>
                                    <span class="font-medium text-forest-900">Rp 120.000</span>
                                </div>

                                <div class="flex items-center justify-between">
                                    <span>Biaya Pemilihan Kursi</span>
                                    <span class="text-green-700 font-medium">Rp 0 (Bebas Biaya)</span>
                                </div>

                                <div class="flex items-center justify-between text-body-sm">
                                    <span>Biaya Administrasi</span>
                                    <span class="text-green-700 font-medium">Rp 0</span>
                                </div>

                                <div class="pt-3">
                                    <div class="bg-surface-container h-px w-full my-1"></div>
                                </div>

                                <div class="flex items-baseline justify-between pt-1">
                                    <div>
                                        <span class="font-title-sm text-title-sm text-forest-900 block">
                                            Total Tagihan
                                        </span>

                                        <span class="font-label-sm text-label-sm text-ink-600">
                                            Tarif resmi (jadwal.harga)
                                        </span>
                                    </div>

                                    <div class="text-right">
                                        <span class="font-headline-md text-headline-md text-forest-900 font-bold tracking-tight">
                                            Rp 120.000
                                        </span>
                                    </div>
                                </div>
                            </div>

                            <!-- LANGKAH SELANJUTNYA -->
                            <div class="bg-cream-50 rounded-lg p-4 space-y-2">
                                <div class="flex items-center gap-1.5 text-forest-700 font-label-md text-label-md font-semibold">
                                    <span class="material-symbols-outlined text-[16px]">
                                        help_outline
                                    </span>
                                    <span>Langkah Selanjutnya</span>
                                </div>

                                <p class="font-body-sm text-body-sm text-ink-600 leading-relaxed">
                                    Setelah memesan, Anda akan mendapatkan
                                    <strong class="text-forest-900">ID Pesan</strong>
                                    resmi dan dapat langsung mengisi formulir
                                    <span class="text-forest-900 font-medium">Konfirmasi Pembayaran</span>
                                    dengan menginputkan
                                    <code class="text-forest-900 font-mono text-[11px] bg-surface-container px-1 py-0.5 rounded">no_resi</code>
                                    dan
                                    <code class="text-forest-900 font-mono text-[11px] bg-surface-container px-1 py-0.5 rounded">no_rek</code>
                                    transfer bank.
                                </p>
                            </div>

                            <!-- FORM PEMESANAN -->
                            <form class="space-y-3 pt-2" id="formRingkasanPesan" onsubmit="handleKonfirmasiPesanan(event)">
                                @csrf

                                <input name="id_jadwal" type="hidden" value="JDW-202410-004">
                                <input name="no_kursi" type="hidden" value="3">
                                <input name="id_member" type="hidden" value="MBR-0081">
                                <input name="total_harga" type="hidden" value="120000">

                                <button
                                    class="w-full bg-forest-700 hover:bg-forest-900 text-on-primary font-label-lg text-label-lg py-3.5 px-6 rounded-lg font-semibold flex items-center justify-center gap-2 transition-all shadow-sm active:scale-[0.99] cursor-pointer"
                                    id="btnSubmitPesan"
                                    type="submit"
                                >
                                    <span>Buat Pemesanan Sekarang</span>
                                    <span class="material-symbols-outlined text-[18px]">arrow_forward</span>
                                </button>

                                <a
                                    class="w-full bg-transparent hover:bg-sage-100 text-forest-900 font-label-lg text-label-lg py-3 px-4 rounded-lg font-medium flex items-center justify-center gap-1.5 transition-colors"
                                    href="{{ route('member.pilih-kursi') }}"
                                >
                                    <span class="material-symbols-outlined text-[18px]">arrow_back</span>
                                    <span>Ubah Nomor Kursi</span>
                                </a>
                            </form>

                            <div class="text-center">
                                <span class="font-label-sm text-label-sm text-ink-600 flex items-center justify-center gap-1.5">
                                    <span class="material-symbols-outlined text-[14px] text-green-700">
                                        lock
                                    </span>
                                    Transaksi aman terhubung langsung ke loket cabang
                                </span>
                            </div>
                        </div>

                        <!-- BANTUAN LOKET -->
                        <div class="bg-surface-container-low rounded-xl p-5 space-y-2">
                            <span class="font-label-sm text-label-sm uppercase tracking-wider text-forest-700 font-semibold">
                                Layanan Bantuan Loket
                            </span>

                            <p class="font-body-sm text-body-sm text-ink-600">
                                Butuh penjemputan khusus di titik lintas jalan raya? Hubungi dispatcher Pool Rajabasa sebelum jam keberangkatan.
                            </p>

                            <div class="pt-1 flex items-center gap-2 text-forest-900 font-label-md text-label-md font-semibold">
                                <span class="material-symbols-outlined text-[16px] text-forest-700">
                                    call
                                </span>
                                <span>(0721) 703456 • Pool Rajabasa</span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- MODAL NOTIFIKASI PEMESANAN -->
                <div
                    class="fixed inset-0 bg-ink-900/40 backdrop-blur-sm z-50 hidden flex items-center justify-center p-4"
                    id="modalNotifikasiPesan"
                >
                    <div class="bg-paper-0 rounded-2xl max-w-md w-full p-6 sm:p-8 space-y-6 shadow-xl animate-in fade-in zoom-in duration-200">

                        <div class="w-12 h-12 rounded-full bg-secondary-container text-forest-700 flex items-center justify-center">
                            <span class="material-symbols-outlined text-[28px]">
                                check_circle
                            </span>
                        </div>

                        <div class="space-y-2">
                            <span class="font-label-sm text-label-sm uppercase tracking-wider text-forest-700 font-semibold">
                                Pemesanan Berhasil Disimpan
                            </span>

                            <h3 class="font-headline-sm text-headline-sm text-forest-900">
                                ID Pesan: #PSN-202410-098
                            </h3>

                            <p class="font-body-md text-body-md text-ink-600">
                                Pemesanan Anda telah tersimpan dengan status
                                <span class="font-semibold text-tertiary-container bg-amber-500/15 px-1.5 py-0.5 rounded">
                                    Belum Bayar
                                </span>.
                                Silakan lanjutkan ke menu Konfirmasi Pembayaran untuk melengkapi data nomor resi transfer.
                            </p>
                        </div>

                        <div class="bg-cream-50 p-4 rounded-xl space-y-1.5 font-body-sm text-body-sm">

                            <div class="flex justify-between text-ink-600">
                                <span>Rute Perjalanan</span>
                                <span class="font-semibold text-forest-900">
                                    Bandar Lampung → Krui
                                </span>
                            </div>

                            <div class="flex justify-between text-ink-600">
                                <span>Nomor Kursi</span>
                                <span class="font-semibold text-forest-900">Kursi 3</span>
                            </div>

                            <div class="flex justify-between text-ink-600">
                                <span>Total Tagihan</span>
                                <span class="font-semibold text-forest-900">Rp 120.000</span>
                            </div>
                        </div>

                        <div class="flex flex-col gap-2 pt-2">
                            <a
                                class="w-full bg-forest-700 hover:bg-forest-900 text-on-primary font-label-lg text-label-lg py-3 rounded-lg font-semibold text-center transition-colors"
                                href="#"
                            >
                                Menuju Konfirmasi Pembayaran →
                            </a>

                            <button
                                class="w-full py-2.5 text-ink-600 hover:text-forest-900 font-label-md text-label-md transition-colors"
                                onclick="closeModalPesan()"
                                type="button"
                            >
                                Tutup Dialog
                            </button>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </main>

    <!-- FOOTER -->
    <footer class="w-full bg-surface-container-low py-12 mt-16 shadow-[0_1px_8px_rgba(23,59,53,0.03)]">
        <div class="max-w-7xl mx-auto px-6 lg:px-12">

            <div class="grid grid-cols-1 md:grid-cols-4 gap-8 mb-8">

                <!-- BRAND -->
                <div class="space-y-3">
                    <div class="flex items-center gap-2">
                        <div class="w-7 h-7 rounded bg-forest-700 flex items-center justify-center text-on-primary">
                            <span class="material-symbols-outlined text-[16px]">
                                directions_bus
                            </span>
                        </div>

                        <span class="font-headline-sm text-headline-sm text-forest-900">
                            Trans Lampung
                        </span>
                    </div>

                    <p class="font-body-sm text-body-sm text-ink-600">
                        Layanan transportasi antar-kota reguler dan shuttle eksekutif terpercaya di seluruh wilayah Provinsi Lampung.
                    </p>
                </div>

                <!-- RUTE -->
                <div>
                    <h4 class="font-title-sm text-title-sm text-forest-900 mb-3">
                        Layanan Rute
                    </h4>

                    <ul class="space-y-2 font-body-sm text-body-sm text-ink-600">
                        <li>Bandar Lampung – Metro</li>
                        <li>Bandar Lampung – Pringsewu</li>
                        <li>Bandar Lampung – Kotabumi</li>
                        <li>Bakauheni – Bandar Lampung</li>
                    </ul>
                </div>

                <!-- BANTUAN -->
                <div>
                    <h4 class="font-title-sm text-title-sm text-forest-900 mb-3">
                        Bantuan &amp; Layanan
                    </h4>

                    <ul class="space-y-2 font-body-sm text-body-sm text-ink-600">
                        <li>Syarat &amp; Ketentuan Tiket</li>
                        <li>Prosedur Pengembalian Dana</li>
                        <li>Pengaduan Layanan</li>
                        <li>Loket &amp; Titik Kumpul</li>
                    </ul>
                </div>

                <!-- KONTAK -->
                <div>
                    <h4 class="font-title-sm text-title-sm text-forest-900 mb-3">
                        Pusat Bantuan
                    </h4>

                    <p class="font-body-sm text-body-sm text-ink-600 mb-2">
                        Terminal Rajabasa &amp; Pool Way Halim, Bandar Lampung
                    </p>

                    <p class="font-label-md text-label-md text-forest-700 font-semibold">
                        WhatsApp: +62 821-7788-9900
                    </p>

                    <p class="font-body-sm text-body-sm text-ink-600">
                        Jam Operasional: 05:00 - 21:00 WIB
                    </p>
                </div>
            </div>

            <!-- COPYRIGHT -->
            <div class="pt-8 flex flex-col sm:flex-row items-center justify-between gap-4 font-body-sm text-body-sm text-ink-600">
                <p>© 2025 PT Trans Lampung Express. Hak cipta dilindungi.</p>

                <div class="flex items-center gap-6">
                    <span class="font-label-md text-label-md">
                        Amanah • Tepat Waktu • Nyaman
                    </span>
                </div>
            </div>
        </div>
    </footer>

    <!-- JAVASCRIPT -->
    <script>
        function handleKonfirmasiPesanan(event) {
            event.preventDefault();

            const button = document.getElementById("btnSubmitPesan");
            const modal = document.getElementById("modalNotifikasiPesan");

            if (!button || !modal) {
                return;
            }

            button.disabled = true;

            button.innerHTML = `
                <span class="material-symbols-outlined text-[18px] animate-spin">
                    refresh
                </span>
                <span>Memproses Pemesanan...</span>
            `;

            setTimeout(() => {
                button.disabled = false;

                button.innerHTML = `
                    <span>Buat Pemesanan Sekarang</span>
                    <span class="material-symbols-outlined text-[18px]">
                        arrow_forward
                    </span>
                `;

                modal.classList.remove("hidden");
            }, 700);
        }

        function closeModalPesan() {
            const modal = document.getElementById("modalNotifikasiPesan");

            if (modal) {
                modal.classList.add("hidden");
            }
        }
    </script>

</body>
</html>
