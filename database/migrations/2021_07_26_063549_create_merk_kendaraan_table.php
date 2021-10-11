<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMerkKendaraanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('model_kendaraans', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nama_model');
            $table->enum('jenis_kendaraan',['Motor', 'Mobil', 'Minibus/Bus']);
            $table->bigInteger('merk_id')->unsigned();
            $table->foreign('merk_id')->references('id')->on('merk_kendaraans');
            $table->integer('kapasitas');
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
        Schema::dropIfExists('model_kendaraans');
    }
}
