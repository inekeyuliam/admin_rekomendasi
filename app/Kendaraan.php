<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kendaraan extends Model
{
    protected $table = 'kendaraans';
    public function persewaans(){
        return $this->belongsTo("App\Persewaan","persewaan_id");
    }
    public function model_kendaraans(){
        return $this->belongsTo("App\ModelKendaraan",'model_id');
    }
}
