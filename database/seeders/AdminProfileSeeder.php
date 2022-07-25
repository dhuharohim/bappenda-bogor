<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class AdminProfileSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user_id = DB::table('users')->where('id', 1)->pluck('id');
        $unit_id = DB::table('unit_kerja')->pluck('id');
        $posisi_id = DB::table('posisi')->pluck('id');
        $faker = Faker::create();
        DB::table('profile_admin')->insert([
            'user_id' =>  $faker->randomElement($user_id),
            'unit_id' => $faker->randomElement($unit_id),
            'posisi_id' => $faker->randomElement($posisi_id),
        ]);
    }
}
