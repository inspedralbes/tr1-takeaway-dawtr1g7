@extends('app')

@section('content')

    <form class="p-4 mt-4 mb-4" action="{{ route('view-afegir-llibre') }}" method="POST">
        @method('GET')
        @csrf
        <button class="button is-success is-rounded">AFEGIR LLIBRE</button>
    </form>
    
    <table class="table is-striped is-fullwidth">
        <tr>
            <th>ID</th>
            <th>Títol</th>
            <th>Autor</th>
            <th>ISBN</th>
            <th>Preu</th>
            <th></th>
        </tr>
        @foreach ($llibres as $llibre)
            <tr>
                <td>{{ $llibre->id }}</td>
                <td><a href="{{ route('view-modificar-llibre', ['id' => $llibre->id]) }}">{{ $llibre->titol }}</a></td>
                <td>{{ $llibre->autor }}</td>
                <td>{{ $llibre->isbn }}</td>
                <td>{{ $llibre->preu }}</td>
                <td>
                    <form action="{{ route('eliminar-llibre', ['id' => $llibre->id]) }}" method="POST">
                            @method('DELETE')
                            @csrf
                            <button class="button is-danger is-small is-centered eliminar"><img src="delete.png" alt="paperera"></button>
                    </form>
                </td>
            </tr>
        @endforeach
    </table>
@endsection