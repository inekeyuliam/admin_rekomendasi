<?php

namespace App\Exports;
use DB;
use App\Persewaan;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class PersewaanPermintaanExport implements FromCollection,WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        $listall = DB::table('persewaans')
        ->select('name','nama_persewaan','alamat','status',
        'nama_kabupaten','longitude','latitude','jam_buka', 'jam_tutup','rating','no_telp',
        'no_wa','link_fb','link_ig','keterangan')
        ->join('users', 'users.id','=','persewaans.user_id')
        ->join('kelurahans','kelurahans.id','=','persewaans.kelurahan_id')
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
            'Nama Persewaan',
            'Alamat',
            'Status',
            'Kota Kabupaten',
            'Longitude',
            'Latitude ',
            'Jam Buka',
            'Jam Tutup',
            'Rating',
            'No Telp',
            'No WhatsApp',
            'Link Facebook',
            'Link Instagram',
            'Keterangan',
        ];
    }
}
