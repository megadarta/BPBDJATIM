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

@section('navbar-admin')
<div class="d-flex container-fluid content-atas">
                    <div class="content-btn-menu">
                        <button type="button" id="sidebarCollapse" class="btn-menu">
                            <img class="icon-btn-menu" src="{{ asset('assets/menu.png') }}">
                        </button>
                    </div>
                    <div class="input-group content-home-admin">
                        <span class="input-group-text icon-search" ><img src="{{asset('assets/search.png')}}" style="width: 18px"></span>
                        <input type="text" id="search" class="form-control input-search" placeholder="Cari" aria-label="Search" aria-describedby="basic-addon1">
                    </div>
                </div>
@endsection

@section('dashboard-admin')
<div class="content-bawah"> 
  <div class="row row-cols-auto cardbencana">
     
  </div>
</div>
@endsection

@section('script')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
<script>
    $(document).ready(function(){

    fetch_data_home();

    function fetch_data_home(query = '')
    {
    $.ajax({
    url:"{{ route('home.search') }}",
    method:'GET',
    data:{query:query},
    dataType:'json',
    success:function(data)
    {
        $('.cardbencana').html(data.table_data);
    }
    })
    }

    $(document).on('keyup', '#search', function(){
    var query = $(this).val();
    fetch_data_home(query);
    });
    });
</script>
@endsection