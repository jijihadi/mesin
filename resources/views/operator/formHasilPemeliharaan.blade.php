@extends('layouts.appNavbar')
@section('title','Form Hasil Pemeliharaan Mesin')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">

                <div class="card-body">
                  
                    <h4 class="text-center "><strong>FORM HASIL PEMELIHARAAN MESIN PRODUKSI <br> CV. SUMBER NIAGA</strong></h4> 
                    <br>
                    <br>
                    
                    
                    <form class="form" method= "POST" action="/operator/{{$data->id_pemeliharaan}}/hasilPemeliharaan/tambah" enctype="multipart/form-data">
                    @csrf

                        <div class="form-group col-md-12">
                            <label for="username">Diperiksa Oleh</label>
                            <input type="text" class="form-control" id="username" name="username"  value="{{$data->user['username']}}" readonly>      
                        </div>

   
                        <div class="form-group col-md-12">
                            <label for="nama_mesin">Nama Mesin</label>
                            <input type="text" class="form-control " id="nama_mesin" name="nama_mesin"  value="{{$data->mesin['nama_mesin']}}"readonly>
                        </div>

                        <div class="form-group col-md-12">
                            <label for="lokasi">Lokasi</label>
                            <input type="text" class="form-control " id="lokasi" name="lokasi" value="{{$data->mesin['lokasi']}}"readonly>
                            
                        </div>
                        
                        <div class="form-group col-md-12">
                            <label for="nama_parameter">Parameter</label>
                            <input type="text" class="form-control" id="nama_parameter" name="nama_parameter"   value="{{$data->parameter['nama_parameter']}}" readonly>

                        </div>
                        
                        <div class="form-group col-md-12">
                            <label for="tanggal_jadwal">Jadwal Pemeliharaan</label>
                            <input type="text" class="form-control " id="picker" name="tanggal_jadwal" value="{{ $data->tanggal_jadwal }}" readonly>
                        </div>

                        <div class="form-group col-md-12">
                            <label for="metode">Metode Pemeliharaan</label>
                            <input type="text" class="form-control @error('metode') is-invalid @enderror" id="metode" name="metode" value="{{ $data->metode }}" placeholder="Metode Pemeliharaan">
                                @error('metode')
                                <div class="invalid-feedback">{{$message}}
                                </div>
                                @enderror
                        </div> 
                        
                        <div class="form-group col-md-12">
                            <label for="hasil">Hasil Pemeriksaan</label>
                            <input type="text" class="form-control @error('hasil_pemeriksaan') is-invalid @enderror" id="hasil" name="hasil" value="{{ $data->hasil}}" placeholder="Hasil Pemeriksaan">
                                @error('hasil_pemeriksaan')
                                <div class="invalid-feedback">{{$message}}
                                </div>
                                @enderror
                        </div>

                        <div class="form-group col-md-12">
                                <label for="status">Status</label>
                                <select name="status" id="status" class="form-control col-md-12 @error('status') is-invalid @enderror" value="{{ $data->status }}">
                                <option value="Belum Dicek">Belum Dicek</option>
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
