@extends('app')

@section('content')
   
        <table class="table is-striped is-fullwidth">
            <tr>
                <th>ID</th>
                <th>Estat</th>
                <th>Llibres</th>
            </tr>
            @php($comanda_actual = 0)
            @php($i = 0)
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
                @if ($i == $num_llibres[$comanda->id-1]->total)
                    @php($i = 0)
                    </ul></td></tr><!---->
                @endif
            @endforeach
        </table>
@endsection