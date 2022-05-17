@include('dashboards/users/layouts/script')


@section('title')
{{ trans('roles.title.index') }}
@endsection

<body>
    <div id="loading">
        <div id="loading-center">
        </div>
    </div>
    <div class="wrapper">
        @include('dashboards/users/layouts/navbar')
        @include('dashboards/users/layouts/sidebar')

        <div id="content-page" class="content-page">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="iq-card">
                            <div class="iq-header-title ">
                                <div class="iq-card-header d-flex justify-content-between">
                                    <h4 class="card-title">DATA ROLE
                                    </h4>
                                    <div class="iq-card-header-toolbar d-flex align-items-center">
                                        <a href="{{url('/roles_create')}}" class="btn btn-primary">Tambah Role</a>
                                    </div>
                                </div>
                            </div>
                            <div class="iq-card-body">
                                <div class="card-body">
                                    <table class="table table-striped">
                                        <tr>
                                            <th>No.</th>
                                            <th>Role</th>
                                            <th colspan="3">Aksi</th>
                                        </tr>
                                        <?php $num = 1; ?>
                                        @foreach($roles as $role)
                                        <tr>
                                            <td><a href="#">{{$num}}</a></td>
                                            <td><a href="#">{{$role->name}}</a></td>

                                            <td width="2">
                                                <a href="<?= route('roles.show', ['role' => $role]) ?>" class="btn btn-primary">Detail</a>
                                            </td>
                                            <td width="2">
                                                <a href="<?= route('roles.edit', ['role' => $role]) ?>" class="btn btn-primary btn-action mr-1" data-toggle="tooltip" title="" data-original-title="Edit"><i class="fa fa-edit"></i></a>
                                            </td>
                                            <td width="2">
                                                <form action="{{route('roles.destroy',['role' => $role])}}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-action trigger--fire-modal-1" data-toggle="tooltip" title="" onclick="return confirm('Apakah anda yakin ingin hapus ?')"><i class="fa fa-trash"></i></button>
                                                </form>
                                            </td>
                                        </tr>
                                        <?php $num += 1; ?>
                                        @endforeach

                                    </table>
                                    <!-- </div> -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="main-content">
            <section class="section">
                <div class="row">
                    <br />
                    <br />
                    <br />
                </div>
                <div class="row">
                    <div class="col-md-12">

                    </div>
                    <!-- <div class="col-md-4">
            </div> -->
                </div>
            </section>
        </div>

        <footer class="main-footer">
            <div class="footer-left">
                <!-- Copyright &copy; 2018 <div class="bullet"></div> Design By <a href="https://nauval.in/">Muhamad Nauval Azhar</a> -->
            </div>
            <div class="footer-right">
                <!-- 2.3.0 -->
            </div>
        </footer>
    </div>

    @include('dashboards/users/layouts/footer')
</body>

</html>