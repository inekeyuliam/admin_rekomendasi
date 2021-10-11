<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MerkKendaraan extends Model
{
    protected $table = 'merk_kendaraans';
    public function model_kendaraans(){
        return $this->hasMany("App\ModelKendaraan");
    }
    
}
