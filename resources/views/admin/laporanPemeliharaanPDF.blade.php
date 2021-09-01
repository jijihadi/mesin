<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>REKAPITULASI DATA PEMELIHARAAN MESIN PRODUKSI CV. SUMBER NIAGA</title>

</head>
<body>
<div class="container">
        <div class="col-md-12">
            <div class="card mt-4">
                <!-- <div class="card-header">Rekap Data Pemeliharaan Mesin</div> -->

                <div class="card-body">
                    <!-- @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif -->

                    <h4 class="text-center"  align="center"> <strong>REKAPITULASI DATA PEMELIHARAAN MESIN PRODUKSI CV. SUMBER NIAGA</strong> </h4>
                    <p class="text-center" align="center"> <strong>Range Tanggal {{$tglawal}} - {{$tglakhir}}</strong> </p>
                    <br>
                   
                    <div class="table-responsive">

                    <table class="static " align="center" rules="all" border="1px" style="width: 95%;">
                            <thead class=" table-light text-center">
                                <tr>
                                <th scope="col">No</th>
                                <!-- <th scope="col">Tanggal</th> -->
                                <th scope="col">Nama Mesin</th>
                                <th scope="col">Lokasi</th>
                                <th scope="col">Parameter</th>
                                <th scope="col">Tanggal Jadwal</th>
                                <th scope="col">Metode</th>
                                <th scope="col">Hasil Pemeriksaan</th>
                                <th scope="col">Status</th>                          
                                </tr>
                            </thead>
                            @foreach($pemeliharaans as $hasil)
                            <tbody class="tbody table-light text-center" >
                            
                                <tr>
                                <td class="nomor text-center " align="center" scope="row">{{$loop->iteration}}</td>
                                <td class="nama " align="left" scope="row">{{$hasil->mesin->nama_mesin}}</td>
                                <td class="jdl text-center" scope="row">{{$hasil->mesin->lokasi}}</td>
                                <td class="jdl text-center" scope="row" align="center">{{$hasil->parameter->nama_parameter}}</td>
                                <td class="jdl text-center" scope="row" align="center">{{$hasil->tanggal_jadwal}}</td>
                                <!-- <td class="waktu text-center" align="center">{{$hasil->created_at->isoFormat('Y-M-D')}}</td> -->
                                <td class="waktuPeng text-center" >{{$hasil->metode}}</td>
                                <td class="waktuPeng text-center" >{{$hasil->hasil}}</td>
                                <td class="deskripsi text-center" align="center">{{$hasil->status}}</td> 
                    
                                </tr>
                           
                            </tbody>
                            @endforeach
                           
                    
                </div>

                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>