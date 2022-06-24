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
                        <div class="iq-card-header d-flex justify-content-center table-warning">
                            <div class="iq-header-title">
                                <h4 class="card-title">Edit Formulir Surat Pertanggungjawaban (SPJ)</h4>
                            </div>
                        </div>
                        <div class="iq-card-body mx-5">
                            <form class="needs-validation" enctype="multipart/form-data" method="post" action="{{ url('/input_spj') }}" novalidate>
                                {{ csrf_field() }}
                                <div class="form-group row">
                                    <label class="control-label col-sm-5 align-self-center mb-0" for="validationCustom01">
                                        Nama Unit/Prodi/Ormawa</label>
                                    <div class="col-sm-7">
                                        <input type="text" class="form-control" value="{{ $namaprodi }}" disabled>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="control-label col-sm-5 align-self-center mb-0">ID Ajuan Memo
                                        Cair</label>
                                    <div class="col-sm-7">
                                        <input type="text" class="form-control" value="{{ $memocair }}" disabled>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="control-label col-sm-5 align-self-center mb-0" for="validationCustom01">Nama
                                        Penanggungjawab Kegiatan</label>
                                    <div class="col-sm-7">
                                        <input type="text" class="form-control" id="validationCustom01" value="{{ $penanggung }}" disabled>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="control-label col-sm-5 align-self-center mb-0" for="validationCustom01">Nomor HP
                                        Penanggungjawab Kegiatan</label>
                                    <div class="col-sm-7">
                                        <input type="text" class="form-control" id="validationCustom01" value="{{ $kontak }}" disabled>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="control-label col-sm-5 align-self-center mb-0" for="validationCustom01">Nilai
                                        Total SPJ</label>
                                    <div class="col-sm-7">
                                        <input type="text" name="nilai_total" class="form-control" id="validationCustom01" value="{{ 'Rp ' . number_format($nilai_total) }}" required>
                                    </div>
                                    <div class="invalid-feedback">
                                        Required!
                                    </div>
                                </div>
                                <input type="hidden" name="id_tor" class="form-control" value="<?= $_GET['idtor'] ?>">
                                <input type="hidden" name="jenis" value="SPJ" class="custom-file-input" required>
                                <input type="hidden" name="id_status" class="form-control" value="4">
                                <input type="hidden" name="create_by" class="form-control" value="<?= Auth()->user()->id ?>">
                                <?php date_default_timezone_set('Asia/Jakarta'); ?>
                                <input name="created_at" id="created_at" type="hidden" value="<?= date('Y-m-d H:i:s') ?>">
                                <input name="updated_at" id="updated_at" type="hidden" value="<?= date('Y-m-d') ?>">
                                <div class="form-group row">
                                    <label class="control-label col-sm-5 align-self-center mb-0" for="validationCustom01">Nilai
                                        Pengembalian
                                        <small style="color: darkred"><b>(Jika Ada)</b></small></label>
                                    <div class="col-sm-7">
                                        <input type="text" name="nilai_kembali" class="form-control" id="validationCustom01" value="{{ 'Rp ' . number_format($nilai_kembali) }}" required>
                                    </div>
                                    <div class="invalid-feedback">
                                        Required!
                                    </div>
                                </div>
                                <div class="iq-card" style="box-shadow: none">
                                    <div class="iq-card-header d-flex justify-content-center table-warning my-1">
                                        <div class="iq-header-title">
                                            <h5 class="card-title">Edit Unggahan Dokumen Pendukung Surat
                                                Pertanggungjawaban (SPJ)
                                            </h5>
                                        </div>
                                    </div>
                                    <div class="iq-card-body mx-0">
                                        <p></p>
                                        <div class="row">
                                            <div class="col-sm-3">
                                                <div class="nav flex-column nav-pills text-left" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                                                    <?php
                                                    for ($a = 0; $a < count($spj_kategori); $a++) {
                                                    ?>
                                                        <a class="nav-link" id="tab-spj_kategori[$a]->id }}" data-toggle="pill" href="#content-{{ $spj_kategori[$a]->id }}" role="tab" aria-controls="{{ $spj_kategori[$a]->id }}" aria-selected="true">{{ $spj_kategori[$a]->nama_kategori }}
                                                        </a>
                                                    <?php } ?>
                                                </div>
                                            </div>

                                            <div class="col-sm-9">
                                                <div class="tab-content mt-0" id="v-pills-tabContent">
                                                    <?php
                                                    for ($a = 0; $a < count($spj_kategori); $a++) {
                                                    ?>
                                                        <div class="tab-pane fade show" role="tabpanel" id="content-{{ $spj_kategori[$a]->id }}" aria-labelledby="tab-{{ $spj_kategori[$a]->id }}">
                                                            <div class="col-12">
                                                                <h5 class="mb-2" style="color: #1E3D73">
                                                                    <b>{{ $spj_kategori[$a]->nama_kategori }}</b>
                                                                </h5>
                                                                <?php $no = 1;
                                                                for ($b = 0; $b < count($spj_subkategori); $b++) {
                                                                    if ($spj_subkategori[$b]->id_kategori == $spj_kategori[$a]->id) { ?>
                                                                        <p>{!! $spj_subkategori[$b]->catatan !!}</p>
                                                                        <table class="table">
                                                                            <tr class="form-group">
                                                                                <td rowspan="2">{{ $no }}</td>
                                                                                <td style="width: 65%">
                                                                                    <label for="exampleFormControlFile1">
                                                                                        {{ $spj_subkategori[$b]->nama_subkategori }}
                                                                                    </label>
                                                                                </td>
                                                                                <td rowspan="2">
                                                                                    <input type="file" class="form-control-file" name="file" id="file">
                                                                                    <input type="hidden" class="form-control-file" name="id_subkategori" id="id_subkategori" value="{{ $spj_subkategori[$b]->id }}">
                                                                                    <input type="hidden" name="id_tor" class="form-control" value="<?= $_GET['idtor'] ?>">
                                                                                </td>
                                                                            </tr>
                                                                            <tr>
                                                                                @for ($b = 0; $b < count($dok_spj); $b++) @if ($dok_spj[$b]->id_tor == $_GET['idtor'])
                                                                                    <td style="border: none; padding-top: 0; padding-bottom: 0">
                                                                                        <small style="color: darkorange">File
                                                                                            yang
                                                                                            sudah diupload:
                                                                                            <a class="text-primary" href="{{ asset('document_spj/' . $dok_spj[$b]->name) }}" target="_blank">{{ $dok_spj[$b]->name }}</a>
                                                                                        </small>
                                                                                    </td>
                                                                                    @endif
                                                                                    @endfor
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
                                        <button type="submit" class="btn btn-primary m-3">Update</button>
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