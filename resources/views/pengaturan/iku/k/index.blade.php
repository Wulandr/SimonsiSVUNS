<div class="iq-card">
    <div class="iq-card iq-card-block iq-card-stretch iq-card-height">
        <div class="iq-card-header d-flex justify-content-between">
            <div class="iq-header-title">
                <h4 class="card-text">Indikator Kegiatan
                    <button class="search-toggle iq-waves-effect bg-primary rounded" data-toggle="modal" title="Tambah k" data-original-title="Tambah k" data-target="#tambahk"><i class="fa fa-plus-circle"></i>
                    </button>
                </h4>
                <!-- Modal Tambah k -->
                <div class="modal fade" tabindex="-1" role="dialog" id="tambahk">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Tambah K</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form class="form-horizontal" method="post" action="{{ url('/k/create') }}">
                                    @csrf
                                    <div class="form-group">
                                        <label>IK</label>
                                        <select name="id_ik" id="id_ik" class="form-control">
                                            @foreach($ik as $iniIk)
                                            <option value="{{$iniIk->id}}">{{$iniIk->IK}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>K</label>
                                        <input name="K" id="K" type="text" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label>Deskripsi</label>
                                        <input name="deskripsi" id="deskripsi" type="text" class="form-control">
                                    </div>
                                    <input name="created_at" id="created_at" type="hidden" value="<?= date('Y-m-d') ?>">
                                    <input name="updated_at" id="updated_at" type="hidden" value="<?= date('Y-m-d') ?>">
                                    <button class="btn btn-primary mr-1" type="submit">Submit</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="iq-card-header-toolbar d-flex align-items-center">
                <div class="dropdown">
                    <span class="dropdown-toggle text-primary" id="dropdownMenuButton5" data-toggle="dropdown">
                        <i class="ri-more-fill"></i>
                    </span>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuButton5">
                        <a class="dropdown-item" href="#"><i class="ri-printer-fill mr-2"></i>Print</a>
                        <a class="dropdown-item" href="#"><i class="ri-file-download-fill mr-2"></i>Download</a>
                    </div>
                </div>
            </div>

        </div>
        <div class="iq-card-body">
            <span class="table-add float-right mb-3 mr-2">
                <div class="form-group row">
                    <!-- <form action="{{ url('/iku/filtertahun') }}" method="GET">
                                                    <div class="row mr-3">
                                                        <div class="col mr-1">
                                                            <select class="form-control filter sm-8" name="tahun" id="input">
                                                                <option value="0">All</option>
                                                                <?php
                                                                // for ($thn2 = 0; $thn2 < count($tabeltahun); $thn2++) { 
                                                                ?>
                                                                    <option value="$tabeltahun[$thn2]->id}}" $filtertahun==$tabeltahun[$thn2]->tahun ? 'selected':''}}>$tabeltahun[$thn2]->tahun}}</option>
                                                                <?php  ?>
                                                            </select>
                                                        </div>
                                                        <input type="submit" class="btn btn-primary btn-sm" value="Filter">
                                                    </div>
                                                </form> -->
                </div>
            </span>
            <div class="table-responsive">
                <div class="form-group row float-right mb-3 mr-2">
                </div>
                <table class="table mb-0">
                    <thead class="thead-light">
                        <tr>
                            <th>No.</th>
                            <th scope="col">IKU</th>
                            <th scope="col">IK</th>
                            <th scope="col">K</th>
                            <th scope="col">Deskripsi</th>
                            <th scope="col">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $num = 1;
                        $kodeIKU = 0;
                        $kodeIK = 0; ?>
                        <?php for ($k3 = 0; $k3 < count($k); $k3++) { ?>
                            <tr>
                                <td><a href="#">{{$num}}</a></td>
                                <?php for ($sk3 = 0; $sk3 < count($ik); $sk3++) {
                                    if ($ik[$sk3]->id == $k[$k3]->id_ik) {
                                        $kodeIK = $ik[$sk3]->IK; ?>

                                        <?php for ($ssk3 = 0; $ssk3 < count($iku); $ssk3++) {
                                            if ($iku[$sk3]->id == $ik[$k3]->id_iku) {
                                                $kodeIKU = $iku[$sk3]->IKU; ?>
                                        <?php }
                                        } ?> <?php }
                                        } ?>
                                <td>{{$kodeIKU}}</td>
                                <td>{{$kodeIK}}</td>
                                <td>{{$k[$k3]->K}}</td>
                                <td>{{$k[$k3]->deskripsi}}</td>
                                <td>
                                    <div class="flex align-items-center list-user-action">
                                        <a class="iq-bg-primary" data-toggle="modal" data-placement="top" title="Update K" data-original-title="Update K" href="" data-target="#update_k<?= $k[$k3]->id ?>"><i class="ri-pencil-line"></i></a>
                                        <a class="iq-bg-primary" data-toggle="tooltip" data-placement="top" title="" data-original-title="Delete" onclick="return confirm('Apakah anda yakin ingin hapus ?')" href="{{url('/k/delete/'.$k[$k3]->id)}}"><i class="ri-delete-bin-line"></i></a>
                                    </div>
                                </td>
                            </tr>
                            <!-- Modal Ubah K -->
                            <div class="modal fade" tabindex="-1" role="dialog" id="update_k<?= $k[$k3]->id ?>">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title">Update K</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <form class="form-horizontal" method="post" action="{{ url('/k/update/'.$k[$k3]->id) }}">
                                                @csrf
                                                <div class="form-group">
                                                    <label>IK</label>
                                                    <select name="id_ik" id="id_ik" class="form-control">
                                                        @foreach($ik as $iniIk)
                                                        <?php if ($iniIk->id == $k[$k3]->id_ik) { ?>
                                                            <option value="{{$iniIk->id}}">{{$iniIk->IK}}</option>
                                                        <?php } ?>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <label>K</label>
                                                    <input name="K" id="K" value="{{old('K',$k[$k3]->K)}}" type="text" class="form-control">
                                                </div>
                                                <div class="form-group">
                                                    <label>Deskripsi</label>
                                                    <input name="deskripsi" id="deskripsi" value="{{old('deskripsi',$k[$k3]->deskripsi)}}" type="text" class="form-control">
                                                </div>
                                                <input name="created_at" id="created_at" type="hidden" value="<?= date('Y-m-d') ?>">
                                                <input name="updated_at" id="updated_at" type="hidden" value="<?= date('Y-m-d') ?>">
                                                <button class="btn btn-primary mr-1" type="submit">Submit</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php $num += 1; ?>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>