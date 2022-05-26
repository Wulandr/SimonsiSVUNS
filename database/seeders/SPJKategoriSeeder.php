<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SPJKategoriSeeder extends Seeder
{
    public function run()
    {
        DB::table('spj_kategori')->insert([
            [
                'nama_kategori' => 'Konsumsi Kegiatan'
            ],
            [
                'nama_kategori' => 'Kontribusi/Registrasi Pelatihan/Sekom'
            ],
            [
                'nama_kategori' => 'Honor Narasumber Kegiatan'
            ],
            [
                'nama_kategori' => 'Pembelian Barang dan Jasa'
            ],
            [
                'nama_kategori' => 'Honor Magang Mahasiswa/Asisten Praktikum'
            ],
            [
                'nama_kategori' => 'Bantuan Transport/Transport Lokal (Karesidenan Surakarta)'
            ],
            [
                'nama_kategori' => 'SPDD'
            ]
        ]);
    }
}
