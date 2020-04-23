@extends('layouts.app')

@section('content')
    <h1>Create Supervisee</h1>
    {!! Form::open(['action' => 'PostsController@create', 'method' => 'POST'])!!}
        <div class="form-group">
            {{Form::label('user', 'Select your student')}}
            <select name="zon" id="zonlistbox">
                @foreach ($user as $userlist)
                    <option value="{{$userlist->id}}">{{$userlist->name}}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            {{Form::label('projecttitle', 'FYP title')}}
            {{Form::text('projecttitle', '', ['class' => 'form-control','placeholder' => 'Name the subject'])}}
        </div>

        {{Form::submit('Submit', ['class'=>'btn btn-primary'])}}
    {!! Form::close() !!}
@endsection