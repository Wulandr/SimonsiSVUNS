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
                        <div class="iq-card-header d-flex justify-content-center">
                            <div class="iq-header-title">
                                <h4 class="card-title">REKAPITULASI AJUAN KAK-RAB PROGRAM STUDI</h4>
                            </div>
                        </div>
                        <div class="iq-card-body">
                            <div id="table" class="table-editable">
                                <table class="table table-bordered table-responsive-md table-hover text-center">
                                    <thead class="bg-primary">
                                        <tr>
                                            <th rowspan="2" style="vertical-align: middle; width: 3%">No</th>
                                            <th rowspan="2" style="vertical-align: middle">Program Studi</th>
                                            <th colspan="4" style="width: ">TW 1 (Per 29 Maret 2022)</th>
                                        </tr>
                                        <tr>
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
                                                                                for ($d = 0; $d < count($dokumen); $d++) {
                                                                                    if ($dokumen[$d]->id_tor  == $tor[$m]->id) {
                                                                                        $statusTor[0]['sudahUpload'] = 1;
                                                                                    }
                                                                                }
                                                                                if ($statusTor[0]['status'] == "Validasi - WD 1") {

                                                                                    // Mengambil data Nama Unit (Prodi) dari tabel TOR
                                                                                    for ($v = 0; $v < count($prodi); $v++) {
                                                                                        if ($prodi[$v]->id == $tor[$m]->id_unit) {
                                                                                            $namaprodi = $prodi[$v]->nama_unit;
                                                                                            // Mengambil data Triwulan dari tabel TOR
                                                                                            for ($x = 0; $x < count($triwulan); $x++) {
                                                                                                if ($triwulan[$x]->id == $tor[$m]->id_tw) {
                                                                                                    $namatw = $triwulan[$x]->triwulan;
                                                                                                    for ($a = 0; $a < count($data); $a++) {
                                                                                                        if ($data[$a]->id_tor == $tor[$m]->id) {
                                            
                                                $anggaran = $tor[$m]->jumlah_anggaran;
                                                $memocair_nominal = $data[$a]->nominal;
                                                $memocair_valid = ($memocair_nominal/$anggaran)*100;
                                            ?>

                                            <td>{{ $nomor + 1 }}</td><?php $nomor += 1; ?>
                                            <td>{{ $namaprodi }}</td>
                                            <td>{{ 'Rp ' . number_format($anggaran, 2, ',', '.') }}
                                            </td>
                                            <td></td>
                                            <td>{{ 'Rp ' . number_format($memocair_nominal, 2, ',', '.') }}</td>
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
