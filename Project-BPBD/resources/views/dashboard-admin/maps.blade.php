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
    
@endsection

@section('sidebar-admin')
<div class="list-unstyled components kotak-elemen">

    <input type="text" id="search" class="cari-elemen form-control input-search" placeholder="Cari" aria-label="Search" aria-describedby="basic-addon1">
    <div id="tampilkanelemen">
      
    </div>
</div>
@endsection

@section('dashboard-admin')
<div class="content-bawah-maps"> 
    <div id="mapid" class="map" style="height: 600px; border-radius: 15px;"></div>
    
    <div class="popup d-flex">
        <div>
            <input type="text" class="text-peta nama-peta" id="tempat" name="nama_tempat">
            <input type="text" class="text-peta" id="latitude" name="latitude">
            <input type="text" class="text-peta" id="longitude" name="longitude">
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
                    <form action="{{ route('simpan bencana') }}" method="post">
                    {{csrf_field()}}
                        <label class="form-label">Nama Bencana</label>
                        <input name="nama_bencana" type="text" class="form-control">

                        
                        <label class="form-label">Tanggal</label>
                        <input name="tanggal" type="datetime-local" class="form-control" id="date">

                        <label class="form-label">Lokasi</label>
                        <input name="lokasi" type="text" class="form-control" id="lokasi">

                        <label class="form-label">Latitude</label>
                        <input name="latitude" type="text" class="form-control" id="titik1">

                        <label class="form-label">Longitude</label>
                        <input name="longitude" type="text" class="form-control" id="titik2">

                    
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
    
    <!-- Data bencana dari controller  -->
    <div>
        <input value="{{ $data_bencana }}" type="hidden" id="data_bencana">
    </div>
   
</div>


@foreach($data_bencana  as $item)
<div class="info-bantuan">
    <div class="info-bencana">
        <h2>{{ $item->nama_bencana }}</h2>
    </div>
    <div>
    <table class="table responsive">
        <thead class="table-dark">
            <tr>
            <th scope="col">#</th>
            <th scope="col">Nama Instansi</th>
            <th scope="col">Nama Elemen</th>
            <th scope="col">Jumlah</th>
            <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <th scope="row">1</th>
                <td>Mark</td>
                <td>Otto</td>
                <td>@mdo</td>
                <td>
                    Edit
                    Hapus      
                </td>
            </tr>
            <tr>
            <th scope="row">2</th>
            <td>Jacob</td>
            <td>Thornton</td>
            <td>@fat</td>
            <td>
                    Edit
                    Hapus      
            </td>
            </tr>
        </tbody>
    </table>
    </div>
</div>
@endforeach
@endsection

@section('script')
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
    
    // function popup 
    var popup = L.popup();

    mymap.on('click',function (e){
        popup
            .setLatLng(e.latlng)
            .setContent("Koordinatnya adalah " + e.latlng.lat + "," + e.latlng.lng 
                .toString()
                )
            .openOn(mymap);
        var latitude = e.latlng.lat
        var longitude = e.latlng.lng 
        document.getElementById('latitude').value = latitude
        document.getElementById('longitude').value = longitude

        // nama lokasi 
        $.ajax({
            url:"https://nominatim.openstreetmap.org/reverse",
            data: "lat="+e.latlng.lat+"&lon="+e.latlng.lng+"&format=json",
            dataType:"JSON",
            success:function(data){
                document.getElementById('tempat').value = data.display_name;
            }
        });
    });

    //function modal
    function tambahbencana(){
        document.getElementById('titik1').value = document.getElementById('latitude').value        
        document.getElementById('titik2').value = document.getElementById('longitude').value
        document.getElementById('lokasi').value = document.getElementById('tempat').value
        $('#inputbencana').modal('show');
    }


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

<!-- search dan tampilkan elemen  -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
<script>
    $(document).ready(function(){

    fetch_data_element();

    function fetch_data_element(query = '')
    {
    $.ajax({
    url:"{{ route('maps.element.search') }}",
    method:'GET',
    data:{query:query},
    dataType:'json',
    success:function(data)
    {
        $('#tampilkanelemen').html(data.table_data);
    }
    })
    }

    $(document).on('keyup', '#search', function(){
    var query = $(this).val();
    fetch_data_element(query);
    });
    });
</script>

@endsection