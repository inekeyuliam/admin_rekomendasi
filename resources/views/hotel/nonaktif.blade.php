@extends('layouts.app', ['activePage' => 'hotelnonaktif', 'titlePage' => __('')])
@section("content")
<div class="content">
<div class="container-fluid">
<div class="row">
<!-- Page Heading -->
<!-- <h1 class="h3 mb-2 text-gray-800">Daftar Wisata</h1> -->
<!-- DataTales Example -->
<div class="col-md-10">
                <div class="card">
                    <div class="card-header card-header-primary">
                        <h3 class="card-title ">Daftar Permintaan Verifikasi Mitra Hotel </h3>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-10">
                                <div class="form-group">
                                <label class="bmd-label-floating">Cari </label>
                                <input type="text" id="myCustomSearchBox" class="form-control pull-right" name="cari" required>
                                </div>
                            </div>
                            <div class="col-md-2">
                            <!-- <a class="btn btn-primary btn-md pull-right" href="{{url('pengguna/create')}}">Tambah Hotel</a>  -->
                            </div>
                            </div>

                            <div class="table-responsive">
                                <table class="table table-striped table-no-bordered table-hover dataTable dtr-inline" role="grid" aria-describedby="datatables_info" id="dataTable" width="100%" style="width:100px" cellspacing="0">
                                <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>Nama Hotel</th>
                                    <th>Tanggal Pengajuan</th>
                                    <th>Action Verifikasi</th>
                                    <th>Action Tolak</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach ($listhotel as $key=>$item)
                                    <tr>
                                        <td>{{$key+1}}</td>
                                        <td><a href="{{url('hotel/'.$item->id)}}">{{$item->nama_hotel}}</a></td>
                                        <td>{{$item->created_at->format('d-M-Y')}}</td>
                                        <td>
                                        <a class="btn btn-success btn-sm" href="{{url('status/hotel/'.$item->id)}}">Verifikasi</a> 
                                        </td>                         
                                        <td>
                                        <a class="btn btn-danger btn-sm" href="{{url('hotel/create')}}">Tolak</a> 

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
