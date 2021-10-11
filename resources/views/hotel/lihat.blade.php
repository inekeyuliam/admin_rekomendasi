@extends('layouts.app', ['activePage' => 'lihathotel', 'titlePage' => __('')])
@section("content")
<div class="content">
    <div class="container-fluid">
<!-- Page Heading -->
        <div class="row">
            <div class="col-md-8">
              <div class="card">
                <div class="card-header card-header-primary">
                  <h4 class="card-title">Data Hotel</h4>
                </div>
                <div class="card-body">
                    <form class="mt-2">
                    <div class="row">
                        <div class="col-xl-3 col-lg-7">
                        <div class="form-group">
                            <label class="exampleFormControlInput1">Nama Hotel</label>
                            <input class="form-control" type="text" name="nama" value="{{$list->nama_hotel}}" readonly>
                        </div>
                    </div>
                    <div class="col-xl-1 col-md-6 mb-4">
                        <div class="form-group">
                            <label class="exampleFormControlInput1">Bintang </label>
                            <input class="form-control" type="text" name="status" value="{{$list->bintang}}" readonly>
                            </select>
                        </div>
                    </div>
                    <div class="col-xl-2 col-md-6 mb-4">
                        <div class="form-group">
                            <label class="exampleFormControlInput1">Status Hotel</label>
                            <input class="form-control" type="text" name="status" value="{{$list->status}}" readonly>
                            </select>
                        </div>
                    </div>
                    <div class="col-xl-6 col-md-6 mb-4">
                        <div class="form-group">
                            <label class="exampleFormControlInput1">Alamat Hotel</label>
                            <input class="form-control" type="text" name="alamat" value="{{$list->alamat}}" readonly>
                            </select>
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
                        <div class="col-xl-3 col-lg-7">
                        <div class="form-group">
                                <label class="exampleFormControlInput1">Nomor WhatsApp</label>
                                <input class="form-control" type="text" name="notlp" value="{{$list->no_wa}}" readonly>
                            </div>
                        </div>
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="form-group">
                                <label class="exampleFormControlInput1">Link Facebook</label>
                                <input class="form-control" type="text" name="fb" value="{{$list->link_fb}}" readonly>

                            </div>
                        </div>
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="form-group">
                                <label class="exampleFormControlInput1">Link Instagram</label>
                                <input class="form-control" type="text" name="ig" value="{{$list->link_ig}}" readonly>

                            </div>
                        </div>
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="form-group">
                                <label class="exampleFormControlInput1">Rating</label>
                                <input class="form-control" type="text" name="rating" value="{{$list->rating}}" readonly>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xl-12 col-lg-7">
                            <div class="form-group">
                                <label class="exampleFormControlInput1">Keterangan</label>
                                <input class="form-control" type="text" name="keterangan" value="{{$list->keterangan}}" readonly>
                            </div>
                        </div>
                    </div>       
                    <div class="form-group">
                    @if($list->status == 'aktif')
                    <a href="{{url('keubah/hotel')}}" class ="btn btn-primary btn-round">  Ubah Data</a>
                    @endif
                    </div>               
                </div>    
              </div>
            </div>
            </form>
        </div>
     </div>
</div>

@endsection
