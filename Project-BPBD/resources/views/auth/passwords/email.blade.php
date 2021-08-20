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
        <div class="namelogin"><b>{{ __('Reset Password') }}</b></div>
        <div class="d-flex flex-column justify-content-start">
            @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
            @endif
            <form method="POST" action="{{ route('password.email') }}">
                @csrf
                <label for="email" class="form-label form-login-text "> Email </label>
                <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus></input>
                @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
                <div class="div-button-login">
                    <button type="submit" class="button-login"><b>{{ __('Kirim') }}</b></button>
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
