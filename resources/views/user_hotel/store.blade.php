<!DOCTYPE html>
<html class="wide wow-animation" lang="en"> 
  <head>
    <!-- Site Title-->
    <title>Sistem Rekomendasi Hotel Jawa Timur</title>
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
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!--[if lt IE 10]>
    <div style="background: #212121; padding: 10px 0; box-shadow: 3px 3px 5px 0 rgba(0,0,0,.3); clear: both; text-align:center; position: relative; z-index:1;"><a href="http://windows.microsoft.com/en-US/internet-explorer/"><img src="images/ie8-panel/warning_bar_0000_us.jpg" border="0" height="42" width="820" alt="You are using an outdated browser. For a faster, safer browsing experience, upgrade for free today."></a></div>
    <script src="js/html5shiv.min.js"> </script>
		<![endif]--> 
  </head>

  <body>
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
    <div class="page">
      <header class="section page-header">
        <div class="rd-navbar-wrap rd-navbar-default">
          <nav class="rd-navbar" data-layout="rd-navbar-fixed" data-sm-layout="rd-navbar-fixed" data-md-layout="rd-navbar-fixed" data-md-device-layout="rd-navbar-fixed" data-lg-layout="rd-navbar-fullwidth" data-xl-layout="rd-navbar-static" data-lg-device-layout="rd-navbar-fixed" data-xl-device-layout="rd-navbar-static" data-md-stick-up-offset="2px" data-lg-stick-up-offset="2px" data-stick-up="true" data-sm-stick-up="true" data-md-stick-up="true" data-lg-stick-up="true" data-xl-stick-up="true">
          <div class="rd-navbar-inner">
              <div class="rd-navbar-panel">
                <button class="rd-navbar-toggle" data-rd-navbar-toggle=".rd-navbar-nav-wrap"><span></span></button>
                <div class="rd-navbar-brand"><h5>SISTEM REKOMENDASI WISATA, HOTEL & <br> PERSEWAAN KENDARAAN DI JAWA TIMUR</h5></div>
              </div>
              <div class="rd-navbar-aside-center">
                <div class="rd-navbar-nav-wrap">
                  <ul class="rd-navbar-nav">
                    <li><a href="/index"> HOME</a> </li>
                    <li ><a href="/" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                     Wisata</a>
                      <div class="dropdown-menu">
                        <a class="dropdown-item" href="/daftar/wisata">Daftar Wisata</a>
                        <a class="dropdown-item" href="/rekomendasi/wisata">Rekomendasi Wisata</a>
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
         
        </div>
      </section>
     
      <section class="section section-variant-1 bg-default novi-background bg-cover"> 
        <div class="container container-bigger form-request-wrap form-request-wrap-modern">
          <div class="row row-fix justify-content-xl-end row-30 text-center text-xl-left">
              <div class="col-xl-12">
                <div class="parallax-text-wrap text-center">
                <br><br> <h3  style=" font-family:serif; font-size:40px; font-weight: 100px;">Rekomendasi Hotel</h3>
                </div>
              </div>
           
          </div>
          <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Kriteria Rekomendasi Hotel</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <form  method="POST" action="/storekriteria/hotel">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                @foreach($allkritwis as $item)
                  <div class="form-check">
                    @if(in_array($item->id, $idkritwis))
                      <label><input type="checkbox" id="kriteria" name="kriteria[]" value="{{$item->id}}" checked>
                      {{$item->kriteria}}</label><br>
                    @else
                      <label><input type="checkbox" id="kriteria" name="kriteria[]" value="{{$item->id}}">
                      {{$item->kriteria}}</label><br>                
                    @endif
                  </div>
                @endforeach
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                <button  class="btn btn-primary"id="simpankriteria" type="submit">Simpan</button>
              </div>
              </form>
            </div>
          </div>
        </div><br><br>
            <div class="row row-fix justify-content-sm-center">
            <div class="col-lg-14 col-xxl-10">
                <div class="col-md-6 col-lg-5 col-xl-4 col-xxl-12  text-center">
                  <label style=" font-family:serif; font-size:25px; font-weight: 100px;"><b>KRITERIA DIPILIH : </b></label><br>
                  <div class="divider divider-secondary"></div>
                </div>
                    <div class="col-sm-12 col-lg-12 row text-center">                    
                    @foreach($kritwis as $krit)
                    <div class="col-3">
                      <i class="fa fa-check"  style="color:green !important;"></i> <label style=" font-family:serif; font-size:25px; font-weight: 100px;"> {{$krit->kriteria}}</label> 
                      </div>
                    @endforeach   
                    </div><br><br><br>
                <div class="col-md-6 col-lg-5 col-xl-4 col-xxl-12  text-center">                <!-- <a class="button button-info button-nina" href="/rekomendasi/hotel"><i class="fa fa-sliders"></i> Kriteria</a> -->
                  <a class="button button-info button-nina" data-toggle="modal" data-target="#exampleModal" href="#exampleModal"><i class="fa fa-sliders"></i> Ubah Kriteria</a><br><br><br>
                </div>
                  <form class="rd-mailform form-fix" id="hitung" method="POST">
                  <input type="hidden" name="_token" value="{{ csrf_token() }}">
                  <div class="form-wrap form-button text-center">
                  <label class="text-center" style="font-size:30px;color:black;font-family:serif;font-weight: 300;"><b>Masukan Nilai Perbandingan Kriteria Hotel</b></label><br>
                  <div class="divider divider-secondary"></div>               

                  <br><br><br>
                      <div class="text-center">
                      <label style="font-size:22px;color:black;margin: 0 160px 0 9px; font-weight: 600;font-family:serif">Mutlak Kurang Penting</label>
                        <label style="font-size:22px;margin: 0 19px 0 9px; font-weight: 900; color:black; ">1</label>&nbsp;
                        <label style="font-size:22px;margin: 0 19px 0 9px; font-weight: 900; color:black;">2</label>&nbsp;
                        <label style="font-size:22px;margin: 0 19px 0 9px; font-weight: 900; color:black;">3</label>&nbsp;
                        <label style="font-size:22px;margin: 0 19px 0 9px; font-weight: 900; color:black;">4</label>&nbsp;
                        <label style="font-size:22px;margin: 0 19px 0 9px; font-weight: 900; color:black; ">5</label>&nbsp;
                        <label style="font-size:22px;margin: 0 19px 0 9px; font-weight: 900; color:black; ">6</label>&nbsp;
                        <label style="font-size:22px;margin: 0 19px 0 9px; font-weight: 900; color:black;">7</label>&nbsp;
                        <label style="font-size:22px;margin: 0 19px 0 9px; font-weight: 900; color:black;">8</label>&nbsp;
                        <label style="font-size:22px;margin: 0 19px 0 9px; font-weight: 900; color:black;">9</label>&nbsp;
                        <!-- <label style="font-size:18px;margin: 0 20px 0 9px; ">2</label>
                        <label style="font-size:18px;margin: 0 20px 0 9px; ">3</label>
                        <label style="font-size:18px;margin: 0 20px 0 9px; ">4</label>
                        <label style="font-size:18px;margin: 0 20px 0 9px; ">5</label>
                        <label style="font-size:18px;margin: 0 20px 0 9px; ">6</label>
                        <label style="font-size:18px;margin: 0 20px 0 9px; ">7</label>
                        <label style="font-size:18px;margin: 0 20px 0 9px; ">8</label>
                        <label style="font-size:18px;margin: 0 20px 0 9px; ">9</label> -->
                      <label style="font-size:22px;color:black;margin: 0 9px 0 160px;  font-weight: 600; font-family:serif ">Mutlak Sangat Penting</label>
                      </div> 
                    </div>
                      <div class="col-lg-16 col-lg-16 row text-center">
                        @foreach($kritwis as $kriteria1)
                         @foreach($kritwis as $kriteria2)
                         @if($kriteria1->kriteria == $kriteria2->kriteria) 
                         @break 
                         @else
                      
                        <label class="col-sm-2" style="font-size:25px;font-family:serif;">{{$kriteria1->kriteria}}</label>
                        <div class="col-sm-8">
                        <input type="radio" style="height:20px; width:20px;" name="prioritas{{$kriteria1->id}}{{$kriteria2->id}}" id="prioritas" value="19" onchange="handleChange(this);">&nbsp;
                        <input type="radio" style="height:20px; width:20px;" name="prioritas{{$kriteria1->id}}{{$kriteria2->id}}" id="prioritas" value="17" onchange="handleChange(this);">&nbsp;
                        <input type="radio" style="height:20px; width:20px;" name="prioritas{{$kriteria1->id}}{{$kriteria2->id}}" id="prioritas" value="15" onchange="handleChange(this);">&nbsp;
                        <input type="radio" style="height:20px; width:20px;" name="prioritas{{$kriteria1->id}}{{$kriteria2->id}}" id="prioritas" value="13" onchange="handleChange(this);">&nbsp;
                        <input type="radio" style="height:20px; width:20px;" name="prioritas{{$kriteria1->id}}{{$kriteria2->id}}" id="prioritas" value="1" onchange="handleChange(this);" checked>&nbsp;
                        <input type="radio" style="height:20px; width:20px;" name="prioritas{{$kriteria1->id}}{{$kriteria2->id}}" id="prioritas" value="3" onchange="handleChange(this);">&nbsp;
                        <input type="radio" style="height:20px; width:20px;" name="prioritas{{$kriteria1->id}}{{$kriteria2->id}}" id="prioritas" value="5" onchange="handleChange(this);">&nbsp;
                        <input type="radio" style="height:20px; width:20px;" name="prioritas{{$kriteria1->id}}{{$kriteria2->id}}" id="prioritas" value="7" onchange="handleChange(this);">&nbsp;
                        <input type="radio" style="height:20px; width:20px;" name="prioritas{{$kriteria1->id}}{{$kriteria2->id}}" id="prioritas" value="9" onchange="handleChange(this);">&nbsp;
                        <br><label style="color:#ffa500;font-weight: 900;font-size:20px;" id="info{{$kriteria1->id}}{{$kriteria2->id}}">Sama pentingnya dengan</label>
                       
                        <!-- <input type="radio"  style="height:20px; width:20px;" name="prioritas{{$kriteria1->id}}{{$kriteria2->id}}" id="prioritas" value="17">
                        <input type="radio"  style="height:20px; width:20px;" name="prioritas{{$kriteria1->id}}{{$kriteria2->id}}" id="prioritas" value="16">
                        <input type="radio"  style="height:20px; width:20px;" name="prioritas{{$kriteria1->id}}{{$kriteria2->id}}" id="prioritas" value="15">
                        <input type="radio"  style="height:20px; width:20px;" name="prioritas{{$kriteria1->id}}{{$kriteria2->id}}" id="prioritas" value="14">
                        <input type="radio"  style="height:20px; width:20px;" name="prioritas{{$kriteria1->id}}{{$kriteria2->id}}" id="prioritas" value="13">
                        <input type="radio"  style="height:20px; width:20px;" name="prioritas{{$kriteria1->id}}{{$kriteria2->id}}" id="prioritas" value="12">
                        <input type="radio"  style="height:20px; width:20px;" name="prioritas{{$kriteria1->id}}{{$kriteria2->id}}" id="prioritas" value="11">
                        <input type="radio"  style="height:20px; width:20px;" name="prioritas{{$kriteria1->id}}{{$kriteria2->id}}" id="prioritas" value="10"> -->
                        </div>

                        <label class="col-sm-2" style="font-size:25px;font-family:serif;">
                           {{$kriteria2->kriteria}}  
                           </label><br><br><br><br>
                           @endif
                        @endforeach

                        @endforeach

                      </div>
                      <input type="hidden" id="count" value={{$count}} />
                      @foreach($kritwis as $krit)
                      <input type="hidden" name="kritid" id="kritid" value="{{ $krit->id }}">
                      @endforeach
                      @foreach($kritwis as $krit)
                      <input type="hidden" name="tipe_krit" id="tipe_krit" value="{{ $krit->tipe_kriteria }}">
                      @endforeach
                      @foreach($cost as $cst)
                      <input type="hidden" name="biaya" id="biaya" value="{{ $cst->id }}">
                      @endforeach
                      <br>
                    </div>
                    <div class="form-wrap form-button text-center">
                      <a class="button button-secondary" type="submit" id="cari">Cari Rekomendasi</a>
                    </div>
                  </form>
              </div>
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
    <!-- coded by barber-->
  </body>
