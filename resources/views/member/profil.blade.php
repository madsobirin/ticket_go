
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profil Saya - Trans Lampung Express</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=DM+Sans:ital,opsz,wght@0,9..40,100..1000;1,9..40,100..1000&family=Source+Serif+4:ital,opsz,wght@0,8..60,200..900;1,9..60,200..900&display=swap" rel="stylesheet">
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

            <a class="flex items-center gap-3 group" href="{{ route('member.beranda') }}">
                <div class="w-9 h-9 rounded-lg bg-forest-900 flex items-center justify-center text-paper-0 transition-transform group-hover:scale-105">
                    <span class="material-symbols-outlined text-[20px]">directions_bus</span>
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

            <!-- NAV LINKS MEMBER -->
            <nav class="hidden md:flex items-center gap-6">
                <a href="{{ route('member.beranda') }}"
                   class="font-label-lg text-label-lg text-ink-600 hover:text-forest-900 transition-colors">
                    Beranda
                </a>

                <a href="{{ route('member.cari-jadwal') }}"
                   class="font-label-lg text-label-lg text-ink-600 hover:text-forest-900 transition-colors">
                    Cari Jadwal
                </a>

                <a href="{{ route('member.keluhan') }}"
                   class="font-label-lg text-label-lg text-ink-600 hover:text-forest-900 transition-colors">
                    Keluhan
                </a>
            </nav>

            <!-- PROFIL SECTION DI HEADER -->
            <div class="flex items-center gap-4">
                <div class="hidden sm:flex flex-col text-right">
                    <span class="font-body-sm text-body-sm text-ink-600">Halo,</span>
                    <a href="{{ route('member.profil') }}"
                       class="font-title-sm text-title-sm text-forest-900 leading-none hover:text-forest-700 transition-colors">
                        Bambang Hermanto
                    </a>
                </div>

                <a class="flex items-center gap-2 group"
                   href="{{ route('member.profil') }}"
                   title="Halaman Profil">
                    <div class="w-8 h-8 rounded-full bg-forest-700 flex items-center justify-center ring-2 ring-forest-700 transition-all">
                        <span class="material-symbols-outlined text-on-primary text-[18px]">person</span>
                    </div>
                </a>
            </div>
        </div>
    </header>

    <!-- MAIN CONTENT -->
    <main class="w-full pt-24 pb-16 bg-cream-50 min-h-screen">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-12 space-y-8">

            <!-- BREADCRUMB -->
            <div class="flex items-center gap-2 text-xs text-ink-600">
                <a href="{{ route('member.beranda') }}" class="hover:text-forest-900 flex items-center gap-1">
                    <span class="material-symbols-outlined text-[16px]">home</span>
                    Beranda
                </a>
                <span>/</span>
                <span class="font-semibold text-forest-900">Profil Pelanggan</span>
            </div>

            <!-- PROFIL HERO CARD -->
            <div class="bg-paper-0 rounded-2xl p-6 sm:p-8 shadow-sm border border-surface-container flex flex-col md:flex-row md:items-center justify-between gap-6">

                <div class="flex flex-col sm:flex-row items-start sm:items-center gap-5">

                    <!-- FOTO PROFIL -->
                    <div class="relative">
                        <div class="w-20 h-20 rounded-2xl bg-forest-700 overflow-hidden flex items-center justify-center shadow-md">

                            <img
                                id="previewFotoProfil"
                                alt="Foto Profil"
                                class="hidden w-full h-full object-cover"
                            >

                            <span
                                id="inisialProfil"
                                class="text-white font-headline-lg text-2xl font-bold"
                            >
                                BH
                            </span>
                        </div>

                        <!-- INPUT FILE -->
                        <input
                            type="file"
                            id="inputFotoProfil"
                            accept="image/*"
                            class="hidden"
                            onchange="previewFoto(event)"
                        >

                        <!-- TOMBOL PILIH FOTO -->
                        <button
                            type="button"
                            onclick="document.getElementById('inputFotoProfil').click()"
                            class="absolute -bottom-1 -right-1 w-7 h-7 rounded-full bg-forest-900 text-white flex items-center justify-center hover:bg-forest-700 transition-colors shadow-sm"
                            title="Ubah Foto"
                        >
                            <span class="material-symbols-outlined text-[14px]">photo_camera</span>
                        </button>
                    </div>

                    <div class="space-y-1">
                        <div class="flex flex-wrap items-center gap-2.5">
                            <h1 id="namaProfilTampil"
                            class="font-headline-lg text-2xl font-bold text-forest-900">
                            Bambang Hermanto </h1>

                            <span class="bg-green-700/15 text-green-700 text-xs font-bold px-2.5 py-0.5 rounded-full inline-flex items-center gap-1">
                                <span class="material-symbols-outlined text-[13px]">verified</span>
                                Member Aktif
                            </span>
                        </div>

                        <p class="text-xs text-ink-600 font-mono">
                            @bambang_h • ID Member: <strong class="text-forest-700">#MBR-0081</strong>
                        </p>

                        <p class="text-xs text-ink-600">
                            Bergabung sejak 12 Oktober 2024 • Penumpang Resmi Lampung
                        </p>
                    </div>
                </div>

                <div class="flex items-center gap-3">
                    <a href="{{ route('login') }}"
                       class="px-4 py-2.5 rounded-xl border border-red-600/30 text-red-600 hover:bg-red-600 hover:text-white font-semibold text-xs transition-colors flex items-center gap-1.5">
                        <span class="material-symbols-outlined text-[16px]">logout</span>
                        Keluar Akun
                    </a>
                </div>
            </div>

            <!-- STATISTIK PERJALANAN MEMBER -->
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4 text-xs">

                <div class="bg-paper-0 p-5 rounded-2xl border border-surface-container shadow-xs space-y-1">
                    <span class="text-ink-600 uppercase tracking-wider text-[11px] font-semibold">Total Perjalanan</span>
                    <span class="text-2xl font-bold font-mono text-forest-900 block">12 Trip</span>
                    <span class="text-[11px] text-green-700 font-medium">100% Selesai Tepat Waktu</span>
                </div>

                <div class="bg-paper-0 p-5 rounded-2xl border border-surface-container shadow-xs space-y-1">
                    <span class="text-ink-600 uppercase tracking-wider text-[11px] font-semibold">Total Belanja Tiket</span>
                    <span class="text-2xl font-bold font-mono text-forest-900 block">Rp 1.440.000</span>
                    <span class="text-[11px] text-ink-600 font-medium">Bebas Biaya Admin</span>
                </div>

                <div class="bg-paper-0 p-5 rounded-2xl border border-surface-container shadow-xs space-y-1">
                    <span class="text-ink-600 uppercase tracking-wider text-[11px] font-semibold">Rute Favorit</span>
                    <span class="text-base font-bold text-forest-900 block">B. Lampung ⇄ Krui</span>
                    <span class="text-[11px] text-forest-700 font-medium">8 Kali Perjalanan</span>
                </div>

                <div class="bg-paper-0 p-5 rounded-2xl border border-surface-container shadow-xs space-y-1">
                    <span class="text-ink-600 uppercase tracking-wider text-[11px] font-semibold">Tiket Aktif Saat Ini</span>
                    <span class="text-2xl font-bold font-mono text-amber-500 block">1 Tiket</span>
                    <a href="{{ route('member.pembayaran') }}" class="text-[11px] text-forest-700 hover:underline font-bold block">Lihat Tiket &rarr;</a>
                </div>
            </div>

            <!-- GRID DUA KOLOM -->
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 items-start">

                <!-- DATA PRIBADI -->
                <div class="lg:col-span-8 bg-paper-0 rounded-2xl p-6 sm:p-8 shadow-sm border border-surface-container space-y-6">

                    <div class="flex items-center gap-3 pb-4 border-b border-surface-container">
                        <div class="w-10 h-10 rounded-xl bg-forest-700 text-white flex items-center justify-center">
                            <span class="material-symbols-outlined text-[22px]">badge</span>
                        </div>

                        <div>
                            <h2 class="font-title-md text-base font-bold text-forest-900">
                                Informasi Pribadi &amp; Kontak
                            </h2>
                            <p class="text-xs text-ink-600">
                                Pastikan nomor telepon WhatsApp dan alamat jemput aktif untuk kemudahan dispatcher loket.
                            </p>
                        </div>
                    </div>

                    <form onsubmit="handleSimpanProfil(event)" class="space-y-4 text-xs">

                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                            <div>
                                <label class="block font-bold text-forest-900 uppercase tracking-wider mb-1">
                                    Nama Lengkap (Sesuai KTP) <span class="text-red-600">*</span>
                                </label>
                                <input id="profNama" type="text" value="Bambang Hermanto"
                                       class="w-full bg-surface-container-low focus:bg-paper-0 p-3 rounded-xl border border-surface-container text-forest-900 font-semibold" required>
                            </div>

                            <div>
                                <label class="block font-bold text-forest-900 uppercase tracking-wider mb-1">
                                    Username Akun <span class="text-red-600">*</span>
                                </label>
                                <input id="profUsername" type="text" value="bambang_h"
                                       class="w-full bg-surface-container-low focus:bg-paper-0 p-3 rounded-xl border border-surface-container text-forest-900 font-semibold" required>
                            </div>
                        </div>

                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                            <div>
                                <label class="block font-bold text-forest-900 uppercase tracking-wider mb-1">
                                    Nomor WhatsApp / HP <span class="text-red-600">*</span>
                                </label>
                                <input id="profHp" type="tel" value="081234567890"
                                       class="w-full bg-surface-container-low focus:bg-paper-0 p-3 rounded-xl border border-surface-container text-forest-900 font-mono font-semibold" required>
                            </div>

                            <div>
                                <label class="block font-bold text-forest-900 uppercase tracking-wider mb-1">
                                    Alamat Email <span class="text-red-600">*</span>
                                </label>
                                <input id="profEmail" type="email" value="bambang@gmail.com"
                                       class="w-full bg-surface-container-low focus:bg-paper-0 p-3 rounded-xl border border-surface-container text-forest-900 font-medium" required>
                            </div>
                        </div>

                        <div>
                            <label class="block font-bold text-forest-900 uppercase tracking-wider mb-1">
                                Nomor Induk Kependudukan (NIK KTP)
                            </label>
                            <input id="profNik" type="text" value="1871029102990001"
                                   class="w-full bg-surface-container-low focus:bg-paper-0 p-3 rounded-xl border border-surface-container text-forest-900 font-mono">
                            <span class="text-[11px] text-ink-600 mt-1 block">
                                Digunakan untuk asuransi perlindungan penumpang Jasa Raharja selama perjalanan.
                            </span>
                        </div>

                        <div>
                            <label class="block font-bold text-forest-900 uppercase tracking-wider mb-1">
                                Alamat Domisili / Titik Penjemputan Utama
                            </label>
                            <textarea id="profAlamat" rows="3"
                                      class="w-full bg-surface-container-low focus:bg-paper-0 p-3 rounded-xl border border-surface-container text-forest-900 leading-relaxed">Jl. Raden Intan No. 45, Enggal, Kota Bandar Lampung (Depan Plaza Pos)</textarea>
                        </div>

                        <div class="pt-2">
                            <button type="submit" id="btnSimpanProfil"
                                    class="bg-forest-700 hover:bg-forest-900 text-white font-bold text-xs py-3.5 px-6 rounded-xl flex items-center justify-center gap-2 shadow-xs transition-all cursor-pointer">
                                <span class="material-symbols-outlined text-[18px]">save</span>
                                Simpan Perubahan Data Diri
                            </button>
                        </div>
                    </form>
                </div>

                <!-- SISI KANAN -->
                <div class="lg:col-span-4 space-y-6">

                    <!-- TIKET MENDATANG -->
                    <div class="bg-paper-0 rounded-2xl p-6 shadow-sm border border-surface-container space-y-4">
                        <div class="flex items-center justify-between pb-3 border-b border-surface-container">
                            <div class="flex items-center gap-2">
                                <span class="material-symbols-outlined text-forest-700 text-[20px]">confirmation_number</span>
                                <h3 class="font-title-sm text-sm font-bold text-forest-900">Perjalanan Mendatang</h3>
                            </div>
                            <span class="text-[10px] bg-amber-500/15 text-tertiary-container font-bold px-2 py-0.5 rounded-full">Belum Bayar</span>
                        </div>

                        <div class="p-3.5 bg-surface-container-low rounded-xl space-y-2 text-xs">
                            <div class="flex justify-between items-baseline font-mono font-bold text-forest-700">
                                <span>#PSN-202410-098</span>
                                <span class="text-forest-900">Rp 120.354</span>
                            </div>

                            <div class="font-semibold text-forest-900">
                                Bandar Lampung &rarr; Krui
                            </div>

                            <div class="text-[11px] text-ink-600 flex justify-between">
                                <span>Senin, 10 Nov • 08:00</span>
                                <span class="font-bold text-forest-700">Kursi 3</span>
                            </div>

                            <div class="pt-2 border-t border-surface-container flex gap-2">
                                <a href="{{ route('member.pembayaran') }}"
                                   class="w-full bg-forest-700 hover:bg-forest-900 text-white font-bold text-xs py-2 rounded-lg text-center transition-colors">
                                    Bayar Sekarang &rarr;
                                </a>
                            </div>
                        </div>
                    </div>

                    <!-- KEAMANAN -->
                    <div class="bg-paper-0 rounded-2xl p-6 shadow-sm border border-surface-container space-y-4">
                        <div class="flex items-center gap-2 pb-3 border-b border-surface-container">
                            <span class="material-symbols-outlined text-forest-700 text-[20px]">lock_reset</span>
                            <h3 class="font-title-sm text-sm font-bold text-forest-900">Keamanan &amp; Kata Sandi</h3>
                        </div>

                        <form onsubmit="handleGantiPassword(event)" class="space-y-3 text-xs">
                            <div>
                                <label class="block font-bold text-forest-900 mb-1">Kata Sandi Saat Ini</label>
                                <input type="password" placeholder="••••••••"
                                       class="w-full bg-surface-container-low p-2.5 rounded-xl border border-surface-container text-forest-900" required>
                            </div>

                            <div>
                                <label class="block font-bold text-forest-900 mb-1">Kata Sandi Baru</label>
                                <input type="password" placeholder="Min. 6 karakter"
                                       class="w-full bg-surface-container-low p-2.5 rounded-xl border border-surface-container text-forest-900" required>
                            </div>

                            <button type="submit"
                                    class="w-full bg-surface-container hover:bg-forest-700 hover:text-white text-forest-900 font-bold text-xs py-2.5 rounded-xl transition-colors">
                                Perbarui Kata Sandi
                            </button>
                        </form>
                    </div>

                    <!-- CALL CENTER -->
                    <div class="bg-surface-container-low rounded-2xl p-5 border border-surface-container space-y-2 text-xs">
                        <span class="font-bold text-forest-900 block">Pusat Layanan Pelanggan</span>

                        <p class="text-ink-600 text-[11px] leading-relaxed">
                            Butuh perubahan jadwal mendadak atau koordinasi bagasi khusus? Hubungi tim admin loket kami:
                        </p>

                        <div class="pt-1 flex items-center gap-2 text-forest-700 font-bold">
                            <span class="material-symbols-outlined text-[16px]">call</span>
                            <span>(0721) 703456 • Pool Rajabasa</span>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </main>

    <!-- ROLE SWITCHER -->
    @include('partials.role-switcher')

    <script>
        // PREVIEW FOTO PROFIL
        let fotoProfilURL = null;

        function previewFoto(event) {
            const file = event.target.files[0];

            if (!file) return;

            // Validasi jenis file
            if (!file.type.startsWith('image/')) {
                alert('File harus berupa gambar!');
                event.target.value = '';
                return;
            }

            // Validasi ukuran maksimal 2 MB
            if (file.size > 2 * 1024 * 1024) {
                alert('Ukuran foto maksimal 2 MB!');
                event.target.value = '';
                return;
            }

            const img = document.getElementById('previewFotoProfil');
            const inisial = document.getElementById('inisialProfil');

            // Hapus URL foto sebelumnya
            if (fotoProfilURL) {
                URL.revokeObjectURL(fotoProfilURL);
            }

            fotoProfilURL = URL.createObjectURL(file);

            img.onload = function () {
                img.classList.remove('hidden');
                inisial.classList.add('hidden');
            };

            img.onerror = function () {
                alert('Foto gagal ditampilkan. Silakan pilih gambar lain.');
                event.target.value = '';
            };

            img.src = fotoProfilURL;
        }

        // SIMPAN PROFIL (SIMULASI FRONTEND)
        function handleSimpanProfil(e) {
            e.preventDefault();

            const btn = document.getElementById('btnSimpanProfil');

            btn.disabled = true;
            btn.innerHTML = `
                <span class="w-4 h-4 rounded-full border-2 border-white border-t-transparent animate-spin inline-block"></span>
                <span>Menyimpan...</span>
            `;

            setTimeout(() => {
                btn.disabled = false;

                btn.innerHTML = `
                    <span class="material-symbols-outlined text-[18px]">check_circle</span>
                    <span>Data Profil Berhasil Disimpan!</span>
                `;

                btn.classList.replace('bg-forest-700', 'bg-green-700');

                setTimeout(() => {
                    btn.classList.replace('bg-green-700', 'bg-forest-700');

                    btn.innerHTML = `
                        <span class="material-symbols-outlined text-[18px]">save</span>
                        <span>Simpan Perubahan Data Diri</span>
                    `;
                }, 2000);
            }, 600);
        }

        // GANTI PASSWORD (SIMULASI FRONTEND)
        function handleGantiPassword(e) {
            e.preventDefault();

            alert('Kata sandi akun Anda berhasil diperbarui dengan aman.');
        }
        // SINKRONISASI NAMA PROFIL
const inputNama = document.getElementById('profNama');
const namaProfil = document.getElementById('namaProfilTampil');

inputNama.addEventListener('input', function () {
    const nama = this.value.trim();
    namaProfil.textContent = nama || 'Nama Member';
});
    </script>

</body>
</html>
