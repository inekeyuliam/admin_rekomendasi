<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DetailKriteriaWisata extends Model
{
    protected $table = 'kriteria_wisatas';
    protected $fillable = ['nilai', 'wisata_id', 'kriteria_id'];
}
