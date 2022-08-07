<!doctype html>
<html lang="en">

<head>

    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>SIMONSI</title>
    <!-- Favicon -->
    <link href="{{ asset('assets/img/logo.png') }}" rel="icon">
    <link href="{{ asset('assets/img/apple-touch-icon.png') }}" rel="apple-touch-icon">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ asset('findash/assets/css/bootstrap.min.css') }}">
    <!-- Typography CSS -->
    <link rel="stylesheet" href="{{ asset('findash/assets/css/typography.css') }}">
    <!-- Style CSS -->
    <link rel="stylesheet" href="{{ asset('findash/assets/css/style.css') }}">
    <!-- Responsive CSS -->
    <link rel="stylesheet" href="{{ asset('findash/assets/css/responsive.css') }}">
    <!-- Full calendar -->
    <link href='{{ asset('findash/assets/fullcalendar/core/main.css') }}' rel='stylesheet' />
    <link href='{{ asset('findash/assets/fullcalendar/daygrid/main.css') }}' rel='stylesheet' />
    <link href='{{ asset('findash/assets/fullcalendar/timegrid/main.css') }}' rel='stylesheet' />
    <link href='{{ asset('findash/assets/fullcalendar/list/main.css') }}' rel='stylesheet' />
    <link rel="stylesheet" href="{{ asset('findash/assets/css/flatpickr.min.css') }}">
    <link rel="" href="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js">
    <script src="//cdn.ckeditor.com/4.14.1/standard/ckeditor.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.0.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <link rel="stylesheet" href="//cdn.datatables.net/1.10.24/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="//cdn.datatables.net/buttons/2.2.3/css/buttons.dataTables.min.css">
    <!-- page html to pdf -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.3.4/jspdf.min.js"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <style>
        table,
        th,
        td {
            border: 1px solid black;
            border-collapse: collapse;
            word-wrap: break-word;
            justify-content: center;
        }

        th,
        td {
            padding: 5px;
        }
    </style>
</head>

