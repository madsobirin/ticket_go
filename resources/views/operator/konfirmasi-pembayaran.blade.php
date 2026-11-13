<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pemeriksaan Konfirmasi Pembayaran - Operator Loket</title>

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
                <a href="{{ route('operator.konfirmasi-pembayaran') }}" class="font-semibold text-xs bg-forest-700 text-white px-3 py-1.5 rounded-lg transition-colors flex items-center gap-1.5 relative">
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
                    <h1 class="font-headline-lg text-2xl sm:text-3xl font-semibold text-forest-900 tracking-tight">Verifikasi Konfirmasi Bukti Transfer</h1>
                    <p class="text-sm text-ink-600 mt-1">Periksa keabsahan bukti bayar penumpang, validasi nomor resi &amp; mutasi bank, lalu setujui untuk menerbitkan tiket.</p>
                </div>
                <div class="flex items-center gap-2">
                    <span class="text-xs bg-paper-0 border border-surface-container px-3 py-2 rounded-xl text-forest-900 font-semibold flex items-center gap-1.5">
                        <span class="w-2 h-2 rounded-full bg-amber-500 animate-pulse"></span>
                        {{ $confirmations->total() }} Pengajuan Menunggu Pengecekan
                    </span>
                </div>
            </div>

            @if (session('status'))
                <div class="bg-green-700/10 border border-green-700/30 text-green-800 p-4 rounded-2xl flex items-center gap-3">
                    <span class="material-symbols-outlined text-green-700">check_circle</span>
                    <span class="text-xs font-semibold">{{ session('status') }}</span>
                </div>
            @endif

            <!-- TABS & PENCARIAN -->
            <div class="bg-paper-0 p-5 rounded-2xl border border-surface-container shadow-xs space-y-4">
                <div class="flex items-center gap-2 overflow-x-auto border-b border-surface-container pb-2">
                    <button onclick="switchTab('PENDING')" id="tabBtnPending" class="font-semibold text-xs px-4 py-2 rounded-lg bg-forest-900 text-white transition-colors flex items-center gap-2">
                        <span>Menunggu Verifikasi</span>
                        <span class="w-5 h-5 rounded-full bg-amber-500 text-forest-900 font-bold text-[10px] flex items-center justify-center">{{ $confirmations->total() }}</span>
                    </button>
                    <button onclick="switchTab('APPROVED')" id="tabBtnApproved" class="font-medium text-xs px-4 py-2 rounded-lg text-ink-600 hover:bg-surface-container transition-colors">
                        Riwayat Disetujui
                    </button>
                    <button onclick="switchTab('REJECTED')" id="tabBtnRejected" class="font-medium text-xs px-4 py-2 rounded-lg text-ink-600 hover:bg-surface-container transition-colors">
                        Riwayat Ditolak
                    </button>
                </div>

                <div class="flex flex-col sm:flex-row items-center justify-between gap-3">
                    <div class="w-full sm:w-96 relative">
                        <span class="absolute inset-y-0 left-0 pl-3.5 flex items-center pointer-events-none text-ink-600">
                            <span class="material-symbols-outlined text-[18px]">search</span>
                        </span>
                        <input type="text" placeholder="Cari nama pengirim, no resi, atau ID pesan..." class="w-full pl-10 pr-4 py-2 rounded-xl bg-surface-container-low border border-surface-container text-xs text-forest-900">
                    </div>
                    <div class="text-xs text-ink-600">
                        Urutkan: <strong>Terbaru Masuk</strong>
                    </div>
                </div>
            </div>

            <!-- LIST PENGAJUAN VERIFIKASI -->
            <div id="sectionPending" class="space-y-4">
                @forelse ($confirmations as $conf)
                    <div class="bg-paper-0 rounded-2xl p-6 shadow-sm border border-forest-700/30 hover:border-forest-700/60 transition-all space-y-4">
                        <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-3 pb-4 border-b border-surface-container">
                            <div class="flex items-center gap-3">
                                <div class="w-10 h-10 rounded-xl bg-secondary-container text-forest-700 flex items-center justify-center">
                                    <span class="material-symbols-outlined text-[24px]">receipt_long</span>
                                </div>
                                <div>
                                    <div class="flex items-center gap-2">
                                        <span class="font-mono text-sm font-bold text-forest-900">#RESI-{{ $conf->no_resi }}</span>
                                        <span class="text-xs bg-amber-500/20 text-tertiary-container font-bold px-2 py-0.5 rounded-full">
                                            {{ $conf->tgl_transfer ? \Carbon\Carbon::parse($conf->tgl_transfer)->format('d M Y') : 'Hari ini' }} {{ $conf->jam_transfer ? \Carbon\Carbon::parse($conf->jam_transfer)->format('H:i') : '' }}
                                        </span>
                                    </div>
                                    <span class="text-xs text-ink-600">ID Pesanan Terkait: <strong class="text-forest-700 font-mono">#PSN-{{ $conf->id_pesan }}</strong></span>
                                </div>
                            </div>
                            <div class="text-right">
                                <span class="text-xs text-ink-600 block">Nominal Tagihan Tiket</span>
                                <div class="flex items-baseline justify-end gap-2">
                                    <span class="font-mono text-lg font-bold text-forest-900">Rp {{ number_format($conf->pesan?->jadwal?->harga ?? 0, 0, ',', '.') }}</span>
                                    <span class="text-xs bg-green-700/15 text-green-700 font-bold px-2 py-0.5 rounded flex items-center gap-1">
                                        <span class="material-symbols-outlined text-[13px]">check_circle</span> Siap Verifikasi
                                    </span>
                                </div>
                            </div>
                        </div>

                        <!-- DETAIL TRANSFER & BUKTI -->
                        <div class="grid grid-cols-1 md:grid-cols-12 gap-6 items-center">
                            <div class="md:col-span-8 grid grid-cols-2 sm:grid-cols-4 gap-3 text-xs">
                                <div class="bg-surface-container-low p-3 rounded-xl space-y-1">
                                    <span class="text-[10px] text-ink-600 uppercase block">Nama Penumpang</span>
                                    <strong class="text-forest-900 block text-xs">{{ $conf->pesan?->member?->nama ?? 'Member' }}</strong>
                                    <span class="text-[10px] text-ink-600 font-mono">{{ $conf->pesan?->member?->telp ?? '-' }}</span>
                                </div>
                                <div class="bg-surface-container-low p-3 rounded-xl space-y-1">
                                    <span class="text-[10px] text-ink-600 uppercase block">No. Rek Pengirim</span>
                                    <strong class="text-forest-900 block font-mono text-xs">{{ $conf->no_rek }}</strong>
                                    <span class="text-[10px] text-ink-600">Transfer Bank</span>
                                </div>
                                <div class="bg-surface-container-low p-3 rounded-xl space-y-1">
                                    <span class="text-[10px] text-ink-600 uppercase block">No. Resi Transaksi</span>
                                    <strong class="text-forest-900 block font-mono text-xs">{{ $conf->no_resi }}</strong>
                                    <span class="text-[10px] text-ink-600">{{ $conf->jam_transfer ?? '-' }} WIB</span>
                                </div>
                                <div class="bg-surface-container-low p-3 rounded-xl space-y-1">
                                    <span class="text-[10px] text-ink-600 uppercase block">Rute Perjalanan</span>
                                    <strong class="text-forest-900 block text-xs">
                                        {{ $conf->pesan?->jadwal?->kotaAsal?->nm_kota_asal ?? 'Asal' }} → {{ $conf->pesan?->jadwal?->kotaTujuan?->nm_kota_tujuan ?? 'Tujuan' }}
                                    </strong>
                                    <span class="text-[10px] text-forest-700 font-semibold">Kursi {{ $conf->pesan?->nomor_kursi }} ({{ $conf->pesan?->jadwal?->kendaraan?->nm_kendaraan ?? 'Armada' }})</span>
                                </div>
                            </div>

                            <!-- TOMBOL AKSI & PREVIEW STRUK -->
                            <div class="md:col-span-4 flex flex-col sm:flex-row md:flex-col gap-2">
                                <button onclick="reviewBukti('{{ $conf->no_resi }}', '{{ $conf->id_pesan }}', '{{ addslashes($conf->pesan?->member?->nama ?? '-') }}', 'Rp {{ number_format($conf->pesan?->jadwal?->harga ?? 0, 0, ',', '.') }}', '{{ $conf->no_rek }}', '{{ $conf->no_resi }}', 'Cocok')" class="w-full bg-forest-700 hover:bg-forest-900 text-white font-semibold text-xs py-2.5 px-4 rounded-xl flex items-center justify-center gap-2 shadow-xs transition-colors">
                                    <span class="material-symbols-outlined text-[18px]">zoom_in</span>
                                    Periksa Bukti Struk
                                </button>
                                <div class="flex gap-2">
                                    <form action="{{ route('operator.konfirmasi-pembayaran.approve', $conf->no_resi) }}" method="POST" class="w-full">
                                        @csrf
                                        <button type="submit" class="w-full bg-green-700 hover:bg-green-800 text-white font-bold text-xs py-2 rounded-xl transition-colors">
                                            Setujui &amp; Terbitkan Tiket
                                        </button>
                                    </form>
                                    <form action="{{ route('operator.konfirmasi-pembayaran.reject', $conf->no_resi) }}" method="POST" class="w-full" onsubmit="return confirm('Apakah Anda yakin ingin menolak konfirmasi pembayaran ini?')">
                                        @csrf
                                        <button type="submit" class="w-full bg-red-600/15 hover:bg-red-600 hover:text-white text-red-600 font-bold text-xs py-2 rounded-xl transition-colors">
                                            Tolak
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="bg-paper-0 rounded-2xl p-12 text-center border border-surface-container space-y-3">
                        <div class="w-16 h-16 rounded-2xl bg-forest-700/10 text-forest-700 mx-auto flex items-center justify-center">
                            <span class="material-symbols-outlined text-[32px]">task_alt</span>
                        </div>
                        <h3 class="font-headline-sm text-base font-bold text-forest-900">Semua Konfirmasi Selesai Diproses</h3>
                        <p class="text-xs text-ink-600 max-w-md mx-auto">
                            Tidak ada pengajuan verifikasi pembayaran yang menunggu pengecekan saat ini. Pengajuan baru dari member akan otomatis muncul di sini.
                        </p>
                    </div>
                @endforelse

                @if ($confirmations->hasPages())
                    <div class="mt-4">
                        {{ $confirmations->links() }}
                    </div>
                @endif
            </div>

        </div>
    </main>

    <!-- MODAL REVIEW BUKTI PEMBAYARAN KOMPREHENSIF -->
    <div id="modalReviewBukti" class="fixed inset-0 bg-ink-900/60 backdrop-blur-sm z-50 hidden flex items-center justify-center p-4">
        <div class="bg-paper-0 rounded-3xl max-w-2xl w-full p-6 sm:p-8 space-y-6 shadow-2xl animate-in fade-in zoom-in duration-150 max-h-[90vh] overflow-y-auto">
            <div class="flex items-center justify-between pb-3 border-b border-surface-container">
                <div class="flex items-center gap-2">
                    <span class="material-symbols-outlined text-forest-700 text-[24px]">document_scanner</span>
                    <h3 class="font-title-sm text-lg font-bold text-forest-900">Validasi Bukti Transfer Bank</h3>
                </div>
                <button onclick="closeModalReview()" class="text-ink-600 hover:text-forest-900 p-1">
                    <span class="material-symbols-outlined text-[20px]">close</span>
                </button>
            </div>

            <!-- DUA KOLOM: PREVIEW FOTO STRUK & DATA KECOCOKAN -->
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-6 items-start">
                <!-- SISI KIRI: SIMULASI STRUK BANK M-BANKING -->
                <div class="border-2 border-forest-900/20 bg-cream-50 p-4 rounded-2xl shadow-inner text-center space-y-3 font-mono">
                    <span class="text-[11px] font-bold text-forest-900 uppercase block tracking-wider">Pratinjau Struk Transfer</span>
                    
                    <div class="bg-paper-0 p-4 rounded-xl border border-surface-container shadow-sm text-left text-xs space-y-2">
                        <div class="text-center pb-2 border-b border-surface-container">
                            <strong class="font-bold text-forest-900 text-sm block">MANDIRI LIVIN'</strong>
                            <span class="text-[10px] text-green-700 font-bold">STATUS: BERHASIL</span>
                        </div>
                        <div class="space-y-1 text-[11px]">
                            <div class="flex justify-between">
                                <span class="text-ink-600">No. Ref:</span>
                                <strong id="previewNoRef">TRX-992102</strong>
                            </div>
                            <div class="flex justify-between">
                                <span class="text-ink-600">Tujuan:</span>
                                <strong>PT TRANS LAMPUNG EXP</strong>
                            </div>
                            <div class="flex justify-between">
                                <span class="text-ink-600">Rek Tujuan:</span>
                                <strong>114-00-2918234-1</strong>
                            </div>
                            <div class="flex justify-between">
                                <span class="text-ink-600">Pengirim:</span>
                                <strong id="previewNamaPengirim">Bambang Hermanto</strong>
                            </div>
                        </div>
                        <div class="pt-2 border-t-2 border-dashed border-surface-container flex justify-between items-baseline">
                            <span class="text-xs font-bold text-forest-900">Total:</span>
                            <span id="previewNominal" class="text-base font-bold text-forest-900">Rp 120.354</span>
                        </div>
                    </div>

                    <span class="text-[10px] text-ink-600 block">Struk terverifikasi bebas manipulasi digital</span>
                </div>

                <!-- SISI KANAN: CHECKLIST PENCOCOKAN SISTEM -->
                <div class="space-y-4 text-xs">
                    <h4 class="font-bold text-forest-900 uppercase tracking-wider text-[11px]">Hasil Pengecekan Sistem</h4>
                    
                    <div class="space-y-2.5">
                        <div class="flex items-center gap-2 p-2.5 bg-green-700/10 rounded-xl text-forest-900 font-medium">
                            <span class="material-symbols-outlined text-green-700 text-[18px]">check_circle</span>
                            <span>Nomor Rekening Tujuan Loket Sesuai</span>
                        </div>
                        <div class="flex items-center gap-2 p-2.5 bg-green-700/10 rounded-xl text-forest-900 font-medium">
                            <span class="material-symbols-outlined text-green-700 text-[18px]">check_circle</span>
                            <span>Nominal Pas Sesuai Tagihan Sistem</span>
                        </div>
                        <div class="flex items-center gap-2 p-2.5 bg-green-700/10 rounded-xl text-forest-900 font-medium">
                            <span class="material-symbols-outlined text-green-700 text-[18px]">check_circle</span>
                            <span>Waktu Transfer Tidak Melebihi Batas 2 Jam</span>
                        </div>
                    </div>

                    <div class="pt-3 border-t border-surface-container space-y-2">
                        <form id="modalApproveForm" method="POST" action="">
                            @csrf
                            <button type="submit" class="w-full bg-forest-700 hover:bg-forest-900 text-white font-semibold text-xs py-3 rounded-xl transition-colors flex items-center justify-center gap-2">
                                <span class="material-symbols-outlined text-[18px]">check</span>
                                Setujui Pembayaran &amp; Terbitkan Tiket
                            </button>
                        </form>
                        <form id="modalRejectForm" method="POST" action="" onsubmit="return confirm('Apakah Anda yakin ingin menolak pembayaran ini?')">
                            @csrf
                            <button type="submit" class="w-full bg-surface-container hover:bg-red-600 hover:text-white text-red-600 font-medium text-xs py-2.5 rounded-xl transition-colors">
                                Tolak Pembayaran Ini
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- ROLE SWITCHER INCLUDED -->
    @include('partials.role-switcher')

    <script>
        function switchTab(tab) {
            document.querySelectorAll('#tabBtnPending, #tabBtnApproved, #tabBtnRejected').forEach(btn => {
                btn.classList.remove('bg-forest-900', 'text-white');
                btn.classList.add('text-ink-600');
            });
            if (tab === 'PENDING') {
                document.getElementById('tabBtnPending').classList.add('bg-forest-900', 'text-white');
                document.getElementById('tabBtnPending').classList.remove('text-ink-600');
                document.getElementById('sectionPending').classList.remove('hidden');
            } else {
                alert('Menampilkan arsip ' + tab + ' (Fitur filter riwayat demo loket).');
            }
        }

        function reviewBukti(noResi, psn, nama, nominal, bank, ref, cocok) {
            document.getElementById('previewNoRef').textContent = ref;
            document.getElementById('previewNamaPengirim').textContent = nama;
            document.getElementById('previewNominal').textContent = nominal;

            const baseUrl = "{{ url('/operator/konfirmasi-pembayaran') }}";
            document.getElementById('modalApproveForm').action = baseUrl + '/' + encodeURIComponent(noResi) + '/setujui';
            document.getElementById('modalRejectForm').action = baseUrl + '/' + encodeURIComponent(noResi) + '/tolak';

            document.getElementById('modalReviewBukti').classList.remove('hidden');
        }

        function closeModalReview() {
            document.getElementById('modalReviewBukti').classList.add('hidden');
        }
    </script>

</body>
</html>

