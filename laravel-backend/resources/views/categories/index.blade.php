@extends('app')

@section('content')

    <form action="{{ route('view-afegir-categoria') }}" method="POST">
        @method('GET')
        @csrf
        <button class="btn btn-primary">AFEGIR CATEGORIA</button>
    </form>
    
        <table class="table">
            <tr>
                <th>ID</th>
                <th>Nom</th>
            </tr>
            @foreach ($categories as $categoria)
            <tr>
                <td>{{ $categoria->id }}</td>
                <td><a href="{{ route('view-modificar-categoria', ['id' => $categoria->id]) }}">{{ $categoria->nom }}</a></td>
            </tr>
            @endforeach
        </table>
@endsection