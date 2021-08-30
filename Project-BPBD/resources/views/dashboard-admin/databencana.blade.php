@extends('dashboard-admin\layout\main')

@section('style')
    <link rel="stylesheet" type="text/css" href="{{ asset('css/admin-bencana.css') }}"></link>

    <!-- bootstrap cdn  -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css"
    integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
@endsection

@section('navbar')
<x-navbaradmin />
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
                        <a href="/admin/data/history/data-elemen" class="pilihan-menu">Data Sumber Daya</a>
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
  <div class=" d-flex bencana-atas justify-content-between">
        <div class="judul">Data Bencana </div>
  </div>

  <div class="table-responsive">
  <table class="table table-bencana"  class="example" id="example">
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
  <?php $i=1 ?>
  @foreach($data_bencana as $item)
  <tr>
                    <th scope="row">{{$i}}</th>
                    <td>{{$item->nama_bencana}}</td>
                    <td>{{date('d-m-Y', strtotime($item->tanggal))}}</td>
                    <td>{{date('H:i', strtotime($item->tanggal))}}</td>
                    <td>{{$item->lokasi}}</td>
                    <td>{{$item->status_bencana}}</td>
                    <td>
                        <a href="{{ url('bencana/delete', $item->id)}}"><img src="{{asset('assets/delete.png')}}" width="20px" ></a>
                        <a class="buttonedit" type="button" id="buttonedit" data-bs-toggle="modal" data-bs-target="#modaledit" data-mynama="{{$item->nama_bencana}}" data-lokasi="{{$item->lokasi}}" data-tanggal="{{$item->tanggal}}" data-status="{{$item->status}}" data-longitude="{{$item->longitude}}" data-latitude="{{$item->latitude}}" data-id="{{$item->id}}" ><img src="{{asset('assets/edit.png')}}" width="20px" ></a>
                    </td>
                    </tr>
    <?php $i++ ?>
    @endforeach

  </tbody>
</table>
</div>
</div>

<!-- modal  -->
<div class="modal fade" id="modaledit" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Edit Titik Bencana</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form action="{{ url('/bencana/update', 'test') }}" method="post" id="editform">
                    {{csrf_field()}}

                    <div class="modal-body">            
                        <input type="hidden" name="id" id="id" value="">
                        <label class="form-label">Nama Bencana</label>
                        <input name="nama_bencana" id="nama_bencana" type="text" class="form-control" value="">

                        <label class="form-label">Tanggal</label>
                        <input name="tanggal" id="tanggal" type="datetime-local" class="form-control" value="">

                        <label class="form-label">Lokasi</label>
                        <input name="lokasi" id="lokasi" type="text" class="form-control" value="">

                        <label class="form-label">Latitude</label>
                        <input id="latitude" name="latitude" type="text" class="form-control" value="">

                        <label class="form-label">Longitude</label>
                        <input id="longitude" type="text" name="longitude" class="form-control" value="" >

                        <label class="form-label" id="statusselect">Status</label>
                        <select class='form-select' aria-label='Default select example' name='status_bencana' id='status_bencana'>
                            <option value='Aktif'>Aktif</option>
                            <option value='Nonaktif'>Nonaktif</option>
                        </select>
                    
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Update</button>
                    </form>
                    </div>
                </div>
            </div>
        </div>    
</div>
@endsection

@section('script')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>

<script>
    $('.buttonedit').on('click', function (){
        
        var nama = $(this).data('mynama');
        var lokasi = $(this).data('lokasi');
        var id = $(this).data('id');
        var tanggal = $(this).data('tanggal');
        var longitude = $(this).data('longitude');
        var latitude = $(this).data('latitude');
        console.log(latitude);
        console.log(longitude);
        
        console.log(new Date(tanggal).toISOString());
        console.log(tanggal);
        var modal = $('#modaledit');
        modal.find('.modal-body #nama_bencana').val(nama);
        modal.find('.modal-body #lokasi').val(lokasi);
        
        modal.find('.modal-body #tanggal').val(new Date(tanggal).toISOString().slice(0,16));
        modal.find('.modal-body #latitude').val(latitude);
        modal.find('.modal-body #longitude').val(longitude);
        modal.find('.modal-body #id').val(id);
        
    })
</script>

<script>

</script>
<!-- data table -->
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.25/js/dataTables.bootstrap4.min.js"></script>

<script>
$(document).ready(function() {
    $('#example').DataTable();
    
} );
</script>

@endsection