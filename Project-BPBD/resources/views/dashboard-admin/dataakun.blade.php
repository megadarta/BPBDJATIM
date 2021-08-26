@extends('dashboard-admin\layout\main')

@section('style')
    <link rel="stylesheet" type="text/css" href="{{ asset('css/admin-bencana.css') }}"></link>
@endsection

@section('navbar-admin')
<div class="d-flex container-fluid content-atas">
                    <div class="content-btn-menu">
                        <button type="button" id="sidebarCollapse" class="btn-menu">
                            <img class="icon-btn-menu" src="{{ asset('assets/menu.png') }}">
                        </button>
                    </div>
                </div>
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
                        <a href="/admin/data/history/data-elemen" class="pilihan-menu">Data Sumber Daya</a>
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
  </div>

  <div class="table-responsive">
  <table class="table table-bencana" id="tampilakun">
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
    <?php $i=1; ?>
    @foreach($data_akun as $row)
    <tr>
        <th scope="row">{{$i}}</th>
        <td>{{$row->nama_instansi}}</td>
        <td>{{$row->email}}</td>
        <td>{{$row->no_telepon}}</td>
        <td>{{$row->role}}</td>
        <td>
            <a href="{{url('akun/delete', $row->id)}}"><img src="{{asset('assets/delete.png')}}" width="20px" ></a>
            <a class="editakun" data-bs-toggle="modal" data-bs-target="#modaledit" data-nama="{{$row->nama_instansi}}" data-email="{{$row->email}}" data-notelp="{{$row->no_telepon}}" data-id="{{$row->id}}"><img src="{{asset('assets/edit.png')}}" width="20px" ></a>
        </td>
    </tr>
    <?php $i++ ?>
    @endforeach
  </tbody>
</table>
</div>
</div>
</div>

<!-- modal edit elemen  -->
<div class="modal fade" id="modaledit" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Akun</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ url('/akun/update', 'test') }}" method="post" id="tambahelemenform">
                {{csrf_field()}}

                <div class="modal-body">      
                    <input type="hidden" name="id" id="id" value="">      
                    <label class="form-label">Nama Intansi</label>
                    <input name="nama_instansi" id="nama_instansi" type="text" class="form-control" value="">

                    <label class="form-label">Email</label>
                    <input name="email" id="email" type="text" class="form-control" value="">

                    <label class="form-label">Nomor Telepon</label>
                    <input name="notelp" id="notelp" type="text" class="form-control" value="">

                    <label class="form-label">Role</label>
                    <select class='form-select' aria-label='Default select example' name='role' id='role'>
                            <option value=''>Pilih Role</option>
                            <option value='admin'>Admin</option>
                            <option value='user'>User</option>
                        </select>
                
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Update</button>
                </div>
            </form>
        </div>
    </div>    
</div>
<!-- endmodal -->
@endsection

@section('script')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>

<script>
     $('.editakun').on('click', function (){
        var nama = $(this).data('nama');
        var email = $(this).data('email');
        var notelp = $(this).data('notelp');
        var id = $(this).data('id');
    
        var modal = $('#modaledit');
        modal.find('.modal-body #nama_instansi').val(nama);
        modal.find('.modal-body #email').val(email);
        modal.find('.modal-body #notelp').val(notelp);
        modal.find('.modal-body #id').val(id);
        
    })
</script>

<!-- data table -->
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.25/js/dataTables.bootstrap4.min.js"></script>

<script>
    $(document).ready(function() {
    $('#tampilakun').DataTable();
    
} );
</script>
@endsection