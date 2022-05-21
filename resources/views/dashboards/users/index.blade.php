@include('dashboards/users/layouts/script')

<body>
    <div id="loading">
        <div id="loading-center">
        </div>
    </div>

    @include('dashboards/users/layouts/navbar')
    @include('dashboards/users/layouts/sidebar')
    <!-- Page Content  -->
    <div id="content-page" class="content-page">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-6 col-md-6 col-lg-3">
                    <div class="iq-card iq-card-block iq-card-stretch iq-card-height">
                        <div class="iq-card-body iq-box-relative">
                            <div class="iq-box-absolute icon iq-icon-box rounded-circle iq-bg-primary">
                                <i class="ri-focus-2-line"></i>
                            </div>
                            <p class="text-secondary">Total Anggaran</p>
                            <div class="d-flex align-items-center justify-content-between">
                                <h4><b>$18 378</b></h4>
                                <div id="iq-chart-box1"></div>
                                <span class="text-primary"><b> +14% <i class="ri-arrow-up-fill"></i></b></span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-md-6 col-lg-3">
                    <div class="iq-card iq-card-block iq-card-stretch iq-card-height">
                        <div class="iq-card-body iq-box-relative">
                            <div class="iq-box-absolute icon iq-icon-box rounded-circle iq-bg-danger">
                                <i class="ri-database-2-line"></i>
                            </div>
                            <p class="text-secondary">Total Realisasi</p>
                            <div class="d-flex align-items-center justify-content-between">
                                <h4><b>45</b></h4>
                                <div id="iq-chart-box2"></div>
                                <span class="text-danger"><b> +0.36% <i class="ri-arrow-up-fill"></i></b></span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-md-6 col-lg-3">
                    <div class="iq-card iq-card-block iq-card-stretch iq-card-height">
                        <div class="iq-card-body iq-box-relative">
                            <div class="iq-box-absolute icon iq-icon-box rounded-circle iq-bg-warning">
                                <i class="ri-pie-chart-2-line"></i>
                            </div>
                            <p class="text-secondary">Total Sisa</p>
                            <div class="d-flex align-items-center justify-content-between">
                                <h4><b>60</b></h4>
                                <div id="iq-chart-box4"></div>
                                <span class="text-warning"><b> +0.45% <i class="ri-arrow-up-fill"></i></b></span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-12">
                    <div class="iq-card">
                        <div class="iq-card-header d-flex justify-content-between">
                            <div class="iq-header-title">
                                <h4 class="card-title">REKAPITULASI AJUAN PER TW</h4>
                            </div>
                        </div>
                        <div class="iq-card-body">
                            <div id="table" class="table-editable">
                                <table class="table table-bordered table-responsive-md table-hover text-center">
                                    <thead>
                                        <tr class="table-info">
                                            <th>No</th>
                                            <th>Nama Kegiatan</th>
                                            <th>Penanggungjawab</th>
                                            <th>Anggaran</th>
                                            <th>Realisasi</th>
                                            <th>Sisa</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Footer -->
    @include('dashboards/users/layouts/footer')

</body>

</html>
