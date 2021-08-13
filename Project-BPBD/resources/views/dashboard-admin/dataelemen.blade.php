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

@section('dashboard-admin')
<div class="content-bawah"> 
<div>
    <div class=" d-flex bencana-atas justify-content-between">
        <div class="judul">Data Elemen </div>
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
    <table class="table table-bencana">
    <thead>
        <tr>
        <th scope="col">No</th>
        <th scope="col">Gambar</th>
        <th scope="col">Nama Elemen</th>
        <th scope="col">Action</th>
        </tr>
    </thead>
    <tbody>
        
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
                <h5 class="modal-title" id="exampleModalLabel">Tambah Data Elemen</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('simpan element') }}" enctype="multipart/form-data" method="post" id="tambahelemenform">
                {{csrf_field()}}

                <div class="modal-body">            
                    <label class="form-label">Nama Elemen</label>
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
                <h5 class="modal-title" id="exampleModalLabel">Tambah Data Elemen</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ url('/elemen/update', 'test') }}" enctype="multipart/form-data" method="post" id="tambahelemenform">
                {{csrf_field()}}

                <div class="modal-body">            
                    <label class="form-label">Nama Elemen</label>
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
    $('#editelemen').on('click', function (){
        // var button = $(event.releatedTarget)
        var nama = $(this).data('nama');
        var icon = $(this).data('icon');
    
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
<script>
    $(document).ready(function(){

    fetch_data_element();

    function fetch_data_element(query = '')
    {
    $.ajax({
    url:"{{ route('element.search') }}",
    method:'GET',
    data:{query:query},
    dataType:'json',
    success:function(data)
    {
        $('tbody').html(data.table_data);
    }
    })
    }

    $(document).on('keyup', '#search', function(){
    var query = $(this).val();
    fetch_data_element(query);
    });
    });
</script>
@endsection