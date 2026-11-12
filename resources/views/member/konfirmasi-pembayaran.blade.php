<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Konfirmasi Pembayaran - Trans Lampung Express</title>

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

            <!-- PAGE TITLE & HERO -->
            <div class="mb-8 flex flex-col md:flex-row md:items-center justify-between gap-4">
                <div>
                    <h1 class="font-headline-lg text-2xl sm:text-3xl font-semibold text-forest-900 tracking-tight">Formulir Konfirmasi Pembayaran</h1>
                    <p class="text-sm text-ink-600 mt-1">Unggah bukti transfer Anda agar staf loket dapat segera memverifikasi dan menerbitkan e-tiket perjalanan Anda.</p>
                </div>
                <div class="flex items-center gap-2">
                    <a href="{{ route('member.pembayaran') }}" class="px-4 py-2 rounded-lg bg-surface-container hover:bg-surface-container-high text-forest-900 font-semibold text-xs transition-colors flex items-center gap-1.5">
                        <span class="material-symbols-outlined text-[16px]">account_balance_wallet</span>
                        Lihat No. Rekening Loket
                    </a>
                </div>
            </div>

            <!-- GRID FORM & STATUS -->
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 items-start">

                <!-- FORM KONFIRMASI (KOLOM KIRI) -->
                <div class="lg:col-span-8 bg-paper-0 rounded-2xl p-6 sm:p-8 shadow-sm border border-surface-container space-y-6">
                    <div class="flex items-center gap-3 pb-4 border-b border-surface-container">
                        <div class="w-10 h-10 rounded-xl bg-forest-700 text-white flex items-center justify-center">
                            <span class="material-symbols-outlined text-[22px]">receipt_long</span>
                        </div>
                        <div>
                            <h2 class="font-title-md text-lg font-bold text-forest-900">Rincian Data Transfer Bank</h2>
                            <p class="text-xs text-ink-600">Pastikan informasi yang diisi cocok dengan bukti struk / receipt transfer.</p>
                        </div>
                    </div>

                    <form id="formKonfirmasi" onsubmit="handleKonfirmasiSubmit(event)" class="space-y-6">
                        <!-- ID PEMESANAN -->
                        <div>
                            <label class="block text-xs font-bold text-forest-900 uppercase tracking-wider mb-2" for="id_pesan">
                                ID Pemesanan Tiket <span class="text-red-600">*</span>
                            </label>
                            <select id="id_pesan" name="id_pesan" class="w-full bg-surface-container-low focus:bg-paper-0 border border-surface-container focus:border-forest-700 focus:ring-1 focus:ring-forest-700 rounded-xl p-3.5 text-sm text-forest-900 font-medium transition-all" required>
                                <option value="PSN-202410-098" selected>#PSN-202410-098 - Bandar Lampung → Krui (Rp 120.354 - Belum Bayar)</option>
                                <option value="PSN-202410-099">#PSN-202410-099 - Bandar Lampung → Metro (Rp 45.000 - Belum Bayar)</option>
                            </select>
                            <span class="text-[11px] text-ink-600 mt-1 block">Pilih pesanan yang ingin Anda konfirmasikan pembayarannya.</span>
                        </div>

                        <!-- BANK TUJUAN & NOMINAL -->
                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                            <div>
                                <label class="block text-xs font-bold text-forest-900 uppercase tracking-wider mb-2" for="bank_tujuan">
                                    Rekening Tujuan Loket <span class="text-red-600">*</span>
                                </label>
                                <select id="bank_tujuan" name="bank_tujuan" class="w-full bg-surface-container-low focus:bg-paper-0 border border-surface-container focus:border-forest-700 focus:ring-1 focus:ring-forest-700 rounded-xl p-3 text-sm text-forest-900" required>
                                    <option value="MANDIRI" selected>Bank Mandiri - 1140029182341 (PT Trans Lampung)</option>
                                    <option value="BRI">Bank BRI - 009801002345531 (PT Trans Lampung)</option>
                                    <option value="BCA">Bank BCA - 8270918821 (PT Trans Lampung)</option>
                                    <option value="QRIS">QRIS Nasional - PT Trans Lampung Express</option>
                                </select>
                            </div>
                            <div>
                                <label class="block text-xs font-bold text-forest-900 uppercase tracking-wider mb-2" for="nominal_transfer">
                                    Jumlah Nominal Ditransfer (Rp) <span class="text-red-600">*</span>
                                </label>
                                <input id="nominal_transfer" name="nominal_transfer" type="text" value="120.354" class="w-full bg-surface-container-low focus:bg-paper-0 border border-surface-container focus:border-forest-700 focus:ring-1 focus:ring-forest-700 rounded-xl p-3 text-sm text-forest-900 font-mono font-bold" placeholder="cth. 120.354" required>
                            </div>
                        </div>

                        <!-- REKENING PENGIRIM & NAMA PEMILIK -->
                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                            <div>
                                <label class="block text-xs font-bold text-forest-900 uppercase tracking-wider mb-2" for="nama_pengirim">
                                    Nama Pemilik Rekening Pengirim <span class="text-red-600">*</span>
                                </label>
                                <input id="nama_pengirim" name="nama_pengirim" type="text" value="{{ auth()->user()->name ?? '' }}" class="w-full bg-surface-container-low focus:bg-paper-0 border border-surface-container focus:border-forest-700 focus:ring-1 focus:ring-forest-700 rounded-xl p-3 text-sm text-forest-900" placeholder="Nama sesuai rekening bank Anda" required>
                            </div>
                            <div>
                                <label class="block text-xs font-bold text-forest-900 uppercase tracking-wider mb-2" for="no_rek_pengirim">
                                    Nomor Rekening Pengirim <span class="text-red-600">*</span>
                                </label>
                                <input id="no_rek_pengirim" name="no_rek_pengirim" type="text" value="1140092817291" class="w-full bg-surface-container-low focus:bg-paper-0 border border-surface-container focus:border-forest-700 focus:ring-1 focus:ring-forest-700 rounded-xl p-3 text-sm text-forest-900 font-mono" placeholder="cth. 1140092817291" required>
                            </div>
                        </div>

                        <!-- NO RESI & WAKTU TRANSFER -->
                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                            <div>
                                <label class="block text-xs font-bold text-forest-900 uppercase tracking-wider mb-2" for="no_resi">
                                    Nomor Resi / Ref Transaksi Bank <span class="text-red-600">*</span>
                                </label>
                                <input id="no_resi" name="no_resi" type="text" value="TRX-202410-992102" class="w-full bg-surface-container-low focus:bg-paper-0 border border-surface-container focus:border-forest-700 focus:ring-1 focus:ring-forest-700 rounded-xl p-3 text-sm text-forest-900 font-mono" placeholder="Nomor referensi dari bukti transfer" required>
                            </div>
                            <div>
                                <label class="block text-xs font-bold text-forest-900 uppercase tracking-wider mb-2" for="tanggal_transfer">
                                    Waktu / Jam Transfer <span class="text-red-600">*</span>
                                </label>
                                <input id="tanggal_transfer" name="tanggal_transfer" type="datetime-local" value="2026-11-08T14:35" class="w-full bg-surface-container-low focus:bg-paper-0 border border-surface-container focus:border-forest-700 focus:ring-1 focus:ring-forest-700 rounded-xl p-3 text-sm text-forest-900" required>
                            </div>
                        </div>

                        <!-- UPLOAD BUKTI STRUK TRANSFER -->
                        <div>
                            <label class="block text-xs font-bold text-forest-900 uppercase tracking-wider mb-2">
                                Unggah Bukti Struk / Foto Transfer (JPG/PNG/PDF, Max 5MB) <span class="text-red-600">*</span>
                            </label>
                            <div class="border-2 border-dashed border-forest-700/40 hover:border-forest-700 rounded-2xl p-6 bg-surface-container-low/40 text-center cursor-pointer transition-colors" onclick="document.getElementById('fileBukti').click()">
                                <input type="file" id="fileBukti" name="file_bukti" accept="image/*,application/pdf" class="hidden" onchange="previewFile(event)">
                                <div id="uploadPlaceholder" class="space-y-2">
                                    <div class="w-12 h-12 rounded-full bg-sage-100 text-forest-700 flex items-center justify-center mx-auto">
                                        <span class="material-symbols-outlined text-[24px]">cloud_upload</span>
                                    </div>
                                    <div class="text-sm text-forest-900 font-semibold">
                                        Klik untuk memilih file bukti transfer atau drag &amp; drop di sini
                                    </div>
                                    <p class="text-xs text-ink-600">Pastikan tulisan nominal, nomor rekening, dan tanggal transfer terbaca jelas.</p>
                                </div>
                                <!-- FILE PREVIEW ACTIVE -->
                                <div id="uploadPreview" class="hidden flex items-center justify-center gap-4 bg-paper-0 p-3 rounded-xl border border-surface-container max-w-md mx-auto">
                                    <div class="w-12 h-12 rounded-lg bg-green-700/10 text-green-700 flex items-center justify-center">
                                        <span class="material-symbols-outlined text-[24px]">image</span>
                                    </div>
                                    <div class="text-left flex-1 min-w-0">
                                        <span id="fileName" class="text-xs font-bold text-forest-900 block truncate">struk_mandiri_120354.jpg</span>
                                        <span id="fileSize" class="text-[11px] text-green-700 font-medium">1.4 MB • Siap Dikirim</span>
                                    </div>
                                    <button type="button" onclick="event.stopPropagation(); removeFile()" class="text-ink-600 hover:text-red-600 p-1">
                                        <span class="material-symbols-outlined text-[18px]">delete</span>
                                    </button>
                                </div>
                            </div>
                        </div>

                        <!-- CATATAN OPSIONAL -->
                        <div>
                            <label class="block text-xs font-bold text-forest-900 uppercase tracking-wider mb-2" for="catatan">
                                Catatan Tambahan (Opsional)
                            </label>
                            <textarea id="catatan" name="catatan" rows="2" class="w-full bg-surface-container-low focus:bg-paper-0 border border-surface-container focus:border-forest-700 focus:ring-1 focus:ring-forest-700 rounded-xl p-3 text-sm text-forest-900 placeholder:text-ink-600/60" placeholder="Contoh: Transfer melalui m-banking Mandiri atas nama istri atau catatan penjemputan..."></textarea>
                        </div>

                        <!-- TOMBOL SUBMIT -->
                        <div class="pt-2">
                            <button type="submit" id="btnKirimKonfirmasi" class="w-full bg-forest-700 hover:bg-forest-900 text-white font-semibold text-sm py-4 px-6 rounded-xl flex items-center justify-center gap-2.5 shadow-md transition-all active:scale-[0.99] cursor-pointer">
                                <span class="material-symbols-outlined text-[20px]">send</span>
                                <span>Kirimkan Konfirmasi Pembayaran</span>
                            </button>
                        </div>
                    </form>
                </div>

                <!-- RIWAYAT KONFIRMASI TERKINI (KOLOM KANAN) -->
                <div class="lg:col-span-4 space-y-6">

                    <!-- KARTU STATUS PENGAJUAN -->
                    <div class="bg-paper-0 rounded-2xl p-6 shadow-sm border border-surface-container space-y-4">
                        <div class="flex items-center justify-between pb-3 border-b border-surface-container">
                            <h3 class="font-title-sm text-base font-bold text-forest-900">Riwayat Status Pembayaran</h3>
                            <span class="text-xs bg-sage-100 text-forest-900 font-semibold px-2 py-0.5 rounded">Akun Anda</span>
                        </div>

                        <div class="space-y-3.5">
                            <!-- ITEM 1: MENUNGGU VERIFIKASI -->
                            <div class="p-4 rounded-xl bg-surface-container-low border border-amber-500/30 space-y-2">
                                <div class="flex items-center justify-between">
                                    <span class="font-mono text-xs font-bold text-forest-900">#PSN-202410-098</span>
                                    <span class="bg-amber-500/15 text-tertiary-container text-[11px] font-bold px-2 py-0.5 rounded-full flex items-center gap-1">
                                        <span class="w-1.5 h-1.5 rounded-full bg-amber-500 animate-pulse"></span>
                                        Menunggu Verifikasi
                                    </span>
                                </div>
                                <div class="text-xs text-ink-600 flex justify-between">
                                    <span>Bandar Lampung → Krui</span>
                                    <span class="font-bold text-forest-900">Rp 120.354</span>
                                </div>
                                <div class="text-[11px] text-ink-600 border-t border-surface-container pt-1.5 flex items-center justify-between">
                                    <span>Bank Mandiri • Resi TRX-9921</span>
                                    <span class="text-forest-700 font-medium">Est. &lt; 15 mnt</span>
                                </div>
                            </div>

                            <!-- ITEM 2: LUNAS / TERVERIFIKASI -->
                            <div class="p-4 rounded-xl bg-surface-container-low border border-green-700/20 space-y-2">
                                <div class="flex items-center justify-between">
                                    <span class="font-mono text-xs font-bold text-forest-900">#PSN-202410-055</span>
                                    <span class="bg-green-700/15 text-green-700 text-[11px] font-bold px-2 py-0.5 rounded-full flex items-center gap-1">
                                        <span class="material-symbols-outlined text-[13px]">check</span>
                                        Lunas &amp; Tiket Terbit
                                    </span>
                                </div>
                                <div class="text-xs text-ink-600 flex justify-between">
                                    <span>Bandar Lampung → Metro</span>
                                    <span class="font-bold text-forest-900">Rp 45.000</span>
                                </div>
                                <div class="text-[11px] text-ink-600 border-t border-surface-container pt-1.5 flex items-center justify-between">
                                    <span>Trip Selesai (2 Nov 2026)</span>
                                    <button onclick="alert('Mengunduh e-tiket #PSN-202410-055...')" class="text-forest-700 hover:underline font-semibold flex items-center gap-1">
                                        <span class="material-symbols-outlined text-[12px]">download</span> E-Tiket
                                    </button>
                                </div>
                            </div>

                            <!-- ITEM 3: DITOLAK -->
                            <div class="p-4 rounded-xl bg-surface-container-low border border-red-600/20 space-y-2">
                                <div class="flex items-center justify-between">
                                    <span class="font-mono text-xs font-bold text-forest-900">#PSN-202409-112</span>
                                    <span class="bg-red-600/15 text-red-600 text-[11px] font-bold px-2 py-0.5 rounded-full">
                                        Ditolak: Resi Buram
                                    </span>
                                </div>
                                <div class="text-xs text-ink-600 flex justify-between">
                                    <span>Bandar Lampung → Kalianda</span>
                                    <span class="font-bold text-forest-900">Rp 50.000</span>
                                </div>
                                <div class="text-[11px] text-ink-600 border-t border-surface-container pt-1.5 flex items-center justify-between">
                                    <span>Catatan: Struk tidak terbaca</span>
                                    <button onclick="alert('Silakan upload ulang bukti struk yang baru.')" class="text-red-600 hover:underline font-semibold">
                                        Upload Ulang
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- TIPS & INFORMASI -->
                    <div class="bg-sage-100/70 rounded-2xl p-5 border border-surface-container space-y-2.5">
                        <div class="flex items-center gap-2 text-forest-900 font-bold text-xs uppercase tracking-wider">
                            <span class="material-symbols-outlined text-[18px] text-forest-700">timer</span>
                            Alur Verifikasi Pembayaran
                        </div>
                        <p class="text-xs text-ink-600 leading-relaxed">
                            Setelah bukti konfirmasi berhasil diunggah, petugas operasional loket di Pool Rajabasa akan memeriksa kecocokan mutasi bank dalam kurun waktu <strong>5 sampai 15 menit</strong>. Setelah diverifikasi, Anda dapat langsung mengunduh tiket elektronik dengan barcode perjalanan.
                        </p>
                    </div>

                </div>

            </div>

        </div>
    </main>

    <!-- MODAL SUKSES KONFIRMASI -->
    <div id="modalSuksesKonfirmasi" class="fixed inset-0 bg-ink-900/60 backdrop-blur-sm z-50 hidden flex items-center justify-center p-4">
        <div class="bg-paper-0 rounded-3xl max-w-md w-full p-6 sm:p-8 space-y-6 shadow-2xl animate-in fade-in zoom-in duration-200">
            <div class="w-16 h-16 rounded-full bg-secondary-container text-forest-700 flex items-center justify-center mx-auto">
                <span class="material-symbols-outlined text-[36px]">task_alt</span>
            </div>

            <div class="text-center space-y-2">
                <span class="text-xs uppercase font-bold tracking-widest text-forest-700 block">Bukti Pembayaran Diterima</span>
                <h3 class="font-headline-md text-2xl font-semibold text-forest-900">Konfirmasi Berhasil Dikirim!</h3>
                <p class="text-sm text-ink-600 leading-relaxed">
                    Data bukti transfer Anda dengan ID <strong class="text-forest-900 font-mono">#PSN-202410-098</strong> telah masuk ke antrean verifikasi staf loket Trans Lampung Express.
                </p>
            </div>

            <div class="bg-cream-50 p-4 rounded-xl border border-surface-container space-y-2 text-xs">
                <div class="flex justify-between text-ink-600">
                    <span>Estimasi Verifikasi:</span>
                    <span class="font-bold text-forest-900">5 - 15 Menit</span>
                </div>
                <div class="flex justify-between text-ink-600">
                    <span>Nomor Tiket Pesanan:</span>
                    <span class="font-bold text-forest-900 font-mono">TL-KRU-0983</span>
                </div>
                <div class="flex justify-between text-ink-600">
                    <span>Status Tiket:</span>
                    <span class="font-bold text-amber-500">Menunggu Validasi Loket</span>
                </div>
            </div>

            <div class="space-y-2.5 pt-2">
                <button onclick="closeModalKonfirmasi()" class="w-full bg-forest-700 hover:bg-forest-900 text-white font-semibold text-sm py-3.5 px-4 rounded-xl transition-colors">
                    Selesai &amp; Pantau Status Tiket
                </button>
                <a href="{{ route('member.beranda') }}" class="w-full block text-center text-xs text-ink-600 hover:text-forest-900 py-2 font-medium">
                    Kembali ke Beranda Utama
                </a>
            </div>
        </div>
    </div>

    <!-- ROLE SWITCHER INCLUDED -->
    @include('partials.role-switcher')

    <script>
        function previewFile(event) {
            const file = event.target.files[0];
            if (file) {
                document.getElementById('uploadPlaceholder').classList.add('hidden');
                document.getElementById('uploadPreview').classList.remove('hidden');
                document.getElementById('fileName').textContent = file.name;
                document.getElementById('fileSize').textContent = (file.size / (1024 * 1024)).toFixed(2) + ' MB • Siap Dikirim';
            }
        }

        function removeFile() {
            document.getElementById('fileBukti').value = '';
            document.getElementById('uploadPlaceholder').classList.remove('hidden');
            document.getElementById('uploadPreview').classList.add('hidden');
        }

        function handleKonfirmasiSubmit(event) {
            event.preventDefault();
            const btn = document.getElementById('btnKirimKonfirmasi');
            btn.disabled = true;
            btn.innerHTML = `
                <span class="w-4 h-4 rounded-full border-2 border-white border-t-transparent animate-spin inline-block"></span>
                <span>Mengirimkan Bukti Transfer...</span>
            `;

            setTimeout(() => {
                btn.disabled = false;
                btn.innerHTML = `
                    <span class="material-symbols-outlined text-[20px]">send</span>
                    <span>Kirimkan Konfirmasi Pembayaran</span>
                `;
                document.getElementById('modalSuksesKonfirmasi').classList.remove('hidden');
            }, 800);
        }

        function closeModalKonfirmasi() {
            document.getElementById('modalSuksesKonfirmasi').classList.add('hidden');
        }
    </script>

</body>
</html>

