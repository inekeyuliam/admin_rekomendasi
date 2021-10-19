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
use App\GambarKamar;
use App\DetailKriteriaHotel;
use App\Kriteria;
use App\JenisKamar;
use App\Kamar;
use PDF;
use DB;

class GambarKamarController extends Controller
{
    public function index($kamar_id)
    {
        $iduser = Auth::user()->id;
        $gambar = DB::table('gambar_kamars')
        ->select('gambar_kamars.id','gambar_kamars.filename','gambar_kamars.kamar_id')
        ->join('kamars', 'gambar_kamars.kamar_id','=','kamars.id')
        ->join('hotels','kamars.hotel_id','=','hotels.id')
        ->join('users','hotels.user_id','=','users.id')
        ->where('users.id','=',$iduser)   
        ->where('kamars.id','=',$kamar_id)               
        ->get();
        // dd($gambar);
        // $cities = City::where('country_id', $country_id)->get();
        return view('gambar_kamar.index', ['gambar'=>$gambar, 'kamar_id'=>$kamar_id]);
    }

    public function create($kamar_id)
    {
        return view('gambar_kamar.create', compact('kamar_id'));
    }

    public function store($kamar_id, Request $request)
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
                $entry = new GambarKamar();
                $entry->kamar_id = $kamar_id;
                $entry->filename = $filename;
                $entry->save();
          }
        }
        return redirect()->route('kamar.gambarkamar.index', $kamar_id);
    }

    public function edit($kamar_id, GambarKamar $gambarkamar)
    {
        // $id= $gambarkamar->id;
        dd($gambarkamar);
        return view('gambar_kamar.edit', compact('kamar_id', 'gambarkamar'));
    }

    public function update($kamar_id, Request $request, GambarKamar $gambarkamar)
    {
        $id= $gambarkamar->id;
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
                $entry = GambarKamar::find($id);
                $entry->filename = $filename;
                $entry->save();
          }
        }
        return redirect()->route('kamar.gambarkamar.index', $kamar_id);
    }

    public function show($kamar_id, GambarKamar $gambarkamar)
    {

        return view('gambar_kamar.show', ['kamar_id' => $kamar_id, 'listgambar'=>$gambarkamar]);
    }

    public function destroy($kamar_id, GambarKamar $gambarkamar)
    {
        $gambarkamar->delete();
        return redirect()->route('kamar.gambarkamar.index', $kamar_id);
    }
    
     
}
