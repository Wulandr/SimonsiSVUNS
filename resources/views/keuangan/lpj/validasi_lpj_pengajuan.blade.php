<div class="modal fade" id="validasi_lpj<?= $tor[$m]->id ?>" tabindex="-1" role="dialog"
    aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-center">Update Status LPJ</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body text-left">
                <form method="post" action="/lpj/validasi">
                    @csrf
                    <p>Pilih salah satu untuk memperbarui status:</p>
                    <div class="form-group">
                        <div id="repisi" class="custom-control custom-radio custom-radio-color-checked ">
                            <input type="radio" name="id_status" id="id_status" value="{{ $b->id }}">
                            <label class=""> Revisi </label>
                        </div>
                        <div id="peripikasi" class="custom-control custom-radio custom-radio-color-checked">
                            <input type="radio" name="id_status" id="id_status" value="{{ $b->id }}">
                            <label class=""> Verifikasi </label>
                        </div>
                        <div id="pengajuan" class="custom-control custom-radio custom-radio-color-checked">
                            <input type="radio" name="id_status" id="id_status" value="{{ $status_keu[$s]->id }}">
                            <label class=""> Proses Pengajuan </label>
                        </div>
                        <div id="lpjselesai" class="custom-control custom-radio custom-radio-color-checked ">
                            <input type="radio" name="id_status" id="id_status" value="{{ $status_keu[$s]->id }}">
                            <label class=""> LPJ Selesai </label>
                        </div>
                    </div>
                    <div id="revisilpj" class="form-group">
                        <label for="exampleFormControlTextarea1">Catatan Revisi SPJ :</label>
                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="5"></textarea>
                    </div>
                    <input type="hidden" name="create_by" value="<?= Auth()->user()->id ?>">
                    <input type="hidden" name="id_tor" value="<?= $tor[$m]->id ?>">
                    <?php date_default_timezone_set('Asia/Jakarta'); ?>
                    <input name="created_at" id="created_at" type="hidden" value="<?= date('Y-m-d H:i:s') ?>">
                    <input name="updated_at" id="updated_at" type="hidden" value="<?= date('Y-m-d') ?>">
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary">Save</button>
            </div>
            </form>
        </div>
    </div>
</div>
