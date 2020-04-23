@extends('layouts.app')

@section('content')
<a href="/posts" class="btn btn-primary">Back</a>
<hr>
<h1> Discussion </h1>
<hr>
<div>
    {{$post->subject}}
</div>
<div>
    {!!$post->body!!}
</div>
    <div>Written on : {{$post->created_at}}</div>
    <div>Written by : {{$post->author}}</div>

<hr>
    <a href="/posts/{{$post->id}}/edit" class="btn btn-primary">Edit</a>

    {!!Form::open(['action' => ['PostsController@destroy', $post->id], 'method' => 'POST', 'class' => 'pull-right'])!!}
   {{Form::hidden('_method', 'DELETE')}}
   {{Form::submit('Delete', ['class' => 'btn btn-danger'])}}
{!!Form::close()!!}
@endsection