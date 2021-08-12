<?php

namespace App\Http\Controllers;
use App\TipeWisata;
use Illuminate\Http\Request;

class TipeWisataController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $listtipe = TipeWisata::all();
        return view('tipewisata.index', ['listtipe'=>$listtipe]);    
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('tipewisata.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $nama_tipe = $request->get('nama');
        $tipe = new TipeWisata();
        $tipe->nama_tipe = $nama_tipe;
        $tipe->save();
        return redirect('tipewisata')->withSuccessMessage('Tipe Wisata Berhasil ditambahkan!');
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
        $tipe = TipeWisata::find($id);

       return view('tipewisata.edit', ['itemtipe' => $tipe]);
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
        $tipe = TipeWisata::find($id);
        $tipe->nama_tipe = $nama;
        $tipe->save();
        return redirect('tipewisata')->withSuccessMessage('Tipe Wisata Berhasil diubah!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $tipe = TipeWisata::find($id);
        $tipe->delete();
        return redirect('tipewisata');
    }
}
