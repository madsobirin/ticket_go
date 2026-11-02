@extends('layouts.guest')

@section('title', 'Pendaftaran Akun Member')

@php
    $inputBase = 'w-full bg-paper-0 text-ink-900 placeholder:text-ink-600/50 font-body-md text-body-md rounded-lg py-3 bg-surface-container-low focus:bg-paper-0 focus:outline-none focus:ring-2 focus:ring-forest-700 transition';
    $radioLabel = 'relative flex items-center justify-center p-3 rounded-lg cursor-pointer bg-surface-container-low hover:bg-sage-100 transition has-[:checked]:bg-forest-700 has-[:checked]:text-on-primary';
    $jenKelamin = old('jen_kelamin', 'L');
@endphp

@section('content')
<div class="flex flex-col w-full">
<div class="max-w-7xl mx-auto w-full px-6 py-10 lg:py-16">
<div class="grid grid-cols-1 lg:grid-cols-12 gap-8 lg:gap-12 items-stretch">

<!-- Left Column: Editorial Brand & Regional Benefits Card -->
<div class="lg:col-span-5 flex flex-col justify-between bg-forest-900 text-on-primary rounded-xl overflow-hidden shadow-xl relative">
<div class="relative h-64 lg:h-80 w-full overflow-hidden">
<img alt="Pesisir Barat Lampung" class="w-full h-full object-cover object-center" src="img/auth/register-forest.jpg"/>
<div class="absolute inset-0 bg-gradient-to-t from-forest-900 via-forest-900/40 to-transparent"></div>
<div class="absolute top-6 left-6">
<span class="inline-flex items-center gap-1.5 px-3 py-1 bg-forest-700/80 backdrop-blur-sm text-surface rounded-full font-label-sm text-label-sm tracking-wider uppercase">
<span class="material-symbols-outlined text-[14px]">directions_car</span>
              Ticket Go
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
<span class="font-label-sm text-label-sm uppercase tracking-widest text-amber-500">Fasilitas Keanggotaan</span>
<h2 class="font-headline-md text-headline-md text-paper-0 mt-1">Akses Prioritas Perjalanan</h2>
</div>
<ul class="space-y-4">
<li class="flex items-start gap-3">
<span class="material-symbols-outlined text-amber-500 mt-0.5 shrink-0" style="font-variation-settings: 'FILL' 1;">airline_seat_recline_extra</span>
<div>
<p class="font-label-lg text-label-lg text-paper-0">Kemudahan memilih kursi 1–5 secara langsung</p>
<p class="font-body-sm text-body-sm text-surface-container-high/70">Pilih tempat duduk favorit pada armada Toyota HiAce dan Isuzu Elf tanpa biaya tambahan.</p>
</div>
</li>
<li class="flex items-start gap-3">
<span class="material-symbols-outlined text-amber-500 mt-0.5 shrink-0" style="font-variation-settings: 'FILL' 1;">alt_route</span>
<div>
<p class="font-label-lg text-label-lg text-paper-0">Akses instan ke seluruh rute Lampung</p>
<p class="font-body-sm text-body-sm text-surface-container-high/70">Pesan tiket jadwal pagi hingga malam dengan kepastian jadwal dan keberangkatan tepat waktu.</p>
</div>
</li>
<li class="flex items-start gap-3">
<span class="material-symbols-outlined text-amber-500 mt-0.5 shrink-0" style="font-variation-settings: 'FILL' 1;">verified_user</span>
<div>
<p class="font-label-lg text-label-lg text-paper-0">Konfirmasi transfer langsung ke operator</p>
<p class="font-body-sm text-body-sm text-surface-container-high/70">Validasi otomatis tiket loket dan verifikasi bukti transfer kilat tanpa perantara agen.</p>
</div>
</li>
</ul>
</div>
<div class="p-4 bg-forest-700/40 rounded-lg flex items-center gap-3">
<span class="material-symbols-outlined text-surface-container-high text-xl">privacy_tip</span>
<p class="font-body-sm text-body-sm text-surface-container-high/90">
              Data Anda terlindungi oleh sistem registrasi resmi loket Trans Lampung. Kerahasiaan terjamin penuh.
            </p>
