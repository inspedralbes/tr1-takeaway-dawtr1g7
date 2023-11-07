@extends('app')

@section('content')

    <form action="{{ route('view-comandes-filtrades') }}" method="POST">
        @method('GET')
        @csrf
        <div class="mb-3">
            <input type="checkbox" name="estat1" value="En procés">
            <label for="estat1">En procés</label><br>
            <input type="checkbox" name="estat2" value="Petició rebuda">
            <label for="estat2">Petició rebuda</label><br>
            <input type="checkbox" name="estat3" value="Esperant ser recollit">
            <label for="estat3">Esperant ser recollit</label><br>
            <input type="checkbox" name="estat4" value="Recollit">
            <label for="estat4">Recollit</label><br>
        </div>
        <div class="mb-3">
                <label for="id" class="form-label">Identificador</label>
                <input type="text" name="id" class="form-control">
        </div>
        <button type="submit" class="btn btn-primary">FILTRAR</button>
    </form>

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
        @if(count($comandes) == 0)
            <p>No s'ha trobat cap resultat </p>
        @endif
    </div>
@endsection