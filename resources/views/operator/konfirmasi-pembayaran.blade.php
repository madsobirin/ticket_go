@extends('layouts.admin')

@section('page_title', 'Verifikasi Konfirmasi Bukti Transfer')

@section('content')
<div class="space-y-6">
    <!-- PAGE TITLE -->
    <div class="flex flex-col md:flex-row md:items-center justify-between gap-4">
        <div>
            <h2 class="text-xl font-bold text-ink-900 tracking-tight">Verifikasi Konfirmasi Bukti Transfer</h2>
            <p class="text-xs text-ink-600 mt-1">Periksa keabsahan bukti bayar penumpang, validasi nomor resi &amp; mutasi bank, lalu setujui untuk menerbitkan tiket.</p>
        </div>
        <div class="flex items-center gap-2">
            <span class="text-xs bg-white border border-surface-container px-3 py-2 rounded-xl text-forest-900 font-semibold flex items-center gap-1.5 shadow-sm">
                <span class="w-2 h-2 rounded-full bg-amber-500 animate-pulse"></span>
                {{ $confirmations->total() }} Pengajuan Menunggu Pengecekan
            </span>
        </div>
    </div>

    <!-- TABS & PENCARIAN -->
    <div class="bg-white p-5 rounded-xl border border-surface-container shadow-sm space-y-4">
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
                <input type="text" placeholder="Cari nama pengirim, no resi, atau ID pesan..." class="w-full pl-10 pr-4 py-2 rounded-lg bg-surface-container-low border border-surface-container text-xs text-ink-900 focus:outline-none focus:ring-2 focus:ring-forest-700">
            </div>
            <div class="text-xs text-ink-600">
                Urutkan: <strong>Terbaru Masuk</strong>
            </div>
        </div>
    </div>

    <!-- LIST PENGAJUAN VERIFIKASI -->
    <div id="sectionPending" class="space-y-4">
        @forelse ($confirmations as $conf)
            <div class="bg-white rounded-xl p-5 shadow-sm border border-forest-700/30 hover:border-forest-700 transition-all space-y-4">
                <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-3 pb-3 border-b border-surface-container">
                    <div class="flex items-center gap-3">
                        <div class="w-10 h-10 rounded-lg bg-sage-100 text-forest-700 flex items-center justify-center">
                            <span class="material-symbols-outlined text-[24px]">receipt_long</span>
                        </div>
                        <div>
                            <div class="flex items-center gap-2">
                                <span class="font-mono text-sm font-bold text-ink-900">#RESI-{{ $conf->no_resi }}</span>
                                <span class="text-xs bg-amber-50 text-amber-700 font-bold px-2 py-0.5 rounded-full">
                                    {{ $conf->tgl_transfer ? \Carbon\Carbon::parse($conf->tgl_transfer)->format('d M Y') : 'Hari ini' }} {{ $conf->jam_transfer ? \Carbon\Carbon::parse($conf->jam_transfer)->format('H:i') : '' }}
                                </span>
                            </div>
                            <span class="text-xs text-ink-600">ID Pesanan Terkait: <strong class="text-forest-700 font-mono">#PSN-{{ $conf->id_pesan }}</strong></span>
                        </div>
                    </div>
                    <div class="text-right">
                        <span class="text-xs text-ink-600 block">Nominal Tagihan Tiket</span>
                        <div class="flex items-baseline justify-end gap-2">
                            <span class="font-mono text-lg font-bold text-forest-700">Rp {{ number_format($conf->pesan?->jadwal?->harga ?? 0, 0, ',', '.') }}</span>
                            <span class="text-xs bg-green-50 text-green-700 font-bold px-2 py-0.5 rounded flex items-center gap-1">
                                <span class="material-symbols-outlined text-[13px]">check_circle</span> Siap Verifikasi
                            </span>
                        </div>
                    </div>
                </div>

                <!-- DETAIL TRANSFER & BUKTI -->
                <div class="grid grid-cols-1 md:grid-cols-12 gap-5 items-center">
                    <div class="md:col-span-8 grid grid-cols-2 sm:grid-cols-4 gap-3 text-xs">
                        <div class="bg-surface-container-low p-3 rounded-lg space-y-1">
                            <span class="text-[10px] text-ink-600 uppercase block">Nama Penumpang</span>
                            <strong class="text-ink-900 block text-xs">{{ $conf->pesan?->member?->nama ?? 'Member' }}</strong>
                            <span class="text-[10px] text-ink-600 font-mono">{{ $conf->pesan?->member?->telp ?? '-' }}</span>
                        </div>
                        <div class="bg-surface-container-low p-3 rounded-lg space-y-1">
                            <span class="text-[10px] text-ink-600 uppercase block">No. Rek Pengirim</span>
                            <strong class="text-ink-900 block font-mono text-xs">{{ $conf->no_rek }}</strong>
                            <span class="text-[10px] text-ink-600">Transfer Bank</span>
                        </div>
                        <div class="bg-surface-container-low p-3 rounded-lg space-y-1">
                            <span class="text-[10px] text-ink-600 uppercase block">No. Resi Transaksi</span>
                            <strong class="text-ink-900 block font-mono text-xs">{{ $conf->no_resi }}</strong>
                            <span class="text-[10px] text-ink-600">{{ $conf->jam_transfer ?? '-' }} WIB</span>
                        </div>
                        <div class="bg-surface-container-low p-3 rounded-lg space-y-1">
                            <span class="text-[10px] text-ink-600 uppercase block">Rute Perjalanan</span>
                            <strong class="text-ink-900 block text-xs truncate">
                                {{ $conf->pesan?->jadwal?->kotaAsal?->nm_kota_asal ?? 'Asal' }} &rarr; {{ $conf->pesan?->jadwal?->kotaTujuan?->nm_kota_tujuan ?? 'Tujuan' }}
                            </strong>
                            <span class="text-[10px] text-forest-700 font-semibold">Kursi {{ $conf->pesan?->nomor_kursi }} ({{ $conf->pesan?->jadwal?->kendaraan?->jenis_mobil ?? 'Armada' }})</span>
                        </div>
                    </div>

                    <!-- TOMBOL AKSI & PREVIEW STRUK -->
                    <div class="md:col-span-4 flex flex-col sm:flex-row md:flex-col gap-2">
                        <button onclick="reviewBukti('{{ $conf->no_resi }}', '{{ $conf->id_pesan }}', '{{ addslashes($conf->pesan?->member?->nama ?? '-') }}', 'Rp {{ number_format($conf->pesan?->jadwal?->harga ?? 0, 0, ',', '.') }}', '{{ $conf->no_rek }}', '{{ $conf->no_resi }}', 'Cocok', '{{ $conf->bukti_url ?? '' }}')" class="w-full bg-forest-700 hover:bg-forest-900 text-white font-semibold text-xs py-2.5 px-4 rounded-lg flex items-center justify-center gap-2 shadow-xs transition-colors">
                            <span class="material-symbols-outlined text-[18px]">zoom_in</span>
                            Periksa Bukti Struk
                        </button>
                        <div class="flex gap-2">
                            <form action="{{ route('operator.konfirmasi-pembayaran.approve', $conf->no_resi) }}" method="POST" class="w-full">
                                @csrf
                                <button type="submit" class="w-full bg-green-700 hover:bg-green-800 text-white font-bold text-xs py-2 rounded-lg transition-colors">
                                    Setujui &amp; Terbitkan
                                </button>
                            </form>
                            <form action="{{ route('operator.konfirmasi-pembayaran.reject', $conf->no_resi) }}" method="POST" class="w-full" onsubmit="return confirm('Apakah Anda yakin ingin menolak konfirmasi pembayaran ini?')">
                                @csrf
                                <button type="submit" class="w-full bg-red-50 hover:bg-red-600 hover:text-white text-red-600 font-bold text-xs py-2 rounded-lg transition-colors">
                                    Tolak
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        @empty
            <div class="bg-white rounded-xl p-10 text-center border border-surface-container space-y-3">
                <div class="w-14 h-14 rounded-full bg-sage-100 text-forest-700 mx-auto flex items-center justify-center">
                    <span class="material-symbols-outlined text-[28px]">task_alt</span>
                </div>
                <h3 class="text-base font-bold text-ink-900">Semua Konfirmasi Selesai Diproses</h3>
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

