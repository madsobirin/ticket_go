<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Layani Pemesanan Tiket Loket - Trans Lampung Express</title>

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
                <a href="{{ route('operator.pesanan') }}" class="font-medium text-xs text-cream-50/80 hover:text-white px-3 py-1.5 rounded-lg hover:bg-forest-700/50 transition-colors flex items-center gap-1.5">
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
                    <h1 class="font-headline-lg text-2xl sm:text-3xl font-semibold text-forest-900 tracking-tight">Pelayanan Tiket Langsung (Walk-in Loket)</h1>
                    <p class="text-sm text-ink-600 mt-1">Formulir cepat staf loket untuk melayani penumpang datang langsung ke pool atau reservasi via telepon loket.</p>
                </div>
                <div class="flex items-center gap-2">
                    <span class="text-xs bg-paper-0 border border-surface-container px-3 py-2 rounded-xl text-forest-900 font-semibold flex items-center gap-1.5">
                        <span class="material-symbols-outlined text-green-700 text-[18px]">print</span>
                        Siap Cetak Tiket Thermal Loket
                    </span>
                </div>
            </div>

            <!-- GRID DUA KOLOM: FORM PESANAN & KASIR -->
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 items-start">

                <!-- SISI KIRI: INPUT PERJALANAN, DENAH KURSI, DATA PENUMPANG (8 SPAN) -->
                <div class="lg:col-span-8 space-y-6">

                    <!-- LANGKAH 1: PILIH RUTE & JADWAL -->
                    <div class="bg-paper-0 rounded-2xl p-6 shadow-sm border border-surface-container space-y-4">
                        <div class="flex items-center gap-2.5 pb-3 border-b border-surface-container">
                            <div class="w-7 h-7 rounded-lg bg-forest-700 text-white flex items-center justify-center font-bold text-xs">1</div>
                            <h2 class="font-title-sm text-base font-bold text-forest-900">Pilih Rute &amp; Jadwal Keberangkatan</h2>
                        </div>

                        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-3 text-xs">
                            <div>
                                <label class="block font-bold text-forest-900 uppercase tracking-wider mb-1">Kota Asal</label>
                                <select id="selAsal" onchange="updateSummary()" class="w-full bg-surface-container-low p-2.5 rounded-xl border border-surface-container text-forest-900 font-semibold">
                                    <option value="Bandar Lampung (Pool Rajabasa)" selected>Bandar Lampung (Rajabasa)</option>
                                    <option value="Metro">Metro (Pool Metro)</option>
                                    <option value="Kotabumi">Kotabumi (Pool Kotabumi)</option>
                                </select>
                            </div>

                            <div>
                                <label class="block font-bold text-forest-900 uppercase tracking-wider mb-1">Kota Tujuan</label>
                                <select id="selTujuan" onchange="updateSummary()" class="w-full bg-surface-container-low p-2.5 rounded-xl border border-surface-container text-forest-900 font-semibold">
                                    <option value="Krui (Pesisir Barat)" selected>Krui (Pesisir Barat)</option>
                                    <option value="Metro">Metro</option>
                                    <option value="Kotabumi">Kotabumi</option>
                                    <option value="Kalianda">Kalianda</option>
                                </select>
                            </div>

                            <div>
                                <label class="block font-bold text-forest-900 uppercase tracking-wider mb-1">Tanggal</label>
                                <input id="selTanggal" type="date" value="2026-11-10" onchange="updateSummary()" class="w-full bg-surface-container-low p-2.5 rounded-xl border border-surface-container text-forest-900 font-mono">
                            </div>

                            <div>
                                <label class="block font-bold text-forest-900 uppercase tracking-wider mb-1">Pilihan Trip / Jam</label>
                                <select id="selJam" onchange="updateSummary()" class="w-full bg-surface-container-low p-2.5 rounded-xl border border-surface-container text-forest-900 font-semibold">
                                    <option value="08:00 WIB (Pagi)" selected>08:00 WIB - HiAce</option>
                                    <option value="10:30 WIB (Pagi)">10:30 WIB - HiAce</option>
                                    <option value="13:00 WIB (Siang)">13:00 WIB - Elf Long</option>
                                    <option value="16:30 WIB (Sore)">16:30 WIB - HiAce</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <!-- LANGKAH 2: DENAH KURSI INTERAKTIF KABIN HIACE -->
                    <div class="bg-paper-0 rounded-2xl p-6 shadow-sm border border-surface-container space-y-4">
                        <div class="flex items-center justify-between pb-3 border-b border-surface-container">
                            <div class="flex items-center gap-2.5">
                                <div class="w-7 h-7 rounded-lg bg-forest-700 text-white flex items-center justify-center font-bold text-xs">2</div>
                                <div>
                                    <h2 class="font-title-sm text-base font-bold text-forest-900">Pilih Kursi Penumpang di Denah Kabin</h2>
                                    <span class="text-xs text-ink-600">Klik salah satu kursi hijau yang masih tersedia</span>
                                </div>
                            </div>
                            <div class="flex items-center gap-3 text-xs">
                                <span class="flex items-center gap-1.5"><span class="w-3 h-3 rounded bg-green-700"></span> Tersedia</span>
                                <span class="flex items-center gap-1.5"><span class="w-3 h-3 rounded bg-red-600"></span> Terisi</span>
                                <span class="flex items-center gap-1.5"><span class="w-3 h-3 rounded bg-forest-900"></span> Dipilih</span>
                            </div>
                        </div>

                        <!-- DENAH ARMADA HIACE MINI -->
                        <div class="max-w-md mx-auto bg-surface-container-low p-6 rounded-2xl border border-surface-container space-y-4">
                            <!-- BAGIAN DEPAN: SUPIR & KURSI 1 -->
                            <div class="flex items-center justify-between pb-3 border-b border-surface-container">
                                <div class="w-14 h-12 rounded-xl bg-ink-900 text-white flex flex-col items-center justify-center text-[10px] font-bold">
                                    <span class="material-symbols-outlined text-[16px]">sports_motorsports</span>
                                    SUPIR
                                </div>
                                <div class="text-[11px] text-ink-600 uppercase font-bold tracking-wider">
                                    &larr; DEPAN ARMADA &rarr;
                                </div>
                                <button type="button" onclick="pilihKursiLoket(1, this)" class="seat-btn w-14 h-12 rounded-xl bg-green-700 text-white font-bold text-xs flex flex-col items-center justify-center transition-all hover:scale-105 active:scale-95 shadow-xs">
                                    <span class="text-[9px] opacity-80">DEPAN</span>
                                    <span>K-1</span>
                                </button>
                            </div>

                            <!-- BARIS 2 -->
                            <div class="flex justify-between">
                                <button type="button" class="w-14 h-12 rounded-xl bg-red-600/30 text-red-600 font-bold text-xs flex flex-col items-center justify-center cursor-not-allowed" disabled title="Sudah Terisi">
                                    <span class="text-[9px]">TERISI</span>
                                    <span>K-2</span>
                                </button>
                                <button type="button" class="w-14 h-12 rounded-xl bg-red-600/30 text-red-600 font-bold text-xs flex flex-col items-center justify-center cursor-not-allowed" disabled title="Sudah Terisi">
                                    <span class="text-[9px]">TERISI</span>
                                    <span>K-3</span>
                                </button>
                            </div>

                            <!-- BARIS 3 -->
                            <div class="flex justify-between">
                                <button type="button" onclick="pilihKursiLoket(4, this)" class="seat-btn w-14 h-12 rounded-xl bg-green-700 text-white font-bold text-xs flex flex-col items-center justify-center transition-all hover:scale-105 active:scale-95 shadow-xs">
                                    <span class="text-[9px] opacity-80">TENGAH</span>
                                    <span>K-4</span>
                                </button>
                                <button type="button" onclick="pilihKursiLoket(5, this)" class="seat-btn w-14 h-12 rounded-xl bg-forest-900 ring-2 ring-amber-500 text-white font-bold text-xs flex flex-col items-center justify-center transition-all hover:scale-105 active:scale-95 shadow-xs">
                                    <span class="text-[9px] text-amber-500">PILIH</span>
                                    <span>K-5</span>
                                </button>
                            </div>

                            <!-- BARIS 4 -->
                            <div class="flex justify-between gap-2">
                                <button type="button" onclick="pilihKursiLoket(6, this)" class="seat-btn w-14 h-12 rounded-xl bg-green-700 text-white font-bold text-xs flex flex-col items-center justify-center transition-all hover:scale-105 active:scale-95 shadow-xs">
                                    <span>K-6</span>
                                </button>
                                <button type="button" onclick="pilihKursiLoket(7, this)" class="seat-btn w-14 h-12 rounded-xl bg-green-700 text-white font-bold text-xs flex flex-col items-center justify-center transition-all hover:scale-105 active:scale-95 shadow-xs">
                                    <span>K-7</span>
                                </button>
                                <button type="button" class="w-14 h-12 rounded-xl bg-red-600/30 text-red-600 font-bold text-xs flex flex-col items-center justify-center cursor-not-allowed" disabled>
                                    <span>K-8</span>
                                </button>
                            </div>

                            <!-- BARIS 5 (BELAKANG) -->
                            <div class="flex justify-between gap-2 pt-2 border-t border-surface-container">
                                <button type="button" onclick="pilihKursiLoket(9, this)" class="seat-btn w-14 h-12 rounded-xl bg-green-700 text-white font-bold text-xs flex flex-col items-center justify-center transition-all hover:scale-105 active:scale-95 shadow-xs">
                                    <span>K-9</span>
                                </button>
                                <button type="button" onclick="pilihKursiLoket(10, this)" class="seat-btn w-14 h-12 rounded-xl bg-green-700 text-white font-bold text-xs flex flex-col items-center justify-center transition-all hover:scale-105 active:scale-95 shadow-xs">
                                    <span>K-10</span>
                                </button>
                                <button type="button" onclick="pilihKursiLoket(11, this)" class="seat-btn w-14 h-12 rounded-xl bg-green-700 text-white font-bold text-xs flex flex-col items-center justify-center transition-all hover:scale-105 active:scale-95 shadow-xs">
                                    <span>K-11</span>
                                </button>
                            </div>
                        </div>
                    </div>

                    <!-- LANGKAH 3: FORM IDENTITAS PENUMPANG -->
                    <div class="bg-paper-0 rounded-2xl p-6 shadow-sm border border-surface-container space-y-4">
                        <div class="flex items-center gap-2.5 pb-3 border-b border-surface-container">
                            <div class="w-7 h-7 rounded-lg bg-forest-700 text-white flex items-center justify-center font-bold text-xs">3</div>
                            <h2 class="font-title-sm text-base font-bold text-forest-900">Data Identitas Penumpang</h2>
                        </div>

                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 text-xs">
                            <div>
                                <label class="block font-bold text-forest-900 uppercase tracking-wider mb-1">Nama Lengkap Penumpang <span class="text-red-600">*</span></label>
                                <input id="inputNama" type="text" placeholder="Masukkan nama penumpang..." value="Bpk. Hendrawan" oninput="updateSummary()" class="w-full bg-surface-container-low focus:bg-paper-0 p-3 rounded-xl border border-surface-container text-forest-900 font-semibold" required>
                            </div>

                            <div>
                                <label class="block font-bold text-forest-900 uppercase tracking-wider mb-1">Nomor WhatsApp / HP <span class="text-red-600">*</span></label>
                                <input id="inputHp" type="tel" placeholder="08xxxxxxxxxx" value="081299881100" class="w-full bg-surface-container-low focus:bg-paper-0 p-3 rounded-xl border border-surface-container text-forest-900 font-mono" required>
                            </div>

                            <div class="sm:col-span-2">
                                <label class="block font-bold text-forest-900 uppercase tracking-wider mb-1">Titik Jemput / Penjemputan di Lintasan Jalan Raya</label>
                                <input id="inputAlamat" type="text" placeholder="Cth: Naik di Pool Rajabasa langsung atau Simpang Pringsewu..." value="Langsung di Loket Pool Rajabasa" class="w-full bg-surface-container-low focus:bg-paper-0 p-3 rounded-xl border border-surface-container text-forest-900">
                            </div>
                        </div>
                    </div>

                </div>

                <!-- SISI KANAN: KASIR PEMBAYARAN LOKET (4 SPAN) -->
                <div class="lg:col-span-4 bg-paper-0 rounded-2xl p-6 shadow-sm border border-surface-container space-y-5 lg:sticky lg:top-24">
                    <div class="flex items-center justify-between pb-3 border-b border-surface-container">
                        <div class="flex items-center gap-2">
                            <span class="material-symbols-outlined text-forest-700 text-[22px]">payments</span>
                            <h3 class="font-title-sm text-base font-bold text-forest-900">Kasir Pembayaran Loket</h3>
                        </div>
                        <span class="text-xs bg-amber-500/20 text-tertiary-container font-bold px-2 py-0.5 rounded">Loket 01</span>
                    </div>

                    <!-- RINGKASAN TIKET -->
                    <div class="space-y-2.5 text-xs">
                        <div class="flex justify-between">
                            <span class="text-ink-600">Penumpang:</span>
                            <strong id="sumNama" class="text-forest-900">Bpk. Hendrawan</strong>
                        </div>
                        <div class="flex justify-between">
                            <span class="text-ink-600">Rute:</span>
                            <strong id="sumRute" class="text-forest-900 text-right">Bandar Lampung → Krui</strong>
                        </div>
                        <div class="flex justify-between">
                            <span class="text-ink-600">Jadwal:</span>
                            <span id="sumJadwal" class="text-forest-900 font-medium">10 Nov 2026 • 08:00</span>
                        </div>
                        <div class="flex justify-between items-center">
                            <span class="text-ink-600">Nomor Kursi:</span>
                            <span id="sumKursi" class="font-mono font-bold text-forest-900 bg-secondary-container px-2 py-0.5 rounded">Kursi 5 (K-5)</span>
                        </div>
                    </div>

                    <!-- RINCIAN HARGA -->
                    <div class="border-t border-surface-container pt-3 space-y-2 text-xs">
                        <div class="flex justify-between text-ink-600">
                            <span>Tarif Tiket Perjalanan:</span>
                            <span class="font-mono text-forest-900 font-bold">Rp 120.000</span>
                        </div>
                        <div class="flex justify-between text-ink-600">
                            <span>Biaya Cetak Struk:</span>
                            <span class="text-green-700 font-bold">Rp 0 (Gratis)</span>
                        </div>
                        <div class="flex justify-between items-baseline pt-2 border-t-2 border-dashed border-surface-container">
                            <span class="text-xs font-bold text-forest-900">TOTAL BAYAR:</span>
                            <span class="text-2xl font-bold font-mono text-forest-900">Rp 120.000</span>
                        </div>
                    </div>

                    <!-- METODE BAYAR LOKET -->
                    <div class="space-y-3 pt-1 text-xs">
                        <label class="block font-bold text-forest-900 uppercase tracking-wider">Metode Pembayaran</label>
                        <div class="grid grid-cols-3 gap-2">
                            <label class="cursor-pointer border-2 border-forest-700 bg-surface-container-low p-2 rounded-xl text-center flex flex-col items-center">
                                <input type="radio" name="metode" value="TUNAI" checked class="hidden">
                                <span class="material-symbols-outlined text-[18px] text-forest-700">payments</span>
                                <span class="text-[10px] font-bold text-forest-900 mt-1">Tunai</span>
                            </label>
                            <label class="cursor-pointer border border-surface-container hover:bg-surface-container-low p-2 rounded-xl text-center flex flex-col items-center">
                                <input type="radio" name="metode" value="QRIS" class="hidden">
                                <span class="material-symbols-outlined text-[18px] text-amber-500">qr_code_scanner</span>
                                <span class="text-[10px] font-bold text-forest-900 mt-1">QRIS</span>
                            </label>
                            <label class="cursor-pointer border border-surface-container hover:bg-surface-container-low p-2 rounded-xl text-center flex flex-col items-center">
                                <input type="radio" name="metode" value="DEBIT" class="hidden">
                                <span class="material-symbols-outlined text-[18px] text-blue-600">credit_card</span>
                                <span class="text-[10px] font-bold text-forest-900 mt-1">Debit EDC</span>
                            </label>
                        </div>

                        <!-- INPUT UANG DITERIMA -->
                        <div>
                            <label class="block font-bold text-forest-900 uppercase tracking-wider mb-1">Uang Diterima dari Penumpang (Rp)</label>
                            <input id="inputUang" type="number" value="150000" oninput="hitungKembalian()" class="w-full bg-surface-container-low p-2.5 rounded-xl border border-surface-container text-forest-900 font-mono font-bold text-sm">
                        </div>

                        <!-- KEMBALIAN OTOMATIS -->
                        <div class="bg-surface-container-low p-3 rounded-xl border border-surface-container flex justify-between items-center text-xs">
                            <span class="font-bold text-forest-900">Uang Kembalian:</span>
                            <span id="displayKembalian" class="font-mono text-base font-bold text-green-700">Rp 30.000</span>
                        </div>
                    </div>

                    <!-- TOMBOL PROSES TIKET -->
                    <div class="pt-2">
                        <button onclick="prosesTiketLoket()" class="w-full bg-forest-700 hover:bg-forest-900 text-white font-bold text-sm py-4 px-4 rounded-xl flex items-center justify-center gap-2 shadow-md transition-all active:scale-[0.99] cursor-pointer">
                            <span class="material-symbols-outlined text-[20px]">print</span>
                            <span>Proses &amp; Cetak Tiket Loket</span>
                        </button>
                    </div>
                </div>

            </div>

        </div>
    </main>

    <!-- MODAL SUKSES TIKET LOKET -->
    <div id="modalSuksesLoket" class="fixed inset-0 bg-ink-900/60 backdrop-blur-sm z-50 hidden flex items-center justify-center p-4">
        <div class="bg-paper-0 rounded-3xl max-w-md w-full p-6 sm:p-8 space-y-6 shadow-2xl animate-in fade-in zoom-in duration-150">
            <div class="w-16 h-16 rounded-full bg-secondary-container text-forest-700 flex items-center justify-center mx-auto">
                <span class="material-symbols-outlined text-[36px]">print</span>
            </div>

            <div class="text-center space-y-2">
                <span class="text-xs uppercase font-bold tracking-widest text-forest-700 block">Pemesanan Loket Berhasil</span>
                <h3 class="font-headline-md text-2xl font-semibold text-forest-900">Tiket Berhasil Diterbitkan!</h3>
                <p class="text-sm text-ink-600">ID Tiket: <strong class="font-mono text-forest-900">#PSN-202410-102</strong> atas nama <strong id="modalSuksesNama">Bpk. Hendrawan</strong>.</p>
            </div>

            <div class="bg-cream-50 p-4 rounded-xl border border-surface-container text-xs space-y-2">
                <div class="flex justify-between">
                    <span class="text-ink-600">Nomor Kursi:</span>
                    <strong class="text-forest-900 font-mono" id="modalSuksesKursi">Kursi 5</strong>
                </div>
                <div class="flex justify-between">
                    <span class="text-ink-600">Total Dibayar:</span>
                    <strong class="text-forest-900 font-mono">Rp 120.000 (Tunai Lunas)</strong>
                </div>
                <div class="flex justify-between">
                    <span class="text-ink-600">Uang Kembalian Diserahkan:</span>
                    <strong class="text-green-700 font-mono font-bold" id="modalSuksesKembalian">Rp 30.000</strong>
                </div>
            </div>

            <div class="space-y-2">
                <button onclick="window.print()" class="w-full bg-forest-700 hover:bg-forest-900 text-white font-bold text-xs py-3 rounded-xl flex items-center justify-center gap-2">
                    <span class="material-symbols-outlined text-[18px]">print</span>
                    Cetak Struk Kertas Kasir (Thermal)
                </button>
                <button onclick="location.reload()" class="w-full bg-surface-container hover:bg-surface-container-high text-forest-900 font-medium text-xs py-2.5 rounded-xl">
                    Layani Penumpang Baru Lagi
                </button>
            </div>
        </div>
    </div>

    <!-- ROLE SWITCHER INCLUDED -->
    @include('partials.role-switcher')

    <script>
        let currentSeat = 5;

        function pilihKursiLoket(noKursi, el) {
            document.querySelectorAll('.seat-btn').forEach(btn => {
                btn.classList.remove('bg-forest-900', 'ring-2', 'ring-amber-500');
                btn.classList.add('bg-green-700');
            });
            el.classList.remove('bg-green-700');
            el.classList.add('bg-forest-900', 'ring-2', 'ring-amber-500');
            currentSeat = noKursi;
            document.getElementById('sumKursi').textContent = 'Kursi ' + noKursi + ' (K-' + noKursi + ')';
        }

        function updateSummary() {
            const nama = document.getElementById('inputNama').value || 'Nama Penumpang';
            const asal = document.getElementById('selAsal').value;
            const tujuan = document.getElementById('selTujuan').value;
            const jam = document.getElementById('selJam').value;

            document.getElementById('sumNama').textContent = nama;
            document.getElementById('sumRute').textContent = asal.split(' ')[0] + ' → ' + tujuan.split(' ')[0];
            document.getElementById('sumJadwal').textContent = '10 Nov • ' + jam.split(' ')[0];
        }

        function hitungKembalian() {
            const uang = parseFloat(document.getElementById('inputUang').value) || 0;
            const tarif = 120000;
            const kembalian = uang - tarif;
            if (kembalian >= 0) {
                document.getElementById('displayKembalian').textContent = 'Rp ' + kembalian.toLocaleString('id-ID');
                document.getElementById('displayKembalian').className = 'font-mono text-base font-bold text-green-700';
            } else {
                document.getElementById('displayKembalian').textContent = 'Kurang Rp ' + Math.abs(kembalian).toLocaleString('id-ID');
                document.getElementById('displayKembalian').className = 'font-mono text-base font-bold text-red-600';
            }
        }

        function prosesTiketLoket() {
            const nama = document.getElementById('inputNama').value;
            if (!nama) {
                alert('Silakan isi nama penumpang terlebih dahulu.');
                return;
            }
            document.getElementById('modalSuksesNama').textContent = nama;
            document.getElementById('modalSuksesKursi').textContent = 'Kursi ' + currentSeat;
            document.getElementById('modalSuksesKembalian').textContent = document.getElementById('displayKembalian').textContent;
            document.getElementById('modalSuksesLoket').classList.remove('hidden');
        }
    </script>

</body>
</html>

