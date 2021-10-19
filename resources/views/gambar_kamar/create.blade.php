@extends('layouts.app', ['activePage' => 'kamar', 'titlePage' => __('Tambah Kamar')])
@section("content")
    <div class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-8">
              <div class="card">
                <div class="card-header card-header-primary">
                  <h4 class="card-title">Input Gambar Kamar </h4>
                </div>
                <div class="card-body">
                    <form class="mt-2" action='{{url("kamar/".$kamar_id."/gambarkamar")}}' method="post" enctype="multipart/form-data">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">                    
                    <div class="row">
						<div class="col-md-4">
							<label class="exampleFormControlInput1">Pilih Gambar Hotel</label>
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
                <div class="card-header card-header-primary">
                  <h6 class="card-title">Gambar Kamar</h6>
                </div>
                <div class="card-body" style="height: 430px;">
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
                </div>
              </div>
            </div>
          </div>
        </div>
    </div>

<script>
$('#filename').on('change', function () {
    handleFileSelect();
	var dots = $('#judul').append('Tambah Gambar Kamar');

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

</script>
@endsection