@extends('layouts.app')

@section('location')
<div class="container">
<h1>Edit Supervisor Profile</h1>
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
<div id="map"></div>
<script>
   
  function initMap() {
     var map = new google.maps.Map(document.getElementById('map'), {
        center: {lat: 2.9292, lng: 101.7771  },
        zoom: 15
      });
      var marker = new google.maps.Marker({
                position:{lat: 2.9292, lng: 101.7771},
                draggable: true,
                map: map
                });
        google.maps.event.addListener(marker,'dragend',function(event) {
        
        document.getElementById('lat').value =event.latLng.lat();
        document.getElementById('lng').value =event.latLng.lng();
        console.log(document.getElementById('lat').value);
        console.log(document.getElementById('lng').value);
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
{{Form::open(['action'=> ['StudentController@editform', $sv->id], 'method' => 'post'])}}
    <div class="form-group">
        {{Form::label('name', 'Author')}}
        {{Form::text('name', $sv->name, ['class' => 'form-control','placeholder' => 'Author'])}}
    </div>
    <div class="form-group">
        {{Form::label('matrik_number', 'Supervisor Matrik Number')}}
        {{Form::text('matrik_number', $sv->super_matrik_id, ['class' => 'form-control','placeholder' => 'Name the subject'])}}
    </div>
    <div class="form-group">
      {{Form::label('room_location', 'Supervisor Room address')}}
      {{Form::text('room_location', $sv->room_location, ['class' => 'form-control','placeholder' => 'Name the subject'])}}
    </div>
    <div class="form-group">
      {{Form::label('contact', 'Supervisor Contact Number')}}
      {{Form::text('contact', $sv->contact, ['class' => 'form-control','placeholder' => 'SV contact number'])}}
    </div>
    <input type="hidden" name="lat" id="lat">
    <input type="hidden" name="lng" id="lng">
    {{Form::submit('Submit',['class' => 'btn btn-info'])}}
    {{Form::close()}}
@endsection

