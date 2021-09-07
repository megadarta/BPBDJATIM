@extends('dashboard-user\layout\dashboard')

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

@section('maps')
<div class="content-bawah-maps"> 
    <div id="mapid" class="map" style="height: 600px; border-radius: 15px;"></div>
    
    
    <!-- Data bencana dari controller  -->
    <div>
        <input value="{{ $data_bencana }}" type="hidden" id="data_bencana">
        <input value="{{ $data_bantuan }}" type="hidden" id="data_bantuan">
    </div>
   
</div>

<?php $j = 0 ?>
@foreach($data_bencana  as $item)

<div class="info-bantuan">
    <div class="info-bencana">
        <h2>{{ $item->nama_bencana }}</h2>
    </div>
    <div>
    <table class="table responsive" class="example" id="example-{{$j}}">
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
            <?php $i = 1; ?>
            @foreach($data_bantuan as $bantuan)
            
            <?php 

                if($bantuan->bencana_id == $item->id){
            ?>
                <tr>
                <th scope="row">{{$i}}</th>
                <td>{{$bantuan->nama_instansi}}</td>
                <td>{{$bantuan->nama_element}}</td>
                <td>{{$bantuan->kuantitas}}</td>
                @if ($bantuan->nama_instansi == Auth::user()->nama_instansi)
                <td>
                    <a onclick="return confirm('Apakan Anda Yakin Untuk Menghapus Bantuan Ini?')" href="{{ url('bantuan/delete', $bantuan->id) }}"><button type="button"  class="btn btn-danger klikelemen" width="100%">Hapus</button></a>
                </td>
                @else
                <td></td>
                @endif
                
            </tr>
            <?php
            $i++;
            }
        
            ?>      
            @endforeach
        </tbody>
    </table>
    </div>
</div>
<?php $j++ ?>
@endforeach

<!-- modal edit elemen  -->
<div class="modal fade" id="editelemen" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Data Elemen</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('simpan bantuan') }}" enctype="multipart/form-data" method="post" id="tambahelemenform">
                {{csrf_field()}}

                <div class="modal-body">   
                    <label class="form-label">Nama Instansi</label>
                    <input name="nama_instansi" id="nama_instansi" type="text" class="form-control" value="{{ Auth::user()->nama_instansi }}" disabled>
                    <input name="id_instansi" id="id_instansi" type="hidden" class="form-control" value="{{ Auth::user()->id }}">

                    <label class="form-label">Nama Elemen</label>
                    <input name="nama_element" id="nama_element" type="text" class="form-control" value="" disabled>
                    <input name="id_element" id="id_element" type="hidden" class="form-control" value="">

                    <label class="form-label" id="statusselect">Nama Bencana</label>
                    <select class='form-select' aria-label='Default select example' name='id_bencana' id='id_bencana'>
                        <option value=''>Pilih bencana aktif</option>
                        @foreach($data_bencana as $item)
                        <option value='{{$item->id}}'>{{$item->nama_bencana}}</option>
                        @endforeach
                    </select>

                    <label class="form-label">Kuantitas</label>
                    <input name="kuantitas" id="kuantitas" type="text" class="form-control" value="">
                
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Tambah Bantuan</button>
                </div>
            </form>
        </div>
    </div>    
</div>
<!-- endmodal -->
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
</script>

<!-- Memunculkan titik bencana  -->
<script>
    $( document ).ready(function() {
        var bencana = JSON.parse(document.getElementById('data_bencana').value);
        // console.log(bencana);

        for(i in bencana){
            // console.log(bencana[i].nama_bencana);

            // console.log(bencana[i].longlang);
            var circle = L.circle([bencana[i].latitude,bencana[i].longitude], {
                color: 'red',
                fillColor: '#f03',
                fillOpacity: 0.5,
                radius: 2000
            }).addTo(mymap);
            var marker =  L.marker([bencana[i].latitude,bencana[i].longitude]).addTo(mymap);
            var popup2 = L.popup()
            .setContent(bencana[i].nama_bencana);
        
            marker.bindPopup(popup2).openPopup();
        }
    })
</script>

<!-- memunculkan bantuan -->
<script>
   $( document ).ready(function() {
    var bantuan = JSON.parse(document.getElementById('data_bantuan').value);
        console.log(bantuan);
        var j = 0.0001;
        var k = 0;
        for(i=0; i<=bantuan.length; i++){
            var iconbantuan = L.icon({
                iconUrl: '{{ url('/assets/icon') }}/' + bantuan[i].icon,
                iconSize: [30,30]
            })
            if(i % 3 == 0){
                var marker2 =  L.marker([bantuan[i].latitude,bantuan[i].longitude-j], {icon:iconbantuan}).addTo(mymap);                
                
            }else if(i % 3 == 1){
                var marker2 =  L.marker([bantuan[i].latitude-j,bantuan[i].longitude-j], {icon:iconbantuan}).addTo(mymap);
                
            }else{
                var marker2 =  L.marker([bantuan[i].latitude-j,bantuan[i].longitude], {icon:iconbantuan}).addTo(mymap);
                if(k == 0){
                    j = j * (-1);
                    console.log(k);
                    k++;
                }
                else{
                    j = (j * (-1)) + 0.00008;
                    k = 0;
                }           
            }            
            var popup_bantuan = L.popup()
            .setContent(bantuan[i].kuantitas + " " + bantuan[i].nama_element + " dari " + bantuan[i].nama_instansi);
        
            marker2.bindPopup(popup_bantuan).openPopup();            
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

<!-- tambah elemen bantuan  -->
<script>
    function tambahbantuan(value, id){
        // console.log(id);
        $('#editelemen').modal('show');
        var modal = $('#editelemen');
        modal.find('.modal-body #nama_element').val(value);
        
        modal.find('.modal-body #id_element').val(id);
    }
</script>

<!-- data table -->
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.25/js/dataTables.bootstrap4.min.js"></script>

<script>
$(document).ready(function() {
    var bencanaaktif = JSON.parse(document.getElementById('data_bencana').value);
    // console.log(bencanaaktif[]);
    // console.log(bencana);

    for(var i = 0; i<bencanaaktif.length; i++){
        console.log(i);
        $('#example-' + i).DataTable();
    }
} );
</script>
@endsection