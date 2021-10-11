@extends('layouts.app', ['activePage' => 'wisata', 'titlePage' => __('Edit Wisata')])
@section("content")
<div class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-8">
              <div class="card">
                <div class="card-header card-header-primary">
                  <h4 class="card-title">Edit Data Wisata Profile</h4>
                </div>
              <div class="card-body">
                <form class="mt-2" action='{{url("wisata/".$wisata->id)}}' method="post">{{ method_field("PUT")}}
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                        <label class="exampleFormControlInput1">Nama Wisata</label>
                        <input class="form-control" type="text" name="nama" value="{{$wisata->nama_wisata}}"required>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                        <label class="exampleFormControlInput1">Alamat Wisata</label>
                        <input class="form-control" type="text" name="nama" value="{{$wisata->alamat}}"required>
                        </div>
                      </div>
                      
                      </div>
                      <div class="row">
                      <div class="col-md-3">
                        <div class="form-group">
                        <label class="exampleFormControlInput1">Tipe Wisata</label>
                        <select class="form-control" name="tipe" required>
                        <option value=""> Pilih Tipe Wisata </option>
                        @foreach ($tipewisata as $tipe)
                                <option value="{{$tipe->id}}" @if($tipe->id == $wisata->tipe_wisata_id){
                                    {{"selected"}}
                                }
                                @endif>{{$tipe->nama_tipe}}</option>
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
                                <option value="{{$kab->id}}" @if($kab->id == $wisata->kabupaten_id){
                                    {{"selected"}}
                                }
                                @endif>{{$kab->nama_kabupaten}}</option>
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
                                <option value="{{$kec->id}}"@if($kec->id == $wisata->kecamatan_id){
                                    {{"selected"}}
                                }
                                @endif>{{$kec->nama_kecamatan}}</option>
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
                                <option value="{{$kel->id}}"@if($kel->id == $wisata->kelurahan_id){
                                    {{"selected"}}
                                }
                                @endif>{{$kel->nama_kelurahan}}</option>
                            @endforeach
                        </select>
                        </div>
                      </div>
                    </div>
                
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                        <label class="exampleFormControlInput1">Jam Buka</label>
                        <input class="form-control" type="time" name="buka" value="{{$wisata->jam_buka}}"required>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                        <label class="exampleFormControlInput1">Jam Tutup</label>
                        <input class="form-control" type="time" name="tutup" value="{{$wisata->jam_tutup}}"required>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group">
                          <div class="form-group">
                          <label class="exampleFormControlInput1">Keterangan</label>
                            <textarea class="form-control" rows="5" name="keterangan" value="{{$wisata->keterangan}}"></textarea>

                          </div>
                        </div>
                      </div>
                    </div>
                    <button class="btn btn-primary pull-right" type="submit">Simpan</button>
                    <div class="clearfix"></div>
                  </form>
                </div>
              </div>
            </div>
            <div class="col-md-4">
              <div class="card card-profile">
                <div class="card-header card-header-primary">
                  <h6 class="card-title">Bobot Nilai Kriteria Wisata</h6>
                </div>
                <div class="card-body">

                @foreach ($detailwisata as $krit)
                <div class="row">
                    <div class="col-xl-11 col-md-16 mb-8">
                        <div class="form-group">
                            <label class="exampleFormControlInput1">{{$krit->kriteria}}</label>
                            <input class="form-control" type="number" name="nilai_kriteria[{{$krit->id}}]" value="{{$krit->nilai}}">
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
              </div>
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

</script>

@endsection