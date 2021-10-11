@extends('layouts.app', ['activePage' => 'hotel', 'titlePage' => __('')])
@section("content")
<div class="content">
<div class="container-fluid">
<div class="row">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header card-header-primary">
                        <h3 class="card-title ">Daftar Hotel Terverifikasi</h3>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-10">
                                <div class="form-group">
                                <label class="exampleFormControlInput1">Cari </label>
                                <input type="text" id="myCustomSearchBox" class="form-control pull-right" name="cari" required>
                                </div>
                            </div>
                            <button class="btn btn-info dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Download Laporan
                            </button>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                            <a class="dropdown-item"  href="{{url('export/hotel/terverifikasi')}}"> Laporan Excel</a>
                            <a class="dropdown-item" href="cetak_pdf/hotel/terverifikasi" target="_blank"> Laporan PDF</a>
                            </div>
                       
                            </div>

                            <div class="table-responsive">
                                <table class="table table-striped table-no-bordered table-hover dataTable dtr-inline" role="grid" aria-describedby="datatables_info" id="dataTable" width="100%" style="width:100px" cellspacing="0">
                                <thead >
                                        <tr>
                                        <th>No.</th>
                                        <th>Nama Hotel</th>
                                        <th>No Telp</th>
                                        <th>Alamat</th>
                                        <th>Status</th>
                                        <th>Action Edit</th>
                                        <th>Action Delete</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    @foreach ($listhotel as $key=>$item)
                                    <tr>
                                        <td>{{$key+1}}</td>
                                        <td><a href="{{url('hotel/'.$item->id)}}">{{$item->nama_hotel}}</a></td>
                                        <td>{{$item->no_telp}}</td>
                                        <td>{{$item->alamat}}</td>
                                        <td>@if($item->status == 'aktif')
                                        <a class="badge badge-pill badge-warning"> Terverifikasi <i class="material-icons">verified</i></a>
                                        @else
                                        <a class="badge badge-pill badge-warning"> Belum Terverifikasi</a>
                                        @endif
                                        </td>
                                        <td>
                                        <a href="{{url('hotel/'.$item->id.'/edit')}}"><i class="fa fa-edit"></i></a>
                                        </td>                         
                                        <td>
                                        <form method="POST" action="{{ url('hotel/'.$item->id) }}" id="form-hapus-{{ $item->id }}">
                                            {{ method_field("DELETE") }}
                                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                            <a href="#" class="button" data-id="{{$item->id}}"><i class="fa fa-trash"></i></a>
                                            </form>
                                        </td>
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
