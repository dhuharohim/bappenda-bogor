<?php

namespace Database\Seeders;

use App\Models\UnitKerja;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;
class SubUnitSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $unit_1 = DB::table('unit_kerja')->where('name_unit', 'Perencanaan dan Pengembangan Pendapatan Daerah')->pluck('id');
        $unit_2 = DB::table('unit_kerja')->where('name_unit', 'Penagihan, Keberatan dan Pengawasan Pendapatan Daerah')->pluck('id');
        $unit_3 = DB::table('unit_kerja')->where('name_unit', 'Pelayanan dan Penetapan')->pluck('id');
        $unit_4 = DB::table('unit_kerja')->where('name_unit', 'Pendataan dan Penilaian')->pluck('id');
        $unit_5 = DB::table('unit_kerja')->where('name_unit', 'Sekretariat')->pluck('id');
        $faker = Faker::create();
        DB::table('sub_unit')->insert([
            'unit_id' => $faker->randomElement($unit_1),
            'name_sub' => "Pengembangan",
            
            
        ]);
        DB::table('sub_unit')->insert([
            'unit_id' => $faker->randomElement($unit_1),
            'name_sub' => "Perencanaan",
            
            
        ]);
        DB::table('sub_unit')->insert([
            'unit_id' => $faker->randomElement($unit_1),
            'name_sub' => "Kelompok Substansi Pengelolaan Sistem Informasi",
            
            
        ]);
        DB::table('sub_unit')->insert([
            'unit_id' => $faker->randomElement($unit_2),
            'name_sub' => 'Penagihan'
            
            
        ]);
        DB::table('sub_unit')->insert([
            'unit_id' => $faker->randomElement($unit_2),
            'name_sub' => 'Keberatan' 
            
            
        ]);

        DB::table('sub_unit')->insert([
            'unit_id' => $faker->randomElement($unit_2),
            'name_sub' => 'Kelompok Substansi Evaluasi dan Pengawasan'
            
            
        ]);
        DB::table('sub_unit')->insert([
            'unit_id' => $faker->randomElement($unit_3),
            'name_sub' => 'Pelayanan'
            
            
        ]);
        
        DB::table('sub_unit')->insert([
            'unit_id' => $faker->randomElement($unit_3),
            'name_sub' => 'Penetapan'
            
            
        ]);
        DB::table('sub_unit')->insert([
            'unit_id' => $faker->randomElement($unit_3),
            'name_sub' => 'Kelompok Substansi Verifikasi'
            
            
        ]);
        DB::table('sub_unit')->insert([
            'unit_id' => $faker->randomElement($unit_4),
            'name_sub' => 'Pendataan'
            
            
        ]);
        DB::table('sub_unit')->insert([
            'unit_id' => $faker->randomElement($unit_4),
            'name_sub' => 'Penilaian'
            
            
        ]);
        DB::table('sub_unit')->insert([
            'unit_id' => $faker->randomElement($unit_4),
            'name_sub' => 'Kelompok Substansi Pengolahan Data'
            
            
        ]);
        DB::table('sub_unit')->insert([
            'unit_id' => $faker->randomElement($unit_5),
            'name_sub' => 'Program dan Pelaporan'
            
            
        ]);
            
        DB::table('sub_unit')->insert([
            'unit_id' => $faker->randomElement($unit_5),
            'name_sub' => 'Umum dan Kepegawaian'
            
            
        ]);
     
        DB::table('sub_unit')->insert([
            'unit_id' => $faker->randomElement($unit_5),
            'name_sub' => 'Keuangan'
            
            
        ]);
    }
}
