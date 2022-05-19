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
                                <h4 class="card-title">REKAPITULASI SURAT PERTANGGUNGJAWABAN (SPJ)</h4>
                            </div>
                        </div>
                        <div class="iq-card-body">
                            <div id="table" class="table-editable">
                                <span class="table-add float-right mb-3 mr-2">
                                    <button class="btn btn-info mb-3" title="Input SPJ Baru" data-toggle="modal"
                                        data-target="#spj_file">
                                        <i class="las la-file-alt"></i><span class="pl-1">SPJ File
                                        </span></i>
                                    </button>
                                </span>
                                <table class="table table-bordered table-responsive-md table-hover text-center">
                                    <thead>
                                        <tr class="bg-primary">
                                            <th>No</th>
                                            <th>Nama Unit/Prodi/Ormawa</th>
                                            <th>Nomor Memo Cair</th>
                                            <th>Penanggungjawab</th>
                                            <th>Nilai Total SPJ</th>
                                            <th>Nilai Pengembalian</th>
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
                                            <td>{{ $tor[$m]->nama_pic }}</td>
                                            <td></td>
                                            <td></td>
                                            <td class="text-center">
                                                @foreach ($trx_status_keu as $a)
                                                    @if ($a->id_tor == $tor[$m]->id)
                                                        @foreach ($status_keu as $b)
                                                            @if ($a->id_status == $b->id)
                                                                <span class="badge border border-primary text-primary">
                                                                    {{ $b->nama_status }}
                                                                </span>
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
                                                                <a href="{{ url('upload_spj') }}">
                                                                    <button class="btn btn-sm bg-info rounded-pill"
                                                                        title="Input File SPJ">
                                                                        <i class="las la-external-link-alt"></i></i>
                                                                    </button>
                                                                </a>
                                                                <a href="{{ url('upload_spj') }}">
                                                                    <button class="btn btn-sm bg-warning rounded-pill"
                                                                        title="Input File SPJ">
                                                                        <i class="las la-edit"></i></i>
                                                                    </button>
                                                                </a>
                                                            @endif
                                                        @endforeach
                                                    @else
                                                        <a href="{{ url('upload_spj') }}">
                                                            <button class="btn btn-sm bg-dark rounded-pill"
                                                                title="Input File SPJ">
                                                                <i class="las la-upload"></i></i>
                                                            </button>
                                                        </a>
                                                    @endif
                                                @endforeach
                                            </td>

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
    <!-- MODAL - SPJ FILE -->
    @include('keuangan/all_modal/spj_file')

    <!-- Footer -->
    @include('dashboards/users/layouts/footer')

</body>

</html>
