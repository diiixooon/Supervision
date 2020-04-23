@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Supervisor Dashboard</div>

                <div class="panel-body">
                    @component('components.who')
                    @endcomponent

                    {{-- You are logged in as <strong>Supervisor</strong>!
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }} --}}
                        </div>

          
                </div>
            </div>
        </div>
    </div>
</div>
@endsection