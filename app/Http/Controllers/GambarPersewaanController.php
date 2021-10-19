<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;
use RealRashid\SweetAlert\Facades\Alert;
use App\Persewaan;
use App\Kecamatan;
use App\KotaKabupaten;
use App\Kelurahan;
use App\GambarPersewaan;
use App\DetailKriteriaPersewaan;
use App\Kriteria;
use App\Kendaraan;
use App\ModelKendaraan;
use PDF;
use DB;

class GambarPersewaanController extends Controller
{
    public function index()
    {
        $iduser = Auth::user()->id;
        $gambarpersewaan = DB::table('gambar_persewaans')
        ->select('gambar_persewaans.id','gambar_persewaans.filename')
        ->join('persewaans', 'gambar_persewaans.persewaan_id','=','persewaans.id')
        ->join('users','persewaans.user_id','=','users.id')
        ->where('users.id','=',$iduser)                  
        ->get();
        // dd($gambarpersewaan);

        return view('gambar_persewaan.index', ['gambar'=>$gambarpersewaan]);

    }
    public function create()
    {
       return view('gambar_persewaan.create');  
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
        $id = Persewaan::where('user_id', $iduser)->pluck('id')->first();
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
                $entry = new GambarPersewaan();
                $entry->persewaan_id = $id;
                $entry->filename = $filename;
                $entry->save();
          }
        }
        return redirect('gambarsewa')->withSuccessMessage('Gambar Persewaan Berhasil ditambahkan!');
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
        $gambar = GambarPersewaan::find($id);
        return view('gambar_persewaan.edit', ['gambar'=>$gambar]);
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
                $entry = GambarPersewaan::find($id);
                $entry->filename = $filename;
                $entry->save();
          }
        }
        return redirect('gambarsewa')->withSuccessMessage('Gambar Persewaan Berhasil diubah!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $gambarpersewaan = GambarPersewaan::find($id);
        $gambarpersewaan->delete();
        return redirect('gambarsewa');
    }
}
