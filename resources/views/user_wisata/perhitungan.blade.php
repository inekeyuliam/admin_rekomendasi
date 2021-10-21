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
      
        </div>
      </section>
      <section class="section section-variant-1 bg-default novi-background bg-cover"> 
        <div class="container container-bigger form-request-wrap form-request-wrap-modern">
          <div class="row row-fix justify-content-xl-end row-30 text-center text-xl-left">
                <div class="col-xl-12 text-center">
                  <div class="parallax-text-wrap text-center">
                  <br><br><h3  style=" font-family:serif; font-size:40px; font-weight: 100px;">Perhitungan Rekomendasi Wisata </h3>
                  </div>
                  <hr class="divider divider-sm"><br>
                  <br><br>
                  <label  style=" font-family:serif; font-size:25px; font-weight: 100px;"><b>KRITERIA DIPILIH : </b></label><br>
                  <hr class="divider divider-secondary">
                </div>
                <div class="col-sm-12 col-lg-12 row">
                        @foreach($kritwis as $krit)
                        <div class="col-sm-3" >
                        <label style="font-size:25px;font-family:serif">Kriteria {{$krit->id}} : {{$krit->kriteria}}</label> 
                        </div>
                        @endforeach   <br><br>
                </div>
              </div>
          <br><br>
          <div class="row row-fix row-50 justify-content-xl-center text-center">
            <div class="col-md-10 col-lg-10 col-xl-12">
            <label style="font-family: 'Times New Roman', Times, serif; font-weight:600; font-size:35px">METODE - TOPSIS</label><br><br>
              <p style="font-size:25px;font-weight:600; "> Step 1. Normalisasi Matriks Penilaian Alternatif </p>
              <hr class="divider divider-secondary"><br>

              <br><br>
              @foreach($normalisasi as $key=>$item)
              <p class="text-spacing-sm" style="font-size:25px;font-family:serif; text-align:left">Kriteria : {{ $item['id'] }} &nbsp;&nbsp;&nbsp; Normalisasi Matriks : {{ $item['norm'] }}  </p>
              @endforeach
              <br><br>
              <p style="font-size:25px;font-weight:600; "> Step 2. Normalisasi Matriks Terboboti </p>
              <hr class="divider divider-secondary"><br>
              <br><br>
              @foreach($terboboti as $key=>$item)
              <p class="text-spacing-sm" style="font-size:25px;font-family:serif; text-align:left">Kriteria : {{ $item['id'] }} &nbsp;&nbsp;&nbsp; Normalisasi Terboboti : {{ $item['hasil'] }}  </p>
              @endforeach
              
              <br><br>
              <p style="font-size:25px;font-weight:600; "> Step 3. Menghitung Matriks Solusi Ideal Positif dan Negatif </p>
              <hr class="divider divider-secondary"><br>
              <br><br>
              <div class="container text-center">
                <div class="row">
                  <div class="col-md-2">
                    <p style="font-size:25px;font-weight:400;  "> Kriteria </p>
                    </div>
                    @foreach($kritwis as $key=>$item)
                    <div class="col-md-2">
                    <p style="font-size:25px;font-weight:400; "> {{ $item->kriteria}}</p>
                    </div>
                    @endforeach
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-2">
                  <p style="font-size:25px; "> A + </p>
                  </div>
                  @foreach($solusipos as $key=>$item)
                  <div class="col-md-2">
                  <p style="font-size:25px; "> {{ $item['hasil'] }}</p>
                  </div>
                  @endforeach
                </div>
                <div class="row">
                  <div class="col-md-2">
                  <p style="font-size:25px; "> A - </p>
                  </div>
                  @foreach($solusineg as $key=>$item)
                  <div class="col-md-2">
                  <p style="font-size:25px; "> {{ $item['hasil'] }}</p>
                  </div>
                  @endforeach
                </div>
              </div>
              <br><br>
            </div>
          </div><br><br>
          <div class="row row-fix row-50 justify-content-xl-center text-center">
            <div class="col-md-10 col-lg-10 col-xl-8">
              <p style="font-size:25px;font-weight:600;"> Step 4. Menghitung Jarak antara Nilai Setiap Alternatif dengan Matriks Solusi Ideal Positif dan Negatif </p>
              <hr class="divider divider-secondary"><br>
              <br><br><br>
              <div class="container ">
                <div class="row text-center">
                    <div class="col-md-4">
                      <div class="row">
                        <p style="font-size:25px;text-align:center;font-weight:400;"> Alternatif</p>
                      </div>    
                      @foreach($wisata as $item)
                      <div class="row">
                      <p style="font-size:25px; "> {{ $item->nama_wisata }}</p>
                      </div>
                      @endforeach                
                    </div>
                    <div class="col-md-4">
                      <div class="row">
                      <p style="font-size:25px;text-align:center;font-weight:400;"> Jarak + </p>
                      </div>
                      @foreach($arrakarpos as $item)
                      <div class="row">
                      <p style="font-size:25px; "> {{ $item }}</p>
                      </div>
                      @endforeach
                    </div>
                    <div class="col-md-4">
                      <div class="row">
                      <p style="font-size:25px;text-align:center;font-weight:400;"> Jarak - </p>
                      </div>
                      @foreach($arrakarneg as $item)
                      <div class="row">
                      <p style="font-size:25px; "> {{ $item }}</p>
                      </div>
                      @endforeach
                    </div>
                </div>
              </div><br><br>
            </div>
          </div>
          <div class="row row-fix row-50 justify-content-xl-center text-center">
            <div class="col-md-10 col-lg-10 col-xl-8">
              <p style="font-size:25px;font-weight:600;"> Step 5. Menghitung Nilai Preferensi Setiap Alternatif </p>
              <hr class="divider divider-secondary"><br>
              <br><br><br>
              <div class="container ">
                <div class="row text-center">
                    <div class="col-md-4">
                      <div class="row">
                        <p style="font-size:25px;text-align:center;font-weight:400;"> Alternatif</p>
                      </div>    
                      @foreach($wisata as $item)
                      <div class="row">
                      <p style="font-size:25px; "> {{ $item->nama_wisata }}</p>
                      </div>
                      @endforeach                
                    </div>
                    <div class="col-md-4">
                      <div class="row">
                      <p style="font-size:25px;text-align:center;font-weight:400;"> Nilai Preferensi </p>
                      </div>
                      @foreach($nilaipref as $item)
                      <div class="row">
                      <p style="font-size:25px; "> {{ $item }}</p>
                      </div>
                      @endforeach
                    </div>
                    <div class="col-md-4">
                      <div class="row">
                      <p style="font-size:25px;text-align:center;font-weight:400;"> Urutan </p>
                      </div>
                      @foreach($ranking as $item)
                      <div class="row">
                      <p style="font-size:25px; "> {{ $item['nama'] }}</p>
                      </div>
                      @endforeach
                    </div>
                </div>
              </div><br><br>
              <a class="button button-secondary-outline button-nina" href="{{ url()->previous() }}"> Kembali</a>
            </div>
          </div>
           <div class="row row-fix row-50 justify-content-xl-center text-center">
            <div class="col-md-10 col-lg-10 col-xl-8">
              <p style="font-size:25px;font-weight:600;"> Step 5. Menghitung Nilai Preferensi Setiap Alternatif </p>
              <hr class="divider divider-secondary"><br>
              <br><br><br>
              <div class="container ">
                <div class="row text-center">
                    <div class="col-md-4">
                      <div class="row">
                        <p style="font-size:25px;text-align:center;font-weight:400;"> Alternatif</p>
                      </div>    
                      @foreach($wisata as $item)
                      <div class="row">
                      <p style="font-size:25px; "> {{ $item->nama_wisata }}</p>
                      </div>
                      @endforeach                
                    </div>
                    <div class="col-md-4">
                      <div class="row">
                      <p style="font-size:25px;text-align:center;font-weight:400;"> Nilai Preferensi </p>
                      </div>
                      @foreach($nilaipref as $item)
                      <div class="row">
                      <p style="font-size:25px; "> {{ $item }}</p>
                      </div>
                      @endforeach
                    </div>
                    <div class="col-md-4">
                      <div class="row">
                      <p style="font-size:25px;text-align:center;font-weight:400;"> </p>
                      </div>
                      @foreach($nilaipref as $item)
                      <div class="row">
                      <p style="font-size:25px; "> </p>
                      </div>
                      @endforeach
                    </div>
                </div><br><br><br><br>
                <div class="row text-center">
                    <div class="col-md-4">
                      <div class="row">
                      <p style="font-size:25px;text-align:center;font-weight:400;"> Urutan </p>
                      </div>
                      <?php $i = 1?>
                      @foreach($ranking as $key=> $item)
                      <div class="row">
                      <p style="font-size:25px; "> {{ $i++ }}</p>
                      </div>
                      @endforeach
                    </div>
                    <div class="col-md-4">
                      <div class="row">
                        <p style="font-size:25px;text-align:center;font-weight:400;"> Alternatif</p>
                      </div>    
                      @foreach($ranking as $item)
                      <div class="row">
                      <p style="font-size:25px; "> {{ $item['nama'] }}</p>
                      </div>
                      @endforeach              
                    </div>
                    <div class="col-md-4">
                      <div class="row">
                      <p style="font-size:25px;text-align:center;font-weight:400;"> Nilai Preferensi </p>
                      </div>
                      @foreach($ranking as $item)
                      <div class="row">
                      <p style="font-size:25px; "> {{ $item['pref'] }}</p>
                      </div>
                      @endforeach
                    </div>
                    
                </div>
              </div><br><br>
              <a class="button button-secondary-outline button-nina" href="{{ url('rekomendasi/wisata') }}"> Kembali</a>
            </div>
          </div>
      </section>
    
	  
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