<!DOCTYPE html>
<html class="wide wow-animation" lang="en"> 
  <head>
    <!-- Site Title-->
    <title>Sistem Rekomendasi Wisata Jawa Timur</title>
    <meta name="format-detection" content="telephone=no">
    <meta name="viewport" content="width=device-width, height=device-height, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta charset="utf-8">
    <link rel="icon" href="{{asset('images/favicon.ico')}}" type="image/x-icon">
    <!-- Stylesheets -->
    <link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Oswald:200,400%7CLato:300,400,300italic,700%7CMontserrat:900">
    <link rel="stylesheet" href="{{asset('css/bootstrap.css')}}">
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
    <link rel="stylesheet" href="{{asset('css/fonts.css')}}">
    <!-- <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css"> -->

		<!--[if lt IE 10]>
    <div style="background: #212121; padding: 10px 0; box-shadow: 3px 3px 5px 0 rgba(0,0,0,.3); clear: both; text-align:center; position: relative; z-index:1;"><a href="http://windows.microsoft.com/en-US/internet-explorer/"><img src="images/ie8-panel/warning_bar_0000_us.jpg" border="0" height="42" width="820" alt="You are using an outdated browser. For a faster, safer browsing experience, upgrade for free today."></a></div>
    <script src="js/html5shiv.min.js"> </script>
		<![endif]--> 
    <style>
    .fasi-large-size {
      font-size: 28px;
    }
    *{
    margin: 0;
    padding: 0;
    }
    .rate {
        float: left;
        height: 46px;
        padding: 0 10px;
    }
    .rate:not(:checked) > input {
        position:absolute;
        top:-9999px;
    }
    .rate:not(:checked) > label {
        float:right;
        width:1em;
        overflow:hidden;
        white-space:nowrap;
        cursor:pointer;
        font-size:30px;
        color:#ccc;
    }
    .rate:not(:checked) > label:before {
        content: '★ ';
    }
    .rate > input:checked ~ label {
        color: #ffc700;    
    }
    .rate:not(:checked) > label:hover,
    .rate:not(:checked) > label:hover ~ label {
        color: #deb217;  
    }
    .rate > input:checked + label:hover,
    .rate > input:checked + label:hover ~ label,
    .rate > input:checked ~ label:hover,
    .rate > input:checked ~ label:hover ~ label,
    .rate > label:hover ~ input:checked ~ label {
        color: #c59b08;
    }

    </style>
  </head>
  <body>
    <!-- Page preloader-->
    <div class="page-loader"> 
      <div class="page-loader-body"> 
        <div class="preloader-wrapper big active"> 
          <div class="spinner-layer spinner-blue"> 
            <div class="circle-clipper left">
              <div class="circle"> </div>
            </div>
            <div class="gap-patch">
              <div class="circle"> </div>
            </div>
            <div class="circle-clipper right">
              <div class="circle"></div>
            </div>
          </div>
          <div class="spinner-layer spinner-red">
            <div class="circle-clipper left">
              <div class="circle"></div>
            </div>
            <div class="gap-patch">
              <div class="circle"> </div>
            </div>
            <div class="circle-clipper right">
              <div class="circle"></div>
            </div>
          </div>
          <div class="spinner-layer spinner-yellow"> 
            <div class="circle-clipper left">
              <div class="circle"></div>
            </div>
            <div class="gap-patch">
              <div class="circle"></div>
            </div>
            <div class="circle-clipper right">
              <div class="circle"> </div>
            </div>
          </div>
          <div class="spinner-layer spinner-green"> 
            <div class="circle-clipper left">
              <div class="circle"></div>
            </div>
            <div class="gap-patch">
              <div class="circle"></div>
            </div>
            <div class="circle-clipper right">
              <div class="circle"></div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- Page-->
    <div class="page">
 
    <header class="section page-header">
        <!-- RD Navbar-->
        <div class="rd-navbar-wrap rd-navbar-default">
          <nav class="rd-navbar" data-layout="rd-navbar-fixed" data-sm-layout="rd-navbar-fixed" data-md-layout="rd-navbar-fixed" data-md-device-layout="rd-navbar-fixed" data-lg-layout="rd-navbar-fullwidth" data-xl-layout="rd-navbar-static" data-lg-device-layout="rd-navbar-fixed" data-xl-device-layout="rd-navbar-static" data-md-stick-up-offset="2px" data-lg-stick-up-offset="2px" data-stick-up="true" data-sm-stick-up="true" data-md-stick-up="true" data-lg-stick-up="true" data-xl-stick-up="true">
          <div class="rd-navbar-inner">
              <!-- RD Navbar Panel-->
              <div class="rd-navbar-panel">
                <!-- RD Navbar Toggle-->
                <button class="rd-navbar-toggle" data-rd-navbar-toggle=".rd-navbar-nav-wrap"><span></span></button>
                <div class="rd-navbar-brand"><h5>SISTEM REKOMENDASI WISATA, HOTEL & <br> PERSEWAAN KENDARAAN DI JAWA TIMUR</h5></div>
              </div>
              <div class="rd-navbar-aside-center">
                <div class="rd-navbar-nav-wrap">
                  <ul class="rd-navbar-nav">
 
                  <li><a href="/index"> HOME</a> </li>

                    <!-- Example single danger button -->
                    <li class="active"><a href="/" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                     Wisata</a>
                      <div class="dropdown-menu">
                        <a class="dropdown-item" href="/daftar/wisata">Daftar Wisata</a>
                        <a class="dropdown-item" href="/rekomendasi/wisata">Rekomendasi Wisata</a>
                        <!-- <div class="dropdown-divider"></div> -->
                        <!-- <a class="dropdown-item" href="#">Separated link</a> -->
                      </div>
                    </li>
                    <li><a   data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Hotel</a>
                      <div class="dropdown-menu">
                        <a class="dropdown-item" href="/daftar/hotel">Daftar Hotel</a>
                        <a class="dropdown-item" href="/rekomendasi/hotel">Rekomendasi Hotel</a>
                      </div>
                    </li>
                    <li><a    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Persewaan Kendaraan</a>
                      <div class="dropdown-menu">
                        <a class="dropdown-item" href="/daftar/persewaan"> Daftar Persewaan Kendaraan</a>
                        <a class="dropdown-item" href="/rekomendasi/persewaan"> Rekomendasi Persewaan Kendaraan</a>
                      </div>
                    </li>
                    <li><a href="/about"> PEMBUAT</a></li>
                  </ul>
                </div>
              </div>
            </div>
          </nav>
        </div>
      </header>
      <section class="section">
        <div class="swiper-form-wrap">
          <!-- Swiper-->
      
        </div>
      </section>   
  
      <section class="section section-lg bg-default">
        <div class="container container-bigger">
        <div class="row row-50 justify-content-md-center align-items-lg-center justify-content-xl-between flex-lg-row-reverse">
            <div class="col-md-10 col-lg-6 col-xl-5">
              <h3>{{ $list->nama_wisata }}</h3>
              <div class="divider divider-secondary"></div>
              <p class="text-spacing-sm"><b> Terakhir diupdate tgl {{$list->updated_at->format('d-M-Y')}}</b> </p><br>

             @if($list['rating'] == 4.5 || $list['rating'] > 4.5 )
              <p class="heading-5">  
                <span class="fa fa-star checked"></span>
                <span class="fa fa-star checked"></span>
                <span class="fa fa-star checked"></span>
                <span class="fa fa-star checked"></span>
                <span class="fa fa-star checked"></span>
                {{$list['rating']}} / 5  <a class="pull-right" data-toggle="modal" data-target="#exampleModalCenter" href="#exampleModalCenter"'> <u>Lihat Rating & Review Google</u> </a></p>
              @elseif($list['rating'] == 4.0 || $list['rating'] < 4.5  )
                <p class="heading-5">  
                  <span class="fa fa-star checked"></span>
                  <span class="fa fa-star checked"></span>
                  <span class="fa fa-star checked"></span>
                  <span class="fa fa-star checked"></span>
                  <span class="fa fa-star"></span>
                  {{$list['rating']}} / 5  <a class="pull-right" data-toggle="modal" data-target="#exampleModalCenter" href="#exampleModalCenter"'> <u>Lihat Rating & Review Google</u> </a></p>
              @elseif($list['rating'] == 3.0 || $list['rating'] < 4.0  )
                <p class="heading-5">  
                  <span class="fa fa-star checked"></span>
                  <span class="fa fa-star checked"></span>
                  <span class="fa fa-star checked"></span>
                  <span class="fa fa-star"></span>
                  <span class="fa fa-star"></span>
                  {{$list['rating']}} / 5  <a class="pull-right" data-toggle="modal" data-target="#exampleModalCenter" href="#exampleModalCenter"'> <u>Lihat Rating & Review Google</u> </a></p>
              @elseif($list['rating'] == 2.0 || $list['rating'] < 3.0  )
                <p class="heading-5">  
                  <span class="fa fa-star checked"></span>
                  <span class="fa fa-star checked"></span>
                  <span class="fa fa-star"></span>
                  <span class="fa fa-star"></span>
                  <span class="fa fa-star"></span>
                  {{$list['rating']}} / 5  <a class="pull-right" data-toggle="modal" data-target="#exampleModalCenter" href="#exampleModalCenter"'> <u>Lihat Rating & Review Google</u> </a></p>
              @elseif($list['rating'] == 1.0 || $list['rating'] < 2.0  )
                <p class="heading-5">  
                  <span class="fa fa-star checked"></span>
                  <span class="fa fa-star"></span>
                  <span class="fa fa-star"></span>
                  <span class="fa fa-star"></span>
                  <span class="fa fa-star"></span>
                  {{$list['rating']}} / 5  <a class="pull-right" data-toggle="modal" data-target="#exampleModalCenter" href="#exampleModalCenter"'> <u>Lihat Rating & Review Google</u> </a></p>            
              @endif
              <!-- <p class="text-spacing-sm">Alamat : {{$list['alamat']}}</p> -->
              <!-- <p class="text-spacing-sm">Waktu Operasional : {{$list['jam_buka']}} -  {{$list['jam_tutup']}} </p> -->
             
              <p class="text-spacing-sm">Keterangan : {{$list['keterangan']}}  </p>
              <a class="button button-secondary-outline button-nina" href="{{ url()->previous() }}">Kembali </a>
            </div>

              <div class="col-md-10 col-lg-6">
              @foreach($gambar as $key => $item2)
                @if($key == 1)
                  <img class="mySlides" src="{{ asset('images/'.$item2->filename) }}" style="width:720;height:459;cursor:pointer;alt=''"/>
                @else
                  <img class="mySlides" src="{{ asset('images/'.$item2->filename) }}" style="width:720;height:459;cursor:pointer;alt='';display:none"/>
                @endif
              @endforeach
              <button class="w3-button w3-yellow w3-display-left" style="color:#ffa900" onclick="plusDivs(-1)">&#10094;</button>
              <button class="w3-button w3-yellow w3-display-right" style="color:#ffa900" onclick="plusDivs(1)">&#10095;</button>
            
              </div>

          </div>
        </div>        
      </section>

      <section class="section section-lg bg-default text-center">
        <div class="container container-wide">
          <div class="row row-fix row-50 row-custom-bordered">
            <div class="col-sm-6 col-lg-3">
              <!-- Box minimal-->
              <article class="box-simple">
                <div class="box-simple-icon novi-icon mdi mdi-map-marker"></div>
                <h6>Alamat</h6>
                <div class="box-simple-text">{{$list['alamat']}}</div>
              </article>
            </div>
            <div class="col-sm-6 col-lg-3">
              <!-- Box simple-->
              <article class="box-simple">
                <div class="box-simple-icon novi-icon mdi mdi-cash-multiple"></div>
                <h6>Harga Masuk</h6>
                <div class="box-simple-text">
                  <ul class="list-comma list-0">
                  @foreach($harga as $item)
                    <li>{{$item->jenis_harga}} : Rp {{$item->harga_masuk}} </li>
                  @endforeach
                  </ul>
                </div>
              </article>
            </div>
            <div class="col-sm-6 col-lg-3">
              <!-- Box simple-->
              <article class="box-simple">
                <div class="box-simple-icon novi-icon mdi mdi-web"></div>
                <h6>website</h6>
                <div class="box-simple-text">
                  <ul class="list-comma list-0">
                    <li><a href="mailto:#">mail@demolink.org</a></li>
                  </ul>
                </div>
              </article>
            </div>
            <div class="col-sm-6 col-lg-3">
              <!-- Box simple-->
              <article class="box-simple">
                <div class="box-simple-icon novi-icon mdi mdi-calendar-clock"></div>
                <h6>Waktu Operasional</h6>
                <div class="box-simple-text">
                  <ul class="list-0">
                    <li> {{$list['jam_buka']}} -  {{$list['jam_tutup']}}</li>
                    <!-- <li>Sat–Sun: 11:00 am–4:00 pm</li> -->
                  </ul>
                </div>
              </article>
            </div>
          </div>
        </div>
      </section>
 
      <section class="section section-lg text-center novi-background bg-cover">
        <div class="container container-wide">
          <h3>Fasilitas Wisata</h3>
          <div class="divider divider-secondary"></div>
          <div class="row row-50 row-xxl-90 justify-content-sm-center offset-custom-2">
            @foreach($fasilitas as $item)
            <div class="col-md-6 col-lg-3">
              <div class="team-classic team-classic-circle">
                <div class="team-classic-caption">
                  <!-- <h5 class="team-classic-title">{{$item->nama_detail}}</h5> -->
                  <h5 class="team-classic-job-position fasi-large-size">{{$item->nama_detail}}</h5>

                </div>
              </div>
            </div>
            @endforeach
          </div>
        </div>
      </section>
   
      <section class="section section-lg bg-default text-center">
        <div class="container container-bigger">
          <div class="row row-fix justify-content-xl-end row-30 text-center text-xl-left">
            <div class="col-xl-8">
              <div class="parallax-text-wrap">
                <h3>Review Wisata</h3>
              </div>
              <hr class="divider divider-secondary">
            </div>
            <div class="col-xl-3 text-xl-right"><a class="button button-secondary button-nina" data-toggle="modal" data-target="#exampleModal">Tulis Review</a></div>
          </div>
          <!-- Owl Carousel-->
          <div class="owl-carousel owl-layout-1" data-items="1" data-dots="true" data-nav="true" data-stage-padding="0" data-loop="true" data-margin="30" data-mouse-drag="false" data-autoplay="true">
          @foreach($review as $item)
            <article class="quote-boxed">
              <div class="quote-boxed-aside">
              </div>
              <div class="quote-boxed-main">
                <div class="quote-boxed-text">
                  <p> {{$item->review}}</p>
                </div>
                <div class="quote-boxed-meta">
                  <p class="quote-boxed-cite">{{$item->nama}}</p>
                  @if($item->rate >= 4.5 && $item->rate == 5 )
                  <p class="quote-boxed-small"> 
                <span class="fa fa-star checked"></span>
                <span class="fa fa-star checked"></span>
                <span class="fa fa-star checked"></span>
                <span class="fa fa-star checked"></span>
                <span class="fa fa-star checked"></span>
                {{$item->rate }} / 5</p>
              @elseif($item->rate  == 4 && $item->rate  < 4.5  )
              <p class="quote-boxed-small"> 
                  <span class="fa fa-star checked"></span>
                  <span class="fa fa-star checked"></span>
                  <span class="fa fa-star checked"></span>
                  <span class="fa fa-star checked"></span>
                  <span class="fa fa-star"></span>
                  {{$item->rate }} / 5</p>
              @elseif($item->rate  == 3 && $item->rate < 4  )
              <p class="quote-boxed-small"> 
                  <span class="fa fa-star checked"></span>
                  <span class="fa fa-star checked"></span>
                  <span class="fa fa-star checked"></span>
                  <span class="fa fa-star"></span>
                  <span class="fa fa-star"></span>
                  {{$item->rate }} / 5</p> 
              @elseif($item->rate == 2 && $item->rate < 3  )
              <p class="quote-boxed-small">
                  <span class="fa fa-star checked"></span>
                  <span class="fa fa-star checked"></span>
                  <span class="fa fa-star"></span>
                  <span class="fa fa-star"></span>
                  <span class="fa fa-star"></span>
                  {{$item->rate }} / 5</p> 
              @elseif($item->rate  == 1.0 && $item->rate < 2  )
              <p class="quote-boxed-small">  
                  <span class="fa fa-star checked"></span>
                  <span class="fa fa-star"></span>
                  <span class="fa fa-star"></span>
                  <span class="fa fa-star"></span>
                  <span class="fa fa-star"></span>
                  {{$item->rate }} / 5</p>              
              @endif
                </div>
              </div>
            </article>
          @endforeach
          </div>
        </div>      <br><br><br><br>
      </section>

      <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Review Wisata</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <form class="rd-mailform" data-form-output="form-output-global" data-form-type="contact" method="post" action="{{url('review/wisata/'.$list['id'])}}">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <div class="modal-body">
              <div class="row row-20 row-fix">
                <div class="col-lg-12">
                  <div class="form-wrap form-wrap-validation">
                    <div class="form-check">Rate : </div>
                    <div class="rate">
                      <input type="radio" id="star5" name="rate" value="5" />
                      <label for="star5" title="text">5 stars</label>
                      <input type="radio" id="star4" name="rate" value="4" />
                      <label for="star4" title="text">4 stars</label>
                      <input type="radio" id="star3" name="rate" value="3" />
                      <label for="star3" title="text">3 stars</label>
                      <input type="radio" id="star2" name="rate" value="2" />
                      <label for="star2" title="text">2 stars</label>
                      <input type="radio" id="star1" name="rate" value="1" />
                      <label for="star1" title="text">1 star</label>
                    </div>
                  </div>
                </div>
              </div>
              <div class="form-group">
                <label for="exampleInputEmail1">Nama</label>
                <input type="text" class="form-control" name="name" id="name" placeholder="Masukan nama" required>
              </div>
              <div class="form-group">
                <label for="exampleInputEmail1">Tulis Review</label>
                <textarea class="form-control" name="review" id="review" placeholder="Masukan review" rows="3"></textarea>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button id="closemodal" type="submit" class="btn btn-primary">Simpan</button>
              </div>
            </div>
        </div>
      </div>
      </form>


     
    </div>
    <!-- Global Mailform Output-->
    <div class="snackbars" id="form-output-global"> </div>
    <!-- Javascript-->
    <script src="{{asset('js/core.min.js')}}"></script>
    <script src="{{asset('js/script.js')}}"></script>
  </body>
</html>

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