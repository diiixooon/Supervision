@extends('layouts.app')

@section('content')
    <h1>Create Discussion</h1>
    {!! Form::open(['action' => 'PostsController@store', 'method' => 'POST'])!!}
        <div class="form-group">
            {{Form::label('author', 'Author')}}
            {{Form::text('author', '', ['class' => 'form-control','placeholder' => 'Author'])}}
        </div>
        <div class="form-group">
            {{Form::label('subject', 'Subject')}}
            {{Form::text('subject', '', ['class' => 'form-control','placeholder' => 'Name the subject'])}}
        </div>
        <div class="form-group">
            {{Form::label('body', 'Body')}}
            {{Form::textarea('body', '', ['id' => 'article-ckeditor', 'class' => 'form-control','placeholder' => 'Leave your message'])}}
        </div>
        {{Form::submit('Submit', ['class'=>'btn btn-primary'])}}
    {!! Form::close() !!}
@endsection