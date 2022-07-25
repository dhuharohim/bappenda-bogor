<div>
    <div>
        <div id="layoutSidenav_content">
            <main>
                <div class="container-fluid px-4">
                    <h3 class="mt-4">{{ __('Laporan Harian Kinerja Pegawai NON ASN') }}</h3>
                    <hr>
        
                    <div class="card mb-4">
                        <div class="card-header">
                            <i class="fas fa-table me-1"></i>
                            {{ __('Data Pegawai dalam Sub Unit') }} {{ session('name_sub') }}
                        </div>
                        <div class="card-body">
                            <br>
                            <table id="datatablesSimple" class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th>{{ __('No') }}</th>
                                        <th>{{ __('No.absen') }}</th>
                                        <th>{{ __('Nama') }}</th>
                                        <th>{{ __('Tanggal Lahir') }}</th>
                                        <th>{{ __('NPWP') }}</th>
                                        <th>{{ __('Unit Kerja') }}</th>
                                        <th>{{ __('Sub Unit') }}</th>
                                        <th>{{ __('Posisi') }}</th>
                            
                                    </tr>
                                </thead>
        
        
                                <tbody>
                                    @foreach($profile as $pro)
                                        <tr>
                                            <td class="number"></td>
                                            <td>{{ $pro['absen'] }}</td>
                                            <td>{{ $pro['fullname'] }}</td>
                                            <td>{{ $pro['birth_date'] }}</td>
                                            <td>{{ $pro['npwp'] }}</td>
                                            <td>{{ $pro['name_unit'] }}</td>
                                            <td>{{ $pro['name_sub'] }}</td>
                                            <td>{{ $pro['name_posisi'] }}</td>
                                            
        
                                        </tr>
                                    @endforeach
                                    {{-- <script>
                                        var a = document.getElementsByClassName("number");
                                        for (var i = 0; i < a.length; i++) {
                                            a[i].innerHTML = (i + 1) + ".";
                                        }
                                    </script> --}}
        
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
    </div>
    
</div>
