@extends('layouts.app', ['activePage' => 'merkkendaraan', 'titlePage' => __('Edit Merk Kendaraan')])
@section("content")
<div class="content">
<div class="container-fluid">
        <div class="col-md-6">
            <div class="card">
              <div class="card-header card-header-primary">
                  <h4 class="card-title">Edit Data Merk Kendaraan</h4>
                </div>
                <div class="card-body">
                    <form class="mt-2" action='{{url("merkkendaraan/".$itemjenis->id)}}' method="post">{{ method_field("PUT")}}
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <div class="row">
                        <div class="col-md-10">
                        <div class="form-group">
                            <label class="exampleFormControlInput1">Nama Merk Kendaraan</label>
                            <input class="form-control" type="text" name="nama" value="{{$itemjenis->nama_merk_kendaraan}}"  >
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