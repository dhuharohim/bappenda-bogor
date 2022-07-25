<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UnitKerjaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('unit_kerja')->insert([
            'name_unit' => "Perencanaan dan Pengembangan Pendapatan Daerah",
        ]);
        DB::table('unit_kerja')->insert([
            'name_unit' => "Penagihan, Keberatan dan Pengawasan Pendapatan Daerah",
        ]);
        DB::table('unit_kerja')->insert([
            'name_unit' => "Pelayanan dan Penetapan",
        ]);
        DB::table('unit_kerja')->insert([
            'name_unit' => "Pendataan dan Penilaian",
        ]);
        DB::table('unit_kerja')->insert([
            'name_unit' => "Sekretariat",
        ]);
    }
}
