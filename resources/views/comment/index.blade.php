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
    @foreach ($studentlist as $list)
    <br>
    <div class="wrapper">
        <div class="one">
        <div class="well">
            Name : <a href="/supervisor/discussion/{{$list->matrices_number}}">{{$list->name}}</a>
            <br>
            Matrices number : {{$list->matrices_number}}
        </div>   
        <div class="two" id='calendar' style="width:100%">{!! $calendar->calendar() !!}
            {!! $calendar->script() !!}  
        </div>   
    @endforeach
    <br>


@endsection