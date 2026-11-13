@extends('layouts.admin')

@section('page_title', 'Manajemen Data Member & Pelanggan')

@section('content')
<div class="space-y-6">
    <!-- PAGE TITLE -->
    <div class="flex flex-col md:flex-row md:items-center justify-between gap-4">
        <div>
            <h2 class="text-xl font-bold text-ink-900 tracking-tight">Manajemen Data Member &amp; Pelanggan</h2>
            <p class="text-xs text-ink-600 mt-1">Kelola data identitas pengguna terdaftar, pantau riwayat perjalanan, dan atur status akun aktif/blokir.</p>
        </div>
        <div class="flex items-center gap-3">
            <button onclick="openModalTambahPelanggan()" class="px-4 py-2.5 rounded-lg bg-forest-700 hover:bg-forest-900 text-white font-semibold text-xs transition-colors flex items-center gap-1.5 shadow-sm">
                <span class="material-symbols-outlined text-[18px]">person_add</span>
                + Tambah Pelanggan Baru
            </button>
        </div>
    </div>

    <!-- STATS RINGKAS -->
    <div class="grid grid-cols-1 sm:grid-cols-4 gap-4 text-xs">
        <div class="bg-white p-4 rounded-xl border border-surface-container shadow-sm">
            <span class="text-ink-600 block">Total Member Terdaftar</span>
            <span class="text-xl font-bold font-mono text-forest-900 mt-1 block">1.420 Orang</span>
        </div>
        <div class="bg-white p-4 rounded-xl border border-surface-container shadow-sm">
            <span class="text-ink-600 block">Akun Member Aktif</span>
            <span class="text-xl font-bold font-mono text-green-700 mt-1 block">1.380 Akun</span>
        </div>
        <div class="bg-white p-4 rounded-xl border border-surface-container shadow-sm">
            <span class="text-ink-600 block">Akun Ditangguhkan</span>
            <span class="text-xl font-bold font-mono text-amber-500 mt-1 block">35 Akun</span>
        </div>
        <div class="bg-white p-4 rounded-xl border border-surface-container shadow-sm">
            <span class="text-ink-600 block">Akun Diblokir</span>
            <span class="text-xl font-bold font-mono text-red-600 mt-1 block">5 Akun</span>
        </div>
    </div>

    <!-- SEARCH & FILTER -->
    <div class="bg-white p-4 rounded-xl border border-surface-container shadow-sm flex flex-col sm:flex-row items-center justify-between gap-3 text-xs">
        <div class="w-full sm:w-96 relative">
            <span class="absolute inset-y-0 left-0 pl-3.5 flex items-center pointer-events-none text-ink-600">
                <span class="material-symbols-outlined text-[18px]">search</span>
            </span>
            <input id="searchPelanggan" onkeyup="filterPelanggan()" type="text" placeholder="Cari nama pelanggan, username, nomor HP, atau ID..." class="w-full pl-10 pr-4 py-2 rounded-lg bg-surface-container-low border border-surface-container text-xs text-ink-900 focus:outline-none focus:ring-2 focus:ring-forest-700">
        </div>
        <div class="flex items-center gap-2">
            <select id="statusFilter" onchange="filterPelanggan()" class="py-2 px-3 rounded-lg bg-surface-container-low border border-surface-container text-xs text-ink-900 focus:outline-none focus:ring-2 focus:ring-forest-700">
                <option value="">Semua Status Akun</option>
                <option value="Aktif">Status: Aktif</option>
                <option value="Ditangguhkan">Status: Ditangguhkan</option>
                <option value="Diblokir">Status: Diblokir</option>
            </select>
        </div>
    </div>

    <!-- TABEL DATA PELANGGAN -->
    <div class="bg-white rounded-xl border border-surface-container shadow-sm overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse text-xs">
                <thead>
                    <tr class="bg-surface-container-low text-ink-600 font-semibold uppercase tracking-wider text-[11px] border-b border-surface-container">
                        <th class="py-3.5 px-4">ID Member</th>
                        <th class="py-3.5 px-4">Nama &amp; Username</th>
                        <th class="py-3.5 px-4">Kontak (HP &amp; Email)</th>
                        <th class="py-3.5 px-4">Alamat Domisili</th>
                        <th class="py-3.5 px-4">Total Booking</th>
                        <th class="py-3.5 px-4">Status Akun</th>
                        <th class="py-3.5 px-4 text-center">Aksi Admin</th>
                    </tr>
                </thead>
                <tbody id="tablePelangganBody" class="divide-y divide-surface-container font-medium text-ink-900">
                    <!-- MEMBER 1 -->
                    <tr class="hover:bg-surface-container-low/50 transition-colors pelanggan-row" data-status="Aktif">
                        <td class="py-4 px-4 font-mono font-bold text-forest-700">MBR-0081</td>
                        <td class="py-4 px-4">
                            <div class="flex items-center gap-2.5">
                                <div class="w-8 h-8 rounded-full bg-forest-700 text-white font-bold flex items-center justify-center text-xs">
                                    BH
                                </div>
                                <div>
                                    <strong class="font-bold text-ink-900 block text-xs">Bambang Hermanto</strong>
                                    <span class="text-[11px] text-ink-600">@bambang_h</span>
                                </div>
                            </div>
                        </td>
                        <td class="py-4 px-4">
                            <div class="font-mono text-ink-900">081234567890</div>
                            <span class="text-[11px] text-ink-600">bambang@gmail.com</span>
                        </td>
                        <td class="py-4 px-4 text-ink-600 max-w-[200px] truncate" title="Jl. Raden Intan No. 45, Enggal, Bandar Lampung">
                            Jl. Raden Intan No. 45, Bandar Lampung
                        </td>
                        <td class="py-4 px-4">
                            <span class="font-bold text-ink-900">12 Tiket</span>
                            <span class="block text-[10px] text-ink-600">Rp 1.440.000</span>
                        </td>
                        <td class="py-4 px-4">
                            <span class="bg-green-50 text-green-700 font-bold px-2.5 py-1 rounded-full text-[11px] inline-flex items-center gap-1">
                                <span class="material-symbols-outlined text-[13px]">check</span> Aktif
                            </span>
                        </td>
                        <td class="py-4 px-4 text-center">
                            <div class="flex items-center justify-center gap-1.5">
                                <button onclick="lihatDetailMember('MBR-0081', 'Bambang Hermanto', '081234567890', 'bambang@gmail.com', '12 Tiket', 'Aktif')" class="p-1.5 rounded-lg bg-surface-container hover:bg-forest-700 hover:text-white transition-colors" title="Lihat Detail Riwayat">
                                    <span class="material-symbols-outlined text-[16px]">visibility</span>
                                </button>
                                <button onclick="editMember('MBR-0081', 'Bambang Hermanto', '081234567890', 'bambang@gmail.com')" class="p-1.5 rounded-lg bg-surface-container hover:bg-amber-500 hover:text-forest-900 transition-colors" title="Edit Data">
                                    <span class="material-symbols-outlined text-[16px]">edit</span>
                                </button>
                            </div>
                        </td>
                    </tr>

                    <!-- MEMBER 2 -->
                    <tr class="hover:bg-surface-container-low/50 transition-colors pelanggan-row" data-status="Aktif">
                        <td class="py-4 px-4 font-mono font-bold text-forest-700">MBR-0082</td>
                        <td class="py-4 px-4">
                            <div class="flex items-center gap-2.5">
                                <div class="w-8 h-8 rounded-full bg-forest-700 text-white font-bold flex items-center justify-center text-xs">
                                    SN
                                </div>
                                <div>
                                    <strong class="font-bold text-ink-900 block text-xs">Siti Nurhaliza</strong>
                                    <span class="text-[11px] text-ink-600">@siti_nur</span>
                                </div>
                            </div>
                        </td>
                        <td class="py-4 px-4">
                            <div class="font-mono text-ink-900">082188990011</div>
                            <span class="text-[11px] text-ink-600">siti.nur@yahoo.com</span>
                        </td>
                        <td class="py-4 px-4 text-ink-600 max-w-[200px] truncate">
                            Jl. Kartini No. 12, Tanjung Karang
                        </td>
                        <td class="py-4 px-4">
                            <span class="font-bold text-ink-900">8 Tiket</span>
                            <span class="block text-[10px] text-ink-600">Rp 960.000</span>
                        </td>
                        <td class="py-4 px-4">
                            <span class="bg-green-50 text-green-700 font-bold px-2.5 py-1 rounded-full text-[11px] inline-flex items-center gap-1">
                                <span class="material-symbols-outlined text-[13px]">check</span> Aktif
                            </span>
                        </td>
                        <td class="py-4 px-4 text-center">
                            <div class="flex items-center justify-center gap-1.5">
                                <button onclick="lihatDetailMember('MBR-0082', 'Siti Nurhaliza', '082188990011', 'siti.nur@yahoo.com', '8 Tiket', 'Aktif')" class="p-1.5 rounded-lg bg-surface-container hover:bg-forest-700 hover:text-white transition-colors">
                                    <span class="material-symbols-outlined text-[16px]">visibility</span>
                                </button>
                                <button onclick="editMember('MBR-0082', 'Siti Nurhaliza', '082188990011', 'siti.nur@yahoo.com')" class="p-1.5 rounded-lg bg-surface-container hover:bg-amber-500 hover:text-forest-900 transition-colors">
                                    <span class="material-symbols-outlined text-[16px]">edit</span>
                                </button>
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- MODAL TAMBAH PELANGGAN BARU -->
<div id="modalTambahPelanggan" class="fixed inset-0 bg-black/50 backdrop-blur-xs z-50 hidden flex items-center justify-center p-4">
    <div class="bg-white rounded-2xl max-w-lg w-full p-6 space-y-4 shadow-xl">
        <div class="flex items-center justify-between pb-3 border-b border-surface-container">
            <div class="flex items-center gap-2">
                <span class="material-symbols-outlined text-forest-700 text-[22px]">person_add</span>
                <h3 class="text-base font-bold text-ink-900">Tambah Akun Pelanggan Baru</h3>
            </div>
            <button onclick="closeModalTambahPelanggan()" class="text-ink-600 hover:text-ink-900 p-1">
                <span class="material-symbols-outlined text-[20px]">close</span>
            </button>
        </div>

        <form onsubmit="event.preventDefault(); simpanPelanggan();" class="space-y-4 text-xs">
            <div>
                <label class="block font-bold text-ink-900 uppercase tracking-wider mb-1">Nama Lengkap Member <span class="text-red-600">*</span></label>
                <input type="text" id="addNama" placeholder="Cth: Ahmad Fauzi" class="w-full bg-surface-container-low p-2.5 rounded-lg border border-surface-container text-ink-900 focus:outline-none focus:ring-2 focus:ring-forest-700" required>
            </div>

            <div class="grid grid-cols-2 gap-3">
                <div>
                    <label class="block font-bold text-ink-900 uppercase tracking-wider mb-1">Username Akun <span class="text-red-600">*</span></label>
                    <input type="text" id="addUsername" placeholder="ahmad_fauzi" class="w-full bg-surface-container-low p-2.5 rounded-lg border border-surface-container text-ink-900 focus:outline-none focus:ring-2 focus:ring-forest-700" required>
                </div>
                <div>
                    <label class="block font-bold text-ink-900 uppercase tracking-wider mb-1">Password Awal <span class="text-red-600">*</span></label>
                    <input type="password" value="password123" class="w-full bg-surface-container-low p-2.5 rounded-lg border border-surface-container text-ink-900 focus:outline-none focus:ring-2 focus:ring-forest-700" required>
                </div>
            </div>

            <div class="grid grid-cols-2 gap-3">
                <div>
                    <label class="block font-bold text-ink-900 uppercase tracking-wider mb-1">No. WhatsApp / HP <span class="text-red-600">*</span></label>
                    <input type="tel" id="addHp" placeholder="08xxxxxxxxxx" class="w-full bg-surface-container-low p-2.5 rounded-lg border border-surface-container text-ink-900 font-mono focus:outline-none focus:ring-2 focus:ring-forest-700" required>
                </div>
                <div>
                    <label class="block font-bold text-ink-900 uppercase tracking-wider mb-1">Email <span class="text-red-600">*</span></label>
                    <input type="email" id="addEmail" placeholder="ahmad@gmail.com" class="w-full bg-surface-container-low p-2.5 rounded-lg border border-surface-container text-ink-900 focus:outline-none focus:ring-2 focus:ring-forest-700" required>
                </div>
            </div>

            <div>
                <label class="block font-bold text-ink-900 uppercase tracking-wider mb-1">Alamat Domisili Lengkap</label>
                <textarea rows="2" placeholder="Cth: Jl. Teuku Umar No. 88, Kedaton, Bandar Lampung..." class="w-full bg-surface-container-low p-2.5 rounded-lg border border-surface-container text-ink-900 focus:outline-none focus:ring-2 focus:ring-forest-700"></textarea>
            </div>

            <div class="pt-2 border-t border-surface-container flex gap-2">
                <button type="submit" class="w-full bg-forest-700 hover:bg-forest-900 text-white font-bold text-xs py-2.5 rounded-lg transition-colors">
                    Simpan Member Baru
                </button>
                <button type="button" onclick="closeModalTambahPelanggan()" class="w-full bg-surface-container hover:bg-surface-container-high text-ink-900 font-medium text-xs py-2.5 rounded-lg transition-colors">
                    Batal
                </button>
            </div>
        </form>
    </div>
