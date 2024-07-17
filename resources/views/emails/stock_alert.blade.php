<!DOCTYPE html>
<html>
<head>
    <title>Alerte de Stock</title>
</head>
<body>
    <h1>Alerte de Stock</h1>
    <p>Article : {{ $articleName }}</p>
    <p>Quantité disponible : {{ $articleQuantity }}</p>
    <p>Quantité demandée : {{ $requestedQuantity }}</p>
    @if($requestedQuantity > $articleQuantity)
        <p style="color: red;">La quantité demandée est supérieure à la quantité disponible !</p>
    @endif
</body>
</html>
