<div class="modal fade bd-example-modal-lg" id="edit_memocair<?= $tor[$m]->id ?>" tabindex="-1" role="dialog"
    aria-labelledby="Upload Memo Cair" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header justify-content-center">
                <h5 class="modal-title" id="edit_memocair">EDIT MEMO CAIR</h5>
            </div>
            <div class="modal-body">
                <form class="needs-validation" enctype="multipart/form-data" method="post"
                    action="{{ url('/memocair/edit') }}" novalidate>
                    {{ csrf_field() }}
                    <?php
                    $cek=1;
                    $cekdok=1;
                    for ($a = 0; $a < count($data); $a++) {
                        $cek+=1;
                        if ($data[$a]->id_tor == $tor[$m]->id) {
                            for ($b = 0; $b < count($dokumen); $b++) {
                                $cekdok+=1;
                                if ($dokumen[$b]->id_tor == $tor[$m]->id) { 
                                    if ($dokumen[$b]->jenis == "Memo Cair") {
                                        if($cek=1 ){
                                
                    ?>
                    <div class="form-group">
                        <label for="validationCustom01">Nomor Memo Cair</label>
                        <input type="text" name="nomor" class="form-control" id="validationCustom01"
                            value="{{ $data[$a]->nomor }}" required>
                        <div class="invalid-feedback">
                            Tolong isikan nomor memo cair!
                        </div>
                        <input type="hidden" name="jenis" value="Memo Cair" class="custom-file-input" required>
                    </div>
                    <div class="form-group">
                        <label for="validationCustom01">Nominal Memo Cair Valid</label>
                        <input type="text" name="nominal" class="form-control" id="validationCustom01"
                            value="{{ 'Rp ' . number_format($data[$a]->nominal, 2, ',', '.') }}" required>
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
                        <input type="hidden" name="jenis" class="custom-file-input" value="Memo Cair" required><br>
                        <embed src="{{ asset('documents/' . $dokumen[$b]->name) }}" type="application/pdf"
                            width="100%" height="200px"></embed>
                    </div>
                    <?php
                    }
                        }
                    }       
                    }
                        }
                    
                    }?>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Upload</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
