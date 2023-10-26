@extends('app')

@section('content')
   
        <table class="table">
            <tr>
                <th>ID</th>
                <th>Nom</th>
                <th></th>
                <th></th>
            </tr>
            @foreach ($comandes as $comanda)
            <tr>
                <td>{{ $comanda->id}}</td>
                <td><a href="{{ route('view-modificar-comanda', ['id' => $comanda->id]) }}">{{ $comanda->estat}}</a></td>
                <td>{{ $comanda->titol}}</td>
                <td>
                </td>
            </tr>
            @endforeach
        </table>
@endsection