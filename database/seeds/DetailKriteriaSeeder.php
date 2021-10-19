<?php

use Illuminate\Database\Seeder;

class DetailKriteriaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //wisata
        DB::table('detail_kriterias')->insert([
            "kriteria_id" =>1,
            "nama_detail" => "Kantin/tempat makan",
        ]);
        DB::table('detail_kriterias')->insert([
            "kriteria_id" =>1,
            "nama_detail" => "Toilet",
        ]);
        DB::table('detail_kriterias')->insert([
            "kriteria_id" =>1,
            "nama_detail" => "Tempat sampah",
        ]);
        DB::table('detail_kriterias')->insert([
            "kriteria_id" =>1,
            "nama_detail" => "Sarana kebersihan",
        ]);
        DB::table('detail_kriterias')->insert([
            "kriteria_id" =>1,
            "nama_detail" => "Tempat parkir",
        ]);
        DB::table('detail_kriterias')->insert([
            "kriteria_id" =>1,
            "nama_detail" => "Mushola",
        ]);
        DB::table('detail_kriterias')->insert([
            "kriteria_id" =>1,
            "nama_detail" => "Papan penunjuk arah",
        ]);
        DB::table('detail_kriterias')->insert([
            "kriteria_id" =>1,
            "nama_detail" => "Toko cinderamata / oleh-oleh",
        ]);
        DB::table('detail_kriterias')->insert([
            "kriteria_id" =>1,
            "nama_detail" => "Tempat duduk/beristirahat",
        ]);
        DB::table('detail_kriterias')->insert([
            "kriteria_id" =>1,
            "nama_detail" => "Akomodasi (seperti hotel/penginapan)",
        ]);
        DB::table('detail_kriterias')->insert([
            "kriteria_id" =>1,
            "nama_detail" => "Persewaan transportasi",
        ]);
        DB::table('detail_kriterias')->insert([
            "kriteria_id" =>1,
            "nama_detail" => "Sarana keamanan & ketertiban (satpam)",
        ]);
        DB::table('detail_kriterias')->insert([
            "kriteria_id" =>1,
            "nama_detail" => "Pelayanan kesehatan",
        ]);
        DB::table('detail_kriterias')->insert([
            "kriteria_id" =>1,
            "nama_detail" => "Sistem perbankan (mesin ATM / bank)",
        ]);
        DB::table('detail_kriterias')->insert([
            "kriteria_id" =>1,
            "nama_detail" => "Pusat Informasi",
        ]);

        //hotel
        DB::table('detail_kriterias')->insert([
            "kriteria_id" =>8,
            "nama_detail" => "Smoking area",
        ]);
        DB::table('detail_kriterias')->insert([
            "kriteria_id" =>8,
            "nama_detail" => "Non-Smoking area",
        ]);
        DB::table('detail_kriterias')->insert([
            "kriteria_id" =>8,
            "nama_detail" => "Alat pendeteksi kebakaran",
        ]);
        DB::table('detail_kriterias')->insert([
            "kriteria_id" =>8,
            "nama_detail" => "Ruang makan/restoran",
        ]);
        DB::table('detail_kriterias')->insert([
            "kriteria_id" =>8,
            "nama_detail" => "Ruang multifungsi",
        ]);
        DB::table('detail_kriterias')->insert([
            "kriteria_id" =>8,
            "nama_detail" => "Drugstore",
        ]);
        DB::table('detail_kriterias')->insert([
            "kriteria_id" =>8,
            "nama_detail" => "Bank",
        ]);
        DB::table('detail_kriterias')->insert([
            "kriteria_id" =>8,
            "nama_detail" => "Free Wifi",
        ]);
        DB::table('detail_kriterias')->insert([
            "kriteria_id" =>8,
            "nama_detail" => "Resepsionis 84 Jam",
        ]);
        DB::table('detail_kriterias')->insert([
            "kriteria_id" =>8,
            "nama_detail" => "Laundry",
        ]);
        DB::table('detail_kriterias')->insert([
            "kriteria_id" =>8,
            "nama_detail" => "Tempat parkir",
        ]);
        DB::table('detail_kriterias')->insert([
            "kriteria_id" =>8,
            "nama_detail" => "CCTV",
        ]);
        DB::table('detail_kriterias')->insert([
            "kriteria_id" =>8,
            "nama_detail" => "Air Conditioning",
        ]);
        DB::table('detail_kriterias')->insert([
            "kriteria_id" =>8,
            "nama_detail" => "Sarana olahraga",
        ]);
        DB::table('detail_kriterias')->insert([
            "kriteria_id" =>8,
            "nama_detail" => "Kolam renang",
        ]);
        DB::table('detail_kriterias')->insert([
            "kriteria_id" =>8,
            "nama_detail" => "Sarana penjemputan Airport",
        ]);
        DB::table('detail_kriterias')->insert([
            "kriteria_id" =>8,
            "nama_detail" => "Breakfast",
        ]);


        //persewaaan
        DB::table('detail_kriterias')->insert([
            "kriteria_id" =>13,
            "nama_detail" => "Asuransi",
        ]);
        DB::table('detail_kriterias')->insert([
            "kriteria_id" =>13,
            "nama_detail" => "STNK",
        ]);
        DB::table('detail_kriterias')->insert([
            "kriteria_id" =>13,
            "nama_detail" => "Sopir",
        ]);
        DB::table('detail_kriterias')->insert([
            "kriteria_id" =>13,
            "nama_detail" => "Ban Serep",
        ]);
        DB::table('detail_kriterias')->insert([
            "kriteria_id" =>13,
            "nama_detail" => "Kursi Bayi",
        ]);
        DB::table('detail_kriterias')->insert([
            "kriteria_id" =>13,
            "nama_detail" => "Bahan Bakar Terisi",
        ]);
    }
}
