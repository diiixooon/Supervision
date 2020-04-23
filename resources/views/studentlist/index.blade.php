@extends('layouts.app')

@section('content')
    <h1>Student List</h1>
    @if(count($studentlist) > 0)
        @foreach ($studentlist as $studentlist)
        <hr>
            <div class="well">
                Name : <a href="/studentlists/{!!$studentlist->id!!}"> {!!$studentlist->name!!}</a>
              <div>Matrices Number :  {!!$studentlist->matrices_number!!}</div>
              <div>Project Title :  {!!$studentlist->project_title!!}</div>
            </div>    
        @endforeach
        <hr>
        <a href="/studentlists/create" class="btn btn-primary">Create</a>
    @else
        <p>No students found</p>
        <hr>
        <a href="/studentlists/create" class="btn btn-primary">Create</a>
    @endif
@endsection