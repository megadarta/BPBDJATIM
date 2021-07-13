@extends('layouts.login-register')

@section('content')
<link rel="stylesheet" type="text/css" href="{{ asset('css/login.css') }}">
<div class="d-flex flex-column align-items-center login-tengah container">
    <div class='form-login' id="form-login">
        <div class="namelogin"><b>LOGIN</b></div>
        <div class="d-flex flex-column justify-content-start">
            <form method="POST" action="{{ route('login') }}">
                @csrf
                <label for="email" class="form-label form-login-text "> Email </label>
                <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus></input>
                @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
                <label for="password" class="mt-4 form-label form-login-text">Password</label>
                <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password" required autocomplete="current-password"></input>
                @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
                <button type="submit" class="button-login"><b>Login</b></button>
                <br>
                @if (Route::has('password.request'))
                <a class="a-lupapassword" href="{{ route('password.request') }}">
                    Lupa Password?
                </a>
                @endif                
            </form>
        </div>
    </div>

    <div class="mt-4 text-regis">Tidak memiliki akun? <a class="a-regis" href="{{ route('register') }}">Registrasi</a> </div>
</div>

@endsection
