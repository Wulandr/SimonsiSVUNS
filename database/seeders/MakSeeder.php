<?php

namespace Database\Seeders;

use App\Models\Mak;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class MakSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $csvFile = fopen(base_path("database/data/1kategoriMak.csv"), "r");

        $firstline = true;
        while (($data = fgetcsv($csvFile, 2000, ";")) !== FALSE) {
            if (!$firstline) {
                Mak::create([
                    "id" => $data['0'],
                    "jenis_belanja" => $data['1'],
                    "is_aktif" => $data['2']
                ]);
            }
            $firstline = false;
        }

        fclose($csvFile);
    }
}
