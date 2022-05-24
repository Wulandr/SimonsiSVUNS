<td>
    <?php $belumada_status = '<button type="button" data-toggle="modal" data-target="#modaledit' . $item->id . '" class="btn btn-outline-secondary btn-sm"><i class="fa fa-edit"></i>Belum Terverifikasi</button>'; ?>
    @foreach ($trx_status as $a)
        @if ($item->id == $stat->id_perizinan)
            @foreach ($status as $b)
                @if ($a->id_status == $b->id)
                    @if ($b->kategori == 'Perizinan')
                        @if ($b->$b->nama_status == 'Sudah Divalidasi')
                            <?php $belumada_status =
                                '<a data-toggle="modal" data-target="#modaledit' .
                                $item->id .
                                '" class="btn btn-outline-info btn-sm edit"><i class="fa fa-edit"></i></a>
                                                                                                                <button type="button" data-toggle="modal" data-target="#modalupload"
                                                                                                                class="btn btn-outline-primary btn-sm">
                                                                                                                <i class="fa fa-upload"></i>Sudah Divalidasi</button>';
                            ?>
                        @endif
                    @endif
                @endif
            @endforeach
        @endif
    @endforeach
    <?= $belumada_status ?>
</td>
