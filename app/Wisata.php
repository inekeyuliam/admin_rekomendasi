<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Wisata extends Model
{
    protected $table = 'wisatas';

    public function kelurahans(){
        return $this->belongsTo("App\Kelurahan","kelurahan_id");
    }
    public function tipe_wisatas(){
        return $this->belongsTo("App\TipeWisata","tipe_wisata_id");
    }
    public function kriterias(){
        return $this->belongsToMany("App\Kriteria",'kriteria_wisatas','wisata_id','kriteria_id');
    }
    public function gambar_wisatas(){
        return $this->hasMany("App\GambarWisata");
    }
    public function harga_wisatas(){
        return $this->hasMany("App\HargaWisata");
    }
    public function review_wisatas(){
        return $this->hasMany("App\ReviewWisata");
    }
    public function google_review_wisatas(){
        return $this->hasMany("App\GoogleReviewWisata");
    }
    public function detail_kriterias(){
        return $this->belongsToMany("App\DetailKriteria",'detail_kriteria_wisatas','wisata_id','detail_kriteria_id');
    }
    public function detail_kriteria_wisatas(){
        return $this->hasMany("App\DetailKriteriaWisata");
    }
}
