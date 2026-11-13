<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Riwayat Pemesanan &amp; E-Tiket - Trans Lampung Express</title>

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
                        'sage-100': '#E8EFE8',
                        'secondary-container': '#C1E8DF',
                    }
                }
            }
        };
    </script>
</head>

<body class="bg-cream-50 font-sans text-ink-900 antialiased min-h-screen flex flex-col">

    <!-- HEADER MEMBER -->
    <header class="fixed top-0 w-full z-50 bg-cream-50/95 backdrop-blur-md shadow-xs border-b border-surface-container">
        <div class="h-20 max-w-7xl mx-auto px-6 lg:px-12 flex items-center justify-between">
            <div class="flex items-center gap-8">
                <a class="flex items-center gap-3 decoration-transparent" href="{{ route('member.beranda') }}">
                    <div class="w-10 h-10 rounded-xl bg-forest-700 flex items-center justify-center text-white font-bold">
                        <span class="material-symbols-outlined text-[22px]">directions_bus</span>
                    </div>
                    <div class="flex flex-col">
                        <span class="font-serif text-lg font-bold text-forest-900 tracking-tight leading-none">Trans Lampung</span>
                        <span class="text-[10px] text-ink-600 tracking-widest uppercase mt-0.5 font-bold">Express Shuttle</span>
                    </div>
                </a>

                <nav class="hidden md:flex items-center gap-1.5">
                    <a href="{{ route('member.beranda') }}" class="px-3 py-1.5 rounded-lg text-xs font-medium text-ink-600 hover:text-forest-900 transition-colors">Beranda</a>
                    <a href="{{ route('member.cari-jadwal') }}" class="px-3 py-1.5 rounded-lg text-xs font-medium text-ink-600 hover:text-forest-900 transition-colors">Cari Jadwal</a>
                    <a href="{{ route('member.pesanan') }}" class="px-3 py-1.5 rounded-lg text-xs font-semibold bg-forest-700 text-white transition-colors">Pesanan Saya</a>
                    <a href="{{ route('member.keluhan') }}" class="px-3 py-1.5 rounded-lg text-xs font-medium text-ink-600 hover:text-forest-900 transition-colors">Keluhan</a>
                </nav>
            </div>

            <div class="flex items-center gap-4">
                <div class="hidden sm:flex flex-col text-right">
                    <span class="text-[11px] text-ink-600">Member Aktif</span>
                    <a href="{{ route('member.profil') }}" class="text-xs font-bold text-forest-900 hover:text-forest-700">
                        {{ auth()->user()->nama ?? auth()->user()->name ?? 'Member' }}
                    </a>
                </div>
                <a href="{{ route('member.profil') }}" class="w-9 h-9 rounded-full bg-forest-700 text-white flex items-center justify-center font-bold text-xs ring-2 ring-forest-700/20 hover:ring-forest-700 transition-all">
                    <span class="material-symbols-outlined text-[18px]">person</span>
                </a>
            </div>
        </div>
    </header>

    <!-- MAIN CONTENT -->
    <main class="w-full pt-28 pb-16 flex-1">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-12 space-y-6">

            <!-- PAGE HEADER -->
            <div class="flex flex-col md:flex-row md:items-center justify-between gap-4">
                <div>
                    <h1 class="font-serif text-2xl sm:text-3xl font-bold text-forest-900 tracking-tight">Riwayat Pemesanan &amp; E-Tiket</h1>
                    <p class="text-xs sm:text-sm text-ink-600 mt-1">Pantau seluruh perjalanan travel Anda, selesaikan pembayaran, dan cetak e-tiket sah Anda di sini.</p>
                </div>
                <a href="{{ route('member.cari-jadwal') }}" class="inline-flex items-center gap-2 bg-forest-700 hover:bg-forest-900 text-white text-xs font-bold px-4 py-2.5 rounded-xl shadow-xs transition-all self-start md:self-auto">
                    <span class="material-symbols-outlined text-[18px]">add_circle</span>
                    <span>Pesan Tiket Baru</span>
                </a>
            </div>

            <!-- STATUS FLASH ALERT -->
            @if (session('status'))
                <div class="bg-green-700/10 border border-green-700/30 text-green-800 p-4 rounded-2xl flex items-center gap-3">
                    <span class="material-symbols-outlined text-green-700">check_circle</span>
                    <span class="text-xs font-semibold">{{ session('status') }}</span>
                </div>
            @endif

            <!-- FILTER TABS STATUS -->
            <div class="bg-paper-0 p-3 sm:p-4 rounded-2xl border border-surface-container shadow-xs">
                <div class="flex items-center gap-2 overflow-x-auto pb-1">
                    <a href="{{ route('member.pesanan', ['status' => 'all']) }}"
                       class="text-xs font-semibold px-4 py-2 rounded-xl transition-colors flex items-center gap-2 whitespace-nowrap {{ ($tab ?? 'all') === 'all' ? 'bg-forest-900 text-white' : 'text-ink-600 hover:bg-surface-container' }}">
                        <span>Semua</span>
                        <span class="w-5 h-5 rounded-full {{ ($tab ?? 'all') === 'all' ? 'bg-amber-500 text-forest-900' : 'bg-surface-container text-ink-900' }} font-bold text-[10px] flex items-center justify-center">
                            {{ $counts['all'] ?? 0 }}
                        </span>
                    </a>

                    <a href="{{ route('member.pesanan', ['status' => 'menunggu-pembayaran']) }}"
                       class="text-xs font-semibold px-4 py-2 rounded-xl transition-colors flex items-center gap-2 whitespace-nowrap {{ ($tab ?? '') === 'menunggu-pembayaran' ? 'bg-forest-900 text-white' : 'text-ink-600 hover:bg-surface-container' }}">
                        <span>Menunggu Pembayaran</span>
                        <span class="w-5 h-5 rounded-full {{ ($tab ?? '') === 'menunggu-pembayaran' ? 'bg-amber-500 text-forest-900' : 'bg-surface-container text-ink-900' }} font-bold text-[10px] flex items-center justify-center">
                            {{ $counts['menunggu-pembayaran'] ?? 0 }}
                        </span>
                    </a>

                    <a href="{{ route('member.pesanan', ['status' => 'menunggu-konfirmasi']) }}"
                       class="text-xs font-semibold px-4 py-2 rounded-xl transition-colors flex items-center gap-2 whitespace-nowrap {{ ($tab ?? '') === 'menunggu-konfirmasi' ? 'bg-forest-900 text-white' : 'text-ink-600 hover:bg-surface-container' }}">
                        <span>Menunggu Verifikasi</span>
                        <span class="w-5 h-5 rounded-full {{ ($tab ?? '') === 'menunggu-konfirmasi' ? 'bg-amber-500 text-forest-900' : 'bg-surface-container text-ink-900' }} font-bold text-[10px] flex items-center justify-center">
                            {{ $counts['menunggu-konfirmasi'] ?? 0 }}
                        </span>
                    </a>

                    <a href="{{ route('member.pesanan', ['status' => 'lunas']) }}"
                       class="text-xs font-semibold px-4 py-2 rounded-xl transition-colors flex items-center gap-2 whitespace-nowrap {{ ($tab ?? '') === 'lunas' ? 'bg-forest-900 text-white' : 'text-ink-600 hover:bg-surface-container' }}">
                        <span>Lunas &bull; Tiket Terbit</span>
                        <span class="w-5 h-5 rounded-full {{ ($tab ?? '') === 'lunas' ? 'bg-amber-500 text-forest-900' : 'bg-surface-container text-ink-900' }} font-bold text-[10px] flex items-center justify-center">
                            {{ $counts['lunas'] ?? 0 }}
                        </span>
                    </a>
                </div>
            </div>

            <!-- LIST KARTU PESANAN -->
            <div class="space-y-4">
                @forelse ($orders as $order)
                    <div class="bg-paper-0 rounded-2xl p-5 sm:p-6 border border-surface-container shadow-xs hover:border-forest-700/50 transition-all space-y-4">
                        <!-- HEADER KARTU -->
                        <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-3 pb-3 border-b border-surface-container">
                            <div class="flex items-center gap-3">
                                <div class="w-10 h-10 rounded-xl bg-forest-700/10 text-forest-700 flex items-center justify-center font-bold">
                                    <span class="material-symbols-outlined text-[22px]">confirmation_number</span>
                                </div>
                                <div>
                                    <div class="flex items-center gap-2">
                                        <span class="font-mono text-sm font-bold text-forest-900">#PSN-{{ str_pad($order->id_pesan, 4, '0', STR_PAD_LEFT) }}</span>
                                        @if ($order->status === 'Lunas')
                                            <span class="bg-green-700/15 text-green-700 text-[11px] font-bold px-2 py-0.5 rounded-full flex items-center gap-1">
                                                <span class="material-symbols-outlined text-[13px]">check_circle</span>
                                                Lunas &bull; Tiket Aktif
                                            </span>
                                        @elseif ($order->status === 'Menunggu Konfirmasi')
                                            <span class="bg-amber-500/20 text-amber-700 text-[11px] font-bold px-2 py-0.5 rounded-full flex items-center gap-1">
                                                <span class="material-symbols-outlined text-[13px]">hourglass_top</span>
                                                Sedang Diverifikasi Loket
                                            </span>
                                        @else
                                            <span class="bg-red-500/15 text-red-600 text-[11px] font-bold px-2 py-0.5 rounded-full flex items-center gap-1">
                                                <span class="material-symbols-outlined text-[13px]">pending</span>
                                                Menunggu Pembayaran
                                            </span>
                                        @endif
                                    </div>
                                    <span class="text-[11px] text-ink-600">Jadwal: {{ $order->jadwal?->tgl_berangkat }} &bull; {{ $order->jadwal?->jam_berangkat }} WIB</span>
                                </div>
                            </div>

                            <div class="text-right">
                                <span class="text-[11px] text-ink-600 block">Total Tagihan</span>
                                <span class="font-mono text-base sm:text-lg font-bold text-forest-900">
                                    Rp {{ number_format($order->jadwal?->harga ?? 0, 0, ',', '.') }}
                                </span>
                            </div>
                        </div>

                        <!-- BODY KARTU: RINCIAN RUTE & ARMADA -->
                        <div class="grid grid-cols-1 md:grid-cols-12 gap-4 items-center">
                            <div class="md:col-span-8 grid grid-cols-2 sm:grid-cols-4 gap-3 text-xs">
                                <div class="bg-surface-container-low p-3 rounded-xl space-y-1">
                                    <span class="text-[10px] text-ink-600 uppercase block font-semibold">Rute Travel</span>
                                    <strong class="text-forest-900 block text-xs truncate">
                                        {{ $order->jadwal?->kotaAsal?->nm_kota_asal }} &rarr; {{ $order->jadwal?->kotaTujuan?->nm_kota_tujuan }}
                                    </strong>
                                    <span class="text-[10px] text-ink-600">Lintas Reguler</span>
                                </div>

                                <div class="bg-surface-container-low p-3 rounded-xl space-y-1">
                                    <span class="text-[10px] text-ink-600 uppercase block font-semibold">Nomor Kursi</span>
                                    <strong class="text-forest-900 block text-sm font-black text-forest-700">
                                        Kursi {{ $order->nomor_kursi }}
                                    </strong>
                                    <span class="text-[10px] text-ink-600">Pilihan Penumpang</span>
                                </div>

                                <div class="bg-surface-container-low p-3 rounded-xl space-y-1">
                                    <span class="text-[10px] text-ink-600 uppercase block font-semibold">Armada Mobil</span>
                                    <strong class="text-forest-900 block text-xs truncate">
                                        {{ $order->jadwal?->kendaraan?->nm_kendaraan ?? $order->jadwal?->kendaraan?->jenis_mobil }}
                                    </strong>
                                    <span class="text-[10px] font-mono text-ink-600">
                                        {{ $order->jadwal?->kendaraan?->no_polisi ?? $order->jadwal?->kendaraan?->nomor_polisi }}
                                    </span>
                                </div>

                                <div class="bg-surface-container-low p-3 rounded-xl space-y-1">
                                    <span class="text-[10px] text-ink-600 uppercase block font-semibold">Resi Pembayaran</span>
                                    <strong class="font-mono text-forest-900 block text-xs truncate">
                                        {{ $order->konfirmasiPesan?->no_resi ?? '-' }}
                                    </strong>
                                    <span class="text-[10px] text-ink-600">
                                        {{ $order->konfirmasiPesan ? 'Transfer Bank' : 'Belum Konfirmasi' }}
                                    </span>
                                </div>
                            </div>

                            <!-- TOMBOL AKSI -->
                            <div class="md:col-span-4 flex flex-col sm:flex-row md:flex-col gap-2">
                                @if ($order->status === 'Lunas')
                                    <a href="{{ route('member.tiket', $order->id_pesan) }}"
                                       class="w-full bg-forest-700 hover:bg-forest-900 text-white font-bold text-xs py-2.5 px-4 rounded-xl flex items-center justify-center gap-2 shadow-xs transition-colors text-center">
                                        <span class="material-symbols-outlined text-[18px]">airplane_ticket</span>
                                        <span>Lihat &amp; Cetak E-Tiket</span>
                                    </a>
                                @elseif ($order->status === 'Menunggu Konfirmasi')
                                    <div class="bg-amber-500/10 border border-amber-500/30 text-forest-900 p-2.5 rounded-xl text-center text-xs">
                                        <span class="font-semibold block text-[11px] text-amber-700">Bukti Transfer Sedang Diverifikasi</span>
                                        <span class="text-[10px] text-ink-600">Loket akan memverifikasi dalam 5-15 menit.</span>
                                    </div>
                                @else
                                    <div class="flex gap-2">
                                        <a href="{{ route('member.pembayaran') }}"
                                           class="w-full bg-forest-700 hover:bg-forest-900 text-white font-bold text-xs py-2 px-3 rounded-xl transition-colors text-center">
                                            Petunjuk Bayar
                                        </a>
                                        <a href="{{ route('member.konfirmasi-pembayaran') }}"
                                           class="w-full bg-amber-500 hover:bg-amber-600 text-forest-900 font-bold text-xs py-2 px-3 rounded-xl transition-colors text-center">
                                            Kirim Bukti
                                        </a>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="bg-paper-0 rounded-2xl p-12 text-center border border-surface-container space-y-4">
                        <div class="w-16 h-16 rounded-2xl bg-forest-700/10 text-forest-700 mx-auto flex items-center justify-center">
                            <span class="material-symbols-outlined text-[36px]">confirmation_number</span>
                        </div>
                        <div class="space-y-1">
                            <h3 class="font-serif text-lg font-bold text-forest-900">Belum Ada Riwayat Pemesanan</h3>
                            <p class="text-xs text-ink-600 max-w-md mx-auto">
                                Anda belum memiliki transaksi tiket travel pada kategori ini. Silakan cari jadwal perjalanan antar kota yang tersedia.
                            </p>
                        </div>
                        <a href="{{ route('member.cari-jadwal') }}" class="inline-flex items-center gap-2 bg-forest-700 hover:bg-forest-900 text-white text-xs font-bold px-5 py-2.5 rounded-xl shadow-xs transition-all">
                            <span class="material-symbols-outlined text-[18px]">search</span>
                            <span>Cari Jadwal Travel</span>
                        </a>
                    </div>
                @endforelse

                @if ($orders->hasPages())
                    <div class="pt-4">
                        {{ $orders->links() }}
                    </div>
                @endif
            </div>

        </div>
    </main>

    <!-- FOOTER -->
    <footer class="bg-paper-0 border-t border-surface-container py-6 mt-auto">
        <div class="max-w-7xl mx-auto px-6 lg:px-12 flex flex-col sm:flex-row items-center justify-between gap-3 text-xs text-ink-600">
            <p>&copy; 2026 PT Trans Lampung Express. Hak cipta dilindungi.</p>
            <div class="flex items-center gap-4">
                <a href="{{ route('member.cari-jadwal') }}" class="hover:text-forest-900">Cari Jadwal</a>
                <a href="{{ route('member.keluhan') }}" class="hover:text-forest-900">Layanan Keluhan</a>
            </div>
        </div>
    </footer>

    @include('partials.role-switcher')

</body>
</html>
