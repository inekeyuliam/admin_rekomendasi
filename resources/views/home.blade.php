@extends('layouts.app', ['activePage' => 'dashboard', 'titlePage' => __('Dashboard')])

@section('content')
  <div class="content">
    <div class="container-fluid">
    @if(Auth::user()->tipe_admin != 'superadmin')

    <div class="alert alert-danger alert-dismissible">
        <h3> <i class="material-icons-round"></i>Silahkan Isi Form Pengajuan Mitra Hotel Pada Menu 'Ajukan Permintaan' atau <a href="{{url('hotel/create')}}">Klik Disini</a>  </h3>
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