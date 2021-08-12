@extends('layouts.app', ['activePage' => '', 'titlePage' => __('')])
@section("content")
<div class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-8">
              <div class="card">
                <div class="card-header card-header-primary">
                  <h4 class="card-title">Detail Hotel </h4>
                </div>
        <div class="card-body">
            <form class="mt-2" action='{{url("hotel")}}' method="post">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <div class="row">
                <div class="col-xl-6 col-lg-7">
                <div class="form-group">
                    <label for="exampleFormControlInput1">Nama Hotel</label>
                    <input class="form-control" type="text" name="nama" value="{{$list->nama_hotel}}" readonly>
                </div>
            </div>
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="form-group">
                    <label class="bmd-label-floating">Status Hotel</label>
                    <input class="form-control" type="text" name="status" value="{{$list->status}}" readonly>
                    </select>
                </div>
            </div>
            </div>
            <div class="row">
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
            <div class="col-xl-9 col-md-6 mb-4">
                                    <div class="form-group">
                                    <label class="bmd-label-floating">Alamat Hotel</label>
                                    <input class="form-control" type="text" name="alamat" value="{{$list->alamat}}" readonly>
                                    </div>
                    </div>
            </div>
  
            <div class="row">
                <div class="col-xl-5 col-lg-7">
                <div class="form-group">
                        <label class="bmd-label-floating">Nomor Telp</label>
                        <input class="form-control" type="text" name="notlp" value="{{$list->no_telp}}" readonly>
                    </div>
                </div>
                <div class="col-xl-4 col-md-6 mb-4">
                    <div class="form-group">
                            <label for="exampleFormControlInput1">Harga Standard Permalam</label>
                            <input class="form-control" type="number" name="harga" value="{{$list->harga_permalam}}" readonly>
                    </div>
                </div>
            </div>   
            <div class="form-group">
                 <a href="{{url('/pengajuan/hotel')}}" class="btn btn-primary" >Kembali</a>
        </div>             
            </div>
            
        </div>
        
    </div>
    </form>
    <div class="col-md-4">
              <div class="card card-profile">
                <div class="card-header card-header-primary">
                  <h6 class="card-title">Gambar Hotel</h6>
                </div>
                <div class="card-body">
                @foreach ($listgambar as $gambar)
                <div class="row">
                    <div class="carousel-item active">

                            <img src="/images/{{$gambar->filename}}" height="240px" width="180px" />

                    </div>
                </div>
                <br>
                @endforeach
               </div>
              </div>
              </form>

    </div>
</div>


</div>

@endsection