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
                        <div class="iq-card-header d-flex justify-content-center">
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
                                            <th width="10%">Anggaran</th>
                                            <th width="10%">Realisasi</th>
                                            <th width="10%">Sisa</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <?php 
                                            $no = 0;
                                            for ($m = 0; $m < count($tor); $m++) { 
                                                $ada=0; //sudah diajukan apa belum 
                                                //  P R O D I 
                                                for ($p = 0; $p < count($prodi); $p++) {
                                                    if ($tor[$m]->id_unit == $prodi[$p]->id) {
                                                        $prodiTor = $prodi[$p]->nama_unit;
                                                    }
                                                }
                                            $anggaran = $tor[$m]->jumlah_anggaran;
                                            $realisasi = 0;
                                            $sisa = $anggaran - $anggaran; ?>


                                            <td>{{ $no + 1 }}</td><?php $no++; ?>
                                            <td class="text-left">{{ $tor[$m]->nama_kegiatan }}</td>
                                            <td>{{ $tor[$m]->nama_pic }}</td>
                                            <td>{{ 'Rp ' . number_format($anggaran) }}</td>
                                            <td>{{ 'Rp ' . number_format($realisasi) }}</td>
                                            <td>{{ 'Rp ' . number_format($sisa) }}</td>
                                        </tr>
                                        <?php }?>
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
