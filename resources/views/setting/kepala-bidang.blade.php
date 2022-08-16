@extends('dashboard.base-user')

@section('title')
    {{ __('Setting') }}
@endsection

@section('setting')
active
@endsection

@section('main-content')
    <div class="container">
        <div class="" id="layoutSidenav_content">
            <main>
                <div class="container-fluid px-4">
                    <h3>{{ __('Laporan Harian Kinerja Pegawai NON ASN') }}</h3>
                    <hr>
                    <!---Tambah User---->
                    <div class="card mb-4">
                        <div class="card-header">
                            {{ __('Tambah User') }}
                        </div>

                        <div class="card-body">
                            <form action="{{ route('user.store') }}" method="POST" class="user">
                                @csrf
                                <div class="row">
                                    <div class="col">
                                        <div class="mb-3 form-group">
                                            <label for="name" class="form-label">{{ __('Nama*') }}</label>
                                            <input type="text" class="form-control" id="name" name="name"
                                                required>
                                        </div>
                                        <div class="mb-3">
                                            <label for="NIK" class="form-label">{{ __('NIK*') }}</label>
                                            <input type="text" class="form-control" id="NIK" name="NIK"
                                                required placeholder="NIK">
                                        </div>
                                        <div class="mb-3">
                                            <label for="username" class="form-label">{{ __('Username*') }}</label>
                                            <input type="email" class="form-control" id="email" name="email"
                                                required placeholder="abc@gmail.com">
                                        </div>
                                        <div class="mb-3">
                                            <label for="password" class="form-label">{{ __('Password*') }}</label>
                                            <input type="password" class="form-control" id="myPassword" name="password"
                                                required>
                                            <input type="checkbox" onclick="myFunction()"> {{ __('Show Password') }}
                                        </div>
                                       
                                    </div>
                                    <div class="col">
                                        

                                        
                                        
                                        <div class="mb-3 form-group">
                                            <label for="unitKerja" class="form-label">{{ __('Unit Kerja*') }}</label>
                                            <select name="unit_id" id="unit_id" class="form-control" readonly>
                                        
                                                @foreach ($unit as $unit)
                                                    <option value={{ $unit->id }}>
                                                        {{ $unit->name_unit }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>

                                        <div class="mb-3 form-group">
                                            <label for="subUnit" class="form-label">{{ __('Sub Unit*') }}</label>
                                            <select name="sub_unit" id="sub_unit" class="form-control">
                                                <option value="">{{ __('---Pilih Sub Unit Kerja---') }}</option>
                                                @foreach ($sub_unit as $sub_unit)
                                                    <option value={{ $sub_unit->id }}>
                                                        {{ $sub_unit->name_sub }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group mb-3">
                                            <label class="form-label" for="Posisi">{{ __('Posisi') }}</label>
                                            <select name="posisi_id" id="posisi_id" class="form-control">
                                                <option value="" disabled selected class="form-control">{{ __('--Pilih Posisi--') }}</option>
                                                @foreach($posisi as $posisi)
                                                <option value="{{ $posisi->id }}" class="form-control">{{ $posisi->name_posisi }}</option>
                                               
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="mb-3 form-group">
                                            <label for="hakAkses" class="form-label">{{ __('Hak Akses*') }}</label>
                                            <select name="role" id="role" class="form-control" readonly>
                                              
                                            </select>
                                        </div>
                                        

                                    </div>
                                    <div class="card-footer d-flex justify-content-end">
                                        <button type="submit" class="btn btn-outline-dark">{{ __('Submit') }}</button>
                                    </div>
                                </div>
                            </form>

                        </div>
                    </div>
                </div>
            </main>
        </div>
    </div>
@endsection

@section('custom_js')
    <script type="text/javascript">
        $("#posisi_id").change(function() {
            if ($(this).val() == "2") {
                $('#role').append('<option selected value="kepala sub bidang">Kepala sub Bidang</option>');
            } else if ($(this).val() == "3") {
                $('#role').append('<option selected value="karyawan">Pegawai</option>');
            }
        });

        function myFunction() {
            var x = document.getElementById("myPassword");
            if (x.type === "password") {
                x.type = "text";
            } else {
                x.type = "password";
            }
        }

    </script>
@endsection
