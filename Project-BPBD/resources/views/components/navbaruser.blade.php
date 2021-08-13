<div class="navbar d-flex  ">
        
  <div class="d-flex navbar-kiri">
    <div>
      <img class="logo-atas-navbar" src="{{ asset('assets/bpbd.png') }}">
    </div>
    <div class="nama-atas-navbar">
    
      Badan Penanggulangan <br>
      Bencana Daerah <br>
      Provinsi Jawa Timur <br>
    </div>
  </div>

  <div class="navbar-kanan nav-item dropdown">
      <p class="nav-link-p dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
        Hi, {{ Auth::user()->nama_instansi }}
      </p>
      <ul class="dropdown-menu jarak-ul" aria-labelledby="navbarDropdownMenuLink">
        <li>
          <a class="dropdown-item" href="#">Profile</a>
        </li>
        <li>
          <a class="dropdown-item" href="{{ route('logout') }}"
            onclick="event.preventDefault();
            document.getElementById('logout-form').submit();">
            {{ __('Logout') }}
          </a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
            @csrf
            </form>
        </li>
      </ul>
  </div>
</div>