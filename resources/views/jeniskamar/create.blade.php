@extends('layouts.app', ['activePage' => 'jeniskamar', 'titlePage' => __('Tambah Jenis Kamar')])
@section("content")
<div class="content">
    <div class="row">
        <div class="container-fluid">
           <div class="col-md-6">
              <div class="card">
              <div class="card-header card-header-primary">
                  <h4 class="card-title">Input Data Jenis Kamar</h4>
                </div>
                <div class="card-body">
                    <form class="mt-2" action='{{url("jeniskamar")}}' method="post">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <div class="row">
                        <div class="col-md-10">
                    <div class="form-group">
                        <label for="exampleFormControlInput1">Nama Jenis Kamar</label>
                        <input class="form-control" type="text" name="nama" placeholder="Masukan nama jenis kamar">
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