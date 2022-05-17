@include('dashboards/users/layouts/script')

<body>
    <div id="app">
        <div class="main-wrapper">
            @include('dashboards/users/layouts/navbar')
            @include('dashboards/users/layouts/sidebar')


            <div id="content-page" class="content-page">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="iq-card">
                                <div class="iq-card-header d-flex justify-content-between">
                                    <div class="iq-header-title">
                                        <h4 class="card-title">DATA USER
                                        </h4>
                                    </div>
                                    <div class="iq-card-header-toolbar d-flex align-items-center">
                                        <a href="{{url('/user/create')}}" class="btn btn-primary">Tambah User</a>
                                    </div>
                                </div>
                                <div class="iq-card-body">
                                    <div class="card-body">
                                        <div class="table-responsive table-invoice">
                                            <table class="table table-striped">
                                                <tr>
                                                    <th>No.</th>
                                                    <th>Nama</th>
                                                    <th>Email</th>
                                                    <th>Role</th>
                                                    <th>Unit</th>
                                                    <th>Status</th>
                                                    <th>Aksi</th>
                                                </tr>
                                                <?php $num = 1; ?>
                                                @foreach($user as $u)
                                                <tr>
                                                    <td><a href="#">{{$num}}</a></td>
                                                    <td class="font-weight-600">{{$u -> name}}</td>
                                                    <td class="font-weight-600">{{$u->email}}</td>
                                                    <?php for ($i = 0; $i < count($role); $i++) { ?>
                                                        <?php if ($u->role == $role[$i]->id) { ?>
                                                            <td class="font-weight-600">{{$role[$i]->name}}</td>
                                                        <?php } ?>
                                                    <?php } ?>

                                                    <td>
                                                        <?php for ($un = 0; $un < count($unit); $un++) {
                                                            if ($unit[$un]->id == $u->id_unit) { ?>
                                                                {{$unit[$un]->nama_unit}}
                                                        <?php }
                                                        } ?>
                                                    </td>
                                                    <td>
                                                        <div class="custom-control custom-switch custom-switch-text custom-switch-color custom-control-inline">
                                                            <div class="custom-switch-inner">
                                                                <!-- {{ Auth::user()->is_aktif }} -->
                                                                <!-- <p class="mb-0"> Success </p> -->
                                                                <?php if ($u->role == 1) { ?>
                                                                    <input data-id="{{$u->id}}" type="checkbox" class="custom-control-input bg-primary" data-on-label="On" id="customSwitch-22" checked="" disabled>
                                                                    <label class="custom-control-label" for="customSwitch-22" data-on-label="On" data-off-label="Off">
                                                                    </label>
                                                                <?php } ?>
                                                                <?php if ($u->role != 1) { ?>
                                                                    <input data-id="{{$u->id}}" type="checkbox" class="custom-control-input" data-on-label="On" data-off-label="Off" id="customSwitch-22{{$u -> id}}" {{ $u->is_aktif ? 'checked' : '' }}>
                                                                    <label class="custom-control-label" for="customSwitch-22{{$u -> id}}" data-on-label="On" data-off-label="Off">
                                                                    </label>
                                                                <?php } ?>
                                                                <!-- <input data-id="{{$u->id}}" class="toggle-class" type="checkbox" data-onstyle="success" data-offstyle="danger" data-toggle="toggle" data-on="Active" data-off="InActive" {{ $u->is_aktif ? 'checked' : '' }}> -->
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="row">
                                                            <div class="flex align-items-center list-user-action">
                                                                <a href="{{route('user.detail',['user'=>$u])}}" class="iq-bg-primary"><i class="fa fa-list"></i></a>
                                                                <?php if ($u->role != 1) { ?>
                                                                    <a href="{{route('user.update',['user'=>$u])}}" class="iq-bg-primary" data-toggle="tooltip" title="" data-original-title="Edit"><i class="ri-pencil-line"></i></a>
                                                                    <a href="{{route('user.delete',['user'=>$u])}}" class="iq-bg-primary" data-toggle="tooltip" title="" onclick="return confirm('Apakah anda yakin ingin hapus ?')"><i class="ri-delete-bin-line"></i></a>
                                                                <?php } ?>
                                                            </div>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <?php $num += 1; ?>
                                                @endforeach
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
    </div>

    </div>
    </section>
    </div>
    <footer class="main-footer">
        <div class="footer-left">
            <!-- Copyright &copy; 2018 <div class="bullet"></div> Design By <a href="https://nauval.in/">Muhamad Nauval Azhar</a> -->
        </div>
        <div class="footer-right">
            2.3.0
        </div>
    </footer>
    </div>
    </div>
    @include('dashboards/users/layouts/footer')
</body>
<script>
    $(function() {
        $('.custom-control-input').change(function() {
            var is_aktif = $(this).prop('checked') == true ? 1 : 0;
            var id = $(this).data('id');

            $.ajax({
                type: "GET",
                dataType: "json",
                url: '/user/isaktif',
                data: {
                    'is_aktif': is_aktif,
                    'id': id
                },
                success: function(data) {
                    console.log(data.success)
                }
            });
        })
    })
</script>

</html>