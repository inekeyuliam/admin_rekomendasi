<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DetailKriteriaHotel extends Model
{
    protected $table = 'kriteria_hotels';
    protected $fillable = ['nilai', 'hotel_id', 'kriteria_id'];

}
