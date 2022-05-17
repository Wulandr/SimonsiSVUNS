<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Sistem Perencanaan Anggaran</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="{{asset('template/src/assets/vendors/iconfonts/mdi/css/materialdesignicons.min.css')}}">
    <link rel="stylesheet" href="{{asset('template/src/assets/vendors/iconfonts/ionicons/dist/css/ionicons.css')}}">
    <!-- <link rel="stylesheet" href="{{asset('template/src/assets/vendors/iconfonts/flag-icon-css/css/flag-icon.min.css')}}"> -->
    <link rel="stylesheet" href="{{asset('template/src/assets/vendors/css/vendor.bundle.base.css')}}">
    <link rel="stylesheet" href="{{asset('template/src/assets/vendors/css/vendor.bundle.addons.css')}}">
    <!-- endinject -->
    <!-- plugin css for this page -->
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <link rel="stylesheet" href="{{asset('template/src/assets/css/shared/style.css')}}">
    <!-- endinject -->
    <!-- Layout styles -->
    <link rel="stylesheet" href="{{asset('template/src/assets/css/demo_1/style.css')}}">
    <!-- End Layout styles -->
    <link rel="shortcut icon" href="{{asset('template/src/assets/images/favicon.ico')}}" />
</head>

<body>
    <div class="container-scroller">
        <!-- partial:partials/_navbar.html -->
        <nav class="navbar default-layout col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
            <div class="text-center navbar-brand-wrapper d-flex align-items-top justify-content-center">
                <a class="navbar-brand brand-logo" href="index.html">
                    <img src="{{asset('template/src/assets/images/logo.svg')}}" alt="logo" /> </a>
                <a class="navbar-brand brand-logo-mini" href="index.html">
                    <img src="{{asset('template/src/assets/images/logo-mini.svg')}}" alt="logo" /> </a>
            </div>
            <div class="navbar-menu-wrapper d-flex align-items-center">
                <ul class="navbar-nav">
                </ul>
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item dropdown">
                        <a class="nav-link count-indicator" id="messageDropdown" href="#" data-toggle="dropdown" aria-expanded="false">
                            <i class="mdi mdi-bell-outline"></i>
                            <span class="count">7</span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list pb-0" aria-labelledby="messageDropdown">
                            <a class="dropdown-item preview-item">
                                <div class="preview-thumbnail">
                                    <img src="{{asset('template/src/assets/images/faces/face12.jpg')}}" alt="image" class="img-sm profile-pic">
                                </div>
                                <div class="preview-item-content flex-grow py-2">
                                    <p class="preview-subject ellipsis font-weight-medium text-dark">David Grey </p>
                                    <p class="font-weight-light small-text"> The meeting is cancelled </p>
                                </div>
                            </a>
                            <a class="dropdown-item preview-item">
                                <div class="preview-thumbnail">
                                    <img src="{{asset('template/src/assets/images/faces/face1.jpg')}}" alt="image" class="img-sm profile-pic">
                                </div>
                                <div class="preview-item-content flex-grow py-2">
                                    <p class="preview-subject ellipsis font-weight-medium text-dark">Travis Jenkins </p>
                                    <p class="font-weight-light small-text"> The meeting is cancelled </p>
                                </div>
                            </a>
                        </div>
                    </li>

                    <li class="nav-item dropdown d-none d-xl-inline-block user-dropdown">
                        <a class="nav-link dropdown-toggle" id="UserDropdown" href="#" data-toggle="dropdown" aria-expanded="false">
                            <img class="img-xs rounded-circle" src="{{asset('template/src/assets/images/faces/face8.jpg')}}" alt="Profile image"> </a>
                        <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="UserDropdown">
                            <div class="dropdown-header text-center">
                                <img class="img-md rounded-circle" src="{{asset('template/src/assets/images/faces/face8.jpg')}}" alt="Profile image">
                                <p class="mb-1 mt-3 font-weight-semibold">{{Auth()->user()->name}}</p>
                                <p class="font-weight-light text-muted mb-0">{{Auth()->user()->email}}</p>
                            </div>
                            <a class="dropdown-item">Profil <span class="badge badge-pill badge-danger">1</span><i class="dropdown-item-icon ti-dashboard"></i></a>
                            <!-- <a class="dropdown-item">Log Out<i class="dropdown-item-icon ti-power-off"></i></a> -->
                            <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </div>
                    </li>
                </ul>
                <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
                    <span class="mdi mdi-menu"></span>
                </button>
            </div>
        </nav>