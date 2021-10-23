<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TrenWisata extends Model
{
    protected $table = 'tren_wisata';
    protected $fillable = ['nama_top_wisata','link_gambar'];

}
