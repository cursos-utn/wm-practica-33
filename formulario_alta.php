<?php
$nombre = $_POST["nombre"];
$album = $_POST["album"];
$artista = $_POST["artista"];

require "config.php";

$conexion = mysqli_connect(DB_SERVIDOR, DB_USUARIO, DB_CONTRASENA, DB_BASEDATOS);


$sql = "insert into cancion (nombre, artista, album) values('$nombre', '$artista', '$album')";

//echo $sql;
//die();

$rta = mysqli_query($conexion, $sql);
if ($rta==false) {
	echo mysqli_error($conexion);
	die("No se pudo insertar el registro");
}

echo "Se agrego el registro!";
?>