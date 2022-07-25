@extends('dashboard.base-user')

@section('title')
{{ __('Verifikasi') }}
@endsection

@section('verif')
active
@endsection

@section('main-content')
<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <h3 class="mt-4">{{ __('Laporan Harian Kinerja Pegawai NON ASN') }} </h3>
            <hr>

            <div class="card mb-4">
                <div class="card-header">
                    <i class="fas fa-table me-1"></i>
                    {{ __('Verifikasi Bawahan sub Bidang') }} {{ session('name_sub') }} {{ __('Pada Unit Kerja') }} {{ session('name_unit') }}
                </div>
                <div class="card-body">
                    <button class="btn btn-outline-success pull-right mb-3 ml-3"
                        id="export_xlsx">{{ __('Export Excel') }}</button>
                    <table id="datatablesSimple">
                        <thead>
                            <tr>
                                <th>{{ __('No') }}</th>
                                <th>{{ __('No. Absen') }}</th>
                                <th>{{ __('Nama') }}</th>
                                <th>{{ __('Posisi') }}</th>
                                <th>{{ __('Aktivitas Harian') }}</th>
                                <th>{{ __('Tindakan') }}</th>
                            </tr>
                        </thead>


                        <tbody>
                            @foreach ($profile as $profile)
                                <tr>
                                    <td class="number"></td>
                                    <td>{{ $profile['absen']}}</td>
                                    <td>{{ $profile['fullname'] }}</td>
                                    <td>{{ $profile['name_posisi'] }}</td>
                                    <td>{{ $profile['desc_act'] }}</td>
                                    <td>
                                        <a href="{{ route('verifikasi.show', ['id' => $profile['user_id']]) }}"style="color: inherit" class="btn btn-outline-success ">
                                            <i class="fa-solid fa-pen-to-square" ></i>
                                        </a>
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