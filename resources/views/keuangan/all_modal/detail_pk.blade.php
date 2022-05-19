<div class="modal fade bd-example-modal-lg" id="detail_pk<?= $tor[$m]->id ?>" tabindex="-1" role="dialog"
    aria-labelledby="Upload Memo Cair" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="detail_pk">Formulir Permohonan Persekot Kerja</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body  text-left">
                <p>Yang bertanda tangan di bawah ini menyatakan bertanggung-jawab tentang penggunaan,
                    pertanggungjawaban, dan pelaporan dana kegiatan sebagai berikut. </p>
                <form class="needs-validation" enctype="multipart/form-data" method="post"
                    action="{{ url('/input_pk') }}" novalidate>
                    {{ csrf_field() }}
                    <div class="form-group row">
                        <label class="control-label col-sm-4 align-self-center mb-0">1. &ensp; Nama</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" value="{{ $tor[$m]->nama_pic }}" disabled>
                        </div>
                        <input type="hidden" name="jenis" value="Memo Cair" class="custom-file-input" required>
                    </div>
                    <div class="form-group row">
                        <label class="control-label col-sm-4 align-self-center mb-0">2. &ensp; NIP/NIK/NIM</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="control-label col-sm-4 align-self-center mb-0">3. &ensp; Unit/Prodi/Ormawa</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" value="{{ $namaprodi }}" disabled>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="control-label col-sm-4 align-self-center mb-0">4. &ensp; Deskripsi
                            Kegiatan</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" value="{{ $tor[$m]->nama_kegiatan }}" disabled>
                        </div>
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
                    <div class="form-group row">
                        <label class="control-label col-sm-4 align-self-center mb-0">
                            5. &ensp; Tanggal Pelaksanaan Kegiatan</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control"
                                value="{{ date_format(date_create($tor[$m]->tgl_mulai_pelaksanaan), 'd-m-Y') }}"
                                disabled>
                        </div>
                    </div>
                    <input type="hidden" name="id_tor" class="form-control" value="<?= $tor[$m]->id ?>">
                    <input type="hidden" name="id_status" class="form-control" value="1">
                    <input type="hidden" name="create_by" class="form-control" value="<?= Auth()->user()->id ?>">
                    <?php date_default_timezone_set('Asia/Jakarta'); ?>
                    <input name="created_at" id="created_at" type="hidden" value="<?= date('Y-m-d H:i:s') ?>">
                    <input name="updated_at" id="updated_at" type="hidden" value="<?= date('Y-m-d') ?>">
                    <div class="form-group row">
                        <label class="control-label col-sm-4 align-self-center mb-0">
                            6. &ensp; Total Anggaran Dialokasikan</label>
                        <div class="col-sm-8">
                            <input type="text" name="alokasi_anggaran" class="form-control">
                        </div>
                        <div class="invalid-feedback">
                            Tolong inputkan nominal anggaran sebelum submit!
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="control-label col-sm-4 align-self-center mb-0">
                            7. &ensp; Tanggal Selesai Pelaporan</label>
                        <div class="col-sm-8">
                            <input type="date" name="tgl_selesai" class="form-control" placeholder="01-01-2022"
                                required>
                        </div>
                        <div class="invalid-feedback">
                            Tolong inputkan tanggal sebelum submit!
                        </div>
                    </div>
                    <p style="color: darkred">Menyatakan dengan sadar akan menyelelesaikan SPJ paling lambat <b>(2
                            MINGGU SETELAH PELAKSANAAN KEGIATAN)</b></p>

                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>
        </div>
