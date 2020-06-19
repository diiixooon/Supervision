@extends('layouts.app')
@section('content')

<h1>Discussion</h1>
<hr>
    
    @foreach ($discuss as $item)
<div class="well">
        Student Matrics Number : <a href="/discussion/{{$item->id}}/{{$item->student_id}}">{{$item->student_id}}</a>
        <br>
        Supervisor ID : {{$item->supervisor_id}}
        <br>
        Subject : {{$item->subject}} 
        <br>
        Description : {!!$item->body!!}
        </div>
         @endforeach
        <a href="/supervisor/discussion/create/{{$matrices_number}}" class="btn btn-info">Create discussion</a>
        
        <div id='calendar' style="width:100%">{!! $calendar->calendar() !!}
            {!! $calendar->script() !!}
            <a href="/supervisor/appointment/{{$matrices_number}}" class="btn btn-info">Appointment</a>
            
        </div>
@endsection

@section('calendar')
    
@endsection

@section('script')
@endsection

