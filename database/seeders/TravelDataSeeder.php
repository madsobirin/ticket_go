<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TravelDataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // 1. Kota Asal
        $kotaAsal = [
            ['id_kota_asal' => 1, 'nm_kota_asal' => 'Bandar Lampung'],
            ['id_kota_asal' => 2, 'nm_kota_asal' => 'Metro'],
            ['id_kota_asal' => 3, 'nm_kota_asal' => 'Kalianda'],
            ['id_kota_asal' => 4, 'nm_kota_asal' => 'Pringsewu'],
            ['id_kota_asal' => 5, 'nm_kota_asal' => 'Bandar Jaya'],
        ];
        DB::table('kota_asal')->insertOrIgnore($kotaAsal);

        // 2. Kota Tujuan
        $kotaTujuan = [
            ['id_kota_tujuan' => 1, 'nm_kota_tujuan' => 'Krui (Pesisir Barat)'],
            ['id_kota_tujuan' => 2, 'nm_kota_tujuan' => 'Liwa (Lampung Barat)'],
            ['id_kota_tujuan' => 3, 'nm_kota_tujuan' => 'Kotabumi'],
            ['id_kota_tujuan' => 4, 'nm_kota_tujuan' => 'Bakauheni'],
            ['id_kota_tujuan' => 5, 'nm_kota_tujuan' => 'Mesuji'],
        ];
        DB::table('kota_tujuan')->insertOrIgnore($kotaTujuan);

        // 3. Kendaraan
        $kendaraan = [
            ['id_mobil' => 1, 'jenis_mobil' => 'Toyota HiAce', 'nomor_polisi' => 'BE 7012 AA', 'warna_mobil' => 'Putih'],
            ['id_mobil' => 2, 'jenis_mobil' => 'Toyota HiAce Commuter', 'nomor_polisi' => 'BE 7034 BB', 'warna_mobil' => 'Silver'],
            ['id_mobil' => 3, 'jenis_mobil' => 'Isuzu Elf', 'nomor_polisi' => 'BE 7056 CC', 'warna_mobil' => 'Hitam'],
            ['id_mobil' => 4, 'jenis_mobil' => 'Toyota Innova Reborn', 'nomor_polisi' => 'BE 7078 DD', 'warna_mobil' => 'Abu-abu'],
            ['id_mobil' => 5, 'jenis_mobil' => 'Toyota HiAce Premio', 'nomor_polisi' => 'BE 7090 EE', 'warna_mobil' => 'Putih'],
        ];
        DB::table('kendaraan')->insertOrIgnore($kendaraan);

        // 4. 10 Data Jadwal Perjalanan
        $today = date('Y-m-d');
        $tomorrow = date('Y-m-d', strtotime('+1 day'));
        $dayAfter = date('Y-m-d', strtotime('+2 days'));

        $jadwal = [
            [
                'id_jadwal' => 1,
                'id_kota_asal' => 1,
                'id_kota_tujuan' => 1,
                'harga' => 120000,
                'tgl_berangkat' => $today,
                'jam_berangkat' => '08:00:00',
                'id_mobil' => 1,
            ],
            [
                'id_jadwal' => 2,
                'id_kota_asal' => 1,
                'id_kota_tujuan' => 1,
                'harga' => 120000,
                'tgl_berangkat' => $today,
                'jam_berangkat' => '13:00:00',
                'id_mobil' => 2,
            ],
            [
                'id_jadwal' => 3,
                'id_kota_asal' => 1,
                'id_kota_tujuan' => 2,
                'harga' => 110000,
                'tgl_berangkat' => $today,
                'jam_berangkat' => '09:00:00',
                'id_mobil' => 3,
            ],
            [
                'id_jadwal' => 4,
                'id_kota_asal' => 1,
                'id_kota_tujuan' => 4,
                'harga' => 60000,
                'tgl_berangkat' => $today,
                'jam_berangkat' => '16:00:00',
                'id_mobil' => 4,
            ],
            [
                'id_jadwal' => 5,
                'id_kota_asal' => 2,
                'id_kota_tujuan' => 1,
                'harga' => 140000,
                'tgl_berangkat' => $tomorrow,
                'jam_berangkat' => '07:30:00',
                'id_mobil' => 5,
            ],
            [
                'id_jadwal' => 6,
                'id_kota_asal' => 2,
                'id_kota_tujuan' => 3,
                'harga' => 85000,
                'tgl_berangkat' => $tomorrow,
                'jam_berangkat' => '10:00:00',
                'id_mobil' => 1,
            ],
            [
                'id_jadwal' => 7,
                'id_kota_asal' => 3,
                'id_kota_tujuan' => 1,
                'harga' => 150000,
                'tgl_berangkat' => $tomorrow,
                'jam_berangkat' => '08:00:00',
                'id_mobil' => 2,
            ],
            [
                'id_jadwal' => 8,
                'id_kota_asal' => 4,
                'id_kota_tujuan' => 2,
                'harga' => 100000,
                'tgl_berangkat' => $dayAfter,
                'jam_berangkat' => '09:30:00',
                'id_mobil' => 3,
            ],
            [
                'id_jadwal' => 9,
                'id_kota_asal' => 5,
                'id_kota_tujuan' => 5,
                'harga' => 95000,
                'tgl_berangkat' => $dayAfter,
                'jam_berangkat' => '14:00:00',
                'id_mobil' => 4,
            ],
            [
                'id_jadwal' => 10,
                'id_kota_asal' => 1,
                'id_kota_tujuan' => 3,
                'harga' => 80000,
                'tgl_berangkat' => $dayAfter,
                'jam_berangkat' => '15:30:00',
                'id_mobil' => 5,
            ],
        ];
        DB::table('jadwal')->insertOrIgnore($jadwal);
    }
}
