@extends('dashboard-admin\layout\main')

@section('style')
    <link rel="stylesheet" type="text/css" href="{{ asset('css/menu-data-admin.css') }}"></link>
@endsection

@section('sidebar-admin')
<ul class="list-unstyled components">
            <li class="active">
                <a href="#homeSubmenu" data-toggle="collapse" aria-expanded="false">
                    <div class="d-flex menu">
                        <div><img class="icon-btn-menu" src="{{ asset('assets/menu-sidebar-active.png') }}"></div>
                        <div><p  class="text-sidebar true">Home</p></div>  
                    </div>  
                </a>
            </li>
            <li>
                <a href="#pageSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle menu-sidebar">
                    <div class="d-flex menu">
                        <div><img class="icon-btn-menu" src="{{ asset('assets/history.png') }}"></div>
                        <div><p  class="text-sidebar">History</p></div>
                    </div>
                </a>
                <ul class="collapse list-unstyled" id="pageSubmenu">
                    <li>
                        <a href="#" class="pilihan-menu">Data Bencana</a>
                    </li>
                    <li>
                        <a href="#" class="pilihan-menu">Data Elemen</a>
                    </li>
                   
                </ul>

                <a href="" data-toggle="collapse" aria-expanded="false">
                    <div class="d-flex menu">
                        <div><img class="icon-btn-menu" src="{{ asset('assets/akun.png') }}"></div>
                        <div><p  class="text-sidebar">Data Akun</p></div>   
                    </div>               
                </a>
            </li>
        </ul>
@endsection

@section('dashboard-admin')
  <div class="row row-cols-auto">
    <div class="col card-home">
        <div class="card-text1">Tanah Longsor</div>
        <div class="card-text2">Kamis, 22 April 2021</div>
        <div class="card-text3">Desa Tamansari, Ampelgading, kabupaten Malang</div>
    </div>
    <div class="col card-home">
        <div class="card-text1">Tanah Longsor</div>
        <div class="card-text2">Kamis, 22 April 2021</div>
        <div class="card-text3">Desa Tamansari, Ampelgading, kabupaten Malang</div>
    </div>
    <div class="col card-home">
        <div class="card-text1">Tanah Longsor</div>
        <div class="card-text2">Kamis, 22 April 2021</div>
        <div class="card-text3">Desa Tamansari, Ampelgading, kabupaten Malang</div>
    </div>
    <div class="col card-home">
        <div class="card-text1">Tanah Longsor</div>
        <div class="card-text2">Kamis, 22 April 2021</div>
        <div class="card-text3">Desa Tamansari, Ampelgading, kabupaten Malang</div>
    </div>
    <div class="col card-home">
        <div class="card-text1">Tanah Longsor</div>
        <div class="card-text2">Kamis, 22 April 2021</div>
        <div class="card-text3">Desa Tamansari, Ampelgading, kabupaten Malang</div>
    </div>
    <div class="col card-home">
        <div class="card-text1">Tanah Longsor</div>
        <div class="card-text2">Kamis, 22 April 2021</div>
        <div class="card-text3">Desa Tamansari, Ampelgading, kabupaten Malang</div>
    </div>
    <div class="col card-home">
        <div class="card-text1">Tanah Longsor</div>
        <div class="card-text2">Kamis, 22 April 2021</div>
        <div class="card-text3">Desa Tamansari, Ampelgading, kabupaten Malang</div>
    </div>
    <div class="col card-home">
        <div class="card-text1">Tanah Longsor</div>
        <div class="card-text2">Kamis, 22 April 2021</div>
        <div class="card-text3">Desa Tamansari, Ampelgading, kabupaten Malang</div>
    </div>
    <div class="col card-home">
        <div class="card-text1">Tanah Longsor</div>
        <div class="card-text2">Kamis, 22 April 2021</div>
        <div class="card-text3">Desa Tamansari, Ampelgading, kabupaten Malang</div>
    </div>
    <div class="col card-home">
        <div class="card-text1">Tanah Longsor</div>
        <div class="card-text2">Kamis, 22 April 2021</div>
        <div class="card-text3">Desa Tamansari, Ampelgading, kabupaten Malang</div>
    </div>
    <div class="col card-home">
        <div class="card-text1">Tanah Longsor</div>
        <div class="card-text2">Kamis, 22 April 2021</div>
        <div class="card-text3">Desa Tamansari, Ampelgading, kabupaten Malang</div>
    </div>
    <div class="col card-home">
        <div class="card-text1">Tanah Longsor</div>
        <div class="card-text2">Kamis, 22 April 2021</div>
        <div class="card-text3">Desa Tamansari, Ampelgading, kabupaten Malang</div>
    </div>
    <div class="col card-home">
        <div class="card-text1">Tanah Longsor</div>
        <div class="card-text2">Kamis, 22 April 2021</div>
        <div class="card-text3">Desa Tamansari, Ampelgading, kabupaten Malang</div>
    </div>
    <div class="col card-home">
        <div class="card-text1">Tanah Longsor</div>
        <div class="card-text2">Kamis, 22 April 2021</div>
        <div class="card-text3">Desa Tamansari, Ampelgading, kabupaten Malang</div>
    </div>
    <div class="col card-home">
        <div class="card-text1">Tanah Longsor</div>
        <div class="card-text2">Kamis, 22 April 2021</div>
        <div class="card-text3">Desa Tamansari, Ampelgading, kabupaten Malang</div>
    </div>
    <div class="col card-home">
        <div class="card-text1">Tanah Longsor</div>
        <div class="card-text2">Kamis, 22 April 2021</div>
        <div class="card-text3">Desa Tamansari, Ampelgading, kabupaten Malang</div>
    </div>
    <div class="col card-home">
        <div class="card-text1">Tanah Longsor</div>
        <div class="card-text2">Kamis, 22 April 2021</div>
        <div class="card-text3">Desa Tamansari, Ampelgading, kabupaten Malang</div>
    </div>
    <div class="col card-home">
        <div class="card-text1">Tanah Longsor</div>
        <div class="card-text2">Kamis, 22 April 2021</div>
        <div class="card-text3">Desa Tamansari, Ampelgading, kabupaten Malang</div>
    </div>
  </div>
@endsection