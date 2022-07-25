@extends('dashboard.base')

@section('title')
{{ __('Access') }}
@endsection
@section('daftar')
active
@endsection

@section('main-content')
<div id="layoutSidenav_content">
    <div class="warp">
        <div class="container-fluid mt-4">
            <a href="{{ route('daftar.index') }}"
                            class="btn btn-sm btn-outline-secondary mb-3">{{ __('Kembali') }}</a>
            <div class="card shadow ">
                <form action="{{ route('update.access', ['id' => $user->id]) }}" method="post">
                    @csrf
                    <div class="card-header">
                        
                        <h4>{{ __('Ubah User Login') }}</h4>
                    </div>
                    <div class="card-body">
                                <div class="mb-3 form-group">
                                    <label for="fullname" class="form-label">{{ __('Pengguna*') }}</label>
                                    <input type="email" class="form-control" id="email" name="email" required value="{{ $user->email}}">
                                </div>

                                <div class="mb-3 form-group">
                                    <label class="form-label" for="output_act">{{ __('Hak Akses*') }}</label> <br>
                                    <select name="role" id="role" class="form-control">
                                        <option value="{{ $user->role }}">{{ $user->role }}</option>
                                        <option value="karyawan">{{ __('Karyawan') }}</option>
                                        <option value="admin">{{ __('Admin') }}</option>
                                    </select>

                                </div>
                                <div class="mb-3 form-group">
                                    <a href="{{ route('password.change', ['id' => $user->id]) }}" class="btn btn-outline-success btn-sm">{{ __('Ubah Password') }}</a>
                                </div>

                   
                
                    </div>
                    <div class="card-footer d-flex justify-content-center">
                        <button class="btn btn-outline-secondary btn-block">{{ __('Submit') }}</button>
                    </div>
                
            </div>
            
        </div>
        
    </form>
    </div>

</div>
@endsection