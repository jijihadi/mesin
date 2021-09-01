@extends('layouts.appNavbar')
@section('title','Data Mesin')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header text-center"> <strong>DATA MESIN PROSES PRODUKSI CV. SUMBER NIAGA</strong> </div>

                <div class="card-body">
                    <div class="row">
                <div class="col mb-3">
                   
                    <a href="{{ url('admin/tambahMesin') }}" class="btn btn-primary btn-sm mb-2 "> <i class="fas fa-plus"></i> Tambah Mesin</a>
                    
                    </div>
                    <div class="col-md-auto mb-3">

                    <form class="form-inline " method="GET" action="/admin/mesin/cari">
                    <input class="form-control form-control-sm" name="cari" type="search" placeholder="Cari" aria-label="Cari">
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
                        <th scope="col">Nama Mesin</th>
                        <th scope="col">Lokasi</th>
                        <!-- <th scope="col">Merk Mesin</th> -->
                        <th scope="col">Kapasitas</th>
                        <th scope="col">Tanggal Pembelian</th>
                        <th scope="col">Tahun Pembuatan</th>
                        <th scope="col">Periode Pakai</th>
                        <th scope="col">Aksi</th>
                        </tr>
                    </thead>
                    @foreach($mesins as $mesin)
                    <tbody>
                        <tr>
                        <th class="text-center" scope="row ">{{$loop->iteration}}</th>
                        <td>{{$mesin->nama_mesin}}</td>
                        <td class="text-center">{{$mesin->lokasi}}</td>
                        <!-- <td>{{$mesin->merk_mesin}}</td> -->
                        <td>{{$mesin->kapasitas}}</td>
                        <td class="text-center">{{$mesin->tanggal_pembelian}}</td>
                        <td class="text-center">{{$mesin->tahun_pembuatan}}</td>
                        <td class="text-center">{{$mesin->periode_pakai}}</td>
                        <td class="text-center">
                        <a href="/admin/{{$mesin->id_mesin}}/ubahDataMesin" class="btn btn-success btn-sm mb-1 " title="Ubah Data Mesin"> <i class="fas fa-edit"></i></a>
                         
                        
                        <!-- <form action="{{url('/admin/mesin/'.$mesin->id)}}" method="post" class="d-inline">
                            @method('delete')
                            @csrf
                            <button type="submit" class="btn btn-danger btn-sm mb-1" onclick="return confirm('Yakin Ingin Menghapus Data Ini?')"> <i class="fas fas fa-trash-alt"></i></button>
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
<!-- Modal Edit Data Mesin -->
@foreach($mesins as $mesin)
    <div class="modal fade " id="bd-example-modal-{{$mesin->id}}" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog " role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Ubah Data Mesin</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            
        <form class="form" method= "post" action="{{url('/admin/editMesin/'.$mesin->id)}}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group col-md-12">
                            <label for="nama_mesin">Nama Mesin</label>
                            <input type="text" class="form-control @error('nama_mesin') is-invalid @enderror" id="nama_mesin" name="nama_mesin"  value="{{$mesin->nama_mesin}}" placeholder="Nama Mesin">
                                @error('nama_mesin')
                                <div class="invalid-feedback">{{$message}}
                                </div>
                                @enderror
                        </div>

                        <div class="form-group col-md-12">
                            <label for="merk_mesin">Merk Mesin</label>
                            <input type="text" class="form-control @error('merk_mesin') is-invalid @enderror" id="merk_mesin" name="merk_mesin"  value="{{ $mesin->merk_mesin }}" placeholder="Merk Mesin">
                                @error('merk_mesin')
                                <div class="invalid-feedback">{{$message}}
                                </div>
                                @enderror
                        </div>
                        <div class="form-group col-md-12">
                            <label for="kapasitas">Kapasitas</label>
                            <input type="text" class="form-control @error('kapasitas') is-invalid @enderror" id="kapasitas" name="kapasitas" value="{{ $mesin->kapasitas}}" placeholder="Kapasitas">
                                @error('kapasitas')
                                <div class="invalid-feedback">{{$message}}
                                </div>
                                @enderror
                        </div>
                        <div class="form-group col-md-12">
                            <label for="tanggal_pembelian">Tanggal Pembelian</label>
                            <input type="date" class="form-control @error('tanggal_pembelian') is-invalid @enderror" id="tanggal_pembelian" name="tanggal_pembelian" value="{{ $mesin->tanggal_pembelian}}" placeholder="Tanggal Pembelian">
                                @error('tanggal_pembelian')
                                <div class="invalid-feedback">{{$message}}
                                </div>
                                @enderror
                        </div>
                        <div class="form-group col-md-12">
                            <label for="tahun_pembuatan">Tahun Pembuatan</label>
                            <input type="text" class="form-control @error('tahun_pembuatan') is-invalid @enderror" id="tahun_pembuatan" name="tahun_pembuatan" value="{{ $mesin->tahun_pembuatan }}" placeholder="Tahun Pembuatan">
                                @error('tahun_pembuatan')
                                <div class="invalid-feedback">{{$message}}
                                </div>
                                @enderror
                        </div>
                        
                        <div class="form-group col-md-12">
                            <label for="periode_pakai">Periode</label>
                            <input type="text" class="form-control @error('periode_pakai') is-invalid @enderror" id="periode_pakai" name="periode_pakai" value="{{ $mesin->periode_pakai}}" placeholder="Periode Pakai Sampai Tahun">
                                @error('periode_pakai')
                                <div class="invalid-feedback">{{$message}}
                                </div>
                                @enderror
                        </div>
                        <div class="form-group col-md-12">
                            <label for="lokasi">Lokasi</label>
                            <input type="text" class="form-control @error('lokasi') is-invalid @enderror" id="lokasi" name="lokasi" value="{{ $mesin->lokasi}}" placeholder="Lokasi Mesin">
                                @error('lokasi')
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
