@extends('layouts.app')

@section('content')
<h1>Discussion</h1>
<hr>
<div class="well">
    <div>Subject : {{$discuss->subject}}</div>
    <div>Description : {!!$discuss->body!!}</div>
</div>
<div class="well">
    @if (count($comment) > 0)
    @foreach ($comment as $item)
    {{count($comment)}} Comment
    <div class="well">

        {{-- @if (Auth::guard('web')->check())
            
        @elseif(Auth::guard('supervisor')->check())
            
        @endif --}}
        
        @if (Auth::guard('web')->check())
            @if($item->commenter_id == Auth::guard('web')->user()->matrik_id)
                {{Auth::guard('web')->user()->name}}
            @endif
        @elseif(Auth::guard('supervisor')->check())        
            @if($item->commented_id == Auth::guard('supervisor')->user()->super_matrik_id)
                {{Auth::guard('supervisor')->user()->name}}
            @endif
        @endif
        {{$item->comment}}

        @if (Auth::guard('web')->check())
            @if (Auth::guard('web')->user()->matrik_id == $item->commenter_id )
                {{Form::open( ['action' => ['CommentController@deletecomment',$item->id], 'method' => 'delete' ])}}
                {{Form::submit('Delete', ['class' => 'btn btn-info pull-right'] )}}
                {{Form::close()}} 
            @endif

        @elseif(Auth::guard('supervisor')->check())
            @if (Auth::guard('supervisor')->user()->super_matrik_id == $item->commenter_id )
                {{Form::open( ['action' => ['CommentController@deletecomment',$item->id], 'method' => 'delete' ])}}
                {{Form::submit('Delete', ['class' => 'btn btn-info pull-right'] )}}
                {{Form::close()}} 
            @endif
        @endif
        


        
    </div>
    @endforeach
    
    @endif

    {{Form::open(['action' => ['CommentController@storecomment',$discuss->id,$discuss->student_id], 'method' => 'post'])}}
        {{Form::text('comment','' ,['class' => 'form-control' ])}}
        {{Form::submit('submit', ['class'=> 'btn btn-info'])}}
    {{Form::close()}}
</div>
@endsection