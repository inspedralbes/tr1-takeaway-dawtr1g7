@extends('app')

@section('content')
<div class="contenidor">
        @if (session('success'))
            <h6 class="notification is-success is-light">{{ session('success') }}</h6>
        @endif
    <form class="p-4" action="{{ route('view-usuaris-filtrats') }}" method="POST">
        @method('GET')
        @csrf
        <div class="field has-addons mb-3">
            <input type="text" name="filtre" class="form-control form-control--filtrar" placeholder="Filtra per id, nom o email">
            <button type="submit" class="button button--filtrar">FILTRAR</button>
        </div>
    </form>
    <form class="p-4 mt-4 mb-4" action="{{ route('view-afegir-usuari') }}" method="POST">
        @method('GET')
        @csrf
        <button class="button button--icon is-success is-rounded is-responsive"><p>AFEGIR USUARI</p><img class="icon" src="{{url('/img/plus.png')}}" alt="suma" width=23 height=23></button>
    </form>
    
    <table class="table is-striped is-hoverable is-fullwidth">
        <tr>
            <th>ID</th>
            <th>Nom</th>
            <th>Email</th>
            <th>Telefon</th>
            <th></th>
        </tr>
        @foreach ($usuaris as $usuari)
            <tr>
                <td>{{ $usuari->id }}</td>
                <td><a href="{{ route('view-modificar-usuari', ['id' => $usuari->id]) }}">{{ $usuari->name }}</a></td>
                <td>{{ $usuari->email }}</td>
                <td>{{ $usuari->telefon }}</td>
                <td>
                    <form action="{{ route('eliminar-usuari', ['id' => $usuari->id]) }}" method="POST">
                            @method('DELETE')
                            @csrf
                            <button class="button is-danger is-small is-centered eliminar"><img src="{{url('/img/delete.png')}}" alt="paperera"></button>
                    </form>
                </td>
            </tr>
        @endforeach
    </table>
    @if(count($usuaris) == 0)
        <p class="notification is-danger is-light">No s'ha trobat cap resultat </p>
    @endif
    </div>
@endsection