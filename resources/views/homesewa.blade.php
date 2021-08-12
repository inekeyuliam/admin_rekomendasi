@extends('layouts.app', ['activePage' => 'dashboardsewa', 'titlePage' => __('Dashboard')])

@section('content')
  <div class="content">
    <!-- <div class="container-fluid">
    @if(Auth::user()->tipe_admin == 'hotel')
  <div class="alert alert-info alert-dismissible">{{ $listhotel->nama_hotel}} { __('Permintaan Verifikasi') }} {{ $listhotel->status}}</div>
     
    @endif -->
    @if(Auth::user()->tipe_admin == 'persewaan')
      @if($listper->status == 'nonaktif')
        <div class="alert alert-danger alert-dismissible">
          <h3> <i class="material-icons-round"></i>Status Pengajuan Mitra {{$listper->nama_persewaan}} Sedang Diproses! </h3>
        </div>
      @else
        <div class="alert alert-success alert-dismissible">
          <h3> <i class="material-icons-round"></i>Selamat Pengajuan Mitra {{$listper->nama_persewaan}} Berhasil! </h3>
        </div>
        @if($kendaraansewa < 1)
            <div class="alert alert-warning alert-dismissible">
              <a href="{{ url('/kendaraan')}}">  <h3> <i class="material-icons-round"></i>Silahkan Tambah Kendaraan Persewaan Anda </h3></a>            
            </div>
        @else
            <div class="alert alert-success alert-dismissible">
              <h3> <i class="material-icons-round"></i> Kendaraan Persewaan Berhasil Tersimpan! </h3>
            </div>
            @if($detailsewa < 1)
              <div class="alert alert-warning alert-dismissible">
                <a href="{{ url('/bobot/persewaan')}}">  <h4> <i class="material-icons-round"></i>Silahkan Isi Bobot Kriteria Anda, Klik disini! </h4></a>            
              </div>
            @else
              <div class="alert alert-success alert-dismissible">
                <h3> <i class="material-icons-round"></i>Bobot Kriteria Persewaan Berhasil Tersimpan! </h3>
              </div>
            @endif
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