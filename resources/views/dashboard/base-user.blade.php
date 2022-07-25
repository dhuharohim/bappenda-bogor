@extends('base')

@section('content')
    @php
        use App\Models\User;
        use Illuminate\Support\Facades\Auth;
        $user_role = Auth::user()->role;
    @endphp
    <nav class="sb-topnav navbar navbar-expand navbar-dark bg-success">
        <!-- Navbar Brand-->
        <a class="navbar-brand ps-3" href="/">{{ __('Bapenda') }}</a>
        <!-- Sidebar Toggle-->
        <button class="btn btn-link btn-outline-danger" id="sidebarToggle" href="#!"><i
                class="fas fa-bars"></i></button>
    </nav>
    @if( $user_role == "karyawan")
    

    <div id="layoutSidenav">
        <div id="layoutSidenav_nav">
            <nav class="sb-sidenav accordion" id="sidenavAccordion" style="background-color: #4F8C6E">
                <div class="sb-sidenav-menu mt-4 text-white">
                    <small class="text-white justify-content-center d-flex">{{ __('Logged as ') }}{{ Auth::user()->name }} </small>
                        <div class="sidenav-picture d-flex justify-content-center mt-2">
                            <img src="{{ asset('assets/img/users/user-3.png') }}" alt="" style="width: 40%;">
                        </div>
                        
                        <div class="sidenav-desc d-flex justify-content-center mt-2 mb-3">
                            <p>{{ $profile->fullname }}
                                <br><small>
                                    @if ($profile == NULL)
                                        
                                    @else
                                    {{ __('No.') }}{{ $profile->absen }}
                                    @endif
                               
                                </small>
                            </p>
                        </div>
                    <div class="sidenav-desc d-flex justify-content-center">
                        <div class="user-absence"></div>
                    </div>
                    

                    <div class="nav">
                        <a class="nav-link @yield('input')" href="{{ route('dashboard.data') }}" style="color:inherit">
                            <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                            {{ __('Input Kegiatan') }}
                        </a>
                        <a class="nav-link @yield('profil')" href="{{ route('dashboard.profile') }}"style="color:inherit">
                            <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                            {{ __('Profil Pegawai') }}
                        </a>

                    </div>
                </div>
                <div class="sb-sidenav-footer d-flex justify-content-center">
                    <a class="btn btn-outline-light" href="{{ route('logout') }}"
                        onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                        {{ __('Logout') }}
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </div>
            </nav>
        </div>
        @yield('main-content')

    </div>

    @elseif($user_role == "kepala bidang")
    
    <div id="layoutSidenav">
        <div id="layoutSidenav_nav">
            <nav class="sb-sidenav accordion" id="sidenavAccordion" style="background-color: #4F8C6E">
                <div class="sb-sidenav-menu text-white mt-4">
                    <small class=" justify-content-center d-flex">{{ __('Logged as ') }}{{ Auth::user()->name }} </small>
                        <div class="sidenav-picture d-flex justify-content-center mt-2">
                            <img src="{{ asset('assets/img/users/user-3.png') }}" alt="" style="width: 40%;">
                        </div>
                        
                        <div class="sidenav-desc d-flex justify-content-center mt-2 mb-3">
                            <p>{{ $profile_kepalaBidang->fullname }}
                                <br><small>
                                    @if ($profile_kepalaBidang == NULL)
                                        
                                    @else
                                    {{ __('No.') }}{{ $profile_kepalaBidang->absen }}
                                    @endif
                               
                                </small>
                            </p>
                        </div>
                    <div class="sidenav-desc d-flex justify-content-center">
                        <div class="user-absence"></div>
                    </div>
                    

                    <div class="nav">
                        <a class="nav-link @yield('profil')" href="{{ route('dashboard.data') }}" style="color: inherit">
                            <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                            {{ __('Profil Pegawai') }}
                        </a>
                        <a class="nav-link @yield('verif')" href="{{ route('verifikasi.index') }}"style="color: inherit">
                            <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                            {{ __('Verifikasi Data') }}
                        </a>
                        <a class="nav-link @yield('setting')" href="{{ route('setting.index') }}"style="color: inherit">
                            <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                            {{ __('Setting') }}
                        </a>
                        <a class="nav-link @yield('data')" href="{{ route('daftar.index') }}"style="color: inherit">
                            <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                            {{ __('Data Pegawai') }}
                        </a>

 
                    </div>
                </div>
                <div class="sb-sidenav-footer d-flex justify-content-center">
                    <a class="btn btn-outline-light" href="{{ route('logout') }}"
                        onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                        {{ __('Logout') }}
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </div>
            </nav>
        </div>
        @yield('main-content')

    </div>

    @elseif($user_role == "kepala sub bidang")
   

    <div id="layoutSidenav">
        <div id="layoutSidenav_nav">
            <nav class="sb-sidenav accordion" id="sidenavAccordion" style="background-color: #4F8C6E">
                <div class="sb-sidenav-menu text-white mt-4">
                    <small class="justify-content-center d-flex">{{ __('Logged as ') }}{{ Auth::user()->name }} </small>
                        <div class="sidenav-picture d-flex justify-content-center mt-2">
                            <img src="{{ asset('assets/img/users/user-3.png') }}" alt="" style="width: 40%;">
                        </div>
                        
                        <div class="sidenav-desc d-flex justify-content-center mt-2 mb-3">
                            <p>{{ $profile_kepalaSubBidang->fullname }}
                                <br><small>
                                    @if ($profile_kepalaSubBidang == NULL)
                                        
                                    @else
                                    {{ __('No.') }}{{ $profile_kepalaSubBidang->absen }}
                                    @endif
                               
                                </small>
                            </p>
                        </div>
                    <div class="sidenav-desc d-flex justify-content-center">
                        <div class="user-absence"></div>
                    </div>
                    

                    <div class="nav">
                        <a class="nav-link @yield('profil')" href="{{ route('dashboard.data') }}" style="color: inherit">
                            <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                            {{ __('Profil Pegawai') }}
                        </a>
                        <a class="nav-link @yield('verif')" href="{{ route('verifikasi.index') }}" style="color: inherit">
                            <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                            {{ __('Verifikasi Data') }}
                        </a>
                        <a class="nav-link @yield('setting')" href="{{ route('setting.index') }}"style="color: inherit">
                            <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                            {{ __('Setting') }}
                        </a>
                        <a class="nav-link @yield('data')" href="{{ route('daftar.index') }}"style="color: inherit">
                            <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                            {{ __('Data Pegawai') }}
                        </a>

 
                    </div>
                </div>
                <div class="sb-sidenav-footer d-flex justify-content-center">
                    <a class="btn btn-outline-light" href="{{ route('logout') }}"
                        onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                        {{ __('Logout') }}
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </div>
            </nav>
        </div>
        @yield('main-content')

    </div>
    @endif
@endsection
