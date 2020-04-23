@extends('layouts.app')

@section('content')
<a href="/" class="btn btn-primary">Back</a>
<hr>
    <h1>Approval</h1>
    <hr>
    

    <table class="table table-striped">
        <thead>
            <tr>
                <th>Discussion</th>
                <th>Approval</th>
            </tr>
        </thead>

        <tbody>
            @forelse ($comments as $commentlist) 
            <tr>
                <td>{{$commentlist->comment}}</td>
                <td>
                    
                    <form action="{{url('/toogle-approve')}}" method="POST">
                      {{csrf_field()}}
                      
                      <input type="checkbox">

                      <input class="btn btn-primary" type="submit" value="Done">

                    </form>

                </td>
            </tr>
            @empty
            <div>No Data</div>  
            @endforelse  
        </tbody>
    </table>

