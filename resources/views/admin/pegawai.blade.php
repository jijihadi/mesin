@extends('layouts.appNavbar')

@section('title','DATA PEGAWAI CV. SUMBER NIAGA')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header text-center"> <strong>DATA PEGAWAI CV. SUMBER NIAGA</strong> </div>
                <div class="card-body">
                    
                    <div class="row">
                <div class="col mb-3">
                   
                    <a href="{{ url('admin/tambahPegawai') }}" class="btn btn-primary btn-sm mb-2 "> <i class="fas fa-plus"></i> Tambah Pegawai</a>
                    
                    </div>
                    <div class="col-md-auto mb-3">

                    <form class="form-inline " method="GET" action="/admin/pegawai/cari">
                    <input class="form-control form-control-sm" name="cari" type="search" placeholder="Cari" aria-label="Cari" value="{{old('cari')}}">
                    <div class="input-group-append">
                            
                                <button class="btn btn-primary btn-sm " value='cari' type="submit"><i class='fas fa-search'></i> Cari</button>
                           
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
                        <th scope="col">ID Pegawai</th>
                        <th scope="col">Nama</th>
                        <th scope="col">Jabatan</th>
                        <th scope="col">No Telp</th>
                        <th scope="col">Alamat</th>
                        <th scope="col">Status</th>
                        <th scope="col">Aksi</th>
                        </tr>
                    </thead>
                    @foreach($pegawais as $pegawai)
                    <tbody>
                        <tr>
                        <th class="text-center" scope="row ">{{$loop->iteration}}</th>
                        <td>{{$pegawai->id_pegawai}}</td>
                        <td>{{$pegawai->nama}}</td>
                        <td>{{$pegawai->jabatan->nama_jabatan}}</td>
                        <td>{{$pegawai->no_telp}}</td>
                        <td>{{$pegawai->alamat}}</td>
                        <td>{{$pegawai->status_pegawai}}</td>
                        <td class="text-center">
                        
                        
                        <a href="/admin/{{$pegawai->id_pegawai}}/ubahDataPegawai" class="btn btn-success btn-sm mb-1 " title="Ubah Data Pegawai"> <i class="fas fa-edit"></i></a>
                            
                        
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



@endsection
