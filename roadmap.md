# Roadmap Pengembangan — Lintas Lampung

Dokumen panduan tahapan pengembangan sistem tiket travel antar kota Provinsi Lampung dari awal hingga siap pakai lokal.

---

## Status Terkini & Hasil Audit (13 November 2026)

> [!NOTE]
> Terjadi transisi arsitektur database: Skema awal (Bahasa Inggris: `users`, `cities`, `routes`, `vehicles`, `bookings`, `payments`) telah digantikan oleh skema tabel Bahasa Indonesia (`member`, `kota_asal`, `kota_tujuan`, `kendaraan`, `jadwal`, `pesan`, `konfirmasi_pesan`, `keluhan`, `admin`, `operator_loket`).
> 
> **Pencapaian Baru Selesai**:
> 1. Registrasi member baru masuk ke tabel `member` dan langsung beralih ke halaman login membawa notifikasi flash sukses.
> 2. Autentikasi `Member` aktif via `config/auth.php` dan terhubung ke dashboard `/member/beranda`.
> 3. Seeder data demo travel (`TravelDataSeeder`): 5 kota asal, 5 kota tujuan, 5 mobil, dan 10 jadwal perjalanan aktif.
> 4. Pencarian jadwal travel (`member.cari-jadwal`) membaca tabel `jadwal`, `kota_asal`, dan `kota_tujuan`.
> 5. Alur pemilihan kursi (`member.kursi`) terhubung ke tabel `pesan` (kapasitas 5 kursi, kunci otomatis kursi yang terisi).
> 6. Pembayaran & Konfirmasi transfer (`member.pembayaran` & `member.konfirmasi-pembayaran`) terhubung ke tabel `konfirmasi_pesan` dan mengubah status tiket menjadi 'Menunggu Konfirmasi'.
> 7. Verifikasi Pembayaran Loket (`operator.konfirmasi-pembayaran`): Petugas loket dapat memeriksa antrean, menyetujui (status tiket menjadi 'Lunas'), atau menolak pembayaran (status kembali 'Menunggu Pembayaran').
> 8. Bugfix form konfirmasi & redirect: mapping `no_rek` form field dan link balik `member.cari-jadwal` di `/member/pesanan` normal tanpa error (20/20 test pest lulus).

---

## Ringkasan Progres

| Fase | Fokus Modul | Status | Cakupan Utama |
|---|---|:---:|---|
| **Fase 0** | Skema Database Bahasa Indonesia | **SELESAI** | 10 tabel DDL (`member`, `kota_asal`, `kota_tujuan`, `kendaraan`, `jadwal`, `pesan`, `konfirmasi_pesan`, dll) |
| **Fase 1** | Registrasi & Login Member | **SELESAI** | Form register -> tabel `member`, redirect login dengan status flash, auth guard member |
| **Fase 2** | Seeder Data Perjalanan | **SELESAI** | 5 Kota Asal, 5 Kota Tujuan, 5 Kendaraan, 10 Jadwal aktif via `TravelDataSeeder` |
| **Fase 3** | Pencarian & Pemesanan Kursi | **SELESAI** | Pencarian jadwal dinamis, visual 5 kursi, validasi kapasitas, simpan ke tabel `pesan` |
| **Fase 4** | Pembayaran & Konfirmasi Transfer | **SELESAI** | Ringkasan tagihan tiket, form konfirmasi simpan ke `konfirmasi_pesan`, alur kirim bukti sukses |
| **Fase 5** | Verifikasi Pembayaran Loket | **SELESAI** | Operator verifikasi bukti bayar, setujui ('Lunas') atau tolak ('Menunggu Pembayaran'), test pest 20/20 lulus |
| **Fase 6** | E-Tiket & Riwayat Perjalanan | **BERIKUTNYA** | Halaman riwayat tiket member dinamis (`pesanan.blade.php`), cetak / pratinjau e-tiket sah |
| **Fase 7** | Layanan Keluhan Member | *Menunggu* | Form komplain penumpang ke tabel `keluhan`, panel tindak lanjut operator/admin |
| **Fase 8** | Adaptasi Operator & Admin Loket | *Menunggu* | Login terpisah / multi-auth (`operator_loket`, `admin`), CRUD master data jadwal |
| **Fase 9** | Perbaikan Suite Testing Pest | *Menunggu* | Refactor 71 unit/feature test agar selaras dengan skema tabel database baru |

