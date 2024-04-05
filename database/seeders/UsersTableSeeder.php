<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
        'name' => '3mPL0Ym3Nt3x(H@N53',
        'password' => Hash::make('1_35De3mPL0Ym3Nt3x(H@N53')
        ]);
    }
}
