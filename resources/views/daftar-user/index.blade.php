@extends('dashboard.base')

@section('title')
    {{ __('Daftar Pegawai Bappenda') }}
@endsection

@section('daftar')
active
@endsection
@section('main-content')
@if($user_role == "admin")
    <div id="layoutSidenav_content">
        <div class="warp">
            <div class="container-fluid mt-4">
                <div class="card shadow ">
                    <form action="" method="post">
                        @csrf
                        <div class="card-header">
                            <h4>{{ __('Laporan Harian Kinerja Pegawai NON ASN') }}</h4>
                        </div>
                        <div class="card-body">
                            <button class="btn btn-outline-success pull-right mb-3 ml-3"
                                id="export_xlsx">{{ __('Export Excel') }}</button>

                            <table id="datatablesSimple">
                                <thead>
                                    <tr>
                                        <th>{{ __('No') }}</th>
                                        <th>{{ __('Pengguna') }}</th>
                                        <th>{{ __('Hak Akses') }}</th>
                                        <th>{{ __('Tindakan') }}</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($user as $user)
                                        @if ($user->name != 'admin')
                                            <tr>
                                                <td class="number"></td>
                                                <td>{{ $user->name }}</td>
                                                <td>{{ $user->role }}</td>
                                                <td>
                                                    <div class="row justify-content-center">
                                                        <div class="col">
                                                            <a class=""
                                                                href="{{ route('access.index', ['id' => $user->id]) }}"
                                                                style="color: inherit;">
                                                                <i class="fa-solid fa-pen-to-square"></i></a>

                                                        </div>
                                                        <div class="col">
                                                            <a onclick="return  confirm('are you sure?')"
                                                                href="{{ route('delete.access', ['id' => $user->id]) }}"
                                                                style="color: inherit">
                                                                <i class="fa-solid fa-trash-can"></i></a>

                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                        @endif
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                </div>

            </div>

        </div>

        </form>
        {{-- @endif --}}
    </div>

@elseif($user_role == "kepala kantor")
@livewire('daftar-pegawai')
@endif
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
    </script>
@endsection
