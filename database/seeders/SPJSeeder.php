<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SPJSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('spj')->insert([
            [
                'id'=>1,
                'id_tor'=>1,
                'nilai_total'=>'50000000',
                'nilai_kembali'=>'700000'
            ]
        ]);
    }
}
