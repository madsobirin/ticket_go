@extends('layouts.admin')

@section('page_title', 'Pelayanan Tiket Langsung (Walk-in Loket)')

@section('content')
<div class="space-y-6">
    <!-- PAGE TITLE -->
    <div class="flex flex-col md:flex-row md:items-center justify-between gap-4">
        <div>
            <h2 class="text-xl font-bold text-ink-900 tracking-tight">Pelayanan Tiket Langsung (Walk-in Loket)</h2>
            <p class="text-xs text-ink-600 mt-1">Formulir cepat staf loket untuk melayani penumpang datang langsung ke pool atau reservasi via telepon loket.</p>
        </div>
        <div class="flex items-center gap-2">
            <span class="text-xs bg-white border border-surface-container px-3 py-2 rounded-xl text-forest-900 font-semibold flex items-center gap-1.5 shadow-sm">
                <span class="material-symbols-outlined text-green-700 text-[18px]">print</span>
                Siap Cetak Tiket Thermal Loket
            </span>
        </div>
    </div>

    <!-- GRID DUA KOLOM: FORM PESANAN & KASIR -->
    <div class="grid grid-cols-1 lg:grid-cols-12 gap-6 items-start">
        <!-- SISI KIRI: INPUT PERJALANAN, DENAH KURSI, DATA PENUMPANG (8 SPAN) -->
        <div class="lg:col-span-8 space-y-6">
            <!-- LANGKAH 1: PILIH RUTE & JADWAL -->
            <div class="bg-white rounded-xl p-5 shadow-sm border border-surface-container space-y-4">
                <div class="flex items-center gap-2.5 pb-3 border-b border-surface-container">
                    <div class="w-7 h-7 rounded-lg bg-forest-700 text-white flex items-center justify-center font-bold text-xs">1</div>
                    <h3 class="text-sm font-bold text-ink-900">Pilih Rute &amp; Jadwal Keberangkatan</h3>
                </div>

                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-3 text-xs">
                    <div>
                        <label class="block font-bold text-ink-900 uppercase tracking-wider mb-1">Kota Asal</label>
                        <select id="selAsal" onchange="updateSummary()" class="w-full bg-surface-container-low p-2 rounded-lg border border-surface-container text-ink-900 font-semibold focus:outline-none focus:ring-2 focus:ring-forest-700">
                            <option value="Bandar Lampung (Pool Rajabasa)" selected>Bandar Lampung (Rajabasa)</option>
                            <option value="Metro">Metro (Pool Metro)</option>
                            <option value="Kotabumi">Kotabumi (Pool Kotabumi)</option>
                        </select>
                    </div>

                    <div>
                        <label class="block font-bold text-ink-900 uppercase tracking-wider mb-1">Kota Tujuan</label>
                        <select id="selTujuan" onchange="updateSummary()" class="w-full bg-surface-container-low p-2 rounded-lg border border-surface-container text-ink-900 font-semibold focus:outline-none focus:ring-2 focus:ring-forest-700">
                            <option value="Krui (Pesisir Barat)" selected>Krui (Pesisir Barat)</option>
                            <option value="Metro">Metro</option>
                            <option value="Kotabumi">Kotabumi</option>
                            <option value="Kalianda">Kalianda</option>
                        </select>
                    </div>

                    <div>
                        <label class="block font-bold text-ink-900 uppercase tracking-wider mb-1">Tanggal</label>
                        <input id="selTanggal" type="date" value="2026-11-10" onchange="updateSummary()" class="w-full bg-surface-container-low p-2 rounded-lg border border-surface-container text-ink-900 font-mono focus:outline-none focus:ring-2 focus:ring-forest-700">
                    </div>

                    <div>
                        <label class="block font-bold text-ink-900 uppercase tracking-wider mb-1">Pilihan Trip / Jam</label>
                        <select id="selJam" onchange="updateSummary()" class="w-full bg-surface-container-low p-2 rounded-lg border border-surface-container text-ink-900 font-semibold focus:outline-none focus:ring-2 focus:ring-forest-700">
                            <option value="08:00 WIB (Pagi)" selected>08:00 WIB - HiAce</option>
                            <option value="10:30 WIB (Pagi)">10:30 WIB - HiAce</option>
                            <option value="13:00 WIB (Siang)">13:00 WIB - Elf Long</option>
                            <option value="16:30 WIB (Sore)">16:30 WIB - HiAce</option>
                        </select>
                    </div>
                </div>
            </div>

            <!-- LANGKAH 2: DENAH KURSI INTERAKTIF KABIN HIACE -->
            <div class="bg-white rounded-xl p-5 shadow-sm border border-surface-container space-y-4">
                <div class="flex items-center justify-between pb-3 border-b border-surface-container">
                    <div class="flex items-center gap-2.5">
                        <div class="w-7 h-7 rounded-lg bg-forest-700 text-white flex items-center justify-center font-bold text-xs">2</div>
                        <div>
                            <h3 class="text-sm font-bold text-ink-900">Pilih Kursi Penumpang di Denah Kabin</h3>
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
                <div class="max-w-md mx-auto bg-surface-container-low p-5 rounded-xl border border-surface-container space-y-3">
                    <div class="flex items-center justify-between pb-2 border-b border-surface-container">
                        <div class="w-12 h-10 rounded-lg bg-ink-900 text-white flex flex-col items-center justify-center text-[9px] font-bold">
                            <span class="material-symbols-outlined text-[14px]">sports_motorsports</span>
                            SUPIR
                        </div>
                        <div class="text-[10px] text-ink-600 uppercase font-bold tracking-wider">
                            &larr; DEPAN ARMADA &rarr;
                        </div>
                        <button type="button" onclick="pilihKursiLoket(1, this)" class="seat-btn w-12 h-10 rounded-lg bg-green-700 text-white font-bold text-xs flex flex-col items-center justify-center shadow-xs">
                            <span class="text-[8px] opacity-80">DEPAN</span>
                            <span>K-1</span>
                        </button>
                    </div>

                    <div class="flex justify-between">
                        <button type="button" class="w-12 h-10 rounded-lg bg-red-100 text-red-600 font-bold text-xs flex flex-col items-center justify-center cursor-not-allowed" disabled>
                            <span class="text-[8px]">TERISI</span>
                            <span>K-2</span>
                        </button>
                        <button type="button" class="w-12 h-10 rounded-lg bg-red-100 text-red-600 font-bold text-xs flex flex-col items-center justify-center cursor-not-allowed" disabled>
                            <span class="text-[8px]">TERISI</span>
                            <span>K-3</span>
                        </button>
                    </div>

                    <div class="flex justify-between">
                        <button type="button" onclick="pilihKursiLoket(4, this)" class="seat-btn w-12 h-10 rounded-lg bg-green-700 text-white font-bold text-xs flex flex-col items-center justify-center shadow-xs">
                            <span class="text-[8px] opacity-80">TENGAH</span>
                            <span>K-4</span>
                        </button>
                        <button type="button" onclick="pilihKursiLoket(5, this)" class="seat-btn w-12 h-10 rounded-lg bg-forest-900 ring-2 ring-amber-500 text-white font-bold text-xs flex flex-col items-center justify-center shadow-xs">
                            <span class="text-[8px] opacity-80">BELAKANG</span>
                            <span>K-5</span>
                        </button>
                    </div>
                </div>
            </div>

            <!-- LANGKAH 3: DATA PENUMPANG -->
            <div class="bg-white rounded-xl p-5 shadow-sm border border-surface-container space-y-4">
                <div class="flex items-center gap-2.5 pb-3 border-b border-surface-container">
                    <div class="w-7 h-7 rounded-lg bg-forest-700 text-white flex items-center justify-center font-bold text-xs">3</div>
                    <h3 class="text-sm font-bold text-ink-900">Data Identitas Penumpang</h3>
                </div>

                <div class="grid grid-cols-1 sm:grid-cols-2 gap-3 text-xs">
                    <div>
                        <label class="block font-bold text-ink-900 uppercase tracking-wider mb-1">Nama Lengkap Penumpang <span class="text-red-600">*</span></label>
                        <input id="inputNama" onkeyup="updateSummary()" type="text" placeholder="Cth: Bapak Joko Susanto" class="w-full bg-surface-container-low p-2.5 rounded-lg border border-surface-container text-ink-900 focus:outline-none focus:ring-2 focus:ring-forest-700" required>
                    </div>

                    <div>
                        <label class="block font-bold text-ink-900 uppercase tracking-wider mb-1">Nomor WhatsApp / HP <span class="text-red-600">*</span></label>
                        <input id="inputHp" type="tel" placeholder="08xxxxxxxxxx" class="w-full bg-surface-container-low p-2.5 rounded-lg border border-surface-container text-ink-900 font-mono focus:outline-none focus:ring-2 focus:ring-forest-700" required>
                    </div>
                </div>
            </div>
        </div>

        <!-- SISI KANAN: RINGKASAN & KASIR (4 SPAN) -->
        <div class="lg:col-span-4 space-y-6">
            <div class="bg-white rounded-xl p-5 shadow-sm border border-surface-container space-y-4 text-xs">
                <h3 class="font-bold text-ink-900 pb-2 border-b border-surface-container">Ringkasan Reservasi Loket</h3>

                <div class="space-y-2">
                    <div class="flex justify-between">
                        <span class="text-ink-600">Penumpang:</span>
                        <strong id="sumNama" class="text-ink-900">Nama Penumpang</strong>
                    </div>
                    <div class="flex justify-between">
                        <span class="text-ink-600">Rute:</span>
                        <strong id="sumRute" class="text-ink-900">Bandar Lampung → Krui</strong>
                    </div>
                    <div class="flex justify-between">
                        <span class="text-ink-600">Jadwal:</span>
                        <span id="sumJadwal" class="text-ink-900 font-semibold">10 Nov • 08:00</span>
                    </div>
                    <div class="flex justify-between">
                        <span class="text-ink-600">Nomor Kursi:</span>
                        <span id="sumKursi" class="font-bold text-forest-700">Kursi 5 (K-5)</span>
                    </div>
                    <div class="flex justify-between pt-2 border-t border-surface-container text-sm">
                        <span class="font-bold text-ink-900">Total Tarif:</span>
                        <strong class="font-mono text-forest-700 font-bold">Rp 120.000</strong>
                    </div>
                </div>

                <div class="pt-3 border-t border-surface-container space-y-3">
                    <label class="block font-bold text-ink-900 uppercase tracking-wider text-[11px]">Uang Diterima dari Penumpang (Rp)</label>
                    <input id="inputUang" onkeyup="hitungKembalian()" type="number" placeholder="150000" class="w-full bg-surface-container-low p-2.5 rounded-lg border border-surface-container text-ink-900 font-mono text-sm font-bold focus:outline-none focus:ring-2 focus:ring-forest-700">
                    <div class="flex justify-between items-center text-xs">
                        <span class="text-ink-600">Kembalian:</span>
                        <span id="displayKembalian" class="font-mono text-sm font-bold text-forest-700">Rp 0</span>
                    </div>
                </div>

                <button onclick="prosesTiketLoket()" class="w-full bg-forest-700 hover:bg-forest-900 text-white font-bold text-xs py-3 rounded-lg shadow-sm transition-colors flex items-center justify-center gap-2">
                    <span class="material-symbols-outlined text-[18px]">check_circle</span>
                    Proses &amp; Cetak Tiket
                </button>
            </div>
        </div>
    </div>
