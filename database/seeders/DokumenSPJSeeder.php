<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DokumenSPJSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('dokumen_spj')->insert([
            [
                'id'=>1,
                'id_tor'=>1,
                'jenis'=>'SPJ',
                'name'=>'aa.png',
                'path'=>'aa.png'
            ]
        ]);
    }
}
