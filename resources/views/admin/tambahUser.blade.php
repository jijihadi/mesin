@extends('layouts.appNavbar')
@section('title','Tambah User')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <!-- <div class="card-header">Form Tambah User</div> -->

                <div class="card-body">
                <h4 class="text-center "><strong>FORM TAMBAH USER</strong></h4> 
                    <br>
                    <br>

                    <form class="form" method= "post" action="{{route('tambahUser.store')}}" enctype="multipart/form-data">
                    @csrf
                        <div class="form-group col-md-12">
                            <label for="id_pegawai">ID Pegawai</label>
                            <input type="text" class="form-control @error('id_pegawai') is-invalid @enderror" id="id_pegawai" name="id_pegawai"  value="{{ old('id_pegawai') }}">
                                @error('id_pegawai')
                                <div class="invalid-feedback">{{$message}}
                                </div>
                                @enderror
                        </div>

                        <div class="form-group col-md-12">
                            <label for="email">Email</label>
                            <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email"  value="{{ old('email') }}">
                                @error('email')
                                <div class="invalid-feedback">{{$message}}
                                </div>
                                @enderror
                        </div>
                        <div class="form-group col-md-12">
                            <label for="username">Username</label>
                            <input type="username" class="form-control @error('username') is-invalid @enderror" id="username" name="username"  value="{{ old('username') }}">
                                @error('username')
                                <div class="invalid-feedback">{{$message}}
                                </div>
                                @enderror
                        </div>
                        <div class="form-group col-md-12">
                            <label for="password">Password</label>
                            <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password" >
                                @error('password')
                                <div class="invalid-feedback">{{$message}}
                                </div>
                                @enderror
                        </div>
                        <!-- <div class="form-group col-md-12">
                            <label for="password-confirm">Confirm Password</label>
                            <input type="password" class="form-control @error('password-confirm') is-invalid @enderror" id="password-confirm" name="password_confirm" required>
                                @error('password-confirm')
                                <div class="invalid-feedback">{{$message}}
                                </div>
                                @enderror
                        </div> -->
                        <div class="form-group col-md-12">
                            <label for="level">Level</label>
                            <select name="level" id="level" class="form-control col-md-12 @error('level') is-invalid @enderror" value="{{ old('level') }}">
                            <option disable value="">- Level -</option>
                            <option value="Admin">Admin</option>
                            <option value="Teknisi">Teknisi</option>
                            <option value="Operator">Operator</option>
                            <option value="Manager">Manager</option>
                            </select>
                                @error('level')
                                <div class="invalid-feedback">{{$message}}
                                </div>
                                @enderror
                        </div>
                       
                        <div class="tombol col">
                        <button class="btn btn-primary" type="submit" name="submit"> <strong>Tambah Data</strong> </button>
                        </div>
                        
                    </form>


                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
