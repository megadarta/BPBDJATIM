<nav class="navbar navbar-expand-lg navbar-light navbar-app">
  <div class="container-fluid">

    <!-- logi kiri  -->
    <div class="navbar-kiri">
        <img class="logo-atas-navbar" src="{{ asset('assets/bpbd.png') }}">
    </div>

    
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    
    <div class="collapse menu-navbar navbar-collapse" id="navbarNavAltMarkup">
      <!-- menu tengah  -->
      <div class="navbar-nav">
        <a class="nav-link active menu-nav" aria-current="page" href="#home">Home</a>
        <a class="nav-link active menu-nav" aria-current="page" href="#maps">Maps</a>
        <a class="nav-link active menu-nav" aria-current="page" href="#fitur">Fitur</a>
        <a class="nav-link active menu-nav" aria-current="page" href="#action">Action</a>
        <!-- <a class="nav-link active menu-nav" aria-current="page" href="#">About</a> -->
      </div>

      <!-- button login regis  -->
      <div class="navbar-kanan nav-item dropdown ml-auto">
        <a href="{{ route('login') }}"><button  type="button" class="btn btn-login-landingpage">Login</button></a>
        <a href="{{ route('register') }}" ><button type="button" class="btn btn-register-landingpage">Register</button></a>
      </div>
    </div>

    

    
    
  </div>
</nav>