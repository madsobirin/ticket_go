<?php

use App\Models\Jadwal;
use App\Models\Kendaraan;
use App\Models\KotaAsal;
use App\Models\KotaTujuan;
use App\Models\OperatorLoket;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Hash;

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

    $this->operator = OperatorLoket::create([
        'nama' => 'Petugas Loket Rajabasa',
        'user' => 'operator_test',
        'password' => Hash::make('password123'),
    ]);
});

it('operator can access dashboard and all operasional menus', function () {
    $this->actingAs($this->operator)
        ->get(route('operator.dashboard'))
        ->assertOk();

    $this->actingAs($this->operator)
        ->get(route('operator.konfirmasi-pembayaran'))
        ->assertOk();

    $this->actingAs($this->operator)
        ->get(route('operator.pesanan'))
        ->assertOk();

    $this->actingAs($this->operator)
        ->get(route('operator.layani-pemesanan'))
        ->assertOk();
});

it('operator can access all master data menus and forms', function () {
    // 1. Kota
    $this->actingAs($this->operator)
        ->get(route('operator.cities.index'))
        ->assertOk();

    $this->actingAs($this->operator)
        ->get(route('operator.cities.create'))
        ->assertOk();

    $this->actingAs($this->operator)
        ->get(route('operator.cities.edit', $this->asal->id_kota_asal))
        ->assertOk();

    // 2. Rute Antar Kota
    $this->actingAs($this->operator)
        ->get(route('operator.routes.index'))
        ->assertOk();

    $this->actingAs($this->operator)
        ->get(route('operator.routes.create'))
        ->assertOk();

    $routeId = ($this->asal->id_kota_asal * 1000) + $this->tujuan->id_kota_tujuan;
    $this->actingAs($this->operator)
        ->get(route('operator.routes.edit', $routeId))
        ->assertOk();

    // 3. Armada Kendaraan
    $this->actingAs($this->operator)
        ->get(route('operator.vehicles.index'))
        ->assertOk();

    $this->actingAs($this->operator)
        ->get(route('operator.vehicles.create'))
        ->assertOk();

    $this->actingAs($this->operator)
        ->get(route('operator.vehicles.edit', $this->kendaraan->id_mobil))
        ->assertOk();

    // 4. Jadwal Keberangkatan
    $this->actingAs($this->operator)
        ->get(route('operator.schedules.index'))
        ->assertOk();

    $this->actingAs($this->operator)
        ->get(route('operator.schedules.create'))
        ->assertOk();

    $this->actingAs($this->operator)
        ->get(route('operator.schedules.edit', $this->jadwal->id_jadwal))
        ->assertOk();
});

it('operator can perform crud operations on master data', function () {
    // CRUD Kendaraan
    $this->actingAs($this->operator)
        ->post(route('operator.vehicles.store'), [
            'type' => 'Toyota HiAce Premio',
            'plate_number' => 'BE 9999 ZZ',
            'color' => 'Hitam',
            'seat_capacity' => 5,
        ])
        ->assertRedirect(route('operator.vehicles.index'));

    $this->assertDatabaseHas('kendaraan', [
        'nomor_polisi' => 'BE 9999 ZZ',
    ]);

    // CRUD Kota
    $this->actingAs($this->operator)
        ->post(route('operator.cities.store'), [
            'name' => 'Kotabumi Baru',
        ])
        ->assertRedirect(route('operator.cities.index'));

    $this->assertDatabaseHas('kota_asal', [
        'nm_kota_asal' => 'Kotabumi Baru',
    ]);

    // CRUD Jadwal
    $this->actingAs($this->operator)
        ->post(route('operator.schedules.store'), [
            'route_id' => ($this->asal->id_kota_asal * 1000) + $this->tujuan->id_kota_tujuan,
            'vehicle_id' => $this->kendaraan->id_mobil,
            'price' => 150000,
            'departure_at' => date('Y-m-d H:i:s', strtotime('+2 days 10:00:00')),
            'status' => 'open',
        ])
        ->assertRedirect(route('operator.schedules.index'));

    $this->assertDatabaseHas('jadwal', [
        'harga' => 150000,
    ]);
});
