<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title>Login &mdash; SIMONSI</title>

    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>FinDash - Responsive Bootstrap 4 Admin Dashboard Template</title>
    <!-- Favicon -->
    <link rel="shortcut icon" href="{{ asset('findash/assets/images/favicon.ico') }}" />
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ asset('findash/assets/css/bootstrap.min.css') }}">
    <!-- Typography CSS -->
    <link rel="stylesheet" href="{{ asset('findash/assets/css/typography.css') }}">
    <!-- Style CSS -->
    <link rel="stylesheet" href="{{ asset('findash/assets/css/style.css') }}">
    <!-- Responsive CSS -->
    <link rel="stylesheet" href="{{ asset('findash/assets/css/responsive.css') }}">
</head>

<body>
    <!-- Sign in Start -->
    <section class="sign-in-page">
        <div id="container-inside">
            <div class="cube"></div>
            <div class="cube"></div>
            <div class="cube"></div>
            <div class="cube"></div>
            <div class="cube"></div>
        </div>
        <div class="container p-0">
            <div class="row no-gutters height-self-center">
                <div class="col-sm-12 align-self-center bg-primary rounded">
                    <div class="row m-0">
                        <div class="col-md-5 bg-white sign-in-page-data">
                            <div class="sign-in-from">
                                <br />
                                <br />
                                <h1 class="mb-0 text-center">Login</h1>
                                <p class="text-center text-dark">Enter your email address and password to access admin panel.</p>

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
                                <form method="POST" class="needs-validation" action="{{ route('login') }}">
                                    @csrf
                                    <div class="form-group">
                                        <label for="email">{{ __('E-Mail') }}</label>
                                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                                        @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <div class="d-block">
                                            <label for="password" class="control-label">{{ __('Password') }}</label>
                                            <div class="float-right">
                                                @if (Route::has('password.request'))
                                                <!-- <a class="btn btn-link" href="{{ route('password.request') }}">
                                                {{ __('Forgot Your Password?') }}
                                            </a> -->
                                                @endif
                                            </div>
                                        </div>
                                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                                        @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>

                                    <!-- <div class="d-inline-block w-100">
                                        <div class="custom-control custom-checkbox d-inline-block mt-2 pt-1">
                                            <input type="checkbox" class="custom-control-input" id="remember" {{ old('remember') ? 'checked' : '' }}>
                                            <label class="custom-control-label" for="remember">{{ __('Remember Me') }}</label>
                                        </div>
                                    </div> -->
                                    <div class="sign-info text-center">
                                        <button type="submit" class="btn btn-primary d-block w-100 mb-2">{{ __('Login') }}</button>
                                    </div>
                                </form>

                            </div>
                        </div>
                        <div class="col-md-7 text-center sign-in-page-image">
                            <div class="sign-in-detail text-white">
                                <a class="sign-in-logo mb-5" href="#"><img src="{{asset('findash/assets/images/logo-full.png')}}" class="img-fluid" alt="logo"></a>
                                <div class="owl-carousel" data-autoplay="true" data-loop="true" data-nav="false" data-dots="true" data-items="1" data-items-laptop="1" data-items-tab="1" data-items-mobile="1" data-items-mobile-sm="1" data-margin="0">
                                    <div class="item">
                                        <img src="{{asset('findash/assets/images/login/1.png')}}" class="img-fluid mb-4" alt="logo">
                                        <h4 class="mb-1 text-white">Find new friends</h4>
                                        <p>It is a long established fact that a reader will be distracted by the readable content.</p>
                                    </div>
                                    <div class="item">
                                        <img src="{{asset('findash/assets/images/login/1.png')}}" class="img-fluid mb-4" alt="logo">
                                        <h4 class="mb-1 text-white">Connect with the world</h4>
                                        <p>It is a long established fact that a reader will be distracted by the readable content.</p>
                                    </div>
                                    <div class="item">
                                        <img src="{{asset('findash/assets/images/login/1.png')}}" class="img-fluid mb-4" alt="logo">
                                        <h4 class="mb-1 text-white">Create new events</h4>
                                        <p>It is a long established fact that a reader will be distracted by the readable content.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Sign in END -->

</body>
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
<!-- lottie JavaScript -->
<script src="{{ asset('findash/assets/js/lottie.js')}}"></script>
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
<!-- Style Customizer -->
<script src="{{ asset('findash/assets/js/style-customizer.js')}}"></script>
<!-- Chart Custom JavaScript -->
<script src="{{ asset('findash/assets/js/chart-custom.js')}}"></script>
<!-- Custom JavaScript -->
<script src="{{ asset('findash/assets/js/custom.js')}}"></script>
</body>

</html>