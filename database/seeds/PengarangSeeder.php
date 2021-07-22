<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PengarangSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('pengarang')->insert([
            [
                'pengarang_nama' => 'M. Agung',
                'pengarang_ket' => 'Ilmuwan dari Kota Bandung',
            ],
            [
                'pengarang_nama' => 'Anjar Zatnika',
                'pengarang_ket' => 'Ustadz dari Kota Bandung',
            ],
            
        ]);
    }
}