---

## Alur Implementasi Berkelanjutan

```mermaid
flowchart TD
    A["Fase 1: Auth Member (Selesai)"] --> B["Fase 2: Master Seeder (Selesai)"]
    B --> C["Fase 3: Cari Jadwal & Pilih Kursi (Selesai)"]
    C --> D["Fase 4: Pembayaran & Konfirmasi Transfer (Selesai)"]
    D --> E["Fase 5: Meja Verifikasi Operator Loket (Selesai)"]
    E --> F["Fase 6: E-Tiket Sah & Riwayat Pesanan (BERIKUTNYA)"]
    F --> G["Fase 7: Layanan Aduan / Keluhan"]
    G --> H["Fase 8: Panel Operator & Admin"]
    H --> I["Fase 9: Refactor Test Pest & Final Polish"]
```

---

## Detail Rencana Eksekusi Mendatang

### Fase 5 — Verifikasi Pembayaran Oleh Operator Loket (Selesai)
Tujuan: Petugas loket memverifikasi keabsahan dana transfer.
- [x] **Tugas 5.1: Daftar Antrean Konfirmasi (`operator.konfirmasi-pembayaran`)**: render data dari `konfirmasi_pesan` + relasi ke `pesan`.
- [x] **Tugas 5.2: Aksi Persetujuan / Penolakan**: tombol setujui ubah status tiket jadi 'Lunas', tolak ubah jadi 'Menunggu Pembayaran' & hapus konfirmasi.

---

### Fase 6 — E-Tiket & Riwayat Pesanan Member (Fokus Sekarang)
Tujuan: Penumpang memiliki bukti sah tiket perjalanan antar kota di Lampung setelah pembayaran disetujui loket.

- **Tugas 6.1: Riwayat Pemesanan Dinamis (`member.pesanan`)**
  - Buat `OrderHistoryController` untuk mengambil pemesanan milik member yang login (`where('id_member', $member->id_member)`).
  - Kelompokkan tab: Semua, Menunggu Pembayaran, Menunggu Konfirmasi, Lunas / Selesai.
- **Tugas 6.2: Modal Pratinjau & Cetak E-Tiket**
  - Render e-tiket sah (No Pesan, Nama Penumpang, Rute Asal-Tujuan, Waktu Keberangkatan, No Kursi, Armada).
  - Sediakan tombol Cetak Tiket (`window.print()`).

---

### Fase 7 — Layanan Keluhan Penumpang
Tujuan: Penumpang dapat menyampaikan aduan terkait perjalanan.

- **Tugas 7.1: Form Pengajuan Keluhan (`member.keluhan`)**
  - Input: Jenis keluhan (`j_keluhan`), Detail keluhan (`d_keluhan`).
  - Simpan ke tabel `keluhan` berelasi dengan `id_member`.
- **Tugas 7.2: Monitor Keluhan Petugas Loket / Admin**
  - Daftar aduan masuk untuk segera ditindaklanjuti oleh loket operasional.

---

### Fase 8 — Adaptasi Panel Operator & Admin
Tujuan: Loket dan admin dapat mengelola jadwal serta memantau operasional.

- **Tugas 8.1: Multi-Auth Guard Loket & Admin**
  - Autentikasi untuk tabel `operator_loket` dan `admin`.
- **Tugas 8.2: Manajemen Jadwal & Armada**
  - Form tambah/ubah jadwal keberangkatan travel baru ke tabel `jadwal`.

---

### Fase 9 — Refactor Test Suite Pest & Final Hardening
Tujuan: Memastikan seluruh pengujian otomatis (71 tests) kembali hijau 100%.

- Sesuaikan model, factories, dan HTTP assertions pada test suite Pest agar mencocokkan skema tabel database baru (`member`, `jadwal`, `pesan`).
