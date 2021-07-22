<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PenerbitSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('penerbit')->insert([
            [
                'penerbit_nama' => 'Syuhada Media',
                'penerbit_kota' => 'Kota Bandung',
                'penerbit_ket' => 'Penerbit Buku',
            ],
            [
                'penerbit_nama' => 'Syuhada Press',
                'penerbit_kota' => 'Kota Bogor',
                'penerbit_ket' => 'Penerbit Buku-buku',
            ],
            
        ]);
    }
}
