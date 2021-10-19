<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableGoogleReviewPersewaans extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('google_review_persewaans', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('persewaan_id')->unsigned();
            $table->foreign('persewaan_id')->references('id')->on('persewaans');
            $table->string('nama');
            $table->enum('rate',[1,2,3,4,5]);
            $table->string('review');
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
        Schema::dropIfExists('google_review_persewaans');
    }
}
