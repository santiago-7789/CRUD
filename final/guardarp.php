html>
<html>
<head>
<title>Problema</title>
</head>
<body>


<?php

$conexion=mysqli_connect("localhost","root","","bd1") or
    die("Problemas con la conexión");

mysqli_query($conexion,"insert into proveedor(nitproveedores,nombreproveedor,direccion,telefono,nombrecontacto,celularcontacto,valorpagoproveedor) values 
                        (  '$_REQUEST[nitproveedores]',        '$_REQUEST[nombreproveedor]','$_REQUEST[direccion]','$_REQUEST[telefono]','$_REQUEST[nombrecontacto]','$_REQUEST[celularcontacto]','$_REQUEST[valorpagoproveedor]')")





or die("Problemas en el select".mysqli_error($conexion));

mysqli_close($conexion);

echo "El Cliente fue guardado.";

echo "<script>
        setTimeout(function(){
            window.location.href='proveedor.html';
        }, 2000);
      </script>";

?>

</body>
</html>
