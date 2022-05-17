<div class="modal fade bd-example-modal-xl" id="input_spj" aria-labelledby="Input SPJ" tabindex="-1" role="dialog"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="input_spj">Unggah Dokumen Surat Pertanggungjawaban (SPJ)</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Harum est aut, voluptates minima,
                    libero
                    dignissimos ea molestias ipsum optio incidunt fuga itaque sit! Perferendis saepe fuga,
                    numquam animi
                    laboriosam modi?</p>
                <form class="needs-validation" enctype="multipart/form-data" method="post"
                    action="{{ url('/input_spj') }}" novalidate>
                    {{ csrf_field() }}
                    {<input type="hidden" name="id_tor" class="form-control" value="<?= $tor[$m]->id ?>">
                    <input type="hidden" name="jenis" value="SPJ" class="custom-file-input" required>
                    <div class="form-group">
                        <label for="validationCustom01">Nama Unit/Prodi/Ormawa</label>
                        <input type="text" class="form-control" value="{{ $namaprodi }}" disabled>
                    </div>
                    <?php
            for ($a = 0; $a < count($memo_cair); $a++) {
                if ($memo_cair[$a]->id_tor == $tor[$m]->id) {
            ?>
                    <div class="form-group row">
                        <label class="control-label col-sm-4 align-self-center mb-0">&emsp; &ensp; ID Ajuan memo
                            Cair</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" value="{{ $memo_cair[$a]->nomor }}" disabled>
                        </div>
                    </div>
                    <?php
                }
            } ?>
                    <div class="form-group">
                        <label for="validationCustom01">Nama Penanggungjawab Kegiatan</label>
                        <input type="text" class="form-control" value="{{ $tor[$m]->nama_pic }}" disabled>
                    </div>
                    <div class="form-group">
                        <label for="validationCustom01">Nomor HP Penanggungjawab Kegiatan</label>
                        <input type="text" class="form-control" id="validationCustom01" required>
                        <div class="invalid-feedback">
                            Required!
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="validationCustom01">Nilai Total SPJ</label>
                        <input type="text" name="nilai_total" class="form-control" id="validationCustom01" required>
                        <div class="invalid-feedback">
                            Required!
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="validationCustom01">Nilai Pengembalian
                            <small style="color: darkred"><b>(Jika Ada)</b></small></label>
                        <input type="text" name="nilai_kembali" class="form-control" id="validationCustom01" required>
                        <div class="invalid-feedback">
                            Required!
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Unggah Dokumen SPJ
                            <br>
                            <small style="color: darkred">
                                Seluruh dokumen dijadikan 1 file PDF dengan urutan sesuai dengan penjelasan pada
                                menu
                                unduh Template SPJ.
                                <b>Dokumen harus sudah lengkap!</b>
                            </small>
                        </label>
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" id="customFile" required>
                            <label class="custom-file-label" for="customFile">Tambahkan File</label>
                            <div class="invalid-feedback">
                                Tolong tambahkan file sebelum submit!
                            </div>
                        </div>
                    </div>

                    <!-- DORM UPLOAD SPJ -->
                    @include('keuangan/spj/upload_spj')
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary">Upload</button>
            </div>
            </form>
        </div>
    </div>
