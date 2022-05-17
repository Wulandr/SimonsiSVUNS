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
                                        <h4 class="card-title">TRIWULAN
                                            @can('triwulan_create')
                                            <button class="search-toggle iq-waves-effect bg-primary rounded" data-toggle="modal" title="Tambah TRIWULAN" data-original-title="Tambah TRIWULAN" data-target="#tambahpagu"><i class="fa fa-plus-circle"></i>
                                            </button>
                                            @endcan
                                        </h4>
                                        <!-- Modal Tambah TOR -->
                                        <div class="modal fade" tabindex="-1" role="dialog" id="tambahpagu">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title">Tambah Triwulan</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form class="form-horizontal" method="post" action="{{ url('/triwulan/create') }}">
                                                            @csrf
                                                            <div class="form-group">
                                                                <label>Nama Triwulan</label>
                                                                <select name="triwulan" id="triwulan" class="form-control">
                                                                    <option value="triwulan-1">Triwulan 1</option>
                                                                    <option value="triwulan-2">Triwulan 2</option>
                                                                    <option value="triwulan-3">Triwulan 3</option>
                                                                    <option value="triwulan-4">Triwulan 4</option>
                                                                </select>
                                                            </div>
                                                            <div class="form-group">
                                                                <label>Tahun</label>
                                                                <select name="id_tahun" id="id_tahun" class="form-control">
                                                                    @foreach($tabeltahun as $pt)
                                                                    <option value="{{$pt->id}}">{{$pt->tahun}}</option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                            <div class="form-group">
                                                                <label>Periode Awal</label>
                                                                <input name="periode_awal" id="periode_awal" type="date" class="form-control">
                                                            </div>
                                                            <div class="form-group">
                                                                <label>Periode Akhir</label>
                                                                <input name="periode_akhir" id="periode_akhir" type="date" class="form-control">
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
                                            <form action="{{ url('/triwulan/filtertahun') }}" method="GET">
                                                <div class="row mr-3">
                                                    <div class="col mr-1">
                                                        <select class="form-control filter sm-8" name="tahun" id="input">
                                                            <option value="0">All</option>
                                                            <?php for ($thn = 0; $thn < count($tabeltahun); $thn++) { ?>
                                                                <option value="{{$tabeltahun[$thn]->id}}" {{$filtertahun==$tabeltahun[$thn]->id ? 'selected':''}}>{{$tabeltahun[$thn]->tahun}}</option>
                                                            <?php } ?>
                                                        </select>
                                                    </div>
                                                    <input type="submit" class="btn btn-primary btn-sm" value="Filter">
                                                </div>
                                            </form>
                                        </div>
                                    </span>
                                    <div class="table-responsive">
                                        <div class="form-group row float-right mb-3 mr-2">
                                        </div>
                                        <table class="table mb-0">
                                            <thead class="thead-light">
                                                <tr>
                                                    <th>No.</th>
                                                    <th scope="col">Triwulan</th>
                                                    <th scope="col">Tahun</th>
                                                    <th scope="col">Periode Awal</th>
                                                    <th scope="col">Periode Akhir</th>
                                                    <th scope="col">Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php $num = 1; ?>
                                                <?php for ($a = 0; $a < count($triwulan); $a++) { ?>
                                                    <tr>
                                                        <td><a href="#">{{$num}}</a></td>
                                                        <td>{{$triwulan[$a]->triwulan}}</td>
                                                        <td>
                                                            <?php for ($c = 0; $c < count($tabeltahun); $c++) {
                                                                if ($tabeltahun[$c]->id == $triwulan[$a]->id_tahun) { ?>
                                                                    {{$tabeltahun[$c]->tahun}}
                                                            <?php }
                                                            } ?>
                                                        </td>
                                                        <td>{{$triwulan[$a]->periode_awal}}</td>
                                                        <td>{{$triwulan[$a]->periode_akhir}}</td>
                                                        <td>
                                                            <div class="flex align-items-center list-user-action">
                                                                @can('triwulan_update')
                                                                <a class="iq-bg-primary" data-toggle="modal" data-placement="top" title="Update Triwulan" data-original-title="Update Triwulan" href="" data-target="#update_tw<?= $triwulan[$a]->id ?>"><i class="ri-pencil-line"></i></a>
                                                                @endcan
                                                                @can('triwulan_delete')
                                                                <a class="iq-bg-primary tw-confirm" data-toggle="tooltip" data-placement="top" title="" data-original-title="Delete" href="{{url('/triwulan/delete/'.$triwulan[$a]->id)}}"><i class="ri-delete-bin-line"></i></a>
                                                                @endcan
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <!-- Modal Ubah TW -->
                                                    <div class="modal fade" tabindex="-1" role="dialog" id="update_tw<?= $triwulan[$a]->id ?>">
                                                        <div class="modal-dialog" role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title">Ubah Triwulan</h5>
                                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                        <span aria-hidden="true">&times;</span>
                                                                    </button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <form class="form-horizontal" method="post" action="{{ url('/triwulan/update/'.$triwulan[$a]->id) }}">
                                                                        @csrf
                                                                        <div class="form-group">
                                                                            <label>Nama Triwulan</label>
                                                                            <select name="triwulan" id="triwulan" class="form-control">
                                                                                <option value="triwulan-1">Triwulan 1</option>
                                                                                <option value="triwulan-2">Triwulan 2</option>
                                                                                <option value="triwulan-3">Triwulan 3</option>
                                                                                <option value="triwulan-4">Triwulan 4</option>
                                                                            </select>
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <label>Tahun</label>
                                                                            <select name="id_tahun" id="id_tahun" class="form-control">
                                                                                @foreach($tabeltahun as $pt)
                                                                                <option value="{{$pt->id}}">{{$pt->tahun}}</option>
                                                                                @endforeach
                                                                            </select>
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <label>Periode Awal</label>
                                                                            <input name="periode_awal" id="periode_awal" type="date" class="form-control">
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <label>Periode Akhir</label>
                                                                            <input name="periode_akhir" id="periode_akhir" type="date" class="form-control">
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
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Wrapper END -->
    <!-- Footer -->
    <footer class="iq-footer">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-6">
                    <ul class="list-inline mb-0">
                        <li class="list-inline-item"><a href="privacy-policy.html">Privacy Policy</a></li>
                        <li class="list-inline-item"><a href="terms-of-service.html">Terms of Use</a></li>
                    </ul>
                </div>
                <div class="col-lg-6 text-right">
                    Copyright 2020 <a href="#">FinDash</a> All Rights Reserved.
                </div>
            </div>
        </div>
    </footer>
    <!-- Footer END -->

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="{{ asset('findash/assets/js/jquery.min.js')}}"></script>
    <script src="{{ asset('findash/assets/js/popper.min.js')}}"></script>
    <script src="{{ asset('findash/assets/js/bootstrap.min.js')}}"></script>
    <!-- Appear JavaScript -->
    <script src="{{ asset('findash/assets/js/jquery.appear.js')}}"></script>
    <!-- Countdown JavaScript -->
    <script src="{{ asset('findash/assets/js/countdown.min.js')}}"></script>
    <!-- Counterup JavaScript -->
    <script src="{{ asset('findash/assets/js/waypoints.min.js')}}"></script>
    <script src="{{ asset('findash/assets/js/jquery.counterup.min.js')}}"></script>
    <!-- Wow JavaScript -->
    <script src="{{ asset('findash/assets/js/wow.min.js')}}"></script>
    <!-- Apexcharts JavaScript -->
    <script src="{{ asset('findash/assets/js/apexcharts.js')}}"></script>
    <!-- Slick JavaScript -->
    <script src="{{ asset('findash/assets/js/slick.min.js')}}"></script>
    <!-- Select2 JavaScript -->
    <script src="{{ asset('findash/assets/js/select2.min.js')}}"></script>
    <!-- Owl Carousel JavaScript -->
    <script src="{{ asset('findash/assets/js/owl.carousel.min.js')}}"></script>
    <!-- Magnific Popup JavaScript -->
    <script src="{{ asset('findash/assets/js/jquery.magnific-popup.min.js')}}"></script>
    <!-- Smooth Scrollbar JavaScript -->
    <script src="{{ asset('findash/assets/js/smooth-scrollbar.js')}}"></script>
    <!-- lottie JavaScript -->
    <script src="{{ asset('findash/assets/js/lottie.js')}}"></script>
    <!-- Style Customizer -->
    <script src="{{ asset('findash/assets/js/style-customizer.js')}}"></script>
    <!-- Chart Custom JavaScript -->
    <script src="{{ asset('findash/assets/js/chart-custom.js')}}"></script>
    <!-- Custom JavaScript -->
    <script src="{{ asset('findash/assets/js/custom.js')}}"></script>
</body>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script>
    $('.tw-confirm').on('click', function(event) {
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

</html>