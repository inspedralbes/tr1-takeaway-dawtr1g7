<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Codi QR Comanda</title>
</head>

<body>
    <div>
        <div>
            {!! QrCode::size(300)->generate($contingut) !!}
        </div>
    </div>
</body>
</html>