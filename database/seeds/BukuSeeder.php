<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class BukuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('buku')->insert([
            [
                'buku_kode' => 'B001',
                'buku_judul' => 'Sejarah Islam',
                'pengarang_id' => 1,
                'kategori_id' => 1,
                'penerbit_id' => 1,
                'buku_tahun' => Carbon::create('2000', '01', '01'),
                'buku_halaman' => '200',
                'buku_kota' => 'Bandung',
                'buku_file' => 'Sejarah',
                'buku_jumlah' => 10,
                'buku_gambar' => 'Sejarah',
                'buku_lihat' => 2,
                'buku_ket' => 'Sejarah',
            ],
            [
                'buku_kode' => 'B002',
                'buku_judul' => 'Sejarah Islam Indonesia',
                'pengarang_id' => 2,
                'kategori_id' => 2,
                'penerbit_id' => 2,
                'buku_tahun' => Carbon::create('2010', '01', '01'),
                'buku_halaman' => '100',
                'buku_kota' => 'Bandung',
                'buku_file' => 'Sejarah',
                'buku_jumlah' => 20,
                'buku_gambar' => 'Sejarah',
                'buku_lihat' => 3,
                'buku_ket' => 'Sejarah',
            ],
        ]);
    }
}
