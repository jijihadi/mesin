<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title')</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="{{ asset('js/jquery.js') }}"></script>
    <script src="{{ asset('js/jquery.datetimepicker.full.js') }}"></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/jquery.datetimepicker.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>

    <style>
        .card-body-icon {
            position: absolute;
            z-index: 0;
            top: 25px;
            right: 4px;
            opacity: 0.4;
            font-size: 75px;

        }

        .nav-link {

            text-color: white;
        }

        .card {
            border-color: gray;

        }

    </style>
</head>

<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-dark bg-info shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="#">
                    <!-- <span>{{ __('APP MESIN') }}</span>   -->
                    <img src="{{ url('logo4.png') }}" alt="" width="55">
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse"
                    data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                    aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <!-- <div class="collapse navbar-collapse" id="navbarSupportedContent"> -->
                <!-- Left Side Of Navbar -->
                <!-- <ul class="navbar-nav mr-auto"> -->
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav mr-auto">
                        <li
                            class="nav-item {{ Request::is('dashboard')?'active':'' }} ">
                            <a class="nav-link" href="{{ route('dashboard') }}"> Dashboard</a>
                        </li>


                        <!-- Admin -->
                        @if(Auth::user()->role=='admin')
                            <li
                                class="nav-item dropdown {{ Request::is('admin/user','admin/mesin','admin/pegawai','admin/jabatan','admin/pointcek','admin/tambahUser','admin/tambahMesin','admin/tambahParameter')?'active':'' }} ">
                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    Data Master
                                </a>
                                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ url('admin/user') }}">User</a>
                                    <a class="dropdown-item"
                                        href="{{ url('admin/pegawai') }}">Pegawai</a>
                                    <a class="dropdown-item"
                                        href="{{ url('admin/jabatan') }}">Jabatan</a>
                                    <a class="dropdown-item"
                                        href="{{ url('admin/mesin') }}">Mesin</a>
                                    <a class="dropdown-item"
                                        href="{{ url('admin/parameter') }}">Parameter</a>


                            </li>
                            <li
                                class="nav-item dropdown {{ Request::is('admin/laporanPemeliharaan','admin/laporanPerbaikan')?'active':'' }} ">
                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    Laporan
                                </a>
                                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item"
                                        href="{{ url('admin/laporanPemeliharaan') }}">Pemeliharaan</a>
                                    <a class="dropdown-item"
                                        href="{{ url('admin/laporanPerbaikan') }}">Perbaikan</a>
                                    <!-- <a class="dropdown-item" href="{{ url('admin/kartuRiwayat') }}">Kartu Riwayat Mesin</a> -->

                            </li>
                            <li
                                class="nav-item  {{ Request::is('admin/kartuRiwayat')?'active':'' }} ">
                                <a class="nav-link" href="{{ url('admin/kartuRiwayat') }}">Kartu
                                    Riwayat Mesin</a>

                            </li>
                            <!-- <li class="nav-item  {{ Request::is('admin/jadwalPemeliharaan')?'active':'' }} ">
                            <a class="nav-link" href="{{ url('admin/jadwalPemeliharaan') }}">Jadwal Pemeliharaan</a>
                            
                        </li>
                        <li class="nav-item  {{ Request::is('admin/jadwalPerbaikan')?'active':'' }} ">
                            <a class="nav-link" href="{{ url('admin/jadwalPerbaikan') }}">Perbaikan Mesin</a>
                            
                        </li> -->
                        @endif
                        <!-- End -->


                        <!-- Operator -->
                        @if( Auth::user()->role=='operator')
                            <li
                                class="nav-item  {{ Request::is('operator/jadwalPemeliharaan')?'active':'' }} ">
                                <a class="nav-link"
                                    href="{{ url('operator/jadwalPemeliharaan') }}">Jadwal
                                    Pemeliharaan Mesin</a>

                            </li>
                            <li
                                class="nav-item  {{ Request::is('operator/jadwalPerbaikan','operator/formPerbaikan')?'active':'' }} ">
                                <a class="nav-link"
                                    href="{{ url('operator/jadwalPerbaikan') }}">Perbaikan Mesin</a>

                            </li>
                            <!-- <li class="nav-item dropdown {{ Request::is('operator/laporanPemeliharaan','operator/laporanPerbaikan','operator/kartuRiwayat')?'active':'' }} ">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Laporan
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{ url('operator/laporanPemeliharaan') }}">Pemeliharaan</a>
                            <a class="dropdown-item" href="{{ url('operator/laporanPerbaikan') }}">Perbaikan</a>
                            <a class="dropdown-item" href="{{ url('operator/kartuRiwayat') }}">Kartu Riwayat Mesin</a>
                            
                        </li> -->
                        @endif
                        <!-- End -->


                        <!-- Teknisi -->
                        @if(Auth::user()->role=='teknisi')
                            <li
                                class="nav-item  {{ Request::is('teknisi/jadwalPemeliharaan','teknisi/formPemeliharaan')?'active':'' }} ">
                                <a class="nav-link"
                                    href="{{ url('teknisi/jadwalPemeliharaan') }}">Jadwal
                                    Pemeliharaan Mesin</a>

                            </li>
                            <li
                                class="nav-item  {{ Request::is('teknisi/jadwalPerbaikan')?'active':'' }} ">
                                <a class="nav-link"
                                    href="{{ url('teknisi/jadwalPerbaikan') }}">Perbaikan Mesin</a>

                            </li>
                            <li
                                class="nav-item dropdown {{ Request::is('teknisi/laporanPemeliharaan','teknisi/laporanPerbaikan')?'active':'' }} ">
                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    Laporan
                                </a>
                                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item"
                                        href="{{ url('teknisi/laporanPemeliharaan') }}">Pemeliharaan</a>
                                    <a class="dropdown-item"
                                        href="{{ url('teknisi/laporanPerbaikan') }}">Perbaikan</a>
                                    <!-- <a class="dropdown-item" href="{{ url('teknisi/kartuRiwayat') }}">Kartu Riwayat Mesin</a> -->

                            </li>
                            <li
                                class="nav-item  {{ Request::is('teknisi/kartuRiwayat')?'active':'' }} ">
                                <a class="nav-link" href="{{ url('teknisi/kartuRiwayat') }}">Kartu
                                    Riwayat Mesin</a>

                            </li>
                            <!-- <li class="nav-item dropdown {{ Request::is('teknisi/dataMesin','teknisi/pointcek')?'active':'' }} ">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Data
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{ url('teknisi/dataMesin') }}">Mesin</a>
                            <a class="dropdown-item" href="{{ url('teknisi/pointcek') }}">Point Check</a>
                           
                            
                        </li> -->

                        @endif
                        <!-- End -->

                        <!-- Manager -->
                        @if(Auth::user()->role=='manager')
                            <li
                                class="nav-item dropdown {{ Request::is('manager/laporanPemeliharaan','manager/laporanPerbaikan')?'active':'' }} ">
                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    Laporan
                                </a>
                                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item"
                                        href="{{ url('manager/laporanPemeliharaan') }}">Pemeliharaan</a>
                                    <a class="dropdown-item"
                                        href="{{ url('manager/laporanPerbaikan') }}">Perbaikan</a>
                                    <!-- <a class="dropdown-item" href="{{ url('manager/kartuRiwayat') }}">Kartu Riwayat Mesin</a> -->


                            </li>
                            <li
                                class="nav-item  {{ Request::is('manager/kartuRiwayat','admin/kartuMesin')?'active':'' }} ">
                                <a class="nav-link" href="{{ url('manager/kartuRiwayat') }}">Kartu
                                    Riwayat Mesin</a>

                            </li>
                        @endif
                        <!-- End -->
                </div>
                </ul>

                <!-- Right Side Of Navbar -->
                <ul class="navbar-nav ml-auto">
                    <!-- Authentication Links -->
                    @if(Auth::user()->role=='teknisi')
                        <?php
                        //   $perbaikans=\App\Perbaikan::join('hasil_perbaikans', 'hasil_perbaikans.id_perbaikan','=','perbaikans.id_perbaikan')->select('perbaikans.*','hasil_perbaikans.tanggal_perbaikan','hasil_perbaikans.dilakukan_perbaikan','hasil_perbaikans.hasil','hasil_perbaikans.status')->where('hasil_perbaikans.status','belum diperbaiki')->count();
                          $perbaikans=\App\Perbaikan::join('hasil_perbaikans', 'hasil_perbaikans.id_perbaikan','=','perbaikans.id_perbaikan')->select('perbaikans.*','hasil_perbaikans.tanggal_perbaikan','hasil_perbaikans.dilakukan_perbaikan','hasil_perbaikans.hasil','hasil_perbaikans.status')->where('hasil_perbaikans.status','belum diperbaiki')->count();
                          $perbaikan=\App\Perbaikan::join('hasil_perbaikans', 'hasil_perbaikans.id_perbaikan','=','perbaikans.id_perbaikan')->select('perbaikans.*','hasil_perbaikans.tanggal_perbaikan','hasil_perbaikans.dilakukan_perbaikan','hasil_perbaikans.hasil','hasil_perbaikans.status')->where('hasil_perbaikans.status','belum diperbaiki')->get();
                        ?>


                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link " href="#" role="button" data-toggle="dropdown"
                                aria-haspopup="true" aria-expanded="false" v-pre>
                                <i class="fa fa-bell 2" style="color:white;"></i><span
                                    class="badge badge-pill badge-danger" data-count="99"> {{ $perbaikans }}</span>
                            </a>

                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                @if($perbaikans == 0)
                                    <a class="dropdown-item">
                                        <p>
                                            <i> Belum ada jadwal perbaikan untuk hari ini </i></p>
                                    </a>

                                @endif
                                @foreach($perbaikan as $hasil)
                                    <a class="dropdown-item"
                                        href="/teknisi/formHasilPerbaikan/{{ $hasil->id_perbaikan }}">
                                        <p>
                                            <strong> {{ $hasil->mesin->nama_mesin }} </strong>
                                            <p> Deskripsi Masalah : {{ $hasil->deskripsi_masalah }} </p>
                                            <p> Tanggal Pengajuan : {{ $hasil->created_at }} </p>
                                        </p>
                                    </a>
                                    <!-- <form id="logout-form" action="/teknisi/jadwalPerbaikan" method="get" style="display: none;">
