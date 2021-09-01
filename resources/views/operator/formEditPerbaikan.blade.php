@extends('layouts.appNavbar')
@section('title','Form Edit Pengajuan Perbaikan Mesin')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <!-- <div class="card-header text-center"> <strong>Form Edit Pengajuan Perbaikan Mesin</strong> </div> -->

                <div class="card-body">
                    <!-- @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif -->
                    <h4 class="text-center "><strong>FORM EDIT PENGAJUAN PERBAIKAN MESIN PRODUKSI <br> CV. SUMBER NIAGA</strong></h4> 
                    <br>
                    <br>
                   
                    
                    <form class="form" method= "POST" action="" enctype="multipart/form-data">
                    @csrf

                        <div class="form-group col-md-12">
                            <label for="nama_mesin">Nama Mesin</label>
                            <select name="nama_mesin" id="nama_mesin" class="form-control col-md-12 @error('nama_mesin') is-invalid @enderror" >
                            @foreach($mesins as $mesin)
                            <option value="{{$mesin->id}}" {{$mesin->id == $data->id_mesin ? 'selected' : '' }}>{{$mesin->nama_mesin}}</option>
                            @endforeach
                            </select>
                            <!-- <input type="text" class="form-control @error('merk_mesin') is-invalid @enderror" id="merk_mesin" name="merk_mesin"  value="{{ old('merk_mesin') }}" placeholder="Merk Mesin"> -->
                                @error('nama_mesin')
                                <div class="invalid-feedback">{{$message}}
                                </div>
                                @enderror
                        </div>
                        
                        
                        <!-- <div class="form-group col-md-12">
                            <label for="tanggal_jadwal">Tanggal Perbaikkan</label>
                            <input type="date" class="form-control @error('tanggal_perbaikan') is-invalid @enderror" id="tanggal_perbaikan" name="tanggal_perbaikan" value="{{ old('tanggal_perbaikan') }}">
                                @error('tanggal_perbaikan')
                                <div class="invalid-feedback">{{$message}}
                                </div>
                                @enderror
                        </div> -->
                         <div class="form-group col-md-12">
                            <label for="deskripsi">Deskripsi Masalah</label>
                            <textarea type="text" rows="3" class="form-control @error('deskripsi') is-invalid @enderror" id="deskripsi" name="deskripsi" value=" " >{{ $data->deskripsi_masalah}}</textarea>
                                @error('deskripsi')
                                <div class="invalid-feedback">{{$message}}
                                </div>
                                @enderror
                        </div>
                        
                       <!-- <div class="form-group col-md-12">
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
