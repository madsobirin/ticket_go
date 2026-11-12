<?php

use App\Models\Jadwal;
use App\Models\Kendaraan;
use App\Models\KotaAsal;
use App\Models\KotaTujuan;
use App\Models\Member;
use App\Models\Pesan;
use Illuminate\Foundation\Testing\RefreshDatabase;

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
