@extends('layouts.app', ['activePage' => 'modelkendaraan', 'titlePage' => __('Edit Model Kendaraan')])
@section("content")
<div class="content">
<div class="container-fluid">
        <div class="col-md-6">
            <div class="card">
              <div class="card-header card-header-primary">
                  <h4 class="card-title">Edit Data Model Kendaraan</h4>
                </div>
                <div class="card-body">
                    <form class="mt-2" action='{{url("modelkendaraan/".$model->id)}}' method="post">{{ method_field("PUT")}}
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <div class="row">
                        <div class="col-md-10">
                            <div class="form-group">
                                <label class="exampleFormControlInput1">Merk Kendaraan</label>
                                <select class="form-control" name="merk" required>
                                <option value=""> Pilih Merk Kendaraan </option>
                                    @foreach ($listmerk as $merk)
										<option value="{{$merk->id}}" @if($merk->id == $model->merk_id){
											{{"selected"}}
										}
										@endif>{{$merk->nama_merk}}</option>
								    @endforeach
                                </select>
                            </div> 
                            <div class="form-group">
                                <label class="exampleFormControlInput1">Model Kendaraan</label>
                                <input class="form-control" type="text" name="nama" placeholder="Masukan nama model" value='{{$model->nama_model}}' required>
                            </div>                   
                        
                            <div class="form-group">
                            <label class="exampleFormControlInput1">Jenis Kendaraan</label>
                                <select class="form-control" name="jenis" required>
                                <option value=""> Pilih Jenis Kendaraan </option>
                                    <option value="Motor"@if($model->jenis_kendaraan == 'Motor') selected ='selected' @endif>Sepeda Motor</option>
                                    <option value="Mobil"@if($model->jenis_kendaraan == 'Mobil') selected ='selected' @endif>Mobil</option>
                                    <option value="Minibus/Bus"@if($model->jenis_kendaraan == 'Minibus/Bus') selected ='selected' @endif>Minibus/Bus</option>
                                </select>
                            </div>  
                            <div class="form-group">
                                <label class="exampleFormControlInput1">Kapasitas Penumpang</label>
                                <input class="form-control" type="number" name="kapasitas" placeholder="Masukan kapasitas penumpang" value='{{$model->kapasitas}}' required>
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