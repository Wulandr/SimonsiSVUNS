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
                <form action="">
                    <p>Pilih salah satu untuk memperbarui status:</p>
                    <div class="form-group">
                        <div class="custom-control custom-radio custom-radio-color-checked ">
                            <input type="radio" id="customRadio-1" name="customRadio-10"
                                class="custom-control-input bg-primary">
                            <label class="custom-control-label" for="customRadio-1"> Verifikasi </label>
                        </div>
                        <div class="custom-control custom-radio custom-radio-color-checked">
                            <input type="radio" id="customRadio-2" name="customRadio-10"
                                class="custom-control-input bg-danger">
                            <label class="custom-control-label" for="customRadio-2"> Revisi </label>
                        </div>
                        <div class="custom-control custom-radio custom-radio-color-checked">
                            <input type="radio" id="customRadio-2" name="customRadio-10"
                                class="custom-control-input bg-success">
                            <label class="custom-control-label" for="customRadio-2"> Pelunasan Pembayaran/SPJ Selesai
                            </label>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary">Save</button>
            </div>
        </div>
    </div>
</div>
