@extends('layout/main');

@section('style')
<style>
           
            .navbar{
                height: 80px;
                background-color: black;
                /* margin-bottom: 30px; */
            }
            .logo-atas-navbar{
                width: 50px;
            }
            .nama-atas-navbar{
                font-size: 8px;
                text-align: start;
                margin: auto 0px auto 10px;
                font-family: IBM Plex Sans;
                font-style: normal;
                font-weight: normal;
            }
            .navbar-kiri{
                color: white;
                margin-left: 30px;
            }
            .navbar-kanan{
                color: white;
            }
</style>
@endsection 

@section('navbar')
<div className="navbar d-flex  ">
        
        <div className="d-flex navbar-kiri">
             <div>
               <img className="logo-atas-navbar" src={bpbd}></img>
             </div>
             <div className="nama-atas-navbar">
             
               Badan Penanggulangan <br></br>
               Bencana Daerah <br></br>
               Provinsi Jawa Timur <br></br>
             </div>
         </div>
 
         <div className="navbar-kanan nav-item dropdown">
           <p class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
             Hi, Dinkes
           </p>
           <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                 <li><a class="dropdown-item" href="#">Profile</a></li>
                 <li><a class="dropdown-item" href="#">Logout</a></li>
           </ul>
         </div>
     </div>
@endsection 
