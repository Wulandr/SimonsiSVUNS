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
                                <h4 class="card-title">REKAPITULASI PERSEKOT KERJA</h4>
                            </div>
                        </div>
                        <div class="iq-card-body">
                            <div id="table" class="table-editable">
                                <table class="table table-bordered table-responsive-md table-hover">
                                    <thead class="text-center">
                                        <tr class="bg-primary">
                                            <th>No</th>
                                            <th>Nama Unit/Prodi/Ormawa</th>
                                            <th>Penanggungjawab Kegiatan</th>
                                            <th>Judul Kegiatan</th>
                                            <th style="width: 25%" colspan="2">Status</th>
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
                                            <td>{{ $tor[$m]->nama_pic }}</td>
                                            <td>{{ $tor[$m]->nama_kegiatan }}</td>
                                            <td class="text-center">
                                                @foreach ($trx_status_keu as $a)
                                                    @if ($a->id_tor == $tor[$m]->id)
                                                        @foreach ($status_keu as $b)
                                                            @if ($a->id_status == $b->id)
                                                                @if ($b->kategori == 'Persekot Kerja')
                                                                    <button type="button"
                                                                        class="badge border border-primary text-primary"
                                                                        data-toggle="modal" data-target="#status_pk">
                                                                        {{ $b->nama_status }}
                                                                    </button>
                                                                    <span type="button" class="badge badge-dark"
                                                                        title="Validasi" data-toggle="modal"
                                                                        data-target="#validasi_pk">
                                                                        <i class="ri-edit-fill"></i>
                                                                    </span>
                                                                    <!-- MODAL - Validasi Persekot Kerja -->
                                                                    @include('keuangan/all_modal/validasi_pk')
                                                                    <!-- MODAL - Status Persekot Kerja -->
                                                                    @include('keuangan/all_modal/status_pk')
                                                                @else
                                                                    <span
                                                                        class="badge border border-danger text-danger ">
                                                                        Belum ada status
                                                                    </span>
                                                                @endif
                                                            @endif
                                                        @endforeach
                                                    @endif
                                                @endforeach
                                            </td>
                                            <td class="text-center">
                                                @if (!empty($trx_status_keu))
                                                    @foreach ($trx_status_keu as $a)
                                                        @if ($a->id_tor == $tor[$m]->id)
                                                            @foreach ($status_keu as $b)
                                                                @if ($a->id_status == $b->id)
                                                                    @if ($b->kategori == 'Persekot Kerja')
                                                                        <button class="btn btn-sm bg-info rounded-pill"
                                                                            title="Detail" data-toggle="modal"
                                                                            data-target="#detail_pk<?= $tor[$m]->id ?>"><i
                                                                                class="las la-external-link-alt"></i></i>
                                                                        </button>
                                                                        <button
                                                                            class="btn btn-sm bg-warning rounded-pill"
                                                                            title="Edit" data-toggle="modal"
                                                                            data-target="#edit_pk<?= $tor[$m]->id ?>"><i
                                                                                class=" las la-edit"></i></i>
                                                                        </button>
                                                                        <!-- MODAL - Detail Persekot Kerja -->
                                                                        @include('keuangan/all_modal/detail_pk')
                                                                        <!-- MODAL - Edit Persekot Kerja -->
                                                                        @include('keuangan/all_modal/edit_pk')
                                                                    @else
                                                                        <button class="btn btn-sm bg-dark rounded-pill"
                                                                            title="Input Persekot Kerja"
                                                                            data-toggle="modal"
                                                                            data-target="#input_persekotkerja<?= $tor[$m]->id ?>">
                                                                            <i class="las la-upload"></i></i>
                                                                        </button>
                                                                    @endif
                                                                @endif
                                                            @endforeach
                                                        @endif
                                                    @endforeach
                                                @endif
                                                @if (empty($trx_status_keu))
                                                    <button class="btn btn-sm bg-dark rounded-pill"
                                                        title="Input Persekot Kerja" data-toggle="modal"
                                                        data-target="#input_persekotkerja<?= $tor[$m]->id ?>">
                                                        <i class="las la-upload"></i></i>
                                                    </button>
                                                @endif

                                            </td>

                                            <!-- MODAL - Input Persekot Kerja -->
                                            @include('keuangan/all_modal/input_pk')

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

</html>
