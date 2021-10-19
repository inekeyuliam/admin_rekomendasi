<?php

namespace App\Http\Controllers;

use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\ModelKendaraan;
use App\MerkKendaraan;

use App\Http\Controllers\File;

class ModelKendaraanController extends Controller
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
        $listmodel = ModelKendaraan::all();
        return view('modelkendaraan.index', ['listmodel'=>$listmodel]);  
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $listmerk = MerkKendaraan::all();
        return view('modelkendaraan.create',['listmerk'=>$listmerk]);

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
        $merk = $request->get('merk');
        $jenis = $request->get('jenis');
        $kapasitas = $request->get('kapasitas');

        $model = new ModelKendaraan();
        $model->nama_model = $nama;
        $model->jenis_kendaraan = $jenis;
        $model->kapasitas = $kapasitas;
        $model->merk_id = $merk;

        $model->save();
        return redirect('modelkendaraan')->withSuccessMessage('Model Kendaraan Berhasil ditambahkan!');
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
        $model = ModelKendaraan::find($id);
        $listmerk = MerkKendaraan::all();

        return view('modelkendaraan.edit', ['listmerk'=>$listmerk,'model' => $model]);
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
        $merk = $request->get('merk');
        $jenis = $request->get('jenis');
        $kapasitas = $request->get('kapasitas');

        $model = ModelKendaraan::find($id);
        $model->nama_model = $nama;
        $model->jenis_kendaraan = $jenis;
        $model->kapasitas = $kapasitas;
        $model->merk_id = $merk;
        $model->save();
        return redirect('modelkendaraan')->withSuccessMessage('Model Kendaraan Berhasil diubah!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $model = ModelKendaraan::find($id);
        $model->delete();
        return redirect('modelkendaraan');
    }
}
