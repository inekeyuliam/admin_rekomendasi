<?php

namespace App\Http\Controllers;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Kriteria;
use App\JenisKriteria;
use App\DetailKriteria;
use DB;
class DetailKriteriaController extends Controller
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
        $listjenis = JenisKriteria::all();
        $listkriteria = Kriteria::all();
        $listdetail = DetailKriteria::all();
        return view('detailkriteria.index', ['listjenis'=>$listjenis, 
        'listkriteria'=>$listkriteria,'listdetail'=>$listdetail]);  
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $iduser = Auth::user()->id;
        $listjenis = JenisKriteria::all();
        $listkriteria = Kriteria::all();
        return view('detailkriteria.create', ['listjenis'=>$listjenis, 
        'listkriteria'=>$listkriteria]);  
    }

    public function getKriteria($id){
        echo json_encode(DB::table('kriterias')->where("jenis_kriteria_id", $id)->get());
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $kriteria = $request->get('kriteria');
        $nama = $request->get('nama');
        $det = new DetailKriteria();
        $det->nama_detail = $nama;
        $det->kriteria_id = $kriteria;
        $det->save();
        return redirect('detailkriteria')->withSuccessMessage
        ('Detail Kriteria Berhasil ditambahkan!');
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
        $listkriteria = Kriteria::all();
        $listjenis = JenisKriteria::all();
        $listall = DB::table('detail_kriterias')
        ->join('kriterias','kriterias.id','=','detail_kriterias.kriteria_id')
        ->join('jenis_kriterias','kriterias.jenis_kriteria_id','=','jenis_kriterias.id')
        ->where('detail_kriterias.id','=',$id)
        ->first(); 
        return view('detailkriteria.edit', ['listall' => $listall, 'listjenis' => $listjenis, 'listkriteria' => $listkriteria]);
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
        $kriteria = $request->get('kriteria');
        $nama = $request->get('nama');
        DB::table('detail_kriterias')->where('detail_kriterias.id',$id)->update([
            'nama_detail' => $nama,
            'kriteria_id' => $kriteria
        ]);
        // $kriteria = $request->get('kriteria');
        // $nama = $request->get('nama');
        // $det = DetailKriteria::find($id);
        // $det->nama_detail = $nama;
        // $det->kriteria_id = $kriteria;
        // $det->save();
        return redirect('detailkriteria')->withSuccessMessage
        (' Detail Kriteria Berhasil diubah!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $detkrit = DetailKriteria::find($id);
        $detkrit->delete();
        return redirect('detailkriteria');
    }
}
