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
                foreach ($spj as $nilai) {
                    $total_realisasi += $nilai['nilai_total'];
                }
                
                // Ambil data Sisa
                $total_sisa = $total_anggaran - $total_realisasi;
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
                                <span class="text-primary"><b>100.00 %</b></span>
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
                                <span class="text-danger">
                                    <b>{{ number_format(($total_realisasi / $total_anggaran) * 100, 2, '.', '') }}%
                                    </b>
                                </span>
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
                                <h4><b>{{ 'Rp ' . number_format($total_sisa) }}</b></h4>
                                <div id="iq-chart-box3"></div>
                                <span
                                    class="text-warning"><b>{{ number_format(($total_sisa / $total_anggaran) * 100, 2, '.', '') }}%</b></span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-12">
                    <div class="iq-card">
                        <div class="iq-card-header d-flex justify-content-center table-primary">
                            <div class="iq-header-title">
                                <h4 class="card-title">REKAPITULASI AJUAN PER TW</h4>
                            </div>
                            <div class="iq-card-header-toolbar d-flex align-items-center">
                                <div class="dropdown">
                                    <span class="dropdown-toggle text-primary" id="dropdownMenuButton5"
                                        data-toggle="dropdown">
                                        <i class="ri-more-fill"></i>
                                    </span>
                                    <div class="dropdown-menu dropdown-menu-right"
                                        aria-labelledby="dropdownMenuButton5">
                                        <a class="dropdown-item" href="#"><i
                                                class="ri-printer-fill mr-2"></i>Print</a>
                                        <a class="dropdown-item" href="#"><i
                                                class="ri-file-download-fill mr-2"></i>Download</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="iq-card-body">
                            <div id="table" class="table-editable">
                                <table id="datatable"
                                    class="table table-bordered table-responsive-md table-hover text-center">
                                    <thead>
                                        <tr class="bg-primary">
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
                                            for ($m = 0; $m < count($tor); $m++) { 
                                                $realisasi = 0;
                                                $sisa = 0;
                                                $anggaran = $tor[$m]->jumlah_anggaran;
                                            ?>
                                            <td>{{ $no + 1 }}</td><?php $no++; ?>
                                            <td class="text-left">{{ $tor[$m]->nama_kegiatan }}</td>
                                            <td>{{ $tor[$m]->nama_pic }}</td>
                                            <td>{{ 'Rp ' . number_format($anggaran) }}</td>
                                            @foreach ($spj as $nominal)
                                                @if ($tor[$m]->id == $nominal->id_tor)
                                                    <?php $realisasi = $nominal->nilai_total; ?>
                                                    <?php $sisa = $anggaran - $realisasi; ?>
                                                @endif
                                            @endforeach
                                            <td>{{ 'Rp ' . number_format($realisasi) }}</td>
                                            <td>{{ 'Rp ' . number_format($sisa) }}</td>
                                        </tr>
                                        <?php
                                        } 
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.datatables.net/1.12.0/js/jquery.dataTables.js"></script>
    <script>
        $(document).ready(function() {
            $.noConflict();
            $('#datatable').DataTable();
        });
    </script>
    <!-- Footer -->
    @include('dashboards/users/layouts/footer')

    </html>