</div>

<!-- MODAL DETAIL MEMBER -->
<div id="modalDetailMember" class="fixed inset-0 bg-black/50 backdrop-blur-xs z-50 hidden flex items-center justify-center p-4">
    <div class="bg-white rounded-2xl max-w-md w-full p-6 space-y-4 shadow-xl">
        <div class="flex items-center justify-between pb-3 border-b border-surface-container">
            <div class="flex items-center gap-2">
                <span class="material-symbols-outlined text-forest-700 text-[22px]">badge</span>
                <h3 class="text-base font-bold text-ink-900">Detail Pelanggan Terdaftar</h3>
            </div>
            <button onclick="closeModalDetailMember()" class="text-ink-600 hover:text-ink-900 p-1">
                <span class="material-symbols-outlined text-[20px]">close</span>
            </button>
        </div>

        <div class="space-y-3 text-xs">
            <div class="p-3 bg-surface-container-low rounded-xl space-y-1">
                <span class="text-[10px] text-ink-600 block">ID Member</span>
                <strong id="detId" class="text-sm font-mono text-forest-700 font-bold">MBR-0081</strong>
                <h4 id="detNama" class="text-base font-bold text-ink-900">Bambang Hermanto</h4>
            </div>

            <div class="grid grid-cols-2 gap-2">
                <div class="p-2.5 bg-surface-container-low rounded-lg">
                    <span class="text-[10px] text-ink-600 block">Nomor Telepon</span>
                    <strong id="detHp" class="font-mono text-ink-900">081234567890</strong>
                </div>
                <div class="p-2.5 bg-surface-container-low rounded-lg">
                    <span class="text-[10px] text-ink-600 block">Email</span>
                    <strong id="detEmail" class="text-ink-900 truncate block">bambang@gmail.com</strong>
                </div>
            </div>

            <div class="p-3 bg-surface-container-low rounded-xl flex justify-between items-center">
                <div>
                    <span class="text-[10px] text-ink-600 block">Total Transaksi Booking</span>
                    <strong id="detBooking" class="text-sm font-bold text-ink-900">12 Tiket</strong>
                </div>
                <span class="bg-green-50 text-green-700 font-bold px-2 py-0.5 rounded text-[11px]" id="detStatus">
                    Aktif
                </span>
            </div>
        </div>

        <div class="pt-2">
            <button onclick="closeModalDetailMember()" class="w-full bg-forest-700 text-white font-semibold text-xs py-2 rounded-lg">
                Tutup
            </button>
        </div>
    </div>
