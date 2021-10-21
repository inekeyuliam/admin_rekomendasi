@extends('layouts.app', ['activePage' => 'wisata', 'titlePage' => __('')])
@section("content")
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header card-header-primary">
                        <h3 class="card-title ">Daftar Wisata</h3>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-7">
                                <div class="form-group">
                                <label class="exampleFormControlInput1">Cari </label>
                                <input type="text" id="myCustomSearchBox" class="form-control pull-right" placeholder="Cari wisata"name="cari" required>
                                </div>
                            </div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <button class="btn btn-info dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Download Laporan
                            </button>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                            <a class="dropdown-item"  href="{{url('export/wisata')}}"> Laporan Excel</a>
                            <a class="dropdown-item" href="cetak_pdf/wisata" target="_blank"> Laporan PDF</a>
                            </div>
                            <div class="col-md-2">
                            <a class="btn btn-primary btn-md pull-right" href="{{url('wisata/create')}}">Tambah Wisata</a> 
                            </div>
                        
                            </div><br>
                            <table class="table table-striped table-no-bordered table-hover dataTable dtr-inline" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>No.</th>
                                        <th>Nama Wisata</th>
                                        <th>Jenis Wisata</th>
                                        <th>Kabupaten / Kota</th>
                                        <th>Action Edit</th>
                                        <th>Action Delete</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach ($listwisata as $key=>$item)
                                    <tr>
                                        <td>{{$key+1}}</td>
                                        <td><a href="{{url('wisata/'.$item->id)}}">{{$item->nama_wisata}}</a></td>
                                        <td>{{$item->tipe_wisatas->nama_tipe}}</td>
                                        <td>{{$item->kelurahans->kecamatans->kabupatens->nama_kabupaten}}</td>
                                        <td>
                                        <a href="{{url('wisata/'.$item->id.'/edit')}}"><i class="fa fa-edit fa-2x"></i></a>
                                        </td>                         
                                        <td>
                                        <form method="POST" action="{{ url('wisata/'.$item->id) }}" id="form-hapus-{{ $item->id }}">
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
                                        text: 'Data wisata ini terhubung dengan beberapa data lainnya, apabila dihapus maka seluruh data wisata ini akan terhapus!',
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
                                                'Data wisata berhasil dihapus!',
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


@endsection
