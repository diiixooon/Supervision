@extends('layouts.app')

@section('content')
<h1>Approval Status</h1>
<br>
    <table class="table table-striped">
        <tr>
            <th>Student matrik</th>
            <th>Student name</th>
            <th>Project title</th>
            <th>Project Description</th>
            <th></th>
        </tr>
        @foreach ($studentlist as $list)
            <tr>
                <td>{{$list->matrices_number}}</td>
                <td>{{$list->name}}</td>
                <td>{{$list->project_title}}</td>
                <td>{!!$list->description!!}</td>
                <td><a href="/approve/{{$list->matrices_number}}/view">View progress</a></td>
            </tr>
        @endforeach
    </table>
@endsection
