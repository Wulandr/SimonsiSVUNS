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
                        <div class="iq-card-header d-flex justify-content-center table-warning">
                            <div class="iq-header-title">
                                <h4 class="card-title">REKAPITULASI MEMO CAIR</h4>
                            </div>
                        </div>
                        <div class="iq-card-body">
                            <div class="table-editable">
                                <table id="datatable" class="table table-bordered table-responsive-md table-hover">
                                    <thead class="text-center">
                                        <tr class="bg-warning">
                                            <th style="width: 3%">No</th>
                                            <th style="width: 32%">Judul Kegiatan</th>
                                            <th style="width: 25%">Program Studi</th>
                                            <th style="width: 15%">Triwulan</th>
                                            <th style="width: 10%">Status</th>
                                            <th style="width: 10%">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        {{-- @for ($m = 0; $m < count($tor); $m++) --}}
                                        <!-- MODAL - Detail Memo Cair -->
                                        {{-- @include('keuangan/memo_cair/detail_memocair') --}}
                                        <!-- MODAL - Edit Memo Cair -->
                                        {{-- @include('keuangan/memo_cair/edit_memocair') --}}
                                        <!-- MODAL - Upload Memo Cair -->
                                        {{-- @include('keuangan/memo_cair/upload_memocair') --}}
                                        {{-- @endfor --}}
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
                ajax: "{{ route('memo_cair.data') }}",
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
                        data: 'tw',
                        name: 'tw'
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
