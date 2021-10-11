<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDetailKriteriaMilikWisatas extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detail_kriteria_wisatas', function (Blueprint $table) {
            $table->bigInteger('detail_kriteria_id')->unsigned();
            $table->foreign('detail_kriteria_id')->references('id')->on('detail_kriterias');
            $table->bigInteger('wisata_id')->unsigned();
            $table->foreign('wisata_id')->references('id')->on('wisatas');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('detail_kriteria_wisatas');
    }
}
