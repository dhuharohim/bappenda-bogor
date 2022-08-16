@extends('dashboard.base')

@section('title')
    {{ __('Form Sakit/Cuti') }}
@endsection

@section('main-content')
    <div class="container">
        <div id="layoutSidenav_content">
            <main>
                <div class="container-fluid px-4 mt-4">
                    <h3>{{ __('Laporan Harian Kinerja Pegawai NON ASN') }}</h3>
                    <hr>
                    <div class="card">
                        <div class="card-header">
                            {{ __('Form Cuti/Sakit') }}
                        </div>
                        <div class="card-body">
                            <form enctype="multipart/form-data" action="{{ route('cuti.store') }}" method="post">
                                @csrf


                                @php
                                    $today = Carbon\Carbon::now()->format('Y-m-d');
                                    $yest = Carbon\Carbon::now()
                                        ->subDays(2)
                                        ->format('Y-m-d');
                                    
                                @endphp
                                <div class="mb-3 form-group">
                                    <select name="unit" id="unit" class="form-control text-center">
                                        <option value="" disabled selected>{{ __('---Pilih Unit Kerja---') }}</option>

                                    </select>
                                </div>
                                <div class="mb-3 form-group">
                                    <select name="sub_unit" id="sub_unit" class="form-control text-center">
                                        <option value="" disabled selected>{{ __('---Pilih Sub Unit Kerja---') }}
                                        </option>
                                    </select>
                                </div>
                                <div class="mb-3 form-group">
                                    <select name="user_id" id="user_id" class="form-control text-center">
                                        <option value="" disabled selected>{{ __('---Pilih Karyawan---') }}</option>


                                    </select>
                                </div>
                                <div class="mb-3 form-group">
                                    <label for="date_act" class="form-label">{{ __('Tanggal Sakit/Cuti*') }}</label>
                                    <input type="date" class="form-control" id="date_sick" name="date_sick" required value="{{ $today }}" readonly>
                                </div>

                                <div class="mb-3 form-group">
                                    <label for="desc_act" class="form-label">{{ __('Keterangan Sakit/Cuti*') }}</label>
                                    <textarea name="keterangan_sakit" id="keterangan_sakit" rows="5" class="form-control" required></textarea>

                                </div>

                                <div class="mb-3 form-group">
                                    <label class="form-label" for="docs_act">{{ __('Dokumen penunjang') }}</label>
                                    <input type="file" class="form-control" id="docs_sick" name="docs_sick">
                                </div>

                                <div class="card-footer d-flex justify-content-center">
                                    <button type="submit" class="btn btn-success btn-block" id="submit">Submit</button>

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
    {{-- <script>
        $("#unit").change(function() {
            if ($(this).val() == "1") {

                $('#sub_unit').empty();
                $('#sub_unit').append('<option selected value="1">Pengembangan</option>');
                $('#sub_unit').append('<option selected value="2">Perencanaan</option>');
                $('#sub_unit').append(
                    '<option selected value="3">Kelompok Substansi Pengelolaan Sistem Informasi</option>');

            } else if ($(this).val() == "2") {

                $('#sub_unit').empty();
                $('#sub_unit').append('<option selected value="4">Penagihan</option>');
                $('#sub_unit').append('<option selected value="5">Keberatan</option>');
                $('#sub_unit').append(
                    '<option selected value="6">Kelompok Substansi Evaluasi dan Pengawasan</option>');


            } else if ($(this).val() == "3") {
                $('#sub_unit').empty();

                $('#sub_unit').append('<option selected value="7">Pelayanan</option>');
                $('#sub_unit').append('<option selected value="8">Penetapan</option>');
                $('#sub_unit').append('<option selected value="9">Kelompok Substansi Verifikasi</option>');

            } else if ($(this).val() == "4") {
                $('#sub_unit').empty();

                $('#sub_unit').append('<option selected value="10">Pendataan</option>');
                $('#sub_unit').append('<option selected value="11">Penilaian</option>');
                $('#sub_unit').append('<option selected value="12">Kelompok Substansi Pengelolaan Data</option>');

            } else if ($(this).val() == "5") {
                $('#sub_unit').empty();
                $('#sub_unit').append('<option selected value="10">Program dan pelaporan</option>');
                $('#sub_unit').append('<option selected value="11">Umum dan Kepegawaian</option>');
                $('#sub_unit').append('<option selected value="12">Keuangan</option>');

            }
        });
        
    </script> --}}
    <script>
        $.ajax({
            url: "/api/ajax_get_kerja",
            type: 'GET',
            dataType: 'json', // added data type
            success: function(res) {
                const unit = res.unit
                unit.map(units => {
                    $('#unit').append("<option value='" + units.id + "'>" + units.name_unit +
                        "</option>");
                })
            }
        });

        $("#unit").change(function() {
            const id = $("#unit").val();
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

        $("#sub_unit").change(function() {
            const id = $("#sub_unit").val();
            console.log(id)
            $.ajax({
                url: "/api/ajax_get_user/" + id,
                type: 'GET',
                dataType: 'json', // added data type
                success: function(res) {
                    const profile = res.profile
                    profile.map(profiles => {
                        $('#user_id').append("<option value='" + profiles.id + "'>" +
                            profiles.fullname + "</option>");
                    })
                }
            });
        });
    </script>
@endsection