@csrf
                                    </form> -->
                                @endforeach
                            </div>
                        </li>


                        <!-- <li class="nav-item">
                                <a class="navbar-brand" href="">
                            <i class="fa fa-bell"></i><span class="badge badge-pill badge-danger" data-count="99"> 2</span>
                            
                            </a>
                            </li> -->
                    @endif
                    @if(Auth::user()->role=='operator')
                        <?php
                            $pemeliharaans=\App\Pemeliharaan::join('hasil_pemeliharaans', 'hasil_pemeliharaans.id_pemeliharaan','=','pemeliharaans.id_pemeliharaan')->select('pemeliharaans.*','hasil_pemeliharaans.metode','hasil_pemeliharaans.hasil','hasil_pemeliharaans.status', )->where('hasil_pemeliharaans.status','Belum dicek')->where('pemeliharaans.tanggal_jadwal', 'LIKE', date('Y-m-d').'%')->count();
                            $pemeliharaan=\App\Pemeliharaan::join('hasil_pemeliharaans', 'hasil_pemeliharaans.id_pemeliharaan','=','pemeliharaans.id_pemeliharaan')->select('pemeliharaans.*','hasil_pemeliharaans.metode','hasil_pemeliharaans.hasil','hasil_pemeliharaans.status')->where('hasil_pemeliharaans.status','Belum dicek')->where('pemeliharaans.tanggal_jadwal', 'LIKE', date('Y-m-d').'%')->get();
                            
                        ?>
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link " href="#" role="button" data-toggle="dropdown"
                                aria-haspopup="true" aria-expanded="false" v-pre>
                                <i class="fa fa-bell 2" style="color:white;"></i><span
                                    class="badge badge-pill badge-danger" data-count="99"> {{ $pemeliharaans }}</span>
                            </a>

                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                @if($pemeliharaans == 0)
                                    <a class="dropdown-item">
                                        <p>
                                            <i> Belum ada jadwal pemeliharaan untuk hari ini </i></p>
                                    </a>

                                @endif
                                @foreach($pemeliharaan as $hasil)
                                    <a class="dropdown-item"
                                        href="/operator/{{ $hasil->id_pemeliharaan }}/formHasilPemeliharaan">
                                        <p>
                                            <strong> {{ $hasil->mesin->nama_mesin }} </strong>
                                            <p> Parameter Peemeliharaan : {{ $hasil->parameter->nama_parameter }}
                                            </p>
                                            <p> Tanggal Jadwal : {{ $hasil->tanggal_jadwal }} </p>
                                        </p>
                                    </a>
                                    <!-- <form id="logout-form" action="/teknisi/jadwalPerbaikan" method="get" style="display: none;">
@csrf
                                    </form> -->
                                @endforeach
                            </div>
                        </li>


                    @endif
                    @guest
                        <li class="nav-item">
                            <a class="nav-link"
                                href="{{ route('login') }}">{{ __('Login') }}</a>
                        </li>
                        @if(Route::has('register'))
                            <li class="nav-item">
                                <a class="nav-link"
                                    href="{{ route('register') }}">{{ __('Register') }}</a>
                            </li>
                        @endif
                    @else
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                <strong>{{ Auth::user()->username }}</strong> <span class="caret"></span>
                            </a>

                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                    style="display: none;">
                                    @csrf
                                </form>
                            </div>
                        </li>
                    @endguest
                </ul>
            </div>
    </div>
    </nav>


    <main class="py-4">
        @yield('content')
    </main>
    </div>


    <!-- <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script> -->

    <script>
        $('#picker').datetimepicker({
            timepicker: true,
            datepicker: true,
            format: 'Y-m-d H:i:s',
            hours12: true,
            locale: 'id',
            timezone: 'Asia/Jakarta',

        })

    </script>
</body>

</html>
