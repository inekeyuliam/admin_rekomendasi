<?php

namespace App\Http\Controllers;
use App\JenisKriteria;
use App\Kriteria;
use Illuminate\Http\Request;

class KriteriaController extends Controller
{
    public function index()
    {
        $listkriteria = Kriteria::with('jenis_kriterias')->get();

        return view('kriteria.index',['listkriteria'=>$listkriteria]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $jenis_kriteria = JenisKriteria::all();
        return view('kriteria.create',['list_jenis' => $jenis_kriteria]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $jenis_kriteria_id = $request->get('jenis');
        $nama_kriteria = $request->get('kriteria');
        $tipe_kriteria = $request->get('tipe');

        $krit = new Kriteria();
        $krit->jenis_kriteria_id = $jenis_kriteria_id;
        $krit->kriteria = $nama_kriteria;
        $krit->tipe_kriteria=$tipe_kriteria;
        $krit->save();
        return redirect('kriteria')->withSuccessMessage('Kriteria Berhasil ditambahkan!');

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
        $krit = Kriteria::find($id);
        $listjenis = JenisKriteria::all();

       return view('kriteria.edit', ['itemkriteria' => $krit, 'listjenis' => $listjenis]);
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
        $jenis_kriteria_id = $request->get('jenis');
        $nama_kriteria = $request->get('kriteria');
        $tipe_kriteria = $request->get('tipe');
        $krit = Kriteria::find($id);
        $krit->jenis_kriteria_id = $jenis_kriteria_id;
        $krit->kriteria = $nama_kriteria;
        $krit->tipe_kriteria = $tipe_kriteria;

        $krit->save();
        return redirect('kriteria')->withSuccessMessage('Kriteria Berhasil ditambahkan!');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $krit = Kriteria::find($id);
        $krit->delete();
        return redirect('kriteria');
    }
}
