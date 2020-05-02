@extends('layouts.app')

@section('content')
    <table class="table table-striped">
        <tr>
            <th>Title</th>
            <th>Starting date</th>
            <th>Ending date</th>
            <th>Student</th>
            <th></th>
        </tr>
        @foreach ($calendar as $item)
            @if ($item->approve == '0' && $item->decline == '0')
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
                    {{$user}}
                </td>
                <td>
                    {{Form::open(['action' => ['CommentController@approvaldate', $item->id], 'method'=> 'POST'])}}
                        <button name="approvebtn" id="approvebtn" type="submit" class="btn btn-primary" value="approve">Approve</button>
                        <button name="declinebtn" id="declinebtn" type="submit" class="btn btn-primary" value="decline">Decline</button>
                        {{Form::text('declinemessage', '', ['class' => 'form-control', 'placeholder' => 'Decline Message'])}}
                    {{Form::close()}}
                </td>
            </tr>

            @endif
            
        @endforeach
    </table>
@endsection