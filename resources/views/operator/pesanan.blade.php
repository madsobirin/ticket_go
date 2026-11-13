@extends('layouts.admin')

@section('page_title', 'Manajemen Status Pemesanan Tiket')

@section('content')
<div class="space-y-6">
    <!-- PAGE TITLE -->
    <div class="flex flex-col md:flex-row md:items-center justify-between gap-4">
        <div>
            <h2 class="text-xl font-bold text-ink-900 tracking-tight">Manajemen Status Pemesanan Tiket</h2>
            <p class="text-xs text-ink-600 mt-1">Perbarui status pembayaran, konfirmasi kehadiran naik penumpang (check-in/boarding), dan cetak tiket loket.</p>
        </div>
        <div class="flex items-center gap-3">
            <a href="{{ route('operator.layani-pemesanan') }}" class="px-4 py-2.5 rounded-lg bg-forest-700 hover:bg-forest-900 text-white font-semibold text-xs transition-colors flex items-center gap-1.5 shadow-sm">
                <span class="material-symbols-outlined text-[18px]">add_circle</span>
                + Tiket Loket Baru
            </a>
        </div>
    </div>

    <!-- FILTER TABS & SEARCH CONTROLS -->
    <div class="bg-white p-5 rounded-xl border border-surface-container shadow-sm space-y-4">
        <!-- TABS STATUS -->
        <div class="flex items-center gap-2 overflow-x-auto pb-1 border-b border-surface-container">
            <button onclick="filterStatus('SEMUA')" id="tab-SEMUA" class="status-tab font-semibold text-xs px-3.5 py-2 rounded-lg bg-forest-900 text-white transition-colors">
                Semua Status (6)
            </button>
            <button onclick="filterStatus('BELUM_BAYAR')" id="tab-BELUM_BAYAR" class="status-tab font-medium text-xs px-3.5 py-2 rounded-lg text-ink-600 hover:bg-surface-container transition-colors">
                Belum Bayar (1)
            </button>
            <button onclick="filterStatus('VERIFIKASI')" id="tab-VERIFIKASI" class="status-tab font-medium text-xs px-3.5 py-2 rounded-lg text-ink-600 hover:bg-surface-container transition-colors flex items-center gap-1">
                Menunggu Verifikasi (2)
                <span class="w-2 h-2 rounded-full bg-amber-500"></span>
            </button>
            <button onclick="filterStatus('LUNAS')" id="tab-LUNAS" class="status-tab font-medium text-xs px-3.5 py-2 rounded-lg text-ink-600 hover:bg-surface-container transition-colors">
                Lunas / Tiket Terbit (2)
            </button>
            <button onclick="filterStatus('BOARDING')" id="tab-BOARDING" class="status-tab font-medium text-xs px-3.5 py-2 rounded-lg text-ink-600 hover:bg-surface-container transition-colors">
                Naik / Boarding (1)
            </button>
            <button onclick="filterStatus('BATAL')" id="tab-BATAL" class="status-tab font-medium text-xs px-3.5 py-2 rounded-lg text-ink-600 hover:bg-surface-container transition-colors">
                Dibatalkan (0)
            </button>
        </div>

        <!-- SEARCH & FILTER BAR -->
        <div class="grid grid-cols-1 md:grid-cols-12 gap-3 items-center">
            <div class="md:col-span-6 relative">
                <span class="absolute inset-y-0 left-0 pl-3.5 flex items-center pointer-events-none text-ink-600">
                    <span class="material-symbols-outlined text-[18px]">search</span>
                </span>
                <input id="searchInput" onkeyup="searchTable()" type="text" placeholder="Cari ID Pesan (#PSN-...), nama penumpang, atau rute..." class="w-full pl-10 pr-4 py-2.5 rounded-lg bg-surface-container-low border border-surface-container focus:bg-white focus:border-forest-700 text-xs text-ink-900 transition-colors">
            </div>
            <div class="md:col-span-3">
                <select id="routeFilter" onchange="searchTable()" class="w-full py-2.5 px-3 rounded-lg bg-surface-container-low border border-surface-container text-xs text-ink-900">
                    <option value="">Semua Rute Perjalanan</option>
                    <option value="Krui">Bandar Lampung → Krui</option>
                    <option value="Metro">Bandar Lampung → Metro</option>
                    <option value="Kotabumi">Bandar Lampung → Kotabumi</option>
                </select>
            </div>
            <div class="md:col-span-3">
                <input type="date" value="2026-11-10" class="w-full py-2.5 px-3 rounded-lg bg-surface-container-low border border-surface-container text-xs text-ink-900 font-mono">
            </div>
        </div>
    </div>

    <!-- TABEL PEMESANAN -->
    <div class="bg-white rounded-xl border border-surface-container shadow-sm overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse text-xs">
                <thead>
                    <tr class="bg-surface-container-low text-ink-600 font-semibold uppercase tracking-wider text-[11px] border-b border-surface-container">
                        <th class="py-3.5 px-4">ID Pesan</th>
                        <th class="py-3.5 px-4">Nama Penumpang</th>
                        <th class="py-3.5 px-4">Rute &amp; Jadwal</th>
                        <th class="py-3.5 px-4">Kursi &amp; Armada</th>
                        <th class="py-3.5 px-4">Tarif</th>
                        <th class="py-3.5 px-4">Status Pemesanan</th>
                        <th class="py-3.5 px-4 text-center">Aksi Operator</th>
                    </tr>
                </thead>
                <tbody id="pesananTableBody" class="divide-y divide-surface-container text-ink-900 font-medium">
                    <!-- ROW 1 -->
                    <tr class="hover:bg-surface-container-low/50 transition-colors pesanan-row" data-status="VERIFIKASI" data-rute="Krui">
                        <td class="py-4 px-4 font-mono font-bold text-forest-700">
                            #PSN-202410-098
                            <span class="block text-[10px] text-ink-600 font-normal">08 Nov 14:10</span>
                        </td>
                        <td class="py-4 px-4">
                            <div class="font-bold text-ink-900">Bambang Hermanto</div>
                            <span class="text-[11px] text-ink-600">081234567890 • Member</span>
                        </td>
                        <td class="py-4 px-4">
                            <div class="font-semibold text-ink-900">Bandar Lampung → Krui</div>
                            <span class="text-[11px] text-ink-600">10 Nov 2026 • 08:00 WIB</span>
                        </td>
                        <td class="py-4 px-4">
                            <span class="font-bold bg-sage-100 text-forest-900 px-2 py-0.5 rounded text-[11px]">Kursi 3</span>
                            <span class="block text-[10px] text-ink-600 mt-0.5">HiAce BE 7012 AA</span>
                        </td>
                        <td class="py-4 px-4 font-mono font-bold text-ink-900">
                            Rp 120.354
                            <span class="block text-[10px] text-ink-600 font-normal">Transfer Mandiri</span>
                        </td>
                        <td class="py-4 px-4">
                            <span class="inline-flex items-center gap-1 bg-amber-50 text-amber-700 font-bold px-2.5 py-1 rounded-full text-[11px]">
                                <span class="w-1.5 h-1.5 rounded-full bg-amber-500 animate-pulse"></span>
                                Menunggu Verifikasi
                            </span>
                        </td>
                        <td class="py-4 px-4 text-center">
                            <div class="flex items-center justify-center gap-1.5">
                                <button onclick="openModalStatus('#PSN-202410-098', 'Bambang Hermanto', 'Menunggu Verifikasi')" class="px-2.5 py-1.5 rounded-lg bg-forest-700 hover:bg-forest-900 text-white font-semibold text-[11px] transition-colors shadow-sm">
                                    Ubah Status
                                </button>
                                <button onclick="openModalCetakTiket('#PSN-202410-098', 'Bambang Hermanto', 'Bandar Lampung → Krui', 'Kursi 3', 'Rp 120.000')" class="p-1.5 rounded-lg bg-surface-container hover:bg-forest-700 hover:text-white text-ink-900 transition-colors" title="Pratinjau Tiket">
                                    <span class="material-symbols-outlined text-[16px]">print</span>
                                </button>
                            </div>
                        </td>
                    </tr>

                    <!-- ROW 2 -->
                    <tr class="hover:bg-surface-container-low/50 transition-colors pesanan-row" data-status="LUNAS" data-rute="Metro">
                        <td class="py-4 px-4 font-mono font-bold text-forest-700">
                            #PSN-202410-055
                            <span class="block text-[10px] text-ink-600 font-normal">02 Nov 09:30</span>
                        </td>
                        <td class="py-4 px-4">
                            <div class="font-bold text-ink-900">Siti Rahayu</div>
                            <span class="text-[11px] text-ink-600">082188991122 • Walk-in</span>
                        </td>
                        <td class="py-4 px-4">
                            <div class="font-semibold text-ink-900">Bandar Lampung → Metro</div>
                            <span class="text-[11px] text-ink-600">02 Nov 2026 • 10:30 WIB</span>
                        </td>
                        <td class="py-4 px-4">
                            <span class="font-bold bg-sage-100 text-forest-900 px-2 py-0.5 rounded text-[11px]">Kursi 1</span>
                            <span class="block text-[10px] text-ink-600 mt-0.5">Innova BE 7078 DD</span>
                        </td>
                        <td class="py-4 px-4 font-mono font-bold text-ink-900">
                            Rp 45.000
                            <span class="block text-[10px] text-ink-600 font-normal">Tunai di Loket</span>
                        </td>
                        <td class="py-4 px-4">
                            <span class="inline-flex items-center gap-1 bg-green-50 text-green-700 font-bold px-2.5 py-1 rounded-full text-[11px]">
                                <span class="material-symbols-outlined text-[13px]">check</span>
                                Lunas / Tiket Terbit
                            </span>
                        </td>
                        <td class="py-4 px-4 text-center">
                            <div class="flex items-center justify-center gap-1.5">
                                <button onclick="openModalStatus('#PSN-202410-055', 'Siti Rahayu', 'Lunas / Tiket Terbit')" class="px-2.5 py-1.5 rounded-lg bg-surface-container hover:bg-forest-700 hover:text-white font-semibold text-[11px] transition-colors">
                                    Status
                                </button>
                                <button onclick="openModalCetakTiket('#PSN-202410-055', 'Siti Rahayu', 'Bandar Lampung → Metro', 'Kursi 1', 'Rp 45.000')" class="p-1.5 rounded-lg bg-surface-container hover:bg-forest-700 hover:text-white text-ink-900 transition-colors" title="Cetak Tiket">
                                    <span class="material-symbols-outlined text-[16px]">print</span>
                                </button>
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- MODAL UBAH STATUS PEMESANAN -->
<div id="modalStatus" class="fixed inset-0 bg-black/50 backdrop-blur-xs z-50 hidden flex items-center justify-center p-4">
    <div class="bg-white rounded-2xl max-w-md w-full p-6 space-y-4 shadow-xl">
        <div class="flex items-center justify-between pb-3 border-b border-surface-container">
            <h3 class="text-base font-bold text-ink-900">Perbarui Status Pemesanan</h3>
            <button onclick="closeModalStatus()" class="text-ink-600 hover:text-ink-900 p-1">
                <span class="material-symbols-outlined text-[20px]">close</span>
            </button>
        </div>

        <div class="space-y-3 text-xs">
            <div>
                <label class="block text-ink-600 uppercase font-semibold text-[10px] mb-1">ID Pemesanan</label>
                <div id="modalIdPesan" class="font-mono text-base font-bold text-forest-700">#PSN-202410-098</div>
            </div>

            <div>
                <label class="block text-ink-600 uppercase font-semibold text-[10px] mb-1">Nama Penumpang</label>
                <input id="modalNamaPenumpang" type="text" class="w-full bg-surface-container-low p-2.5 rounded-lg border border-surface-container text-ink-900 font-medium" readonly>
            </div>

            <div>
                <label class="block text-ink-900 font-bold uppercase tracking-wider text-[11px] mb-1.5">Pilih Status Baru <span class="text-red-600">*</span></label>
                <select id="pilihanStatus" class="w-full bg-surface-container-low p-2.5 rounded-lg border border-surface-container text-ink-900 font-semibold focus:outline-none focus:ring-2 focus:ring-forest-700">
                    <option value="LUNAS">Lunas & Tiket Diterbitkan</option>
                    <option value="BOARDING">Penumpang Naik / Boarding</option>
                    <option value="BATAL">Batalkan Pesanan (Bebaskan Kursi)</option>
                </select>
            </div>

            <div class="pt-3 border-t border-surface-container flex gap-2">
                <button onclick="simpanStatus()" class="w-full bg-forest-700 hover:bg-forest-900 text-white font-bold text-xs py-2.5 rounded-lg transition-colors">
                    Simpan Perubahan
                </button>
                <button onclick="closeModalStatus()" class="w-full bg-surface-container hover:bg-surface-container-high text-ink-900 font-medium text-xs py-2.5 rounded-lg transition-colors">
                    Batal
                </button>
            </div>
        </div>
    </div>
