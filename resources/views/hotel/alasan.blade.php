@extends('layouts.app', ['activePage' => 'hotelnonaktif', 'titlePage' => __('Alasan Penolakan Hotel')])
@section("content")
<div class="content">
    <div class="row">
        <div class="container-fluid">
           <div class="col-md-6">
              <div class="card">
              <div class="card-header card-header-primary">
                  <h4 class="card-title">Masukan Alasan Penolakan Hotel</h4>
                </div>
                <div class="card-body">
                    <form class="mt-2" action='{{url("store/tolak/hotel/".$hotel->id)}}' method="post">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <div class="row">
                        <div class="col-md-10">
                    <div class="form-group">
                        <label class="exampleFormControlInput1">Nama Hotel</label>
                        <input class="form-control" type="text" name="nama" value="{{$hotel->nama_hotel}}" readonly>
                    </div> 
                    <div class="form-group">
                        <label for="exampleFormControlInput1">Alasan</label>
                        <textarea class="form-control" rows="5" name="alasan" placeholder="Masukan alasan penolakan hotel"></textarea>
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