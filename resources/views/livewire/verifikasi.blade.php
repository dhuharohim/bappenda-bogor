<div>
    <link href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css" rel="stylesheet" />

    <div id="layoutSidenav_content">
        <main>
            <div class="container-fluid px-4">
                <h3 class="mt-4">{{ __('Laporan Harian Kinerja Pegawai NON ASN') }}</h3>
                <hr>

                <div class="card mb-4">
                    <div class="card-header">
                        <i class="fas fa-table me-1"></i>
                        {{ __('Data Verifikasi') }}
                    </div>
                    <div class="card-body">
                        <form>
                            <label for="unit kerja" class="form-group">{{ __('Pilih Unit Kerja') }}</label>

                            <select wire:model="pilihan" name="pilihUnit" id="pilihUnit" class="form-control">
                                <option value="">{{ __('-------') }}</option>
                                @foreach ($unit as $unit)
                                    <option value="{{ $unit->id }}">{{ $unit->name_unit }}</option>
                                @endforeach
                            </select>
                            

                        </form>
                        <br>
                        <table id="datatablesSimple" class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>{{ __('No') }}</th>
                                    <th>{{ __('No. Absen') }}</th>
                                    <th>{{ __('Nama') }}</th>
                                    <th>{{ __('Unit') }}</th>
                                    <th>{{ __('Sub Unit') }}</th>
                                    <th>{{ __('Posisi') }}</th>
                                    <th>{{ __('Tanggal Aktivitas') }}</th>
                                    <th>{{ __('Aktivitas Harian') }}</th>
                                    <th>{{ __('Status') }}</th>
                                </tr>
                            </thead>


                            <tbody>

                                @foreach ($activity as $act)
                                    <tr>
                                        <td class="number"></td>
                                        <td>{{ $act['absen'] }}</td>
                                        <td>{{ $act['fullname'] }}</td>
                                        <td>{{ $act['name_unit'] }}</td>
                                        <td>{{ $act['name_sub'] }}</td>
                                        
                                        <td>{{ $act['name_posisi'] }}</td>

                                        <td>{{ $act['date_act'] }}</td>
                                        <td>{{ $act['desc_act'] }}</td>

                                        <td>{{ $act['status_act'] }}</td>

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
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js" crossorigin="anonymous"></script>

    <script>
        $(document).ready(function() {
            $('#example1').DataTable();
        });
        var a = document.getElementsByClassName("number");
        for (var i = 0; i < a.length; i++) {
            a[i].innerHTML = (i + 1) + ".";
        }
    </script>
</div>
