<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>E-Tiket Resmi #TKT-{{ str_pad($pesan->id_pesan, 6, '0', STR_PAD_LEFT) }} - Trans Lampung Express</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=DM+Sans:ital,opsz,wght@0,9..40,100..1000;1,9..40,100..1000&family=Source+Serif+4:ital,opsz,wght@0,8..60,200..900;1,8..60,200..900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&display=swap" rel="stylesheet">

    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        'cream-50': '#FAF8F2',
                        'forest-700': '#285A4E',
                        'forest-900': '#173B35',
                        'paper-0': '#FFFFFF',
                        'ink-900': '#202521',
                        'ink-600': '#65716A',
                        'amber-500': '#D9953D',
                        'surface-container': '#EBEFE8',
                        'surface-container-low': '#F0F5EE',
                    }
                }
            }
        };
    </script>
    <style>
        @media print {
            .no-print {
                display: none !important;
            }
            body {
                background: white !important;
                padding: 0 !important;
            }
            .ticket-card {
                box-shadow: none !important;
                border: 1px solid #ddd !important;
            }
        }
    </style>
</head>
<body class="bg-cream-50 font-sans text-ink-900 min-h-screen p-4 sm:p-8 flex flex-col items-center justify-center">

    <!-- ACTION BAR (NO PRINT) -->
    <div class="no-print max-w-2xl w-full mb-6 flex items-center justify-between">
        <a href="{{ route('member.pesanan') }}" class="inline-flex items-center gap-1.5 text-xs font-semibold text-forest-700 hover:text-forest-900 transition-colors bg-paper-0 px-3.5 py-2 rounded-xl border border-surface-container shadow-xs">
            <span class="material-symbols-outlined text-[18px]">arrow_back</span>
            <span>Kembali ke Riwayat Pesanan</span>
        </a>
        <button onclick="window.print()" class="inline-flex items-center gap-2 text-xs font-bold bg-forest-700 hover:bg-forest-900 text-white px-5 py-2.5 rounded-xl shadow-sm transition-all cursor-pointer">
            <span class="material-symbols-outlined text-[18px]">print</span>
            <span>Cetak / Simpan PDF</span>
        </button>
    </div>

    <!-- TIKET RESMI -->
    <div class="ticket-card max-w-2xl w-full bg-paper-0 rounded-3xl overflow-hidden shadow-xl border border-surface-container">
        <!-- HEADER TIKET -->
        <div class="bg-forest-900 text-white p-6 sm:p-8 relative">
            <div class="flex items-center justify-between pb-4 border-b border-white/15">
                <div class="flex items-center gap-3">
                    <div class="w-10 h-10 rounded-xl bg-amber-500 text-forest-900 flex items-center justify-center font-bold">
                        <span class="material-symbols-outlined text-[24px]">directions_bus</span>
                    </div>
                    <div>
                        <h1 class="text-lg sm:text-xl font-bold tracking-tight leading-none text-white">Trans Lampung Express</h1>
                        <span class="text-[11px] text-white/70 tracking-wider uppercase font-medium">Tiket Perjalanan Resmi Antar Kota</span>
                    </div>
                </div>
                <div class="text-right">
                    <span class="text-[10px] uppercase tracking-wider text-white/70 block">Nomor Tiket</span>
                    <strong class="font-mono text-sm sm:text-base font-bold text-amber-400">#TKT-{{ str_pad($pesan->id_pesan, 6, '0', STR_PAD_LEFT) }}</strong>
                </div>
            </div>

            <!-- STATUS TIKET -->
            <div class="mt-4 flex flex-wrap items-center justify-between gap-3">
                <div class="flex items-center gap-2">
                    @if ($pesan->status === 'Lunas')
                        <span class="inline-flex items-center gap-1.5 bg-green-500/20 text-green-300 border border-green-500/40 text-xs font-bold px-3 py-1 rounded-full">
                            <span class="material-symbols-outlined text-[14px]">check_circle</span>
                            Lunas • Terverifikasi Loket
                        </span>
                    @elseif ($pesan->status === 'Menunggu Konfirmasi')
                        <span class="inline-flex items-center gap-1.5 bg-amber-500/20 text-amber-300 border border-amber-500/40 text-xs font-bold px-3 py-1 rounded-full">
                            <span class="material-symbols-outlined text-[14px]">hourglass_top</span>
                            Menunggu Verifikasi Loket
                        </span>
                    @else
                        <span class="inline-flex items-center gap-1.5 bg-red-500/20 text-red-300 border border-red-500/40 text-xs font-bold px-3 py-1 rounded-full">
                            <span class="material-symbols-outlined text-[14px]">pending</span>
                            Menunggu Pembayaran
                        </span>
                    @endif
                </div>
                <span class="text-xs text-white/80 font-mono">ID Pesan: #PSN-{{ str_pad($pesan->id_pesan, 4, '0', STR_PAD_LEFT) }}</span>
            </div>
        </div>

        <!-- BODY TIKET -->
        <div class="p-6 sm:p-8 space-y-6">
            <!-- RUTE ASAL & TUJUAN -->
            <div class="bg-surface-container-low p-5 rounded-2xl flex flex-col sm:flex-row items-start sm:items-center justify-between gap-4">
                <div class="space-y-1">
                    <span class="text-[10px] text-ink-600 uppercase tracking-wider block font-semibold">Keberangkatan</span>
                    <strong class="text-base sm:text-lg font-bold text-forest-900">{{ $pesan->jadwal->kotaAsal->nm_kota_asal }}</strong>
                    <span class="text-xs text-ink-600 block">Pool Loket Utama</span>
                </div>
                <div class="flex items-center gap-2 text-forest-700 py-1">
                    <span class="material-symbols-outlined text-[20px]">arrow_forward</span>
                </div>
                <div class="space-y-1 sm:text-right">
                    <span class="text-[10px] text-ink-600 uppercase tracking-wider block font-semibold">Tujuan</span>
                    <strong class="text-base sm:text-lg font-bold text-forest-900">{{ $pesan->jadwal->kotaTujuan->nm_kota_tujuan }}</strong>
                    <span class="text-xs text-ink-600 block">Pool Terminal Tujuan</span>
                </div>
            </div>

            <!-- DETAIL JADWAL, KURSI, & PENUMPANG -->
            <div class="grid grid-cols-2 sm:grid-cols-4 gap-4 text-xs">
                <div class="bg-cream-50 p-3.5 rounded-xl border border-surface-container space-y-1">
                    <span class="text-[10px] text-ink-600 uppercase block font-semibold">Tanggal Berangkat</span>
                    <strong class="text-forest-900 block text-xs font-bold">{{ $pesan->jadwal->tgl_berangkat }}</strong>
                    <span class="text-[11px] text-forest-700 font-semibold">{{ $pesan->jadwal->jam_berangkat }} WIB</span>
                </div>
                <div class="bg-cream-50 p-3.5 rounded-xl border border-surface-container space-y-1">
                    <span class="text-[10px] text-ink-600 uppercase block font-semibold">Nomor Kursi</span>
                    <strong class="text-forest-900 block text-base font-black">Kursi {{ $pesan->nomor_kursi }}</strong>
                    <span class="text-[10px] text-ink-600">Pilihan Penumpang</span>
                </div>
                <div class="bg-cream-50 p-3.5 rounded-xl border border-surface-container space-y-1">
                    <span class="text-[10px] text-ink-600 uppercase block font-semibold">Armada Mobil</span>
                    <strong class="text-forest-900 block text-xs font-bold">{{ $pesan->jadwal->kendaraan->nm_kendaraan ?? $pesan->jadwal->kendaraan->jenis_mobil }}</strong>
                    <span class="text-[11px] font-mono text-ink-600">{{ $pesan->jadwal->kendaraan->no_polisi ?? $pesan->jadwal->kendaraan->nomor_polisi }}</span>
                </div>
                <div class="bg-cream-50 p-3.5 rounded-xl border border-surface-container space-y-1">
                    <span class="text-[10px] text-ink-600 uppercase block font-semibold">Nama Penumpang</span>
                    <strong class="text-forest-900 block text-xs font-bold truncate">{{ $pesan->member->nama }}</strong>
                    <span class="text-[11px] font-mono text-ink-600">{{ $pesan->member->telp ?? $pesan->member->telepon ?? '-' }}</span>
                </div>
            </div>

            <!-- PEMBAYARAN & BARCODE SIMULASI -->
            <div class="pt-4 border-t-2 border-dashed border-surface-container flex flex-col sm:flex-row items-center justify-between gap-4">
                <div class="space-y-1 text-center sm:text-left">
                    <span class="text-xs text-ink-600 block">Total Tarif Resmi:</span>
                    <span class="font-mono text-xl sm:text-2xl font-bold text-forest-900">Rp {{ number_format($pesan->jadwal->harga, 0, ',', '.') }}</span>
                    @if ($pesan->konfirmasiPesan)
                        <span class="text-[11px] text-ink-600 block">No. Resi Bank: <strong class="font-mono text-forest-700">{{ $pesan->konfirmasiPesan->no_resi }}</strong></span>
                    @endif
                </div>

                <!-- SIMULASI BARCODE KELAYAKAN TIKET -->
                <div class="text-center bg-cream-50 p-3 rounded-xl border border-surface-container font-mono">
                    <div class="text-[28px] tracking-widest text-forest-900 leading-none select-none">
                        ||| | || |||| | | |||| |||
                    </div>
                    <span class="text-[10px] text-ink-600 tracking-wider">TKT-{{ str_pad($pesan->id_pesan, 6, '0', STR_PAD_LEFT) }}-TLX</span>
                </div>
            </div>

            <div class="bg-amber-500/10 border border-amber-500/30 p-3.5 rounded-xl text-[11px] text-forest-900 space-y-1">
                <strong>Ketentuan Penumpang:</strong>
                <p class="text-ink-600">Harap tiba di pool loket keberangkatan selambatnya 15 menit sebelum waktu armada berangkat. Tunjukkan e-tiket ini kepada petugas pengemudi/loket saat naik.</p>
            </div>
        </div>
    </div>

</body>
</html>
