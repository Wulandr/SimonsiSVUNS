@include('dashboards/users/layouts/script')

{{-- Fungsi untuk ngecek triwulan --}}
<?php
function ngecekWulan($awal, $akhir)
{
    if (new datetime(date('Y-m-d')) >= new datetime($awal) && new datetime(date('Y-m-d')) <= new datetime($akhir) && !empty($filtertw)) {
        return true;
    }
    return false;
}

function getIsi($data)
{
    if (!empty($data)) {
        return $data;
    } else {
        return 'Semua';
    }
}

$tahunTw = [];
$triwulanTw = [];

for ($tw1 = 0; $tw1 < count($tw); $tw1++) {
    foreach ($tahun as $thn) {
        if ($thn->is_aktif == 1) {
            $tahunTw[substr($tw[$tw1]->triwulan, 0, 4)] = substr($tw[$tw1]->triwulan, 0, 4);
            $triwulanTw[substr($tw[$tw1]->triwulan, -1, 1)] = substr($tw[$tw1]->triwulan, -1, 1);
        }
    }
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
                {{-- <div class="col-sm-12">
                    <div class="iq-card">
                        <div class="iq-card-header d-flex justify-content-between table-primary">
                            <div class="iq-header-title">
                                <h4 class="card-title">Monitoring Rekapitulasi Chart's</h4>
                            </div>
                        </div>
                        <div class="iq-card-body">
                            <div id="apex-column"></div>
                        </div>
                    </div>
                </div> --}}

                <?php
                // Ambil data Total Pagu Fakultas SV dari tabel Pagu
                $total_pagu = 0;
                foreach ($pagu as $data) {
                    $total_pagu += $data['pagu'];
                }
                
                // Ambil data Jumlah Realisasi dari SPJ
                $total_realisasi = 0;
                foreach ($spj as $nilai) {
                    $total_realisasi += $nilai['nilai_total'];
                }
                
                // Ambil data Sisa
                $total_sisa = $total_pagu - $total_realisasi;
                ?>
                <div class="col-sm-6 col-md-6 col-lg-4">
                    <div class="iq-card iq-card-block iq-card-stretch iq-card-height">
                        <div class="iq-card-body iq-box-relative">
                            <div class="iq-box-absolute icon iq-icon-box rounded-circle iq-bg-primary">
                                <i class="ri-focus-2-line"></i>
                            </div>
                            <p class="text-secondary">Total Pagu Fakultas Sekolah Vokasi</p>
                            <div class="d-flex align-items-center justify-content-between">
                                <h4><b>{{ 'Rp ' . number_format($total_pagu) }}</b></h4>
                                <div id="iq-chart-box1"></div>
                                <span class="text-primary"><b>100.00 %</b></span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-md-6 col-lg-4">
                    <div class="iq-card iq-card-block iq-card-stretch iq-card-height">
                        <div class="iq-card-body iq-box-relative">
                            <div class="iq-box-absolute icon iq-icon-box rounded-circle iq-bg-danger">
                                <i class="ri-database-2-line"></i>
                            </div>
                            <p class="text-secondary">Total Realisasi Pagu</p>
                            <div class="d-flex align-items-center justify-content-between">
                                <h4><b>{{ 'Rp ' . number_format($total_realisasi) }}</b></h4>
                                <div id="iq-chart-box2"></div>
                                <span class="text-danger">
                                    <b>{{ !empty($total_pagu) ? number_format(($total_realisasi / $total_pagu) * 100, 2, '.', '') : number_format(0) }}%
                                    </b>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-md-6 col-lg-4">
                    <div class="iq-card iq-card-block iq-card-stretch iq-card-height">
                        <div class="iq-card-body iq-box-relative">
                            <div class="iq-box-absolute icon iq-icon-box rounded-circle iq-bg-warning">
                                <i class="ri-pie-chart-2-line"></i>
                            </div>
                            <p class="text-secondary">Total Sisa Pagu</p>
                            <div class="d-flex align-items-center justify-content-between">
                                <h4><b>{{ 'Rp ' . number_format($total_sisa) }}</b></h4>
                                <div id="iq-chart-box3"></div>
                                <span
                                    class="text-warning"><b>{{ !empty($total_pagu) ? number_format(($total_sisa / $total_pagu) * 100, 2, '.', '') : number_format(0) }}%</b></span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-12">
                    <div class="iq-card">
                        <div class="iq-card-header d-flex justify-content-between table-primary">
                            <div class="iq-header-title col-sm-7 align-items-center">
                                <h4 class="card-title">REKAPITULASI AJUAN KAK-RAB</h4>
                            </div>

                            {{-- Filter Triwulan --}}
                            <div class="iq-header-toolbar col-sm-4 mt-3 d-flex justify-content-end">
                                <div class="form-group row mb-0">
                                    <span class="table-add mb-0">
                                        <div class="form-group row">
                                            <form action="{{ url('/monitoring_kak/filterTw') }}" method="GET">
                                                <div class="row mr-3">
                                                    <div class="mr-1">
                                                        <select class="form-control filter" name="tahunTw"
                                                            id="tahunTw">
                                                            <option value="">All</option>
                                                            <?php foreach ($tahunTw as $key=>$isi) { ?>
                                                            <option value="{{ base64_encode($key) }}"
                                                                {{ !empty($getTahun) && $getTahun == $isi ? 'selected' : '' }}>
                                                                {{ $isi }}
                                                            </option>
                                                            <?php } ?>
                                                        </select>
                                                    </div>
                                                    <div class="col mr-1">
                                                        <select class="form-control filter" name="triwulanTw"
                                                            id="triwulanTw">
                                                            <option value="">All</option>
                                                            <?php foreach ($triwulanTw as $isi) { ?>
                                                            <option value="{{ base64_encode($isi) }}"
                                                                {{ !empty($getTriwulan) && $getTriwulan == $isi ? 'selected' : '' }}>
                                                                {{ 'Triwulan ' . $isi }}
                                                            </option>
                                                            <?php } ?>
                                                        </select>
                                                    </div>
                                                    <input type="submit" class="btn btn-primary btn-sm" value="Filter">
                                                </div>
                                            </form>
                                        </div>
                                    </span>
                                </div>
                            </div>

                            {{-- Download dan Print --}}
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
                                <table id="datatable"
                                    class="table table-bordered table-responsive-md table-hover
                                    text-center">
                                    <thead class="bg-primary">
                                        <tr>
                                            <th rowspan="2" style="vertical-align: middle; width: 3%">No</th>
                                            <th rowspan="2" style="vertical-align: middle; width: 20%">Program Studi
                                            <th rowspan="2" style="vertical-align: middle; width: 12%">Pagu
                                                {{ getIsi($getTahun) }}</th>
                                            </th>
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
                                            
                                            // Jika Filter Triwulan adalah ALL (menampilkan semua data)
                                            if (!empty($filtertw) && is_array($filtertw)) {
                                            ?>
                                            <th colspan="6">
                                                {{ 'Laporan Tahun ' . getIsi($getTahun) . ' (Triwulan ' . getIsi($getTriwulan) . ')' }}
                                            </th>
                                        </tr>
                                        <tr>
                                            <th style="width: 12%">RPD TW 1</th>
                                            <th style="width: 12%">RPD TW 2</th>
                                            <th style="width: 12%">RPD TW 3</th>
                                            <th style="width: 12%">RPD TW 4</th>
                                            <th style="width: 12%">KAK - Disetujui</th>
                                            <th style="width: 12%">Sisa Anggaran Pagu</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $i = 1;
                                        // Pagu dialiaskan sebagai 'isi'
                                        foreach ($pagu as $isi):
                                            $pagu = number_format($isi->pagu);
                                            $unit = $isi->unit->nama_unit;
                                            $rpd1 = number_format($isi->tw1);
                                            $rpd2 = number_format($isi->tw2);
                                            $rpd3 = number_format($isi->tw3);
                                            $rpd4 = number_format($isi->tw4);
                                            $nominal = 0;
                                            $anggaran = 0;
                                            $sisa = 0;
                                            $persen = 0;
                                            // ngambil tor
                                            foreach ($isi->tor as $tor) {
                                                if (!empty($tor->spj->nilai_total) && in_array($tor->id_tw,$filtertw)) {
                                                    // mengambil nilai total dari tabel spj yang memiliki id tor
                                                    $nominal += $tor->spj->nilai_total;
                                                }
                                                $anggaran = $tor->jumlah_anggaran;
                                            }
                                            // nilai sisa = pagu - realisasi
                                            $sisa = $isi->pagu - $nominal;
                                            $sisa = number_format($sisa);
                                            // nilai persentase
                                            $persen = ($nominal / $isi->pagu) * 100;
                                            $persen = number_format($persen, 2) . ' %';
                                            // nilai realisasi anggaran dari spj
                                            $nominal = number_format($nominal);
                                            echo '<tr>';
                                            echo "<td>{$i}</td>";
                                            echo "<td>{$unit}</td>";
                                            echo "<td>Rp {$pagu}</td>";
                                            echo "<td>Rp {$rpd1}</td>";
                                            echo "<td>Rp {$rpd2}</td>";
                                            echo "<td>Rp {$rpd3}</td>";
                                            echo "<td>Rp {$rpd4}</td>";
                                            echo "<td>Rp {$nominal}</td>";
                                            echo "<td>Rp {$sisa}</td>";
                                            echo "<td>{$persen}</td>";
                                            echo '</tr>';
                                            $i++;
                                        endforeach;
                                            } 

                                            // Jika Filter Triwulan adalah Triwulan tertentu
                                            else {
                                            ?>
                                        <th colspan="5">
                                            {{ 'Triwulan ' . $nomorTw . ' (' . $tanggalTw . $tahunTw . ')' }}
                                        </th>
                                        </tr>
                                        <tr>
                                            <th>RPD</th>
                                            <th>KAK - Disetujui</th>
                                            <th>KAK - Revisi</th>
                                            <th>KAK - Review</th>
                                            <th>Sisa Anggaran Pagu</th>
                                        </tr>
                                        </thead>
                                    <tbody>
                                        <?php
                                        $i = 1;
                                        
                                        // Pagu dialiaskan sebagai 'isi'
                                        foreach ($pagu as $isi):
                                            $pagu = number_format($isi->pagu);
                                            $unit = $isi->unit->nama_unit;
                                            $field = "tw$nomorTw";
                                            $rpd = number_format($isi->$field);
                                            $nominal = 0;
                                            $anggaran = 0;
                                            $sisa = 0;
                                            $persen = 0;
                                            // ngambil tor
                                            foreach ($isi->tor as $tor) {
                                                if (!empty($tor->spj->nilai_total) && $tor->id_tw == $filtertw && !is_array($filtertw)) {
                                                    // mengambil nilai total dari tabel spj yang memiliki id tor
                                                    $nominal += $tor->spj->nilai_total;
                                                }
                                                $anggaran = $tor->jumlah_anggaran;
                                            }
                                            // nilai sisa = pagu - realisasi
                                            $sisa = $isi->pagu - $nominal;
                                            $sisa = number_format($sisa);
                                            // nilai persentase
                                            $persen = ($nominal / $isi->pagu) * 100;
                                            $persen = number_format($persen, 2) . ' %';
                                            // nilai realisasi anggaran dari spj
                                            $nominal = number_format($nominal);
                                            echo '<tr>';
                                            echo "<td>{$i}</td>";
                                            echo "<td>{$unit}</td>";
                                            echo "<td>Rp {$pagu}</td>";
                                            echo "<td>Rp {$rpd}</td>";
                                            echo "<td>Rp {$nominal}</td>";
                                            echo "<td>Rp sss </td>";
                                            echo "<td>Rp sss </td>";
                                            echo "<td>Rp {$sisa}</td>";
                                            echo '</tr>';
                                            $i++;
                                        endforeach;
                                        }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- Script Datatable --}}
    <script src="https://cdn.datatables.net/1.12.0/js/jquery.dataTables.js"></script>
    <script>
        $(document).ready(function() {
            $.noConflict();
            $('#datatable').DataTable();
        });
    </script>
    <!-- Footer -->
    @include('dashboards/users/layouts/footer')
</body>

</html>
