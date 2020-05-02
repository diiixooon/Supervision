@extends('layouts.app')
@section('content')
    <a href="/supervisor/discussion/create/{{$matrices_number}}" class="btn btn-info">Create discussion</a>
    <a href="/supervisor/appointment/{{$matrices_number}}" class="btn btn-info">Appointment</a>
    @foreach ($discuss as $item)
        <div class="well">
            <a href="/discussion/{{$item->id}}/{{$item->student_id}}">{{$item->student_id}}</a>
            {{$item->supervisor_id}}
            {{$item->body}}
            {{$item->subject}}     
        </div>
    @endforeach
    {!! $calendar->calendar() !!}
    {!! $calendar->script() !!}
@endsection

@section('calendar')
    
@endsection

@section('script')
@endsection

