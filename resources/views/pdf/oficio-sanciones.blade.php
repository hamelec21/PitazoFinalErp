
<!DOCTYPE html>
<html>

<head>
    <title>Oficio de Sanciones</title>
    <style>
        /* Agrega tus estilos CSS aquí */
    </style>
</head>
<body>
    <h1>Oficio de Sanciones</h1>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Descripción</th>
                <th>Fecha</th>
                <th>Estado</th>
            </tr>
        </thead>
        <tbody>
            @foreach($sanciones as $sancion)
                <tr>
                    <td>{{ $sancion->id }}</td>
                    <td>{{ $sancion->sancion }}</td>
                    <td>{{ $sancion->fecha_id }}</td>

                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
