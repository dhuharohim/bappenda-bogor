@extends('dashboard.base-user')

@section('title')
{{ __('Edit Data') }}
@endsection

@section('verif')
active
@endsection

@section('main-content')

<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <h3 class="mt-4">{{ __('Laporan Harian Kinerja Pegawai NON ASN') }}</h3>
            <hr>

            <div class="card mb-4">
                <div class="card-header">
                    <i class="fas fa-table me-1"></i>
                    {{ __('Verifikasi Bawahan') }}
                </div>
                <div class="card-body">
                    <button class="btn btn-outline-success pull-right mb-3 ml-3"
                        id="export_xlsx">{{ __('Export Excel') }}</button>

                    <a href="{{ route('dashboard.input') }}" class="btn btn-outline-primary pull-left mb-3 ml-3"> {{ __('Tambah Data') }}</a>
                    <table id="" class="table">
                        <thead>
                            <tr>
                                <th>{{ __('No') }}</th>
                                <th>{{ __('Tanggal') }}</th>
                                <th>{{ __('Aktivitas') }}</th>
                                <th>{{ __('Kuantitas/Output') }}</th>
                                <th>{{ __('Satuan Kuantitas') }}</th>
                                <th>{{ __('Waktu') }}</th>
                                <th>{{ __('Total Waktu/Hari') }}</th>
                                <th>{{ __('Status Verifikasi Atasan') }}</th>
                            </tr>
                        </thead>


                        <tbody>
                            @foreach ($data as $data)
                                <tr>
                                    <td class="number"></td>
                                    <td>{{ $data->date_act }}</td>
                                    <td>{{ $data['desc_act'] }}</td>
                                    <td>{{ $data['output_act'] }}</td>
                                    <td>{{ $data['quantitiy_act'] }}</td>
                                    <td>{{ $data['time_act'] }}</td>
                                    <td>{{ $data['quantitiy_act'] * $data['time_act'] }}</td>
                                    <td> 
                                        @if($data->status_act == "Belum Diverifikasi")
                                        <form action="{{ route('verifikasi.update', ['id'=>$data->id]) }}" method="POST">
                                            @csrf
                                            <div class="row">
                                                <div class="col">
                                                    <div class="form-group">
                                                        <select name="status_act" id="status_act" class="form-control">
                                                            <option value="Belum Diverifikasi">{{ __('Belum Diverifikasi') }}</option>
                                                            <option value="Diverifikasi">{{ __('Verifikasi') }}</option>
                                                            <option value="Ditolak">{{ __('Tolak') }}</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col" style="margin-top: 3px">
                                                    <button type="submit" class="btn btn-dark btn-sm">{{ __('Submit') }}</button>
                                                </div>
                                            </div>
                                            
                                        
                                        </form>
                                       
                                        @else
                                            @if($data->status_act == "Diverifikasi")
                                                {{ __('Diverifikasi') }}
                                            @else
                                                {{ __('Ditolak') }}
                                            @endif
                                        @endif
                                    </td>
                                  
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </main>
    <footer class="py-4 bg-light mt-auto">
        <div class="container-fluid px-4">
            <div class="d-flex align-items-center justify-content-between small">
                <div class="text-muted">Copyright &copy; Your Website 2022</div>
                <div>
                    <a href="#">Privacy Policy</a>
                    &middot;
                    <a href="#">Terms &amp; Conditions</a>
                </div>
            </div>
        </div>
    </footer>
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
</script>
@endsection