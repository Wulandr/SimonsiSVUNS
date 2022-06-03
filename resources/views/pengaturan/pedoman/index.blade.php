<?php

use Illuminate\Support\Facades\Auth;


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
                            <div class="iq-card iq-card-block iq-card-stretch iq-card-height">
                                <div class="iq-card-header d-flex justify-content-between">
                                    <div class="iq-header-title">
                                        <h4 class="card-title">Pedoman SBM
                                            <button class="search-toggle iq-waves-effect bg-primary rounded" data-toggle="modal" title="Tambah pedoman" data-original-title="Tambah pedoman" data-target="#tambahpedoman"><i class="fa fa-plus-circle"></i>
                                            </button>
                                        </h4>
                                        <!-- Modal Tambah pedoman -->
                                        <div class="modal fade" tabindex="-1" role="dialog" id="tambahpedoman" aria-labelledby="Upload Pedoman" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title">Tambah Pedoman</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form class="needs-validation" enctype="multipart/form-data" method="post" action="{{ url('/pedomans/create') }}">
                                                            @csrf
                                                            <div class="form-group">
                                                                <label>Jenis</label>
                                                                <div class="">
                                                                    <input type="radio" name="jenis" id="jenis" value="SBM" checked>
                                                                    <label class="">Standar Biaya Masukan</label>
                                                                </div>
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="validationCustom01">Nama File</label>
                                                                <input name="nama" id="nama" type="text" class="form-control" id="validationCustom01" required>
                                                            </div>
                                                            <div class="form-group">
                                                                <label>Tahun File</label>
                                                                <input name="tahun" id="tahun" type="text" class="form-control">
                                                            </div>
                                                            <input type="file" class="form-control-file" name="file" id="file" required>
                                                            @error('file')
                                                            <div class="alert text-white bg-success" role="alert">
                                                                <div class="iq-alert-icon">
                                                                    <i class="ri-alert-line"></i>
                                                                </div>
                                                                <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                                                                @enderror
                                                                <div class="invalid-feedback">
                                                                    Tolong tambahkan file sebelum submit!
                                                                </div>
                                                            </div>

                                                            <input type="hidden" name="jenis" id="jenis" value="SBM">
                                                            <input name="created_at" id="created_at" type="hidden" value="<?= date('Y-m-d') ?>">
                                                            <input name="updated_at" id="updated_at" type="hidden" value="<?= date('Y-m-d') ?>">
                                                            <div class="modal-footer">
                                                                <button type="submit" class="btn btn-primary">Upload</button>
                                                            </div>
                                                        </form>
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
                                        <table id="mypedoman" class="table mb-0">
                                            <thead class="thead-light">
                                                <tr>
                                                    <th>No.</th>
                                                    <th scope="col">Jenis</th>
                                                    <th scope="col">Nama</th>
                                                    <th scope="col">File</th>
                                                    <th scope="col">Tahun</th>
                                                    <th scope="col">Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php $i = 1; ?>
                                                @foreach($pedoman as $pedomansbm)
                                                @if($pedomansbm->jenis == 'SBM')
                                                <tr>
                                                    <td>{{$i}}</td>
                                                    <td><?php $pedomansbm->jenis;
                                                        if ($pedomansbm->jenis == 'SBM') {
                                                            echo "Standar Biaya Masukan" . " (" . $pedomansbm->jenis . ")";
                                                        } else {
                                                            echo $pedomansbm->jenis;
                                                        }
                                                        ?></td>
                                                    <td>{{$pedomansbm->nama}}</td>
                                                    <td><a href="{{asset('/pedoman/'.$pedomansbm->file)}}">{{$pedomansbm->file}}</a></td>
                                                    <td>{{$pedomansbm->tahun}}</td>
                                                    <td>
                                                        <div class="flex align-items-center list-user-action">
                                                            <a class="iq-bg-primary" data-toggle="modal" data-placement="top" title="Update Pedoman" data-original-title="Update Pedoman" href="" data-target="#update_pedoman<?= $pedomansbm->id ?>"><i class="ri-pencil-line"></i></a>
                                                            <a href="{{url('/pedomans/delete/'.$pedomansbm->id)}}" class="iq-bg-primary pedoman-confirm" data-toggle="tooltip" title="Delete">
                                                                <i class="fa fa-trash"></i>
                                                            </a>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <!-- Modal Ubah Pedoman SBM -->
                                                <div class="modal fade" tabindex="-1" role="dialog" id="update_pedoman<?= $pedomansbm->id ?>">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title">Ubah Pedoman SBM</h5>
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <form class="form-horizontal" enctype="multipart/form-data" method="post" action="{{ url('/pedomans/update/'.$pedomansbm->id) }}">
                                                                    @csrf
                                                                    <div class="form-group">
                                                                        <label>Jenis</label>
                                                                        <div class="">
                                                                            <input type="radio" name="jenis" id="jenis" value="{{ $pedomansbm->jenis }}" checked>
                                                                            <label class=""> {{ $pedomansbm->jenis }}</label>
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label>Nama File</label>
                                                                        <input name="nama" value="{{old('nama',$pedomansbm->nama)}}" id="nama" type="text" class="form-control">
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label>Tahun File</label>
                                                                        <input name="tahun" value="{{old('tahun',$pedomansbm->tahun)}}" id="tahun" type="text" class="form-control">
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label>File</label>
                                                                        <input type="file" class="form-control-file" name="file" id="file" value="{{old('file')}}" required>
                                                                        <small>File yang sudah diupload:
                                                                            <a class="text-primary" href="{{ asset('pedoman/' . $pedomansbm->file) }}" target="_blank"><?= $pedomansbm->file ?></a>
                                                                        </small>

                                                                    </div>
                                                                    <input name="created_at" id="created_at" type="hidden" value="<?= date('Y-m-d') ?>">
                                                                    <input name="updated_at" id="updated_at" type="hidden" value="<?= date('Y-m-d') ?>">
                                                                    <button class="btn btn-primary mr-1" type="submit">Submit</button>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <?php $i += 1; ?>
                                                @endif
                                                @endforeach
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
    <script src="https://cdn.datatables.net/1.12.0/js/jquery.dataTables.js"></script>
    <script>
        $(document).ready(function() {
            $.noConflict();
            $('#mypedoman').DataTable();
        });
    </script>

    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script>
        $('.pedoman-confirm').on('click', function(event) {
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
        window.setTimeout(function() {
            $(".alert").fadeTo(500, 0).slideUp(500, function() {
                $(this).remove();
            });
        }, 2000);
    </script>
    @include('dashboards/users/layouts/footer')

    </html>