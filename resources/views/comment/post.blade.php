@extends('layouts.app')

@section('content')
<div class="well">
    {{$discuss->subject}}
    {{$discuss->body}}
</div>
<div class="well">
    @if (count($comment) > 0)
    @foreach ($comment as $item)
        {{$item->comment}}
    @endforeach
    
    @endif

    {{Form::open(['action' => ['CommentController@storecomment',$discuss->id,$discuss->student_id], 'method' => 'post'])}}
        {{Form::text('comment','' ,['class' => 'form-control' ])}}
        {{Form::submit('submit', ['class'=> 'btn btn-info'])}}
    {{Form::close()}}
</div>
@endsection