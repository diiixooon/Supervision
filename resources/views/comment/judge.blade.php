@extends('layouts.app')

@section('content')
    <table>
        <tr>
            <th>Progress</th>
            <th>D1</th>
            <th></th>
            <th>D1</th>
            <th></th>
            <th>D2</th>
            <th></th>
            <th>D3</th>
            <th></th>
            <th>D4</th>
            <th></th>
            <th>D5</th>
            <th></th>
            <th>D6</th>
            <th></th>
            <th>D7</th>
            <th></th>

        </tr>
        <tr>
            <td></td>
            @foreach ($approval as $list)
            <td>
                @if ($list->d1 == 1)
                    submitted
                @else
                    no update
                @endif
            </td>
            <td>
                <a download href="/storage/fypdocument/{{$list->d1_document}}">
                    <button type="button" class="btn btn-primary"><i class="glyphicon glyphicon-download"> Download D1</i></button>
                </a>
            </td>
            <td>
                @if ($list->d2 == 1)
                    submitted
                @else
                    no update
                @endif
            </td>
            <td>
                <a download href="/storage/fypdocument/{{$list->d2_document}}">
                    <button type="button" class="btn btn-primary"><i class="glyphicon glyphicon-download"> Download D2</i></button>
                </a>
            </td>
            <td>
                @if ($list->d3 == 1)
                    submitted
                @else
                    no update
                @endif
            </td>
            <td>
                <a download href="/storage/fypdocument/{{$list->d3_document}}">
                    <button type="button" class="btn btn-primary"><i class="glyphicon glyphicon-download"> Download D3</i></button>
                </a>
            </td>
            <td>
                @if ($list->d4 == 1)
                    submitted
                @else
                    no update
                @endif
            </td>
            <td>
                <a download href="/storage/fypdocument/{{$list->d4_document}}">
                    <button type="button" class="btn btn-primary"><i class="glyphicon glyphicon-download"> Download D4</i></button>
                </a>
            </td>
            <td>
                @if ($list->d5 == 1)
                    submitted
                @else
                    no update
                @endif
            </td>
            <td>
                <a download href="/storage/fypdocument/{{$list->d5_document}}">
                    <button type="button" class="btn btn-primary"><i class="glyphicon glyphicon-download"> Download D5</i></button>
                </a>
            </td>
            <td>
                @if ($list->d6 == 1)
                    submitted
                @else
                    no update
                @endif
            </td>
            <td>
                <a download href="/storage/fypdocument/{{$list->d6_document}}">
                    <button type="button" class="btn btn-primary"><i class="glyphicon glyphicon-download"> Download D6</i></button>
                </a>
            </td>
            <td>
                @if ($list->d7 == 1)
                    submitted
                @else
                    no update
                @endif
            </td>
            <td>
                <a download href="/storage/fypdocument/{{$list->d7_document}}">
                    <button type="button" class="btn btn-primary"><i class="glyphicon glyphicon-download"> Download D7</i></button>
                </a>
            </td>
            @endforeach
        </tr>
    </table>
@endsection 