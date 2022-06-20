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
                <div class="col-sm-12 col-lg-12">
                    <div class="iq-card">
                        <div class="iq-card-header d-flex justify-content-center">
                            <div class="iq-header-title">
                                <h4 class="card-title">Input Formulir Surat Pertanggungjawaban (SPJ)</h4>
                            </div>
                        </div>
                        <div class="iq-card-body">
                            <form class="needs-validation" enctype="multipart/form-data" method="post"
                                action="{{ url('/input_spj') }}" novalidate>
                                {{ csrf_field() }}
                                <div class="form-group row">
                                    <label class="control-label col-sm-5 align-self-center mb-0"
                                        for="validationCustom01">
                                        Nama Unit/Prodi/Ormawa</label>
                                    <div class="col-sm-7">
                                        <input type="text" class="form-control" value="{{ $namaprodi }}" disabled>
                                    </div>
                                </div>
                                <?php
                                for ($a = 0; $a < count($memo_cair); $a++) {
                                    if ($memo_cair[$a]->id_tor == $_GET['idtor']) {
                                ?>
                                <div class="form-group row">
                                    <label class="control-label col-sm-5 align-self-center mb-0">ID Ajuan Memo
                                        Cair</label>
                                    <div class="col-sm-7">
                                        <input type="text" class="form-control" value="{{ $memocair }}" disabled>
                                    </div>
                                </div>
                                <?php
                                }
                                } ?>
                                <div class="form-group row">
                                    <label class="control-label col-sm-5 align-self-center mb-0"
                                        for="validationCustom01">Nama
                                        Penanggungjawab Kegiatan</label>
                                    <div class="col-sm-7">
                                        <input type="text" class="form-control" id="validationCustom01"
                                            value="{{ $penanggung }}" disabled>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="control-label col-sm-5 align-self-center mb-0"
                                        for="validationCustom01">Nomor HP
                                        Penanggungjawab Kegiatan</label>
                                    <div class="col-sm-7">
                                        <input type="text" class="form-control" id="validationCustom01"
                                            value="{{ $kontak }}" disabled>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="control-label col-sm-5 align-self-center mb-0"
                                        for="validationCustom01">Nilai
                                        Total SPJ</label>
                                    <div class="col-sm-7">
                                        <input type="text" name="nilai_total" class="form-control"
                                            id="validationCustom01" required>
                                    </div>
                                    <div class="invalid-feedback">
                                        Required!
                                    </div>
                                </div>
                                <input type="hidden" name="id_tor" class="form-control" value="<?= $_GET['idtor'] ?>">
                                <input type="hidden" name="jenis" value="SPJ" class="custom-file-input" required>
                                <input type="hidden" name="id_status" class="form-control" value="4">
                                <input type="hidden" name="create_by" class="form-control"
                                    value="<?= Auth()->user()->id ?>">
                                <?php date_default_timezone_set('Asia/Jakarta'); ?>
                                <input name="created_at" id="created_at" type="hidden"
                                    value="<?= date('Y-m-d H:i:s') ?>">
                                <input name="updated_at" id="updated_at" type="hidden" value="<?= date('Y-m-d') ?>">
                                <div class="form-group row">
                                    <label class="control-label col-sm-5 align-self-center mb-0"
                                        for="validationCustom01">Nilai
                                        Pengembalian
                                        <small style="color: darkred"><b>(Jika Ada)</b></small></label>
                                    <div class="col-sm-7">
                                        <input type="text" name="nilai_kembali" class="form-control"
                                            id="validationCustom01" required>
                                    </div>
                                    <div class="invalid-feedback">
                                        Required!
                                    </div>
                                </div>
                                {{-- <button type="submit" class="btn btn-primary">Upload</button>
                            </form> --}}
                        </div>
                    </div>
                    <div class="iq-card">
                        <div class="iq-card-header d-flex justify-content-center table-primary">
                            <div class="iq-header-title">
                                <h4 class="card-title">Unggah Dokumen Pendukung Surat Pertanggungjawaban (SPJ)</h4>
                            </div>
                        </div>
                        <div class="iq-card-body">
                            <p></p>
                            <div class="row">
                                <div class="col-sm-3">
                                    <div class="nav flex-column nav-pills text-left" id="v-pills-tab" role="tablist"
                                        aria-orientation="vertical">
                                        <?php
                                        for ($a = 0; $a < count($spj_kategori); $a++) {
                                        ?>
                                        <a class="nav-link" id="tab-spj_kategori[$a]->id }}" data-toggle="pill"
                                            href="#content-{{ $spj_kategori[$a]->id }}" role="tab"
                                            aria-controls="{{ $spj_kategori[$a]->id }}"
                                            aria-selected="true">{{ $spj_kategori[$a]->nama_kategori }}
                                        </a>
                                        <?php } ?>
                                    </div>
                                </div>

                                <div class="col-sm-9">
                                    <div class="tab-content mt-0" id="v-pills-tabContent">
                                        <?php
                                        for ($a = 0; $a < count($spj_kategori); $a++) {

                                        ?>
                                        <div class="tab-pane fade show" role="tabpanel"
                                            id="content-{{ $spj_kategori[$a]->id }}"
                                            aria-labelledby="tab-{{ $spj_kategori[$a]->id }}">

                                            {{-- <form class="needs-validation" enctype="multipart/form-data"
                                                method="post" action="{{ url('/input_spj') }}">
                                                @csrf --}}
                                            <div class="col-12">
                                                <h5 class="mb-2" style="color: #1E3D73">
                                                    <b>{{ $spj_kategori[$a]->nama_kategori }}</b>
                                                </h5>
                                                <?php $no = 1;
                                                            for ($b = 0; $b < count($spj_subkategori); $b++) {
                                                                if ($spj_subkategori[$b]->id_kategori == $spj_kategori[$a]->id) { ?>
                                                <p>{!! $spj_subkategori[$a]->catatan !!}</p>
                                                <table class="table">
                                                    <tr class="form-group">
                                                        <td>{{ $no }}</td>
                                                        <td style="width: 65%" style="width: 65%">
                                                            <label for="exampleFormControlFile1">
                                                                {{ $spj_subkategori[$b]->nama_subkategori }}
                                                            </label>
                                                        </td>
                                                        <td>
                                                            <input type="file" class="form-control-file"
                                                                name="file" id="file" required>
                                                            <input type="hidden" class="form-control-file"
                                                                name="id_subkategori" id="id_subkategori"
                                                                value="{{ $spj_subkategori[$b]->id }}">
                                                            <input type="hidden" name="id_tor" class="form-control"
                                                                value="<?= $_GET['idtor'] ?>">
                                                        </td>
                                                    </tr>
                                                    <?php $no += 1;
                                                                }
                                                            } ?>
                                                </table>
                                            </div>
                                        </div>
                                        <?php
                                        } ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="iq-card-footer float-right">
                            <button type="submit" class="btn btn-primary m-3">Upload</button>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="iq-card-body">
        <p></p>
        <div class="row">
            <div class="col-sm-3">
                <div class="nav flex-column nav-pills text-left" id="v-pills-tab" role="tablist"
                    aria-orientation="vertical">
                    <a class="nav-link active" id="v-pills-home-tab" data-toggle="pill" href="#v-pills-home"
                        role="tab" aria-controls="v-pills-home" aria-selected="true">Konsumsi Kegiatan</a>
                    <a class="nav-link" id="v-pills-profile-tab" data-toggle="pill" href="#v-pills-profile"
                        role="tab" aria-controls="v-pills-profile" aria-selected="false">Kontribusi/Registrasi
                        Pelatihan/Sekom</a>
                    <a class="nav-link" id="v-pills-messages-tab" data-toggle="pill" href="#v-pills-messages"
                        role="tab" aria-controls="v-pills-messages" aria-selected="false">Honor Narasumber
                        Kegiatan</a>
                    <a class="nav-link" id="v-pills-settings-tab" data-toggle="pill" href="#v-pills-settings"
                        role="tab" aria-controls="v-pills-settings" aria-selected="false">Pembelian Barang dan
                        Jasa</a>
                    <a class="nav-link" id="v-pills-profile2-tab" data-toggle="pill" href="#v-pills-profile2"
                        role="tab" aria-controls="v-pills-profile2" aria-selected="false">Honor Magang
                        Mahasiswa/Asisten Praktikum</a>
                    <a class="nav-link" id="v-pills-messages2-tab" data-toggle="pill" href="#v-pills-messages2"
                        role="tab" aria-controls="v-pills-messages2" aria-selected="false">Bantuan
                        Transport/Transport Lokal (Karesidenan
                        Surakarta)</a>
                    <a class="nav-link" id="v-pills-settings2-tab" data-toggle="pill" href="#v-pills-settings2"
                        role="tab" aria-controls="v-pills-settings2" aria-selected="false">SPPD</a>
                </div>
            </div>
            <div class="col-sm-9">
                <div class="tab-content mt-0" id="v-pills-tabContent">
                    {{-- KONSUMSI KEGIATAN --}}
                    <div class="tab-pane fade show active" id="v-pills-home" role="tabpanel"
                        aria-labelledby="v-pills-home-tab">

                        <div class="col-12">
                            <form enctype="multipart/form-data" method="post" action="">
                                <h5 class="mb-4" style="color: #1E3D73">
                                    <b>Konsumsi Kegiatan</b>
                                </h5>
                                <div class="form-group">
                                    <label for="exampleFormControlFile1">Example file
                                        input</label>
                                    <input type="file" class="form-control-file" id="exampleFormControlFile1">
                                </div>
                                <div class="float-right mb-3 mr-2">
                                    <button type="submit" class="btn btn-primary">Upload</button>
                                </div>
                            </form>
                        </div>
                    </div>

                    {{-- Kontribusi/Registrasi Pelatihan/Sekom --}}
                    <div class="tab-pane fade show" id="v-pills-profile" role="tabpanel"
                        aria-labelledby="v-pills-profile-tab">

                        <form enctype="multipart/form-data" method="post" action="">
                            <div class="col-12">
                                <h5 class="mb-2" style="color: #1E3D73">
                                    <b>Kontribusi/Registrasi Pelatihan/Sekom</b>
                                </h5>
                                <p>Untuk nominal 10jt – 50jt <span style="color: red">
                                        (Silahkan menghubungi bagian BMN guna membantu terkait
                                        penyelesaian SPJ)</span></p>
                                <ul>
                                    <li>Surat Pesanan dari Prodi (nomor dari SV)</li>
                                    <li>Surat Kesanggupan Rekanan</li>
                                </ul>
                                <table class="table">
                                    <tr class="form-group">
                                        <td>1.</td>
                                        <td style="width: 65%">
                                            <label for="exampleFormControlFile1">
                                                Penawaran Program dari Rekanan (Semacam Iklan)
                                            </label>
                                        </td>
                                        <td>
                                            <input type="file" class="form-control-file"
                                                id="exampleFormControlFile1">
                                        </td>
                                    </tr>
                                    <tr class="form-group">
                                        <td>2.</td>
                                        <td style="width: 65%">
                                            <label for="exampleFormControlFile1">
                                                Surat Penunjukan / Permohona Pelatihan atau
                                                Sertifikasi
                                            </label>
                                        </td>
                                        <td>
                                            <input type="file" class="form-control-file"
                                                id="exampleFormControlFile1">
                                        </td>
                                    </tr>
                                    <tr class="form-group">
                                        <td>3.</td>
                                        <td style="width: 65%">
                                            <label for="exampleFormControlFile1">
                                                Surat Tugas Mengikuti
                                            </label>
                                        </td>
                                        <td>
                                            <input type="file" class="form-control-file"
                                                id="exampleFormControlFile1">
                                        </td>
                                    </tr>
                                    <tr class="form-group">
                                        <td>4.</td>
                                        <td style="width: 65%">
                                            <label for="exampleFormControlFile1">Kuitansi</label>
                                        </td>
                                        <td>
                                            <input type="file" class="form-control-file"
                                                id="exampleFormControlFile1">
                                        </td>
                                    </tr>
                                    <tr class="form-group">
                                        <td>5.</td>
                                        <td style="width: 65%">
                                            <label for="exampleFormControlFile1">SPBy</label>
                                        </td>
                                        <td>
                                            <input type="file" class="form-control-file"
                                                id="exampleFormControlFile1">
                                        </td>
                                    </tr>
                                    <tr class="form-group">
                                        <td>6.</td>
                                        <td style="width: 65%">
                                            <label for="exampleFormControlFile1">Fotocopy
                                                Sertifikat</label>
                                        </td>
                                        <td>
                                            <input type="file" class="form-control-file"
                                                id="exampleFormControlFile1">
                                        </td>
                                    </tr>
                                    <tr class="form-group">
                                        <td>7.</td>
                                        <td style="width: 65%">
                                            <label for="exampleFormControlFile1">LPJ
                                                Kegiatan</label>
                                        </td>
                                        <td>
                                            <input type="file" class="form-control-file"
                                                id="exampleFormControlFile1">
                                        </td>
                                    </tr>
                                </table>
                            </div>
                            <div class="float-right mb-3 mr-2">
                                <button type="submit" class="btn btn-primary">Upload</button>
                            </div>
                        </form>
                    </div>

                    {{-- Honor Narasumber Kegiatan --}}
                    <div class="tab-pane fade show" id="v-pills-messages" role="tabpanel"
                        aria-labelledby="v-pills-messages-tab">

                        <form enctype="multipart/form-data" method="post" action="">
                            <div class="col-12">
                                <h5 class="mb-2" style="color: #1E3D73">
                                    <b>Honor Narasumber Kegiatan</b>
                                </h5>
                                <table class="table">
                                    <tr class="form-group">
                                        <td>1.</td>
                                        <td style="width: 65%">
                                            <label for="exampleFormControlFile1">
                                                Undangan Kegiatan
                                            </label>
                                        </td>
                                        <td>
                                            <input type="file" class="form-control-file"
                                                id="exampleFormControlFile1">
                                        </td>
                                    </tr>
                                    <tr class="form-group">
                                        <td>2.</td>
                                        <td style="width: 65%">
                                            <label for="exampleFormControlFile1">
                                                Undangan Narasumber
                                            </label>
                                        </td>
                                        <td>
                                            <input type="file" class="form-control-file"
                                                id="exampleFormControlFile1">
                                        </td>
                                    </tr>
                                    <tr class="form-group">
                                        <td>3.</td>
                                        <td style="width: 65%">
                                            <label for="exampleFormControlFile1">
                                                Kesediaan Narasumber
                                            </label>
                                        </td>
                                        <td>
                                            <input type="file" class="form-control-file"
                                                id="exampleFormControlFile1">
                                        </td>
                                    </tr>
                                    <tr class="form-group">
                                        <td>4.</td>
                                        <td style="width: 65%">
                                            <label for="exampleFormControlFile1">Daftar Hadir
                                                Narasumber dan Peserta
                                            </label>
                                        </td>
                                        <td>
                                            <input type="file" class="form-control-file"
                                                id="exampleFormControlFile1">
                                        </td>
                                    </tr>
                                    <tr class="form-group">
                                        <td>5.</td>
                                        <td style="width: 65%">
                                            <label for="exampleFormControlFile1">Rundown
                                                Acara</label>
                                        </td>
                                        <td>
                                            <input type="file" class="form-control-file"
                                                id="exampleFormControlFile1">
                                        </td>
                                    </tr>
                                    <tr class="form-group">
                                        <td>6.</td>
                                        <td style="width: 65%">
                                            <label for="exampleFormControlFile1">Kuitansi</label>
                                        </td>
                                        <td>
                                            <input type="file" class="form-control-file"
                                                id="exampleFormControlFile1">
                                        </td>
                                    </tr>
                                    <tr class="form-group">
                                        <td>7.</td>
                                        <td style="width: 65%">
                                            <label for="exampleFormControlFile1">SPBy</label>
                                        </td>
                                        <td>
                                            <input type="file" class="form-control-file"
                                                id="exampleFormControlFile1">
                                        </td>
                                    </tr>
                                    <tr class="form-group">
                                        <td>7.</td>
                                        <td style="width: 65%">
                                            <label for="exampleFormControlFile1">Copy Buku
                                                Rekening
                                                + NPWP + KTP
                                            </label>
                                        </td>
                                        <td>
                                            <input type="file" class="form-control-file"
                                                id="exampleFormControlFile1">
                                        </td>
                                    </tr>
                                    <tr class="form-group">
                                        <td>7.</td>
                                        <td style="width: 65%">
                                            <label for="exampleFormControlFile1">LPJ Kegiatan
                                                (Apabila Daring + Video Recordnya bentuk
                                                CD)</label>
                                        </td>
                                        <td>
                                            <input type="file" class="form-control-file"
                                                id="exampleFormControlFile1">
                                        </td>
                                    </tr>
                                </table>
                            </div>
                            <div class="float-right mb-3 mr-2">
                                <button type="submit" class="btn btn-primary">Upload</button>
                            </div>
                        </form>
                    </div>

                    {{-- Pembelian Barang dan Jasa --}}
                    <div class="tab-pane fade show" id="v-pills-settings" role="tabpanel"
                        aria-labelledby="v-pills-settings-tab">

                        <form enctype="multipart/form-data" method="post" action="">
                            <div class="col-12">
                                <h5 class="mb-2" style="color: #1E3D73">
                                    <b>Pembelian Barang dan Jasa</b>
                                </h5>
                                <p>Untuk nominal 10jt – 50jt <span style="color: red">
                                        (Silahkan menghubungi bagian BMN guna membantu terkait
                                        penyelesaian SPJ)</span></p>
                                <ul>
                                    <li>Surat Pesanan dari Prodi (nomor dari SV)</li>
                                    <li>Surat Kesanggupan Rekanan</li>
                                </ul>
                                <table class="table">
                                    <tr class="form-group">
                                        <td>1.</td>
                                        <td style="width: 65%">
                                            <label for="exampleFormControlFile1">Kuitansi</label>
                                        </td>
                                        <td>
                                            <input type="file" class="form-control-file"
                                                id="exampleFormControlFile1">
                                        </td>
                                    </tr>
                                    <tr class="form-group">
                                        <td>2.</td>
                                        <td style="width: 65%">
                                            <label for="exampleFormControlFile1">SPBy</label>
                                        </td>
                                        <td>
                                            <input type="file" class="form-control-file"
                                                id="exampleFormControlFile1">
                                        </td>
                                    </tr>
                                    <tr class="form-group">
                                        <td>3.</td>
                                        <td style="width: 65%">
                                            <label for="exampleFormControlFile1">Nota</label>
                                        </td>
                                        <td>
                                            <input type="file" class="form-control-file"
                                                id="exampleFormControlFile1">
                                        </td>
                                    </tr>
                                    <tr class="form-group">
                                        <td>4.</td>
                                        <td style="width: 65%">
                                            <label for="exampleFormControlFile1">NPWP +
                                                KTP</label>
                                        </td>
                                        <td>
                                            <input type="file" class="form-control-file"
                                                id="exampleFormControlFile1">
                                        </td>
                                    </tr>
                                    <tr class="form-group">
                                        <td>5.</td>
                                        <td style="width: 65%">
                                            <label for="exampleFormControlFile1">Referensi
                                                Bank</label>
                                        </td>
                                        <td>
                                            <input type="file" class="form-control-file"
                                                id="exampleFormControlFile1">
                                        </td>
                                    </tr>
                                </table>
                            </div>
                            <div class="float-right mb-3 mr-2">
                                <button type="submit" class="btn btn-primary">Upload</button>
                            </div>
                        </form>
                    </div>

                    {{-- Honor Magang Mahasiswa/Asisten Praktikum --}}
                    <div class="tab-pane fade show" id="v-pills-profile2" role="tabpanel"
                        aria-labelledby="v-pills-profile2-tab">

                        <form enctype="multipart/form-data" method="post" action="">
                            <div class="col-12">
                                <h5 class="mb-2" style="color: #1E3D73">
                                    <b>Honor Magang Mahasiswa/Asisten Praktikum</b>
                                </h5>
                                <table class="table">
                                    <tr class="form-group">
                                        <td>1.</td>
                                        <td style="width: 65%">
                                            <label for="exampleFormControlFile1">SK
                                                Magang</label>
                                        </td>
                                        <td>
                                            <input type="file" class="form-control-file"
                                                id="exampleFormControlFile1">
                                        </td>
                                    </tr>
                                    <tr class="form-group">
                                        <td>2.</td>
                                        <td style="width: 65%">
                                            <label for="exampleFormControlFile1">Daftar Hadir
                                                Mahasiswa</label>
                                        </td>
                                        <td>
                                            <input type="file" class="form-control-file"
                                                id="exampleFormControlFile1">
                                        </td>
                                    </tr>
                                    <tr class="form-group">
                                        <td>3.</td>
                                        <td style="width: 65%">
                                            <label for="exampleFormControlFile1">Kuitansi/Tanda
                                                Terima Honor
                                            </label>
                                        </td>
                                        <td>
                                            <input type="file" class="form-control-file"
                                                id="exampleFormControlFile1">
                                        </td>
                                    </tr>
                                    <tr class="form-group">
                                        <td>4.</td>
                                        <td style="width: 65%">
                                            <label for="exampleFormControlFile1">SPBy</label>
                                        </td>
                                        <td>
                                            <input type="file" class="form-control-file"
                                                id="exampleFormControlFile1">
                                        </td>
                                    </tr>
                                    <tr class="form-group">
                                        <td>5.</td>
                                        <td style="width: 65%">
                                            <label for="exampleFormControlFile1">LPJ</label>
                                        </td>
                                        <td>
                                            <input type="file" class="form-control-file"
                                                id="exampleFormControlFile1">
                                        </td>
                                    </tr>
                                </table>
                            </div>
                            <div class="float-right mb-3 mr-2">
                                <button type="submit" class="btn btn-primary">Upload</button>
                            </div>
                        </form>
                    </div>

                    {{-- Bantuan Transport/Transport Lokal (Karesidenan Surakarta) --}}
                    <div class="tab-pane fade show" id="v-pills-messages2" role="tabpanel"
                        aria-labelledby="v-pills-messages2-tab">

                        <form enctype="multipart/form-data" method="post" action="">
                            <div class="col-12">
                                <h5 class="mb-2" style="color: #1E3D73">
                                    <b>Bantuan Transport/Transport Lokal (Karesidenan
                                        Surakarta)</b>
                                </h5>
                                <table class="table">
                                    <tr class="form-group">
                                        <td>1.</td>
                                        <td style="width: 65%">
                                            <label for="exampleFormControlFile1">Surat Tugas
                                                (Dicap
                                                Instansi Yang dikunjungi)</label>
                                        </td>
                                        <td>
                                            <input type="file" class="form-control-file"
                                                id="exampleFormControlFile1">
                                        </td>
                                    </tr>
                                    <tr class="form-group">
                                        <td>2.</td>
                                        <td style="width: 65%">
                                            <label for="exampleFormControlFile1">Kuitansi
                                                (Daftar
                                                Penerimaan Bantuan Transport)
                                            </label>
                                        </td>
                                        <td>
                                            <input type="file" class="form-control-file"
                                                id="exampleFormControlFile1">
                                        </td>
                                    </tr>
                                    <tr class="form-group">
                                        <td>3.</td>
                                        <td style="width: 65%">
                                            <label for="exampleFormControlFile1">SPBy
                                            </label>
                                        </td>
                                        <td>
                                            <input type="file" class="form-control-file"
                                                id="exampleFormControlFile1">
                                        </td>
                                    </tr>
                                    <tr class="form-group">
                                        <td>4.</td>
                                        <td style="width: 65%">
                                            <label for="exampleFormControlFile1">Bukti
                                                Pengeluaran
                                                Rill</label>
                                        </td>
                                        <td>
                                            <input type="file" class="form-control-file"
                                                id="exampleFormControlFile1">
                                        </td>
                                    </tr>
                                    <tr class="form-group">
                                        <td>5.</td>
                                        <td style="width: 65%">
                                            <label for="exampleFormControlFile1">LPJ
                                                Kegiatan</label>
                                        </td>
                                        <td>
                                            <input type="file" class="form-control-file"
                                                id="exampleFormControlFile1">
                                        </td>
                                    </tr>
                                </table>
                            </div>
                            <div class="float-right mb-3 mr-2">
                                <button type="submit" class="btn btn-primary">Upload</button>
                            </div>
                        </form>
                    </div>

                    {{-- SPPD --}}
                    <div class="tab-pane fade show" id="v-pills-settings2" role="tabpanel"
                        aria-labelledby="v-pills-settings2-tab">

                        <form enctype="multipart/form-data" method="post" action="">
                            <div class="col-12">
                                <h5 class="mb-2" style="color: #1E3D73">
                                    <b>SPDD</b>
                                </h5>
                                <table class="table">
                                    <tr class="form-group">
                                        <td>1.</td>
                                        <td style="width: 65%" style="width: 65%">
                                            <label for="exampleFormControlFile1">Surat
                                                Tugas</label>
                                        </td>
                                        <td>
                                            <input type="file" class="form-control-file"
                                                id="exampleFormControlFile1">
                                        </td>
                                    </tr>
                                    <tr class="form-group">
                                        <td>2.</td>
                                        <td style="width: 65%" style="width: 65%">
                                            <label for="exampleFormControlFile1">Lembar SPDD
                                            </label>
                                        </td>
                                        <td>
                                            <input type="file" class="form-control-file"
                                                id="exampleFormControlFile1">
                                        </td>
                                    </tr>
                                    <tr class="form-group">
                                        <td>3.</td>
                                        <td style="width: 65%" style="width: 65%">
                                            <label for="exampleFormControlFile1">Rincian
                                                Pembayaran
                                            </label>
                                        </td>
                                        <td>
                                            <input type="file" class="form-control-file"
                                                id="exampleFormControlFile1">
                                        </td>
                                    </tr>
                                    <tr class="form-group">
                                        <td>4.</td>
                                        <td style="width: 65%" style="width: 65%">
                                            <label for="exampleFormControlFile1">Kuitansi</label>
                                        </td>
                                        <td>
                                            <input type="file" class="form-control-file"
                                                id="exampleFormControlFile1">
                                        </td>
                                    </tr>
                                    <tr class="form-group">
                                        <td>5.</td>
                                        <td style="width: 65%" style="width: 65%">
                                            <label for="exampleFormControlFile1">SPBy</label>
                                        </td>
                                        <td>
                                            <input type="file" class="form-control-file"
                                                id="exampleFormControlFile1">
                                        </td>
                                    </tr>
                                    <tr class="form-group">
                                        <td>6.</td>
                                        <td style="width: 65%" style="width: 65%">
                                            <label for="exampleFormControlFile1">Nota (At Cost)
                                                (Apabila ada komponen Biaya Perjalanan)</label>
                                        </td>
                                        <td>
                                            <input type="file" class="form-control-file"
                                                id="exampleFormControlFile1">
                                        </td>
                                    </tr>
                                    <tr class="form-group">
                                        <td>7.</td>
                                        <td style="width: 65%" style="width: 65%">
                                            <label for="exampleFormControlFile1">LPJ</label>
                                        </td>
                                        <td>
                                            <input type="file" class="form-control-file"
                                                id="exampleFormControlFile1">
                                        </td>
                                    </tr>
                                </table>
                            </div>
                            <div class="float-right mb-3 mr-2">
                                <button type="submit" class="btn btn-primary">Upload</button>
                            </div>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <!-- Footer -->
    @include('dashboards/users/layouts/footer')

</body>

</html>
