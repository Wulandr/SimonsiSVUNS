<!-- <h1>{{$pengajuan}}</h1> -->
<?php if ($pengajuan == 0 || $dalamRevisi == 1) { ?>
    @can('anggaran_update')
    <button style="border:none;" class="iq-bg-primary rounded" style="padding: 1%;" data-toggle="modal" data-placement="top" title="Update Anggaran" data-original-title="Update Anggaran" href="" data-target="#update_anggaran<?= $anggaran[$i]->id ?>">
        <i class="ri-pencil-line"> </i>
    </button>
    @endcan
    @can('anggaran_delete')
    <form class="form-horizontal" method="get" action="{{ url('/anggaran/delete/'.base64_encode($anggaran[$i]->id)) }}">
        @csrf
        <input type="hidden" name="totalAnggaranTor" value="{{$tor[$t]->jumlah_anggaran}}">
        <input type="hidden" name="anggaranDiHapus" value="{{$anggaran[$i]->anggaran}}">
        <input type="hidden" name="id_tor" value="{{$tor[$t]->id}}">
        <button style="border:none;" class="anggaran-confirm iq-bg-danger rounded" type="submit" style="padding: 1%;margin:2%" data-toggle="tooltip" title="Delete" onclick="return confirm('Are you sure you want to delete this item?');">
            <i class="ri-delete-bin-line"></i>
        </button>
    </form>
    @endcan
<?php } ?>