<div class="modal fade bd-example-modal-lg" id="input_tf_spj<?= $tor[$m]->id ?>" tabindex="-1" role="dialog" aria-labelledby="Upload Bukti Transfer Pelunasan Pembayaran SPJ" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="input_tf_spj">Formulir Upload Bukti Transfer Pelunasan
                    Pembayaran SPJ</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body text-left">
                <form class="needs-validation" enctype="multipart/form-data" method="post" action="{{ url('/spj/input_buktitransfer') }}" novalidate>
                    {{ csrf_field() }}
                    <div class="form-group row">
                        <label class="control-label col-sm-4 align-self-center mb-0">Nama
                            Kegiatan</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" value="{{ $tor[$m]->nama_kegiatan }}" disabled>
                        </div>
                    </div>
                    <input type="hidden" name="id_tor" class="form-control" value="<?= $tor[$m]->id ?>">
                    <input type="hidden" name="id_status" class="form-control" value="7">
                    <input type="hidden" name="jenis" value="SPJ Bukti Transfer" class="custom-file-input" required>
                    <input type="hidden" name="create_by" class="form-control" value="<?= Auth()->user()->id ?>">
                    <?php date_default_timezone_set('Asia/Jakarta'); ?>
                    <input name="created_at" id="created_at" type="hidden" value="<?= date('Y-m-d H:i:s') ?>">
                    <input name="updated_at" id="updated_at" type="hidden" value="<?= date('Y-m-d') ?>">

                    <div class="form-group row">
                        <label class="control-label col-sm-4 align-self-center mb-0">Jenis</label>
                        <div class="col-sm-8">
                            <div id="ada<?= $tor[$m]->id ?>">
                                <input type="radio" name="sebel">
                                <label>Pelunasan Pembayaran (Input Bukti TF)</label>
                            </div>
                            <div id="none{{ $tor[$m]->id }}">
                                <input type="radio" name="sebel">

                            </div>
                        </div>

                        <div id="cek<?= $tor[$m]->id ?>" class="form-group">
                            <label>Unggah Bukti Transfer
                                <br>
                                <small style="color: darkred">
                                    Upload bukti transfer berupa file Dokumen maupun Gambar.
                                </small>
                            </label>
                            <input type="file" class="form-control-file" name="file" id="file">
                        </div>

                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary">Upload</button>
                        </div>
                </form>
            </div>
        </div>
    </div>
</div>

{{-- Dropdown on Click Radio Button --}}
<script>
    const ada {
        {
            $tor[$m] - > id
        }
    } = document.getElementById("ada{{ $tor[$m]->id }}");
    const none {
        {
            $tor[$m] - > id
        }
    } = document.getElementById("none{{ $tor[$m]->id }}");
    const cek {
        {
            $tor[$m] - > id
        }
    } = document.getElementById("cek{{ $tor[$m]->id }}");
    cek {
        {
            $tor[$m] - > id
        }
    }.style.display = "none";
    ada {
        {
            $tor[$m] - > id
        }
    }.addEventListener("click", (event) => {
        if (cek {
                {
                    $tor[$m] - > id
                }
            }.style.display = "none") {
            cek {
                {
                    $tor[$m] - > id
                }
            }.style.display = "block";
        } else {
            cek {
                {
                    $tor[$m] - > id
                }
            }.style.display = "none";
        }
    })
    none {
        {
            $tor[$m] - > id
        }
    }.addEventListener("click", (event) => {
        cek {
            {
                $tor[$m] - > id
            }
        }.style.display = "none";
    })
</script>