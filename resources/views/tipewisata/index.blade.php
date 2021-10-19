@extends('layouts.app', ['activePage' => 'tipewisata', 'titlePage' => __('')])
@section("content")
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header card-header-primary">
                        <h3 class="card-title ">Daftar Tipe Wisata</h3>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-8">
                                <div class="form-group">
                                <label class="exampleFormControlInput1">Cari </label>
                                <input type="text" id="myCustomSearchBox" class="form-control pull-right" name="cari" required>
                                </div>
                            </div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <div class="col-md-2">
                            <a class="btn btn-primary btn-md pull-right" href="{{url('tipewisata/create')}}">Tambah Tipe Wisata</a> 
                            </div>
                            </div>

                            <div class="table-responsive">
                                <table class="table table-striped table-no-bordered table-hover dataTable dtr-inline" role="grid" aria-describedby="datatables_info" id="dataTable" width="100%" style="width:100px" cellspacing="0">
                                <thead >
                                        <tr>
                                        <th>No.</th>
                                        <th>Tipe Wisata</th>
                                        <th>Action Edit</th>
                                        <th>Action Delete</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    @foreach ($listtipe as $key=>$item)
                                    <tr>
                                        <td>{{$key+1}}</td>
                                        <td>{{$item->nama_tipe}}</td>
                                        <td>
                                        <a href="{{url('tipewisata/'.$item->id.'/edit')}}"><i class="fa fa-edit fa-2x"></i></a>
                                        </td>                         
                                        <td>
                                        <form method="POST" action="{{ url('tipewisata/'.$item->id) }}" id="form-hapus-{{ $item->id }}">
                                        {{ method_field("DELETE") }}
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <a href="#" class="button" data-id="{{$item->id}}"><span class="material-icons">delete</span></a>
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
