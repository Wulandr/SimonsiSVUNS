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
                                    <thead class="text-center align-center">
                                        <tr class="bg-info">
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
                                                <?php
                                                $tidakada_status = '<span class="badge border border-danger text-danger">Belum ada status</span>';
                                                ?>
                                                @foreach ($trx_status_keu as $a)
                                                    @if ($a->id_tor == $tor[$m]->id)
                                                        @foreach ($status_keu as $b)
                                                            @if ($a->id_status == $b->id)
                                                                @if ($b->kategori == 'Persekot Kerja')
                                                                    <?php $tidakada_status = '<button type="button" class="badge border border-primary text-primary" data-toggle="modal" data-target="#status_pk' . $tor[$m]->id . '">' . $b->nama_status . '</button><span type="button" class="badge badge-dark" data-toggle="modal" data-target="#validasi_pk' . $tor[$m]->id . '"><i class="ri-edit-fill"></i></span>';
                                                                    ?>
                                                                    @if ($b->nama_status == 'Validasi')
                                                                        <?php $tidakada_status = '<button type="button" class="badge border border-primary text-primary" data-toggle="modal" data-target="#status_pk' . $tor[$m]->id . '">' . $b->nama_status . '</button>';
                                                                        ?>
                                                                    @elseif ($b->nama_status == 'Transfer Uang')
                                                                        <?php $tidakada_status = '<button type="button" class="badge border border-success text-success" data-toggle="modal" data-target="#status_pk' . $tor[$m]->id . '">' . $b->nama_status . '</button>';
                                                                        ?>
                                                                    @endif
                                                                @endif
                                                            @endif
                                                        @endforeach
                                                    @endif
                                                @endforeach
                                                <?= $tidakada_status ?>
                                                <!-- MODAL - Validasi Persekot Kerja -->
                                                @include('keuangan/persekot_kerja/validasi_pk')
                                                <!-- MODAL - Validasi Persekot Kerja -->
                                                @include('keuangan/persekot_kerja/validasi_pk2')
                                                <!-- MODAL - Status Persekot Kerja -->
                                                @include('keuangan/persekot_kerja/status_pk')
                                            </td>
                                            <td class="text-center">
                                                <?php
                                                $upload = '<button class="btn btn-sm bg-dark rounded-pill" title="Input Persekot Kerja" data-toggle="modal" data-target="#input_persekotkerja' . $tor[$m]->id . '"><i class="las la-upload"></i></button>';
                                                ?>
                                                @foreach ($trx_status_keu as $a)
                                                    @if ($a->id_tor == $tor[$m]->id)
                                                        @foreach ($status_keu as $b)
                                                            @if ($a->id_status == $b->id)
                                                                @if ($b->kategori == 'Persekot Kerja')
                                                                    <?php $upload = '<button class="btn btn-sm bg-info rounded-pill" title="Detail" data-toggle="modal" data-target="#detail_pk' . $tor[$m]->id . '"><i class="las la-external-link-alt"></i></button><button class="btn btn-sm bg-warning rounded-pill" title="Edit" data-toggle="modal" data-target="#edit_pk' . $tor[$m]->id . '"><i class=" las la-edit"></i></button>';
                                                                    ?>
                                                                    @if ($b->nama_status == 'Validasi')
                                                                        <?php $upload = '<button class="btn btn-sm bg-info rounded-pill" title="Detail" data-toggle="modal" data-target="#detail_pk' . $tor[$m]->id . '"><i class="las la-external-link-alt"></i></button><button class="btn btn-sm btn-info rounded-pill" title="Input Bukti Transfer" data-toggle="modal" data-target="#input_tf_pk' . $tor[$m]->id . '"><i class="las la-money-check-alt"></i></button>';
                                                                        ?>
                                                                    @elseif ($b->nama_status == 'Transfer Uang')
                                                                        <?php $upload = '<button class="btn btn-sm bg-success rounded-pill" title="Lihat Bukti Transfer" data-toggle="modal" data-target="#show_tf_pk' . $tor[$m]->id . '"><i class="las la-money-check-alt"></i></button>';
                                                                        ?>
                                                                    @endif
                                                                @endif
                                                            @endif
                                                        @endforeach
                                                    @endif
                                                @endforeach
                                                <?= $upload ?>
                                                <!-- MODAL - Input Bukti TF Persekot Kerja -->
                                                @include('keuangan/persekot_kerja/input_tf_pk')
                                                <!-- MODAL - Show Bukti TF Persekot Kerja -->
                                                @include('keuangan/persekot_kerja/show_tf_pk')
                                                <!-- MODAL - Edit Persekot Kerja -->
                                                @include('keuangan/persekot_kerja/edit_pk')
                                                <!-- MODAL - Detail Persekot Kerja -->
                                                @include('keuangan/persekot_kerja/detail_pk')
                                            </td>

                                            <!-- MODAL - Input Persekot Kerja -->
                                            @include('keuangan/persekot_kerja/input_pk')

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
