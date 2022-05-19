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
                                <h4 class="card-title">REKAPITULASI LAPORAN PERTANGGUNGJAWABAN (LPJ)</h4>
                            </div>
                        </div>
                        <div class="iq-card-body">
                            <div id="table" class="table-responsive">
                                <span class="table-add float-right mb-3 mr-2">
                                    <button class="btn btn-info mb-3" title="Template LPJ 2022" data-toggle="modal"
                                        data-target="#template_lpj">
                                        <i class="las la-file-alt"></i><span class="pl-1">Template LPJ
                                            2022</span></i>
                                    </button>
                                </span>
                                <table id="datatable"
                                    class="table table-bordered table-responsive-md table-hover text-center">
                                    <thead>
                                        <tr class="bg-primary">
                                            <th>No</th>
                                            <th>Nama Unit/Prodi/Ormawa</th>
                                            <th>Nomor Memo Cair</th>
                                            <th>Judul Kegiatan</th>
                                            <th>Penanggungjawab</th>
                                            <th>Mitra Kerjasama</th>
                                            <th>Nomor PKS</th>
                                            <th colspan="2">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <?php
                                            $nomor = 0;
                                            $namaprodi = '';
                                            $namapj = '';
                                            $namakeg = '';
                                            for ($m = 0; $m < count($tor); $m++) {
                                                $ada = 0; //sudah diajukan apa belum
                                                $cektor = 0; //mengecek hanya ada 1 tor 
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
                                                                $ada += 1;
                                                                for ($u = 0; $u < count($users); $u++) {
                                                                    if ($trx_status_tor[$tr]->create_by == $users[$u]->id) {
                                                                        for ($r = 0; $r < count($roles); $r++) {
                                                                            if ($users[$u]->role == $roles[$r]->id) {
                                                                                $statusTor[0]['status'] = $status[$s]->nama_status . " - " . $roles[$r]->name;
                                                                                for ($d = 0; $d < count($dokumen); $d++) {
                                                                                    if ($dokumen[$d]->id_tor  == $tor[$m]->id) {
                                                                                        $statusTor[$ada]['tor'] = "TOR" . $tor[$m]->id;
                                                                                        $statusTor[0]['sudahUpload'] = 1;
                                                                                    }
                                                                                }
                                                                                if ($statusTor[0]['sudahUpload'] == 1 && $cektor != $tor[$m]->id) {

                                                                                    // Mengambil data Nama Unit (Prodi) dari tabel TOR
                                                                                    for ($v = 0; $v < count($prodi); $v++) {
                                                                                        if ($prodi[$v]->id == $tor[$m]->id_unit) {
                                                                                            $namaprodi = $prodi[$v]->nama_unit;
                                            ?>
                                            <td>{{ $nomor + 1 }}</td><?php $nomor += 1; ?>
                                            <td>{{ $namaprodi }}</td>
                                            <?php for ($a = 0; $a < count($memo_cair); $a++) { 
                                                if ($memo_cair[$a]->id_tor == $tor[$m]->id) {
                                                ?>
                                            <td>{{ $memo_cair[$a]->nomor }}</td>
                                            <?php
                                                }
                                            } ?>
                                            <td>{{ $tor[$m]->nama_kegiatan }}</td>
                                            <td>{{ $tor[$m]->nama_pic }}</td>
                                            <td></td>
                                            <td></td>
                                            <td class="text-center">
                                                @foreach ($trx_status_keu as $a)
                                                    @if ($a->id_tor == $tor[$m]->id)
                                                        @foreach ($status_keu as $b)
                                                            @if ($a->id_status == $b->id)
                                                                <button type="button"
                                                                    class="badge border border-primary text-primary"
                                                                    data-toggle="modal" data-target="#status_lpj">
                                                                    {{ $b->nama_status }}
                                                                </button>
                                                                <span type="button" class="badge badge-dark"
                                                                    title="Validasi" data-toggle="modal"
                                                                    data-target="#validasi_lpj">
                                                                    <i class="ri-edit-fill"></i>
                                                                </span>
                                                                <!-- MODAL - Validasi lPJ -->
                                                                @include('keuangan/all_modal/validasi_lpj')
                                                                <!-- MODAL - Status lPJ -->
                                                                @include('keuangan/all_modal/status_lpj')
                                                            @endif
                                                        @endforeach
                                                    @else
                                                        <span class="badge border border-danger text-danger">
                                                            Belum ada status
                                                        </span>
                                                    @endif
                                                @endforeach
                                            </td>
                                            <td class="text-center">
                                                @foreach ($trx_status_keu as $a)
                                                    @if ($a->id_tor == $tor[$m]->id)
                                                        @foreach ($status_keu as $b)
                                                            @if ($a->id_status == $b->id)
                                                                <button class="btn btn-sm bg-info rounded-pill"
                                                                    title="Detail" data-toggle="modal"
                                                                    data-target="#detail_lpj<?= $tor[$m]->id ?>"><i
                                                                        class="las la-external-link-alt"></i></i>
                                                                </button>
                                                                <button class="btn btn-sm bg-warning rounded-pill"
                                                                    title="Edit" data-toggle="modal"
                                                                    data-target="#edit_lpj<?= $tor[$m]->id ?>"><i
                                                                        class=" las la-edit"></i></i>
                                                                </button>
                                                                <!-- MODAL - Detail Persekot Kerja -->
                                                                @include('keuangan/all_modal/detail_lpj')
                                                                <!-- MODAL - Edit Persekot Kerja -->
                                                                @include('keuangan/all_modal/edit_lpj')
                                                            @endif
                                                        @endforeach
                                                    @else
                                                        <button class="btn btn-sm bg-dark rounded-pill"
                                                            title="Input Persekot Kerja" data-toggle="modal"
                                                            data-target="#input_lpj<?= $tor[$m]->id ?>">
                                                            <i class="las la-upload"></i></i>
                                                        </button>
                                                    @endif
                                                @endforeach
                                            </td>
                                            <!-- MODAL - Input LPJ -->
                                            @include('keuangan/all_modal/input_lpj')
                                            <?php
                                                                                        }
                                                                                    }
                                                                                }
                                                                                $cektor = $tor[$m]->id;
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

<!-- MODAL - Template LPJ -->
@include('keuangan/all_modal/lpj_template')

</html>
