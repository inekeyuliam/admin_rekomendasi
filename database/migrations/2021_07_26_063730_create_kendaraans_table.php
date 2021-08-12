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
            $table->string('nama_model_kendaraan');
            $table->bigInteger('persewaan_id')->unsigned();
            $table->foreign('persewaan_id')->references('id')->on('persewaans');
            $table->double('biaya_perhari');
            $table->string('filename_gambar');
            $table->string('tahun_keluaran');
            $table->integer('kapasitas_penumpang');
            $table->enum('surat_uji',[0,1]);
            $table->enum('jenis_kendaraan',['Motor', 'Mobil', 'Minibus/Bus']);
            $table->bigInteger('merk_id')->unsigned();
            $table->foreign('merk_id')->references('id')->on('merk_kendaraans');
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
