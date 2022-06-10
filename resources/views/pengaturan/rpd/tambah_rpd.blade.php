<div class="modal fade" tabindex="-1" role="dialog" id="add_rpd">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Tambah PAGU</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form class="form-horizontal" method="post" action="{{ url('/pagu/create') }}">
                    @csrf
                    <div class="form-group row">
                        <label class="control-label col-sm-5 align-self-center mb-0">Prodi</label>
                        <div class="col-sm-7">
                            <select name="id_unit" id="id_unit" class="form-control">
                                @foreach ($unit2 as $unit)
                                    <option value="{{ $unit->id }}">
                                        {{ $unit->nama_unit }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="control-label col-sm-5 align-self-center mb-0">Tahun</label>
                        <div class="col-sm-7">
                            <select name="id_tahun" id="id_tahun" class="form-control">
                                @foreach ($tabeltahun as $pt)
                                    <option value="{{ $pt->id }}">
                                        {{ $pt->tahun }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="control-label col-sm-5 align-self-center mb-0">Nominal PAGU</label>
                        <div class="col-sm-7">
                            <div class="form-group">
                                @for ($a = 0; $a < count($pagu); $a++)
                                    <input name="pagu" id="pagu" type="text"
                                        value="{{ old('pagu', $pagu[$a]->pagu) }}" class="form-control">
                                @endfor
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="control-label col-sm-5 align-self-center mb-0">RPD Triwulan 1</label>
                        <div class="col-sm-7">
                            <input name="tw_1" id="tw_1" type="text" class="form-control">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="control-label col-sm-5 align-self-center mb-0">RPD Triwulan 2</label>
                        <div class="col-sm-7">
                            <input name="tw_2" id="tw_2" type="text" class="form-control">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="control-label col-sm-5 align-self-center mb-0">RPD Triwulan 3</label>
                        <div class="col-sm-7">
                            <input name="tw_3" id="tw_3" type="text" class="form-control">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="control-label col-sm-5 align-self-center mb-0">RPD Triwulan 4</label>
                        <div class="col-sm-7">
                            <input name="tw_4" id="tw_4" type="text" class="form-control">
                        </div>
                    </div>
                    <input name="created_at" id="created_at" type="hidden" value="<?= date('Y-m-d') ?>">
                    <input name="updated_at" id="updated_at" type="hidden" value="<?= date('Y-m-d') ?>">
                    <button class="btn btn-primary mr-1" type="submit">Submit</button>
                </form>
            </div>
        </div>
    </div>
</div>
