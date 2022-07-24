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
                        <div class="iq-card-header d-flex justify-content-center table-warning">
                            <div class="iq-header-title">
                                <h4 class="card-title">REKAPITULASI MEMO CAIR</h4>
                            </div>
                        </div>
                        <div class="iq-card-body">
                            <div id="table" class="table-editable">
                                <table class="table table-bordered table-responsive-md table-hover">
                                    <thead class="text-center">
                                        <tr class="bg-warning">
                                            <th style="width: 3%">No</th>
                                            <th style="width:3%">TOR</th>
                                            <th style="width: 25%">Program Studi</th>
                                            <th style="width: 10%">Triwulan</th>
                                            <th colspan="2" style="width: 20%">Status Memo Cair</th>
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
                                                                                $statusTor[0]['status'] = $status[$s]->nama_status . " - " . $trx_status_tor[$tr]->role_by;
                                                                                for ($d = 0; $d < count($dokumen); $d++) {
                                                                                    if ($dokumen[$d]->id_tor  == $tor[$m]->id) {
                                                                                        $statusTor[0]['sudahUpload'] = 1;
                                                                                    }
                                                                                }
                                                                                if ($statusTor[0]['status'] == "Validasi - WD 3") {

                                                                                    // Mengambil data Nama Unit (Prodi) dari tabel TOR
                                                                                    for ($v = 0; $v < count($prodi); $v++) {
                                                                                        if ($prodi[$v]->id == $tor[$m]->id_unit) {
                                                                                            $namaprodi = $prodi[$v]->nama_unit;
                                                                                            // Mengambil data Triwulan dari tabel TOR
                                                                                            for ($x = 0; $x < count($triwulan); $x++) {
                                                                                                if ($triwulan[$x]->id == $tor[$m]->id_tw) {
                                                                                                    $namatw = $triwulan[$x]->triwulan; ?>

                                            <td>{{ $nomor + 1 }}</td><?php $nomor += 1; ?>
                                            <td width="30%">
                                                {{ $tor[$m]->nama_kegiatan }}
                                            </td>
                                            <td>{{ $namaprodi }}</td>
                                            <td>{{ $namatw }}</td>
                                            <td class="text-center">
                                                <?php if ($statusTor[0]['sudahUpload'] == 1) { ?>
                                                <button type="button"
                                                    class="btn iq-bg-primary btn-rounded btn-sm my-0">Sudah
                                                    Terbit</button>
                                                <?php } else { ?>
                                                <button type="button"
                                                    class="btn iq-bg-danger btn-rounded btn-sm my-0">Belum
                                                    Terbit</button>
                                                <?php } ?>
                                            </td>
                                            <td>
                                                <?php if ($statusTor[0]['sudahUpload'] == 1) { ?>
                                                <button class="btn btn-sm bg-info rounded-pill" title="Detail"
                                                    data-toggle="modal"
                                                    data-target="#detail_memocair<?= $tor[$m]->id ?>"><i
                                                        class="las la-external-link-alt"></i></i></button>
                                                <button class="btn btn-sm bg-warning rounded-pill" title="Edit"
                                                    data-toggle="modal"
                                                    data-target="#edit_memocair<?= $tor[$m]->id ?>"><i
                                                        class=" las la-edit"></i></i></button>
                                                <!-- MODAL - Detail Memo Cair -->
                                                @include('keuangan/memo_cair/detail_memocair')
                                                <!-- MODAL - Edit Memo Cair -->
                                                @include('keuangan/memo_cair/edit_memocair')
                                                <?php } else { ?>
                                                <button type="button" class="btn bg-dark btn-rounded btn-sm my-0"
                                                    title="Upload File Memo Cair" data-toggle="modal"
                                                    data-target="#upload_memocair<?= $tor[$m]->id ?>"><i
                                                        class="las la-upload"></i>
                                                </button>
                                            </td>
                                            <!-- MODAL - Upload Memo Cair -->
                                            @include('keuangan/memo_cair/upload_memocair')


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
