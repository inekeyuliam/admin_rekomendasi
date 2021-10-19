@extends('layouts.app', ['activePage' => 'persewaan', 'titlePage' => __('')])
@section("content")
<div class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-8">
              <div class="card">
                <div class="card-header card-header-primary">
                  <h4 class="card-title">Detail Persewaan </h4>
                </div>
        <div class="card-body">
            <form class="mt-2" action='{{url("persewaan")}}' method="post">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <div class="row">
            <div class="col-xl-6 col-lg-4">
                <div class="form-group">
                    <label class="exampleFormControlInput1">Nama Persewaan</label>
                    <input class="form-control" type="text" name="nama" value="{{$list->nama_persewaan}}" readonly>
                </div>
            </div>
            
            <div class="col-xl-6 col-md-6 mb-4">
                <div class="form-group">
                    <label class="exampleFormControlInput1">Status Persewaan</label>
                    <input class="form-control" type="text" name="status" value="{{$list->status}}" readonly>
                    </select>
                </div>
            </div>
            </div>
            <div class="row">
                <div class="col-xl-4 col-md-6 mb-4">
                    <div class="form-group">
                        <label class="exampleFormControlInput1">Kabupaten/Kota</label>
                        <input class="form-control" type="text" name="kab" value="{{$list->nama_kabupaten}}" readonly>

                    </div>
                </div>
                <div class="col-xl-4 col-md-6 mb-4">
                    <div class="form-group">
                        <label class="exampleFormControlInput1">Kecamatan</label>
                        <input class="form-control" type="text" name="kec" value="{{$list->nama_kecamatan}}" readonly>

                    </div>
                </div>
                <div class="col-xl-4 col-md-6 mb-4">
                    <div class="form-group">
                        <label class="exampleFormControlInput1">Kelurahan</label>
                        <input class="form-control" type="text" name="kel" value="{{$list->nama_kelurahan}}" readonly>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xl-12 col-md-6 mb-4">
                    <div class="form-group">
                        <label class="exampleFormControlInput1">Alamat Persewaan</label>
                        <input class="form-control" type="text" name="alamat" value="{{$list->alamat}}" readonly>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xl-6 col-lg-7">
                <div class="form-group">
                        <label class="exampleFormControlInput1">Jam Buka</label>
                        <input class="form-control" type="text" name="notlp" value="{{$list->jam_buka}}" readonly>
                    </div>
                </div>
                <div class="col-xl-6 col-md-6 mb-4">
                    <div class="form-group">
                            <label class="exampleFormControlInput1">Jam Tutup</label>
                            <input class="form-control" type="text" name="notlp" value="{{$list->jam_tutup}}" readonly>
                    </div>
                </div>
            </div> 
            <div class="row">
                <div class="col-xl-6 col-lg-7">
                <div class="form-group">
                        <label class="exampleFormControlInput1">Nomor Telp</label>
                        <input class="form-control" type="text" name="notlp" value="{{$list->no_telp}}" readonly>
                    </div>
                </div>
                <div class="col-xl-6 col-md-6 mb-4">
                    <div class="form-group">
                            <label class="exampleFormControlInput1">Nomor Whatsapp</label>
                            <input class="form-control" type="text" name="nowa" value="{{$list->no_wa}}" readonly>
                    </div>
                </div>
            </div>  
            <div class="row">
                <div class="col-xl-6 col-lg-7">
                <div class="form-group">
                        <label class="exampleFormControlInput1">Link Facebook</label>
                        <input class="form-control" type="text" name="notlp" value="{{$list->link_fb}}" readonly>
                    </div>
                </div>
                <div class="col-xl-6 col-md-6 mb-4">
                    <div class="form-group">
                            <label class="exampleFormControlInput1">Link Instagram</label>
                            <input class="form-control" type="text" name="nowa" value="{{$list->link_ig}}" readonly>
                    </div>
                </div>
            </div>  
            <div class="form-group">
                 <a href="{{url('/pengajuan/persewaan')}}" class="btn btn-primary" >Kembali</a>
            </div>             
            </div>
            
        </div>
        
    </div>
    </form>
    <div class="col-md-4">
        <div class="card card-profile">
            <div class="card-header card-header-primary">
                  <h6 class="card-title">Gambar Persewaan</h6>
            </div>
            <div class="card-body">
            <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
                <div class="carousel-inner">
                    <div class="carousel-item active">
                    @foreach ($listgambar as $gambar)
                    <img class="d-block w-100" src="{{asset('images/'.$gambar->filename)}}" alt="First slide">
                    </div>
                </div>
            @endforeach
                <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>
            </div>
            </div>
        </div>
    </form>
</div>


</div>

@endsection
