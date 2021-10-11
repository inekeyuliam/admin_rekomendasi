@extends('layouts.app', ['activePage' => 'persewaannonaktif', 'titlePage' => __('Alasan Penolakan Persewaan')])
@section("content")
<div class="content">
    <div class="row">
        <div class="container-fluid">
           <div class="col-md-6">
              <div class="card">
              <div class="card-header card-header-primary">
                  <h4 class="card-title">Masukan Alasan Penolakan Persewaan</h4>
                </div>
                <div class="card-body">
                    <form class="mt-2" action='{{url("store/alasan/persewaan/".$persewaan->id)}}' method="post">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <div class="row">
                        <div class="col-md-10">
                    <div class="form-group">
                        <label class="exampleFormControlInput1">Nama Persewaan</label>
                        <input class="form-control" type="text" name="nama" value="{{$persewaan->nama_persewaan}}" readonly>
                    </div> 
                    <div class="form-group">
                        <label for="exampleFormControlInput1">Alasan</label>
                        <textarea class="form-control" rows="5" name="keterangan" placeholder="Masukan alasan penolakan hotel"></textarea>
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