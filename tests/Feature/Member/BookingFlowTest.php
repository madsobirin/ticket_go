<?php

use App\Models\Jadwal;
use App\Models\Kendaraan;
use App\Models\KotaAsal;
use App\Models\KotaTujuan;
use App\Models\Member;
use App\Models\Pesan;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

uses(RefreshDatabase::class);

test('member can search schedules with city filter', function () {
    $member = Member::create([
        'nama' => 'Budi Santoso',
        'alamat' => 'Bandar Lampung',
        'telepon' => '081234567890',
        'jen_kelamin' => 'L',
        'username' => 'budis',
        'password' => 'secret123',
    ]);

    $asal = KotaAsal::create(['nm_kota_asal' => 'Bandar Lampung']);
    $tujuan = KotaTujuan::create(['nm_kota_tujuan' => 'Krui']);
    $kendaraan = Kendaraan::create([
        'jenis_mobil' => 'Toyota HiAce',
        'nomor_polisi' => 'BE 1234 AA',
        'warna_mobil' => 'Putih',
    ]);

    $jadwal = Jadwal::create([
        'id_kota_asal' => $asal->id_kota_asal,
        'id_kota_tujuan' => $tujuan->id_kota_tujuan,
        'harga' => 120000,
        'tgl_berangkat' => date('Y-m-d'),
        'jam_berangkat' => '08:00:00',
        'id_mobil' => $kendaraan->id_mobil,
    ]);

    $response = $this->actingAs($member)->get(route('member.cari-jadwal', [
        'kota_asal' => 'Bandar Lampung',
        'kota_tujuan' => 'Krui',
    ]));

    $response->assertOk();
    $response->assertSee('Bandar Lampung');
    $response->assertSee('Krui');
    $response->assertSee(number_format($jadwal->harga, 0, ',', '.'));
});

test('member can open seat picker page for a schedule', function () {
    $member = Member::create([
        'nama' => 'Budi Santoso',
        'alamat' => 'Bandar Lampung',
        'telepon' => '081234567890',
        'jen_kelamin' => 'L',
        'username' => 'budis',
        'password' => 'secret123',
    ]);

    $asal = KotaAsal::create(['nm_kota_asal' => 'Bandar Lampung']);
    $tujuan = KotaTujuan::create(['nm_kota_tujuan' => 'Krui']);
    $kendaraan = Kendaraan::create([
        'jenis_mobil' => 'Toyota HiAce',
        'nomor_polisi' => 'BE 1234 AA',
        'warna_mobil' => 'Putih',
    ]);

    $jadwal = Jadwal::create([
        'id_kota_asal' => $asal->id_kota_asal,
        'id_kota_tujuan' => $tujuan->id_kota_tujuan,
        'harga' => 120000,
        'tgl_berangkat' => date('Y-m-d'),
        'jam_berangkat' => '08:00:00',
        'id_mobil' => $kendaraan->id_mobil,
    ]);

    // Kursi 2 terisi
    Pesan::create([
        'id_jadwal' => $jadwal->id_jadwal,
        'id_member' => $member->id_member,
        'nomor_kursi' => '2',
        'status' => 'Menunggu Pembayaran',
    ]);

    $response = $this->actingAs($member)->get(route('member.pilih-kursi', $jadwal));

    $response->assertOk();
    $response->assertViewHas('occupiedSeats', [2]);
});

test('member can successfully book an available seat', function () {
    $member = Member::create([
        'nama' => 'Budi Santoso',
        'alamat' => 'Bandar Lampung',
        'telepon' => '081234567890',
        'jen_kelamin' => 'L',
        'username' => 'budis',
        'password' => 'secret123',
    ]);

    $asal = KotaAsal::create(['nm_kota_asal' => 'Bandar Lampung']);
    $tujuan = KotaTujuan::create(['nm_kota_tujuan' => 'Krui']);
    $kendaraan = Kendaraan::create([
        'jenis_mobil' => 'Toyota HiAce',
        'nomor_polisi' => 'BE 1234 AA',
        'warna_mobil' => 'Putih',
    ]);

    $jadwal = Jadwal::create([
        'id_kota_asal' => $asal->id_kota_asal,
        'id_kota_tujuan' => $tujuan->id_kota_tujuan,
        'harga' => 120000,
        'tgl_berangkat' => date('Y-m-d'),
        'jam_berangkat' => '08:00:00',
        'id_mobil' => $kendaraan->id_mobil,
    ]);

    $response = $this->actingAs($member)->post(route('member.booking.store'), [
        'schedule_id' => $jadwal->id_jadwal,
        'seat_number' => 1,
    ]);

    $response->assertRedirect(route('member.pembayaran'));

    $pesan = Pesan::where('id_jadwal', $jadwal->id_jadwal)
        ->where('nomor_kursi', '1')
        ->first();

    expect($pesan)->not->toBeNull()
        ->and($pesan->id_member)->toBe($member->id_member)
        ->and($pesan->status)->toBe('Menunggu Pembayaran');
});

