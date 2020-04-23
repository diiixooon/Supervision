@extends('layouts.app')

@section('content')
    <h1>Edit Discussion</h1>
    {!! Form::open(['action' => ['PostsController@update', $post->id], 'method' => 'POST'])!!}
        <div class="form-group">
            {{Form::label('author', 'Author')}}
            {{Form::text('author', $post->author, ['class' => 'form-control','placeholder' => 'Author'])}}
        </div>
        <div class="form-group">
            {{Form::label('subject', 'Subject')}}
            {{Form::text('subject', $post->subject, ['class' => 'form-control','placeholder' => 'Name the subject'])}}
        </div>
        <div class="form-group">
            {{Form::label('body', 'Body')}}
            {{Form::textarea('body', $post->body, ['id' => 'article-ckeditor', 'class' => 'form-control','placeholder' => 'Leave your message'])}}
        </div>
        {{Form::hidden('_method', 'PUT')}}
        {{Form::submit('Submit', ['class'=>'btn btn-primary'])}}
    {!! Form::close() !!}
@endsection