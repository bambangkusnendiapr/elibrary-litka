<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KategoriSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('kategori')->insert([
            [
                'kategori_nama' => 'Sejarah',
                'kategori_ket' => 'Sejarah',
            ],
            [
                'kategori_nama' => 'Bahasa',
                'kategori_ket' => 'Bahasa',
            ],
        ]);
    }
}
