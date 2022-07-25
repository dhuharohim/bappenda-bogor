<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;
class KepalaSubBidangSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user_id = DB::table('users')->where('role', 'kepala sub bidang')->get()->pluck('id');
        $faker = Faker::create();
        $unit_id = DB::table('unit_kerja')->pluck('id');
        $sub_id = DB::table('sub_unit')->pluck('id');
        $posisi_id = DB::table('posisi')->where('name_posisi', 'Kepala Sub Bidang')->pluck('id');
        DB::table('kepala_sub_bidang')->insert([
            'user_id' =>  $faker->randomElement($user_id),
            'unit_id' => $faker->randomElement($unit_id),
            'posisi_id' => $faker->randomElement($posisi_id),
            'sub_id' => $faker->randomElement($sub_id),
        ]);
        DB::table('kepala_sub_bidang')->insert([
            'user_id' =>  $faker->randomElement($user_id),
            'unit_id' => $faker->randomElement($unit_id),
            'posisi_id' => $faker->randomElement($posisi_id),
            'sub_id' => $faker->randomElement($sub_id),
        ]);
    }
}
