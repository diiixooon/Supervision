@extends('layouts.app')

@section('content')
    <h1>Create Discussion</h1>

    {!! Form::open(['action' => 'CommentController@create', 'method' => 'POST'])!!}
        <div class="form-group">
            {{Form::label('subject', 'Subject')}}
            {{Form::text('subject', '', ['class' => 'form-control','placeholder' => 'Name the subject'])}}
        </div>
        @if (Auth::guard('supervisor')->check())
            {{Form::label('supervisee', 'Please Select your supervisee')}}
            <select name="student" id="student">
                @foreach ($user as $userlist)
                <option value="{{$userlist->matrik_id}}">{{$userlist->matrik_id}}|{{$userlist->name}}</option>
                @endforeach
            </select>
        @endif
        <div class="form-group">
            {{Form::label('body', 'Body')}}
            {{Form::textarea('body', '', ['id' => 'article-ckeditor', 'class' => 'form-control','placeholder' => 'Leave your message'])}}
        </div>
        {{Form::submit('Submit', ['class'=>'btn btn-primary'])}}
    {!! Form::close() !!}
@endsection