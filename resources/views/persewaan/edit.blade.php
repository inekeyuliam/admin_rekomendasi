@extends('layouts.app', ['activePage' => 'statushotel', 'titlePage' => __('')])
@section("content")
<div class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-8">
              <div class="card">
                <div class="card-header card-header-primary">
                  <h4 class="card-title">Status Pengajuan Mitra Hotel</h4>
                </div>
                        <div class="card-body">
                        <form class="mt-2" action='{{url("persewaan/".$hot->id)}}' method="post">{{ method_field("PUT")}}
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <div class="row">
                                <div class="col-xl-6 col-lg-7">
                                <div class="form-group">
                                    <label for="exampleFormControlInput1">Nama Hotel</label>
                                    <input class="form-control" type="text" name="nama" value="{{$hot->nama_hotel}}" readonly>
                                </div>
                            </div>
                            <div class="col-xl-4 col-lg-7">
                                <div class="form-group">
                                    <label for="exampleFormControlInput1">E-mail Hotel</label>
                                    <input class="form-control" type="text" name="email" value="{{$hot->email}}" readonly>
                                </div>
                            </div>
                            </div>

                            <div class="row">
                                <div class="col-xl-3 col-md-6 mb-4">
                                    <div class="form-group">
                                        <label class="bmd-label-floating">Kabupaten/Kota</label>
                                        <select class="form-control dynamic"  id="kabupaten" name="kabupaten" data-dependent="kecamatan" required>
                                        <option value=""> Pilih Kabupaten/Kota </option>
                                            @foreach ($kabupaten as $kab)
                                                <option value="{{$kab->id}}"@if($kab->id == $hot->kabupaten_id){
                                                    {{"selected"}}
                                                }
                                                @endif>{{$kab->nama_kabupaten}}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-xl-3 col-md-6 mb-4">
                                    <div class="form-group">
                                        <label class="bmd-label-floating">Kecamatan</label>
                                        <select class="form-control dynamic"  id="kecamatan" name="kecamatan" data-dependent="kelurahan" >
                                        <option value=""> Pilih Kecamatan </option>
                                            @foreach ($kecamatan as $kec)
                                                <option value="{{$kec->id}}"@if($kec->id == $hot->kecamatan_id){
                                                    {{"selected"}}
                                                }
                                                @endif>{{$kec->nama_kecamatan}}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-xl-4 col-md-6 mb-4">
                                    <div class="form-group">
                                        <label class="bmd-label-floating">Kelurahan</label>
                                        <select class="form-control dynamic"  id="kelurahan" name="kelurahan" required>
                                        <option value=""> Pilih Kelurahan </option>
                                            @foreach ($kelurahan as $kel)
                                                <option value="{{$kel->id}}"@if($kel->id == $hot->kelurahan_id){
                                                    {{"selected"}}
                                                }
                                                @endif>{{$kel->nama_kelurahan}}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xl-5 col-lg-7">
                                    <div class="form-group">
                                        <label for="exampleFormControlInput1">Longitude</label>
                                        <input class="form-control" type="text" name="long"  value="{{$hot->longitude}}" readonly>
                                    </div>
                                </div>
                                <div class="col-xl-5 col-md-6 mb-4">
                                    <div class="form-group">
                                            <label for="exampleFormControlInput1">Latitude</label>
                                            <input class="form-control" type="text" name="lat"  value="{{$hot->latitude}}" readonly>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xl-5 col-lg-7">
                                <div class="form-group">
                                        <label class="exampleFormControlInput1">Nomor Telp</label>
                                        <input class="form-control" type="text" name="notlp"   value="{{$hot->no_telp}}"readonly>
                                    </div>
                                </div>
                                <div class="col-xl-5 col-md-6 mb-4">
                                    <div class="form-group">
                                            <label for="exampleFormControlInput1">Harga Standard Permalam</label>
                                            <input class="form-control" type="number" name="harga"  value="{{$hot->harga_permalam}}" readonly>
                                    </div>
                                </div>
                            </div>
                        
                            <div class="form-group">
                                <button class="btn btn-primary" type="submit">Simpan</button>
                            </div>
                                
                            </div>
                        </div>
                    </div>
                    <!-- <div class="col-xl-4 col-lg-5">
                            <div class="card shadow mb-4">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary">Bobot Nilai Kriteria Hotel</h6>
                                </div>
                                <div class="card-body">

                                @foreach ($listkriteria as $krit)
                                <div class="row">
                                    <div class="col-xl-11 col-md-16 mb-8">
                                        <div class="form-group">
                                            <label for="exampleFormControlInput1">{{$krit->kriteria}}</label>
                                            <input class="form-control" type="number" name="nilai_kriteria[{{$krit->id}}]" placeholder=" Masukan Nilai {{$krit->kriteria}}">
                                        </div>
                                    </div>
                                    </div>

                                @endforeach
                            </div>
                    </div> -->
                    </form>

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

</script>
@endsection