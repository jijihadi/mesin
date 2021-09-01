@extends('layouts.appNavbar')
@section('title','Jadwal Pemeliharaan Mesin')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="">
            <div class="card">
                <div class="card-header text-center"> <strong>JADWAL PEMELIHARAAN MESIN PRODUKSI CV. SUMBER NIAGA</strong> </div>

                <div class="card-body">

                    <div class="row">
                    @if(Auth::user()->role=='teknisi')
                        <div class="col mb-3">
                            <a href="{{ url('teknisi/formPemeliharaan') }}" class="btn btn-primary btn-md "> <i class="fas fa-plus"></i> Tambah Jadwal</a>
                        
                        </div>
                        @endif
                        <div class="col-md-auto mb-3">

                            <form class="form-inline " method="POST" action="/teknisi/jadwalPemeliharaan">
                            @csrf
                            <div class="input-group ">
                         
                            <input type="date" name="tgl" id="tgl" class="form-control  mr-3" />

                            <select name="nama_parameter" id="nama_parameter" class="form-control mr-3 col-md-12 @error('parameter') is-invalid @enderror" value="{{ old('nama_parameter') }}">
                            <option disable value="">Parameter</option>
                            @foreach($parameter as $point)
                            <option value="{{$point->id_parameter}}">{{$point->nama_parameter}}</option>
                            @endforeach
                            </select>

                            <select name="status" id="status" class="form-control mr-3 col-md-12 @error('status') is-invalid @enderror" value="{{old('status')}}}">
                                <option disable value="">Status</option>
                                <option value="Belum Dicek">Belum Dicek</option>
                                <option value="Selesai">Selesai</option>
                                </select>

                                <!-- <input class="form-control form-control-sm" type="search" placeholder="Search" aria-label="Search"> -->
                            
                            </div>
                            <div class="input-group-append">
                            
                                <button class="btn btn-primary btn-md " type="submit"><i class='fas fa-search'></i> Cari</button>
                            </div>
                    <div>

                   
                  
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
                        <!-- <th scope="col">Tanggal</th> -->
                        <!-- <th scope="col">Nama Mesin</th> -->
                        <th scope="col">Nama Mesin</th>
                        <th scope="col">Lokasi</th>
                        <th scope="col">Parameter</th>
                        <th scope="col">Tanggal Jadwal</th>
                        <!-- <th scope="col">Metode</th> -->
                        <th scope="col">Hasil Pemeriksaan</th>
                        <th scope="col">Status</th>
                        <th scope="col">Aksi</th>
                        </tr>
                    </thead>

                    @foreach($pemeliharaans as $data)
                    <tbody>
                        <tr>
                        <th class="text-center" scope="row">{{$loop->iteration +($pemeliharaans->perpage()* ($pemeliharaans->currentpage()-1))}}</th>
                        <!-- <td >{{$data->created_at->isoFormat('D/M/Y')}}</td> -->
                        <!-- <td >{{$data->mesin->nama_mesin}}</td> -->
                        <td>{{$data->mesin->nama_mesin}}</td>
                        <td>{{$data->mesin->lokasi}}</td>
                        <td>{{$data->parameter->nama_parameter}}</td>
                        <td>{{$data->tanggal_jadwal}}</td>
                        <!-- <td>{{$data->metode}}</td> -->
                        <td>{{$data->hasil}}</td>
                        <td class="text-center">   
                        <p class="badge badge-warning">{{$data->status}}</p>
                        
                        </td>
                        <td class="text-center"> 
                        @if(Auth::user()->role=='operator')
                        
                        <a href="/operator/{{$data->id_pemeliharaan}}/formHasilPemeliharaan" class="btn btn-warning btn-sm mb-1 " style="color:white;" title="Hasil Pemeliaraan Mesin"> <i class="fas fa-tasks"></i></a>
                        @endif
                        
                        @if(Auth::user()->role=='teknisi')
                        <a id="detail" name="detail" href="/teknisi/{{$data->id_pemeliharaan}}/detailPemeliharaan" class="btn btn-primary btn-sm mb-1 " title="Detail Pemeliharaan Mesin"> <i class="fas fa-eye"></i></a>
                        <a href="/teknisi/{{$data->id_pemeliharaan}}/formEditPemeliharaan" class="btn btn-success btn-sm mb-1 " title="Ubah Jadwal Pemeliharaan Mesin"> <i class="fas fa-edit"></i></a>
                        @endif
                        <!-- <form action="{{url('/admin/jadwalPemeliharaan/'.$data->id)}}" method="post" class="d-inline">
                            @method('delete')
                            @csrf
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Yakin Ingin Menghapus Data Ini?')" title="Hapus"> <i class="fas fas fa-trash-alt"></i></button>
                        </form> -->
                        </td>
                        </tr>
                    </tbody>
                    @endforeach
                    </table>
                    {{$pemeliharaans->links()}}
                </div>
                </div>
            </div>
        </div>
    </div>

