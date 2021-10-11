@extends('layouts.app', ['activePage' => 'kendaraan', 'titlePage' => __('Tambah Kendaraan')])
@section("content")
<div class="content">
    <div class="row">
        <div class="container-fluid">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header card-header-primary">
                  <h4 class="card-title">Input Data Kendaraan </h4>
                </div>
                <div class="card-body">
                    <form class="mt-2" action='{{url("kendaraan")}}' method="post">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <div class="form-group">
                            <label class="exampleFormControlInput1">Model Kendaraan</label>
                                <select class="form-control" name="model" required>
                                <option value=""> Pilih Model Kendaraan </option>
                                    @foreach ($listmod as $model)
                                    <option value="{{$model->id}}">{{$model->nama_model}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Pilih Gambar Hotel</label>
                                <input type="file" name="filename[]" id="filename" accept=".jpg, .jpeg, .png" multiple=""/>
                            </div>
                            <div class="form-group">
                                <label class="exampleFormControlInput1">Biaya per hari </label>
                                <input class="form-control" type="number" name="biaya" placeholder="Masukan biaya">
                            </div>
                   
                            <div class="form-group">
                                <label class="exampleFormControlInput1">Tahun Keluaran</label>
                                <input class="form-control" type="number" name="tahun" placeholder="Masukan tahun keluaran">
                            </div>
                
                            <div class="form-group">
                                    <label class="exampleFormControlInput1">Keterangan</label>
                                    <textarea class="form-control" rows="5" name="ket" placeholder="Masukan keterangan tempat wisata"></textarea>
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