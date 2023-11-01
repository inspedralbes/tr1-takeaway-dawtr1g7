@extends('app')

@section('content')

    <form class="p-4 mt-4 mb-4" action="{{ route('view-afegir-categoria') }}" method="POST">
        @method('GET')
        @csrf
        <button class="button is-success is-rounded">AFEGIR CATEGORIA</button>
    </form>
    
        <table class="table is-striped is-fullwidth">
            <tr>
                <th>ID</th>
                <th>Nom</th>
                <th></th>
            </tr>
            @foreach ($categories as $categoria)
            <tr>
                <td>{{ $categoria->id }}</td>
                <td><a href="{{ route('view-modificar-categoria', ['id' => $categoria->id]) }}">{{ $categoria->nom }}</a></td>
                <td>
                    <form action="{{ route('eliminar-categoria', ['id' => $categoria->id]) }}" method="POST">
                            @method('DELETE')
                            @csrf
                            <button class="button is-danger is-small is-centered eliminar"><img src="delete.png" alt="paperera"></button>
                    </form>
                </td>
            </tr>
            @endforeach
        </table>
@endsection