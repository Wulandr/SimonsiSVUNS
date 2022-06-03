<?php

use Illuminate\Support\Facades\Auth;
?>
@include('dashboards/users/layouts/script')
<!-- cek doang -->

<body>
  <div id="loading">
    <div id="loading-center">
    </div>
  </div>
  <div class="wrapper">
    <?php $notifikasi = 0;
    ?>

    @include('dashboards/users/layouts/navbar')
    @include('dashboards/users/layouts/sidebar')

    <!-- Page Content  -->
    <div id="content-page" class="content-page">
      <div class="container-fluid">
        <div class="row">
          <div class="col-sm-12">
            <div class="iq-card">
              <div class="iq-card-header d-flex justify-content-between">
                <div class="iq-header-title">
                  <h4 class="card-title">PENGAJUAN TOR & RAB
                  </h4>
                  <!-- MODAL TAMBAH RAB  -->
                  @include('perencanaan/modal2/tambah_tor')
                </div>

              </div>
              <br />
              <div class="row">
                <div class="col-sm-6 col-md-6 col-lg-3">
                  <div class="iq-card iq-card-block iq-card-stretch iq-card-height">
                    <div class="iq-card-body iq-box-relative">
                      <div class="iq-box-absolute icon iq-icon-box rounded-circle iq-bg-primary">
                        <i class="ri-focus-2-line"></i>
                      </div>
                      <p class="text-secondary">Total Pagu</p>
                      <form action="http://127.0.0.1:8000/filterpagu" method="GET">
                        <div class="row mr-3">
                          <div class="col mr-1">
                            <select class="form-control filter sm-8" name="tahun" id="input">
                              <option value="0">All</option>
                              <?php for ($t2 = 0; $t2 < count($tabeltahun); $t2++) { ?>
                                <option value="{{$tabeltahun[$t2]->id}}" {{$filterpagu==$tabeltahun[$t2]->id ? 'selected':''}}>{{$tabeltahun[$t2]->tahun}}</option>
                              <?php } ?>
                            </select>
                          </div>
                          <input type="submit" class="btn btn-primary btn-sm" value="OK">
                        </div>
                      </form>
                      <br />
                      <div class="d-flex align-items-center justify-content-between" style="position: relative;">
                        <div class="row ml-1">
                          <?php for ($pg = 0; $pg < count($pagu); $pg++) {
                            if ($pagu[$pg]->id_unit == Auth()->user()->id_unit) {
                              for ($t3 = 0; $t3 < count($tabeltahun); $t3++) {
                                if ($pagu[$pg]->id_tahun == $tabeltahun[$t3]->id) { ?>
                                  <h6>{{$tabeltahun[$t3]->tahun}} <b>{{"Rp".number_format($pagu[$pg]->pagu,2,',','.')}}</b></h6>

                          <?php }
                              }
                            }
                          } ?>
                        </div>
                        <div class="resize-triggers">
                          <div class="expand-trigger">
                            <div style="width: 202px; height: 60px;"></div>
                          </div>
                          <div class="contract-trigger"></div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-sm-6 col-md-6 col-lg-3">
                  <div class="iq-card iq-card-block iq-card-stretch iq-card-height">
                    <div class="iq-card-body iq-box-relative">
                      <div class="iq-box-absolute icon iq-icon-box rounded-circle iq-bg-primary">
                        <i class="ri-focus-2-line"></i>
                      </div>
                      <p class="text-secondary">Standar Biaya Masukan</p>
                      <div class="d-flex align-items-center justify-content-between" style="position: relative;">
                        <div class="row ml-1">
                          @foreach($pedoman as $pedomansbm)
                          <a href="{{asset('/pedoman/'.$pedomansbm->file)}}">{{$pedomansbm->tahun . " : " .$pedomansbm->nama}}</a>
                          @endforeach
                        </div>
                        <div class="resize-triggers">
                          <div class="expand-trigger">
                            <div style="width: 202px; height: 60px;"></div>
                          </div>
                          <div class="contract-trigger"></div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>

              <div class="iq-card-body">
                <div id="table" class="table-editable">
                  <span class="table-add float-left ml-3 mr-2">
                    @can('tor_create')
                    <a href="http://127.0.0.1:8000/steppengajuantor"><button class="btn btn-sm bg-primary"><i class="las la-plus"></i><span class="pl-1">Tambah TOR</span>
                      </button></a>
                    @endcan
                  </span>
                  <span class="table-add float-right mb-3 mr-2">
                    <div class="form-group row">
                      <form action="{{ url('/filtertahun') }}" method="GET">
                        <div class="row mr-3">
                          <div class="col mr-1">
                            <select class="form-control filter sm-8" name="tahun" id="input">
                              <option value="0">All</option>
                              <?php for ($thn = 0; $thn < count($tabeltahun); $thn++) { ?>
                                <option value="{{$tabeltahun[$thn]->tahun}}" {{$filtertahun==$tabeltahun[$thn]->tahun ? 'selected':''}}>{{$tabeltahun[$thn]->tahun}}</option>
                              <?php } ?>
                            </select>
                          </div>
                          <?php if (Auth()->user()->role != 2) { ?>
                            <div class="col mr-1">
                              <select class="form-control filter sm-8" name="prodi" id="prodi">
                                <option value="0">All</option>
                                <?php
                                for ($pr = 0; $pr < count($unit); $pr++) { ?>
                                  <option value="{{$unit[$pr]->id}}" {{$filterprodi==$unit[$pr]->id ? 'selected':''}}>{{$unit[$pr]->nama_unit}}</option>
                                <?php } ?>
                              </select>
                            </div>
                          <?php } ?>
                          <input type="submit" class="btn btn-sm bg-primary" value="Filter">
                        </div>
                      </form>
                    </div>
                  </span>
                </div>
                <div style="overflow-x:auto;" class="container mt-2 mr-5">
                  <table id="torab" class="table table-bordered table-responsive-md table-striped text-center" style="box-shadow:5px;">
                    <thead class="bg-primary" style="color: white;">
                      <tr>
                        <th colspan="3">
                          Tri Wulan 1
                        </th>
                        <th colspan="3">Tri Wulan 2
                        </th>
                        <th colspan="3">Tri Wulan 3 </i>
                        </th>
                        <th colspan="3">Tri Wulan 4 </i>
                        </th>
                      </tr>
                    </thead>
                    <?php
                    $semuaanggaran = 0;
                    ?>
                    <tbody class="bg-primary" style="color: white;">
                      <tr class="">
                        <th>Kegiatan</th>
                        <th colspan="2">Anggaran</th>
                        <th>Kegiatan</th>
                        <th colspan="2">Anggaran</th>
                        <th>Kegiatan</th>
                        <th colspan="2">Anggaran</th>
                        <th>Kegiatan</th>
                        <th colspan="2">Anggaran</th>
                      </tr>
                      <tr>
                        <!-- awal perulangan tor -->
                        <?php for ($t = 0; $t < count($tor); $t++) { ?>
                      <tr>
                        <th style="background-color: #cacfd1;" colspan="13">
                          <h6 id="tornya" style="color: #000102b5;"><b>{{$tor[$t]->nama_kegiatan}}</b>
                            <!-- AKSI TOR  -->
                            @include('perencanaan/aksi/aksi_tor')
                          </h6>
                        </th>
                      </tr>
                      <!-- TAMBAH RAB -->
                      @include('perencanaan/modal2/tambah_rab')
                      <!-- button untuk prodi mengajukan tor -->
                      @include('perencanaan/modal2/status')
                      @include('perencanaan/modal2/ajukan')
                      <!-- NAMA RAB JADI 1 BARIS  -->
                      <?php
                          // awal perulangan rab
                          for ($r = 0; $r < count($rab); $r++) {
                            if ($rab[$r]->id_tor == $tor[$t]->id) {

                      ?>
                          <tr>
                            <?php
                              for ($tr = 0; $tr < count($tw2); $tr++) {
                                if ($tor[$t]->id_tw == $tw2[$tr]->id) {
                                  $tw = $tw2[$tr]->triwulan;
                                  $tw = substr($tw, 14, 1);
                                }
                              }
                              if ($tw == 1) {
                              } elseif ($tw == 2) {
                                for ($a2 = 0; $a2 < 3; $a2++) { ?>
                                <td align="center" bgcolor=" white"></td>
                              <?php }
                              } elseif ($tw == 3) {
                                for ($a2 = 0; $a2 < 6; $a2++) { ?>
                                <td align="center" bgcolor=" white"></td>
                              <?php }
                              } elseif ($tw == 4) {
                                for ($a2 = 0; $a2 < 9; $a2++) { ?>
                                <td align="center" bgcolor=" white"></td>
                            <?php }
                              } ?>
                            <!-- NAMA KEGIATAN JADI 1 BARIS  -->
                            <!-- AKSI -->
                            <!-- for status -->
                            <td style="background-color: #efefef;color:black" align="left" colspan="3">RAB : {{$rab[$r]->id." - ".$rab[$r]->masukan}}
                              <!-- AKSI KEGIATAN -->
                              @include('perencanaan/aksi/aksi_rab')
                            </td>

                            <?php
                              if ($tw == 1) {
                                for ($e = 1; $e < 10; $e++) { ?>
                                <td align="center" bgcolor=" white"></td>
                            <?php }
                              } ?>
                            <?php
                              if ($tw == 2) {
                                for ($e = 1; $e < 7; $e++) { ?>
                                <td align="center" bgcolor=" white"></td>
                            <?php }
                              } ?>
                            <?php
                              if ($tw == 3) {
                                for ($e = 1; $e < 4; $e++) { ?>
                                <td bgcolor="white"></td>
                            <?php
                                }
                              }
                            ?>
                          </tr>

                          <tr bgcolor="white">
                            <?php
                              if ($tw == 2) {
                                for ($e = 1; $e < 4; $e++) { ?>
                                <td align="center" bgcolor=" white"></td>
                            <?php }
                              } ?>

                            <?php
                              if ($tw == 3) {
                                for ($e = 1; $e < 7; $e++) { ?>
                                <td bgcolor="white"></td>
                            <?php }
                              } ?>

                            <?php
                              if ($tw == 4) {
                                for ($e = 1; $e < 10; $e++) { ?>
                                <td bgcolor="white"></td>
                            <?php }
                              } ?>


                            <!-- ANGGARAN -->
                            <td colspan="3" style="background-color: #efefef;">
                              <?php
                              $totaltw1 = 0;
                              $totanggaran1 = 0;
                              $nomer_anggaran = 1;
                              $anggaranBerstatus = [];
                              $no = 0;
                              for ($i = 0; $i < count($anggaran); $i++) {
                                if ($anggaran[$i]->anggaran != 0) {
                                  if ($anggaran[$i]->id_rab == $rab[$r]->id) {
                                    if ($anggaran[$i]->id_tahap_anggaran == 1) {
                                      $totanggaran1 += $anggaran[$i]->anggaran;
                                      for ($j = 0; $j < count($detail_mak); $j++) {
                                        if ($anggaran[$i]->id_detail_mak == $detail_mak[$j]->id) {
                              ?>
                                          <h6 align="left" style="font-size: smaller;">
                                            {{$detail_mak[$j]->detail . " - " .$anggaran[$i]->anggaran}}
                                            <!-- include('perencanaan/aksi/aksi_anggaran') -->
                                            <!-- MODAL UPDATE DI ANGGARAN -->
                                            </span>
                                          </h6>
                              <?php
                                        }
                                      }
                                    }
                                  }
                                }
                              } ?>
                              <?php
                              $pengajuan = 0;
                              $detail = "Lengkapi Data";
                              $name;
                              for ($trx1 = 0; $trx1 < count($trx_status_tor); $trx1++) {
                                if ($trx_status_tor[$trx1]->id_tor == $tor[$t]->id) {
                                  for ($st1 = 0; $st1 < count($status); $st1++) {
                                    if ($trx_status_tor[$trx1]->id_status == $status[$st1]->id) {
                                      $name = $status[$st1]->nama_status;
                                      if ($status[$st1]->nama_status == "Proses Pengajuan") {
                                        $pengajuan = 1;
                                        $detail = "Detail";
                                      }
                                    }
                                  }
                                }
                              }
                              ?>
                              <!-- TAMBAH ANGGARAN DI RAB -->
                              <a href="#" class="badge iq-bg-primary">{{" [".$tw."] "}}Total di RAB = <?= " Rp. " .  number_format($totanggaran1, 2, ',', '.'); ?></a>

                              <?php if ($pengajuan == 0) { ?>
                                @can('anggaran_create')
                                <!-- <a class="iq-bg-primary rounded" style="padding: 1%;" data-toggle="modal" data-placement="top" title="Tambah Anggaran" data-original-title="Tambah Anggaran" data-target="#tambah_anggaran<?= $rab[$r]->id ?>" href=""><i class="ri-user-add-line"></i></a> -->
                                @endcan
                              <?php } ?>
                            </td>
                            <!-- MODAL RAB -->
                            @include('perencanaan/modal2/update_rab')
                            <!-- TAMBAH ANGGARAN DI RAB -->
                            <!-- include('perencanaan/modal2/tambah_anggaran') -->

                            <?php
                              if ($tw == 1) {
                                for ($e = 1; $e < 9; $e++) { ?>
                                <td align="center" bgcolor=" white"></td>
                            <?php }
                              } ?>
                            <?php
                              if ($tw == 2) {
                                for ($e = 1; $e < 7; $e++) { ?>
                                <td align="center" bgcolor=" white"></td>
                            <?php }
                              } ?>
                            <?php
                              if ($tw == 3) {
                                for ($e = 1; $e < 4; $e++) { ?>
                                <td bgcolor="white"></td>
                            <?php
                                }
                              }
                            ?>
                          </tr>
                          <!-- akhir perulangan rab -->
                      <?php }
                          } ?>
                      <!-- MODAL DETAIL TOR -->
                      @include('perencanaan/modal2/detail_tor')
                      <!-- MODAL UPDATE TOR -->
                      @include('perencanaan/modal2/update_tor')
                      <!-- akhir perulangan tor -->
                    <?php
                        } ?>
                    <?php
                    $semuaanggaran = [0, 0, 0, 0];
                    for ($u = 0; $u < count($totalpertw); $u++) {
                      // echo substr($totalpertw[$u]->triwulan, 14, 1);
                      if (auth()->user()->id_unit != 1) {
                        for ($an = 0; $an < 4; $an++) {
                          if (substr($totalpertw[$u]->triwulan, 14, 1) == $an + 1) {
                            if ($totalpertw[$u]->id_unit_tor == auth()->user()->id_unit) {
                              if ($filtertahun != 0) {
                                if (substr($totalpertw[$u]->tgl_mulai_pelaksanaan, 0, 4) == $filtertahun) {
                                  $semuaanggaran[$an] += $totalpertw[$u]->anggaran;
                                }
                              } else {
                                $semuaanggaran[$an] += $totalpertw[$u]->anggaran;
                              }
                            }
                          }
                        }
                      }

                      // <!-- jika yang dashboard ADMIN -->

                      if (auth()->user()->id_unit == 1) {
                        for ($an = 0; $an < 4; $an++) {
                          if (substr($totalpertw[$u]->triwulan, 14, 1) == $an + 1) {
                            if ($filtertahun != 0 && $filterprodi == 0) {
                              if (substr($totalpertw[$u]->tgl_mulai_pelaksanaan, 0, 4) == $filtertahun) {
                                $semuaanggaran[$an] += $totalpertw[$u]->anggaran;
                              }
                            } elseif ($filterprodi != 0 && $filtertahun == 0) {
                              if ($totalpertw[$u]->id_unit_tor == $filterprodi) {
                                $semuaanggaran[$an] += $totalpertw[$u]->anggaran;
                              }
                            } elseif ($filterprodi != 0 && $filtertahun != 0) {
                              if ($totalpertw[$u]->id_unit_tor == $filterprodi && substr($totalpertw[$u]->tgl_mulai_pelaksanaan, 0, 4) == $filtertahun) {
                                $semuaanggaran[$an] += $totalpertw[$u]->anggaran;
                              }
                            } else {
                              $semuaanggaran[$an] += $totalpertw[$u]->anggaran;
                            }
                          }
                        }
                      }
                    }
                    ?>
                    </tr>

                    <tr>
                      <td class="bg-primary" colspan="3" style="font-size: medium;">
                        <i class="fa fa-calculator"></i><b> <?= "Rp. " .  number_format($semuaanggaran[0], 2, ',', '.') ?></b>
                      </td>
                      <td class="bg-primary" colspan="3" style="font-size: medium;">
                        <i class="fa fa-calculator"></i><b> <?= "Rp. " .  number_format($semuaanggaran[1], 2, ',', '.') ?></b>
                      </td>
                      <td class="bg-primary" colspan="3" style="font-size: medium;">
                        <i class="fa fa-calculator"></i><b> <?= "Rp. " .  number_format($semuaanggaran[2], 2, ',', '.') ?></b>
                      </td>
                      <td class="bg-primary" colspan="3" style="font-size: medium;">
                        <i class="fa fa-calculator"></i><b> <?= "Rp. " .  number_format($semuaanggaran[3], 2, ',', '.') ?></b>
                      </td>
                    </tr>
                    </tbody>
                  </table>
                  {{ $tor->links() }}
                </div>
              </div>
            </div>
          </div>

        </div>
        <div>
        </div></br>
        <hr />
        <div id="hasil">
          <!-- Hasil -->
        </div>
      </div>
    </div>
  </div>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
  <script>
    $('.tor-confirm').on('click', function(event) {
      event.preventDefault();
      const url = $(this).attr('href');
      swal({
        title: 'Are you sure?',
        text: 'This record and it`s details will be permanantly deleted!',
        icon: 'warning',
        buttons: ["Cancel", "Yes!"],
      }).then(function(value) {
        if (value) {
          window.location.href = url;
        }
      });
    });
  </script>
  <script>
    $('.rab-confirm').on('click', function(event) {
      event.preventDefault();
      const url = $(this).attr('href');
      swal({
        title: 'Are you sure?',
        text: 'This record and it`s details will be permanantly deleted!',
        icon: 'warning',
        buttons: ["Cancel", "Yes!"],
      }).then(function(value) {
        if (value) {
          window.location.href = url;
        }
      });
    });
  </script>

  @include('dashboards/users/layouts/footer')

</body>

</html>