</div>
</div>
</div>

<!-- Right Column: Registration Form -->
<div class="lg:col-span-7 flex flex-col justify-center">
<div class="bg-paper-0 rounded-xl p-8 lg:p-12 shadow-md">
<div class="mb-8">
<span class="font-label-sm text-label-sm tracking-wider uppercase text-forest-700 font-semibold">Formulir Resmi Penumpang</span>
<h1 class="font-headline-lg text-headline-lg text-ink-900 mt-1">Pendaftaran Akun Member</h1>
<p class="font-body-md text-body-md text-ink-600 mt-2">
              Lengkapi data identitas pelanggan di bawah ini sesuai format resmi untuk aktivasi tiket cepat.
            </p>
</div>

<form class="space-y-6" id="member-register-form" method="POST" action="{{ route('register.store') }}">
@csrf

<!-- 1. nama -->
<div class="space-y-1.5">
<label class="block font-label-lg text-label-lg text-ink-900" for="nama">
                Nama Lengkap <span class="text-red-600">*</span>
</label>
<div class="relative">
<input class="{{ $inputBase }} px-4" id="nama" name="nama" value="{{ old('nama') }}" placeholder="Misal: Bambang Sudirman" required="" type="text"/>
</div>
@error('nama')<p class="font-body-sm text-body-sm text-red-600">{{ $message }}</p>@enderror
<p class="font-body-sm text-body-sm text-ink-600">Gunakan nama yang sesuai untuk verifikasi tiket saat penjemputan.</p>
</div>

<!-- 2. alamat -->
<div class="space-y-1.5">
<label class="block font-label-lg text-label-lg text-ink-900" for="alamat">
                Alamat Tempat Tinggal <span class="text-red-600">*</span>
</label>
<textarea class="{{ $inputBase }} px-4 resize-none" id="alamat" name="alamat" placeholder="Jl. Raden Intan No. 45, Enggal, Kota Bandar Lampung" required="" rows="2">{{ old('alamat') }}</textarea>
@error('alamat')<p class="font-body-sm text-body-sm text-red-600">{{ $message }}</p>@enderror
<p class="font-body-sm text-body-sm text-ink-600">Alamat domisili atau titik acuan penjemputan shuttle travel.</p>
</div>

<!-- 3 & 4. telepon & jen_kelamin -->
<div class="grid grid-cols-1 md:grid-cols-2 gap-6">
<!-- 3. telepon -->
<div class="space-y-1.5">
<label class="block font-label-lg text-label-lg text-ink-900" for="telepon">
                  Nomor Telepon <span class="text-red-600">*</span>
</label>
<div class="relative">
<div class="absolute inset-y-0 left-0 pl-3.5 flex items-center pointer-events-none text-ink-600">
<span class="font-body-sm text-body-sm font-semibold">+62</span>
</div>
<input class="{{ $inputBase }} pl-14 pr-4" id="telepon" name="telepon" value="{{ old('telepon') }}" pattern="[0-9]{8,15}" placeholder="81234567890" required="" type="tel"/>
</div>
@error('telepon')<p class="font-body-sm text-body-sm text-red-600">{{ $message }}</p>@enderror
<p class="font-body-sm text-body-sm text-ink-600">Digunakan pengemudi untuk konfirmasi tiba.</p>
</div>

<!-- 4. jen_kelamin -->
<div class="space-y-1.5">
<span class="block font-label-lg text-label-lg text-ink-900">
                  Jenis Kelamin <span class="text-red-600">*</span>
