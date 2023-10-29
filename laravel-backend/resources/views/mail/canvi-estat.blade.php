{{ $info[0]->name }}, l'estat de la teva comanda amb identificador {{ $info[0]->id }} ha canviat a {{ $info[0]->estat }}.

<table>
    <tr>
        <th>{{ $info[0]->id }}</th>
        <th>{{ $info[0]->estat }}</th>
    </tr>
    @foreach ($info as $comanda)
        <tr>
            <td>{{ $comanda->titol}}</td>
            <td>{{ $comanda->preu }}</td>
        </tr>          
    @endforeach
</table>