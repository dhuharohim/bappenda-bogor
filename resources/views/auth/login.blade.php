@extends('layouts.auth')

@section('title', 'Login')

@section('main-content')
    <section class="gradient align-content-center" style="margin-top:10%">
        <div class="container-fluid  align-content-center" style="">
            <div class="row d-flex justify-content-center align-items-center">
                <div class="col-md-7">
                    <div class="card rounded-3" style="background:none; border:none" style="margin-top: 50%">
                        <div class="row g-0">
                            <div class="col-md-0">
                                <div class="card-body">
                                    <img src="{{ asset('assets/img/bappenda-logo.png') }}" alt="" class="mx-auto d-block"style="width:30%;">
                                    <div class="mt-2">
                                        <h1 class="font-weight-bold text-white text-center" style="text-shadow: 2px 2px #000000;">{{ __('Laporan Harian') }}
                                        </h1>
                                        <h1 class="font-weight-bold text-white text-center" style="text-shadow: 2px 2px #000000;">
                                            {{ __('Kinerja Pegawai Non ASN') }}
                                        </h1>
                                    </div>
                                    
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="col-md-4">
                        <div class="card rounded-3 shadow-lg">
                            <div class="card-header">
                                <div class="text-center">
                                    <h1 class="h4 text-gray-900">{{ __('Login') }}</h1>
                                </div>

                                @if ($errors->any())
                                    <div class="alert alert-danger border-left-danger" role="alert">
                                        <ul class="pl-4 my-2">
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif


                            </div>
                            <div class="card-body">
                                <form method="POST" action="{{ route('login') }}" class="user">
                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">

                                    <div class="form-group">
                                        <input type="text" class="form-control form-control-user" name="NIK"
                                            placeholder="{{ __('NIK') }}" value="{{ old('NIK') }}" required
                                            autofocus>
                                    </div>

                                    <div class="form-group">
                                        <input type="password" class="form-control form-control-user" name="password"
                                            placeholder="{{ __('Password') }}" required>
                                    </div>
                            </div>
                            <div class="card-footer">
                                <div class="form-group">
                                    <button type="submit" class="btn btn-success form-control">
                                        {{ __('Login') }}
                                    </button>
                                </div>
                            </div>
                            </form>
                        </div>



                </div>
            </div>
        </div>
    </section>

    


@endsection
