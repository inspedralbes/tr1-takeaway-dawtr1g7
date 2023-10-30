<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../../../public/css/styles.css" rel="stylesheet">
    <style>
        #container {
            background-color: #b8caff;
            font-family: Helvetica;
        }

        #content {
            width: 70%;
            margin: auto;
            background-color: white;
            padding: 30px;
        }

        #content > p {
            font-size: 1.2em;
        }

        table {
            width: 50%;
            margin: auto;
            margin-top: 30px;
            border-collapse: collapse;
        }

        table, th {
            border: 1px solid black;
        }

        th {
            background-color: #b8caff;
        }

        th, td {
            padding: 8px;
        }

        .center {
            text-align: center;
        }

        .right {
            text-align: right;
        }

        .bold {
            font-weight: 900;
        }

        .width_3{
            width: 3%;
        }

        .width_7{
            width: 7%;
        }

        .width_10{
            width: 10%;
        }

        .width_20{
            width: 16%;
        }
    </style>
</head>
<body>
    <div id="container">
<div id="content">
<p>{{ $name }}, l'estat de la teva comanda amb identificador {{ $id }} ha canviat a {{ $estat }}.</p>
<table>
    <tr>
        <th>IDENTIFICADOR: {{ $id }}</th>
        <th colspan = "5">{{ $estat }}</th>
    </tr>
    @php($totalPrice = 0)
    @foreach ($llibres as $llibre)
        @php($rowPrice = $llibre->preu * $llibre->quantitat)
        @php($totalPrice += $rowPrice)
        <tr>
            <td>{{ $llibre->titol }}</td>
            <td class="right width_10">{{ $llibre->preu }}</td>
            <td class="center width_3">*</td>
            <td class="right width_7">{{ $llibre->quantitat }}</td>
            <td class="right width_7">=</td>
            <td class="right width_20">{{ $rowPrice }} €</td>
        </tr>          
    @endforeach
        <tr>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
        </tr>
        <tr class="bold">
            <td>TOTAL</td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td class="right">{{ $totalPrice }} €</td>
        </tr>
</table>
</div>
</div>

</body>
</html>