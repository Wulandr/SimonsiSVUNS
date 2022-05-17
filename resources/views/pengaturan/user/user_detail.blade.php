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
                                        <h4 class="card-title">DETAIL USER</h4>
                                        <div class="card">
                                            <div class="card-header">
                                                <h4>Nama : {{$user->name}} <br /> Role : {{$role->name}}</h4> <br />
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
                                                                <input id="{{$p}}" class="form-check-input" type="checkbox" value="{{$p}}" onclick="return false;" {{in_array($p,$permissionChecked) ? 'checked':null }} id="flexCheckChecked">
                                                                <label class="form-check-label" for="flexCheckChecked">
                                                                    {{trans("permissions.{$p}")}}
                                                                </label>
                                                            </div>
                                                            @endforeach
                                                            </p>
                                                        </div>
                                                    </div>
                                                </div>
                                                @endforeach
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