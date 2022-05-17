<?php

//komponen jadwal di tor sudah ada ? '' : 'disable button Ajukan'
use Illuminate\Support\Facades\Auth;
use PHPUnit\Framework\Constraint\Count;

$buttonVerif = "Tidak";
for ($kj = 0; $kj < count($komponen_jadwal); $kj++) {
    if ($komponen_jadwal[$kj]->id_tor == $tor[$t]->id) {
        $buttonVerif = "Ada";
    }
} ?>

<?php
$pengajuan = 0;
$i = 0;
$revisi = 0;
$validasi = 0;
$detail = "Lengkapi Data";
$jumlahval = 0;
$name = [
    'status' => [],
    'pembuat' => []
];
for ($trx1 = 0; $trx1 < count($trx_status_tor); $trx1++) {
    if ($trx_status_tor[$trx1]->id_tor == $tor[$t]->id) {
        $jumlahval += 1;
        for ($st1 = 0; $st1 < count($status); $st1++) {
            if ($trx_status_tor[$trx1]->id_status == $status[$st1]->id) {
                for ($u5 = 0; $u5 < count($user); $u5++) {
                    if ($trx_status_tor[$trx1]->create_by == $user[$u5]->id) {
                        for ($r5 = 0; $r5 < count($role); $r5++) {
                            if ($user[$u5]->role == $role[$r5]->id) {
                                $name['status'][$i] = $status[$st1]->nama_status;
                                $name['pembuat'][$i]  = $role[$r5]->name;
                            }
                        }
                    }
                }
                if ($status[$st1]->nama_status == "Proses Pengajuan") {
                    $pengajuan += 1;
                    $detail = "Detail";
                }
                if ($status[$st1]->nama_status == "Validasi" && $name['pembuat'][$i] == "WD 3") {
                    $validasi += 1;
                }
                if ($status[$st1]->nama_status == "Validasi" && $name['pembuat'][$i] == "WD 2") {
                    $validasi += 1;
                }
                if ($status[$st1]->nama_status == "Validasi" && $name['pembuat'][$i] == "WD 1") {
                    $validasi += 1;
                }
                $i += 1;
            }
        }
    }
}

for ($st3 = 0; $st3 < count($name['status']); $st3++) {
    $name['status'][$st3];
    if ($name['status'][$st3] == "Revisi") {
        $revisi = 1;
    }
}
?>


<!-- ------------------------------------------ A K S E S N A M A P I C ----------------------------------- -->
<!-- <h6>{{$tor[$t]->nama_pic. " ? " . Auth::user()->name}}</h6> -->
<?php
foreach ($role as $roles) {
    if ($roles->id == Auth::user()->role) {
        $RoleLogin = $roles->name;
    }
}
?>


<!-- -------------------------------------------------- B U T T O N ------------------------------------------ -->

<a href="{{url('/lengkapitor/'.  $tor[$t]->id)}}">
    <button class="badge badge-warning rounded">{{ $detail}}</button>
</a>

<!-- Jika belum diajukan oleh prodi atau pic, dan nama pic sama dengan user login, maka tampilkan aksi -->
<?php if ($pengajuan == 0 && ($tor[$t]->nama_pic == Auth::user()->name || $RoleLogin == "Prodi" || $RoleLogin == "Admin")) { ?>
    @can('tor_update')
    <a href="{{url('/tor/update/'.$tor[$t]->id)}}" data-toggle="tooltip" title="Update">
        <button class="badge badge-primary rounded">
            <i class="fa fa-edit"></i>
        </button>
    </a>
    @endcan
    @can('tor_delete')
    <a href="{{url('/tor/delete/'.$tor[$t]->id)}}" class="button tor-confirm" data-toggle="tooltip" title="Delete">
        <button class="badge badge-primary rounded">
            <i class="fa fa-trash"></i>
        </button>
    </a>
    @endcan
    <!-- <button class="search-toggle iq-waves-effect badge badge-primary rounded" data-toggle="modal" title="Detail TOR" data-original-title="Detail TOR" data-target="#detail_tor<?= $tor[$t]->id ?>"><i class="fa fa-tasks"></i><br />
</button> -->
    @can('rab_create')
    <button class="search-toggle iq-waves-effect badge badge-info rounded" data-toggle="modal" title="Tambah RAB" data-original-title="Tambah RAB" data-target="#tambah_rab<?= $tor[$t]->id ?>"><i class="fa fa-plus-circle"></i><br />
    </button>
    @endcan
    <?php for ($sr = 0; $sr < count($rab); $sr++) {
        if ($rab[$sr]->id_tor == $tor[$t]->id) { ?>
            @can('tor_ajuan')
            <button class="badge badge-danger rounded" data-toggle="modal" data-target="#veriftor{{$tor[$t]->id}}" {{$buttonVerif == "Tidak" ? 'disabled' : ''}}>Ajukan TOR & RAB
            </button>
            @endcan
    <?php }
    } ?>
<?php } ?>
<?php if ($pengajuan >= 1) { ?>
    <button class="badge badge-success rounded" data-toggle="modal" data-target="#veriftor{{$tor[$t]->id}}">Status
    </button>
<?php } ?>
<?php if ($revisi >= 1 && $jumlahval == 4 && $tor[$t]->jenis_ajuan == "Baru") { ?>
    <a href="{{url('/tor/update/'.  $tor[$t]->id)}}"><button class="badge badge-danger rounded">Segera Revisi
        </button></a>
<?php } ?>
<?php if ($tor[$t]->jenis_ajuan == "Perbaikan" && $pengajuan == 1) { ?>
    @can('tor_ajuan')
    <button class="badge badge-danger rounded" data-toggle="modal" data-target="#veriftor{{$tor[$t]->id}}" {{$buttonVerif == "Tidak" ? 'disabled' : ''}}>Ajukan TOR & RAB
    </button>
    @endcan
<?php } ?>
<?php if ($validasi == 3) { ?>
    <badge class="badge badge-info rounded" data-toggle="modal"> SELESAI
    </badge>
<?php }
if ($validasi < 3) { ?>
    <!-- <badge class="badge badge-info rounded" data-toggle="modal"> {{$validasi}}
    </badge> -->
<?php } ?>


<!-- <button class="badge badge-info" data-toggle="modal" data-placement="top" data-target="#detail_tor{{$tor[$t]->id}}">
    <i class="fa fa-tasks"></i>
</button> -->