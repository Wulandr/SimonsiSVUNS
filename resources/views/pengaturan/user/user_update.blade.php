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
                    <h4 class="card-title">UPDATE USER</h4><!-- <a href="#" class="btn btn-danger">View More <i class="fas fa-chevron-right"></i></a> -->
                    <div class="card">
                      <div class="card-body">
                        <form class="form-horizontal" method="post" action="{{ route('user.processUpdate',['user'=>$user]) }}">
                          @csrf
                          <div class="form-group">
                            <label>Nama User</label>
                            <input name="name" id="name" value="{{old('name',$user->name)}}" type=" text" class="form-control">
                          </div>
                          <div class="form-group">
                            <label>Email</label>
                            <input name="email" id="email" value="{{old('email',$user->email)}}" type="text" class="form-control">
                          </div>
                          <div class="form-group">
                            <!-- <label>Password</label> -->
                            <input name="password" id="password" value="{{$user->password}}" type="hidden" class="form-control">
                          </div>
                          <div class="form-group">
                            <label>Role</label>
                            <select name="role" id="role" class="form-control">
                              <!-- @if(old('role',$roleSelected))
                          <option value="{{old('role',$roleSelected->id)}}" selected>{{old('role',$roleSelected->name)}} </option>
                          @endif -->
                              @foreach($role as $role)
                              <option value="{{$role->id}}" {{$role->id == $user->role ? 'selected' : ''}}>{{$role->name}} </option>
                              @endforeach
                            </select>
                          </div>
                          <div class="form-group">
                            <label>Unit</label>
                            <select name="id_unit" id="id_unit" class="form-control">
                              @foreach($unit as $unit)
                              <option value="{{$unit->id}}" {{$unit->id == $user->id_unit ? 'selected' : ''}}>{{$unit->nama_unit}}</option>
                              @endforeach
                            </select>
                          </div>
                          <?php $i = 0 ?>
                          <input name="created_at" id="created_at" type="hidden" value="<?= date('Y-m-d') ?>">
                          <input name="updated_at" id="updated_at" type="hidden" value="<?= date('Y-m-d') ?>">
                          <button class="btn btn-primary mr-1" type="submit">Submit</button>
                        </form>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
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
    </div>

</body>
@include('dashboards/users/layouts/footer')

</html>