<!DOCTYPE html>
<html>
<head>
    <title>Laporan Daftar Mitra Hotel di Jawa Timur</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
	
	<center>
		<h5>Laporan Daftar Mitra Hotel di Jawa Timur</h5>
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
                        Nama Hotel
                        </th>
                        <th>
                        Alamat
                        </th>
                        <th>
                        Status
                        </th>                       
                        <th>
                        Rating
                        </th>
                       </tr>
                      </thead>
                      <tbody>
                        @php $i=1 @endphp
                        @foreach($listhotel as $key=>$item)
                        <tr>
                        <td>
                              {{$i++}}
                        </td>
                          <td>
                              {{$item->nama_hotel}}
                          </td>
                          <td>
                              {{$item->alamat}}
                          </td>
                          <td> 
                              {{$item->status}}
                          </td>
                        
                          <td >
                              {{$item->rating}}
                          </td>
                        </tr>
                        @endforeach
                      </tbody>
                    </table>
</body>
</body>
</html>
