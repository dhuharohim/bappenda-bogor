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
        <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i
                class="fas fa-bars"></i></button>
    </nav>
    @if ($user_role == 'admin')
        

        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion" id="sidenavAccordion" style="background-color: #4F8C6E">
                    <div class="sb-sidenav-menu text-white">
                        <small class="justify-content-center d-flex mt-4">{{ __('Logged as ') }}{{ Auth::user()->name }} </small>
                        <div class="sidenav-picture d-flex justify-content-center mt-2">
                            <img src="{{ asset('assets/img/users/user-3.png') }}" alt="" style="width: 40%;">
                        </div>
                        
                        <div class="sidenav-desc d-flex justify-content-center mt-2 mb-3">
                            <p>{{ $profile_admin->fullname }}
                                <br><small>
                                    @if ($profile_admin == NULL)
                                        
                                    @else
                                    {{ __('No.') }}{{ $profile_admin->absen }}
                                    @endif
                               
                                </small>
                            </p>
                        </div>
                        <div class="sidenav-desc d-flex justify-content-center">
                            <div class="user-absence"></div>
                        </div>

                        <div class="nav">
                            <a class="nav-link @yield('profil')" href="{{ route('admin.home') }}" style="color:inherit">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                {{ __('Profil Pegawai') }}
                            </a>
                            <a class="nav-link @yield('verif')" href="{{ route('verifikasi.index') }}" style="color:inherit">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                {{ __('Verifikasi') }}
                            </a>
                            <a class="nav-link @yield('setting')" href="{{ route('setting.index') }}"style="color:inherit">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                {{ __('Setting') }}
                            </a>
                            <a class="nav-link @yield('daftar')" href="{{ route('daftar.index') }}"style="color:inherit">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                {{ __('Daftar User') }}
                            </a>
                            <a class="nav-link @yield('formSakit')" href="{{ route('sakit.index') }}"style="color:inherit">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                {{ __('Form Cuti/Sakit') }}
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
    @elseif($user_role == 'kepala kantor')
    

    <div id="layoutSidenav">
        <div id="layoutSidenav_nav">
            <nav class="sb-sidenav accordion" id="sidenavAccordion" style="background-color:#4F8C6E">
                <div class="sb-sidenav-menu text-white mt-4">
                    <small class="justify-content-center d-flex">{{ __('Logged as ') }}{{ Auth::user()->name }} </small>
                    <div class="sidenav-picture d-flex justify-content-center mt-2">
                        <img src="{{ asset('assets/img/users/user-3.png') }}" alt="" style="width: 40%;">
                    </div>
                    
                    <div class="sidenav-desc d-flex justify-content-center mt-2 mb-3">
                        <p>{{ $profile_kepalaKantor->fullname }}
                            <br><small>
                                @if ($profile_kepalaKantor == NULL)
                                    
                                @else
                                {{ __('No.') }}{{ $profile_kepalaKantor->absen }}
                                @endif
                           
                            </small>
                        </p>
                    </div>
                    <div class="sidenav-desc d-flex justify-content-center">
                        <div class="user-absence"></div>
                    </div>

                    <div class="nav">
                        <a class="nav-link @yield('profil')" href="{{ route('admin.home') }}" style="color:inherit">
                            <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                            {{ __('Profil') }}
                        </a>
                        <a class="nav-link @yield('verif')" href="{{ route('verifikasi.index') }}"style="color:inherit">
                            <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                            {{ __('Data Verifikasi') }}
                        </a>
                        <a class="nav-link @yield('daftar')" href="{{ route('daftar.index') }}"style="color:inherit">
                            <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                            {{ __('Daftar Pegawai Bappenda') }}
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
