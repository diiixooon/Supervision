@extends('layouts.app')

@section('content')
    <h1>Discussion</h1>
    @if(count($posts) > 0)
        @foreach($posts as $post)
        <hr>
            <div class="well">
                <div>Subject : <a href="/posts/{{$post->id}}">{{$post->subject}}</a></div>
                <div>Message : {!!$post->body!!}</div>
                <div>Written By : {{$post->author}}</div>
            </div>
        @endforeach
        <hr>
        {{$posts->links()}}
        <a href="/posts/create" class="btn btn-primary">Create</a>
    @else
        <p>No discussions found</p>
        <a href="/posts/create" class="btn btn-primary">Create</a>
    @endif
@endsection