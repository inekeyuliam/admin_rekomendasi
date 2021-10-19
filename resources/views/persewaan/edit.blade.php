@extends('layouts.app', ['activePage' => 'lihatpersewaan', 'titlePage' => __('')])
@section("content")
<div class="content">
    <div class="container-fluid">
        <div class="row">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header card-header-primary">
                        <h4 class="card-title">Data Persewaan Kendaraan</h4>
                        </div>
                        <div class="card-body">
                            <form class="mt-2" action='{{url("ubah/persewaan/". $list->id)}}' method="post" enctype="multipart/form-data">
					        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <div class="row">
                                <div class="col-xl-3 col-lg-7">
                                    <div class="form-group">
                                        <label class="exampleFormControlInput1">Nama Persewaan Kendaraan</label>
                                        <input class="form-control" type="text" name="nama" value="{{$list->nama_persewaan}}"  >
                                    </div>
                                </div>
                             
                                <div class="col-xl-2 col-md-4 mb-4">
                                    <div class="form-group">
                                        <label class="exampleFormControlInput1">Status </label>
                                        <input class="form-control" type="text" name="status" value="{{$list->status}}" readonly >
                                        </select>
                                    </div>
                                </div>
                                <div class="col-xl-7 col-md-6 mb-4">
                                    <div class="form-group">
                                        <label class="exampleFormControlInput1">Alamat Persewaan Kendaraan</label>
                                        <input class="form-control" type="text" name="alamat" value="{{$list->alamat}}"  >
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xl-4 col-md-6 mb-4">
                                    <div class="form-group">
                                        <label class="exampleFormControlInput1">Nomor Telp</label>
                                        <input class="form-control" type="text" name="no_tlp" value="{{$list->no_telp}}"  >
                                    </div>
                                </div>
                                <div class="col-xl-4 col-md-6 mb-4">
                                    <div class="form-group">
                                        <label class="exampleFormControlInput1">Nomor WhatsApp</label>
                                        <input class="form-control" type="text" name="no_wa" value="{{$list->no_wa}}"  >
                                    </div>
                                </div>
                               
                                <div class="col-xl-4 col-md-6 mb-4">
                                    <div class="form-group">
                                        <label class="exampleFormControlInput1">Rating</label>
                                        <input class="form-control" type="text" name="rating" value="{{$list->rating}}"  >
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                            <div class="col-xl-6 col-md-6 mb-4">
                                <div class="form-group">
                                <label class="exampleFormControlInput1">Jam Buka</label>
                                <input class="form-control" type="time" name="buka" value="{{$list->jam_buka}}"required>
                                </div>
                                </div>
                                <div class="col-xl-6 col-md-6 mb-4">
                                <div class="form-group">
                                <label class="exampleFormControlInput1">Jam Tutup</label>
                                <input class="form-control" type="time" name="tutup" value="{{$list->jam_tutup}}"required>
                                </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xl-6 col-md-6 mb-4">
                                    <div class="form-group">
                                        <label class="exampleFormControlInput1">Link Facebook</label>
                                        <input class="form-control" type="text" name="fb" value="{{$list->link_fb}}"  >

                                    </div>
                                </div>
                                <div class="col-xl-6 col-md-6 mb-4">
                                    <div class="form-group">
                                        <label class="exampleFormControlInput1">Link Instagram</label>
                                        <input class="form-control" type="text" name="ig" value="{{$list->link_ig}}"  >

                                    </div>
                                </div>

                            </div>
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="form-group">
                                    <label class="exampleFormControlInput1">Kabupaten/Kota</label>
                                    <select class="form-control dynamic"  id="kabupaten" name="kabupaten" data-dependent="kecamatan" required>
                                    <option value=""> Pilih Kabupaten/Kota </option>
                                        @foreach ($kabupaten as $kab)
                                            <option value="{{$kab->id}}" @if($kab->id == $list->kabupaten_id){
                                                {{"selected"}}
                                            }
                                            @endif>{{$kab->nama_kabupaten}}</option>
                                        @endforeach
                                    </select>
                                    </div>
                                </div>             
                                <div class="col-md-3">
                                    <div class="form-group">
                                    <label class="exampleFormControlInput1">Kecamatan</label>
                                    <select class="form-control dynamic"  id="kecamatan" name="kecamatan" data-dependent="kelurahan" required>
                                    <option value=""> Pilih Kecamatan </option>
                                        @foreach ($kecamatan as $kec)
                                            <option value="{{$kec->id}}"@if($kec->id == $list->kecamatan_id){
                                                {{"selected"}}
                                            }
                                            @endif>{{$kec->nama_kecamatan}}</option>
                                        @endforeach
                                    </select>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                    <label class="exampleFormControlInput1">Kelurahan</label>
                                    <select class="form-control dynamic"  id="kelurahan" name="kelurahan" required>
                                    <option value=""> Pilih Kelurahan </option>
                                        @foreach ($kelurahan as $kel)
                                            <option value="{{$kel->id}}"@if($kel->id == $list->kelurahan_id){
                                                {{"selected"}}
                                            }
                                            @endif>{{$kel->nama_kelurahan}}</option>
                                        @endforeach
                                    </select>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <label style="font-size:15px;">Tambah Gambar Persewaan Kendaraan</label>&nbsp;<br><br>
                                    <input type="file" name="filename[]" id="filename" accept=".jpg, .jpeg, .png" multiple=""/>
                                </div>
                            </div><br>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="exampleFormControlInput1">Keterangan</label>
                                        <input class="form-control" type="text" name="keterangan" value="{{$list->keterangan}}"  >
                                    </div>
                                </div>
                            </div> <br>
                            <label class="exampleFormControlInput1">Fasilitas Persewaan Kendaraan</label>
                            <br><br>
                            <div class="row">
                            @foreach($allkritwis as $item)
                            <div class="col-md-4">
                                <div class="form-check form-check-inline">
                                    @if(in_array($item->id, $idkritwis))
                                    <label><input type="checkbox" id="fasi" name="fasi[]" value="{{$item->id}}" checked>
                                    {{$item->nama_detail}}</label><br>
                                    @else
                                    <label><input type="checkbox" id="fasi" name="fasi[]" value="{{$item->id}}">
                                    {{$item->nama_detail}}</label><br>                
                                    @endif
                                </div>
                            </div>
                            @endforeach
                            </div> 

                            <div class="form-group">
                                <button class="btn btn-primary" type="submit">Simpan</button>
                            </div>           
                        </div>    
                    </div>
                </div>
                </form>

                <div class="col-md-4">
					<div class="card card-profile">
						<div class="card-header card-header-info">
							<h6 class="card-title">Gambar Persewaan Kendaraan</h6>
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
									<button class="btn-info w3-display-left"onclick=" plusDivs(-1)">&#10094;</button>
              						<button class="btn-info w3-display-right" onclick=" plusDivs(1)">&#10095;</button>
								</div>
							</div>
                            <br>
                            <label class="exampleFormControlInput1" id="judul"></label>

                            <div class="row ">
                                <div class="col-md-12">
                                    <div class="thumbnail">
                                        <div class="slider">
                                            <ul id="frames" class="frames"></ul>
                                            <div class="nav-dots">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <br><br>

						</div>
					</div>
			    </div>
            </div>
        </div>
     </div>
