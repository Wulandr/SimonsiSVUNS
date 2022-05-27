<?php

use Illuminate\Support\Facades\Auth;

if (Auth()->user()->id_unit == 1) {
?>
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
                                <ul class="nav nav-pills mb-3 nav-fill" id="pills-tab-1" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{url('/iku')}}" aria-controls="pills-home" aria-selected="false">Indikator IKU</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link active" href="{{url('/ik')}}" aria-controls="pills-home" aria-selected="false">Indikator IK</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{url('/k')}}" aria-controls="pills-home" aria-selected="false">Indikator K</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{url('/subk')}}" aria-controls="pills-home" aria-selected="false">Indikator SUB K</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="iq-card">
                                <div class="iq-card iq-card-block iq-card-stretch iq-card-height">
                                    <div class="iq-card-header d-flex justify-content-between">
                                        <div class="iq-header-title">
                                            <h4 class="card-text">Indikator Kinerja Kegiatan
                                                @can('ik_create')
                                                <button class="search-toggle iq-waves-effect bg-primary rounded" data-toggle="modal" title="Tambah IK" data-original-title="Tambah IK" data-target="#tambahik"><i class="fa fa-plus-circle"></i>
                                                </button>
                                                @endcan
                                            </h4>
                                            <!-- T A M B A H  I K  -->
                                            <div class="modal fade" tabindex="-1" role="dialog" id="tambahik">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title">Tambah IK</h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <form class="form-horizontal" method="post" action="{{ url('/ik/create') }}">
                                                                @csrf
                                                                <div class="form-group">
                                                                    <label>IKU</label>
                                                                    <select name="id_iku" id="id_iku" class="form-control">
                                                                        @foreach($iku as $iniIku)
                                                                        <option value="{{$iniIku->id}}">{{$iniIku->IKU}}</option>
                                                                        @endforeach
                                                                    </select>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label>IK</label>
                                                                    <input name="IK" id="IK" type="text" class="form-control">
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
                                        @if (session('success'))
                                        <div class="alert alert-success">
                                            {{ session('success') }}
                                        </div>
                                        @endif
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
                                            <table id="myik" class="table mb-0">
                                                <thead class="thead-light">
                                                    <tr>
                                                        <th>No.</th>
                                                        <th scope="col">IKU</th>
                                                        <th scope="col">IK</th>
                                                        <th scope="col">Deskripsi</th>
                                                        <th scope="col">Aksi</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php $num = 1; ?>
                                                    <?php foreach ($ik as $indexIK => $indikatorIK) { ?>
                                                        <?php
                                                        // $num =  $ik->firstItem() + $indexIK 
                                                        ?>
                                                        <tr>
                                                            <td><a href="#">{{$num}}</a></td>
                                                            <?php for ($sk2 = 0; $sk2 < count($iku); $sk2++) {
                                                                if ($iku[$sk2]->id == $indikatorIK->id_iku) { ?>
                                                                    <td>{{$iku[$sk2]->IKU}}</td>
                                                            <?php }
                                                            } ?>
                                                            <td>{{$indikatorIK->IK}}</td>
                                                            <td>{{$indikatorIK->deskripsi}}</td>
                                                            <td>
                                                                <div class="flex align-items-center list-user-action">
                                                                    @can('ik_update')
                                                                    <a class="iq-bg-primary" data-toggle="modal" data-placement="top" title="Update IK" data-original-title="Update IK" href="" data-target="#update_ik<?= $indikatorIK->id ?>"><i class="ri-pencil-line"></i></a>
                                                                    @endcan
                                                                    @can('ik_delete')
                                                                    <a class="ik-confirm iq-bg-primary" data-toggle="tooltip" data-placement="top" title="" data-original-title="Delete" href="{{url('/ik/delete/'.$indikatorIK->id)}}"><i class="ri-delete-bin-line"></i></a>
                                                                    @endcan
                                                                </div>
                                                            </td>
                                                        </tr>
                                                        <!-- Modal Ubah IK -->
                                                        <div class="modal fade" tabindex="-1" role="dialog" id="update_ik<?= $indikatorIK->id ?>">
                                                            <div class="modal-dialog" role="document">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <h5 class="modal-title">Update IK</h5>
                                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                            <span aria-hidden="true">&times;</span>
                                                                        </button>
                                                                    </div>
                                                                    <div class="modal-body">
                                                                        <form class="form-horizontal" method="post" action="{{ url('/ik/update/'.$indikatorIK->id) }}">
                                                                            @csrf
                                                                            <div class="form-group">
                                                                                <label>IKU</label>
                                                                                <select name="id_iku" id="id_iku" class="form-control">
                                                                                    @foreach($iku as $iniIku)
                                                                                    <option value="{{old('id_iku',$iniIku->id)}}" {{$iniIku->id == $indikatorIK->id_iku ? 'selected' : ''}}>{{$iniIku->IKU}}</option>
                                                                                    @endforeach
                                                                                </select>
                                                                            </div>
                                                                            <div class="form-group">
                                                                                <label>IK</label>
                                                                                <input name="IK" id="IK" value="{{old('IK',$indikatorIK->IK)}}" type="text" class="form-control">
                                                                            </div>
                                                                            <div class="form-group">
                                                                                <label>Deskripsi</label>
                                                                                <input name="deskripsi" id="deskripsi" value="{{old('deskripsi',$indikatorIK->deskripsi)}}" type="text" class="form-control">
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
                                        <?php $num += 1; ?>
                                    <?php } ?>
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

        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
        <script src="https://cdn.datatables.net/1.12.0/js/jquery.dataTables.js"></script>
        <script>
            $('.ik-confirm').on('click', function(event) {
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
        <script>
            $(document).ready(function() {
                $.noConflict();
                $('#myik').DataTable();
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
<?php } ?>