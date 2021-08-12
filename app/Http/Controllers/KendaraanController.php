<?php

namespace App\Http\Controllers;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Http\Request;
use App\Kendaraan;
use App\Persewaan;
use App\MerkKendaraan;
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
            $listmerk = MerkKendaraan::all();
            $listkend = DB::table('persewaans')
            ->join('kendaraans','kendaraans.persewaan_id','=','persewaans.id')
            ->join('merk_kendaraans','merk_kendaraans.id','=','kendaraans.merk_id')
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
        $merk = MerkKendaraan::all();

        return view('kendaraan.create', ['listmerk'=>$merk]);  
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
        $merk = $request->get('merk');
        $tahun = $request->get('tahun');
        $suratuji = $request->get('uji');
        $kapasitas = $request->get('kapasitas');
        $biaya = $request->get('biaya');
        $ket = $request->get('ket');

        $kend = new Kendaraan();
        $kend->persewaan_id = $persewaan_id;
        $kend->filename_gambar = $file;
        $kend->nama_model_kendaraan = $namamodel;
        $kend->jenis_kendaraan=$jenis;
        $kend->surat_uji = $suratuji;
        $kend->merk_id = $merk;
        $kend->tahun_keluaran = $tahun;
        $kend->biaya_perhari=$biaya;
        $kend->kapasitas_penumpang = $kapasitas;
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
        //
    }
}
