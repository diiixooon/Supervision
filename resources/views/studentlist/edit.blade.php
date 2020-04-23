@extends('layouts.app')

@section('content')
<a href="/studentlists" class="btn btn-primary">Back</a>
<hr>
    <h1>Edit Student Project Information</h1>
    <hr>
    {!! Form::open(['action' => ['StudentlistController@update', $studentlist->id], 'method' => 'STUDENTLISTS']) !!}
    <div class="form-group">
      {{Form::label('matrices_number', 'Matrices Number')}}
      {{Form::text('matrices_number', $studentlist->matrices_number, ['class' => 'form-control', 'placeholder' => 'eg : A123456'])}}
    </div>

    <div class="form-group">
        {{Form::label('name', 'Name')}}
        {{Form::text('name', $studentlist->name, ['class' => 'form-control', 'placeholder' => 'Name'])}}
      </div>

      <div class="form-group">
        {{Form::label('project_title', 'Project Title')}}
        {{Form::text('project_title', $studentlist->project_title, ['class' => 'form-control', 'placeholder' => 'Project Title'])}}
      </div>

      <div class="form-group">
        {{Form::label('description', 'Description')}}
        {{Form::textarea('description', $studentlist->description, ['class' => 'form-control', 'placeholder' => 'Description'])}}
      </div>
      {{Form::hidden('_method', 'PUT')}}
      {{Form::submit('Submit', ['class'=>'btn btn-primary'])}}
   {!! Form::close() !!}
@endsection