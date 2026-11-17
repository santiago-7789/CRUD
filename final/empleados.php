<?php

include("conexion.php");

/* AGREGAR */
if (isset($_POST['agregar'])) {

    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $cargo = $_POST['cargo'];
    $salario = $_POST['salario'];

    $sql = "INSERT INTO empleados
            (nombre, apellido, cargo, salario)
            VALUES
            ('$nombre', '$apellido', '$cargo', '$salario')";

    mysqli_query($conexion, $sql);
}

?>

<!DOCTYPE html>

<html>

<head>

    <title>Empleados</title>

    <link rel="stylesheet" href="csshtml.css">

    <style>

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 25px;
        }

        th, td {
            border: 1px solid #ccc;
            padding: 10px;
            text-align: center;
        }

        th {
            background-color: #3498db;
            color: white;
        }

        input[type="text"],
        input[type="number"] {
            padding: 8px;
            margin: 5px;
        }

        input[type="submit"] {
            padding: 8px 15px;
            background-color: #3498db;
            color: white;
            border: none;
            border-radius: 5px;
        }

        .eliminar {
            color: red;
        }

        .volver {
            display: inline-block;
            margin-top: 20px;
            padding: 10px;
            background-color: #555;
            color: white;
            text-decoration: none;
            border-radius: 5px;
        }

    </style>

</head>

<body>

<div class="contenedor">

    <h2>GESTIÓN DE EMPLEADOS</h2>


    <?php if ($empleado == null) { ?>

        <!-- FORMULARIO AGREGAR -->

        <h3>Agregar empleado</h3>

        <form method="post">

            <input type="text"  name="nombre"  placeholder="Nombre"  required>

            <input type="text"  name="apellido" placeholder="Apellido" required>

            <input type="text" name="cargo" placeholder="Cargo" required>

            <input type="number" name="salario" placeholder="Salario"  required>

            <br><br>

            <input type="submit" name="agregar" value="Agregar empleado">

        </form>

    <?php } else { ?>

        <!-- FORMULARIO MODIFICAR -->

        <h3>Modificar empleado</h3>

        <form method="post">

            <input type="hidden"
                   name="id"
                   value="<?php echo $empleado['id']; ?>">

            <input type="text"
                   name="nombre"
                   value="<?php echo $empleado['nombre']; ?>">

            <input type="text"
                   name="apellido"
                   value="<?php echo $empleado['apellido']; ?>">

            <input type="text"
                   name="cargo"
                   value="<?php echo $empleado['cargo']; ?>">

            <input type="number"
                   name="salario"
                   value="<?php echo $empleado['salario']; ?>">

            <br><br>

            <input type="submit"
                   name="modificar"
                   value="Modificar empleado">

        </form>

    <?php } ?>


    <!-- MOSTRAR EMPLEADOS -->

    <h3>Lista de empleados</h3>

    <table>

        <tr>

            <th>ID</th>
            <th>Nombre</th>
            <th>Apellido</th>
            <th>Cargo</th>
            <th>Salario</th>
            <th>Acciones</th>

        </tr>


        <?php

        $sql = "SELECT * FROM empleados";

        $resultado = mysqli_query($conexion, $sql);

        while ($fila = mysqli_fetch_assoc($resultado)) {

        ?>

        <tr>

            <td>
                <?php echo $fila['id']; ?>
            </td>

            <td>
                <?php echo $fila['nombre']; ?>
            </td>

            <td>
                <?php echo $fila['apellido']; ?>
            </td>

            <td>
                <?php echo $fila['cargo']; ?>
            </td>

            <td>
                <?php echo $fila['salario']; ?>
            </td>

            <td>

                <a href="empleados.php?editar=<?php echo $fila['id']; ?>">
                    Modificar
                </a>

                |

                <a class="eliminar"
                   href="empleados.php?eliminar=<?php echo $fila['id']; ?>">
                    Eliminar
                </a>

            </td>

        </tr>

        <?php } ?>

    </table>


    <br>

    <a class="volver" href="index.html">
        Volver al menú principal
    </a>

</div>

</body>

</html>