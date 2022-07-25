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
                                            <select name="sub_unit" id="sub_unit" class="form-control" readonly>
                                            
                                                @foreach ($sub_unit as $sub_unit)
                                                    <option value={{ $sub_unit->id }}>
                                                        {{ $sub_unit->name_sub }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group mb-3">
                                            <label class="form-label" for="Posisi">{{ __('Posisi') }}</label>
                                            <select name="posisi_id" id="posisi_id" class="form-control" readonly>
                                                <option value="3">{{ __('Anggota') }}</option>
                                            </select>
                                        </div>
                                        <div class="mb-3 form-group">
                                            <label for="hakAkses" class="form-label">{{ __('Hak Akses*') }}</label>
                                            <select name="role" id="role" class="form-control" readonly>
                                                <option value="karyawan">{{ __('Pegawai') }}</option>
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
        var a = document.getElementsByClassName("number");
        for (var i = 0; i < a.length; i++) {
            a[i].innerHTML = (i + 1) + ".";
        }

        function html_to_xlsx(type) {
            var data = document.getElementById('datatablesSimple');
            var file = XLSX.utils.table_to_book(data, {
                sheet: "sheet1"
            });

            XLSX.write(file, {
                bookType: type,
                bookSST: true,
                type: 'base64'
            });
            XLSX.writeFile(file, 'file.' + type);
        }
        const export_xlsx = document.getElementById('export_xlsx');
        export_xlsx.addEventListener('click', () => {
            html_to_xlsx('xlsx');
        });

        function myFunction() {
            var x = document.getElementById("myPassword");
            if (x.type === "password") {
                x.type = "text";
            } else {
                x.type = "password";
            }
        }

        function change1(){
                var s1 = document.getElementById('posisi_id');
                var s2 = document.getElementById('role');

                if(s1.value == 1){
                    s2.value == 
                }
        }
    </script>
@endsection
