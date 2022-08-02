<br />
<?php
$totanggaran1 = 0;
for ($r = 0; $r < count($rab); $r++) {
    if ($rab[$r]->id_tor == $tor[$t]->id) { ?>
        <div class="container center">
            <?php for ($u = 0; $u < count($unit2); $u++) {
                if ($tor[$t]->id_unit == $unit2[$u]->id) {
                    $namaunit = $unit2[$u]->nama_unit;
                }
            } ?>
            <br />
            <div class="table-responsive">
                <table id="datatable" class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <td colspan="8">
                                <h5 style="text-align: center;"><b>RINCIAN ANGGARAN BELANJA</b></h5>
                                <h5 style="text-align: center;"><b>{{strtoupper($namaunit)}}</h5>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="7"><b>Unit Kerja</b> : {{$namaunit}}</td>
                            <th>Tahun</th>
                        </tr>
                        <tr>
                            <?php
                            $id_subk = 0;
                            $nama_subK = "";
                            $desk_subK = "";
                            $nama_k = "";
                            $desk_k = "";
                            foreach ($kategori_subK as $subK1) {
                                if ($subK1->id == $tor[$t]->id_subK) {
                                    $id_subk = $subK1->id;
                                    $nama_subK = $subK1->subK;
                                    $desk_subK = $subK1->deskripsi;
                                    $nama_k = $subK1->K;
                                    $desk_k = $subK1->deskripsi_k;
                                }
                            }
                            ?>
                            <td colspan="7"><b>Indikator Kegiatan</b> : {{ $nama_k." : ".$desk_k}}</td>
                            <td rowspan="3">{{substr($tor[$t]->tgl_mulai_pelaksanaan,0,4)}}</td>
                        </tr>
                        <tr>
                            <td colspan="7"><b>Sub Kegiatan</b> : {{$nama_subK." : ". $desk_subK}}</td>
                        </tr>
                        <tr>
                            <td colspan="7"><b>Kegiatan</b> : {{$tor[$t]->nama_kegiatan}}</td>
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
                                <?php if ($pengajuan == 0 || $dalamRevisi == 1) { ?>

                                    @can('anggaran_create')
                                    <!-- yang bisa akses Admin prodi, dan PIC yang bertanggung jawab di TOR tsb -->
                                    <?php if ($tor[$t]->nama_pic == Auth::user()->name ||   $unitLoginLengkapi == "Admin"  ||   $unitLoginLengkapi == "Prodi") { ?>
                                        <a id="validasi" class="iq-bg-primary rounded" style="padding: 1%;" data-toggle="modal" data-placement="top" title="Tambah Anggaran" data-original-title="Tambah Anggaran" data-target="#tambah_anggaran<?= $rab[$r]->id ?>" href="">
                                            <i class="ri-user-add-line"></i> Tambah Anggaran</a>
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
                                    $totanggaran1 += $anggaran[$i]->anggaran;
                                    for ($j = 0; $j < count($detail_mak); $j++) {
                                        if ($anggaran[$i]->id_detail_mak == $detail_mak[$j]->id) {
                        ?>
                                            <tr>
                                                <td>{{$detail_mak[$j]->detail}}
                                                    <h6><?= $anggaran[$i]->catatan ?></h6>
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
                        } ?>

                    </tbody>
                    <tfoot>
                        <tr>
                            <th colspan="7">Total</th>
                            <th>{{"Rp. ".number_format($totalAnggaranRab,2,',',',')}}</th>
                        </tr>
                        <tr>
                            <td colspan="8"></td>
                        </tr>
                        <!-- TANDA TANGAN -->
                        <tr>
                            <td colspan="4" style="text-align: center;" width="50%">Kepala Program Studi
                                <br />
                                <br />
                                <br />
                                <br />
                                <?php
                                foreach ($users as $us) {
                                    foreach ($unit as $un) {
                                        if ($un->id == $us->id_unit) {
                                            foreach ($roles as $ro) {
                                                if ($ro->id == $us->role) {
                                                    if ($ro->name == "Kaprodi") {
                                                        echo "<b>" . $us->name . "</b><br />";
                                                        echo "NIP. " . $us->nip;
                                                    }
                                                }
                                            }
                                        }
                                    }
                                }
                                ?>
                            </td>
                            <td colspan="4" style="text-align: center;" width="50%">Perencana/Penanggungjawab
                                <br />
                                <br />
                                <br />
                                <br />
                                <b>{{$tor[$t]->nama_pic}}</b><br />
                                {{"NIP. ". Auth::user()->nip }}
                            </td>
                        </tr>
                        <tr>
                            <td colspan="8"></td>
                        </tr>
                        <tr>
                            <td colspan="8" style="text-align: center;">Menyetujui</td>
                        </tr>
                        <tr>
                            <td colspan="8"></td>
                        </tr>
                        <tr>
                            <td colspan="3" width="30%">Wakil Dekan Akademik, Riset, dan Kemahasiswaan
                                <br />
                                <br />
                                <br />
                                <br />
                                <b>Agus Dwi Priyanto, S.S., M.CALL</b><br />
                                NIP. 197408182000121001
                            </td>
                            <td colspan="2">Wakil Dekan Perencanaan, Kerjasama, Bisnis dan Informasi
                                <br />
                                <br />
                                <br />
                                <b>Dr. Eng. Herman Saputro, S.Pd., M.Pd., M.T.</b><br />
                                NIP. 198208112006041001
                            </td>
                            <td colspan="3">Wakil Dekan SDM, Keuangan, dan Logistik
                                <br />
                                <br />
                                <br />
                                <br />
                                <b> Abdul Aziz, S.Kom., M.Cs.</b><br />
                                NIP. 198104132005011001
                            </td>
                        </tr>
                        <!-- TANDA TANGAN -->

                        @include('perencanaan/modal2/tambah_anggaran')

                    </tfoot>
                </table>
        <?php

    }
} ?>