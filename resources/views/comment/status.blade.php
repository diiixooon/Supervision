@extends('layouts.app')

@section('content')
    <table class="table table-striped">
        <tr>
            <th>Title</th>
            <th>Starting date</th>
            <th>Ending date</th>
            <th>Status</th>
            <th>Edit</th>
            <th>Delete</th>
        </tr>

        @foreach ($calendar as $item)
        <tr>
                <td>
                    {{$item->event_name}}
                </td>
                <td>
                    {{$item->start_date}}
                </td>
                <td>
                    {{$item->end_date}}
                </td>
                <td>
                    @if ($item->approve == 1)
                        Approved
                    @elseif($item->decline == 1)
                        Rejected! 
                        {{$item->declinemessage}}
                    @else
                        Pending
                    @endif
                </td>
                <td>
                    <a href="/discussion/status/edit/{{$item->id}}">Edit</a>
                </td>
                <td>
                    {{Form::open(['action' => ['CommentController@deleteappointment', $item->id], 'method' =>'delete'])}}
                    {{Form::submit('Delete',['class'=>'btn btn-danger'])}}
                    {{Form::close()}}
                </td>
            </tr>      
        @endforeach
    </table>
@endsection