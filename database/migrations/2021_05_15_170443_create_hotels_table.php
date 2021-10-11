<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHotelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hotels', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users');
            $table->string('nama_hotel');
            $table->text('alamat');
            $table->bigInteger('kelurahan_id')->unsigned();
            $table->foreign('kelurahan_id')->references('id')->on('kelurahans');
            $table->enum('status', ['aktif','nonaktif']);
            $table->decimal('latitude', 11, 8)->nullable();
            $table->decimal('longitude', 11, 8)->nullable();
            $table->enum('bintang',[1,2,3,4,5]);
            $table->double('rating');
            $table->string('no_telp');
            $table->string('no_wa')->nullable();
            $table->string('link_fb')->nullable();
            $table->string('link_ig')->nullable();
            $table->string('keterangan')->nullable();;
            $table->string('alasan')->nullable();;

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
        Schema::dropIfExists('hotels');
    }
}
