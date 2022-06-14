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
                <div class="col-sm-12">
                    <div class="iq-card">
                        <div class="iq-card-header d-flex justify-content-between">
                            <div class="iq-header-title align-items-center">
                                <h4 class="card-title">REKAPITULASI AJUAN KAK-RAB PROGRAM STUDI</h4>
                            </div>
                            <div class="iq-header-toolbar col-sm-3 mt-3 d-flex justify-content-end">
                                <div class="form-group row mb-0">
                                    <span class="table-add mb-0">
                                        <div class="form-group row">
                                            <form action="{{ url('/monitoringUsulan/filterTw') }}" method="GET">
                                                <div class="row mr-3">
                                                    <div class="col mr-1">
                                                        <select class="form-control filter sm-8" name="filterTw"
                                                            id="filterTw">
                                                            <option value="0">All</option>
                                                            <?php for ($tw1 = 0; $tw1 < count($tw); $tw1++) {
                                                                        foreach ($tahun as $thn) {
                                                                            if ($thn->is_aktif == 1) {
                                                                                if ($thn->tahun == substr($tw[$tw1]->triwulan, 0, 4)) {  ?>
                                                            <option value="{{ $tw[$tw1]->id }}"
                                                                {{ $filtertw == $tw[$tw1]->id ? 'selected' : '' }}>
                                                                {{ $tw[$tw1]->triwulan }}</option>
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
                            </div>
                            <div class="iq-card-header-toolbar align-items-center">
                                <div class="dropdown">
                                    <span class="dropdown-toggle text-primary" id="dropdownMenuButton5"
                                        data-toggle="dropdown">
                                        <i class="ri-more-fill"></i>
                                    </span>
                                    <div class="dropdown-menu dropdown-menu-right"
                                        aria-labelledby="dropdownMenuButton5">
                                        <a class="dropdown-item" href="#"><i class="ri-printer-fill mr-2"></i>Print</a>
                                        <a class="dropdown-item" href="#"><i
                                                class="ri-file-download-fill mr-2"></i>Download</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="iq-card-body">
                            <div id="table" class="table-editable">
                                <table class="table table-bordered table-responsive-md table-hover text-center">
                                    <thead class="bg-primary">
                                        <tr>
                                            <th rowspan="2" style="vertical-align: middle; width: 3%">No</th>
                                            <th rowspan="2" style="vertical-align: middle">Program Studi</th>
                                            <th colspan="5" style="width: ">TW 1 (Per 29 Maret 2022)</th>
                                        </tr>
                                        <tr>
                                            <th style="">Pagu</th>
                                            <th style="">RPD</th>
                                            <th style="">KAK - Disetujui</th>
                                            <th style="">Memo Cair Valid</th>
                                            <th style="">% Memo Cair Valid</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <?php
                                            $nomor = 0;
                                            $namaprodi = '';
                                            $namatw = '';
                                            for ($m = 0; $m < count($tor); $m++) {
                                                $ada = 0; //sudah diajukan apa belum

                                                // S T A T U S
                                                $torVallidasi = "";
                                                $statusTor = [
                                                    [
                                                        'tor' => '',
                                                        'status' => '',
                                                        'sudahUpload' => 0
                                                    ]
                                                ];

                                                // Mengambil data Nama Kegiatan yang SUDAH DIVALIDASI WD 1 dari tabel TOR
                                                for ($tr = 0; $tr < count($trx_status_tor); $tr++) {
                                                    if ($trx_status_tor[$tr]->id_tor == $tor[$m]->id) {
                                                        for ($s = 0; $s < count($status); $s++) {
                                                            if ($trx_status_tor[$tr]->id_status == $status[$s]->id) {
                                                                $statusTor[$ada]['tor'] = "TOR" . $tor[$m]->id;
                                                                $ada += 1;
                                                                for ($u = 0; $u < count($users); $u++) {
                                                                    if ($trx_status_tor[$tr]->create_by == $users[$u]->id) {
                                                                        for ($r = 0; $r < count($roles); $r++) {
                                                                            if ($users[$u]->role == $roles[$r]->id) {
                                                                                $statusTor[0]['status'] = $status[$s]->nama_status . " - " . $roles[$r]->name;
                                                                                for ($d = 0; $d < count($dokMemo); $d++) {
                                                                                    if ($dokMemo[$d]->id_tor  == $tor[$m]->id) {
                                                                                        $statusTor[0]['sudahUpload'] = 1;
                                                                                    }
                                                                                }
                                                                                if ($statusTor[0]['status'] == "Validasi - WD 1") {

                                                                                    // Mengambil data Nama Unit (Prodi) dari tabel TOR
                                                                                    for ($v = 0; $v < count($prodi); $v++) {
                                                                                        if ($prodi[$v]->id == $tor[$m]->id_unit) {
                                                                                            $namaprodi = $prodi[$v]->nama_unit;
                                                                                            // Mengambil data Triwulan dari tabel TOR
                                                                                            for ($x = 0; $x < count($tw); $x++) {
                                                                                                if ($tw[$x]->id == $tor[$m]->id_tw) {
                                                                                                    $namatw = $tw[$x]->triwulan;
                                                                                                    // Mengambil data dari tabel Memo Cair
                                                                                                    for ($a = 0; $a < count($data); $a++) {
                                                                                                        if ($data[$a]->id_tor == $tor[$m]->id) {
                                                                                                            // Mengambil data dari tabel Pagu
                                                                                                            
                                                $anggaran = $tor[$m]->jumlah_anggaran;
                                                $memocair_nominal = $data[$a]->nominal;
                                                $memocair_valid = ($memocair_nominal/$anggaran)*100;

                                                
                                            ?>

                                            <td>{{ $nomor + 1 }}</td><?php $nomor += 1; ?>
                                            <td>{{ $namaprodi }}</td>
                                            <td>
                                                <?php
                                                $tahun = substr($tor[$m]->tgl_mulai_pelaksanaan, 0, 4);
                                                for ($j = 0; $j < count($pagu); $j++) {
                                                    for ($c = 0; $c < count($tabeltahun); $c++) {
                                                        if ($tabeltahun[$c]->id == $pagu[$a]->id_tahun) {
                                                            if ($tabeltahun[$c]->tahun == $tahun) {
                                                                echo 'Rp. ' . number_format($pagu[$j]->pagu);
                                                            }
                                                        }
                                                    }
                                                }
                                                ?>
                                            </td>
                                            <td></td>
                                            <td>{{ 'Rp ' . number_format($anggaran) }}
                                            </td>
                                            <td>{{ 'Rp ' . number_format($memocair_nominal) }}</td>
                                            <td>{{ number_format($memocair_valid, 2) . ' %' }}</td>

                                            <?php
                                                                                                        }
                                                                                                    }
                                                                                                }
                                                                                            }
                                                                                        }
                                                                                    }
                                                                                }
                                                                            }
                                                                        }
                                                                    }
                                                                }
                                                            }
                                                        }
                                                        ?>

                                        </tr>
                                        <?php
                                                    }
                                                }
                                            } ?>
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
