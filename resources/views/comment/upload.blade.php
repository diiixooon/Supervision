@extends('layouts.app')

@section('content')
    {{Form::open(['action' => 'ApprovalController@upload', 'method' => 'POST', 'enctype' => 'multipart/form-data'])}}
    <h2>Upload Document</h2>
    <table class="table table-striped">
        <tr>
            <th>Document</th>
            <th>Status</th>
        </tr>
        <tr>
            <td>
                <input type="radio" name="document" value="1">D1
            </td>
            <td>
                @if ($approval->d1_approve == 1)
                    Approved
                @elseif($approval->d1_decline == 1)
                    Declined! {{$approval->d1declinemessage}}
                @elseif($approval->d1 == 0)
                Not Available
                @else
                    Pending
                @endif
            </td>
        </tr>
        <tr>
            <td>
                <input type="radio" name="document" value="2">D2
            </td>
            <td>
                @if ($approval->d2_approve == 1)
                    Approved
                @elseif($approval->d2_decline == 1)
                    Declined! {{$approval->d2declinemessage}}
                @elseif($approval->d2 == 0)
                Not Available
                @else
                    Pending
                @endif
            </td>
        </tr>
        <tr>
            <td>
                <input type="radio" name="document" value="3">D3
            </td>
            <td>
                @if ($approval->d3_approve == 1)
                    Approved
                @elseif($approval->d3_decline == 1)
                    Declined! {{$approval->d3declinemessage}}
                @elseif($approval->d3 == 0)
                Not Available
                @else
                    Pending
                @endif
            </td>
        </tr>
            
        <tr>
            <td>
                <input type="radio" name="document" value="4">D4
            </td>
            <td>
                @if ($approval->d4_approve == 1)
                    Approved
                @elseif($approval->d4_decline == 1)
                    Declined! {{$approval->d4declinemessage}}
                @elseif($approval->d4 == 0)
                Not Available
                @else
                    Pending
                @endif
            </td>
        </tr>
           
        <tr>
            <td>
                <input type="radio" name="document" value="5">D5
            </td>
            <td>
                @if ($approval->d5_approve == 1)
                    Approved
                @elseif($approval->d5_decline == 1)
                    Declined! {{$approval->d5declinemessage}}
                @elseif($approval->d5 == 0)
                Not Available
                @else
                    Pending
                @endif
            </td>
        </tr>
           
        <tr>
            <td>
                <input type="radio" name="document" value="6">D6
            </td>
            <td>
                @if ($approval->d6_approve == 1)
                    Approved
                @elseif($approval->d6_decline == 1)
                    Declined! {{$approval->d6declinemessage}}
                @elseif($approval->d6 == 0)
                Not Available
                @else
                    Pending
                @endif
            </td>
        </tr>
        <tr>
            <td>
                <input type="radio" name="document" value="7">D7
            </td>
            <td>
                @if ($approval->d7_approve == 1)
                    Approved
                @elseif($approval->d7_decline == 1)
                    Declined! {{$approval->d7declinemessage}}
                @elseif($approval->d7 == 0)
                    Not Available
                @else
                    Pending
                @endif
            </td>
        </tr>
        
    </table>


    <br>
    {{Form::label('fypdocument', 'Upload Your Document')}}
    {{Form::file('fypdocument')}}

    <br>
    {{Form::submit('Submit', ['class' => 'btn btn-info'])}}
    {{Form::close()}}
@endsection