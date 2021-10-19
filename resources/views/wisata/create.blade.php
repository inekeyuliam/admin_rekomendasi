@extends('layouts.app', ['activePage' => 'wisata', 'titlePage' => __('Tambah Wisata')])
@section("content")
<div class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-8">
              <div class="card">
                <div class="card-header card-header-primary">
                  <h4 class="card-title">Input Data Wisata </h4>
                </div>
                <div class="card-body">
                  <form class="mt-2" action='{{url("wisata")}}' method="post" enctype="multipart/form-data">
                  <input type="hidden" name="_token" value="{{ csrf_token() }}">
                  <div class="row">
                        <div class="col-md-5">
                          <div class="form-group">
                          <label class="exampleFormControlInput1">Nama Wisata</label>
                          <input class="form-control" type="text" name="nama" id="nama" placeholder="Masukan nama tempat wisata">
                          </div>
                        </div>
                        <div class="col-md-4">
                          <div class="form-group">
                          <label class="exampleFormControlInput1">Alamat Wisata</label>
                          <input class="form-control" type="text" id="from_places" name="alamat" placeholder="Masukan nama tempat wisata">
                          <input type="hidden" id="long" name="lng">
                          <input type="hidden" id="lat" name="lat">
                          </div>
                        </div>
                        <div class="col-md-3">
                          <div class="form-group">

                            <label class="exampleFormControlInput1">Rating Wisata</label>
                            <input class="form-control" type="text"name="rating" id="rating" placeholder="Masukan rating tempat wisata" />
                          </div>
                        </div>

                        </div>
                        <div class="row">
                        <div class="col-md-3">
                          <div class="form-group">
                          <label class="exampleFormControlInput1">Tipe Wisata</label>
                            <select class="form-control" name="tipe" required>
                              <option value=""> Pilih Tipe Wisata </option>
                                  @foreach ($listtipe as $tipe)
                                      <option value="{{$tipe->id}}">{{$tipe->nama_tipe}}</option>
                                  @endforeach
                              </select>                        
                              </div>
                        </div>
                        <div class="col-md-3">
                          <div class="form-group">
                          <label class="exampleFormControlInput1">Kabupaten/Kota</label>
                          <select class="form-control dynamic"  id="kabupaten" name="kabupaten" data-dependent="kecamatan" required>
                          <option value=""> Pilih Kabupaten/Kota </option>
                              @foreach ($kabupaten as $kab)
                                  <option value="{{$kab->id}}">{{$kab->nama_kabupaten}}</option>
                              @endforeach
                          </select>
                          </div>
                        </div>
                  
                        <div class="col-md-3">
                          <div class="form-group">
                          <label class="exampleFormControlInput1">Kecamatan</label>
                          <select class="form-control dynamic"  id="kecamatan" name="kecamatan" data-dependent="kelurahan" required>
                          <option value=""> Pilih Kecamatan </option>
                              @foreach ($kecamatan as $kec)
                                  <option value="{{$kec->id}}">{{$kec->nama_kecamatan}}</option>
                              @endforeach
                          </select>
                          </div>
                        </div>
                        <div class="col-md-3">
                          <div class="form-group">
                          <label class="exampleFormControlInput1">Kelurahan</label>
                          <select class="form-control dynamic"  id="kelurahan" name="kelurahan" required>
                          <option value=""> Pilih Kelurahan </option>
                              @foreach ($kelurahan as $kel)
                                  <option value="{{$kel->id}}">{{$kel->nama_kelurahan}}</option>
                              @endforeach
                          </select>
                          </div>
                        </div>
                      </div>
                      <!-- <div class="row"> -->
                        <!-- <div class="col-md-6">
                          <div class="form-group">
                          <label class="exampleFormControlInput1">Longitude</label>
                          <input class="form-control" type="text" name="long" placeholder="Masukan longitude tempat wisata" required>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group">
                          <label class="exampleFormControlInput1">Latitude</label>
                          <input class="form-control" type="text" name="lat" placeholder="Masukan latitude tempat wisata" required>
                          </div>
                        </div>
                        </div> -->
                      <div class="row">
                        <div class="col-md-6">
                          <div class="form-group">
                          <label class="exampleFormControlInput1">Jam Buka</label>
                          <input class="form-control" type="time" name="buka" id="buka"required>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group">
                          <label class="exampleFormControlInput1">Jam Tutup</label>
                              <input class="form-control" type="time" name="tutup" id="tutup" onmouseout="updateOperasional()"required>
                          </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-md-6">
                          <div class="form-group">
                          <label class="exampleFormControlInput1">Harga Weekdays</label>
                          <input class="form-control" type="number" name="weekdays" id="weekdays"required>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group">
                          <label class="exampleFormControlInput1">Harga Weekend</label>
                              <input class="form-control" type="number" name="weekend" id="weekend"  onmouseout="cekharga()"required>
                          </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-md-8">
                          <div class="form-group">
                            <div class="form-group">
                            <label class="exampleFormControlInput1">Deskripsi Wisata</label>
                              <textarea class="form-control" rows="5" name="keterangan" placeholder="Masukan keterangan tempat wisata" required></textarea>
                            </div>
                          </div>
                        </div>
                        <div class="col-md-4">
                          <label class="exampleFormControlInput1">Pilih Gambar Wisata</label>
                          <input type="file" name="filename[]" id="filename" accept=".jpg, .jpeg, .png" multiple=""/>
                        </div>
                      </div>
                    
                      <div class="row">
                      <div class="col-md-10">
                          <div class="form-group">
                          <label class="exampleFormControlInput1">Fasilitas yg dimiliki</label>
                          </div>
                        </div>
                      @foreach ($listdetailkriteria as $detkrit)

                              <div class="col-md-4">
                                <div class="form-check">
                                <label class="exampleFormControlInput1"><input  type="checkbox" id="fasi" name="fasi[]" value="{{$detkrit->id}}" class='z' onclick="updateCount()">
                                {{$detkrit->nama_detail}} </label>

                                </div>
                              </div>
                      @endforeach
                      </div>

                      <button class="btn btn-primary pull-right" type="submit">Simpan</button>
                      <div class="clearfix"></div>
                  </div>
                </div>
              </div>
            <div class="col-md-4">
              <div class="card card-profile">
                <div class="card-header card-header-primary">
                  <h6 class="card-title">Bobot Nilai Kriteria Wisata</h6>
                </div>
                <div class="card-body">

                @foreach ($listkriteria as $krit)
                <div class="row">
                <div class="col-md-12">
                        <div class="form-group">
                            <label class="label-floating">{{$krit->kriteria}}</label>
                            @if($krit->id == 4)
                            <select  class="form-control" id="mySelect" name="nilai_kriteria[{{$krit->id}}]">
                              <option value="1">1 - Baik</option>
                              <option value="2">2 - Sedang</option>
                              <option value="3">3 - Rusak Ringan</option>
                              <option value="4">4 - Rusak Berat</option>
                            </select>
                            @elseif($krit->id == 3)
                            <input class="form-control" type="number" name="nilai_kriteria[{{$krit->id}}]" id="nilai_kriteria{{$krit->id}}" placeholder=" Masukan Nilai {{$krit->kriteria}}">

                            @else
                         
                            <input class="form-control" @if($krit->id == 1 || $krit->id == 2 || $krit->id == 5 || $krit->id == 6 || $krit->id == 7)readonly placeholder=" " @endif name="nilai_kriteria[{{$krit->id}}]" id="nilai_kriteria{{$krit->id}}" placeholder=" Masukan Nilai {{$krit->kriteria}}">
                            @endif
                          </div>
                    </div>
                    </div>

                @endforeach
                 
                <div class="col-sm-4">
                  <div id="map" style="height: 400px; width: 450px" ></div>
                </div> 
                <div class="row">
                  <div class="slider">
                    <ul id="frames" class="frames"></ul>
                    <div class="nav-dots">
                    </div>
                  </div>
                </div>
              </div>
              </div>
              </form>

            </div>
          </div>
        </div>
      </div>

