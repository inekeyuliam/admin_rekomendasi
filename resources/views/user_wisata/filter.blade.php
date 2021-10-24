<!DOCTYPE html>
<html class="wide wow-animation" lang="en"> 
  <head>
    <!-- Site Title-->
    <title>Sistem  Rekomendasi Persewaan Kendaraan Jawa Timur</title>
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
                    <li ><a    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
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
                      <h4 style=" font-family:serif; font-size:40px; font-weight: 100px;" >Daftar Wisata di Jawa Timur</h4>
                      <hr class="divider divider-secondary"><br>
                      <a class="button button-secondary button-nina"  data-toggle="modal" data-target="#exampleModal" href="#exampleModal" onclick="filterKota()">Filter Wisata</a><br><br>
                      <p style="font-weight:400;font-size:24px;font-family:serif"> Filter Wisata Berdasarkan</p><br>
					        </div>
                </div>
            </div>
            <div class="container">
              @if(count($kota) > 0)
                <div class="row" > 
                    <div class="col-2" style="margin-right:-120px;font-weight:600;font-size:20px">
                          <i>  Lokasi Wisata : </i>
                    </div>
                    @foreach($kab as $item)
                          @if(in_array($item->id,$kota))
                          <div class="col-2" style="margin-right:-120px;font-weight:600;font-size:20px">
                          <i>{{$item->nama_kabupaten}}</i>
                          </div>
                          @endif
                    @endforeach
                </div>
              @endif
              @if($max > 50000)
                <div class="row" style="margin-top:10px"> 
                    <div class="col-2" style="margin-right:-120px;font-weight:600;font-size:20px">
                            <i>Harga Wisata :  </i>
                    </div>
                    <div class="col-4" style="margin-right:-120px;font-weight:600;font-size:20px">
                          <i> Rp {{number_format($min,2)}} - Rp {{number_format($max,2)}} </i>
                    </div>
                </div>
              @else
                <div class="row" style="margin-top:10px"> 
                    <div class="col-2" style="margin-right:-120px;font-weight:600;font-size:20px">
                            <i>Harga Wisata :  </i>
                    </div>
                    <div class="col-4" style="margin-right:-120px;font-weight:600;font-size:20px">
                          <i>  Rp {{number_format($min,2)}} - Rp {{number_format($max,2)}} </i>
                    </div>
                </div>
              @endif
              @if($waktu == 1)
                <div class="row" style="margin-top:10px"> 
                    <div class="col-2" style="margin-right:-120px;font-weight:600;font-size:20px">
                            <i>Jam Buka Wisata:  </i>
                    </div>
                    <div class="col-4" style="margin-right:-120px;font-weight:600;font-size:20px">
                          <i> 07:00 (Pagi)</i>
                    </div>
                </div>
              @else
                <div class="row" style="margin-top:10px"> 
                    <div class="col-2" style="margin-right:-120px;font-weight:600;font-size:20px">
                    <i>Jam Buka Wisata:  </i>
                    </div>
                    <div class="col-4" style="margin-right:-120px;font-weight:600;font-size:20px">
                          <i> 15:00 (Sore)</i>
                    </div>
                </div>
              @endif
              @if(!empty($rate))
                <div class="row" style="margin-top:10px"> 
                    <div class="col-2" style="margin-right:-120px;font-weight:600;font-size:20px">
                    <i>Rating Wisata:  </i>
                    </div>
                    <div class="col-4" style="margin-right:-120px;font-weight:600;font-size:20px">
                        @if($rate == 5)
                        <span class="fa fa-star checked"></span>
                        <span class="fa fa-star checked"></span>
                        <span class="fa fa-star checked"></span>
                        <span class="fa fa-star checked"></span>
                        <span class="fa fa-star checked"></span>
                      
                        @endif
                    </div>
                </div>
              @endif
              @if(count($tipe_id) > 0)
                <div class="row" style="margin-top:10px"> 
                    <div class="col-2" style="margin-right:-120px;font-weight:600;font-size:20px">
                            <i>Tipe Wisata : </i>
                    </div>
                    @foreach($tipewis as $item)
                          @if(in_array($item->id,$tipe_id))
                          <div class="col-2" style="margin-right:-120px;font-weight:600;font-size:20px">
                          <i>{{$item->nama_tipe}}</i>
                          </div>
                          @endif
                    @endforeach
                </div>
              @endif
              @if(count($fasi) > 0)
                <div class="row" style="margin-top:10px"> 
                    <div class="col-2" style="margin-right:-120px;font-weight:600;font-size:20px">
                            <i>Fasilitas Wisata : </i>
                    </div>
                    </div>
                    <div class="row" style="margin-top:10px"> 

                    @foreach($detail as $item)
                          @if(in_array($item->id,$fasi))
                          <div class="col-2" style="font-weight:600;font-size:20px">
                          <i>{{$item->nama_detail}}</i>
                          </div>
                          @endif
                    @endforeach
                </div>
              @endif
            </div>
          
            <div class="row row-50">
            @foreach($wisata as $item)
                <div class="col-md-6 col-xl-4">
                <article class="event-default-wrap">
                    <div class="event-default">
                    <?php $numItems = count($item->gambar_wisatas) ?>
                    <?php  $i = 0 ?>
                    @foreach($item->gambar_wisatas as $key => $item2)
                      @if(++$i === $numItems)
                        <figure class="event-default-image">@if($item->filename != " ")<img src="{{ asset('images/'.$item2->filename) }}" alt="" width="570" height="370"/> @else<img src="{{asset('images/landing-private-airlines-02-570x370.jpg')}}" alt="" width="570" height="370"/>  @endif 
                        </figure>
                      @endif
                    @endforeach
                    <div class="event-default-caption"><a class="button button-xs button-secondary button-nina" href="{{url('detailwisata/'.$item->id)}}">lihat wisata</a></div>
                    </div>
                    <div class="event-default-inner">
                    <h5><a class="event-default-title" href="{{url('detailwisata/'.$item->id)}}">{{$item->nama_wisata}}</a></h5><span class="heading-5"></span>
                    </div>
                </article>
                </div>
            @endforeach
            </div>
          </div><br><br>
        
        </section>         


        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 style="font-family:serif; font-size:28px" class="modal-title" id="exampleModalLongTitle">Filter Wisata</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <form method="POST" action="/filter/wisata">
              <input type="hidden" name="_token" value="{{ csrf_token() }}">                
                <div class="modal-body">
                  <div id="accordion">
                    <div class="card">
                      <div class="card-header" id="headingOne">
                        <h5 class="mb-0">
                          <a style="color: blue; font-family:serif; font-size:20px" data-toggle="collapse" data-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
                          Filter Berdasarkan Kota
                          </a>
                        </h5>
                      </div>

                      <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordion">
                        <div class="card-body">
                          <div class="form-check">
                            <label style="color:grey; font-size:20px;font-family:serif;"> Masukan Nama Kota Wisata </label style="color:grey; font-size:20px;font-family:serif;"> 
                          </div>
                          <input type="text" name="search" id="search" class="form-control" /><br>
                          <div class="form-check checkkota">
                          <br>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="card">
                      <div class="card-header" id="headingTwo">
                        <h5 class="mb-0">
                          <a style="color: blue; font-family:serif; font-size:20px" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                          Filter Berdasarkan Tipe Wisata
                          </a>
                        </h5>
                      </div>
                      <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
                        <div class="card-body">
                        <div class="form-check">
                            <label style="color:grey; font-size:20px;font-family:serif;"> Pilih Tipe Wisata </label style="color:grey; font-size:20px;font-family:serif;"> 
                          </div>
                        <div class="form-check">
                        <label style="color:grey; font-size:20px;font-family:serif;"><input type="checkbox" style="height:17px; width:17px;" id="checkall" name="checkall">&nbsp;Pilih Semua</label><br>
                        </div>

                        @foreach($tipewis as $item)
                        <div class="form-check">
                          <label style="color:grey; font-size:20px;font-family:serif;"><input type="checkbox" style="height:17px; width:17px;" id="tipe_wisata" name="tipe_wisata[]" value="{{$item->id}}">
                          {{$item->nama_tipe}}</label style="color:grey; font-size:20px;font-family:serif;"><br>
                        </div>
                        @endforeach
                          <br>
                        </div>
                      </div>
                    </div>
                    <div class="card">
                      <div class="card-header" id="headingThree">
                        <h5 class="mb-0">
                          <a style="color:blue; font-family:serif; font-size:20px" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                          Filter Berdasarkan Harga Tiket Masuk
                          </a>
                        </h5>
                      </div>
                      <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordion">
                        <div class="card-body">
                        <div class="form-check">
                            <label style="color:grey; font-size:20px;font-family:serif;"> Masukan Rentang Minimal dan Maximal Harga Tiket Masuk </label style="color:grey; font-size:20px;font-family:serif;"> 
                        </div>
                        <label style="color:grey; font-size:20px;font-family:serif;"for="exampleInputEmail1">Minimal Harga Tiket Rp </label style="color:grey; font-size:20px;font-family:serif;">&nbsp;
                        <input type="number" class="form-control" id="mintiket" name="mintiket" aria-describedby="mintiket" value="0">
                        <label style="color:grey; font-size:20px;font-family:serif;"for="exampleInputEmail1"> - Maksimal Rp </label style="color:grey; font-size:20px;font-family:serif;">
                        <input type="number" class="form-control" id="maxtiket" name="maxtiket" aria-describedby="maxtiket" value="500000">
            
                        </div>
                      </div>
                    </div>
                    <div class="card">
                      <div class="card-header" id="headingThree">
                        <h5 class="mb-0">
                          <a style="color: blue; font-family:serif; font-size:20px" data-toggle="collapse" data-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                          Filter Berdasarkan Jam Operasional
                          </a>
                        </h5>
                      </div>
                      <div id="collapseFour" class="collapse" aria-labelledby="headingThree" data-parent="#accordion">
                        <div class="card-body">
                          <div class="form-check">
                            <label style="color:grey; font-size:20px;font-family:serif;"> Pilih Jam Buka Wisata </label style="color:grey; font-size:20px;font-family:serif;"> 
                          </div>
                          <div class="form-check">
                          <label style="color:grey; font-size:20px;font-family:serif;"><input type="radio" style="height:20px; width:20px;"  id="waktu" name="waktu" value="1"> Pagi (Mulai 07:00)</label style="color:grey; font-size:20px;font-family:serif;">
                          </div>
                          <div class="form-check">
                          <label style="color:grey; font-size:20px;font-family:serif;"><input type="radio" style="height:20px; width:20px;"  id="waktu" name="waktu" value="2"> Sore (Mulai 15:00)</label style="color:grey; font-size:20px;font-family:serif;">
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="card">
                      <div class="card-header" id="headingThree">
                        <h5 class="mb-0">
                          <a style="color: blue; font-family:serif; font-size:20px" data-toggle="collapse" data-target="#collapseFive" aria-expanded="false" aria-controls="collapseFive">
                          Filter Berdasarkan Rating
                          </a>
                        </h5>
                      </div>
                      <div id="collapseFive" class="collapse" aria-labelledby="headingThree" data-parent="#accordion">
                        <div class="card-body">
                            <div class="form-check">
                            <label style="color:grey; font-size:20px;font-family:serif;"> Pilih Rating Wisata </label style="color:grey; font-size:20px;font-family:serif;"> 
                            </div>
                            <div class="form-check">
                            <label style="color:grey; font-size:20px;font-family:serif;"><input type="radio" style="height:20px; width:20px;" id="rate" name="rate" value="5">
                            <span class="fa fa-star checked"></span> <span class="fa fa-star checked"></span> <span class="fa fa-star checked"></span> <span class="fa fa-star checked"></span> <span class="fa fa-star checked"></span> </label style="color:grey; font-size:20px;font-family:serif;">
                            </div>
                            <div class="form-check">
                            <label style="color:grey; font-size:20px;font-family:serif;"><input type="radio" style="height:20px; width:20px;" id="rate" name="rate" value="4">
                            <span class="fa fa-star checked"></span> <span class="fa fa-star checked"></span> <span class="fa fa-star checked"></span> <span class="fa fa-star checked"></span> <span class="fa fa-star"></span> ke atas</label style="color:grey; font-size:20px;font-family:serif;">
                            </div>
                            <div class="form-check">
                            <label style="color:grey; font-size:20px;font-family:serif;"><input type="radio" style="height:20px; width:20px;" id="rate" name="rate" value="3">
                            <span class="fa fa-star checked"></span> <span class="fa fa-star checked"></span> <span class="fa fa-star checked"></span> <span class="fa fa-star"></span> <span class="fa fa-star"></span> ke atas</label style="color:grey; font-size:20px;font-family:serif;">
                            </div>
                            <div class="form-check">
                            <label style="color:grey; font-size:20px;font-family:serif;"><input type="radio" style="height:20px; width:20px;" id="rate" name="rate" value="2">
                            <span class="fa fa-star checked"></span> <span class="fa fa-star checked"></span> <span class="fa fa-star"></span> <span class="fa fa-star"></span> <span class="fa fa-star"></span> ke atas</label style="color:grey; font-size:20px;font-family:serif;">
                            </div>
                            <div class="form-check">
                            <label style="color:grey; font-size:20px;font-family:serif;"><input type="radio"style="height:20px; width:20px;"  id="rate" name="rate" value="1">
                            <span class="fa fa-star checked"></span> <span class="fa fa-star"></span> <span class="fa fa-star"></span> <span class="fa fa-star"></span> <span class="fa fa-star"></span> ke atas</label style="color:grey; font-size:20px;font-family:serif;">
                            </div><br>

                        </div>
                      </div>
                    </div>
                    <div class="card">
                      <div class="card-header" id="headingThree">
                        <h5 class="mb-0">
                          <a style="color: blue; font-weight:500; font-family:serif; font-size:20px" data-toggle="collapse" data-target="#collapseSeven" aria-expanded="false" aria-controls="collapseSeven">
                          Filter Berdasarkan Fasilitas 
                          </a>
                        </h5>
                      </div>
                      <div id="collapseSeven" class="collapse" aria-labelledby="headingThree" data-parent="#accordion">
                        <div class="card-body">
                            <p style="color:grey; font-size:20px;font-family:serif;"> Pilih Fasilitas </p> <br>
                            <label style="color:grey; font-size:20px;font-family:serif;"><input type="checkbox" style="height:17px; width:17px;" id="checkallfasi" name="checkall">&nbsp;Pilih Semua</label>
                            <div class="row" style="margin-top:10px">
                                @foreach($detail as $item)
                                <div class="col-md-4">
                                  <div class="form-check form-check-inline">
                                  <label style="color:grey; font-size:20px;font-family:serif;"><input type="checkbox" style="height:17px; width:17px;" id="fasi" name="fasi[]" value="{{$item->id}}"> {{$item->nama_detail}} </label style="color:grey; font-size:20px;font-family:serif;">
                                  </div>
                                </div>
                                @endforeach 
                            </div>
                        </div>
                      </div>
                    </div>
                    <!-- <div class="card">
                      <div class="card-header" id="headingThree">
                        <h5 class="mb-0">
                          <a style="color: blue; font-family:serif; font-size:20px" data-toggle="collapse" data-target="#collapseSix" aria-expanded="false" aria-controls="collapseSix">
                            Wisata Terdekat
                          </a>
                        </h5>
                      </div>
                      <div id="collapseSix" class="collapse" aria-labelledby="headingThree" data-parent="#accordion">
                        <div class="card-body"> 
                          <div class="form-check">
                            <label style="color:grey; font-size:20px;font-family:serif;"> Pilih Batas Jarak Wisata Terdekat </label style="color:grey; font-size:20px;font-family:serif;"> 
                          </div>
                        
                        </div>
                      </div>
                    </div> -->
                  </div>
                  <div class="modal-footer">
                    <a type="button" class="btn btn-Secondary pull-left" href="{{url('daftar/wisata')}}">Hapus filter</a>
                    <button type="submit" class="btn btn-primary">Simpan Filter</button>
                  </div>
                </div>
            </div></form>
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
$("#checkall").change(function(){
    $('input[name="tipe_wisata[]"]').not(this).prop('checked', this.checked);
});

$("#checkallfasi").change(function(){
    $('input[name="fasi[]"]').not(this).prop('checked', this.checked);
});
// $('input:checkbox').prop('checked', true);
$(".list-group-item").click(function() {
              
              // Select all list items
              var listItems = $(".list-group-item");
                
              // Remove 'active' tag for all list items
              for (let i = 0; i < listItems.length; i++) {
                  listItems[i].classList.remove("active");
              }
                
              // Add 'active' tag for currently selected item
              this.classList.add("active");
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
          $('.checkkota').append('<label style="color:grey; font-size:20px;font-family:serif;"><input type="checkbox" style="height:17px; width:17px;" id="kota" name="kota[]" value="'+ element['id'] +'">'+ element['nama_kabupaten']+'</label style="color:grey; font-size:20px;font-family:serif;"><br><br>');
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