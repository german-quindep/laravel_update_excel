<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Email</title>
</head>

<body>
    @if (empty($productLog))
        <h1>No se encontraron nuevos productos registrados en la tabla log productos</h1>
    @else
        <h1>Productos registrados en la tabla Log Productos</h1>
        <h5>Lista de los productos:</h5>
        @foreach ($productLog as $value)
            <p>Id: {{ $value->id }}</p>
            <p>Secuencial: {{ $value->Secuencial }}</p>
            <p>Codigo: {{ $value->Codigo }}</p>
            <p>Bodega: {{ $value->Bodega }}</p>
            <p>Cantidad: {{ $value->Cantidad }}</p>
            <hr>
        @endforeach
    @endif
</body>

</html>
