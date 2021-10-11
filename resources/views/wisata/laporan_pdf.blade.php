<!DOCTYPE html>
<html>
<head>
    <title>Laporan Daftar Wisata di Jawa Timur</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
	
	<center>
		<h5>Laporan Daftar Wisata di Jawa Timur</h5>
        <h6>Tanggal {{ date('d-m-Y', strtotime(Carbon\Carbon::today()->toDateString())) }}</h6>
        <br>
        <br>
	</center>
                    <table class="table table-bordered">
                      <thead>
                       <tr>
                       <th>
                          No
                        </th>
                        <th>
                          Nama Wisata
                        </th>
                        <th>
                          Alamat 
                        </th>
                        <th>
                          Rating
                        </th>
                         <th>
                         Jam Buka
                        </th>
                        <th>
                        Jam Tutup
                        </th>
                       </tr>
                      </thead>
                      <tbody>
                        @php $i=1 @endphp
                        @foreach($listwis as $key=>$item)
                        <tr>
                        <td>
                              {{$i++}}
                        </td>
                          <td>
                              {{$item->nama_wisata}}
                          </td>
                          <td>
                              {{$item->alamat}}
                          </td>
                          <td> 
                              {{$item->rating}}
                          </td>
                         
                          <td >
                              {{$item->jam_buka}}
                          </td>
                          <td >
                              {{$item->jam_tutup}}
                          </td>
                          
                        </tr>
                        @endforeach
                      </tbody>
                    </table>
</body>
</html>
