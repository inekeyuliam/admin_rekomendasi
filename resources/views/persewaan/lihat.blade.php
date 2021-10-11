@extends('layouts.app', ['activePage' => 'lihatpersewaan', 'titlePage' => __('')])
@section("content")
<div class="container-fluid">

<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Persewaan Jawa Timur</h1>
</div>
<div class="row">
            <div class="col-md-8">
              <div class="card">
                <div class="card-header card-header-primary">
                  <h4 class="card-title">Data Persewaan</h4>
                </div>
        <div class="card-body">
            <form class="mt-2">
            <div class="row">
                <div class="col-xl-4 col-lg-7">
                <div class="form-group">
                    <label class="exampleFormControlInput1">Nama Persewaan</label>
                    <input class="form-control" type="text" name="nama" value="{{$list->nama_persewaan}}" readonly>
                </div>
            </div>
            <div class="col-xl-4 col-md-6 mb-4">
                <div class="form-group">
                    <label class="exampleFormControlInput1">Alamat Persewaan</label>
                    <input class="form-control" type="text" name="alamat" value="{{$list->alamat}}" readonly>
                    </select>
                </div>
            </div>
            <div class="col-xl-4 col-md-6 mb-4">
                <div class="form-group">
                    <label class="exampleFormControlInput1">Rating Persewaan</label>
                    <input class="form-control" type="text" name="alamat" value="{{$list->rating}}" readonly>
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
                <div class="col-xl-3 col-lg-7">
                <div class="form-group">
                        <label class="exampleFormControlInput1">Nomor Telp</label>
                        <input class="form-control" type="text" name="notlp" value="{{$list->no_telp}}" readonly>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-7">
                <div class="form-group">
                        <label class="exampleFormControlInput1">Nomor Whatsapp</label>
                        <input class="form-control" type="text" name="nowa" value="{{$list->no_wa}}" readonly>
                    </div>
                </div>
                <div class="col-xl-3 col-md-6 mb-4">
                    <div class="form-group">
                            <label class="exampleFormControlInput1">Link Instagram</label>
                            <input class="form-control" type="text" name="link_ig" value="{{$list->link_ig}}" readonly>
                    </div>
                </div>
                <div class="col-xl-3 col-md-6 mb-4">
                    <div class="form-group">
                            <label class="exampleFormControlInput1">Link Facebook</label>
                            <input class="form-control" type="text" name="link_fb" value="{{$list->link_fb}}" readonly>
                    </div>
                </div>
            </div> 
            <div class="row">
                <div class="col-xl-12 col-lg-7">
                <div class="form-group">
                        <label class="exampleFormControlInput1">Keterangan</label>
                        <input class="form-control"  type="text" name="notlp" value="{{$list->keterangan}}" readonly>
                    </div>
                </div>
            </div>
            <div class="form-group">
            <a href="{{url('keubah/persewaan')}}" class ="btn btn-primary pull-right"> Ubah Data</a>
            </div>               
        </div>    
    </div>
</div>
<div class="col-md-4">
                        <div class="card card-profile">
                            <div class="card-header card-header-primary">
                                <h6 class="card-title">Gambar Persewaan</h6>
                            </div>
                            <div class="card-body">
                                     <div class="slider">
                                        <ul id="frames" class="frames"></ul>
                                        <div class="nav-dots">
                                        </div>
                                    </div>
                            </div>
                        </div>
                    </div>
</form>
</div>
</div>

@endsection
