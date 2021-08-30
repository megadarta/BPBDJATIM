@extends('dashboard-admin\layout\main')

@section('style')
    <link rel="stylesheet" type="text/css" href="{{ asset('css/detail-bencana.css') }}"></link>
    <link rel="stylesheet" type="text/css" href="{{ asset('css/admin-bencana.css') }}"></link>
    <!-- data table  -->
    <!-- <link href="https://cdn.datatables.net/buttons/2.0.0/css/buttons.dataTables.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.11.0/css/jquery.dataTables.min.css" rel="stylesheet"> -->
@endsection

@section('navbar')
<x-navbaradmin />
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
        <input type="hidden" id="nama-bencana" value="{{$bencana->nama_bencana}}">
        <div class="judul-detail">{{$bencana->nama_bencana}}</div>
        <div class="info-detail">
        Waktu   : {{$bencana->tanggal}} <br>                 
        Lokasi  : {{$bencana->lokasi}}
        </div>
  </div>

  <div class="table-responsive">
    <div class="text-export">Export : </div>
  <table class="table table-bencana" id="detail-bencana" >
  <thead>
    <tr>
      <th scope="col">No</th>
      <th scope="col">Nama Institusi</th>
      <th scope="col">Sumber Daya</th>
      <th scope="col">Kuantiitas</th>
    </tr>
  </thead>
  <tbody>
    <?php 
        $i = 1;
    ?>
    @foreach($bantuan as $item)
    <tr>
      <th scope="row">{{$i}}</th>
      <td>{{$item->nama_instansi}}</td>
      <td>{{$item->nama_element}}</td>
      <td>{{$item->kuantitas}}</td>
    </tr>
    <?php $i++; ?>
   @endforeach
  </tbody>
</table>
</div>
</div>
</div>
@endsection

@section('script')
<!-- data table -->
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.11.0/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.0.0/js/dataTables.buttons.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/2.0.0/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.0.0/js/buttons.print.min.js"></script>


<script>
$(document).ready(function() {
    var namabencana =  document.getElementById("nama-bencana").value;
    console.log(namabencana);
    $('#detail-bencana').DataTable( {
        dom: 'Bfrtip',
        buttons : [
            {
                extend : 'excel',
                title : namabencana,
                download : 'open'
            },
            {
                extend : 'pdf',
                title : namabencana,
                download : 'open'
            }
        ]
    } );
} );
</script>
@endsection