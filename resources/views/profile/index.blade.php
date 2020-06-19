@extends('layouts.app')

@section('content')
    <h1>Supervisor profile</h1>
    <hr>
    <div class="well">
        
            <div>Name : {{$sv->name}}</div>
            <br>
            <div>Supervisor Matrik :
            {{$sv->super_matrik_id}}</div>
            <br>
            <div>SV lat: {{$sv->lat}}</div>
            <br>
            <div>SV lng : {{$sv->lng}}</div>
            <br>
            <div>SV Room : {{$sv->room_location}}</div>
            <br>
            <div>SV contact number : {{$sv->contact}}</div>
        
        
    </div>
    <hr>
        <a href="/profile/edit/{{$sv->id}}" class="btn btn-info">Edit</a>
@endsection