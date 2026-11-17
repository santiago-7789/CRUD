<html>
<html>
<head>
<title>Problema</title>
</head>
<body>


<?php

$conexion=mysqli_connect("localhost","root","","bd1") or
    die("Problemas con la conexión");

mysqli_query($conexion,"insert into empleados(nombres,apellidos,direccion,telefono,sueldo) values 
                        ('$_REQUEST[nombre]','$_REQUEST[apellidos]','$_REQUEST[direccion]','$_REQUEST[telefono]','$_REQUEST[sueldo]')")
or die("Problemas en el select".mysqli_error($conexion));

mysqli_close($conexion);

echo "El empleado fue guardado.";

echo "<script>
        setTimeout(function(){
            window.location.href='empleados.html';
        }, 2000);
      </script>";

?>

</body>
</html>

