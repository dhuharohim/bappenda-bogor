@extends('dashboard.base')

@section('title')
    {{ __('Profil') }}
@endsection

@section('profil')
    active
@endsection

@section('main-content')
    <div id="layoutSidenav_content">
        <div class="warp">
            <div class="container-fluid px-4">
                <div class="card shadow mb-3 mt-4 w-auto ">
                    <form action="{{ route('admin.update', ['id' => $profile_admin['id']]) }}" method="post">
                        @csrf
                        <div class="card-header">
                            <h4>{{ __('Profil Pegawai') }}</h4>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col">
                                    <div class="mb-3 form-group">
                                        <label for="fullname" class="form-label">{{ __('Nama Lengkap*') }}</label>
                                        <input type="text" class="form-control" id="fullname" name="fullname" required
                                            value="{{ $profile_admin->fullname }}">
                                    </div>
                                    <div class="mb-3 form-group">
                                        <label for="desc_act" class="form-label">{{ __('Tanggal Lahir*') }}</label>
                                        <input type="date" class="form-control" id="birth_date" name="birth_date"
                                            required value="{{ $profile_admin->birth_date }}">
                                    </div>
                                    <div class="mb-3 form-group">
                                        <label class="form-label" for="output_act">{{ __('Agama*') }}</label>
                                        <input type="text" class="form-control" id="religion" name="religion" required
                                            value="{{ $profile_admin->religion }}">

                                    </div>
                                    <div class="mb-3 form-group">
                                        <label class="form-label" for="docs_act">{{ __('Status') }}</label>
                                        <select name="status" id="status" class="form-control">
                                            <option value="">{{ __('---Pilih Status---') }}</option>
                                            <option value="{{ $profile_admin->status }}"> {{ $profile_admin->status }}
                                            </option>
                                            <option value="Menikah"> {{ __('Menikah') }}</option>
                                            <option value="Belum Kawin"> {{ __('Belum Kawin') }}</option>
                                        </select>
                                    </div>
                                    <div class="mb-3 form-group">
                                        <label class="form-label" for="docs_act">{{ __('Absen') }}</label>
                                        <input type="text" class="form-control" id="absen" name="absen"
                                            value="{{ $profile_admin->absen }}">
                                    </div>

                                </div>
                                <div class="col">
                                    <div class=" form-group mb-3">
                                        <label for="quant_desc" class="form-label">{{ __('Nomor Handphone*') }}</label>
                                        <input type="number" class="form-control" id="handphone" name="handphone" required
                                            value="{{ $profile_admin->handphone }}">
                                    </div>
                                    <div class=" form-group mb-3">
                                        <label for="quant_desc" class="form-label">{{ __('Email*') }}</label>
                                        <input type="email" class="form-control" id="email" name="email" readonly
                                            value="{{ $user->email }}">
                                    </div>
                                    <div class=" form-group mb-3">
                                        <label for="quant_desc" class="form-label">{{ __('NPWP*') }}</label>
                                        <input type="number" class="form-control" id="npwp" name="npwp" required
                                            value="{{ $profile_admin->npwp }}">
                                    </div>
                                    <div class=" form-group mb-3">
                                        <label for="quant_desc" class="form-label">{{ __('NIK*') }}</label>
                                        <input type="number" class="form-control" id="nik" name="nik" required
                                            value="{{ $profile_admin->nik }}">
                                    </div>

                                </div>
                            </div>
                        </div>

                </div>
                <div class="card shadow mb-3 mt-4 w-auto">
                    <div class="card-header">
                        <h4>{{ __('Alamat Domisili') }}</h4>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col">
                                <div class="mb-3 form-group">
                                    <label for="kabupaten" class="form-label">{{ __('Kabupaten/Kota*') }}</label>
                                    <select name="kabupaten" id="kabupaten" class="form-control">
                                        <option value="{{ $profile_admin->kabupaten }}">
                                            {{ $profile_admin->kabupaten }}</option>
                                        @foreach ($kota_bogor as $kota_bogor)
                                            <option value="{{ $kota_bogor->name }}">{{ $kota_bogor->name }}</option>
                                        @endforeach
                                        @foreach ($kota_jaksel as $kota_jaksel)
                                            <option value="{{ $kota_jaksel->name }}">{{ $kota_jaksel->name }}</option>
                                        @endforeach
                                        @foreach ($kota_banten as $kota_banten)
                                            <option value="{{ $kota_jaksel->name }}">{{ $kota_banten->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class=" form-group mb-3">
                                    <label for="kecamatan" class="form-label">{{ __('Kecamatan*') }}</label>
                                    <select name="kecamatan" id="kecamatan" class="form-control">
                                        <option value="{{ $profile_admin->kecamatan }}">
                                            {{ $profile_admin->kecamatan }}</option>
                                        @foreach ($kecamatan_jaksel as $kecamatan_jaksel)
                                            <option id="" value="{{ $kecamatan_jaksel->name }}">
                                                {{ $kecamatan_jaksel->name }}</option>
                                        @endforeach
                                        @foreach ($kecamatan_jaktim as $kecamatan_jaktim)
                                            <option value="{{ $kecamatan_jaktim->name }}">
                                                {{ $kecamatan_jaktim->name }}</option>
                                        @endforeach
                                        @foreach ($kecamatan_jakbar as $kecamatan_jakbar)
                                            <option value="{{ $kecamatan_jakbar->name }}">
                                                {{ $kecamatan_jakbar->name }}</option>
                                        @endforeach
                                        @foreach ($kecamatan_jakpus as $kecamatan_jakpus)
                                            <option value="{{ $kecamatan_jakpus->name }}">
                                                {{ $kecamatan_jakpus->name }}</option>
                                        @endforeach
                                        @foreach ($kecamatan_jakut as $kecamatan_jakut)
                                            <option value="{{ $kecamatan_jakut->name }}">{{ $kecamatan_jakut->name }}
                                            </option>
                                        @endforeach
                                        @foreach ($kecamatan_bogor as $kecamatan_bogor)
                                            <option value="{{ $kecamatan_bogor->name }}">{{ $kecamatan_bogor->name }}
                                            </option>
                                        @endforeach
                                        @foreach ($kecamatan_bekasi as $kecamatan_bekasi)
                                            <option value="{{ $kecamatan_bekasi->name }}">
                                                {{ $kecamatan_bekasi->name }}</option>
                                        @endforeach
                                        @foreach ($kecamatan_depok as $kecamatan_depok)
                                            <option value="{{ $kecamatan_depok->name }}">{{ $kecamatan_depok->name }}
                                            </option>
                                        @endforeach
                                        @foreach ($kecamatan_tangerang as $kecamatan_tangerang)
                                            <option value="{{ $kecamatan_tangerang->name }}">
                                                {{ $kecamatan_tangerang->name }}</option>
                                        @endforeach
                                        @foreach ($kecamatan_kotang as $kecamatan_kotang)
                                            <option value="{{ $kecamatan_kotang->name }}">
                                                {{ $kecamatan_kotang->name }}</option>
                                        @endforeach
                                        @foreach ($kecamatan_serang as $kecamatan_serang)
                                            <option value="{{ $kecamatan_serang->name }}">
                                                {{ $kecamatan_serang->name }}</option>
                                        @endforeach
                                    </select>
                                </div>


                            </div>
                            <div class="col">
                                <div class="mb-3 form-group">
                                    <label for="kelurahan" class="form-label">{{ __('Kelurahan*') }}</label>
                                    <input type="text" class="form-control" id="birthdate" name="kelurahan" required
                                        value="{{ $profile_admin->kelurahan }}">
                                </div>
                                <div class=" form-group mb-3">
                                    <label for="alamat_lengkap" class="form-label">{{ __('Alamat Lengkap*') }}</label>
                                    <textarea class="form-control" name="alamat_lengkap" id="alamat_lengkap" value="">{{ $profile_admin->alamat_lengkap }}</textarea>
                                </div>
                            </div>
                        </div>
                    </div>


                </div>
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
                                        @foreach ($unit as $unit)
                                            <option value={{ $unit->id }}>
                                                {{ $unit->name_unit }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>


                            </div>
                            <div class="col">
                                <div class="mb-3 form-group">
                                    <label for="posisi" class="form-label">{{ __('Posisi*') }}</label>
                                    <select name="name_posisi" id="name_posisi" class="form-control" readonly>
                                        @foreach ($posisi as $posisi)
                                            <option value={{ $posisi->id }}>
                                                {{ $posisi->name_posisi }}
                                            </option>
                                        @endforeach
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

@section('custom_js')
    <script>
        $("#kabupaten, #kecamatan").keyup(function() {
            update();
        });

        function update() {
            if ($("#kabupaten").val($profile->kabupaten)) {
                $("#kecamatan").val('');
            }
        }
    </script>
@endsection
