@extends('layout\main')

@section('style')
    <link rel="stylesheet" type="text/css" href={!! resource('css/login.css') !!}></link>

@endsection

@section('content')
        
        <!-- form login  -->
        <div class="d-flex flex-column align-items-center login-tengah container">
            <div class='form-login' id="form-login">
              <div class="namelogin"><b>LOGIN</b></div>
              <div class="d-flex flex-column justify-content-start">
                <label class="form-label form-login-text ">Email</label>
                <input type="email" class="form-control" id="email"></input>
                <label class="mt-4 form-label form-login-text ">Password</label>
                <input type="password" class="form-control" id="password"></input>

                <button class="button-login"><b>Login</b></button>
                <a href="" class="a-lupapassword">Lupa Password?</a>
              </div>
            </div>

            <div class="mt-4 text-regis">Tidak memiliki akun? <a class="a-regis" href="/register">Registrasi</a> </div>
        </div>


@endsection
