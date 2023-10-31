@extends('app')

@section('content')

    
        <table class="table">
            <tr>
                <th>Títol</th>
                <th>Autor</th>
                <th>ISBN</th>
                <th>Preu</th>
            </tr>
            @foreach ($llibres as $llibre)
            <tr>
                <td>{{ $llibre->titol }}</td>
                <td>{{ $llibre->autor }}</td>
                <td>{{ $llibre->isbn }}</td>
                <td>{{ $llibre->preu }}</td>
            </tr>
            @endforeach
        </table>
@endsection