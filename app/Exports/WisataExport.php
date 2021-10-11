<?php

namespace App\Exports;

use App\Wisata;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use DB;
class WisataExport implements FromCollection,WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        $listall = DB::table('wisatas')
        ->select('name','nama_wisata','nama_tipe',
        'alamat','nama_kabupaten','longitude','latitude','jam_buka','jam_tutup','rating','keterangan')
        ->join('users', 'users.id','=','wisatas.user_id')
        ->join('tipe_wisatas','tipe_wisatas.id','=','wisatas.tipe_wisata_id')
        ->join('kelurahans','kelurahans.id','=','wisatas.kelurahan_id')
        ->join('kecamatans','kelurahans.kecamatan_id','=','kecamatans.id')
        ->join('kabupatens','kecamatans.kabupaten_id','=','kabupatens.id')
        ->get(); 

        return $listall;
    }
    public function headings(): array
    {
        return [
            'Pengguna',
            'Nama Wisata',
            'Tipe Wisata',
            'Alamat',
            'Kota Kabupaten',
            'Longitude',
            'Latitude ',
            'Jam Buka',
            'Jam Tutup',
            'Rating',
            'Keterangan',
        ];
    }
}
