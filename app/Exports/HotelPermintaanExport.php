<?php

namespace App\Exports;
use DB;
use App\Hotel;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class HotelPermintaanExport implements FromCollection,WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
  
    public function collection()
    {
        $listall = DB::table('hotels')
        ->select('name','nama_hotel','alamat','status',
        'nama_kabupaten','longitude','latitude','bintang','rating','no_telp','no_wa','link_fb','link_ig','keterangan')
        ->join('users', 'users.id','=','hotels.user_id')
        ->join('kelurahans','kelurahans.id','=','hotels.kelurahan_id')
        ->join('kecamatans','kelurahans.kecamatan_id','=','kecamatans.id')
        ->join('kabupatens','kecamatans.kabupaten_id','=','kabupatens.id')
        ->where('status','=','nonaktif')
        ->get(); 

        return $listall;
    }
    public function headings(): array
    {
        return [
            'Nama Pengguna',
            'Nama Hotel',
            'Alamat',
            'Status',
            'Kota Kabupaten',
            'Longitude',
            'Latitude ',
            'Bintang',
            'Rating',
            'No Telp',
            'No WhatsApp',
            'Link Facebook',
            'Link Instagram',
            'Keterangan',
        ];
    }
}
