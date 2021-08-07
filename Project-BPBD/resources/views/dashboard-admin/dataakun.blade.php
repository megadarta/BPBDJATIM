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
                        <div><img class="icon-btn-menu" src="{{ asset('assets/menu-akun-active.png') }}"></div>
                        <div><p  class="text-sidebar true">Data Akun</p></div>   
                    </div>               
                </a>
            </li>
        </ul> 
@endsection

@section('dashboard-admin')
<div class="content-bawah"> 
<div>
  <div class=" d-flex bencana-atas justify-content-between">
        <div class="judul">Data Akun </div>
        <!--
        <div class="btn button-new d-flex justify-content-center align-items-center">
            <div class="btn-new"><img src="{{asset('assets/plus.png')}}" style="width: 20px"></div>
            <div class="new">New</div>
        </div>
        -->
  </div>

  <div>
  <table class="table table-bencana">
  <thead>
    <tr>
      <th scope="col">No</th>
      <th scope="col">Nama Instansi</th>
      <th scope="col">Email</th>
      <th scope="col">Nomor Telepon</th>
      <th scope="col">Role</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
    @php
        $i = 0;
    @endphp 
    @foreach ($data_akun as $akun)
    <tr>
        <th scope="row">{{ ++$i }}</th>
        <td>{{ $akun->nama_instansi }}</td>
        <td>{{ $akun->email }}</td>
        <td>{{ $akun->no_telepon }}</td>
        <td>{{ $akun->role }}</td>
        <td>
            <a href="{{ url('akun/delete', $akun->id) }}"><img src="{{asset('assets/delete.png')}}" width="20px" ></a>
            <a href=""><img src="{{asset('assets/edit.png')}}" width="20px" ></a>
        </td>
    </tr>
    @endforeach
  </tbody>
</table>
</div>
</div>
</div>
@endsection