<div>
    <div id="layoutSidenav_content">
        <main>
            <div class="container-fluid px-4">
                <h3 class="mt-4">{{ __('Laporan Harian Kinerja Pegawai NON ASN') }} </h3>
                <hr>
    
                <div class="card mb-4">
                    <div class="card-header">
                        <i class="fas fa-table me-1"></i>
                        {{ __('Data Verifikasi Bawahan Bidang') }} {{ session('name_unit') }}
                    </div>
                    
    
                    <div class="card-body">
                        <form>
                            <label for="unit kerja" class="form-group">{{ __('Pilih Sub Unit Kerja') }}</label>

                            <select wire:model="pilihan_1" name="pilihUnit" id="pilihUnit" class="form-control">
                                <option value="">{{ __('-------') }}</option>
                                @foreach ($sub as $sub)
                                    <option value="{{ $sub->id }}">{{ $sub->name_sub }}</option>
                                @endforeach
                            </select>

                        </form>
                        <button class="btn btn-outline-success pull-right mb-3 ml-3"
                            id="export_xlsx">{{ __('Export Excel') }}</button>
                        <table id="datatablesSimple" class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>{{ __('No') }}</th>
                                    <th>{{ __('No. Absen') }}</th>
                                    <th>{{ __('Nama') }}</th>
                                    <th>{{ __('Posisi') }}</th>
                                    <th>{{ __('Tanggal Aktivitas') }}</th>
                                    <th>{{ __('Aktivitas Harian') }}</th>
                                    <th>{{ __('Status') }}</th>
                                    <th>{{ __('Alasan') }}</th>
                                </tr>
                            </thead>
    
    
                            <tbody>
                                @foreach ($activity as $act)
                                    <tr>
                                        <td class="number"></td>
                                        <td>{{ $act['absen']}}</td>
                                        <td>{{ $act['fullname'] }}</td>
                                        <td>{{ $act['name_posisi'] }}</td>
                                        <td>{{ $act['date_act'] }}</td>
                                        <td>{{ $act['desc_act'] }}</td>
                                        @if($act['alasan_act'] != NULL)
                                        <td>{{ __('') }}</td>
                                        @else
                                        <td>{{ $act['alasan_act'] }}</td>
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