</html>
<script type='text/javascript'>
 
    function handleChange(src) {
      $("#info").html(src.value);
      var val = src.value
      var name = src.name
      console.log(val)
      var nameslice = name.slice(9)
      // $("#prioritas").html('<br><label id="info">'+src.value+'</label>');
      if(val == 1)
      {
        $("#info"+nameslice).html("Sama pentingnya dengan");
      }
      else if(val == 19)
      {
        $("#info"+nameslice).html("Multak kurang penting daripada");
      }
      else if(val == 17)
      {
        $("#info"+nameslice).html("Sangat kurang penting daripada");
      }
      else if(val == 15)
      {
        $("#info"+nameslice).html("Cukup kurang penting daripada");
      }
      else if(val == 13)
      {
        $("#info"+nameslice).html("Sedikit kurang penting daripada");
      }
      else if(val == 9)
      {
        $("#info"+nameslice).html("Multak sangat penting daripada");
      }
      else if(val == 7)
      {
        $("#info"+nameslice).html("Sangat penting daripada");
      }
      else if(val == 5)
      {
        $("#info"+nameslice).html("Cukup penting daripada");
      }
      else if(val == 3)
      {
        $("#info"+nameslice).html("Sedikit lebih penting daripada");
      }
    }

    // var a = parseInt(document.getElementById("ausgangssprache").value);
   
    var form = document.getElementById('hitung');
    $('#cari').click(function(e) {
      var myArray = [];
      var arrayall = [];
      var kritid = [];
      var tipekrit = [];

      form.querySelectorAll('#kritid').forEach(function (input) {
          var ids = parseInt(input.value)
          kritid.push(ids);
      })
      console.log("id kriteira");
      console.log(kritid);
      Loop1:         // The first for loop is labeled "Loop1"
      for (var item in kritid) {
        Loop2:       // The second for loop is labeled "Loop2"
        for(var item2 in kritid){
          if(kritid[item] != kritid[item2]){
            var name = "prioritas"+kritid[item]+kritid[2]
            var getSelectedValue = form.querySelector('input[name="prioritas' +kritid[item]+kritid[item2] +'"]:checked');   
            arrayall.push(getSelectedValue);
            // console.log("prioritas"+kritid[item]+kritid[item2])
          }
        }        
      }
      var arrayfilt = arrayall.filter(function (el) {
        return el != null;
      });
      for (var item in arrayfilt) {
         myArray.push(parseInt(arrayfilt[item].value));
      }
      console.log(myArray)

      form.querySelectorAll('#tipe_krit').forEach(function (input) {
          var tipe = input.value
          tipekrit.push(tipe);
      })
      console.log("tipe kriteira");
      console.log(tipekrit);
    
      // form.querySelectorAll('#prioritas').forEach(function (input) {
      //     myArray.push(parseInt(input.value));
      // })
      console.log(myArray.length)
      var sum = 0;
      for (var item in myArray) {
        if(myArray[item] == 19){
          myArray[item] = Math.round((1/9) * 100) / 100
        }
        else if(myArray[item] == 17){
          myArray[item] = Math.round((1/7) * 100) / 100
        }
        else if(myArray[item] == 15){
          myArray[item] = Math.round((1/5) * 100) / 100
        }
        else if(myArray[item] == 13){
          myArray[item] = Math.round((1/3) * 100) / 100
        }
        // else if(myArray[item] == 1){
        //   myArray[item] = Math.round((1) * 100) / 100
        // }
        // else if(myArray[item] == 15){
        //   myArray[item] = Math.round((1/4) * 100) / 100
        // }
        // else if(myArray[item] == 16){
        //   myArray[item] = Math.round((1/3) * 100) / 100
        // }
        // else if(myArray[item] == 17){
        //   myArray[item] = Math.round((1/2) * 100) / 100
        // }
        else{
          myArray[item] = myArray[item]
        }
        console.log(myArray[item]); 
        sum = sum + parseFloat(myArray[item]); // => total dari nilai bobot
      }
      // alert("Sum = " + sum);
      var jumlah_kriteria = $('#count').val();
      // alert(jumlah_kriteria);
      var arrayHolder = [];
      var arrayHolder2 = [];
      var arrayMatriks = [];
      var akhir = 1;
      var awal = 0;
      var i,j, temporary, selisih, chunk = 0;
      for (i = 0,j = jumlah_kriteria; i < j; i ++) {
        if(selisih==0)
        {
          temporary = myArray.slice(awal,akhir);
          selisih = temporary.length;
          // console.log(selisih)
        }else
        {
          akhir=awal+selisih;
          temporary = myArray.slice(awal,akhir);
          selisih = temporary.length;
          // console.log(selisih);
        }   
        var x = parseInt(temporary, 10)
        arrayHolder.push(temporary);
        arrayMatriks.push(temporary);
        awal = awal+selisih;
        akhir++;
        selisih++;

      }
      console.log("array segitiga bawah");
      console.log(arrayHolder);
      arrayKosong=[];

      for(var i = 0; i < arrayHolder.length; i++) {
          var baris = arrayHolder[i];
          baris.push(1);
          for(var j = 0; j < baris.length; j++) {
              var kebalikan = 1/baris[j];
              arrayKosong.push(kebalikan);
              //  console.log("data baris ke [" + i + "], index ke [" + j + "] = " + kebalikan)
          }
          arrayHolder2.push(arrayKosong)
          arrayKosong=[];          
      }
      
      function transpose(args){
      let newArgs = [];
      for (let i = 0; i < args.length; ++i) {
          for (let j = 0; j < args[i].length; ++j) {
          if (args[i][j] === undefined) continue;
          if (newArgs[j] === undefined) newArgs[j] = [];
          newArgs[j][i] = args[i][j];
          }
      }
      return newArgs;
      }
      const transposed = transpose(arrayHolder2);
      const filtered = transposed.map(val => val.filter(Number.isFinite));
      for (let i=0; i<filtered.length; i++){
          filtered[i].shift();
      }
      console.log(filtered);
     
      ////////////////////////////////////////////// MATRIKS KOLOM TOTAL //////////////////////////////////////////

      let merge = arrayHolder.map(function(e, i) {
          return [e, filtered[i]];
      });
      let mergeflat = merge.flat();
      arrBaru = []
      console.log(mergeflat)
      for (k=0; k<mergeflat.length; k++){
        arrBaru.push(mergeflat[k].concat(mergeflat[k+1]))
        k++;
      }
      console.log(arrBaru) //Array Baru = matriks yg lengkap berpasangan

      let array = arrBaru,
      totalKolom = array.reduce((a, b) => b.map((x, i) => a[i] + x));
      console.log(totalKolom)

      ////////////////////////////////////////////// NORMALISASI MATRIKS //////////////////////////////////////////

      arrayNormalisasi = []
      for (k=0; k<array.length; k++){
        baris = array[k];
        const diffNumber = (arr1, arr2) => arr1.map(function (num, idx) { return (num/arr2[idx])});
        arrayNormalisasi.push(diffNumber(baris,totalKolom))
      }
      console.log(arrayNormalisasi)

      ////////////////////////////////////////////// BOBOT PRIORITAS //////////////////////////////////////////
      var arrayBobotPrioritas = arrayNormalisasi.map((y) => y.reduce((a, b) => a + b));    
      console.log('sum bobot prioritas');
      console.log(arrayBobotPrioritas);

      var BobotPrioritas = arrayBobotPrioritas.map(function(x) { return x / jumlah_kriteria; });
      console.log('bobot prioritas');
      const hasilBobotId = [];
      for(x = 0; x<kritid.length; x++)
      {
        hasilBobotId[x] = {
          id: kritid[x],
          tipe_kriteria: tipekrit[x],
          bobot:BobotPrioritas[x]
        } 
      }
      console.log(hasilBobotId);
     

      ////////////////////////////////////////////// LAMBDA MAKS  //////////////////////////////////////////
      arrayHasil = []
      arraySum = []
      arrayitem = []
      for (k=0; k<array.length; k++){
        baris = array[k];
        const multipleNumber = (arr1, arr2) => arr1.map(function (num, idx) { return num * arr2[idx] });
        arrayitem.push(multipleNumber(baris,arrayBobotPrioritas))
      }
      console.log('Matriks Konsistensi (Hasil perkalian matriks berpasangan dengan bobot prioritas)')
      console.log(arrayitem)

      for (i=0; i<arrayitem.length; i++){
        baris = arrayitem[i];
        const arrSum = baris => baris.reduce((a,b) => a + b, 0)
        let bobot = (arrSum(baris));
        arraySum.push(bobot)
      }
      console.log('Jumlah per baris matriks konsistensi');
      console.log(arraySum);

      const dividedNumber = (arr1, arr2) => arr1.map(function (num, idx) { return parseFloat(num/arr2[idx]).toFixed(4) });
      arrayHasil.push(dividedNumber(arraySum,arrayBobotPrioritas))
      console.log(arrayHasil)
      let lambdamax = 0;
      var total=0;
      for(i=0; i<arrayHasil.length; i++){
        baris = arrayHasil[i];
        for(var j in baris) { 
            total += parseFloat(baris[j]);
        }
      }
      console.log(total); 
      lambdamax = total/jumlah_kriteria;
      console.log('lambdamax : ', lambdamax);

      ////////////////////////////////////////////// KONSISTENSI RASIO  //////////////////////////////////////////

      let ci = (lambdamax-jumlah_kriteria)/(jumlah_kriteria - 1);
      console.log(ci)

      let ordo = jumlah_kriteria;
      let ri = 0;
      if (ordo == 1 || ordo == 2)
      {
        ri = 0;
      }
      else if(ordo == 3)
      {
        ri = 0.58;
      }
      else if(ordo == 4)
      {
        ri = 0.9;
      }
      else if(ordo == 5)
      {
        ri = 1.12;
      }
      else if(ordo == 6)
      {
        ri = 1.24;
      }
      else if(ordo == 7)
      {
        ri = 1.32;
      }
      else if(ordo == 8)
      {
        ri = 1.41;
      }
      else if(ordo == 9)
      {
        ri = 1.46;
      }
      else{
        ri = 1.49
      }

      let cr = ci/ri;
      cr = parseFloat(cr).toFixed(4)
      console.log(cr)
      if(cr <= 0.1)
      {
        console.log('konsisten')
        $(this).prop('href', '/gethasilhotel?data='+ JSON.stringify(hasilBobotId));
      }
      else
      {
        console.log('tidak konsisten, masukan ulang')
        $("#hitung")[0].reset();
        // alert("Matriks Tidak Konsisten, Masukan Perbandingan Lagi");

      }
      ////////////////////////////////////////////// MATRIKS TERNORMALISASI R  //////////////////////////////////////////
      // var arr = []
      // form.querySelectorAll('#nilai').forEach(function (input) {
      //     arr.push(parseFloat(input.value).toFixed(4));
      // })

      // var arrR = []; //matriks ternormalisasi R
      // for(var i = 0; i < arr.length; i += 7) {
      //   arrR.push(arr.slice(i, i+7));
      // }
      // console.log(arrR)

      ////////////////////////////////////////////// PERKALIAN MATRIKS DG BOBOT KRITERIA  //////////////////////////////////////////
     
      // multiArray = []
      // matriksbobot = []
      // hasil = arrayHasil.flat()
      // for (k=0; k<arrR.length; k++){
      //   baris = arrR[k];
      //   const multipleNumber = (arr1, arr2) => arr1.map(function (num, idx) { return parseFloat(num*arr2[idx]).toFixed(4)  });
      //   matriksbobot.push(multipleNumber(baris,hasil))
      // }
      // console.log('Matriks normalisasi dengan bobot prioritas)')
      // console.log(matriksbobot)

      ////////////////////////////////////////////// CARI SOLUSI IDEAL POSITIF DAN NEGATIF  //////////////////////////////////////////
      // var cost =[]
      // form.querySelectorAll('#biaya').forEach(function (input) {
      //     var nilai = parseInt(input.value)
      //     cost.push(nilai);
      // })

      // console.log(cost);
     


    })
      ////////////////////////////////////////////// KIRIM DATA AHP ////////////////////////////////////////////// 
      
      // function getData() {
      
      // $.ajax({
      //           headers:{    
      //             'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      //           },
      //           url: 'gethasil',
      //           type: 'POST',
      //           data: {
      //              data: arrayHasil 
      //           },
      //           success: function(response)
      //           {
      //             //  $('#something').html(response);
      //             //  window.location = "{{ url('/hasilwisata') }}";
      //           }
      //       });

      // }
 
  
 

</script>
