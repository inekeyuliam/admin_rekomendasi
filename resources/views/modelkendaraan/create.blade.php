@extends('layouts.app', ['activePage' => 'modelkendaraan', 'titlePage' => __('Tambah Model Kendaraan')])
@section("content")
<div class="content">
    <div class="row">
        <div class="container-fluid">
           <div class="col-md-6">
              <div class="card">
              <div class="card-header card-header-primary">
                  <h4 class="card-title">Input Data Model Kendaraan</h4>
                </div>
                <div class="card-body">
                    <form class="mt-2" action='{{url("modelkendaraan")}}' method="post">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <div class="row">
                        <div class="col-md-10">
                            <div class="form-group">
                                <label class="exampleFormControlInput1">Merk Kendaraan</label>
                                <select class="form-control" name="merk" required>
                                <option value=""> Pilih Merk Kendaraan </option>
                                    @foreach ($listmerk as $merk)
                                    <option value="{{$merk->id}}">{{$merk->nama_merk}}</option>
                                    @endforeach
                                </select>
                            </div> 
                            <div class="form-group">
                                <label class="exampleFormControlInput1">Nama Model Kendaraan</label>
                                <input class="form-control" type="text" name="nama" placeholder="Masukan nama model" required>
                            </div>                   
                        
                            <div class="form-group">
                            <label class="exampleFormControlInput1">Jenis Kendaraan</label>
                                <select class="form-control" name="jenis" required>
                                <option value=""> Pilih Jenis Kendaraan </option>
                                    <option value="Motor">Sepeda Motor</option>
                                    <option value="Mobil">Mobil</option>
                                    <option value="Minibus/Bus">Minibus/Bus</option>
                                </select>
                            </div>  
                            <div class="form-group">
                                <label class="exampleFormControlInput1">Kapasitas Penumpang</label>
                                <input class="form-control" type="number" name="kapasitas" placeholder="Masukan kapasitas kendaraan" required>
                            </div>                   
                        </div>
                    </div>

                    <div class="form-group">
                        <button class="btn btn-primary" type="submit">Simpan</button>
                    </div>    
                    </form>
                    </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection