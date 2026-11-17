!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Consulta de ventas</title>
    <!-- Enlace al archivo CSS externo -->
    <link rel="stylesheet" href="consultar.css">
</head>
<body>

<?php
$conexion = mysqli_connect("localhost", "root", "", "bd1") or
    die("Problemas con la conexión");


    $codigo=(int)$_REQUEST['codigo'];



$registros = mysqli_query($conexion, "SELECT codigo, cantidad, total, descripcion, valorunitario FROM valor WHERE codigo=$codigo") or
    die("Problemas en el select: " . mysqli_error($conexion));





echo "<table class='tabla-datos'>";
echo "<thead>";
echo "<tr><th colspan='6'>Datos de ventas</th></tr>";
echo "<tr>
        <th>codigo</th>
        <th>cantidad</th>
        <th>total</th>
        <th>descripcion</th>
        <th>valorunitario</th>
        
      </tr>";
echo "</thead>";


while ($reg = mysqli_fetch_array($registros)) {
    echo "<tr>
            <td>" . $reg['codigo'] . "</td>
            <td>" . $reg['cantidad'] . "</td>
            <td>" . $reg['total'] . "</td>
            <td>" . $reg['descripcion'] . "</td>
            <td>" . $reg['valorunitario'] . "</td>
         
          </tr>";
}

echo "</tbody>";
echo "</table>";

mysqli_close($conexion);
?>

<!-- Botón para regresar -->
<a href="consultarventas.html" class="btn-regresar">Regresar a Consultas</a>

</body>
</html>