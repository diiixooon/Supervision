@extends('layouts.app')

@section('content')
    <h2>Student profile</h2>
    <div class="well">
        <h2>
            Name : {{$user->name}}
            <br>
            Student Matrik:
            {{$user->matrik_id}}
        </h2>
    </div>
        <a href="/userprofile/edit/{{$user->id}}" class="btn btn-info">Edit</a>
@endsection