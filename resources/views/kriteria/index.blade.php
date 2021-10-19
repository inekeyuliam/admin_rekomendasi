@extends('layouts.app', ['activePage' => 'kriteria', 'titlePage' => __('')])
@section("content")
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
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
                                            <th>Action Ubah </th>
                                            <th>Action Hapus </th>

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
                                            <a href="{{url('kriteria/'.$item->id.'/edit')}}"><i class="fa fa-edit fa-2x"></i></a>
                                            </td>  
                                            @if ($item->id > 17)                       
                                            <td>
                                            <form method="POST" action="{{ url('kriteria/'.$item->id) }}" id="form-hapus-{{ $item->id }}">
                                                {{ method_field("DELETE") }}
                                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                <a href="#" class="button" data-id="{{$item->id}}"><i class="fa fa-trash fa-2x"></i></a>
                                                </form>
                                            </td>
                                            @else
                                            <td>
                                            <a class="badge badge-pill badge-warning"> - </a>

                                            </td>
                                            @endif
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
                                jQuery.noConflict();
                                jQuery('.button').on('click', function (e) {
                                    var that = jQuery(this)

                                    e.preventDefault();
                                    Swal.fire({
                                        title: 'Anda Yakin Ingin Menghapus?',
                                        text: "Data ini tidak dapat dikembalikan lagi!",
                                        icon: 'warning',
                                        showCancelButton: true,
                                        confirmButtonColor: '#3085d6',
                                        cancelButtonColor: '#d33',
                                        confirmButtonText: 'Hapus'
                                    }).then((result) => {
                                        if (result.value) {
                                            that.closest('form').submit();
                                            Swal.fire(

                                            'Terhapus!',
                                                'Data berhasil dihapus!',
                                                'success'
                                            )
                                        }
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
