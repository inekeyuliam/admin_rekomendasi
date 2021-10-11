@extends('layouts.app', ['activePage' => 'kriteria', 'titlePage' => __('Tambah Kriteria')])
@section("content")
<div class="content">
    <div class="row">
        <div class="container-fluid">
           <div class="col-md-10">
              <div class="card">
              <div class="card-header card-header-primary">
                  <h4 class="card-title">Input Data Kriteria Rekomendasi</h4>
                </div>
        <div class="card-body">
            <form class="mt-2" action='{{url("kriteria")}}' method="post">
              <input type="hidden" name="_token" value="{{ csrf_token() }}">

            <div class="form-group">
                <label class="exampleFormControlInput1">Nama Kriteria</label>
                <input class="form-control" type="text" name="kriteria" placeholder="Masukan nama kriteria">
            </div>
            <div class="form-group">
                <label class="exampleFormControlInput1">Jenis Kriteria</label>
                <select class="form-control" name="jenis" required>
                <option value=""> Pilih Jenis Kriteria </option>
                    @foreach ($list_jenis as $jenis)
                        <option value="{{$jenis->id}}">{{$jenis->nama_jenis}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label class="exampleFormControlInput1">Tipe Kriteria</label>
                <select class="form-control" name="tipe" required>
                <option value=""> Pilih Tipe Kriteria </option>
                              <option value="Benefit">Benefit</option>
                              <option value="Cost">Cost</option>
                </select>
            </div>

            <div class="form-group">
                <label class="exampleFormControlInput1">Satuan Kriteria</label>
                <input class="form-control" type="text" name="satuan" placeholder="Masukan satuan kriteria">
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