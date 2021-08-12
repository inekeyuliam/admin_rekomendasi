@extends('layouts.app', ['activePage' => 'dashboardhotel', 'titlePage' => __('Dashboard')])

@section('content')
  <div class="content">
    <!-- <div class="container-fluid">
    @if(Auth::user()->tipe_admin == 'hotel')
  <div class="alert alert-info alert-dismissible">{{ $listhotel->nama_hotel}} { __('Permintaan Verifikasi') }} {{ $listhotel->status}}</div>
     
    @endif -->
    @if(Auth::user()->tipe_admin == 'hotel')
      @if($listhotel->status == 'nonaktif')
        <div class="alert alert-danger alert-dismissible">
          <h3> <i class="material-icons-round"></i>Status Pengajuan Mitra {{$listhotel->nama_hotel}} Sedang Diproses! </h3>
        </div>
      @else
        <div class="alert alert-success alert-dismissible">
          <h3> <i class="material-icons-round"></i>Selamat Pengajuan Mitra {{$listhotel->nama_hotel}} Berhasil Terverifikasi! </h3>
        </div>
          @if($detailhotel < 1)
            <div class="alert alert-warning alert-dismissible">
              <a href="{{ url('/bobot/hotel')}}">  <h4> <i class="material-icons-round"></i>Silahkan Isi Bobot Kriteria Anda, Klik disini! </h4></a>            
            </div>
          @else
            <div class="alert alert-success alert-dismissible">
              <h3> <i class="material-icons-round"></i>Bobot Kriteria Hotel Berhasil Tersimpan! </h3>
            </div>
          @endif
      @endif
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