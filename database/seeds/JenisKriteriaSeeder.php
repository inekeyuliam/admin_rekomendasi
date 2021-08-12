<?php

use Illuminate\Database\Seeder;

class JenisKriteriaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('jenis_kriterias')->insert([
            "nama_jenis" => "Wisata"
        ]);
        DB::table('jenis_kriterias')->insert([
            "nama_jenis" => "Hotel"
        ]);
        DB::table('jenis_kriterias')->insert([
            "nama_jenis" => "Persewaan Kendaraan"
        ]);
     
    }
}
