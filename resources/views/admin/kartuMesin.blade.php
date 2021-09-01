@extends('layouts.appNavbar')
@section('title','Kartu Riwayat Mesin')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <!-- <div class="card-header">Rekap Data Perbaikan Mesin</div> -->

                <div class="card-body">
                <h4 class="text-center"> <strong>KARTU RIWAYAT MESIN PRODUKSI CV. SUMBER NIAGA</strong> </h4>
                    <!-- <p class="text-center"> <strong>Nama Mesin : {{$mesins}}</strong> </p> -->

                    <div class="row">
                    <p class="ml-3 mt-3"> <strong> Jumlah Perbaikan : {{$jumlah_perbaikan_mesin}}</strong>  Kali</p>
                    </div>
                    <div class="table-responsive">
                    <table class="table table-bordered  ">
                    <thead class="bg-info text-center">
                        <tr>
                        <th scope="col">No</th>
                        <th scope="col">Nama Mesin</th>
                        <th scope="col">Lokasi</th>
                        <th scope="col">Deskripsi Masalah</th>
                        <th scope="col">Tanggal Pengajuan</th>
                        <th scope="col">Tanggal Perbaikan</th>
                        <th scope="col">Dilakukan Perbaikan</th>
                        <th scope="col">Hasil Perbaikan</th>
                        <th scope="col">Downtime (Mesin Mati)</th>
                        <th scope="col">Status</th>
                        </tr>
                    </thead>

                    @foreach($perbaikans as $hasil)
                    <tbody>
                    <tr>
                        <th class="text-center" scope="row">{{$loop->iteration}}</th>
                        <td>{{$hasil->mesin->nama_mesin}}</td>
                        <td>{{$hasil->mesin->lokasi}}</td>
                        <td>{{$hasil->deskripsi_masalah}}</td>
                        <td>{{$hasil->created_at->isoFormat('Y-M-D')}}</td>
                        <td>{{$hasil->tanggal_perbaikan}}</td>
                        <td>{{$hasil->dilakukan_perbaikan}}</td>
                        <td>{{$hasil->hasil}}</td>
                        <td>{{$hasil->downtime}}</td>
                        <td>{{$hasil->status}}</td>
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
</div>
@endsection
