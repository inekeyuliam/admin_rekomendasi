<?php

use Illuminate\Database\Seeder;

class JenisKamarSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('jenis_kamars')->insert([
            "nama_jenis_kamar" => "Single Room"
        ]);
        DB::table('jenis_kamars')->insert([
            "nama_jenis_kamar" => "Twin Room"
        ]);
        DB::table('jenis_kamars')->insert([
            "nama_jenis_kamar" => "Double Room"
        ]);
        DB::table('jenis_kamars')->insert([
            "nama_jenis_kamar" => "Family Room"
        ]);
        DB::table('jenis_kamars')->insert([
            "nama_jenis_kamar" => "Standard Room"
        ]);
        DB::table('jenis_kamars')->insert([
            "nama_jenis_kamar" => "Superior Room"
        ]);
        DB::table('jenis_kamars')->insert([
            "nama_jenis_kamar" => "Deluxe Room"
        ]);
        DB::table('jenis_kamars')->insert([
            "nama_jenis_kamar" => "Junior Suit Room"
        ]);
        DB::table('jenis_kamars')->insert([
            "nama_jenis_kamar" => "Suit Room"
        ]);
        DB::table('jenis_kamars')->insert([
            "nama_jenis_kamar" => "President Suit Room"
        ]);
    }
}
