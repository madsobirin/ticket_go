
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pilih Kursi - Trans Lampung Express</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    <link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;600;700&family=Source+Serif+4:wght@400;500;600;700&display=swap" rel="stylesheet">

    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined" rel="stylesheet">

    <script src="https://cdn.tailwindcss.com"></script>

    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        "forest-700": "#285A4E",
                        "forest-900": "#173B35",
                        "cream-50": "#FAF8F2",
                        "ink-900": "#202521",
                        "ink-600": "#65716A",
                        "sage-100": "#E8EFE8",
                        "paper-0": "#FFFFFF",
                        "amber-500": "#D9953D",
                    },
                    fontFamily: {
                        headline: ["Source Serif 4", "serif"],
                        body: ["DM Sans", "sans-serif"],
                    }
                }
            }
        };
    </script>

    <style>
        html, body {
            margin: 0;
            padding: 0;
        }

        body {
            overscroll-behavior: none;
        }

        ::-webkit-scrollbar {
            display: none;
        }

        .seat-choice {
            min-height: 112px;
        }
    </style>
</head>

<body class="bg-cream-50 font-body text-ink-900 antialiased">

    <!-- HEADER -->
    <header class="fixed top-0 w-full z-50 bg-cream-50/90 backdrop-blur-xl shadow-sm">
        <div class="h-20 max-w-7xl mx-auto px-6 lg:px-12 flex items-center justify-between">

            <div class="flex items-center gap-8">
                <a href="{{ route('member.beranda') }}" class="flex items-center gap-3">
                    <div class="w-10 h-10 rounded-lg bg-forest-700 flex items-center justify-center text-white">
                        <span class="material-symbols-outlined">directions_bus</span>
                    </div>

                    <div class="flex flex-col">
                        <span class="font-headline text-xl font-bold text-forest-900 leading-none">
                            Trans Lampung
                        </span>
                        <span class="text-[11px] text-ink-600 tracking-widest uppercase mt-1">
                            Express Shuttle
                        </span>
                    </div>
                </a>

                <nav class="hidden md:flex items-center gap-2">
                    <a href="{{ route('member.beranda') }}" class="px-3 py-2 rounded-lg text-sm text-ink-600 hover:text-forest-900">
                        Beranda
                    </a>

                    <a href="{{ route('member.cari-jadwal') }}" class="px-3 py-2 rounded-lg text-sm text-ink-600 hover:text-forest-900">
                        Cari Jadwal
                    </a>

                    <a href="{{ route('member.keluhan') }}" class="px-3 py-2 rounded-lg text-sm text-ink-600 hover:text-forest-900">
                        Keluhan
                    </a>
                </nav>
            </div>

            <div class="flex items-center gap-4">
                <div class="hidden sm:flex flex-col text-right">
                    <span class="text-xs text-ink-600">Member Terdaftar</span>
                    <a href="{{ route('member.profil') }}" class="text-sm font-semibold text-forest-900 hover:text-forest-700 transition-colors">
                        Halo, Bambang Hermanto
                    </a>
                </div>

                <a href="{{ route('member.profil') }}" class="w-8 h-8 rounded-full bg-forest-700 flex items-center justify-center text-white ring-2 ring-forest-700/20 hover:ring-forest-700 transition-all" title="Profil Pelanggan">
                    <span class="material-symbols-outlined text-lg">person</span>
                </a>
            </div>
        </div>
    </header>

    <main class="w-full pt-20 min-h-screen">
        <div class="max-w-7xl mx-auto w-full px-6 lg:px-12 py-8 space-y-8">

            <!-- BREADCRUMB -->
            <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
                <nav class="flex items-center gap-2 text-sm text-ink-600">
                    <a href="{{ route('member.beranda') }}" class="hover:text-forest-900">
                        Beranda
                    </a>

                    <span class="material-symbols-outlined text-sm">chevron_right</span>

                    <a href="{{ route('member.cari-jadwal') }}" class="hover:text-forest-900">
                        Cari Jadwal
                    </a>

                    <span class="material-symbols-outlined text-sm">chevron_right</span>

                    <span class="text-forest-900 font-semibold">Pilih Kursi</span>
                </nav>

                <div class="inline-flex items-center gap-2 bg-sage-100 px-3.5 py-1.5 rounded-full text-sm text-forest-900">
                    <span class="w-2 h-2 rounded-full bg-forest-700 animate-pulse"></span>
                    Langkah 2 dari 3: Konfigurasi Kabin
                </div>
            </div>

            <!-- INFORMASI PERJALANAN -->
            <section class="bg-white rounded-xl shadow-sm overflow-hidden">

                <div class="bg-forest-900 text-white px-6 py-4 flex flex-col md:flex-row md:items-center md:justify-between gap-4">

                    <div class="flex items-center gap-3">
                        <div class="w-9 h-9 rounded-lg bg-forest-700 flex items-center justify-center">
                            <span class="material-symbols-outlined">directions_bus</span>
                        </div>

                        <div>
                            <div class="flex items-center gap-2">
                                <span class="font-headline text-xl font-semibold">Rajabasa (TKG)</span>
                                <span class="material-symbols-outlined text-amber-500">arrow_forward</span>
                                <span class="font-headline text-xl font-semibold">Krui (PSB)</span>
                            </div>

                            <span class="text-xs text-green-200 uppercase tracking-wider">
                                Lintas Barat Trans Sumatra • Shuttle Reguler
                            </span>
                        </div>
                    </div>

                    <div class="flex flex-wrap items-center gap-6 text-sm">
                        <div class="flex items-center gap-2">
                            <span class="material-symbols-outlined text-amber-500">calendar_today</span>
                            Kamis, 24 Oktober 2024
                        </div>

                        <div class="flex items-center gap-2">
                            <span class="material-symbols-outlined text-amber-500">schedule</span>
                            08:00 WIB
                        </div>
                    </div>
                </div>

                <div class="px-6 py-3.5 bg-gray-50 flex flex-wrap items-center justify-between gap-4 text-sm text-ink-600">
                    <div class="flex items-center gap-2">
                        <span class="material-symbols-outlined text-forest-700">airport_shuttle</span>
                        <span class="font-medium text-ink-900">Armada:</span>
                        Toyota HiAce Commuter (BE 7012 AA, Silver)
                    </div>

                    <div class="flex flex-wrap items-center gap-4">
                        <span class="flex items-center gap-1 text-forest-700 font-medium">
                            <span class="material-symbols-outlined text-base">airline_seat_recline_normal</span>
                            Kapasitas Resmi: 5 Penumpang
                        </span>

                        <span class="text-green-700 flex items-center gap-1">
                            <span class="material-symbols-outlined text-base">verified</span>
                            Tarif Flat Standar Loket
                        </span>
                    </div>
                </div>
            </section>

            <!-- AREA PEMILIHAN KURSI -->
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 items-start">

                <section class="lg:col-span-7 bg-white rounded-xl p-6 sm:p-8 shadow-sm space-y-8">

                    <div>
                        <h1 class="font-headline text-2xl font-semibold text-forest-900">
                            Tentukan Posisi Duduk di Kabin
                        </h1>

                        <p class="text-sm text-ink-600 mt-1">
                            Pilih satu posisi kursi dari kapasitas 5 penumpang yang tersedia.
                            Tata letak sesuai konfigurasi asli kendaraan.
                        </p>
                    </div>

                    <!-- LEGENDA KURSI -->
                    <div class="flex flex-wrap items-center gap-6 p-3.5 bg-gray-50 rounded-lg text-sm">

                        <div class="flex items-center gap-2">
                            <div class="w-6 h-6 rounded bg-white shadow-sm flex items-center justify-center text-xs">1</div>
                            Tersedia
                        </div>

                        <div class="flex items-center gap-2">
                            <div class="w-6 h-6 rounded bg-forest-700 text-white flex items-center justify-center">
                                <span class="material-symbols-outlined text-sm">check</span>
                            </div>
                            <span class="font-semibold text-forest-900">Pilihan Anda</span>
                        </div>

                        <div class="flex items-center gap-2">
                            <div class="w-6 h-6 rounded bg-gray-300 flex items-center justify-center text-gray-600">
                                <span class="material-symbols-outlined text-sm">block</span>
                            </div>
                            Terisi / Terkunci
                        </div>
                    </div>

                    <!-- DENAH KABIN -->
                    <div class="relative max-w-md mx-auto bg-cream-50 rounded-2xl p-6 shadow-sm">

                        <div class="flex flex-col items-center justify-center pb-6 space-y-2">
                            <div class="w-24 h-2 rounded-full bg-forest-700/20"></div>

                            <div class="flex items-center gap-2 text-ink-600 text-xs uppercase tracking-widest">
                                <span class="material-symbols-outlined text-forest-700">expand_less</span>
                                Arah Depan Kendaraan
                            </div>
                        </div>

                        <!-- BARIS DEPAN -->
                        <div class="bg-white rounded-xl p-4 shadow-sm mb-6 space-y-4">

                            <div class="flex justify-between items-center text-xs text-ink-600 px-1">
                                <span>SISI KANAN (KEMUDI)</span>
                                <span>SISI KIRI (PINTU)</span>
                            </div>

                            <div class="grid grid-cols-2 gap-4">

                                <div class="flex flex-col items-center justify-center p-3.5 rounded-lg bg-gray-100 text-ink-600 space-y-1">
                                    <span class="material-symbols-outlined text-3xl">sports_motorsports</span>
                                    <span class="text-xs font-semibold">SUPIR</span>
                                    <span class="text-[10px]">Kabin Kendali</span>
                                </div>

                                <button
                                    type="button"
                                    class="seat-choice group relative flex flex-col items-center justify-center p-3.5 rounded-lg bg-white shadow-sm hover:shadow-md transition-all"
                                    id="seat-btn-1"
                                    onclick="selectSeat(1, 'Kursi No. 1', 'Depan Samping Supir')"
                                >
                                    <span class="material-symbols-outlined text-2xl text-ink-600">airline_seat_recline_normal</span>
                                    <span class="seat-title font-semibold mt-1">Kursi 1</span>
                                    <span class="seat-sub text-xs text-ink-600">Depan Samping</span>
                                </button>

                            </div>
                        </div>

                        <!-- BARIS TENGAH -->
                        <div class="bg-white rounded-xl p-4 shadow-sm mb-6 space-y-3">

                            <div class="flex justify-between items-center text-xs text-ink-600 px-1">
                                <span>BARIS TENGAH</span>
                                <span class="text-forest-700 font-semibold">Akses Lega</span>
                            </div>

                            <div class="grid grid-cols-2 gap-4">

                                <div class="relative seat-choice flex flex-col items-center justify-center p-3.5 rounded-lg bg-gray-300 text-gray-600 cursor-not-allowed">
                                    <span class="material-symbols-outlined text-2xl opacity-40">airline_seat_recline_normal</span>
                                    <span class="font-semibold mt-1 opacity-50">Kursi 2</span>
                                    <span class="text-xs opacity-60">Jendela Kiri</span>

                                    <div class="absolute inset-0 flex items-center justify-center bg-black/5 rounded-lg">
                                        <span class="bg-gray-600/80 text-white text-[10px] px-2 py-0.5 rounded uppercase">Terisi</span>
                                    </div>
                                </div>

                                <button
                                    type="button"
                                    class="seat-choice group relative flex flex-col items-center justify-center p-3.5 rounded-lg bg-forest-700 text-white shadow-md transition-all"
                                    id="seat-btn-3"
                                    onclick="selectSeat(3, 'Kursi No. 3', 'Baris Tengah - Sisi Kanan')"
                                >
                                    <span class="seat-check-badge absolute -top-2 -right-2 w-5 h-5 rounded-full bg-amber-500 text-white flex items-center justify-center shadow-sm">
                                        <span class="material-symbols-outlined text-sm">check</span>
                                    </span>

                                    <span class="material-symbols-outlined text-2xl">airline_seat_recline_normal</span>
                                    <span class="seat-title font-bold mt-1">Kursi 3</span>
                                    <span class="seat-sub text-xs text-green-200">Jendela Kanan</span>
                                </button>

                            </div>
                        </div>

                        <!-- BARIS BELAKANG -->
                        <div class="bg-white rounded-xl p-4 shadow-sm space-y-3">

                            <div class="flex justify-between items-center text-xs text-ink-600 px-1">
                                <span>BARIS BELAKANG</span>
                                <span>Dekat Bagasi</span>
                            </div>

                            <div class="grid grid-cols-2 gap-4">

                                <button
                                    type="button"
                                    class="seat-choice group relative flex flex-col items-center justify-center p-3.5 rounded-lg bg-white shadow-sm hover:shadow-md transition-all"
                                    id="seat-btn-4"
                                    onclick="selectSeat(4, 'Kursi No. 4', 'Baris Belakang - Sisi Kiri')"
                                >
                                    <span class="material-symbols-outlined text-2xl text-ink-600">airline_seat_recline_normal</span>
                                    <span class="seat-title font-semibold mt-1">Kursi 4</span>
                                    <span class="seat-sub text-xs text-ink-600">Kiri Bagasi</span>
                                </button>

                                <div class="relative seat-choice flex flex-col items-center justify-center p-3.5 rounded-lg bg-gray-300 text-gray-600 cursor-not-allowed">
                                    <span class="material-symbols-outlined text-2xl opacity-40">airline_seat_recline_normal</span>
                                    <span class="font-semibold mt-1 opacity-50">Kursi 5</span>
                                    <span class="text-xs opacity-60">Kanan Bagasi</span>

                                    <div class="absolute inset-0 flex items-center justify-center bg-black/5 rounded-lg">
                                        <span class="bg-gray-600/80 text-white text-[10px] px-2 py-0.5 rounded uppercase">Terisi</span>
                                    </div>
                                </div>

                            </div>
                        </div>

                        <div class="mt-6 pt-4 text-center text-xs text-ink-600 flex items-center justify-center gap-2">
                            <span class="material-symbols-outlined text-forest-700">luggage</span>
                            Kompartemen Bagasi Belakang (Maks. 15 kg/orang)
                        </div>
                    </div>

                    <!-- KETENTUAN KURSI -->
                    <div class="flex items-start gap-3 p-4 rounded-xl bg-sage-100 text-forest-900">
                        <span class="material-symbols-outlined text-forest-700 mt-0.5">info</span>

                        <div class="space-y-1">
                            <span class="font-semibold block">Ketentuan Penempatan Kursi</span>

                            <p class="text-sm text-ink-600">
                                Sesuai SOP Trans Lampung Bab 5.5, kapasitas HiAce dipatok tepat
                                5 kursi penumpang demi keselamatan dan kenyamanan. Tidak berlaku
                                pemilihan kelas tarif tambahan pada nomor kursi mana pun.
                            </p>
                        </div>
                    </div>

                </section>

                <!-- RINGKASAN PEMESANAN -->
                <aside class="lg:col-span-5 space-y-6">

                    <div class="bg-white rounded-xl p-6 sm:p-7 shadow-sm space-y-6">

                        <div class="flex items-center justify-between pb-4 bg-gray-50 -mx-6 -mt-6 p-6 rounded-t-xl">
                            <div>
                                <span class="text-xs text-ink-600 uppercase tracking-wider block">
                                    Ringkasan Sementara
                                </span>

                                <h2 class="font-headline text-xl font-semibold text-forest-900">
                                    Detail Pemesanan
                                </h2>
                            </div>

                            <span class="bg-green-100 text-forest-900 text-xs px-2.5 py-1 rounded">
                                Reguler Executive
                            </span>
                        </div>

                        <!-- DETAIL RUTE -->
                        <div class="space-y-3 text-sm">

                            <div class="flex items-start justify-between gap-4">
                                <span class="text-ink-600">Rute Perjalanan</span>
                                <span class="font-semibold text-right">Rajabasa → Krui (Pesisir Barat)</span>
                            </div>

                            <div class="flex items-start justify-between gap-4">
                                <span class="text-ink-600">Jadwal Keberangkatan</span>
                                <span class="font-semibold text-right">24 Okt 2024 • 08:00 WIB</span>
                            </div>

                            <div class="flex items-start justify-between gap-4">
                                <span class="text-ink-600">Titik Kumpul / Pool</span>
                                <span class="font-semibold text-right">Loket Pool Rajabasa, Rajabasa</span>
                            </div>

                        </div>

                        <div class="h-px bg-gray-200"></div>

                        <!-- KURSI TERPILIH -->
                        <div class="p-4 rounded-xl bg-cream-50 space-y-2">

                            <div class="flex items-center justify-between">
                                <span class="text-sm text-ink-600">Kursi yang Anda Pilih</span>

                                <span class="text-xs bg-forest-700 text-white px-2 py-0.5 rounded">
                                    Terpilih
                                </span>
                            </div>

                            <div class="flex flex-col gap-1">
                                <span
                                    class="font-headline text-xl font-semibold text-forest-900"
                                    id="selected-seat-label"
                                >
                                    Kursi No. 3
                                </span>

                                <span
                                    class="text-sm text-forest-700 font-medium"
                                    id="selected-seat-pos"
                                >
                                    Baris Tengah - Sisi Kanan
                                </span>
                            </div>

                            <p class="text-sm text-ink-600">
                                Posisi nyaman di belakang baris supir dengan ruang kaki optimal.
                            </p>
                        </div>

                        <!-- IDENTITAS PENUMPANG -->
                        <div class="space-y-3 text-sm">

                            <span class="text-sm text-ink-600 block">
                                Identitas Penumpang Utama
                            </span>

                            <div class="flex items-center gap-3 p-3 rounded-lg bg-gray-50">

                                <div class="w-8 h-8 rounded-full bg-forest-700 text-white flex items-center justify-center font-bold text-xs">
                                    BH
                                </div>

                                <div class="flex-1 min-w-0">
                                    <span class="font-semibold text-forest-900 block truncate">
                                        Bambang Hermanto
                                    </span>

                                    <span class="text-ink-600">
                                        0812-3456-7890
                                    </span>
                                </div>

                                <span class="material-symbols-outlined text-green-700">
                                    verified_user
                                </span>
                            </div>
                        </div>

                        <div class="h-px bg-gray-200"></div>

                        <!-- RINCIAN TARIF -->
                        <div class="space-y-3 text-sm">

                            <div class="flex items-center justify-between">
                                <span class="text-ink-600">Tarif Tiket Dasar</span>
                                <span class="font-medium">Rp 120.000</span>
                            </div>

                            <div class="flex items-center justify-between">
                                <span class="text-ink-600">Biaya Pemilihan Kursi</span>
                                <span class="text-green-700 font-medium">Gratis (Rp 0)</span>
                            </div>

                            <div class="flex items-center justify-between pt-2">
                                <span class="font-semibold text-forest-900">Total Pembayaran</span>
                                <span class="font-headline text-xl font-bold text-forest-900">
                                    Rp 120.000
                                </span>
                            </div>

                            <p class="text-[11px] text-ink-600 leading-tight">
                                * Tarif resmi dari sistem Trans Lampung Express.
                                Tidak ada biaya tambahan pemilihan kursi.
                            </p>
                        </div>

                        <!-- TOMBOL AKSI -->
                        <div class="space-y-3 pt-2">

                            <button
                                type="button"
                                onclick="continueBooking()"
                                class="w-full bg-forest-700 hover:bg-forest-900 text-white py-3.5 px-6 rounded-lg font-semibold flex items-center justify-center gap-2 shadow-sm transition-colors"
                            >
                                <span>Lanjut ke Ringkasan Pemesanan</span>
                                <span class="material-symbols-outlined">arrow_forward</span>
                            </button>

                            <a
                                href="{{ route('member.cari-jadwal') }}"
                                class="w-full bg-white hover:bg-sage-100 text-forest-900 py-3 px-6 rounded-lg font-medium flex items-center justify-center gap-2 transition-colors"
                            >
                                <span class="material-symbols-outlined">arrow_back</span>
                                Kembali ke Hasil Jadwal
                            </a>

                        </div>
                    </div>

                    <!-- JAMINAN LAYANAN -->
                    <div class="p-4 rounded-xl bg-white shadow-sm flex items-center gap-4">

                        <div class="w-10 h-10 rounded-lg bg-amber-500/10 text-amber-500 flex items-center justify-center shrink-0">
                            <span class="material-symbols-outlined text-2xl">shield</span>
                        </div>

                        <div class="text-sm">
                            <span class="font-semibold text-forest-900 block">
                                Jaminan Keberangkatan Tepat Waktu
                            </span>

                            <span class="text-ink-600">
                                Kendaraan berangkat sesuai jadwal tanpa menunggu kursi terisi penuh.
                            </span>
                        </div>
                    </div>

                </aside>

            </div>
        </div>
    </main>

    <!-- FOOTER -->
    <footer class="w-full bg-gray-100 py-12 mt-16 shadow-sm">

        <div class="max-w-7xl mx-auto px-6 lg:px-12">

            <div class="grid grid-cols-1 md:grid-cols-4 gap-8 mb-8">

                <div class="space-y-3">
                    <div class="flex items-center gap-2">
                        <div class="w-7 h-7 rounded bg-forest-700 flex items-center justify-center text-white">
                            <span class="material-symbols-outlined text-base">directions_bus</span>
                        </div>

                        <span class="font-headline text-xl font-semibold text-forest-900">
                            Trans Lampung
                        </span>
                    </div>

                    <p class="text-sm text-ink-600">
                        Layanan transportasi antar-kota reguler dan shuttle eksekutif
                        terpercaya di seluruh wilayah Provinsi Lampung.
                    </p>
                </div>

                <div>
                    <h4 class="font-semibold text-forest-900 mb-3">Layanan Rute</h4>

                    <ul class="space-y-2 text-sm text-ink-600">
                        <li>Bandar Lampung – Metro</li>
                        <li>Bandar Lampung – Pringsewu</li>
                        <li>Bandar Lampung – Kotabumi</li>
                        <li>Bakauheni – Bandar Lampung</li>
                    </ul>
                </div>

                <div>
                    <h4 class="font-semibold text-forest-900 mb-3">Bantuan & Layanan</h4>

                    <ul class="space-y-2 text-sm text-ink-600">
                        <li>Syarat & Ketentuan Tiket</li>
                        <li>Prosedur Pengembalian Dana</li>
                        <li>Pengaduan Layanan</li>
                        <li>Loket & Titik Kumpul</li>
                    </ul>
                </div>

                <div>
                    <h4 class="font-semibold text-forest-900 mb-3">Pusat Bantuan</h4>

                    <p class="text-sm text-ink-600 mb-2">
                        Terminal Rajabasa & Pool Way Halim, Bandar Lampung
                    </p>

                    <p class="text-sm text-forest-700 font-semibold">
                        WhatsApp: +62 821-7788-9900
                    </p>

                    <p class="text-sm text-ink-600">
                        Jam Operasional: 05:00 - 21:00 WIB
                    </p>
                </div>

            </div>

            <div class="pt-8 border-t border-gray-200 flex flex-col sm:flex-row items-center justify-between gap-4 text-sm text-ink-600">

                <p>© 2025 PT Trans Lampung Express. Hak cipta dilindungi.</p>

                <span class="font-medium">
                    Amanah • Tepat Waktu • Nyaman
                </span>
            </div>
        </div>
    </footer>

    <!-- JAVASCRIPT PILIH KURSI -->
    <script>
        let selectedSeat = 3;

        const availableSeats = [1, 3, 4];

        function selectSeat(seatNumber, labelText, posText) {

            if (!availableSeats.includes(seatNumber)) {
                return;
            }

            selectedSeat = seatNumber;

            // Reset semua kursi yang bisa dipilih
            availableSeats.forEach(function(id) {

                const button = document.getElementById('seat-btn-' + id);

                if (!button) return;

                button.className =
                    'seat-choice group relative flex flex-col items-center justify-center p-3.5 rounded-lg bg-white shadow-sm hover:shadow-md transition-all';

                const badge = button.querySelector('.seat-check-badge');

                if (badge) {
                    badge.remove();
                }

                const icon = button.querySelector('.material-symbols-outlined');

                if (icon) {
                    icon.className =
                        'material-symbols-outlined text-2xl text-ink-600';
                }

                const title = button.querySelector('.seat-title');

                if (title) {
                    title.className = 'seat-title font-semibold mt-1';
                }

                const subtitle = button.querySelector('.seat-sub');

                if (subtitle) {
                    subtitle.className = 'seat-sub text-xs text-ink-600';
                }
            });

            // Tandai kursi yang dipilih
            const activeButton = document.getElementById('seat-btn-' + seatNumber);

            if (activeButton) {

                activeButton.className =
                    'seat-choice group relative flex flex-col items-center justify-center p-3.5 rounded-lg bg-forest-700 text-white shadow-md transition-all';

                const badge = document.createElement('span');

                badge.className =
                    'seat-check-badge absolute -top-2 -right-2 w-5 h-5 rounded-full bg-amber-500 text-white flex items-center justify-center shadow-sm';

                badge.innerHTML =
                    '<span class="material-symbols-outlined text-sm">check</span>';

                activeButton.appendChild(badge);

                const icon = activeButton.querySelector('.material-symbols-outlined:not(.seat-check-badge .material-symbols-outlined)');

                if (icon) {
                    icon.className = 'material-symbols-outlined text-2xl';
                }

                const title = activeButton.querySelector('.seat-title');

                if (title) {
                    title.className = 'seat-title font-bold mt-1';
                }

                const subtitle = activeButton.querySelector('.seat-sub');

                if (subtitle) {
                    subtitle.className = 'seat-sub text-xs text-green-200';
                }
            }

            // Perbarui ringkasan kursi
            document.getElementById('selected-seat-label').textContent = labelText;

            document.getElementById('selected-seat-pos').textContent = posText;
        }

        // Tombol lanjut ke ringkasan pemesanan
        function continueBooking() {
            window.location.href = "{{ route('member.pesanan') }}";
        }
    </script>

    @include('partials.role-switcher')
</body>
</html>
