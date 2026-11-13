<?php

use App\Models\Jadwal;
use App\Models\Kendaraan;
use App\Models\KonfirmasiPesan;
use App\Models\KotaAsal;
use App\Models\KotaTujuan;
use App\Models\Member;
use App\Models\OperatorLoket;
use App\Models\Pesan;
use Illuminate\Foundation\Testing\RefreshDatabase;

uses(RefreshDatabase::class);

beforeEach(function () {
    $this->asal = KotaAsal::create(['nm_kota_asal' => 'Bandar Lampung']);
    $this->tujuan = KotaTujuan::create(['nm_kota_tujuan' => 'Krui']);
    $this->kendaraan = Kendaraan::create([
        'jenis_mobil' => 'Toyota HiAce',
        'nomor_polisi' => 'BE 1234 AA',
        'warna_mobil' => 'Putih',
    ]);
    $this->jadwal = Jadwal::create([
        'id_kota_asal' => $this->asal->id_kota_asal,
        'id_kota_tujuan' => $this->tujuan->id_kota_tujuan,
        'harga' => 120000,
        'tgl_berangkat' => date('Y-m-d'),
        'jam_berangkat' => '08:00:00',
        'id_mobil' => $this->kendaraan->id_mobil,
    ]);
    $this->member = Member::create([
        'nama' => 'Budi Santoso',
        'alamat' => 'Bandar Lampung',
        'telepon' => '081234567890',
        'jen_kelamin' => 'L',
        'username' => 'budis',
        'password' => 'secret123',
    ]);
});

test('guest or regular member cannot access operator payment verification', function () {
    $response = $this->get(route('operator.konfirmasi-pembayaran'));
    $response->assertRedirect(route('login'));

    $responseMember = $this->actingAs($this->member)->get(route('operator.konfirmasi-pembayaran'));
    $responseMember->assertForbidden();
});

test('operator can view list of pending payment confirmations', function () {
    $operator = OperatorLoket::create([
        'user' => 'operator1',
        'nama' => 'Dimas Wahyu',
        'password' => 'secret123',
    ]);

    $pesan = Pesan::create([
        'id_jadwal' => $this->jadwal->id_jadwal,
        'id_member' => $this->member->id_member,
        'nomor_kursi' => '3',
        'status' => 'Menunggu Konfirmasi',
    ]);

    $konfirmasi = KonfirmasiPesan::create([
        'no_resi' => 'TRX-123456',
        'no_rek' => 123456789,
        'tgl_transfer' => '2026-11-13',
        'jam_transfer' => '10:00:00',
        'id_pesan' => $pesan->id_pesan,
    ]);

    $response = $this->actingAs($operator)->get(route('operator.konfirmasi-pembayaran'));

    $response->assertOk();
    $response->assertSee('TRX-123456');
    $response->assertSee('Budi Santoso');
    $response->assertSee('Bandar Lampung');
    $response->assertSee('Krui');
});

test('operator can approve payment confirmation and changes ticket status to Lunas', function () {
    $operator = OperatorLoket::create([
        'user' => 'operator1',
        'nama' => 'Dimas Wahyu',
        'password' => 'secret123',
    ]);

    $pesan = Pesan::create([
        'id_jadwal' => $this->jadwal->id_jadwal,
        'id_member' => $this->member->id_member,
        'nomor_kursi' => '2',
        'status' => 'Menunggu Konfirmasi',
    ]);

    $konfirmasi = KonfirmasiPesan::create([
        'no_resi' => 'TRX-998877',
        'no_rek' => 987654321,
        'tgl_transfer' => '2026-11-13',
        'jam_transfer' => '11:00:00',
        'id_pesan' => $pesan->id_pesan,
    ]);

    $response = $this->actingAs($operator)->post(route('operator.konfirmasi-pembayaran.approve', $konfirmasi->no_resi));

    $response->assertRedirect();
    $response->assertSessionHas('status');

    $this->assertDatabaseHas('pesan', [
        'id_pesan' => $pesan->id_pesan,
        'status' => 'Lunas',
    ]);
});

test('operator can reject payment confirmation and reverts ticket status to Menunggu Pembayaran', function () {
    $operator = OperatorLoket::create([
        'user' => 'operator1',
        'nama' => 'Dimas Wahyu',
        'password' => 'secret123',
    ]);

    $pesan = Pesan::create([
        'id_jadwal' => $this->jadwal->id_jadwal,
        'id_member' => $this->member->id_member,
        'nomor_kursi' => '4',
        'status' => 'Menunggu Konfirmasi',
    ]);

    $konfirmasi = KonfirmasiPesan::create([
        'no_resi' => 'TRX-554433',
        'no_rek' => 555666777,
        'tgl_transfer' => '2026-11-13',
        'jam_transfer' => '12:00:00',
        'id_pesan' => $pesan->id_pesan,
    ]);

    $response = $this->actingAs($operator)->post(route('operator.konfirmasi-pembayaran.reject', $konfirmasi->no_resi));

    $response->assertRedirect();
    $response->assertSessionHas('status');

    $this->assertDatabaseHas('pesan', [
        'id_pesan' => $pesan->id_pesan,
        'status' => 'Menunggu Pembayaran',
    ]);

    $this->assertDatabaseMissing('konfirmasi_pesan', [
        'no_resi' => 'TRX-554433',
    ]);
});
