@extends('layouts.app', ['activePage' => 'kendaraan', 'titlePage' => __('Tambah Kendaraan')])
@section("content")
<div class="content">
    <div class="row">
        <div class="container-fluid">
           <div class="col-md-10">
              <div class="card">
              <div class="card-header card-header-primary">
                  <h4 class="card-title">Input Data Kendaraan </h4>
                </div>
        <div class="card-body">
            <form class="mt-2" action='{{url("kendaraan")}}' method="post">
              <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <div class='row'>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="exampleFormControlInput1">Nama Model Kendaraan</label>
                        <input class="form-control" type="text" name="nama" placeholder="Masukan nama model">
                    </div>
                </div>
                <div class="col-md-3">
                    <label>Pilih Gambar Hotel</label>
                    <input type="file" name="filename" id="filename" accept=".jpg, .jpeg, .png" />
                </div>
            </div>
            <div class='row'>
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="bmd-label-floating">Jenis Kendaraan</label>
                        <select class="form-control" name="jenis" required>
                            <option value=""> Pilih Jenis Kendaraan </option>
                            <option value="Mobil">Mobil</option>
                            <option value="Motor">Sepeda Motor</option>
                            <option value="Minibus/Bus">Minibus/Bus</option>
                        </select>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="bmd-label-floating">Merk Kendaraan</label>
                        <select class="form-control" name="merk" required>
                        <option value=""> Pilih Merk Kendaraan </option>
                        @foreach ($listmerk as $merk)
                                <option value="{{$merk->id}}">{{$merk->nama_merk}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>
           
            <div class='row'>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="exampleFormControlInput1">Kapasitas Penumpang</label>
                        <input class="form-control" type="number" name="kapasitas" placeholder="Masukan kapasitas">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="exampleFormControlInput1">Biaya per hari </label>
                        <input class="form-control" type="number" name="biaya" placeholder="Masukan biaya">
                    </div>
                </div>
            </div>

            <div class='row'>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="exampleFormControlInput1">Tahun Keluaran</label>
                        <input class="form-control" type="number" name="tahun" placeholder="Masukan tahun keluaran">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Memiliki Sertifikat Uji Kendaraan :      </label>
                        <input type="checkbox" name="uji" value=1><label>   Ya</label>
                    </div>
                </div>
            </div>
            <div class="form-group">
                    <label for="exampleFormControlInput1">Keterangan</label>
                    <textarea class="form-control" rows="5" name="ket" placeholder="Masukan keterangan tempat wisata"></textarea>
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