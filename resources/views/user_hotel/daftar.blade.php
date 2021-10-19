<!DOCTYPE html>
<html class="wide wow-animation" lang="en"> 
  <head>
    <!-- Site Title-->
    <title>Sistem  Rekomendasi Hotel Jawa Timur</title>
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
    <meta name="csrf-token" content="{{ csrf_token() }}">

		<!--[if lt IE 10]>
    <div style="background: #212121; padding: 10px 0; box-shadow: 3px 3px 5px 0 rgba(0,0,0,.3); clear: both; text-align:center; position: relative; z-index:1;"><a href="http://windows.microsoft.com/en-US/internet-explorer/"><img src="images/ie8-panel/warning_bar_0000_us.jpg" border="0" height="42" width="820" alt="You are using an outdated browser. For a faster, safer browsing experience, upgrade for free today."></a></div>
    <script src="js/html5shiv.min.js"> </script>
		<![endif]--> 
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
      <!-- Page Header-->
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
                    <li><a href="/" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                     Wisata</a>
                      <div class="dropdown-menu">
                        <a class="dropdown-item" href="/daftar/wisata">Daftar Wisata</a>
                        <a class="dropdown-item" href="/rekomendasi/wisata">Rekomendasi Wisata</a>
                        <!-- <div class="dropdown-divider"></div> -->
                        <!-- <a class="dropdown-item" href="#">Separated link</a> -->
                      </div>
                    </li>
                    <li class="active"><a   data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
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
        <section class="section section-variant-1 bg-default novi-background bg-cover"> 
            <div class="container container-wide">
            <div class="row row-fix justify-content-xl-end row-30 text-center">
                <div class="col-xl-12">
                <div class="parallax-text-wrap">
                    <h4 style=" font-family:serif; font-size:40px; font-weight: 100px;" > Daftar Hotel di Jawa Timur</h4>
                    <hr class="divider divider-secondary"><br>
                    <a class="button button-secondary button-nina"  data-toggle="modal" data-target="#exampleModal" href="#exampleModal">Filter Hotel</a><br><br>

                  </div>
                </div>
             
            </div>
            <div class="row row-50">
            @foreach($hotel as $item)
                <div class="col-md-6 col-xl-4">
                <article class="event-default-wrap">
                    <div class="event-default">
                    <?php $numItems = count($item->gambar_hotels) ?>
                    <?php  $i = 0 ?>
                    @foreach($item->gambar_hotels as $item2)
                    @if(++$i === $numItems)
                    <figure class="event-default-image">@if($item->filename != " ")<img src="{{ asset('images/'.$item2->filename) }}" alt="" width="570" height="370"/> @else<img src="{{asset('images/landing-private-airlines-02-570x370.jpg')}}" alt="" width="570" height="370"/>  @endif 
                    </figure>
                    @endif
                    @endforeach
                    <div class="event-default-caption"><a class="button button-xs button-secondary button-nina" href="{{url('detailhotel/'.$item->id)}}">lihat hotel</a></div>
                    </div>
                    <div class="event-default-inner">
                    <h5><a class="event-default-title" href="{{url('detailhotel/'.$item->id)}}">{{$item->nama_hotel}}</a></h5><span class="heading-5"></span>
                    </div>
                </article>
                </div>
            @endforeach
            </div>
          </div>
        </section>
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Filter Hotel</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>                
              <form method="POST" action="/filter/hotel">
              <input type="hidden" name="_token" value="{{ csrf_token() }}">
              <div class="modal-body">
                <div class="form-check">
                    <div class="form-check">
                    <label> Bintang Hotel </label> </div>
                    <div class="form-check">
                    <label><input type="radio" id="bintang" name="bintang" value="5"> Bintang 5 </label>
                    </div>
                    <div class="form-check">
                    <label><input type="radio" id="bintang" name="bintang" value="4"> Bintang 4 </label>
                    </div>
                    <div class="form-check">
                    <label><input type="radio" id="bintang" name="bintang" value="3"> Bintang 3 </label>
                    </div>
                    <div class="form-check">
                    <label><input type="radio" id="bintang" name="bintang" value="2"> Bintang 2 </label>
                    </div>
                    <div class="form-check">
                    <label><input type="radio" id="bintang" name="bintang" value="1"> Bintang 1 </label>
                    </div><br>

                    <div class="form-check">
                    <label> Penilaian (Rating) </label> </div>
                    <div class="form-check">
                    <label><input type="radio" id="rate" name="rate" value="5">
                    <span class="fa fa-star checked"></span> <span class="fa fa-star checked"></span> <span class="fa fa-star checked"></span> <span class="fa fa-star checked"></span> <span class="fa fa-star checked"></span> </label>
                    </div>
                    <div class="form-check">
                    <label><input type="radio" id="rate" name="rate" value="4">
                    <span class="fa fa-star checked"></span> <span class="fa fa-star checked"></span> <span class="fa fa-star checked"></span> <span class="fa fa-star checked"></span> <span class="fa fa-star"></span> ke atas</label>
                    </div>
                    <div class="form-check">
                    <label><input type="radio" id="rate" name="rate" value="3">
                    <span class="fa fa-star checked"></span> <span class="fa fa-star checked"></span> <span class="fa fa-star checked"></span> <span class="fa fa-star"></span> <span class="fa fa-star"></span> ke atas</label>
                    </div>
                    <div class="form-check">
                    <label><input type="radio" id="rate" name="rate" value="2">
                    <span class="fa fa-star checked"></span> <span class="fa fa-star checked"></span> <span class="fa fa-star"></span> <span class="fa fa-star"></span> <span class="fa fa-star"></span> ke atas</label>
                    </div>
                    <div class="form-check">
                    <label><input type="radio" id="rate" name="rate" value="1">
                    <span class="fa fa-star checked"></span> <span class="fa fa-star"></span> <span class="fa fa-star"></span> <span class="fa fa-star"></span> <span class="fa fa-star"></span> ke atas</label>
                    </div><br>

                    <div class="form-check">
                    <label> <a data-toggle="modal" id="closemodal" data-target="#exampleModal2" href="#exampleModal2">Filter Berdasarkan Lokasi</a> </label> </div>
             
                    
                    <div class="form-check">
                    <label> <a data-toggle="modal" id="modalterdekat" data-target="#exampleModal3" href="#exampleModal3">Filter Berdasarkan Hotel Terdekat</a> </label> </div>
                
                </div>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Simpan</button>
              </div>
            </form>
            </div>
          </div>
        </div>

        <div class="modal fade" id="exampleModal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Filter Berdasarkan Lokasi</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>                
              <form method="POST" action="/filter/lokasi/hotel">
              <input type="hidden" name="_token" value="{{ csrf_token() }}">
              <div class="modal-body">    
                <div class="form-outline">
                  <label> Pilih Lokasi </label> 
                  <input type="text" name="search" id="search" class="form-control" />
                </div>
                <div class="form-check checkkota">
                </div>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Simpan</button>
              </div>
            </form>
            </div>
          </div>
        </div>
  
    </div>
    <!-- Global Mailform Output-->
    <div class="snackbars" id="form-output-global"> </div>
    <!-- Javascript-->
    <script src="{{asset('js/core.min.js')}}"></script>
    <script src="{{asset('js/script.js')}}"></script>
  </body>
</html>
<script>

$('#closemodal').click(function() {
  $('#exampleModal').modal('hide');
});

$(document).ready(function(){

  fetch_customer_data();
  
  function fetch_customer_data(query = '')
  {
    $.ajax({
      url:"{{ route('live_search_hotel.action') }}",
      method:'GET',
      data:{query:query},
      // dataType:'json',
      success:function(data)
      {
        var response = JSON.parse(data);
        $('.checkkota').html(' ');
        response.forEach(element => {
          $('.checkkota').append('<label><input type="checkbox" id="kota" name="kota[]" value="'+ element['id'] +'">'+ element['nama_kabupaten']+'</label><br>');
          });
      
      }
    })
  }

  $(document).on('keyup', '#search', function(){
  var query = $(this).val();
  fetch_customer_data(query);
  });
});
</script>