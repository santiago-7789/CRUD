<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Consulta de Empleados</title>
    <!-- Enlace al archivo CSS externo -->
    <link rel="stylesheet" href="consultar.css">
</head>
<body>

<?php
$conexion = mysqli_connect("localhost", "root", "", "bd1") or
    die("Problemas con la conexión");


$id=(int)$_REQUEST['id'];

$registros = mysqli_query($conexion, "SELECT id, nombres, apellidos, direccion, telefono, sueldo FROM empleados WHERE id= $id ") or
    die("Problemas en el select: " . mysqli_error($conexion));





echo "<table class='tabla-datos'>";
echo "<thead>";
echo "<tr><th colspan='6'>Datos de Empleados</th></tr>";
echo "<tr>
        <th>ID</th>
        <th>Nombres</th>
        <th>Apellidos</th>
        <th>Dirección</th>
        <th>Teléfono</th>
        <th>Sueldo</th>
      </tr>";
echo "</thead>";


while ($reg = mysqli_fetch_array($registros)) {
    echo "<tr>
            <td>" . $reg['id'] . "</td>
            <td>" . $reg['nombres'] . "</td>
            <td>" . $reg['apellidos'] . "</td>
            <td>" . $reg['direccion'] . "</td>
            <td>" . $reg['telefono'] . "</td>
            <td>" . $reg['sueldo'] . "</td>
          </tr>";
}

echo "</tbody>";
echo "</table>";

mysqli_close($conexion);
?>

<!-- Botón para regresar -->
<a href="consultar.html" class="btn-regresar">Regresar a Consultas</a>

</body>
</html>
