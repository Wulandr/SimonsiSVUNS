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
                            <ul class="nav nav-pills mb-3 nav-fill" id="pills-tab-1" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link" href="{{url('/mak')}}" aria-selected="false">Kategori MAK</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{url('/kelompok_mak')}}" aria-selected="false">Kelompok MAK</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link active" href="{{url('/belanja_mak')}}" aria-selected="true">Belanja MAK</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{url('/detail_mak')}}" aria-selected="true">Detail MAK</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="tab-content" id="pills-tabContent-1">
                        <div class="tab-pane fade active show" id="pills-home-fill" role="tabpanel" aria-labelledby="pills-home-tab-fill">
                            <div class="col-sm-12">
                                <div class="iq-card">
                                    <div class="iq-card iq-card-block iq-card-stretch iq-card-height">
                                        <div class="iq-card-header d-flex justify-content-between">
                                            <div class="iq-header-title">
                                                <h4 class="card-text">Belanja MAK
                                                    <button class="search-toggle iq-waves-effect bg-primary rounded" data-toggle="modal" title="Tambah Belanja MAK" data-original-title="Tambah Belanja MAK" data-target="#tambahBelMak"><i class="fa fa-plus-circle"></i>
                                                    </button>
                                                </h4>
                                                <!-- T A M B A H    -->
                                                <div class="modal fade" tabindex="-1" role="dialog" id="tambahBelMak">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title">Tambah Belanja MAK</h5>
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <form class="form-horizontal" method="post" action="{{ url('/belanja_mak/create') }}">
                                                                    @csrf
                                                                    <div class="form-group">
                                                                        <label>Kelompok MAK</label>
                                                                        <select name="id_kelompok" id="id_kelompok" class="form-control">
                                                                            @foreach($kelompok_mak as $iniKel)
                                                                            <option value="{{$iniKel->id}}">{{$iniKel->kelompok}}</option>
                                                                            @endforeach
                                                                        </select>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label>Nama Belanja Mak</label>
                                                                        <input name="belanja" id="belanja" type="text" class="form-control">
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
                                                    <form action="{{ url('/searchBelanja') }}" method="GET">
                                                        <div class="row mr-3">
                                                            <div class="col mr-1">
                                                                <input type="text" id="searchKelompok" name="searchKelompok" class="form-control" placeholder="search Kelompok MAK">
                                                            </div>
                                                            <div class="col mr-1">
                                                                <input type="text" id="searchBelanja" name="searchBelanja" class="form-control" placeholder="search Belanja MAK">
                                                            </div>
                                                            <input type="submit" class="btn btn-primary btn-sm" value="Search">
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
                                                            <th scope="col">MAK</th>
                                                            <th scope="col">Kelompok MAK</th>
                                                            <th scope="col">Nama Belanja MAK</th>
                                                            <th scope="col">Aksi</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php $num = 1; ?>
                                                        @foreach ($joinKelompok as $k2 => $join)
                                                        <?php $num =  $joinKelompok->firstItem() + $k2 ?>
                                                        <tr>
                                                            <td><a href="#">{{$num}}</a></td>
                                                            <td>{{$join->jenis_belanja}}</td>
                                                            <td>{{$join->kelompok}}</td>
                                                            <td>{{$join->belanja}}</td>
                                                            <td>
                                                                <div class="flex align-items-center list-user-action">
                                                                    <a class="iq-bg-primary" data-toggle="modal" data-placement="top" title="Update Belanja" data-original-title="Update Belanja" href="" data-target="#update_bel<?= $join->idBelanja ?>"><i class="ri-pencil-line"></i></a>
                                                                    <a class="iq-bg-primary" data-toggle="tooltip" data-placement="top" title="" data-original-title="Delete" onclick="return confirm('Apakah anda yakin ingin hapus ?')" href="{{url('/belanja_mak/delete/'.$join->idBelanja)}}"><i class="ri-delete-bin-line"></i></a>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                        <!-- Modal Ubah IK -->
                                                        <div class="modal fade" tabindex="-1" role="dialog" id="update_bel<?= $join->idBelanja ?>">
                                                            <div class="modal-dialog" role="document">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <h5 class="modal-title">Update Belanja</h5>
                                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                            <span aria-hidden="true">&times;</span>
                                                                        </button>
                                                                    </div>
                                                                    <div class="modal-body">
                                                                        <form class="form-horizontal" method="post" action="{{ url('/belanja_mak/update/'.$join->idBelanja) }}">
                                                                            @csrf
                                                                            <div class="form-group">
                                                                                <label>Kelompok</label>
                                                                                <select name="id_kelompok" id="id_kelompok" class="form-control">
                                                                                    <?php for ($b2 = 0; $b2 < count($kelompok_mak); $b2++) {
                                                                                        if ($kelompok_mak[$b2]->id == $join->idKelompok) { ?>
                                                                                            <option value="{{$kelompok_mak[$b2]->id}}">{{$kelompok_mak[$b2]->kelompok}}</option>
                                                                                    <?php
                                                                                        }
                                                                                    } ?>
                                                                                </select>
                                                                            </div>
                                                                            <div class="form-group">
                                                                                <label>Nama Belanja Mak</label>
                                                                                <input name="belanja" id="belanja" value="{{old('belanja',$join->belanja)}}" type="text" class="form-control">
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
                                            @endforeach
                                            </tbody>
                                            </table>
                                        </div>
                                        {{$joinKelompok->links()}}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Wrapper END -->
                <!-- Footer -->


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

</html>