@extends('layouts.appNavbar')

@section('title','Data User')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header text-center"> <strong>DATA JABATAN PEGAWAI CV. SUMBER NIAGA</strong> </div>

                <div class="card-body">
                    <a href="{{ url('admin/tambahJabatan') }}" class="btn btn-primary btn-sm mb-2 "> <i class="fas fa-plus"></i> Tambah Jabatan</a>
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
                        <th scope="col">Jabatan</th>
                        <th scope="col">Aksi</th>
                        </tr>
                    </thead>
                    @foreach($jabatans as $jabatan)
                    <tbody>
                        <tr>
                        <th class="text-center" scope="row ">{{$loop->iteration}}</th>
                        <td>{{$jabatan->nama_jabatan}}</td>
                        <td class="text-center">
                        
                        
                            <a href="/admin/{{$jabatan->id_jabatan}}/ubahJabatan" class="btn btn-success btn-sm mb-1 " title="Ubah Data Jabatan"> <i class="fas fa-edit"></i></a>
                        
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
