<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Melakukan Pembayaran - Trans Lampung Express</title>

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

    <!-- HEADER / NAVBAR -->
    <header class="fixed top-0 left-0 right-0 w-full z-40 bg-cream-50/95 backdrop-blur-xl shadow-[0_1px_8px_rgba(23,59,53,0.05)] border-b border-surface-container">
        <div class="h-16 max-w-7xl mx-auto px-6 lg:px-12 flex items-center justify-between">
            <a class="flex items-center gap-3 group" href="{{ route('member.beranda') }}">
                <div class="w-9 h-9 rounded-lg bg-forest-900 flex items-center justify-center text-paper-0 transition-transform group-hover:scale-105">
                    <span class="material-symbols-outlined text-[20px]">directions_bus</span>
                </div>
                <div class="flex flex-col">
                    <span class="font-headline-sm text-lg font-semibold text-forest-900 tracking-tight leading-none">Trans Lampung</span>
                    <span class="text-[11px] tracking-wider uppercase text-forest-700 font-semibold">Express Travel</span>
                </div>
            </a>

            <!-- NAVIGATION LINKS -->
            <nav class="hidden md:flex items-center gap-6">
                <a href="{{ route('member.beranda') }}" class="font-label-lg text-label-lg text-on-surface-variant hover:text-on-surface transition-colors">
                    Beranda
                </a>
                <a href="{{ route('member.cari-jadwal') }}" class="font-label-lg text-label-lg text-on-surface-variant hover:text-on-surface transition-colors">
                    Cari Jadwal
                </a>
                <a href="{{ route('member.keluhan') }}" class="font-label-lg text-label-lg text-on-surface-variant hover:text-on-surface transition-colors">
                    Keluhan
                </a>
            </nav>

            <!-- PROFIL MEMBER -->
            <div class="flex items-center gap-3">
                <div class="hidden sm:flex flex-col text-right">
                    <span class="font-body-sm text-body-sm text-ink-600">Halo,</span>
                    <a href="{{ route('member.profil') }}" class="font-title-sm text-title-sm text-forest-900 leading-none hover:text-forest-700 transition-colors">
                        {{ auth()->user()->name ?? 'Member' }}
                    </a>
                </div>
                <a href="{{ route('member.profil') }}" class="w-9 h-9 rounded-full bg-forest-700 text-paper-0 flex items-center justify-center font-bold text-sm ring-2 ring-forest-700/20 hover:ring-forest-700 transition-all uppercase" title="Profil Pelanggan">
                    {{ substr(auth()->user()->name ?? 'MB', 0, 2) }}
                </a>
            </div>
        </div>
    </header>

    <!-- MAIN CONTENT -->
    <main class="w-full pt-24 pb-16 bg-cream-50 min-h-screen">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-12">

            <!-- STEPPER PROGRESS -->
            <div class="mb-8">
                <div class="flex items-center justify-between max-w-2xl mx-auto px-4">
                    <div class="flex flex-col items-center gap-1.5">
                        <div class="w-8 h-8 rounded-full bg-green-700 text-white flex items-center justify-center text-sm font-semibold">
                            <span class="material-symbols-outlined text-[16px]">check</span>
                        </div>
                        <span class="text-xs font-semibold text-forest-900">1. Cari Jadwal</span>
                    </div>
                    <div class="flex-1 h-0.5 bg-green-700 mx-2"></div>
                    <div class="flex flex-col items-center gap-1.5">
                        <div class="w-8 h-8 rounded-full bg-green-700 text-white flex items-center justify-center text-sm font-semibold">
                            <span class="material-symbols-outlined text-[16px]">check</span>
                        </div>
                        <span class="text-xs font-semibold text-forest-900">2. Pilih Kursi</span>
                    </div>
                    <div class="flex-1 h-0.5 bg-green-700 mx-2"></div>
                    <div class="flex flex-col items-center gap-1.5">
                        <div class="w-8 h-8 rounded-full bg-green-700 text-white flex items-center justify-center text-sm font-semibold">
                            <span class="material-symbols-outlined text-[16px]">check</span>
                        </div>
                        <span class="text-xs font-semibold text-forest-900">3. Pesan Tiket</span>
                    </div>
                    <div class="flex-1 h-0.5 bg-forest-700 mx-2"></div>
                    <div class="flex flex-col items-center gap-1.5">
                        <div class="w-8 h-8 rounded-full bg-forest-700 text-white flex items-center justify-center text-sm font-semibold ring-4 ring-forest-700/20">
                            4
                        </div>
                        <span class="text-xs font-bold text-forest-700">4. Pembayaran</span>
                    </div>
                    <div class="flex-1 h-0.5 bg-surface-container mx-2"></div>
                    <div class="flex flex-col items-center gap-1.5">
                        <div class="w-8 h-8 rounded-full bg-surface-container text-ink-600 flex items-center justify-center text-sm font-semibold">
                            5
                        </div>
                        <span class="text-xs font-medium text-ink-600">5. E-Tiket</span>
                    </div>
                </div>
            </div>

            <!-- COUNTDOWN TIMER ALERT -->
            <div class="mb-8 bg-paper-0 border border-amber-500/30 rounded-2xl p-5 shadow-sm flex flex-col sm:flex-row items-center justify-between gap-4">
                <div class="flex items-center gap-3">
                    <div class="w-12 h-12 rounded-xl bg-amber-500/15 text-amber-500 flex items-center justify-center shrink-0">
                        <span class="material-symbols-outlined text-[28px]">timer</span>
                    </div>
                    <div>
                        <span class="text-xs uppercase font-bold tracking-wider text-amber-500 block">Selesaikan Pembayaran Sebelum Waktu Habis</span>
                        <h2 class="text-base sm:text-lg font-bold text-forest-900">Batas Waktu Pembayaran Tiket Anda</h2>
                    </div>
                </div>
                <div class="flex items-center gap-2 bg-cream-50 px-5 py-2.5 rounded-xl border border-amber-500/20">
                    <span class="material-symbols-outlined text-amber-500 text-[20px]">alarm</span>
                    <span id="countdownDisplay" class="font-mono text-xl sm:text-2xl font-bold text-forest-900 tracking-wider">01:54:19</span>
                </div>
            </div>

            <!-- GRID KONTEN -->
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 items-start">

                <!-- KOLOM KIRI: METODE PEMBAYARAN -->
                <div class="lg:col-span-8 space-y-6">

                    <!-- PILIHAN METODE PEMBAYARAN -->
                    <div class="bg-paper-0 rounded-2xl p-6 sm:p-8 shadow-sm border border-surface-container space-y-6">
                        <div class="flex items-center justify-between border-b border-surface-container pb-4">
                            <div>
                                <h1 class="font-headline-md text-2xl font-semibold text-forest-900">Instruksi &amp; Rekening Pembayaran</h1>
                                <p class="text-sm text-ink-600 mt-0.5">Pilih rekening resmi Trans Lampung Express di bawah ini untuk mentransfer biaya tiket.</p>
                            </div>
                            <span class="bg-amber-500/15 text-tertiary-container font-semibold text-xs px-3 py-1 rounded-full flex items-center gap-1">
                                <span class="w-2 h-2 rounded-full bg-amber-500"></span> Belum Bayar
                            </span>
                        </div>

                        <!-- BANK TRANSFER CARDS -->
                        <div class="space-y-4">
                            <!-- BANK MANDIRI -->
                            <div id="cardMandiri" onclick="pilihMetodeBank('Mandiri')" class="bank-card border-2 border-forest-700 rounded-xl p-5 bg-surface-container-low cursor-pointer transition-all">
                                <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-3 pb-3 border-b border-surface-container">
                                    <div class="flex items-center gap-3">
                                        <div class="w-12 h-8 rounded bg-blue-900 text-white font-bold text-xs flex items-center justify-center tracking-wider">
                                            MANDIRI
                                        </div>
                                        <div>
                                            <span class="font-bold text-forest-900 text-base">Bank Mandiri</span>
                                            <span class="text-xs text-ink-600 block">Transfer Antar-Bank / Sesama Mandiri</span>
                                        </div>
                                    </div>
                                    <span id="badgeMandiri" class="text-xs bg-forest-700 text-white font-semibold px-2.5 py-1 rounded-md self-start sm:self-auto">Dipilih</span>
                                </div>
                                <div class="pt-4 flex flex-col sm:flex-row sm:items-center justify-between gap-3">
                                    <div>
                                        <span class="text-xs text-ink-600 block">Nomor Rekening Resmi:</span>
                                        <div class="flex items-center gap-3 mt-1">
                                            <span id="mandiriRek" class="font-mono text-xl sm:text-2xl font-bold text-forest-900 tracking-wider">1140029182341</span>
                                            <button type="button" onclick="event.stopPropagation(); copyToClipboard('1140029182341', 'Mandiri')" class="inline-flex items-center gap-1 px-3 py-1 text-xs font-semibold rounded-lg bg-forest-700 text-white hover:bg-forest-900 transition-colors shadow-xs">
                                                <span class="material-symbols-outlined text-[14px]">content_copy</span>
                                                Salin
                                            </button>
                                        </div>
                                        <span class="text-xs text-ink-600 mt-1 block">a.n. <strong class="text-forest-900">PT TRANS LAMPUNG EXPRESS</strong></span>
                                    </div>
                                </div>
                            </div>

                            <!-- BANK BRI -->
                            <div id="cardBri" onclick="pilihMetodeBank('BRI')" class="bank-card border border-surface-container rounded-xl p-5 hover:border-forest-700/60 bg-paper-0 cursor-pointer transition-all">
                                <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-3 pb-3 border-b border-surface-container">
                                    <div class="flex items-center gap-3">
                                        <div class="w-12 h-8 rounded bg-blue-600 text-white font-bold text-xs flex items-center justify-center tracking-wider">
                                            BRI
                                        </div>
                                        <div>
                                            <span class="font-bold text-forest-900 text-base">Bank BRI</span>
                                            <span class="text-xs text-ink-600 block">Transfer Rekening Operasional Loket</span>
                                        </div>
                                    </div>
                                    <span id="badgeBri" class="hidden text-xs bg-forest-700 text-white font-semibold px-2.5 py-1 rounded-md self-start sm:self-auto">Dipilih</span>
                                </div>
                                <div class="pt-4 flex flex-col sm:flex-row sm:items-center justify-between gap-3">
                                    <div>
                                        <span class="text-xs text-ink-600 block">Nomor Rekening Resmi:</span>
                                        <div class="flex items-center gap-3 mt-1">
                                            <span id="briRek" class="font-mono text-xl sm:text-2xl font-bold text-forest-900 tracking-wider">009801002345531</span>
                                            <button type="button" onclick="event.stopPropagation(); copyToClipboard('009801002345531', 'BRI')" class="inline-flex items-center gap-1 px-3 py-1 text-xs font-semibold rounded-lg bg-surface-container hover:bg-forest-700 hover:text-white transition-colors">
                                                <span class="material-symbols-outlined text-[14px]">content_copy</span>
                                                Salin
                                            </button>
                                        </div>
                                        <span class="text-xs text-ink-600 mt-1 block">a.n. <strong class="text-forest-900">PT TRANS LAMPUNG EXPRESS</strong></span>
                                    </div>
                                </div>
                            </div>

                            <!-- BANK BCA -->
                            <div id="cardBca" onclick="pilihMetodeBank('BCA')" class="bank-card border border-surface-container rounded-xl p-5 hover:border-forest-700/60 bg-paper-0 cursor-pointer transition-all">
                                <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-3 pb-3 border-b border-surface-container">
                                    <div class="flex items-center gap-3">
                                        <div class="w-12 h-8 rounded bg-blue-700 text-white font-bold text-xs flex items-center justify-center tracking-wider">
                                            BCA
                                        </div>
                                        <div>
                                            <span class="font-bold text-forest-900 text-base">Bank BCA</span>
                                            <span class="text-xs text-ink-600 block">Transfer Antar-Bank / BCA Mobile</span>
                                        </div>
                                    </div>
                                    <span id="badgeBca" class="hidden text-xs bg-forest-700 text-white font-semibold px-2.5 py-1 rounded-md self-start sm:self-auto">Dipilih</span>
                                </div>
                                <div class="pt-4 flex flex-col sm:flex-row sm:items-center justify-between gap-3">
                                    <div>
                                        <span class="text-xs text-ink-600 block">Nomor Rekening Resmi:</span>
                                        <div class="flex items-center gap-3 mt-1">
                                            <span id="bcaRek" class="font-mono text-xl sm:text-2xl font-bold text-forest-900 tracking-wider">8270918821</span>
                                            <button type="button" onclick="event.stopPropagation(); copyToClipboard('8270918821', 'BCA')" class="inline-flex items-center gap-1 px-3 py-1 text-xs font-semibold rounded-lg bg-surface-container hover:bg-forest-700 hover:text-white transition-colors">
                                                <span class="material-symbols-outlined text-[14px]">content_copy</span>
                                                Salin
                                            </button>
                                        </div>
                                        <span class="text-xs text-ink-600 mt-1 block">a.n. <strong class="text-forest-900">PT TRANS LAMPUNG EXPRESS</strong></span>
                                    </div>
                                </div>
                            </div>

                            <!-- QRIS SCAN -->
                            <div class="border border-amber-500/40 rounded-xl p-5 bg-cream-50/70">
                                <div class="flex flex-col sm:flex-row items-center gap-6">
                                    <div class="bg-paper-0 p-3 rounded-xl border border-surface-container shadow-xs flex flex-col items-center">
                                        <!-- QR Preview Mock -->
                                        <div class="w-36 h-36 bg-ink-900 rounded-lg p-2 flex items-center justify-center">
                                            <div class="w-full h-full bg-paper-0 p-2 flex flex-col justify-between items-center text-center">
                                                <div class="grid grid-cols-5 gap-1 w-full h-full p-1 bg-surface-container-low">
                                                    <div class="bg-ink-900 col-span-2 row-span-2"></div>
                                                    <div class="bg-ink-900"></div>
                                                    <div class="bg-ink-900 col-span-2 row-span-2"></div>
                                                    <div class="bg-ink-900"></div>
                                                    <div class="bg-ink-900 col-span-3"></div>
                                                    <div class="bg-ink-900 col-span-2 row-span-2"></div>
                                                    <div class="bg-ink-900"></div>
                                                    <div class="bg-ink-900 col-span-2 row-span-2"></div>
                                                </div>
                                            </div>
                                        </div>
                                        <span class="text-[10px] font-bold text-forest-900 mt-2 tracking-widest">NMID: ID1020392019</span>
                                    </div>
                                    <div class="space-y-2 text-center sm:text-left">
                                        <div class="flex items-center justify-center sm:justify-start gap-2">
                                            <span class="bg-red-600 text-white font-bold text-[11px] px-2 py-0.5 rounded">QRIS</span>
                                            <span class="font-bold text-forest-900">Scan QRIS Nasional</span>
                                        </div>
                                        <p class="text-xs text-ink-600 leading-relaxed">
                                            Scan menggunakan aplikasi m-Banking (BCA, Mandiri, BRI, BSI) atau dompet digital (GoPay, OVO, Dana, ShopeePay).
                                        </p>
                                        <div class="pt-2">
                                            <button onclick="alert('File QRIS Trans Lampung Express berhasil diunduh.')" class="inline-flex items-center gap-1.5 px-3 py-1.5 rounded-lg border border-forest-700 text-forest-700 hover:bg-forest-700 hover:text-white text-xs font-semibold transition-colors">
                                                <span class="material-symbols-outlined text-[16px]">download</span>
                                                Unduh Gambar QRIS
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- PANDUAN TRANSFER -->
                        <div class="border-t border-surface-container pt-5 space-y-3">
                            <h3 class="font-title-sm text-base font-semibold text-forest-900 flex items-center gap-2">
                                <span class="material-symbols-outlined text-forest-700">info</span>
                                Panduan Singkat Pembayaran Transfer
                            </h3>
                            <ol class="list-decimal list-inside text-xs text-ink-600 space-y-1.5 leading-relaxed bg-surface-container-low p-4 rounded-xl">
                                <li>Pilih salah satu rekening tujuan atau scan QRIS di atas.</li>
                                <li>Transfer tepat sesuai nominal tagihan <strong class="text-forest-900">Rp 120.354</strong> (termasuk 3 digit kode unik).</li>
                                <li>Simpan bukti struk / tangkapan layar (screenshot) transfer bank Anda.</li>
                                <li>Klik tombol <strong class="text-forest-900">"Konfirmasi Pembayaran Sekarang"</strong> di bawah untuk mengunggah bukti transfer.</li>
                            </ol>
                        </div>
                    </div>
                </div>

                <!-- KOLOM KANAN: RINGKASAN PESANAN & ACTION -->
                <div class="lg:col-span-4 space-y-6 lg:sticky lg:top-24">

                    <!-- KARTU RINCIAN TAGIHAN -->
                    <div class="bg-paper-0 rounded-2xl p-6 shadow-sm border border-surface-container space-y-5">
                        <div class="flex items-center justify-between pb-3 border-b border-surface-container">
                            <h2 class="font-title-md text-base font-bold text-forest-900">Ringkasan Tagihan</h2>
                            <span class="font-mono text-xs font-bold bg-surface-container px-2 py-0.5 rounded text-forest-900">
                                #PSN-{{ str_pad($pesan->id_pesan ?? 1, 4, '0', STR_PAD_LEFT) }}
                            </span>
                        </div>

                        <!-- DATA PERJALANAN -->
                        <div class="space-y-3 text-sm">
                            <div class="flex justify-between items-start">
                                <span class="text-ink-600">Rute Perjalanan</span>
                                <span class="font-semibold text-forest-900 text-right">
                                    {{ $pesan->jadwal->kotaAsal->nm_kota_asal ?? 'Bandar Lampung' }} → {{ $pesan->jadwal->kotaTujuan->nm_kota_tujuan ?? 'Krui' }}
                                </span>
                            </div>
                            <div class="flex justify-between items-center">
                                <span class="text-ink-600">Jadwal Trip</span>
                                <span class="font-medium text-forest-900">
                                    {{ $pesan?->jadwal?->tgl_berangkat ? \Carbon\Carbon::parse($pesan->jadwal->tgl_berangkat)->translatedFormat('l, d M') : 'Senin, 10 Nov' }} • {{ substr($pesan->jadwal->jam_berangkat ?? '08:00', 0, 5) }}
                                </span>
                            </div>
                            <div class="flex justify-between items-center">
                                <span class="text-ink-600">Nomor Kursi</span>
                                <span class="font-bold text-forest-700 bg-secondary-container px-2 py-0.5 rounded text-xs">
                                    Kursi {{ $pesan->nomor_kursi ?? 1 }}
                                </span>
                            </div>
                            <div class="flex justify-between items-center">
                                <span class="text-ink-600">Armada</span>
                                <span class="font-medium text-forest-900">
                                    {{ $pesan->jadwal->kendaraan->jenis_mobil ?? 'Toyota HiAce' }} {{ $pesan->jadwal->kendaraan->nomor_polisi ?? 'BE 7012 AA' }}
                                </span>
                            </div>
                            <div class="flex justify-between items-center">
                                <span class="text-ink-600">Nama Penumpang</span>
                                <span class="font-medium text-forest-900">{{ auth()->user()->nama ?? auth()->user()->name ?? 'Member' }}</span>
                            </div>
                        </div>

                        <div class="border-t border-surface-container pt-3 space-y-2 text-sm">
                            <div class="flex justify-between text-ink-600">
                                <span>Tarif Tiket</span>
                                <span>Rp {{ number_format($pesan->jadwal->harga ?? 120000, 0, ',', '.') }}</span>
                            </div>
                            <div class="flex justify-between text-ink-600">
                                <span>Biaya Layanan Loket</span>
                                <span class="text-green-700 font-medium">Rp 0 (Gratis)</span>
                            </div>
                        </div>

                        <!-- TOTAL TAGIHAN BESAR -->
                        <div class="border-t-2 border-dashed border-surface-container pt-4 bg-cream-50 -mx-6 -mb-6 p-6 rounded-b-2xl">
                            <div class="flex items-baseline justify-between mb-4">
                                <div>
                                    <span class="text-xs font-bold text-forest-900 uppercase tracking-wider block">Total Transfer</span>
                                    <span class="text-[11px] text-ink-600">Wajib transfer pas sesuai nominal</span>
                                </div>
                                <div class="text-right">
                                    <span class="text-2xl font-bold font-mono text-forest-900">
                                        Rp {{ number_format($pesan->jadwal->harga ?? 120000, 0, ',', '.') }}
                                    </span>
                                </div>
                            </div>

                            <!-- TOMBOL LANJUT KE KONFIRMASI -->
                            <div class="space-y-2.5">
                                <a href="{{ route('member.konfirmasi-pembayaran') }}" class="w-full bg-forest-700 hover:bg-forest-900 text-white font-semibold text-sm py-3.5 px-4 rounded-xl flex items-center justify-center gap-2 shadow-sm transition-all text-center">
                                    <span>Saya Sudah Transfer, Konfirmasi</span>
                                    <span class="material-symbols-outlined text-[18px]">arrow_forward</span>
                                </a>

                                <a href="{{ route('member.pesanan') }}" class="w-full bg-transparent hover:bg-sage-100 text-forest-900 font-medium text-xs py-2.5 px-4 rounded-lg flex items-center justify-center gap-1.5 transition-colors text-center">
                                    <span class="material-symbols-outlined text-[16px]">arrow_back</span>
                                    <span>Kembali ke Detail Pesanan</span>
                                </a>
                            </div>
                        </div>
                    </div>

                    <!-- BANTUAN LOKET KONSULTASI -->
                    <div class="bg-surface-container-low rounded-xl p-5 border border-surface-container space-y-2">
                        <div class="flex items-center gap-2 text-forest-900 font-semibold text-xs uppercase tracking-wider">
                            <span class="material-symbols-outlined text-[16px] text-forest-700">support_agent</span>
                            Kendala Saat Melakukan Transfer?
                        </div>
                        <p class="text-xs text-ink-600 leading-relaxed">
                            Jika jaringan m-banking Anda mengalami gangguan atau butuh asistensi rekening, hubungi loket operasional Pool Rajabasa:
                        </p>
                        <div class="pt-1 flex items-center gap-2 text-forest-900 font-semibold text-sm">
                            <span class="material-symbols-outlined text-[18px] text-forest-700">call</span>
                            <span>(0721) 703456 / WhatsApp 0811-7200-889</span>
                        </div>
                    </div>
                </div>

            </div>

        </div>
    </main>

    <!-- TOAST NOTIFICATION -->
    <div id="toastSuccess" class="fixed bottom-24 right-6 z-50 hidden bg-forest-900 text-paper-0 px-4 py-3 rounded-xl shadow-xl flex items-center gap-3 border border-amber-500/30 animate-in fade-in slide-in-from-bottom-3 duration-200">
        <span class="material-symbols-outlined text-amber-500 text-[20px]">check_circle</span>
        <span id="toastMessage" class="text-xs font-semibold">Nomor rekening berhasil disalin!</span>
    </div>

    <!-- ROLE SWITCHER INCLUDED -->
    @include('partials.role-switcher')

    <script>
        // Live countdown timer (2 jam)
        let totalSeconds = 2 * 3600 - 341;
        const countdownEl = document.getElementById('countdownDisplay');

        function updateCountdown() {
            if (totalSeconds <= 0) {
                if (countdownEl) countdownEl.textContent = "00:00:00 (Habis)";
                return;
            }
            totalSeconds--;
            const hours = String(Math.floor(totalSeconds / 3600)).padStart(2, '0');
            const minutes = String(Math.floor((totalSeconds % 3600) / 60)).padStart(2, '0');
            const seconds = String(totalSeconds % 60).padStart(2, '0');
            if (countdownEl) countdownEl.textContent = `${hours}:${minutes}:${seconds}`;
        }
        setInterval(updateCountdown, 1000);

        // Copy Rekening Function with Toast
        function copyToClipboard(text, bank) {
            navigator.clipboard.writeText(text).then(() => {
                showToast(`Nomor rekening ${bank} (${text}) berhasil disalin!`);
            }).catch(() => {
                showToast(`Nomor rekening ${bank}: ${text}`);
            });
        }

        function showToast(msg) {
            const toast = document.getElementById('toastSuccess');
            const toastMsg = document.getElementById('toastMessage');
            if (toast && toastMsg) {
                toastMsg.textContent = msg;
                toast.classList.remove('hidden');
                setTimeout(() => {
                    toast.classList.add('hidden');
                }, 3000);
            }
        }

        // Interaksi pemilihan kartu bank
        function pilihMetodeBank(bank) {
            const banks = ['Mandiri', 'Bri', 'Bca'];
            banks.forEach(b => {
                const card = document.getElementById('card' + b);
                const badge = document.getElementById('badge' + b);
                if (card && badge) {
                    if (b.toLowerCase() === bank.toLowerCase()) {
                        card.className = "bank-card border-2 border-forest-700 rounded-xl p-5 bg-surface-container-low cursor-pointer transition-all";
                        badge.classList.remove('hidden');
                    } else {
                        card.className = "bank-card border border-surface-container rounded-xl p-5 hover:border-forest-700/60 bg-paper-0 cursor-pointer transition-all";
                        badge.classList.add('hidden');
                    }
                }
            });
            showToast(`Metode pembayaran Bank ${bank} dipilih`);
        }
    </script>

</body>
</html>

