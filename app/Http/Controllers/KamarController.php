<?php

namespace App\Http\Controllers;
use RealRashid\SweetAlert\Facades\Alert;

use Illuminate\Http\Request;
use App\Kamar;
use App\JenisKamar;
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
            $listkamar = DB::table('hotels')
            ->join('kamars','kamars.hotel_id','=','hotels.id')
            ->join('jenis_kamars','kamars.jenis_kamar_id','=','jenis_kamars.id')
            ->join('users','hotels.user_id','=','users.id')
            ->where('users.id','=',$iduser)
            ->get();
            return view('kamar.index', ['listjenis'=>$listjenis, 'listkamar'=>$listkamar]);  
        }
        else
        {
            Alert::info('Mohon Maaf Menu Belum Dapat Diakses!', 'Silahkan Tunggu Hingga Hotel Diverifikasi');
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
      
        // $hot_id = $hotel->id;
        $nomor_kamar = $request->get('nomor');
        $jenis_kamar_id = $request->get('jenis_id');
        $kapasitas = $request->get('kapasitas');
        $biaya_permalam = $request->get('biaya');

        $krit = new Kamar();
        $krit->hotel_id = $hotel_id;
        $krit->nomor_kamar = $nomor_kamar;
        $krit->jenis_kamar_id=$jenis_kamar_id;
        $krit->kapasitas = $kapasitas;
        $krit->biaya_permalam=$biaya_permalam;
        $krit->save();
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
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
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
        $krit->delete();
        return redirect('kamar');
    }
}
