<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RPDSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('rpd')->insert([
            [
                'id' => '1',
                'id_pagu' => '1',
                'tw_1' => '250000000',
                'tw_2' => '250000000',
                'tw_3' => '250000000',
                'tw_4' => '250000000'
            ]
        ]);
    }
}
