<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\TrenWisata;

class TrenWisataController extends Controller
{
    public function index()
    {
        $wis = TrenWisata::all();

      return view('wisata.tren.index', ['wisata'=>$wis]);  

    }
    public function updatetren()
    {
        $path = storage_path() . "/json/eastjava.json"; // ie: /var/www/laravel/app/storage/json/filename.json
        $json = json_decode(file_get_contents($path), true); 
        // dd($json['results']);
        foreach ($json['results'] as $list) {
            // dd($list['name']);
           
            $wis = new TrenWisata();
            $wis->nama_top_wisata = $list['name'];
            // $wis->link_gambar = $list['name'];

            $wis->save();
            
        }
    }
    public function edit($id)
    {
        $wis = TrenWisata::find($id);
        return view('wisata.tren.edit', ['wis'=>$wis]);
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
                $entry = TrenWisata::find($id);
                $entry->link_gambar = $filename;
                $entry->save();
          }
        }
        return redirect('/tren/wisata')->withSuccessMessage('Gambar Wisata Berhasil diubah!');
    }


    public function destroy($id)
    {
        $wis = TrenWisata::find($id);
        $wis->delete();
        return redirect('/tren/wisata');
    }

}
