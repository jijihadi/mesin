@extends('layouts.appNavbar')
@section('title','Jadwal Pemeliharaan Mesin')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Jadwal Pemeliharaan Mesin</div>

                <div class="card-body">
                    <!-- @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif -->

                    <div class="row">
                    <div class="col mb-3">
                        <a href="#" class="btn btn-primary btn-sm "> <i class="fas fa-plus"></i> Tambah Jadwal</a>

                    </div>
                    <div class="col-md-auto mb-3">

                        <form class="form-inline " method="GET" action="#">
                        <div class="input-group">
                            <input class="form-control form-control-sm" type="search" placeholder="Search" aria-label="Search">
                        
                        </div>
                        <div class="input-group-append">
                        
                            <button class="btn btn-primary btn-sm " type="submit"><i class='fas fa-search'></i> Search</button>
                        </div>
                        </form>
                    </div>
                    </div>
                    
                  
              
                <div class="table-responsive">
                    <table class="table table-bordered  ">
                    <thead class="bg-info text-center">
                        <tr>
                        <th scope="col">No</th>
                        <th scope="col">Tanggal</th>
                        <th scope="col">Nama Mesin</th>
                        <th scope="col">Point Check</th>
                        <th scope="col">Tanggal Jadwal</th>
                        <th scope="col">Status</th>
                        <th scope="col">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                        <th class="text-center" scope="row ">1</th>
                        <td>Mark</td>
                        <td>Otto</td>
                        <td>@mdo</td>
                        <td>@mdo</td>
                        <td class="text-center">@mdo</td>
                        <td class="text-center">
                        <form action="#" method="post" class="d-inline">
                            @method('delete')
                            @csrf
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Yakin Ingin Menghapus Data Ini?')"> <i class="fas fas fa-trash-alt"></i></button>
                        </form>
                        <form action="#" method="post" class="d-inline">
                            @method('delete')
                            @csrf
                            <button type="submit" class="btn btn-success btn-sm" > <i class="fas fas fa-edit"></i></button>
                        </form>
                        </td>
                        </tr>
                        <tr>
                        <th class="text-center" scope="row">2</th>
                        <td>Jacob</td>
                        <td>Thornton</td>
                        <td>@fat</td>
                        <td>@fat</td>
                        <td class="text-center">@fat</td>
                        <td class="text-center">
                        <form action="#" method="post" class="d-inline">
                            @method('delete')
                            @csrf
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Yakin Ingin Menghapus Data Ini?')"> <i class="fas fas fa-trash-alt"></i></button>
                        </form>
                        <form action="#" method="post" class="d-inline">
                            @method('delete')
                            @csrf
                            <button type="submit" class="btn btn-success btn-sm" > <i class="fas fas fa-edit"></i></button>
                        </form>
                        </td>
                        </tr>
                        <tr>
                        <th class="text-center" scope="row">3</th>
                        <td >Larry the Bird</td>
                        <td >Larry the Bird</td>
                        <td>@twitter</td>
                        <td>@twitter</td>
                        <td class="text-center">@twitter</td>
                        <td class="text-center">
                        <form action="#" method="post" class="d-inline">
                            @method('delete')
                            @csrf
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Yakin Ingin Menghapus Data Ini?')"> <i class="fas fas fa-trash-alt"></i></button>
                        </form>
                        <form action="#" method="post" class="d-inline">
                            @method('delete')
                            @csrf
                            <button type="submit" class="btn btn-success btn-sm" > <i class="fas fas fa-edit"></i></button>
                        </form>
                        </td>
                        </tr>
                    </tbody>
                    </table>
                </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
