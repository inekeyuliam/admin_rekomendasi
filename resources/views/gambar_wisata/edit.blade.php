@extends('layouts.app', ['activePage' => 'wisata', 'titlePage' => __('Edit sata')])
@section("content")
<div class="content">
	<div class="container-fluid">
    	<div class="row">
           <div class="col-md-8">
              	<div class="card">
					<div class="card-header card-header-primary">
					<h4 class="card-title">Edit Data wisata </h4>
					</div>
					<div class="card-body">
						<form class="mt-2" action="{{ route('wisata.gambarwisata.update', [$gambarwisata->wisata_id, $gambarwisata->id]) }}" method="post" enctype="multipart/form-data">{{ method_field("PUT")}}
						<input type="hidden" name="_token" value="{{ csrf_token() }}">
							<div class="row">
								<div class="col-md-4">
									<label class="exampleFormControlInput1">Pilih Gambar wisata</label>
									<input type="file" name="filename[]" id="filename" accept=".jpg, .jpeg, .png" multiple=""/>
								</div>
							</div><br>
							<div class="form-group">
								<label class="exampleFormControlInput1">Keterangan</label>
								<textarea class="form-control" rows="5" name="keterangan" placeholder="Masukan keterangan tempat wisata"></textarea>
							</div>
							<div class="form-group">
								<button class="btn btn-primary" type="submit">Simpan</button>
							</div>
							
						</form>
					</div>
				</div>
				
    		</div>
			<div class="col-md-4">
             	<div class="card card-profile">
                	<div class="card-header card-header-info">
						<h6 class="card-title">Gambar Wisata</h6>
					</div>
                	<div class="card-body">
						<div class="col-md-12">
							<label class="exampleFormControlInput1">Gambar Wisata Awal</label>
							<div class="thumbnail">
								<img class="img-thumbnail mySlides"src="{{ asset('images/'.$gambarwisata->filename) }}" />
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
    var dots = $('#judul').append('Gambar Wisata Baru');

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
</script>

@endsection