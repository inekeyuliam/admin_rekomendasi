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
                    <li><a   data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Hotel</a>
                      <div class="dropdown-menu">
                        <a class="dropdown-item" href="/daftar/hotel">Daftar Hotel</a>
                        <a class="dropdown-item" href="/rekomendasi/hotel">Rekomendasi Hotel</a>
                      </div>
                    </li>
                    <li class="active"><a    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
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
        <div class="container container-bigger form-request-wrap form-request-wrap-modern">
        <div class="row row-fix justify-content-sm-center justify-content-md-start text-center">
        <div class="col-md-6 col-lg-5 col-xl-4 col-xxl-12">
        <br><br>

              <h3  style=" font-family:serif; font-size:40px; font-weight: 100px;">Rekomendasi Persewaan Kendaraan</h3>
                <div class="divider divider-secondary"></div>
                <p style="color:grey; font-size:25px;font-family:serif;" class="text-spacing-sm"> Sistem rekomendasi persewaan kendaraan merupakan suatu sistem yang ditujukan untuk pengunjung atau wisatawan yang ingin menyewa kendaraan di Jawa Timur. Sistem ini menyediakan beberapa kriteria atau pertimbangan yang biasanya digunakan oleh wisatawan dalam proses pemilihan persewaan kendaraan. Penggunaan sistem rekomendasi ini adalah dengan cara pengunjung memilih minimal tiga kriteria yang akan digunakan sebagai pertimbangan dalam pemilihan persewaan kendaraan.</p>
                </div>
          </div>
          <br><br> 
          @if($errors->any())
            <p style="text-align:center;font-weight:500;color:red;font-size:25px;font-family:serif;">{{$errors->first()}}</p>
          @endif
            <div class="row row-fix justify-content-sm-center">
              <div class="col-lg-8 col-xxl-10 text-center">
              <p style="font-size:30px;font-family:serif; color:black; font-weight: 100px;">Pilih Minimal 3 Kriteria Rekomendasi Persewaan Kendaraan</p>
                  <!-- RD Mailform-->
                  <form  method="POST" action="/storekriteria/persewaan">
                  <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <div class="row row-20 row-fix">
                      <div class="col-lg-12">
                        <div class="form-wrap form-wrap-validation">
                          @foreach($allkritwis as $krit)
                          <div class="form-check form-check-inline">
                           <label style="color:grey; font-size:25px;font-family:serif;"><input type="checkbox" style="height:17px; width:17px;" id="kriteria" name="kriteria[]" value="{{$krit->id}}"> {{$krit->kriteria}} </label>
                          </div>
                          @endforeach 
                          <!-- <select class="form-input select-filter" size="3" data-placeholder="Pilih Kriteria" data-minimum-results-for-search="Infinity" name="kriteria[]" id="kriteria" multiple>
                          @foreach($allkritwis as $krit)
                          <option value="{{$krit->id}}">{{$krit->kriteria}}</option>
                          @endforeach      
                          </select> --><br><br>
                        </div>
                      </div>
                    </div>
                    <div class="form-wrap form-button text-center">
                      <button class="button button-secondary pull-center" id="simpankriteria" type="submit">Cari Rekomendasi</button>
                    </div><br><br><br><br>
                  </form>
              </div>
            </div>
         </div>
      </section>

      <!-- Modal -->
      <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Pilih Minimal 3 Kriteria Rekomendasi Persewaan Kendaraan </h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="col-xl-12 modal-body">
            <p>Menurut Kamus Besar Bahasa Indonesia (KBBI), arti kata Rekomendasi adalah saran yang menganjurkan (membenarkan, menguatkan). Sederhananya rekomendasi merupakan saran yang menganjurkan, membenarkan, atau menguatkan mengenai sesuatu atau seseorang. Rekomendasi ini sangat penting artinya untuk meyakinkan orang lain bahwa sesuatu atau seseorang tepat dan layak. Misalnya, ketika seseorang akan menyewa kamar di penginapan, biasanya mereka akan melihat testimoni dari orang-orang yang pernah menginap sebelumnya, apakah banyak yang merekomendasikan atau tidak.</p>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
              <!-- <button type="button" class="btn btn-primary" id="simpankriteria" onclick="alert(getCheckedCheckboxesFor('kriteria'));" >Simpan</button> -->
            </div>
          </div>
        </div>
      </div>
     

      <!-- Footer Minimal-->
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
    // var a = parseInt(document.getElementById("ausgangssprache").value);
    function getCheckedCheckboxesFor(checkboxName) {
    var checkboxes = document.querySelectorAll('input[name="' + checkboxName + '"]:checked'), values = [];
    Array.prototype.forEach.call(checkboxes, function(el) {
        values.push(el.value);
    });
    return values;
    }
    var selected = [];
    document.getElementById('simpankriteria').onclick = function() {
      for (var option of document.getElementById('kriteria').options)
      {
          if (option.selected) {
              selected.push(option.value);
          }
      }
    }
    // console.log(selected);

    var form = document.getElementById('hitung');
    $('#cari').click(function(e) {
      var myArray = [];
      form.querySelectorAll('#prioritas').forEach(function (input) {
          myArray.push(parseInt(input.value));
      })
      console.log(myArray.length)
      var sum = 0;
      for (var item in myArray) {
        if(myArray[item] == 10){
          myArray[item] = Math.round((1/9) * 100) / 100
        }
        else if(myArray[item] == 11){
          myArray[item] = Math.round((1/8) * 100) / 100
        }
        else if(myArray[item] == 12){
          myArray[item] = Math.round((1/7) * 100) / 100
        }
        else if(myArray[item] == 13){
          myArray[item] = Math.round((1/6) * 100) / 100
        }
        else if(myArray[item] == 14){
          myArray[item] = Math.round((1/5) * 100) / 100
        }
        else if(myArray[item] == 15){
          myArray[item] = Math.round((1/4) * 100) / 100
        }
        else if(myArray[item] == 16){
          myArray[item] = Math.round((1/3) * 100) / 100
        }
        else if(myArray[item] == 17){
          myArray[item] = Math.round((1/2) * 100) / 100
        }
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
        const diffNumber = (arr1, arr2) => arr1.map(function (num, idx) { return (num/arr2[idx]).toFixed(4) });
        arrayNormalisasi.push(diffNumber(baris,totalKolom))
      }
      console.log(arrayNormalisasi)

      ////////////////////////////////////////////// BOBOT PRIORITAS //////////////////////////////////////////

      arrayBobotPrioritas = []
      for (i=0; i<array.length; i++){
        baris = array[i];
        const arrSum = baris => baris.reduce((a,b) => a + b, 0)
        let bobot = (arrSum(baris))/jumlah_kriteria;
        arrayBobotPrioritas.push(bobot)
      }
      console.log('bobot prioritas');
      console.log(arrayBobotPrioritas);

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
      getData();

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
        $(this).prop('href', '/gethasil?data='+ JSON.stringify(arrayHasil));
      }
      else
      {
        console.log('tidak konsisten, masukan ulang')
        $("#hitung")[0].reset();
        alert("Matriks Tidak Konsisten, Masukan Perbandingan Lagi");

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
      


      function getData() {
      
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

      }
 
      function storeKriteria() {
      
      $.ajax({
                headers:{    
                  'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: '/storekriteria',
                type: 'POST',
                data: {
                   data: arrayHasil 
                },
                success: function(response)
                {
                   $('#something').html(response);
                  //  window.location = "{{ url('/hasilwisata') }}";
                }
            });

      }
 

</script>
