<?php

use Illuminate\Support\Facades\Auth;
?>
@include('dashboards/users/layouts/script')

<body>
    <div id="loading">
        <div id="loading-center">
        </div>
    </div>
    <div class="wrapper">
        @include('dashboards/users/layouts/navbar')
        @include('dashboards/users/layouts/sidebar')


        <!-- Page Content  -->
        <div id="content-page" class="content-page">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="iq-card">
                            <div class="iq-card-body p-0">
                                <div class="iq-edit-list">
                                    <ul class="iq-edit-profile d-flex nav nav-pills">
                                        <li class="col-md-4 p-0">
                                            <a class="nav-link active" data-toggle="pill" href="#personal-information">
                                                Personal Information
                                            </a>
                                        </li>
                                        <li class="col-md-4 p-0">
                                            <a class="nav-link" data-toggle="pill" href="#chang-pwd">
                                                Change Information
                                            </a>
                                        </li>
                                        <li class="col-md-4 p-0">
                                            <a class="nav-link" data-toggle="pill" href="#chang-ps">
                                                Change Password
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="iq-edit-list-data">
                            <div class="tab-content">
                                <div class="tab-pane fade active show" id="personal-information" role="tabpanel">
                                    <div class="iq-card">
                                        <div class="iq-card-header d-flex justify-content-between">
                                            <div class="iq-header-title">
                                                <h4 class="card-title">Personal Information</h4>
                                            </div>
                                        </div>
                                        <div class="iq-card-body">
                                            <div class="form-group row align-items-center">
                                                <div class="col-md-12">
                                                    <div class="profile-img-edit">
                                                        <img class="profile-pic" src="images/user/11.png" alt="profile-pic">
                                                        <div class="p-image">
                                                            <i class="ri-pencil-line upload-button"></i>
                                                            <input class="file-upload" type="file" accept="image/*" />
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class=" row align-items-center">
                                                <div class="form-group col-sm-6">
                                                    <label for="fname">Nama: {{Auth::user()->name}}</label>
                                                </div>
                                                <div class="form-group col-sm-6">
                                                    <label for="uname">Unit :
                                                        <?php for ($r = 0; $r < count($unit); $r++) {
                                                            if ($unit[$r]->id == Auth::user()->id_unit) { ?>
                                                                {{$unit[$r]->nama_unit}}
                                                        <?php }
                                                        } ?>
                                                    </label>
                                                </div>
                                                <div class="form-group col-sm-6">
                                                    <label for="cname">NIP/NIK/NIM : {{Auth::user()->nik}}</label>
                                                </div>
                                                <div class="form-group col-sm-6">
                                                    <label for="cname">Email : {{Auth::user()->email}}</label>
                                                </div>
                                                <div class="form-group col-sm-6">
                                                    <label for="cname">Role :
                                                        <?php for ($r = 0; $r < count($role); $r++) {
                                                            if ($role[$r]->id == Auth::user()->role) { ?>
                                                                {{$role[$r]->name}}
                                                        <?php }
                                                        } ?>
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>

                                <div class="tab-pane fade" id="chang-pwd" role="tabpanel">
                                    <div class="iq-card">
                                        <div class="iq-card-header d-flex justify-content-between">
                                            <div class="iq-header-title">
                                                <h4 class="card-title">Change Information</h4>
                                            </div>
                                        </div>
                                        <div class="iq-card-body">
                                            <form class="form-horizontal" method="post" action="{{ route('profil.update',['id'=>Auth::user()->id]) }}">
                                                @csrf
                                                <div class="form-group row align-items-center">
                                                    <div class="col-md-12">
                                                        <div class="profile-img-edit">
                                                            <img class="profile-pic" src="images/user/11.png" alt="profile-pic">
                                                            <div class="p-image">
                                                                <i class="ri-pencil-line upload-button"></i>
                                                                <input class="file-upload" type="file" accept="image/*" />
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class=" row align-items-center">
                                                    <div class="form-group col-sm-6">
                                                        <label for="fname">Nama:</label>
                                                        <input type="text" class="form-control" id="name" name="name" value="{{old('name',Auth::user()->name)}}">
                                                    </div>
                                                    <!-- <div class="form-group col-sm-6">
                                                        <label for="fname">Password:</label>
                                                        <input type="password" class="form-control" id="password" name="password" value="{{old('password')}}">
                                                    </div> -->
                                                    <div class="form-group col-sm-6">
                                                        <label for="fname">NIP/NIK/NIM:</label>
                                                        <input type="text" class="form-control" id="nip" name="nip" value="{{old('nip',Auth::user()->nip)}}">{{Auth::user()->nip}}
                                                    </div>
                                                    <div class="form-group col-sm-6">
                                                        <label for="cname">Email:</label>
                                                        <input type="text" class="form-control" id="email" name="email" value="{{old('email',Auth::user()->email)}}">
                                                    </div>
                                                    <input type="hidden" id="id" value="{{Auth::user()->id}}">
                                                </div>
                                                <button type="submit" class="btn btn-primary mr-2">Submit</button>
                                                <button type="reset" class="btn iq-bg-danger">Cancel</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>


                                <div class="tab-pane fade" id="chang-ps" role="tabpanel">
                                    <div class="iq-card">
                                        <div class="iq-card-header d-flex justify-content-between">
                                            <div class="iq-header-title">
                                                <h4 class="card-title">Change Password</h4>
                                            </div>
                                        </div>
                                        @if (session('error'))
                                        <div class="alert alert-danger">
                                            {{ session('error') }}
                                        </div>
                                        @endif
                                        @if (session('success'))
                                        <div class="alert alert-success">
                                            {{ session('success') }}
                                        </div>
                                        @endif
                                        @if($errors)
                                        @foreach ($errors->all() as $error)
                                        <div class="alert alert-danger">{{ $error }}</div>
                                        @endforeach
                                        @endif
                                        <div class="iq-card-body">
                                            <form class="form-horizontal" method="post" action="{{ route('profil.changepassword',['id'=>Auth::user()->id]) }}">
                                                @csrf
                                                <!-- <div class="row">
                                                    <div class="form-group col-sm-4">
                                                        <label for="fname">Current Password :</label>
                                                        <input id="current_password" type="password" class="form-control" style="border: 1px solid #aba4a4" name="current_password" required autocomplete="new-password">
                                                    </div>
                                                </div> -->
                                                <div class="row">
                                                    <div class="form-group col-sm-4">
                                                        <label for="fname">Password :</label>
                                                        <input type="password" class="form-control" style="border: 1px solid #aba4a4" id="password" name="password" value="{{old('password')}}">

                                                        @error('password')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <!-- <div class="row">
                                                    <div class="form-group col-sm-4">
                                                        <label for="fname">Confirm Password :</label>
                                                        <input id="password-confirm" type="password" class="form-control" style="border: 1px solid #aba4a4" name="password_confirmation" required autocomplete="new-password">
                                                    </div>
                                                </div> -->
                                                <input type="hidden" id="id" value="{{Auth::user()->id}}">
                                                <button type="submit" class="btn btn-primary mr-2">Submit</button>
                                                <button type="reset" class="btn iq-bg-danger">Cancel</button>
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
        <!-- Wrapper END -->
        <!-- Footer -->
        <footer class="iq-footer">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-6">
                        <ul class="list-inline mb-0">
                            <li class="list-inline-item"><a href="privacy-policy.html">Privacy Policy</a></li>
                            <li class="list-inline-item"><a href="terms-of-service.html">Terms of Use</a></li>
                        </ul>
                    </div>
                    <div class="col-lg-6 text-right">
                        Copyright 2020 <a href="#">FinDash</a> All Rights Reserved.
                    </div>
                </div>
            </div>
        </footer>
        <!-- Footer END -->

        <!-- Optional JavaScript -->
        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
        <script src="{{ asset('findash/assets/js/jquery.min.js')}}"></script>
        <script src="{{ asset('findash/assets/js/popper.min.js')}}"></script>
        <script src="{{ asset('findash/assets/js/bootstrap.min.js')}}"></script>
        <!-- Appear JavaScript -->
        <script src="{{ asset('findash/assets/js/jquery.appear.js')}}"></script>
        <!-- Countdown JavaScript -->
        <script src="{{ asset('findash/assets/js/countdown.min.js')}}"></script>
        <!-- Counterup JavaScript -->
        <script src="{{ asset('findash/assets/js/waypoints.min.js')}}"></script>
        <script src="{{ asset('findash/assets/js/jquery.counterup.min.js')}}"></script>
        <!-- Wow JavaScript -->
        <script src="{{ asset('findash/assets/js/wow.min.js')}}"></script>
        <!-- Apexcharts JavaScript -->
        <script src="{{ asset('findash/assets/js/apexcharts.js')}}"></script>
        <!-- Slick JavaScript -->
        <script src="{{ asset('findash/assets/js/slick.min.js')}}"></script>
        <!-- Select2 JavaScript -->
        <script src="{{ asset('findash/assets/js/select2.min.js')}}"></script>
        <!-- Owl Carousel JavaScript -->
        <script src="{{ asset('findash/assets/js/owl.carousel.min.js')}}"></script>
        <!-- Magnific Popup JavaScript -->
        <script src="{{ asset('findash/assets/js/jquery.magnific-popup.min.js')}}"></script>
        <!-- Smooth Scrollbar JavaScript -->
        <script src="{{ asset('findash/assets/js/smooth-scrollbar.js')}}"></script>
        <!-- lottie JavaScript -->
        <script src="{{ asset('findash/assets/js/lottie.js')}}"></script>
        <!-- Style Customizer -->
        <script src="{{ asset('findash/assets/js/style-customizer.js')}}"></script>
        <!-- Chart Custom JavaScript -->
        <script src="{{ asset('findash/assets/js/chart-custom.js')}}"></script>
        <!-- Custom JavaScript -->
        <script src="{{ asset('findash/assets/js/custom.js')}}"></script>
</body>

</html>