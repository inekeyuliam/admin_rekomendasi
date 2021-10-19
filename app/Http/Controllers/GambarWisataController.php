<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\HotelPermintaanExport;
use App\Exports\HotelTerverifikasiExport;
use RealRashid\SweetAlert\Facades\Alert;
use App\TipeWisata;
use App\Wisata;
use App\Kecamatan;
use App\KotaKabupaten;
use App\Kelurahan;
use App\GambarWisata;
use App\DetailKriteriaWisata;
use App\Kriteria;
use App\JenisKamar;
use App\Kamar;
use PDF;
use DB;

class GambarWisataController extends Controller
{
    public function index($wisata_id)
    {
        $gambar = DB::table('gambar_wisatas')
        ->select('gambar_wisatas.id','gambar_wisatas.filename','gambar_wisatas.wisata_id')
        ->join('wisatas','wisatas.id','=','gambar_wisatas.wisata_id')
        ->where('wisatas.id','=',$wisata_id)               
        ->get();
        // dd($gambar);
        // $cities = City::where('country_id', $country_id)->get();
        return view('gambar_wisata.index', ['gambar'=>$gambar, 'wisata_id'=>$wisata_id]);
    }

    public function create($wisata_id)
    {
        return view('gambar_wisata.create', compact('wisata_id'));
    }

    public function store($wisata_id, Request $request)
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
                $entry = new GambarWisata();
                $entry->wisata_id = $wisata_id;
                $entry->filename = $filename;
                $entry->save();
          }
        }
        return redirect()->route('wisata.gambarwisata.index', $wisata_id);
    }

    public function edit($wisata_id, $gambarwisata_id)
    {
        // dd($gambarwisata_id);
        $gambarwisata = DB::table('gambar_wisatas')
        ->select('gambar_wisatas.filename','gambar_wisatas.id','gambar_wisatas.wisata_id')
        ->join('wisatas','wisatas.id','=','gambar_wisatas.wisata_id')
        ->where('gambar_wisatas.id',$gambarwisata_id)
        ->first();
        // dd($gambarwisata);
        return view('gambar_wisata.edit', compact('wisata_id', 'gambarwisata'));
    }

    public function update($wisata_id, Request $request, $gambarwisata_id)
    {
        $id= $gambarwisata_id;
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
                $entry = GambarWisata::find($id);
                $entry->filename = $filename;
                $entry->save();
          }
        }
        return redirect()->route('wisata.gambarwisata.index', $wisata_id);
    }

    // public function show($wisata_id, GambarWisata $gambarwisata)
    // {

    //     return view('gambar_wisata.show', ['wisata_id' => $wisata_id, 'listgambar'=>$gambarwisata]);
    // }

    public function destroy($wisata_id, $gambarwisata_id)
    {
        $gambarwisata = DB::table('gambar_wisatas')
        ->select('gambar_wisatas.filename','gambar_wisatas.id','gambar_wisatas.wisata_id')
        ->join('wisatas','wisatas.id','=','gambar_wisatas.wisata_id')
        ->where('gambar_wisatas.id',$gambarwisata_id)
        ->delete();
        return redirect()->route('wisata.gambarwisata.index', $wisata_id);
    }
    
}
