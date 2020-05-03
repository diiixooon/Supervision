@extends('layouts.app')

@section('location')
<div id="map"></div>
<style>
    /* Always set the map height explicitly to define the size of the div
     * element that contains the map. */
    #map {
      height: 50%;
      width: 100%;
    }
    /* Optional: Makes the sample page fill the window. */
    html, body {
      height: 100%;
      margin: 0;
      padding: 0;
    }
  </style>
@foreach ($sv as $item)
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
    @foreach ($sv as $item)
        <h2> Supervisor Room: {{$item->room_location}}</h2>
        <h2>Supervisor Contact number : {{$item->contact}}</h2>
        <h2>Supervisor Email : {{$item->email}}</h2>
        <h2>Supervisor location : Lat :{{$item->lat}} Lng: {{$item->lng}}</h2>



        @endforeach
@endsection