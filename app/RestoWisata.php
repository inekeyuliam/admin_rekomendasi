<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RestoWisata extends Model
{
    protected $table = 'restoran_terdekats';

    public function wisatas(){
        return $this->belongsTo("App\Wisata","wisata_id");
    }

    protected $fillable = ['wisata_id','nama_resto','alamat','longitude','latitude','rating'];

}
