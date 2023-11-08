@extends('app')

@section('content')
    
    <form class="p-4" action="{{ route('view-categories-filtrades') }}" method="POST">
        @method('GET')
        @csrf
        <div class="field has-addons mb-3">
            <input type="text" name="filtre" class="form-control field__input" placeholder="Filtra per id o nom">
            <button type="submit" class="button is-link filtrar">FILTRAR</button>
        </div>
    </form>

    <div class="contenidor">
    <form class="p-4 mb-4" action="{{ route('view-afegir-categoria') }}" method="POST">
        @method('GET')
        @csrf
        <button class="button is-success is-rounded is-responsive">AFEGIR CATEGORIA <img class="icon-right" src="{{url('/img/plus.png')}}" alt="suma" width=23 height=23></button>
    </form>
    
        <table class="table is-striped is-hoverable is-fullwidth">
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
                            <button class="button is-danger is-small is-centered eliminar"><img src="{{url('/img/delete.png')}}" alt="paperera"></button>
                    </form>
                </td>
            </tr>
            @endforeach
        </table>
        @if(count($categories) == 0)
        <p class="notification is-danger is-light">No s'ha trobat cap resultat </p>
        @endif
        </div>
@endsection