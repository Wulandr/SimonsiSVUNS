<?php

use Illuminate\Support\Facades\Auth;
?>
@can('tor_create')
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
                    <div class="col-sm-12 col-lg-12">
                        <div class="iq-card">
                            <div class="iq-card-header d-flex justify-content-between">
                                <div class="iq-header-title">
                                    <h4 class="card-title">TAHAP PENGAJUAN TOR</h4>
                                </div>
                            </div>
                            <?php $data = 1 ?>
                            <div class="iq-card-body">
                                <form id="form-wizard1" class="text-center mt-4" method="post" action="{{ url('/tor/create') }}">
                                    @csrf
                                    <ul id="top-tab-list" class="p-0">
                                        <li class="active" id="account">
                                            <a href="javascript:void();">
                                                <i class="ri-lock-unlock-line"></i><span>1.</span>
                                            </a>
                                        </li>
                                        <li id="personal">
                                            <a href="javascript:void();">
                                                <i class="ri-user-fill"></i><span>2.</span>
                                            </a>
                                        </li>
                                        <li id="payment">
                                            <a href="javascript:void();">
                                                <i class="ri-camera-fill"></i><span> 3. </span>
                                            </a>
                                        </li>
                                        <li id="confirm">
                                            <a href="javascript:void();">
                                                <i class="ri-check-fill"></i><span> 4.</span>
                                            </a>
                                        </li>
                                    </ul> <!-- TAHAP 1  -->
                                    <fieldset>
                                        <div class="form-card text-left">
                                            <div class="row">
                                                <div class="col-7">
                                                    <h4 class="mb-4">Pengajuan TOR</h4>
                                                </div>
                                                <div class="col-5">
                                                    <h2 class="steps">Step 1 - 4</h2>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="container ml-3">

                                                    <div class="form-group">
                                                        <label>Jenis Ajuan</label><br />
                                                        <div class="custom-control custom-radio custom-control-inline">
                                                            <input type="radio" id="customRadio6" name="jenis_ajuan" id="jenis_ajuan" value="Baru" class="custom-control-input">
                                                            <label class="custom-control-label" for="customRadio6"> Baru </label>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Prodi</label>
                                                        <?php
                                                        $UnitUser = "";
                                                        if (!empty($unit)) {
                                                            for ($u = 0; $u < count($unit); $u++) {
                                                                if ($unit[$u]->id == Auth::user()->id_unit) {
                                                                    $UnitUser = $unit[$u]->nama_unit;
                                                                }
                                                            }
                                                        }
                                                        ?>
                                                        <?php if ($UnitUser == "Sekolah Vokasi") { ?>
                                                            <select name="id_unit" id="id_unit" class="form-control @error('id_unit') is-invalid @enderror">
                                                                @foreach($unit as $unit)
                                                                <option value="{{$unit->id}}">{{$unit->nama_unit}}</option>
                                                                @endforeach
                                                            </select>
                                                        <?php } ?>
                                                        <?php if ($UnitUser != "Sekolah Vokasi") { ?>
                                                            <select name="id_unit" id="id_unit" class="form-control @error('id_unit') is-invalid @enderror">
                                                                <?php for ($u2 = 0; $u2 < count($unit); $u2++) {
                                                                    if ($unit[$u2]->id == Auth()->user()->id_unit) { ?>
                                                                        <option value="{{$unit[$u2]->id}}">{{$unit[$u2]->nama_unit}}</option>
                                                                <?php }
                                                                } ?>
                                                            </select>
                                                        <?php } ?>
                                                        @error('id_unit')
                                                        <div class="alert alert-danger">{{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Kode Sub Kegiatan</label>
                                                        <select name="id_subK" id="id_subK" class="form-control @error('id_subK') is-invalid @enderror">
                                                            <?php for ($s = 0; $s < count($subkeg); $s++) { ?>
                                                                <option value="<?= $subkeg[$s]->id ?>"><?= $subkeg[$s]->subK . " - " . substr($subkeg[$s]->deskripsi, 0, 100) ?></option>
                                                            <?php } ?>
                                                        </select>
                                                        @error('id_subK')
                                                        <div class="alert alert-danger">{{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                    <div class="col-sm-8">
                                                        <div class="card iq-mb-3 shadow">
                                                            <img width="700" src="../assets/contoh/contohiku.png" class="card-img-top">
                                                            <div class="card-body">
                                                                <b>
                                                                    <h6 class="card-title">Indikator Kinerja Utama (IKU)</h6>
                                                                </b>
                                                                <div class="form-group">
                                                                    <label>Realisasi IKU</label>
                                                                    <input name="realisasi_IKU" id="realisasi_IKU" type="text" class="form-control @error('realisasi_IKU') is-invalid @enderror">
                                                                </div>
                                                                @error('realisasi_IKU')
                                                                <div class="alert alert-danger">{{ $message }}</div>
                                                                @enderror
                                                                <div class="form-group">
                                                                    <label>Target IKU</label>
                                                                    <input name="target_IKU" id="target_IKU" type="text" class="form-control @error('target_IKU') is-invalid @enderror">
                                                                </div>
                                                                @error('target_IKU')
                                                                <div class="alert alert-danger">{{ $message }}</div>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-8">
                                                        <div class="card iq-mb-3 shadow">
                                                            <img width="700" src="../assets/contoh/contohik.png" class="card-img-top">
                                                            <div class="card-body">
                                                                <b>
                                                                    <h6 class="card-title">Indikator Kinerja Kegiatan (IK)</h6>
                                                                </b>
                                                                <div class="form-group">
                                                                    <label>Realisasi IK</label>
                                                                    <input name="realisasi_IK" id="realisasi_IK" type="text" class="form-control @error('realisasi_IK') is-invalid @enderror">
                                                                </div>
                                                                @error('realisasi_IK')
                                                                <div class="alert alert-danger">{{ $message }}</div>
                                                                @enderror
                                                                <div class="form-group">
                                                                    <label>Target IK</label>
                                                                    <input name="target_IK" id="target_IK" type="text" class="form-control @error('target_IK') is-invalid @enderror">
                                                                </div>
                                                                @error('target_IK')
                                                                <div class="alert alert-danger">{{ $message }}</div>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="form-group">
                                                        <label>Nama Kegiatan</label>
                                                        <input name="nama_kegiatan" id="nama_kegiatan" type="text" class="form-control @error('nama_kegiatan') is-invalid @enderror">
                                                    </div>
                                                    @error('nama_kegiatan')
                                                    <div class="alert alert-danger">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <button type="button" class="btn btn-primary next action-button float-right">Next</button>
                                    </fieldset>
                                    <!-- TAHAP 2 -->
                                    <fieldset>
                                        <div class="form-card text-left">
                                            <div class="container mt-3">
                                                <div class="form-group">
                                                    <label>Latar Belakang</label>
                                                    <textarea class="ckeditor form-control @error('latar_belakang') is-invalid @enderror" id="latar_belakang" name="latar_belakang"></textarea>
                                                </div>
                                                @error('latar_belakang')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                                @enderror
                                                <div class="form-group">
                                                    <label>Rasionalisasi</label>
                                                    <textarea class="ckeditor form-control @error('rasionalisasi') is-invalid @enderror" id="rasionalisasi" name="rasionalisasi" rows="2"></textarea>
                                                </div>
                                                @error('rasionalisasi')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                                @enderror
                                                <div class="form-group">
                                                    <label>Tujuan</label>
                                                    <textarea class="ckeditor form-control @error('tujuan') is-invalid @enderror" id="tujuan" name="tujuan" rows="2"></textarea>
                                                </div>
                                                @error('tujuan')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                                @enderror
                                                <div class="form-group">
                                                    <label>mekanisme</label>
                                                    <textarea class="ckeditor form-control @error('mekanisme') is-invalid @enderror" id="mekanisme" name="mekanisme" rows="2"></textarea>
                                                </div>
                                                @error('mekanisme')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                                @enderror
                                                <div class="form-group">
                                                    <label>keberlanjutan</label>
                                                    <textarea class="ckeditor form-control @error('keberlanjutan') is-invalid @enderror" id="keberlanjutan" name="keberlanjutan" rows="2"></textarea>
                                                </div>
                                                @error('keberlanjutan')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                                @enderror

                                            </div>
                                        </div>
                                        <button type="button" class="btn btn-primary next action-button float-right" value="Next">Next</button>
                                        <button type="button" class="btn btn-dark previous action-button-previous float-right mr-3" value="Previous">Previous</button>
                                    </fieldset>
                                    <!-- TAHAP 3 -->
                                    <fieldset>
                                        <div class="form-card text-left">
                                            <div class="container mt-3">
                                                <div class="form-group">
                                                    <label>Nama PIC Kegiatan</label><br />
                                                    <select name="nama_pic" id="nama_pic" class="form-control @error('nama_pic') is-invalid @enderror" style="width: 100%;height:50px;line-height:45px;color:#a09e9e;background:#00000000;border:1px solid #f1f1f1;border-radius:5px">
                                                        <?php
                                                        for ($pi2 = 0; $pi2 < count($roles); $pi2++) {
                                                            if (Auth::user()->role == $roles[$pi2]->id) {
                                                                if ($roles[$pi2]->name == "PIC") { ?>
                                                                    <option value="<?= Auth::user()->name; ?>"><?= Auth::user()->name; ?></option>
                                                                <?php } elseif ($roles[$pi2]->name == "Prodi") {
                                                                    // for ($pi1 = 0; $pi1 < count($users); $pi1++) {
                                                                    //     for ($pi3 = 0; $pi3 < count($roles2); $pi3++) {
                                                                    //         if ($users[$pi1]->role == $roles2[$pi3]->id) {
                                                                    //             if ($roles2[$pi3]->name == "PIC") { 
                                                                ?>
                                                                    @foreach($PIC as $pic)
                                                                    <option value="<?= $pic->name_users ?>"><?= $pic->name_users ?></option>
                                                                    @endforeach
                                                                    <?php
                                                                    //             }
                                                                    //         }
                                                                    //     }
                                                                    // } 
                                                                    ?><?php
                                                                    } elseif ($roles[$pi2]->name == "Admin") {
                                                                        for ($pi1 = 0; $pi1 < count($users); $pi1++) {
                                                                            for ($pi3 = 0; $pi3 < count($roles2); $pi3++) {
                                                                                if ($users[$pi1]->role == $roles2[$pi3]->id) {
                                                                                    if ($roles2[$pi3]->name == "PIC") { ?>
                                                                    <option value="<?= $users[$pi1]->name ?>"><?= $users[$pi1]->name ?></option>
                                                <?php }
                                                                                }
                                                                            }
                                                                        }
                                                                    }
                                                ?>
                                        <?php
                                                            }
                                                        }
                                        ?>
                                        @error('nama_pic')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <label>Email SSO PIC Kegiatan</label>
                                                    <input name="email_pic" id="email_pic" type="text" class="form-control @error('email_pic') is-invalid @enderror" value="">
                                                </div>
                                                @error('email_pic')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                                @enderror
                                                <div class="form-group">
                                                    <label>Kontak PIC Kegiatan</label>
                                                    <input name="kontak_pic" id="kontak_pic" type="text" class="form-control @error('kontak_pic') is-invalid @enderror" value="">
                                                </div>
                                                @error('kontak_pic')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <button type="button" class="btn btn-primary next action-button float-right" value="Next">Next</button>
                                        <button type="button" class="btn btn-dark previous action-button-previous float-right mr-3" value="Previous">Previous</button>
                                    </fieldset>

                                    <!-- TAHAP 4 -->
                                    <fieldset>
                                        <div class="form-card text-left">
                                            <div class="container mt-3">
                                                <div class="form-group">
                                                    <label>Tanggal Mulai Pelaksanaan</label>
                                                    <input name="tgl_mulai_pelaksanaan" id="tgl_mulai_pelaksanaan" value="" type="date" class="form-control @error('tgl_mulai_pelaksanaan') is-invalid @enderror">
                                                </div>
                                                @error('tgl_mulai_pelaksanaan')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                                @enderror
                                                <div class="form-group">
                                                    <label>Tanggal Selesai Pelaksanaan</label>
                                                    <input name="tgl_akhir_pelaksanaan" id="tgl_akhir_pelaksanaan" value="" type="date" class="form-control @error('tgl_akhir_pelaksanaan') is-invalid @enderror">
                                                </div>
                                                @error('tgl_akhir_pelaksanaan')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                                @enderror
                                                <!-- <div class="form-group">
                                                    <label>Jumlah Anggaran</label> -->
                                                <input name="jumlah_anggaran" id="jumlah_anggaran" value="0" type="hidden" class="form-control @error('jumlah_anggaran') is-invalid @enderror">
                                                <!-- </div> -->
                                                @error('jumlah_anggaran')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                                @enderror

                                                <div class="form-group">
                                                    <label>Rencana Penarikan Dana</label>
                                                    <!-- substr($tw[$t2]->triwulan, 0, 4) -->
                                                    <select name="id_tw" id="id_tw" class="form-control @error('id_tw') is-invalid @enderror">
                                                        <?php for ($t2 = 0; $t2 < count($tw); $t2++) {
                                                            foreach ($tabeltahun as $thn) {
                                                                if ($thn->is_aktif == 1) {
                                                                    if ($thn->tahun == substr($tw[$t2]->triwulan, 0, 4)) { ?>
                                                                        <option value="{{$tw[$t2]->id}}"><?= $tw[$t2]->triwulan ?></option>
                                                        <?php }
                                                                }
                                                            }
                                                        } ?>
                                                    </select>
                                                </div>
                                                @error('id_tw')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <button type="submit" class="btn btn-primary next action-button float-right">Submit</button>
                                        <button type="button" class="btn btn-dark previous action-button-previous float-right mr-3" value="Previous">Previous</button>
                                    </fieldset>
                                </form>

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
        <script>
            $(document).ready(function() {
                $('#id_unit').select2();
            });
        </script>
        <script>
            $(document).ready(function() {
                $('#nama_pic').select2();
            });
        </script>
        <script>
            $(document).ready(function() {
                $('#id_subK').select2();
            });
        </script>

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
        <script type="text/javascript">
            var i = 0;
            $("#dynamic-ar").click(function() {
                ++i;
                $("#dynamicAddRemove").append('<div class="col-md-8"><div class="form-group"><label>Komponen Input</label><input name="komponen[]" id="" type="text" class="form-control"></div></div><div class="col-md-2"><div class="form-group"><label>Bulan</label><input name="bulan[]" id="" type="text" class="form-control"></div></div><button type="button" class="btn btn-outline-danger remove-input-field">Delete</button>');
            });
            $(document).on('click', '.remove-input-field', function() {
                $(this).parents('<div class="col-md-8">').remove();
            });
        </script>
</body>
<script src="//cdn.ckeditor.com/4.14.1/standard/ckeditor.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
        $('.ckeditor').ckeditor();
    });
</script>

</html>
@endcan