<!-- Modal Status -->
@foreach($pemeliharaans as $data)
    <div class="modal fade " id="bd-example-modal-{{$data->id}}" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog " role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Status</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            
        <form class="form" method= "post" action="{{url('/admin/status/'.$data->id)}}" enctype="multipart/form-data">
                        @csrf
                            <div class="form-group col-md-12">
                                <label for="status">Status</label>
                                <select name="status" id="status" class="form-control col-md-12 @error('status') is-invalid @enderror" value="{{$data->status}}}">
                                <option value="Belum Dicek">Belum Dicek</option>
                                <option value="Sedang Dicek">Sedang Dicek</option>
                                <option value="Selesai">Selesai</option>
                                </select>
                                    @error('status')
                                    <div class="invalid-feedback">{{$message}}
                                    </div>
                                    @enderror
                            </div>
                            <div class="form-group col-md-12">
                            <label for="metode">Metode</label>
                            <input type="text" class="form-control @error('metode') is-invalid @enderror" id="metode" name="metode" value="{{ $data->metode }}">
                                @error('metode')
                                <div class="invalid-feedback">{{$message}}
                                </div>
                                @enderror
                            </div>
                            <div class="form-group col-md-12">
                            <label for="hasil">Hasil Pemeriksaan</label>
                            <input type="text" class="form-control @error('hasil') is-invalid @enderror" id="hasil" name="hasil" value="{{$data->hasil}}">
                                @error('hasil')
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


<!-- Modal Edit -->
@foreach($pemeliharaans as $data)
    <div class="modal fade " id="bd-example-modal-2-{{$data->id}}" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog " role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Edit Pemeliharaan</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            
        <form class="form" method= "POST" action="{{url('/admin/editpemeliharaan/'.$data->id)}}" enctype="multipart/form-data">
                    @csrf

                        <div class="form-group col-md-12">
                            <label for="merk_mesin">Merk Mesin</label>
                            <select name="merk_mesin" id="merk_mesin" class="form-control col-md-12 @error('merk_mesin') is-invalid @enderror" value="{{ $data->merk_mesin }}">
                            @foreach($mesins as $mesin)
                            <!-- <option disable value="">Merk Mesin</option> -->
                            <option value="{{$data->id_mesin}}">{{$mesin->merk_mesin}}</option>
                            @endforeach
                            </select>
                            <!-- <input type="text" class="form-control @error('merk_mesin') is-invalid @enderror" id="merk_mesin" name="merk_mesin"  value="{{ old('merk_mesin') }}" placeholder="Merk Mesin"> -->
                                @error('merk_mesin')
                                <div class="invalid-feedback">{{$message}}
                                </div>
                                @enderror
                        </div>
                        <div class="form-group col-md-12">
                            <label for="nama_parameter">Parameter</label>
                            <select name="nama_parameter" id="nama_parameter" class="form-control col-md-12 @error('parameter') is-invalid @enderror" value="{{$data->nama_parameter}}">
                            @foreach($parameter as $point)
                            <!-- <option disable value="">{{$point->point_cek}}</option> -->
                            <option value="{{$data->parameter}}">{{$point->nama_parameter}}</option>
                            @endforeach
                            </select>
                            <!-- <input type="text" class="form-control @error('merk_mesin') is-invalid @enderror" id="merk_mesin" name="merk_mesin"  value="{{ old('merk_mesin') }}" placeholder="Merk Mesin"> -->
                                @error('parameter')
                                <div class="invalid-feedback">{{$message}}
                                </div>
                                @enderror
                        </div>
                        
                        <div class="form-group col-md-12">
                            <label for="tanggal_jadwal">Jadwal Pemeliharaan</label>
                            <input type="text" class="form-control @error('tanggal_jadwal') is-invalid @enderror" id="picker" name="tanggal_jadwal" value="{{ $data->tanggal_jadwal }}">
                                @error('tanggal_jadwal')
                                <div class="invalid-feedback">{{$message}}
                                </div>
                                @enderror
                        </div>

                        <div class="tombol col">
                        <button class="btn btn-primary" type="submit" name="submit"> <strong>Simpan Data</strong> </button>
                        </div>
                        
                    </form>
        </div>
        </div>
    </div>
    </div>
    @endforeach

</div>
@endsection
