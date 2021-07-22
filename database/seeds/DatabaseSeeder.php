<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UserSeeder::class);
        // $this->call(KategoriSeeder::class);
        // $this->call(PengarangSeeder::class);
        // $this->call(PenerbitSeeder::class);
        // $this->call(RoleSeeder::class);
        // $this->call(OtonomSeeder::class);
        $this->call(BukuSeeder::class);
    }
}
