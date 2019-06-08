<?php
$nombre = $_POST["nombre"];


require "config.php";

$conexion = mysqli_connect(DB_SERVIDOR, DB_USUARIO, DB_CONTRASENA, DB_BASEDATOS);

// El nombre debe ser exacto
$sql = "delete from cancion where nombre='$nombre' ";

// Si no funcion la consulta => descomentar las siguientes 2 lineas
//echo $sql;
//die();

$rta = mysqli_query($conexion, $sql);
if ($rta == false) {
    echo mysqli_error($conexion);
    die("No se pudo consultar a la base de datos");
}

// Si llego hasta aca es que se pudo realizar la consulta => hay que mostrar los resultados
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Borrado de cancion</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</head>

<body>
    <div class="container">
        <h2>Resultado del borrado</h2>


        <?php

        if (mysqli_affected_rows($conexion) == 0) {
            echo "Esta canción no se pudo eliminar porque no existe en nuestra base de datos!";
            die();
        }

        // Si llego hasta aca es porque se encontro algun resultado => genero la tabla
        echo "Ya eliminamos la canción: $nombre";

        ?>


    </div>
</body>

</html>