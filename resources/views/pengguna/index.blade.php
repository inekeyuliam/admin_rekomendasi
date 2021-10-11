@extends('layouts.app', ['activePage' => 'pengguna', 'titlePage' => __('')])
@section("content")
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header card-header-primary">
                        <h3 class="card-title ">Daftar Pengguna</h3>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-10">
                                <div class="form-group">
                                <label class="exampleFormControlInput1">Cari </label>
                                <input type="text" id="myCustomSearchBox" class="form-control pull-right" name="cari" required>
                                </div>
                            </div>
                            <div class="col-md-2">
                            <a class="btn btn-primary btn-md pull-right" href="{{url('pengguna/create')}}">Tambah Pengguna</a> 
                            </div>
                            </div>

                            <div class="table-responsive">
                                <table class="table table-striped table-no-bordered table-hover dataTable dtr-inline" role="grid" aria-describedby="datatables_info" id="dataTable" width="100%" style="width:100px" cellspacing="0">
                                <thead >
                                        <tr>
                                        <th>No.</th>
                                        <th>Nama Pengguna</th>
                                        <th>Tipe Pengguna</th>
                                        <th>Email</th>
                                        <th>Action Edit</th>
                                        <th>Action Delete</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    @foreach ($listuser as $key=>$item)
                                    <tr>
                                        <td>{{$key+1}}</td>
                                        <td>{{$item->name}}</td>
                                        <td>@if($item->tipe_admin == 'hotel') Mitra Hotel
                                        @elseif($item->tipe_admin == 'persewaan') Mitra Persewaan 
                                        @else($item->tipe_admin == 'superadmin') Superadmin
                                        @endif </td>
                                        <td>{{$item->email}}</td>

                                        <td>
                                        <a href="{{url('pengguna/'.$item->id.'/edit')}}"><i class="fa fa-edit"></i></a>
                                        </td>                         
                                        <td>
                                        <form method="POST" action="{{ url('pengguna/'.$item->id) }}" id="form-hapus-{{ $item->id }}">
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
