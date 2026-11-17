<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Registrar venta</title>
</head>
<body>

<?php
$conexion = mysqli_connect("localhost", "root", "", "bd1")
    or die("Problemas con la conexión");

$cantidad = $_REQUEST['cantidad'];
$descripcion = $_REQUEST['Descripcion'];
$valor = $_REQUEST['valorunitario'];

// Calcular el total
$total = $cantidad * $valor;

// Guardar la venta, incluyendo el total calculado
mysqli_query($conexion, "INSERT INTO valor
(cantidad, Descripcion, valorunitario, total)
VALUES ('$cantidad', '$descripcion', '$valor', '$total')")
or die("Problemas al guardar: " . mysqli_error($conexion));

mysqli_close($conexion);

// Mostrar el resultado
echo "La venta fue guardada correctamente.<br>";
echo "El total de la venta es: $" . $total;

// Regresar al formulario después de 2 segundos
echo "<script>
    setTimeout(function(){
        window.location.href = 'ventas.html';
    }, 2000);
</script>";
?>

</body>
</html>
```


