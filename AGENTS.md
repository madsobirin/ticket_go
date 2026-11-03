# Lintas Lampung — Konteks Proyek

Aplikasi web pemesanan tiket travel antar kota di Lampung. Berjalan LOCAL saja, tidak ada
deploy. Tiga role: member (penumpang), operator (loket), admin.

## Dokumen acuan (baca sesuai kebutuhan brief)

- docs/prd.md → kebutuhan fitur, user story, aturan bisnis
- docs/database-design.md → skema database to-be, DDL, state machine booking
- docs/ui-design-system.md → warna, font, komponen, layout
- docs/stitch/ → export desain layar dari Google Stitch (referensi visual)

## Stack

Laravel 12 (atau versi stabil terbaru), PHP 8.3+, MySQL/MariaDB, Blade + Tailwind CSS + Vite,
Livewire untuk bagian interaktif, Pest untuk test. Tanpa SPA terpisah.

## Aturan kerja

- Kerjakan HANYA scope brief yang sedang diminta. Jangan membangun fitur brief lain.
- Ikuti konvensi Laravel (Form Request, Policy, Resource controller, Eloquent relationship, enum).
- Semua teks UI dalam Bahasa Indonesia. Nama tabel/kolom/kode dalam Bahasa Inggris sesuai
  docs/database-design.md. Timezone Asia/Jakarta, locale id.
- Keamanan: password di-hash, validasi lewat Form Request, otorisasi lewat middleware/policy,
  jangan percaya input client, lindungi dari mass assignment dan N+1 query.
- Jangan commit .env atau secret. Jangan ubah file di docs/ kecuali diminta.
- Jangan menambah package di luar yang disebut brief tanpa menjelaskan alasannya lebih dulu.
- Di akhir setiap brief: jalankan perintah verifikasi, tampilkan hasilnya, dan ringkas
  file yang dibuat/diubah. Jika ada asumsi, tulis di bagian "Asumsi".
