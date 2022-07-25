<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;
class KepalaKantorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user_id = DB::table('users')->where('id', 2)->pluck('id');
        $faker = Faker::create();
        DB::table('kepala_kantor')->insert([
            'user_id' =>  $faker->randomElement($user_id),
        ]);
    }
}