</span>
<div aria-label="Jenis Kelamin" class="grid grid-cols-2 gap-3" role="radiogroup">
<label class="{{ $radioLabel }}">
<input @checked($jenKelamin === 'L') class="sr-only" name="jen_kelamin" type="radio" value="L"/>
<div class="flex items-center gap-2">
<span class="material-symbols-outlined text-[18px]">male</span>
<span class="font-label-lg text-label-lg">Laki-laki (L)</span>
</div>
</label>
<label class="{{ $radioLabel }}">
<input @checked($jenKelamin === 'P') class="sr-only" name="jen_kelamin" type="radio" value="P"/>
<div class="flex items-center gap-2">
<span class="material-symbols-outlined text-[18px]">female</span>
<span class="font-label-lg text-label-lg">Perempuan (P)</span>
</div>
</label>
</div>
@error('jen_kelamin')<p class="font-body-sm text-body-sm text-red-600">{{ $message }}</p>@enderror
<p class="font-body-sm text-body-sm text-ink-600">Sesuai basis data member travel.</p>
</div>
</div>

<!-- 5 & 6. username & password -->
<div class="grid grid-cols-1 md:grid-cols-2 gap-6">
<!-- 5. username -->
<div class="space-y-1.5">
<label class="block font-label-lg text-label-lg text-ink-900" for="username">
                  Username <span class="text-red-600">*</span>
</label>
<div class="relative">
<input autocomplete="username" class="{{ $inputBase }} px-4" id="username" name="username" value="{{ old('username') }}" placeholder="bambang_trv" required="" type="text"/>
</div>
@error('username')<p class="font-body-sm text-body-sm text-red-600">{{ $message }}</p>@enderror
<p class="font-body-sm text-body-sm text-ink-600">Karakter huruf kecil dan angka tanpa spasi.</p>
</div>

<!-- 6. password -->
<div class="space-y-1.5">
<label class="block font-label-lg text-label-lg text-ink-900" for="password">
                  Password <span class="text-red-600">*</span>
</label>
<div class="relative">
<input autocomplete="new-password" class="{{ $inputBase }} pl-4 pr-11" id="password" name="password" placeholder="••••••••" required="" type="password"/>
<button aria-label="Lihat sandi" class="absolute inset-y-0 right-0 pr-3.5 flex items-center text-ink-600 hover:text-ink-900 transition" onclick="togglePasswordVisibility()" type="button">
<span class="material-symbols-outlined text-[20px]" id="pw-toggle-icon">visibility</span>
</button>
</div>
@error('password')<p class="font-body-sm text-body-sm text-red-600">{{ $message }}</p>@enderror
<p class="font-body-sm text-body-sm text-ink-600">Minimal 6 karakter untuk perlindungan akun.</p>
</div>
</div>

<!-- Submit action -->
<div class="pt-2">
<button class="w-full bg-forest-700 hover:bg-forest-900 text-on-primary font-title-sm text-title-sm py-3.5 px-6 rounded-lg transition duration-200 flex items-center justify-center gap-2 shadow-sm" type="submit">
<span>Daftar Sebagai Member</span>
<span class="material-symbols-outlined text-[18px]">arrow_forward</span>
</button>
</div>

<!-- Feedback (muncul setelah redirect sukses) -->
@if (session('success'))
<div class="p-4 rounded-lg bg-sage-100 text-forest-900 flex items-start gap-3" id="registration-feedback">
<span class="material-symbols-outlined text-green-700">check_circle</span>
<div>
<p class="font-label-lg text-label-lg">Pendaftaran Berhasil Diproses</p>
<p class="font-body-sm text-body-sm text-ink-600">{{ session('success') }}</p>
</div>
</div>
@endif
</form>

<!-- Footer Switcher Link -->
<div class="mt-8 pt-6 border-t-0 flex flex-col sm:flex-row items-center justify-between gap-4 text-center sm:text-left bg-surface-container-lowest">
<span class="font-body-md text-body-md text-ink-600">Sudah memiliki akun member resmi?</span>
<a class="font-title-sm text-title-sm text-forest-700 hover:text-forest-900 transition flex items-center gap-1" href="{{ route('login') }}">
<span>Masuk di sini</span>
<span class="material-symbols-outlined text-[16px]">north_east</span>
</a>
</div>
</div>
</div>

</div>
</div>
</div>
@endsection

@push('scripts')
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
</script>
@endpush
