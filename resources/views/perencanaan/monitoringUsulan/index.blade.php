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

                            <div class="iq-card iq-card-block iq-card-stretch iq-card-height">
                                <div class="iq-card-header d-flex justify-content-between">
                                    <div class="iq-header-title">
                                        <h4 class="card-title">Monitoring Usulan</h4>
                                    </div>
                                    <div class="iq-card-header-toolbar d-flex align-items-center">
                                        <div class="dropdown">
                                            <span class="dropdown-toggle text-primary" id="dropdownMenuButton5" data-toggle="dropdown">
                                                <i class="ri-more-fill"></i>
                                            </span>
                                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuButton5">
                                                <a class="dropdown-item" href="#"><i class="ri-printer-fill mr-2"></i>Print</a>
                                                <a class="dropdown-item" href="#"><i class="ri-file-download-fill mr-2"></i>Download</a>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                                <div class="iq-card-body">
                                    <!-- A N G G A R A N -->
                                    <div class="row">
                                        <div class="col-sm-6 col-md-6 col-lg-5">
                                            <div class="iq-card iq-card-block iq-card-stretch iq-card-height">
                                                <div class="iq-card-body iq-box-relative">
                                                    <div class="iq-box-absolute icon iq-icon-box rounded-circle iq-bg-warning">
                                                        <i class="ri-focus-2-line"></i>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col">
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
                                                                // echo "<br />";
                                                            }
                                                            ?>
                                                            <p class="text-secondary">Jumlah Anggaran Ajuan</p>
                                                            <div class="d-flex align-items-center justify-content-between" style="position: relative;">
                                                                <?php
                                                                $x = 0; //agar array tidakduplicate
                                                                for ($d = 0; $d < count($disetujui['tor']); $d++) {
                                                                    if ($disetujui['tor'][$d] != $x) {
                                                                        // echo ($disetujui['tor'][$d]);
                                                                        // echo ($disetujui['anggaran'][$d]);
                                                                        $jml_ang_disetujui += $disetujui['anggaran'][$d];
                                                                        $count2 += 1;
                                                                    }

                                                                    $x = $disetujui['tor'][$d];
                                                                }
                                                                ?>
                                                                <h4><b>{{ 'Rp. ' . number_format($jml_ang_ajuan - $jml_ang_disetujui) }}</b>
                                                                </h4>
                                                            </div>
                                                        </div>
                                                        <div class="col">
                                                            <p class="text-secondary">Record Count</p>
                                                            <div class="d-flex align-items-center justify-content-between" style="position: relative;">
                                                                <h4><b>{{ $count1 - $count2 }}</b></h4>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-6 col-md-6 col-lg-6">
                                            <div class="iq-card iq-card-block iq-card-stretch iq-card-height">
                                                <div class="iq-card-body iq-box-relative">
                                                    <div class="iq-box-absolute icon iq-icon-box rounded-circle iq-bg-success">
                                                        <i class="ri-pantone-line"></i>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col">
                                                            <p class="text-secondary">Jumlah Anggaran Disetujui</p>
                                                            <div class="d-flex align-items-center justify-content-between" style="position: relative;">
                                                                <h4><b>{{ 'Rp. ' . number_format($jml_ang_disetujui) }}</b>
                                                                </h4>
                                                            </div>
                                                        </div>
                                                        <div class="col">
                                                            <p class="text-secondary">Record Count</p>
                                                            <div class="d-flex align-items-center justify-content-between" style="position: relative;">
                                                                <h4><b>{{ $count2 }}</b></h4>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="table-responsive">
                                        <div class="form-group row float-right mb-3 mr-2">
                                            <span class="table-add float-right mb-3 mr-2">
                                                <div class="form-group row">
                                                    <form action="{{ url('/monitoringUsulan/filterTw') }}" method="GET">
                                                        <div class="row mr-3">
                                                            <div class="col mr-1">
                                                                <select class="form-control filter sm-8" name="filterTw" id="filterTw">
                                                                    <option value="0">All</option>
                                                                    <?php for ($tw1 = 0; $tw1 < count($tw); $tw1++) {
                                                                        foreach ($tahun as $thn) {
                                                                            if ($thn->is_aktif == 1) {
                                                                                if ($thn->tahun == substr($tw[$tw1]->triwulan, 0, 4)) {  ?>
                                                                                    <option value="{{$tw[$tw1]->id}}" {{$filtertw==$tw[$tw1]->id ? 'selected':''}}>{{$tw[$tw1]->triwulan}}</option>
                                                                    <?php }
                                                                            }
                                                                        }
                                                                    } ?>
                                                                </select>
                                                            </div>
                                                            <input type="submit" class="btn btn-primary btn-sm" value="Filter">
                                                        </div>
                                                    </form>
                                                </div>
                                            </span>
                                        </div>
                                        <table id="monitoring" class="table table-striped responsive" style="display: block;
    overflow-y: auto;
    white-space: nowrap;
  max-height:500px;">
                                            <thead class="bg-primary">
                                                <tr>
                                                    <th>No.</th>
                                                    <th scope="col">Prodi</th>
                                                    <th scope="col">Judul Kegiatan</th>
                                                    <th scope="col">Tanggal Mulai</th>
                                                    <th scope="col">Nama PIC</th>
                                                    <th scope="col">Anggaran Ajuan</th>
                                                    <th scope="col">Status</th>
                                                    <th scope="col">Tor</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                $no = 0;
                                                for ($m = 0; $m < count($tor); $m++) {
                                                    $ada = 0; //sudah diajukan apa belum
                                                    //  P R O D I 
                                                    $prodiTor = "";
                                                    for ($p = 0; $p < count($prodi); $p++) {
                                                        if ($tor[$m]->id_unit == $prodi[$p]->id) {
                                                            $prodiTor = $prodi[$p]->nama_unit;
                                                        }
                                                    }

                                                    // S T A T U S

                                                    $statusTor = [
                                                        [
                                                            'tor' => '',
                                                            'status' => '',
                                                            'statusMemo' => '',
                                                            'statusLPJ' => '',
                                                            'statusSPJ' => '',
                                                        ]
                                                    ];
                                                    for ($tr = 0; $tr < count($trx_status_tor); $tr++) {
                                                        if ($trx_status_tor[$tr]->id_tor == $tor[$m]->id) {
                                                            for ($s = 0; $s < count($status); $s++) {
                                                                if ($trx_status_tor[$tr]->id_status == $status[$s]->id) {
                                                                    $ada = 1;
                                                                    $statusTor[0]['tor'] = "TOR" . $tor[$m]->id;
                                                                    for ($u = 0; $u < count($users); $u++) {
                                                                        if ($trx_status_tor[$tr]->create_by == $users[$u]->id) {
                                                                            for ($r = 0; $r < count($roles); $r++) {
                                                                                if ($users[$u]->role == $roles[$r]->id) {
                                                                                    $statusTor[0]['status'] = $status[$s]->nama_status . " - " . $roles[$r]->name;
                                                                                }
                                                                            }
                                                                        }
                                                                    }
                                                                }
                                                            }
                                                        }
                                                    }

                                                    // APAKAH SUDAH ADA MEMO CAIR ?
                                                    for ($dm = 0; $dm < count($dokMemo); $dm++) {
                                                        if ($dokMemo[$dm]->id_tor == $tor[$m]->id && $dokMemo[$dm]->jenis == "Memo Cair") {
                                                            $statusTor[0]['statusMemo'] = "Memo sudah diunggah";
                                                        }
                                                    }

                                                    // STATUS LPJ DAN SPJ ?
                                                    for ($tr2 = 0; $tr2 < count($trx_status_keu); $tr2++) {
                                                        if ($trx_status_keu[$tr2]->id_tor == $tor[$m]->id) {
                                                            for ($s2 = 0; $s2 < count($status_keu); $s2++) {
                                                                if ($trx_status_keu[$tr2]->id_status == $status_keu[$s2]->id) {
                                                                    if ($status_keu[$s2]->kategori == 'LPJ') {
                                                                        $statusTor[0]['statusLPJ'] = $status_keu[$s2]->nama_status . " LPJ";
                                                                    }
                                                                    if ($status_keu[$s2]->kategori == 'SPJ') {
                                                                        $statusTor[0]['statusSPJ'] = $status_keu[$s2]->nama_status . " SPJ";
                                                                    }
                                                                    // if ($status_keu[$s2]->kategori == 'Memo Cair') {
                                                                    //     $statusTor[0]['statusMemo'] = "Memo sudah diunggah";
                                                                    // }
                                                                    if ($status_keu[$s2]->kategori == 'Persekot Kerja') {
                                                                        $statusTor[0]['persekotKerja'] = $status_keu[$s2]->nama_status . " Persekot Kerja";
                                                                    }
                                                                }
                                                            }
                                                        }
                                                    }

                                                ?>
                                                    <?php if ($ada == 1) { ?>
                                                        <tr>
                                                            <td>{{ $no + 1 }}</td><?php $no++ ?>
                                                            <td>{{ $prodiTor }}</td>
                                                            <td>{{ $tor[$m]->nama_kegiatan }}</td>
                                                            <td><?php
                                                                $date = date_create($tor[$m]->tgl_mulai_pelaksanaan);
                                                                echo date_format($date, 'M d, Y'); ?></td>
                                                            <td>{{ $tor[$m]->nama_pic }}</td>
                                                            <td>{{ 'Rp. ' . number_format($tor[$m]->jumlah_anggaran, 2, ',', ',') }}
                                                            </td>
                                                            <td>
                                                                <?php if (empty($statusTor[0]['statusMemo'])) { ?>
                                                                    <div class="badge badge-pill {{ $statusTor[0]['status'] == "Validasi - WD 1" ?  'badge-success'  : 'badge-secondary' }}">{{ $statusTor[0]['status'] }}</div>
                                                                <?php } elseif (!empty($statusTor[0]['statusMemo']) && empty($statusTor[0]['persekotKerja'])) { ?>
                                                                    <div class="badge badge-pill badge-warning">{{ $statusTor[0]['statusMemo'] }}</div>

                                                                <?php } elseif (!empty($statusTor[0]['statusMemo']) && !empty($statusTor[0]['persekotKerja']) && empty($statusTor[0]['statusSPJ']) && empty($statusTor[0]['statusLPJ'])) { ?>
                                                                    <div class="badge badge-pill badge-warning">{{ $statusTor[0]['persekotKerja'] }}</div>

                                                                <?php } elseif (!empty($statusTor[0]['statusSPJ']) && empty($statusTor[0]['statusLPJ'])) { ?>
                                                                    <div class="badge badge-pill badge-primary">{{ $statusTor[0]['statusSPJ'] }}</div>

                                                                <?php } elseif (empty($statusTor[0]['statusSPJ']) && !empty($statusTor[0]['statusLPJ'])) { ?>
                                                                    <div class="badge badge-pill badge-primary">{{ $statusTor[0]['statusLPJ']}}</div>

                                                                <?php } elseif (!empty($statusTor[0]['statusSPJ']) && !empty($statusTor[0]['statusLPJ'])) { ?>
                                                                    <div class="badge badge-pill badge-primary">{{ $statusTor[0]['statusSPJ'] ." & ".$statusTor[0]['statusLPJ']}}</div>
                                                                <?php } ?>
                                                            </td>
                                                            <td><a href="{{ url('/detailtor/' . $tor[$m]->id) }}">Detail</a>
                                                            </td>
                                                        </tr>
                                                    <?php } ?>
                                                <?php } ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Wrapper END -->
    <!-- Footer -->
    <footer class="iq-footer">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-6">
                    <ul class="list-inline mb-0">
                        <li class="list-inline-item"><a href="privacy-policy.html">Privacy Policy</a></li>
                        <li class="list-inline-item"><a href="terms-of-service.html">Terms of Use</a></li>
                    </ul>
                </div>
                <div class="col-lg-6 text-right">
                    Copyright 2020 <a href="#">FinDash</a> All Rights Reserved.
                </div>
            </div>
        </div>
    </footer>
    <!-- Footer END -->

    <script>
        $(document).ready(function() {
            $('#monitoring').Table({
                "scrollY": 200,
                "scrollX": true
            });
        });
    </script>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="{{ asset('findash/assets/js/jquery.min.js') }}"></script>
    <script src="{{ asset('findash/assets/js/popper.min.js') }}"></script>
    <script src="{{ asset('findash/assets/js/bootstrap.min.js') }}"></script>
    <!-- Appear JavaScript -->
    <script src="{{ asset('findash/assets/js/jquery.appear.js') }}"></script>
    <!-- Countdown JavaScript -->
    <script src="{{ asset('findash/assets/js/countdown.min.js') }}"></script>
    <!-- Counterup JavaScript -->
    <script src="{{ asset('findash/assets/js/waypoints.min.js') }}"></script>
    <script src="{{ asset('findash/assets/js/jquery.counterup.min.js') }}"></script>
    <!-- Wow JavaScript -->
    <script src="{{ asset('findash/assets/js/wow.min.js') }}"></script>
    <!-- Apexcharts JavaScript -->
    <script src="{{ asset('findash/assets/js/apexcharts.js') }}"></script>
    <!-- Slick JavaScript -->
    <script src="{{ asset('findash/assets/js/slick.min.js') }}"></script>
    <!-- Select2 JavaScript -->
    <script src="{{ asset('findash/assets/js/select2.min.js') }}"></script>
    <!-- Owl Carousel JavaScript -->
    <script src="{{ asset('findash/assets/js/owl.carousel.min.js') }}"></script>
    <!-- Magnific Popup JavaScript -->
    <script src="{{ asset('findash/assets/js/jquery.magnific-popup.min.js') }}"></script>
    <!-- Smooth Scrollbar JavaScript -->
    <script src="{{ asset('findash/assets/js/smooth-scrollbar.js') }}"></script>
    <!-- lottie JavaScript -->
    <script src="{{ asset('findash/assets/js/lottie.js') }}"></script>
    <!-- Style Customizer -->
    <script src="{{ asset('findash/assets/js/style-customizer.js') }}"></script>
    <!-- Chart Custom JavaScript -->
    <script src="{{ asset('findash/assets/js/chart-custom.js') }}"></script>
    <!-- Custom JavaScript -->
    <script src="{{ asset('findash/assets/js/custom.js') }}"></script>
</body>

</html>