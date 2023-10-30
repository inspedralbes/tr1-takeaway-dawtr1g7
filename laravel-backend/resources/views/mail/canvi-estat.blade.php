{{ $name }}, l'estat de la teva comanda amb identificador {{ $id }} ha canviat a {{ $estat }}.

<table>
    <tr>
        <th>{{ $id }}</th>
        <th>{{ $estat }}</th>
    </tr>
    @foreach ($llibres as $llibre)
        <tr>
            <td>{{ $llibre->titol}}</td>
            <td>{{ $llibre->preu }}</td>
        </tr>          
    @endforeach
</table>