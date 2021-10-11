<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRestoranTerdekats extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Schema::create('restoran_terdekats', function (Blueprint $table) {
        //     $table->bigIncrements('id');
        //     $table->string('nama_resto'); 
        //     $table->bigInteger('wisata_id')->unsigned();
        //     $table->foreign('wisata_id')->references('id')->on('wisatas');
        //     $table->text('alamat');
        //     $table->decimal('latitude', 11, 8)->nullable();
        //     $table->decimal('longitude', 11, 8)->nullable();
        //     $table->string('no_telp');
        //     $table->string('jam_buka');
        //     $table->string('jam_tutup');
        //     $table->double('rating');
        //     $table->string('keterangan')->nullable();;
        //     $table->timestamps();
        // });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        // Schema::dropIfExists('restoran_terdekats');
    }
}
