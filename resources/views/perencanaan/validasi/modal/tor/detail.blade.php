<div class="modal fade" tabindex="-1" role="dialog" id="detail_tor{{$join[$a]->tor_id}}">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header" style="background-color: #ffc107;color:white">
                <h5 class="modal-title" style="color:white"><b>Status Pengajuan TOR</b> </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
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
                            for ($q3 = 0; $q3 < count($trx_status_tor); $q3++) {
                                if ($trx_status_tor[$q3]->id_tor == $join[$a]->tor_id) {
                        ?>
                                    <li>
                                        <div class="{{$warnaLingkar[$indexwarna]}}"><i class="ri-check-fill" style="color:black"></i></div>
                                        <?php
                                        $indexwarna += 1;
                                        if ($indexwarna > 3) {
                                            $indexwarna = 0;
                                        }
                                        ?>
                                        <div class="row">
                                            <div class="col">
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
                                            </div>
                                            <div class="col">
                                                <small style="font-size: smaller;color:grey" class="float-right mt-1">{{$trx_status_tor[$q3]->created_at}}</small>
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