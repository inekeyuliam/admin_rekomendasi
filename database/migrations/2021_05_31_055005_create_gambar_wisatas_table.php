<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGambarWisatasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('gambar_wisatas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('wisata_id')->unsigned();
            $table->foreign('wisata_id')->references('id')->on('wisatas');
            $table->string('filename');
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
        Schema::dropIfExists('gambar_wisatas');
    }
}