</div>

<!-- MODAL CETAK TIKET LOKET -->
<div id="modalCetakTiket" class="fixed inset-0 bg-black/50 backdrop-blur-xs z-50 hidden flex items-center justify-center p-4">
    <div class="bg-white rounded-2xl max-w-md w-full p-6 space-y-5 shadow-xl">
        <div class="flex items-center justify-between pb-3 border-b border-surface-container">
            <h3 class="text-base font-bold text-ink-900">Tiket Resmi Penumpang</h3>
            <button onclick="closeModalCetakTiket()" class="text-ink-600 hover:text-ink-900 p-1">
                <span class="material-symbols-outlined text-[20px]">close</span>
            </button>
        </div>

        <div class="bg-surface-container-low p-4 rounded-xl space-y-3 text-xs border border-surface-container">
            <div class="flex items-center justify-between border-b border-surface-container pb-2">
                <div>
                    <span class="text-xs font-bold text-forest-900 block">Lintas Lampung</span>
                    <span class="text-[10px] text-ink-600">Tiket Perjalanan Resmi</span>
                </div>
                <strong id="ticketId" class="font-mono text-forest-700 text-sm font-bold">#PSN-202410-098</strong>
            </div>

            <div class="grid grid-cols-2 gap-2 text-xs">
                <div>
                    <span class="text-[10px] text-ink-600 block uppercase">Nama Penumpang</span>
                    <span id="ticketNama" class="font-bold text-ink-900 text-sm">Bambang Hermanto</span>
                </div>
                <div>
                    <span class="text-[10px] text-ink-600 block uppercase">Nomor Kursi</span>
                    <span id="ticketKursi" class="font-mono font-bold text-forest-700 text-sm bg-sage-100 px-2 py-0.5 rounded inline-block">Kursi 3</span>
                </div>
                <div>
                    <span class="text-[10px] text-ink-600 block uppercase">Rute Perjalanan</span>
                    <span id="ticketRute" class="font-semibold text-ink-900">Bandar Lampung → Krui</span>
                </div>
                <div>
                    <span class="text-[10px] text-ink-600 block uppercase">Tarif Tiket</span>
                    <span id="ticketTarif" class="font-mono font-bold text-ink-900">Rp 120.000</span>
                </div>
            </div>

            <div class="bg-white p-3 rounded-lg border border-surface-container flex items-center justify-between text-xs">
                <div class="space-y-0.5">
                    <span class="text-[10px] text-ink-600 block">Titik Naik:</span>
                    <strong class="text-ink-900">Pool Utama Rajabasa (Loket 01)</strong>
                    <span class="block text-[10px] text-ink-600">Jadwal: 10 Nov 2026 • 08:00 WIB</span>
                </div>
                <div class="text-center font-mono">
                    <div class="h-8 w-24 bg-ink-900 mx-auto flex items-center justify-center text-white text-[9px] tracking-widest">
                        |||| ||| |||||
                    </div>
                    <span class="text-[9px] text-ink-600 mt-0.5 block">VALID LOKET</span>
                </div>
            </div>
        </div>

        <div class="flex items-center gap-3">
            <button onclick="window.print()" class="w-full bg-forest-700 hover:bg-forest-900 text-white font-semibold text-xs py-2.5 rounded-lg flex items-center justify-center gap-2 shadow-sm transition-colors">
                <span class="material-symbols-outlined text-[18px]">print</span>
                Cetak Tiket / Boarding Pass
            </button>
            <button onclick="closeModalCetakTiket()" class="w-full bg-surface-container hover:bg-surface-container-high text-ink-900 font-medium text-xs py-2.5 rounded-lg transition-colors">
                Tutup
            </button>
        </div>
    </div>
