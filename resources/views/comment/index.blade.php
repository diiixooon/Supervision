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
    @foreach ($studentlist as $list)
    <div class="one">
      <div class="well">

            Name : <a href="/supervisor/discussion/{{$list->matrices_number}}">{{$list->name}}</a>
            <br>
            Matrices number : {{$list->matrices_number}}
        </div>   
    </div>   
    @endforeach
  </div>
  <div class="col-xs-6 col-sm-6">
    <div class="two" id='calendar' style="width:80%">
      {!! $calendar->calendar() !!}
      {!! $calendar->script() !!}  
  </div>  
    <br>
  </div>
</div>

@endsection