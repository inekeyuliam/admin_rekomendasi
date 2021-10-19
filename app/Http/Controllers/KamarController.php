<?php

namespace App\Http\Controllers;
use RealRashid\SweetAlert\Facades\Alert;

use Illuminate\Http\Request;
use App\Kamar;
use App\JenisKamar;
use App\GambarKamar;

use App\Hotel;
use Illuminate\Support\Facades\Auth;
use DB;
class KamarController extends Controller
{
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(session('success_message')){
            Alert::success('Success!', session('success_message'));

        }
        $iduser = Auth::user()->id;
        $hot = DB::table('hotels')
        ->join('users','hotels.user_id','=','users.id')
        ->where('users.id','=',$iduser)->where('hotels.status','aktif')
        ->count();
        if($hot == 1)
        {
            $listjenis = JenisKamar::all();
            $listkamar = DB::table('kamars')
            ->join('hotels','kamars.hotel_id','=','hotels.id')
            ->join('jenis_kamars','kamars.jenis_kamar_id','=','jenis_kamars.id')
            ->join('users','hotels.user_id','=','users.id')
            ->select('kamars.id','kapasitas','biaya_permalam','nama_jenis_kamar')
            ->where('users.id','=',$iduser)
            ->get();
            // dd($listkamar);
            return view('kamar.index', ['listjenis'=>$listjenis, 'listkamar'=>$listkamar]);  
        }
        else
        {
            Alert::info('Mohon Maaf Menu Belum Dapat Diakses!', 'Silahkan Cek Status Pengajuan Mitra Anda');
            // return view('homehotel',['listhotel'=>$listhotel, 'detailhotel'=>$detailhotel]);
            return redirect('home/hotel');
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
     
        $jeniskamar = JenisKamar::all();

        return view('kamar.create', ['listjenis'=>$jeniskamar]);  
    
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
        $hotel_id = Hotel::where('user_id', $iduser)->pluck('id')->first();
        $jenis_kamar_id = $request->get('jenis_id');
        $kapasitas = $request->get('kapasitas');
        $biaya_permalam = $request->get('biaya');
        $keterangan = $request->get('keterangan');

        $krit = new Kamar();
        $krit->hotel_id = $hotel_id;
        $krit->jenis_kamar_id=$jenis_kamar_id;
        $krit->kapasitas = $kapasitas;
        $krit->biaya_permalam=$biaya_permalam;
        $krit->keterangan=$keterangan;
        $krit->save();
        $id = $krit->id;

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
                $entry->kamar_id = $id;
                $entry->filename = $filename;
                $entry->save();
          }
        }
        return redirect('kamar')->withSuccessMessage('Kamar Berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $kamar =  DB::table('kamars')
        ->select('kamars.id','kamars.jenis_kamar_id','kamars.kapasitas','kamars.biaya_permalam','kamars.keterangan','jenis_kamars.nama_jenis_kamar')
        ->join('jenis_kamars', 'kamars.jenis_kamar_id', '=','jenis_kamars.id')
        ->where('kamars.id',$id)
        ->first();

        $gambarkamar = DB::table('kamars')
        ->join('gambar_kamars', 'gambar_kamars.kamar_id','=','kamars.id')
        ->where('kamars.id',$id)
        ->get();
        // dd($kamar);

        return view('kamar.show',['kamar' => $kamar, 'gambar' => $gambarkamar]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $kamar = Kamar::find($id);
        $jenis = JenisKamar::all();
        $gambarkamar = DB::table('kamars')
        ->join('gambar_kamars', 'gambar_kamars.kamar_id','=','kamars.id')
        ->where('kamars.id',$id)
        ->get();
        return view('kamar.edit', ['listjenis'=>$jenis,'kamar' => $kamar,'listgambar' => $gambarkamar]);
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
      
        $iduser = Auth::user()->id;
        $hotel_id = Hotel::where('user_id', $iduser)->pluck('id')->first();
        $jenis_kamar_id = $request->get('tipe');
        $kapasitas = $request->get('kapasitas');
        $biaya_permalam = $request->get('biaya');
        $keterangan = $request->get('keterangan');

        $kmr = Kamar::find($id);
        $kmr->jenis_kamar_id=$jenis_kamar_id;
        $kmr->kapasitas = $kapasitas;
        $kmr->biaya_permalam=$biaya_permalam;
        $kmr->keterangan=$keterangan;
        $kmr->save();

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
                $entry->kamar_id = $id;
                $entry->filename = $filename;
                $entry->save();
          }
        }
        return redirect('kamar')->withSuccessMessage('Kamar Berhasil diubah!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $krit = Kamar::find($id);
        $gambarkamar = GambarKamar::with('kamars')->where('kamar_id',$id)->delete();
        $krit->delete();
        return redirect('kamar');
    }
}
