<?php

use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
?>
@include('dashboards/users/layouts/script')

<body>
    <div id="loading">
        <div id="loading-center">
        </div>
    </div>
    <div class="wrapper">
        @include('dashboards/users/layouts/navbar')
        @include('dashboards/users/layouts/sidebar')

        <?php
        $disetujui = 0; //apakah 3 sudah validasi? 
        ?>
        <!-- Page Content  -->
        <div id="content-page" class="content-page">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="iq-card">
                            <div class="iq-card-body p-0">
                                <div class="iq-edit-list">
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php $active = 2; ?>
                    <div class="col-sm-12">
                        <div class="iq-card">
                            <br />
                            <div class="container center" id="iniprint">
                                <?php
                                $iku = "";
                                $ik = "";
                                $indikator_k = "n";
                                $sub_k = "";
                                $warna_komentar = "alert-danger"; //warna komentar
                                $note = "";
                                ?>

                                <?php
                                for ($t = 0; $t < count($tor); $t++) {
                                    if ($tor[$t]->id == $id) { ?>
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
                                        <form method="post" action="/validasi/createValTor">
                                            @csrf
                                            <?php
                                            $komentar = [
                                                'sub' => [],
                                                'judul' => [],
                                                'latarbelakang' => [],
                                                'rasionalisasi' => [],
                                                'tujuan' => [],
                                                'mekanisme' => [],
                                                'jadwal' => [],
                                                'iku' => [],
                                                'ik' => [],
                                                'keberlanjutan' => [],
                                                'penanggung' => [],
                                                'komentar_rab' => [],

                                            ];
                                            $judul = [];
                                            for ($trx = 0; $trx < count($trx_status_tor); $trx++) {
                                                if ($trx_status_tor[$trx]->id_tor == $tor[$t]->id) {
                                                    for ($us = 0; $us < count($users); $us++) {
                                                        if ($trx_status_tor[$trx]->create_by == $users[$us]->id) {
                                                            if (!empty($trx_status_tor[$trx]->k_sub)) {
                                                                if ($trx_status_tor[$trx]->k_sub != '-') {
                                                                    $komentar['sub'][] = $trx_status_tor[$trx]->k_sub . "\n (" . $users[$us]->name . ")";
                                                                }
                                                            }
                                                            if (!empty($trx_status_tor[$trx]->k_judul)) {
                                                                if ($trx_status_tor[$trx]->k_judul != '-') {
                                                                    $komentar['judul'][] = $trx_status_tor[$trx]->k_judul . "\n (" . $users[$us]->name . ")";
                                                                }
                                                            }
                                                            if (!empty($trx_status_tor[$trx]->k_latar_belakang)) {
                                                                if ($trx_status_tor[$trx]->k_latar_belakang != '-') {
                                                                    $komentar['latarbelakang'][] = $trx_status_tor[$trx]->k_latar_belakang . "\n (" . $users[$us]->name . ")";
                                                                }
                                                            }
                                                            if (!empty($trx_status_tor[$trx]->k_rasionalisasi)) {
                                                                if ($trx_status_tor[$trx]->k_rasionalisasi != '-') {
                                                                    $komentar['rasionalisasi'][] = $trx_status_tor[$trx]->k_rasionalisasi . "\n (" . $users[$us]->name . ")";
                                                                }
                                                            }
                                                            if (!empty($trx_status_tor[$trx]->k_tujuan)) {
                                                                if ($trx_status_tor[$trx]->k_tujuan != '-') {
                                                                    $komentar['tujuan'][] = $trx_status_tor[$trx]->k_tujuan . "\n (" . $users[$us]->name . ")";
                                                                }
                                                            }
                                                            if (!empty($trx_status_tor[$trx]->k_mekanisme)) {
                                                                if ($trx_status_tor[$trx]->k_mekanisme != '-') {
                                                                    $komentar['mekanisme'][] = $trx_status_tor[$trx]->k_mekanisme . "\n (" . $users[$us]->name . ")";
                                                                }
                                                            }
                                                            if (!empty($trx_status_tor[$trx]->k_jadwal)) {
                                                                if ($trx_status_tor[$trx]->k_jadwal != '-') {
                                                                    $komentar['jadwal'][] = $trx_status_tor[$trx]->k_jadwal . "\n (" . $users[$us]->name . ")";
                                                                }
                                                            }
                                                            if (!empty($trx_status_tor[$trx]->k_iku)) {
                                                                if ($trx_status_tor[$trx]->k_iku != '-') {
                                                                    $komentar['iku'][] = $trx_status_tor[$trx]->k_iku . "\n (" . $users[$us]->name . ")";
                                                                }
                                                            }
                                                            if (!empty($trx_status_tor[$trx]->k_ik)) {
                                                                if ($trx_status_tor[$trx]->k_ik != '-') {
                                                                    $komentar['ik'][] = $trx_status_tor[$trx]->k_ik . "\n (" . $users[$us]->name . ")";
                                                                }
                                                            }
                                                            if (!empty($trx_status_tor[$trx]->k_keberlanjutan)) {
                                                                if ($trx_status_tor[$trx]->k_keberlanjutan != '-') {
                                                                    $komentar['keberlanjutan'][] = $trx_status_tor[$trx]->k_keberlanjutan . "\n (" . $users[$us]->name . ")";
                                                                }
                                                            }
                                                            if (!empty($trx_status_tor[$trx]->k_penanggung)) {
                                                                if ($trx_status_tor[$trx]->k_penanggung != '-') {
                                                                    $komentar['penanggung'][] = $trx_status_tor[$trx]->k_penanggung . "\n (" . $users[$us]->name . ")";
                                                                }
                                                            }
                                                            if (!empty($trx_status_tor[$trx]->k_rab)) {
                                                                if ($trx_status_tor[$trx]->k_rab != '-') {
                                                                    $komentar['komentar_rab'][] = $trx_status_tor[$trx]->k_rab . "\n (" . $users[$us]->name . ")";
                                                                }
                                                            }
                                                        }
                                                    }
                                                    // cek apakah ada pengajuan perbaikan? jika iya, maka komentar revisi akan bewarna hijau, karena sudah diperbaiki
                                                    for ($is = 0; $is < count($status); $is++) {
                                                        if ($trx_status_tor[$trx]->id_status == $status[$is]->id) {
                                                            for ($us2 = 0; $us2 < count($users); $us2++) {
                                                                for ($ro2 = 0; $ro2 < count($roles); $ro2++) {
                                                                    if ($users[$us2]->id == $trx_status_tor[$trx]->create_by) {
                                                                        if ($users[$us2]->role == $roles[$ro2]->id) {
                                                                            // echo $status[$is]->nama_status . " - " . $roles[$ro2]->name . "<br />";
                                                                            if ($status[$is]->nama_status == "Validasi" && $roles[$ro2]->name == "WD 3") {
                                                                                $disetujui = 1;
                                                                            }
                                                                        }
                                                                    }
                                                                }
                                                            }

                                                            if ($status[$is]->nama_status == "Pengajuan Perbaikan") {
                                                                $note = "komentar sebelum perbaikan tor";
                                                                $warna_komentar = "alert-success";
                                                            }
                                                        }
                                                    }
                                                }
                                            } ?>

                                            <?php
                                            function buttonKomentar($Href)
                                            {
                                                echo '<a id="validasi" class="badge badge-danger btn-sm shadow" data-toggle="collapse" href="' . $Href . '" role="button" aria-expanded="false" aria-controls="collapseExample">
                                                        Lihat Komentar
                                                    </a>';
                                            }

                                            function buttonPlus($Href)
                                            {
                                                echo ' <a id="validasi" class="badge badge-danger btn-sm shadow" data-toggle="collapse" href="' . $Href . '" role="button" aria-expanded="false" aria-controls="collapseExample">
                                                <i class="las la-plus"></i>
                                            </a>';
                                            }

                                            function areaKomentar($idArea, $nameArea, $place)
                                            {
                                                echo ' <div class="container collapse col-6" id="' . $idArea . '">
                                                <div id="validasi" class="form-group">
                                                    <textarea class="form-control" style="background:#c7c3c317" rows="1" id="' . $nameArea . '" name="' . $nameArea . '" placeholder="Komentar ' . $place . '..."></textarea>
                                                </div>
                                            </div>';
                                            }

                                            function collapseKomentar()
                                            {
                                                echo '<div class="collapse" id="collapseExample1">
                                                <div id="validasi" class="container col-sm-12">';
                                                // if (!empty($komentar['sub'])) {
                                                //     echo $note; //isinya : "komentar sebelum perbaikan tor"
                                                // }
                                                // foreach ($komentar['sub'] as $subs) {;
                                                //     echo '<h6 style="color: #dc3545;">"' . $subs . '"}}</h6>
                                                //     <hr class="mt-3">';
                                                // }
                                                echo '</div>
                                            </div>';
                                            }

                                            ?>

                                            <h5 style="text-align: center;" id="judul">
                                                KERANGKA ACUAN KERJA (KAK) / TERM OF REFERENCE (ToR), <br />
                                                PROGRAM STUDI {{strtoupper($prodi)}}<br />SEKOLAH VOKASI UNIVERSITAS SEBELAS</b>
                                            </h5>
                                            <br />
                                            <?php collapseKomentar(); ?>
                                            <h6><b>1. Indikator Kinerja Utama (IKU) : </b>{{$iku . " ".  $deskripsi_iku}}</h6><br />
                                            <h6><b>2. Indikator Kinerja Kegiatan (IK) : </b>{{$ik ." ".$deskripsi_ik}}</h6><br />
                                            <h6><b>3. Kegiatan : </b> {{$indikator_k . " ".    $deskripsi_indikator_k}} </h6><br />

                                            <h6><b>4. Sub Kegiatan : </b>{{$sub_k . " ". $deskripsi_sub_k}}</h6>
                                            <p>
                                                <?php if (!empty($komentar['sub'])) {
                                                    buttonKomentar("#collapseExample1");
                                                }
                                                if ($disetujui != 1) { ?>
                                                    @if(Gate::check('tor_verifikasi') || Gate::check('tor_validasi'))
                                                    <?php buttonPlus("#komen4") ?>
                                                    @endif
                                            </p>
                                            <?php areaKomentar("komen4", "k_sub", "sub kegiatan"); ?>
                                        <?php } ?>
                                        <div class="collapse" id="collapseExample1">
                                            <div id="validasi" class="container col-sm-12">
                                                <?php
                                                if (!empty($komentar['sub'])) {
                                                    echo $note; //isinya : "komentar sebelum perbaikan tor"
                                                }
                                                ?>
                                                @foreach($komentar['sub'] as $subs)
                                                <h6 style="color: #dc3545;">{{$subs}}</h6>
                                                <hr class="mt-3">
                                                @endforeach
                                            </div>
                                        </div>

                                        <h6 id="judul"><b>5. Judul Kegiatan : </b><br />{{$tor[$t]->nama_kegiatan}}</h6>
                                        <p>
                                            <?php if (!empty($komentar['judul'])) {
                                                buttonKomentar("#lihatkomen5");
                                            } ?>
                                            <?php if ($disetujui != 1) { ?>
                                                @if(Gate::check('tor_verifikasi') || Gate::check('tor_validasi'))
                                                <?php buttonPlus("#komen5") ?>
                                                @endif
                                        </p>
                                        <?php areaKomentar("komen5", "k_judul", "Judul Kegiatan"); ?>
                                    <?php } ?>
                                    <div class="collapse" id="lihatkomen5">
                                        <div id="validasi" class="container col-sm-12">
                                            <?php
                                            if (!empty($komentar['judul'])) {
                                                echo $note; //isinya : "komentar sebelum perbaikan tor"
                                            }
                                            ?>
                                            @foreach($komentar['judul'] as $juduls)
                                            <h6 style="color: #dc3545;">{{$juduls}}</h6>
                                            <hr class="mt-3">
                                            @endforeach
                                        </div>
                                    </div>

                                    <h6 id="latar"><b>6. Latar Belakang : </b><br />{!!$tor[$t]->latar_belakang!!}</h6>
                                    <p>
                                        <?php if (!empty($komentar['latarbelakang'])) {
                                            buttonKomentar("#lihatkomen6");
                                        } ?>
                                        <?php if ($disetujui != 1) { ?>
                                            @if(Gate::check('tor_verifikasi') || Gate::check('tor_validasi'))
                                            <?php buttonPlus("#komen6") ?>
                                            @endif
                                    </p>
                                    <div class="container collapse col-6" id="komen6">
                                        <div id="validasi" class="form-group">
                                            <textarea class="form-control" style="background:#c7c3c317" rows="1" id="k_latar_belakang" name="k_latar_belakang" placeholder="Komentar latarbelakang Kegiatan..."></textarea>
                                        </div>
                                    </div>
                                    <?php areaKomentar("komen6", "k_latar_belakang", "latarbelakang Kegiatan"); ?>
                                <?php } ?>
                                <div class="collapse" id="lihatkomen6">
                                    <div id="validasi" class="container col-sm-12">
                                        <?php
                                        if (!empty($komentar['latarbelakang'])) {
                                            echo $note; //isinya : "komentar sebelum perbaikan tor"
                                        }
                                        ?>
                                        @foreach($komentar['latarbelakang'] as $latarbelakangs)
                                        <h6 style="color: #dc3545;">{{$latarbelakangs}}</h6>
                                        <hr class="mt-3">
                                        @endforeach
                                    </div>
                                </div>

                                <h6><b>7. Rasionalisasi : </b><br />{!!$tor[$t]->rasionalisasi!!}</h6>
                                <p>
                                    <?php if (!empty($komentar['rasionalisasi'])) {
                                            buttonKomentar("#lihatkomen7");
                                        } ?>
                                    <?php if ($disetujui != 1) { ?>
                                        @if(Gate::check('tor_verifikasi') || Gate::check('tor_validasi'))
                                        <?php buttonPlus("#komen7") ?>
                                        @endif
                                </p>
                                <div class="container collapse col-6" id="komen7">
                                    <div id="validasi" class="form-group">
                                        <textarea class="form-control" style="background:#c7c3c317" rows="1" id="k_rasionalisasi" name="k_rasionalisasi" placeholder="Komentar rasionalisasi Kegiatan..."></textarea>
                                    </div>
                                </div>
                                <?php areaKomentar("komen7", "k_rasionalisasi", "rasionalisasi Kegiatan"); ?>
                            <?php } ?>
                            <div class="collapse" id="lihatkomen7">
                                <div id="validasi" class="container col-sm-12">
                                    <?php
                                        if (!empty($komentar['rasionalisasi'])) {
                                            echo $note; //isinya : "komentar sebelum perbaikan tor"
                                        }
                                    ?>
                                    @foreach($komentar['rasionalisasi'] as $rasionalisasis)
                                    <h6 style="color: #dc3545;">{{$rasionalisasis}}</h6>
                                    <hr class="mt-3">
                                    @endforeach
                                </div>
                            </div>

                            <h6><b>8. Tujuan : </b><br />{!!$tor[$t]->tujuan!!}</h6>
                            <p>
                                <?php if (!empty($komentar['tujuan'])) {
                                            buttonKomentar("#lihatkomen8");
                                        } ?>
                                <?php if ($disetujui != 1) { ?>
                                    @if(Gate::check('tor_verifikasi') || Gate::check('tor_validasi'))
                                    <?php buttonPlus("#komen8") ?>
                                    @endif
                            </p>
                            <?php areaKomentar("komen8", "k_tujuan", "tujuan Kegiatan"); ?>
                        <?php } ?>
                        <div class="collapse" id="lihatkomen8">
                            <div id="validasi" class="container col-sm-12">
                                <?php
                                        if (!empty($komentar['tujuan'])) {
                                            echo $note; //isinya : "komentar sebelum perbaikan tor"
                                        }
                                ?>
                                @foreach($komentar['tujuan'] as $tujuans)
                                <h6 style="color: #dc3545;">{{$tujuans}}</h6>
                                <hr class="mt-3">
                                @endforeach
                            </div>
                        </div>

                        <h6><b>9. Mekanisme dan Rancangan : </b><br />{!!$tor[$t]->mekanisme!!}</h6>
                        <p>
                            <?php if (!empty($komentar['mekanisme'])) {
                                            buttonKomentar("#lihatkomen9");
                                        } ?>
                            <?php if ($disetujui != 1) { ?>
                                @if(Gate::check('tor_verifikasi') || Gate::check('tor_validasi'))
                                <?php buttonPlus("#komen9") ?>
                                @endif
                        </p>
                        <div class="container collapse col-6" id="komen9">
                            <div id="validasi" class="form-group">
                                <textarea class="form-control" style="background:#c7c3c317" rows="1" id="k_mekanisme" name="k_mekanisme" placeholder="Komentar mekanisme Kegiatan..."></textarea>
                            </div>
                        </div>
                        <?php areaKomentar("komen9", "k_mekanisme", "mekanisme Kegiatan"); ?>
                    <?php } ?>
                    <div class="collapse" id="lihatkomen9">
                        <div id="validasi" class="container col-sm-12">
                            <?php
                                        if (!empty($komentar['mekanisme'])) {
                                            echo $note; //isinya : "komentar sebelum perbaikan tor"
                                        }
                            ?>
                            @foreach($komentar['mekanisme'] as $mekanismes)
                            <h6 style="color: #dc3545;">{{$mekanismes}}</h6>
                            <hr class="mt-3">
                            @endforeach
                        </div>
                    </div>

                    <h6><b>10. Jadwal Pelaksanaan : </b>
                        {{ date_format(date_create($tor[$t]->tgl_mulai_pelaksanaan), 'd-m-Y')." hingga " . date_format(date_create($tor[$t]->tgl_akhir_pelaksanaan), 'd-m-Y')}}
                        <br />
                        <?php
                                        if (!empty($komponen_jadwal)) {
                        ?>
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th scope="col" rowspan="2" class="align-middle">Komponen Input</th>
                                        <th scope="col" colspan="12" style="text-align: center;">{{substr($tor[$t]->tgl_mulai_pelaksanaan,0,4)}}</th>
                                    </tr>
                                    <tr>
                                        <td>1</td>
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
                                        </td>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                            for ($j = 0; $j < count($komponen_jadwal); $j++) {
                                                if ($komponen_jadwal[$j]->id_tor == $tor[$t]->id) { ?>
                                            <tr>
                                                <td>{{$komponen_jadwal[$j]->komponen}}</td>
                                                <?php for ($b = 1; $b < $komponen_jadwal[$j]->bulan_awal; $b++) { ?>
                                                    <td></td>
                                                <?php } ?>
                                                <?php for ($kj = 0; $kj <= ($komponen_jadwal[$j]->bulan_akhir - $komponen_jadwal[$j]->bulan_awal); $kj++) { ?>
                                                    <td style=" background-color:black!important; -webkit-print-color-adjust: exact; "></td>
                                                <?php }
                                                    for ($c = 12; $c > $komponen_jadwal[$j]->bulan_akhir; $c--) { ?>
                                                    <td></td>
                                                <?php } ?>
                                            </tr>
                                    <?php }
                                            }
                                    ?>
                                </tbody>
                            </table>
                        <?php } ?>
                    </h6>
                    <p>
                        <?php if (!empty($komentar['jadwal'])) {
                                            buttonKomentar("#lihatkomen10");
                                        } ?>
                        <?php if ($disetujui != 1) { ?>
                            @if(Gate::check('tor_verifikasi') || Gate::check('tor_validasi'))
                            <?php buttonPlus("#komen10") ?>
                            @endif
                    </p>
                    <?php areaKomentar("komen10", "k_jadwal", "jadwal Kegiatan"); ?>
                <?php } ?>
                <div class="collapse" id="lihatkomen10">
                    <div id="validasi" class="container col-sm-12">
                        <?php
                                        if (!empty($komentar['jadwal'])) {
                                            echo $note; //isinya : "komentar sebelum perbaikan tor"
                                        }
                        ?>
                        @foreach($komentar['jadwal'] as $jadwals)
                        <h6 style="color: #dc3545;">{{$jadwals}}</h6>
                        <hr class="mt-3">
                        @endforeach
                    </div>
                </div>

                <h6><b>11. Indikator Kinerja Utama : </b><br />
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
                                <td>{{$iku ." ".$deskripsi_iku}}</td>
                                <td>{{$tor[$t]->realisasi_IKU ."%"}}</td>
                                <td>{{$tor[$t]->target_IKU ."%"}}</td>
                            </tr>
                        </tbody>
                    </table>
                </h6>
                <p>
                    <?php if (!empty($komentar['iku'])) {
                                            buttonKomentar("#lihatkomen11");
                                        } ?>
                    <?php if ($disetujui != 1) { ?>
                        @if(Gate::check('tor_verifikasi') || Gate::check('tor_validasi'))
                        <?php buttonPlus("#komen11") ?>
                        @endif
                </p>
                <?php areaKomentar("komen11", "k_iku", "iku Kegiatan"); ?>
            <?php } ?>
            <div class="collapse" id="lihatkomen11">
                <div id="validasi" class="container col-sm-12">
                    <?php
                                        if (!empty($komentar['iku'])) {
                                            echo $note; //isinya : "komentar sebelum perbaikan tor"
                                        }
                    ?>
                    @foreach($komentar['iku'] as $ikus)
                    <h6 style="color: #dc3545;">{{$ikus}}</h6>
                    <hr class="mt-3">
                    @endforeach
                </div>
            </div>

            <h6><b>12. Indikator Kinerja Kegiatan : </b><br />
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
            </h6>
            <p>
                <?php if (!empty($komentar['ik'])) {
                                            buttonKomentar("#lihatkomen12");
                                        } ?>
                <?php if ($disetujui != 1) { ?>
                    @if(Gate::check('tor_verifikasi') || Gate::check('tor_validasi'))
                    <?php buttonPlus("#komen12") ?>
                    @endif
            </p>
            <div class="container collapse col-6" id="komen12">
                <div id="validasi" class="form-group">
                    <textarea class="form-control" style="background:#c7c3c317" rows="1" id="k_ik" name="k_ik" placeholder="Komentar ik Kegiatan..."></textarea>
                </div>
            </div>
            <?php areaKomentar("komen12", "k_ik", "ik Kegiatan"); ?>
        <?php } ?>
        <div class="collapse" id="lihatkomen12">
            <div id="validasi" class="container col-sm-12">
                <?php
                                        if (!empty($komentar['ik'])) {
                                            echo $note; //isinya : "komentar sebelum perbaikan tor"
                                        }
                ?>
                @foreach($komentar['ik'] as $iks)
                <h6 style="color: #dc3545;">{{$iks}}</h6>
                <hr class="mt-3">
                @endforeach
            </div>
        </div>

        <h6><b>13. keberlanjutan : </b><br />{!!$tor[$t]->keberlanjutan!!}</h6>
        <p>
            <?php if (!empty($komentar['keberlanjutan'])) {
                                            buttonKomentar("#lihatkomen13");
                                        } ?>
            <?php if ($disetujui != 1) { ?>
                @if(Gate::check('tor_verifikasi') || Gate::check('tor_validasi'))
                <?php buttonPlus("#komen13") ?>
                @endif
        </p>
        <div class="container collapse col-6" id="komen13">
            <div id="validasi" class="form-group">
                <textarea class="form-control" style="background:#c7c3c317" rows="1" id="k_keberlanjutan" name="k_keberlanjutan" placeholder="Komentar keberlanjutan Kegiatan..."></textarea>
            </div>
        </div>
        <?php areaKomentar("komen13", "k_keberlanjutan", "keberlanjutan Kegiatan"); ?>
    <?php } ?>
    <div class="collapse" id="lihatkomen13">
        <div id="validasi" class="container col-sm-12">
            <?php
                                        if (!empty($komentar['keberlanjutan'])) {
                                            echo $note; //isinya : "komentar sebelum perbaikan tor"
                                        }
            ?>
            @foreach($komentar['keberlanjutan'] as $keberlanjutans)
            <h6 style="color: #dc3545;">{{$keberlanjutans}}</h6>
            <hr class="mt-3">
            @endforeach
        </div>
    </div>

    <h6><b>14. Penanggung Jawab : </b><br />{{$tor[$t]->nama_pic}}</h6>
    <p>
        <?php if (!empty($komentar['penanggung'])) {
                                            buttonKomentar("#lihatkomen14");
                                        } ?>
        <?php if ($disetujui != 1) { ?>
            @if(Gate::check('tor_verifikasi') || Gate::check('tor_validasi'))
            <?php buttonPlus("#komen14") ?>
            @endif
    </p>
                            </div><?php areaKomentar("komen14", "k_penanggung", "penanggung Kegiatan"); ?>
                        <?php } ?>
                        <div class="collapse" id="lihatkomen14">
                            <div id="validasi" class="container col-sm-12">
                                <?php
                                        if (!empty($komentar['penanggung'])) {
                                            echo $note; //isinya : "komentar sebelum perbaikan tor"
                                        }
                                ?>
                                @foreach($komentar['penanggung'] as $penanggungs)
                                <h6 style="color: #dc3545;">{{$penanggungs}}</h6>
                                <hr class="mt-3">
                                @endforeach
                            </div>
                        </div>
                        <div class="container ml-1">
                            <h6 id="validasi"><b>15. Total Ajuan : </b><br />{{"Rp. ".number_format($tor[$t]->jumlah_anggaran,2,',',',')}}</h6><br />
                        </div>



                        <hr />
                        <!-- R A B -->
                        @include('perencanaan/validasi/detail_rab')
                        <p>
                            <?php if (!empty($komentar['komentar_rab'])) {
                                            buttonKomentar("#lihatkomentar12");
                                        } ?>

                            <?php if ($disetujui != 1) { ?>
                                @if(Gate::check('tor_verifikasi') || Gate::check('tor_validasi'))
                                <?php buttonPlus("#komenrab") ?>
                                <?php areaKomentar("komenrab", "k_rab", "RAB"); ?>
                                @endif
                            <?php } ?>
                        </p>



                        <div class="collapse" id="lihatkomentar12">
                            <div id="validasi" class="container col-sm-12">
                                <?php
                                        if (!empty($komentar['komentar_rab'])) {
                                            echo $note;
                                        }
                                ?>
                                @foreach($komentar['komentar_rab'] as $rab)
                                <h6 style="color: #dc3545;">{{$rab}}</h6>
                                <hr class="mt-3">
                                @endforeach
                            </div>
                        </div>
                        <br />
                        <!-- V A L I D A S I -->
                        <br />

                        <?php
                                        //menyembunyikan option, jika user sudah memverif
                                        $userSudahKomentar;
                                        foreach ($trx_status_tor as $trx3) {
                                            if ($trx3->id_tor == $tor[$t]->id) {
                                                if ($tor[$t]->jenis_ajuan == "Baru" && $trx3->create_by == auth()->user()->id) {
                                                    $userSudahKomentar = 1;
                                                } else {
                                                    $userSudahKomentar = 0;
                                                }
                                                if ($tor[$t]->jenis_ajuan == "Perbaikan" && $trx3->create_by == auth()->user()->id) {
                                                    $userSudahKomentar = 1;
                                                } else {
                                                    $userSudahKomentar = 0;
                                                }
                                            }
                                        }
                        ?>

                        @if(Gate::check('tor_verifikasi') || Gate::check('tor_validasi'))
                        <?php if ($disetujui != 1 && $userSudahKomentar == 0) { ?>
                            <div id="validasi" class="container center">
                                <?php
                                            $blok = 0;
                                            $ada2 = 0;
                                            $tdkada2 = 0;
                                            $statuskeg = "n";
                                            $badge;
                                            $currentStatus;
                                            $buttonSubmit = 0;
                                            for ($stk2 = 0; $stk2 < count($trx_status_tor); $stk2++) {
                                                if ($trx_status_tor[$stk2]->id_tor == $tor[$t]->id) {
                                                    $ada2 += 1;
                                                    $trx_status_tor[$stk2]->id_status;
                                                    // if ($trx_status_tor[$stk2]->id_status == 1) {
                                                    //     $statuskeg = "Pengajuan Prodi";
                                                    //     $badge = "badge-warning";
                                                    // } elseif ($trx_status_tor[$stk2]->id_status == 2) {
                                                    //     $statuskeg = "Diverifikasi";
                                                    //     $badge = "badge-success";
                                                    // } elseif ($trx_status_tor[$stk2]->id_status == 3) {
                                                    //     $statuskeg = "Revisi";
                                                    //     $badge = "badge-danger";
                                                    // } elseif ($trx_status_tor[$stk2]->id_status == 4) {
                                                    //     $statuskeg = "Divalidasi";
                                                    //     $badge = "badge-info";
                                                    // } else {
                                                    //     $statuskeg = "n";
                                                    // }

                                                    foreach ($status as $statusTor) {
                                                        if ($statusTor->id == $trx_status_tor[$stk2]->id_status) {
                                                            $currentStatus = $statusTor->nama_status;
                                                            foreach ($users as $userrole) {
                                                                foreach ($roles as $statusrole) {
                                                                    if ($trx_status_tor[$stk2]->create_by == $userrole->id) {
                                                                        if ($userrole->role == $statusrole->id) {
                                                                            $currentStatusRole =  $statusrole->name;
                                                                        }
                                                                    }
                                                                }
                                                            }
                                                        }
                                                    }
                                                } else {
                                                }
                                            }
                                ?>
                                <h4><b>
                                        Verifikasi & Validasi TOR
                                    </b></h4>
                                <?php for ($s = 1; $s < count($status); $s++) {
                                                if ($status[$s]->kategori == "TOR" && $status[$s]->nama_status != "Pengajuan Perbaikan") {
                                                    for ($r3 = 0; $r3 < count($roles); $r3++) {
                                                        if (Auth()->user()->role == $roles[$r3]->id) { ?>


                                                <?php if ($roles[$r3]->name == "BPU") {
                                                                if (($currentStatus == "Proses Pengajuan" || $currentStatus == "Pengajuan Perbaikan") && $status[$s]->nama_status == "Verifikasi") {
                                                                    $buttonSubmit = 1; ?>
                                                        <input type="radio" class="btn-check" name="id_status" id="id_status" value="{{$status[$s]->id}}" autocomplete=" off">
                                                        <label class="" for="danger-outlined">{{$status[$s]->nama_status}}</label><br />
                                                    <?php }
                                                                if ($currentStatus == "Verifikasi") { ?>
                                                        <script>
                                                            var n = document.getElementById("validasiplus");
                                                            while (n) {
                                                                document.getElementById("validasiplus").remove();
                                                            };
                                                        </script>
                                                    <?php }
                                                            } elseif ($roles[$r3]->name == "WD 1") { ?>
                                                    <?php
                                                                if ($currentStatus == "Verifikasi" && ($status[$s]->nama_status == "Validasi" || $status[$s]->nama_status == "Revisi")) {
                                                                    $buttonSubmit = 1;
                                                                    if ($status[$s]->nama_status == "Revisi") {
                                                    ?>
                                                        <?php } ?>
                                                        <input type="radio" class="btn-check" name="id_status" id="id_status" value="{{$status[$s]->id}}" autocomplete=" off">
                                                        <label class="" for="danger-outlined">{{$status[$s]->nama_status}}</label><br />
                                                    <?php }
                                                            } elseif ($roles[$r3]->name == "WD 2") {
                                                                // echo "xx - " . $currentStatus . "-" . $currentStatusRole;
                                                                if ($currentStatus == "Validasi" && $currentStatusRole == "WD 1" &&  ($status[$s]->nama_status == "Validasi" || $status[$s]->nama_status == "Revisi")) {
                                                                    $buttonSubmit = 1;  ?>
                                                        <input type="radio" class="btn-check" name="id_status" id="id_status" value="{{$status[$s]->id}}" autocomplete=" off">
                                                        <label class="" for="danger-outlined">{{$status[$s]->nama_status}}</label><br />
                                                    <?php }
                                                            } elseif ($roles[$r3]->name == "WD 3") {
                                                                if ($currentStatus == "Validasi" && $currentStatusRole == "WD 2"   && ($status[$s]->nama_status == "Validasi" || $status[$s]->nama_status == "Revisi")) {
                                                                    $buttonSubmit = 1;  ?>
                                                        <input type="radio" class="btn-check" name="id_status" id="id_status" value="{{$status[$s]->id}}" autocomplete=" off">
                                                        <label class="" for="danger-outlined">{{$status[$s]->nama_status}}</label><br />
                                                    <?php }
                                                            } else { ?>
                                                    <input type="radio" class="btn-check" name="id_status" id="id_status" value="{{$status[$s]->id}}" autocomplete=" off">
                                                    <label class="" for="danger-outlined">{{$status[$s]->nama_status}}</label><br />
                                <?php }
                                                        }
                                                    }
                                                }
                                            } ?>
                                <input type="hidden" name="create_by" value="<?= Auth()->user()->id ?>">
                                <input type="hidden" name="id_tor" value="<?= $id ?>">
                                <input name="created_at" id="created_at" type="hidden" value="<?= date('Y-m-d H:i:s') ?>">
                                <input name="updated_at" id="updated_at" type="hidden" value="<?= date('Y-m-d') ?>">
                                <?php if ($buttonSubmit == 1) { ?>
                                    <button class="btn btn-primary btn-sm" type="submit">Kirim</button>
                                <?php } ?>
                                <br />
                            </div>
                        <?php } ?>
                        @endif
                        </form>
                        </div>
                        <br />

                        <!-- Modal Tambah Jadwal -->
                        <div class="modal fade" tabindex="-1" role="dialog" id="tambah_jadwal<?= $tor[$t]->id ?>">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title">Tambah Jadwal Pelaksanaan</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <form class="form-horizontal" method="post" action="{{ url('/tor/create_jadwal/') }}">
                                            @csrf
                                            <label>Contoh</label><br />
                                            <img width="450" src="../assets/contoh/jadwaltor.png">
                                            <br />
                                            <div class="form-group">
                                                <label>TOR</label>
                                                <select name="id_tor" id="id_tor" class="form-control">
                                                    <option value="{{$tor[$t]->id}}">{{$tor[$t]->nama_kegiatan}}</option>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label>Komponen Input</label>
                                                <input name="komponen" id="komponen" type="text" class="form-control">
                                            </div>
                                            <div class="row">
                                                <div class="col">
                                                    <label>Mulai Kegiatan</label>
                                                    <select name="bulan_awal" id="bulan_awal" class="form-control">
                                                        <?php
                                                        $bulan = [
                                                            'Januari', 'Februari', 'Maret', 'April',
                                                            'Mei', 'Juni', 'Juli', 'Agustus',
                                                            'September',  'Oktober', 'November', 'Desember'
                                                        ];
                                                        for ($ba = 1; $ba <= 12; $ba++) { ?>
                                                            <option value="{{$ba}}">{{$bulan[$ba-1]}}</option>
                                                        <?php } ?>
                                                    </select>
                                                </div>
                                                <div class="col">
                                                    <label>Selesai Kegiatan</label>
                                                    <select name="bulan_akhir" id="bulan_akhir" class="form-control">
                                                        <?php
                                                        $bulan = [
                                                            'Januari', 'Februari', 'Maret', 'April',
                                                            'Mei', 'Juni', 'Juli', 'Agustus',
                                                            'September',  'Oktober', 'November', 'Desember'
                                                        ];
                                                        for ($br = 1; $br <= 12; $br++) { ?>
                                                            <option value="{{$br}}">{{$bulan[$br-1]}}</option>
                                                        <?php } ?>
                                                    </select>
                                                </div>

                                            </div>
                                            <button class="btn btn-primary mr-1" type="submit">Submit</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Modal Tambah IKU -->
                        <div class="modal fade" tabindex="-1" role="dialog" id="tambah_iku<?= $tor[$t]->id ?>">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title">Tambah IKU</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <form class="form-horizontal" method="post" action="{{ url('/tor/create_indikator/') }}">
                                            @csrf
                                            <label>Contoh</label><br />
                                            <img width="450" src="../assets/contoh/contohiku.png">
                                            <br />
                                            <div class="form-group">
                                                <label>TOR</label>
                                                <select name="id_tor" id="id_tor" class="form-control">
                                                    <option value="{{$tor[$t]->id}}">{{$tor[$t]->nama_kegiatan}}</option>
                                                </select>
                                            </div>
                                            <div class="container mt-3">
                                                <div class="row">
                                                    <div class="col-md-7">
                                                        <div class="form-group">
                                                            <input name="jenis" id="jenis" value="IKU" type="hidden" class="form-control">
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Realisasi</label>
                                                            <input name="realisasi" id="realisasi" type="text" class="form-control">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <div class="form-group">
                                                            <label>Tahun Realisasi</label>
                                                            <input name="thn_realisasi" id="thn_realisasi" type="text" class="form-control">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-7">
                                                        <div class="form-group">
                                                            <label>Target</label>
                                                            <input name="target" id="target" type="text" class="form-control">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <div class="form-group">
                                                            <label>Tahun Target</label>
                                                            <input name="thn_target" id="thn_target" type="text" class="form-control">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <button class="btn btn-primary mr-1" type="submit">Submit</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Modal Tambah IK -->
                        <div class="modal fade" tabindex="-1" role="dialog" id="tambah_ik<?= $tor[$t]->id ?>">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title">Tambah IK</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <form class="form-horizontal" method="post" action="{{ url('/tor/create_indikator/') }}">
                                            @csrf
                                            <label>Contoh</label><br />
                                            <img width="450" src="../assets/contoh/contohik.png">
                                            <br />
                                            <div class="form-group">
                                                <label>TOR</label>
                                                <select name="id_tor" id="id_tor" class="form-control">
                                                    <option value="{{$tor[$t]->id}}">{{$tor[$t]->nama_kegiatan}}</option>
                                                </select>
                                            </div>
                                            <div class="container mt-3">
                                                <div class="row">
                                                    <div class="col-md-7">
                                                        <div class="form-group">
                                                            <input name="jenis" id="jenis" value="IK" type="hidden" class="form-control">
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Realisasi</label>
                                                            <input name="realisasi" id="realisasi" type="text" class="form-control">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <div class="form-group">
                                                            <label>Tahun Realisasi</label>
                                                            <input name="thn_realisasi" id="thn_realisasi" type="text" class="form-control">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-7">
                                                        <div class="form-group">
                                                            <label>Target</label>
                                                            <input name="target" id="target" type="text" class="form-control">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <div class="form-group">
                                                            <label>Tahun Target</label>
                                                            <input name="thn_target" id="thn_target" type="text" class="form-control">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <button class="btn btn-primary mr-1" type="submit">Submit</button>

                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="container ml-1">
                        <button type="button" class="btn btn-primary mb-3" data-toggle="tooltip" data-placement="top" title="" data-original-title="Remove Komentar Sebelum Diprint" onclick="remove()">REMOVE</button>
                        <button type="button" class="btn btn-primary mb-3" onclick="printDiv()">PRINT</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>

<?php }
                                } ?>
