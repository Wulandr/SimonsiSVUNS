<div class="iq-sidebar">
    <div class="iq-navbar-logo d-flex justify-content-between">
        <a href="{{ route('home') }}" class="header-logo">
            <img src="{{ asset('findash/assets/images/logo.png') }}" class="img-fluid rounded" alt="">
        </a>
        <div class="iq-menu-bt align-self-center">
            <div class="wrapper-menu">
                <div class="main-circle"><i class="ri-menu-line"></i></div>
                <div class="hover-circle"><i class="ri-menu-line"></i></div>
            </div>
        </div>
    </div>
    <div id="sidebar-scrollbar">
        <nav class=" iq-sidebar-menu">
            <ul id="iq-sidebar-toggle" class="iq-menu">
                {{-- DASHBOARD --}}
                <li class="{{ Request::is('home') ? 'active' : '' }}">
                    <a href="{{ route('home') }}" class="iq-waves-effect ">
                        <span class="ripple rippleEffect"></span>
                        <i class="las la-home iq-arrow-left"></i><span>Dashboard</span>
                    </a>
                </li>

                {{-- MENU PERENCANAAN --}}
                <li
                    class="{{ Request::is('monitoringUsulan', 'torab', 'validasi', 'detailtor', 'steppengajuantor') ? 'active' : '' }}">
                    <a href="#perencanaan" class="iq-waves-effect collapsed" data-toggle="collapse"
                        aria-expanded="{{ Request::is('monitoringUsulan', 'torab', 'validasi', 'detailtor') ? 'true' : 'false' }}">
                        <span class="ripple rippleEffect"></span>
                        <i class="las la-clipboard iq-arrow-left"></i><span>Perencanaan</span>
                        <i class="ri-arrow-right-s-line iq-arrow-right"></i>
                    </a>

                    <ul id="perencanaan"
                        class="iq-submenu {{ Request::is('monitoringUsulan', 'torab', 'validasi', 'detailtor', 'steppengajuantor') ? 'collapse show' : 'collapse' }}"
                        data-parent="#iq-sidebar-toggle">
                        @can('ajuan_monitoring')
                            <li class="sub-menu-perencanaan {{ Request::is('monitoringUsulan') ? 'active' : '' }}">
                                <a href="{{ url('/monitoringUsulan') }}">
                                    <i class="las la-laptop-code"></i>Monitoring</a>
                            </li>
                        @endcan
                        @can('ajuan_torrab')
                            <li
                                class="sub-menu-perencanaan {{ Request::is('torab', 'steppengajuantor', 'lengkapitor') ? 'active' : '' }}">
                                <a href="{{ url('/torab') }}">
                                    <i class="las la-file-alt"></i>TOR & RAB</a>
                            </li>
                        @endcan
                        @can('ajuan_validasi')
                            <li class="sub-menu-perencanaan {{ Request::is('validasi') ? 'active' : '' }}">
                                <a href="{{ url('/validasi') }}">
                                    <i class="las la-stamp"></i>Validasi </a>
                            </li>
                        @endcan
                    </ul>
                </li>

                {{-- MENU KEUANGAN --}}
                <li
                    class="{{ Request::is('memo_cair', 'persekot_kerja', 'spj', 'lpj', 'monitoring_kak', 'upload_spj') ? 'active' : '' }}">
                    <a href="#keuangan" class="iq-waves-effect collapsed" data-toggle="collapse"
                        aria-expanded="{{ Request::is('memo_cair', 'persekot_kerja', 'spj', 'lpj', 'monitoring_kak', 'upload_spj') ? 'true' : 'false' }}">
                        <span class="ripple rippleEffect"></span>
                        <i class="las la-money-bill iq-arrow-left"></i><span>Keuangan</span>
                        <i class="ri-arrow-right-s-line iq-arrow-right"></i></a>
                    <ul id="keuangan"
                        class="iq-submenu {{ Request::is('memo_cair', 'persekot_kerja', 'spj', 'lpj', 'monitoring_kak', 'upload_spj') ? 'collapse show' : 'collapse' }}"
                        data-parent="#iq-sidebar-toggle">
                        <li class="{{ Request::is('memo_cair') ? 'active' : '' }}">
                            <a href="{{ url('/memo_cair') }}">
                                <i class="las la-money-check-alt"></i>Memo Cair</a>
                        </li>
                        <li class="{{ Request::is('persekot_kerja') ? 'active' : '' }}">
                            <a href=" {{ url('/persekot_kerja') }}">
                                <i class="las la-edit"></i>Persekot Kerja</a>
                        </li>
                        <li class="{{ Request::is('spj', 'upload_spj') ? 'active' : '' }}">
                            <a href=" {{ url('/spj') }}">
                                <i class="las la-plus-circle"></i>SPJ</a>
                        </li>
                        <li class="{{ Request::is('lpj') ? 'active' : '' }}">
                            <a href="{{ url('/lpj') }}">
                                <i class="las la-file-upload"></i>LPJ</a>
                        </li>
                        <li class="{{ Request::is('monitoring_kak') ? 'active' : '' }}">
                            <a href="{{ url('/monitoring_kak') }}">
                                <i class="las la-chalkboard"></i></i>Monitoring Rekapitulasi</a>
                        </li>
                    </ul>
                </li>

                <?php if (Auth()->user()->id_unit == 1) { ?>

                <li
                    class="{{ Request::is('tahun', 'triwulan', 'unit', 'pagu', 'mak', 'iku', 'roles', 'user') ? 'active' : '' }}">
                    <a href="#pengaturan" class="iq-waves-effect collapsed" data-toggle="collapse"
                        aria-expanded="{{ Request::is('tahun', 'triwulan', 'unit', 'pagu', 'mak', 'iku', 'roles', 'user') ? 'true' : 'false' }}">
                        <span class="ripple rippleEffect"></span>
                        <i class="las la-user-tie iq-arrow-left"></i><span>Pengaturan</span>
                        <i class="ri-arrow-right-s-line iq-arrow-right"></i>
                    </a>
                    <ul id="pengaturan"
                        class="iq-submenu {{ Request::is('tahun', 'triwulan', 'unit', 'pagu', 'mak', 'iku', 'roles', 'user') ? 'collapse show' : 'collapse' }}"
                        data-parent="#iq-sidebar-toggle">
                        @can('tahun_show')
                            <li class="{{ Request::is('tahun') ? 'active' : '' }}">
                                <a href="{{ url('/tahun') }}"><i class="las la-laptop-code"></i>Tahun</a>
                            </li>
                        @endcan
                        @can('triwulan_show')
                            <li class="{{ Request::is('triwulan') ? 'active' : '' }}">
                                <a href="{{ url('/triwulan') }}"><i class="las la-laptop-code"></i>Triwulan</a>
                            </li>
                        @endcan
                        @can('unit_show')
                            <li class="{{ Request::is('unit') ? 'active' : '' }}">
                                <a href="{{ url('/unit') }}"><i class="las la-laptop-code"></i>Unit</a>
                            </li>
                        @endcan
                        @can('pagu_show')
                            <li class="{{ Request::is('pagu') ? 'active' : '' }}">
                                <a href="{{ url('/pagu') }}"><i class="las la-laptop-code"></i>Pagu</a>
                            </li>
                        @endcan
                        @can('mak_show')
                            <li class="{{ Request::is('mak') ? 'active' : '' }}">
                                <a href="{{ url('/mak') }}"><i class="las la-laptop-code"></i>MAK</a>
                            </li>
                        @endcan
                        @can('iku_show')
                            <li class="{{ Request::is('iku') ? 'active' : '' }}">
                                <a href="{{ url('/iku') }}"><i class="las la-laptop-code"></i>IKU</a>
                            </li>
                        @endcan
                        @can('role_show')
                            <li><a href="{{ url('/roles') }}"><i class="las la-th-list"></i>Roles</a></li>
                        @endcan
                        @can('user_show')
                            <li>
                                <a href="{{ url('/user') }}"><i class="las la-id-card-alt"></i>User</a>
                            </li>
                        @endcan
                    </ul>
                </li>
                <?php } ?>

            </ul>
        </nav>
        <div class="p-3"></div>
    </div>
</div>
