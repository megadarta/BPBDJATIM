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
                <div class="mb-3">
                    <label for="nama" class="form-label">Nama Instansi</label><br>
                    <input value="{{Auth::user()->nama_instansi}}" type="text" class="nama" id="nama" aria-describedby="Masukkan nama instansi">
                </div>

                <div class="mb-3">
                    <label for="email" class="form-label">Email</label><br>
                    <input value="{{Auth::user()->email}}" type="email" class="email" id="email" aria-describedby="Masukkan email">
                </div>

                <div class="mb-3">
                    <label for="nohp" class="form-label">Nomor Telepon</label><br>
                    <input value="{{Auth::user()->no_telepon}}" type="text" class="nohp" id="nohp" aria-describedby="Masukkan no HP">
                </div>

                <div class="mb-3">
                    <label for="pass" class="form-label">Passoword</label><br>
                    <input value="{{Auth::user()->password}}" type="password" class="pass" id="pass" aria-describedby="Masukkan no HP">
                </div>
                
                <!-- button  -->
                <div class="d-flex button-profile">                
                    <button type="button" class="mr-4 btn btn-secondary">Batal</button>
                    <button type="button" class="btn btn-simpan">Simpan</button>
                </div>

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