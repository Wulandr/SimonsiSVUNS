<?php

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
                                $disetujui = 0; //apakah wd 3 sudah validasi?
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
                                            'rab' => [],

                                        ];
                                        $judul = [];
                                        for ($trx = 0; $trx < count($trx_status_tor); $trx++) {
                                            if ($trx_status_tor[$trx]->id_tor == $tor[$t]->id) { ?>
                                        <?php for ($us = 0; $us < count($users); $us++) {
                                                    if ($trx_status_tor[$trx]->create_by == $users[$us]->id) {
                                                        if (!empty($trx_status_tor[$trx]->k_sub)) {
                                                            if ($trx_status_tor[$trx]->k_sub != '-') {
                                                                $komentar['sub'][] = " \"" . $trx_status_tor[$trx]->k_sub . "\"\n (" . $users[$us]->name . ")";
                                                            }
                                                        }
                                                        if (!empty($trx_status_tor[$trx]->k_judul)) {
                                                            if ($trx_status_tor[$trx]->k_judul != '-') {
                                                                $komentar['judul'][] = " \"" . $trx_status_tor[$trx]->k_judul . "\"\n (" . $users[$us]->name . ")";
                                                            }
                                                        }
                                                        if (!empty($trx_status_tor[$trx]->k_latar_belakang)) {
                                                            if ($trx_status_tor[$trx]->k_latar_belakang != '-') {
                                                                $komentar['latarbelakang'][] = " \"" . $trx_status_tor[$trx]->k_latar_belakang . "\"\n (" . $users[$us]->name . ")";
                                                            }
                                                        }
                                                        if (!empty($trx_status_tor[$trx]->k_rasionalisasi)) {
                                                            if ($trx_status_tor[$trx]->k_rasionalisasi != '-') {
                                                                $komentar['rasionalisasi'][] = " \"" . $trx_status_tor[$trx]->k_rasionalisasi . "\"\n (" . $users[$us]->name . ")";
                                                            }
                                                        }
                                                        if (!empty($trx_status_tor[$trx]->k_tujuan)) {
                                                            if ($trx_status_tor[$trx]->k_tujuan != '-') {
                                                                $komentar['tujuan'][] = " \"" . $trx_status_tor[$trx]->k_tujuan . "\"\n (" . $users[$us]->name . ")";
                                                            }
                                                        }
                                                        if (!empty($trx_status_tor[$trx]->k_mekanisme)) {
                                                            if ($trx_status_tor[$trx]->k_mekanisme != '-') {
                                                                $komentar['mekanisme'][] = " \"" . $trx_status_tor[$trx]->k_mekanisme . "\"\n (" . $users[$us]->name . ")";
                                                            }
                                                        }
                                                        if (!empty($trx_status_tor[$trx]->k_jadwal)) {
                                                            if ($trx_status_tor[$trx]->k_jadwal != '-') {
                                                                $komentar['jadwal'][] = " \"" . $trx_status_tor[$trx]->k_jadwal . "\"\n (" . $users[$us]->name . ")";
                                                            }
                                                        }
                                                        if (!empty($trx_status_tor[$trx]->k_iku)) {
                                                            if ($trx_status_tor[$trx]->k_iku != '-') {
                                                                $komentar['iku'][] = " \"" . $trx_status_tor[$trx]->k_iku . "\"\n (" . $users[$us]->name . ")";
                                                            }
                                                        }
                                                        if (!empty($trx_status_tor[$trx]->k_ik)) {
                                                            if ($trx_status_tor[$trx]->k_ik != '-') {
                                                                $komentar['ik'][] = " \"" . $trx_status_tor[$trx]->k_ik . "\"\n (" . $users[$us]->name . ")";
                                                            }
                                                        }
                                                        if (!empty($trx_status_tor[$trx]->k_keberlanjutan)) {
                                                            if ($trx_status_tor[$trx]->k_keberlanjutan != '-') {
                                                                $komentar['keberlanjutan'][] = " \"" . $trx_status_tor[$trx]->k_keberlanjutan . "\"\n (" . $users[$us]->name . ")";
                                                            }
                                                        }
                                                        if (!empty($trx_status_tor[$trx]->k_penanggung)) {
                                                            if ($trx_status_tor[$trx]->k_penanggung != '-') {
                                                                $komentar['penanggung'][] = " \"" . $trx_status_tor[$trx]->k_penanggung . "\"\n (" . $users[$us]->name . ")";
                                                            }
                                                        }
                                                        if (!empty($trx_status_tor[$trx]->k_rab)) {
                                                            if ($trx_status_tor[$trx]->k_rab != '-') {
                                                                $komentar['rab'][] = " \"" . $trx_status_tor[$trx]->k_rab . "\"\n (" . $users[$us]->name . ")";
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
                                                            $note = "<b><i>komentar sebelum perbaikan tor</b></i>";
                                                            $warna_komentar = "alert-success";
                                                        }
                                                    }
                                                }
                                            }
                                        } ?>

                                        <?php
                                        $pengajuan = 0;
                                        $detail = "Lengkapi Data";
                                        $name;
                                        $dalamRevisi = 0; // apakah sekarang dalam proses revisi? jika iya, maka dpt ditampilkan aksi jadwal dan rab
                                        $countRevisi = 0; //megnhitung brp kali revisi
                                        $countPerbaikan = 0; //megnhitung brp kali perbaikan
                                        for ($trx1 = 0; $trx1 < count($trx_status_tor); $trx1++) {
                                            if ($trx_status_tor[$trx1]->id_tor == $tor[$t]->id) {
                                                for ($st1 = 0; $st1 < count($status); $st1++) {
                                                    if ($trx_status_tor[$trx1]->id_status == $status[$st1]->id) {
                                                        $name = $status[$st1]->nama_status;
                                                        if ($status[$st1]->nama_status == "Proses Pengajuan") {
                                                            $pengajuan = 1;
                                                            $detail = "Detail";
                                                        }
                                                        if ($status[$st1]->nama_status == "Revisi") {
                                                            $countRevisi += 1;
                                                        }
                                                        if ($status[$st1]->nama_status == "Pengajuan Perbaikan") {
                                                            $countPerbaikan += 1;
                                                        }
                                                    }
                                                }
                                            }
                                        }

                                        //jika jumlah revisi tidak sama dengan perbaikan, maka aktifkan button aksi
                                        if ($countRevisi != $countPerbaikan) {
                                            $dalamRevisi = 1;
                                        }
                                        $alertRevisi = ""; //menampilkan peringatan untuk merevisi jadwal dan rab


                                        if ($dalamRevisi == 1) {
                                            foreach ($trx_status_tor as $revisian) {
                                                if ($revisian->id_tor == $tor[$t]->id) {

                                                    //cek di tabel J A D W A L apakah update_at > created_at di trx tor revisi
                                                    $kjadwalSudahRevisi = "Belum"; //apakah kjadwal sudah direvisi
                                                    foreach ($komponen_jadwal as $kjadwal) {
                                                        if ($kjadwal->id_tor == $tor[$t]->id && ($kjadwal->updated_at > $revisian->created_at || $kjadwal->created_at > $revisian->created_at)) {
                                                            $kjadwalSudahRevisi = "Sudah";
                                                            // echo $kjadwal->updated_at . " and " . $revisian->created_at . "<br />";
                                                        }
                                                        if ($kjadwal->id_tor == $tor[$t]->id && ($kjadwal->updated_at < $revisian->created_at || $kjadwal->created_at < $revisian->created_at)) {
                                                            if ($kjadwalSudahRevisi != "Sudah") {
                                                                $kjadwalSudahRevisi = "Belum"; //berarti belum direvisi
                                                            }
                                                            // echo "JADWAL : " . $kjadwal->updated_at . " and " . " TRX :" . $revisian->created_at . "<br />";
                                                        }
                                                    }

                                                    //cek di tabel ANGGARAN RAB apakah update_at > created_at di trx tor revisi
                                                    $angSudahRevisi = "Belum"; //apakah ang sudah direvisi
                                                    foreach ($rab as $rabrev) {
                                                        if ($rabrev->id_tor == $tor[$t]->id) {
                                                            foreach ($anggaran as $ang) {
                                                                if ($ang->id_rab == $rabrev->id) {
                                                                    if ($ang->updated_at > $revisian->created_at || $ang->created_at > $revisian->created_at) {
                                                                        $angSudahRevisi = "Sudah";
                                                                        // echo $ang->updated_at . " and " . $revisian->created_at . "<br />";
                                                                    }
                                                                    if ($ang->updated_at < $revisian->created_at || $ang->created_at < $revisian->created_at) {
                                                                        if ($angSudahRevisi != "Sudah") {
                                                                            $angSudahRevisi = "Belum"; //berarti belum direvisi
                                                                        }
                                                                        // echo "JADWAL : " . $ang->updated_at . " and " . " TRX :" . $revisian->created_at . "<br />";
                                                                    }
                                                                }
                                                            }
                                                        }
                                                    }

                                                    /*
                                                     ---  ALERT BELUM REVISI JADWAL DAN ANGGARAN RAB  ---
                                                     */
                                                    foreach ($status as $statusrevisian) {
                                                        if ($revisian->id_status == $statusrevisian->id && $statusrevisian->nama_status == "Revisi") {
                                                            // echo $statusrevisian->nama_status . "<br />";
                                                            // echo $revisian->k_jadwal;
                                                            // echo $revisian->k_rab;

                                                            if (!empty($revisian->k_jadwal && $kjadwalSudahRevisi == "Belum")) { ?>
                                                                <div class="alert text-white bg-danger" role="alert">
                                                                    <div class="iq-alert-icon">
                                                                        <i class="ri-information-line"></i>
                                                                    </div>
                                                                    <div class="iq-alert-text">Anda belum merevisi <b>KOMPONEN JADWAL KEGIATAN</b> ! </div>
                                                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                                        <i class="ri-close-line"></i>
                                                                    </button>
                                                                </div>
                                                            <?php }
                                                            if (!empty($revisian->k_rab && $angSudahRevisi == "Belum")) { ?>
                                                                <div class="alert text-white bg-danger" role="alert">
                                                                    <div class="iq-alert-icon">
                                                                        <i class="ri-information-line"></i>
                                                                    </div>
                                                                    <div class="iq-alert-text">Anda belum merevisi <b>ANGGARAN PADA RAB</b> ! </div>
                                                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                                        <i class="ri-close-line"></i>
                                                                    </button>
                                                                </div>
                                        <?php }
                                                        }
                                                    }
                                                }
                                            }
                                        }
                                        ?>
                                        <h5 style="text-align: center;" id="judul">
                                            KERANGKA ACUAN KERJA (KAK) / TERM OF REFERENCE (ToR) <br />
                                            PROGRAM STUDI {{strtoupper($prodi)}}<br />SEKOLAH VOKASI UNIVERSITAS SEBELAS</b>
                                        </h5>
                                        <br />

                                        <h6>1. Indikator Kinerja Utama (IKU) : {{$iku . " ".  $deskripsi_iku}}</h6><br />
                                        <h6>2. Indikator Kinerja Kegiatan (IK) : {{$ik ." ".$deskripsi_ik}}</h6><br />
                                        <h6>3. Kegiatan : {{$indikator_k . " ".    $deskripsi_indikator_k}} </h6><br />

                                        <h6>4. Sub Kegiatan : {{$sub_k . " ". $deskripsi_sub_k}}</h6>
                                        <?php if (!empty($komentar['sub'])) { ?>
                                            <p><a id="validasi" class="badge badge-danger btn-sm shadow" data-toggle="collapse" href="#komen1" role="button" aria-expanded="false" aria-controls="collapseExample">
                                                    Lihat Komentar
                                                </a></p>
                                        <?php } else { ?>
                                            <br />
                                        <?php                                        } ?>
                                        <div class="container collapse col-6" id="komen1">
                                            <div id="validasi" class="container ml-3">
                                                @foreach($komentar['sub'] as $subs)
                                                <h6 style="color: #dc3545;">{{$subs}}</h6>
                                                <hr class="mt-3">
                                                @endforeach
                                            </div>
                                        </div>

                                        <h6 id="judul">5. Judul Kegiatan : <br />{{$tor[$t]->nama_kegiatan}}</h6>
                                        <?php if (!empty($komentar['judul'])) { ?>
                                            <p><a id="validasi" class="badge badge-danger btn-sm shadow" data-toggle="collapse" href="#komenjudul" role="button" aria-expanded="false" aria-controls="collapseExample">
                                                    Lihat Komentar
                                                </a></p>
                                        <?php } else { ?>
                                            <br />
                                        <?php
                                        } ?>
                                        <div class="container collapse col-6" id="komenjudul">
                                            <div id="validasi" class="container ml-3">
                                                @foreach($komentar['judul'] as $j)
                                                <h6 style="color: #dc3545;">{{$j}}</h6>
                                                <hr class="mt-3">
                                                @endforeach
                                            </div>
                                        </div>

                                        <h6 id="latar">6. Latar Belakang : <br />{!!$tor[$t]->latar_belakang!!}</h6>
                                        <?php if (!empty($komentar['latarbelakang'])) { ?>
                                            <p><a id="validasi" class="badge badge-danger btn-sm shadow" data-toggle="collapse" href="#komenlatar" role="button" aria-expanded="false" aria-controls="collapseExample">
                                                    Lihat Komentar
                                                </a></p>
                                        <?php } else { ?>
                                            <br />
                                        <?php } ?>
                                        <div class="container collapse col-6" id="komenlatar">
                                            <div id="validasi" class="container ml-3">
                                                @foreach($komentar['latarbelakang'] as $l)
                                                <h6 style="color: #dc3545;">{{$l}}</h6>
                                                <hr class="mt-3">
                                                @endforeach
                                            </div>
                                        </div>

                                        <h6>7. Rasionalisasi : <br />{!!$tor[$t]->rasionalisasi!!}</h6>
                                        <?php if (!empty($komentar['rasionalisasi'])) { ?>
                                            <p><a id="validasi" class="badge badge-danger btn-sm shadow" data-toggle="collapse" href="#komenrasionalisasi" role="button" aria-expanded="false" aria-controls="collapseExample">
                                                    Lihat Komentar
                                                </a></p>
                                        <?php } else { ?>
                                            <br />
                                        <?php } ?>
                                        <div class="container collapse col-6" id="komenrasionalisasi">
                                            <div id="validasi" class="container ml-3">
                                                @foreach($komentar['rasionalisasi'] as $r)
                                                <h6 style="color: #dc3545;">{{$r}}</h6>
                                                <hr class="mt-3">
                                                @endforeach
                                            </div>
                                        </div>

                                        <h6>8. Tujuan : <br />{!!$tor[$t]->tujuan!!}</h6>
                                        <?php if (!empty($komentar['tujuan'])) { ?>
                                            <p><a id="validasi" class="badge badge-danger btn-sm shadow" data-toggle="collapse" href="#komentujuan" role="button" aria-expanded="false" aria-controls="collapseExample">
                                                    Lihat Komentar
                                                </a></p>
                                        <?php } else { ?>
                                            <br />
                                        <?php } ?>
                                        <div class="container collapse col-6" id="komentujuan">
                                            <div id="validasi" class="container ml-3">
                                                @foreach($komentar['tujuan'] as $tujuan)
                                                <h6 style="color: #dc3545;">{{$tujuan}}</h6>
                                                <hr class="mt-3">
                                                @endforeach
                                            </div>
                                        </div>

                                        <h6>9. Mekanisme dan Rancangan : <br />{!!$tor[$t]->mekanisme!!}</h6>
                                        <?php if (!empty($komentar['mekanisme'])) { ?>
                                            <p><a id="validasi" class="badge badge-danger btn-sm shadow" data-toggle="collapse" href="#komenmekanisme" role="button" aria-expanded="false" aria-controls="collapseExample">
                                                    Lihat Komentar
                                                </a></p>
                                        <?php } else { ?>
                                            <br />
                                        <?php } ?>
                                        <div class="container collapse col-6" id="komenmekanisme">
                                            <div id="validasi" class="container ml-3">
                                                @foreach($komentar['mekanisme'] as $mekanisme)
                                                <h6 style="color: #dc3545;">{{$mekanisme}}</h6>
                                                <hr class="mt-3">
                                                @endforeach
                                            </div>
                                        </div>

                                        <h6>10. Jadwal Pelaksanaan : <br />
                                            <?php
                                            foreach ($roles as $roles1) {
                                                if ($roles1->id == Auth::user()->role) {
                                                    $RoleLogin = $roles1->name;
                                                }
                                            }
                                            ?>
                                            <!-- TAMBAH JADWAL -->

                                            <?php
                                            if (!empty($komponen_jadwal)) {
                                            ?>
                                                <table class="table table-bordered">
                                                    <thead>
                                                        <tr>
                                                            <th scope="col" rowspan="2" class="align-middle">Komponen Input
                                                                <?php if ($disetujui != 1 && $tor[$t]->nama_pic == Auth::user()->name || $RoleLogin == "Prodi" || $RoleLogin == "Admin") { ?>
                                                                    <?php if ($pengajuan == 0 || $dalamRevisi == 1) { ?>
                                                                        <a id="validasi" class="iq-bg-primary rounded rounded mt-3 mb-1" style="padding: 0.5%;margin: top 12px;" data-toggle="modal" title="Tambah Jadwal" data-original-title="Tambah Jadwal" data-target="#tambah_jadwal<?= $tor[$t]->id ?>" href="">
                                                                            <i class="ri-user-add-line"></i> Tambah Jadwal<br />
                                                                        </a>
                                                                    <?php } ?>
                                                                <?php } ?>
                                                            </th>
                                                            <th scope="col" colspan="12" style="text-align: center;">{{substr($tor[$t]->tgl_mulai_pelaksanaan,0,4)}}</th>
                                                            <th id="validasi"></th>
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
                                                            <td id="validasi">
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
                                                                    <?php if ($disetujui != 1 && $tor[$t]->nama_pic == Auth::user()->name || $RoleLogin == "Prodi" || $RoleLogin == "Admin") { ?>
                                                                        <td id="validasi">
                                                                            <?php if ($pengajuan == 0 || $dalamRevisi == 1) { ?>
                                                                                <div class="flex align-items-center list-user-action">
                                                                                    <a class="iq-bg-primary rounded" style="padding: 1%;" data-toggle="modal" data-placement="top" title="Edit Jadwal" data-original-title="Edit Jadwal" data-target="#edit_jadwal<?= $komponen_jadwal[$j]->id ?>" href=""><i class="ri-pencil-line"></i></a>
                                                                                    <a class="jadwal-confirm iq-bg-danger rounded" style="padding: 1%;margin:2%" href="{{url('/tor/delete_jadwal/'.base64_encode($komponen_jadwal[$j]->id))}}" data-toggle="tooltip" title="Delete">
                                                                                        <i class="ri-delete-bin-line"></i>
                                                                                    </a>
                                                                                </div>
                                                                            <?php } ?>
                                                                            <!-- Modal Edit Jadwal -->
                                                                            <div class="modal fade" tabindex="-1" role="dialog" id="edit_jadwal<?= $komponen_jadwal[$j]->id ?>">
                                                                                <div class="modal-dialog" role="document">
                                                                                    <div class="modal-content">
                                                                                        <div class="modal-header">
                                                                                            <h5 class="modal-title">Edit Jadwal Pelaksanaan</h5>
                                                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                                                <span aria-hidden="true">&times;</span>
                                                                                            </button>
                                                                                        </div>
                                                                                        <div class="modal-body">
                                                                                            <form class="form-horizontal" method="post" action="{{ url('/tor/update_jadwal/'.$komponen_jadwal[$j]->id) }}">
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
                                                                                                <div class="form-group ">
                                                                                                    <label>Komponen</label>
                                                                                                    <textarea class="form-control" name="komponen" id="komponen" value="{{old('komponen',$komponen_jadwal[$j]->komponen)}}" rows="2">{{$komponen_jadwal[$j]->komponen}}
                                                                                                    </textarea>
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
                                                                                                                <option {{ $ba==$komponen_jadwal[$j]->bulan_awal ? 'selected' : ''}} value="{{$ba}}">{{$bulan[$ba-1]}}</option>
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
                                                                                                                <option {{ $br==$komponen_jadwal[$j]->bulan_akhir ? 'selected' : ''}} value="{{$br}}">{{$bulan[$br-1]}}</option>
                                                                                                            <?php } ?>
                                                                                                        </select>
                                                                                                    </div>
                                                                                                    <input name="created_at" id="created_at" type="hidden" value="<?= $komponen_jadwal[$j]->created_at ?>">
                                                                                                    <input name="updated_at" id="updated_at" type="hidden" value="<?= date('Y-m-d H:i:s') ?>">
                                                                                                </div>
                                                                                                <button class="btn btn-primary mr-1" type="submit">Submit</button>
                                                                                            </form>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </td>
                                                                    <?php } ?>
                                                                </tr>
                                                        <?php }
                                                        }
                                                        ?>
                                                    </tbody>
                                                </table>
                                            <?php } ?>
                                        </h6><br />
                                        <?php if (!empty($komentar['jadwal'])) { ?>
                                            <p><a id="validasi" class="badge badge-danger btn-sm shadow" data-toggle="collapse" href="#komenjadwal" role="button" aria-expanded="false" aria-controls="collapseExample">
                                                    Lihat Komentar
                                                </a></p>
                                        <?php } else { ?>
                                            <br />
                                        <?php } ?>
                                        <div class="container collapse col-6" id="komenjadwal">
                                            <div class="container ml-3">
                                                @foreach($komentar['jadwal'] as $jadwal)
                                                <h6 style="color: #dc3545;">{{$jadwal}}</h6>
                                                <hr class="mt-3">
                                                @endforeach
                                            </div>
                                        </div>


                                        <h6>11. Indikator Kinerja Utama : <br />
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
                                        <?php if (!empty($komentar['iku'])) { ?>
                                            <p><a id="validasi" class="badge badge-danger btn-sm shadow" data-toggle="collapse" href="#komeniku" role="button" aria-expanded="false" aria-controls="collapseExample">
                                                    Lihat Komentar
                                                </a></p>
                                        <?php } else { ?>
                                            <br />
                                        <?php } ?>
                                        <div class="container collapse col-6" id="komeniku">
                                            <div id="validasi" class="container ml-3">
                                                @foreach($komentar['iku'] as $iku)
                                                <h6 style="color: #dc3545;">{{$iku}}</h6>
                                                <hr class="mt-3">
                                                @endforeach
                                            </div>
                                        </div>


                                        <h6>12. Indikator Kinerja Kegiatan : <br />
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
                                        </h6> <?php if (!empty($komentar['ik'])) { ?>
                                            <p><a id="validasi" class="badge badge-danger btn-sm shadow" data-toggle="collapse" href="#komenik" role="button" aria-expanded="false" aria-controls="collapseExample">
                                                    Lihat Komentar
                                                </a></p>
                                        <?php } else { ?>
                                            <br />
                                        <?php } ?>
                                        <div class="container collapse col-6" id="komenik">
                                            <div id="validasi" class="container ml-3">
                                                @foreach($komentar['ik'] as $ik)
                                                <h6 style="color: #dc3545;">{{$ik}}</h6>
                                                <hr class="mt-3">
                                                @endforeach
                                            </div>
                                        </div>

                                        <h6>13. keberlanjutan : <br />{!!$tor[$t]->keberlanjutan!!}</h6>
                                        <?php if (!empty($komentar['keberlanjutan'])) { ?>
                                            <p><a id="validasi" class="badge badge-danger btn-sm shadow" data-toggle="collapse" href="#komenkeberlanjutan" role="button" aria-expanded="false" aria-controls="collapseExample">
                                                    Lihat Komentar
                                                </a></p>
                                        <?php } else { ?>
                                            <br />
                                        <?php } ?>
                                        <div class="container collapse col-6" id="komenkeberlanjutan">
                                            <div id="validasi" class="container ml-3">
                                                @foreach($komentar['keberlanjutan'] as $keberlanjutan)
                                                <h6 style="color: #dc3545;">{{$keberlanjutan}}</h6>
                                                <hr class="mt-3">
                                                @endforeach
                                            </div>
                                        </div>

                                        <h6>14. Penanggung Jawab : <br />{{$tor[$t]->nama_pic}}</h6>
                                        <?php if (!empty($komentar['penanggung'])) { ?>
                                            <p><a id="validasi" class="badge badge-danger btn-sm shadow" data-toggle="collapse" href="#komenpenanggung" role="button" aria-expanded="false" aria-controls="collapseExample">
                                                    Lihat Komentar
                                                </a></p>
                                        <?php } else { ?>
                                            <br />
                                        <?php } ?>
                                        <div class="container collapse col-6" id="komenpenanggung">
                                            <div id="validasi" class="container ml-3">
                                                @foreach($komentar['penanggung'] as $penanggung)
                                                <h6 style="color: #dc3545;">{{$penanggung}}</h6>
                                                <hr class="mt-3">
                                                @endforeach
                                            </div>
                                        </div>
                                        <h6 id="validasi">15. Total Ajuan : <br />{{"Rp. ".number_format($tor[$t]->jumlah_anggaran,2,',',',')}}</h6><br />
                                        <!-- R A B -->
                                        @include('perencanaan/rab/lengkapirab')
                                        <?php if (!empty($komentar['rab'])) { ?>
                                            <p><a id="validasi" class="badge badge-danger btn-sm shadow" data-toggle="collapse" href="#komenrab" role="button" aria-expanded="false" aria-controls="collapseExample">
                                                    Lihat Komentar
                                                </a></p>
                                        <?php } else { ?>
                                            <br />
                                        <?php } ?>
                                        <div class="container collapse col-6" id="komenrab">
                                            <div id="validasi" class="container ml-3">
                                                @foreach($komentar['rab'] as $rabs)
                                                <h6 style="color: #dc3545;">{{$rabs}}</h6>
                                                <hr class="mt-3">
                                                @endforeach
                                            </div>
                                        </div>

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
                                                            <div class="form-group ">
                                                                <label>Komponen Jadwal</label>
                                                                <textarea class="form-control" id="komponen" name="komponen" rows="2" placeholder="komponen..."></textarea>
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
                                                            <input name="created_at" id="created_at" type="hidden" value="<?= date('Y-m-d H:i:s') ?>">
                                                            <input name="updated_at" id="updated_at" type="hidden" value="<?= date('Y-m-d H:i:s') ?>">
                                                            <br />
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
                                        <br />
                                        <hr>


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
                        </div>
                        <br />
                        <button id="buttonremove1" type="button" class="btn btn-primary mb-3" data-toggle="tooltip" data-placement="top" title="" data-original-title="Remove Komentar Sebelum Diprint" onclick="remove()">REMOVE</button>
                        <button type="button" id="buttonremove2" class="btn btn-primary mb-3" onclick="printDiv()">PRINT</button>

                <?php }
                                } ?>
                    </div>
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
            document.getElementById("buttonremove1").remove();
            document.getElementById("buttonremove2").remove();
            window.print();
        };
    </script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script>
        $('.jadwal-confirm').on('click', function(event) {
            event.preventDefault();
            const url = $(this).attr('href');
            swal({
                title: 'Are you sure?',
                text: 'This record and it`s details will be permanantly deleted!',
                icon: 'warning',
                buttons: ["Cancel", "Yes!"],
            }).then(function(value) {
                if (value) {
                    window.location.href = url;
                }
            });
        });
    </script>
    <!-- <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script>
        $('.anggaran-confirm').on('click', function(event) {
            event.preventDefault();
            const url = $(this).attr('href');
            swal({
                title: 'Are you sure?',
                text: 'This record and it`s details will be permanantly deleted!',
                icon: 'warning',
                buttons: ["Cancel", "Yes!"],
            }).then(function(value) {
                if (value) {
                    window.location.href = url;
                }
            });
        });
    </script> -->
    @include('dashboards/users/layouts/footer')

</body>

</html>