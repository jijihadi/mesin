@extends('layouts.appNavbar')
@section('title','Perbaikan Mesin')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header text-center"> <strong>DATA PENGAJUAN PERBAIKAN MESIN PRODUKSI CV. SUMBER NIAGA</strong> </div>

                <div class="card-body">
                    <div class="row">
                    @if(Auth::user()->role=='operator')
                    <div class="col mb-3">
                        <a href="{{url('operator/formPerbaikan') }}" class="btn btn-primary btn-md "> <i class="fas fa-plus"></i> Tambah Perbaikan</a>

                    </div>
                    @endif
                    <div class="col-md-auto mb-3">

                        <form class="form-inline " method="GET" action="/teknisi/jadwalPerbaikan">
                        <div class="input-group">

                        <input type="date" name="tgl" id="tgl" class="form-control  mr-3" />

                        <select name="status" id="status" class="form-control mr-3 col-md-12 @error('status') is-invalid @enderror" value="{{old('status')}}}">
                            <option disable value="">Status</option>
                            <option value="Belum Diperbaiki">Belum Diperbaiki</option>
                            <option value="sedang Diperbaiki">Sedang Diperbaiki</option>
                            <option value="Selesai">Selesai</option>
                            </select>
                            <!-- <input class="form-control form-control-sm" type="search" placeholder="Search" aria-label="Search"> -->
                        
                        </div>
                        <div class="input-group-append">
                        
                            <button class="btn btn-primary btn-md " type="submit"><i class='fas fa-search'></i> Cari</button>
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
                        <!-- <th scope="col">Diajukan Oleh</th> -->
                        <th scope="col">Nama Mesin</th>
                        <th scope="col">Lokasi</th>
                        <th scope="col">Deskripsi Masalah</th>
                        <th scope="col">Tanggal Pengajuan</th>
                        <!-- <th scope="col">Perbaikan Yang Dilakukan</th> -->
                        <th scope="col">Hasil Perbaikan</th>
                        <th scope="col">Status</th>
                        <th scope="col">Aksi</th>
                        </tr>
                    </thead>

                    @foreach($perbaikans as $data)
                    <tbody>
                        <tr>
                        <th class="text-center" scope="row ">{{$loop->iteration +($perbaikans->perpage()* ($perbaikans->currentpage()-1))}}</th>
                       
                        <td>{{$data->mesin->nama_mesin}}</td>
                        <td>{{$data->mesin->lokasi}}</td>
                        <td>{{$data->deskripsi_masalah}}</td>
                        <td>{{$data->created_at}}</td>
                        <!-- <td>{{$data->dilakukan_perbaikan}}</td> -->
                        <td>{{$data->hasil}}</td>
                        <td class="text-center"> <p class="badge badge-warning" >{{$data->status}}</p> 
                        <!-- <button type="button" class="btn btn-warning btn-sm mb-1" data-toggle="modal" data-target="#bd-example-modal-{{$data->id}}">{{$data->status}}</button> -->
                        </td>
                        <td class="text-center">
                        @if(Auth::user()->role=='teknisi')
                        <a href="/teknisi/detailPerbaikan/{{$data->id_perbaikan}}" class="btn btn-primary btn-sm mb-1 "  title="Detail Perbaikan Mesin"> <i class="fas fa-eye"></i> </a>
                        <a href="/teknisi/formHasilPerbaikan/{{$data->id_perbaikan}}" style="color:white;" class="btn btn-warning btn-sm mb-1"  title="Hasil Perbaikan Mesin"> <i class="fas fa-tasks"></i> </a>
                        @endif

                        @if(Auth::user()->role=='operator')
                        <a href="/operator/formEditPerbaikan/{{$data->id_perbaikan}}" class="btn btn-success btn-sm mb-1"  title="Ubah Pengajuan Perbaikan Mesin"> <i class="fas fa-edit"></i> </a>
                        <!-- <button type="button" class="btn btn-success btn-sm mb-1" data-toggle="modal" data-target="#bd-example-modal-{{$data->id}}"><i class="fas fas fa-edit"></i></button> -->
                        @endif
                         
                        
                        <!-- <form action="" method="post" class="d-inline">
                            @method('delete')
                            @csrf
                            <button type="submit" class="btn btn-danger btn-sm mb-1" onclick="return confirm('Yakin Ingin Menghapus Data Ini?')"> <i class="fas fas fa-trash-alt"></i></button>
                        </form> -->
                        </td>
                        </tr>
                        
                    </tbody>
                    @endforeach
                    </table>
                    {{$perbaikans->links()}}
                </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
