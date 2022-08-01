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
                        <div class="iq-card-header d-flex justify-content-center table-danger">
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
                                    <thead class="bg-danger">
                                        <tr>
                                            <th rowspan="2" style="vertical-align : middle;text-align:center;">No
                                            </th>
                                            <th rowspan="2" style="vertical-align : middle;text-align:center;">
                                                Nama Unit/Prodi/Ormawa</th>
                                            <th rowspan="2" style="vertical-align : middle;text-align:center;">
                                                Nomor Memo Cair</th>
                                            <th rowspan="2" style="vertical-align : middle;text-align:center;">
                                                Judul Kegiatan</th>
                                            <th rowspan="2" style="vertical-align : middle;text-align:center;">
                                                Penanggungjawab</th>
                                            <th colspan="2" style="width: 35%">Aksi</th>
                                        </tr>
                                        <tr>
                                            <th>Status</th>
                                            <th>Form</th>
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

                                            {{-- Mengetahui role user --}}
                                            <?php
                                            foreach ($roles as $role) {
                                                if ($role->id == Auth::user()->role) {
                                                    $RoleLogin = $role->name;
                                                }
                                            }
                                            ?>

                                            <td class="text-center">
                                                @can('spj_create')
                                                    <?php
                                                    $tidakada_status = '<span class="badge border border-danger text-danger">Belum ada status</span>';
                                                    ?>
                                                @endcan
                                                @foreach ($trx_status_keu as $a)
                                                    @if ($a->id_tor == $tor[$m]->id)
                                                        @foreach ($status_keu as $b)
                                                            @if ($a->id_status == $b->id && $b->kategori == 'SPJ')
                                                                <?php $tidakada_status = '<button type="button" class="badge border border-primary text-primary" data-toggle="modal" data-target="#status_spj' . $tor[$m]->id . '">' . $b->nama_status . '</button>';
                                                                ?>

                                                                {{-- Jika Role Staf Keuangan --}}
                                                                @if ($RoleLogin === 'Staf Keuangan')
                                                                    <?php $tidakada_status = '<button type="button" class="badge border border-primary text-primary" data-toggle="modal" data-target="#status_spj' . $tor[$m]->id . '">' . $b->nama_status . '</button><span type="button" class="badge badge-dark" data-toggle="modal" data-target="#validasi_spj' . $tor[$m]->id . '"><i class="ri-edit-fill"></i></span>';
                                                                    ?>
                                                                    @if ($b->nama_status == 'Revisi')
                                                                        <?php $tidakada_status = '<button type="button" class="badge border border-primary text-primary" data-toggle="modal" data-target="#status_spj' . $tor[$m]->id . '">' . $b->nama_status . '</button><span type="button" class="badge badge-secondary" data-toggle="modal" data-target="#revisi_spj' . $tor[$m]->id . '"><i class="las la-comment"></i></span>';
                                                                        ?>
                                                                    @elseif ($b->nama_status == 'Verifikasi')
                                                                        <?php $tidakada_status = '<button type="button" class="badge border border-primary text-primary" data-toggle="modal" data-target="#status_spj' . $tor[$m]->id . '">' . $b->nama_status . '</button>';
                                                                        ?>
                                                                    @elseif ($b->nama_status == 'Pelunasan Pembayaran/SPJ Selesai')
                                                                        <?php $tidakada_status = '<button type="button" class="badge border border-success text-success" data-toggle="modal" data-target="#status_spj' . $tor[$m]->id . '">' . $b->nama_status . '</button>';
                                                                        ?>
                                                                    @endif
                                                                @endif
                                                            @endif
                                                        @endforeach
                                                    @endif
                                                @endforeach

                                                @can('spj_create')
                                                    <?= $tidakada_status ?>
                                                @endcan
                                                <!-- MODAL - Status spj -->
                                                @include('keuangan/spj/status_spj')
                                                <!-- MODAL - Validasi spj -->
                                                @include('keuangan/spj/validasi_spj')
                                                <!-- MODAL - Revisi spj -->
                                                @include('keuangan/spj/showrevisi_spj')
                                            </td>

                                            <td class="text-center">
                                                @if ($RoleLogin === 'Prodi')
                                                    <?php
                                                    $file = '<a href="' . url('/upload_spj/') . '?idtor=' . base64_encode($tor[$m]->id) . '"><button class="btn btn-sm bg-secondary rounded-pill" title="Upload File SPJ"><i class="las la-upload"></i></i></button></a>';
                                                    ?>
                                                @else
                                                    <?php $file = '<span class="badge border border-danger text-danger">Prodi Belum Mengajukan SPJ</span>'; ?>
                                                @endif

                                                @foreach ($trx_status_keu as $a)
                                                    @if ($a->id_tor == $tor[$m]->id)
                                                        @foreach ($status_keu as $b)
                                                            @if ($a->id_status == $b->id && $b->kategori == 'SPJ')
                                                                <?php
                                                                $file = '<a href="' . url('/detail_spj/') . '?idtor=' . base64_encode($tor[$m]->id) . '"><button class="btn btn-sm bg-info rounded-pill" title="Detail File SPJ"><i class="las la-external-link-alt"></i></i></button></a>';
                                                                ?>
                                                                @if ($b->nama_status == 'Pelunasan Pembayaran/SPJ Selesai')
                                                                    <?php $file = '<a href="' . url('/detail_spj/') . '?idtor=' . base64_encode($tor[$m]->id) . '"><button class="btn btn-sm bg-info rounded-pill" title="Detail File SPJ"><i class="las la-external-link-alt"></i></i></button></a><button class="btn btn-sm bg-success rounded-pill" title="Lihat Bukti Transfer" data-toggle="modal" data-target="#show_tf_spj' . $tor[$m]->id . '"><i class="las la-check"></i></button>';
                                                                    ?>
                                                                @elseif ($RoleLogin === 'Prodi')
                                                                    <?php
                                                                    $file = '<a href="' . url('/detail_spj/') . '?idtor=' . base64_encode($tor[$m]->id) . '"><button class="btn btn-sm bg-info rounded-pill" title="Detail File SPJ"><i class="las la-external-link-alt"></i></i></button></a><a href="' . url('/edit_spj/') . '?idtor=' . base64_encode($tor[$m]->id) . '"><button class="btn btn-sm bg-warning rounded-pill" title="Edit File SPJ"><i class="las la-edit"></i></i></button></a>';
                                                                    ?>
                                                                    @if ($b->nama_status == 'Revisi')
                                                                        <?php
                                                                        $file = '<a href="' . url('/upload_spj/') . '?idtor=' . base64_encode($tor[$m]->id) . '"><button class="btn btn-sm bg-secondary rounded-pill" title="Upload File SPJ"><i class="las la-upload"></i></i></button></a>';
                                                                        ?>
                                                                    @elseif ($b->nama_status == 'Verifikasi')
                                                                        <?php $file = '<a href="' . url('/detail_spj/') . '?idtor=' . base64_encode($tor[$m]->id) . '"><button class="btn btn-sm bg-info rounded-pill" title="Detail File SPJ"><i class="las la-external-link-alt"></i></i></button></a>';
                                                                        ?>
                                                                    @elseif ($b->nama_status == 'Pelunasan Pembayaran/SPJ Selesai')
                                                                        <?php $file = '<a href="' . url('/detail_spj/') . '?idtor=' . base64_encode($tor[$m]->id) . '"><button class="btn btn-sm bg-info rounded-pill" title="Detail File SPJ"><i class="las la-external-link-alt"></i></i></button></a><button class="btn btn-sm bg-success rounded-pill" title="Lihat Bukti Transfer" data-toggle="modal" data-target="#show_tf_spj' . $tor[$m]->id . '"><i class="las la-check"></i></button>';
                                                                        ?>
                                                                    @endif
                                                                @elseif ($RoleLogin === 'Staf Keuangan')
                                                                    @if ($b->nama_status == 'Verifikasi')
                                                                        <?php $file = '<a href="' . url('/detail_spj/') . '?idtor=' . base64_encode($tor[$m]->id) . '"><button class="btn btn-sm bg-info rounded-pill" title="Detail File SPJ"><i class="las la-external-link-alt"></i></i></button></a><button class="btn btn-sm bg-info rounded-pill" title="Input Bukti Transfer" data-toggle="modal" data-target="#input_tf_spj' . $tor[$m]->id . '"><i class="las la-money-check-alt"></i></button>';
                                                                        ?>
                                                                    @elseif ($b->nama_status == 'Pelunasan Pembayaran/SPJ Selesai')
                                                                        <?php $file = '<a href="' . url('/detail_spj/') . '?idtor=' . base64_encode($tor[$m]->id) . '"><button class="btn btn-sm bg-info rounded-pill" title="Detail File SPJ"><i class="las la-external-link-alt"></i></i></button></a><button class="btn btn-sm bg-success rounded-pill" title="Lihat Bukti Transfer" data-toggle="modal" data-target="#show_tf_spj' . $tor[$m]->id . '"><i class="las la-check"></i></button>';
                                                                        ?>
                                                                    @endif
                                                                @endif
                                                            @endif
                                                        @endforeach
                                                    @endif
                                                @endforeach


                                                <?= $file ?>

                                            </td>

                                            <!-- MODAL - Bukti TF spj -->
                                            @include('keuangan/spj/input_tf_spj')
                                            @include('keuangan/spj/show_tf_spj')
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
    @include('keuangan/spj/spj_file')

    <!-- Footer -->
    @include('dashboards/users/layouts/footer')

</body>

</html>

<script type="text/javascript">
    // Memunculkan Button Update Status sesuai Status yang dimiliki
    function pengajuan(id) {
        document.getElementById('revisispj' + id).style.display = 'none';
    }

    function revisi(id) {
        document.getElementById('revisispj' + id).style.display = 'block';
    }

    function verifikasi(id) {
        document.getElementById('revisispj' + id).style.display = 'none';
    }

    function spjselesai(id) {
        document.getElementById('revisispj' + id).style.display = 'none';
    }

    // Memunculkan input tambah file tf untuk pelunasan spj
    function belumselesai(id) {
        document.getElementById('input_tf' + id).style.display = 'block';
    }

    function selesai(id) {
        document.getElementById('input_tf' + id).style.display = 'none';
    }
</script>
