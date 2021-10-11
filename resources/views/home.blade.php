@extends('layouts.app', ['activePage' => 'dashboard', 'titlePage' => __('Dashboard')])

@section('content')
  <div class="content">
    <div class="container-fluid">
    @if(Auth::user()->tipe_admin != 'superadmin')
       <!-- <h3>Silahkan Isi Form Pengajuan Mitra Hotel Pada Menu Ajukan Permintaan</h3> -->
    @else
    <div class="row">
        <div class="col-lg-3 col-md-6 col-sm-6">
          <div class="card card-stats">
            <div class="card-header card-header-warning card-header-icon">
              <div class="card-icon">
              <i class="material-icons">hotel</i>
              </div>
              <p class="card-category">Mitra Hotel</p>
              <h2 class="card-title">{{$hotel}}
              </h2>
            </div>
            <div class="card-footer">
              <div class="stats">
                <h4><a href="{{url('hotel')}}" class="text-danger">View Details...</a></h4>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-6">
          <div class="card card-stats">
            <div class="card-header card-header-success card-header-icon">
              <div class="card-icon">
              <i class="material-icons">car_rental</i>
              </div>
              <p class="card-category">Mitra Persewaan Kendaraan</p>
              <h2 class="card-title">{{$sewa}}</h2>
            </div>
            <div class="card-footer">
              <div class="stats">
              <h4><a href="{{url('persewaan')}}" class="text-success">View Details...</a></h4>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-6">
          <div class="card card-stats">
            <div class="card-header card-header-danger card-header-icon">
              <div class="card-icon">
              <i class="material-icons">place</i>
              </div>
              <p class="card-category">Daftar Wisata</p>
              <h2 class="card-title">{{$wisata}}</h2>
            </div>
            <div class="card-footer">
              <div class="stats">
              <h4><a href="{{url('wisata')}}" class="text-danger">View Details...</a></h4>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-6">
          <div class="card card-stats">
            <div class="card-header card-header-info card-header-icon">
              <div class="card-icon">
              <i class="material-icons">assignment</i>
              </div>
              <p class="card-category">Daftar Kriteria</p>
              <h2 class="card-title">{{$kriteria}}</h2>
            </div>
            <div class="card-footer">
              <div class="stats">
              <h4><a href="{{url('kriteria')}}" class="text-info">View Details...</a></h4>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="row">
            <div class="col-md-4">
              <div class="card card-chart">
                <div class="card-header card-header-success">
                  <div class="ct-chart" id="dailySalesChart"></div>
                </div>
                <div class="card-body">
                  <h4 class="card-title">Permintaan Mitra Hotel</h4>
                  <p class="card-category">
                    <span class="text-success"><i class="fa fa-long-arrow-up"></i> 55% </span> increase in today sales.</p>
                </div>
                <div class="card-footer">
                  <div class="stats">
                    <i class="material-icons">access_time</i> updated 4 minutes ago
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-4">
              <div class="card card-chart">
                <div class="card-header card-header-warning">
                  <div class="ct-chart" id="completedTasksChart"></div>
                </div>
                <div class="card-body">
                  <h4 class="card-title">Permintaan Mitra Persewaan Kendaraan</h4>
                  <p class="card-category">Last Campaign Performance</p>
                </div>
                <div class="card-footer">
                  <div class="stats">
                    <i class="material-icons">access_time</i> campaign sent 2 days ago
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-4">
              <div class="card card-chart">
                <div class="card-header card-header-danger">
                  <div class="ct-chart" id="websiteViewsChart"></div>
                </div>
                <div class="card-body">
                  <h4 class="card-title">Penambahan Wisata</h4>
                  <p class="card-category">Last Campaign Performance</p>
                </div>
                <div class="card-footer">
                  <div class="stats">
                    <i class="material-icons">access_time</i> campaign sent 2 days ago
                  </div>
                </div>
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