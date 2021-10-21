@extends('layouts.app', ['activePage' => 'lihatbobotpersewaan', 'titlePage' => __('')])
@section("content")
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header card-header-primary">
                    <h4 class="card-title">Bobot Kriteria Mitra Persewaan</h4>
                    </div>
                    <div class="card-body">
                        <form class="mt-2">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                @foreach ($listkriteria as $krit)
                                <div class="row">
                                    <div class="col-xl-11 col-md-16 mb-8">
                                        <div class="form-group">
                                            <label class="exampleFormControlInput1">{{$krit->kriteria}}</label>
                                            <input class="form-control" type="number" name="nilai_kriteria[{{$krit->id}}]" value="{{$krit->nilai}}" readonly>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
        
                        <div class="form-group">
                            <a href="{{url('keubahbobot/hotel')}}" class ="btn btn-primary btn-round">  Ubah Data Bobot</a>
                        </div>
                    </div>
                </div></form>
            </div>
        </div>
    </div>
</div>

@endsection