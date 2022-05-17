<div class="modal fade" id="detail_memocair<?= $tor[$m]->id ?>" tabindex="-1" role="dialog"
    aria-labelledby="Upload Memo Cair" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header justify-content-center">
                <h5 class="modal-title" id="detail_memocair">DETAIL MEMO CAIR</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <?php
                    for ($a = 0; $a < count($data); $a++) {
                        if ($data[$a]->id_tor == $tor[$m]->id) {
                    ?>
                <b>
                    <table class="table table-borderless">
                        <tr>
                            <td style="width: 20%">1. &ensp; Nomor Memo Cair</td>
                            <td style="width: 5%">:</td>
                            <td>{{ $data[$a]->nomor }}</td>
                        </tr>
                        <tr>
                            <td style="width: 20%">2. &ensp; Nominal Memo Cair Valid</td>
                            <td style="width: 5%">:</td>
                            <td>{{ 'Rp ' . number_format($data[$a]->nominal, 2, ',', '.') }}</td>
                        </tr>
                        <tr>
                            <td style="width: 20%">3. &ensp; Sertifikat Memo Cair</td>
                            <td style="width: 5%">:</td>
                        </tr>
                        <tr>
                            <td colspan="3"><embed src="{{ asset('file/Sistematika Laporan Kegiatan 2022.pdf') }}"
                                    type="application/pdf" width="100%" height="500px"></embed></td>
                        </tr>
                    </table>
                </b>
                <?php
                }}?>
            </div>
        </div>
    </div>
</div>
