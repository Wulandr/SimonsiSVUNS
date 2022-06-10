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
                <?php
                // Ambil data Jumlah Anggaran dari TOR
                $total_anggaran = 0;
                foreach ($tor as $data) {
                    $total_anggaran += $data['jumlah_anggaran'];
                }
                
                // Ambil data Jumlah Realisasi dari SPJ
                $total_realisasi = 0;
                foreach ($spj as $data) {
                    $total_realisasi += $data['nilai_total'];
                }
                ?>
                <div class="col-sm-6 col-md-6 col-lg-4">
                    <div class="iq-card iq-card-block iq-card-stretch iq-card-height">
                        <div class="iq-card-body iq-box-relative">
                            <div class="iq-box-absolute icon iq-icon-box rounded-circle iq-bg-primary">
                                <i class="ri-focus-2-line"></i>
                            </div>
                            <p class="text-secondary">Total Anggaran</p>
                            <div class="d-flex align-items-center justify-content-between">
                                <h4><b>{{ 'Rp ' . number_format($total_anggaran) }}</b></h4>
                                <div id="iq-chart-box1"></div>
                                <span class="text-primary"><b> 100.00 % <i class="ri-arrow-up-fill"></i></b></span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-md-6 col-lg-4">
                    <div class="iq-card iq-card-block iq-card-stretch iq-card-height">
                        <div class="iq-card-body iq-box-relative">
                            <div class="iq-box-absolute icon iq-icon-box rounded-circle iq-bg-danger">
                                <i class="ri-database-2-line"></i>
                            </div>
                            <p class="text-secondary">Total Realisasi</p>
                            <div class="d-flex align-items-center justify-content-between">
                                <h4><b>{{ 'Rp ' . number_format($total_realisasi) }}</b></h4>
                                <div id="iq-chart-box2"></div>
                                <span class="text-danger"><b> +0.36% <i class="ri-arrow-up-fill"></i></b></span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-md-6 col-lg-4">
                    <div class="iq-card iq-card-block iq-card-stretch iq-card-height">
                        <div class="iq-card-body iq-box-relative">
                            <div class="iq-box-absolute icon iq-icon-box rounded-circle iq-bg-warning">
                                <i class="ri-pie-chart-2-line"></i>
                            </div>
                            <p class="text-secondary">Total Sisa</p>
                            <div class="d-flex align-items-center justify-content-between">
                                <h4><b>{{ 'Rp ' . number_format($total_anggaran - $total_realisasi) }}</b></h4>
                                <div id="iq-chart-box3"></div>
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
                                            <th width="12%">Anggaran</th>
                                            <th width="12%">Realisasi</th>
                                            <th width="12%">Sisa</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <?php
                                            $no = 0;
                                            $realisai = 0;
                                            for ($m = 0; $m < count($tor); $m++) { 
                                                $anggaran = $tor[$m]->jumlah_anggaran;
                                                for ($s = 0; $s < count($spj); $s++) { 
                                                    if ($spj[$s]->id_tor == $tor[$m]->id) {
                                                        $realisasi = $spj[$s]->nilai_total;
                                    
                                            $sisa = $anggaran - $realisasi; ?>

                                            <td>{{ $no + 1 }}</td><?php $no++; ?>
                                            <td class="text-left">{{ $tor[$m]->nama_kegiatan }}</td>
                                            <td>{{ $tor[$m]->nama_pic }}</td>
                                            <td>{{ 'Rp ' . number_format($anggaran) }}</td>
                                            <td>{{ 'Rp ' . number_format($realisasi) }}</td>
                                            <td>{{ 'Rp ' . number_format($sisa) }}</td>
                                        </tr>
                                        <?php }}} ?>
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
