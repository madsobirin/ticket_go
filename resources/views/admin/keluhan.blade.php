@extends('layouts.admin')

@section('page_title', 'Pusat Pengaduan & Keluhan Pelanggan')

@section('content')
<div class="space-y-6">
    <!-- PAGE TITLE -->
    <div class="flex flex-col md:flex-row md:items-center justify-between gap-4">
        <div>
            <h2 class="text-xl font-bold text-ink-900 tracking-tight">Pusat Pengaduan &amp; Keluhan Pelanggan</h2>
            <p class="text-xs text-ink-600 mt-1">Pantau umpan balik perjalanan, tanggapi keluhan penumpang, dan berikan solusi kompensasi resmi manajemen.</p>
        </div>
        <div class="flex items-center gap-2">
            <span class="text-xs bg-white border border-surface-container px-3 py-2 rounded-xl text-forest-900 font-semibold flex items-center gap-1.5 shadow-sm">
                <span class="w-2 h-2 rounded-full bg-red-600 animate-pulse"></span>
                2 Keluhan Menunggu Tanggapan Manajemen
            </span>
        </div>
    </div>

    <!-- KPI STATUS KELUHAN -->
    <div class="grid grid-cols-1 sm:grid-cols-4 gap-4 text-xs">
        <div class="bg-white p-4 rounded-xl border border-surface-container shadow-sm">
            <span class="text-ink-600 block">Total Aduan Masuk</span>
            <span class="text-xl font-bold font-mono text-forest-900 mt-1 block">8 Laporan</span>
        </div>
        <div class="bg-white p-4 rounded-xl border border-red-600/30 shadow-sm">
            <span class="text-ink-600 block">Menunggu Tanggapan</span>
            <span class="text-xl font-bold font-mono text-red-600 mt-1 block">2 Laporan</span>
            <span class="text-[10px] text-red-600 font-bold">Harap segera direspon</span>
        </div>
        <div class="bg-white p-4 rounded-xl border border-surface-container shadow-sm">
            <span class="text-ink-600 block">Sedang Ditindaklanjuti</span>
            <span class="text-xl font-bold font-mono text-amber-500 mt-1 block">2 Laporan</span>
        </div>
        <div class="bg-white p-4 rounded-xl border border-surface-container shadow-sm">
            <span class="text-ink-600 block">Selesai / Teratasi</span>
            <span class="text-xl font-bold font-mono text-green-700 mt-1 block">4 Laporan</span>
        </div>
    </div>

    <!-- FILTER & SEARCH -->
    <div class="bg-white p-4 rounded-xl border border-surface-container shadow-sm flex flex-col sm:flex-row items-center justify-between gap-3 text-xs">
        <div class="w-full sm:w-96 relative">
            <span class="absolute inset-y-0 left-0 pl-3.5 flex items-center pointer-events-none text-ink-600">
                <span class="material-symbols-outlined text-[18px]">search</span>
            </span>
            <input id="searchKeluhan" onkeyup="filterKeluhan()" type="text" placeholder="Cari nama penumpang, nomor tiket, atau isi keluhan..." class="w-full pl-10 pr-4 py-2 rounded-lg bg-surface-container-low border border-surface-container text-xs text-ink-900 focus:outline-none focus:ring-2 focus:ring-forest-700">
        </div>
        <div class="flex items-center gap-2">
            <select id="kategoriFilter" onchange="filterKeluhan()" class="py-2 px-3 rounded-lg bg-surface-container-low border border-surface-container text-xs text-ink-900 focus:outline-none focus:ring-2 focus:ring-forest-700">
                <option value="">Semua Kategori</option>
                <option value="Armada">Fasilitas / Armada</option>
                <option value="Jadwal">Keterlambatan Jadwal</option>
                <option value="Pembayaran">Kendala Pembayaran</option>
                <option value="Bagasi">Bagasi Penumpang</option>
            </select>
        </div>
    </div>

    <!-- TABEL KELUHAN -->
    <div class="bg-white rounded-xl border border-surface-container shadow-sm overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse text-xs">
                <thead>
                    <tr class="bg-surface-container-low text-ink-600 font-semibold uppercase tracking-wider text-[11px] border-b border-surface-container">
                        <th class="py-3.5 px-4">ID &amp; Tanggal</th>
                        <th class="py-3.5 px-4">Pelanggan</th>
                        <th class="py-3.5 px-4">Tiket Terkait</th>
                        <th class="py-3.5 px-4">Kategori &amp; Ringkasan Keluhan</th>
                        <th class="py-3.5 px-4">Urgensi</th>
                        <th class="py-3.5 px-4">Status</th>
                        <th class="py-3.5 px-4 text-center">Aksi Manajemen</th>
                    </tr>
                </thead>
                <tbody id="tableKeluhanBody" class="divide-y divide-surface-container font-medium text-ink-900">
                    <!-- KELUHAN 1: MENUNGGU -->
                    <tr class="hover:bg-surface-container-low/50 transition-colors keluhan-row" data-kategori="Armada">
                        <td class="py-4 px-4 font-mono font-bold text-forest-700">
                            KLH-202410-01
                            <span class="block text-[10px] text-ink-600 font-normal">08 Nov 12:40</span>
                        </td>
                        <td class="py-4 px-4">
                            <strong class="font-bold text-ink-900 block text-xs">Rian Pratama</strong>
                            <span class="text-[11px] text-ink-600 font-mono">081922334455</span>
                        </td>
                        <td class="py-4 px-4 font-mono font-bold text-forest-700">
                            #PSN-202410-096
                            <span class="block text-[10px] text-ink-600 font-normal">HiAce BE 7012 AA</span>
                        </td>
                        <td class="py-4 px-4 max-w-sm">
                            <span class="bg-sage-100 text-forest-900 font-bold px-2 py-0.5 rounded text-[10px] mb-1 inline-block">Fasilitas Armada (AC)</span>
                            <p class="text-ink-900 leading-relaxed text-xs">"AC armada HiAce BE 7012 AA kurang dingin saat melintasi tanjakan Sedayu Krui, mohon dicek perawatannya..."</p>
                        </td>
                        <td class="py-4 px-4">
                            <span class="bg-red-50 text-red-600 font-bold px-2.5 py-1 rounded-full text-[10px]">Tinggi</span>
                        </td>
                        <td class="py-4 px-4">
                            <span class="bg-red-50 text-red-600 font-bold px-2.5 py-1 rounded-full text-[11px] inline-flex items-center gap-1">
                                <span class="w-1.5 h-1.5 rounded-full bg-red-600 animate-pulse"></span> Menunggu
                            </span>
                        </td>
                        <td class="py-4 px-4 text-center">
                            <button onclick="tanggapiKeluhan('KLH-202410-01', 'Rian Pratama', '#PSN-202410-096', 'AC armada HiAce BE 7012 AA kurang dingin saat melintasi tanjakan Sedayu Krui...')" class="px-3 py-1.5 rounded-lg bg-forest-700 hover:bg-forest-900 text-white font-bold text-[11px] transition-colors shadow-sm">
                                Beri Tanggapan
                            </button>
                        </td>
                    </tr>

                    <!-- KELUHAN 2: MENUNGGU -->
                    <tr class="hover:bg-surface-container-low/50 transition-colors keluhan-row" data-kategori="Jadwal">
                        <td class="py-4 px-4 font-mono font-bold text-forest-700">
                            KLH-202410-02
                            <span class="block text-[10px] text-ink-600 font-normal">07 Nov 15:10</span>
                        </td>
                        <td class="py-4 px-4">
                            <strong class="font-bold text-ink-900 block text-xs">Dewi Kartika</strong>
                            <span class="text-[11px] text-ink-600 font-mono">082199887766</span>
                        </td>
                        <td class="py-4 px-4 font-mono font-bold text-forest-700">
                            #PSN-202410-082
                            <span class="block text-[10px] text-ink-600 font-normal">Trip Kotabumi 13:00</span>
                        </td>
                        <td class="py-4 px-4 max-w-sm">
                            <span class="bg-amber-50 text-amber-700 font-bold px-2 py-0.5 rounded text-[10px] mb-1 inline-block">Keterlambatan Jadwal</span>
                            <p class="text-ink-900 leading-relaxed text-xs">"Jadwal jam 13:00 sempat telat 20 menit saat jemput di jalan lintas, mohon supir dikontak lebih awal..."</p>
                        </td>
                        <td class="py-4 px-4">
                            <span class="bg-amber-50 text-amber-700 font-bold px-2.5 py-1 rounded-full text-[10px]">Sedang</span>
                        </td>
                        <td class="py-4 px-4">
                            <span class="bg-red-50 text-red-600 font-bold px-2.5 py-1 rounded-full text-[11px] inline-flex items-center gap-1">
                                <span class="w-1.5 h-1.5 rounded-full bg-red-600 animate-pulse"></span> Menunggu
                            </span>
                        </td>
                        <td class="py-4 px-4 text-center">
                            <button onclick="tanggapiKeluhan('KLH-202410-02', 'Dewi Kartika', '#PSN-202410-082', 'Jadwal jam 13:00 sempat telat 20 menit saat jemput di jalan lintas...')" class="px-3 py-1.5 rounded-lg bg-forest-700 hover:bg-forest-900 text-white font-bold text-[11px] transition-colors shadow-sm">
                                Beri Tanggapan
                            </button>
                        </td>
                    </tr>

                    <!-- KELUHAN 3: SEDANG DIPROSES -->
                    <tr class="hover:bg-surface-container-low/50 transition-colors keluhan-row" data-kategori="Pembayaran">
                        <td class="py-4 px-4 font-mono font-bold text-forest-700">
                            KLH-202410-03
                            <span class="block text-[10px] text-ink-600 font-normal">06 Nov 11:25</span>
                        </td>
                        <td class="py-4 px-4">
                            <strong class="font-bold text-ink-900 block text-xs">Hendra Kusuma</strong>
                            <span class="text-[11px] text-ink-600 font-mono">081122334455</span>
                        </td>
                        <td class="py-4 px-4 font-mono font-bold text-forest-700">
                            #PSN-202410-061
                            <span class="block text-[10px] text-ink-600 font-normal">Transfer Bank BCA</span>
                        </td>
                        <td class="py-4 px-4 max-w-sm">
                            <span class="bg-blue-50 text-blue-700 font-bold px-2 py-0.5 rounded text-[10px] mb-1 inline-block">Masalah Verifikasi Pembayaran</span>
                            <p class="text-ink-900 leading-relaxed text-xs">"Konfirmasi transfer bank BCA sempat memakan waktu 30 menit kemarin..."</p>
                        </td>
                        <td class="py-4 px-4">
                            <span class="bg-amber-50 text-amber-700 font-bold px-2.5 py-1 rounded-full text-[10px]">Sedang</span>
                        </td>
                        <td class="py-4 px-4">
                            <span class="bg-amber-50 text-amber-700 font-bold px-2.5 py-1 rounded-full text-[11px]">Sedang Diproses</span>
                        </td>
                        <td class="py-4 px-4 text-center">
                            <button onclick="alert('Keluhan ini sedang dalam proses investigasi mutasi bank oleh tim loket.')" class="px-2.5 py-1.5 rounded-lg bg-surface-container hover:bg-forest-700 hover:text-white font-semibold text-[11px] transition-colors">
                                Lihat Progres
                            </button>
                        </td>
                    </tr>

                    <!-- KELUHAN 4: SELESAI -->
                    <tr class="hover:bg-surface-container-low/50 transition-colors keluhan-row" data-kategori="Bagasi">
                        <td class="py-4 px-4 font-mono font-bold text-forest-700">
                            KLH-202410-04
                            <span class="block text-[10px] text-ink-600 font-normal">02 Nov 16:00</span>
                        </td>
                        <td class="py-4 px-4">
                            <strong class="font-bold text-ink-900 block text-xs">Siti Rahayu</strong>
                            <span class="text-[11px] text-ink-600 font-mono">082188991122</span>
                        </td>
                        <td class="py-4 px-4 font-mono font-bold text-forest-700">
                            #PSN-202410-055
                            <span class="block text-[10px] text-ink-600 font-normal">Trip Metro 10:30</span>
                        </td>
                        <td class="py-4 px-4 max-w-sm">
                            <span class="bg-sage-100 text-forest-900 font-bold px-2 py-0.5 rounded text-[10px] mb-1 inline-block">Bagasi Penumpang</span>
                            <p class="text-ink-600 leading-relaxed text-xs">"Titipan oleh-oleh keripik pisang tertukar di bagasi, tapi supir telah membantu mengantarkan kembali ke rumah..."</p>
                        </td>
                        <td class="py-4 px-4">
                            <span class="bg-surface-container text-ink-600 font-bold px-2.5 py-1 rounded-full text-[10px]">Rendah</span>
                        </td>
                        <td class="py-4 px-4">
                            <span class="bg-green-50 text-green-700 font-bold px-2.5 py-1 rounded-full text-[11px] inline-flex items-center gap-1">
                                <span class="material-symbols-outlined text-[13px]">check</span> Selesai
                            </span>
                        </td>
                        <td class="py-4 px-4 text-center">
                            <span class="text-[11px] text-ink-600 italic">Solusi Diterima</span>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- MODAL TANGGAPAN KELUHAN -->