</div>

<!-- MODAL SUKSES TIKET LOKET -->
<div id="modalSuksesLoket" class="fixed inset-0 bg-black/50 backdrop-blur-xs z-50 hidden flex items-center justify-center p-4">
    <div class="bg-white rounded-2xl max-w-sm w-full p-6 text-center space-y-4 shadow-xl">
        <div class="w-14 h-14 bg-green-100 text-green-700 rounded-full flex items-center justify-center mx-auto">
            <span class="material-symbols-outlined text-3xl">check</span>
        </div>
        <h3 class="text-base font-bold text-ink-900">Tiket Berhasil Diterbitkan!</h3>
        <p class="text-xs text-ink-600">Tiket untuk <strong id="modalSuksesNama">Penumpang</strong> pada <span id="modalSuksesKursi">Kursi 5</span> telah sah dicatat dalam sistem.</p>
        <p class="text-xs font-mono text-forest-700 font-bold">Kembalian: <span id="modalSuksesKembalian">Rp 0</span></p>

        <div class="pt-2 flex gap-2">
            <button onclick="window.print(); document.getElementById('modalSuksesLoket').classList.add('hidden');" class="w-full bg-forest-700 text-white font-semibold text-xs py-2.5 rounded-lg">
                Cetak Thermal
            </button>
            <button onclick="document.getElementById('modalSuksesLoket').classList.add('hidden');" class="w-full bg-surface-container text-ink-900 font-medium text-xs py-2.5 rounded-lg">
                Selesai
            </button>
        </div>
    </div>
</div>

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
            document.getElementById('displayKembalian').className = 'font-mono text-sm font-bold text-green-700';
        } else {
            document.getElementById('displayKembalian').textContent = 'Kurang Rp ' + Math.abs(kembalian).toLocaleString('id-ID');
            document.getElementById('displayKembalian').className = 'font-mono text-sm font-bold text-red-600';
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
@endsection
