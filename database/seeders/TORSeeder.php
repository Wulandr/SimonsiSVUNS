<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class TORSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tor')->insert([
            [
                'id' => '1',
                'id_unit' => '3',
                'id_tw' => '6',
                'id_subK' => '1',
                'nama_kegiatan' => 'Keikutsertaan Prodi dalam Asosiasi Perguruan Tinggi Vokasi K3',
                'jenis_ajuan' => 'baru',
                'latar_belakang' => 'Permasalahan di bidang K3 terus berkembang, program studi perlu menjalin
                komunikasi dan networking yang baik dengan Program Studi K3 lainnya dalam Asosiasi untuk penyelesaian
                masalah-masalah K3.',
                'rasionalisasi' => 'Jika kegiatan ini terlaksana, maka dapat mendukung IKU 3 dan meningkatkan
                presentase dosen yang aktif di asosiasi profesi',
                'tujuan' => '1) program studi aktif ikut serta dalam asosiasi profesi, 2) Meningkatkan presentase dosen prodi
                yang aktif sebagai anggota asosiasi',
                'mekanisme' => 'rapat anggota, sesuai rumusan AD ART, pembayaran iuaran',
                'keberlanjutan' => 'Dengan dibayarkannya iuaran keanggotaan, maka program studi otomatis dapat terlibat
                aktif dalam asosiasi.',
                'realisasi_IKU' => '41',
                'target_IKU' => '71',
                'realisasi_IK' => '0',
                'target_IK' => '0',
                'nama_pic' => 'Lusi Ismayenti, S.T.,M.Kes',
                'email_pic' => '-',
                'kontak_pic' => '-',
                'tgl_mulai_pelaksanaan' => '2022-02-03',
                'tgl_akhir_pelaksanaan' => '2022-02-03',
                'jumlah_anggaran' => '8000000',
                'create_by' => 1,
                'update_by' => 1,
            ],
            [
                'id' => '2',
                'id_unit' => '16',
                'id_tw' => '6',
                'id_subK' => '5',
                'nama_kegiatan' => 'Pelatihan dan Ujian Sertifikasi Kompetensi "Credit Officer"',
                'jenis_ajuan' => 'Baru',
                'latar_belakang' => 'Untuk mendukung upaya peningkatan kualitas lulusan pendidikan,
                diperlukan adanya dosen yang memberikan pengetahuan kepada mahasiswa mengenai kasus-kasus
                riil yang berkembang di dunia bisnis dan perbankan.',
                'rasionalisasi' => 'Sertifikasi kompetensi memberikan pengetahuan yang lebih kepada dosen untuk
                mempelajari isu yang berkembang dalam dunia bisnis dan perbankan',
                'tujuan' => '1. Meningkatkan kompetensi dosen, 2) Dosen lebih mampu untuk memberikan pengajaran dalam bentuk
                Case Based Learning dan Project Based Method',
                'mekanisme' => '1. Melakukan kegiatan pelatihan kompetensi Credit Officer pada tanggal 9 dan 10 Maret 2022,
                2. Melakukan Kegiatan Uji sertifiaksi kompetensi Credit Officer pada tanggal 12 Maret 2022',
                'keberlanjutan' => 'Kegiatan ini dilaksanakan setiap periode secara berkelanjutan dengan menggunakan
                dana yang bersumber dari pagu program studi',
                'realisasi_IKU' => '80',
                'target_IKU' => '100',
                'realisasi_IK' => '4',
                'target_IK' => '6',
                'nama_pic' => 'Rosita Mei Damayanti, S.E.,M.Rech',
                'email_pic' => '-',
                'kontak_pic' => '-',
                'tgl_mulai_pelaksanaan' => '2022-05-03',
                'tgl_akhir_pelaksanaan' => '2022-05-08',
                'jumlah_anggaran' => '14700000',
                'create_by' => 1,
                'update_by' => 1,
            ],
            [
                'id' => '3',
                'id_unit' => '17',
                'id_tw' => '6',
                'id_subK' => '5',
                'nama_kegiatan' => 'Monev KMM dan MBKM',
                'jenis_ajuan' => 'Baru',
                'latar_belakang' => '<p>Program Studi Diploma III Akuntansi berkomitmen untuk dapat menyesuaikan kebijakan yang telah ditetapkan oleh Sekolah Vokasi UNS salah satunya terkait upaya untuk menghasilkan lulusan yang adaptif dan berdaya saing melalui kurikulum yang berorientasi pada kebutuhan pasar atau industri. Oleh karena itu,Program Studi Diploma III Akuntansi menerapkan model pembelajaran 3:2:1. Saat ini seluruh mahasiswa semester IV dan semester VI sedang menempuh pembelajaran di luar kelas melalui kegiatan Magang MBKM dan Kegiatan Magang Mahasiswa (KMM) baik di entitas sektor publik maupun entitas sektor privat yang ada di berbagai daerah. Untuk memastikan terlaksananya kegiatan pembelajaran di luar kelas tersebut dapat sesuai dengan tujuan dan standar yang ditetapkan maka Prodi Diploma III Akuntansi memandang perlu dilakukannya kegiatan monitoring dan evaluasi dengan melibatkan dosen pembimbing yang ditugaskan oleh prodi.</p>',
                'rasionalisasi' => '<p>Penerapan model pembelajaran 3:2:1 menjadi salah satu upaya prodi untuk dapat mengoptimalkan pelaksanaan pembelajaran di luar kelas yang diharapkan dapat memberikan bekal bagi&nbsp; mahasiswa dalam pembelajaran praktik terapan langsung pada dunia usaha dan industri. Dengan demikian, mahasiswa memiliki pengalaman , kompetensi, kesiapann dalam memasuki dunia kerja. Namun demikia, pembelajaran di luar kelas yang diselenggarakan melalui kegiatan magang mahasiswa untuk semester VI dan kegiatan magang MBKM untuk semester IV haruslah memenuhi standar yang telah ditetapkan agar tujuan yan ditetapkan dapat tercapai. Oleh karena itu, monitoring dan evaluasi yang melibatkan peran serta dosen pembimbing atas kegiatan tersebut perlu dilakukan agar kegiatan praktik magang terlaksana secara kondusif, efektif, efisien dan berkualitas.</p>',
                'tujuan' => '<p>1. Memantau dan mengevaluasi pelaksanaan kegiatan magang mahasiswa dan magang MBKM</p>

                <p>2. Menjamin terlaksanakn kegiatan magang mahasiswa dan magang MBKM yang berkualitas</p>
                
                <p>3. Mengidentifikasi kendala dan mencari penyelesaian atas persoalan&nbsp; yang mungkin dihadapi terakit pelaksanaan kegiatan magang mahasiswa dan magang MBKM.</p>
                
                <p>4. Melakukan penyesuaian rencana kegiatan mendatang berdasarkan hasil evaluasi dan identifikasi yang dilakukan sebelumnya.</p>',
                'mekanisme' => '<p>1. Melakukan pendataaan mitra industri magang dan mahasiswa yang melaksanakan KMM dan Magang MBKM</p>

                <p>2. Menetapkan daftar ploting dosen pembimibing dan Membuat SK Dosen Pembimibing</p>
                
                <p>3 Memberikan dan menjadwalkan penugasan monev pada dosen pembimibing</p>
                
                <p>4. Membuatkan Surat Tugas Monitoring dan Evaluasi</p>
                
                <p>5. Dosen pembimibing melaksanakan tugas monitoring dan evaluasi ke tempat magang mahasiswa yan gberlokasi di wilayah Soloraya, Jawa Tengah, Jawa TImur, dan Yogjakarta.</p>',
                'keberlanjutan' => '<p>Kegiatan ini merupakan upaya untuk mematikan kegiatan pembelajaran di luar kelas melalui KMM dan Magang MBKM dapat berjalan secara efektfi dan efisien dehingga dapat dihasilkan lulusan yang berkualitas, adaptif, dan berdaya saing.&nbsp;</p>',
                'realisasi_IKU' => null,
                'target_IKU' => null,
                'realisasi_IK' => null,
                'target_IK' => null,
                'nama_pic' => 'Lina Nur Ardila, SE., M.AK.',
                'email_pic' => '-',
                'kontak_pic' => '-',
                'tgl_mulai_pelaksanaan' => '2022-05-03',
                'tgl_akhir_pelaksanaan' => '2022-05-08',
                'jumlah_anggaran' => ' 22780000',
                'create_by' => 1,
                'update_by' => 1,
            ],
            [
                'id' => '8',
                'id_unit' => '21',
                'id_tw' => '6',
                'id_subK' => '1',
                'nama_kegiatan' => 'Kunjungan Industri',
                'jenis_ajuan' => 'Baru',
                'latar_belakang' => 'Pelaksanaan program MBKM Prodi D-3 Bahasa Mandari dilaksanakan dalam bentuk program kuliah industri di perusahaan yang menggunakan bahasa mandarin secara aktif. Kondisi pandemi yang masih belum stabil membuat pengelola Prodi D-3 Bahasa Mandarin masih mengutamakan kerja sama dengan perusahaan-perusahaan yang ada di Jawa Tengah. Perusahaan yang akan dikunjungi yaitu PT Hisheng Luggage Accessory Semarang dan PT. Wanho Industries Indonesia Batang pada minggu kelima bulan Maret 2022. Kunjungan industri sebgai langkah awal untuk mengawai kerja sama dengan perusahaan, mengkomunikasikan kegiatan kuliah industri sehingga perusahaan mendapat gambaran yang jelas mengenai pelaksanaan MBKM - Kuliah Industri. Melalui kegiatan kunjungan industri diharapkan perusahaan dan prodi D-3 Bahasa Mandarin dapat menandatangani kerja sama MoU yang dapat mendukung ketercapaian IKU 6 dan IK 23. Selain itu, melalui kunjungan industri Prodi secara tidak langsung sedang melakukan penjajakan awal mengenai kesiapan perusahaan untuk menerima mahasiswa Prodi D3 Bahasa Mandarin melaksanakan kuliah industri di perusahan tersebut.',
                'rasionalisasi' => '<p>Melalui kunjungan industri, perusahaan dapat mengetahui keberadaan Prodi D-3- Bahasa Mandarin dan bersedia bekerja sama dalam pelaksanaan kuliah industri. Kerja sama dengan dua perusahaan tersebut akan menambah jumlah kerja sama serta pengembangan jejaring kerja sama berbasis industri oleh Prodi D-3-Bahasa Mandarin dengan dunia kerja dalam hal ini PT Hisheng Luggage Accessory Semarang dan PT Wanho Industries Indonesia Batang sesuai dengan kegiatan KK 22 dalam mewujudkan ketercapaian IKU 6.</p>',
                'tujuan' => '<p>1. Menambah jejaring kerja sama Prodi dengan dunia kerja</p>

                <p>2. Menyediakan tempat kuliah industri bagi mahasiswa</p>',
                'mekanisme' => '<p>1. Menyiapkan proposal penawaran kerja sama</p>

                <p>2. Mengumpulkan data dan menghubungi perusahaan</p>
                
                <p>3. Melakukan kunjungan industri</p>',
                'keberlanjutan' => '<p>Kegiatan ini merupakan langkah awal dari peningkatan presentase pelaksanaan kerja sama dnegan mitra dan Program Studi Diploma Tiga (D3) Bahasa Mandarin Sekolah Vokasi UNS. Kegiatan berikutnya setelah ini dilakukan penandatangan Mou dan PKS antara pihak mitra dan pihak kampus.</p>',
                'realisasi_IKU' => '80',
                'target_IKU' => '100',
                'realisasi_IK' => '2',
                'target_IK' => '5',
                'nama_pic' => 'Juairiah Nastiti S, S.Pd., M.TCSOL',
                'email_pic' => '-',
                'kontak_pic' => '-',
                'tgl_mulai_pelaksanaan' => '2022-04-01',
                'tgl_akhir_pelaksanaan' => '2022-04-03',
                'jumlah_anggaran' => '4261000',
                'create_by' => 1,
                'update_by' => 1,
            ],
            [
                'id' => '9',
                'id_unit' => '8',
                'id_tw' => '6',
                'id_subK' => '5',
                'nama_kegiatan' => 'Pemantauan Kegiatan Merdeka Belajar Oleh Dosen Pembimbing',
                'jenis_ajuan' => 'Baru',
                'latar_belakang' => '<p>Prodi D-3 Teknik Sipil merupakan prodi yang menyelenggarakan kegiatan merdeka belajar -kampus merdeka (MBKM) diperusahaan yang bergerak dibidang konstruksi. Pada tahun 2022, prodi mengawali program MBKM yang dilakukan mahasiswa tentu ada pembimbing yaitu dosen yang ditugasi oleh kaprodi yang akan bertanggungjawab pada kegiatan MBKM di perusahaan yang menjadi rekanan. Perusahaan yang menjadi rekanan adalah CV.Sokogi Reksa Cipta, PT. Verna Matra Arsitektura, CV.Widwipa Karya, PT.Nusa Indah, sehingga dosen melakukan kunjungan ke perusahaan temmpat mahasiswa melaksankan kegiatan MBKM yang akan menjadikan prodi D3 Teknik Sipil menambah pengetahuan dunia konstruksi.</p>',
                'rasionalisasi' => '<p>Program MBKM mewajibkanmahasiswa untuk belajar diluar kampus, untuk itu dosen pembimibing yang telah ditunjuk oleh prodi melakukan monitoring kegiatan mahasiswa selama melaksankan kegiatan MBKM diperusahaan konsultan dan kontraktor yang menjadi reknanan. Sehingga dosen mengetahui perkembangan proyek konstruksi yang akan menambah kompetensi dan juga menjalin kerjasama.</p>',
                'tujuan' => '<p>1. Mengetahui mata kuliah yang sudah diplot ke perusahaan sudah sesuai dan meliha aktivitas mahasiswa saat kegiatan MBKM.</p>

                <p>2. Peningkatan pengetahuan dosen dalam dunia konstruksi dengan mitra prodi</p>',
                'mekanisme' => '<ol>
                <li>Menentukan perusahaan untuk MBKM</li>
                <li>Memilih mahasiswa yang melaksanakan MBKM</li>
                <li>Membagi dosen sebagai dosen pembimbing sesuai keahlian
                <ol>
                    <li>Pelaksanaan monitoring pada bulan mei sampai juni 2022 dengan jadwal sebagai berikut :
                    <table border="1" cellpadding="1" cellspacing="1" style="width:100%">
                        <thead>
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Tanggal</th>
                                <th scope="col">Mitra</th>
                                <th scope="col">Lokasi</th>
                                <th scope="col">Nama</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>1.</td>
                                <td>Jumat,13 Mei 2022</td>
                                <td>CV. Sokogi Reksa Cipta</td>
                                <td>&nbsp;</td>
                                <td>Oktavia Kurnianingsih, S.T.,M.T.</td>
                            </tr>
                            <tr>
                                <td>&nbsp;</td>
                                <td>&nbsp;</td>
                                <td>&nbsp;</td>
                                <td>&nbsp;</td>
                                <td>Ardia Tara Rahmi, S.T.,M.T.</td>
                            </tr>
                            <tr>
                                <td>2.</td>
                                <td>Senin, 16 Mei 2022</td>
                                <td>CV. Widbipa Karya</td>
                                <td>&nbsp;</td>
                                <td>Ardia Tara Rahmi, S.T.,M.T.</td>
                            </tr>
                            <tr>
                                <td>&nbsp;</td>
                                <td>&nbsp;</td>
                                <td>&nbsp;</td>
                                <td>&nbsp;</td>
                                <td>Oktavia Kurnianingsih, S.T.,M.T.</td>
                            </tr>
                            <tr>
                                <td>3.</td>
                                <td>Senin, 16 Mei 2022</td>
                                <td>PT. Vema Matra Arsitektura</td>
                                <td>&nbsp;</td>
                                <td>Kholis Hapsari Pratiwi, S.T.,M.T.Msc</td>
                            </tr>
                            <tr>
                                <td>&nbsp;</td>
                                <td>&nbsp;</td>
                                <td>&nbsp;</td>
                                <td>&nbsp;</td>
                                <td>Fendi Hari Yanto, S.T.,M.T.</td>
                            </tr>
                            <tr>
                                <td>&nbsp;</td>
                                <td>&nbsp;</td>
                                <td>&nbsp;</td>
                                <td>&nbsp;</td>
                                <td>Budi Yulianto, S.T.,M.Sc,Ph.D.,MCIHT</td>
                            </tr>
                            <tr>
                                <td>4.</td>
                                <td>Jumat, 20 Mei 2022</td>
                                <td>PT. Nusa Indah Kontraktor Utama</td>
                                <td>&nbsp;</td>
                                <td><em>ContohContohContohContohContoh</em></td>
                            </tr>
                            <tr>
                                <td>&nbsp;</td>
                                <td>&nbsp;</td>
                                <td>&nbsp;</td>
                                <td>&nbsp;</td>
                                <td><em>ContohContohContohContohContoh</em></td>
                            </tr>
                            <tr>
                                <td>&nbsp;</td>
                                <td>&nbsp;</td>
                                <td>&nbsp;</td>
                                <td>&nbsp;</td>
                                <td><em>ContohContohContohContohContoh</em></td>
                            </tr>
                            <tr>
                                <td>5.</td>
                                <td>Jumat, 03 Juni 2022</td>
                                <td>CV. Sokogi Reksa Cipta</td>
                                <td>&nbsp;</td>
                                <td><em>ContohContohContohContohContoh</em></td>
                            </tr>
                            <tr>
                                <td>&nbsp;</td>
                                <td>&nbsp;</td>
                                <td>&nbsp;</td>
                                <td>&nbsp;</td>
                                <td><em>ContohContohContohContohContoh</em></td>
                            </tr>
                            <tr>
                                <td>6.</td>
                                <td>Senin, 06 Juni 2022</td>
                                <td>CV. Widbipa Karya</td>
                                <td>&nbsp;</td>
                                <td><em>ContohContohContohContohContoh</em></td>
                            </tr>
                            <tr>
                                <td>&nbsp;</td>
                                <td>&nbsp;</td>
                                <td>&nbsp;</td>
                                <td>&nbsp;</td>
                                <td><em>ContohContohContohContohContoh</em></td>
                            </tr>
                            <tr>
                                <td>&nbsp;</td>
                                <td>&nbsp;</td>
                                <td>&nbsp;</td>
                                <td>&nbsp;</td>
                                <td><em>ContohContohContohContohContoh</em></td>
                            </tr>
                            <tr>
                                <td>&nbsp;</td>
                                <td>&nbsp;</td>
                                <td>&nbsp;</td>
                                <td>&nbsp;</td>
                                <td><em>ContohContohContohContohContoh</em></td>
                            </tr>
                            <tr>
                                <td>&nbsp;</td>
                                <td>&nbsp;</td>
                                <td>&nbsp;</td>
                                <td>&nbsp;</td>
                                <td><em>ContohContohContohContohContoh</em></td>
                            </tr>
                            <tr>
                                <td>&nbsp;</td>
                                <td>&nbsp;</td>
                                <td>&nbsp;</td>
                                <td>&nbsp;</td>
                                <td><em>ContohContohContohContohContoh</em></td>
                            </tr>
                            <tr>
                                <td>&nbsp;</td>
                                <td>&nbsp;</td>
                                <td>&nbsp;</td>
                                <td>&nbsp;</td>
                                <td><em>ContohContohContohContohContoh</em></td>
                            </tr>
                            <tr>
                                <td>&nbsp;</td>
                                <td>&nbsp;</td>
                                <td>&nbsp;</td>
                                <td>&nbsp;</td>
                                <td><em>ContohContohContohContohContoh</em></td>
                            </tr>
                            <tr>
                                <td>&nbsp;</td>
                                <td>&nbsp;</td>
                                <td>&nbsp;</td>
                                <td>&nbsp;</td>
                                <td><em>ContohContohContohContohContoh</em></td>
                            </tr>
                            <tr>
                                <td>&nbsp;</td>
                                <td>&nbsp;</td>
                                <td>&nbsp;</td>
                                <td>&nbsp;</td>
                                <td>&nbsp;</td>
                            </tr>
                            <tr>
                                <td>&nbsp;</td>
                                <td>&nbsp;</td>
                                <td>&nbsp;</td>
                                <td>&nbsp;</td>
                                <td>&nbsp;</td>
                            </tr>
                            <tr>
                                <td>&nbsp;</td>
                                <td>&nbsp;</td>
                                <td>&nbsp;</td>
                                <td>&nbsp;</td>
                                <td>&nbsp;</td>
                            </tr>
                            <tr>
                                <td>&nbsp;</td>
                                <td>&nbsp;</td>
                                <td>&nbsp;</td>
                                <td>&nbsp;</td>
                                <td>&nbsp;</td>
                            </tr>
                            <tr>
                                <td>&nbsp;</td>
                                <td>&nbsp;</td>
                                <td>&nbsp;</td>
                                <td>&nbsp;</td>
                                <td>&nbsp;</td>
                            </tr>
                            <tr>
                                <td>&nbsp;</td>
                                <td>&nbsp;</td>
                                <td>&nbsp;</td>
                                <td>&nbsp;</td>
                                <td>&nbsp;</td>
                            </tr>
                            <tr>
                                <td>&nbsp;</td>
                                <td>&nbsp;</td>
                                <td>&nbsp;</td>
                                <td>&nbsp;</td>
                                <td>&nbsp;</td>
                            </tr>
                            <tr>
                                <td>&nbsp;</td>
                                <td>&nbsp;</td>
                                <td>&nbsp;</td>
                                <td>&nbsp;</td>
                                <td>&nbsp;</td>
                            </tr>
                        </tbody>
                    </table>
            
                    <p>&nbsp;</p>
                    </li>
                </ol>
                </li>
            </ol>',
                'keberlanjutan' => '<p>Program MBKM ini merupakan aktivitas yang akan terus dilaksanakan pada semester 4 dan 5. Dari MBKM ini diharapkan prodi bisa menjalin kerjasama dengan konsultasn dan konstraktor dan bisa memenuhi kebutuhan sebagai bekal di proyek oleh mahasiswa.</p>',
                'realisasi_IKU' => '0',
                'target_IKU' => '50',
                'realisasi_IK' => '0',
                'target_IK' => '50',
                'nama_pic' => 'Oktavia Kurnianingsih,S.T.,M.T',
                'email_pic' => '-',
                'kontak_pic' => '-',
                'tgl_mulai_pelaksanaan' => '2022-04-08',
                'tgl_akhir_pelaksanaan' => '2022-04-09',
                'jumlah_anggaran' => '3900000',
                'create_by' => 4,
                'update_by' => 4,
            ],

        ]);
    }
}