<script>
$(document).ready(function(){
  $('#kabupaten').change(function(){
        let id=$(this).val();
        console.log(id);
        $('#kecamatan').empty();
        $('#kecamatan').append(' <option value="" disabled selected>Processing...</option>');
        $.ajax({
            type: 'GET',
            url: 'getKecamatan/'+ id,
            success: function(response){
                var response = JSON.parse(response);
                console.log(response);
                $('#kecamatan').empty();
                $('#kecamatan').append(' <option value="" disabled selected>Pilih Kecamatan</option>');
                response.forEach(element => {
                $('#kecamatan').append(`<option value="${element['id']}">${element['nama_kecamatan']}</option>`);

                });
            }
            });
        });

 $('#kecamatan').on('change',function(){
  var kecID = $(this).val();  
  if(kecID){
    $.ajax({
      type:"GET",
      url:"{{url('getKelurahan')}}?kecamatan_id="+kecID,
      success:function(res){        
      if(res){
        $("#kelurahan").empty();
        $.each(res,function(key,value){
          $("#kelurahan").append('<option value="'+key+'">'+value+'</option>');
        });
      
      }else{
        $("#kelurahan").empty();
      }
      }
    });
  }else{
    $("#kelurahan").empty();
  }
    
  });
});
function updateOperasional(){
  var StartTime = $('#buka').val();
  var EndTime = $('#tutup').val();
  var minutes = parseTime(EndTime) - parseTime(StartTime);
  var hours = Math.round((minutes/60)*100)/100;
  $('#nilai_kriteria2').val(hours);

}
function cekharga(){
  var weekend = $('#weekend').val();
  var weekdays = $('#weekdays').val();
  var min =Math.min(weekend, weekdays)
  console.log(min);

  $('#nilai_kriteria3').val(min);

  console.log(hours)
}
function parseTime(s) {
   var c = s.split(':');
   return parseInt(c[0]) * 60 + parseInt(c[1]);
}
function updateCount() {
    var x = $(".z:checked").length;
    $('#nilai_kriteria1').val(x);
};

