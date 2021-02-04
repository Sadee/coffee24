<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;

class StorageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('storages')->insert([[
                'id' => 1,
                'name' => 'Coffee',
                'quantity' => '1000',
            ],
            [
                'id' => 2,
                'name' => 'Milk',
                'quantity' => '1000',
            ],
            [
                'id' => 3,
                'name' => 'Water',
                'quantity' => '1000',
            ],
            ]
        );
    }

}
