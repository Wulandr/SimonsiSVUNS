<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class PaguSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('pagu')->insert([
            [
                'id_unit' => '2',
                'id_tahun' => '3',
                'pagu' => '1000000000',
                'created_at' => '2022-02-22 00:00:00',
                'updated_at' => '2022-02-22 00:00:00'
            ],
            [
                'id_unit' => '3',
                'id_tahun' => '3',
                'pagu' => '1000000000',
                'created_at' => '2022-02-22 00:00:00',
                'updated_at' => '2022-02-22 00:00:00'
            ],
        ]);
    }
}
