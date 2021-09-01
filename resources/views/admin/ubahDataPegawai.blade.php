@extends('layouts.appNavbar')
@section('title','Form Untuk Mengubah Data Pegawai')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <!-- <div class="card-header">Form Tambah Pegawai</div> -->

                <div class="card-body">
                <h4 class="text-center "><strong>FORM UNTUK MENGUBAH DATA PEGAWAI <br> CV. SUMBER NIAGA</strong></h4> 
                    <br>
                    <br>

                    <form class="form" method= "POST" action="/admin/{{$pegawai->id_pegawai}}/ubahDataPegawai/update"  enctype="multipart/form-data">
                    @csrf
                        <div class="form-group col-md-12">
                            <label for="nama">Nama</label>
                            <input type="text" class="form-control @error('nama') is-invalid @enderror" id="nama" name="nama"  value="{{ $pegawai->nama}}">
                                @error('nama')
                                <div class="invalid-feedback">{{$message}}
                                </div>
                                @enderror
                        </div>

                        <div class="form-group col-md-12">
                            <label for="alamat">Alamat</label>
                            <input type="alamat" class="form-control @error('alamat') is-invalid @enderror" id="alamat" name="alamat"   value="{{ $pegawai->alamat}}">
                                @error('alamat')
                                <div class="invalid-feedback">{{$message}}
                                </div>
                                @enderror
                        </div>

                        <div class="form-group col-md-12">
                            <label for="no_telp">No Telp</label>
                            <input type="no_telp" class="form-control @error('no_telp') is-invalid @enderror" id="no_telp" name="no_telp"  value="{{ $pegawai->no_telp}}" >
                                @error('no_telp')
                                <div class="invalid-feedback">{{$message}}
                                </div>
                                @enderror
                        </div>

                        <div class="form-group col-md-12">
                            <label for="nama_jabatan">Jabatan</label>
                            <select name="nama_jabatan" id="nama_jabatan" class="form-control col-md-12 @error('jabatan') is-invalid @enderror" >
                            

                            @foreach($jabatans as $jabatan)
                            <option value="{{$jabatan->id_jabatan}}" {{$jabatan->id_jabatan == $pegawai->id_jabatan ? 'selected' : '' }}>{{$jabatan->nama_jabatan}}</option>
                            @endforeach
                            </select>
                                @error('jabatan')
                                <div class="invalid-feedback">{{$message}}
                                </div>
                                @enderror
                        </div>
                       
                        <div class="form-group col-md-12">
                            <label for="status_pegawai">Status Pegawai</label>
                            <select name="status_pegawai" id="status_pegawai" class="form-control col-md-12 @error('status') is-invalid @enderror" value="{{ $pegawai->status_pegawai}}">
                            <option value="{{ $pegawai->status_pegawai}}">{{ $pegawai->status_pegawai}}</option>
                            <option value="Aktif">Aktif</option>
                            <option value="Cuti">Cuti</option>
                            <option value="Keluar">Keluar</option>
                            </select>
                                @error('status')
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
