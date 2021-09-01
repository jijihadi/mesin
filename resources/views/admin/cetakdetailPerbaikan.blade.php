<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Detail Perbaika Mesin</title>

</head>
<body>
<div class="container">
        <div class="col-md-12">
            <div class="card mt-4">
               

                <div class="card-body">
                   
                    <h3 class="text-center"  align="center"> <strong>DETAIL PERBAIKAN MESIN PRODUKSI <br> CV. SUMBER NIAGA</strong> </h3>
                    
                    <br>
                   
                    <div class="table-responsive">
                    
                    <table class="static " align="center" rules="all" border="1px" style="width: 95%;">
                            
                           
                            <tbody class="tbody table-light text-center" >

                        <tr>
                        <th scope="col" align="left">Diajukan Oleh</th>
                        <td >{{$data->user->username}}</td>
                        </tr>

                        <tr>
                        <th scope="col" align="left">Diperbaiki Oleh</th>
                        <td >{{$data->user->username}}</td>
                        </tr>    
                        <tr>
                        <th scope="col" align="left">Nama Mesin</th>
                        <td>{{$data->mesin->nama_mesin}}</td>
                        </tr>

                        <tr>
                        <th scope="col" align="left">Lokasi</th>
                        <td>{{$data->mesin->lokasi}}</td>
                        </tr>

                        <tr>
                        <th scope="col" align="left">Deskripsi Masalah</th>
                        <td>{{$data->deskripsi_masalah}}</td>
                        </tr>

                        <tr>
                        <th scope="col" align="left">Tanggal Pengajuan</th>
                        <td>{{$data->created_at}}</td>
                        </tr>

                        <tr>
                        <th scope="col" align="left">Tanggal Perbaikan</th>
                        <td>{{$data->tanggal_perbaikan}}</td>
                        </tr>

                        <tr>
                        <th scope="col"  align="left">Downtime (Mesin Mati)</th>
                        <td> {{$data->created_at->diffInHours($data->tanggal_perbaikan)}} Jam</td>
                        </tr>

                        <tr>
                        <th scope="col"  align="left">Perbaikan yang Dilakukan</th>
                        <td>{{$data->dilakukan_perbaikan}}</td>
                        </tr>
                        
                        <tr>
                        <th scope="col"  align="left">Hasil Perbaikan</th>
                        <td>{{$data->hasil}}</td>
                        </tr>

                        <tr>
                        <th scope="col"  align="left">Status</th>
                        <td >{{$data->status}}</td>
                        </tr>
                    
                           
                            </tbody>
                            </table>
                           
                </div>
                        <br>
                        <br>
                        <br>
                        <br>
                        <br>
                        
                    <table class="static " align="left" rules="all"  style="width: 25%;" border="white">
                           
                        <tbody class="tbody table-light text-center" >
                        <tr>
                        <th scope="col" >
                        <h4 class="text-center"  > <strong>Penanggung Jawab<br> <p align="center"> Teknisi</p> </strong> <br> <br> <br> (__________________)</h4>
                        </th>
                      

                        </tr>
                    
                            </tbody>
                            </table>

                </div>
            </div>
        </div>
    </div>
</div>

</body>
</html>