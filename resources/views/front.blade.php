@extends('layouts.app')

@section('content')
<a href="/" class="btn btn-primary">Back</a>
<hr>
    <h1>Discussion</h1>
    <hr>
    

<form action="{{url('/comment')}}" method="POST">
    {{csrf_field()}}

    <div class="form-group">
    <label for="comment"></label>
        <input class="form-control" name="comment" placeholder="Write Disucssion" type="text">
    </div>


    <input class="btn btn-primary" type="submit" value="Done">

</form>
<br>
    <div>List of Discussion</div>
<hr>
<ol>

   @foreach($comments as $commentlist)

<li class="lead">{{$commentlist->comment}}</li>
<br>
<hr>

@endforeach
    

</ol>


</body>
</html>
@endsection




