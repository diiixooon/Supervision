@extends('layouts.app')

@section('content')
    <h1>Student Profile</h1>
    <hr>
    <div class="well">
            <div> Name : {{$user->name}} </div>
            <br>
            <div>Student Matrik : 
            {{$user->matrik_id}}</div>
            <br>
            <div>Project Title : 
            {{$project_title}}</div>
            <br>
            <div>Project Description : {!!$project_description!!}</div>
    </div>
        <a href="/userprofile/edit/{{$user->id}}" class="btn btn-info">Edit</a>
@endsection