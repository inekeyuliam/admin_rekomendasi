<?php

namespace App\Http\Controllers;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Http\Request;
use App\JenisKamar;

class JenisKamarController extends Controller
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
        $listjenis = JenisKamar::all();
        return view('jeniskamar.index', ['listjenis'=>$listjenis]);  
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('jeniskamar.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $nama = $request->get('nama');
        $tipe = new JenisKamar();
        $tipe->nama_jenis_kamar = $nama;
        $tipe->save();
        return redirect('jeniskamar')->withSuccessMessage('Jenis Kamar Berhasil ditambahkan!');
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
        $jns = JenisKamar::find($id);

        return view('jeniskamar.edit', ['itemjenis' => $jns]);
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
        $nama = $request->get('nama');
        $tipe = JenisKamar::find($id);
        $tipe->nama_jenis_kamar = $nama;
        $tipe->save();
        return redirect('jeniskamar')->withSuccessMessage('Jenis Kamar Berhasil diubah!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $jenis = JenisKamar::find($id);
        $jenis->delete();
        return redirect('jeniskamar');
    }
}
