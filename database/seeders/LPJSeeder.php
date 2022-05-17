<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LPJSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('lpj')->insert([
            [
                'id'=>1,
                'id_tor'=>1,
                'mitra'=>'Diskominfo',
                'pks'=>'12345'
            ]
        ]);
    }
}
