@extends('layouts.app', ['activePage' => 'kamar', 'titlePage' => __('Tambah Kamar')])
@section("content")
<div class="content">
    <div class="row">
        <div class="container-fluid">
           <div class="col-md-10">
              <div class="card">
              <div class="card-header card-header-primary">
                  <h4 class="card-title">Input Data Kamar </h4>
                </div>
        <div class="card-body">
            <form class="mt-2" action='{{url("kamar")}}' method="post">
              <input type="hidden" name="_token" value="{{ csrf_token() }}">

            <!-- <div class="form-group">
                <label class="exampleFormControlInput1">Nomor Kamar</label>
                <input class="form-control" type="text" name="nomor" placeholder="Masukan nomor kamar">
            </div> -->
            <div class="form-group">
                <label class="exampleFormControlInput1">Jenis Kriteria</label>
                <select class="form-control" name="jenis_id" required>
                @foreach ($listjenis as $jenis)
                        <option value="{{$jenis->id}}">{{$jenis->nama_jenis_kamar}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label class="exampleFormControlInput1">Kapasitas Kamar</label>
                <input class="form-control" type="number" name="kapasitas" placeholder="Masukan kapasitas">
            </div>
            <div class="form-group">
                <label class="exampleFormControlInput1">Biaya per malam </label>
                <input class="form-control" type="number" name="biaya" placeholder="Masukan biaya">
            </div>
            <div class="form-group">
                    <label class="exampleFormControlInput1">Keterangan</label>
                    <textarea class="form-control" rows="5" name="keterangan" placeholder="Masukan keterangan tempat wisata"></textarea>
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