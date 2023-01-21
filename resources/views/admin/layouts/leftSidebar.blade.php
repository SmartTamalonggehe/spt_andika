<div class="vertical-menu">

    <div data-simplebar class="h-100">

        <!-- User details -->
        <div class="user-profile text-center mt-3">
            <div class="">
                <img src="{{ asset('assets/images/logo/papua-1.png') }}" alt="" class="avatar-md rounded-circle">
            </div>
            <div class="mt-3">
                @hasrole('ketua')
                    <h4 class="font-size-16 mb-1">Kepala Dinas</h4>
                @endhasrole
                @hasrole('pegawai')
                    <h4 class="font-size-16 mb-1">{{ Auth::user()->pegawai->nama }}</h4>
                @else
                    <h4 class="font-size-16 mb-1">{{ Auth::user()->name }}</h4>
                @endhasrole

            </div>
        </div>

        <!--- Sidemenu -->
        <div id="sidebar-menu">
            <!-- Left Menu Start -->
            <ul class="metismenu list-unstyled" id="side-menu">
                <li class="menu-title">Menu</li>

                <li>
                    <a href="{{ route('admin.dashboard') }}" class="waves-effect">
                        <i class="ri-dashboard-line"></i>
                        <span>Dashboard</span>
                    </a>
                </li>
                @hasanyrole('ketua|kepegawaian')
                    <li class="@yield('gaji')">
                        <a href="javascript: void(0);" class="has-arrow waves-effect">
                            <i class="ri-profile-line"></i>
                            <span>Master Data</span>
                        </a>
                        <ul class="sub-menu" aria-expanded="false">
                            @hasanyrole('ketua|kepegawaian')
                                <li><a href="{{ route('admin.pegawai') }}">Pegawai</a></li>
                            @endhasanyrole
                            @hasrole('kepegawaian')
                                <li><a href="{{ route('admin.akun') }}">Akun</a></li>
                            @endhasrole
                            {{-- @hasanyrole('keuangan|ketua')
                                <li><a href="{{ route('admin.gaji') }}">Gaji</a></li>
                            @endhasanyrole --}}
                        </ul>
                    </li>
                @endhasanyrole

                @hasanyrole('ketua|kepegawaian|pegawai')
                    <li class="@yield('surat')">
                        <a href="javascript: void(0);" class="has-arrow waves-effect">
                            <i class="ri-pencil-ruler-2-line"></i>
                            <span>Surat</span>
                        </a>
                        <ul class="sub-menu" aria-expanded="false">
                            <li><a href="{{ route('admin.surat', 'SPT') }}">SPT</a></li>
                            <li><a href="{{ route('admin.surat', 'SPPD') }}">SPPD</a></li>
                        </ul>
                    </li>
                @endhasanyrole

                @hasanyrole('pegawai')
                    <li>
                        <a href="{{ route('admin.uploadDokumen') }}" class="waves-effect">
                            <i class="ri-upload-line"></i>
                            <span>Upload Dokumen</span>
                        </a>
                    </li>
                @endhasanyrole

                @hasanyrole('keuangan|ketua')
                    <li class="@yield('kwitansi')">
                        <a href="javascript: void(0);" class="has-arrow waves-effect">
                            <i class="ri-vip-crown-2-line"></i>
                            <span>Kwitansi</span>
                        </a>
                        <ul class="sub-menu" aria-expanded="false">
                            <li><a href="{{ route('admin.kwitansi') }}">Rincian Kwitansi</a></li>
                        </ul>
                    </li>
                @endhasanyrole
            </ul>
        </div>
        <!-- Sidebar -->
    </div>
</div>