function cariTerdekat(){
  var travel_mode = 'WALKING';
  origin = $('#from_place').val();
  destination = callback1();
}


$(function() {
  var origin, destination, map;
        // init or load map
        function initMap() {
          var long =  parseFloat($('#long').val());
          var lat =  parseFloat($('#lat').val());
          var myLatLng = {
                lat: lat,
                lng: long
          };

          var pyrmont = new google.maps.LatLng(lat,long);
          map = new google.maps.Map(document.getElementById('map'), {zoom: 16, center: pyrmont});
          var marker = new google.maps.Marker({
            position: pyrmont,
            map: map,
            label: 'A'
          });
          
          var request = {
            location: pyrmont,
            type: ['restaurant'],
            rankBy: google.maps.places.RankBy.DISTANCE

          };
          var request2 = {
            query: "Oleh oleh",
            type: ['store'],
            location: pyrmont,
            rankBy: google.maps.places.RankBy.DISTANCE
          };
          service = new google.maps.places.PlacesService(map);
          service.nearbySearch(request, callback1);
          service2 = new google.maps.places.PlacesService(map);
          service2.nearbySearch(request2, callback2);
          $('#nilai_kriteria5').val(0);

        }
        var marker;
        function callback1(results, status) {
          if (status == google.maps.places.PlacesServiceStatus.OK) {
            // for (var i = 0; i < results.length; i++) {
              marker = new google.maps.Marker({
                    map: map,
                    position: results[0].geometry.location,
                    label: results[0].name
              });
            // }
          }
          var long =  parseFloat($('#long').val());
          var lat =  parseFloat($('#lat').val());
          latlngfood = results[0].geometry.location.lat() +', '+results[0].geometry.location.lng();
          latlngorigin = lat + ', '+ long;
          calculateDistance1(latlngorigin, latlngfood)

        }
        function callback2(results, status) {
          if (status == google.maps.places.PlacesServiceStatus.OK) {
            // for (var i = 0; i < results.length; i++) {
              marker = new google.maps.Marker({
                    map: map,
                    position: results[0].geometry.location,
                    label: results[0].name
              });
            // }
          }
          var long =  parseFloat($('#long').val());
          var lat =  parseFloat($('#lat').val());
          latlngfood = results[0].geometry.location.lat() +', '+results[0].geometry.location.lng();
          latlngorigin = lat + ', '+ long;
          calculateDistance2(latlngorigin, latlngfood)
        }
     
  
        if (navigator.geolocation) { //check if geolocation is available
                navigator.geolocation.getCurrentPosition(function(position){
                  console.log(position);
            })
            const succesfulLooku = (position) => {
                      const {latitude, longitude} = position.coords;
                      fetch('https://api.opencagedata.com/geocode/v1/json?q=LAT+LNG&key=AIzaSyBqwxhpF3R8QeWPGUrTlsUzt_WXmnJGpns')
                      .then(response => response.json())
                      .then(data => console.log(data));
            }
            navigator.geolocation.getCurrentPosition(succesfulLooku)            
        }

        google.maps.event.addDomListener(window, 'load', function () {
          
            var from_places = new google.maps.places.Autocomplete(document.getElementById('from_places'));
            
            var to_places = new google.maps.places.Autocomplete(document.getElementById('to_places'));
          
            google.maps.event.addListener(from_places, 'place_changed', function () {
                var from_place = from_places.getPlace();
                var request = new XMLHttpRequest();
                request.open( 'GET', 'https://maps.googleapis.com/maps/api/geocode/json?address=' + from_place.formatted_address, false);
                request.send( null );
                console.log(from_place)
                latitude=from_place.geometry.location.lat();               
                longitude=from_place.geometry.location.lng();
                $('#long').val(longitude);
                $('#lat').val(latitude);
          
                // $('#rating').text('Rating : ' + from_place.rating);
                // $('#reviews').text('Reviews : ' + from_place.reviews[0].text);
                var from_address = from_place.formatted_address;
                var name = from_place.name;
                var rating = from_place.rating;
                $('#from_places').val(from_address);
                $('#rating').val(rating);
                $('#nama').val(name)
                initMap();
            });

            google.maps.event.addListener(to_places, 'place_changed', function () {
                var to_place = to_places.getPlace();
                var to_address = to_place.formatted_address;
                $('#destination').val(to_address);
            });

        });
        // calculate distance
        function calculateDistance1(origin, destination) {
            
            var service = new google.maps.DistanceMatrixService();
            service.getDistanceMatrix(
                {
                    origins: [origin],
                    destinations: [destination],
                    travelMode: google.maps.TravelMode.DRIVING,
                    unitSystem: google.maps.UnitSystem.IMPERIAL, // miles and feet.
                    // unitSystem: google.maps.UnitSystem.metric, // kilometers and meters.
                    avoidHighways: false,
                    avoidTolls: false
                }, callbackd1);
        }
        // get distance results
        function callbackd1(response, status) {
            if (status != google.maps.DistanceMatrixStatus.OK) {
                $('#result').html(err);
            } else {
                var origin = response.originAddresses[0];
                var destination = response.destinationAddresses[0];
                if (response.rows[0].elements[0].status === "ZERO_RESULTS") {
                    $('#result').html("Better get on a plane. There are no roads between "  + origin + " and " + destination);
                } else {
                    var distance = response.rows[0].elements[0].distance;
                    var duration = response.rows[0].elements[0].duration;
                    // console.log(response.rows[0].elements[0].distance);
                    var distance_in_kilo = distance.value / 1000; // the kilom
                    var distance_in_mile = distance.value / 1609.34; // the mile
                    var duration_text = duration.text;
                    var duration_value = duration.value;
                    // $('#in_mile').text('Distance In Mile : ' + distance_in_mile.toFixed(2));
                    // $('#in_kilo').text('Distance In Kilo : ' + distance_in_kilo.toFixed(2));
                    // $('#duration_text').text('IN TEXT : ' + duration_text);
                    // $('#duration_value').text('IN MINUTES : ' + duration_value);
                    // $('#from').text('FROM : ' + origin);
                    // $('#to').text('TO : ' + destination);
                    $('#nilai_kriteria6').val(distance_in_kilo);
                    console.log(distance_in_kilo)
                }
            }
        }


                // calculate distance
        function calculateDistance2(origin, destination) {
            
            var service = new google.maps.DistanceMatrixService();
            service.getDistanceMatrix(
                {
                    origins: [origin],
                    destinations: [destination],
                    travelMode: google.maps.TravelMode.DRIVING,
                    unitSystem: google.maps.UnitSystem.IMPERIAL, // miles and feet.
                    // unitSystem: google.maps.UnitSystem.metric, // kilometers and meters.
                    avoidHighways: false,
                    avoidTolls: false
                }, callbackd2);
        }
        // get distance results
        function callbackd2(response, status) {
            if (status != google.maps.DistanceMatrixStatus.OK) {
                $('#result').html(err);
            } else {
                var origin = response.originAddresses[0];
                var destination = response.destinationAddresses[0];
                if (response.rows[0].elements[0].status === "ZERO_RESULTS") {
                    $('#result').html("Better get on a plane. There are no roads between "  + origin + " and " + destination);
                } else {
                    var distance = response.rows[0].elements[0].distance;
                    var duration = response.rows[0].elements[0].duration;
                    // console.log(response.rows[0].elements[0].distance);
                    var distance_in_kilo = distance.value / 1000; // the kilom
                    var distance_in_mile = distance.value / 1609.34; // the mile
                    var duration_text = duration.text;
                    var duration_value = duration.value;
                    // $('#in_mile').text('Distance In Mile : ' + distance_in_mile.toFixed(2));
                    // $('#in_kilo').text('Distance In Kilo : ' + distance_in_kilo.toFixed(2));
                    // $('#duration_text').text('IN TEXT : ' + duration_text);
                    // $('#duration_value').text('IN MINUTES : ' + duration_value);
                    // $('#from').text('FROM : ' + origin);
                    // $('#to').text('TO : ' + destination);
                    $('#nilai_kriteria7').val(distance_in_kilo);
                    console.log(distance_in_kilo)
                }
            }
        }
        // print results on submit the form
        $('#distance_form').submit(function(e){
            e.preventDefault();
            calculateDistance();
        });

});


$('#filename').on('change', function () {
    handleFileSelect();
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