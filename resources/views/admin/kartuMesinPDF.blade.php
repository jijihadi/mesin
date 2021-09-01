<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>KARTU RIWAYAT MESIN PRODUKSI CV. SUMBER NIAGA</title>

</head>
<body>
<div class="container">
        <div class="col-md-12">
            <div class="card mt-4">
               

                <div class="card-body">
                   
                    <h4 class="text-center"  align="center"> <strong>KARTU RIWAYAT MESIN PRODUKSI CV. SUMBER NIAGA</strong> </h4>
                    
                    <br>
                   
                    <div class="table-responsive">
                    <div class="row ">
                    <p class="mr-8"  > <strong> Jumlah Perbaikan : {{$jumlah_perbaikan_mesin}}</strong>  Kali</p>
                    </div>
                    <table class="static " align="center" rules="all" border="1px" style="width: 95%;">
                            <thead class=" table-light text-center">
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
                            <tbody class="tbody table-light text-center" >
                            
                                <tr>
                                <td class="nomor text-center " align="center" scope="row">{{$loop->iteration}}</td>
                                <td class="nama " align="left" scope="row">{{$hasil->mesin->nama_mesin}}</td>
                                <td class="jdl text-center" scope="row">{{$hasil->mesin->lokasi}}</td>
                                <td class="jdl text-center" scope="row" >{{$hasil->deskripsi_masalah}}</td>
                                <td class="jdl text-center" scope="row" align="center">{{$hasil->created_at->isoFormat('Y-M-D')}}</td>
                                <td class="waktu text-center" align="center">{{$hasil->tanggal_perbaikan}}</td>
                                <td class="waktuPeng text-center" >{{$hasil->dilakukan_perbaikan}}</td>
                                <td class="waktuPeng text-center" >{{$hasil->hasil}}</td>
                                <td class="waktuPeng text-center" >{{$hasil->downtime}}</td>
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