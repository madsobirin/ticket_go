<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pusat Pengaduan Keluhan - Trans Lampung Express</title>

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
<header class="fixed top-0 left-0 right-0 w-full z-50 bg-cream-50/90 backdrop-blur-xl shadow-[0_1px_8px_rgba(23,59,53,0.05)]">
    <div class="h-16 max-w-7xl mx-auto px-6 lg:px-12 flex items-center justify-between">

        <!-- LOGO -->
        <a class="flex items-center gap-3 group"
           href="{{ route('member.beranda') }}">

            <div class="w-9 h-9 rounded-lg bg-forest-900 flex items-center justify-center text-paper-0 transition-transform group-hover:scale-105">
                <span class="material-symbols-outlined text-[20px]">
                    directions_bus
                </span>
            </div>

            <div class="flex flex-col">
                <span class="font-headline-sm text-lg font-semibold text-forest-900 tracking-tight leading-none">
                    Trans Lampung
                </span>

                <span class="text-[11px] tracking-wider uppercase text-forest-700 font-semibold">
                    Express Travel
                </span>
            </div>
        </a>

        <!-- NAVIGATION LINKS -->
        <nav class="hidden md:flex items-center gap-6">

            <a href="{{ route('member.beranda') }}"
               class="font-medium text-sm text-ink-600 hover:text-forest-900 transition-colors">
                Beranda
            </a>

            <a href="{{ route('member.cari-jadwal') }}"
               class="font-medium text-sm text-ink-600 hover:text-forest-900 transition-colors">
                Cari Jadwal
            </a>

            <a href="{{ route('member.keluhan') }}"
               aria-current="page"
               class="font-semibold text-sm bg-primary-container text-white rounded-lg px-3 py-1.5 transition-colors">
                Keluhan
            </a>

        </nav>

        <!-- PROFIL MEMBER -->
        <div class="flex items-center gap-4">

            <div class="hidden sm:flex flex-col text-right">
                <span class="font-body-sm text-body-sm text-ink-600">
                    Halo,
                </span>

                <a href="{{ route('member.profil') }}"
                   class="font-title-sm text-title-sm text-forest-900 leading-none hover:text-forest-700 transition-colors">
                    {{ session('auth_user.name', 'Bambang Hermanto') }}
                </a>
            </div>

            <a href="{{ route('member.profil') }}"
               class="flex items-center gap-2 group"
               title="Halaman Profil">

                <div class="w-8 h-8 rounded-full bg-primary flex items-center justify-center ring-2 ring-forest-700/20 group-hover:ring-forest-700 transition-all">
                    <span class="material-symbols-outlined text-white text-[18px]">
                        person
                    </span>
                </div>

            </a>

        </div>

    </div>
