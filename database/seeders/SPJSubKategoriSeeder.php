<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SPJSubKategoriSeeder extends Seeder
{
    public function run()
    {
        DB::table('spj_subkategori')->insert([
            // Kategori 1
            [
                'id_kategori' => 1,
                'nama_subkategori' => 'Tambahkan File',
                'catatan' => NULL
            ],

            // Kategori 2
            [
                'id_kategori' => 2,
                'nama_subkategori' => 'Penawaran Program dari Rekanan (Semacam Iklan)',
                'catatan' =>
                '<p>Untuk nominal 10jt &ndash; 50jt&nbsp;<em><strong>(Silahkan menghubungi bagian BMN guna membantu terkait penyelesaian SPJ)</strong></em></p>
                <ul>
	                <li>Surat Pesanan dari Prodi (nomor dari SV)</li>
	                <li>Surat Kesanggupan Rekanan</li>
                </ul>'
            ],
            [
                'id_kategori' => 2,
                'nama_subkategori' => 'Surat Penunjukan / Permohona Pelatihan atau Sertifikasi',
                'catatan' => NULL
            ],
            [
                'id_kategori' => 2,
                'nama_subkategori' => 'Surat Tugas Mengikuti',
                'catatan' => NULL
            ],
            [
                'id_kategori' => 2,
                'nama_subkategori' => 'Kuitansi',
                'catatan' => NULL
            ],
            [
                'id_kategori' => 2,
                'nama_subkategori' => 'SPBy',
                'catatan' => NULL
            ],
            [
                'id_kategori' => 2,
                'nama_subkategori' => 'Fotocopy Sertifikat',
                'catatan' => NULL
            ],
            [
                'id_kategori' => 2,
                'nama_subkategori' => 'LPJ Kegiatan',
                'catatan' => NULL
            ],

            // Kategori 3
            [
                'id_kategori' => 3,
                'nama_subkategori' => 'Undangan Kegiatan',
                'catatan' => NULL
            ],
            [
                'id_kategori' => 3,
                'nama_subkategori' => 'Undangan Narasumber',
                'catatan' => NULL
            ],
            [
                'id_kategori' => 3,
                'nama_subkategori' => 'Kesediaan Narasumber',
                'catatan' => NULL
            ],
            [
                'id_kategori' => 3,
                'nama_subkategori' => 'Daftar Hadir Narasumber dan Peserta',
                'catatan' => NULL
            ],
            [
                'id_kategori' => 3,
                'nama_subkategori' => 'Rundown Acara',
                'catatan' => NULL
            ],
            [
                'id_kategori' => 3,
                'nama_subkategori' => 'Kuitansi',
                'catatan' => NULL
            ],
            [
                'id_kategori' => 3,
                'nama_subkategori' => 'SPBy',
                'catatan' => NULL
            ],
            [
                'id_kategori' => 3,
                'nama_subkategori' => 'Copy Buku Rekening + NPWP + KTP',
                'catatan' => NULL
            ],
            [
                'id_kategori' => 3,
                'nama_subkategori' => 'LPJ Kegiatan (Apabila Daring + Video Recordnya bentuk CD)',
                'catatan' => NULL
            ],

            // Kategori 4
            [
                'id_kategori' => 4,
                'nama_subkategori' => 'Kuitansi)',
                'catatan' =>
                '<p>Untuk nominal 10jt &ndash; 50jt&nbsp;<em><strong>(Silahkan menghubungi bagian BMN guna membantu terkait penyelesaian SPJ)</strong></em></p>
                <ul>
	                <li>Surat Pesanan dari Prodi (nomor dari SV)</li>
	                <li>Surat Kesanggupan Rekanan</li>
                </ul>'
            ],
            [
                'id_kategori' => 4,
                'nama_subkategori' => 'SPBy',
                'catatan' => NULL
            ],
            [
                'id_kategori' => 4,
                'nama_subkategori' => 'Nota',
                'catatan' => NULL
            ],
            [
                'id_kategori' => 4,
                'nama_subkategori' => 'NPWP + KTP',
                'catatan' => NULL
            ],
            [
                'id_kategori' => 4,
                'nama_subkategori' => 'Referensi Bank',
                'catatan' => NULL
            ],

            // Kategori 5
            [
                'id_kategori' => 5,
                'nama_subkategori' => 'SK Magang',
                'catatan' => NULL
            ],
            [
                'id_kategori' => 5,
                'nama_subkategori' => 'Daftar Hadir Mahasiswa',
                'catatan' => NULL
            ],
            [
                'id_kategori' => 5,
                'nama_subkategori' => 'Kuitansi/Tanda Terima Honor',
                'catatan' => NULL
            ],
            [
                'id_kategori' => 5,
                'nama_subkategori' => 'SPBy',
                'catatan' => NULL
            ],
            [
                'id_kategori' => 5,
                'nama_subkategori' => 'LPJ',
                'catatan' => NULL
            ],

            // Kategori 6
            [
                'id_kategori' => 6,
                'nama_subkategori' => 'Surat Tugas (Dicap Instansi Yang dikunjungi)',
                'catatan' => NULL
            ],
            [
                'id_kategori' => 6,
                'nama_subkategori' => 'Kuitansi (Daftar Penerimaan Bantuan Transport)',
                'catatan' => NULL
            ],
            [
                'id_kategori' => 6,
                'nama_subkategori' => 'SPBy',
                'catatan' => NULL
            ],
            [
                'id_kategori' => 6,
                'nama_subkategori' => 'Bukti Pengeluaran Rill',
                'catatan' => NULL
            ],
            [
                'id_kategori' => 6,
                'nama_subkategori' => 'LPJ Kegiatan',
                'catatan' => NULL
            ],

            // Kategori 7
            [
                'id_kategori' => 7,
                'nama_subkategori' => 'Surat Tugas',
                'catatan' => NULL
            ],
            [
                'id_kategori' => 7,
                'nama_subkategori' => 'Lembar SPDD',
                'catatan' => NULL
            ],
            [
                'id_kategori' => 7,
                'nama_subkategori' => 'Rincian Pembayaran',
                'catatan' => NULL
            ],
            [
                'id_kategori' => 7,
                'nama_subkategori' => 'Kuitansi',
                'catatan' => NULL
            ],
            [
                'id_kategori' => 7,
                'nama_subkategori' => 'SPBy',
                'catatan' => NULL
            ],
            [
                'id_kategori' => 7,
                'nama_subkategori' => 'Nota (At Cost) (Apabila ada komponen Biaya Perjalanan)',
                'catatan' => NULL
            ],
            [
                'id_kategori' => 7,
                'nama_subkategori' => 'LPJ',
                'catatan' => NULL
            ]
        ]);
    }
}
