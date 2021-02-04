<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;

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
            'name' => "Samurdhi",
            'email' => 'samurdhi@coffee24.test',
            'password' => \Hash::make('password'),
        ]);
    }

}
