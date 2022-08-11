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
                        <div class="iq-card-header d-flex justify-content-center table-info">
                            <div class="iq-header-title">
                                <h4 class="card-title">REKAPITULASI PENCAIRAN DANA & AJUAN PERSEKOT KERJA</h4>
                            </div>
                        </div>
                        <div class="iq-card-body">
                            <div class="table-editable">
                                <table id="datatable" class="table table-bordered table-responsive-md table-hover">
                                    <thead class="text-center align-center">
                                        <tr class="bg-info">
                                            <th style="width: 3%">No</th>
                                            <th style="width: 32%">Judul Kegiatan</th>
                                            <th style="width: 20%">Nama Unit/Prodi/Ormawa</th>
                                            <th style="width: 20%">Penanggungjawab Kegiatan</th>
                                            <th style="width: 10%">Status</th>
                                            <th style="width: 10%">Aksi</th>
                                        </tr>
                                    </thead>

                                    <tbody>

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.datatables.net/1.12.0/js/jquery.dataTables.js"></script>
    <script>
        $(document).ready(function() {
            $.noConflict();
            $('#datatable').DataTable({
                processing: true,
                serverSide: true,
                search: false,
                pageLength: 5,
                ajax: "{{ route('persekot_kerja.data') }}",
                columns: [{
                        data: 'no',
                        name: 'no'
                    },
                    {
                        data: 'nama_kegiatan',
                        name: 'nama_kegiatan'
                    },
                    {
                        data: 'prodi',
                        name: 'prodi'
                    },
                    {
                        data: 'pic',
                        name: 'pic'
                    },
                    {
                        data: 'status',
                        name: 'status'
                    },
                    {
                        data: 'button',
                        name: 'button'
                    },
                ],
            });
        });
    </script>

    <!-- Footer -->
    @include('dashboards/users/layouts/footer')

</body>

</html>
