@if(Auth::user()->role == 1)
@include('dashboards/users/layouts/script')

<body>
    <div id="app">
        <div class="main-wrapper">
            <div class="navbar-bg"></div>
            @include('dashboards/users/layouts/navbar')
            @include('dashboards/users/layouts/sidebar')

            <div id="content-page" class="content-page">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="iq-card">
                                <div class="iq-card-header d-flex justify-content-between">
                                    <div class="iq-header-title">
                                        <h4 class="card-title"></h4>
                                        <div class="card">
                                            <div class="card-header">
                                                <div class="card-header-action">
                                                    <!-- <a href="#" class="btn btn-danger">View More <i class="fas fa-chevron-right"></i></a> -->
                                                    <form method="POST" action="">
                                                        <form method="POST" action="">
                                                            <input type="hidden" name="id" value="" />
                                                            <div class="section-body">
                                                                <!-- <h2 class="section-title">add new or update</h2> -->
                                                                <div class="row">
                                                                    <div class="col-lg-12">
                                                                        <div class="card">
                                                                            <div class="card-header">
                                                                                <h4>permission -> {{$role->name}}</h4>
                                                                            </div>
                                                                            <div class="row row-cols-1 row-cols-md-3 g-4 ml-3 mr-3">
                                                                                @foreach($authorities as $manageName => $permissions)
                                                                                <div class="col">
                                                                                    <div class="card h-120">
                                                                                        <div class="card-body">
                                                                                            <h5 class="card-title"> {{$manageName}}</h5>
                                                                                            <p class="card-text">
                                                                                                @foreach($permissions as $p)
                                                                                            <div class="form-check">
                                                                                                <input id="{{$p}}" class="form-check-input" type="checkbox" value="{{$p}}" onclick="return false;" {{in_array($p,$rolePermissions) ? 'checked':null }} id="flexCheckChecked">
                                                                                                <label class="form-check-label" for="flexCheckChecked">
                                                                                                    {{trans("permissions.{$p}")}}
                                                                                                    <!-- {{$p}} -->
                                                                                                </label>
                                                                                            </div>
                                                                                            @endforeach
                                                                                            </p>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                @endforeach
                                                                            </div>

                                                                            <div class="card-footer text-right">
                                                                                <a href="" class="btn btn-icon icon-left btn-primary"><i class="fa fa-sync-alt"></i> Save</a>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </form>

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
    </div>
</body>
@include('dashboards/users/layouts/footer')
@endif