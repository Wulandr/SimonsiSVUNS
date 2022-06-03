<!-- MODAL AJUKAN TOR -->
<div class="modal fade" tabindex="-1" role="dialog" id="status{{ $tor[$t]->id }}">
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
                            <h4 class="card-title">Status Pengajuan TOR</h4>
                        </div>
                    </div>
                    <div class="iq-card-body">

                        <ul class="iq-timeline">
                            <?php
                            $indexwarna = 0;
                            $warnaLingkar = [
                                'timeline-dots',
                                'timeline-dots border-success',
                                'timeline-dots border-secondary',
                                'timeline-dots border-info',
                            ];
                            $ada = 0;
                            if (!empty($trx_status_tor)) {
                                for ($q = 0; $q < count($trx_status_tor); $q++) {
                                    if ($trx_status_tor[$q]->id_tor == $tor[$t]->id) {
                                        $ada =   $trx_status_tor[$q]->id_status ?>
                                        <li>
                                            <div class="{{ $warnaLingkar[$indexwarna] }}"><i class="ri-check-fill" style="color:black"></i></div>
                                            <?php
                                            $indexwarna += 1;
                                            if ($indexwarna > 3) {
                                                $indexwarna = 0;
                                            }
                                            ?>

                                            <h6 class="float-left mb-1">
                                                <?php
                                                for ($st = 0; $st < count($status); $st++) {
                                                    if ($status[$st]->id == $trx_status_tor[$q]->id_status) {
                                                        echo '<b>' . '' . '</b>' . $status[$st]->nama_status;
                                                        for ($u = 0; $u < count($user); $u++) {
                                                            if ($user[$u]->id == $trx_status_tor[$q]->create_by) {
                                                                for ($rl = 0; $rl < count($role); $rl++) {
                                                                    if ($role[$rl]->id == $user[$u]->role) {
                                                                        echo '<br/>' . ' - create by : ' . $user[$u]->name . ' - ' . $role[$rl]->name;
                                                                        $pengvalidasi = $role[$rl]->id;
                                                                    }
                                                                }
                                                            }
                                                        }
                                                    }
                                                }
                                                ?>
                                            </h6>
                                            <small class="float-right mt-1">{{ $trx_status_tor[$q]->created_at }}</small>
                                            <div class="d-inline-block w-100">
                                            </div>
                                        </li>
                            <?php }
                                }
                            } ?>

                        </ul>

                    </div>
                </div>

                <div class="iq-card">
                    <div class="iq-card-header d-flex justify-content-between">
                        <div class="iq-header-title">
                            <h4 class="card-title">Status Pertanggungjawaban TOR</h4>
                        </div>
                    </div>
                    <div class="iq-card-body">
                        <ul class="iq-timeline">

                            <?php
                            $statusMemo = 0;
                            $indexwarna2 = 0;
                            $warnaLingkar2 = [
                                'timeline-dots',
                                'timeline-dots border-success',
                                'timeline-dots border-secondary',
                                'timeline-dots border-info',
                            ];
                            $ada2 = 0;
                            if (!empty($trx_status_keu)) {
                                foreach ($trx_status_keu as $tsk) {
                                    if ($tsk->id_tor == $tor[$t]->id) {
                            ?>
                                        <li>
                                            <div class="{{ $warnaLingkar2[$indexwarna2] }}"><i class="ri-check-fill" style="color:black"></i></div>
                                            <?php
                                            $indexwarna2 += 1;
                                            if ($indexwarna2 > 3) {
                                                $indexwarna2 = 0;
                                            }
                                            ?>
                                            <div class="row">
                                                <div class="col-lg-7">
                                                    <h6 style="text-align:left;">
                                                        <?php
                                                        foreach ($status_keu as $statusKeu) {
                                                            if ($statusKeu->id == $tsk->id_status) {
                                                                $statusMemo = 1;
                                                                echo $statusKeu->nama_status . ' ' . $statusKeu->kategori;
                                                                foreach ($user as $us) {
                                                                    if ($us->id == $tsk->create_by) {
                                                                        foreach ($role as $rl2) {
                                                                            if ($rl2->id == $us->role) {
                                                                                echo '<br/>' . ' - create by : ' . $us->name . ' - ' . $rl2->name;
                                                                                $pengvalidasi = $rl2->id;
                                                                            }
                                                                        }
                                                                    }
                                                                }
                                                            }
                                                        }
                                                        ?>
                                                    </h6>
                                                </div>
                                                <div class="col">
                                                    <small style="font-size: smaller;color:grey" class="float-right mt-1">{{ $tsk->created_at }}</small>
                                                </div>
                                            </div>
                                        </li>
                                        <br />
                            <?php }
                                }
                            } ?>

                        </ul>
                    </div>
                </div>


            </div>
        </div>
    </div>
</div>
</div>