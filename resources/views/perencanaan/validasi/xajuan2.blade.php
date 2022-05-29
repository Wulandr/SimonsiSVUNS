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
        <div id="content-page" class="content-page"><?php $join = $join; ?>
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-12">

                        <div class="iq-card">
                            <div class="iq-card-header d-flex justify-content-between">
                                <div class="iq-header-title">
                                    <h4 class="card-title">VALIDASI DAN VERIFIKASI
                                        <br />
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
                                        <thead class="bg-primary" style="color: white;">
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

                                        <tbody class="bg-primary">
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
                                            <div class="container">
                                                <?php
                                                $perulangan = 0;

                                                $jmltor = 1;
                                                $ada = 0;
                                                $x = 0;
                                                for ($a = 0; $a < count($join); $a++) {
                                                    for ($stk2 = 0; $stk2 < count($trx_status_tor); $stk2++) {
                                                        if ($trx_status_tor[$stk2]->id_tor == $join[$a]->tor_id) {
                                                            $jmltor += 1;
                                                            $perulangan += 1; //biar tidak mengulang-ulang teks tor nya
                                                            if ($trx_status_tor[$stk2]->id_tor  == $x) {
                                                                break;
                                                            }

                                                ?>
                                                            <!-- jk sebelumnya sudah ditulis, jangan ditulis lagi -->
                                                            <tr>
                                                                <th style="background-color: #cacfd1;" colspan="13">
                                                                    <h6 style="color: #000102b5;">{{ $trx_status_tor[$stk2]->id_tor . " : ". $join[$a]->nama_kegiatan}}<?php $x = $trx_status_tor[$stk2]->id_tor; ?></h6>
                                                                    <!-- VALIDASI TOR -->
                                                                    <button class="badge badge-info" data-toggle="modal" data-placement="top" data-target="#detail_tor{{$x}}">
                                                                        <i class="fa fa-tasks"></i>
                                                                    </button>
                                                                    @include('perencanaan/validasi/modal/tor/detail')
                                                                    <a href="{{url('/detailtor/'.  $join[$a]->tor_id)}}"><button class="badge badge-warning rounded">Detail
                                                                        </button></a>
                                                                    <div class="badge badge-pill badge-danger">{{"Rp. ".number_format($join[$a]->jumlah_anggaran,2,',',',')}}</div>
                                                                    <?php
                                                                    if (!empty($trx_status_tor)) {
                                                                        for ($q3 = 0; $q3 < count($trx_status_tor); $q3++) {
                                                                            if ($trx_status_tor[$q3]->id_tor == $join[$a]->tor_id) {
                                                                                $jmltor += 1;
                                                                                $ada += 1;
                                                                                for ($s4 = 0; $s4 < count($status); $s4++) {
                                                                                    if ($trx_status_tor[$q3]->id_status == $status[$s4]->id) {
                                                                                        $statuskeg = $status[$s4]->nama_status;
                                                                                    }
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
                                                            <?php
                                                            $nomer = 1;
                                                            for ($b = 0; $b < count($rab); $b++) {
                                                                if ($rab[$b]->id_tor ==  $join[$a]->tor_id) { ?>
                                                                    @include('perencanaan/validasi/baris/rab')
                                                                    <!-- include('validasi/baris/anggaran') -->
                                                            <?php }
                                                            } ?>
                                                <?php

                                                        }
                                                    }
                                                } ?>
                                                @include('perencanaan/validasi/baris/total_anggaran')
                                            </div>
                                        </tbody>
                                    </table>
                                    {{$join->links()}}
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