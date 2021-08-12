<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MitraHotelController extends Controller
{
    public function create()
    {
        $iduser = Auth::user()->id;
        $kabupaten = KotaKabupaten::all();
        $kecamatan = Kecamatan::all();
        $kelurahan = Kelurahan::all();
        $listkriteria = Kriteria::where('jenis_kriteria_id',2)->get();
        return view('hotel.create', ['kabupaten'=>$kabupaten, 'kecamatan'=>$kecamatan, 'kelurahan'=>$kelurahan, 'listkriteria'=>$listkriteria]);  
    
    }
    public function store(Request $request)
    {
        $iduser = Auth::user()->id;
        $nama_hot = $request->get('nama');
        $tipe_hot = $request->get('tipe');
        $kelurahan = $request->get('kelurahan');
        $long = $request->get('long');
        $lat = $request->get('lat');
        $harga = $request->get('harga');
        $notlp = $request->get('notlp');
    
        $hotel = new Hotel();
        $hotel->user_id = $iduser;
        $hotel->nama_hotel = $nama_hot;
        $hotel->kelurahan_id = $kelurahan;
        $hotel->longitude = $long;
        $hotel->latitude = $lat;
        $hotel->harga_permalam = $harga;
        $hotel->no_telp = $notlp;
        $hotel->status = 'nonaktif';
        $hotel->save();
        $id = $hotel->id;
        return redirect('home');
        // $hot = DB::table('hotels')->where('id',$id)->first();
        // return redirect('hotel.status',['$hot'=>$hot])->withSuccessMessage('Wisata Berhasil ditambahkan!');

    }
}
