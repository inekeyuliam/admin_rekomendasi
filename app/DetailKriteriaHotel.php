<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DetailKriteriaHotel extends Model
{
    protected $table = 'detail_kriteria_hotels';
    protected $fillable = ['hotel_id', 'detail_kriteria_id'];

}