<div id="modalTanggapan" class="fixed inset-0 bg-black/50 backdrop-blur-xs z-50 hidden flex items-center justify-center p-4">
    <div class="bg-white rounded-2xl max-w-lg w-full p-6 space-y-4 shadow-xl">
        <div class="flex items-center justify-between pb-3 border-b border-surface-container">
            <div class="flex items-center gap-2">
                <span class="material-symbols-outlined text-forest-700 text-[22px]">quickreply</span>
                <h3 class="text-base font-bold text-ink-900">Tanggapi Keluhan Pelanggan</h3>
            </div>
            <button onclick="closeModalTanggapan()" class="text-ink-600 hover:text-ink-900 p-1">
                <span class="material-symbols-outlined text-[20px]">close</span>
            </button>
        </div>

        <div class="space-y-3 text-xs">
            <div class="p-3 bg-surface-container-low rounded-xl space-y-1">
                <div class="flex justify-between">
                    <strong id="modalKlhId" class="font-mono text-forest-700">KLH-202410-01</strong>
                    <span id="modalKlhPesan" class="font-mono text-ink-600">#PSN-202410-096</span>
                </div>
                <h4 id="modalKlhNama" class="text-sm font-bold text-ink-900">Rian Pratama</h4>
                <p id="modalKlhIsi" class="text-ink-600 italic leading-relaxed pt-1">
                    "AC armada HiAce kurang dingin saat melintasi tanjakan..."
                </p>
            </div>

            <div>
                <label class="block font-bold text-ink-900 uppercase tracking-wider mb-1">Tanggapan &amp; Solusi Resmi Manajemen <span class="text-red-600">*</span></label>
                <textarea rows="3" placeholder="Tuliskan permohonan maaf dan tindakan perbaikan dari manajemen..." class="w-full bg-surface-container-low p-2.5 rounded-xl border border-surface-container text-ink-900 focus:outline-none focus:ring-2 focus:ring-forest-700">Kami mohon maaf atas ketidaknyamanan Anda. Armada HiAce BE 7012 AA telah ditarik ke bengkel pool untuk servis AC dan kami berikan voucher diskon tiket 50% untuk perjalanan Anda selanjutnya.</textarea>
            </div>

            <div>
                <label class="block font-bold text-ink-900 uppercase tracking-wider mb-1">Pemberian Kompensasi (Opsional)</label>
                <select class="w-full bg-surface-container-low p-2.5 rounded-xl border border-surface-container text-ink-900 font-semibold focus:outline-none focus:ring-2 focus:ring-forest-700">
                    <option>Voucher Diskon Tiket 50%</option>
                    <option>Voucher Diskon Tiket 20%</option>
                    <option>Penggantian Dana / Refund Penuh</option>
                    <option>Permohonan Maaf Resmi Saja</option>
                </select>
            </div>

            <div>
                <label class="block font-bold text-ink-900 uppercase tracking-wider mb-1">Perbarui Status Keluhan</label>
                <select class="w-full bg-surface-container-low p-2.5 rounded-xl border border-surface-container text-ink-900 font-semibold focus:outline-none focus:ring-2 focus:ring-forest-700">
                    <option value="SELESAI" selected>Selesai (Solusi Diberikan)</option>
                    <option value="PROSES">Sedang Ditindaklanjuti Bengkel/Driver</option>
                </select>
            </div>

            <div class="pt-2 border-t border-surface-container flex gap-2">
                <button onclick="kirimTanggapan()" class="w-full bg-forest-700 hover:bg-forest-900 text-white font-bold text-xs py-2.5 rounded-lg transition-colors">
                    Kirim Tanggapan
                </button>
                <button onclick="closeModalTanggapan()" class="w-full bg-surface-container hover:bg-surface-container-high text-ink-900 font-medium text-xs py-2.5 rounded-lg transition-colors">
                    Batal
                </button>
            </div>
        </div>
    </div>
