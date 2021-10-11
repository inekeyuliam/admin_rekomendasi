
@extends('layouts.app', ['activePage' => 'kriteria', 'titlePage' => __('Edit Detail Kriteria')])
@section("content")
<div class="content">
<div class="container-fluid">
        <div class="col-md-6">
            <div class="card">
              <div class="card-header card-header-primary">
                  <h4 class="card-title">Edit Data Detail Kriteria</h4>
                </div>
                <div class="card-body">
                    <form class="mt-2" action='{{url("detailkriteria/".$listall->id)}}' method="post">{{ method_field("PUT")}}
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <div class="row">
                        <div class="col-md-5">
                        <div class="form-group">
                            <label class="exampleFormControlInput1">Jenis Kriteria</label>
                            <select class="form-control" name="jenis" id="jenis" required>
                            <option value=""> Pilih Jenis Kriteria </option>
                                @foreach ($listjenis as $jenis)
                                <option value="{{$jenis->id}}" @if($jenis->id == $listall->jenis_kriteria_id){
                                    {{"selected"}}
                                }
                                @endif>{{$jenis->nama_jenis}}
                                </option>                                
                                @endforeach
                            </select>    
                        </div>
                        </div>
                        <div class="col-md-5">
                        <div class="form-group">
                            <label class="exampleFormControlInput1"> Kriteria</label>
                            <select class="form-control" name="kriteria" id="kriteria" required>
                            <option value=""> Pilih Kriteria </option>
                                @foreach ($listkriteria as $krit)
                                <option value="{{$krit->id}}" @if($krit->id == $listall->kriteria_id){
                                    {{"selected"}}
                                }
                                @endif>{{$krit->kriteria}}
                                </option>                                
                                @endforeach
                            </select>    
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-10">
                        <div class="form-group">
                            <label class="exampleFormControlInput1">Detail Kriteria</label>
                            <input class="form-control" type="text" name="nama" value="{{$listall->nama_detail}}"  >
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


@endsection