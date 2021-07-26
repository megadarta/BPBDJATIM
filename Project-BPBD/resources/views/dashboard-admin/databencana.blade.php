@extends('dashboard-admin\layout\main')

@section('style')
    <link rel="stylesheet" type="text/css" href="{{ asset('css/admin-bencana.css') }}"></link>
@endsection

@section('sidebar-admin')
<ul class="list-unstyled components">
            <li>
                <a href="/admin/data/home">
                    <div class="d-flex menu">
                        <div><img class="icon-btn-menu" src="{{ asset('assets/menu-sidebar.png') }}"></div>
                        <div><p  class="text-sidebar">Home</p></div>  
                    </div>  
                </a>
            </li>
            <li>
                <a href="#pageSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle menu-sidebar">
                    <div class="d-flex menu">
                        <div><img class="icon-btn-menu" src="{{ asset('assets/menu-history-active.png') }}"></div>
                        <div><p  class="text-sidebar true">History</p></div>
                    </div>
                </a>
                <ul class="collapse list-unstyled" id="pageSubmenu">
                    <li>
                        <a href="/admin/data/history/data-bencana" class="pilihan-menu" style="background-color: #FE5E32; color: white:">Data Bencana</a>
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
<div>
  <div class=" d-flex bencana-atas justify-content-between">
        <div class="judul">Data Bencana </div>
        <div class="btn button-new d-flex justify-content-center align-items-center">
            <div class="btn-new"><img src="{{asset('assets/plus.png')}}" style="width: 20px"></div>
            <div class="new">New</div>
        </div>
  </div>

  <div>
  <table class="table table-bencana">
  <thead>
    <tr>
      <th scope="col">No</th>
      <th scope="col">Nama Bencana</th>
      <th scope="col">Tanggal Bencana</th>
      <th scope="col">Waktu Bencana</th>
      <th scope="col">Titik Lokasi</th>
      <th scope="col">Status</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
    <tr>
        <th scope="row">1</th>
        <td>Pemadam Kebakaran</td>
        <td>20/04/2021</td>
        <td>12:00 WIB</td>
        <td>Malang</td>
        <td>Aktif</td>
        <td>
            <a href=""><img src="{{asset('assets/delete.png')}}" width="20px" ></a>
            <a href=""><img src="{{asset('assets/edit.png')}}" width="20px" ></a>
        </td>
    </tr>
   
  </tbody>
</table>
</div>
</div>
</div>
@endsection