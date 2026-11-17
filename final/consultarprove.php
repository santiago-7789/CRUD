!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Consulta de proveedor</title>
    <!-- Enlace al archivo CSS externo -->
    <link rel="stylesheet" href="consultar.css">
</head>
<body>

<?php
$conexion = mysqli_connect("localhost", "root", "", "bd1") or
    die("Problemas con la conexión");

    $nitproveedores=(int)$_REQUEST['nitproveedores'];
$registros = mysqli_query($conexion, "SELECT nitproveedores, nombreproveedor,  direccion, telefono, nombrecontacto,celularcontacto,valorpagoproveedor FROM proveedor WHERE nitproveedores=$nitproveedores") or
    die("Problemas en el select: " . mysqli_error($conexion));





echo "<table class='tabla-datos'>";
echo "<thead>";
echo "<tr><th colspan='6'>Datos de proveedores</th></tr>";
echo "<tr>
        <th>nitproveedores</th>
        <th>nombreproveedor</th>
        <th>direccion</th>
        <th>telefono</th>
        <th>nombrecontacto</th>
        <th>celularcontacto</th>
        <th>valorpagoproveedor</th>
      </tr>";
echo "</thead>";


while ($reg = mysqli_fetch_array($registros)) {
    echo "<tr>
            <td>" . $reg['nitproveedores'] . "</td>
            <td>" . $reg['nombreproveedor'] . "</td>
            <td>" . $reg['direccion'] . "</td>
            <td>" . $reg['telefono'] . "</td>
            <td>" . $reg[' nombrecontacto'] . "</td>
            <td>" . $reg['celularcontacto'] . "</td>
            <td>" . $reg['valorpagoproveedor'] . "</td>
          </tr>";
}

echo "</tbody>";
echo "</table>";

mysqli_close($conexion);
?>

<!-- Botón para regresar -->
<a href="consultarprove.html" class="btn-regresar">Regresar a Consultas</a>

</body>
</html>
