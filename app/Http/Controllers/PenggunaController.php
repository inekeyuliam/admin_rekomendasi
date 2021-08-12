<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class PenggunaController extends Controller
{
    public function index()
    {
        $listuser = User::all();
        return view('pengguna.index', ['listuser' => $listuser]);    
    }
    public function edit($id)
    {
        $user = User::find($id);

       return view('pengguna.edit', ['user' => $user]);
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
        $email = $request->get('email');

        $tipe = User::find($id);
        $tipe->name = $nama;
        $tipe->email = $email;

        $tipe->save();
        return redirect('pengguna')->withSuccessMessage('Tipe Wisata Berhasil diubah!');
    }
}
