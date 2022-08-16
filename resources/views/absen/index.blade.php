@extends('dashboard.base-user')

@section('title')
    {{ __('Absen') }}
@endsection


@section('main-content')
    <div id="layoutSidenav_content">
        <main>
            <div class="container-fluid px-4">
                <h3 class="mt-4">Laporan Harian Kinerja Pegawai NON ASN</h3>
                <hr>

                <div class="card mb-4">
                    <div class="card-header">
                        <i class="fas fa-table me-1"></i>
                        Daftar Absensi Pegawai
                        @php
                            $now = Carbon\Carbon::now();
                            $time = Carbon\Carbon::now()->format('H:i:s');
                            $date = Carbon\Carbon::now()->format('Y-m-d');
                            echo $time;
                            
                            $start = Carbon\Carbon::createFromTimeString('09:00');
                            $end = Carbon\Carbon::createFromTimeString('10:00');
                            
                        @endphp

                    </div>
                    <div class="card-body">
                        <button class="btn btn-outline-success pull-right mb-3 ml-3"
                            id="export_xlsx">{{ __('Export Excel') }}</button>
                        {{-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalsakit">
                            Buat Form Sakit
                        </button> --}}
                      
                        @if ($now->between($start, $end) && isset($absen_each->date_abs) != $date)
                            <form method="POST" action="{{ route('absen.store') }}">
                                @csrf
                                <input type="hidden" name="date_abs" value="{{ $date }}">
                                <input type="hidden" name="time_abs" value="{{ $time }}">

                                <button type="submit" id="button-submit"
                                    class="btn btn-outline-primary pull-left mb-3 ml-3">{{ __('Absen') }}</button>
                            </form>
                        @elseif(isset($absen_each->date_abs) == $date)
                            <div class="alert alert-success d-flex justify-content-center" role="alert" id="submit-alert">
                                Anda telah berhasil absen hari ini
                            </div>
                        @else
                            <button type="button" class="btn btn-outline-secondary pull-left mb-3 ml-3"
                                data-toggle="tooltip" data-placement="right"
                                title="Absen hanya dapat dilakukan pada jam 09:00 s.d 10:00">
                                {{ __('Absen') }}
                            </button>
                        @endif
                        <table id="datatablesSimple">
                            <thead>
                                <tr>
                                    <th>{{ __('No') }}</th>
                                    <th>{{ __('Tanggal Absen') }}</th>
                                    <th>{{ __('Waktu Absen') }}</th>
                                </tr>
                            </thead>


                            <tbody>
                                @foreach ($absen as $abs)
                                    <tr>
                                        <td class="number"></td>
                                        <td> {{ date('d F Y', strtotime($abs->date_abs)) }}</td>
                                        <td> {{ $abs->time_abs }}</td>

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
        $(function() {
            $('[data-toggle="tooltip"]').tooltip()
        })

        $('#modalsakit').modal('show');


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

@section('modal')

@endsection