</div>

<script>
    function filterKeluhan() {
        const query = document.getElementById('searchKeluhan').value.toLowerCase();
        const kategori = document.getElementById('kategoriFilter').value;
        const rows = document.querySelectorAll('.keluhan-row');

        rows.forEach(row => {
            const text = row.textContent.toLowerCase();
            const matchQuery = text.includes(query);
            const matchKategori = !kategori || (row.dataset.kategori && row.dataset.kategori.includes(kategori));

            row.style.display = (matchQuery && matchKategori) ? '' : 'none';
        });
    }

    function tanggapiKeluhan(id, nama, tiket, isi) {
        document.getElementById('modalKlhId').textContent = id;
        document.getElementById('modalKlhNama').textContent = nama;
        document.getElementById('modalKlhPesan').textContent = tiket;
        document.getElementById('modalKlhIsi').textContent = '"' + isi + '"';
        document.getElementById('modalTanggapan').classList.remove('hidden');
    }

    function closeModalTanggapan() {
        document.getElementById('modalTanggapan').classList.add('hidden');
    }

    function kirimTanggapan() {
        alert('Tanggapan resmi manajemen berhasil dikirimkan ke pelanggan via notifikasi aplikasi & WhatsApp.');
        closeModalTanggapan();
    }
</script>
@endsection
