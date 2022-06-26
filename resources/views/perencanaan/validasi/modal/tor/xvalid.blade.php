<div class="modal fade" tabindex="-1" role="dialog" id="validtor{{$join[$a]->tor_id}}">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"><b>Validasi</b> </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <div class="iq-card">
                    <div class="iq-card-header d-flex justify-content-between">
                        <div class="iq-header-title">
                            <h4 class="card-title">Status Pengajuan TOR</h4>
                        </div>
                    </div>
                    <div class="iq-card-body">

                        <ul class="iq-timeline">

                            <?php
                            $ada = 0;
                            if (!empty($trx_status_tor)) {
                                for ($q3 = 0; $q3 < count($trx_status_tor); $q3++) {
                                    if ($trx_status_tor[$q3]->id_tor == $join[$a]->tor_id) {
                            ?>
                                        <li>
                                            <div class="timeline-dots border-danger"><i class="ri-pantone-line"></i></div>
                                            <h6 style="text-align:left;">
                                                <?php
                                                for ($st3 = 0; $st3 < count($status); $st3++) {
                                                    if ($status[$st3]->id == $trx_status_tor[$q3]->id_status) {
                                                        echo  $status[$st3]->nama_status;
                                                        for ($u = 0; $u < count($user); $u++) {
                                                            if ($user[$u]->id == $trx_status_tor[$q3]->create_by) {
                                                                for ($rl = 0; $rl < count($role); $rl++) {
                                                                    if ($role[$rl]->id == $user[$u]->role) {
                                                                        echo "<br/>" . " - create by : " . $user[$u]->name . " - " . $role[$rl]->name;
                                                                        $pengvalidasi = $role[$rl]->id;
                                                                    }
                                                                }
                                                            }
                                                        }
                                                    }
                                                }
                                                ?>
                                            </h6>
                                            <h6 style="font-size: smaller" class="float-right mt-1">{{$trx_status_tor[$q3]->created_at}}</h6>
                                            <!-- <h6 style="font-size: smaller;text-align:left">$trx_status_tor[$q3]->komentar}}</h6> -->
                                        </li>
                                        <br />
                            <?php }
                                }
                            } ?>

                        </ul>
                    </div>
                </div>
                <div class="iq-card">
                    <div class="iq-card-header d-flex justify-content-between">
                        <div class="iq-header-title">
                            <h4 class="card-title">Validasi Kegiatan</h4>
                        </div>
                    </div>
                    <div class="iq-card-body">
                        <form method="post" action="/validasi/createValTor">
                            @csrf
                            <div class="form-group">
                                <label for="exampleFormControlSelect1">Pilih Status Verifikasi</label><br />
                                <?php for ($s = 1; $s < count($status); $s++) {
                                    if ($status[$s]->kategori == "TOR") { ?>
                                        <input type="radio" class="btn-check" name="id_status" id="id_status" value="{{$status[$s]->id}}" autocomplete=" off">
                                        <label class="" for="danger-outlined">{{$status[$s]->nama_status}}</label>
                                <?php }
                                } ?>
                                <div class="form-group">
                                    <label for="komentar">Komentar</label>
                                    <textarea class="form-control" id="komentar" name="komentar" rows="2"></textarea>
                                </div>
                                <input type="hidden" name="create_by" value="<?= Auth()->user()->id ?>">
                                <input type="hidden" name="id_tor" value="<?= $join[$a]->tor_id ?>">
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