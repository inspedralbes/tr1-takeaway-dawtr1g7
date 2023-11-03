@extends('app')

@section('content')
    
    <div class="contenidor">
    <form class="p-4 mt-4 mb-4" action="{{ route('view-afegir-categoria') }}" method="POST">
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
                            <button class="button is-danger is-small is-centered eliminar"><img src="img/delete.png" alt="paperera"></button>
                    </form>
                </td>
            </tr>
            @endforeach
        </table>
        </div>
@endsection