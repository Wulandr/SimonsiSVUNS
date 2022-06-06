<div class="modal fade" id="upload_memocair<?= $tor[$m]->id ?>" tabindex="-1" role="dialog"
    aria-labelledby="Upload Memo Cair" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="upload_memocair">UPLOAD MEMO CAIR</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                {{-- <p></p> --}}
                <form class="needs-validation" enctype="multipart/form-data" method="post" action="{{ url('store') }}"
                    novalidate>
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label for="validationCustom01">Nomor Memo Cair</label>
                        <input type="text" name="nomor" class="form-control" id="validationCustom01" required>
                        <div class="invalid-feedback">
                            Tolong isikan nomor memo cair!
                        </div>
                        <input type="hidden" name="jenis" value="Memo Cair" class="custom-file-input" required>
                    </div>
                    <div class="form-group">
                        <label for="validationCustom01">Nominal Memo Cair Valid</label>
                        <input type="text" name="nominal" class="form-control" id="validationCustom01" required>
                        <div class="invalid-feedback">
                            Tolong isikan nominal memo cair yang sudah divalidasi!
                        </div>
                    </div>
                    <div class="form-group">
                        <input type="hidden" name="id_tor" value="<?= $tor[$m]->id ?>" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Sertifikat Memo Cair</label>
                        <input type="file" class="form-control-file" name="file" id="file" required>
                        <input type="hidden" name="jenis" value="Memo Cair" class="custom-file-input" required>
                        @error('file')
                            <div class="alert text-white bg-success" role="alert">
                                <div class="iq-alert-icon">
                                    <i class="ri-alert-line"></i>
                                </div>
                                <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                            @enderror
                            <div class="invalid-feedback">
                                Tolong tambahkan file sebelum submit!
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Upload</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>