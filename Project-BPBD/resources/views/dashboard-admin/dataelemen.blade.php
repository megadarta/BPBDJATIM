@extends('dashboard-admin\layout\main')

@section('style')
    <link rel="stylesheet" type="text/css" href="{{ asset('css/admin-bencana.css') }}"></link>
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
                        <a href="/admin/data/history/data-bencana" class="pilihan-menu">Data Bencana</a>
                    </li>
                    <li>
                        <a href="/admin/data/history/data-elemen" class="pilihan-menu" style="background-color: #FE5E32; color: white:">Data Sumber Daya</a>
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
                 
                </div>
@endsection


@section('dashboard-admin')
<div class="content-bawah"> 
<div>
    <div class=" d-flex bencana-atas justify-content-between">
        <div class="judul">Data Sumber Daya </div>
        <a href="" data-bs-toggle="modal" data-bs-target="#tambahelemen">
        <div class="btn button-new d-flex justify-content-center align-items-center">
            <div class="btn-new"><img src="{{asset('assets/plus.png')}}" style="width: 20px"></div>
            <div class="new">New</div>
        </div></a>
    </div>
    @if ($errors->any())
        @foreach ($errors->all() as $error)
            <p class="alert alert-danger card-text">{{$error}}</p>
        @endforeach
    @endif
    <div>
    <table class="table table-bencana" id="dataelement">
    <thead>
        <tr>
        <th scope="col">No</th>
        <th scope="col">Gambar</th>
        <th scope="col">Nama Sumber Daya</th>
        <th scope="col">Action</th>
        </tr>
    </thead>
    <tbody>
    <?php $i=1 ?>
    @foreach($data_elemen as $row)
        <tr>
            <th scope="row">{{$i}}</th>
            <td><img src="{{url('assets/icon/', $row->icon)}}" width="20px" style="margin-left: 13px;"></td>
            <td>{{$row->nama_element}}</td>
            <td>
            <a onclick="return confirm('Apakan Anda Yakin Untuk Menghapus Sumber Daya Ini?')" href="{{url('elemen/delete', $row->id)}}"><img src="{{asset('assets/delete.png')}}" width="20px" ></a>
            <a href="" class="editelemen" data-bs-toggle="modal" data-bs-target="#modaledit" data-nama="{{$row->nama_element}}" data-icon="{{$row->icon}}" data-idelement="{{$row->id}}"><img src="{{asset('assets/edit.png')}}" width="20px" ></a>
            </td>
        </tr>
    <?php $i++ ?>
    @endforeach
    </tbody>
    </table>
    </div>
</div>
</div>

<!-- modal tambah elemen -->
<div class="modal fade" id="tambahelemen" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Data Sumber Daya</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('simpan element') }}" enctype="multipart/form-data" method="post" id="tambahelemenform">
                {{csrf_field()}}

                <div class="modal-body">            
                    <label class="form-label">Nama Sumber Daya</label>
                    <input name="nama_element" id="nama_element" type="text" class="form-control" value="">

                    <label class="form-label">Masukkan Icon</label>
                    <input name="icon" id="icon" type="file" class="form-control" value="">
                
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Upload</button>                
                </div>
            </form>
        </div>
    </div>    
</div>
<!-- endmodal -->

<!-- modal edit elemen  -->
<div class="modal fade" id="modaledit" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Data Sumber Daya</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ url('/elemen/update', 'test') }}" enctype="multipart/form-data" method="post" id="tambahelemenform">
                {{csrf_field()}}

                <div class="modal-body">    
                    <input type="hidden" name="id" id="id" value="">         
                    <label class="form-label">Nama Sumber Daya</label>
                    <input name="nama_element" id="nama_element" type="text" class="form-control" value="">

                    <label class="form-label">Masukkan Icon</label>
                    <input name="icon" id="icon" type="file" class="form-control" value="">
                
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

     
<script>
    $('.editelemen').on('click', function (){
        // var button = $(event.releatedTarget)
        var nama = $(this).data('nama');
        var icon = $(this).data('icon');
        var id = $(this).data('idelement');
        console.log(id);
        var modal = $('#modaledit');
        modal.find('.modal-body #nama_element').val(nama);
        modal.find('.modal-body #icon').val(icon);
        modal.find('.modal-body #id').val(id);
        
    })
</script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.1.2/dist/sweetalert2.all.min.js"></script>
@endsection

@section('script')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>

<!-- data table -->
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.25/js/dataTables.bootstrap4.min.js"></script>

<script>
    $(document).ready(function() {
    $('#dataelement').DataTable();
    
} );
</script>
@endsection