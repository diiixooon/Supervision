@extends('layouts.app')

@section('content')
<a href="/studentlists" class="btn btn-primary">Back</a>
<hr>
    <h1>Add New Students</h1>
    {!! Form::open(['action' => 'StudentlistController@store', 'method' => 'STUDENTLISTS']) !!}
    <div class="form-group">
      {{Form::label('matrices_number', 'Matrices Number')}}
      {{Form::text('matrices_number', '', ['class' => 'form-control', 'placeholder' => 'eg : A123456'])}}
    </div>

    <div class="form-group">
        {{Form::label('name', 'Name')}}
        {{Form::text('name', '', ['class' => 'form-control', 'placeholder' => 'Name'])}}
      </div>

      <div class="form-group">
        {{Form::label('project_title', 'Project Title')}}
        {{Form::text('project_title', '', ['class' => 'form-control', 'placeholder' => 'Project Title'])}}
      </div>

      <div class="form-group">
        {{Form::label('description', 'Description')}}
        {{Form::textarea('description', '', ['class' => 'form-control', 'placeholder' => 'Description'])}}
      </div>
      {{Form::submit('Submit', ['class'=>'btn btn-primary'])}}
   {!! Form::close() !!}
@endsection