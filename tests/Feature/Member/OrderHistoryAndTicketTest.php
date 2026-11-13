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

test('guest cannot access order history or e-ticket', function () {
    $response = $this->get(route('member.pesanan'));
    $response->assertRedirect(route('login'));

    $pesan = Pesan::create([
        'id_jadwal' => $this->jadwal->id_jadwal,
        'id_member' => $this->member->id_member,
        'nomor_kursi' => '3',
        'status' => 'Lunas',
    ]);

    $responseTicket = $this->get(route('member.tiket', $pesan->id_pesan));
    $responseTicket->assertRedirect(route('login'));
});

test('member can view order history with their own bookings', function () {
    $pesan = Pesan::create([
        'id_jadwal' => $this->jadwal->id_jadwal,
        'id_member' => $this->member->id_member,
        'nomor_kursi' => '3',
        'status' => 'Menunggu Pembayaran',
    ]);

    $response = $this->actingAs($this->member)->get(route('member.pesanan'));

    $response->assertOk();
    $response->assertSee('Riwayat Pemesanan');
    $response->assertSee('#PSN-'.str_pad($pesan->id_pesan, 4, '0', STR_PAD_LEFT));
    $response->assertSee('Bandar Lampung');
    $response->assertSee('Krui');
    $response->assertSee('Kursi 3');
});

test('member can filter order history by status tabs', function () {
    $pesanBayar = Pesan::create([
        'id_jadwal' => $this->jadwal->id_jadwal,
        'id_member' => $this->member->id_member,
        'nomor_kursi' => '1',
        'status' => 'Menunggu Pembayaran',
    ]);

    $pesanLunas = Pesan::create([
        'id_jadwal' => $this->jadwal->id_jadwal,
        'id_member' => $this->member->id_member,
        'nomor_kursi' => '2',
        'status' => 'Lunas',
    ]);

    // Filter tab lunas
    $responseLunas = $this->actingAs($this->member)->get(route('member.pesanan', ['status' => 'lunas']));
    $responseLunas->assertOk();
    $responseLunas->assertSee('Kursi 2');
    $responseLunas->assertDontSee('Kursi 1');

    // Filter tab menunggu-pembayaran
    $responseBayar = $this->actingAs($this->member)->get(route('member.pesanan', ['status' => 'menunggu-pembayaran']));
    $responseBayar->assertOk();
    $responseBayar->assertSee('Kursi 1');
    $responseBayar->assertDontSee('Kursi 2');
});

test('member can view valid e-ticket for paid booking', function () {
    $pesan = Pesan::create([
        'id_jadwal' => $this->jadwal->id_jadwal,
        'id_member' => $this->member->id_member,
        'nomor_kursi' => '3',
        'status' => 'Lunas',
    ]);

    KonfirmasiPesan::create([
        'no_resi' => 'TRX-ETIKET-999',
        'no_rek' => 11400928,
        'tgl_transfer' => date('Y-m-d'),
        'jam_transfer' => '10:00:00',
        'id_pesan' => $pesan->id_pesan,
    ]);

    $response = $this->actingAs($this->member)->get(route('member.tiket', $pesan->id_pesan));

    $response->assertOk();
    $response->assertSee('E-Tiket Resmi');
    $response->assertSee('#TKT-'.str_pad($pesan->id_pesan, 6, '0', STR_PAD_LEFT));
    $response->assertSee('Lunas • Terverifikasi Loket');
    $response->assertSee('Budi Santoso');
    $response->assertSee('Bandar Lampung');
    $response->assertSee('Krui');
    $response->assertSee('TRX-ETIKET-999');
});

test('member cannot access e-ticket belonging to another member', function () {
    $otherMember = Member::create([
        'nama' => 'Siti Rahayu',
        'alamat' => 'Metro',
        'telepon' => '089988776655',
        'jen_kelamin' => 'P',
        'username' => 'sitir',
        'password' => 'secret123',
    ]);

    $pesan = Pesan::create([
        'id_jadwal' => $this->jadwal->id_jadwal,
        'id_member' => $otherMember->id_member,
        'nomor_kursi' => '5',
        'status' => 'Lunas',
    ]);

    $response = $this->actingAs($this->member)->get(route('member.tiket', $pesan->id_pesan));
    $response->assertNotFound();
});
