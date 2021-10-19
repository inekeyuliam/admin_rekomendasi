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
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
		<!--[if lt IE 10]>
    <div style="background: #212121; padding: 10px 0; box-shadow: 3px 3px 5px 0 rgba(0,0,0,.3); clear: both; text-align:center; position: relative; z-index:1;"><a href="http://windows.microsoft.com/en-US/internet-explorer/"><img src="images/ie8-panel/warning_bar_0000_us.jpg" border="0" height="42" width="820" alt="You are using an outdated browser. For a faster, safer browsing experience, upgrade for free today."></a></div>
    <script src="js/html5shiv.min.js"> </script>
		<![endif]--> 

    <style>
      .card_check{
        display: none;
      }
      table {
        border-collapse: collapse;
        border-spacing: 0;
        width: 100%;
        border: 1px solid #ddd;
      }

      th, td {
        text-align: center;
        padding: 16px;
      }

      th:first-child, td:first-child {
        text-align: left;
      }

      tr:nth-child(even) {
        background-color: #f2f2f2
      }

      .fa-check {
        color: green;
      }

      .fa-remove {
        color: red;
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
      <!-- {{ json_encode($ranking)}} -->
      <section class="section section-variant-1 bg-default novi-background bg-cover"> 
        <div class="container container-bigger form-request-wrap form-request-wrap-modern">
          <div class="row row-fix justify-content-xl-end row-30 text-center text-xl-left">
                <div class="col-xl-12 text-center">
                  <div class="parallax-text-wrap text-center">
                  <br><br><h3  style=" font-family:serif; font-size:40px; font-weight: 100px;">Rekomendasi Wisata </h3>
                  </div>
                  <hr class="divider divider-sm"><br>
                  <br><br>
                  <label  style=" font-family:serif; font-size:25px; font-weight: 100px;"><b>KRITERIA DIPILIH : </b></label><br>
                  <hr class="divider divider-secondary">
                </div>
                <div class="col-sm-12 col-lg-12 row">
                        @foreach($kritwis as $krit)
                        <div class="col-sm-3" >
                        <i class="fa fa-check"style="color:green !important;"></i> <label style="font-size:25px;font-family:serif">{{$krit->kriteria}}</label> 
                        </div>
                        @endforeach   
                </div>
                <div class="col-xl-12 text-center">
                <br> <a class="button button-secondary button-nina"  data-toggle="modal" data-target="#exampleModal" href="#exampleModal">Bandingkan Wisata</a>

                </div>

             
              </div>
          <br><br>
        @foreach($ranking as $key=>$item)
          <div class="row row-50 justify-content-md-center align-items-lg-center justify-content-xl-between flex-lg-row-reverse">
            <div class="col-md-10 col-lg-6 col-xl-5">
              <h3><a href="{{url('wisata/'.$item['id'])}}">{{ $item['nama'] }}</a></h3>
              <div class="divider divider-secondary" ></div>
              @if($item['rating'] == 4.5 || $item['rating'] > 4.5 )
              <p class="heading-5">  Rating :  
                <span class="fa fa-star checked"></span>
                <span class="fa fa-star checked"></span>
                <span class="fa fa-star checked"></span>
                <span class="fa fa-star checked"></span>
                <span class="fa fa-star checked"></span>
                {{$item['rating']}} / 5</p>
              @elseif($item['rating'] == 4.0 || $item['rating'] < 4.5  )
                <p class="heading-5">  Rating :  
                  <span class="fa fa-star checked"></span>
                  <span class="fa fa-star checked"></span>
                  <span class="fa fa-star checked"></span>
                  <span class="fa fa-star checked"></span>
                  <span class="fa fa-star"></span>
                  {{$item['rating']}} / 5</p>
              @elseif($item['rating'] == 3.0 || $item['rating'] < 4.0  )
                <p class="heading-5">  Rating :  
                  <span class="fa fa-star checked"></span>
                  <span class="fa fa-star checked"></span>
                  <span class="fa fa-star checked"></span>
                  <span class="fa fa-star"></span>
                  <span class="fa fa-star"></span>
                  {{$item['rating']}} / 5</p> 
              @elseif($item['rating'] == 2.0 || $item['rating'] < 3.0  )
                <p class="heading-5">  Rating :  
                  <span class="fa fa-star checked"></span>
                  <span class="fa fa-star checked"></span>
                  <span class="fa fa-star"></span>
                  <span class="fa fa-star"></span>
                  <span class="fa fa-star"></span>
                  {{$item['rating']}} / 5</p> 
              @elseif($item['rating'] == 1.0 || $item['rating'] < 2.0  )
                <p class="heading-5">  Rating :  
                  <span class="fa fa-star checked"></span>
                  <span class="fa fa-star"></span>
                  <span class="fa fa-star"></span>
                  <span class="fa fa-star"></span>
                  <span class="fa fa-star"></span>
                  {{$item['rating']}} / 5</p>              
              @endif
              <p class="text-spacing-sm" style="font-size:21px;font-family:serif">Alamat : {{$item['alamat']}}</p><br>
              <a class="button button-secondary-outline button-nina" href="{{url('detailwisata/'.$item['id'])}}">Lihat Wisata</a>
              <!-- <a class="button button-secondary-outline pull-right compare_card{{$item['id']}}" id="compare" rel="{{$item['id']}}" ><span class="fa fa-plus checked"></span> Bandingkan</a> -->
            </div>
            <div class="col-md-10 col-lg-6"><img src="{{ asset('images/'.$item['filename']) }}" alt="" width="720" height="459"/>
            </div>
          </div>
          @endforeach
        </div>
      </section>
      <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Pilih Wisata (Maksimal 3)</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <form method="POST" action="/showWisata">
              <input type="hidden" name="_token" value="{{ csrf_token() }}">
              <div class="modal-body">
                <div class="form-check">
                @foreach($ranking as $item)
                <label><input type="checkbox" id="wisata" name="wisata[]" value="{{$item['id']}}">
                {{$item['nama']}}</label><br>
                @endforeach
                @foreach($kritwis as $krit)
                      <input type="hidden" name="idkriteria[]" value="{{$krit->id}}" id="idkriteria" >
                @endforeach   
                </div>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                <button type="submit" class="btn btn-primary">Simpan</button>
              </div>
            </form>
          </div>
        </div>
      </div>

      <footer class="section page-footer page-footer-minimal novi-background bg-cover text-center bg-gray-darker">
        <div class="container container-wide">
          <div class="row row-fix justify-content-sm-center align-items-md-center row-30">
            <div class="col-md-10 col-lg-7 col-xl-4">
              <p class="right">&#169;&nbsp;<span class="copyright-year"></span> All Rights Reserved. Design&nbsp;by&nbsp;<a href="https://www.templatemonster.com">TemplateMonster</a></p>
            </div>
            <div class="col-md-10 col-lg-7 col-xl-4 text-xl-right">
            </div>
          </div>
        </div>
      </footer>
    </div>
    <!-- Global Mailform Output-->
    <div class="snackbars" id="form-output-global"> </div>
    <!-- Javascript-->
    <script src="{{asset('js/core.min.js')}}"></script>
    <script src="{{asset('js/script.js')}}"></script>
  </body>
</html>

<script type="text/javascript">

$(document).ready(function(){
  $(document).on('click','#compare', function(){
    var id = $(this).attr('rel');
    var size = $('.card_check').length;
    if(size > 1)
    {
      if($('.compare_card'+id).hasClass('card_check'))
      {
        $('.compare_card'+id).removeClass('card_check')
      }
      else
      {
        alert('Item yg dipilih sudah maksimal')
      }
    }
    else
    {
      if(size > 0)
      {
        $('#btn_compare').show();
      }
      if($('.compare_card'+id).hasClass('card_check'))
      {
        $('.compare_card'+id).removeClass('card_check')
      }
      else
      {
        $('.compare_card'+id).addClass('card_check');
        var pro1 = $('#card_one').val();
        var pro2 = $('#card_two').val();
        if(pro1 == " ")
        {
          $('#card_one').val(id);
          console.log($('#card_one').val())

        }
        else if(pro2 == " ")
        {
          $('#card_two').val(id);
          console.log($('#card_two').val())
        }
        // alert('Item yg dipilih sudah maksimal')
      }
    }
  })
});

// function getData() {
  

      // $.ajax({
      //           url: 'showWisata',
      //           type: 'GET',
      //           data: {
      //             "_token": "{{ csrf_token() }}",
      //              "id1": $('#card_one').val() ,
      //              "id2": $('#card_two').val()
      //           },
      //           success: function(response)
      //           {
      //             $('#nama').html(data.nama_wisata);
      //             $('#rating').html(data.rating);
      //             $('#harga').html(data.harga);
                  
      //             $('#modal').html(response);
      //             window.location = "#exampleModal";
      //           }
      //       });

      // }

 
</script>