@extends('layouts.app', ['activePage' => 'dashboardhotel', 'titlePage' => __('')])

@section('content')
<div class="content">
    <div class="container-fluid">
    @if(Auth::user()->tipe_admin == 'hotel')
   

      <div class="row">
        
        <div class="col-lg-4 col-md-6 col-sm-6">
          <div class="card card-stats">
            <div class="card-header card-header-warning card-header-icon">
              <div class="card-icon">
              <i class="material-icons">other_houses</i>
              </div>
              <p class="card-category">Data Informasi Hotel</p>
              <h2 class="card-title"></h2>
            </div>
            <div class="card-footer">
              <div class="stats">
              <h4><a href="{{url('lihat/hotel')}}" class="text-warning">Lihat Data Hotel</a></h4>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-4 col-md-6 col-sm-6">
          <div class="card card-stats">
            <div class="card-header card-header-danger card-header-icon">
              <div class="card-icon">
              <i class="material-icons">hotel</i>
              </div>
              <p class="card-category">Daftar Kamar Mitra Hotel</p>
              <h2 class="card-title"></h2>
            </div>
            <div class="card-footer">
              <div class="stats">
              <h4><a href="{{url('/kamar')}}" class="text-danger">Lihat Kamar</a></h4>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-4 col-md-6 col-sm-6">
          <div class="card card-stats">
            <div class="card-header card-header-info card-header-icon">
              <div class="card-icon">
              <i class="material-icons">holiday_village</i>
              </div>
              <p class="card-category">Data Bobot Kriteria Hotel</p>
              <h2 class="card-title"></h2>
            </div>
            <div class="card-footer">
              <div class="stats">
              <h4><a href="{{url('lihatbobot/hotel')}}" class="text-info">Lihat Bobot Kriteria Hotel</a></h4>

              </div>
              <!-- <button class="btn btn-primary pull-right" type="submit">Simpan</button> -->
              <h4><a href="#exampleModal" data-toggle="modal" data-target="#exampleModal" class="text-info">Apa Itu Bobot Kriteria?</a></h4>

            </div>
          </div>
        </div>
      </div>
      <!-- Modal -->
      <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Pengertian & Kegunaan Bobot Kriteria</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              Bobot kriteria merupakan nilai atau skor yang diberikan terhadap kriteria. Nilai ini dapat menggambarkan tinggi atau rendahnya suatu kepentingan dalam proses pengambilan keputusan. Nilai bobot yang dimasukan nantinya digunakan untuk proses perhitungan pemilihan rekomendasi hotel yang sesuai bagi pengguna.
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
            </div>
          </div>
        </div>
      </div>
      <div class="row">
            @if($listhotel->status == 'nonaktif' && $listhotel->alasan=='')

            <div class="col-md-12">
              <div class="card card-chart">
                <div class="card-header card-header-info">
                  <h3>Status Pengajuan Mitra Hotel</h3>
                </div>
                <div class="card-body">
                  <h3 class="card-title" style="text-align:center;">Pengajuan Mitra Sedang Diproses</h3><br>
                  <div class="centericonproses">
                  <i class="fa fa-spinner fa-5x center"></i>
                  </div>
                </div>
              </div>
            </div>

            @elseif($listhotel->status == 'nonaktif' && $listhotel->alasan!='')

            <div class="col-md-12">
              <div class="card card-chart">
                <div class="card-header card-header-danger">
                  <h3>Status Pengajuan Mitra Hotel</h3>
                </div>
                <div class="card-body">
                  <h3 class="card-title" style="text-align:center;"> Pengajuan Mitra Ditolak </h3></br>
                  <div class="centericontolak">
                    <i class="fa fa-times fa-5x center"></i>
                  </div>
                  <hr class="solid">
                  <h4>Alasan penolakan : {{$listhotel->alasan}}</h4>
                </div>
              </div>
            </div>
            @else

            <div class="col-md-6">
              <div class="card card-chart">
                <div class="card-header card-header-success">
                  <h3>Status Pengajuan Mitra Hotel</h3>
                </div>
                <div class="card-body"><br>
                  <p class="card-title" style="text-align:center;font-weight:400;font-size:26px;">Pengajuan Mitra Berhasil Diverifikasi</p><br>
                  <div class="centericonverif">
                  <i class="fa fa-check fa-5x center"></i>
                  </div><br><br>
                </div>
              </div>
            </div>


            <div class="col-md-6">
              <div class="card card-chart">
                <div class="card-header card-header-primary">
                  <h3>Pengaturan Mitra Hotel</h3>
                </div>
                <div class="card-body">
                 <br>
                @if($listhotel->status == 'nonaktif' && $listhotel->alasan=='')
                  <h4 class="card-title"><span class="text-primary"><i class="fa fa-circle"></i> </span> Pengajuan Mitra Diproses</h4>
                  <hr class="solid">

                  @elseif($listhotel->status == 'nonaktif' && $listhotel->alasan!='')
                  <h4 class="card-title"><span class="text-primary"><i class="fa fa-times"></i> </span> Pengajuan Mitra Ditolak </h4>
                  <hr class="solid">

                  @else
                  <h4 class="card-title"><span class="text-primary"><i class="fa fa-check"></i> </span> Mitra Terverifikasi</h4>
                  <hr class="solid">

                  @if($kamarhotel > 1)
                  <h4 class="card-title"><span class="text-primary"><i class="fa fa-check"></i> </span> Data Hotel Telah Dilengkapi</h4>
                  <hr class="solid">

                    @if($detailhotel < 1)
                    <h4 class="card-title"><span class="text-primary"><i class="fa fa-circle"></i> </span> Data Bobot Kriteria Belum Dilengkapi </h4>
                    <hr class="solid">

                    @else
                    <h4 class="card-title"><span class="text-primary"><i class="fa fa-check"></i> </span> Data Bobot Kriteria Telah Dilengkapi</h4>
                    <hr class="solid">

                    @endif
                  @else
                  <h4 class="card-title"><span class="text-primary"><i class="fa fa-circle"></i> </span> Data Hotel Belum Dilengkapi </h4>
                  <hr class="solid">

                  @endif
                  @endif
                </div>

  
              </div>
            @endif

            </div>
      </div>
    </div>
    @endif

    </div>
  </div>
@endsection

@push('js')
  <script>
    $(document).ready(function() {
      // Javascript method's body can be found in assets/js/demos.js
      md.initDashboardPageCharts();
    });
  </script>
@endpush