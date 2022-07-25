@extends('dashboard.base-user')

@section('title')
    {{ __('Daftar Pegawai') }}
@endsection

@section('daftar')
active
@endsection
@section('main-content')
@if($user_role == "kepala bidang")
@livewire('daftar-pegawai-bidang')
@elseif($user_role == "kepala sub bidang")
@livewire('daftar-pegawai-sub')
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
