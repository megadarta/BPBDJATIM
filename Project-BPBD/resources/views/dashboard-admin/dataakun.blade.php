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
        <a href="" data-bs-toggle="modal" data-bs-target="#tambahakun">
        <div class="btn button-new d-flex justify-content-center align-items-center">
            <div class="btn-new"><img src="{{asset('assets/plus.png')}}" style="width: 20px"></div>
            <div class="new">New</div>
        </div>
        </a>
  </div>

  <div class="table-responsive">
  <table class="table table-bencana">
  <thead>
    <tr>
      <th scope="col">No</th>
      <th scope="col">Nama Akun</th>
      <th scope="col">Email</th>
      <th scope="col">Institusi</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
    <tr>
        <th scope="row">1</th>
        <td>Dinkes</td>
        <td>dinkes@gmail.com</td>
        <td>Dinas Kesehatan</td>
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

<!-- modal tambah elemen -->
<div class="modal fade" id="tambahakun" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Tambah Data Akun</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form action="{{ url('/elemen/create') }}" enctype="multipart/form-data" method="post" id="tambahelemenform">
                    {{csrf_field()}}

                    <div class="modal-body">            
                        <label class="form-label">Nama Akun</label>
                        <input name="nama_akun" id="nama_akun" type="text" class="form-control" value="">

                        <label class="form-label">Email</label>
                        <input name="email" id="email" type="text" class="form-control" value="">

                        <label class="form-label">Nama Institusi</label>
                        <input name="icon" id="icon" type="text" class="form-control" value="">
                    
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Buat</button>
                    </form>
                    </div>
                </div>
            </div>
        </div>    
</div>
<!-- endmodal -->
@endsection