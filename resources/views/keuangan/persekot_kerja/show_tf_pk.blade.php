<div class="modal fade bd-example-modal-lg" id="show_tf_pk<?= $tor[$m]->id ?>" tabindex="-1" role="dialog"
    aria-labelledby="Upload Bukti Transfer Persekot Kerja" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="show_tf_pk">Formulir Upload Bukti Transfer Permohonan Persekot Kerja</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body text-left">
                {{ csrf_field() }}
                <div class="form-group row">
                    <label class="control-label col-sm-4 align-self-center mb-0">1. &ensp; Nama</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" value="{{ $tor[$m]->nama_pic }}" disabled>
                    </div>
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
                            value="{{ date_format(date_create($tor[$m]->tgl_mulai_pelaksanaan), 'd-m-Y') }}" disabled>
                    </div>
                </div>
                <?php
                    for ($a = 0; $a < count($persekot_kerja); $a++) {
                        if ($persekot_kerja[$a]->id_tor == $tor[$m]->id) {
                    ?>
                <div class="form-group row">
                    <label class="control-label col-sm-4 align-self-center mb-0">
                        6. &ensp; Total Anggaran Dialokasikan</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" value="{{ $persekot_kerja[$a]->alokasi_anggaran }}"
                            disabled>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="control-label col-sm-4 align-self-center mb-0">
                        7. &ensp; Tanggal Selesai Pelaporan</label>
                    <div class="col-sm-8">
                        <input type="date" class="form-control" value="{{ $persekot_kerja[$a]->tgl_selesai }}"
                            disabled>
                    </div>
                </div>
                <small style="color: darkred">Menyatakan dengan sadar akan menyelelesaikan SsmallJ paling lambat
                    <b>(2
                        MINGGU SETELAH PELAKSANAAN KEGIATAN)</b></p>
                    <?php }} ?>
                    <hr style="border: 1px dashed black">
                    <?php
                        for ($b = 0; $b < count($dokumen); $b++) {
                            if ($dokumen[$b]->id_tor == $tor[$m]->id) { 
                                if ($dokumen[$b]->jenis == "Persekot Kerja") {
                        ?>
                    <div class="form-group">
                        <h4 class="text-center"><b>Bukti Transfer</b></h4>
                        <br>
                        <embed src="{{ asset('documents/' . $dokumen[$b]->name) }}" type="application/pdf"
                            width="100%" height="500px"></embed>
                    </div>
                    <?php }}} ?>
            </div>
        </div>
    </div>
</div>
