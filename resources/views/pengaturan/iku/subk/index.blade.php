<div class="iq-card">
    <div class="iq-card iq-card-block iq-card-stretch iq-card-height">
        <div class="iq-card-header d-flex justify-content-between">
            <div class="iq-header-title">
                <h4 class="card-text">Sub Kegiatan
                    <button class="search-toggle iq-waves-effect bg-primary rounded" data-toggle="modal" title="Tambah SUB K" data-original-title="Tambah SUB K" data-target="#tambahsubk"><i class="fa fa-plus-circle"></i>
                    </button>
                </h4>
                <!-- Modal Tambah SUBK -->
                <div class="modal fade" tabindex="-1" role="dialog" id="tambahsubk">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Tambah K</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form class="form-horizontal" method="post" action="{{ url('/subk/create') }}">
                                    @csrf
                                    <div class="form-group">
                                        <label>K</label>
                                        <select name="id_k" id="id_k" class="form-control">
                                            @foreach($k as $inik)
                                            <option value="{{$inik->id}}">{{$inik->K}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>SUB K</label>
                                        <input name="subK" id="subK" type="text" class="form-control">
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
                            <th scope="col">SUB K</th>
                            <th width="50%" scope="col">Deskripsi</th>
                            <th scope="col">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $num = 1;
                        $kodeIKU = 0;
                        $kodeIK = 0;
                        $kodeK = 0;
                        ?>
                        <?php for ($k4 = 0; $k4 < count($subk); $k4++) { ?>
                            <tr>
                                <td><a href="#">{{$num}}</a></td>
                                <?php
                                for ($i = 0; $i < count($k); $i++) {
                                    if ($k[$i]->id == $subk[$k4]->id_k) {
                                        $kodeK = $k[$i]->K;
                                        for ($z = 0; $z < count($ik); $z++) {
                                            if ($ik[$z]->id == $k[$i]->id_ik) {
                                                $kodeIK = $ik[$z]->IK;
                                                for ($u = 0; $u < count($iku); $u++) {
                                                    if ($iku[$u]->id == $ik[$z]->id_iku) {
                                                        $kodeIKU = $iku[$u]->IKU;
                                                    }
                                                }
                                            }
                                        }
                                    }
                                } ?>
                                <td>{{$kodeIKU}}</td>
                                <td>{{$kodeIK}}</td>
                                <td>{{$kodeK}}</td>
                                <td>{{$subk[$k4]->subK}}</td>
                                <td>{{$subk[$k4]->deskripsi}}</td>
                                <td>
                                    <div class="flex align-items-center list-user-action">
                                        <a class="iq-bg-primary" data-toggle="modal" data-placement="top" title="Update K" data-original-title="Update K" href="" data-target="#update_subk<?= $subk[$k4]->id ?>"><i class="ri-pencil-line"></i></a>
                                        <a class="iq-bg-primary" data-toggle="tooltip" data-placement="top" title="" data-original-title="Delete" onclick="return confirm('Apakah anda yakin ingin hapus ?')" href="{{url('/subk/delete/'.$subk[$k4]->id)}}"><i class="ri-delete-bin-line"></i></a>
                                    </div>
                                </td>
                            </tr>
                            <!-- Modal Ubah K -->
                            <div class="modal fade" tabindex="-1" role="dialog" id="update_subk<?= $subk[$k4]->id ?>">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title">Update K</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <form class="form-horizontal" method="post" action="{{ url('/subk/update/'.$subk[$k4]->id) }}">
                                                @csrf
                                                <div class="form-group">
                                                    <label>K</label>
                                                    <select name="id_k" id="id_k" class="form-control">
                                                        @foreach($k as $inik)
                                                        <?php if ($inik->id == $subk[$k4]->id_k) { ?>
                                                            <option value="{{$inik->id}}">{{$inik->K}}</option>
                                                        <?php } ?>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <label>SUB K</label>
                                                    <input name="subK" id="subK" value="{{old('subK',$subk[$k4]->subK)}}" type="text" class="form-control">
                                                </div>
                                                <div class="form-group">
                                                    <label>Deskripsi</label>
                                                    <input name="deskripsi" id="deskripsi" value="{{old('deskripsi',$subk[$k4]->deskripsi)}}" type="text" class="form-control">
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