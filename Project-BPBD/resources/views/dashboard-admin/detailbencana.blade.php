@extends('dashboard-admin\layout\main')

@section('style')
    <link rel="stylesheet" type="text/css" href="{{ asset('css/detail-bencana.css') }}"></link>
@endsection

@section('sidebar-admin')

<ul class="list-unstyled components">
            <li>
                <a href="/admin/data/home">
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
                        <a href="/admin/data/history/data-elemen" class="pilihan-menu" style="background-color: #FE5E32; color: white:">Data Elemen</a>
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

@section('navbar-admin')
<div class="d-flex container-fluid content-atas">
                    <div class="content-btn-menu">
                        <button type="button" id="sidebarCollapse" class="btn-menu">
                            <img class="icon-btn-menu" src="{{ asset('assets/menu.png') }}">
                        </button>
                    </div>
                    <!-- <div class="input-group content-home-admin">
                        <span class="input-group-text icon-search" ><img src="{{asset('assets/search.png')}}" style="width: 18px"></span>
                        <input type="text" id="search" class="form-control input-search" placeholder="Cari" aria-label="Search" aria-describedby="basic-addon1">
                    </div> -->
                </div>
@endsection


@section('dashboard-admin')

<div class="content-bawah"> 
<div>
  <div class="bencana-atas">
        <div class="judul-detail">{{$bencana->nama_bencana}}</div>
        <div class="info-detail">
        Waktu   : {{$bencana->tanggal}} <br>                 
        Lokasi  : {{$bencana->lokasi}}
        </div>
  </div>

  <div class="table-responsive">
  <table class="table table-bencana">
  <thead>
    <tr>
      <th scope="col">No</th>
      <th scope="col">Nama Institusi</th>
      <th scope="col">Elemen</th>
      <th scope="col">Kuantiitas</th>
    </tr>
  </thead>
  <tbody>
    @foreach($bantuan as $item)
    <tr>
      <th scope="row">1</th>
      <td>{{$item->nama_instansi}}</td>
      <td>{{$item->nama_element}}</td>
      <td>{{$item->kuantitas}}</td>
    </tr>
   @endforeach
  </tbody>
</table>
</div>
</div>
</div>
@endsection