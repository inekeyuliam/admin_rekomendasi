<?php

use Illuminate\Database\Seeder;

class TipeWisataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tipe_wisatas')->insert([
            "nama_tipe" => "Wisata Alam"
        ]);
        DB::table('tipe_wisatas')->insert([
            "nama_tipe" => "Wisata Kultur dan Budaya"
        ]);
        DB::table('tipe_wisatas')->insert([
            "nama_tipe" => "Wisata Edukasi"
        ]);
        DB::table('tipe_wisatas')->insert([
            "nama_tipe" => "Wisata Belanja"
        ]);
        DB::table('tipe_wisatas')->insert([
            "nama_tipe" => "Wisata Kuliner"
        ]);
        DB::table('tipe_wisatas')->insert([
            "nama_tipe" => "Wisata Religi atau Sejarah"
        ]);
    }
}
