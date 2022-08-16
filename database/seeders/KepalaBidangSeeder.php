<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;

class KepalaBidangSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user_id = DB::table('users')->where('role', 'kepala bidang')->get()->pluck('id');
        $faker = Faker::create();
        $unit_id = DB::table('unit_kerja')->where('name_unit', 'Sekretariat')->pluck('id');
        $posisi_id = DB::table('posisi')->where('name_posisi', 'Kepala Bidang')->pluck('id');
        DB::table('kepala_bidang')->insert([
            'user_id' =>  $faker->randomElement($user_id),
            'unit_id' => $faker->randomElement($unit_id),
            'posisi_id' => $faker->randomElement($posisi_id),
        ]);
     
    }
}
