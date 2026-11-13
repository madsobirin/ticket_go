<?php

use App\Models\Jadwal;
use App\Models\Kendaraan;
use App\Models\KonfirmasiPesan;
use App\Models\KotaAsal;
use App\Models\KotaTujuan;
use App\Models\Member;
use App\Models\Pesan;
use Illuminate\Foundation\Testing\RefreshDatabase;

uses(RefreshDatabase::class);

test('member can view payment page with latest booking', function () {
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
        'nomor_kursi' => '3',
        'status' => 'Menunggu Pembayaran',
    ]);

    $response = $this->actingAs($member)->get(route('member.pembayaran'));

    $response->assertOk();
    $response->assertSee('Ringkasan Tagihan');
    $response->assertSee('Bandar Lampung');
    $response->assertSee('Krui');
    $response->assertSee('Kursi 3');
});

test('member can submit payment confirmation form and updates pesan status', function () {
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
        'nomor_kursi' => '3',
        'status' => 'Menunggu Pembayaran',
    ]);

    $response = $this->actingAs($member)->post(route('member.konfirmasi-pembayaran.store'), [
        'id_pesan' => $pesan->id_pesan,
        'no_resi' => 'TRX-99887766',
        'no_rek' => '1140092817291',
        'tanggal_transfer' => '2026-11-12 14:30:00',
    ]);

    $response->assertRedirect(route('member.pesanan'));
    $response->assertSessionHas('status');

    $pesananPage = $this->actingAs($member)->get(route('member.pesanan'));
    $pesananPage->assertOk();

    $konfirmasi = KonfirmasiPesan::where('no_resi', 'TRX-99887766')->first();
    expect($konfirmasi)->not->toBeNull()
        ->and($konfirmasi->id_pesan)->toBe($pesan->id_pesan)
        ->and($konfirmasi->tgl_transfer)->toBe('2026-11-12');

    expect($pesan->fresh()->status)->toBe('Menunggu Konfirmasi');
});

test('member can submit payment confirmation using no_rek_pengirim form field', function () {
    $member = Member::create([
        'nama' => 'Budi Santoso',
        'alamat' => 'Bandar Lampung',
        'telepon' => '081234567890',
        'jen_kelamin' => 'L',
        'username' => 'budis2',
        'password' => 'secret123',
    ]);

    $asal = KotaAsal::create(['nm_kota_asal' => 'Bandar Lampung']);
    $tujuan = KotaTujuan::create(['nm_kota_tujuan' => 'Krui']);
    $kendaraan = Kendaraan::create([
        'jenis_mobil' => 'Toyota HiAce',
        'nomor_polisi' => 'BE 1234 BB',
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
        'nomor_kursi' => '4',
        'status' => 'Menunggu Pembayaran',
    ]);

    $response = $this->actingAs($member)->post(route('member.konfirmasi-pembayaran.store'), [
        'id_pesan' => $pesan->id_pesan,
        'no_resi' => 'TRX-PENGIRIM-123',
        'no_rek_pengirim' => '1140092817291',
        'tanggal_transfer' => '2026-11-12 14:30:00',
    ]);

    $response->assertRedirect(route('member.pesanan'));
    $response->assertSessionHas('status');

    $konfirmasi = KonfirmasiPesan::where('no_resi', 'TRX-PENGIRIM-123')->first();
    expect($konfirmasi)->not->toBeNull()
        ->and($konfirmasi->no_rek)->toBe(1140092817291);
});

test('payment confirmation rejects duplicate no_resi', function () {
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
        'nomor_kursi' => '3',
        'status' => 'Menunggu Pembayaran',
    ]);

    KonfirmasiPesan::create([
        'no_resi' => 'TRX-DUPLICATE',
        'no_rek' => 1140029,
        'tgl_transfer' => '2026-11-12',
        'jam_transfer' => '10:00:00',
        'id_pesan' => $pesan->id_pesan,
    ]);

    $response = $this->actingAs($member)->from(route('member.konfirmasi-pembayaran'))->post(route('member.konfirmasi-pembayaran.store'), [
        'id_pesan' => $pesan->id_pesan,
        'no_resi' => 'TRX-DUPLICATE',
        'no_rek' => '1140092817291',
        'tanggal_transfer' => '2026-11-12 14:30:00',
    ]);

    $response->assertRedirect(route('member.konfirmasi-pembayaran'));
    $response->assertSessionHasErrors(['no_resi']);
});
