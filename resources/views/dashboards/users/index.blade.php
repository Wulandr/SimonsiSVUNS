<?php

use Illuminate\Support\Facades\Auth;

?>
@include('dashboards/users/layouts/script')

<body>
    <div id="loading">
        <div id="loading-center">
        </div>
    </div>

    @include('dashboards/users/layouts/navbar')
    @include('dashboards/users/layouts/sidebar')
    <!-- Page Content  -->
    <div id="content-page" class="content-page">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-6 col-md-6 col-lg-3">
                    <div class="iq-card iq-card-block iq-card-stretch iq-card-height">
                        <div class="iq-card-body iq-box-relative">
                            <div class="iq-box-absolute icon iq-icon-box rounded-circle iq-bg-primary">
                                <i class="ri-focus-2-line"></i>
                            </div>
                            <p class="text-secondary">Total Anggaran</p>
                            <div class="d-flex align-items-center justify-content-between">
                                <h4><b>$18 378</b></h4>
                                <div id="iq-chart-box1"></div>
                                <span class="text-primary"><b> +14% <i class="ri-arrow-up-fill"></i></b></span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-md-6 col-lg-3">
                    <div class="iq-card iq-card-block iq-card-stretch iq-card-height">
                        <div class="iq-card-body iq-box-relative">
                            <div class="iq-box-absolute icon iq-icon-box rounded-circle iq-bg-danger">
                                <i class="ri-database-2-line"></i>
                            </div>
                            <p class="text-secondary">Total Realisasi</p>
                            <div class="d-flex align-items-center justify-content-between">
                                <h4><b>45</b></h4>
                                <div id="iq-chart-box2"></div>
                                <span class="text-danger"><b> +0.36% <i class="ri-arrow-up-fill"></i></b></span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-md-6 col-lg-3">
                    <div class="iq-card iq-card-block iq-card-stretch iq-card-height">
                        <div class="iq-card-body iq-box-relative">
                            <div class="iq-box-absolute icon iq-icon-box rounded-circle iq-bg-warning">
                                <i class="ri-pie-chart-2-line"></i>
                            </div>
                            <p class="text-secondary">Total Sisa</p>
                            <div class="d-flex align-items-center justify-content-between">
                                <h4><b>60</b></h4>
                                <div id="iq-chart-box4"></div>
                                <span class="text-warning"><b> +0.45% <i class="ri-arrow-up-fill"></i></b></span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-12">
                    <div class="iq-card">
                        <div class="iq-card-header d-flex justify-content-between">
                            <div class="iq-header-title">
                                <h4 class="card-title">REKAPITULASI AJUAN PER TW</h4>
                            </div>
                        </div>
                        <div class="iq-card-body">
                            <div id="table" class="table-editable">
                                <table class="table table-bordered table-responsive-md table-hover text-center">
                                    <thead>
                                        <tr class="table-info">
                                            <th>No</th>
                                            <th>Nama Kegiatan</th>
                                            <th>Penanggungjawab</th>
                                            <th>Anggaran</th>
                                            <th>Realisasi</th>
                                            <th>Sisa</th>
                                        </tr>
                                    </thead>
                                    <?php
                                    $jml_ang_ajuan = 0;
                                    $jml_ang_disetujui = 0;
                                    $statusTor2 = [];
                                    $count1 = 0;
                                    $count2 = 0;
                                    $cekId = 0;
                                    $i2 = 0;
                                    $i3 = 0;
                                    $udah = 1;
                                    $disetujui = [
                                        'tor' => [],
                                        'anggaran' => [],
                                    ]; //apakah ketiga wd sudah validasi?
                                    $tordisetujui = [];
                                    for ($m2 = 0; $m2 < count($tor); $m2++) {
                                        $i2 = 0;
                                        for ($tr2 = 0; $tr2 < count($trx_status_tor); $tr2++) {
                                            if ($trx_status_tor[$tr2]->id_tor == $tor[$m2]->id) {
                                                $cekId == $tor[$m2]->id;
                                                for ($s2 = 0; $s2 < count($status); $s2++) {
                                                    if ($trx_status_tor[$tr2]->id_status == $status[$s2]->id) {
                                                        $statusTor2[$tor[$m2]->id][$i2] = $status[$s2]->nama_status . ' , ';
                                                        for ($u5 = 0; $u5 < count($users); $u5++) {
                                                            if ($trx_status_tor[$tr2]->create_by == $users[$u5]->id) {
                                                                for ($r5 = 0; $r5 < count($roles); $r5++) {
                                                                    if ($users[$u5]->role == $roles[$r5]->id) {
                                                                        if ($trx_status_tor[$tr2]->create_by == $users[$u5]->id) {
                                                                            if ($users[$u5]->role == $roles[$r5]->id) {
                                                                                if ($status[$s2]->nama_status == 'Validasi' && $roles[$r5]->name == 'WD 1') {
                                                                                    $disetujui['anggaran'][$i3] = $tor[$m2]->jumlah_anggaran;
                                                                                    $disetujui['tor'][$i3] = $tor[$m2]->id;
                                                                                    'TOR' . $tor[$m2]->id . ' -' . '[' . $tor[$m2]->id . '[[' . $i2 . '] ' . $statusTor2[$tor[$m2]->id][$i2] . '<br />';
                                                                                    $i3 += 1;
                                                                                }
                                                                                $i2 += 1;
                                                                            }
                                                                        }
                                                                    }
                                                                }
                                                            }
                                                        }
                                                    }
                                                }
                                                if ($tor[$m2]->id != $cekId) {
                                                    $count1 += 1;
                                                    $jml_ang_ajuan += $tor[$m2]->jumlah_anggaran;
                                                    $cekId = $tor[$m2]->id;
                                                }
                                            }
                                        }
                                    }
                                    ?>

                                    <tbody>
                                        <tr>
                                            <?php 
                                            $no = 0;
                                            for ($m = 0; $m < count($tor); $m++) { 
                                                $ada=0; //sudah diajukan apa belum 
                                                //  P R O D I 
                                                $prodiTor = "";
                                                for ($p = 0; $p < count($prodi); $p++) {
                                                    if ($tor[$m]->id_unit == $prodi[$p]->id) {
                                                        $prodiTor = $prodi[$p]->nama_unit;
                                                    }
                                                }
                                            $anggaran = $tor[$m]->jumlah_anggaran;
                                            $sisa = $anggaran - $anggaran; ?>

                                            <?php if ($ada == 1) {  ?>
                                            <td>{{ $no + 1 }}</td><?php $no++; ?>
                                            <td>{{ $tor[$m]->nama_kegiatan }}</td>
                                            <td>{{ $tor[$m]->nama_pic }}</td>
                                            <td>{{ 'Rp. ' . number_format($anggaran, 2, ',', ',') }}
                                            </td>
                                            <td>{{ 'Rp. ' . number_format($anggaran, 2, ',', ',') }}
                                            </td>
                                            <td>{{ 'Rp. ' . number_format($sisa, 2, ',', ',') }}
                                            </td>
                                        </tr>
                                        <?php } }?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Footer -->
    @include('dashboards/users/layouts/footer')

</body>

</html>
