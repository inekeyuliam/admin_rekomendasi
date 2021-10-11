<?php

namespace App\Http\Controllers;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Http\Request;
use App\Kendaraan;
use App\Persewaan;
use App\ModelKendaraan;
use Illuminate\Support\Facades\Auth;
use DB;

class KendaraanController extends Controller
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
        $hot = DB::table('persewaans')
        ->join('users','persewaans.user_id','=','users.id')
        ->where('users.id','=',$iduser)->where('persewaans.status','aktif')
        ->count();
        if($hot == 1)
        {
            $listmerk = ModelKendaraan::all();
            $listkend = DB::table('persewaans')
            ->join('kendaraans','kendaraans.persewaan_id','=','persewaans.id')
            ->join('model_kendaraans','model_kendaraans.id','=','kendaraans.model_id')
            ->join('merk_kendaraans','merk_kendaraans.id','=','model_kendaraans.merk_id')
            ->join('users','persewaans.user_id','=','users.id')
            ->where('users.id','=',$iduser)
            ->get();
            return view('kendaraan.index', ['listmerk'=>$listmerk, 'listkend'=>$listkend]);  
        }
        else
        {
            Alert::info('Mohon Maaf Menu Belum Dapat Diakses!', 'Silahkan Tunggu Hingga Persewaan Diverifikasi');
            // return view('homehotel',['listhotel'=>$listhotel, 'detailhotel'=>$detailhotel]);
            return redirect('home/persewaan');
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $model = ModelKendaraan::all();

        return view('kendaraan.create', ['listmod'=>$model]);  
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
        $persewaan_id = Persewaan::where('user_id', $iduser)->pluck('id')->first();
        $file = $request->get('filename');
        $namamodel = $request->get('nama');
        $jenis = $request->get('jenis');
        $model = $request->get('model');
        $tahun = $request->get('tahun');
        $suratuji = $request->get('uji');
        $kapasitas = $request->get('kapasitas');
        $biaya = $request->get('biaya');
        $ket = $request->get('ket');

        $kend = new Kendaraan();
        $kend->persewaan_id = $persewaan_id;
        $kend->filename_gambar = $file;
        $kend->model_id = $model;
        $kend->tahun_keluaran = $tahun;
        $kend->biaya_perhari=$biaya;
        $kend->keterangan=$ket;
        $kend->save();
        return redirect('kendaraan')->withSuccessMessage('Kendaraan Berhasil ditambahkan!');
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
        $iduser = Auth::user()->id;
        $persewaan_id = Persewaan::where('user_id', $iduser)->pluck('id')->first();
        $file = $request->get('filename');
        $namamodel = $request->get('nama');
        $jenis = $request->get('jenis');
        $model = $request->get('model');
        $tahun = $request->get('tahun');
        $suratuji = $request->get('uji');
        $kapasitas = $request->get('kapasitas');
        $biaya = $request->get('biaya');
        $ket = $request->get('ket');
        
        $kend = Kendaraan::find($id);
        $kend->persewaan_id = $persewaan_id;
        $kend->filename_gambar = $file;
        $kend->model_id = $model;
        $kend->tahun_keluaran = $tahun;
        $kend->biaya_perhari=$biaya;
        $kend->keterangan=$ket;
        $kend->save();
        return redirect('kendaraan')->withSuccessMessage('Kendaraan Berhasil diubah!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $kend = Kendaraan::find($id);
        $kend->delete();
        return redirect('kamar');
    }
}
