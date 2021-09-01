@extends('layouts.appNavbar')
@section('title','Form Edit Jadwal Pemeliharaan Mesin')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <!-- <div class="card-header text-center"> <strong>Form Edit Jadwal Pemeliharaan Mesin</strong> </div> -->

                <div class="card-body">
                    <!-- @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif -->
                    <h4 class="text-center "><strong>FORM EDIT PEMELIHARAAN MESIN PRODUKSI <br> CV. SUMBER NIAGA</strong></h4> 
                    <br>
                    <br>

                    
                    <form class="form" method= "POST" action="/teknisi/{{$data->id_pemeliharaan}}/formEditPemeliharaan/update" enctype="multipart/form-data">
                    @csrf

                        <div class="form-group col-md-12">
                            <label for="nama_mesin">Nama Mesin</label>
                            <select name="nama_mesin" id="nama_mesin" class="form-control col-md-12 @error('nama_mesin') is-invalid @enderror" >
                            
                            @foreach($mesins as $mesin)
                            <option value="{{$mesin->id_mesin}}" {{$mesin->id_mesin == $data->id_mesin ? 'selected' : '' }}>{{$mesin->nama_mesin}}</option>
                            @endforeach
                            </select>
                            <!-- <input type="text" class="form-control @error('merk_mesin') is-invalid @enderror" id="merk_mesin" name="merk_mesin"  value="{{ old('merk_mesin') }}" placeholder="Merk Mesin"> -->
                                @error('nama_mesin')
                                <div class="invalid-feedback">{{$message}}
                                </div>
                                @enderror
                        </div>
                        <div class="form-group col-md-12">
                            <label for="parameter">Parameter</label>
                            <select name="parameter" id="parameter" class="form-control col-md-12 @error('parameter') is-invalid @enderror" >
                            <option value="">-Pilih Parameter-</option>
                            @foreach($parameters as $point)
                            <option value="{{$point->id_parameter }}" {{$point->id_parameter == $data->id_parameter ? 'selected' : ''}}>{{$point->nama_parameter}}</option>
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
                        <div class="form-group col-md-12">
                            <label for="name">Diperiksa oleh</label>
                            <select name="name" id="name" class="form-control col-md-12 @error('name') is-invalid @enderror">
                            @foreach($users as $user)
                            <!-- <option disable value="">Merk Mesin</option> -->
                            <option value="{{$user->id}}" {{$user->id == $data->id_user ? 'selected' : ''}}>{{$user->username}}</option>
                            @endforeach
                            </select>
                            <!-- <input type="text" class="form-control @error('merk_mesin') is-invalid @enderror" id="merk_mesin" name="merk_mesin"  value="{{ old('merk_mesin') }}" placeholder="Merk Mesin"> -->
                                @error('name')
                                <div class="invalid-feedback">{{$message}}
                                </div>
                                @enderror
                        </div>

                        <div class="tombol col">
                        <button class="btn btn-primary" type="submit" name="submit"> <strong>Simpan</strong> </button>
                        </div>
                        
                    </form>


                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
