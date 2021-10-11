<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWisatasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('wisatas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users');
            $table->string('nama_wisata'); 
            $table->bigInteger('tipe_wisata_id')->unsigned();
            $table->foreign('tipe_wisata_id')->references('id')->on('tipe_wisatas');
            $table->text('alamat');
            $table->bigInteger('kelurahan_id')->unsigned();
            $table->foreign('kelurahan_id')->references('id')->on('kelurahans');
            $table->decimal('latitude', 11, 8)->nullable();
            $table->decimal('longitude', 11, 8)->nullable();
            $table->string('jam_buka');
            $table->string('jam_tutup');
            $table->double('rating');
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
        Schema::dropIfExists('wisatas');
    }
}
