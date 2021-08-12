<?php

use Illuminate\Database\Seeder;

class KriteriaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Kriteria Wisata
        DB::table('kriterias')->insert([
            "jenis_kriteria_id" =>1,
            "tipe_kriteria" => "Benefit",
            "kriteria" => "Kelengkapan fasilitas"
        ]);
        DB::table('kriterias')->insert([
            "jenis_kriteria_id" =>1,
            "tipe_kriteria" => "Benefit",
            "kriteria" => "Waktu operasional"
        ]);
        DB::table('kriterias')->insert([
            "jenis_kriteria_id" =>1,
            "tipe_kriteria" => "Cost",
            "kriteria" => "Harga masuk"
        ]);
        DB::table('kriterias')->insert([
            "jenis_kriteria_id" =>1,
            "tipe_kriteria" => "Cost",
            "kriteria" => "Kondisi jalan sekitar wisata"
        ]);
        DB::table('kriterias')->insert([
            "jenis_kriteria_id" =>1,
            "tipe_kriteria" => "Cost",
            "kriteria" => "Jarak dari lokasi kedatangan"
        ]);
        DB::table('kriterias')->insert([
            "jenis_kriteria_id" =>1,
            "tipe_kriteria" => "Cost",
            "kriteria" => "Jarak dengan tempat makan"
        ]);
        DB::table('kriterias')->insert([
            "jenis_kriteria_id" =>1,
            "tipe_kriteria" => "Cost",
            "kriteria" => "Jarak dengan toko oleh-oleh"
        ]);


         // Kriteria Hotel
         DB::table('kriterias')->insert([
            "jenis_kriteria_id" =>2,
            "tipe_kriteria" => "Benefit",
            "kriteria" => "Kelengkapan fasilitas"
        ]);
        DB::table('kriterias')->insert([
            "jenis_kriteria_id" =>2,
            "tipe_kriteria" => "Benefit",
            "kriteria" => "Rating"
        ]);
        DB::table('kriterias')->insert([
            "jenis_kriteria_id" =>2,
            "tipe_kriteria" => "Cost",
            "kriteria" => "Harga per malam"
        ]);
        DB::table('kriterias')->insert([
            "jenis_kriteria_id" =>2,
            "tipe_kriteria" => "Cost",
            "kriteria" => "Jarak dari lokasi kedatangan"
        ]);
        DB::table('kriterias')->insert([
            "jenis_kriteria_id" =>2,
            "tipe_kriteria" => "Cost",
            "kriteria" => "Jarak dengan tempat wisata"
        ]);
        
         // Kriteria Persewaan Kendaraan
         DB::table('kriterias')->insert([
            "jenis_kriteria_id" =>3,
            "tipe_kriteria" => "Benefit",
            "kriteria" => "Kelengkapan kendaraan"
        ]);
        DB::table('kriterias')->insert([
            "jenis_kriteria_id" =>3,
            "tipe_kriteria" => "Benefit",
            "kriteria" => "Kelayakan pakai kendaraan"
        ]);
        DB::table('kriterias')->insert([
            "jenis_kriteria_id" =>3,
            "tipe_kriteria" => "Benefit",
            "kriteria" => "Rating"
        ]);
        DB::table('kriterias')->insert([
            "jenis_kriteria_id" =>3,
            "tipe_kriteria" => "Cost",
            "kriteria" => "Biaya sewa per hari"
        ]);
        DB::table('kriterias')->insert([
            "jenis_kriteria_id" =>3,
            "tipe_kriteria" => "Benefit",
            "kriteria" => "Jumlah Kapasitas"
        ]);
  
        
    }
}
