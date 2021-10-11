<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReviewWisataTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('review_wisatas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('wisata_id')->unsigned();
            $table->foreign('wisata_id')->references('id')->on('wisatas');
            $table->string('nama');
            $table->enum('rate',[1,2,3,4,5]);
            $table->string('review');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('review_wisatas');
    }
}
