<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>BPBD-JATIM</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=IBM+Plex+Sans:wght@200;300;400&display=swap" rel="stylesheet">
        
        <!-- animate  -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>

        <!-- Bootstrap -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        
        <!-- Scrollbar Custom CSS -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.min.css"> 
        <!-- Styles -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300&display=swap" rel="stylesheet">
        
        <link rel="stylesheet" type="text/css" href="{{ asset('css/navbar-home.css') }}"></link>
        <link rel="stylesheet" type="text/css" href="{{ asset('css/landingpage.css') }}"></link>
        <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/sweetalert2@9.17.2/dist/sweetalert2.min.css">

        @yield('style')
        
        <!-- leaflet  -->
        <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css"
        integrity="sha512-xodZBNTC5n17Xt2atTPuE1HxjVMSvLVW9ocqUKLsCC5CXdbqCmblAshOMAS6/keqq/sMZMZ19scR4PsZChSR7A=="
        crossorigin=""/>

        <!-- bootstrap cdn  -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css"
        integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
        
        <link rel="stylesheet" type="text/css" href="{{ asset('css/footer.css') }}"></link>
        
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=IBM+Plex+Sans:wght@200;300;400&display=swap" rel="stylesheet">
        <!-- <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script> -->
        <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script> 
        <!-- jQuery CDN - Slim version (=without AJAX) -->
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <!-- Popper.JS -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
        <!-- Bootstrap JS -->
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>
        <!-- jQuery Custom Scroller CDN -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.concat.min.js"></script>
    </head>
    <body>
    
    <!-- navbar  -->
    <x-navbarhome />
    
    <div class="container">
        <!-- landing page home  -->
        <div class="landing-page-home d-flex  flex-sm-row column-reserve justify-content-around" id="home">
            <div class="home-kiri">
                <div class="animate__animated animate__backInLeft judul-home-lp">Pendataan Bantuan Bencana Jawa Timur</div>
                <div class="animate__animated animate__backInLeft text-home-lp">Aplikasi ini digunakan dalam pengisian data pemberi bantuan dalam bencana yang terjadi di wilayah Jawa Timur</div>
                <div class="animate__animated animate__backInUp">
                    <a href="#maps"><button type="button" class="btn btn-readmore">Informasi Lebih Lanjut</button></a>
                </div>
            </div>
            <div class="animate__animated animate__backInRight img-lp-home">
                <img src="{{ asset('assets/peta2.png') }}" width="500px">
            </div>
        </div> 
            
        <!-- Maps  -->
        <div class="landing-page-map" id="maps">
            <div class="animate__animated animate__zoomInDown judul-map">Lokasi Bencana</div>
            <div id="mapid" class="animate__animated animate__slideInUp map" style="height: 350px; border-radius: 15px;"></div>
        </div>

        <!-- fitur  -->
        <div class="landing-page-fitur" id="fitur">
            <div class="animate__animated animate__zoomInDown judul-fitur">Fitur-Fitur</div>
            <div class="row row-cols-auto kartu-fitur justify-content-center">
                <!-- <div class="col card-fitur"> -->
                    <div class="animate__animated animate__bounceIn col card-fitur">
                        <div class="flip-card-inner">
                            <div class="flip-card-front">
                                <img class="map-home" src="{{ asset('assets/icologin.png')}}" width=80px>
                                <p class="text-fitur-front">Login & Register</p>
                            </div>
                            <div class="flip-card-back">
                                <p class="text-fitur-back">Admin & User</p>
                            </div>
                        </div>
                    </div>
                <!-- </div> -->

                <!-- <div class="col card-fitur"> -->
                    <div class="animate__animated animate__bounceIn col card-fitur">
                        <div class="flip-card-inner">
                            <div class="flip-card-front">
                                <img src="{{ asset('assets/petabencana.png')}}" width=80px>
                                <p class="text-fitur-front">Tambah Bencana</p>
                            </div>
                            <div class="flip-card-back">
                                <p class="text-fitur-back">Admin</p>
                            </div>
                        </div>
                    </div>
                <!-- </div> -->
                
                <!-- <div class="col card-fitur"> -->
                <div class="animate__animated animate__bounceIn col card-fitur">
                        <div class="flip-card-inner">
                            <div class="flip-card-front">
                                <img src="{{ asset('assets/tambahbantuan.png')}}" width=80px>
                                <p class="text-fitur-front">Tambah Bantuan</p>
                            </div>
                            <div class="flip-card-back">
                                <p class="text-fitur-back">Admin & User</p>
                            </div>
                        </div>
                    </div>
                <!-- </div> -->
                
                <!-- <div class="col card-fitur"> -->
                <div class="animate__animated animate__bounceIn col card-fitur">
                        <div class="flip-card-inner">
                            <div class="flip-card-front">
                                <img src="{{ asset('assets/olahdata.png')}}" width=80px>
                                <p class="text-fitur-front">Olah Data</p>
                            </div>
                            <div class="flip-card-back">
                                <p class="text-fitur-back">Admin</p>
                            </div>
                        </div>
                    </div>
                <!-- </div> -->
                
            </div>    
        </div>

        <!-- action  -->
        <div class="landing-page-action" id="action">
            <div class="animate__animated animate__zoomInDown judul-action mb-4">Action</div>

            <div class="action-div d-flex flex-column">
                <div class="animate__animated animate__backInLeft d-flex action-kiri">
                    <img  class="zoom-act"  src="{{ asset('assets/satu.png')}}" width="80px">
                    <div class="text-action-kiri">Lakukan Registrasi apabila belum memiliki akun, jika sudah masuk dengan cara login.</div>
                </div>
            
                <div class="animate__animated animate__backInRight d-flex action-kanan">
                    <div class="text-action-kanan">Admin akan menambah bencana. User maupun admin bisa menambahkan bantuan disetiap bencana.</div>
                    <img  class="zoom-act" src="{{ asset('assets/dua.png')}}" width="80px">
                </div>

                <div class="animate__animated animate__backInLeft d-flex action-kiri">
                    <img  class="zoom-act" src="{{ asset('assets/tiga.png')}}" width="80px">
                    <div class="text-action-kiri">Data bantuan dapat dilihat, dihapus, maupun diedit selama status bencana masih aktif.</div>
                </div>

                <div class="animate__animated animate__backInRight d-flex action-kanan">
                    <div class="text-action-kanan">Admin akan menambah bencana. User maupun admin bisa menambahkan bantuan disetiap bencana.</div>
                    <img class="zoom-act"  src="{{ asset('assets/empat.png')}}" width="80px">
                </div>
            </div>

        </div>

        <!-- Data bencana dari controller  -->
        <div>
            <input value="{{ $data_bencana }}" type="hidden" id="data_bencana">
        </div>
   
    </div>

    <x-footer />

    <!-- script  -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>

    <!-- leaflet js  -->
    <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"
        integrity="sha512-XQoYMqMTK8LvdxXYG3nZ448hOEQiglfqkJs1NOQV44cWnUrBc8PkAOcXy20w0vlaXaVUearIOBhiXZ5V3ynxwA=="
        crossorigin="">
    </script>


    <!-- jQuery  -->
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"
        integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous">
    </script>
    
    <script>
   	var mymap = L.map('mapid').setView([-6.8826604, 109.0833123], 6);

    L.tileLayer(
    'https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token=pk.eyJ1IjoibmFiaWxjaGVuIiwiYSI6ImNrOWZzeXh5bzA1eTQzZGxpZTQ0cjIxZ2UifQ.1YMI-9pZhxALpQ_7x2MxHw', {
        attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors, <a href="https://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
        maxZoom: 20,
        id: 'mapbox/streets-v11', //menggunakan peta model streets-v11 kalian bisa melihat jenis-jenis peta lainnnya di web resmi mapbox
        tileSize: 512,
        zoomOffset: -1,
        accessToken: 'your.mapbox.access.token'
    }).addTo(mymap);

    </script>

    <!-- Memunculkan titik bencana  -->
    <script>
        $( document ).ready(function() {
            var bencana = JSON.parse(document.getElementById('data_bencana').value);
            console.log(bencana);

            for(i in bencana){
                console.log(bencana[i].nama_bencana);

                console.log(bencana[i].longlang);
                var marker =  L.marker([bencana[i].latitude,bencana[i].longitude]).addTo(mymap);
                var popup2 = L.popup()
                .setContent(bencana[i].nama_bencana);
            
                marker.bindPopup(popup2).openPopup();
            }
        })

    </script>
    </body>
</html>
