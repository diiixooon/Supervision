@extends('layouts.app')

@section('content')
    {{Form::open(['action' => 'ApprovalController@upload', 'method' => 'POST', 'enctype' => 'multipart/form-data'])}}
    <h2>Upload Document</h2>
    <input type="radio" name="document" value="1">D1
    <input type="radio" name="document" value="2">D2
    <input type="radio" name="document" value="3">D3
    <input type="radio" name="document" value="4">D4
    <input type="radio" name="document" value="5">D5
    <input type="radio" name="document" value="6">D6
    <input type="radio" name="document" value="7">D7

    <br>
    {{Form::label('fypdocument', 'Upload Your Document')}}
    {{Form::file('fypdocument')}}

    {{Form::submit('Submit', ['class' => 'btn btn-info'])}}
    {{Form::close()}}
@endsection