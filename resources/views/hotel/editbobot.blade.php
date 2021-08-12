@extends('layouts.app', ['activePage' => 'lihatbobothotel', 'titlePage' => __('')])
@section("content")
<div class="container-fluid">

<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Hotel Jawa Timur</h1>
</div>


<div class="row">
        <div class="col-md-4">
            <div class="card">
                <div class="card-header card-header-primary">
                  <h4 class="card-title">Input Bobot Kriteria Mitra Hotel</h4>
                </div>
                <div class="card-body">
                        <form class="mt-2">
                            <form class="mt-2" action='{{url("ubahbobot/hotel")}}' method="post">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            @foreach ($listkriteria as $krit)
                            <div class="row">
                                <div class="col-xl-11 col-md-16 mb-8">
                                    <div class="form-group">
                                        <label for="exampleFormControlInput1">{{$krit->kriteria}}</label>
                                        <input class="form-control" type="number" name="nilai_kriteria[{{$krit->id}}]" value="{{$krit->nilai}}" >
                                    </div>
                                </div>
                            </div>

                            @endforeach
      
                            <div class="form-group">
                                <button class="btn btn-primary" type="submit">Simpan</button>
                            </div>
                                
                
        
        </div>
    </div>
    
    </form>

</div>
</div>

@endsection