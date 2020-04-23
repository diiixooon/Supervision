@extends('layouts.app')

@section('content')
<a href="/studentlists" class="btn btn-primary">Back</a>
<hr>
<h1> Student Project Information</h1>
<hr>
   <div>
    <div>Name : {{$studentlist->name}}</div>
    <div>Matrices Number :  {{$studentlist->matrices_number}}</div>
    <div>Project Title :  {{$studentlist->project_title}}</div>
    <div>Description : {!!$studentlist->description!!}</div>
   </div>     
   <hr>
<a href="/studentlists/{{$studentlist->id}}/edit" class="btn btn-primary">Edit</a>

{!!Form::open(['action' => ['StudentlistController@destroy', $studentlist->id], 'method' => 'STUDENTLISTS', 'class' => 'pull-right'])!!}
   {{Form::hidden('_method', 'DELETE')}}
   {{Form::submit('Delete', ['class' => 'btn btn-danger'])}}
{!!Form::close()!!}
@endsection

