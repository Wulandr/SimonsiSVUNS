@include('dashboards/admins/layouts/navbar')
@include('dashboards/admins/layouts/sidebar')
<!-- partial -->
<div class="main-panel">
    <div class="content-wrapper">
        <!-- Page Title Header Starts-->
        <div class="row page-title-header">
            <div class="col-12">
                <div class="page-header">
                    <h4 class="page-title">Dashboard</h4>
                </div>
            </div>
            <!-- <div class="col-md-12">
                <div class="page-header-toolbar">
                    <div class="btn-group toolbar-item" role="group" aria-label="Basic example">
                        <button type="button" class="btn btn-secondary"><i class="mdi mdi-chevron-left"></i></button>
                        <button type="button" class="btn btn-secondary">03/02/2019 - 20/08/2019</button>
                        <button type="button" class="btn btn-secondary"><i class="mdi mdi-chevron-right"></i></button>
                    </div>
                    <div class="filter-wrapper">
                        <div class="dropdown toolbar-item">
                            <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownsorting" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">All Day</button>
                            <div class="dropdown-menu" aria-labelledby="dropdownsorting">
                                <a class="dropdown-item" href="#">Last Day</a>
                                <a class="dropdown-item" href="#">Last Month</a>
                                <a class="dropdown-item" href="#">Last Year</a>
                            </div>
                        </div>
                        <a href="#" class="advanced-link toolbar-item">Advanced Options</a>
                    </div>
                    <div class="sort-wrapper">
                        <button type="button" class="btn btn-primary toolbar-item">New</button>
                        <div class="dropdown ml-lg-auto ml-3 toolbar-item">
                            <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownexport" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Export</button>
                            <div class="dropdown-menu" aria-labelledby="dropdownexport">
                                <a class="dropdown-item" href="#">Export as PDF</a>
                                <a class="dropdown-item" href="#">Export as DOCX</a>
                                <a class="dropdown-item" href="#">Export as CDR</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div> -->
        </div>
        <!-- Page Title Header Ends-->
        <div class="row">
            <div class="col-md-12 grid-margin">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-3 col-md-6">
                                <div class="d-flex">
                                    <div class="wrapper">
                                        <h3 class="mb-0 font-weight-semibold">25</h3>
                                        <h5 class="mb-0 font-weight-medium text-primary">User</h5>
                                    </div>
                                    <div class="wrapper my-auto ml-auto ml-lg-4">
                                        <canvas height="50" width="100" id="stats-line-graph-1"></canvas>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-6 mt-md-0 mt-4">
                                <div class="d-flex">
                                    <div class="wrapper">
                                        <h3 class="mb-0 font-weight-semibold">20</h3>
                                        <h5 class="mb-0 font-weight-medium text-primary">Unit Kerja</h5>
                                    </div>
                                    <div class="wrapper my-auto ml-auto ml-lg-4">
                                        <canvas height="50" width="100" id="stats-line-graph-2"></canvas>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-6 mt-md-0 mt-4">
                                <div class="d-flex">
                                    <div class="wrapper">
                                        <h3 class="mb-0 font-weight-semibold">688</h3>
                                        <h5 class="mb-0 font-weight-medium text-primary">TOR</h5>
                                    </div>
                                    <div class="wrapper my-auto ml-auto ml-lg-4">
                                        <canvas height="50" width="100" id="stats-line-graph-3"></canvas>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-6 mt-md-0 mt-4">
                                <div class="d-flex">
                                    <div class="wrapper">
                                        <h3 class="mb-0 font-weight-semibold">1.553</h3>
                                        <h5 class="mb-0 font-weight-medium text-primary">Kegiatan</h5>
                                    </div>
                                    <div class="wrapper my-auto ml-auto ml-lg-4">
                                        <canvas height="50" width="100" id="stats-line-graph-4"></canvas>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <!-- content-wrapper ends -->
    <!-- partial:partials/_footer.html -->
    <footer class="footer">
        <div class="container-fluid clearfix">
            <!-- <span class="text-muted d-block text-center text-sm-left d-sm-inline-block">Copyright © bootstrapdash.com 2020</span> -->
            <span class="text-muted d-block text-center text-sm-left d-sm-inline-block">Sekolah Vokasi Universitas Sebelas Maret</span>
            <!-- <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center"> Free <a href="https://www.bootstrapdash.com/bootstrap-admin-template/" target="_blank">Bootstrap admin templates</a> from Bootstrapdash.com</span> -->
        </div>
    </footer>
    <!-- partial -->
</div>
<!-- main-panel ends -->
</div>
<!-- page-body-wrapper ends -->
</div>

<!-- container-scroller -->
<!-- plugins:js -->
<script src="{{asset('template/src/assets/vendors/js/vendor.bundle.base.js')}}"></script>
<script src="{{asset('template/src/assets/vendors/js/vendor.bundle.addons.js')}}"></script>
<!-- endinject -->
<!-- Plugin js for this page-->
<!-- End plugin js for this page-->
<!-- inject:js -->
<script src="{{asset('template/src/assets/js/shared/off-canvas.js')}}"></script>
<script src="{{asset('template/src/assets/js/shared/misc.js')}}"></script>
<!-- endinject -->
<!-- Custom js for this page-->
<script src="{{asset('template/src/assets/js/demo_1/dashboard.js')}}"></script>
<!-- End custom js for this page-->
<script src="{{asset('template/src/assets/js/shared/jquery.cookie.js')}}" type="text/javascript"></script>