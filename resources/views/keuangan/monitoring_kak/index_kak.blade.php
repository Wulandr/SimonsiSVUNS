@include('dashboards/users/layouts/script')
<?php
function ngecekWulan($awal, $akhir)
{
    if (new datetime(date('Y-m-d')) >= new datetime($awal) && new datetime(date('Y-m-d')) <= new datetime($akhir) && !empty($_REQUEST['filterTw'])) {
        return true;
    }
    return false;
}
?>

<body>
    <div id="loading">
        <div id="loading-center">
        </div>
    </div>

    @include('dashboards/users/layouts/navbar')
    @include('dashboards/users/layouts/sidebar')
    <!-- Page Content  -->
    <div id="content-page" class="content-page">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12">
                    <div class="iq-card">
                        <div class="iq-card-header d-flex justify-content-between">
                            <div class="iq-header-title col-sm-8 align-items-center">
                                <h4 class="card-title">REKAPITULASI AJUAN KAK-RAB</h4>
                            </div>
                            <div class="iq-header-toolbar col-sm-3 mt-3 d-flex justify-content-end">
                                <div class="form-group row mb-0">
                                    <span class="table-add mb-0">
                                        <div class="form-group row">
                                            <form action="{{ url('/monitoring_kak/filterTw') }}" method="GET">
                                                <div class="row mr-3">
                                                    <div class="col mr-1">
                                                        <select class="form-control filter" name="filterTw"
                                                            id="filterTw">
                                                            <option value="all">All</option>
                                                            <?php
                                                            for ($tw1 = 0; $tw1 < count($tw); $tw1++) {
                                                                        foreach ($tahun as $thn) {
                                                                            if ($thn->is_aktif == 1) {
                                                                                if ($thn->tahun == substr($tw[$tw1]->triwulan, 0, 4)) {  ?>
                                                            <option value="{{ base64_encode($tw[$tw1]->id) }}"
                                                                {{ $filtertw == $tw[$tw1]->id ? 'selected' : '' }}{{ ngecekWulan($tw[$tw1]->periode_awal, $tw[$tw1]->periode_akhir) ? 'selected' : '' }}>
                                                                {{ $tw[$tw1]->triwulan }}</option>
                                                            <?php }
                                                                            }
                                                                        }
                                                                    } ?>
                                                        </select>
                                                    </div>
                                                    <input type="submit" class="btn btn-primary btn-sm" value="Filter">
                                                </div>
                                            </form>
                                        </div>
                                    </span>
                                </div>
                            </div>
                            <div class="iq-card-header-toolbar align-items-center">
                                <div class="dropdown">
                                    <span class="dropdown-toggle text-primary" id="dropdownMenuButton5"
                                        data-toggle="dropdown">
                                        <i class="ri-more-2-fill"></i>
                                    </span>
                                    <div class="dropdown-menu dropdown-menu-right"
                                        aria-labelledby="dropdownMenuButton5">
                                        <a class="dropdown-item" href="#"><i
                                                class="ri-printer-fill mr-2"></i>Print</a>
                                        <a class="dropdown-item" href="#"><i
                                                class="ri-file-download-fill mr-2"></i>Download</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="iq-card-body">
                            <div id="table" class="table-editable">
                                <table class="table table-bordered table-responsive-md table-hover text-center">
                                    <thead class="table-info">
                                        <tr>
                                            <th rowspan="2" style="vertical-align: middle; width: 3%">No</th>
                                            <th rowspan="2" style="vertical-align: middle">Program Studi</th>
                                            <?php
                                            $nomorTw = 0;
                                            $tanggalTw = '';
                                            $tahunTw = '';
                                            $tw1 = 'Per 31 Maret ';
                                            $tw2 = 'Per 30 Juni ';
                                            $tw3 = 'Per 30 September ';
                                            $tw4 = 'Per 31 Desember ';
                                            foreach ($tw as $twname) {
                                                if ($twname->id == $filtertw) {
                                                    // ngambil nomor TW dari Filter yang dipilih
                                                    $nomorTw = substr($twname->triwulan, -1, 1);
                                            
                                                    // ngambil Tahun TW dari Filter yang dipilih
                                                    $tahunTw = substr($twname->triwulan, 0, 4);
                                            
                                                    // permisalan untuk menyesuaikan tanggal sesuai dengan nomor TW
                                                    if ($nomorTw == 1) {
                                                        $tanggalTw = $tw1;
                                                    } elseif ($nomorTw == 2) {
                                                        $tanggalTw = $tw2;
                                                    } elseif ($nomorTw == 3) {
                                                        $tanggalTw = $tw3;
                                                    } elseif ($nomorTw == 4) {
                                                        $tanggalTw = $tw4;
                                                    }
                                                }
                                            }
                                            ?>

                                            <th colspan="5">
                                                {{ 'Triwulan ' . $nomorTw . ' (' . $tanggalTw . $tahunTw . ')' }}
                                            </th>
                                        </tr>
                                        <tr>
                                            <th style="">Pagu</th>
                                            <th style="">RPD</th>
                                            <th style="">KAK - Disetujui</th>
                                            <th style="">Sisa Anggaran Pagu</th>
                                            <th style="">% Dana Digunakan</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                            $nomor = 0;
                                            $namaprodi = '';
                                            $namatw = '';
                                            for ($m = 0; $m < count($tor); $m++) {
                                                $ada = 0; //sudah diajukan apa belum

                                                // S T A T U S
                                                $torVallidasi = "";
                                                $statusTor = [
                                                    [
                                                        'tor' => '',
                                                        'status' => '',
                                                        'sudahUpload' => 0
                                                    ]
                                                ];

                                                // Mengambil data Nama Kegiatan yang SUDAH DIVALIDASI WD 1 dari tabel TOR
                                                for ($tr = 0; $tr < count($trx_status_tor); $tr++) {
                                                    if ($trx_status_tor[$tr]->id_tor == $tor[$m]->id) {
                                                        for ($s = 0; $s < count($status); $s++) {
                                                            if ($trx_status_tor[$tr]->id_status == $status[$s]->id) {
                                                                $statusTor[$ada]['tor'] = "TOR" . $tor[$m]->id;
                                                                $ada += 1;
                                                                for ($u = 0; $u < count($users); $u++) {
                                                                    if ($trx_status_tor[$tr]->create_by == $users[$u]->id) {
                                                                        for ($r = 0; $r < count($roles); $r++) {
                                                                            if ($users[$u]->role == $roles[$r]->id) {
                                                                                $statusTor[0]['status'] = $status[$s]->nama_status . " - " . $roles[$r]->name;
                                                                                for ($d = 0; $d < count($dokMemo); $d++) {
                                                                                    if ($dokMemo[$d]->id_tor  == $tor[$m]->id) {
                                                                                        $statusTor[0]['sudahUpload'] = 1;
                                                                                    }
                                                                                }
                                                                                if ($statusTor[0]['status'] == "Validasi - WD 1") {
                                                                                    
                                                                                    // Mengambil data Nama Unit (Prodi) dari tabel TOR
                                                                                    for ($v = 0; $v < count($prodi); $v++) {
                                                                                        if ($prodi[$v]->id == $tor[$m]->id_unit) {
                                                                                            $namaprodi = $prodi[$v]->nama_unit;
                                                                                            // Mengambil data Triwulan dari tabel TOR
                                                                                            for ($x = 0; $x < count($tw); $x++) {
                                                                                                if ($tw[$x]->id == $tor[$m]->id_tw) {
                                                                                                    $namatw = $tw[$x]->triwulan;
                                                                                                    
                                                $anggaran = $tor[$m]->jumlah_anggaran;
                                                $pagu_kegiatan = 0;
                                                $realisasi = 0;
                                                $sisa = 0;
                                                $persen = 0;
                                                $rpd = 0;
                                            
                                            // Ngambil data RPD sesuai filter TW yang dipilih
                                            foreach ($tw as $twname) {
                                                if ($twname->id == $filtertw) {
                                                    // echo $twname->triwulan . '<br />';
                                                    foreach ($pagu as $p) {
                                                        if ($p->id_unit == $tor[$m]->id_unit) {
                                                            // echo substr($twname->triwulan, 14, 1); //tw berapa
                                                            $nomerTw = substr($twname->triwulan, 14, 1);
                                                            // echo $twname->triwulan;
                                                            $namaTw = 'tw' . $nomerTw;
                                                            $rpd = $p->$namaTw;
                                                        }
                                                    }
                                                }
                                            }
                                            ?>
                                        <tr>
                                            <td>{{ $nomor + 1 }}</td><?php $nomor += 1; ?>
                                            <td>{{ $namaprodi }}</td>
                                            <?php
                                            $tahun = substr($tor[$m]->tgl_mulai_pelaksanaan, 0, 4);
                                            for ($j = 0; $j < count($pagu); $j++) {
                                                for ($c = 0; $c < count($tabeltahun); $c++) {
                                                    if ($tabeltahun[$c]->id == $pagu[$j]->id_tahun && $tabeltahun[$c]->tahun == $tahun) {
                                                        if ($pagu[$j]->id_unit == $tor[$m]->id_unit) {
                                                            $pagu_kegiatan = $pagu[$j]->pagu;
                                                        }
                                                    }
                                                }
                                            }
                                            
                                            ?>
                                            <td>{{ 'Rp ' . number_format($pagu_kegiatan) }}</td>
                                            <td>{{ 'Rp ' . number_format($rpd) }}</td>

                                            {{-- Ngambil Jumlah Realisasi dari nilai_total SPJ --}}
                                            @foreach ($spj as $nominal)
                                                @if ($tor[$m]->id == $nominal->id_tor)
                                                    <?php
                                                    $realisasi = $nominal->nilai_total;
                                                    
                                                    // nilai sisa = pagu - realisasi
                                                    $sisa = $anggaran - $realisasi;
                                                    // nilai persentase
                                                    $persen = ($realisasi / $pagu_kegiatan) * 100;
                                                    ?>
                                                @endif
                                            @endforeach
                                            <td>{{ 'Rp ' . number_format($realisasi) }}</td>
                                            <td>{{ 'Rp ' . number_format($sisa) }}</td>
                                            <td>{{ number_format($persen, 2) . ' %' }}</td>

                                            <?php
                                                                                                }
                                                                                            }
                                                                                        }
                                                                                    }
                                                                                }
                                                                            }
                                                                        }
                                                                    }
                                                                }
                                                            }
                                                        }
                                            ?>
                                        </tr>
                                        <?php
                                                    }
                                                }
                                            } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Footer -->
    @include('dashboards/users/layouts/footer')

</body>

</html>
