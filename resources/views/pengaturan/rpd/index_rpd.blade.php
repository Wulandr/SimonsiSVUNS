@include('dashboards/users/layouts/script')

<body>
    <div id="loading">
        <div id="loading-center">
        </div>
    </div>
    <div class="wrapper">
        @include('dashboards/users/layouts/navbar')
        @include('dashboards/users/layouts/sidebar')
        <!-- Page Content  -->
        <div id="content-page" class="content-page">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="iq-card">
                            <div class="iq-card iq-card-block iq-card-stretch iq-card-height">
                                <div class="iq-card-header d-flex">
                                    <div class="iq-header-title col-sm-8">
                                        <h4 class="card-title">Rancangan Penggunaan Dana (RPD)
                                            <button class="search-toggle iq-waves-effect bg-primary rounded"
                                                data-toggle="modal" title="Tambah RPD" data-original-title="Tambah RPD"
                                                data-target="#add_rpd"><i class="fa fa-plus-circle"></i>
                                            </button>
                                        </h4>
                                        <!-- Modal Tambah TOR -->
                                        @include('pengaturan/rpd/tambah_rpd')
                                    </div>
                                    <div class="iq-header-toolbar col-sm-3 d-flex justify-content-end">
                                        <div class="form-group row mb-0">
                                            <form action="{{ url('/rpd/filtertahun') }}" method="GET">
                                                <div class="row">
                                                    <div class="col mt-2">
                                                        <select class="form-control filter" name="tahun" id="input">
                                                            <option value="0">All</option>
                                                            <?php for ($thn2 = 0; $thn2 < count($tabeltahun); $thn2++) { ?>
                                                            <option value="{{ $tabeltahun[$thn2]->id }}"
                                                                {{ $filtertahun == $tabeltahun[$thn2]->tahun ? 'selected' : '' }}>
                                                                {{ $tabeltahun[$thn2]->tahun }}</option>
                                                            <?php } ?>
                                                        </select>
                                                    </div>
                                                    <input type="submit" class="btn btn-primary btn-sm m-3"
                                                        value="Filter">
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                    <div class="iq-card-header-toolbar col-sm-1 d-flex justify-content-end">
                                        <div class="dropdown">
                                            <span class="dropdown-toggle text-primary" id="dropdownMenuButton5"
                                                data-toggle="dropdown">
                                                <i class="ri-more-fill"></i>
                                            </span>
                                            <div class="dropdown-menu dropdown-menu-right"
                                                aria-labelledby="dropdownMenuButton5">
                                                <a class="dropdown-item" href="#"><i
                                                        class="ri-printer-fill mr-2"></i>Print</a>
                                                <a class="dropdown-item" href="#"><i
                                                        class="ri-file-download-fill mr-2"></i>Download</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="iq-card-body">
                                    @if (session('success'))
                                        <div class="alert alert-success">
                                            {{ session('success') }}
                                        </div>
                                    @endif
                                    <div class="table-responsive">
                                        <div class="form-group row float-right mb-3 mr-2">
                                        </div>
                                        <table id="mypagu" class="table mb-0">
                                            <thead class="thead-light text-center">
                                                <tr>
                                                    <th>No.</th>
                                                    <th scope="col">Prodi</th>
                                                    <th scope="col">Tahun</th>
                                                    <th scope="col" style="width: 12%">Pagu</th>
                                                    <th scope="col" style="width: 12%">RPD Triwulan 1</th>
                                                    <th scope="col" style="width: 12%">RPD Triwulan 2</th>
                                                    <th scope="col" style="width: 12%">RPD Triwulan 3</th>
                                                    <th scope="col" style="width: 12%">RPD Triwulan 4</th>
                                                    <th scope="col" style="width: 8%">Action</th>
                                                </tr>
                                            </thead>
                                            <tbody class="text-center">
                                                <?php $num = 1; ?>
                                                <?php 
                                                for ($a = 0; $a < count($pagu); $a++) { 
                                                    for ($z = 0; $z < count($rpd); $z++) {
                                                        if ($rpd[$z]->id_pagu == $pagu[$a]->id)
                                                ?>
                                                <tr>
                                                    <td><a href="#">{{ $num }}</a></td>
                                                    <td class="text-left">
                                                        <?php for ($b = 0; $b < count($unit2); $b++) {
                                                            if ($unit2[$b]->id == $pagu[$a]->id_unit) {
                                                                echo $unit2[$b]->nama_unit;
                                                            }
                                                        } ?>
                                                    </td>
                                                    <td>
                                                        <?php for ($c = 0; $c < count($tabeltahun); $c++) {
                                                            if ($tabeltahun[$c]->id == $pagu[$a]->id_tahun) {
                                                                echo $tabeltahun[$c]->tahun;
                                                            }
                                                        } ?>
                                                    </td>
                                                    <td>{{ 'Rp ' . number_format($pagu[$a]->pagu) }}
                                                    </td>
                                                    <td>{{ 'Rp ' . number_format($rpd[$z]->tw_1) }}
                                                    </td>
                                                    <td>{{ 'Rp ' . number_format($rpd[$z]->tw_2) }}
                                                    </td>
                                                    <td>{{ 'Rp ' . number_format($rpd[$z]->tw_3) }}
                                                    </td>
                                                    <td>{{ 'Rp ' . number_format($rpd[$z]->tw_4) }}
                                                    </td>
                                                    <td>
                                                        <div class="flex align-items-center list-user-action">
                                                            <a class="iq-bg-primary" data-toggle="modal"
                                                                data-placement="top" title="Update Pagu"
                                                                data-original-title="Update Pagu" href=""
                                                                data-target="#update_pagu<?= $pagu[$a]->id ?>"><i
                                                                    class="ri-pencil-line"></i></a>
                                                            <a class="pagu-confirm iq-bg-primary" data-toggle="tooltip"
                                                                data-placement="top" title=""
                                                                data-original-title="Delete"
                                                                href="{{ url('/pagu/delete/' . $pagu[$a]->id) }}"><i
                                                                    class="ri-delete-bin-line"></i></a>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <!-- Modal Ubah Pagu -->
                                                <div class="modal fade" tabindex="-1" role="dialog"
                                                    id="update_pagu<?= $pagu[$a]->id ?>">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title">Update PAGU</h5>
                                                                <button type="button" class="close"
                                                                    data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <form class="form-horizontal" method="post"
                                                                    action="{{ url('/pagu/update/' . $pagu[$a]->id) }}">
                                                                    @csrf
                                                                    <div class="form-group">
                                                                        <label>Nominal PAGU</label>
                                                                        <input name="pagu" id="pagu" type="text"
                                                                            value="{{ old('pagu', $pagu[$a]->pagu) }}"
                                                                            class="form-control">
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label>Prodi</label>
                                                                        <select name="id_unit" id="id_unit"
                                                                            class="form-control">
                                                                            @foreach ($unit2 as $unit)
                                                                                <?php
                                                                                    if ($unit->id == $pagu[$a]->id_unit) { ?>
                                                                                <option value="{{ $unit->id }}">
                                                                                    {{ $unit->nama_unit }}</option>
                                                                                <?php } ?>
                                                                            @endforeach
                                                                        </select>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label>Tahun</label>
                                                                        <select name="id_tahun" id="id_tahun"
                                                                            class="form-control">
                                                                            @foreach ($tabeltahun as $pt)
                                                                                <option
                                                                                    value="{{ old('id_tahun', $pt->id) }}"
                                                                                    {{ $pagu[$a]->id_tahun == $pt->id ? 'selected' : '' }}>
                                                                                    {{ $pt->tahun }}</option>
                                                                            @endforeach
                                                                        </select>
                                                                    </div>
                                                                    <input name="created_at" id="created_at"
                                                                        type="hidden" value="<?= date('Y-m-d') ?>">
                                                                    <input name="updated_at" id="updated_at"
                                                                        type="hidden" value="<?= date('Y-m-d') ?>">
                                                                    <button class="btn btn-primary mr-1"
                                                                        type="submit">Submit</button>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <?php $num += 1; ?>
                                                <?php }} ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Wrapper END -->
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script>
        $('.pagu-confirm').on('click', function(event) {
            event.preventDefault();
            const url = $(this).attr('href');
            swal({
                title: 'Are you sure?',
                text: 'This record and it`s details will be permanantly deleted!',
                icon: 'warning',
                buttons: ["Cancel", "Yes!"],
            }).then(function(value) {
                if (value) {
                    window.location.href = url;
                }
            });
        });
    </script>
    <script src="https://cdn.datatables.net/1.12.0/js/jquery.dataTables.js"></script>
    <script>
        $(document).ready(function() {
            $.noConflict();
            $('#mypagu').DataTable();
        });
    </script>
    <script>
        window.setTimeout(function() {
            $(".alert").fadeTo(500, 0).slideUp(500, function() {
                $(this).remove();
            });
        }, 2000);
    </script>
    @include('dashboards/users/layouts/footer')
</body>

</html>
