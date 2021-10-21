<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DetailKriteriaWisata extends Model
{
    protected $table = 'detail_kriteria_wisatas';
    protected $fillable = ['wisata_id', 'detail_kriteria_id'];

    public function detail_kriterias(){
        return $this->belongsTo("App\DetailKriteria","detail_kriteria_id");
    }
    public function wisatas(){
        return $this->belongsTo("App\Wisata","wisata_id");
    }
}
