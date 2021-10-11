@extends('layouts.app', ['activePage' => 'kriteria', 'titlePage' => __('Tambah Kategori')])
@section("content")
<div class="content">
<div class="container-fluid">
        <div class="col-md-8">
            <div class="card">
              <div class="card-header card-header-primary">
                  <h4 class="card-title">Edit Data Kriteria</h4>
                </div>
        <div class="card-body">
        <form class="mt-2" action='{{url("kriteria/".$itemkriteria->id)}}' method="post">{{ method_field("PUT")}}
          <input type="hidden" name="_token" value="{{ csrf_token() }}">
          <div class="row">
                <div class="col-md-8">
                    <div class="form-group">
                        <label class="exampleFormControlInput1">Nama Kriteria</label>
                        <input class="form-control" type="text" name="kriteria" value="{{$itemkriteria->kriteria}}"  >
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                        <label class="exampleFormControlInput1">Jenis Kriteria</label>
                        <select class="form-control" name="jenis" required>
                        <option value=""> Pilih Jenis Kriteria </option>
                        @foreach ($listjenis as $jen)
                                    <option value="{{$jen->id}}" @if($jen->id == $itemkriteria->jenis_kriteria_id){
                                        {{"selected"}}
                                    }
                                    @endif>{{$jen->nama_jenis}}</option>
                        @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label class="exampleFormControlInput1">Tipe Kriteria</label>
                        <select class="form-control" name="tipe" required>
                        <option value=""> Pilih Tipe Kriteria </option>
                                <option value="Benefit"@if($itemkriteria->tipe_kriteria == 'Benefit') selected ='selected' @endif>Benefit</option>
                                <option value="Cost"@if($itemkriteria->tipe_kriteria == 'Cost') selected ='selected' @endif>Cost</option>
                        </select>
                    </div>
                </div>
            </div>

            <button type="submit" class="btn btn-primary btn-round pull-right"><i class="material-icons">check</i> Simpan</button>
            <a href="{{url('kriteria/')}}" class ="btn btn-primary btn-round"> <i class="material-icons">cancel</i> Cancel</a>
            <div class="clearfix"></div>
            </form>
            </div>
        </div>
    </div>
</div>
</div>
</div>
</div>


@endsection