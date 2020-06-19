@extends('layouts.app')

@section('location')
<div class="container"> 
<h1>Supervisor Location and Contact</h1>
</div>

<hr>
<style>
    /* Always set the map height explicitly to define the size of the div
     * element that contains the map. */
    #map {
      height: 50%;
      width: 80%;
      margin: inherit;
    }
    /* Optional: Makes the sample page fill the window. */
    html, body {
      height: 100%;
      margin: auto;
      padding: auto;
    }
    
  </style>

@foreach ($sv as $item)
<div id="map"></div>

    <script>var svlat = {{$item->lat}}</script>
    <script>var svlng = {{$item->lng}}</script>
@endforeach
<script>
   
  function initMap() {
     var map = new google.maps.Map(document.getElementById('map'), {
        center: {lat: svlat, lng: svlng  },
        zoom: 15
      });
      var marker = new google.maps.Marker({
                position:{lat: svlat, lng: svlng},
                draggable: true,
                map: map
                });

	        
  //Display a map on the web page

   }
  
</script>


<script async defer 
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBi8oD2FnMmsvfKddQcNYRC9qiSxiYGmG4&callback=initMap&libraries=geometry"
    ></script>
@endsection

@section('content')
<br>
    @foreach ($sv as $item)
    <div class="well">
        <div> Supervisor Room: {{$item->room_location}}</div>
        <br>
        <div>Supervisor Contact number : {{$item->contact}}</div>
        <br>
        <div>Supervisor Email : {{$item->email}}</div>
        <br>
        <div>Supervisor location (latitude) : {{$item->lat}}</div>
        <br>
        <div>Supervisor location (longitude) : {{$item->lng}}</div>
      </div>

        @endforeach
@endsection