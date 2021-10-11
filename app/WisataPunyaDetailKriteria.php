<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class WisataPunyaDetailKriteria extends Model
{
    protected $table = 'detail_kriteria_wisatas';
    protected $fillable = ['wisata_id', 'detail_kriteria_id'];

}
