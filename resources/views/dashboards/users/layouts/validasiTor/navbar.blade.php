<?php

use Illuminate\Support\Facades\Auth;
?>
<div class="iq-top-navbar">
    <div class="iq-navbar-custom">
        <nav class="navbar navbar-expand-lg navbar-light p-0">
            <div class="iq-menu-bt d-flex align-items-center">
                <div class="wrapper-menu">
                    <div class="main-circle"><i class="ri-menu-line"></i></div>
                    <div class="hover-circle"><i class="ri-close-fill"></i></div>
                </div>
                <div class="iq-navbar-logo d-flex justify-content-between ml-3">
                    <a href="{{ route('home') }}" class="header-logo">
                        <img src="{{ asset('findash/assets/images/logo.png') }}" class="img-fluid rounded" alt="">
                    </a>
                </div>
            </div>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-label="Toggle navigation">
                <i class="ri-menu-3-line"></i>
            </button>
            <div class="navbar-collapse collapse show" id="navbarSupportedContent" style="">
                <ul class="navbar-nav ml-auto navbar-list">
                    <li class="nav-item nav-icon">
                        <a href="#" class="">


                        </a>
                        <div class="iq-sub-dropdown">
                            <div class="iq-card shadow-none m-0">
                                <div class="iq-card-body p-0 ">
                                    <div class="bg-primary p-3">
                                        <h5 class="mb-0 text-white">Pengajuan TOR<small class="badge  badge-light float-right pt-1">..</small></h5>
                                    </div>
                                    <a href="/validasi/ajuan/$unit[$u1]->id" class="iq-sub-card">
                                        <div class="media align-items-center">
                                            <div class="">
                                            </div>
                                            <div class="media-body ml-3">
                                                <!-- <h6 class="mb-0 "> KAK1</h6> -->
                                                <small class="float-right font-size-12"></small>
                                                <p class="mb-0"></p>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
            <?php
            $jumlahpengajuan = 0;
            if (!empty($notifikasi)) {  ?>
                <?php if ($notifikasi == 1) {  ?>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav ml-auto navbar-list">
                            <li class="nav-item nav-icon">
                                <a href="#" class="search-toggle iq-waves-effect bg-primary rounded">
                                    <i class="ri-notification-line"></i>
                                    <span class="bg-danger dots"></span>
                                </a>
                                <div class="iq-sub-dropdown">
                                    <div class="iq-card shadow-none m-0">
                                        <div class="iq-card-body p-0 ">
                                            <div class="bg-primary p-3">
                                                <h5 class="mb-0 text-white">Notifikasi Pengajuan Kegiatan<small class="badge  badge-light float-right pt-1">..</small></h5>
                                            </div>
                                            <?php
                                            $idtor = 0;
                                            $simpanTor = [
                                                $idtor => []
                                            ];
                                            $i = 0;
                                            $simpanId = [];
                                            $length = 0;
                                            foreach ($trx_status_tor as $tstor) {
                                                foreach ($status as $sts) {
                                                    if ($sts->nama_status == "Proses Pengajuan") {
                                                        $simpanId[$i] = $tstor->id_tor;
                                            ?>

                                            <?php
                                                        $i += 1;
                                                    }
                                                }
                                            }
                                            ?>
                                            <?php
                                            $clear_array = array_unique($simpanId);
                                            ?>
                                            <?php
                                            $trxStatusTor = [];
                                            $i2 = 0;
                                            foreach ($clear_array as $s1) {
                                                // echo "Trx status tor ";
                                                foreach ($trx_status_tor as $tstor2) {
                                                    if ($s1 == $tstor2->id_tor) {
                                                        $trxStatusTor[$i2] = $tstor2->id;
                                                        // echo  $trxStatusTor[$i2] . " ";
                                                        $i2 += 1;
                                                    }
                                                }
                                                foreach ($tor as $tor2) {
                                                    if ($s1 == $tor2->id) {
                                            ?>

                                                        <?php
                                                        $namastat = "";
                                                        foreach ($trx_status_tor as $tstor3) {
                                                            if ($trxStatusTor[$i2 - 1] == $tstor3->id) {
                                                                foreach ($user as $u) {
                                                                    foreach ($role as $r) {
                                                                        if ($u->role == $r->id) {
                                                                            if ($u->id == $tstor3->create_by) {
                                                                                foreach ($status as $sts3) {
                                                                                    if ($tstor3->id_status == $sts3->id) {
                                                                                        $namastat = $sts3->nama_status . " " . $r->name;
                                                                                        if ($namastat != "Validasi WD 1") {
                                                        ?>
                                                                                            <a href="#" class="iq-sub-card">
                                                                                                <div class="media align-items-center">
                                                                                                    <!-- <div class="">
                                                                    <img class="avatar-40 rounded" src="images/user/01.jpg" alt="">
                                                                </div> -->
                                                                                                    <div class="media-body ml-3">
                                                                                                        <h6 class="mb-0 ">{{$s1." - ".$tor2->nama_kegiatan." ".$sts3->nama_status." ".$r->name}}</h6>
                                                                                                        <small class="float-right font-size-12">{{$tstor3->created_at}}</small>
                                                                                                        <p class="mb-0">
                                                                                                        </p>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </a>
                                                        <?php
                                                                                        }
                                                                                    }
                                                                                }
                                                                            }
                                                                        }
                                                                    }
                                                                }
                                                            }
                                                        } ?>

                                            <?php
                                                    }
                                                }
                                            }
                                            ?>
                                        </div>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                <?php  } ?>
            <?php  } ?>
            <ul class="navbar-nav ml-auto navbar-list">
                <li class="line-height">
                    <a href="#" class="search-toggle iq-waves-effect d-flex align-items-center">
                        <img src="{{ asset('findash/assets/images/user/1.jpg') }}" class="img-fluid rounded mr-3" alt="user">
                        <div class="caption">
                            <?php if (!empty(Auth::user()->name)) { ?>
                                <h6 class="mb-0 line-height"><?= Auth::user()->name ?></h6>
                            <?php } ?>
                            <p class="mb-0 text">
                                <?= !empty(Auth::user()->getroleNames()) ? Auth::user()->getroleNames() : '' ?> <br />
                                <?php
                                if (!empty($unit)) {
                                    for ($u = 0; $u < count($unit); $u++) {
                                        if ($unit[$u]->id == Auth::user()->id_unit) {
                                            echo $unit[$u]->nama_unit;
                                        }
                                    }
                                }
                                ?>
                            </p>
                        </div>
                    </a>
                    <div class="iq-sub-dropdown iq-user-dropdown">
                        <div class="iq-card shadow-none m-0">
                            <div class="iq-card-body p-0 ">
                                <div class="bg-primary p-3">
                                    <h5 class="mb-0 text-white line-height">Hello <?= Auth::user()->name ?></h5>
                                    <span class="text-white font-size-12">Available</span>
                                </div>
                                <a href="{{ url('/profil') }}" class="iq-sub-card iq-bg-primary-hover">
                                    <div class="media align-items-center">
                                        <div class="rounded iq-card-icon iq-bg-primary">
                                            <i class="ri-file-user-line"></i>
                                        </div>
                                        <div class="media-body ml-3">
                                            <h6 class="mb-0 ">My Profile</h6>
                                            <p class="mb-0 font-size-12">View personal profile details.</p>
                                        </div>
                                    </div>
                                </a>
                                <a href="profile-edit.html" class="iq-sub-card iq-bg-primary-hover">
                                    <div class="media align-items-center">
                                        <div class="rounded iq-card-icon iq-bg-primary">
                                            <i class="ri-profile-line"></i>
                                        </div>
                                        <div class="media-body ml-3">
                                            <h6 class="mb-0 ">Edit Profile</h6>
                                            <p class="mb-0 font-size-12">Modify your personal details.</p>
                                        </div>
                                    </div>
                                </a>
                                <div class="d-inline-block w-100 text-center p-3">
                                    <a class="bg-primary iq-sign-btn" href="{{ route('logout') }}" onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();" role="button">{{ __('Logout') }}
                                        <i class="ri-login-box-line ml-2">
                                        </i>
                                    </a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </li>
            </ul>
        </nav>
    </div>
</div>