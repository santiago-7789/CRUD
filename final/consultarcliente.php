!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Consulta de cliente</title>
    <!-- Enlace al archivo CSS externo -->
    <link rel="stylesheet" href="consultar.css">
</head>
<body>

<?php
$conexion = mysqli_connect("localhost", "root", "", "bd1") or
    die("Problemas con la conexión");


    $codigo=(int)$_REQUEST['codigo'];
$registros = mysqli_query($conexion, "SELECT codigo, nombres, apellidos, direccion, telefono, correo FROM clientes WHERE codigo=$codigo") or
    die("Problemas en el select: " . mysqli_error($conexion));



 

echo "<table class='tabla-datos'>";
echo "<thead>";
echo "<tr><th colspan='6'>Datos de Clientes</th></tr>";
echo "<tr>
        <th>codigo</th>
        <th>Nombres</th>
        <th>Apellidos</th>
        <th>Dirección</th>
        <th>Teléfono</th>
        <th>Correo</th>
      </tr>";
echo "</thead>";


while ($reg = mysqli_fetch_array($registros)) {
    echo "<tr>
            <td>" . $reg['codigo'] . "</td>
            <td>" . $reg['nombres'] . "</td>
            <td>" . $reg['apellidos'] . "</td>
            <td>" . $reg['direccion'] . "</td>
            <td>" . $reg['telefono'] . "</td>
            <td>" . $reg['correo'] . "</td>
          </tr>";
}

echo "</tbody>";
echo "</table>";

mysqli_close($conexion);
?>

<!-- Botón para regresar -->
<a href="consultarcliente.html" class="btn-regresar">Regresar a Consultas</a>

</body>
</html>
