@extends('layouts.appNavbar')
@section('title','Dashboard')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
        <div class="row">
            <div class="card mb-3 ml-3 mr-3 bg-info text-white" style="width: 16rem;">
            <div class="card-body">
            <div class="card-body-icon ">
                <i class="fas fa-user"></i>
                </div>
                <h5 class="card-title"> <strong>USER</strong> </h5>
                <h1 class="user  font-weight-bold">{{$user}}</h1>
                <!-- <div class="user display-4 font-weight-bold">{{$user}}</div> -->
                <p class="card-text " style="font-size: 14px;">Jumlah User</p>
            </div>
            </div>
            <div class="card mb-3 ml-2 mr-3 bg-warning text-white" style="width: 16rem;">
            <div class="card-body ">
            <div class="card-body-icon ">
                <i class="fas fa-cogs"></i>
                </div>
                <h5 class="card-title"> <strong>MESIN</strong></h5>
                <h1 class="user font-weight-bold">{{$mesin}}</h1>
                <!-- <div class="user display-4 font-weight-bold">{{$mesin}}</div> -->
                <p class="card-text" style="font-size: 14px;">Jumlah Mesin </p>
            </div>
            </div>
            <div class="card mb-3 ml-2 mr-3 bg-success text-white" style="width: 16rem;">
            <div class="card-body ">
                <div class="card-body-icon ">
                 <i class="fas fas fa-wrench"></i>
                </div>
                <h5 class="card-title"><strong>PEMELIHARAAN</strong></h5>
                <h1 class="user font-weight-bold">{{$pemeliharaan}}</h1>
                <!-- <div class="user display-4 font-weight-bold">{{$pemeliharaan}}</div> -->
                <p class="card-text" style="font-size: 14px;">Jumlah Pemeliharaan Mesin</p>  
            </div>
            </div>
            <div class="card mb-3 ml-2 mr-2 bg-danger text-white" style="width: 16rem;">
            <div class="card-body ">
            <div class="card-body-icon ">
                <i class="fas fa-tools"></i>
                </div>
                <h5 class="card-title"><strong>PERBAIKAN</strong></h5>
                <h1 class="user font-weight-bold">{{$perbaikan}}</h1>
                <!-- <div class="user display-4 font-weight-bold">{{$perbaikan}}</div> -->
                <p class="card-text" style="font-size: 14px;">Jumlah Perbaikan Mesin</p>
            </div>
            </div>
        </div>
       
           
                    <div class="card" >
                    <div class="card-header"><strong>Jadwal Pemeliharaan Mesin Produksi Hari Ini</strong> </div>
                    <div class="card-body">
                        
                    <div class="table-responsive">
                    <table class="table table-bordered  ">
                    <thead class="bg-info text-center">
                        <tr>
                        <th scope="col">No</th>
                        <!-- <th scope="col">Tanggal</th> -->
                        <th scope="col">Nama Mesin</th>
                        <!-- <th scope="col">Merk Mesin</th> -->
                        <th scope="col">Lokasi</th>
                        <th scope="col">Parameter</th>
                        <th scope="col">Tanggal Jadwal</th>
                        <th scope="col">Status</th>
                        </tr>
                    </thead>

                    @foreach($pemeliharaans as $data)
                    <tbody>
                        <tr>
                        <th class="text-center" scope="row">{{$loop->iteration}}</th>
                        <!-- <td >{{$data->created_at->isoFormat('D/M/Y')}}</td> -->
                        <td >{{$data->mesin->nama_mesin}}</td>
                        <!-- <td>{{$data->mesin->merk_mesin}}</td> -->
                        <td>{{$data->mesin->lokasi}}</td>
                        <td>{{$data->parameter->nama_parameter}}</td>
                        <td>{{$data->tanggal_jadwal}}</td>
                        <td class="text-center">
                        <p class="badge badge-warning">{{$data->status}}</p>
                        </td>
                        
                        </tr>
                    </tbody>
                    @endforeach
                    </table>
                    </div>

                    </div>
                    
            </div>
        </div>
    </div>
</div>
@endsection
