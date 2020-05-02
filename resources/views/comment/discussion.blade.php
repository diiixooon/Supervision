@extends('layouts.app')
@section('content')
    <a href="/discussion/create/" class="btn btn-info">Create discussion</a>
    <a href="/discussion/appointment" class="btn btn-info">Book Appointment</a>
    <a href="discussion/status">Appointment status</a>
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
{{-- @section('calendar')
    {!! $calendar->calendar() !!}
@endsection

@section('script')
    {!! $calendar->script() !!}
@endsection --}}

