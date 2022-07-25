<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PosisiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('posisi')->insert([
            'name_posisi' => "Kepala Bidang",
        ]);
        DB::table('posisi')->insert([
            'name_posisi' => "Kepala Sub Bidang",
        ]);
        DB::table('posisi')->insert([
            'name_posisi' => "Anggota",
        ]);
    }
}