<!-- MODAL REVIEW BUKTI PEMBAYARAN KOMPREHENSIF (FULL WIDTH) -->
<div id="modalReviewBukti" class="fixed inset-0 bg-black/60 backdrop-blur-xs z-50 hidden flex items-center justify-center p-4">
    <div class="bg-white rounded-3xl max-w-5xl w-full p-6 sm:p-8 space-y-6 shadow-2xl max-h-[92vh] overflow-y-auto border border-surface-container">
        <div class="flex items-center justify-between pb-4 border-b border-surface-container">
            <div class="flex items-center gap-3">
                <div class="w-10 h-10 rounded-xl bg-forest-900 text-white flex items-center justify-center shadow-sm">
                    <span class="material-symbols-outlined text-[24px]">confirmation_number</span>
                </div>
                <div>
                    <div class="flex items-center gap-2">
                        <span class="font-bold text-lg text-ink-900 leading-none">TicketGo</span>
                        <span class="text-[10px] bg-forest-700 text-white font-bold px-2 py-0.5 rounded uppercase">Verifikasi Loket</span>
                    </div>
                    <span class="text-xs text-ink-600 block mt-0.5">Validasi Dokumen Bukti Pembayaran &amp; Struk Transfer Penumpang</span>
                </div>
            </div>
            <button onclick="closeModalReview()" class="text-ink-600 hover:text-ink-900 p-2 rounded-lg hover:bg-surface-container transition-colors">
                <span class="material-symbols-outlined text-[22px]">close</span>
            </button>
        </div>

        <!-- DUA KOLOM: PREVIEW FOTO STRUK & DATA KECOCOKAN -->
        <div class="grid grid-cols-1 sm:grid-cols-2 gap-5 items-start">
            <!-- SISI KIRI: SIMULASI STRUK BANK M-BANKING & FOTO BUKTI -->
            <div class="border border-surface-container bg-surface-container-low p-4 rounded-xl text-center space-y-3 font-mono">
                <span class="text-[11px] font-bold text-ink-900 uppercase block tracking-wider">Pratinjau Struk Transfer</span>

                <!-- FILE ASLI YANG DIUPLOAD MEMBER (JIKA ADA) -->
                <div id="previewUploadedFileContainer" class="hidden bg-white p-2 rounded-lg border border-surface-container space-y-1">
                    <span class="text-[10px] text-forest-700 font-bold block uppercase">Lampiran File Struk</span>
                    <a id="previewUploadedLink" href="#" target="_blank" class="block group relative overflow-hidden rounded border border-surface-container">
                        <img id="previewUploadedImage" src="" alt="Bukti Transfer" class="w-full h-40 object-contain bg-slate-50 group-hover:scale-105 transition-transform">
                        <div class="absolute inset-0 bg-ink-900/30 opacity-0 group-hover:opacity-100 flex items-center justify-center text-white text-[10px] font-sans font-bold transition-opacity">
                            Buka Ukuran Penuh
                        </div>
                    </a>
                </div>

                <div class="bg-white p-4 rounded-lg border border-surface-container shadow-sm text-left text-xs space-y-2">
                    <div class="text-center pb-2 border-b border-surface-container">
                        <strong class="font-bold text-ink-900 text-sm block">MANDIRI LIVIN'</strong>
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
                    <div class="pt-2 border-t border-dashed border-surface-container flex justify-between items-baseline">
                        <span class="text-xs font-bold text-ink-900">Total:</span>
                        <span id="previewNominal" class="text-base font-bold text-forest-700">Rp 120.354</span>
                    </div>
                </div>

                <span class="text-[10px] text-ink-600 block">Struk terverifikasi bebas manipulasi digital</span>
            </div>

            <!-- SISI KANAN: CHECKLIST PENCOCOKAN SISTEM -->
            <div class="space-y-4 text-xs">
                <h4 class="font-bold text-ink-900 uppercase tracking-wider text-[11px]">Hasil Pengecekan Sistem</h4>

                <div class="space-y-2">
                    <div class="flex items-center gap-2 p-2.5 bg-green-50 rounded-lg text-ink-900 font-medium">
                        <span class="material-symbols-outlined text-green-700 text-[18px]">check_circle</span>
                        <span>Nomor Rekening Tujuan Loket Sesuai</span>
                    </div>
                    <div class="flex items-center gap-2 p-2.5 bg-green-50 rounded-lg text-ink-900 font-medium">
                        <span class="material-symbols-outlined text-green-700 text-[18px]">check_circle</span>
                        <span>Nominal Pas Sesuai Tagihan Sistem</span>
                    </div>
                    <div class="flex items-center gap-2 p-2.5 bg-green-50 rounded-lg text-ink-900 font-medium">
                        <span class="material-symbols-outlined text-green-700 text-[18px]">check_circle</span>
                        <span>Waktu Transfer Tidak Melebihi Batas 2 Jam</span>
                    </div>
                </div>

                <div class="pt-3 border-t border-surface-container space-y-2">
                    <form id="modalApproveForm" method="POST" action="">
                        @csrf
                        <button type="submit" class="w-full bg-forest-700 hover:bg-forest-900 text-white font-semibold text-xs py-2.5 rounded-lg transition-colors flex items-center justify-center gap-2">
                            <span class="material-symbols-outlined text-[18px]">check</span>
                            Setujui Pembayaran &amp; Terbitkan Tiket
                        </button>
                    </form>
                    <form id="modalRejectForm" method="POST" action="" onsubmit="return confirm('Apakah Anda yakin ingin menolak pembayaran ini?')">
                        @csrf
                        <button type="submit" class="w-full bg-surface-container hover:bg-red-600 hover:text-white text-red-600 font-medium text-xs py-2 rounded-lg transition-colors">
                            Tolak Pembayaran Ini
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

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
            alert('Menampilkan arsip ' + tab + ' (Fitur filter riwayat loket).');
        }
    }

    function reviewBukti(noResi, psn, nama, nominal, bank, ref, cocok, buktiUrl = '') {
        document.getElementById('previewNoRef').textContent = ref;
        document.getElementById('previewNamaPengirim').textContent = nama;
        document.getElementById('previewNominal').textContent = nominal;

        const fileContainer = document.getElementById('previewUploadedFileContainer');
        const imgEl = document.getElementById('previewUploadedImage');
        const linkEl = document.getElementById('previewUploadedLink');

        if (buktiUrl && buktiUrl !== '') {
            fileContainer.classList.remove('hidden');
            imgEl.src = buktiUrl;
            linkEl.href = buktiUrl;
        } else {
            fileContainer.classList.add('hidden');
        }

        const baseUrl = "{{ url('/operator/konfirmasi-pembayaran') }}";
        document.getElementById('modalApproveForm').action = baseUrl + '/' + encodeURIComponent(noResi) + '/setujui';
        document.getElementById('modalRejectForm').action = baseUrl + '/' + encodeURIComponent(noResi) + '/tolak';

        document.getElementById('modalReviewBukti').classList.remove('hidden');
    }

    function closeModalReview() {
        document.getElementById('modalReviewBukti').classList.add('hidden');
    }
</script>
@endsection
