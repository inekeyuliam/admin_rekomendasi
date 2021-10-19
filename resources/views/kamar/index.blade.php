@extends('layouts.app', ['activePage' => 'kamar', 'titlePage' => __('')])
@section("content")
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header card-header-primary">
                        <h3 class="card-title ">Daftar Kamar</h3>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-8">
                                <div class="form-group">
                                <label class="exampleFormControlInput1">Cari </label>
                                <input type="text" id="myCustomSearchBox" class="form-control pull-right" placeholder="Cari kamar "name="cari" required>
                                </div>
                            </div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <div class="col-md-2">
                            <a class="btn btn-primary btn-md pull-right" href="{{url('kamar/create')}}"><i class="fa fa-plus" aria-hidden="true"></i> &nbsp;Tambah Kamar</a> 
                            </div>
                            </div>
                            <br>
                            <div class="table-responsive">
                                <table class="table table-striped table-no-bordered table-hover dataTable dtr-inline" role="grid" aria-describedby="datatables_info" id="dataTable" width="100%" style="width:100px" cellspacing="0">
                                <thead >
                                        <tr>
                                            <th>No.</th>
                                            <th>Jenis Kamar</th>
                                            <th>Harga Kamar</th>
                                            <th>Kapasitas</th>
                                            <!-- <th>Daftar Gambar</th> -->
                                            <th>Action Edit</th>
                                            <th>Action Delete</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    @foreach ($listkamar as $key=>$item)
                                        <tr>
                                            <td>{{$key+1}}</td>
                                            <td><a href="{{url('kamar/'.$item->id)}}">{{$item->nama_jenis_kamar}}</a></td>
                                            <td>{{number_format($item->biaya_permalam,2)}}</td>
                                            <td>{{$item->kapasitas}} Orang</td>
                                            <!-- <td> -->
                                            <!-- <a class ="btn btn-warning" href="{{ url('kamar/'.$item->id.'/gambarkamar') }}">Daftar Gambar Kamar</a> -->

                                            <!-- <a href='{{url("gambarkamar".$item->id)}}' class ="btn btn-info">  Daftar Gambar Kamar</a> -->
                                            <!-- </td> -->
                                            <td>
                                            <a href="{{url('kamar/'.$item->id.'/edit')}}"><i class="fa fa-edit fa-2x"></i></a>
                                            </td>                         
                                            <td>
                                            <form method="POST" action="{{ url('kamar/'.$item->id) }}" id="form-hapus-{{ $item->id }}">
                                                {{ method_field("DELETE") }}
                                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                <a href="#" class="button" data-id="{{$item->id}}"><i class="fa fa-trash fa-2x"></i></a>
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
                                        title: 'Peringatan!! <br>Anda Yakin Menghapus Data Ini?',
                                        text: 'Data kamar ini terhubung dengan gambar kamar, apabila dihapus maka data kamar dan gambar kamar akan terhapus!',
                                        icon: 'warning',
                                        showCancelButton: true,
                                        confirmButtonColor: '#3085d6',
                                        cancelButtonColor: '#d33',
                                        confirmButtonText: 'Hapus'
                                    }).then((result) => {
                                        if (result.value) {
                                            that.closest('form').submit();
                                            Swal.fire(

                                            'Berhasil Terhapus!',
                                                'Data kamar dan gambar kamar telah dihapus!',
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
