<?php

namespace App\Http\Controllers;

use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\MerkKendaraan;
use App\Http\Controllers\File;
class MerkKendaraanController extends Controller
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
        $listmerk = MerkKendaraan::all();

        return view('merkkendaraan.index', ['listmerk'=>$listmerk]);  
    }
   
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('merkkendaraan.create');
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
        $merk = new MerkKendaraan();
        $merk->nama_merk_kendaraan = $nama;
        $merk->save();
        return redirect('merkkendaraan')->withSuccessMessage('Merk Kendaraan Berhasil ditambahkan!');
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
        
        $merk = MerkKendaraan::find($id);

        return view('merkkendaraan.edit', ['itemjenis' => $merk]);
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
        $merk = MerkKendaraan::find($id);
        $merk->nama_merk_kendaraan = $nama;
        $merk->save();
        return redirect('merkkendaraan')->withSuccessMessage('Merk Kendaraan Berhasil diubah!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $merk = MerkKendaraan::find($id);
        $merk->delete();
        return redirect('merkkendaraan');
    }
}
