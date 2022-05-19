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
                                        <h4 class="card-title">UNIT <button class="search-toggle iq-waves-effect bg-primary rounded" data-toggle="modal" title="Tambah UNIT" data-original-title="Tambah UNIT" data-target="#tambahunit"><i class="fa fa-plus-circle"></i>
                                            </button></h4>
                                        <!-- Modal Tambah UNIT -->
                                        <div class="modal fade" tabindex="-1" role="dialog" id="tambahunit">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title">Tambah Unit</h5>
                                                        @can('unit_create')
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                        @endcan
                                                    </div>
                                                    <div class="modal-body">
                                                        <form class="form-horizontal" method="post" action="{{ url('/unit/create') }}">
                                                            @csrf
                                                            <div class="form-group">
                                                                <label>Unit</label>
                                                                <input name="nama_unit" id="nama_unit" type="text" class="form-control">
                                                            </div>
                                                            <div class="form-group">
                                                                <label>Telepon</label>
                                                                <input name="telepon" id="telepon" type="text" class="form-control">
                                                            </div>
                                                            <div class="form-group">
                                                                <label>Email</label>
                                                                <input name="email" id="email" type="text" class="form-control">
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

                                        </div>
                                    </span>
                                    <div class="table-responsive">
                                        <div class="form-group row float-right mb-3 mr-2">
                                        </div>
                                        <table class="table mb-0">
                                            <thead class="thead-light">
                                                <tr>
                                                    <th>No.</th>
                                                    <th scope="col">Unit</th>
                                                    <th scope="col">Telepon</th>
                                                    <th scope="col">Email</th>
                                                    <th scope="col">Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php $num = 1; ?>
                                                <?php for ($a = 0; $a < count($unit); $a++) { ?>
                                                    <tr>
                                                        <td><a href="#">{{$num}}</a></td>
                                                        <td>{{$unit[$a]->nama_unit}}</td>
                                                        <td>{{$unit[$a]->telepon}}</td>
                                                        <td>{{$unit[$a]->email}}</td>
                                                        <td>
                                                            <div class="flex align-items-center list-user-action">
                                                                @can('unit_update')
                                                                <a class="iq-bg-primary" data-toggle="modal" data-placement="top" title="Update Unit" data-original-title="Update Unit" href="" data-target="#update_unit<?= $unit[$a]->id ?>"><i class="ri-pencil-line"></i></a>
                                                                @endcan
                                                                @can('unit_delete')
                                                                <a class="iq-bg-primary unit-confirm" data-toggle="tooltip" data-placement="top" title="" data-original-title="Delete" href="{{url('/unit/delete/'.$unit[$a]->id)}}"><i class="ri-delete-bin-line"></i></a>
                                                                @endcan
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <!-- Modal Ubah UNIT -->
                                                    <div class="modal fade" tabindex="-1" role="dialog" id="update_unit<?= $unit[$a]->id ?>">
                                                        <div class="modal-dialog" role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title">Ubah Unit</h5>
                                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                        <span aria-hidden="true">&times;</span>
                                                                    </button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <form class="form-horizontal" method="post" action="{{ url('/unit/update/'.$unit[$a]->id) }}">
                                                                        @csrf
                                                                        <div class="form-group">
                                                                            <label>Unit</label>
                                                                            <input name="nama_unit" id="nama_unit" value="{{old('nama_unit',$unit[$a]->nama_unit)}}" type="text" class="form-control">
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <label>Telepon</label>
                                                                            <input name="telepon" id="telepon" value="{{old('telepon',$unit[$a]->telepon)}}" type="text" class="form-control">
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <label>Email</label>
                                                                            <input name="email" id="email" value="{{old('email',$unit[$a]->email)}}" type="text" class="form-control">
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
    $('.unit-confirm').on('click', function(event) {
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