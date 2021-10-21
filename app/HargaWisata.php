<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HargaWisata extends Model
{
    protected $table = 'harga_wisatas';
    public function wisatas(){
        return $this->belongsTo("App\Wisata","wisata_id");
    }
}