</div>

<script>
    function filterPelanggan() {
        const query = document.getElementById('searchPelanggan').value.toLowerCase();
        const status = document.getElementById('statusFilter').value;
        const rows = document.querySelectorAll('.pelanggan-row');

        rows.forEach(row => {
            const text = row.textContent.toLowerCase();
            const matchQuery = text.includes(query);
            const matchStatus = !status || row.dataset.status === status;

            row.style.display = (matchQuery && matchStatus) ? '' : 'none';
        });
    }

    function openModalTambahPelanggan() {
        document.getElementById('modalTambahPelanggan').classList.remove('hidden');
    }

    function closeModalTambahPelanggan() {
        document.getElementById('modalTambahPelanggan').classList.add('hidden');
    }

    function simpanPelanggan() {
        const nama = document.getElementById('addNama').value;
        alert('Member baru "' + nama + '" berhasil didaftarkan ke sistem Trans Lampung Express.');
        closeModalTambahPelanggan();
    }

    function lihatDetailMember(id, nama, hp, email, booking, status) {
        document.getElementById('detId').textContent = id;
        document.getElementById('detNama').textContent = nama;
        document.getElementById('detHp').textContent = hp;
        document.getElementById('detEmail').textContent = email;
        document.getElementById('detBooking').textContent = booking;
        document.getElementById('detStatus').textContent = status;
        document.getElementById('modalDetailMember').classList.remove('hidden');
    }

    function closeModalDetailMember() {
        document.getElementById('modalDetailMember').classList.add('hidden');
    }

    function editMember(id, nama, hp, email) {
        alert('Membuka mode edit untuk member ' + id + ' (' + nama + ').');
    }
</script>
@endsection