</div>

</div>
</div>
</div>
</div>
</div>
<!-- Wrapper END -->
<script>
    function remove() {
        var n = document.getElementById("validasi");
        while (n) {
            document.getElementById("validasi").remove();
        }
    };

    function printDiv() {
        var printContents = document.getElementById("iniprint").innerHTML;
        var originalContents = document.body.innerHTML;
        document.body.innerHTML = printContents;
        window.print();
    };
</script>

<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="{{ asset('findash/assets/js/jquery.min.js')}}"></script>
<script src="{{ asset('findash/assets/js/popper.min.js')}}"></script>
<script src="{{ asset('findash/assets/js/bootstrap.min.js')}}"></script>
<!-- Appear JavaScript -->
<script src="{{ asset('findash/assets/js/jquery.appear.js')}}"></script>
<!-- Countdown JavaScript -->
<script src="{{ asset('findash/assets/js/countdown.min.js')}}"></script>
<!-- Counterup JavaScript -->
<script src="{{ asset('findash/assets/js/waypoints.min.js')}}"></script>
<script src="{{ asset('findash/assets/js/jquery.counterup.min.js')}}"></script>
<!-- Wow JavaScript -->
<script src="{{ asset('findash/assets/js/wow.min.js')}}"></script>
<!-- Apexcharts JavaScript -->
<script src="{{ asset('findash/assets/js/apexcharts.js')}}"></script>
<!-- Slick JavaScript -->
<script src="{{ asset('findash/assets/js/slick.min.js')}}"></script>
<!-- Select2 JavaScript -->
<script src="{{ asset('findash/assets/js/select2.min.js')}}"></script>
<!-- Owl Carousel JavaScript -->
<script src="{{ asset('findash/assets/js/owl.carousel.min.js')}}"></script>
<!-- Magnific Popup JavaScript -->
<script src="{{ asset('findash/assets/js/jquery.magnific-popup.min.js')}}"></script>
<!-- Smooth Scrollbar JavaScript -->
<script src="{{ asset('findash/assets/js/smooth-scrollbar.js')}}"></script>
<!-- lottie JavaScript -->
<script src="{{ asset('findash/assets/js/lottie.js')}}"></script>
<!-- Style Customizer -->
<script src="{{ asset('findash/assets/js/style-customizer.js')}}"></script>
<!-- Chart Custom JavaScript -->
<script src="{{ asset('findash/assets/js/chart-custom.js')}}"></script>
<!-- Custom JavaScript -->
<script src="{{ asset('findash/assets/js/custom.js')}}"></script>
</body>

</html>