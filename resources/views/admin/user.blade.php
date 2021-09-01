@extends('layouts.appNavbar')

@section('title','Data User')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header text-center"> <strong> DATA USER</strong></div>

                <div class="card-body">
                <div class="row">
                <div class="col mb-3">
                    <a href="{{ url('admin/tambahUser') }}" class="btn btn-primary btn-sm mb-2 "> <i class="fas fa-plus"></i> Tambah User</a>
                    
                    </div>
                    <div class="col-md-auto mb-3">

                    <form class="form-inline " method="GET" action="/admin/user/cari">
                    <input class="form-control form-control-sm" name="cari" type="search" placeholder="Cari" aria-label="Cari" value="{{old('cari')}}">
                    <div class="input-group-append">
                            
                                <button class="btn btn-primary btn-sm " value="cari" type="submit"><i class='fas fa-search'></i> Cari</button>
                           
                         </div>
                         </form>
                    </div>
                    </div>
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    @if (session('delete'))
                        <div class="alert alert-danger" role="alert">
                            {{ session('delete') }}
                        </div>
                    @endif

                <div class="table-responsive">
                    <table class="table table-bordered  ">
                    <thead class="bg-info text-center">
                        <tr>
                        <th scope="col">No</th>
                        <th scope="col">Nama</th>
                        <th scope="col">Username</th>
                        <th scope="col">Email</th>
                        <th scope="col">No Telp</th>
                        <th scope="col">Alamat</th>
                        <th scope="col">Level</th>
                        <th scope="col">Aksi</th>
                        </tr>
                    </thead>
                    @foreach($users as $user)
                    <tbody>
                        <tr>
                        <th class="text-center" scope="row ">{{$loop->iteration}}</th>
                        <td>{{$user->pegawai->nama}}</td>
                        <td>{{$user->username}}</td>
                        <td>{{$user->email}}</td>
                        <td>{{$user->pegawai->no_telp}}</td>
                        <td>{{$user->pegawai->alamat}}</td>
                        <td>{{$user->role}}</td>
                        <td class="text-center">
                        <a href="/admin/{{$user->id}}/ubahDataUser" class="btn btn-success btn-sm mb-1 " title="Ubah Data User"> <i class="fas fa-edit"></i></a>
                            
                        
                        <!-- <form action="{{url('/admin/user/'.$user->id)}}" method="post" class="d-inline">
                            @method('delete')
                            @csrf
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Yakin Ingin Menghapus Data Ini?')"> <i class="fas fas fa-trash-alt"></i></button>
                        </form> -->
                        </td>
                        </tr>
                        @endforeach
                       
                    </tbody>
                    </table>
                </div>
                </div>
            </div>
        </div>
    </div>


<!-- Modal Edit Data User -->
@foreach($users as $user)
    <div class="modal fade " id="bd-example-modal-{{$user->id}}" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog " role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Ubah Data User</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            
        <form class="form" method= "post" action="{{url('/admin/edit/'.$user->id)}}" enctype="multipart/form-data">
                        @csrf
                            <div class="form-group col-md-12">
                                <label for="nama">Nama</label>
                                <input type="text" class="form-control @error('nama') is-invalid @enderror" id="nama" name="nama"  value="{{$user->name}}">
                                    @error('nama')
                                    <div class="invalid-feedback">{{$message}}
                                    </div>
                                    @enderror
                            </div>

                            <div class="form-group col-md-12">
                                <label for="email">Email</label>
                                <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email"  value="{{$user->email}}">
                                    @error('email')
                                    <div class="invalid-feedback">{{$message}}
                                    </div>
                                    @enderror
                            </div>
                            <!-- <div class="form-group col-md-12">
                                <label for="password">Password</label>
                                <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password" value="{{$user->password}}}">
                                    @error('password')
                                    <div class="invalid-feedback">{{$message}}
                                    </div>
                                    @enderror
                            </div> -->
                            <!-- <div class="form-group col-md-12">
                                <label for="password-confirm">Confirm Password</label>
                                <input type="password" class="form-control @error('password-confirm') is-invalid @enderror" id="password-confirm" name="password_confirm" required>
                                    @error('password-confirm')
                                    <div class="invalid-feedback">{{$message}}
                                    </div>
                                    @enderror
                            </div> -->
                            <div class="form-group col-md-12">
                                <label for="level">Level</label>
                                <select name="level" id="level" class="form-control col-md-12 @error('level') is-invalid @enderror" value="{{$user->role}}}">
                                <option disable value="{{$user->role}}"> {{$user->role}}</option>
                                <option value="admin">Admin</option>
                                <option value="teknisi">Teknisi</option>
                                <option value="operator">Operator</option>
                                <option value="manager">Manager</option>
                                </select>
                                    @error('level')
                                    <div class="invalid-feedback">{{$message}}
                                    </div>
                                    @enderror
                            </div>
    
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Simpan Data</button>
                        </div>
                        </form>

        </div>
        </div>
    </div>
    </div>
    @endforeach
</div>
@endsection
