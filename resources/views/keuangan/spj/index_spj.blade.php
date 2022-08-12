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
                        <div class="iq-card-header d-flex justify-content-center table-danger">
                            <div class="iq-header-title">
                                <h4 class="card-title">REKAPITULASI SURAT PERTANGGUNGJAWABAN (SPJ)</h4>
                            </div>
                        </div>
                        <div class="iq-card-body">
                            <div id="table" class="table-editable">
                                <span class="table-add float-right mb-3 mr-2">
                                    <button class="btn btn-info mb-3" title="Input SPJ Baru" data-toggle="modal"
                                        data-target="#spj_file">
                                        <i class="las la-file-alt"></i><span class="pl-1">SPJ File
                                        </span></i>
                                    </button>
                                </span>
                                <table id="datatable"
                                    class="table table-bordered table-responsive-md table-hover text-center">
                                    <thead class="bg-danger">
                                        <tr>
                                            <th style="vertical-align : middle;text-align:center;">No
                                            </th>
                                            <th style="vertical-align : middle;text-align:center;">
                                                Nama Unit/Prodi/Ormawa</th>
                                            <th style="vertical-align : middle;text-align:center;">
                                                Nomor Memo Cair</th>
                                            <th style="vertical-align : middle;text-align:center;">
                                                Judul Kegiatan</th>
                                            <th style="vertical-align : middle;text-align:center;">
                                                Penanggungjawab</th>
                                            <th style="vertical-align : middle;text-align:center;">Status</th>
                                            <th style="vertical-align : middle;text-align:center;">Aksi</th>
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
    <!-- MODAL - SPJ FILE -->
    @include('keuangan/spj/spj_file')

    <script src="https://cdn.datatables.net/1.12.0/js/jquery.dataTables.js"></script>
    <script>
        $(document).ready(function() {
            $.noConflict();
            $('#datatable').DataTable({
                processing: true,
                serverSide: true,
                search: false,
                pageLength: 5,
                ajax: "{{ route('spj.data') }}",
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
    // Memunculkan Button Update Status sesuai Status yang dimiliki
    function pengajuan(id) {
        document.getElementById('revisispj' + id).style.display = 'none';
    }

    function revisi(id) {
        document.getElementById('revisispj' + id).style.display = 'block';
    }

    function verifikasi(id) {
        document.getElementById('revisispj' + id).style.display = 'none';
    }

    function spjselesai(id) {
        document.getElementById('revisispj' + id).style.display = 'none';
    }

    // Memunculkan input tambah file tf untuk pelunasan spj
    function belumselesai(id) {
        document.getElementById('input_tf' + id).style.display = 'block';
    }

    function selesai(id) {
        document.getElementById('input_tf' + id).style.display = 'none';
    }
</script>
