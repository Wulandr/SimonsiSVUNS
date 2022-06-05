<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PedomanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('pedoman')->insert([
            [
                'nama' => 'Standar Biaya Masukan Kegiatan 2022',
                'jenis' => 'SBM',
                'file' => '60_PMK.02_2021.pdf',
                'tahun' => '2022',
                'path' => '60_PMK.02_2021.pdf',
                'created_at' => '2022-06-05 10:15:58',
                'updated_at' => '2022-06-05 10:15:58',
            ],
        ]);
    }
}
