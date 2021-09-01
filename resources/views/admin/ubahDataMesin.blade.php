@extends('layouts.appNavbar')
@section('title','Form Untuk Mengubah Data Mesin')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <!-- <div class="card-header">Form Tambah Mesin</div> -->

                <div class="card-body">
                    <!-- @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif -->
                    <h4 class="text-center "><strong>FORM UNTUK MENGUBAH DATA MESIN PRODUKSI <br> CV. SUMBER NIAGA</strong></h4> 
                    <br>
                    <br>

                    <form class="form" method= "POST" action="/admin/{{$mesin->id_mesin}}/ubahDataMesin/update" enctype="multipart/form-data">
                    @csrf
                        <div class="form-group col-md-12">
                            <label for="nama_mesin">Nama Mesin</label>
                            <input type="text" class="form-control @error('nama_mesin') is-invalid @enderror" id="nama_mesin" name="nama_mesin"  value="{{ $mesin->nama_mesin}}" placeholder="Nama Mesin">
                                @error('nama_mesin')
                                <div class="invalid-feedback">{{$message}}
                                </div>
                                @enderror
                        </div>

                        <!-- <div class="form-group col-md-12">
                            <label for="merk_mesin">Merk Mesin</label>
                            <input type="text" class="form-control @error('merk_mesin') is-invalid @enderror" id="merk_mesin" name="merk_mesin"  value="{{ old('merk_mesin') }}" placeholder="Merk Mesin">
                                @error('merk_mesin')
                                <div class="invalid-feedback">{{$message}}
                                </div>
                                @enderror
                        </div> -->
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
                            <input type="text" class="form-control @error('tahun_pembuatan') is-invalid @enderror" id="tahun_pembuatan" name="tahun_pembuatan" value="{{ $mesin->tahun_pembuatan}}" placeholder="Tahun Pembuatan">
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
                       
                        <div class="tombol col">
                        <button class="btn btn-primary" type="submit" name="submit"> <strong>Simpan Data</strong> </button>
                        </div>
                        
                    </form>


                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
