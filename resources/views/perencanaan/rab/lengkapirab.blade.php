<br />
<?php
$totanggaran1 = 0;
for ($r = 0; $r < count($rab); $r++) {
    if ($rab[$r]->id_tor == $tor[$t]->id) { ?>
        <div class="container center">
            <h5 style="text-align: center;">RINCIAN ANGGARAN BELANJA</h5>
            <?php for ($u = 0; $u < count($unit2); $u++) {
                if ($tor[$t]->id_unit == $unit2[$u]->id) {
                    $namaunit = $unit2[$u]->nama_unit;
                }
            } ?>
            <h5 style="text-align: center;">{{strtoupper($namaunit)}}</h5><br />
            <br />
            <div class="table-responsive">
                <table id="datatable" class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <td colspan="7"><b>Unit Kerja</b> : {{$namaunit}}</td>
                            <th>Tahun</th>
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
                            <th>Target Kinerja</th>
                        </tr>
                        <tr>
                            <td colspan="7"><b>Input (Masukan)</b> : {{$rab[$r]->masukan }}</td>
                            <td rowspan="2">{{$tor[$t]->target_IKU ."%"}}</td>
                        </tr>
                        <tr>
                            <td colspan="7"><b>Output (Keluaran)</b> : {{$rab[$r]->keluaran}}</td>
                        </tr>
                        <tr>
                            <th colspan="8" style="text-align: center;"><b>Anggaran Belanja</b></th>
                        </tr>
                        <tr>

                            <?php
                            foreach ($roles as $roleLoginLengkapi) {
                                if ($roleLoginLengkapi->id == Auth::user()->role) {
                                    $unitLoginLengkapi = $roleLoginLengkapi->name;
                                }
                            }
                            ?>
                            <th rowspan="3" class="align-middle">Jenis Belanja
                                <?php if ($pengajuan == 0) { ?>

                                    @can('anggaran_create')
                                    <!-- yang bisa akses Admin, prodi, dan PIC yang bertanggung jawab di TOR tsb -->
                                    <?php if ($tor[$t]->nama_pic == Auth::user()->name ||   $unitLoginLengkapi == "Admin"  ||   $unitLoginLengkapi == "Prodi") { ?>
                                        <a id="validasi" class="iq-bg-primary rounded" style="padding: 1%;" data-toggle="modal" data-placement="top" title="Tambah Anggaran" data-original-title="Tambah Anggaran" data-target="#tambah_anggaran<?= $rab[$r]->id ?>" href=""><i class="ri-user-add-line"></i></a>
                                    <?php } ?>
                                    @endcan
                                <?php } ?>
                            </th>
                            <th colspan="6" style="text-align: center;">Rincian Biaya</th>
                            <th rowspan="3" class="align-middle" style="text-align: center;">Jumlah Anggaran (Rp)</th>
                        </tr>
                        <tr>
                            <th colspan="2" style="text-align: center;">Kebutuhan</th>
                            <th rowspan="2" class="align-middle" style="text-align: center;">Frek</th>
                            <th colspan="2" style="text-align: center;">Perhitungan</th>
                            <th rowspan="2" class="align-middle" style="text-align: center;">Harga Satuan</th>
                        </tr>
                        <tr>
                            <th>Vol.</th>
                            <th>Sat.</th>
                            <th>Vol.</th>
                            <th>Sat.</th>
                        </tr>
                    </thead>
                    <tbody>

                        <?php
                        $totalAnggaranRab = 0;
                        $urut = 1;
                        for ($i = 0; $i < count($anggaran); $i++) {
                            if ($anggaran[$i]->anggaran != 0) {
                                if ($anggaran[$i]->id_rab == $rab[$r]->id) {
                                    if ($anggaran[$i]->id_tahap_anggaran == 1) {
                                        $totanggaran1 += $anggaran[$i]->anggaran;
                                        for ($j = 0; $j < count($detail_mak); $j++) {
                                            if ($anggaran[$i]->id_detail_mak == $detail_mak[$j]->id) {
                        ?>
                                                <tr>
                                                    <td>{{$detail_mak[$j]->detail}}

                                                        <!-- MODAL UPDATE DI ANGGARAN -->
                                                        @include('perencanaan/modal2/update_anggaran')
                                                    </td>
                                                    <td>{{$anggaran[$i]->kebutuhan_vol}}</td>
                                                    <td>{{$anggaran[$i]->kebutuhan_sat}}</td>
                                                    <td>{{$anggaran[$i]->frek}}</td>
                                                    <td>{{$anggaran[$i]->perhitungan_vol}}</td>
                                                    <td>{{$anggaran[$i]->perhitungan_sat}}</td>
                                                    <td>{{"Rp. ".number_format($anggaran[$i]->harga_satuan,2,',',',')}}</td>
                                                    <td>{{"Rp. ".number_format($anggaran[$i]->anggaran,2,',',',')}}</td>
                                                    <td>
                                                        <?php if ($tor[$t]->nama_pic == Auth::user()->name ||   $unitLoginLengkapi == "Admin"  ||   $unitLoginLengkapi == "Prodi") { ?>
                                                            @include('perencanaan/aksi/aksi_anggaran')
                                                        <?php } ?>
                                                        @include('perencanaan/modal2/update_anggaran')
                                                    </td>
                                                </tr>

                        <?php
                                                $totalAnggaranRab += $anggaran[$i]->anggaran;
                                                $urut += 1;
                                            }
                                        }
                                    }
                                }
                            }
                        } ?>
                    </tbody>
                    <tfoot>
                        <tr>
                            <th colspan="7">Total</th>
                            <th>{{"Rp. ".number_format($totalAnggaranRab,2,',',',')}}</th>
                        </tr>
                        @include('perencanaan/modal2/tambah_anggaran')

                    </tfoot>
                </table>
        <?php

    }
} ?>