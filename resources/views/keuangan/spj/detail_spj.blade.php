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
                        <div class="iq-card-header d-flex justify-content-center table-info">
                            <div class="iq-header-title">
                                <h4 class="card-title">Surat Pertanggungjawaban (SPJ)</h4>
                            </div>
                        </div>
                        <div class="iq-card-body mx-5">
                            <b>
                                <table class="table">
                                    <tr>

                                        <td style="width: 30%">Nama Unit/Prodi/Ormawa</td>
                                        <td class="text-center">:</td>
                                        <td style="width: 60%">{{ $namaprodi }}</td>
                                    </tr>
                                    <tr>

                                        <td style="width: 30%">ID Ajuan Memo Cair</td>
                                        <td class="text-center">:</td>
                                        <td style="width: 60%">{{ $memocair }}</td>
                                    </tr>
                                    <tr>

                                        <td style="width: 30%">Nama Penanggungjawab Kegiatan</td>
                                        <td class="text-center">:</td>
                                        <td style="width: 60%">{{ $penanggung }}</td>
                                    </tr>
                                    <tr>

                                        <td style="width: 30%">Nomor HP Penanggungjawab Kegiatan</td>
                                        <td class="text-center">:</td>
                                        <td style="width: 60%">{{ $kontak }}</td>
                                    </tr>
                                    <tr>

                                        <td style="width: 30%">Nilai Total SPJ</td>
                                        <td class="text-center">:</td>
                                        <td style="width: 60%">{{ 'Rp ' . number_format($nilai_total) }}</td>
                                    </tr>
                                    <tr>

                                        <td style="width: 30%">Nilai Pengembalian</td>
                                        <td class="text-center">:</td>
                                        <td style="width: 60%">{{ 'Rp ' . number_format($nilai_kembali) }}</td>
                                    </tr>
                                    {{-- <tr>
                                    <td width="30%">4. &ensp; Sertifikat Memo Cair</td>
                                    <td class="text-center">:</td>
                                </tr>
                                <tr>
                                    <td colspan="3"><embed src="{{ asset('documents/') }}" type="application/pdf"
                                            width="100%" height="500px"></embed></td>
                                </tr> --}}
                            </b>
                            </table>
                            <div class="iq-card" style="box-shadow: none">
                                <div class="iq-card-header d-flex justify-content-center table-secondary">
                                    <div class="iq-header-title">
                                        <h5 class="card-title">
                                            Dokumen Pendukung Surat Pertanggungjawaban (SPJ)
                                        </h5>
                                    </div>
                                </div>
                                <div class="iq-card-body">
                                    <p></p>
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <div class="nav flex-column nav-pills text-left" id="v-pills-tab"
                                                role="tablist" aria-orientation="vertical">
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
                                                                    <input type="file" class="form-control-file"
                                                                        name="file" id="file">

                                                                    <input type="hidden" class="form-control-file"
                                                                        name="id_subkategori" id="id_subkategori"
                                                                        value="{{ $spj_subkategori[$b]->id }}">
                                                                    <input type="hidden" name="id_tor"
                                                                        class="form-control"
                                                                        value="<?= $_GET['idtor'] ?>">
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td
                                                                    style="border: none; padding-top: 0; padding-bottom: 0">
                                                                    <small style="color: darkorange">File yang sudah
                                                                        diupload:
                                                                        <a class="text-primary" href=""
                                                                            target="_blank"></a>
                                                                    </small>
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
                            </div>
                        </div>
                    </div>
                </div>
            </div>

</body>
<!-- Footer -->
@include('dashboards/users/layouts/footer')
