@extends('auth\layout\main')

@section('style')
    <link rel="stylesheet" type="text/css" href="{{ asset('css/register.css') }}"></link>

@endsection


@section('content')
<body>
<x-header />

<!-- start form regis  -->
<div class="d-flex flex-column align-items-center login-tengah container">
  <div class='form-regis' id="form-login">
    <div class="nameregis"><b>REGISTER</b></div>
    <div class="d-flex flex-column justify-content-start">
      <form method="POST" action="{{ route('register') }}">
        @csrf  

        <input id="email" type="email" placeholder="Email" class="form-control mt-4 input-regis-placeholder @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
        @error('email')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror

        <input id="nama_instansi" type="text" placeholder="Nama Instansi" class="form-control mt-4 input-regis-placeholder @error('nama_instansi') is-invalid @enderror" name="nama_instansi" value="{{ old('nama_instansi') }}" required autocomplete="nama_instansi" autofocus>
        @error('nama_instansi')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror

        <input id="no_telepon" type="text" placeholder="Nomor Telepon" class="form-control mt-4 input-regis-placeholder @error('no_telepon') is-invalid @enderror" name="no_telepon" value="{{ old('no_telepon') }}" required autocomplete="no_telepon" autofocus>
        @error('no_telepon')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror

        <input id="password" type="password" placeholder="Password" class="form-control mt-4 input-regis-placeholder @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
        @error('password')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror

        <input id="password-confirm" type="password" placeholder="Confirm Password" class="form-control mt-4 input-regis-placeholder" name="password_confirmation" required autocomplete="new-password">
        
        <br/>
        <div class="g-recaptcha" data-sitekey="{{config('services.recaptcha.key')}}"></div>

        <div class="div-button-regis">      
            <button class="button-regis"><b>Register</b></button>
        </div>                    
      </form>
    </div>
  </div>

  <div class="mt-4 text-login">Sudah memiliki akun? <a class="a-login" href="{{ route('login') }}">Login</a> </div>
</div>
<!-- end form regis  -->

<x-footer />

<!-- script  -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>

</body>
@endsection
