@extends('layouts.app')

@section('content')
    <h2>Supervisor profile</h2>
    <div class="well">
        <h2>
            Name : {{$sv->name}}
            <br>
            Supervisor Matrik:
            {{$sv->super_matrik_id}}
            <br>
            SV lat: {{$sv->lat}}
            <br>
            SV lng : {{$sv->lng}}
        </h2>
        
    </div>
        <a href="/profile/edit/{{$sv->id}}" class="btn btn-info">Edit</a>
@endsection