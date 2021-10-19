@extends('layouts.app', ['activePage' => 'persewaannonaktif', 'titlePage' => __('')])
@section("content")
<div class="content">
<div class="container-fluid">
<div class="row">
<!-- Page Heading -->
<!-- <h1 class="h3 mb-2 text-gray-800">Daftar Wisata</h1> -->
<!-- DataTales Example -->
<div class="col-md-12">
                <div class="card">
                    <div class="card-header card-header-primary">
                        <h3 class="card-title ">Daftar Permintaan Verifikasi Mitra Persewaan </h3>
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
                            <a class="dropdown-item"  href="{{url('export/persewaan/permintaan')}}"> Laporan Excel</a>
                            <a class="dropdown-item" href="cetak_pdf/persewaan/permintaan" target="_blank"> Laporan PDF</a>
                            </div>
                            </div>

                            <div class="table-responsive">
                                <table class="table table-striped table-no-bordered table-hover dataTable dtr-inline" role="grid" aria-describedby="datatables_info" id="dataTable" width="100%" style="width:100px" cellspacing="0">
                                <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>Nama Persewaan</th>
                                    <th>Tanggal Permintaan</th>
                                    <th>Kota / Kabupaten</th>
                                    <th>Action Verifikasi</th>
                                    <th>Action Tolak</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach ($listpersewaan as $key=>$item)
                                    <tr>
                                        <td>{{$key+1}}</td>
                                        <td><a href="{{url('hotel/'.$item->id)}}">{{$item->nama_persewaan}}</a></td>
                                        <td>{{$item->created_at->format('d-M-Y')}}</td>
                                        <td>{{$item->kelurahans->kecamatans->kabupatens['nama_kabupaten']}}</td>
                                        <td>
                                        <a class="btn btn-success btn-sm" id="verif" href="{{url('status/persewaan/'.$item->id)}}">Verifikasi</a> 
                                        </td>                         
                                        <td>
                                        <a class="btn btn-danger btn-sm" id="tolak" href="{{url('/alasan/tolak/persewaan/'.$item->id)}}">Tolak</a> 
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <script>
                                 jQuery.noConflict();
                            jQuery('#verif').on('click', function (e) {
                                var that = jQuery(this);
                                const url = $(this).attr('href');
                                e.preventDefault();
                                Swal.fire({
                                    title: 'Yakin Memverifikasi Persewaan Ini?',
                                    text: "Data ini tidak dapat dikembalikan lagi!",
                                    icon: 'warning',
                                    showCancelButton: true,
                                    confirmButtonColor: '#3085d6',
                                    cancelButtonColor: '#d33',
                                    confirmButtonText: 'Verifikasi'
                                }).then((result) => {
                                    if (result.value) {
                                        that.closest('form').submit();
                                        window.location.href = url;

                                        Swal.fire(
                                        'Terverifikasi!',
                                            'Persewaan berhasil diverifikasi!',
                                            'success'
                                        )
                                    }
                                })



                            });
                            jQuery('#tolak').on('click', function (e) {
                                var that = jQuery(this);
                                const url = $(this).attr('href');
                                e.preventDefault();
                                Swal.fire({
                                    title: 'Yakin Menolak Persewaan Ini?',
                                    text: "Data ini tidak dapat dikembalikan lagi!",
                                    icon: 'warning',
                                    showCancelButton: true,
                                    confirmButtonColor: '#3085d6',
                                    cancelButtonColor: '#d33',
                                    confirmButtonText: 'Tolak'
                                }).then((result) => {
                                    if (result.value) {
                                        that.closest('form').submit();
                                        window.location.href = url;

                                        // Swal.fire(
                                        // 'Mitra Hotel Ditolak!',
                                        //     'Hotel berhasil ditolak!',
                                        //     'success'
                                        // )
                                    }
                                })



                            });
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
