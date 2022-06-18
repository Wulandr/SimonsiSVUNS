<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class AnggaranSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('anggaran')->insert([
            [
                'id_rab' => '1',
                'id_detail_mak' => '1',
                'id_tahap_anggaran' => '1',
                'kebutuhan_vol' => '1',
                'kebutuhan_sat' => 'keg',
                'frek' => '1',
                'perhitungan_vol' => '1',
                'perhitungan_sat' => 'OK',
                'harga_satuan' => '8000000',
                'anggaran' => '8000000',
            ],
            //monev ...
            [
                'id_rab' => '3',
                'id_detail_mak' => '4',
                'id_tahap_anggaran' => '1',
                'kebutuhan_vol' => '18',
                'kebutuhan_sat' => 'org',
                'frek' => '1',
                'perhitungan_vol' => '18',
                'perhitungan_sat' => 'OK',
                'harga_satuan' => '150000',
                'anggaran' => '270000',
            ],
            [
                'id_rab' => '3',
                'id_detail_mak' => '4',
                'id_tahap_anggaran' => '1',
                'kebutuhan_vol' => '4',
                'kebutuhan_sat' => 'org',
                'frek' => '1',
                'perhitungan_vol' => '4',
                'perhitungan_sat' => 'OK',
                'harga_satuan' => '370000',
                'anggaran' => '1480000',
            ],
            [
                'id_rab' => '3',
                'id_detail_mak' => '4',
                'id_tahap_anggaran' => '1',
                'kebutuhan_vol' => '1',
                'kebutuhan_sat' => 'org',
                'frek' => '1',
                'perhitungan_vol' => '1',
                'perhitungan_sat' => 'OK',
                'harga_satuan' => '420000',
                'anggaran' => '420000',
            ],
            [
                'id_rab' => '3',
                'id_detail_mak' => '4',
                'id_tahap_anggaran' => '1',
                'kebutuhan_vol' => '12',
                'kebutuhan_sat' => 'org',
                'frek' => '1',
                'perhitungan_vol' => '12',
                'perhitungan_sat' => 'OK',
                'harga_satuan' => '150000',
                'anggaran' => '1800000',
            ],
            [
                'id_rab' => '3',
                'id_detail_mak' => '4',
                'id_tahap_anggaran' => '1',
                'kebutuhan_vol' => '3',
                'kebutuhan_sat' => 'org',
                'frek' => '1',
                'perhitungan_vol' => '3',
                'perhitungan_sat' => 'OK',
                'harga_satuan' => '370000',
                'anggaran' => '1110000',
            ],
            [
                'id_rab' => '3',
                'id_detail_mak' => '5',
                'id_tahap_anggaran' => '1',
                'kebutuhan_vol' => '7',
                'kebutuhan_sat' => 'kali',
                'frek' => '1',
                'perhitungan_vol' => '7',
                'perhitungan_sat' => 'OK',
                'harga_satuan' => '1000000',
                'anggaran' => '7000000',
            ],
            [
                'id_rab' => '3',
                'id_detail_mak' => '5',
                'id_tahap_anggaran' => '1',
                'kebutuhan_vol' => '3',
                'kebutuhan_sat' => 'kali',
                'frek' => '1',
                'perhitungan_vol' => '3',
                'perhitungan_sat' => 'OK',
                'harga_satuan' => '900000',
                'anggaran' => '2700000',
            ],
            [
                'id_rab' => '2',
                'id_detail_mak' => '1',
                'id_tahap_anggaran' => '1',
                'kebutuhan_vol' => '6',
                'kebutuhan_sat' => 'org',
                'frek' => '1',
                'perhitungan_vol' => '6',
                'perhitungan_sat' => 'paket',
                'harga_satuan' => '1300000',
                'anggaran' => '7800000',
            ],
            [
                'id_rab' => '2',
                'id_detail_mak' => '1',
                'id_tahap_anggaran' => '1',
                'kebutuhan_vol' => '6',
                'kebutuhan_sat' => 'org',
                'frek' => '1',
                'perhitungan_vol' => '6',
                'perhitungan_sat' => 'paket',
                'harga_satuan' => '1150000',
                'anggaran' => '6900000',
            ],
            [
                'id_rab' => '3',
                'id_detail_mak' => '4',
                'id_tahap_anggaran' => '1',
                'kebutuhan_vol' => '1',
                'kebutuhan_sat' => 'keg',
                'frek' => '1',
                'perhitungan_vol' => '1',
                'perhitungan_sat' => 'OK',
                'harga_satuan' => '8000000',
                'anggaran' => '8000000',
            ],
            [
                'id_rab' => '6',
                'id_detail_mak' => '5',
                'id_tahap_anggaran' => '1',
                'kebutuhan_vol' => '1',
                'kebutuhan_sat' => 'unit',
                'frek' => '2',
                'perhitungan_vol' => '2',
                'perhitungan_sat' => 'unit/hari',
                'harga_satuan' => '1016000',
                'anggaran' => '2032000',
            ],
            [
                'id_rab' => '6',
                'id_detail_mak' => '6',
                'id_tahap_anggaran' => '1',
                'kebutuhan_vol' => '30',
                'kebutuhan_sat' => 'liter',
                'frek' => '1',
                'perhitungan_vol' => '30',
                'perhitungan_sat' => 'liter/unit',
                'harga_satuan' => '9000',
                'anggaran' => '270000',
            ],
            [
                'id_rab' => '6',
                'id_detail_mak' => '6',
                'id_tahap_anggaran' => '1',
                'kebutuhan_vol' => '45',
                'kebutuhan_sat' => 'liter',
                'frek' => '1',
                'perhitungan_vol' => '45',
                'perhitungan_sat' => 'liter/unit',
                'harga_satuan' => '9000',
                'anggaran' => '405000',
            ],
            [
                'id_rab' => '6',
                'id_detail_mak' => '4',
                'id_tahap_anggaran' => '1',
                'kebutuhan_vol' => '2',
                'kebutuhan_sat' => 'org',
                'frek' => '2',
                'perhitungan_vol' => '4',
                'perhitungan_sat' => 'orang/hari',
                'harga_satuan' => '388500',
                'anggaran' => '1554000',
            ],
            [
                'id_rab' => '7',
                'id_detail_mak' => '4',
                'id_tahap_anggaran' => '1',
                'kebutuhan_vol' => '1',
                'kebutuhan_sat' => 'org',
                'frek' => '4',
                'perhitungan_vol' => '4',
                'perhitungan_sat' => 'kegiatan',
                'harga_satuan' => '150000',
                'anggaran' => '600000',
            ],
            [
                'id_rab' => '7',
                'id_detail_mak' => '4',
                'id_tahap_anggaran' => '1',
                'kebutuhan_vol' => '1',
                'kebutuhan_sat' => 'org',
                'frek' => '5',
                'perhitungan_vol' => '5',
                'perhitungan_sat' => 'kegiatan',
                'harga_satuan' => '150000',
                'anggaran' => '750000',
            ],
            [
                'id_rab' => '7',
                'id_detail_mak' => '4',
                'id_tahap_anggaran' => '1',
                'kebutuhan_vol' => '1',
                'kebutuhan_sat' => 'org',
                'frek' => '5',
                'perhitungan_vol' => '5',
                'perhitungan_sat' => 'kegiatan',
                'harga_satuan' => '150000',
                'anggaran' => '750000',
            ],
            [
                'id_rab' => '7',
                'id_detail_mak' => '4',
                'id_tahap_anggaran' => '1',
                'kebutuhan_vol' => '1',
                'kebutuhan_sat' => 'org',
                'frek' => '5',
                'perhitungan_vol' => '5',
                'perhitungan_sat' => 'kegiatan',
                'harga_satuan' => '150000',
                'anggaran' => '750000',
            ],
            [
                'id_rab' => '7',
                'id_detail_mak' => '4',
                'id_tahap_anggaran' => '1',
                'kebutuhan_vol' => '1',
                'kebutuhan_sat' => 'org',
                'frek' => '5',
                'perhitungan_vol' => '5',
                'perhitungan_sat' => 'kegiatan',
                'harga_satuan' => '150000',
                'anggaran' => '750000',
            ],
            [
                'id_rab' => '7',
                'id_detail_mak' => '4',
                'id_tahap_anggaran' => '1',
                'kebutuhan_vol' => '1',
                'kebutuhan_sat' => 'org',
                'frek' => '2',
                'perhitungan_vol' => '2',
                'perhitungan_sat' => 'kegiatan',
                'harga_satuan' => '150000',
                'anggaran' => '300000',
            ],
            // [
            //     'id_rab' => '8',
            //     'id_detail_mak' => '1',
            //     'id_tahap_anggaran' => '342',
            //     'catatan' => '<p>Bantuan Kontribusi peserta (pemrogam) LSP UNS</p>',
            //     'kebutuhan_vol' => '25',
            //     'kebutuhan_sat' => 'org',
            //     'frek' => '1',
            //     'perhitungan_vol' => '25',
            //     'perhitungan_sat' => 'org',
            //     'harga_satuan' => '750000',
            //     'anggaran' => '18750000',
            // ],
        ]);
    }
}
