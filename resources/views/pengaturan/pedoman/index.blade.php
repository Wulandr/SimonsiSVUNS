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
                                        <h4 class="card-title">Pedoman
                                            <button class="search-toggle iq-waves-effect bg-primary rounded"
                                                data-toggle="modal" title="Tambah pedoman"
                                                data-original-title="Tambah pedoman" data-target="#tambahpedoman"><i
                                                    class="fa fa-plus-circle"></i>
                                            </button>
                                        </h4>
                                        <!-- Modal Tambah pedoman -->
                                        @include('pengaturan.pedoman.tambah_pedoman')
                                        <div class="iq-card-header-toolbar d-flex align-items-center">
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
                                                @foreach ($pedoman as $pedomansbm)
                                                    <tr>
                                                        <td>{{ $i }}</td>
                                                        <td><?php $pedomansbm->jenis;
                                                        if ($pedomansbm->jenis == 'SBM') {
                                                            echo 'Standar Biaya Masukan' . ' (' . $pedomansbm->jenis . ')';
                                                        } else {
                                                            echo $pedomansbm->jenis;
                                                        }
                                                        ?></td>
                                                        <td>{{ $pedomansbm->nama }}</td>
                                                        <td><a
                                                                href="{{ asset('/pedoman/' . $pedomansbm->file) }}">{{ $pedomansbm->file }}</a>
                                                        </td>
                                                        <td>{{ $pedomansbm->tahun }}</td>
                                                        <td>
                                                            <div class="flex align-items-center list-user-action">
                                                                <a class="iq-bg-primary" data-toggle="modal"
                                                                    data-placement="top" title="Update Pedoman"
                                                                    data-original-title="Update Pedoman" href=""
                                                                    data-target="#update_pedoman<?= $pedomansbm->id ?>"><i
                                                                        class="ri-pencil-line"></i></a>
                                                                <a href="{{ url('/pedomans/delete/' . $pedomansbm->id) }}"
                                                                    class="iq-bg-primary pedoman-confirm"
                                                                    data-toggle="tooltip" title="Delete">
                                                                    <i class="fa fa-trash"></i>
                                                                </a>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <!-- Modal Edit Pedoman -->
                                                    @include('pengaturan.pedoman.edit_pedoman')
                                                    <?php $i += 1; ?>
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
