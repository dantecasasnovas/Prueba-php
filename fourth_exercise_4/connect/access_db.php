<?php
$host_db = "localhost"; // Host de la BD
$usuario_db = "root"; // Usuario de la BD
$clave_db = "root"; // Contraseña de la BD
$nombre_db = "dante"; // Nombre de la BD
//conectamos y seleccionamos db
mysql_connect($host_db, $usuario_db, $clave_db);
mysql_select_db($nombre_db);
?>

<!--<?php
$mysqli = new mysqli("localhost", "root", "root", "dante");
if ($mysqli->connect_errno) {
    die('Error en la conexion' . $msqli->connect_errno);
}
?>
-->