<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <meta content="web_blank" name="shell-type" />
    <title>Trans Lampung Express - Pendaftaran Akun Member</title>
    <link
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200"
        rel="stylesheet" />
    <link href="https://fonts.googleapis.com" rel="preconnect" />
    <link crossorigin="" href="https://fonts.gstatic.com" rel="preconnect" />
    <link
        href="https://fonts.googleapis.com/css2?family=DM+Sans:ital,opsz,wght@0,9..40,100..1000;1,9..40,100..1000&amp;family=Source+Serif+4:ital,opsz,wght@0,8..60,200..900;1,8..60,200..900&amp;display=swap"
        rel="stylesheet" />
    <link
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&amp;display=swap"
        rel="stylesheet" />
    <style>
        @layer base {

            html,
            body {
                margin: 0;
                padding: 0;
            }

            body {
                overscroll-behavior: none;
            }

            main> :first-child {
                margin-top: 0 !important;
            }

            main> :last-child {
                margin-bottom: 0 !important;
            }
        }

        ::-webkit-scrollbar {
            display: none;
        }
    </style>
    <script src="https://cdn.tailwindcss.com"></script>
    <script id="tailwind-config">
        tailwind.config = {
            darkMode: "class",
            theme: {
                extend: {
                    colors: {
                        "error": "#ba1a1a",
                        "outline-variant": "#c0c8c4",
                        "on-primary-fixed": "#00201a",
                        "inverse-on-surface": "#eef2eb",
                        "amber-500": "#D9953D",
                        "on-tertiary-fixed-variant": "#663e00",
                        "sage-100": "#E8EFE8",
                        "on-primary-fixed-variant": "#1c4f43",
                        "tertiary-fixed-dim": "#ffb963",
                        "forest-900": "#173B35",
                        "red-600": "#B94B43",
                        "surface-container-highest": "#dfe4dd",
                        "outline": "#707975",
                        "on-primary-container": "#9ccfc0",
                        "on-surface": "#181d19",
                        "secondary": "#42655e",
                        "surface-container": "#ebefe8",
                        "surface": "#f6fbf4",
                        "background": "#f6fbf4",
                        "secondary-fixed-dim": "#a8cec6",
                        "tertiary-fixed": "#ffddb9",
                        "ink-900": "#202521",
                        "surface-variant": "#dfe4dd",
                        "on-error-container": "#93000a",
                        "primary-container": "#285a4e",
                        "on-primary": "#ffffff",
                        "on-tertiary-container": "#ffb65c",
                        "inverse-surface": "#2d322d",
                        "on-secondary-fixed-variant": "#2a4d46",
                        "forest-700": "#285A4E",
                        "surface-container-high": "#e5e9e3",
                        "cream-50": "#FAF8F2",
                        "tertiary-container": "#754700",
                        "on-tertiary": "#ffffff",
                        "on-secondary-fixed": "#00201b",
                        "on-secondary": "#ffffff",
                        "surface-container-low": "#f0f5ee",
                        "primary": "#0b4237",
                        "surface-tint": "#36675b",
                        "ink-600": "#65716A",
                        "on-error": "#ffffff",
                        "inverse-primary": "#9dd1c2",
                        "primary-fixed": "#b9eddd",
                        "paper-0": "#FFFFFF",
                        "secondary-container": "#c1e8df",
                        "on-secondary-container": "#466962",
                        "secondary-fixed": "#c4eae1",
                        "on-background": "#181d19",
                        "surface-bright": "#f6fbf4",
                        "on-surface-variant": "#404945",
                        "primary-fixed-dim": "#9dd1c2",
                        "on-tertiary-fixed": "#2b1700",
                        "line-200": "#E5E7E0",
                        "error-container": "#ffdad6",
                        "surface-dim": "#d7dbd5",
                        "surface-container-lowest": "#ffffff",
                        "tertiary": "#553300",
                        "green-700": "#347653"
                    },
                    borderRadius: {
                        "DEFAULT": "0.25rem",
                        "lg": "0.5rem",
                        "xl": "0.75rem",
                        "full": "9999px"
                    },
                    spacing: {
                        "space-md": "1rem",
                        "margin-sm": "1rem",
                        "space-sm": "0.5rem",
                        "gutter-sm": "1rem",
                        "margin": "2rem",
                        "space-lg": "1.5rem",
                        "space-xl": "2rem",
                        "gutter": "1.5rem",
                        "space-xs": "0.25rem"
                    },
                    fontFamily: {
                        "headline-md": ["\"Source Serif 4\""],
                        "title-sm": ["DM Sans"],
                        "label-sm": ["DM Sans"],
                        "body-md": ["DM Sans"],
                        "label-md": ["DM Sans"],
                        "body-sm": ["DM Sans"],
                        "headline-lg-mobile": ["\"Source Serif 4\""],
                        "body-lg": ["DM Sans"],
                        "headline-sm": ["\"Source Serif 4\""],
                        "numeric-price": ["DM Sans"],
                        "title-md": ["DM Sans"],
                        "headline-lg": ["\"Source Serif 4\""],
                        "headline-xl": ["\"Source Serif 4\""],
                        "label-lg": ["DM Sans"],
                        "headline-xl-mobile": ["\"Source Serif 4\""]
                    },
                    fontSize: {
                        "headline-md": ["24px", {
                            "lineHeight": "32px",
                            "fontWeight": "600"
                        }],
                        "title-sm": ["16px", {
                            "lineHeight": "24px",
                            "fontWeight": "600"
                        }],
                        "label-sm": ["11px", {
                            "lineHeight": "14px",
                            "fontWeight": "600"
                        }],
                        "body-md": ["14px", {
                            "lineHeight": "20px",
                            "fontWeight": "400"
                        }],
                        "label-md": ["12px", {
                            "lineHeight": "16px",
                            "fontWeight": "500"
                        }],
                        "body-sm": ["12px", {
                            "lineHeight": "18px",
                            "fontWeight": "400"
                        }],
                        "headline-lg-mobile": ["24px", {
                            "lineHeight": "32px",
                            "fontWeight": "600"
                        }],
                        "body-lg": ["16px", {
                            "lineHeight": "24px",
                            "fontWeight": "400"
                        }],
                        "headline-sm": ["20px", {
                            "lineHeight": "28px",
                            "fontWeight": "600"
                        }],
                        "numeric-price": ["20px", {
                            "lineHeight": "24px",
                            "fontWeight": "700"
                        }],
                        "title-md": ["18px", {
                            "lineHeight": "26px",
                            "fontWeight": "600"
                        }],
                        "headline-lg": ["32px", {
                            "lineHeight": "40px",
                            "fontWeight": "600"
                        }],
                        "headline-xl": ["40px", {
                            "lineHeight": "48px",
                            "fontWeight": "700"
                        }],
                        "label-lg": ["14px", {
                            "lineHeight": "20px",
                            "fontWeight": "500"
                        }],
                        "headline-xl-mobile": ["30px", {
                            "lineHeight": "38px",
                            "fontWeight": "700"
                        }]
                    }
                }
            }
        };
    </script>
