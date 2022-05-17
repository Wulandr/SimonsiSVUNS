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
    <?php $notifikasi = 0; ?>

    @include('dashboards/users/layouts/navbar')
    @include('dashboards/users/layouts/sidebar')

    <!-- Page Content  -->
    <div id="content-page" class="content-page"><?php $tor = $tor; ?>
      <div class="container-fluid">
        <div class="row">
          <div class="col-sm-12">
            <div class="iq-card">
              <div class="iq-card-header d-flex justify-content-between">
                <div class="iq-header-title">
                  <h4 class="card-title">PENGAJUAN

                    <button class="search-toggle iq-waves-effect bg-primary rounded" data-toggle="modal" title="Tambah TOR" data-original-title="Tambah TOR" data-target="#tambahtor<?= Auth()->user()->id_unit ?>"><i class="fa fa-plus-circle"></i>
                    </button>
                    <!-- MODAL TAMBAH TOR  -->
                  </h4>
                  @include('dashboards/users/tor/modal2/tambah_tor')
                </div>
              </div>
              <br />
              <div class="iq-card-body">
                <div class="table-responsive">
                  <div class="row justify-content-between">
                    <div class="col-sm-12 col-md-6">
                      <div id="user_list_datatable_info" class="dataTables_filter">
                        <form class="mr-3 position-relative">
                          <!-- <div class="form-group mb-0">
                            <input type="search" class="form-control" id="exampleInputSearch" placeholder="Search" aria-controls="user-list-table">
                          </div> -->
                        </form>
                      </div>
                    </div>
                    <div class="col-sm-12 col-md-6">
                      <div class="user-list-files d-flex float-right">
                        <a class="iq-bg-primary" href="javascript:void();">
                          Print
                        </a>
                        <a class="iq-bg-primary" href="javascript:void();">
                          Excel
                        </a>
                        <a class="iq-bg-primary" href="javascript:void();">
                          Pdf
                        </a>
                      </div>
                    </div>
                  </div>
                  <table id="user-list-table" class="table table-striped table-bordered mt-4" role="grid" aria-describedby="user-list-page-info">
                    <thead>
                      <tr>
                        <th>No.</th>
                        <th>Timestamp</th>
                        <th>Prodi</th>
                        <th>Judul Kegiatan</th>
                        <th>Jenis Ajuan</th>
                        <th>Tanggal Mulai</th>
                        <th>Nama PIC Kegiatan</th>
                        <th>Jumlah Anggaran</th>
                        <th>Status</th>
                        <th>File Scan</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php for ($t = 0; $t < count($tor); $t++) { ?>
                        <tr>
                          <td>1</td>
                          <td><?= $tor[$t]->created_at ?></td>
                          <td><?= $tor[$t]->id_unit ?></td>
                          <td><?= $tor[$t]->nama_kegiatan ?></td>
                          <td><?= $tor[$t]->jenis_ajuan ?></td>
                          <td><?= $tor[$t]->tgl_mulai_pelaksanaan ?></td>
                          <td><?= $tor[$t]->nama_pic ?></td>
                          <td><?= $tor[$t]->jumlah_anggaran ?></td>
                          <td><span class="badge iq-bg-primary">Diajukan</span></td>
                          <td></td>
                          <td>
                            <div class="flex align-items-center list-user-action">
                              <!-- <a class="iq-bg-primary" data-toggle="tooltip" data-placement="top" title="" data-original-title="Add" href="#"><i class="ri-user-add-line"></i></a> -->
                              <a class="iq-bg-primary rounded" style="padding: 1%;" data-toggle="modal" data-placement="top" title="Update Tor" data-original-title="Update Tor" href="" data-target="#update_tor<?= $tor[$t]->id ?>">
                                <i class="ri-pencil-line"> </i>
                              </a>
                              @include('dashboards/users/tor/modal2/update_tor')
                              <a class="iq-bg-danger rounded" style="padding: 1%;margin:2%" href="{{url('/tor/delete/'.$tor[$t]->id)}}" data-toggle="tooltip" title="Delete" onclick="return confirm('Apakah anda yakin ingin hapus ?')">
                                <i class="ri-delete-bin-line"></i>
                              </a>
                            </div>
                          </td>
                        </tr>
                      <?php } ?>
                    </tbody>
                  </table>
                </div>
                <div class="row justify-content-between mt-3">
                  <div id="user-list-page-info" class="col-md-6">
                    <span>Showing 1 to 5 of 5 entries</span>
                  </div>
                  <div class="col-md-6">
                    <nav aria-label="Page navigation example">
                      <ul class="pagination justify-content-end mb-0">
                        <li class="page-item disabled">
                          <a class="page-link" href="#" tabindex="-1" aria-disabled="true">Previous</a>
                        </li>
                        <li class="page-item active"><a class="page-link" href="#">1</a></li>
                        <li class="page-item"><a class="page-link" href="#">2</a></li>
                        <li class="page-item"><a class="page-link" href="#">3</a></li>
                        <li class="page-item">
                          <a class="page-link" href="#">Next</a>
                        </li>
                      </ul>
                    </nav>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

        <!-- PRINT -->
        <!-- <div class="row">
          <div class="col-sm-12">
            <div class="iq-card">
              <div class="iq-card-header d-flex justify-content-between">
                <div class="iq-header-title">
                  <h4 class="card-title">
                  </h4>
                  <div class="user-list-files d-flex float-right">
                    <a class="iq-bg-primary" href="javascript:void();">
                      Print
                    </a>
                  </div>
                </div>
              </div>
              <br />
              <div class="iq-card-body">
                <div class="row justify-content-between">
                  <div class="col-sm-12 col-md-6">

                  </div>
                </div>
                <div class="row justify-content-between ml-2">
                  <div class="container center">
                    <h5 style="text-align: center;">
                      KERANGKA ACUAN KERJA (KAK) / TERM OF REFERENCE (ToR)<br />
                      PROGRAM STUDI ...<br />SEKOLAH VOKASI UNIVERSITAS SEBELAS</b>
                    </h5>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div> -->

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
  @include('dashboards/users/layouts/footer')

</body>

</html>