<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDetailKriteriaMilikPersewaans extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detail_kriteria_persewaans', function (Blueprint $table) {
            $table->bigInteger('detail_kriteria_id')->unsigned();
            $table->foreign('detail_kriteria_id')->references('id')->on('detail_kriterias');
            $table->bigInteger('persewaan_id')->unsigned();
            $table->foreign('persewaan_id')->references('id')->on('persewaans');
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
        Schema::dropIfExists('detail_kriteria_persewaans');
    }
}