</head>

<body class="bg-cream-50 font-body-md text-ink-900 min-h-screen flex items-center justify-center">
    <main class="w-full bg-cream-50">
        <div class="flex flex-col w-full">
            <div class="max-w-7xl mx-auto w-full px-6 py-10 lg:py-16">
                <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 lg:gap-12 items-stretch">
                    <!-- Left Column: Editorial Brand & Regional Benefits Card -->
                    <div
                        class="lg:col-span-5 flex flex-col justify-between bg-forest-900 text-on-primary rounded-xl overflow-hidden shadow-xl relative">
                        <div class="relative h-64 lg:h-80 w-full overflow-hidden">
                            <img alt="Pesisir Barat Lampung" class="w-full h-full object-cover object-center"
                                src="https://lh3.googleusercontent.com/aida-public/AB6AXuAKhvsgqa9GHTyQHLGD7Ze-CwnFoZvhePXnuHxgC7LNvr2kQeqlx64VbDU2I7AayvliOOdGMF_5XL6RwqgkqpqhvMaR54yS7o3U1jCLfClMYGyEdqDBkUtBy6A1CCbuZ-ziVvDjPmWXfuBYkBNGW1k7kAUFTTev7dAKkcruGSStWgrOk-1RiAgkqQy6-7paTzQrWhHIP1c1C-Ni6qqFUAqFJ9zwNer3i29oS-f3y92z" />
                            <div
                                class="absolute inset-0 bg-gradient-to-t from-forest-900 via-forest-900/40 to-transparent">
                            </div>
                            <div class="absolute top-6 left-6">
                                <span
                                    class="inline-flex items-center gap-1.5 px-3 py-1 bg-forest-700/80 backdrop-blur-sm text-surface rounded-full font-label-sm text-label-sm tracking-wider uppercase">
                                    <span class="material-symbols-outlined text-[14px]">directions_car</span>
                                    Trans Lampung Express
                                </span>
                            </div>
                            <div class="absolute bottom-6 left-6 right-6">
                                <p class="font-headline-sm text-headline-sm text-paper-0 tracking-tight">
                                    Kenyamanan Lintas Pesisir &amp; Kota
                                </p>
                                <p class="font-body-sm text-body-sm text-surface-container-high/80 mt-1">
                                    Rute terpadu Bandar Lampung, Krui, Kotabumi, hingga Bakauheni.
                                </p>
                            </div>
                        </div>
                        <div class="p-6 lg:p-8 flex-1 flex flex-col justify-between space-y-8">
                            <div class="space-y-6">
                                <div>
                                    <span
                                        class="font-label-sm text-label-sm uppercase tracking-widest text-amber-500">Fasilitas
                                        Keanggotaan</span>
                                    <h2 class="font-headline-md text-headline-md text-paper-0 mt-1">Akses Prioritas
                                        Perjalanan</h2>
                                </div>
                                <ul class="space-y-4">
                                    <li class="flex items-start gap-3">
                                        <span class="material-symbols-outlined text-amber-500 mt-0.5 shrink-0"
                                            style="font-variation-settings: 'FILL' 1;">airline_seat_recline_extra</span>
                                        <div>
                                            <p class="font-label-lg text-label-lg text-paper-0">Kemudahan memilih kursi
                                                1–5 secara langsung</p>
                                            <p class="font-body-sm text-body-sm text-surface-container-high/70">Pilih
                                                tempat duduk favorit pada armada Toyota HiAce dan Isuzu Elf tanpa biaya
                                                tambahan.</p>
                                        </div>
                                    </li>
                                    <li class="flex items-start gap-3">
                                        <span class="material-symbols-outlined text-amber-500 mt-0.5 shrink-0"
                                            style="font-variation-settings: 'FILL' 1;">alt_route</span>
                                        <div>
                                            <p class="font-label-lg text-label-lg text-paper-0">Akses instan ke seluruh
                                                rute Lampung</p>
                                            <p class="font-body-sm text-body-sm text-surface-container-high/70">Pesan
                                                tiket jadwal pagi hingga malam dengan kepastian jadwal dan keberangkatan
                                                tepat waktu.</p>
                                        </div>
                                    </li>
                                    <li class="flex items-start gap-3">
                                        <span class="material-symbols-outlined text-amber-500 mt-0.5 shrink-0"
                                            style="font-variation-settings: 'FILL' 1;">verified_user</span>
                                        <div>
                                            <p class="font-label-lg text-label-lg text-paper-0">Konfirmasi transfer
                                                langsung ke operator</p>
                                            <p class="font-body-sm text-body-sm text-surface-container-high/70">Validasi
                                                otomatis tiket loket dan verifikasi bukti transfer kilat tanpa perantara
                                                agen.</p>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                            <div class="p-4 bg-forest-700/40 rounded-lg flex items-center gap-3">
                                <span
                                    class="material-symbols-outlined text-surface-container-high text-xl">privacy_tip</span>
                                <p class="font-body-sm text-body-sm text-surface-container-high/90">
                                    Data Anda terlindungi oleh sistem registrasi resmi loket Trans Lampung. Kerahasiaan
                                    terjamin penuh.
                                </p>
                            </div>
                        </div>
                    </div>
                    <!-- Right Column: Registration Form -->
                    <div class="lg:col-span-7 flex flex-col justify-center">
                        <div class="bg-paper-0 rounded-xl p-8 lg:p-12 shadow-md">
                            <div class="mb-8">
                                <span
                                    class="font-label-sm text-label-sm tracking-wider uppercase text-forest-700 font-semibold">Formulir
                                    Resmi Penumpang</span>
                                <h1 class="font-headline-lg text-headline-lg text-ink-900 mt-1">Pendaftaran Akun Member
                                </h1>
                                <p class="font-body-md text-body-md text-ink-600 mt-2">
                                    Lengkapi data identitas pelanggan di bawah ini sesuai format resmi untuk aktivasi
                                    tiket cepat.
                                </p>
                            </div>
                            <form class="space-y-6" id="member-register-form"
                                onsubmit="event.preventDefault(); handleRegistration();">
                                <!-- 1. nama (Nama Lengkap) -->
                                <div class="space-y-1.5">
                                    <label class="block font-label-lg text-label-lg text-ink-900" for="nama">
                                        Nama Lengkap <span class="text-red-600">*</span>
                                    </label>
                                    <div class="relative">
                                        <input
                                            class="w-full bg-paper-0 text-ink-900 placeholder:text-ink-600/50 font-body-md text-body-md rounded-lg px-4 py-3 bg-surface-container-low focus:bg-paper-0 focus:outline-none focus:ring-2 focus:ring-forest-700 transition"
                                            id="nama" name="nama" placeholder="Misal: Bambang Sudirman"
                                            required="" type="text" />
                                    </div>
                                    <p class="font-body-sm text-body-sm text-ink-600">Gunakan nama yang sesuai untuk
                                        verifikasi tiket saat penjemputan.</p>
                                </div>
                                <!-- 2. alamat (Alamat Tempat Tinggal) -->
                                <div class="space-y-1.5">
                                    <label class="block font-label-lg text-label-lg text-ink-900" for="alamat">
                                        Alamat Tempat Tinggal <span class="text-red-600">*</span>
                                    </label>
                                    <textarea
                                        class="w-full bg-paper-0 text-ink-900 placeholder:text-ink-600/50 font-body-md text-body-md rounded-lg px-4 py-3 bg-surface-container-low focus:bg-paper-0 focus:outline-none focus:ring-2 focus:ring-forest-700 transition resize-none"
                                        id="alamat" name="alamat" placeholder="Jl. Raden Intan No. 45, Enggal, Kota Bandar Lampung" required=""
                                        rows="2"></textarea>
                                    <p class="font-body-sm text-body-sm text-ink-600">Alamat domisili atau titik acuan
                                        penjemputan shuttle travel.</p>
                                </div>
                                <!-- 3 & 4. telepon & jen_kelamin (Two Columns) -->
                                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                    <!-- 3. telepon -->
                                    <div class="space-y-1.5">
                                        <label class="block font-label-lg text-label-lg text-ink-900" for="telepon">
                                            Nomor Telepon <span class="text-red-600">*</span>
                                        </label>
                                        <div class="relative">
                                            <div
                                                class="absolute inset-y-0 left-0 pl-3.5 flex items-center pointer-events-none text-ink-600">
                                                <span class="font-body-sm text-body-sm font-semibold">+62</span>
                                            </div>
                                            <input
                                                class="w-full bg-paper-0 text-ink-900 placeholder:text-ink-600/50 font-body-md text-body-md rounded-lg pl-14 pr-4 py-3 bg-surface-container-low focus:bg-paper-0 focus:outline-none focus:ring-2 focus:ring-forest-700 transition"
                                                id="telepon" name="telepon" pattern="[0-9]{8,15}"
                                                placeholder="81234567890" required="" type="tel" />
                                        </div>
                                        <p class="font-body-sm text-body-sm text-ink-600">Digunakan pengemudi untuk
                                            konfirmasi tiba.</p>
                                    </div>
                                    <!-- 4. jen_kelamin (Tactile Radio Toggle between L and P) -->
                                    <div class="space-y-1.5">
                                        <span class="block font-label-lg text-label-lg text-ink-900">
                                            Jenis Kelamin <span class="text-red-600">*</span>
                                        </span>
                                        <div aria-label="Jenis Kelamin" class="grid grid-cols-2 gap-3"
                                            role="radiogroup">
                                            <label
                                                class="relative flex items-center justify-center p-3 rounded-lg cursor-pointer bg-surface-container-low hover:bg-sage-100 transition has-[:checked]:bg-forest-700 has-[:checked]:text-on-primary">
                                                <input checked="" class="sr-only" name="jen_kelamin"
                                                    type="radio" value="L" />
                                                <div class="flex items-center gap-2">
                                                    <span class="material-symbols-outlined text-[18px]">male</span>
                                                    <span class="font-label-lg text-label-lg">Laki-laki (L)</span>
                                                </div>
                                            </label>
                                            <label
                                                class="relative flex items-center justify-center p-3 rounded-lg cursor-pointer bg-surface-container-low hover:bg-sage-100 transition has-[:checked]:bg-forest-700 has-[:checked]:text-on-primary">
                                                <input class="sr-only" name="jen_kelamin" type="radio"
                                                    value="P" />
                                                <div class="flex items-center gap-2">
                                                    <span class="material-symbols-outlined text-[18px]">female</span>
                                                    <span class="font-label-lg text-label-lg">Perempuan (P)</span>
                                                </div>
                                            </label>
                                        </div>
                                        <p class="font-body-sm text-body-sm text-ink-600">Sesuai basis data member
                                            travel.</p>
                                    </div>
                                </div>
                                <!-- 5 & 6. username & password (Two Columns) -->
                                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                    <!-- 5. username -->
                                    <div class="space-y-1.5">
                                        <label class="block font-label-lg text-label-lg text-ink-900" for="username">
                                            Username <span class="text-red-600">*</span>
                                        </label>
                                        <div class="relative">
                                            <input autocomplete="username"
                                                class="w-full bg-paper-0 text-ink-900 placeholder:text-ink-600/50 font-body-md text-body-md rounded-lg px-4 py-3 bg-surface-container-low focus:bg-paper-0 focus:outline-none focus:ring-2 focus:ring-forest-700 transition"
                                                id="username" name="username" placeholder="bambang_trv"
                                                required="" type="text" />
                                        </div>
                                        <p class="font-body-sm text-body-sm text-ink-600">Karakter huruf kecil dan
                                            angka tanpa spasi.</p>
                                    </div>
                                    <!-- 6. password -->
                                    <div class="space-y-1.5">
                                        <label class="block font-label-lg text-label-lg text-ink-900" for="password">
                                            Password <span class="text-red-600">*</span>
                                        </label>
                                        <div class="relative">
                                            <input autocomplete="new-password"
                                                class="w-full bg-paper-0 text-ink-900 placeholder:text-ink-600/50 font-body-md text-body-md rounded-lg pl-4 pr-11 py-3 bg-surface-container-low focus:bg-paper-0 focus:outline-none focus:ring-2 focus:ring-forest-700 transition"
                                                id="password" name="password" placeholder="••••••••" required=""
                                                type="password" />
                                            <button aria-label="Lihat sandi"
                                                class="absolute inset-y-0 right-0 pr-3.5 flex items-center text-ink-600 hover:text-ink-900 transition"
                                                onclick="togglePasswordVisibility()" type="button">
                                                <span class="material-symbols-outlined text-[20px]"
                                                    id="pw-toggle-icon">visibility</span>
                                            </button>
                                        </div>
                                        <p class="font-body-sm text-body-sm text-ink-600">Minimal 6 karakter untuk
                                            perlindungan akun.</p>
                                    </div>
                                </div>
                                <!-- Submit action -->
                                <div class="pt-2">
                                    <button
                                        class="w-full bg-forest-700 hover:bg-forest-900 text-on-primary font-title-sm text-title-sm py-3.5 px-6 rounded-lg transition duration-200 flex items-center justify-center gap-2 shadow-sm"
                                        type="submit">
                                        <span>Daftar Sebagai Member</span>
                                        <span class="material-symbols-outlined text-[18px]">arrow_forward</span>
                                    </button>
                                </div>
                                <!-- Feedback prompt area (Interactive placeholder) -->
                                <div class="hidden p-4 rounded-lg bg-sage-100 text-forest-900 flex items-start gap-3"
                                    id="registration-feedback">
                                    <span class="material-symbols-outlined text-green-700">check_circle</span>
                                    <div>
                                        <p class="font-label-lg text-label-lg">Pendaftaran Berhasil Diproses</p>
                                        <p class="font-body-sm text-body-sm text-ink-600">Data Anda telah dicatat.
                                            Mengalihkan ke portal pemesanan tiket...</p>
                                    </div>
                                </div>
                            </form>
                            <!-- Footer Switcher Link -->
                            <div
                                class="mt-8 pt-6 border-t-0 flex flex-col sm:flex-row items-center justify-between gap-4 text-center sm:text-left bg-surface-container-lowest">
                                <span class="font-body-md text-body-md text-ink-600">Sudah memiliki akun member
                                    resmi?</span>
                                <a class="font-title-sm text-title-sm text-forest-700 hover:text-forest-900 transition flex items-center gap-1"
                                    href="{{ route('login') }}">
                                    <span>Masuk di sini</span>
                                    <span class="material-symbols-outlined text-[16px]">north_east</span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <script>
        function togglePasswordVisibility() {
            const passwordInput = document.getElementById('password');
            const toggleIcon = document.getElementById('pw-toggle-icon');
            if (passwordInput.type === 'password') {
                passwordInput.type = 'text';
                toggleIcon.textContent = 'visibility_off';
            } else {
                passwordInput.type = 'password';
                toggleIcon.textContent = 'visibility';
            }
        }

        function handleRegistration() {
            const feedback = document.getElementById('registration-feedback');
            feedback.classList.remove('hidden');
            feedback.scrollIntoView({
                behavior: 'smooth',
                block: 'nearest'
            });
        }
    </script>
</body>

</html>
