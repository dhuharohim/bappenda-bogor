@extends('dashboard.base-user')

@section('title')
    {{ __('Input') }}
@endsection

@section('main-content')
    <div id="layoutSidenav_content">
        <div class="warp">
            <div class="container-fluid px-4">
                <div class="card shadow mb-3 mt-4 w-auto ">
                    <form action="{{ route('dashboard.update', ['id' => $profile->user_id]) }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="card-header">
                            <a href="{{ route('dashboard.data') }}"
                                class="btn btn-sm btn-outline-secondary mb-3">Kembali</a>
                            <h4>{{ __('Profil Pegawai') }}</h4>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col">
                                    <div class="mb-3 form-group">
                                        <label for="fullname" class="form-label">{{ __('Nama Lengkap*') }}</label>
                                        <input type="text" class="form-control" id="fullname" name="fullname" required value="{{ $profile->fullname }}">
                                    </div>
                                    <div class="mb-3 form-group">
                                        <label for="desc_act" class="form-label">{{ __('Tanggal Lahir*') }}</label>
                                        <input type="date" class="form-control" id="birth_date" name="birth_date"
                                            required value="{{ $profile->birth_date }}">
                                    </div>
                                    <div class="mb-3 form-group">
                                        <label class="form-label" for="output_act">{{ __('Agama*') }}</label>
                                        <input type="text" class="form-control" id="religion" name="religion" required value="{{ $profile->religion }}">

                                    </div>
                                    <div class="mb-3 form-group">
                                        <label class="form-label" for="docs_act">{{ __('Status') }}</label>
                                        <input type="text" class="form-control" id="status" name="status" value="{{ $profile->status }}">
                                    </div>
                                    <div class="mb-3 form-group">
                                        <label class="form-label" for="docs_act">{{ __('Absen') }}</label>
                                        <input type="text" class="form-control" id="absen" name="absen"
                                            value="{{ $profile->absen }}">
                                    </div>

                                </div>
                                <div class="col">
                                    <div class=" form-group mb-3">
                                        <label for="quant_desc" class="form-label">{{ __('Nomor Handphone*') }}</label>
                                        <input type="number" class="form-control" id="handphone" name="handphone" required value="{{ $profile->handphone }}">
                                    </div>
                                    <div class=" form-group mb-3">
                                        <label for="quant_desc" class="form-label">{{ __('Email*') }}</label>
                                        <input type="email" class="form-control" id="email" name="email" readonly
                                            value="{{ $user->email }}">
                                    </div>
                                    <div class=" form-group mb-3">
                                        <label for="quant_desc" class="form-label">{{ __('NPWP*') }}</label>
                                        <input type="number" class="form-control" id="npwp" name="npwp" required value="{{ $profile->handphone }}">
                                    </div>
                                    <div class=" form-group mb-3">
                                        <label for="quant_desc" class="form-label">{{ __('NIK*') }}</label>
                                        <input type="number" class="form-control" id="nik" name="nik" required value="{{ $user->NIK }}" readonly>
                                    </div>
                                    @if(isset($profile->docs_contract) == null)
                                    <div class=" form-group mb-3">
                                        <label for="quant_desc" class="form-label">{{ __('Upload Dokumen Kontrak*') }}</label>
                                        <input type="file" class="form-control" id="docs_contract" name="docs_contract" >
                                    </div>
                                    @else
                                    <div class=" form-group" style="margin-top: 2rem;">
                                      
                                        <input type="file" class="form-control" id="docs_contract" name="docs_contract" style="display: none;">
                                        <label for="docs_contract">{{ $profile->docs_contract }}</label>
                                        <a href="{{ url('/contract/download', $profile->id) }}" class="btn btn-outline-dark btn-sm">{{ __('download') }}</a>
                                    </div>
                                    @endif

                                </div>
                            </div>
                        </div>
                    
                </div>
                
            </div>
            <div class="container-fluid px-4">
                <div class="card shadow mb-3 mt-4 w-auto">
                    <div class="card-header">
                        <h4>{{ __('Alamat Domisili') }}</h4>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col">
                                <div class="mb-3 form-group">
                                    <label for="kabupaten" class="form-label">{{ __('Kabupaten/Kota*') }}</label>
                                    <input type="text" class="form-control" id="kabupaten" name="kabupaten" required value="{{ $profile->kabupaten }}">
                                </div>
                                <div class="mb-3 form-group">
                                    <label for="kelurahan" class="form-label">{{ __('Kelurahan*') }}</label>
                                    <input type="text" class="form-control" id="birthdate" name="kelurahan" required value="{{ $profile->kelurahan }}">
                                </div>

                            </div>
                            <div class="col">
                                <div class=" form-group mb-3">
                                    <label for="kecamatan" class="form-label">{{ __('Kecamatan*') }}</label>
                                    <input type="text" class="form-control" id="kecamatan" name="kecamatan" required value="{{ $profile->kecamatan }}">
                                </div>
                                <div class=" form-group mb-3">
                                    <label for="alamat_lengkap" class="form-label">{{ __('Alamat Lengkap*') }}</label>
                                    <textarea class="form-control" name="alamat_lengkap" id="alamat_lengkap" value="{{ $profile->alamat_lengkap }}">{{ $profile->alamat_lengkap }}</textarea>
                                </div>
                            </div>
                        </div>
                    </div>


                </div>
            </div>
                <div class="container-fluid px-4">
                    <div class="card shadow-dark mb-3 mt-4 w-auto">
                        <div class="card-header">
                            <h4>{{ __('Posisi') }}</h4>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col">
                                    <div class="mb-3 form-group">
                                        <label for="unit_kerja" class="form-label">{{ __('Unit Kerja*') }}</label>
                                        <select name="name_unit" id="name_unit" class="form-control" readonly>
                                                <option value={{ session('unit_id')}}>
                                                    {{ session('name_unit') }}
                                                </option>
                                      
                                        </select>
                                    </div>
    
    
                                </div>
                                <div class="col">
                                    <div class="mb-3 form-group">
                                        <label for="posisi" class="form-label">{{ __('Posisi*') }}</label>
                                        <select name="name_posisi" id="name_posisi" class="form-control" readonly>
                                         
                                                <option value={{ session('sub_id') }}>
                                                    {{ session('name_sub') }}
                                                </option>
                                     
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
