@extends('dashboard-admin\layout\main')

@section('style')
    <link rel="stylesheet" type="text/css" href="{{ asset('css/map.css') }}"></link>
    
    <!-- leaflet  -->
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css"
    integrity="sha512-xodZBNTC5n17Xt2atTPuE1HxjVMSvLVW9ocqUKLsCC5CXdbqCmblAshOMAS6/keqq/sMZMZ19scR4PsZChSR7A=="
    crossorigin=""/>

    <!-- bootstrap cdn  -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css"
    integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    
    <!-- Load Esri Leaflet Geocoder from CDN -->
    <link rel="stylesheet" href="https://unpkg.com/esri-leaflet-geocoder@3.1.0/dist/esri-leaflet-geocoder.css"
    integrity="sha512-IM3Hs+feyi40yZhDH6kV8vQMg4Fh20s9OzInIIAc4nx7aMYMfo+IenRUekoYsHZqGkREUgx0VvlEsgm7nCDW9g=="
    crossorigin="">

@endsection

@section('sidebar-admin')
<div class="list-unstyled components kotak-elemen">
    <input class="form-control cari-elemen" list="datalistOptions" id="exampleDataList" placeholder="Cari Elemen">
    <div class="kotak-icon-elemen d-flex">
        <div>
            <img src="{{asset('assets/pemadam.png')}}" class="icon-elemen"></img>
        </div>
        <div class="nama-elemen">
            Pemadam
        </div>
    </div>
    <div class="kotak-icon-elemen d-flex">
        <div>
            <img src="{{asset('assets/pemadam.png')}}" class="icon-elemen"></img>
        </div>
        <div class="nama-elemen">
            Pemadam
        </div>
    </div>
    <div class="kotak-icon-elemen d-flex">
        <div>
            <img src="{{asset('assets/pemadam.png')}}" class="icon-elemen"></img>
        </div>
        <div class="nama-elemen">
            Pemadam
        </div>
    </div>
    <div class="kotak-icon-elemen d-flex">
        <div>
            <img src="{{asset('assets/pemadam.png')}}" class="icon-elemen"></img>
        </div>
        <div class="nama-elemen">
            Pemadam
        </div>
    </div>
    <div class="kotak-icon-elemen d-flex">
        <div>
            <img src="{{asset('assets/pemadam.png')}}" class="icon-elemen"></img>
        </div>
        <div class="nama-elemen">
            Pemadam
        </div>
    </div>
    <div class="kotak-icon-elemen d-flex">
        <div>
            <img src="{{asset('assets/pemadam.png')}}" class="icon-elemen"></img>
        </div>
        <div class="nama-elemen">
            Pemadam
        </div>
    </div>
</div>
@endsection

@section('dashboard-admin')
<div class="content-bawah-maps"> 
    <div id="mapid" class="map" style="height: 600px; border-radius: 15px;"></div>
    
    <div class="popup d-flex">
        <div>
            <input type="text" class="text-peta nama-peta" id="tempat" name="nama_tempat">
            <input type="text" class="text-peta" id="latlong" name="latlong">
        </div>
        <div>
            <button type="button" class="btn-bencana" onclick="tambahbencana()">
                <img src="{{asset('assets/bencana.png')}}" class="icon-tambah-bencana"></img>
                Bencana</button>
        </div>

        <!-- modal  -->
        <div class="modal fade" id="inputbencana" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Tambahkan Titik Bencana</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">            
                    <form action="/bencana/create" method="post">
                    {{csrf_field()}}
                        <label class="form-label">Nama Bencana</label>
                        <input name="nama_bencana" type="text" class="form-control">

                        
                        <label class="form-label">Tanggal</label>
                        <input name="tanggal" type="date" class="form-control" id="date">

                        <label class="form-label">Lokasi</label>
                        <input name="lokasi" type="text" class="form-control" id="lokasi">

                        <label class="form-label">Long Lang</label>
                        <input name="longlang" type="text" class="form-control" id="titik">
                    
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save</button>
                    </form>
                    </div>
                </div>
            </div>
        </div>    
    </div>
