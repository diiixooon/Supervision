@extends('layouts.app')
@section('content')
    
<h1>Discussion</h1>
<hr>
<style>
    .wrapper {
  display: grid;
  grid-template-columns: repeat(5, 1fr);
  grid-gap: 10px;
  grid-auto-rows: minmax(100px, auto);
}
.one {
  grid-column: 1 / 3;
  grid-row: 1 / 2;
}
.two { 
  grid-column: 3 / 6;
  grid-row: 1 / 4;
}


</style>

    @foreach ($discuss as $item)
    <br>
     <div class="wrapper">
        <div class="one"><div class="well">
            {{-- Matrices Number : <a href="/discussion/{{$item->id}}/{{$item->student_id}}">{{$item->student_id}}</a>
            <br>
            Supervisor ID : {{$item->supervisor_id}}
            <br>
            Subject : {{$item->subject}}
            <br>
            Description : {!!$item->body!!} 
        </div> --}}
        {{-- <a href="/discussion/create/" class="btn btn-info">Create discussion</a></div> --}}
        
        {{-- <div class="two" id='calendar' style="width:100%">{!! $calendar->calendar() !!}
            {!! $calendar->script() !!} --}}
            {{-- <a href="/discussion/appointment" class="btn btn-info">Book Appointment</a>
            <a href="discussion/status" class="btn btn-info">Appointment status</a></div> --}}
       

            Matrices Number : <a href="/discussion/{{$item->id}}/{{$item->student_id}}">{{$item->student_id}}</a>
            <br>
            Supervisor ID : {{$item->supervisor_id}}
            <br>
            Subject : {{$item->subject}}
            <br>
            Description : {!!$item->body!!} 
        </div>
        @endforeach
        <hr>
        <br>

    <a href="/discussion/create/" class="btn btn-info">Create discussion</a></div>
    
    
    <br>
    
    <div class="two" id='calendar' style="width:100%">{!! $calendar->calendar() !!}
        {!! $calendar->script() !!}
    </div>
    <a href="/discussion/appointment" class="btn btn-info">Book Appointment</a>
    <a href="discussion/status" class="btn btn-info">Appointment status</a>    
@endsection
@section('calendar')
    {!! $calendar->calendar() !!}
@endsection

@section('script')
    {!! $calendar->script() !!}
@endsection