<body>

    <?php for ($t = 0; $t < count($tor); $t++) {
        if ($tor[$t]->id == $id) {
    ?>
            <!-- SUB K -->
            <?php
            if (!empty($kategori_subK)) {
                for ($k = 0; $k < count($kategori_subK); $k++) {
                    if ($kategori_subK[$k]->id_tor == $tor[$t]->id) {
                        $sub_k =  $kategori_subK[$k]->subK;
                        $deskripsi_sub_k =  $kategori_subK[$k]->deskripsi;

                        $indikator_k =  $kategori_subK[$k]->K;
                        $deskripsi_indikator_k =  $kategori_subK[$k]->deskripsi_k;

                        $iku = $kategori_subK[$k]->IKU;
                        $deskripsi_iku = $kategori_subK[$k]->deskripsi_iku;
                        $ik = $kategori_subK[$k]->IK;
                        $deskripsi_ik = $kategori_subK[$k]->deskripsi_ik;
                    }
                }
            }

            ?>
            <!-- PRODI -->
            <?php for ($u = 0; $u < count($unit); $u++) { ?>
                <?php if ($tor[$t]->id_unit == $unit[$u]->id) {
                    $prodi = $unit[$u]->nama_unit;
                } ?>
            <?php } ?>

            <body class="container center">

                <div class="table-responsive">
                    <table id="datatable" class="table table-striped table-bordered" style="border-collapse:collapse;">

                        <tr>
                            <td style="border:1px solid #000; text-align: center; margin-right: 3cm;" colspan="8" width="100%"><b>
                                    KERANGKA ACUAN KERJA (KAK) / TERM OF REFERENCE (ToR) <br />
                                    PROGRAM STUDI {{strtoupper($prodi)}}<br />SEKOLAH VOKASI UNIVERSITAS SEBELAS</b></td>
                        </tr>
                        <tr>
                            <td width="5%">1.</td>
                            <td>Indikator Kinerja Utama</td>
                            <td width="5%">:</td>
                            <td>{{$iku}}</td>
                            <td colspan="4">{{$deskripsi_iku}}</td>
                        </tr>
                        <tr>
                            <td>2.</td>
                            <td>Indikator Kegiatan (IK)</td>
                            <td>:</td>
                            <td>{{$ik}}</td>
                            <td colspan="4">{{$deskripsi_ik}}</td>
                        </tr>
                        <tr>
                            <td>3.</td>
                            <td>Kegiatan</td>
                            <td>:</td>
                            <td>{{$indikator_k}}</td>
                            <td colspan="4">{{$deskripsi_indikator_k}}</td>
                        </tr>
                        <tr>
                            <td>4.</td>
                            <td>Sub Kegiatan</td>
                            <td>:</td>
                            <td>{{$sub_k}}</td>
                            <td colspan="4">{{$deskripsi_sub_k}}</td>
                        </tr>
                        <tr>
                            <td>5.</td>
                            <td>Judul Kegiatan</td>
                            <td>:</td>
                            <td colspan="5">{{$tor[$t]->nama_kegiatan}}</td>
                        </tr>

                        <!-- Latar Belakang -->
                        <tr>
                            <td>6.</td>
                            <td colspan="7">Latar Belakang</td>
                        </tr>
                        <tr>
                            <td></td>
                            <td colspan="7" style="text-align: justify;">{!!$tor[$t]->latar_belakang!!}</td>
                        </tr>

                        <!-- Rasionalisasi -->
                        <tr>
                            <td>7.</td>
                            <td colspan="7">Rasionalisasi</td>
                        </tr>
                        <tr>
                            <td></td>
                            <td colspan="7" style="text-align: justify;">{!!$tor[$t]->rasionalisasi!!}</td>
                        </tr>

                        <!-- Tujuan -->
                        <tr>
                            <td>8.</td>
                            <td colspan="7">Tujuan</td>
                        </tr>
                        <tr>
                            <td></td>
                            <td colspan="7" style="text-align: justify;">{!!$tor[$t]->tujuan!!}</td>
                        </tr>

                        <!-- Mekanisme dan Rancangan -->
                        <tr>
                            <td>9.</td>
                            <td colspan="7">Mekanisme dan Rancangan</td>
                        </tr>
                        <tr>
                            <td></td>
                            <td colspan="7" style="text-align: justify;">{!!$tor[$t]->mekanisme!!}</td>
                        </tr>

                        <!-- Jadwal Pelaksanaan -->
                        <tr>
                            <td>10.</td>
                            <td colspan="7">Jadwal Pelaksanaan</td>
                        </tr>
                        <tr>
                            <td></td>
                            <td colspan="7">
                                <?php
                                if (!empty($komponen_jadwal)) {
                                ?>
                                    <table class="table table-bordered" style="text-align: center;border:1px solid #000; ">
                                        <thead>
                                            <tr>
                                                <th scope="col" rowspan="2" class="align-middle">Komponen Input
                                                </th>
                                                <th scope="col" colspan="12" style="text-align: center;">{{substr($tor[$t]->tgl_mulai_pelaksanaan,0,4)}}</th>
                                            </tr>
                                            <tr>
                                                <td style="border:1px solid #000;">1</td>
                                                <td>2</td>
                                                <td>3</td>
                                                <td>4</td>
                                                <td>5</td>
                                                <td>6</td>
                                                <td>7</td>
                                                <td>8</td>
                                                <td>9</td>
                                                <td>10</td>
                                                <td>11</td>
                                                <td>12</td>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            for ($j = 0; $j < count($komponen_jadwal); $j++) {
                                                if ($komponen_jadwal[$j]->id_tor == $tor[$t]->id) { ?>
                                                    <tr>
                                                        <td>{{$komponen_jadwal[$j]->komponen}}</td>
                                                        <?php for ($b = 1; $b < $komponen_jadwal[$j]->bulan_awal; $b++) { ?>
                                                            <td width="20px"></td>
                                                        <?php } ?>
                                                        <?php for ($kj = 0; $kj <= ($komponen_jadwal[$j]->bulan_akhir - $komponen_jadwal[$j]->bulan_awal); $kj++) { ?>
                                                            <td width="20px" style="background-color:black!important; -webkit-print-color-adjust: exact; "></td>
                                                        <?php }
                                                        for ($c = 12; $c > $komponen_jadwal[$j]->bulan_akhir; $c--) { ?>
                                                            <td width="20px"></td>
                                                        <?php } ?>

                                                    </tr>
                                            <?php }
                                            }
                                            ?>
                                        </tbody>
                                    </table>
                                <?php } ?>
                            </td>
                        </tr>

                        <!-- Indikator Kinerja Utama (IKU) -->
                        <tr>
                            <td>11.</td>
                            <td colspan="7">Indikator Kinerja Utama (IKU)</td>
                        </tr>
                        <tr>
                            <td></td>
                            <td colspan="7">
                                <table class="table table-bordered" style="text-align: center;border:1px solid #000; ">
                                    <thead>
                                        <tr>
                                            <th scope="col">Indikator</th>
                                            <th scope="col">Realisasi <br /> {{substr($tor[$t]->tgl_mulai_pelaksanaan,0,4)-1}}</th>
                                            <th scope="col">Target <br /> {{substr($tor[$t]->tgl_mulai_pelaksanaan,0,4)}}</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>{{$iku ." ".$deskripsi_ik}}</td>
                                            <td>{{$tor[$t]->realisasi_IK ."%"}}</td>
                                            <td>{{$tor[$t]->target_IK ."%"}}</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </td>
                        </tr>

                        <!-- Indikator Kinerja Kegiatan (IK) -->
                        <tr>
                            <td>12.</td>
                            <td colspan="7">Indikator Kinerja Kegiatan (IK)</td>
                        </tr>
                        <tr>
                            <td></td>
                            <td colspan="7">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th scope="col">Indikator</th>
                                            <th scope="col">Realisasi <br /> {{substr($tor[$t]->tgl_mulai_pelaksanaan,0,4)-1}}</th>
                                            <th scope="col">Target <br /> {{substr($tor[$t]->tgl_mulai_pelaksanaan,0,4)}}</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>{{$iku ." ".$deskripsi_ik}}</td>
                                            <td>{{$tor[$t]->realisasi_IK ."%"}}</td>
                                            <td>{{$tor[$t]->target_IK ."%"}}</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </td>
                        </tr>

                        <!-- Keberlanjutan -->
                        <tr>
                            <td>14.</td>
                            <td colspan="7">Keberlanjutan</td>
                        </tr>
                        <tr>
                            <td></td>
                            <td colspan="7" style="text-align: justify;">{!!$tor[$t]->keberlanjutan!!}</td>
                        </tr>

                        <!-- Penanggungjawab -->
                        <tr>
                            <td>15.</td>
                            <td colspan="7">Penanggungjawab</td>
                        </tr>
                        <tr>
                            <td></td>
                            <?php
                            $usernip = '';
                            foreach ($users as $usnip) {
                                if ($usnip->name == $tor[$t]->nama_pic) {
                                    $usernip = $usnip->nip;
                                }
                            }
                            ?>
                            <td colspan="7">Penanggung jawab dari kegiatan ini adalah {{$tor[$t]->nama_pic ." NIP. ".$usernip}}</td>
                        </tr>
                        <tr>
                            <td colspan="8" height="30px"></td>
                        </tr>

                        <!-- TANDA TANGAN -->
                        <tr>
                            <td colspan="4" style="text-align: center;" width="50%">Kepala Program Studi
                                <br />
                                <br />
                                <br />
                                <br />
                                <?php
                                foreach ($users as $us) {
                                    foreach ($unit as $un) {
                                        if ($un->id == $us->id_unit) {
                                            foreach ($roles as $ro) {
                                                if ($ro->id == $us->role) {
                                                    if ($ro->name == "Kaprodi" && $un->nama_unit == $prodi) {
                                                        echo "<b>" . $us->name . "</b><br />";
                                                        echo "NIP. " . $us->nip;
                                                    }
                                                }
                                            }
                                        }
                                    }
                                }
                                ?>
                            </td>
                            <td colspan="4" style="text-align: center;" width="50%">Perencana/Penanggungjawab
                                <br />
                                <br />
                                <br />
                                <br />
                                <b>{{$tor[$t]->nama_pic}}</b><br />
                                {{"NIP. ". Auth::user()->nip }}
                            </td>
                        </tr>

                        <tr>
                            <td colspan="8" style="text-align: center;">Menyetujui</td>
                        </tr>

                        <tr>
                            <td colspan="3">Wakil Dekan Akademik, Riset, dan Kemahasiswaan
                                <br />
                                <br />
                                <br />
                                <br />
                                <b>Agus Dwi Priyanto, S.S., M.CALL</b><br />
                                NIP. 197408182000121001
                            </td>
                            <td colspan="2">Wakil Dekan Perencanaan, Kerjasama, Bisnis dan Informasi
                                <br />
                                <br />
                                <br />
                                <br />
                                <b>Dr. Eng. Herman Saputro, S.Pd., M.Pd., M.T.</b><br />
                                NIP. 198208112006041001
                            </td>
                            <td colspan="3">Wakil Dekan SDM, Keuangan, dan Logistik
                                <br />
                                <br />
                                <br />
                                <br />
                                <b> Abdul Aziz, S.Kom., M.Cs.</b><br />
                                NIP. 198104132005011001
                            </td>
                        </tr>
                        <!-- TANDA TANGAN -->

                    </table>
                </div>
                <br />
                <br />
                <br />
                <?php
                $totanggaran1 = 0;
                for ($r = 0; $r < count($rab); $r++) {
                    if ($rab[$r]->id_tor == $tor[$t]->id) { ?>
                        <div class="table-responsive">
                            <table id="datatable" class="table table-striped table-bordered" style="border-collapse:collapse;">

                                <tr>
                                    <td colspan="8" style="text-align: center;">RINCIAN ANGGARAN BELANJA</h5>
                                        <?php for ($u = 0; $u < count($unit2); $u++) {
                                            if ($tor[$t]->id_unit == $unit2[$u]->id) {
                                                $namaunit = $unit2[$u]->nama_unit;
                                            }
                                        } ?>
                                        <br />
                                        {{strtoupper($namaunit)}}
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="7"><b>Unit Kerja</b> : {{$namaunit}}</td>
                                    <td>Tahun</td>
                                </tr>
                                <tr>
                                    <td colspan="7"><b>Kegiatan</b> : {{$tor[$t]->nama_kegiatan}}</td>
                                    <td rowspan="2">{{substr($tor[$t]->tgl_mulai_pelaksanaan,0,4)}}</td>
                                </tr>
                                <tr>
                                    <td colspan="7"><b>Sub Kegiatan</b> : {{$tor[$t]->id_subK}}</td>
                                </tr>
                                <tr>
                                    <td colspan="7" style="text-align: center;"><b>Indikator</b></td>
                                    <td>Target Kinerja</td>
                                </tr>
                                <tr>
                                    <td colspan="7"><b>Input (Masukan)</b> : {{$rab[$r]->masukan }}</td>
                                    <td rowspan="2">{{$tor[$t]->target_IKU ."%"}}</td>
                                </tr>
                                <tr>
                                    <td colspan="7"><b>Output (Keluaran)</b> : {{$rab[$r]->keluaran}}</td>
                                </tr>
                                <tr>
                                    <td colspan="8" style="text-align: center;"><b>Anggaran Belanja</b></td>
                                </tr>
                                <tr>
                                    <td rowspan="3" class="align-middle">Jenis Belanja</td>
                                    <td colspan="6" style="text-align: center;">Rincian Biaya</td>
                                    <td rowspan="3" class="align-middle" style="text-align: center;">Jumlah Anggaran (Rp)</td>
                                </tr>
                                <tr>
                                    <td colspan="2" style="text-align: center;">Kebutuhan</td>
                                    <td rowspan="2" class="align-middle" style="text-align: center;">Frek</td>
                                    <td colspan="2" style="text-align: center;">Perhitungan</td>
                                    <td rowspan="2" class="align-middle" style="text-align: center;">Harga Satuan</td>
                                </tr>
                                <tr>
                                    <td>Vol.</td>
                                    <td>Sat.</td>
                                    <td>Vol.</td>
                                    <td>Sat.</td>
                                </tr>
                                <?php
                                $totalAnggaranRab = 0;
                                $urut = 1;
                                for ($i = 0; $i < count($anggaran); $i++) {
                                    if ($anggaran[$i]->anggaran != 0) {
                                        if ($anggaran[$i]->id_rab == $rab[$r]->id) {
                                            $totanggaran1 += $anggaran[$i]->anggaran;
                                            for ($j = 0; $j < count($detail_mak); $j++) {
                                                if ($anggaran[$i]->id_detail_mak == $detail_mak[$j]->id) {
                                                    // echo $anggaran[$i]->id_rab;
                                ?>
                                                    <?php
                                                    $kodeKelompok = '';
                                                    foreach ($belanja_mak as $belanja) {
                                                        if ($belanja->id == $detail_mak[$j]->id_belanja) {
                                                            foreach ($kelompok_mak as $kelompoks) {
                                                                if ($belanja->id_kelompok == $kelompoks->id) {
                                                                    $kodeKelompok = $kelompoks->kelompok;
                                                                }
                                                            }
                                                        }
                                                    }
                                                    ?>
                                                    <tr>
                                                        <td> <b>{{$kodeKelompok}} </b>
                                                            {{$detail_mak[$j]->detail. " ".  $anggaran[$i]->catatan}}
                                                        </td>
                                                        <td>{{$anggaran[$i]->kebutuhan_vol}}</td>
                                                        <td>{{$anggaran[$i]->kebutuhan_sat}}</td>
                                                        <td>{{$anggaran[$i]->frek}}</td>
                                                        <td>{{$anggaran[$i]->perhitungan_vol}}</td>
                                                        <td>{{$anggaran[$i]->perhitungan_sat}}</td>
                                                        <td>{{"Rp. ".number_format($anggaran[$i]->harga_satuan,2,',',',')}}</td>
                                                        <td>{{"Rp. ".number_format($anggaran[$i]->anggaran,2,',',',')}}</td>
                                                    </tr>

                                <?php
                                                    $totalAnggaranRab += $anggaran[$i]->anggaran;
                                                    $urut += 1;
                                                }
                                            }
                                        }
                                    }
                                } ?>

                                <tr>
                                    <td colspan="7">Total</td>
                                    <td>{{"Rp. ".number_format($totalAnggaranRab,2,',',',')}}</td>
                                </tr>

                                <!-- TANDA TANGAN -->
                                <tr>
                                    <td colspan="4" style="text-align: center;" width="50%">Kepala Program Studi
                                        <br />
                                        <br />
                                        <br />
                                        <br />
                                        <?php
                                        foreach ($users as $us) {
                                            foreach ($unit as $un) {
                                                if ($un->id == $us->id_unit) {
                                                    foreach ($roles as $ro) {
                                                        if ($ro->id == $us->role) {
                                                            if ($ro->name == "Kaprodi" && $un->nama_unit == $namaunit) {
                                                                echo "<b>" . $us->name . "</b><br />";
                                                                echo "NIP. " . $us->nip;
                                                            }
                                                        }
                                                    }
                                                }
                                            }
                                        }
                                        ?>
                                    </td>
                                    <td colspan="4" style="text-align: center;" width="50%">Perencana/Penanggungjawab
                                        <br />
                                        <br />
                                        <br />
                                        <br />
                                        <b>{{$tor[$t]->nama_pic}}</b><br />
                                        {{"NIP. ". Auth::user()->nip }}
                                    </td>
                                </tr>

                                <tr>
                                    <td colspan="8" style="text-align: center;">Menyetujui</td>
                                </tr>

                                <tr>
                                    <td colspan="3">Wakil Dekan Akademik, <br />Riset, dan Kemahasiswaan
                                        <br />
                                        <br />
                                        <br />
                                        <b>Agus Dwi Priyanto, S.S., M.CALL</b><br />
                                        NIP. 197408182000121001
                                    </td>
                                    <td colspan="3">Wakil Dekan Perencanaan, Kerjasama, Bisnis dan Informasi
                                        <br />
                                        <br />
                                        <br />
                                        <b>Dr. Eng. Herman Saputro, S.Pd., M.Pd., M.T.</b><br />
                                        NIP. 198208112006041001
                                    </td>
                                    <td colspan="2">Wakil Dekan SDM, Keuangan, dan Logistik
                                        <br />
                                        <br />
                                        <br />
                                        <br />
                                        <b> Abdul Aziz, S.Kom., M.Cs.</b><br />
                                        NIP. 198104132005011001
                                    </td>
                                </tr>
                                <!-- TANDA TANGAN -->

                            </table>
                        </div>
                <?php

                    }
                } ?>



        <?php }
    } ?>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

        @include('dashboards/users/layouts/footer')
            </body>

</html>