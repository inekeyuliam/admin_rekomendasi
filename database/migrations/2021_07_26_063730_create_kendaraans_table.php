<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateKendaraansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kendaraans', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('persewaan_id')->unsigned();
            $table->foreign('persewaan_id')->references('id')->on('persewaans');
            $table->bigInteger('model_id')->unsigned();
            $table->foreign('model_id')->references('id')->on('model_kendaraans');
            $table->double('biaya_perhari');
            $table->string('filename_gambar');
            $table->string('tahun_keluaran');
            $table->string('keterangan')->nullable();
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
        Schema::dropIfExists('kendaraans');
    }
}
