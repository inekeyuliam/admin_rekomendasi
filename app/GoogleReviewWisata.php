<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GoogleReviewWisata extends Model
{
    protected $table = 'google_review_wisatas';
    public function wisatas(){
        return $this->belongsTo("App\Wisata","wisata_id");
    }
    protected $fillable = ['wisata_id','nama','review','rate'];

}
