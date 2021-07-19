@extends('auth\layout\main')

@section('style')
    <link rel="stylesheet" type="text/css" href="{{ asset('css/register.css') }}"></link>

@endsection


@section('content')
<x-header />

<div class="d-flex flex-column align-items-center login-tengah container">
            <div class='form-regis' id="form-login">
              <div class="nameregis"><b>REGISTER</b></div>
              <div class="d-flex flex-column justify-content-start">
                <input type="email" placeholder="Email" class="form-control mt-4 input-regis-placeholder">
                <input type="text" placeholder="Nama Instansi" class="form-control mt-4 input-regis-placeholder">
                <input type="text" placeholder="Nomor Telepon" class="form-control mt-4 input-regis-placeholder">
                <input type="password" placeholder="Password" class="form-control mt-4 input-regis-placeholder">
                <input type="password" placeholder="Confirm Password" class="form-control mt-4 input-regis-placeholder">

                <button class="button-regis"><b>Register</b></button>
              </div>
            </div>

            <div class="mt-4 text-login">Sudah memiliki akun? <a class="a-login" href="/login">Login</a> </div>
        </div>

        <x-footer />
@endsection
