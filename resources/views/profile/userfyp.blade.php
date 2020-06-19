@extends('layouts.app')

@section('content')
<h1>Project Details</h1>
<hr>
<div class="well">
    Supervisor name : {{$sv_name}}
    <br>
    Project Title : {{$project_title}}
    <br>
    Project Desription : {!!$project_description!!}
</div>
    
@endsection