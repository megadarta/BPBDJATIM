@extends('landingpage\layout\main')

@section('home')
<!-- landing page home  -->
<div class="landing-page-home d-flex justify-content-around">
            <div class="home-kiri">
                <div class="judul-home-lp">Pendataan Bantuan Bencana Jawa Timur</div>
                <div class="text-home-lp">Aplikasi ini digunakan dalam pengisian data pemberi bantuan dalam bencana yang terjadi di wilayah Jawa Timur</div>
                <div>
                    <button type="button" class="btn btn-readmore">Informasi Lebih Lanjut</button>
                </div>
            </div>
            <div>
                <img src="{{ asset('assets/peta2.png') }}" width="500px">
            </div>
        </div> 
@endsection