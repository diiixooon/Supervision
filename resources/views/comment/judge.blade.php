@extends('layouts.app')

@section('content')
<h1>Approval</h1>
<br>
    <table class="table table-striped">
        <tr>
            <th>Document</th>
            <th>Status</th>
            <th>Approval</th>
            <th>Download</th>            
        </tr>
        <tr>
            <td>
                D1
            </td>
            <td>
                @if ($approval->d1 == 1)
                    submitted
                @else
                    no update
                @endif
            </td>
            <td>
                {{Form::open(['action' => ['ApprovalController@approvalfunc', $approval->id], 'method'=> 'POST'])}}
                        <button name="d1approvebtn" id="approvebtn" type="submit" class="btn btn-primary" value="approve">Approve</button>
                        <button name="d1declinebtn" id="declinebtn" type="submit" class="btn btn-primary" value="decline">Decline</button>
                        <input type="hidden" name="hiddentext" value="1">
                        {{Form::text('d1declinemessage', '', ['class' => 'form-control', 'placeholder' => 'Decline Message'])}}
                {{Form::close()}}
            </td>
            <td>
                @if ($approval->d1 == 1)
                    <a download href="/storage/fypdocument/{{$approval->d1_document}}">
                        <button type="button" class="btn btn-primary"><i class="glyphicon glyphicon-download"> Download D1</i></button>
                    </a>
                @endif
            </td>
            
        </tr>
        <tr>
            <td>
                D2
            </td>
            <td>
                @if ($approval->d2 == 1)
                    submitted
                @else
                    no update
                @endif
            </td>
            <td>
                    {{Form::open(['action' => ['ApprovalController@approvalfunc', $approval->id], 'method'=> 'POST'])}}
                        <button name="d2approvebtn" id="approvebtn" type="submit" class="btn btn-primary" value="approve">Approve</button>
                        <button name="d2declinebtn" id="declinebtn" type="submit" class="btn btn-primary" value="decline">Decline</button>
                        <input type="hidden" name="hiddentext" value="2">
                        {{Form::text('d2declinemessage', '', ['class' => 'form-control', 'placeholder' => 'Decline Message'])}}
                    {{Form::close()}}
            </td>
            <td>
                @if ($approval->d2 == 1)
                    <a download href="/storage/fypdocument/{{$approval->d2_document}}">
                        <button type="button" class="btn btn-primary"><i class="glyphicon glyphicon-download"> Download D2</i></button>
                    </a>
                @endif
            </td>
            
        </tr>
        <tr>
            <td>
                D3
            </td>
            <td>
                @if ($approval->d3 == 1)
                    submitted
                @else
                    no update
                @endif
            </td>
            <td>
                {{Form::open(['action' => ['ApprovalController@approvalfunc', $approval->id], 'method'=> 'POST'])}}
                    <button name="d3approvebtn" id="approvebtn" type="submit" class="btn btn-primary" value="approve">Approve</button>
                    <button name="d3declinebtn" id="declinebtn" type="submit" class="btn btn-primary" value="decline">Decline</button>
                    <input type="hidden" name="hiddentext" value="3">
                    {{Form::text('d3declinemessage', '', ['class' => 'form-control', 'placeholder' => 'Decline Message'])}}
                {{Form::close()}}
            </td>
            <td>
                @if ($approval->d3 == 1)
                    <a download href="/storage/fypdocument/{{$approval->d3_document}}">
                        <button type="button" class="btn btn-primary"><i class="glyphicon glyphicon-download"> Download D3</i></button>
                    </a>
                @endif
                
            </td>
            
        </tr>
        <tr>
            <td>
                D4
            </td>
            <td>
                @if ($approval->d4 == 1)
                    submitted
                @else
                    no update
                @endif
            </td>
            <td>
                {{Form::open(['action' => ['ApprovalController@approvalfunc', $approval->id], 'method'=> 'POST'])}}
                        <button name="d4approvebtn" id="approvebtn" type="submit" class="btn btn-primary" value="approve">Approve</button>
                        <button name="d4declinebtn" id="declinebtn" type="submit" class="btn btn-primary" value="decline">Decline</button>
                        <input type="hidden" name="hiddentext" value="4">
                        {{Form::text('d4declinemessage', '', ['class' => 'form-control', 'placeholder' => 'Decline Message'])}}
                    {{Form::close()}}
            </td>
            <td>
                @if ($approval->d4 == 1)
                    <a download href="/storage/fypdocument/{{$approval->d4_document}}">
                        <button type="button" class="btn btn-primary"><i class="glyphicon glyphicon-download"> Download D4</i></button>
                    </a>
                @endif
            </td>
            
        </tr>
        <tr>
            <td>
                D5
            </td>
            <td>
                @if ($approval->d5 == 1)
                    submitted
                @else
                    no update
                @endif
            </td>
            <td>
                {{Form::open(['action' => ['ApprovalController@approvalfunc', $approval->id], 'method'=> 'POST'])}}
                        <button name="d5approvebtn" id="approvebtn" type="submit" class="btn btn-primary" value="approve">Approve</button>
                        <button name="d5declinebtn" id="declinebtn" type="submit" class="btn btn-primary" value="decline">Decline</button>
                        <input type="hidden" name="hiddentext" value="5">
                        {{Form::text('d5declinemessage', '', ['class' => 'form-control', 'placeholder' => 'Decline Message'])}}
                    {{Form::close()}}
            </td>
            <td>
                @if ($approval->d5 == 1)
                    <a download href="/storage/fypdocument/{{$approval->d5_document}}">
                        <button type="button" class="btn btn-primary"><i class="glyphicon glyphicon-download"> Download D5</i></button>
                    </a>
                @endif
            </td>
            
        </tr>
        <tr>
            <td>
                D6
            </td>
            <td>
                @if ($approval->d6 == 1)
                    submitted
                @else
                    no update
                @endif
            </td>
            <td>
                {{Form::open(['action' => ['ApprovalController@approvalfunc', $approval->id], 'method'=> 'POST'])}}
                        <button name="d6approvebtn" id="approvebtn" type="submit" class="btn btn-primary" value="approve">Approve</button>
                        <button name="d6declinebtn" id="declinebtn" type="submit" class="btn btn-primary" value="decline">Decline</button>
                        <input type="hidden" name="hiddentext" value="6">
                        {{Form::text('d6declinemessage', '', ['class' => 'form-control', 'placeholder' => 'Decline Message'])}}
                    {{Form::close()}}
            </td>
            <td>
                @if ($approval->d6 == 1)
                    <a download href="/storage/fypdocument/{{$approval->d6_document}}">
                        <button type="button" class="btn btn-primary"><i class="glyphicon glyphicon-download"> Download D6</i></button>
                    </a>
                @endif
            </td>
            
        </tr>
        <tr>
            <td>
                D7
            </td>
            <td>
                @if ($approval->d7 == 1)
                    submitted
                @else
                    no update
                @endif
            </td>
            <td>
                {{Form::open(['action' => ['ApprovalController@approvalfunc', $approval->id], 'method'=> 'POST'])}}
                        <button name="d7approvebtn" id="approvebtn" type="submit" class="btn btn-primary" value="approve">Approve</button>
                        <button name="d7declinebtn" id="declinebtn" type="submit" class="btn btn-primary" value="decline">Decline</button>
                        <input type="hidden" name="hiddentext" value="7">
                        {{Form::text('d7declinemessage', '', ['class' => 'form-control', 'placeholder' => 'Decline Message'])}}
                    {{Form::close()}}
            </td>
            <td>
                @if ($approval->d7 == 1)
                    <a download href="/storage/fypdocument/{{$approval->d7_document}}">
                        <button type="button" class="btn btn-primary"><i class="glyphicon glyphicon-download"> Download D7</i></button>
                    </a>
                @endif
            </td>
            
        </tr>
    </table>
    <small>Latest Update {{$approval->updated_at}}</small>
@endsection 