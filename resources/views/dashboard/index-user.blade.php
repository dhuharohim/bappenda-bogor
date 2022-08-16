@extends('dashboard.base-user')

@section('title')
    {{ __('Dashboard') }}
@endsection


@section('main-content')

    <div id="layoutSidenav_content">
        <main>
            <div class="container-fluid px-4">
                <h3 class="mt-4">Laporan Harian Kinerja Pegawai NON ASN</h3>
                <hr>

                <div class="card mb-4">
                    <div class="card-header">
                        @php
                            $now = Carbon\Carbon::now();
                            $now_date = Carbon\Carbon::now()->format('Y-m-d');
                            $start_alert = Carbon\Carbon::createFromTimeString('17:00');
                            $end_alert = Carbon\Carbon::createFromTimeString('23:59')->addDay();
                            $time_date = DB::table('activity')
                                ->where('date_act', $now_date)
                                ->sum(DB::raw('activity.time_act * activity.quantitiy_act'));
                            $time = Carbon\Carbon::now()->format('H:i:s');
                            $date = Carbon\Carbon::now()->format('Y-m-d');
                            
                        @endphp

                        @php
                            if (!$now) {
                                // $mi = new MultipleIterator();
                                // $mi->attachIterator(new ArrayIterator($data1->time_act));
                                // $mi->attachIterator(new ArrayIterator($data1->quantitiy_act));
                            
                                $test = [$data1->time_act, $data1->quantitiy_act];
                            
                                $total_pay = [];
                            
                                foreach ($test as $details) {
                                    $total_pay[] = $details[0] * $details[1];
                                }
                                echo $total_pay;
                            }
                            
                        @endphp
                        @if ($now->between($start_alert, $end_alert))
                            {{-- @if ($act_date == true) --}}

                            @if ($time_date < 350)
                                <div class="alert alert-danger d-flex justify-content-center" role="alert" id="submit-alert">
                                    Hari ini anda tidak memenuhi batas minimal kegiatan harian.
                                </div>
                            @else
                                <div class="alert alert-success d-flex justify-content-center" role="alert"
                                    id="submit-alert">
                                    Anda memenuhi batas minimal kegiatan harian.
                                </div>
                            @endif
                        @endif

                        <i class="fas fa-table me-1"></i>
                        Daftar Kegiatan Pegawai
                        @php
                            $mytime = Carbon\Carbon::createFromFormat('H:i', '16:00');
                            $time = Carbon\Carbon::now()->format('H:i');
                            echo $time;
                            
                            $start = Carbon\Carbon::createFromTimeString('00:00');
                            $end = Carbon\Carbon::createFromTimeString('23:59')->addDay();
                            
                        @endphp

                    </div>
                    <div class="card-body">
                        <button class="btn btn-outline-success pull-right mb-3 ml-3"
                            id="export_xlsx">{{ __('Export Excel') }}</button>
                        @if ($now->between($start, $end) && isset($cuti->date_sick)!=$now_date)
                            <a href="{{ route('dashboard.input') }}" class="btn btn-outline-primary pull-left mb-3 ml-3">
                                {{ __('Tambah Data') }}</a>
                        @elseif($now->between($start, $end) && isset($cuti->date_sick)==$now_date)
                            <button type="button" class="btn btn-outline-secondary pull-left mb-3 ml-3"
                                data-toggle="tooltip" data-placement="right"
                                title="Tambah data tidak dapat dilakukan, karena form sakit/cuti telah terisi ">
                                {{ __('Tambah Data') }}
                            </button>
                        @else
                        <button type="button" class="btn btn-outline-secondary pull-left mb-3 ml-3"
                                data-toggle="tooltip" data-placement="right"
                                title="Tambah data tidak dapat dilakukan, periode pengisian mulai dari jam 13:00 s.d 23.59">
                                {{ __('Tambah Data') }}
                            </button>
                        @endif
                        <table class="table table-bordered" id="yajra-datatable">
                            <thead>
                                <tr>
                                    <th>{{ __('No') }}</th>
                                    <th>{{ __('Tanggal') }}</th>
                                    <th>{{ __('Kegiatan Harian') }}</th>

                                    <th>{{ __('Kuantitas') }}</th>
                                    <th>{{ __('Waktu(menit)') }}</th>
                                    <th>{{ __('Total Waktu/Hari') }}</th>
                                    <th>{{ __('File Dokumentasi') }}</th>
                                    <th>{{ __('Status') }}</th>
                                    <th>{{ __('Alasan') }}</th>
                                </tr>
                            </thead>


                            <tbody>
                                @foreach ($data as $data)
                                    <tr>
                                        <td class="number"></td>
                                        <td>{{ $data['date_act'] }}</td>
                                        <td>{{ $data->desc_act }}</td>
                                        <td>{{ $data->quantitiy_act }}</td>
                                        <td>{{ $data->time_act }}</td>
                                        <td>{{ $data->time_act * $data->quantitiy_act }}</td>

                                        <td> <a href="{{ url('/act/download', $data->id) }}" class="btn btn-outline-dark btn-sm">{{ __('download') }}</a></td>

                                        <td>{{ $data->status_act }}</td>
                                        @if ($data->alasan_act == null)
                                            <td>
                                                {{ 'Tidak ada alasan' }}
                                            </td>
                                        @else
                                            <td>
                                                {{ $data->alasan_act }}
                                            </td>
                                        @endif
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
                <div class="d-flex align-items-center justify-content-center small">
                    <div class="text-muted">Supported by PT Multi Media Access | V1.0</div>
             
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
    <script>
        $(function() {

            var table = $('#yajra-datatable').DataTable({
                processing: true,
                serverSide: true,
                ajax: "{{ route('activity.list') }}",
                columns: [{
                        data: 'DT_RowIndex',
                        name: 'DT_RowIndex'
                    },
                    {
                        data: 'date_act',
                        name: 'date_act'
                    },
                    {
                        data: 'desc_act',
                        name: 'desc_act'
                    },
                    {
                        data: 'quant_desc',
                        name: 'quant_desc'
                    },
                    {
                        data: 'time_act',
                        name: 'time_act'
                    },
                    {
                        data: 'status_act',
                        name: 'status_act'
                    },
                    {
                        data: 'action',
                        name: 'action',
                        orderable: true,
                        searchable: true
                    },
                ]
            });

        });
    </script>
@endsection
