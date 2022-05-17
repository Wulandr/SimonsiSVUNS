<?php

use Illuminate\Support\Facades\Auth;
?>
<!-- 
    HALAMAN VALIDASI UNTUK BPU, WD 2, WD 3, STAF KEU, STAF PERENCANAAN
 -->
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
        <div id="content-page" class="content-page"><?php $tor = $tor; ?>
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-12">

                        <div class="iq-card">
                            <div class="iq-card-header d-flex justify-content-between">
                                <div class="iq-header-title">
                                    <h4 class="card-title">VALIDASI DAN VERIFIKASI
                                        <br />
                                        <?php for ($pro = 0; $pro < count($unit); $pro++) {
                                            if ($unit[$pro]->id == $prodi) { ?>
                                                PRODI {{$prodi . " : ".strtoupper($unit[$pro]->nama_unit)}}
                                        <?php }
                                        } ?>
                                    </h4>
                                </div>
                            </div>
                            <div class="iq-card-body">
                                <div id="table" class="table-editable">
                                    <span class="table-add float-right mb-3 mr-2">
                                        <div class="form-group row">
                                            <form action="{{ url('/validasi_filter') }}" method="GET">
                                                <div class="row mr-3">
                                                    <div class="col mr-1">
                                                        <select class="form-control filter sm-8" name="tahun" id="tahun">
                                                            <option value="0">All</option>
                                                            <?php for ($thn = 0; $thn < count($tabeltahun); $thn++) { ?>
                                                                <option value="{{$tabeltahun[$thn]->tahun}}" {{$filtertahun==$tabeltahun[$thn]->tahun ? 'selected':''}}>{{$tabeltahun[$thn]->tahun}}</option>
                                                            <?php } ?>
                                                        </select>
                                                    </div>
                                                    <?php if ($prodi != 0) { ?>
                                                        <input type="hidden" name="prodi" id="prodi" value="{{$prodi}}">
                                                    <?php } ?>
                                                    <?php if ($prodi == 0) { ?>
                                                        <div class="col mr-1">
                                                            <select class="form-control filter sm-8" name="prodi" id="prodi">
                                                                <option value="0">All</option>
                                                                <?php
                                                                for ($pr = 0; $pr < count($unit); $pr++) { ?>
                                                                    <option value="{{$unit[$pr]->id}}">{{$unit[$pr]->nama_unit}}</option>
                                                                <?php } ?>
                                                            </select>
                                                        </div>
                                                    <?php } ?>
                                                    <input type="submit" class="btn btn-primary btn-sm" value="Filter">
                                                </div>
                                            </form>
                                        </div>
                                    </span>
                                </div>
                                <div style="overflow-x:auto;" class="container mt-2 mr-5">
                                    <table class="table table-bordered table-responsive-md table-striped text-center" style="box-shadow:5px;">
                                        <thead class="" bgcolor="#20B2AA" style="color: white;">
                                            <tr>
                                                <th colspan="3">
                                                    Tri Wulan 1
                                                </th>
                                                <th colspan="3">Tri Wulan 2
                                                </th>
                                                <th colspan="3">Tri Wulan 3 </i>
                                                </th>
                                                <th colspan="3">Tri Wulan 4 </i>
                                                </th>
                                            </tr>
                                        </thead>

                                        <tbody bgcolor="#20B2AA" style="color: white;">
                                            <tr class="">
                                                <?php
                                                $semuaanggaran = 0;
                                                $tw = [1, 2, 3, 4] ?>
                                                <!-- <th>TOR</th> -->
                                                <th>Kegiatan</th>
                                                <th colspan="2">Anggaran</th>
                                                <!-- <th>Aksi</th> -->
                                                <th>Kegiatan</th>
                                                <th colspan="2">Anggaran</th>
                                                <!-- <th>Aksi</th> -->
                                                <th>Kegiatan</th>
                                                <th colspan="2">Anggaran</th>
                                                <!-- <th>Aksi</th> -->
                                                <th>Kegiatan</th>
                                                <th colspan="2">Anggaran</th>
                                                <!-- <th>Aksi</th> -->
                                            </tr>
                                            <?php
                                            $jmltor = 1;
                                            $statuskeg = "";
                                            $pengvalidasi = "";
                                            $idtor = 0;
                                            $ada = 0;
                                            $baris = 1;
                                            $warna = ["#C0C0C0", "white"];
                                            $hitung = 0;
                                            for ($a = 0; $a < count($tor); $a++) {
                                            ?>
                                                <!-- include('validasi/baris/tor') -->

                                                <tr>
                                                    <th class="bg-secondary" colspan="13">
                                                        <h6 id="tornya" style="color: white;"><b>{{"TOR"." - ". strtoupper($tor[$a]->nama_kegiatan)}}</b>
                                                            <!-- AKSI TOR  -->
                                                            <?php $total_per_tor = 0;
                                                            $sireva = "a";
                                                            for ($l = 0; $l < count($totalpertw); $l++) {
                                                                if ($totalpertw[$l]->id_tor == $tor[$a]->id) {
                                                                    $total_per_tor += $totalpertw[$l]->anggaran; ?>
                                                            <?php
                                                                }
                                                            }
                                                            ?>
                                                            <a class="badge iq-bg-primary">
                                                                <h5>
                                                                    <?= "Rp. " .  number_format($total_per_tor, 2, ',', '.') ?>
                                                                </h5>
                                                            </a>

                                                        </h6>

                                                        <!-- VALIDASI TOR -->
                                                        <button class="badge badge-info" data-toggle="modal" data-placement="top" data-target="#detail_tor{{$tor[$a]->id}}">
                                                            <i class="fa fa-tasks"></i>
                                                        </button>
                                                        @include('perencanaan/validasi/modal/tor/detail')
                                                        <button class="badge badge-info" data-toggle="modal" data-placement="top" data-target="#veriftor{{$tor[$a]->id}}">Verifikasi</button>
                                                        @include('perencanaan/validasi/modal/tor/verif')

                                                        <button class="badge badge-success}}" data-toggle="modal" data-placement="top" data-target="#validtor{{$tor[$a]->id}}">Validasi</button>
                                                        @include('perencanaan/validasi/modal/tor/valid')

                                                        <?php
                                                        if (!empty($trx_status_tor)) {
                                                            for ($q3 = 0; $q3 < count($trx_status_tor); $q3++) {
                                                                if ($trx_status_tor[$q3]->id_tor == $tor[$a]->id) {
                                                                    $jmltor += 1;
                                                                    $ada += 1;
                                                                    if ($trx_status_tor[$q3]->id_status == 1) {
                                                                        $statuskeg = "Pengajuan Prodi";
                                                                        $badge = "badge-warning";
                                                                    } elseif ($trx_status_tor[$q3]->id_status == 2) {
                                                                        $statuskeg = "Diverifikasi";
                                                                        $badge = "badge-success";
                                                                    } elseif ($trx_status_tor[$q3]->id_status == 3) {
                                                                        $statuskeg = "Revisi";
                                                                        $badge = "badge-danger";
                                                                    } elseif ($trx_status_tor[$q3]->id_status == 4) {
                                                                        $statuskeg = "Divalidasi";
                                                                        $badge = "badge-info";
                                                                    } else {
                                                                        $statuskeg = "n";
                                                                    }
                                                                    for ($st3 = 0; $st3 < count($status); $st3++) {
                                                                        if ($status[$st3]->id == $trx_status_tor[$q3]->id_status) {
                                                                            for ($u = 0; $u < count($user); $u++) {
                                                                                if ($user[$u]->id == $trx_status_tor[$q3]->create_by) {
                                                                                    for ($rl = 0; $rl < count($role); $rl++) {
                                                                                        if ($role[$rl]->id == $user[$u]->role) {
                                                                                            $pengvalidasi = $role[$rl]->name;
                                                                                        }
                                                                                    }
                                                                                }
                                                                            }
                                                                        }
                                                                    }
                                                                }
                                                            }
                                                        } elseif (empty($trx_status_tor)) {
                                                            $statuskeg = "";
                                                            $pengvalidasi = "";
                                                        } else {
                                                            $statuskeg = "";
                                                        }
                                                        ?>
                                                        <div class="badge badge-pill badge-warning">{{$statuskeg." ".$pengvalidasi}}</div>

                                                    </th>
                                                </tr>
                                                <?php $nomer = 1;
                                                for ($b = 0; $b < count($rab); $b++) {
                                                    if ($rab[$b]->id_tor ==  $tor[$a]->id) { ?>
                                                        @include('perencanaan/validasi/baris/rab')
                                                        @include('perencanaan/validasi/baris/anggaran')
                                                <?php
                                                    }
                                                    $baris += 1;
                                                }
                                                break;

                                                ?>
                                                <!-- baris terakhir -->
                                                @include('perencanaan/validasi/baris/total_anggaran')
                                            <?php
                                            }
                                            ?>
                                        </tbody>
                                    </table>
                                    {{ $tor->links() }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div>
                </div></br>
                <hr />
                <div id="hasil">
                    <!-- Hasil -->
                </div>
            </div>
        </div>
    </div>
    </div>
    @include('dashboards/users/layouts/footer')

</body>

</html>