@extends('layouts.app', ['activePage' => 'persewaan', 'titlePage' => __('')])
@section("content")
<div class="content">
<div class="container-fluid">
<div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header card-header-primary">
                        <h3 class="card-title ">Daftar Persewaan Terverifikasi</h3>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-8">
                                <div class="form-group">
                                <label class="exampleFormControlInput1">Cari </label>
                                <input type="text" id="myCustomSearchBox" class="form-control pull-right" name="cari" required>
                                </div>
                            </div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <button class="btn btn-info dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Download Laporan
                            </button>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                            <a class="dropdown-item"  href="{{url('export/persewaan/terverifikasi')}}"> Laporan Excel</a>
                            <a class="dropdown-item" href="cetak_pdf/persewaan/terverifikasi" target="_blank"> Laporan PDF</a>
                            </div>
                            </div>

                            <div class="table-responsive">
                                <table class="table table-striped table-no-bordered table-hover dataTable dtr-inline" role="grid" aria-describedby="datatables_info" id="dataTable" width="100%" style="width:100px" cellspacing="0">
                                <thead >
                                        <tr>
                                        <th>No.</th>
                                        <th>Nama Persewaan</th>
                                        <th>No Telp</th>
                                        <th>Alamat</th>
                                        <th>Kota / Kabupaten</th>
                                        <th>Status</th>
                                        <th>Ubah Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    @foreach ($listpersewaan as $key=>$item)
                                    <tr>
                                        <td>{{$key+1}}</td>
                                        <td><a href="{{url('persewaan/'.$item->id)}}">{{$item->nama_persewaan}}</a></td>
                                        <td>{{$item->no_telp}}</td>
                                        <td>{{$item->alamat}}</td>
                                        <td>{{$item->kelurahans->kecamatans->kabupatens['nama_kabupaten']}}</td>
                                        <td>
                                        @if($item->status == 'aktif')
                                        <a class="badge badge-pill badge-warning" style="vertical-align:middle;"> Terverifikasi <i class="material-icons">verified</i></a>
                                        @else
                                        <a class="badge badge-pill badge-warning" style="vertical-align:middle;"> Belum Terverifikasi</a>
                                        @endif
                                        </td>

                                        <td>
                                        <a style="align:center" href="{{url('persewaan/'.$item->id.'/edit')}}"><i class="fa fa-edit fa-2x"></i></a>
                                        </td>                         
                                        <!-- <td>
                                        <form method="POST" action="{{ url('persewaan/'.$item->id) }}" id="form-hapus-{{ $item->id }}">
                                            {{ method_field("DELETE") }}
                                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                            <a href="#" class="button" data-id="{{$item->id}}"><i class="fa fa-trash fa-2x"></i></a>
                                            </form>
                                        </td> -->
                                    </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                                <script>
                                $(document).ready(function() {
                                    
                                        // $('#dataTable').dataTable();
                                        // $('#dataTable').dataTable({bSort: false, searching: false});
                                        dTable = $('#dataTable').DataTable({
                                            "ordering" : false,
                                            "dom": "lrtip",
                                            "info" : false
                                            //  to hide default searchbox but search feature is not disabled hence customised searchbox can be made.
                                        });
                                        
                                    $('#myCustomSearchBox').keyup(function() {
                                    dTable.search($(this).val()).draw(); // this  is for customized searchbox with datatable search feature.
                                })

                                });
                                </script>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</div>
</div>
@endsection
