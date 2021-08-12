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
        $this->call(JenisKendaraanSeeder::class);
        $this->call(JenisKriteriaSeeder::class);
        $this->call(TipeWisataSeeder::class);
        $this->call(JenisKamarSeeder::class);
        $this->call(KriteriaSeeder::class);
        $this->call(DetailKriteriaSeeder::class);
        $this->call(KabupatenSeeder::class);
        $this->call(KecamatanSeeder::class);
        $this->call(KelurahanSeeder::class);
        $this->call(UserSeeder::class);
        $this->call(Wisatadumpseeder::class);
    }
}
