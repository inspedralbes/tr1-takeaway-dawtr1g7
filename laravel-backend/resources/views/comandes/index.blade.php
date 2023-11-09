@extends('app')

@section('content')
    <div class="contenidor"> 
    <form class="container p-4 mt-4" action="{{ route('view-comandes-filtrades') }}" method="POST">
        @method('GET')
        @csrf
        <div class="mb-3">
            <h5>Estat</h5>
            <label class="checkbox" for="estat1">
                <input type="checkbox" name="estat1" value="Pendent">
                Pendent
            </label><br>
            <label class="checkbox" for="estat2">
                <input type="checkbox" name="estat2" value="En preparació">
                En preparació
            </label><br>
            <label class="checkbox" for="estat3">
                <input type="checkbox" name="estat3" value="Esperant a ser recollida">
                Esperant a ser recollida
            </label><br>
            <label class="checkbox" for="estat4">
                <input type="checkbox" name="estat4" value="Recollida">
                Recollida
            </label><br>
        </div>
        <div class="mb-3">
            <h5>Identificador</h5>
            <input type="text" name="id" class="form-control" placeholder="Filtra per id">
        </div>
        <button type="submit" class="button button--filtrar is-rounded is-responsive">FILTRAR</button>
    </form>  
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
            <p class="notification is-danger is-light">No s'ha trobat cap resultat </p>
        @endif
    </div>
@endsection