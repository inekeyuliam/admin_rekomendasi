@extends('layouts.app', ['activePage' => 'statushotel', 'titlePage' => __('')])
@section("content")
<div class="container-fluid">

<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Hotel Jawa Timur</h1>
</div>


<div class="row">
    <div class="col-lg-8">
        <!-- Basic Card Example -->
        <div class="card shadow mb-8">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary"> Detail Data Hotel </h6>
            </div>

        <div class="card-body">
            <form class="mt-2" action='{{url("hotel")}}' method="post">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <div class="row">
                <div class="col-xl-6 col-lg-7">
                <div class="form-group">
                    <label class="exampleFormControlInput1">Nama Hotel</label>
                    <input class="form-control" type="text" name="nama" value="{{$list->nama_hotel}}" readonly>
                </div>
            </div>
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="form-group">
                    <label class="exampleFormControlInput1">Status Hotel</label>
                    <input class="form-control" type="text" name="status" value="{{$list->status}}" readonly>
                    </select>
                </div>
            </div>
            </div>
            <div class="row">
                <div class="col-xl-3 col-md-6 mb-4">
                    <div class="form-group">
                        <label class="exampleFormControlInput1">Kabupaten/Kota</label>
                        <input class="form-control" type="text" name="kab" value="{{$list->nama_kabupaten}}" readonly>

                    </div>
                </div>
                <div class="col-xl-3 col-md-6 mb-4">
                    <div class="form-group">
                        <label class="exampleFormControlInput1">Kecamatan</label>
                        <input class="form-control" type="text" name="kec" value="{{$list->nama_kecamatan}}" readonly>

                    </div>
                </div>
                <div class="col-xl-3 col-md-6 mb-4">
                    <div class="form-group">
                        <label class="exampleFormControlInput1">Kelurahan</label>
                        <input class="form-control" type="text" name="kel" value="{{$list->nama_kelurahan}}" readonly>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xl-5 col-lg-7">
                    <div class="form-group">
                        <label class="exampleFormControlInput1">Longitude</label>
                        <input class="form-control" type="text" name="long" value="{{$list->longitude}}" readonly>
                    </div>
                </div>
                <div class="col-xl-4 col-md-6 mb-4">
                    <div class="form-group">
                            <label class="exampleFormControlInput1">Latitude</label>
                            <input class="form-control" type="text" name="lat" value="{{$list->latitude}}" readonly>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xl-5 col-lg-7">
                <div class="form-group">
                        <label class="exampleFormControlInput1">Nomor Telp</label>
                        <input class="form-control" type="text" name="notlp" value="{{$list->no_telp}}" readonly>
                    </div>
                </div>
                <div class="col-xl-4 col-md-6 mb-4">
                    <div class="form-group">
                            <label class="exampleFormControlInput1">Harga Standard Permalam</label>
                            <input class="form-control" type="number" name="harga" value="{{$list->harga_permalam}}" readonly>
                    </div>
                </div>
            </div>                
            </div>
        </div>
    </div>
    </form>

</div>
</div>

@endsection