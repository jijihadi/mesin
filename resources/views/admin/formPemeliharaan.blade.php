@extends('layouts.appNavbar')
@section('title','Form Jadwal Pemeliharaan Mesin')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <!-- <div class="card-header">Form Jadwal Pemeliharaan Mesin</div> -->

                <div class="card-body">
                    <!-- @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif -->
                    <h4 class="text-center "><strong>FORM JADWAL PEMELIHARAAN MESIN PRODUKSI <br> CV. SUMBER NIAGA</strong></h4> 
                    <br>
                    <br>
                    
                    <form class="form" method= "POST" action="{{route('jadwalPemeliharaan.tambah')}}" enctype="multipart/form-data">
                    @csrf

                        <div class="form-group col-md-12">
                            <label for="nama_mesin">Nama Mesin</label>
                            <select name="nama_mesin" id="nama_mesin" class="form-control col-md-12 @error('nama_mesin') is-invalid @enderror" value="{{ old('nama_mesin') }}">
                            <option disable value="">Nama Mesin</option>
                            @foreach($mesins as $mesin)
                            <option value="{{$mesin->id_mesin}}">{{$mesin->nama_mesin}}</option>
                            @endforeach
                            </select>
                            <!-- <input type="text" class="form-control @error('merk_mesin') is-invalid @enderror" id="merk_mesin" name="merk_mesin"  value="{{ old('merk_mesin') }}" placeholder="Merk Mesin"> -->
                                @error('nama_mesin')
                                <div class="invalid-feedback">{{$message}}
                                </div>
                                @enderror
                        </div>
                        <div class="form-group col-md-12">
                            <label for="nama_parameter">Parameter</label>
                            <select name="nama_parameter" id="nama_parameter" class="form-control col-md-12 @error('parameter') is-invalid @enderror" value="{{ old('nama_parameter') }}">
                            <option disable value="">Parameter</option>
                            @foreach($parameter as $point)
                            <option value="{{$point->id_parameter}}">{{$point->nama_parameter}}</option>
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
                            <input type="text" class="form-control @error('tanggal_jadwal') is-invalid @enderror" id="picker" name="tanggal_jadwal" placeholder="Tanggal Pemeliharaan" value="{{ old('tanggal_jadwal') }}">
                                @error('tanggal_jadwal')
                                <div class="invalid-feedback">{{$message}}
                                </div>
                                @enderror
                        </div>
                        <!-- <div class="form-group col-md-12">
                            <label for="tahun_pembuatan">Tahun Pembuatan</label>
                            <input type="text" class="form-control @error('tahun_pembuatan') is-invalid @enderror" id="tahun_pembuatan" name="tahun_pembuatan" value="{{ old('tahun_pembuatan') }}" placeholder="Tahun Pembuatan">
                                @error('tahun_pembuatan')
                                <div class="invalid-feedback">{{$message}}
                                </div>
                                @enderror
                        </div>
                        
                        <div class="form-group col-md-12">
                            <label for="periode_pakai">Periode</label>
                            <input type="text" class="form-control @error('periode_pakai') is-invalid @enderror" id="periode_pakai" name="periode_pakai" value="{{ old('periode_pakai') }}" placeholder="Periode Pakai Sampai Tahun">
                                @error('periode_pakai')
                                <div class="invalid-feedback">{{$message}}
                                </div>
                                @enderror
                        </div>
                        <div class="form-group col-md-12">
                            <label for="lokasi">Lokasi</label>
                            <input type="text" class="form-control @error('lokasi') is-invalid @enderror" id="lokasi" name="lokasi" value="{{ old('lokasi') }}" placeholder="Lokasi Mesin">
                                @error('lokasi')
                                <div class="invalid-feedback">{{$message}}
                                </div>
                                @enderror
                        </div> -->
                       
                        <div class="form-group col-md-12">
                            <label for="username">Diperiksa Oleh</label>
                            <select name="username" id="username" class="form-control col-md-12 @error('nama operator mesin') is-invalid @enderror" value="{{ old('username') }}">
                            <option disable value="">Diperiksa oleh</option>
                            @foreach($users as $user)
                            <option value="{{$user->id}}">{{$user->username}}</option>
                            @endforeach
                            </select>
                            <!-- <input type="text" class="form-control @error('merk_mesin') is-invalid @enderror" id="merk_mesin" name="merk_mesin"  value="{{ old('merk_mesin') }}" placeholder="Merk Mesin"> -->
                                @error('nama operator mesin')
                                <div class="invalid-feedback">{{$message}}
                                </div>
                                @enderror
                        </div>

                        <div class="tombol col">
                        <button class="btn btn-primary" type="submit" name="submit"> <strong>Tambah Jadwal</strong> </button>
                        </div>
                        
                    </form>


                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
