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
                        <div class="iq-card-header d-flex justify-content-center bg-secondary">
                            <div class="iq-header-title">
                                <h4 class="card-title">REKAPITULASI LAPORAN PERTANGGUNGJAWABAN (LPJ)</h4>
                            </div>
                        </div>
                        <div class="iq-card-body">
                            <div id="table" class="table-responsive">
                                <span class="table-add float-right mb-3 mr-2">
                                    <?php 
                                    foreach ($pedoman as $data){
                                        if ($data->jenis == "LPJ") { 
                                    ?>
                                    <button class="btn btn-info mb-3" title="Template LPJ 2022" type="submit"
                                        onclick="window.open('{{ asset('/pedoman/' . $data->file) }}')">
                                        <i class="las la-file-alt"></i>
                                        <span class="pl-1">Download Template LPJ</span>
                                        </i>
                                    </button>
                                    <?php }} ?>
                                </span>
                                <table id="datatable"
                                    class="table table-bordered table-responsive-md table-hover text-center">
                                    <thead>
                                        <tr class="bg-dark">
                                            <th>No</th>
                                            <th>Nama Unit/Prodi/Ormawa</th>
                                            <th>Nomor Memo Cair</th>
                                            <th>Judul Kegiatan</th>
                                            <th>Penanggungjawab</th>
                                            <th>Status</th>
                                            <th>Aksi</th>
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
                ajax: "{{ route('lpj.data') }}",
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
                        data: 'no_memo',
                        name: 'no_memo'
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

<script type="text/javascript">
    function pengajuan(id) {
        document.getElementById('revisilpj' + id).style.display = 'none';
    }

    function revisi(id) {
        document.getElementById('revisilpj' + id).style.display = 'block';
    }

    function verifikasi(id) {
        document.getElementById('revisilpj' + id).style.display = 'none';
    }

    function lpjselesai(id) {
        document.getElementById('revisilpj' + id).style.display = 'none';
    }
</script>
