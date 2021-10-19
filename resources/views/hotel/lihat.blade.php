@extends('layouts.app', ['activePage' => 'lihathotel', 'titlePage' => __('')])
@section("content")
<div class="content">
    <div class="container-fluid">
        <div class="row">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header card-header-primary">
                        <h4 class="card-title">Data Hotel</h4>
                        </div>
                        <div class="card-body">
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
                                        <textarea class="form-control" rows="5" name="keterangan" value="{{$list->keterangan}}" readonly></textarea>
                                    </div>
                                </div>
                            </div> 
                            <div class="row">
                                <div class="col-xl-12 col-lg-7">
                                    <div class="form-group">
                                        <label class="exampleFormControlInput1">Fasilitas Hotel</label><br><br>
                                        <div class="form-row">
                                        @foreach($detail as $item)
                                            <div class="col-md-4">
                                            <label>{{$item->nama_detail}}</label>
                                            </div>
                                        @endforeach
                                        </div>
                                    </div>
                                </div>
                            </div>  
                            <div class="form-group">
                                @if($list->status == 'aktif')
                                <a href="{{url('keubah/hotel/'.$list->id)}}" class ="btn btn-primary "><i class="fa fa-edit" aria-hidden="true"></i>  &nbsp; Ubah Data Hotel</a>
                                @endif
                            </div>               
                        </div>    
                    </div>
                </div>

                <div class="col-md-4">
					<div class="card card-profile">
						<div class="card-header card-header-info">
							<h6 class="card-title">Gambar Hotel</h6>
						</div>
						<div class="card-body">
							<div class="col-md-4">
								@foreach($listgambar as $key => $item2)
								<div class="thumbnail">
									<img class="img-thumbnail mySlides"src="{{ asset('images/'.$item2->filename) }}" />
								</div>
								@endforeach
							</div>
							<div class="row text-center">
								<div class="col-md-12">
									<button class="btn-info w3-display-left"onclick="plusDivs(-1)">&#10094;</button>
              						<button class="btn-info w3-display-right" onclick="plusDivs(1)">&#10095;</button>
								</div>
							</div><br>
                            
                            @if($list->status == 'aktif')
                                <a href="{{url('/gambarhotel')}}" class ="btn btn-info btn-round">  Lihat Daftar Gambar</a>
                            @endif
						</div>
                      
					</div>
			    </div>
            </div>   
        </div>
        <!-- <div class="col-md-12">
                    <div class="card">
                        <div class="card-header card-header-success">
                        <h4 class="card-title">Fasilitas Hotel</h4>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-xl-8 col-lg-7">
                                <label class="checkbox-inline">Pilih fasilitas yang dimiliki hotel : </label>        <br><br>                    
                                </div>
                            </div>

                          
                       
                            <div class="form-group">
                                @if($list->status == 'aktif')
                                <a href="{{url('keubah/hotel')}}" class ="btn btn-success "><i class="fa fa-edit" aria-hidden="true"></i>  &nbsp; Ubah Data Hotel</a>
                                @endif
                            </div>               
                        </div>    
                    </div>
        </div> -->
     </div>
</div>
<script>
var slideIndex = 1;
showDivs(slideIndex);

function plusDivs(n) {
  showDivs(slideIndex += n);
}

function showDivs(n) {
  var i;
  var x = document.getElementsByClassName("mySlides");
  if (n > x.length) {slideIndex = 1}
  if (n < 1) {slideIndex = x.length}
  for (i = 0; i < x.length; i++) {
    x[i].style.display = "none";  
  }
  x[slideIndex-1].style.display = "block";  
}
$('#closemodal').click(function() {
  $('#exampleModal').modal('hide');
  alert("Review berhasil disimpan"); 

});

$('.stars a').on('click', function(){
  $('.stars span, .stars a').removeClass('active');

  $(this).addClass('active');
  $('.stars span').addClass('active');
});
</script>
@endsection
