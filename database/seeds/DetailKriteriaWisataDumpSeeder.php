<?php

use Illuminate\Database\Seeder;

class DetailKriteriaWisataDumpSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('kriteria_wisatas')->insert([
            "kriteria_id" =>1,
            "wisata_id" => 1,
            "nilai" => 9
        ]);
        DB::table('kriteria_wisatas')->insert([
            "kriteria_id" =>2,
            "wisata_id" => 1,
            "nilai" => 9
        ]);
        DB::table('kriteria_wisatas')->insert([
            "kriteria_id" =>3,
            "wisata_id" => 1,
            "nilai" => 70000
        ]);
        DB::table('kriteria_wisatas')->insert([
            "kriteria_id" =>4,
            "wisata_id" => 1,
            "nilai" => 1
        ]);
        DB::table('kriteria_wisatas')->insert([
            "kriteria_id" =>5,
            "wisata_id" => 1,
            "nilai" => 10
        ]);
        DB::table('kriteria_wisatas')->insert([
            "kriteria_id" =>6,
            "wisata_id" => 1,
            "nilai" => 5
        ]);
        DB::table('kriteria_wisatas')->insert([
            "kriteria_id" =>7,
            "wisata_id" => 1,
            "nilai" => 14
        ]);
        
        // 2
        DB::table('kriteria_wisatas')->insert([
            "kriteria_id" =>1,
            "wisata_id" => 2,
            "nilai" => 8
        ]);
        DB::table('kriteria_wisatas')->insert([
            "kriteria_id" =>2,
            "wisata_id" => 2,
            "nilai" => 7
        ]);
        DB::table('kriteria_wisatas')->insert([
            "kriteria_id" =>3,
            "wisata_id" => 2,
            "nilai" => 50000
        ]);
        DB::table('kriteria_wisatas')->insert([
            "kriteria_id" =>4,
            "wisata_id" => 2,
            "nilai" => 1
        ]);
        DB::table('kriteria_wisatas')->insert([
            "kriteria_id" =>5,
            "wisata_id" => 2,
            "nilai" => 8
        ]);
        DB::table('kriteria_wisatas')->insert([
            "kriteria_id" =>6,
            "wisata_id" => 2,
            "nilai" => 7
        ]);
        DB::table('kriteria_wisatas')->insert([
            "kriteria_id" =>7,
            "wisata_id" => 2,
            "nilai" => 4
        ]);

        // 3
        DB::table('kriteria_wisatas')->insert([
            "kriteria_id" =>1,
            "wisata_id" => 3,
            "nilai" => 3
        ]);
        DB::table('kriteria_wisatas')->insert([
            "kriteria_id" =>2,
            "wisata_id" => 3,
            "nilai" => 8
        ]);
        DB::table('kriteria_wisatas')->insert([
            "kriteria_id" =>3,
            "wisata_id" => 3,
            "nilai" => 10000
        ]);
        DB::table('kriteria_wisatas')->insert([
            "kriteria_id" =>4,
            "wisata_id" => 3,
            "nilai" => 2
        ]);
        DB::table('kriteria_wisatas')->insert([
            "kriteria_id" =>5,
            "wisata_id" => 3,
            "nilai" => 10
        ]);
        DB::table('kriteria_wisatas')->insert([
            "kriteria_id" =>6,
            "wisata_id" => 3,
            "nilai" => 2
        ]);
        DB::table('kriteria_wisatas')->insert([
            "kriteria_id" =>7,
            "wisata_id" => 3,
            "nilai" => 5
        ]);

        //4
        DB::table('kriteria_wisatas')->insert([
            "kriteria_id" =>1,
            "wisata_id" => 4,
            "nilai" => 7
        ]);
        DB::table('kriteria_wisatas')->insert([
            "kriteria_id" =>2,
            "wisata_id" => 4,
            "nilai" => 8
        ]);
        DB::table('kriteria_wisatas')->insert([
            "kriteria_id" =>3,
            "wisata_id" => 4,
            "nilai" => 50000
        ]);
        DB::table('kriteria_wisatas')->insert([
            "kriteria_id" =>4,
            "wisata_id" => 4,
            "nilai" => 2
        ]);
        DB::table('kriteria_wisatas')->insert([
            "kriteria_id" =>5,
            "wisata_id" => 4,
            "nilai" => 15
        ]);
        DB::table('kriteria_wisatas')->insert([
            "kriteria_id" =>6,
            "wisata_id" => 4,
            "nilai" => 1
        ]);
        DB::table('kriteria_wisatas')->insert([
            "kriteria_id" =>7,
            "wisata_id" => 4,
            "nilai" => 4
        ]);

        //5
        DB::table('kriteria_wisatas')->insert([
            "kriteria_id" =>1,
            "wisata_id" => 5,
            "nilai" => 6
        ]);
        DB::table('kriteria_wisatas')->insert([
            "kriteria_id" =>2,
            "wisata_id" => 5,
            "nilai" => 8
        ]);
        DB::table('kriteria_wisatas')->insert([
            "kriteria_id" =>3,
            "wisata_id" => 5,
            "nilai" => 45000
        ]);
        DB::table('kriteria_wisatas')->insert([
            "kriteria_id" =>4,
            "wisata_id" => 5,
            "nilai" => 1
        ]);
        DB::table('kriteria_wisatas')->insert([
            "kriteria_id" =>5,
            "wisata_id" => 5,
            "nilai" => 25
        ]);
        DB::table('kriteria_wisatas')->insert([
            "kriteria_id" =>6,
            "wisata_id" => 5,
            "nilai" => 2
        ]);
        DB::table('kriteria_wisatas')->insert([
            "kriteria_id" =>7,
            "wisata_id" => 5,
            "nilai" => 3
        ]);
    }
}
