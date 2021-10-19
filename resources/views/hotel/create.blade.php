@extends('layouts.app', ['activePage' => 'hotel', 'titlePage' => __('')])
@section("content")
<div class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-8">
              <div class="card">
                <div class="card-header card-header-primary">
                  <h4 class="card-title">Permintaan Verifikasi Mitra Hotel</h4>
                </div>
                        <div class="card-body">
                        <form class="mt-2" action='{{url("hotel")}}' method="post" enctype="multipart/form-data">
                            <!-- <form class="mt-2" action='{{url("hotel")}}' method="post"> -->
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <div class="row">
                                <div class="col-xl-4 col-lg-7">
                                <div class="form-group">
                                    <label for="exampleFormControlInput1">Nama Hotel</label>
                                    <input class="form-control" type="text" name="nama" id="nama"placeholder="Masukan nama tempat hotel">
                                </div>
                                </div>
                                <div class="col-xl-4 col-md-6 mb-4">
                                    <div class="form-group">
                                    <label for="exampleFormControlInput1">Alamat Hotel</label>
                                    <input class="form-control" type="text" id="from_place" name="alamat" placeholder="Masukan alamat hotel">
                                    <input type="hidden" id="long" name="lng">
                                    <input type="hidden" id="lat" name="lat">
                                     </div>
                                </div>
                                <div class="col-xl-4 col-md-6 mb-4">
                                    <div class="form-group">
                                    <label for="exampleFormControlInput1">Rating Hotel</label>
                                    <input class="form-control" type="text" name="rating" id="rating" placeholder="Masukan rating hotel" required>
                                    </div>
                                </div>
                              
                                <input type="hidden" name="userid" id="user_id" value="{{ auth()->user()->id }}">
                               
                            </div>

                            <div class="row">
                                <div class="col-xl-2 col-md-6 mb-4">
                                    <div class="form-group">
                                    <label for="exampleFormControlInput1">Hotel Bintang</label>
                                    <select class="form-control"  id="bintang" name="bintang" required>
                                        <option value=""> Pilih Hotel Bintang </option>
                                        <option value="1">Hotel Bintang 1</option>
                                        <option value="2">Hotel Bintang 2</option>
                                        <option value="3">Hotel Bintang 3</option>
                                        <option value="4">Hotel Bintang 4</option>
                                        <option value="5">Hotel Bintang 5</option>
                                    </select>
                                    </div>
                                </div>
                                <div class="col-xl-3 col-md-6 mb-4">
                                    <div class="form-group">
                                        <label for="exampleFormControlInput1">Kabupaten/Kota</label>
                                        <select class="form-control dynamic"  id="kabupaten" name="kabupaten" data-dependent="kecamatan" required>
                                        <option value=""> Pilih Kabupaten/Kota </option>
                                            @foreach ($kabupaten as $kab)
                                                <option value="{{$kab->id}}">{{$kab->nama_kabupaten}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-xl-2 col-md-6 mb-4">
                                    <div class="form-group">
                                        <label for="exampleFormControlInput1">Kecamatan</label>
                                        <select class="form-control dynamic"  id="kecamatan" name="kecamatan" data-dependent="kelurahan" >
                                        <option value=""> Pilih Kecamatan </option>
                                            @foreach ($kecamatan as $kec)
                                                <option value="{{$kec->id}}">{{$kec->nama_kecamatan}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-xl-2 col-md-6 mb-4">
                                    <div class="form-group">
                                        <label for="exampleFormControlInput1">Kelurahan</label>
                                        <select class="form-control dynamic"  id="kelurahan" name="kelurahan" required>
                                        <option value=""> Pilih Kelurahan </option>
                                            @foreach ($kelurahan as $kel)
                                                <option value="{{$kel->id}}">{{$kel->nama_kelurahan}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <label>Pilih Gambar Hotel</label>
                                    <input type="file" name="filename[]" id="filename" accept=".jpg, .jpeg, .png" multiple=""/>
                                </div>
                            </div>
                            
                            <div class="row">
                                <div class="col-xl-6 col-md-6 mb-4">
                                <div class="form-group">
                                        <label for="exampleFormControlInput1">Nomor Telp</label>
                                        <input class="form-control" type="text" name="notlp" id="no_tlp" placeholder="Masukan nomor telp hotel"required>
                                    </div>
                                </div>
                                <div class="col-xl-6 col-md-6 mb-4">
                                <div class="form-group">
                                        <label for="exampleFormControlInput1">Nomor Whatsapp (Opsional)</label>
                                        <input class="form-control" type="text" name="nowa" id="no_wa" placeholder="Masukan nomor telp hotel"required>
                                    </div>
                                </div>
                            </div>
                             <div class="row">
                                <div class="col-xl-6 col-md-6 mb-4">
                                    <div class="form-group">
                                    <label for="exampleFormControlInput1">Link Facebook (Opsional)</label>
                                    <input class="form-control" type="text" name="link_fb" placeholder="Masukan link fb hotel">
                                    </div>
                                </div>
                                <div class="col-xl-6 col-md-6 mb-4">
                                    <div class="form-group">
                                    <label for="exampleFormControlInput1">Link Instagram (Opsional)</label>
                                    <input class="form-control" type="text" name="link_ig" placeholder="Masukan link ig hotel">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xl-12 col-md-6 mb-4">
                                    <div class="form-group">
                                    <label for="exampleFormControlInput1">Keterangan (Opsional)</label>
                                        <textarea class="form-control" rows="5" name="keterangan" placeholder="Masukan keterangan hotel"></textarea>
                                    </div>
                                </div>
                            </div>
                           
                            <div class="form-group">
                                <button class="btn btn-primary" id="myButtonID" type="submit">Simpan</button>
                            </div>
                                
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card card-profile">
                            <div class="card-header card-header-primary">
                                <h6 class="card-title">Gambar Hotel</h6>
                            </div>
                            <div class="card-body">
                                <div class="col-sm-4">
                                    <div id="map" style="height: 400px; width: 450px" ></div>
                                </div> 
                                <br><br>
                                <div class="row">
                                        <div class="slider">
                                            <ul id="frames" class="frames"></ul>
                                            <div class="nav-dots">
                                            </div>
                                        </div>
                                </div>
                            </div>
                        </div>
                    </div>
        </form>
     </div>
   </div>
</div>

<script>


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

//  $('#kabupaten').change(function(){
//   var kabID = $(this).val();  
//   if(kabID){
//     $.ajax({
//       type:"GET",
//       url:"{{url('getKecamatan')}}?kabupaten_id="+kabID,
//       success:function(res){        
//       if(res){
//         $("#kecamatan").empty();
//         $("#kecamatan").append('<option>Select</option>');
//         $.each(res,function(key,value){
//           $("#kecamatan").append('<option value="'+key+'">'+value+'</option>');
//         });
     
//       }else{
//         $("#kecamatan").empty();
//       }
//       }
//     });
//   }else{
//     $("#kecamatan").empty();
//     $("#kelurahan").empty();
//   }   
//   });

        $('#kecamatan').on('change',function(){
        var kecID = $(this).val();  
        if(kecID){
        $.ajax({
            type:"GET",
            url:"{{url('getKelurahann')}}?kecamatan_id="+kecID,
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
        }
        else{
        $("#kelurahan").empty();
        }
        
        });

        $('#myButtonID').on('click', function() {
        var nama_hotel = $('#nama_hotel').val();
        var email = $('#email').val();
        var user_id = $('#user_id').val();
        var kelurahan_id = $('#kelurahan_id').val();
        var latitude = $('#latitude').val();
        var longitude = $('#longitude').val();
        var no_tlp = $('#no_tlp').val();
        var harga_permalam = $('#harga_permalam').val();
        var status = "nonaktif";
        console.log(nama,email, userid,kelurahan,lat,long,no_telp,harga_permalam);

        if(nama!="" && email!="" && kelurahan!="" && lat!=""&& long!="" && no_tlp!="" && harga_permalam!="" &&status!=""){
        //    $("#myButtonID").attr("disabled", "disabled");

            $.ajax({
                url: "/hotel",
                type: "POST",
                data: {
                    _token: $("#csrf").val(),
                    user_id: user_id,
                    nama_hotel: nama_hotel,
                    email: email,
                    kelurahan_id: kelurahan_id,
                    status: status,
                    latitude: latitude,
                    longitude: longitude,
                    no_telp: no_telp,
                    harga_permalam: harga_permalam
                },
                cache: false,
                success: function(dataResult){
                    console.log(dataResult);
                    var dataResult = JSON.parse(dataResult);
                    if(dataResult.statusCode==200){
                    //    window.location = "/hotel";				
                    }
                    else if(dataResult.statusCode==201){
                        alert("Error occured !");
                    }
                    
                }
            });
        }
        else{
            alert('Please fill all the field !');
        }
    });
});


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
            type: ['destination'],
            rankBy: google.maps.places.RankBy.DISTANCE

          };
         
          service = new google.maps.places.PlacesService(map);
          service.nearbySearch(request, callback1);
         

        }
        var marker;
        function callback1(results, status) {
          if (status == google.maps.places.PlacesServiceStatus.OK) {
              marker = new google.maps.Marker({
                    map: map,
                    position: results[0].geometry.location,
                    label: results[0].name
              });
          }
          var long =  parseFloat($('#long').val());
          var lat =  parseFloat($('#lat').val());
          latlngfood = results[0].geometry.location.lat() +', '+results[0].geometry.location.lng();
          latlngorigin = lat + ', '+ long;
          calculateDistance1(latlngorigin, latlngfood)

        }
       
        var from_places = new google.maps.places.Autocomplete(document.getElementById('from_place'));

        google.maps.event.addListener(from_places, 'place_changed', function () {
                var from_place = from_places.getPlace();
                var from_address = from_place.formatted_address;
                // $('#origin').val(from_address);
                console.log(from_address);
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

</script>
@endsection