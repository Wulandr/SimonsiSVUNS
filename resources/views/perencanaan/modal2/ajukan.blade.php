<!-- MODAL AJUKAN TOR -->
<div class="modal fade" tabindex="-1" role="dialog" id="ajukan{{ $tor[$t]->id }}">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <!-- <h5 class="modal-title"><b>Pengjauan</b> </h5> -->
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="iq-card">
                    <div class="iq-card-header d-flex justify-content-between">
                        <div class="iq-header-title">
                            <h4 class="card-title">Pengajuan TOR & RAB ke Sekolah Vokasi</h4>
                        </div>
                    </div>
                    <div class="iq-card-body">
                        <form method="post" action="/validasi/pengajuanProdi">
                            @csrf
                            <div class="form-group">
                                <i>Lengkapi Data TOR & RAB Sebelum Diajukan</i>
                                <h6>
                                    <label for="exampleFormControlSelect1"></label><br />
                                    <?php
                                    $jenisDiajukan = ""; // apakah sudah diajukan prodi
                                    if (!empty($trx_status_tor)) {
                                        foreach ($trx_status_tor as $trxstatus) {
                                            if ($trxstatus->id_tor == $tor[$t]->id) {
                                                foreach ($status as $sts) {
                                                    if ($sts->id == $trxstatus->id_status) {
                                                        if ($sts->nama_status == "Proses Pengajuan") {
                                                            $jenisDiajukan = "Baru";
                                                        }
                                                        if ($sts->nama_status == "Pengajuan Perbaikan") {
                                                            $jenisDiajukan = "Perbaikan";
                                                        }
                                                    }
                                                }
                                            } else {
                                                $jenisDiajukan = "Belum Diajukan";
                                            }
                                        }
                                    } else {
                                        $jenisDiajukan = "";
                                    }
                                    for ($s = 0; $s < count($status); $s++) {
                                        if ($status[$s]->kategori == 'TOR') {
                                            if ($jenisDiajukan == "Belum Diajukan") {
                                                if ($status[$s]->nama_status == 'Proses Pengajuan') { ?>
                                                    <input type="radio" class="btn-check" name="id_status" id="id_status" value="{{ $status[$s]->id }}" autocomplete=" off">
                                                    <label class="" for="danger-outlined">{{ $status[$s]->nama_status }}
                                                        Baru</label><br />
                                            <?php }
                                            } ?>

                                            <?php
                                            if ($jenisDiajukan == "Baru") {
                                                if ($status[$s]->nama_status == 'Pengajuan Perbaikan') { ?>
                                                    <input type="radio" class="btn-check" name="id_status" id="id_status" value="{{ $status[$s]->id }}" autocomplete=" off">
                                                    <label class="" for="danger-outlined">{{ $status[$s]->nama_status }}</label><br />
                                                <?php }
                                            }
                                            if ($jenisDiajukan == "Perbaikan") {
                                                if ($status[$s]->nama_status == 'Pengajuan Perbaikan') { ?>
                                                    <input type="radio" class="btn-check" name="id_status" id="id_status" value="{{ $status[$s]->id }}" autocomplete=" off">
                                                    <label class="" for="danger-outlined">{{ $status[$s]->nama_status }}</label><br />
                                    <?php }
                                            }
                                        }
                                    } ?>
                                    <input type="hidden" name="create_by" value="<?= Auth()->user()->id ?>">
                                    <input type="hidden" name="id_tor" value="<?= $tor[$t]->id ?>">
                                    <?php date_default_timezone_set('Asia/Jakarta'); ?>
                                    <input name="created_at" id="created_at" type="hidden" value="<?= date('Y-m-d H:i:s') ?>">
                                    <input name="updated_at" id="updated_at" type="hidden" value="<?= date('Y-m-d') ?>">
                                    <button class="btn btn-primary btn-sm" type="submit">OK</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>