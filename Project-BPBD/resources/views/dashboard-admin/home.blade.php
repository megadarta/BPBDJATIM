@extends('dashboard-admin\layout\main')

@section('style')
    <link rel="stylesheet" type="text/css" href="{{ asset('css/admin-home.css') }}"></link>
@endsection

@section('sidebar-admin')
<ul class="list-unstyled components">
            <li class="active">
                <a href="/admin/data/home" data-toggle="collapse" aria-expanded="false">
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
                        <a href="/admin/data/history/data-bencana" class="pilihan-menu">Data Bencana</a>
                    </li>
                    <li>
                        <a href="/admin/data/history/data-elemen" class="pilihan-menu">Data Elemen</a>
                    </li>
                   
                </ul>

                <a href="/admin/data/data-akun">
                    <div class="d-flex menu">
                        <div><img class="icon-btn-menu" src="{{ asset('assets/akun.png') }}"></div>
                        <div><p  class="text-sidebar">Data Akun</p></div>   
                    </div>               
                </a>
            </li>
        </ul>
@endsection

@section('dashboard-admin')
<div class="content-bawah"> 
  <div class="row row-cols-auto">
    
    <a href="{{ url('admin/detail-bencana') }}" style="text-decoration: none;">
    <div class="col card-home">
        <div class="card-text1">Tanah Longsor</div>
        <div class="card-text2">Kamis, 22 April 2021</div>
        <div class="card-text3">Desa Tamansari, Ampelgading, kabupaten Malang</div>
    </div>
    </a>
    
    <a href="{{ url('admin/detail-bencana') }}" style="text-decoration: none;">
    <div class="col card-home">
        <div class="card-text1">Tanah Longsor</div>
        <div class="card-text2">Kamis, 22 April 2021</div>
        <div class="card-text3">Desa Tamansari, Ampelgading, kabupaten Malang</div>
    </div>
    </a>
    
    <a href="{{ url('admin/detail-bencana') }}" style="text-decoration: none;">
    <div class="col card-home">
        <div class="card-text1">Tanah Longsor</div>
        <div class="card-text2">Kamis, 22 April 2021</div>
        <div class="card-text3">Desa Tamansari, Ampelgading, kabupaten Malang</div>
    </div>
    </a>
    
    <a href="/detail-bencana" style="text-decoration: none;">
    <div class="col card-home">
        <div class="card-text1">Tanah Longsor</div>
        <div class="card-text2">Kamis, 22 April 2021</div>
        <div class="card-text3">Desa Tamansari, Ampelgading, kabupaten Malang</div>
    </div>
    </a>
    
  </div>
</div>
@endsection