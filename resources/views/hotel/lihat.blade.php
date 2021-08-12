@extends('layouts.app', ['activePage' => 'lihathotel', 'titlePage' => __('')])
@section("content")
<div class="container-fluid">

<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Hotel Jawa Timur</h1>
</div>
<div class="row">
            <div class="col-md-8">
              <div class="card">
                <div class="card-header card-header-primary">
                  <h4 class="card-title">Data Hotel</h4>
                </div>
        <div class="card-body">
            <form class="mt-2">
            <div class="row">
                <div class="col-xl-4 col-lg-7">
                <div class="form-group">
                    <label for="exampleFormControlInput1">Nama Hotel</label>
                    <input class="form-control" type="text" name="nama" value="{{$list->nama_hotel}}" readonly>
                </div>
            </div>
            <div class="col-xl-4 col-md-6 mb-4">
                <div class="form-group">
                    <label class="bmd-label-floating">Status Hotel</label>
                    <input class="form-control" type="text" name="status" value="{{$list->status}}" readonly>
                    </select>
                </div>
            </div>
            <div class="col-xl-4 col-md-6 mb-4">
                <div class="form-group">
                    <label class="bmd-label-floating">Alamat Hotel</label>
                    <input class="form-control" type="text" name="alamat" value="{{$list->alamat}}" readonly>
                    </select>
                </div>
            </div>
            </div>
            <div class="row">
                <div class="col-xl-3 col-lg-7">
                <div class="form-group">
                        <label class="bmd-label-floating">Nomor Telp</label>
                        <input class="form-control" type="text" name="notlp" value="{{$list->no_telp}}" readonly>
                    </div>
                </div>
                <div class="col-xl-3 col-md-6 mb-4">
                    <div class="form-group">
                        <label class="bmd-label-floating">Kabupaten/Kota</label>
                        <input class="form-control" type="text" name="kab" value="{{$list->nama_kabupaten}}" readonly>

                    </div>
                </div>
                <div class="col-xl-3 col-md-6 mb-4">
                    <div class="form-group">
                        <label class="bmd-label-floating">Kecamatan</label>
                        <input class="form-control" type="text" name="kec" value="{{$list->nama_kecamatan}}" readonly>

                    </div>
                </div>
                <div class="col-xl-3 col-md-6 mb-4">
                    <div class="form-group">
                        <label class="bmd-label-floating">Kelurahan</label>
                        <input class="form-control" type="text" name="kel" value="{{$list->nama_kelurahan}}" readonly>
                    </div>
                </div>
            </div>
           
            <div class="row">
                <div class="col-xl-3 col-md-6 mb-4">
                    <div class="form-group">
                            <label for="exampleFormControlInput1">Harga Standard Permalam</label>
                            <input class="form-control" type="number" name="harga" value="{{$list->harga_permalam}}" readonly>
                    </div>
                </div>
                <div class="col-xl-3 col-md-6 mb-4">
                    <div class="form-group">
                            <label for="exampleFormControlInput1">Bintang Hotel</label>
                            <input class="form-control" type="number" name="harga" value="{{$list->harga_permalam}}" readonly>
                    </div>
                </div>
                <div class="col-xl-3 col-md-6 mb-4">
                    <div class="form-group">
                            <label for="exampleFormControlInput1">Harga Standard Permalam</label>
                            <input class="form-control" type="number" name="harga" value="{{$list->harga_permalam}}" readonly>
                    </div>
                </div>
            </div> 
            <div class="form-group">
            <a href="{{url('keubah/hotel')}}" class ="btn btn-primary btn-round">  Ubah Data</a>
            </div>               
        </div>    
        </div>
    </div>
</form>
</div>
</div>

@endsection
