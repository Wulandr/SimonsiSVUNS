<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class KomponenJadwalSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('komponen_jadwal')->insert([
            [
                'id_tor' => '1',
                'komponen' => 'Rapat APTV',
                'bulan_awal' => '2',
                'bulan_akhir' => '4'
            ],
            [
                'id_tor' => '1',
                'komponen' => 'Pembayaran Iuran',
                'bulan_awal' => '3',
                'bulan_akhir' => '3'
            ],
            [
                'id_tor' => '1',
                'komponen' => 'Evaluasi',
                'bulan_awal' => '4',
                'bulan_akhir' => '4'
            ],
            [
                'id_tor' => '2',
                'komponen' => 'Pelatihan Credit Officeer',
                'bulan_awal' => '3',
                'bulan_akhir' => '3'
            ],
            [
                'id_tor' => '2',
                'komponen' => 'Uji Sertifikasi Kompetensi Credit Officeer',
                'bulan_awal' => '3',
                'bulan_akhir' => '3'
            ],
            [
                'id_tor' => '3',
                'komponen' => 'Melakukan pendataan mitra industri magang dan
                 mahasiswa yang melaksanakan KMM dan Magang MBKM',
                'bulan_awal' => '1',
                'bulan_akhir' => '1'
            ],
            [
                'id_tor' => '3',
                'komponen' => 'Menetapkan daftar ploting dosen pembimbing dan membuat SK Dosen Pembimbing',
                'bulan_awal' => '1',
                'bulan_akhir' => '1'
            ],
            [
                'id_tor' => '3',
                'komponen' => 'Memberikan dan menjadwalkan penugasan monev pada dosen pembimbing',
                'bulan_awal' => '2',
                'bulan_akhir' => '2'
            ],
            [
                'id_tor' => '3',
                'komponen' => 'Membuatkan Surat Tugas Monitoring dan Evaluasi',
                'bulan_awal' => '2',
                'bulan_akhir' => '2'
            ],
            [
                'id_tor' => '3',
                'komponen' => 'Dosen pembimbing melaksankan tugas monitoring dan evaluasi kegiatan magang di industri secara langsung berttemu dengan mahasiswa dan pembimibing lainnya',
                'bulan_awal' => '2',
                'bulan_akhir' => '3'
            ],
            [
                'id_tor' => '8',
                'komponen' => 'Menyiapkan proposal penawaran kerja sama',
                'bulan_awal' => '1',
                'bulan_akhir' => '2'
            ],
            [
                'id_tor' => '8',
                'komponen' => 'Mengumpulkan data dan menghubungi perusahaan',
                'bulan_awal' => '2',
                'bulan_akhir' => '3'
            ],
            [
                'id_tor' => '8',
                'komponen' => 'Melakukan kunjungan industri',
                'bulan_awal' => '2',
                'bulan_akhir' => '3'
            ],
            [
                'id_tor' => '9',
                'komponen' => 'Menentukan perusahaan untuk MBKM',
                'bulan_awal' => '1',
                'bulan_akhir' => '2'
            ],
            [
                'id_tor' => '9',
                'komponen' => 'Memilih mahasiswa yang melaksanakan MBKM',
                'bulan_awal' => '2',
                'bulan_akhir' => '2'
            ],
            [
                'id_tor' => '9',
                'komponen' => 'Membagi dosen sebagai dosen pembimbing sesuai keahlian',
                'bulan_awal' => '2',
                'bulan_akhir' => '3'
            ],
            [
                'id_tor' => '9',
                'komponen' => 'Pelaksanaan monitoring pada bulan meii sampai juni 2022 dengan jadwal sebagai berikut',
                'bulan_awal' => '3',
                'bulan_akhir' => '7'
            ],
        ]);
    }
}
