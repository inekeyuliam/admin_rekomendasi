<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\HotelPermintaanExport;
use App\Exports\HotelTerverifikasiExport;
use RealRashid\SweetAlert\Facades\Alert;
use App\TipeWisata;
use App\Hotel;
use App\Kecamatan;
use App\KotaKabupaten;
use App\Kelurahan;
use App\GambarHotel;
use App\DetailKriteriaHotel;
use App\Kriteria;
use App\JenisKamar;
use App\Kamar;
use PDF;
use DB;

class GambarHotelController extends Controller
{
    public function index()
    {
        $iduser = Auth::user()->id;
        $gambarhotel = DB::table('gambar_hotels')
        ->select('gambar_hotels.id','gambar_hotels.filename')
        ->join('hotels', 'gambar_hotels.hotel_id','=','hotels.id')
        ->join('users','hotels.user_id','=','users.id')
        ->where('users.id','=',$iduser)                  
        ->get();
        // dd($gambarhotel);

        return view('gambar_hotel.index', ['gambar'=>$gambarhotel]);

    }
    public function create()
    {
       return view('gambar_hotel.create');  
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $iduser = Auth::user()->id;
        $id = Hotel::where('user_id', $iduser)->pluck('id')->first();
        // dd($id);

        $files = $request->file('filename');
        if(! is_null(request('filename')))
        {
            $uploadcount = 0;

            $photos=request('filename');
            foreach ($photos as $photo)
             {
            $destinationPath = 'images';
                $filename =  $photo->getClientOriginalName();
                $photo->move($destinationPath,$filename);
                $uploadcount ++;
               
                $photo->getClientOriginalExtension();
                $entry = new GambarHotel();
                $entry->hotel_id = $id;
                $entry->filename = $filename;
                $entry->save();
          }
        }
        return redirect('gambarhotel')->withSuccessMessage('Gambar Hotel Berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
  

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $gambar = GambarHotel::find($id);
        return view('gambar_hotel.edit', ['gambar'=>$gambar]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
      
        $files = $request->file('filename');
        if(! is_null(request('filename')))
        {
            $uploadcount = 0;

            $photos=request('filename');
            foreach ($photos as $photo)
             {
            $destinationPath = 'images';
                $filename =  $photo->getClientOriginalName();
                $photo->move($destinationPath,$filename);
                $uploadcount ++;
               
                $photo->getClientOriginalExtension();
                $entry = GambarHotel::find($id);
                $entry->filename = $filename;
                $entry->save();
          }
        }
        return redirect('gambarhotel')->withSuccessMessage('Gambar Hotel Berhasil diubah!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $gambarhotel = GambarHotel::find($id);
        $gambarhotel->delete();
        return redirect('gambarhotel');
    }
}
