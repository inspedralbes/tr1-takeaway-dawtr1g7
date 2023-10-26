@extends('app')

@section('content')
    
        <table class="table">
            <tr>
                <th>ID</th>
                <th>Nom</th>
            </tr>
            @foreach ($categories as $categoria)
            <tr>
                <td>{{ $categoria->id }}</td>
                <td>{{ $categoria->nom }}</td>
            </tr>
            @endforeach
        </table>
@endsection