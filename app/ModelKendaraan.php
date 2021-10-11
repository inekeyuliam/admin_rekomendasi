<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ModelKendaraan extends Model
{
    protected $table = 'model_kendaraans';
    public function kendaraans(){
        return $this->hasMany("App\Kendaraan");
    }
    public function merk_kendaraan(){
        return $this->belongsTo("App\MerkKendaraan",'merk_id');
    }
}
