@extends('layouts.app') 


@section('content')
    @foreach ($studentlist as $list)
        <div class="well">
            <a href="/supervisor/discussion/{{$list->matrices_number}}">{{$list->matrices_number}}</a>

        </div>        
    @endforeach
@endsection