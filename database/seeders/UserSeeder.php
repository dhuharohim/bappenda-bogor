<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => "admin",
            'role' => "admin",
            'email' => "admin@bapenda.com",
            'nik' => 'admin',
            'password' => bcrypt("123"),
        ]);

        DB::table('users')->insert([
            'name' => "kepala kantor",
            'role' => "kepala kantor",
            'email' => "kepalakantor@bapenda.com",
            'nik' => '01',
            'password' => bcrypt("123"),
        ]);
        DB::table('users')->insert([
            'name' => "kepala bidang",
            'role' => "kepala bidang",
            'email' => "kepalabidang@bapenda.com",
            'nik' => '02',
            'password' => bcrypt("123"),
        ]);
        DB::table('users')->insert([
            'name' => "kepala sub bidang",
            'role' => "kepala sub bidang",
            'email' => "kepalasubidang@bapenda.com",
            'nik' => '03',
            'password' => bcrypt("123"),
        ]);
    }
}
