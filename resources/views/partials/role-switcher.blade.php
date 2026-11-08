<div class="fixed bottom-6 right-6 z-[999] print:hidden font-body-md" id="roleSwitcherContainer">
    <div id="roleSwitcherModal" class="hidden mb-3 w-[360px] sm:w-[420px] bg-paper-0/95 backdrop-blur-xl border border-forest-900/10 rounded-2xl shadow-2xl p-5 space-y-4 animate-in fade-in slide-in-from-bottom-5 duration-200">
        <div class="flex items-center justify-between pb-3 border-b border-surface-container">
            <div class="flex items-center gap-2.5">
                <div class="w-8 h-8 rounded-lg bg-forest-900 text-cream-50 flex items-center justify-center">
                    <span class="material-symbols-outlined text-[18px]">hub</span>
                </div>
                <div>
                    <h4 class="font-title-sm text-title-sm text-forest-900 leading-tight">Navigasi Use Case Tiket Go</h4>
                    <span class="font-label-sm text-label-sm text-ink-600">Pilih peran aktor &amp; alur fitur UI</span>
                </div>
            </div>
            <button onclick="toggleRoleSwitcher()" class="w-8 h-8 rounded-lg hover:bg-surface-container text-ink-600 flex items-center justify-center transition-colors">
                <span class="material-symbols-outlined text-[18px]">close</span>
            </button>
        </div>

        <div class="space-y-3.5 max-h-[70vh] overflow-y-auto pr-1">
            <!-- 1. PELANGGAN (MEMBER) -->
            <div class="bg-surface-container-low/70 rounded-xl p-3 space-y-2 border border-surface-container">
                <div class="flex items-center justify-between">
                    <span class="font-label-sm text-label-sm uppercase tracking-wider font-bold text-forest-900 flex items-center gap-1.5">
                        <span class="material-symbols-outlined text-[16px] text-forest-700">person</span>
                        Aktor 1: Pelanggan (Member)
                    </span>
                    <span class="text-[10px] bg-secondary-container text-on-secondary-container font-semibold px-2 py-0.5 rounded-full">6 Halaman</span>
                </div>
                <div class="grid grid-cols-2 gap-1.5 text-body-sm">
                    <a href="{{ route('member.beranda') }}" class="px-2.5 py-1.5 rounded-lg bg-paper-0 hover:bg-forest-700 hover:text-white transition-all flex items-center gap-1.5 text-ink-900 border border-surface-container shadow-xs">
                        <span class="material-symbols-outlined text-[14px]">home</span> Beranda &amp; Rute
                    </a>
                    <a href="{{ route('member.cari-jadwal') }}" class="px-2.5 py-1.5 rounded-lg bg-paper-0 hover:bg-forest-700 hover:text-white transition-all flex items-center gap-1.5 text-ink-900 border border-surface-container shadow-xs">
                        <span class="material-symbols-outlined text-[14px]">search</span> Melihat Jadwal
                    </a>
                    <a href="{{ route('member.pilih-kursi') }}" class="px-2.5 py-1.5 rounded-lg bg-paper-0 hover:bg-forest-700 hover:text-white transition-all flex items-center gap-1.5 text-ink-900 border border-surface-container shadow-xs">
                        <span class="material-symbols-outlined text-[14px]">airline_seat_recline_normal</span> Pilih Nomor Kursi
                    </a>
                    <a href="{{ route('member.pesanan') }}" class="px-2.5 py-1.5 rounded-lg bg-paper-0 hover:bg-forest-700 hover:text-white transition-all flex items-center gap-1.5 text-ink-900 border border-surface-container shadow-xs">
                        <span class="material-symbols-outlined text-[14px]">confirmation_number</span> Memesan Tiket
                    </a>
                    <a href="{{ route('member.pembayaran') }}" class="px-2.5 py-1.5 rounded-lg bg-paper-0 hover:bg-forest-700 hover:text-white transition-all flex items-center gap-1.5 text-ink-900 border border-surface-container shadow-xs">
                        <span class="material-symbols-outlined text-[14px]">payments</span> Bayar Tiket
                    </a>
                    <a href="{{ route('member.konfirmasi-pembayaran') }}" class="px-2.5 py-1.5 rounded-lg bg-paper-0 hover:bg-forest-700 hover:text-white transition-all flex items-center gap-1.5 text-ink-900 border border-surface-container shadow-xs">
                        <span class="material-symbols-outlined text-[14px]">receipt_long</span> Konfirmasi Bayar
                    </a>
                </div>
            </div>

            <!-- 2. OPERATOR LOKET -->
            <div class="bg-surface-container-low/70 rounded-xl p-3 space-y-2 border border-surface-container">
                <div class="flex items-center justify-between">
                    <span class="font-label-sm text-label-sm uppercase tracking-wider font-bold text-forest-900 flex items-center gap-1.5">
                        <span class="material-symbols-outlined text-[16px] text-amber-500">support_agent</span>
                        Aktor 2: Operator Loket
                    </span>
                    <span class="text-[10px] bg-amber-500/20 text-tertiary-container font-semibold px-2 py-0.5 rounded-full">4 Halaman</span>
                </div>
                <div class="grid grid-cols-2 gap-1.5 text-body-sm">
                    <a href="{{ route('operator.dashboard') }}" class="px-2.5 py-1.5 rounded-lg bg-paper-0 hover:bg-forest-700 hover:text-white transition-all flex items-center gap-1.5 text-ink-900 border border-surface-container shadow-xs">
                        <span class="material-symbols-outlined text-[14px]">space_dashboard</span> Dashboard Loket
                    </a>
                    <a href="{{ route('operator.pesanan') }}" class="px-2.5 py-1.5 rounded-lg bg-paper-0 hover:bg-forest-700 hover:text-white transition-all flex items-center gap-1.5 text-ink-900 border border-surface-container shadow-xs">
                        <span class="material-symbols-outlined text-[14px]">checklist</span> Kelola Status Pesanan
                    </a>
                    <a href="{{ route('operator.konfirmasi-pembayaran') }}" class="px-2.5 py-1.5 rounded-lg bg-paper-0 hover:bg-forest-700 hover:text-white transition-all flex items-center gap-1.5 text-ink-900 border border-surface-container shadow-xs">
                        <span class="material-symbols-outlined text-[14px]">verified_user</span> Periksa Bayar (3)
                    </a>
                    <a href="{{ route('operator.layani-pemesanan') }}" class="px-2.5 py-1.5 rounded-lg bg-paper-0 hover:bg-forest-700 hover:text-white transition-all flex items-center gap-1.5 text-ink-900 border border-surface-container shadow-xs">
                        <span class="material-symbols-outlined text-[14px]">point_of_sale</span> Layani Pesanan Loket
                    </a>
                </div>
            </div>

            <!-- 3. ADMIN -->
            <div class="bg-surface-container-low/70 rounded-xl p-3 space-y-2 border border-surface-container">
                <div class="flex items-center justify-between">
                    <span class="font-label-sm text-label-sm uppercase tracking-wider font-bold text-forest-900 flex items-center gap-1.5">
                        <span class="material-symbols-outlined text-[16px] text-red-600">admin_panel_settings</span>
                        Aktor 3: Super Admin
                    </span>
                    <span class="text-[10px] bg-red-600/15 text-red-600 font-semibold px-2 py-0.5 rounded-full">6 Halaman</span>
                </div>
                <div class="grid grid-cols-2 gap-1.5 text-body-sm">
                    <a href="{{ route('admin.dashboard') }}" class="px-2.5 py-1.5 rounded-lg bg-paper-0 hover:bg-forest-700 hover:text-white transition-all flex items-center gap-1.5 text-ink-900 border border-surface-container shadow-xs">
                        <span class="material-symbols-outlined text-[14px]">dashboard</span> Dashboard Admin
                    </a>
                    <a href="{{ route('admin.pelanggan') }}" class="px-2.5 py-1.5 rounded-lg bg-paper-0 hover:bg-forest-700 hover:text-white transition-all flex items-center gap-1.5 text-ink-900 border border-surface-container shadow-xs">
                        <span class="material-symbols-outlined text-[14px]">group</span> Kelola Pelanggan
                    </a>
                    <a href="{{ route('admin.jadwal') }}" class="px-2.5 py-1.5 rounded-lg bg-paper-0 hover:bg-forest-700 hover:text-white transition-all flex items-center gap-1.5 text-ink-900 border border-surface-container shadow-xs">
                        <span class="material-symbols-outlined text-[14px]">schedule</span> Kelola Jadwal
                    </a>
                    <a href="{{ route('admin.kota') }}" class="px-2.5 py-1.5 rounded-lg bg-paper-0 hover:bg-forest-700 hover:text-white transition-all flex items-center gap-1.5 text-ink-900 border border-surface-container shadow-xs">
                        <span class="material-symbols-outlined text-[14px]">alt_route</span> Kota Asal &amp; Tujuan
                    </a>
                    <a href="{{ route('admin.kendaraan') }}" class="px-2.5 py-1.5 rounded-lg bg-paper-0 hover:bg-forest-700 hover:text-white transition-all flex items-center gap-1.5 text-ink-900 border border-surface-container shadow-xs">
                        <span class="material-symbols-outlined text-[14px]">directions_bus</span> Kelola Kendaraan
                    </a>
                    <a href="{{ route('admin.keluhan') }}" class="px-2.5 py-1.5 rounded-lg bg-paper-0 hover:bg-forest-700 hover:text-white transition-all flex items-center gap-1.5 text-ink-900 border border-surface-container shadow-xs">
                        <span class="material-symbols-outlined text-[14px]">report_problem</span> Kelola Keluhan (2)
                    </a>
                </div>
            </div>

            <!-- AUTH LINKS -->
            <div class="pt-2 border-t border-surface-container flex items-center justify-between text-body-sm text-ink-600">
                <span class="font-label-sm text-label-sm font-semibold">Otentikasi:</span>
                <div class="flex items-center gap-2">
                    <a href="{{ route('login') }}" class="text-forest-700 hover:text-forest-900 font-semibold underline underline-offset-2">Masuk Akun</a>
                    <span>•</span>
                    <a href="{{ route('register') }}" class="text-forest-700 hover:text-forest-900 font-semibold underline underline-offset-2">Daftar Member</a>
                </div>
            </div>
        </div>
    </div>
    <button onclick="toggleRoleSwitcher()" class="ml-auto bg-forest-900 hover:bg-forest-700 text-cream-50 px-4 py-2.5 rounded-full shadow-xl flex items-center gap-2.5 border-2 border-amber-500/40 transition-all hover:scale-105 active:scale-95 group cursor-pointer">
        <span class="w-2.5 h-2.5 rounded-full bg-amber-500 animate-pulse"></span>
        <span class="material-symbols-outlined text-[20px] text-amber-500">switch_account</span>
        <span class="font-label-sm text-label-sm font-bold tracking-wide">PILIH ROLE USE CASE</span>
        <span class="material-symbols-outlined text-[16px] text-secondary-fixed-dim transition-transform group-hover:translate-y-[-2px]">expand_less</span>
    </button>
</div>

<script>
    function toggleRoleSwitcher() {
        const modal = document.getElementById('roleSwitcherModal');
        if (modal) {
            modal.classList.toggle('hidden');
        }
    }
</script>

