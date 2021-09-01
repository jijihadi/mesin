@extends('layouts.appNavbar')
@section('title','Form Hasil Perbaikan Mesin')
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
                    <h4 class="text-center "><strong>FORM HASIL PERBAIKAN MESIN PRODUKSI <br> CV. SUMBER NIAGA</strong></h4> 
                    <br>
                    <br>
                    
                    
                    <form class="form" method= "POST" action="/teknisi/{{$data->id_perbaikan}}/hasilPerbaikan/tambah" enctype="multipart/form-data">
                    @csrf

                        <div class="form-group col-md-12">
                            <label for="name">Diajukan Oleh</label>
                           
                           
                            <input type="text" class="form-control" id="username" name="username"  value="{{$data->user['username']}}" readonly>    
                        </div>
                        <div class="form-group col-md-12">
                            <label for="nama_mesin">Nama Mesin</label>
                            <!-- <select name="nama_mesin" id="nama_mesin" class="form-control col-md-12 @error('nama_mesin') is-invalid @enderror" value="{{ old('nama_mesin') }}">
                            <option disable value="">Nama Mesin</option>
                            @foreach($mesins as $mesin)
                            <option value="{{$mesin->id}}">{{$mesin->nama_mesin}}</option>
                            @endforeach
                            </select> -->
                            <input type="text" class="form-control " id="merk_mesin" name="merk_mesin"  value="{{$data->mesin->nama_mesin}}" {{$mesin->id_mesin == $data->id_mesin}} readonly>
                                
                        </div>
                        <div class="form-group col-md-12">
                            <label for="lokasi">Lokasi</label>
                            <input type="text" class="form-control " id="lokasi" name="lokasi" value="{{$data->mesin->lokasi}}" {{$mesin->id_mesin == $data->id_mesin}} readonly>
                                
                        </div>
                        <div class="form-group col-md-12">

                            <label for="deskripsi">Deskripsi Masalah</label>
                            <input type="text" class="form-control" id="deskripsi" name="deskripsi"   value="{{$data->deskripsi_masalah}}"  readonly>
                                
                        </div>
                        
                        <div class="form-group col-md-12">
                            <label for="tanggal_perbaikan">Tanggal Perbaikan</label>
                            <input type="text" class="form-control @error('tanggal_perbaikan') is-invalid @enderror" id="picker" name="tanggal_perbaikan" value="{{ $data->tanggal_perbaikan}}" placeholder="Tanggal Perbaikan">
                                @error('tanggal_perbaikan')
                                <div class="invalid-feedback">{{$message}}
                                </div>
                                @enderror
                        </div>
                        <div class="form-group col-md-12">
                            <label for="dilakukan_perbaikan">Perbaikan yang Dilakukan</label>
                            <input type="text" class="form-control @error('perbaikan yang dilakukan') is-invalid @enderror" id="dilakukan_perbaikan" name="dilakukan_perbaikan" value="{{ $data->dilakukan_perbaikan}}" placeholder="Metode Pemeliharaan">
                                @error('perbaikan yang dilakukan')
                                <div class="invalid-feedback">{{$message}}
                                </div>
                                @enderror
                        </div> 
                        
                        <div class="form-group col-md-12">
                            <label for="hasil">Hasil Perbaikan</label>
                            <input type="text" class="form-control @error('hasil perbaikan') is-invalid @enderror" id="hasil" name="hasil" value="{{ $data->hasil}}" placeholder="Hasil Perbaikan">
                                @error('hasil_perbaikan')
                                <div class="invalid-feedback">{{$message}}
                                </div>
                                @enderror
                        </div>
                        <div class="form-group col-md-12">
                                <label for="status">Status</label>
                                <select name="status" id="status" class="form-control col-md-12 @error('status') is-invalid @enderror" value="{{$data->status }}">
                                <option value="Belum Diperbaiki">Belum Diperbaiki</option>
                                <option value="Sedang Diperbaiki">Sedang Diperbaiki</option>
                                <option value="Selesai">Selesai</option>
                                </select>
                                    @error('status')
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
