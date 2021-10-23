<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OlehOlehWisata extends Model
{
    protected $table = 'oleh_oleh_terdekats';

    public function wisatas(){
        return $this->belongsTo("App\Wisata","wisata_id");
    }
    protected $fillable = ['wisata_id','nama_toko','alamat','longitude','latitude','rating'];

}
