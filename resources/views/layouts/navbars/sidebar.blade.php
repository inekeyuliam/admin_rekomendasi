<div class="sidebar" data-color="purple" data-background-color="white" data-image="{{ url('/') }}/assets/img/sidebar-1.jpg">
  <!--
      Tip 1: You can change the color of the sidebar using: data-color="purple | azure | green | orange | danger"

      Tip 2: you can also add an image using data-image tag
  -->
  <div class="logo">
    <a href="https://creative-tim.com/" class="simple-text logo-normal">
      @if(Auth::user()->tipe_admin == 'superadmin')
      {{ __('SISTEM ADMINISTRATOR') }}
      @endif
      @if(Auth::user()->tipe_admin == 'hotel')
      {{ __('MITRA HOTEL') }}<br>
      @endif
      @if(Auth::user()->tipe_admin == 'persewaan')
      {{ __('MITRA PERSEWAAN ') }}<br>
      @endif
    </a>
  </div>
  <div class="sidebar-wrapper">
    <ul class="nav">
    @if(Auth::user()->tipe_admin == 'superadmin')

      <li class="nav-item{{ $activePage == 'dashboard' ? ' active' : '' }}">
        <a class="nav-link" href="{{ route('home') }}">
          <i class="material-icons">dashboard</i>
            <p>{{ __('Dashboard Wisata') }}</p>
        </a>
      </li>
      <!-- <li class="nav-item{{ $activePage == 'pengguna' ? ' active' : '' }}">
        <a class="nav-link" href="{{ url('pengguna')}}">
          <i class="material-icons">person</i>
            <p>{{ __('Daftar Pengguna') }}</p>
        </a>
      </li> -->
      <li class="nav-item{{ $activePage == 'kriteria' ? ' active' : '' }}">
        <a class="nav-link" href="{{ url('kriteria')}}">
          <i class="material-icons">queue</i>
            <p>{{ __('Daftar Kriteria') }}</p>
        </a>
      </li>
      <!-- <li class="nav-item{{ $activePage == 'detailkriteria' ? ' active' : '' }}">
        <a class="nav-link" href="{{ url('detailkriteria')}}">
          <i class="material-icons">format_list_bulleted</i>
            <p>{{ __('Daftar Detail Kriteria') }}</p>
        </a>
      </li> -->
      <li class="nav-item{{ $activePage == 'tipewisata' ? ' active' : '' }}">
        <a class="nav-link" href="{{ url('tipewisata')}}">
        <i class="material-icons">card_travel</i> 
        <p>{{ __('Tipe Wisata') }}</p>
        </a>
      </li>
      <li class="nav-item{{ $activePage == 'wisata' ? ' active' : '' }}">
        <a class="nav-link" href="{{ url('wisata')}}">
          <i class="material-icons">place</i>
          <p>{{ __('Daftar Wisata') }}</p>
        </a>
      </li>
      <li class="nav-item{{ $activePage == 'jeniskamar' ? ' active' : '' }}">
        <a class="nav-link" href="{{ url('jeniskamar')}}">
        <i class="material-icons">room_preferences</i> 
        <p>{{ __('Jenis Kamar Hotel') }}</p>
        </a>
      </li>
      <!-- <li class="nav-item{{ $activePage == 'merk' ? ' active' : '' }}">
        <a class="nav-link" href="{{ url('merkkendaraan')}}">
        <i class="material-icons">commute</i> 
        <p>{{ __('Merk Kendaraan') }}</p>
        </a>
      </li> -->
      <li class="nav-item{{ $activePage == 'modelkendaraan' ? ' active' : '' }}">
        <a class="nav-link" href="{{ url('modelkendaraan')}}">
        <i class="material-icons">commute</i> 
        <p>{{ __('Model Kendaraan') }}</p>
        </a>
      </li>
      <li class="nav-item {{ ($activePage == 'hotel' || $activePage == 'persewaan') ? ' active' : '' }}">
        <a class="nav-link" data-toggle="collapse" href="#terverifikasi" aria-expanded="true">
          <i class="material-icons">verified</i>
          <p>{{ __('Mitra Terverifikasi') }}
            <b class="caret"></b>
          </p>
        </a>
        <div class="collapse show" id="terverifikasi">
          <ul class="nav">
            <li class="nav-item{{ $activePage == 'hotel' ? ' active' : '' }}">
              <a class="nav-link" href="{{ url('hotel')}}">
                <span class="sidebar-normal">{{ __('Daftar Mitra Hotel') }} </span>
              </a>
            </li>
            <li class="nav-item{{ $activePage == 'persewaan' ? ' active' : '' }}">
              <a class="nav-link" href="{{ url('persewaan')}}">
                <span class="sidebar-normal"> {{ __('Daftar Mitra Persewaan') }} </span>
              </a>
            </li>
           
          </ul>
        </div>
      </li>
  
      <li class="nav-item {{ ($activePage == 'hotelnonaktif' || $activePage == 'persewaannonaktif') ? ' active' : '' }}">
        <a class="nav-link" data-toggle="collapse" href="#transaksi" aria-expanded="true">
          <i class="material-icons">list_alt</i>
          <p>{{ __('Permintaan Verifikasi') }}
            <b class="caret"></b>
          </p>
        </a>
        <div class="collapse show" id="transaksi">
          <ul class="nav">
            <li class="nav-item{{ $activePage == 'hotelnonaktif' ? ' active' : '' }}">
              <a class="nav-link" href="{{ url('/pengajuan/hotel')}}">
                <span class="sidebar-normal">{{ __('Permintaan Hotel') }} </span>
              </a>
            </li>
            <li class="nav-item{{ $activePage == 'persewaannonaktif' ? ' active' : '' }}">
              <a class="nav-link" href="{{ url('/pengajuan/persewaan')}}">
                <span class="sidebar-normal"> {{ __('Permintaan Persewaan') }} </span>
              </a>
            </li>
          </ul>
        </div>
      </li>
    
      @endif
      @if(Auth::user()->tipe_admin == 'hotel')
      <li class="nav-item{{ $activePage == 'dashboardhotel' ? ' active' : '' }}">
        <a class="nav-link" href="{{ url('home/hotel') }}">
          <i class="material-icons">house</i>
            <p>{{ __('Home Mitra Hotel') }}</p>
        </a>
      </li>
     
      @endif
      @if(Auth::user()->tipe_admin == 'persewaan')
      <li class="nav-item{{ $activePage == 'dashboardsewa' ? ' active' : '' }}">
        <a class="nav-link" href="{{ url('home/persewaan') }}">
          <i class="material-icons">dashboard</i>
            <p>{{ __('Dashboard Persewaan') }}</p>
        </a>
      </li>
      <li class="nav-item{{ $activePage == 'persewaan' ? ' active' : '' }}">
        <a class="nav-link" href="{{ url('persewaan/create')}}">
        <i class="material-icons">task</i>
        <p>{{ __('Ajukan Permintaan') }}</p>
        </a>
      </li>
      <li class="nav-item{{ $activePage == 'lihatpersewaan' ? ' active' : '' }}">
        <a class="nav-link" href="{{ url('lihat/persewaan')}}">
        <i class="material-icons">emoji_transportation</i>
        <p>{{ __('Data Persewaan') }}</p>
        </a>
      </li>
      <li class="nav-item{{ $activePage == 'kendaraan' ? ' active' : '' }}">
        <a class="nav-link" href="{{ url('kendaraan')}}">
        <i class="material-icons">car_rental</i>
        <p>{{ __('Daftar Kendaraan') }}</p>
        </a>
      </li>
      <li class="nav-item{{ $activePage == 'lihatbobotpersewaan' ? ' active' : '' }}">
        <a class="nav-link" href="{{ url('lihatbobot/persewaan')}}">
        <i class="material-icons">holiday_village</i>
        <p>{{ __('Data Bobot Kriteria') }}</p>
        </a>
      </li>
      @endif
      <!-- <li class="nav-item {{ ($activePage == 'peminjaman' || $activePage == 'pengembalian' || $activePage == 'denda') ? ' active' : '' }}">
        <a class="nav-link" data-toggle="collapse" href="#transaksi" aria-expanded="true">
          <i class="material-icons">receipt_long</i>
          <p>{{ __('Master Transaksi') }}
            <b class="caret"></b>
          </p>
        </a>
        <div class="collapse show" id="transaksi">
          <ul class="nav">
            <li class="nav-item{{ $activePage == 'peminjaman' ? ' active' : '' }}">
              <a class="nav-link" href="{{ url('pinjam')}}">
              <i class="material-icons">assignment</i>
                <span class="sidebar-normal">{{ __('Daftar Peminjaman') }} </span>
              </a>
            </li>
            <li class="nav-item{{ $activePage == 'pengembalian' ? ' active' : '' }}">
              <a class="nav-link" href="{{ url('kembali')}}">
              <i class="material-icons">assignment</i>
                <span class="sidebar-normal"> {{ __('Daftar Pengembalian') }} </span>
              </a>
            </li>
            <li class="nav-item{{ $activePage == 'denda' ? ' active' : '' }}">
              <a class="nav-link" href="{{ url('denda')}}">
              <i class="material-icons">account_balance_wallet</i>
                <span class="sidebar-normal"> {{ __('Daftar Denda') }} </span>
              </a>
            </li>
          </ul>
        </div>
      </li> -->
    </ul>
  </div>
</div>
