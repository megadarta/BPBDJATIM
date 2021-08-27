@extends('dashboard-admin\layout\main')

@section('style')

    <link rel="stylesheet" type="text/css" href="{{ asset('css/profile.css') }}"></link>
        
@endsection

@section('dashboard-admin')
<div class="container">
    <div class="profile isi-profile justify-content-center">
        
        <div class="judul-edit">
           <h1 >Edit Profile</h1>
        </div>    

        <div class="d-flex justify-content-center">
            <div class="background-img">
                <img src="{{ asset('assets/teamwork.png')}}" class="img-profile img-circle">
            </div>

            <div class="form-edit-profile">

                <!-- form  -->
            <form action="{{ url('/profile/update', 'test') }}" method="post" id="editprofile">
                {{csrf_field()}}

                <div class="mb-3">
                    <label for="nama_instansi" class="form-label">Nama Instansi</label><br>
                    <input value="{{Auth::user()->nama_instansi}}" type="text" class="nama_instansi" id="nama_instansi" aria-describedby="Masukkan nama instansi">
                </div>

                <div class="mb-3">
                    <label for="email" class="form-label">Email</label><br>
                    <input value="{{Auth::user()->email}}" type="email" class="email" id="email" aria-describedby="Masukkan email">
                </div>

                <div class="mb-3">
                    <label for="no_telepon" class="form-label">Nomor Telepon</label><br>
                    <input value="{{Auth::user()->no_telepon}}" type="text" class="no_telepon" id="no_telepon" aria-describedby="Masukkan no HP">
                </div>
                
                <!-- button  -->
                <div class="d-flex button-profile">                
                    <a href="{{ url('/admin/data/home') }}" type="button" class="mr-4 btn btn-secondary">Batal</a>
                    <a href="{{ url('/update-profile') }}" type="submit" class="btn btn-simpan">Simpan</a>
                </div>  
            </form>
            </div>
        </div>
    </div>
</div>
@endsection

@section('script')
<!-- leaflet js  -->
<script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"
        integrity="sha512-XQoYMqMTK8LvdxXYG3nZ448hOEQiglfqkJs1NOQV44cWnUrBc8PkAOcXy20w0vlaXaVUearIOBhiXZ5V3ynxwA=="
        crossorigin="">
</script>

<!-- jQuery  -->
<script src="https://code.jquery.com/jquery-3.3.1.min.js"
        integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous">
</script>


@endsection