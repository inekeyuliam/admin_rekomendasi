<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kriteria extends Model
{
    protected $table = 'kriterias';

    public function jenis_kriterias(){
        return $this->belongsTo("App\JenisKriteria","jenis_kriteria_id");
    }
    public function hotels(){
        return $this->belongsToMany("App\Hotel",'kriteria_hotels');
    }
    public function persewaans(){
        return $this->belongsToMany("App\Persewaan",'kriteria_persewaans');
    }
    public function wisatas(){
        return $this->belongsToMany("App\Wisata",'kriteria_wisatas','kriteria_id','wisata_id');
    }
    public function detail_kriterias(){
        return $this->hasMany("App\DetailKriteria");
    }
}