</div>
@endsection

@section('script')
<!-- leaflet js  -->
<script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"
        integrity="sha512-XQoYMqMTK8LvdxXYG3nZ448hOEQiglfqkJs1NOQV44cWnUrBc8PkAOcXy20w0vlaXaVUearIOBhiXZ5V3ynxwA=="
        crossorigin="">
</script>
<!-- Load Esri Leaflet js from CDN -->
<script src="https://unpkg.com/esri-leaflet@3.0.2/dist/esri-leaflet.js"
        integrity="sha512-myckXhaJsP7Q7MZva03Tfme/MSF5a6HC2xryjAM4FxPLHGqlh5VALCbywHnzs2uPoF/4G/QVXyYDDSkp5nPfig=="
        crossorigin="">
</script>

<!-- Load Esri Leaflet Geocoder from CDN -->
<script src="https://unpkg.com/esri-leaflet-geocoder@3.1.0/dist/esri-leaflet-geocoder.js"
        integrity="sha512-FbJc8QgjTS3k1G41cT+bSnU7D41T2sUdLBN1ElrYDN3E5vZwMuoft3PqXAJN9FCa2lXT7Anva7X0OuwiLDJ+yg=="
        crossorigin="">
</script>

<script>
    const apiKey = "AAPK0af3d4329245422eab248f7f7f25eb37sm9eqg-x3K-ai7TpHiUcg_nOrlvpsxJQDLJ9I2PJpQLpo9k5yonRIabYNVchGzw1";
	var mymap = L.map('mapid').setView([-6.8826604, 109.0833123], 6);

    // L.tileLayer('http://{s}.google.com/vt/lyrs=m&x={x}&y={y}&z={z}',{
    // maxZoom: 20,
    // subdomains:['mt0','mt1','mt2','mt3']
    // }).addTo(mymap);
    
    L.tileLayer(
        'https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token=pk.eyJ1IjoibmFiaWxjaGVuIiwiYSI6ImNrOWZzeXh5bzA1eTQzZGxpZTQ0cjIxZ2UifQ.1YMI-9pZhxALpQ_7x2MxHw', {
            attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors, <a href="https://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
            maxZoom: 20,
            id: 'mapbox/streets-v11', //menggunakan peta model streets-v11 kalian bisa melihat jenis-jenis peta lainnnya di web resmi mapbox
            tileSize: 512,
            zoomOffset: -1,
            accessToken: 'your.mapbox.access.token'
        }).addTo(mymap);

    // function popup 
    var popup = L.popup();
    var geocodeService = L.esri.Geocoding.geocodeService({
        apikey: apiKey // replace with your api key - https://developers.arcgis.com
    });

    mymap.on('click',function (e){
        
        popup
            .setLatLng(e.latlng)
            .setContent("Koordinatnya adalah " + e.latlng.lat + "," + e.latlng.lng 
                .toString()
                )
            .openOn(mymap);
        var latling = e.latlng.lat + "," + e.latlng.lng;
        document.getElementById('latlong').value = latling;
        
        geocodeService.reverse().latlng(e.latlng).run(function (error, result) {
            var tempat;
            if(result.address.City){
                tempat = result.address.City + ", " + result.address.Region + " (" + result.address.Postal + ")";
                
            }else{
                tempat = result.address.Region + " (" + result.address.Postal + ")";
            }
            console.log(tempat);
            document.getElementById('tempat').value = tempat;
        });
    });

    //function modal
    function tambahbencana(){
        document.getElementById('titik').value = document.getElementById('latlong').value
        document.getElementById('lokasi').value = document.getElementById('tempat').value
        $('#inputbencana').modal('show');
    }
</script>
@endsection