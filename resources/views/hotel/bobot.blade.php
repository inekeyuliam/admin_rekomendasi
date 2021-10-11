@extends('layouts.app', ['activePage' => 'lihatbobothotel', 'titlePage' => __('')])
@section("content")
<div class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-8">
              <div class="card">
                <div class="card-header card-header-primary">
                  <h4 class="card-title">Input Data Hotel </h4>
                </div>
              <div class="card-body">
                <form class="mt-2" action='{{url("simpan/bobot/hotel")}}' method="post" enctype="multipart/form-data">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <div class="row">
                    <div class="col-md-8">
                        <div class="form-group">
                        <label class="exampleFormControlInput1">Fasilitas Hotel</label>
                        </div>
                      </div>
                    @foreach ($listdetailkriteria as $detkrit)
                            <div class="col-md-6">
                              <div class="form-group">
                              <input  type="checkbox" name="fasi[]" value="{{$detkrit->id}}" class='z' onclick="updateCount()">
                                <label class="exampleFormControlInput1">{{$detkrit->nama_detail}} </label>
                              </div>
                            </div>
                    @endforeach
                  </div>
                  <div class="col-sm-6">
                        <div id="map" style="height: 520px; width: 900px" ></div>
                    </div>   <br><br>
                </div>
              </div>
            </div>
            <div class="col-md-4">
              <div class="card card-profile">
                <div class="card-header card-header-primary">
                  <h6 class="card-title">Bobot Nilai Kriteria Hotel</h6>
                </div>
                <div class="card-body">
                <input type="hidden" id="from_places" value="{{$alamat}}">
                <input type="hidden" id="long" value="{{$long}}">
                <input type="hidden" id="lat" value="{{$lat}}">

                @foreach ($listkriteria as $krit)
                <div class="row">
                <div class="col-md-12">
                        <div class="form-group">
                            <label class="label-floating">{{$krit->kriteria}}</label>                         
                            <input class="form-control" name="nilai_kriteria[{{$krit->id}}]" id="nilai_kriteria{{$krit->id}}" readonly>
                          </div>
                    </div>
                </div>

                @endforeach
                <input type="hidden" id="rating" value="{{$rating}}">
                <input type="hidden" id="min" value="{{$min}}">
                <button class="btn btn-primary pull-right" type="submit">Simpan</button>

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

function updateCount() {
    var x = $(".z:checked").length;
    
    $('#nilai_kriteria8').val(x);
};


$(function() {
  var origin, destination, map;
        // init or load map
        initMap();

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
            label: 'Current Position'
          });
        
          var request = {
            location: pyrmont,
            type: ['tourist_attraction'],
            rankBy: google.maps.places.RankBy.DISTANCE

          };
      
          service = new google.maps.places.PlacesService(map);
          service.nearbySearch(request, callback);
        }

        var marker;
        function callback(results, status) {
          if (status == google.maps.places.PlacesServiceStatus.OK) {
              marker = new google.maps.Marker({
                    map: map,
                    position: results[0].geometry.location,
                    label: results[0].name
              });
              console.log(results[0])
          }
          var long =  parseFloat($('#long').val());
          var lat =  parseFloat($('#lat').val());
          latlngfood = results[0].geometry.location.lat() +', '+results[0].geometry.location.lng();
          latlngorigin = lat + ', '+ long;
          calculateDistance1(latlngorigin, latlngfood)

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
                var origin = response;
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
                    var r = $('#rating').val();
                    var m = $('#min').val();
                    var d = $('#long').val();
                    var t = $('#lat').val();
                    $('#nilai_kriteria9').val(r);
                    $('#nilai_kriteria10').val(m);
                    $('#nilai_kriteria11').val(0);
                    $('#nilai_kriteria12').val(distance_in_kilo);

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