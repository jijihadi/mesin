@extends('layouts.appNavbar')
@section('title','Kartu Riwayat Mesin')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header text-center"> <strong>KARTU RIWAYAT MESIN PRODUKSI</strong> </div>

                <div class="card-body">
                    <!-- @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif -->

                    
                    
                    <form  method="get" action="/teknisi/kartuMesin">
  
                    <div class="form-group ">

                    
                    <label for="name" class=" col-form-label">Pilih Nama Mesin</label>
                            <select name="nama_mesin" id="nama_mesin" class="form-control col-md-12 @error('nama_mesin') is-invalid @enderror" value="{{ old('nama_mesin') }}">
                            <option disable value="">==Pilih Mesin==</option>
                            @foreach($mesins as $mesin)
                            <option value="{{$mesin->id_mesin}}">{{$mesin->nama_mesin}}</option>
                            @endforeach
                            </select>
                            <!-- <input type="text" class="form-control @error('merk_mesin') is-invalid @enderror" id="merk_mesin" name="merk_mesin"  value="{{ old('merk_mesin') }}" placeholder="Merk Mesin"> -->
                                @error('nama_mesin')
                                <div class="invalid-feedback">{{$message}}
                                </div>
                                @enderror


                            
                        </select>

                    </div>
                    <button type="submit" class="btn btn-primary btn-sm" style="color:white;" name="cari"/>Lihat Data</button>
                    <!-- <a href="/teknisi/kartuMesin" class="btn btn-primary btn-sm  ">Lihat Data</a> -->
                    <!-- <button type="submit" class="btn btn-primary btn-sm col-md-2" href="{{ url('admin/kartuMesin') }}"> Submit</button> -->
                    <!-- <button type="submit" class="btn btn-info btn-sm " ><i class='far fa-file-pdf'> </i> Download PDF</button> -->
                    <a  onClick="this.href='/teknisi/kartuMesin/'+ document.getElementById('nama_mesin').value
                     " target="_blank" class="btn btn-info btn-sm " style="color:white;"><i class='far fa-file-pdf'> </i> Download PDF</a>

                    
                    </form>

                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
