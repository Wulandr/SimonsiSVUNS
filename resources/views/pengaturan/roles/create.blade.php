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
                                        <!-- <h4 class="card-title">DATA TOR</h4> -->
                                        <div class="card">
                                            <div class="card-header">
                                                <!-- <h4>ROLES</h4> -->
                                                <!-- <button><a href="{{url('/roles_create')}}">Tambah Role</a></button> -->
                                                <div class="card-header-action">
                                                    <!-- <a href="#" class="btn btn-danger">View More <i class="fas fa-chevron-right"></i></a> -->
                                                    <form method="POST" action="{{url('/roles_store')}}">
                                                        @csrf
                                                        <div class="card">
                                                            <div class="card-header">
                                                                <h4>Tambah Role</h4>
                                                            </div>
                                                            <div class="row row-cols-1 row-cols-md-3 g-4 ml-3 mr-3">
                                                                <div class="row ml-3">
                                                                    <div class="form-group">
                                                                        <label for="name">Nama Aktor</label>
                                                                        <input type="text" id="name" name="name" value="{{old('name')}}" class="form-control @error('name') is-invalid @enderror" />
                                                                        @error('name')
                                                                        <span>
                                                                            <strong>{{$message}}</strong>
                                                                        </span>
                                                                        @enderror
                                                                    </div>
                                                                </div>
                                                                @foreach($authorities as $manageName => $permissions)
                                                                <div class="col ml-3">
                                                                    <div class="card h-120">
                                                                        <div class="card-body">
                                                                            <h5 class="card-title"> {{$manageName}}</h5>
                                                                            <p class="card-text">
                                                                                @foreach($permissions as $p)
                                                                            <div class="form-check">
                                                                                @if(old('permissions'))
                                                                                <input id="{{$p}}" name="permissions[]" class="form-check-input" type="checkbox" value="{{$p}}" {{in_array($p,old('permissions')) ? "checked" : null}}>
                                                                                @else
                                                                                <input id="{{$p}}" name="permissions[]" class="form-check-input" type="checkbox" value="{{$p}}">
                                                                                @endif
                                                                                <label class="form-check-label" for="{{$p}}">
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
                                                                <button class="btn btn-primary mr-1" type="submit">Submit</button>
                                                                <!-- <a href="" class="btn btn-icon icon-left btn-primary"><i class="fa fa-sync-alt"></i> Save</a> -->
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


            </section>
        </div>
    </div>
    </div>
</body>
@include('dashboards/users/layouts/footer')
@endif