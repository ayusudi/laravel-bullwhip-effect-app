<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BagianSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data_json = file_get_contents('./database/json/bagian_202302040336.json');
        $decoded_json = json_decode($data_json, true);
        DB::table('bagian')->insert($decoded_json['bagian']);
    }
}
