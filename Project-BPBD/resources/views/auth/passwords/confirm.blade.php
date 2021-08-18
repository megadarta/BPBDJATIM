@extends('auth\layout\main')

@section('style')
    <link rel="stylesheet" type="text/css" href="{{ asset('css/login.css') }}"></link>
@endsection

@section('content')
<body>
    <x-header />

    <!-- form login  -->
    <div class="d-flex flex-column align-items-center login-tengah container">
        <div class='form-login' id="form-login">
        <div class="namelogin"><b>{{ __('Confirm Password') }}</b></div>
        <div class="d-flex flex-column justify-content-start">
            {{ __('Please confirm your password before continuing.') }}
            <br><br>
            <form method="POST" action="{{ route('password.confirm') }}">
                @csrf
                
                <label for="password" class="form-label form-login-text "> Password</label>
                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
                
                <div class="div-button-login">
                    <button type="submit" class="button-login"><b>{{ __('Confirm Password') }}</b></button>
                    <br><br>
                    @if (Route::has('password.request'))
                    <div class="div-lupapassword">
                    <a class="a-lupapassword" href="{{ route('password.request') }}">
                        Lupa Password?
                    </a>
                    </div>
                    @endif  
                </div>             
            </form>
            </div>
        </div>
    </div> 
    <!-- end form login -->

    <x-footer />

    <!-- script  -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>

</body>
@endsection