</div>

<script>
    function filterStatus(status) {
        document.querySelectorAll('.status-tab').forEach(tab => {
            tab.classList.remove('bg-forest-900', 'text-white');
            tab.classList.add('text-ink-600');
        });
        const activeTab = document.getElementById('tab-' + status);
        if (activeTab) {
            activeTab.classList.add('bg-forest-900', 'text-white');
            activeTab.classList.remove('text-ink-600');
        }

        const rows = document.querySelectorAll('.pesanan-row');
        rows.forEach(row => {
            row.style.display = (status === 'SEMUA' || row.dataset.status === status) ? '' : 'none';
        });
    }

    function searchTable() {
        const query = document.getElementById('searchInput').value.toLowerCase();
        const route = document.getElementById('routeFilter').value.toLowerCase();
        const rows = document.querySelectorAll('.pesanan-row');

        rows.forEach(row => {
            const text = row.textContent.toLowerCase();
            const matchText = text.includes(query);
            const matchRoute = !route || (row.dataset.rute && row.dataset.rute.toLowerCase().includes(route));

            row.style.display = (matchText && matchRoute) ? '' : 'none';
        });
    }

    function openModalStatus(id, nama, status) {
        document.getElementById('modalIdPesan').textContent = id;
        document.getElementById('modalNamaPenumpang').value = nama;
        document.getElementById('modalStatus').classList.remove('hidden');
    }

    function closeModalStatus() {
        document.getElementById('modalStatus').classList.add('hidden');
    }

    function simpanStatus() {
        const statusSelect = document.getElementById('pilihanStatus');
        const statusText = statusSelect.options[statusSelect.selectedIndex].text;
        alert('Status pemesanan ' + document.getElementById('modalIdPesan').textContent + ' berhasil diperbarui ke: ' + statusText);
        closeModalStatus();
    }

    function openModalCetakTiket(id, nama, rute, kursi, tarif) {
        document.getElementById('ticketId').textContent = id;
        document.getElementById('ticketNama').textContent = nama;
        document.getElementById('ticketRute').textContent = rute;
        document.getElementById('ticketKursi').textContent = kursi;
        document.getElementById('ticketTarif').textContent = tarif;
        document.getElementById('modalCetakTiket').classList.remove('hidden');
    }

    function closeModalCetakTiket() {
        document.getElementById('modalCetakTiket').classList.add('hidden');
    }
</script>
@endsection