</header>


    <!-- MAIN CONTENT -->
    <main class="w-full pt-24 pb-16 bg-cream-50 min-h-screen">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-12 space-y-8">

            <!-- PAGE TITLE -->
            <div class="flex flex-col md:flex-row md:items-center justify-between gap-4">
                <div>
                    <h1 class="font-headline-lg text-2xl sm:text-3xl font-semibold text-forest-900 tracking-tight">Pusat Bantuan &amp; Pengaduan Keluhan</h1>
                    <p class="text-sm text-ink-600 mt-1">Sampaikan masukan, kendala fasilitas perjalanan, atau keluhan layanan operasional Anda langsung ke tim manajemen pusat.</p>
                </div>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 items-start">

                <!-- FORM KELUHAN (KOLOM KIRI 7 SPAN) -->
                <div class="lg:col-span-7 bg-paper-0 rounded-2xl p-6 sm:p-8 shadow-sm border border-surface-container space-y-6">
                    <div class="flex items-center gap-3 pb-4 border-b border-surface-container">
                        <div class="w-10 h-10 rounded-xl bg-forest-700 text-white flex items-center justify-center">
                            <span class="material-symbols-outlined text-[22px]">edit_note</span>
                        </div>
                        <div>
                            <h2 class="font-title-md text-base font-bold text-forest-900">Formulir Pengaduan Perjalanan</h2>
                            <p class="text-xs text-ink-600">Laporan Anda akan langsung ditinjau oleh Super Admin Trans Lampung Express.</p>
                        </div>
                    </div>

                    <form onsubmit="handleKirimKeluhan(event)" class="space-y-4 text-xs">
                        <div>
                            <label class="block font-bold text-forest-900 uppercase tracking-wider mb-1">Tiket / Pesanan Terkait <span class="text-red-600">*</span></label>
                            <select class="w-full bg-surface-container-low focus:bg-paper-0 p-3 rounded-xl border border-surface-container text-forest-900 font-semibold" required>
                                <option value="PSN-202410-098">#PSN-202410-098 • Bandar Lampung → Krui (10 Nov 2026)</option>
                                <option value="PSN-202410-055">#PSN-202410-055 • Bandar Lampung → Metro (02 Nov 2026)</option>
                                <option value="LAINNYA">Lainnya / Pertanyaan Umum Tanpa Tiket</option>
                            </select>
                        </div>

                        <div>
                            <label class="block font-bold text-forest-900 uppercase tracking-wider mb-1">Kategori Masalah <span class="text-red-600">*</span></label>
                            <select class="w-full bg-surface-container-low focus:bg-paper-0 p-3 rounded-xl border border-surface-container text-forest-900 font-semibold" required>
                                <option value="Armada">Fasilitas Kendaraan (AC, Kursi, Kebersihan)</option>
                                <option value="Supir">Pelayanan Supir / Dispatcher Loket</option>
                                <option value="Jadwal">Keterlambatan Jam Keberangkatan</option>
                                <option value="Pembayaran">Kendala Pembayaran / Verifikasi Tiket</option>
                                <option value="Bagasi">Barang Bawaan / Bagasi Tertukar</option>
                            </select>
                        </div>

                        <div>
                            <label class="block font-bold text-forest-900 uppercase tracking-wider mb-1">Judul Ringkas Keluhan <span class="text-red-600">*</span></label>
                            <input type="text" placeholder="Cth: AC armada kurang dingin atau supir terlambat jemput..." class="w-full bg-surface-container-low focus:bg-paper-0 p-3 rounded-xl border border-surface-container text-forest-900 font-medium" required>
                        </div>

                        <div>
                            <label class="block font-bold text-forest-900 uppercase tracking-wider mb-1">Rincian Lengkap Keluhan <span class="text-red-600">*</span></label>
                            <textarea rows="4" placeholder="Ceritakan secara detail kronologi kejadian, titik lokasi, atau kendala yang Anda alami..." class="w-full bg-surface-container-low focus:bg-paper-0 p-3 rounded-xl border border-surface-container text-forest-900 font-medium leading-relaxed" required></textarea>
                        </div>

                        <div class="pt-2">
                            <button type="submit" id="btnSubmitKeluhan" class="w-full bg-forest-700 hover:bg-forest-900 text-white font-bold text-sm py-3.5 px-6 rounded-xl flex items-center justify-center gap-2 shadow-sm transition-all cursor-pointer">
                                <span class="material-symbols-outlined text-[18px]">send</span>
                                Kirimkan Laporan Keluhan
                            </button>
                        </div>
                    </form>
                </div>

                <!-- RIWAYAT KELUHAN & TANGGAPAN ADMIN (KOLOM KANAN 5 SPAN) -->
                <div class="lg:col-span-5 bg-paper-0 rounded-2xl p-6 shadow-sm border border-surface-container space-y-5">
                    <div class="flex items-center justify-between pb-3 border-b border-surface-container">
                        <div>
                            <h3 class="font-title-sm text-base font-bold text-forest-900">Riwayat Tanggapan Admin</h3>
                            <span class="text-xs text-ink-600">Status tindak lanjut aduan Anda</span>
                        </div>
                        <span class="text-xs bg-sage-100 text-forest-900 font-semibold px-2 py-0.5 rounded">2 Riwayat</span>
                    </div>

                    <div class="space-y-4 text-xs">
                        <!-- ADUAN 1: SELESAI -->
                        <div class="p-4 rounded-xl bg-surface-container-low border border-green-700/20 space-y-2.5">
                            <div class="flex items-center justify-between">
                                <span class="font-mono text-forest-700 font-bold">#KLH-202410-04</span>
                                <span class="bg-green-700/15 text-green-700 font-bold px-2 py-0.5 rounded text-[10px] flex items-center gap-1">
                                    <span class="material-symbols-outlined text-[12px]">check</span> Solusi Diberikan
                                </span>
                            </div>
                            <div>
                                <strong class="text-forest-900 block text-xs">Bagasi keripik pisang sempat tertukar</strong>
                                <span class="text-[11px] text-ink-600">Trip Metro • 02 Nov 2026</span>
                            </div>
                            <div class="bg-paper-0 p-3 rounded-xl border border-surface-container space-y-1">
                                <div class="flex items-center gap-1.5 text-forest-700 font-bold text-[11px]">
                                    <span class="material-symbols-outlined text-[14px]">reply</span>
                                    Tanggapan Manajemen Admin:
                                </div>
                                <p class="text-ink-600 text-[11px] leading-relaxed">
                                    "Terima kasih atas laporan Anda. Supir Bpk. Gunawan telah membantu mengantarkan paket yang tertukar dan kami telah memperketat penomoran label bagasi."
                                </p>
                            </div>
                        </div>

                        <!-- ADUAN 2: BARU TERKIRIM -->
                        <div class="p-4 rounded-xl bg-surface-container-low border border-surface-container space-y-2.5">
                            <div class="flex items-center justify-between">
                                <span class="font-mono text-forest-700 font-bold">#KLH-202410-01</span>
                                <span class="bg-amber-500/15 text-tertiary-container font-bold px-2 py-0.5 rounded text-[10px]">
                                    Sedang Ditinjau Admin
                                </span>
                            </div>
                            <div>
                                <strong class="text-forest-900 block text-xs">AC armada kurang dingin di tanjakan Sedayu</strong>
                                <span class="text-[11px] text-ink-600">Trip Krui • 08 Nov 2026</span>
                            </div>
                            <p class="text-ink-600 text-[11px]">
                                Laporan Anda telah diterima dan diteruskan ke tim pengawas armada untuk pengecekan filter freon AC.
                            </p>
                        </div>
                    </div>

                    <!-- KONTAK DARURAT OPERASIONAL -->
                    <div class="bg-surface-container-low p-4 rounded-xl border border-surface-container space-y-1 text-xs">
                        <span class="font-bold text-forest-900 block">Butuh Bantuan Mendesak?</span>
                        <p class="text-ink-600 text-[11px]">Untuk kendala saat perjalanan sedang berlangsung, segera hubungi Call Center Pool:</p>
                        <span class="font-mono font-bold text-forest-700 block pt-1">(0721) 703456 / WhatsApp 0811-7200-889</span>
                    </div>
                </div>

            </div>

        </div>
    </main>

    <!-- MODAL SUKSES KELUHAN -->
    <div id="modalSuksesKeluhan" class="fixed inset-0 bg-ink-900/60 backdrop-blur-sm z-50 hidden flex items-center justify-center p-4">
        <div class="bg-paper-0 rounded-3xl max-w-md w-full p-6 sm:p-8 space-y-5 shadow-2xl animate-in fade-in zoom-in duration-150 text-center">
            <div class="w-16 h-16 rounded-full bg-secondary-container text-forest-700 flex items-center justify-center mx-auto">
                <span class="material-symbols-outlined text-[36px]">mark_email_read</span>
            </div>

            <div class="space-y-2">
                <h3 class="font-headline-md text-2xl font-semibold text-forest-900">Laporan Berhasil Terkirim!</h3>
                <p class="text-xs text-ink-600 leading-relaxed">
                    Pengaduan Anda telah kami terima dengan nomor tiket <strong class="font-mono text-forest-900">#KLH-202410-09</strong>. Manajemen operasional akan meninjau dan merespon dalam kurun waktu 1x24 jam.
                </p>
            </div>

            <div class="pt-2">
                <button onclick="document.getElementById('modalSuksesKeluhan').classList.add('hidden')" class="w-full bg-forest-700 hover:bg-forest-900 text-white font-semibold text-xs py-3 rounded-xl transition-colors">
                    Selesai &amp; Tutup
                </button>
            </div>
        </div>
    </div>

    <!-- ROLE SWITCHER INCLUDED -->
    @include('partials.role-switcher')

    <script>
        function handleKirimKeluhan(event) {
            event.preventDefault();
            const btn = document.getElementById('btnSubmitKeluhan');
            btn.disabled = true;
            btn.innerHTML = `
                <span class="w-4 h-4 rounded-full border-2 border-white border-t-transparent animate-spin inline-block"></span>
                <span>Mengirimkan Laporan...</span>
            `;

            setTimeout(() => {
                btn.disabled = false;
                btn.innerHTML = `
                    <span class="material-symbols-outlined text-[18px]">send</span>
                    <span>Kirimkan Laporan Keluhan</span>
                `;
                document.getElementById('modalSuksesKeluhan').classList.remove('hidden');
            }, 700);
        }
    </script>

</body>
</html>

