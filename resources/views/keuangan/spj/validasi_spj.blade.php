<div class="modal fade" id="validasi_spj{{ $tor[$m]->id }}" tabindex="-1" role="dialog"
    aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-center">Update Status SPJ</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body text-left">
                <form method="post" action="/spj/validasi">
                    @csrf
                    <p>Pilih salah satu untuk memperbarui status:</p>
                    <div class="form-group">
                        @for ($s = 0; $s < count($status_keu); $s++)
                            @if ($status_keu[$s]->kategori == 'SPJ')
                                @if ($status_keu[$s]->nama_status == 'Proses Pengajuan')
                                    <div class="custom-control custom-radio custom-radio-color-checked">
                                        <input type="radio" name="id_status" id="id_status"
                                            value="{{ $status_keu[$s]->id }}">
                                        <label class=""> Proses Pengajuan </label>
                                    </div>
                                @elseif ($status_keu[$s]->nama_status == 'Revisi')
                                    <div class="custom-control custom-radio custom-radio-color-checked ">
                                        <input type="radio" name="id_status" id="id_status"
                                            value="{{ $status_keu[$s]->id }}">
                                        <label class=""> Revisi </label>
                                    </div>
                                @elseif ($status_keu[$s]->nama_status == 'Verifikasi')
                                    <div class="custom-control custom-radio custom-radio-color-checked">
                                        <input type="radio" name="id_status" id="id_status"
                                            value="{{ $status_keu[$s]->id }}">
                                        <label class=""> Verifikasi </label>
                                    </div>
                                @endif
                            @endif
                        @endfor
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlTextarea1">Catatan Revisi SPJ :</label>
                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="5"></textarea>
                    </div>
                    <input type="hidden" name="create_by" value="{{ Auth()->user()->id }}">
                    <input type="hidden" name="id_tor" value="{{ $tor[$m]->id }}">
                    <?php date_default_timezone_set('Asia/Jakarta'); ?>
                    <input name="created_at" id="created_at" type="hidden" value="{{ date('Y-m-d H:i:s') }}">
                    <input name="updated_at" id="updated_at" type="hidden" value="{{ date('Y-m-d') }}">
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary">Save</button>
            </div>
            </form>
        </div>
    </div>
</div>

{{-- Dropdown on Click Radio Button --}}
{{-- <script>
    const ajuan = document.getElementById("ajuan").innerHTML = '$tor[$m]->id';
    const revis = document.getElementById("revis").innerHTML = '$tor[$m]->id';
    const verif = document.getElementById("verif").innerHTML = '$tor[$m]->id';
    const komentar = document.getElementById("komentar").innerHTML = '$tor[$m]->id';
    komentar.style.display = "none";
    revis.addEventListener("click", (event) => {
        if (komentar.style.display = "none") {
            komentar.style.display = "block";
        } else {
            komentar.style.display = "none";
        }
    })
    ajuan.addEventListener("click", (event) => {
        komentar.style.display = "none";
    })
    verif.addEventListener("click", (event) => {
        komentar.style.display = "none";
    })
</script> --}}
