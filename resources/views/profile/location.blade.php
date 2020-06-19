@extends('layouts.app')

@section('location')

<div id="map"></div>
<style>
    /* Always set the map height explicitly to define the size of the div
     * element that contains the map. */
    #map {
      height: 60%;
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
    <script>
    svlat = {{$item->lat}};
    svlng = {{$item->lng}};
    </script>
@endforeach
<script>
    let studentlat;
    let studentlng;
    let svlat;
    let svlng;
    if(navigator.geolocation)
    {
        navigator.geolocation.getCurrentPosition(function(position)
        {
            studentlat = position.coords.latitude;
            studentlng = position.coords.longitude;
            // console.log(studentlat);
            // console.log(studentlng);
        });
    }
  function initMap() {
    
    var directionsService = new google.maps.DirectionsService();
    var directionsRenderer = new google.maps.DirectionsRenderer();
    
    var student = new google.maps.LatLng(studentlat, studentlng);
    // console.log(student);
    var haight = new google.maps.LatLng(37.7699298, -122.4469157);
    console.log(haight);
    var svlcoation = new google.maps.LatLng(svlat, svlng);
    console.log(svlcoation);
    
    var map = new google.maps.Map(document.getElementById('map'), {
        center: {lat: 2.9292, lng: 101.7771  },
        zoom: 15
      });
      
    var map = new google.maps.Map(document.getElementById('map'), {
    zoom: 4,
    center: svlcoation
  });
  //Display a map on the web page
   }
  
</script>
<script async defer 
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBi8oD2FnMmsvfKddQcNYRC9qiSxiYGmG4&callback=initMap&libraries=geometry"
    ></script>
@endsection