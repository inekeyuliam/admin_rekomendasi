@extends('layouts.app', ['activePage' => 'kamar', 'titlePage' => __('Edit Kamar')])
@section("content")
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-8">
            	<div class="card">
					<div class="card-header card-header-primary">
						<h4 class="card-title">Edit Data Kamar </h4>
					</div>
					<div class="card-body">
						<!-- <form class="mt-2" action='{{url("kamar/".$kamar->id)}}' method="post">{{ method_field("PUT")}} -->
						<!-- <input type="hidden" name="_token" value="{{ csrf_token() }}"> -->
						<div class="form-group">
							<label class="exampleFormControlInput1">Jenis Kamar</label>
							<input class="form-control" type="text" name="jenis" value="{{$kamar->nama_jenis_kamar}}" readonly>
						</div><br>
						<div class="form-group">
							<label class="exampleFormControlInput1">Kapasitas Kamar</label>
							<input class="form-control" type="number" name="kapasitas" placeholder="Masukan kapasitas" value="{{$kamar->kapasitas}}"readonly>
						</div><br>
						<div class="form-group">
							<label class="exampleFormControlInput1">Biaya per malam </label>
							<input class="form-control" type="number" name="biaya" placeholder="Masukan biaya"value="{{$kamar->biaya_permalam}}"readonly>
							</div><br>
						<div class="form-group">
								<label class="exampleFormControlInput1">Keterangan</label>
								<input class="form-control" rows="5" name="keterangan" value="{{$kamar->keterangan}}"readonly>
						</div>
						<div class="form-group">
                        	<a href="{{url('/kamar')}}" class="btn btn-primary" >Kembali</a>
                    	</div>
							
						<!-- </form> -->
						</div>
					</div>
    		 	</div>
				<div class="col-md-4">
					<div class="card card-profile">
						<div class="card-header card-header-info">
							<h6 class="card-title">Gambar Kamar</h6>
						</div>
						<div class="card-body">
							<div class="col-md-4">
								@foreach($gambar as $key => $item2)
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
                            <a href="{{ url('kamar/'.$kamar->id.'/gambarkamar') }}"class ="btn btn-info btn-round">  Daftar Gambar Kamar</a>
						</div>
					</div>
				</div>
			</div>
		</div>
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