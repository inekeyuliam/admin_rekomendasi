@extends('layouts.app', ['activePage' => 'tipewisata', 'titlePage' => __('Tambah Tipe Wisata')])
@section("content")
<div class="content">
    <div class="row">
        <div class="container-fluid">
           <div class="col-md-6">
              <div class="card">
              <div class="card-header card-header-primary">
                  <h4 class="card-title">Input Data Tipe Wisata</h4>
                </div>
                <div class="card-body">
                    <form class="mt-2" action='{{url("tipewisata")}}' method="post">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <div class="row">
                        <div class="col-md-10">
                    <div class="form-group">
                        <label class="exampleFormControlInput1">Nama Tipe Wisata</label>
                        <input class="form-control" type="text" name="nama" placeholder="Masukan nama tipe wisata">
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