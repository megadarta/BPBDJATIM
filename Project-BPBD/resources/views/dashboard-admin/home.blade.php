@extends('dashboard-admin\layout\main')

@section('style')
    <link rel="stylesheet" type="text/css" href="{{ asset('css/menu-data-admin.css') }}"></link>
@endsection
@section('dashboard-admin')
<nav>
        <div class="container-fluid">

            <button type="button" id="sidebarCollapse" class="btn-menu">
                <img class="icon-btn-menu" src="{{ asset('assets/menu.png') }}">
            </button>

        </div>
    </nav>

    
@endsection