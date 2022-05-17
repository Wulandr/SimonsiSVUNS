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
                <div class="col-sm-12">
                    <div class="iq-card">
                        <div class="iq-card-header d-flex justify-content-center">
                            <div class="iq-header-title">
                                <h4 class="card-title">REKAPITULASI AJUAN KAK-RAB PROGRAM STUDI</h4>
                            </div>
                        </div>
                        <div class="iq-card-body">
                            <div id="table" class="table-editable">
                                <table class="table table-bordered table-responsive-md table-hover text-center">
                                    <thead class="table-info">
                                        <tr>
                                            <th rowspan="2" style="vertical-align: middle; width: 3%">No</th>
                                            <th rowspan="2" style="vertical-align: middle">Program Studi</th>
                                            <th colspan="4" style="width: ">TW 1 (Per 29 Maret 2022)</th>
                                        </tr>
                                        <tr>
                                            <th style="width: ">RPD</th>
                                            <th style="width: ">KAK - Disetujui</th>
                                            <th style="width: ">Memo Cair Valid</th>
                                            <th style="width: ">% Memo Cair Valid</th>
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
