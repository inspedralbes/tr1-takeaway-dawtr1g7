@extends('app')

@section('content')

    <div class="contenidor">   
        <table class="table mt-6 is-striped is-hoverable is-fullwidth">
            <tr>
                <th>ID</th>
                <th>Estat</th>
                <th>Llibres</th>
            </tr>
            @php($comanda_actual = 0)
            @php($i = 0)
            @php($j = 0)
            @foreach ($comandes as $comanda)
                    @if ($comanda->id != $comanda_actual)
                    <tr>
                        <td>{{ $comanda->id}}</td>
                        <td><a href="{{ route('view-modificar-comanda', ['id' => $comanda->id]) }}">{{ $comanda->estat}}</a></td>
                        <td><ul><li>{{ $comanda->titol }} {{ $comanda->preu }}</li>
                    @php($comanda_actual = $comanda->id)
                    @else
                    <li>{{ $comanda->titol}} {{ $comanda->preu }}</li>
                    @endif
                @php($i++)
                @if ($i == $num_llibres[$j]->total)
                    @php($i = 0)
                    @php($j++)
                    </ul></td></tr>
                @endif
            @endforeach
        </table>
    </div>
@endsection