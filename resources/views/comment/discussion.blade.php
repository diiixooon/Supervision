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

<div class="row">
    {{-- discussion --}}
    <div class="col-xs-6 col-sm-6">
        @foreach ($discuss as $item)
            <div class="one">
                <div class="well">
                    Matrices Number : <a href="/discussion/{{$item->id}}/{{$item->student_id}}">{{$item->student_id}}</a>
                    <br>
                    Supervisor ID : {{$item->supervisor_id}}
                    <br>
                    Subject : {{$item->subject}}
                    <br>
                    Description : {!!$item->body!!} 
                </div>
            </div>
        @endforeach
        <a href="/discussion/create/" class="btn btn-info">Create discussion</a>
    </div>

    {{-- calendar --}}
    <div class="col-xs-6 col-sm-6">
        <div class="two" id='calendar' style="width:80%">
            {!! $calendar->calendar() !!}
            {!! $calendar->script() !!}  
        </div> 
        <a href="/discussion/appointment" class="btn btn-info">Book Appointment</a>
        <a href="/discussion/status" class="btn btn-info">Appointment status</a>  
    </div>
</div>
    {{-- next col-xs-6 --}}
@endsection




