@extends('layouts.app', ['activePage' => 'kriteria', 'titlePage' => __('Tambah Detail Kriteria')])
@section("content")
<div class="content">
    <div class="row">
        <div class="container-fluid">
           <div class="col-md-6">
              <div class="card">
              <div class="card-header card-header-primary">
                  <h4 class="card-title">Input Data Tipe Wisata</h4>
                </div>
                <div class="card-body">
                    <form class="mt-2" action='{{url("detailkriteria")}}' method="post">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <div class="row">
                        <div class="col-md-5">
                        <div class="form-group">
                            <label class="exampleFormControlInput1">Jenis Kriteria </label>
                            <select class="form-control" name="jenis" id="jenis" required>
                            <option value=""> Pilih Jenis Kriteria </option>
                                @foreach ($listjenis as $jenis)
                                    <option value="{{$jenis->id}}">{{$jenis->nama_jenis}}</option>
                                @endforeach
                            </select>    
                        </div>    
                        </div>
                        <div class="col-md-5">
                        <div class="form-group">
                            <label class="exampleFormControlInput1">Kriteria </label>
                            <select class="form-control" name="kriteria" id="kriteria" required>
                            <option value=""> Pilih Kriteria </option>
                                @foreach ($listkriteria as $krit)
                                    <option value="{{$krit->id}}">{{$krit->kriteria}}</option>
                                @endforeach
                            </select>    
                            </div>                   
                        </div>                   
                    </div>
                    <div class="row">
                        <div class="col-md-10">
                        <div class="form-group">
                            <label class="exampleFormControlInput1">Nama Detail Kriteria </label>
                            <input class="form-control" type="text" name="nama" placeholder="Masukan nama detail kriteria">
                        </div>                   
                    </div>
                    </div>

                    <div class="form-group">
                        <button class="btn btn-primary" type="submit">Simpan</button>
                    </div>    
                    </form>
                    </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
$(document).ready(function(){

    $('#jenis').change(function(){
        let id=$(this).val();
        console.log(id);
    $('#kriteria').empty();
    $('#kriteria').append(' <option value="" disabled selected>Processing...</option>');
    $.ajax({
        type: 'GET',
        url: 'getKriteria/'+ id,
        success: function(response){
            var response = JSON.parse(response);
            console.log(response);
            $('#kriteria').empty();
            $('#kriteria').append(' <option value="" disabled selected>Pilih Kecamatan</option>');
            response.forEach(element => {
                $('#kriteria').append(`<option value="${element['id']}">${element['kriteria']}</option>`);

            });
        }
    });
    });

 
});

</script>

@endsection