</div>
<script>

$('#filename').on('change', function () {
    handleFileSelect();
    var dots = $('#judul').append('Tambah Gambar Persewaan Kendaraan');

});

function handleFileSelect() {
    //Check File API support
    if (window.File && window.FileList && window.FileReader) {

        var files = event.target.files; //FileList object
        var output = document.getElementById("frames");
        var dots = $('.nav-dots');
        var arrFilesCount = [];
        var start = $(output).find('li').length;
        var end = start+ files.length;
        var nonImgCount = 0;
        for (var i = start; i < end; i++) {
            arrFilesCount.push(i);
        }
        
        if(start !== 0){
            $(output).find('li > nav > a.prev').first().attr('href','#slide-' + (end-1));
            $(output).find('li > nav > a.next').last().attr('href','#slide-'+start);
        }
        
        for (var i = 0; i < files.length; i++) {

            var file = files[i];

            //Only pics
            if (!file.type.match('image')) {nonImgCount++; continue;}

            var picReader = new FileReader();
            picReader.addEventListener("load", function (event) {
                var picFile = event.target;

                current_i = arrFilesCount.shift();
                if (current_i === 0) {
                    prev_i = files.length - 1;
                } else {
                    prev_i = current_i - 1;
                }
                if (arrFilesCount.length - nonImgCount === 0) {
                    next_i = 0;
                } else {
                    next_i = current_i + 1;
                }

                output.innerHTML = output.innerHTML + '<li id="slide-' + current_i + '" class="slide">' + "<img src='" + picFile.result + "'" + "title=''/>" + '<nav>' + '<a class="prev" href="#slide-' + prev_i + '">&larr;</a>' + '<a class="next" href="#slide-' + next_i + '">&rarr;</a>' + '</nav>' + '</li>'; // TODO: Enter Title
                
                $(dots).append('<a class="dot" href="#slide-' + current_i + '" />');
                
            });
            //Read the image
            picReader.readAsDataURL(file);
        }
    } else {
        console.log("Your browser does not support File API");
    }
}
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

$(document).ready(function(){

 $('#kabupaten').change(function(){
    let id=$(this).val();
    console.log(id);
  $('#kecamatan').empty();
  $('#kecamatan').append(' <option value="" disabled selected>Processing...</option>');
  $.ajax({
      type: 'GET',
      url: 'getKecamatan/'+ id,
      success: function(response){
          var response = JSON.parse(response);
          console.log(response);
          $('#kecamatan').empty();
          $('#kecamatan').append(' <option value="" disabled selected>Pilih Kecamatan</option>');
          response.forEach(element => {
            $('#kecamatan').append(`<option value="${element['id']}">${element['nama_kecamatan']}</option>`);

          });
      }
  });
 });


 $('#kecamatan').on('change',function(){
  var kecID = $(this).val();  
  if(kecID){
    $.ajax({
      type:"GET",
      url:"{{url('getKelurahan')}}?kecamatan_id="+kecID,
      success:function(res){        
      if(res){
        $("#kelurahan").empty();
        $.each(res,function(key,value){
          $("#kelurahan").append('<option value="'+key+'">'+value+'</option>');
        });
      
      }else{
        $("#kelurahan").empty();
      }
      }
    });
  }else{
    $("#kelurahan").empty();
  }
    
  });
});

</script>
@endsection





