@extends('app')

@section('content')
    <div class="contenidor">
    <form class="p-4" action="{{ route('view-llibres-filtrats') }}" method="POST">
        @method('GET')
        @csrf
        <div class="field has-addons mb-3">
            <input type="text" name="filtre" class="form-control form-control--filtrar" placeholder="Filtra per id, títol, autor o ISBN">
            <button type="submit" class="button button--filtrar">FILTRAR</button>
        </div>
    </form>

    <form class="p-4 mb-4" action="{{ route('view-afegir-llibre') }}" method="POST">
        @method('GET')
        @csrf
        <button class="button button--icon is-success is-rounded is-responsive"><p>AFEGIR LLIBRE</p><img class="icon" src="{{url('/img/plus.png')}}" alt="suma" width=23 height=23></button>
    </form>
    
    <table class="table is-striped is-hoverable is-fullwidth">
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
                        <button class="button is-danger is-small is-centered eliminar"><img src="{{url('/img/delete.png')}}" alt="paperera"></button>
                    </form>
                </td>
            </tr>
        @endforeach
    </table>
    @if(count($llibres) == 0)
        <p class="notification is-danger is-light">No s'ha trobat cap resultat </p>
    @endif
    </div>
@endsection