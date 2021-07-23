@extends('dashboard-admin\layout\main')

@section('style')
    <link rel="stylesheet" type="text/css" href="{{ asset('css/admin-home.css') }}"></link>
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
<div id="mapid" style="height: 500px;"></div>

<script>
    
	var mymap = L.map('mapid').setView([-6.8826604, 109.0833123], 6);

    L.tileLayer('http://{s}.google.com/vt/lyrs=m&x={x}&y={y}&z={z}',{
    maxZoom: 20,
    subdomains:['mt0','mt1','mt2','mt3']
    }).addTo(mymap);

    var pinIcon = L.icon({
        iconUrl: 'assets/pin.png',
        // shadowUrl: 'leaf-shadow.png',

        iconSize:     [28, 30], // size of the icon
        shadowSize:   [50, 64], // size of the shadow
        iconAnchor:   [22, 94], // point of the icon which will correspond to marker's location
        shadowAnchor: [4, 62],  // the same for the shadow
        popupAnchor:  [-3, -76] // point from which the popup should open relative to the iconAnchor
    });

    
    // marker
    // var maker = L.marker([-7.186481, 112.4057793], {icon: pinIcon}).addTo(mymap).on('click', function(e){
    //     alert(e.LatLng);
    // })

    // polyline


</script>
@endsection