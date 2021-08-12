
@extends('layouts.app', ['activePage' => 'pengguna', 'titlePage' => __('')])
@section("content")
<div class="content">
<div class="container-fluid">
        <div class="col-md-6">
            <div class="card">
              <div class="card-header card-header-primary">
                  <h4 class="card-title">Edit Data Pengguna</h4>
                </div>
                <div class="card-body">
                    <form class="mt-2" action='{{url("pengguna/".$user->id)}}' method="post">{{ method_field("PUT")}}
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <div class="row">
                        <div class="col-md-5">
                        <div class="form-group">
                            <label for="exampleFormControlInput1">Nama Pengguna</label>
                            <input class="form-control" type="text" name="nama" value="{{$user->name}}"  >
                        </div>
                        </div>
                        <div class="col-md-5">
                        <div class="form-group">
                            <label for="exampleFormControlInput1">Email Pengguna</label>
                            <input class="form-control" type="text" name="email" value="{{$user->email}}"  >
                        </div>
                        </div>
                    </div>

                        <div class="form-group">
                            <button class="btn btn-primary" type="submit">Simpan</button>
                        </div>
                            
                    </form>
            </div>
        </div>
    </div>
</div>
</div>
</div>
</div>


@endsection