test('booking rejects duplicate seat selection on the same schedule', function () {
    $member1 = Member::create([
        'nama' => 'Budi Santoso',
        'alamat' => 'Bandar Lampung',
        'telepon' => '081234567890',
        'jen_kelamin' => 'L',
        'username' => 'budis',
        'password' => 'secret123',
    ]);

    $member2 = Member::create([
        'nama' => 'Dewi Sartika',
        'alamat' => 'Metro',
        'telepon' => '081234567891',
        'jen_kelamin' => 'P',
        'username' => 'dewis',
        'password' => 'secret123',
    ]);

    $asal = KotaAsal::create(['nm_kota_asal' => 'Bandar Lampung']);
    $tujuan = KotaTujuan::create(['nm_kota_tujuan' => 'Krui']);
    $kendaraan = Kendaraan::create([
        'jenis_mobil' => 'Toyota HiAce',
        'nomor_polisi' => 'BE 1234 AA',
        'warna_mobil' => 'Putih',
    ]);

    $jadwal = Jadwal::create([
        'id_kota_asal' => $asal->id_kota_asal,
        'id_kota_tujuan' => $tujuan->id_kota_tujuan,
        'harga' => 120000,
        'tgl_berangkat' => date('Y-m-d'),
        'jam_berangkat' => '08:00:00',
        'id_mobil' => $kendaraan->id_mobil,
    ]);

    // Member 1 memesan kursi 3
    Pesan::create([
        'id_jadwal' => $jadwal->id_jadwal,
        'id_member' => $member1->id_member,
        'nomor_kursi' => '3',
        'status' => 'Menunggu Pembayaran',
    ]);

    // Member 2 mencoba memesan kursi 3 yang sama
    $response = $this->actingAs($member2)
        ->from(route('member.pilih-kursi', $jadwal))
        ->post(route('member.booking.store'), [
            'schedule_id' => $jadwal->id_jadwal,
            'seat_number' => 3,
        ]);

    $response->assertRedirect(route('member.pilih-kursi', $jadwal));
    $response->assertSessionHas('error');

    expect(Pesan::where('id_jadwal', $jadwal->id_jadwal)->where('nomor_kursi', '3')->count())->toBe(1);
});

test('member can view payment page with download slip modal and submit confirmation to loket', function () {
    Storage::fake('public');

    $member = Member::create([
        'nama' => 'Budi Santoso',
        'alamat' => 'Bandar Lampung',
        'telepon' => '081234567890',
        'jen_kelamin' => 'L',
        'username' => 'budis',
        'password' => 'secret123',
    ]);

    $asal = KotaAsal::create(['nm_kota_asal' => 'Bandar Lampung']);
    $tujuan = KotaTujuan::create(['nm_kota_tujuan' => 'Krui']);
    $kendaraan = Kendaraan::create([
        'jenis_mobil' => 'Toyota HiAce',
        'nomor_polisi' => 'BE 1234 AA',
        'warna_mobil' => 'Putih',
    ]);

    $jadwal = Jadwal::create([
        'id_kota_asal' => $asal->id_kota_asal,
        'id_kota_tujuan' => $tujuan->id_kota_tujuan,
        'harga' => 120000,
        'tgl_berangkat' => date('Y-m-d'),
        'jam_berangkat' => '08:00:00',
        'id_mobil' => $kendaraan->id_mobil,
    ]);

    $pesan = Pesan::create([
        'id_jadwal' => $jadwal->id_jadwal,
        'id_member' => $member->id_member,
        'nomor_kursi' => '2',
        'status' => 'Menunggu Pembayaran',
    ]);

    // 1. Cek halaman pembayaran member
    $response = $this->actingAs($member)->get(route('member.pembayaran'));
    $response->assertOk();
    $response->assertSee('Unduh Bukti Tagihan / Booking Slip');
    $response->assertSee('Kirim Bukti ke Meja Loket');
    $response->assertSee('Slip Bukti Pemesanan');

    // 2. Member mengisi form konfirmasi pembayaran ke loket
    $file = UploadedFile::fake()->create('struk.jpg', 200, 'image/jpeg');

    $postResponse = $this->actingAs($member)->post(route('member.konfirmasi-pembayaran.store'), [
        'id_pesan' => $pesan->id_pesan,
        'bank_tujuan' => 'MANDIRI',
        'nominal_transfer' => '120.000',
        'nama_pengirim' => 'Budi Santoso',
        'no_rek' => '1140092817291',
        'no_resi' => 'TRX-TEST-2026',
        'tanggal_transfer' => '2026-11-13 10:30:00',
        'file_bukti' => $file,
    ]);

    $postResponse->assertRedirect(route('member.pesanan'));

    // Status pesanan berubah menjadi Menunggu Konfirmasi
    expect($pesan->fresh()->status)->toBe('Menunggu Konfirmasi');

    $this->assertDatabaseHas('konfirmasi_pesan', [
        'no_resi' => 'TRX-TEST-2026',
        'id_pesan' => $pesan->id_pesan,
    ]);
});
