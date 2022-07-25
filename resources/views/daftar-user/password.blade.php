@extends('dashboard.base')

@section('title')
{{ __('Change Password') }}
@endsection

@section('daftar')
active
@endsection

@section('main-content')
<div id="layoutSidenav_content">
    <div class="warp">
        <div class="container-fluid mt-4">
            <a href="{{ route('access.index', ['id' => $user->id])  }}"
                            class="btn btn-sm btn-outline-secondary mb-3">{{ __('Kembali') }}</a>
            <div class="card shadow ">
                <form action="{{ route('password.store', ['id' => $user->id]) }}" method="post">
                    @csrf
                    <div class="card-header">
                        
                        <h5>{{ __('Ubah Password User Login') }}</h5>
                    </div>
                    <div class="card-body">
                        <div class="mb-3">
                            <label for="oldPasswordInput" class="form-label">Old Password</label>
                            <input name="old_password" type="password" class="form-control @error('old_password') is-invalid @enderror" id="oldPasswordInput"
                                placeholder="Old Password">
                            @error('old_password')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="newPasswordInput" class="form-label">New Password</label>
                            <input name="new_password" type="password" class="form-control @error('new_password') is-invalid @enderror" id="newPasswordInput"
                                placeholder="New Password">
                            @error('new_password')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="confirmNewPasswordInput" class="form-label">Confirm New Password</label>
                            <input name="new_password_confirmation" type="password" class="form-control" id="confirmNewPasswordInput"
                                placeholder="Confirm New Password">
                        </div>

                   
                
                    </div>
                    <div class="card-footer d-flex justify-content-center">
                        <button class="btn btn-outline-secondary btn-block">{{ __('Submit') }}</button>
                    </div>
                
            </div>
            
        </div>
        
    </form>
        {{-- @endif --}}
    </div>

</div>

@endsection