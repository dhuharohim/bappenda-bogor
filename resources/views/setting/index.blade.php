@extends('dashboard.base')

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
                                            <input type="text" class="form-control" id="NIK" name="NIK"
                                                required placeholder="NIK">
                                        </div>
                                        <div class="mb-3">
                                            <label for="username" class="form-label">{{ __('Email*') }}</label>
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


                                        <div class="form-group mb-3">
                                            <label class="form-label" for="Posisi">{{ __('Posisi') }}</label>
                                            <select name="posisi_id" id="posisi_id" class="form-control">
                                                <option value="" disabled selected>{{ __('---Pilih Posisi--') }}
                                                </option>
                                                @foreach ($posisi_admin as $posisi_admin)
                                                    <option value={{ $posisi_admin->id }}>
                                                        {{ $posisi_admin->name_posisi }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>

                                        <div class="mb-3 form-group">
                                            <label class="form-label" for="Posisi">{{ __('Unit Kerja') }}</label>
                                            <select name="unit_id" id="unit_id" class="form-control">
                                                <option value="" disabled selected>{{ __('---Pilih Unit Kerja---') }}
                                                </option>
                                              
                                            </select>
                                        </div>

                                        <div class="mb-3 form-group" id="field1">
                                            <label class="form-label" for="Posisi">{{ __('Sub Unit Kerja') }}</label>
                                            <select name="sub_unit" id="sub_unit" class="form-control">
                                                <option value="" disabled selected>--Pilih Sub Unit Kerja--</option>
                                                
                                            </select>
                                        </div>
                                        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
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

                    <!---Tambah Unit Kerja--->
                    <div class="card mb-4">
                        <div class="card-header">
                            {{ __('Tambah Unit Kerja dan Sub Unit') }}
                        </div>

                        <div class="card-body">
                            <form action="{{ route('unit.store') }}" method="POST">
                                @csrf
                                <div class="row">
                                    <div class="col">
                                        <div class="mb-3 form-group">
                                            <label for="name_unit" class="form-label">{{ __('Nama Unit Kerja*') }}</label>
                                            <input type="text" class="form-control" id="name_unit" name="name_unit"
                                                required>
                                        </div>
                                        <div class="mb-3 form-group">
                                            <label for="name_posisi" class="form-label">{{ __('Nama Sub Unit Kerja*') }}</label>
                                            <input type="text" class="form-control" id="name_sub" name="name_sub"
                                                required>
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
        $.ajax({
            url: "/api/ajax_get_kerja",
            type: 'GET',
            dataType: 'json', // added data type
            success: function(res) {
                const unit = res.unit
                unit.map(units => {
                    $('#unit_id').append("<option value='" + units.id + "'>" + units.name_unit +
                        "</option>");
                })
            }
        });

        $("#unit_id").change(function() {
            const id = $("#unit_id").val();
            console.log(id)
            $.ajax({
                url: "/api/ajax_get_sub/" + id,
                type: 'GET',
                dataType: 'json', // added data type
                success: function(res) {
                    const sub_unit = res.sub_unit
                    sub_unit.map(sub_units => {
                        $('#sub_unit').append("<option value='" + sub_units.id + "'>" +
                            sub_units.name_sub + "</option>");
                    })
                }
            });
        });
        $("#posisi_id").change(function() {
            if ($(this).val() == "1") {
                $('#field1').hide();
                $('#field1').attr('required', '');
                $('#field1').attr('data-error', 'This field is required.');
            } else {
                $('#field1').show();
                $('#field1').removeAttr('required');
                $('#field1').removeAttr('data-error');
            }
        });
        $("#posisi_id").trigger("change");

        $("#posisi_id").change(function() {
            if ($(this).val() == "1") {
                $('#role').append('<option selected value="kepala bidang">Kepala Bidang</option>');
            } else if ($(this).val() == "2") {
                $('#role').append('<option selected value="kepala sub bidang">Kepala Sub Bidang</option>');
            } else if ($(this).val() == "3") {
                $('#role').append('<option selected value="karyawan">Pegawai</option>');
            }
        });

        // $("#unit_id").change(function() {
        //     console.log($(this).val());
        //     $("#sub_unit").html('')
        //     var url = '/setting/' + $(this).val();
        //     $.ajax({
        //         type: "get",
        //         url: url,
        //         success: function(response) {
        //             $("#sub_unit").append(`<option value="" disabled selected>--Pilih Sub Unit Kerja--</option>`)
        //             response.forEach(function(params) {
        //                 $("#sub_unit").append(`<option value="${params.id}">${params.name_sub}</option>`)
        //                 // console.log(params.tipe_motor);
        //             });
        //         }
        //     });
        // });


        function myFunction() {
            var x = document.getElementById("myPassword");
            if (x.type === "password") {
                x.type = "text";
            } else {
                x.type = "password";
            }
        }
    </script>
        <script>
    

 
    </script>
@endsection
