<?php
$album = $_GET["album"];


require "config.php";

$conexion = mysqli_connect(DB_SERVIDOR, DB_USUARIO, DB_CONTRASENA, DB_BASEDATOS);


$sql = "select * from cancion where album like '%$album%' ";

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
    <title>Resultados de la búsqueda</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</head>

<body>
    <div class="container">
        <h2>Resultados de la búsqueda</h2>


        <?php

        if (mysqli_num_rows($rta) == 0) {
            echo "este album no está en nuestra lista actualmente";
            die();
        }

        // Si llego hasta aca es porque se encontro algun resultado => genero la tabla
        echo "<table class='table'>
                <tr>
                    <th>Nombre</th>
                    <th>Album</th>
                    <th>Artista</th>
                </tr>";
        while ($unRegistro = mysqli_fetch_array($rta)) {
            $nombre = $unRegistro['nombre'];
            $album = $unRegistro['album'];
            $artista = $unRegistro['artista'];

            echo "<tr>
                    <td>$nombre</td>
                    <td>$album</td>
                    <td>$artista</td>
                 </tr>";
        }
        echo "</table>";


        ?>


    </div>
</body>

</html>