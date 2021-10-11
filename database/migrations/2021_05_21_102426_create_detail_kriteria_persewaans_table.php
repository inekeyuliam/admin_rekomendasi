<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDetailKriteriaPersewaansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kriteria_persewaans', function (Blueprint $table) {
            $table->bigInteger('kriteria_id')->unsigned();
            $table->foreign('kriteria_id')->references('id')->on('kriterias');
            $table->bigInteger('persewaan_id')->unsigned();
            $table->foreign('persewaan_id')->references('id')->on('persewaans');
            $table->double('nilai');
            $table->string('keterangan')->nullable();;
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
        Schema::dropIfExists('kriteria_persewaans');
    }
}
