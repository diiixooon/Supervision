@extends('layouts.app')

@section('content')
{{ Form::open(['action' => 'CommentController@storeappointment', 'method' => 'POST', 'enctype' => 'multipart/form-data'])}}
        
{{Form::label('event_name', 'Enter Appointment Title')}}
{{Form::text('event_name', '', ['class' => 'form-control', 'placeholder' => 'Event Name'])}}

{{Form::label('color', 'Enter Event Color')}}
{{Form::color('color', '', ['class' => 'form-control', 'placeholder' => 'Event Name'])}}

{{Form::label('start_date', 'Enter Event Start Date')}}
<input type="datetime-local" class="form-control" name="start_date" /> 
{{Form::label('end_date', 'Enter Event End Date')}}
<input type="datetime-local" class="form-control" name="end_date" />

{{Form::submit('Submit', ['class' => 'btn btn-primary'] )}}
   
{{Form::close()}}
@endsection