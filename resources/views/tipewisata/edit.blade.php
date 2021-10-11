@extends('layouts.app', ['activePage' => 'tipewisata', 'titlePage' => __('Edit Tipe Wisata')])
@section("content")
<div class="content">
<div class="container-fluid">
        <div class="col-md-6">
            <div class="card">
              <div class="card-header card-header-primary">
                  <h4 class="card-title">Edit Data Tipe Wisata</h4>
                </div>
                <div class="card-body">
                    <form class="mt-2" action='{{url("tipewisata/".$itemtipe->id)}}' method="post">{{ method_field("PUT")}}
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <div class="row">
                        <div class="col-md-10">
                        <div class="form-group">
                            <label class="exampleFormControlInput1">Nama Tipe</label>
                            <input class="form-control" type="text" name="nama" value="{{$itemtipe->nama_tipe}}"  >
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