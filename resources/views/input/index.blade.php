@extends('dashboard.base-user')

@section('title')
    {{ __('Input') }}
@endsection

@section('main-content')

@php
$date = Carbon\Carbon::now()->format('Y-m-d');
$now = Carbon\Carbon::now();
$start = Carbon\Carbon::createFromTimeString('00:00');
$end = Carbon\Carbon::createFromTimeString('23:59');
@endphp
@if($now->between($start, $end))
    <div id="layoutSidenav_content">

        <div class="container d-flex justify-content-center">

            <div class="card shadow mb-3 mt-4 ">
                <div class="card-header">
                    <a href="{{ route('dashboard.data') }}" class="btn btn-sm btn-outline-secondary mb-3">Kembali</a>
                    <h4>{{ __('Form Laporan Pengisian Kegiatan Harian') }}</h4>
                </div>
                <div class="card-body">
                    
                    <form enctype="multipart/form-data" action="{{ route('dashboard.store') }}" method="post">
                        @csrf
                        <div class="row">
                            <div class="col-md-6">
                                @php
                                    $today = Carbon\Carbon::now()->format('Y-m-d');
                                    $yest = Carbon\Carbon::now()->subDays(2)->format('Y-m-d');
    
                                @endphp
                                <div class="mb-3 form-group">
                                    <label for="date_act" class="form-label">{{ __('Tanggal Kegiatan*') }}</label>
                                    <input type="date" class="form-control" id="date_act" name="date_act" min="{{ $yest }}" max="{{ $today }}" required>
                                </div>
                                <div class="mb-3 form-group">
                                    <label for="desc_act" class="form-label">{{ __('Kegiatan Harian*') }}</label>
                                    <textarea name="desc_act" id="desc_act" rows="5" class="form-control" required></textarea>
                                    
                                </div>
                                
                                <div class="mb-3 form-group">
                                    <label class="form-label" for="docs_act">{{ __('Dokumentasi Kegiatan') }}</label>
                                    <input type="file" class="form-control" id="docs_act" name="docs_act">
                                </div>

                            </div>
                            <div class="col-md-6">
                                <div class="row">
                                    <div class="col">
                                        <div class="mb-3">
                                            <label for="quantitiy_act" class="form-label">{{ __('Kuantitas*') }}</label>
                                            <input type="number" class="form-control" id="quantitiy_act"
                                                name="quantitiy_act" required value="">
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="mb-3">
                                            <label for="time_act" class="form-label">{{ __('Waktu(menit)*') }}</label>
                                            <input type="number" class="form-control" id="time_act" name="time_act"
                                                required value="">
                                        </div>
                                    </div>
                                </div>

                                <div class="mb-3">
                                    <label for="quant_desc" class="form-label">{{ __('Satuan Kuantitas*') }}</label>
                                    <input type="text" class="form-control" id="quant_desc" name="quant_desc" required>
                                </div>

                                <div class="form-outline">
                                    <label class="form-label"
                                        for="formControlReadonly">{{ __('Waktu Kerja/Hari') }}</label>
                                    <input class="form-control" id="result" type="text" value=""
                                        aria-label="readonly input example" readonly />
                                </div>
                                <div class="form-group d-none">
                                    <input type="text" class="form-control form-control-user" name="status_act"  required value="Belum Diverifikasi">
                                </div>

                            </div>
                            <div class="card-footer d-flex justify-content-center">
                                <button type="submit" class="btn btn-success btn-block" id="submit">Submit</button>
                                
                            </div>
                        </div>
                    </form>
                    <div class="alert alert-danger d-flex justify-content-center d-none" role="alert" id="submit-alert">
                        Tidak dapat melakukan submit!
                    </div>
                </div>
               
            </div>
            
        </div>
        
    </div>
@else
<div id="layoutSidenav_content">

    <div class="container d-flex justify-content-center">
        {{__('Anda tidak memiliki akses input') }}
      
        
    </div>
    
</div>

@endif
@endsection

@section('custom_js')
    <script>
        $("#quantitiy_act, #time_act").keyup(function() {
            update();
        });

        function update() {
            $("#result").val($('#quantitiy_act').val() * $('#time_act').val());
            if($("#result").val() > 180){
                $("#result").val('Melebihi batas kegiatan');
                $("#submit").prop('disabled', true);
                $('#submit-alert').removeClass('d-none');
               
            } else{
                $("#result").val();
                $("#submit").prop('disabled', false);
                $('#submit-alert').addClass('d-none');
            }
        };
        
    </script>
@endsection
