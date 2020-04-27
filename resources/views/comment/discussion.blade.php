@extends('layouts.app')
@section('content')
    <a href="/discussion/create" class="btn btn-info">Create discussion</a>
    @foreach ($discuss as $item)
        <div class="well">
            {{$item->id}}
            <a href="/discussion/{{$item->id}}/{{$item->student_id}}">{{$item->subject}}</a>
            {{$item->student_id}}
            {{$item->supervisor_id}}
            {{$item->body}}
            {{$item->subject}}
            
        </div>
    @endforeach
@endsection
