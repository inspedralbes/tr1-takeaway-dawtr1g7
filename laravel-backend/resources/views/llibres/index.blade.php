@extends('app')

@section('content')

    <form action="{{ route('view-afegir-llibre') }}" method="POST">
        @method('GET')
        @csrf
        <button class="btn btn-primary">AFEGIR LLIBRE</button>
    </form>
    
    <table class="table">
        <tr>
            <th>ID</th>
            <th>Títol</th>
            <th>Autor</th>
            <th>ISBN</th>
            <th>Preu</th>
        </tr>
        @foreach ($llibres as $llibre)
            <tr>
                <td>{{ $llibre->id }}</td>
                <td><a href="{{ route('view-modificar-llibre', ['id' => $llibre->id]) }}">{{ $llibre->titol }}</a></td>
                <td>{{ $llibre->autor }}</td>
                <td>{{ $llibre->isbn }}</td>
                <td>{{ $llibre->preu }}</td>
            </tr>
        @endforeach
    </table>
@endsection