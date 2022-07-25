@extends('dashboard.base-user')

@section('title')
    {{ __('Profil') }}
@endsection

@section('profil')
active
@endsection

@section('main-content')
    <div id="layoutSidenav_content">
        <div class="warp">
            <div class="container-fluid">
                <div class="card shadow mb-3 mt-4 w-auto ">
                   
                    <form action=" {{ route('kepalasubbidang.update', ['id' => $profile_kepalaSubBidang->user_id]) }}" method="post">
                        @csrf
                        
                        <div class="card-body">
                            <div class="row">
                                <div class="col">
                                    <div class="mb-3 form-group">
                                        <label for="fullname" class="form-label">{{ __('Nama Lengkap*') }}</label>
                                        <input type="text" class="form-control" id="fullname" name="fullname" value="{{ $profile_kepalaSubBidang->fullname }}"required>
                                    </div>
                                    <div class="mb-3 form-group">
                                        <label for="desc_act" class="form-label">{{ __('Tanggal Lahir*') }}</label>
                                        <input type="date" class="form-control" id="birth_date" name="birth_date"
                                            required value="{{ $profile_kepalaSubBidang->birth_date }}">
                                    </div>
                                    <div class="mb-3 form-group">
                                        <label class="form-label" for="output_act">{{ __('Agama*') }}</label>
                                        <input type="text" class="form-control" id="religion" name="religion" value="{{ $profile_kepalaSubBidang->religion }}"required>

                                    </div>
                                    <div class="mb-3 form-group">
                                        <label class="form-label" for="docs_act">{{ __('Status') }}</label>
                                        <input type="text" class="form-control" id="status" name="status" value="{{ $profile_kepalaSubBidang->status }}" required>
                                    </div>
                                    <div class="mb-3 form-group">
                                        <label class="form-label" for="docs_act">{{ __('Absen') }}</label>
                                        <input type="text" class="form-control" id="absen" name="absen"
                                            value="{{ $profile_kepalaSubBidang->absen }}">
                                    </div>

                                </div>
                                <div class="col">
                                    <div class=" form-group mb-3">
                                        <label for="quant_desc" class="form-label">{{ __('Nomor Handphone*') }}</label>
                                        <input type="number" class="form-control" id="handphone" name="handphone" value="{{ $profile_kepalaSubBidang->handphone }}" required>
                                    </div>
                                    <div class=" form-group mb-3">
                                        <label for="quant_desc" class="form-label">{{ __('Email*') }}</label>
                                        <input type="email" class="form-control" id="email" name="email" readonly
                                            value="{{ $user->email }}">
                                    </div>
                                    <div class=" form-group mb-3">
                                        <label for="quant_desc" class="form-label">{{ __('NPWP*') }}</label>
                                        <input type="number" class="form-control" id="npwp" name="npwp" value="{{ $profile_kepalaSubBidang->npwp }}"required>
                                    </div>
                                    <div class=" form-group mb-3">
                                        <label for="quant_desc" class="form-label">{{ __('NIK*') }}</label>
                                        <input type="number" class="form-control" id="nik" name="nik" value="{{ $profile_kepalaSubBidang->nik }}"required>
                                    </div>

                                </div>
                            </div>
                        </div>
                    
                </div>
                
            </div>
            <div class="container-fluid">
                <div class="card shadow mb-3 mt-4 w-auto">
                    <div class="card-header">
                        <h4>{{ __('Alamat Domisili') }}</h4>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col">
                                <div class="mb-3 form-group">
                                    <label for="kabupaten" class="form-label">{{ __('Kabupaten/Kota*') }}</label>
                                    <input type="text" class="form-control" id="kabupaten" name="kabupaten" value="{{ $profile_kepalaSubBidang->kabupaten }}" required>
                                </div>
                                <div class="mb-3 form-group">
                                    <label for="kelurahan" class="form-label">{{ __('Kelurahan*') }}</label>
                                    <input type="text" class="form-control" id="birthdate" name="kelurahan" value="{{ $profile_kepalaSubBidang->kelurahan }}" required>
                                </div>

                            </div>
                            <div class="col">
                                <div class=" form-group mb-3">
                                    <label for="kecamatan" class="form-label">{{ __('Kecamatan*') }}</label>
                                    <input type="text" class="form-control" id="kecamatan" name="kecamatan" value="{{ $profile_kepalaSubBidang->kecamatan }}" required>
                                </div>
                                <div class=" form-group mb-3">
                                    <label for="alamat_lengkap" class="form-label">{{ __('Alamat Lengkap*') }}</label>
                                    <textarea class="form-control" name="alamat_lengkap" id="alamat_lengkap">{{ $profile_kepalaSubBidang->alamat_lengkap }}</textarea>
                                </div>
                            </div>
                        </div>
                    </div>


                </div>
            </div>
      
                <div class="container-fluid">
                    <div class="card shadow-dark mb-3 mt-4 w-auto">
                        <div class="card-header">
                            <h4>{{ __('Posisi') }}</h4>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col">
                                    <div class="mb-3 form-group">
                                        <label for="unit_kerja" class="form-label">{{ __('Unit Kerja*') }}</label>
                                        <select name="unit_id" id="" class="form-control" readonly>
                                            <option value="{{ session('unit_id') }}">{{ session('name_unit') }}</option>
                                        </select>
                                    </div>


                                </div>
                                <div class="col">
                                    <div class="mb-3 form-group">
                                        <label for="posisi" class="form-label">{{ __('Sub Unit*') }}</label>
                                        <select name="sub_id" id="" class="form-control" readonly>
                                            <option value="{{ session('sub_id') }}">{{ session('name_sub') }}</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
   
            <div class="card-footer d-flex justify-content-center">
                <button class="btn btn-outline-secondary btn-block">{{ __('Submit') }}</button>
            </div>
        </form>
            {{-- @endif --}}
        </div>

    </div>
@endsection
