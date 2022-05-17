<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class IKSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('indikator_IK')->insert([
            [
                'IK' => 'IK01',
                'id_IKU' => '1', 'deskripsi' => 'Persentase mahasiswa penerima KIP-Kuliah dan mahasiswa yang membayar UKT ≤ Rp. 1.000.000',
            ],
            [
                'IK' => 'IK02',
                'id_IKU' => '1', 'deskripsi' => 'Jumlah lulusan yang studi lanjut',
            ],
            [
                'IK' => 'IK03',
                'id_IKU' => '1', 'deskripsi' => 'Jumlah mahasiswa dan/atau lulusan yang berhasil menjadi wirausaha',
            ],
            [
                'IK' => 'IK04',
                'id_IKU' => '1', 'deskripsi' => 'Jumlah mahasiswa yang mengikuti kegiatan Merdeka Belajar',
            ],
            [
                'IK' => 'IK05',
                'id_IKU' => '1', 'deskripsi' => 'Jumlah mahasiswa yang berprestasi di tingkat nasional dan internasional',
            ],
            [
                'IK' => 'IK06',
                'id_IKU' => '1', 'deskripsi' => 'Jumlah medali yang diperoleh dari kejuaraan di tingkat nasional dan internasional',
            ],
            [
                'IK' => 'IK07',
                'id_IKU' => '1', 'deskripsi' => 'Persentase lulusan yang langsung bekerja dalam jangka waktu 1 tahun setelah kelulusan',
            ],
            [
                'IK' => 'IK08',
                'id_IKU' => '1', 'deskripsi' => 'Persentase prodi unggul (Ter Akreditasi A)',
            ],
            [
                'IK' => 'IK09',
                'id_IKU' => '1', 'deskripsi' => 'Jumlah prodi terakreditasi internasional',
            ],
            [
                'IK' => 'IK10',
                'id_IKU' => '1', 'deskripsi' => 'Jumlah prodi yang menerapkan pembelajaran Kampus Merdeka',
            ],
            [
                'IK' => 'IK11',
                'id_IKU' => '1', 'deskripsi' => 'Peringkat di QS World University Ranking',
            ],
            [
                'IK' => 'IK12',
                'id_IKU' => '1', 'deskripsi' => 'Peringkat di QS World University Ranking by Subject',
            ],
            [
                'IK' => 'IK13',
                'id_IKU' => '1', 'deskripsi' => 'Jumlah publikasi internasional',
            ],
            [
                'IK' => 'IK14',
                'id_IKU' => '1', 'deskripsi' => 'Jumlah jurnal bereputasi terindeks nasional',
            ],
            [
                'IK' => 'IK16',
                'id_IKU' => '1', 'deskripsi' => 'Jumlah sitasi karya ilmiah',
            ],
            [
                'IK' => 'IK17',
                'id_IKU' => '1', 'deskripsi' => 'Jumlah Kekayaan Intelektual yang didaftarkan',
            ],
            [
                'IK' => 'IK18',
                'id_IKU' => '1', 'deskripsi' => 'Jumlah Kekayaan Intelektual yang digunakan oleh industri',
            ],
            [
                'IK' => 'IK19',
                'id_IKU' => '1', 'deskripsi' => 'Persentase dosen berkualifikasi Doktor',
            ],
            [
                'IK' => 'IK20',
                'id_IKU' => '1', 'deskripsi' => 'Persentase dosen dengan jabatan guru besar',
            ],
            [
                'IK' => 'IK21',
                'id_IKU' => '1', 'deskripsi' => 'Persentase dosen yang memiliki pengalaman bekerja di industri atau lembaga profesi minimal 1 tahun dan/atau bekerja di luar negeri minimal 1 tahun',
            ],

            [
                'IK' => 'IK23',
                'id_IKU' => '1', 'deskripsi' => 'Nilai kontrak kerja sama dengan industri',
            ],
            [
                'IK' => 'IK24',
                'id_IKU' => '1', 'deskripsi' => 'Penghasilan yang diperoleh dari unit usaha',
            ],
            [
                'IK' => 'IK25',
                'id_IKU' => '1', 'deskripsi' => 'Dana abadi yang dikumpulkan',
            ],
            [
                'IK' => 'IK27',
                'id_IKU' => '1', 'deskripsi' => 'Persentase dosen yang memberikan kuliah dengan menggunakan pemecahan kasus (case method) dan/atau pembelajaran kelompok berbasis projek (team-based project)',
            ],
            [
                'IK' => 'IK29',
                'id_IKU' => '1', 'deskripsi' => 'Global ranking berbasis Teknologi Informasi dan Komunikasi',
            ],
        ]);
    }
}
