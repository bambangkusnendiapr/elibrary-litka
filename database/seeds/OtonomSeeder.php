<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class OtonomSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('otonom')->insert([
            [
                'otonom_nama' => 'Persis',
                'otonom_ket' => 'Persatuan Islam',
            ],
            [
                'otonom_nama' => 'Pemuda Persis',
                'otonom_ket' => 'Pemuda Persatuan Islam',
            ],
            
        ]);
    }
}
