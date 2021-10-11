@extends('layouts.app', ['activePage' => 'kriteria', 'titlePage' => __('')])
@section("content")
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header card-header-primary">
                        <h3 class="card-title ">Daftar Kriteria</h3>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-8">
                                <div class="form-group">
                                <label class="exampleFormControlInput1">Cari </label>
                                <input type="text" id="myCustomSearchBox" class="form-control pull-right" name="cari" required>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <a class="btn btn-dark btn-md pull-right" href="{{url('detailkriteria')}}">Detail Kriteria</a> 
                            </div>
                            <div class="col-md-2">
                                <a class="btn btn-primary btn-md pull-right" href="{{url('kriteria/create')}}">Tambah Kriteria</a> 
                            </div>
                            </div>
                            <div class="table-responsive">
                                <table class="table table-striped table-no-bordered table-hover dataTable dtr-inline" role="grid" aria-describedby="datatables_info" id="dataTable" width="100%" style="width:100px" cellspacing="0">
                                <thead >
                                        <tr>
                                            <th>No.</th>
                                            <th>Nama Kriteria</th>
                                            <th>Jenis Kriteria</th>
                                            <th>Tipe Kriteria</th>
                                            <th>Action Edit</th>
                                            <th>Action Delete</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    @foreach ($listkriteria as $key=>$item)
                                        <tr>
                                            <td>{{$key+1}}</td>
                                            <td>{{$item->kriteria}}</td>
                                            <td>{{$item->jenis_kriterias->nama_jenis}}</td>
                                            <td>{{$item->tipe_kriteria}}</td>
                                            <td>
                                            <a href="{{url('kriteria/'.$item->id.'/edit')}}"><i class="fa fa-edit"></i></a>
                                            </td>                         
                                            <td>
                                            <form method="POST" action="{{ url('kriteria/'.$item->id) }}" id="form-hapus-{{ $item->id }}">
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
                                    dTable = $('#dataTable').DataTable({
                                            "ordering" : false,
                                            "dom": "lrtip",
                                            "info" : false
                                    });
                                    $('#myCustomSearchBox').keyup(function() {
                                        dTable.search($(this).val()).draw(); 
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
