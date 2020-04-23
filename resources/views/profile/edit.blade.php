@extends('layouts.app')

@section('content')
    {{Form::open(['action'=> ['StudentController@editform', $sv->id], 'method' => 'post'])}}
    <div class="form-group">
        {{Form::label('name', 'Author')}}
        {{Form::text('name', $sv->name, ['class' => 'form-control','placeholder' => 'Author'])}}
    </div>
    <div class="form-group">
        {{Form::label('matrik_number', 'Supervisor Matrik Number')}}
        {{Form::text('matrik_number', $sv->super_matrik_id, ['class' => 'form-control','placeholder' => 'Name the subject'])}}
    </div>

    {{Form::submit('Submit',['class' => 'btn btn-info'])}}
    {{Form::close()}}
@endsection