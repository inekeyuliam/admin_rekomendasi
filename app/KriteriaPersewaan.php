<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class KriteriaPersewaan extends Model
{
    protected $table = 'kriteria_persewaans';
    protected $fillable = ['nilai', 'persewaan_id', 'kriteria_id'];
}
